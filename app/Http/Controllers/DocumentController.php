<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;

class DocumentController extends Controller
{
    public function index()
    {
        $title = 'Dokumen';
        $documents = Document::get();
        return view('dokumen.index', compact('title', 'documents'));
    }

    public function create()
    {
        $title = 'Create Document';
        return view('dokumen.create', compact('title'));
    }
}
