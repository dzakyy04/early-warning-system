@extends('layouts.app')

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" style="overflow-x: scroll">
                <h5 class="card-title">Dokumen 2021</h5>
                @if (Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin')
                    <a href="{{ route('dokumen2021.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus me-1"></i>
                        Tambah Dokumen</a>
                @endif

                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">No</th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Satker</th>
                            <th class="text-nowrap text-center align-middle" scope="col" colspan="2">
                                Surat Masuk
                            </th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Tanggal Surat
                                Diterima</th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Jenis Persetujuan
                            </th>
                            <th class="text-nowrap text-center align-middle" scope="col" colspan="2">ND Permohonan
                                Penilaian</th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Total Hari</th>
                            <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Status Progress
                            </th>
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
                                <td>{{ $document->total_hari }}</td>
                                <td class="text-center">
                                    <span
                                        class="badge {{ $document->status_progress == 'Diproses' ? 'bg-warning' : 'bg-success' }} rounded-pill px-2 w-75">
                                        {{ $document->status_progress }}
                                    </span>
                                </td>
                                <td class="text-nowrap text-center">
                                    <a href="" class="badge bg-primary rounded pointer">
                                        <i class="bi bi-eye"></i>
                                    </a>
                                    <a href="{{ route('dokumen2021.edit', $document->id) }}"
                                        class="badge bg-warning rounded pointer mx-1">
                                        <i class="bi bi-pencil"></i>
                                    </a>
                                    <a href="" class="badge bg-danger rounded pointer">
                                        <i class="bi bi-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
