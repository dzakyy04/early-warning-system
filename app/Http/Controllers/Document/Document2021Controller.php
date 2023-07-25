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
        $documents = Document2021::with('conceptor')->get();
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
        $document = Document2021::with('conceptor')->findOrFail($id);
        $progress = json_decode($document->progress);
        $conceptors = Conceptor::get();
        return view('dokumen.dokumen_2021.edit', compact('title', 'document', 'progress', 'conceptors'));
    }

    public function update($id, Request $request)
    {
        
        $data = $request->validate([
            // Progress Masuk
            'satker' => 'nullable',
            'nomor_whatsapp_satker' => 'nullable',
            'nomor_surat_masuk' => 'nullable',
            'tanggal_surat_masuk' => 'nullable',
            'tanggal_surat_diterima' => 'nullable',
            'jenis_persetujuan' => 'nullable',
            'conceptor_id' => 'nullable',
            'nomor_nd_permohonan_penilaian' => 'nullable',
            'tanggal_nd_permohonan_penilaian' => 'nullable',
            // Progress penilaian
            'nomor_ndr_penilaian' => 'nullable',
            'tanggal_ndr_diterima_penilaian' => 'nullable',
            // Progress penyelesaian
            'nomor_surat_persetujuan_penolakan' => 'nullable',
            'tanggal_surat_persetujuan_penolakan' => 'nullable',
            'nilai_proporsional_harga_perolehan_nilai_bmn' => 'nullable',
            'nilai_persetujuan' => 'nullable',
            'periode_sewa' => 'nullable'
        ]);

        $document = Document2021::with('conceptor')->findOrFail($id);
        $progress = json_decode($document->progress, true);

        $completed1 = $request->nomor_nd_permohonan_penilaian && $request->tanggal_nd_permohonan_penilaian;
        $completed2 = $request->nomor_ndr_penilaian && $request->tanggal_ndr_diterima_penilaian;
        $completed3 = $request->nomor_surat_persetujuan_penolakan &&
            $request->tanggal_surat_persetujuan_penolakan && $request->nilai_proporsional_harga_perolehan_nilai_bmn &&
            $request->nilai_persetujuan;

        if ($completed1) {
            $progress['progress_masuk']['isCompleted'] = true;
        }

        if ($completed2) {
            $progress['progress_dinilai']['isCompleted'] = true;
        }

        if ($completed3) {
            $progress['progress_selesai']['isCompleted'] = true;
        }

        $data['progress'] = json_encode($progress);

        $document->update($data);

        return redirect()->route('dokumen2021.index');
    }
}
