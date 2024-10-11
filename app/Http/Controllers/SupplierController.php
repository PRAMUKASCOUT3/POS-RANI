<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function edit($id)
    {
        // Retrieve the supplier details from the database
        $suppliers = Supplier::find($id);

        // Return the supplier details in a view
        return view('suppliers.edit', compact('suppliers'));
    }
}
