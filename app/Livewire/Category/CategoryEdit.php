<?php

namespace App\Livewire\Category;

use App\Models\Category;
use Livewire\Component;

class CategoryEdit extends Component
{
    public $category_id,$name;
    public function mount($category)
    {
        $this->category_id = $category->id;
        $this->name = $category->name;

    }
    public function render()
    {
        return view('livewire.category.category-edit',[
            'category' => Category::find($this->category_id)
        ]);
    }

    public function update()
    {
        $this->validate([
            'name' =>'required|min:3|max:255',
        ]);

        $category = Category::find($this->category_id);
        $category->name = $this->name;
        $category->save();

        toastr()->success('Data Berhasil Diubah!');

        return redirect()->route('category.index');
    }
}
