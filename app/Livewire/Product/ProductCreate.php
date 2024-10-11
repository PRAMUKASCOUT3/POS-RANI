<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{
    public $category_id, $name, $brand, $stock, $price_buy, $price_sell, $unit;
    public $code; // Auto-generated product code

    // Rules for validation
    protected $rules = [
        'category_id' => 'required',
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'stock' => 'required|integer',
        'price_buy' => 'required|numeric',
        'price_sell' => 'required|numeric',
        'unit' => 'required|string',
    ];

    public function mount()
    {
        $this->code = 'BR' . str_pad(Product::max('id') + 1, 4, '0', STR_PAD_LEFT); // Auto-generate product code
    }

    // Save the product
    public function save()
    {
        $validatedData = $this->validate();

        Product::create([
            'code' => $this->code,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'brand' => $this->brand,
            'stock' => $this->stock,
            'price_buy' => $this->price_buy,
            'price_sell' => $this->price_sell,
            'unit' => $this->unit,
        ]);

        toastr()->success('Data Berhasil Ditambahkan!');
        
        $this->reset(['category_id', 'name', 'brand', 'stock', 'price_buy', 'price_sell', 'unit']);
        
        $this->code = 'BR' . str_pad(Product::max('id') + 1, 4, '0', STR_PAD_LEFT);

        return redirect()->route('product.index');
    }
    public function render()
    {
        return view('livewire.product.product-create',[
            'category' => Category::all()
        ]);
    }
}
