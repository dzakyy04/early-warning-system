@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Produk 2021</h5>
                <a href="{{ route('data2021.create')}}" class="btn btn-primary mb-3"><i class="bi bi-plus me-1"></i> Tambah data 2021</a>
                <!-- Table with hoverable rows -->
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center" scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Nomor Surat</th>
                            <th scope="col">Tgl Surat</th>
                            <th scope="col">Satker</th>
                            <th scope="col">Tgl Dokumen Lengkap</th>
                            <th scope="col">Periode Sewa</th>
                            <th scope="col">Jenis Surat</th>
                            <th class="text-center" scope="col">Status</th>
                            <th style="min-width: 150px" class="text-center" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $index => $dt)
                            <tr>
                                <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                <td>{{ $dt->pejabat_pemohon }}</td>
                                <td>{{ $dt->nomor_surat_masuk }}</td>
                                <td>{{ $dt->tanggal_surat_masuk }}</td>
                                <td>{{ $dt->satker_lokasi_bmn }}</td>
                                <td>{{ $dt->tanggal_penerimaan_dokumen_lengkap }}</td>
                                <td>{{ $dt->periode_sewa }}</td>
                                <td>{{ $dt->jenis_persetujuan }}</td>
                                <td class="text-center"><span class="badge bg-danger rounded-pill px-2">
                                    Sebentar lagi
                                    </span></td>
                                <td class="text-center" >
                                    
                                    <button class="btn btn-primary btn-sm rounded-pill"><i class="bi bi-eye"></i></button>
                                    <button class="btn btn-warning btn-sm rounded-pill mx-1"><i class="bi bi-pencil"></i></button>
                                    <button class="btn btn-danger btn-sm rounded-pill"><i class="bi bi-trash"></i></button>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <!-- End Table with hoverable rows -->

            </div>
        </div>
    </div>
@endsection
