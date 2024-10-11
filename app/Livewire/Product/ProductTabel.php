<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ProductTabel extends Component
{
    public $products;
    protected $listeners = ['DeleteProduct' => 'render'];
    public function mount()
    {
        $this->products = Product::all();
    }
    public function render()
    {
        return view('livewire.product.product-tabel', [
            'products' => $this->products,
        ]);
    }

    public function delete($id)
    {
        $product = Product::find($id);
        $product->delete();
        toastr('success','Data Berhasil Dihapus');
        $this->dispatch('DeleteProduct');
    }
}
