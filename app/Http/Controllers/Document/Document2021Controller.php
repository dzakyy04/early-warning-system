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
        $this->authorize('admin-pkn') || $this->authorize('super-admin');
        $conceptors = Conceptor::get();
        $title = 'Tambah Dokumen';
        return view('dokumen.dokumen_2021.create', compact('title', 'conceptors'));
    }

    public function store(Request $request)
    {
        $this->authorize('admin-pkn') || $this->authorize('super-admin');
        $data = $request->validate([
            'satker' => 'required',
            'nomor_whatsapp_satker' => 'required',
            'nomor_surat_masuk' => 'required',
            'tanggal_surat_masuk' => 'required',
            'tanggal_surat_diterima' => 'required',
            'jenis_persetujuan' => 'required',
            'conceptor_id' => 'required',
            'nomor_nd_permohonan_penilaian' => 'nullable',
            'tanggal_nd_permohonan_penilaian' => 'nullable'
        ]);

        if ($request->nomor_nd_permohonan_penilaian && $request->tanggal_nd_permohonan_penilaian) {
            $data['progress'] = json_encode([
                'progress_masuk' => ['day' => 1, 'isCompleted' => true],
                'progress_dinilai' => ['day' => 0, 'isCompleted' => false],
                'progress_selesai' => ['day' => 0, 'isCompleted' => false],
            ]);
        }

        Document2021::create($data);

        return redirect()->route('dokumen2021.index');
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
