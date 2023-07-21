@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="steps">
                    <div class="steps-header">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" style="width: 33.3%" aria-valuenow="40"
                                aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    <div class="steps-body">
                        {{-- Dokumen masuk --}}
                        <div class="step step-completed" data-bs-toggle="modal" data-bs-target="#stepOne">
                            <span class="step-indicator">
                                <i class="bi bi-check-lg"></i>
                            </span>
                            <span class="step-icon">
                                <i class="bi bi-1-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen masuk</div>
                        </div>
                        {{-- Dokumen dinilai --}}
                        <div class="step step-active" data-bs-toggle="modal" data-bs-target="#stepTwo">
                            <span class="step-indicator">
                                <i class="bi bi-check-lg"></i>
                            </span>
                            <span class="step-icon">
                                <i class="bi bi-2-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen dinilai</div>
                        </div>
                        {{-- Dokumen selesai --}}
                        <div class="step" data-bs-toggle="modal" data-bs-target="#stepThree">
                            <span class="step-indicator">
                                <i class="bi bi-check-lg"></i>
                            </span>
                            <span class="step-icon">
                                <i class="bi bi-3-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen selesai</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Masukkan data surat masuk</h5>
                    <div class="col-md-12">
                        <div class="row">
                            <form method="post" action="" class="row">
                                @csrf
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control @error('satker') is-invalid @enderror"
                                            name="satker" id="floatingName" placeholder=" ">
                                        <label for="floatingName">Satker</label>
                                        @error('satker')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nomor_surat_masuk') is-invalid @enderror"
                                            name="nomor_surat_masuk" id="floatingName" placeholder=" ">
                                        <label for="floatingName">Nomor Surat Masuk</label>
                                        @error('nomor_surat_masuk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date"
                                            class="form-control @error('tanggal_surat_masuk') is-invalid @enderror"
                                            name="tanggal_surat_masuk" id="floatingName" placeholder=" ">
                                        <label for="floatingName">Tanggal Surat Masuk</label>
                                        @error('tanggal_surat_masuk')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date"
                                            class="form-control @error('tanggal_surat_diterima') is-invalid @enderror"
                                            name="tanggal_surat_diterima" id="floatingName" placeholder=" ">
                                        <label for="floatingName">Tanggal Surat Diterima</label>
                                        @error('tanggal_surat_diterima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('jenis_persetujuan') is-invalid @enderror"
                                            name="jenis_persetujuan" id="floatingSelect" aria-label="State">
                                            <option selected>Pilih Jenis Persetujuan</option>
                                            <option value="sewa">Sewa</option>
                                            <option value="penjualan">Penjualan</option>
                                            <option value="penghapusan">Penghapusan</option>
                                        </select>
                                        <label for="floatingSelect">Jenis Persetujuan</label>
                                        @error('jenis_persetujuan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="text"
                                            class="form-control @error('nomor_nd_permohonan_penilaian') is-invalid @enderror"
                                            name="nomor_nd_permohonan_penilaian" id="floatingName" placeholder=" ">
                                        <label for="floatingName">Nomor ND Permohonan Penilaian</label>
                                        @error('nomor_nd_permohonan_penilaian')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <input type="date"
                                            class="form-control @error('tanggal_nd_permohonan_penilaian') is-invalid @enderror"
                                            name="tanggal_nd_permohonan_penilaian" id="floatingName" placeholder=" ">
                                        <label for="floatingName">Tanggal ND Permohonan Penilaian</label>
                                        @error('tanggal_nd_permohonan_penilaian')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('conceptor_id') is-invalid @enderror"
                                            name="conceptor_id" id="floatingSelect" aria-label="State">
                                            <option selected disabled>Pilih Konseptor</option>
                                            @foreach ($conceptors as $conceptor)
                                                <option value="{{ $conceptor->id }}">{{ $conceptor->nama }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Konseptor</label>
                                        @error('conceptor_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="text-end">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
