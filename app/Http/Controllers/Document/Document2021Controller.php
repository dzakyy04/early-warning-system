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
        // $documents->map(function($doc) {
        //     $doc->total_hari = $doc->progress_masuk + $doc->progress_dinilai + $doc->progress_selesai;

        //     $doc->update(['total_hari' => $doc->total_hari]);
        //     return $doc;
        // });
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
        $dokumen = Document2021::findOrFail($id);
        $conceptors = Conceptor::get();
        return view('dokumen.dokumen_2021.edit', compact('title', 'dokumen', 'conceptors'));
    }
}
