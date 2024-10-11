<?php

namespace App\Livewire\Expenditures;

use App\Models\Expenditure;
use Livewire\Component;

class ExpendituresEdit extends Component
{
    public $expenditure_id;
    public $date,$description,$nominal;

    public function mount($expenditure)
    {
        $this->expenditure_id = $expenditure->id;
        $this->date = $expenditure->date;
        $this->description = $expenditure->description;
        $this->nominal = $expenditure->nominal;
    }
    
    public function update()
    {
        $validatedData = $this->validate([
            'date' => ['required', 'date'],
            'description' => ['required','string','max:255'],
            'nominal' => ['required', 'numeric','min:0'],
        ]);

        $expenditure = Expenditure::find($this->expenditure_id);
        $expenditure->update($validatedData);

        toastr()->success('Data Berhasil Diubah!');
        return redirect()->route('expenditures.index');
    }

    public function render()
    {
        return view('livewire.expenditures.expenditures-edit',[
            'expenditure' => Expenditure::find($this->expenditure_id)
        ]);
    }
}
