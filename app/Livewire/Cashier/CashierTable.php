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
        $this->subtotal = array_reduce($this->items, function ($carry, $item) {
            return $carry + ($item['price_kg'] * $item['stock']);
        }, 0);

        $this->total_item = collect($this->items)->sum('stock');
    }

    public function addItem($productId)
    {
        $product = Product::find($productId);

        if (!$product || $product->stock < 1) {
            toastr()->error('Stok tidak mencukupi!');
            return;
        }

        $existingIndex = array_search($productId, array_column($this->items, 'id'));

        if ($existingIndex !== false) {
            $this->items[$existingIndex]['stock']++;
        } else {
            $this->items[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price_kg' => $product->price_kg,
                'stock' => 1,
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

        // Pastikan amount_paid dihapus format Rupiah-nya dan diubah ke nilai numerik
        $amountPaid = $this->removeRupiahFormat($this->amount_paid);

        // Validasi pembayaran: Pastikan amountPaid lebih besar atau sama dengan subtotal
        if ((float)$amountPaid < (float)$this->subtotal) {
            toastr()->error('Jumlah pembayaran tidak cukup!');
            return;
        }

        // Proses transaksi untuk setiap item
        foreach ($this->items as $item) {
            // Buat transaksi
            $cashier = Transaction::create([
                'code' => 'TRX-' . now()->timestamp, // Kode transaksi unik
                'user_id' => Auth::id(),
                'product_id' => $item['id'], // Mengambil ID produk dari item yang diiterasi
                'date' => now(), // Menggunakan waktu sekarang sebagai tanggal transaksi
                'total_item' => $item['stock'], // Menyimpan jumlah item per produk
                'subtotal' => $item['price_kg'] * $item['stock'], // Subtotal per item
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

        // Menyimpan detail transaksi dalam sesi untuk pencetakan
        session(['transaction' => [
            'items' => $this->items,
            'subtotal' => $this->subtotal,
            'amount_paid' => $amountPaid,
            'change' => $amountPaid - $this->subtotal,
        ]]);

        toastr()->success('Transaksi Berhasil!');

        // Reset form
        $this->reset(['items', 'subtotal', 'amount_paid']);

        // Redirect ke halaman cetak
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
        $this->selected_member = Members::find($memberId);
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
