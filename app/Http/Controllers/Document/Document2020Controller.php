<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Conceptor;
use App\Models\Document\Document2020;
use Illuminate\Http\Request;

class Document2020Controller extends Controller
{
    public function index()
    {
        $title = 'Dokumen 2020';
        $documents = Document2020::with('conceptor')->get();
        return view('dokumen.dokumen_2020.index', compact('documents', 'title'));
    }

    public function create()
    {
        $conceptors = Conceptor::get();
        $title = 'Tambah Dokumen';
        return view('dokumen.dokumen_2020.create', compact('title', 'conceptors'));
    }

    public function edit($id)
    {
        $title = 'Edit Dokumen';
        $document = Document2020::with('conceptor')->findOrFail($id);
        $progress = json_decode($document->progress);
        $conceptors = Conceptor::get();
        return view('dokumen.dokumen_2020.edit', compact('title', 'document', 'progress', 'conceptors'));
    }
}
