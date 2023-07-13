<?php

namespace App\Http\Controllers\Products;

use App\Http\Controllers\Controller;
use App\Models\Data2021;
use Carbon\Carbon;
use Illuminate\Http\Request;

class Data2021Controller extends Controller
{
    public function index()
    {
        $data = Data2021::all();
        $title = 'Product 2021';


        $data->map(function ($item) {
            $item->tanggal_penerimaan_dokumen_lengkap = Carbon::createFromFormat('Y-m-d', $item->tanggal_penerimaan_dokumen_lengkap)->locale('id')->isoFormat('D MMMM YYYY');
            $item->tanggal_surat_masuk = Carbon::createFromFormat('Y-m-d', $item->tanggal_surat_masuk)->locale('id')->isoFormat('D MMMM YYYY');


        });
        return view('products.2021.index', compact('data', 'title'));

    }

    public function create()
    {
        $title = 'Create Product';
        return view('products.2021.create', compact('title'));
    }
}