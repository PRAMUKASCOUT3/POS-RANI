<?php

namespace App\Livewire\Product;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class ProductCreate extends Component
{
    public $category_id, $name, $brand, $stock, $price_buy, $price_sell, $price_kg, $weight, $unit;
    public $code; // Auto-generated product code

    // Rules for validation
    protected $rules = [
        'category_id' => 'required',
        'name' => 'required|string|max:255',
        'brand' => 'required|string|max:255',
        'stock' => 'required|integer|min:1',
        'price_buy' => 'required|numeric|min:0',
        'price_sell' => 'required|numeric|min:0',
        'weight' => 'required|numeric|min:1',
        'unit' => 'required|string',
    ];

    public function mount()
    {
        $this->code = 'BR' . str_pad(Product::max('id') + 1, 4, '0', STR_PAD_LEFT);
    }

    public function updated($propertyName)
    {
        // Jika harga jual atau berat diubah, hitung ulang harga per kilo
        if (in_array($propertyName, ['price_sell', 'weight']) && $this->weight > 0) {
            $this->price_kg = $this->price_sell / ($this->weight / 1000); // Berat dalam kg
        }
    }

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
            'price_kg' => $this->price_kg,
            'weight' => $this->weight,
            'unit' => $this->unit,
        ]);

        toastr()->success('Data Berhasil Ditambahkan!');

        $this->reset(['category_id', 'name', 'brand', 'stock', 'price_buy', 'price_sell', 'price_kg', 'weight', 'unit']);

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
