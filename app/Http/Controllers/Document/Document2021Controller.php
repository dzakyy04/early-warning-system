<?php

namespace App\Http\Controllers\Document;

use App\Http\Controllers\Controller;
use App\Models\Conceptor;
use App\Models\Document\Document2021;
use Illuminate\Http\Request;

class Document2021Controller extends Controller
{
    public function index()
    {
        $title = 'Dokumen 2021';
        $documents = Document2021::get();
        return view('dokumen.dokumen_2021.index', compact('documents', 'title'));
    }

    public function create()
    {
        $conceptors = Conceptor::get();
        $title = 'Tambah Dokumen';
        return view('dokumen.dokumen_2021.create', compact('title', 'conceptors'));
    }

    public function edit($id)
    {
        $title = 'Edit Dokumen';
        $document = Document2021::findOrFail($id);
        $progress = json_decode($document->progress);
        $conceptors = Conceptor::get();
        return view('dokumen.dokumen_2021.edit', compact('title', 'document', 'progress', 'conceptors'));
    }
}
