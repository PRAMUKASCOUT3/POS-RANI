<?php

namespace App\Livewire\Cashier;

use App\Models\Members;
use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class CashierTable extends Component
{
    use WithPagination;

    public $items = [];
    public $subtotal = 0;
    public $amount_paid;
    public $total_item = 0;
    public $date;
    public $status = 'pending';
    public $change = 0;

    public $bank = '';
    public $member_id;
    public $use_points = false;
    public $number_card = '';
    public $search_product = '';
    public $search_member = '';
    public $selected_member = null;

    protected $paginationTheme = 'bootstrap';
    protected $queryString = ['search_member'];


    public function mount()
    {
        $this->date = now()->toDateTimeString();
    }

    public function calculateSubtotal()
    {
        // Hitung subtotal dengan harga yang sesuai (price_sell atau price_kg)
        $this->subtotal = array_reduce($this->items, function ($carry, $item) {
            // Pilih harga sesuai unit (Pcs atau Kg)
            $price = ($item['unit'] === 'Pcs') ? $item['price_sell'] : $item['price_kg'];

            return $carry + ($price * $item['stock']); // stock dapat berupa pecahan
        }, 0);

        // Hitung total item (stok) di keranjang
        $this->total_item = collect($this->items)->sum('stock'); // Mendukung jumlah pecahan
    }



    public function addItem($productId)
    {
        $product = Product::find($productId);

        if (!$product->hasSufficientStock(0.1)) {
            toastr()->error('Stok tidak mencukupi!');
            return;
        }

        $existingIndex = array_search($productId, array_column($this->items, 'id'));

        if ($existingIndex !== false) {
            $this->items[$existingIndex]['stock'] += 0.1; // Tambahkan 0.1 kg
        } else {
            $this->items[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price_sell' => $product->price_sell,
                'price_kg' => $product->price_kg,
                'stock' => 1, // Set jumlah default atau ambil dari input
                'unit' => $product->unit,
                'member_id' => $this->selected_member->id ?? null, // Pastikan member_id ditambahkan
            ];
        }

        $this->calculateSubtotal();
    }




    public function updateQuantity($index, $stock)
    {
        $this->items[$index]['stock'] = $stock;
        $this->calculateSubtotal();
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items);
        $this->calculateSubtotal();
    }

    public function saveTransaction()
{
    // Validasi jika keranjang kosong
    if (empty($this->items)) {
        toastr()->error('Keranjang tidak boleh kosong!');
        return;
    }

    // Ambil data member
    $member = Members::find($this->member_id);
    if (!$member) {
        toastr()->error('Member tidak ditemukan!');
        return;
    }

    // Hitung total poin yang digunakan
    $pointsUsed = 0;
    $pointsAdded = 0; // Variabel untuk menandakan apakah poin ditambahkan

    if ($this->use_points && $member->points > 0) {
        // Gunakan poin sebanyak subtotal atau sebanyak yang tersedia
        $pointsUsed = min($this->subtotal, $member->points);

        if ($pointsUsed > 0) {
            // Kurangi poin yang digunakan
            $member->points -= $pointsUsed;
            $member->save();
        }
    }

    // Potong subtotal dengan poin yang digunakan
    $this->subtotal -= $pointsUsed;

    // Periksa apakah poin sudah habis
    if ($member->points == 0 && $pointsUsed > 0) {
        toastr()->info('Poin Anda telah habis.');
    }

    // Proses transaksi
    // Pastikan amountPaid dihapus format Rupiah-nya dan diubah ke nilai numerik
    $amountPaid = $this->removeRupiahFormat($this->amount_paid);

    // Validasi pembayaran: Pastikan amountPaid lebih besar atau sama dengan subtotal
    if ((float)$amountPaid < (float)$this->subtotal) {
        toastr()->error('Jumlah pembayaran tidak cukup!');
        return;
    }

    // Proses transaksi untuk setiap item
    foreach ($this->items as $item) {
        // Tentukan harga yang digunakan berdasarkan unit
        $price = ($item['unit'] === 'Pcs') ? $item['price_sell'] : $item['price_kg'];

        // Buat transaksi
        $cashier = Transaction::create([
            'code' => 'TRX-' . now()->timestamp, // Kode transaksi unik
            'user_id' => Auth::id(),
            'member_id' => $item['member_id'],
            'product_id' => $item['id'],
            'date' => now(),
            'total_item' => $item['stock'],
            'subtotal' => $price * $item['stock'],
            'amount_paid' => $amountPaid,
            'status' => 'completed',
        ]);

        // Update stok produk
        $product = Product::find($item['id']);
        if ($product && $product->stock >= $item['stock']) {
            $product->stock -= $item['stock'];
            $product->save();
        } else {
            throw new \Exception('Stok tidak cukup untuk produk: ' . $product->name);
        }
    }

    // Tambahkan poin hanya jika poin tidak digunakan
    if ($pointsUsed == 0) {
        $pointsAdded = 100; // Misalnya, 100 poin diberikan
        $member->points += $pointsAdded;
        $member->save();
    }

    // Menyimpan detail transaksi dalam sesi untuk pencetakan
    session(['transaction' => [
        'items' => $this->items,
        'subtotal' => $this->subtotal,
        'amount_paid' => $amountPaid,
        'change' => $amountPaid - $this->subtotal,
    ]]);

    toastr()->success('Transaksi Berhasil!');
    $this->reset(['items', 'subtotal', 'amount_paid']);
    return redirect()->route('cashier.print');
}

    




    public function clear()
    {
        $this->reset(['items', 'subtotal', 'amount_paid', 'total_item', 'change']);
    }

    public function calculateChange()
    {
        $amountPaid = $this->removeRupiahFormat($this->amount_paid);
        $this->change = $amountPaid - $this->subtotal;
    }

    public function updatedAmountPaid()
    {
        $this->amount_paid = $this->formatRupiah($this->amount_paid);
        $this->calculateChange();
    }

    private function formatRupiah($value)
    {
        $value = str_replace(',', '', preg_replace('/[^\d]/', '', $value));
        return number_format($value);
    }

    private function removeRupiahFormat($value)
    {
        return (float) preg_replace('/[^\d]/', '', $value);
    }

    public function selectMember($memberId)
    {
        $member = Members::find($memberId);
        if ($member) {
            $this->selected_member = $member;
            // Update member_id ke dalam form jika diperlukan
            $this->member_id = $member->id;
        } else {
            session()->flash('error', 'Member tidak ditemukan!');
        }
    }


    public function updatingSearchMember()
    {
        $this->resetPage();
    }


    public function render()
    {
        return view('livewire.cashier.cashier-table', [
            'product' => Product::where('name', 'like', '%' . $this->search_product . '%')->paginate(5),
            'members' => Members::where('name', 'like', '%' . $this->search_member . '%')
                ->orWhere('code', 'like', '%' . $this->search_member . '%')
                ->orWhere('phone', 'like', '%' . $this->search_member . '%')
                ->paginate(5)
        ]);
    }
}
