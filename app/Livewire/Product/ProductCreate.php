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
        'weight' => 'nullable|numeric|min:1',
        'unit' => 'required|string',
    ];

    protected function validationAttributes()
    {
        return [
            'category_id' => 'kategori',
            'name' => 'nama produk',
            'brand' => 'merek',
            'stock' => 'stok',
            'price_buy' => 'harga beli',
            'price_sell' => 'harga jual',
            'weight' => 'berat',
            'unit' => 'satuan',
        ];
    }

    public function mount()
    {
        $this->code = 'BR' . str_pad(Product::max('id') + 1, 4, '0', STR_PAD_LEFT);
    }

    public function updated($propertyName)
    {
        if (in_array($propertyName, ['price_sell', 'weight'])) {
            // Pastikan nilai price_sell dan weight dikonversi ke float
            $priceSell = (float) $this->price_sell;
            $weight = (float) $this->weight;

            // Pastikan berat dalam kilogram
            $weightInKg = $weight > 0 ? $weight / 100 : 0; // Jika berat dalam gram, konversikan ke kg

            // Hitung harga per kilogram jika berat lebih dari nol
            if ($weightInKg > 0) {
                $this->price_kg = $priceSell / $weightInKg;
            } else {
                $this->price_kg = 0; // Set 0 jika berat tidak valid
            }
        }
    }

    public function updatedPriceBuy($value)
    {
        $this->price_buy = preg_replace('/[^0-9]/', '', $value);
    }

    public function updatedPriceSell($value)
    {
        $this->price_sell = preg_replace('/[^0-9]/', '', $value);
    }



    public function save()
    {
        // Tambahkan aturan validasi dinamis
        $this->rules['weight'] = $this->unit === 'Kg'
            ? 'required|numeric|min:1'
            : 'nullable|numeric|min:0';

        $validatedData = $this->validate();

        $weight = (float) $this->weight;
        $weightInKg = $this->unit === 'Kg' && $weight > 0 ? $weight / 100 : 0;

        Product::create([
            'code' => $this->code,
            'category_id' => $this->category_id,
            'name' => $this->name,
            'brand' => $this->brand,
            'stock' => $this->stock,
            'price_buy' => $this->price_buy,
            'price_sell' => $this->price_sell,
            'price_kg' => $weightInKg > 0 ? $this->price_sell / $weightInKg : 0,
            'weight' => $weightInKg, // Simpan berat dalam kg jika unit adalah Kg
            'unit' => $this->unit,
        ]);

        toastr()->success('Data Berhasil Ditambahkan!');

        $this->reset(['category_id', 'name', 'brand', 'stock', 'price_buy', 'price_sell', 'price_kg', 'weight', 'unit']);

        $this->code = 'BR' . str_pad(Product::max('id') + 1, 4, '0', STR_PAD_LEFT);

        return redirect()->route('product.index');
    }


    public function render()
    {
        return view('livewire.product.product-create', [
            'category' => Category::all()
        ]);
    }
}
