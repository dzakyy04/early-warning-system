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
                        <div class="step step-completed">
                            <span class="step-indicator">
                                <i class="bi bi-check-lg"></i>
                            </span>
                            <span class="step-icon">
                                <i class="bi bi-1-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen masuk</div>
                        </div>
                        {{-- Dokumen dinilai --}}
                        <div class="step step-active">
                            <span class="step-icon">
                                <i class="bi bi-2-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen dinilai</div>
                        </div>
                        {{-- Dokumen selesai --}}
                        <div class="step">
                            <span class="step-icon">
                                <i class="bi bi-3-circle fs-3"></i>
                            </span>
                            <div class="mt-4">Dokumen selesai</div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

        @if(Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin')
        <div class="col-lg-12">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="bi bi-exclamation-circle me-1"></i> Haloo <strong>{{ Auth::user()->role }}</strong> Silahkan masukkan data pokok terlebih dahulu!
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
        </div>            
        @endif
        


    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Masukkan data surat masuk @if (Auth::user()->role != 'Admin Pkn' && Auth::user()->role != 'Super Admin')
                    <i class="bi bi-lock-fill ml-2"></i>
                @endif</h5>
                <div class="col-md-12">
                    <div class="row">
                        <form method="post" action="" class="row">
                            @csrf
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <input type="text" class="form-control @error('satker') is-invalid @enderror"
                                        name="satker" id="floatingName" placeholder=" " value="{{ $dokumen->satker }}" {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
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
                                        value="{{ $dokumen->nomor_surat_masuk }}" {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
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
                                        value="{{ $dokumen->tanggal_surat_masuk }}" {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
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
                                        value="{{ $dokumen->tanggal_surat_diterima }}" {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                    <label for="floatingName">Tanggal Surat Diterima</label>
                                    @error('tanggal_surat_diterima')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select @error('jenis_persetujuan') is-invalid @enderror"
                                        name="jenis_persetujuan" id="floatingSelect" aria-label="State" {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                        <option value="" disabled selected>Pilih Jenis Persetujuan
                                        </option>
                                        <option value="sewa"
                                            {{ $dokumen->jenis_persetujuan === 'sewa' ? 'selected' : '' }}>Sewa
                                        </option>
                                        <option value="penjualan"
                                            {{ $dokumen->jenis_persetujuan === 'penjualan' ? 'selected' : '' }}>
                                            Penjualan
                                        </option>
                                        <option value="penghapusan"
                                            {{ $dokumen->jenis_persetujuan === 'penghapusan' ? 'selected' : '' }}>
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
                                        value="{{ $dokumen->nomor_nd_permohonan_penilaian }}" {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
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
                                        value="{{ $dokumen->tanggal_nd_permohonan_penilaian }}" {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                    <label for="floatingName">Tanggal ND Permohonan Penilaian</label>
                                    @error('tanggal_nd_permohonan_penilaian')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-floating mb-3">
                                    <select class="form-select @error('conceptor_id') is-invalid @enderror"
                                        name="conceptor_id" id="floatingSelect" aria-label="State" {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                        @foreach ($conceptors as $conceptor)
                                            <option value="{{ $conceptor->id }}" @selected($conceptor->id == $dokumen->conceptor->id)>
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
                                    name="nomor_nd_permohonan_penilaian" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' ? 'disabled' : ''}}>
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
                                    name="tanggal_nd_permohonan_penilaian" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' ? 'disabled' : ''}}>
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
                                    name="nomor_surat_persetujuan_penolakan" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
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
                                    name="tanggal_surat_persetujuan_penolakan" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
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
                                    placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
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
                                    name="nilai_persetujuan" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                <label for="floatingName">Nilai Persetujuan</label>
                                @error('nilai_persetujuan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control @error('periode_sewa') is-invalid @enderror"
                                    name="periode_sewa" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
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

    @canany(['super-admin', 'admin-pkn'])
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Masukkan data rincian pokok</h5>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control @error('pejabat_pemohon') is-invalid @enderror"
                                    name="pejabat_pemohon" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                <label for="floatingName">Pejabat Pemohon</label>
                                @error('pejabat_pemohon')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control @error('hal_surat_masuk') is-invalid @enderror"
                                    name="hal_surat_masuk" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                <label for="floatingName">Hal Surat Masuk</label>
                                @error('hal_surat_masuk')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="date"
                                    class="form-control @error('tanggal_penerimaan_dokumen_lengkap') is-invalid @enderror"
                                    name="tanggal_penerimaan_dokumen_lengkap" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                <label for="floatingName">Tanggal Penerimaan Dokumen Lengkap</label>
                                @error('tanggal_penerimaan_dokumen_lengkap')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="text"
                                    class="form-control @error('hal_surat_persetujuan_penolakan') is-invalid @enderror"
                                    name="hal_surat_persetujuan_penolakan" id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                                <label for="floatingName">Hal Surat Persetujuan</label>
                                @error('hal_surat_persetujuan_penolakan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- data rincian --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Masukkan data rincian tambahan</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3"> 
                            <input type="text" class="form-control @error('rincian_bmn') is-invalid @enderror" name="rincian_bmn" id="floatingName"
                                placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Rincian BMN</label>
                            @error('rincian_bmn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('link_file') is-invalid @enderror" name="link_file" id="floatingName"
                                placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Link File</label>
                            @error('link_file')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('luas_tanah_keseluruhan') is-invalid @enderror" name="luas_tanah_keseluruhan"
                                id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Luas Tanah Keseluruhan</label>
                            @error('luas_tanah_keseluruhan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nilai_tanah_keseluruhan') is-invalid @enderror" name="nilai_tanah_keseluruhan"
                                id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Nilai Tanah Keseluruhan</label>
                            @error('nilai_tanah_keseluruhan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- data nilai bmn --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Masukkan data nilai barang milik negara (BMN) tambahan</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nilai_buku_nilai_bmn') is-invalid @enderror" name="nilai_buku_nilai_bmn"
                                id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Nilai Buku (Rp)</label>
                            @error('nilai_buku_nilai_bmn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nilai_limit_nilai_bmn') is-invalid @enderror" name="nilai_limit_nilai_bmn"
                                id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Nilai Limit (Rp)</label>
                            @error('nilai_limit_nilai_bmn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- data nilai sewa --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Masukkan data nilai sewa</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('penyewa') is-invalid @enderror" name="penyewa" id="floatingName"
                                placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Penyewa (Subjek dan Peruntukan)</label>
                            @error('penyewa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('total_nilai_sewa') is-invalid @enderror" name="total_nilai_sewa" id="floatingName"
                                placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Total Nilai Sewa</label>
                            @error('total_nilai_sewa')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- data keterangan lainnya --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Masukkan data keterangan lainnya</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('sop') is-invalid @enderror" name="sop" id="floatingName"
                                placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">SOP</label>
                            @error('sop')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="floatingName"
                                placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Keterangan</label>
                            @error('keterangan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="number" class="form-control @error('usulan_sebelum_jatuh_tempo') is-invalid @enderror" name="usulan_sebelum_jatuh_tempo"
                                id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Usulan Sebelum Jatuh Tempo</label>
                            @error('usulan_sebelum_jatuh_tempo')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control @error('usulan_sewa_kembali') is-invalid @enderror" name="usulan_sewa_kembali"
                                id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Usulan Sewa Kembali</label>
                            @error('usulan_sewa_kembali')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- data laporan satker --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Masukkan data laporan satker</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('nomor_laporan_satker') is-invalid @enderror" name="nomor_laporan_satker"
                                id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Nomor</label>
                            @error('nomor_laporan_satker')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="date" class="form-control @error('tanggal_laporan_satker') is-invalid @enderror" name="tanggal_laporan_satker"
                                id="floatingName" placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Tanggal</label>
                            @error('tanggal_laporan_satker')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- data realisasi --}}
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Masukkan data realisasi</h5>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('realisasi_rupiah') is-invalid @enderror" name="realisasi_rupiah" id="floatingName"
                                placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">Rupiah</label>
                            @error('realisasi_rupiah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control @error('realisasi_ntpn') is-invalid @enderror" name="realisasi_ntpn" id="floatingName"
                                placeholder=" " {{ Auth::user()->role == 'Admin Pkn' || Auth::user()->role == 'Super Admin' ? '' : 'disabled'}}>
                            <label for="floatingName">NTPN</label>
                            @error('realisasi_ntpn')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endcanany
    
    <div class="text-end">
        <button type="submit" class="btn btn-primary">Simpan</button>
    </div>

    </form>
    </div>
@endsection
