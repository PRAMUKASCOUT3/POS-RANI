<?php

namespace App\Http\Controllers;

use App\Models\Members;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        $members = Members::all();
        return view('members.index', compact('members'));
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Tambahkan data `code` secara otomatis
        $validatedData['code'] = Members::generateKodeUser();

        Members::create($validatedData);

        return redirect()->route('members.index')->with('success', 'Member berhasil ditambahkan!');
    }


    public function edit(Members $member)
    {
        return view('members.edit', compact('member'));
    }

    public function update(Request $request, Members $member)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'nullable|string|max:15',
        ]);

        $member->update($validatedData);

        return redirect()->route('members.index')->with('success', 'Member berhasil diperbarui!');
    }

    public function destroy(Members $member)
    {
        $member->delete();
        return redirect()->route('members.index')->with('success', 'Member berhasil dihapus!');
    }
}
