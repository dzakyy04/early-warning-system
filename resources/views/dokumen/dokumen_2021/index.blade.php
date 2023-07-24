@extends('layouts.app')

@push('css')
    <link href="{{ asset('vendor/datatables/css/jquery.dataTables.min.css') }}" rel="stylesheet">
@endpush

@push('js')
    <script src="{{ asset('vendor/datatables/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('js/datatables.init.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#table2021').DataTable();
        });
    </script>
@endpush

@section('content')
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body" style="overflow-x: scroll">
                <h5 class="card-title">Dokumen 2021</h5>
                @canany(['super-admin', 'admin-pkn'])
                    <a href="{{ route('dokumen2021.create') }}" class="btn btn-primary mb-3"><i class="bi bi-plus me-1"></i>
                        Tambah Dokumen</a>
                @endcanany
                <div class="datatable-wrapper datatable-loading no-footer sortable searchable fixed-columns">
                    <div class="datatable-container">
                        <table class="table datatable datatable-table table-bordered table-hover" id="table2021">
                            <thead>
                                <tr class="table-primary table-bordered">
                                    <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">No</th>
                                    <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Satker
                                    </th>
                                    <th class="text-nowrap text-center align-middle" scope="col" colspan="2">
                                        Surat Masuk
                                    </th>
                                    <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Tanggal
                                        Surat Diterima</th>
                                    <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Jenis
                                        Persetujuan
                                    </th>
                                    <th class="text-nowrap text-center align-middle" scope="col" colspan="2">ND
                                        Permohonan Penilaian</th>
                                    <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Total Hari</th>
                                    <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Status Progress
                                    </th>
                                    <th class="text-nowrap text-center align-middle" scope="col" rowspan="2">Aksi</th>
                                </tr>
                                <tr class="table-primary">
                                    <th scope="col" class="text-nowrap text-center align-middle" data-sortable="true"
                                        style="width: 7.83289817232376%;">Nomor</th>
                                    <th scope="col" class="text-nowrap text-center align-middle" data-sortable="true"
                                        style="width: 7.83289817232376%;">Tanggal</th>
                                    <th scope="col" class="text-nowrap text-center align-middle" data-sortable="true"
                                        style="width: 7.83289817232376%;">Nomor</th>
                                    <th scope="col" class="text-nowrap text-center align-middle" data-sortable="true"
                                        style="width: 7.83289817232376%;">Tanggal</th>
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
        </div>
    </div>
@endsection
