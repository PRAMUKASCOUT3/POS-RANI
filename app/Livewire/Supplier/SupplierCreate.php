<?php

namespace App\Livewire\Supplier;

use App\Models\Supplier;
use Livewire\Component;

class SupplierCreate extends Component
{

    public $name, $contact_person, $address;

    protected $rules = [
        'name' => 'required|string|max:255',
        'contact_person' => 'required|string|max:255',
        'address' => 'required|string|max:255',
    ];

    public function save()
    {
        $this->validate();

        Supplier::create([
            'name' => $this->name,
            'contact_person' => $this->contact_person,
            'address' => $this->address,
        ]);

        if(!$this->validate()){
            toastr()->error('Data Ada Yang salah!');
        }
        toastr()->success('Data Berhasil Ditambahkan!');

        $this->reset(['name', 'contact_person', 'address']);

       redirect()->route('supplier.index');
    }

    public function render()
    {
        return view('livewire.supplier.supplier-create');
    }
}
