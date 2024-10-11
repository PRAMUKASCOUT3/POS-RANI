<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductEdit extends Component
{
    public $product_id;
    public $category_id, $name, $brand, $stock, $price_buy, $price_sell, $unit;

    public function mount($product)
    {
        // Isi properti dengan data produk yang sedang di-edit
        $this->product_id = $product->id;
        $this->category_id = $product->category_id;
        $this->name = $product->name;
        $this->brand = $product->brand;
        $this->stock = $product->stock;
        $this->price_buy = $product->price_buy;
        $this->price_sell = $product->price_sell;
        $this->unit = $product->unit;
    }

    public function update()
    {
        // Update data produk di database
        $product = Product::find($this->product_id);
        $product->category_id = $this->category_id;
        $product->name = $this->name;
        $product->brand = $this->brand;
        $product->stock = $this->stock;
        $product->price_buy = $this->price_buy;
        $product->price_sell = $this->price_sell;
        $product->unit = $this->unit;
        $product->save();
        toastr()->success('Data Berhasil Diubah!');
        return redirect()->route('product.index');
    }
    public function render()
    {
        return view('livewire.product.product-edit',[
            'category' => Category::all()
        ]);
    }
}
