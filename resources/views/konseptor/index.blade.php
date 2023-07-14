@extends('layouts.app')

@section('content')
    <div class="col-lg-12">

        <div class="card">
            <div class="card-body" style="overflow-x: scroll">
                <h5 class="card-title">Konseptor</h5>
                <span class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#conceptorModal">
                    <i class="bi bi-plus me-1"></i> Tambah Konseptor
                </span>
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr class="table-primary">
                            <th class="text-nowrap text-center align-middle" scope="col">No</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Nama Konseptor</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Nomor Whatsapp</th>
                            <th class="text-nowrap text-center align-middle" scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($conceptors as $index => $conceptor)
                            <tr>
                                <th class="text-center" scope="row">{{ $index + 1 }}</th>
                                <td>{{ $conceptor->nama }}</td>
                                <td>{{ $conceptor->no_whatsapp }}</td>
                                <td class="text-nowrap text-center">
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

        {{-- Modal --}}
        <div class="modal fade" id="conceptorModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="conceptorModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="conceptorModalLabel">Tambah Konseptor</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('konseptor.store') }}" method="post">
                        @csrf
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama" name="nama"
                                    placeholder="Masukkan nama" required>
                                <label for="nama">Nama</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="no_whatsapp" name="no_whatsapp"
                                    placeholder="Masukkan no_whatsapp" required>
                                <label for="no_whatsapp">Nomor Whatsapp</label>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
