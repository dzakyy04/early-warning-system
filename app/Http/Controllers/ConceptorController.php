<?php

namespace App\Http\Controllers;

use App\Models\Conceptor;
use Illuminate\Http\Request;

class ConceptorController extends Controller
{
    public function index() {
        $title = 'Konseptor';
        $conceptors = Conceptor::get();

        return view('konseptor.index', compact('title','conceptors'));
    }
}
