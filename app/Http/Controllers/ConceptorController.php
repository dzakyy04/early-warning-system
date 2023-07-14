<?php

namespace App\Http\Controllers;

use App\Models\Conceptor;
use Illuminate\Http\Request;

class ConceptorController extends Controller
{
    public function index()
    {
        $title = 'Konseptor';
        $conceptors = Conceptor::get();

        return view('konseptor.index', compact('title', 'conceptors'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'no_whatsapp' => 'required'
        ]);

        Conceptor::create($data);

        return back()->with('success', "$request->name berhasil ditambahkan menjadi konseptor");
    }

    public function update($id, Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'no_whatsapp' => 'required'
        ]);

        $conceptor = Conceptor::findorFail($id);
        $conceptor->update($data);

        return back()->with('success', "$request->name berhasil diubah");
    }

    public function delete($id)
    {
        $conceptor = Conceptor::findOrFail($id);
        $conceptor->delete();

        return back()->with('success', "Data berhasil dihapus");
    }
}