@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-5">
                <div class="steps">
                    <div class="steps-header">
                        <div class="progress">
                            <div class="progress-bar" role="progressbar" aria-valuemin="0" aria-valuemax="100"
                                style="width: {{ $progress->progress_selesai->isCompleted ? 100 : ($progress->progress_dinilai->isCompleted ? 66.7 : ($progress->progress_masuk->isCompleted ? 33.3 : 0)) }}%;">
                            </div>
                        </div>
                    </div>
                    <div class="steps-body">
                        
                        {{-- Dokumen masuk --}}
                        <div class="step {{ $progress->progress_masuk->isCompleted ? 'step-completed' : '' }}">
                            @if ($progress->progress_masuk->isCompleted)
                                <span class="step-indicator">
                                    <i class="bi bi-check-lg"></i>
                                </span>
                            @endif
                            <span class="step-icon">
                                <i class="bi bi-1-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen masuk</div>
                        </div>

                        {{-- Dokumen dinilai --}}
                        <div class="step {{ $progress->progress_dinilai->isCompleted ? 'step-completed' : '' }}">
                            @if ($progress->progress_dinilai->isCompleted)
                                <span class="step-indicator">
                                    <i class="bi bi-check-lg"></i>
                                </span>
                            @endif
                            <span class="step-icon">
                                <i class="bi bi-2-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen dinilai</div>
                        </div>

                        {{-- Dokumen selesai --}}
                        <div class="step {{ $progress->progress_selesai->isCompleted ? 'step-completed' : '' }}">
                            <span class="step-icon">
                                <i class="bi bi-3-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen selesai</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @canany(['super-admin', 'admin-pkn'])
            @if ($document->tanggal_nd_permohonan_penilaian == null || $document->nomor_nd_permohonan_penilaian == null)
                <div class="col-lg-12">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-circle me-1"></i> Haloo <strong>{{ Auth::user()->role }}</strong> Silahkan
                        lengkapi data pokok terlebih dahulu 😄
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif
        @endcanany

        {{-- Data surat masuk --}}
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
                                            name="satker" id="floatingName" placeholder=" " value="{{ $document->satker }}"
                                            {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
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
                                            name="nomor_surat_masuk" id="floatingName" placeholder=" "
                                            value="{{ $document->nomor_surat_masuk }}"
                                            {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
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
                                            name="tanggal_surat_masuk" id="floatingName" placeholder=" "
                                            value="{{ $document->tanggal_surat_masuk }}"
                                            {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
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
                                            name="tanggal_surat_diterima" id="floatingName" placeholder=" "
                                            value="{{ $document->tanggal_surat_diterima }}"
                                            {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                        <label for="floatingName">Tanggal Surat Diterima</label>
                                        @error('tanggal_surat_diterima')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('jenis_persetujuan') is-invalid @enderror"
                                            name="jenis_persetujuan" id="floatingSelect" aria-label="State"
                                            {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                            <option value="" disabled selected>Pilih Jenis Persetujuan
                                            </option>
                                            <option value="sewa"
                                                {{ $document->jenis_persetujuan === 'sewa' ? 'selected' : '' }}>Sewa
                                            </option>
                                            <option value="penjualan"
                                                {{ $document->jenis_persetujuan === 'penjualan' ? 'selected' : '' }}>
                                                Penjualan
                                            </option>
                                            <option value="penghapusan"
                                                {{ $document->jenis_persetujuan === 'penghapusan' ? 'selected' : '' }}>
                                                Penghapusan</option>
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
                                            name="nomor_nd_permohonan_penilaian" id="floatingName" placeholder=" "
                                            value="{{ $document->nomor_nd_permohonan_penilaian }}"
                                            {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
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
                                            name="tanggal_nd_permohonan_penilaian" id="floatingName" placeholder=" "
                                            value="{{ $document->tanggal_nd_permohonan_penilaian }}"
                                            {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                        <label for="floatingName">Tanggal ND Permohonan Penilaian</label>
                                        @error('tanggal_nd_permohonan_penilaian')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-floating mb-3">
                                        <select class="form-select @error('conceptor_id') is-invalid @enderror"
                                            name="conceptor_id" id="floatingSelect" aria-label="State"
                                            {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                            @foreach ($conceptors as $conceptor)
                                                <option value="{{ $conceptor->id }}" @selected($conceptor->id == $document->conceptor->id)>
                                                    {{ $conceptor->nama }}</option>
                                            @endforeach
                                        </select>
                                        <label for="floatingSelect">Konseptor</label>
                                        @error('conceptor_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data penyampaian penilaian --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Masukkan data penyampaian penilaian</h5>
                    <div class="col-md-12">
                        <div class="row">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('nomor_nd_permohonan_penilaian') is-invalid @enderror"
                                        name="nomor_nd_permohonan_penilaian" id="floatingName" placeholder=" "
                                        {{ Auth::user()->role == 'Admin Pkn' ? 'disabled' : '' }}>
                                    <label for="floatingName">Nomor NDR Penyampaian Penilaian</label>
                                    @error('nomor_nd_permohonan_penilaian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date"
                                        class="form-control @error('tanggal_nd_permohonan_penilaian') is-invalid @enderror"
                                        name="tanggal_nd_permohonan_penilaian" id="floatingName" placeholder=" "
                                        {{ Auth::user()->role == 'Admin Pkn' ? 'disabled' : '' }}>
                                    <label for="floatingName">Tanggal NDR Penyampaian Penilaian</label>
                                    @error('tanggal_nd_permohonan_penilaian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- Data penyelesaian dokumen --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Masukkan data penyelesaian dokumen</h5>
                    <div class="col-md-12">
                        <div class="row">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('nomor_surat_persetujuan_penolakan') is-invalid @enderror"
                                        name="nomor_surat_persetujuan_penolakan" id="floatingName" placeholder=" "
                                        {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                    <label for="floatingName">Nomor Surat Persetujuan</label>
                                    @error('nomor_surat_persetujuan_penolakan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="date"
                                        class="form-control @error('tanggal_surat_persetujuan_penolakan') is-invalid @enderror"
                                        name="tanggal_surat_persetujuan_penolakan" id="floatingName" placeholder=" "
                                        {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                    <label for="floatingName">Tanggal Surat Persetujuan</label>
                                    @error('tanggal_surat_persetujuan_penolakan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('nilai_proporsional_harga_perolehan_nilai_bmn') is-invalid @enderror"
                                        name="nilai_proporsional_harga_perolehan_nilai_bmn" id="floatingName"
                                        placeholder=" "
                                        {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                    <label for="floatingName">Nilai Proporsional Harga Perolahan</label>
                                    @error('nilai_proporsional_harga_perolehan_nilai_bmn')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="text"
                                        class="form-control @error('nilai_persetujuan') is-invalid @enderror"
                                        name="nilai_persetujuan" id="floatingName" placeholder=" "
                                        {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                    <label for="floatingName">Nilai Persetujuan</label>
                                    @error('nilai_persetujuan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-floating mb-3">
                                    <input type="number"
                                        class="form-control @error('periode_sewa') is-invalid @enderror"
                                        name="periode_sewa" id="floatingName" placeholder=" "
                                        {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled' }}>
                                    <label for="floatingName">Periode Sewa</label>
                                    @error('periode_sewa')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-end">
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
@endsection
