<?php

namespace App\Livewire\Cashier;

use App\Models\Transaction;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class CashierTable extends Component
{
    public $items = [];
    public $subtotal = 0;
    public $amount_paid = 0;
    public $total_item = 0;
    public $date;
    public $status = 'pending';
    public $change = 0;

    public $bank = [];

    public $number_card = 0;

    public $products;

    use WithPagination;
    protected $paginationTheme = 'bootstrap';

    public $search = '';

    public function mount()
    {
        $this->date = now()->toDateTimeString(); // Set tanggal transaksi
    }

    public function calculateSubtotal()
    {
        $this->subtotal = array_reduce($this->items, function ($carry, $item) {
            return $carry + ($item['price_sell'] * $item['stock']);
        }, 0);

        $this->total_item = count($this->items);
    }
    public function addItem($productId)
    {
        $product = Product::find($productId);
        $this->items[] = [
            'id' => $product->id,
            'name' => $product->name,
            'price_sell' => $product->price_sell,
            'stock' => 1,
        ];

        $this->calculateSubtotal();
    }
    public function updateQuantity($index, $stock)
    {
        $this->items[$index]['stock'] = $stock;
        $this->total_item = collect($this->items)->sum('stock');
        $this->calculateSubtotal();
    }

    public function removeItem($index)
    {
        unset($this->items[$index]);
        $this->items = array_values($this->items); // Reindex array
        $this->calculateSubtotal();
    }

    public function saveTransaction()
    {
        // Validasi jika keranjang kosong
        if (empty($this->items)) {
            toastr()->error('Keranjang tidak boleh kosong!');
            return;
        }

        // Validasi pembayaran
        if ($this->amount_paid < $this->subtotal) {
            toastr()->error('Jumlah pembayaran tidak cukup!');
            return;
        }

        foreach ($this->items as $item) {
            $cashier = Transaction::create([
                'code' => 'TRX-' . now()->timestamp, // Kode transaksi unik
                'user_id' => Auth::id(),
                'product_id' => $item['id'], // Mengambil ID produk dari item yang diiterasi
                'date' => now(), // Menggunakan waktu sekarang sebagai tanggal transaksi
                'total_item' => $item['stock'], // Menyimpan jumlah item per produk
                'subtotal' => $item['price_sell'] * $item['stock'], // Subtotal per item
                'amount_paid' => $this->amount_paid,
                'status' => 'completed',
            ]);

            // Update stok produk
            $product = Product::find($item['id']);
            if ($product->stock >= $item['stock']) {
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
            'amount_paid' => $this->amount_paid,
            'change' => $this->amount_paid - $this->subtotal,
        ]]);

        toastr()->success('Transaksi Berhasil!');

        // Reset form
        $this->reset(['items', 'subtotal', 'amount_paid']);

        // Redirect ke halaman cetak
        return redirect()->route('cashier.print');
    }

    public function ViaBank()
    {
        // Validasi jika keranjang kosong
        if (empty($this->items)) {
            toastr()->error('Keranjang tidak boleh kosong!');
            return;
        }

        // Validasi pembayaran
        if ($this->amount_paid < $this->subtotal) {
            toastr()->error('Jumlah pembayaran tidak cukup!');
            return;
        }

        // Validasi input bank dan nomor kartu
        if (empty($this->bank) || empty($this->number_card)) {
            toastr()->error('Nama bank dan nomor kartu harus diisi!');
            return;
        }

        // Gunakan transaksi database untuk menghindari data korup
        DB::beginTransaction();

        try {
            foreach ($this->items as $item) {
                // Periksa stok produk
                $product = Product::find($item['id']);
                if (!$product || $product->stock < $item['stock']) {
                    throw new \Exception('Stok tidak cukup untuk produk: ' . ($product->name ?? 'Tidak Diketahui'));
                }

                // Simpan data transaksi
                $cashier = Transaction::create([
                    'code' => 'TRX-' . now()->timestamp, // Kode transaksi unik
                    'user_id' => Auth::id(),
                    'product_id' => $item['id'], // ID produk dari item
                    'date' => now(), // Tanggal transaksi
                    'total_item' => $item['stock'], // Jumlah item per produk
                    'subtotal' => $item['price_sell'] * $item['stock'], // Subtotal per item
                    'amount_paid' => $this->amount_paid,
                    'bank' => $this->bank,
                    'number_card' => $this->number_card,
                    'status' => 'completed',
                ]);

                // Update stok produk
                $product->stock -= $item['stock'];
                $product->save();
            }

            // Simpan detail transaksi dalam sesi untuk pencetakan
            session(['transaction' => [
                'items' => $this->items,
                'subtotal' => $this->subtotal,
                'amount_paid' => $this->amount_paid,
                'change' => $this->amount_paid - $this->subtotal,
            ]]);

            toastr()->success('Transaksi Berhasil!');

            // Reset form
            $this->reset(['items', 'subtotal', 'amount_paid', 'bank', 'number_card']);

            DB::commit();

            // Redirect ke halaman cetak
            return redirect()->route('cashier.print');
        } catch (\Exception $e) {
            DB::rollBack();
            toastr()->error('Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    public function clear()
    {
        $this->reset(['items', 'subtotal', 'amount_paid', 'total_item']);
    }


    public function calculateChange()
    {
        $this->change = (float) $this->amount_paid - (float) $this->subtotal;
    }

    // Fungsi yang otomatis dipanggil ketika amount_paid diperbarui
    public function updatedAmountPaid()
    {
        $this->calculateChange();
    }

    public function updatingSearch()
    {
        // Reset pagination when search input is updated
        $this->resetPage();
    }
    public function render()
    {
        return view('livewire.cashier.cashier-table', [
            'product' => Product::where('name', 'like', '%' . $this->search . '%')
                ->paginate(5)
        ]);
    }
}
