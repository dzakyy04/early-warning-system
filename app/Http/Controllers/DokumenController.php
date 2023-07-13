<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DokumenController extends Controller
{
    public function index()
    {
        $title = 'Dokumen';
        return view('dokumen.index', compact('title'));
    }

    public function create()
    {
        $title = 'Create Document';
        return view('dokumen.create', compact('title'));
    }
}
