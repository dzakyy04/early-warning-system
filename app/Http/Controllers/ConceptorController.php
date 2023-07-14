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

        $conceptor = Conceptor::find($id);

        Conceptor::where('id', $conceptor->id)->update($data);

        return back()->with('success', "$request->name berhasil diubah");
    }
}