<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function edit($id)
    {
        $category = Category::find($id);
        return view('categorys.edit', compact('category'));
    }

    public function delete($id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->route('category.index')->with('success', 'Berhasil Hapus Data');
    }
}
