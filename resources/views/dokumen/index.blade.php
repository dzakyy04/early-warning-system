@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body" style="overflow-x: scroll">
                <h5 class="card-title">Dokumen</h5>
                <a href="{{ route('dokumen.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus me-1"></i> Tambah
                    Dokumen</a>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">No</th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Satker</th>
                            <th class="text-nowrap text-center align-middle" scope="col" colspan="2">
                                Surat Masuk
                            </th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Tanggal Surat Diterima</th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Jenis Persetujuan</th>
                            <th class="text-nowrap text-center align-middle" scope="col" colspan="2">ND Permohonan Penilaian</th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Status</th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Aksi</th>
                        </tr>
                        <tr class="table-primary">
                            <th scope="col" class="text-nowrap text-center align-middle">Nomor</th>
                            <th scope="col" class="text-nowrap text-center align-middle">Tanggal</th>
                            <th scope="col" class="text-nowrap text-center align-middle">Nomor</th>
                            <th scope="col" class="text-nowrap text-center align-middle">Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($documents as $index => $document)
                            <tr>
                                <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                <td>{{ $document->satker }}</td>
                                <td>{{ $document->nomor_surat_masuk }}</td>
                                <td>{{ $document->tanggal_surat_masuk }}</td>
                                <td>{{ $document->tanggal_surat_diterima }}</td>
                                <td>{{ $document->jenis_persetujuan }}</td>
                                <td>{{ $document->nomor_nd_permohonan_penilaian }}</td>
                                <td>{{ $document->tanggal_nd_permohonan_penilaian }}</td>
                                <td class="text-center">
                                    <span class="badge bg-danger rounded-pill px-2">
                                        Sebentar lagi
                                    </span>
                                </td>
                                <td class="text-nowrap text-center">
                                    <span class="badge bg-primary rounded">
                                        <i class="bi bi-eye"></i>
                                    </span>
                                    <span class="badge bg-warning rounded mx-1">
                                        <i class="bi bi-pencil"></i>
                                    </span>
                                    <span class="badge bg-danger rounded">
                                        <i class="bi bi-trash"></i>
                                    </span>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
