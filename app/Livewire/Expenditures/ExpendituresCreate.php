<?php

namespace App\Livewire\Expenditures;

use App\Models\Expenditure;
use Livewire\Component;

class ExpendituresCreate extends Component
{
    public $date, $description, $nominal;
    protected $rules = [
        'date' => 'required|date',
        'description' => 'required|min:5',
        'nominal' => 'required|numeric|min:1000'
    ];

    public function updatedNominal($value)
    {
        // Remove formatting (dots) before validation
        $this->nominal = str_replace('.', '', $value);
    }

    public function save()
    {
        $this->validate();

        Expenditure::create([
            'date' => $this->date,
            'description' => $this->description,
            'nominal' => $this->nominal,
        ]);

        toastr()->success('Data Berhasil Ditambahkan');

        $this->reset(['date', 'description', 'nominal']);

        redirect()->route('expenditures.index');
    }
    public function render()
    {
        return view('livewire.expenditures.expenditures-create');
    }
}
