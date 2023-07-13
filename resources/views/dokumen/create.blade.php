@extends('layouts.app')

@section('content')
    <div class="container pb-5 mb-sm-4">
        <!-- Progress-->
        <div class="steps">
            <div class="steps-header">
                <div class="progress">
                    <div class="progress-bar" role="progressbar" style="width: 33.3%" aria-valuenow="40" aria-valuemin="0"
                        aria-valuemax="100"></div>
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


        {{-- Modal dokumen masuk --}}
        <div class="modal fade" id="stepOne" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="stepOneLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="stepOneLabel">Dokumen Masuk</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="satker" name="satker"
                                    placeholder="Masukkan satker">
                                <label for="satker">Satker</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nomor_surat_masuk" name="nomor_surat_masuk"
                                    placeholder="Masukkan nomor surat masuk">
                                <label for="nomor_surat_masuk">Nomor surat masuk</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal_surat_masuk"
                                    name="tanggal_surat_masuk" placeholder="Masukkan tanggal surat masuk">
                                <label for="tanggal_surat_masuk">Tanggal surat masuk</label>
                            </div>
                            <div class="form-floating mb-3">
                                <select class="form-select" aria-label="Default select example">
                                    <option selected>Pilih jenis persetujuan</option>
                                    <option value="pemusnahan/penghapusan">Pemusnahan/Penghapusan</option>
                                    <option value="penjualan">Penjualan</option>
                                    <option value="sewa">Sewa</option>
                                </select>
                                <label for="jenis_surat_masuk">Jenis persetujuan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nomor_nd_permohonan_penilaian"
                                    name="nomor_nd_permohonan_penilaian"
                                    placeholder="Masukkan nomor nd permohonan penilaian">
                                <label for="nomor_nd_permohonan_penilaian">Nomor ND permohonan penilaian</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal_nd_permohonan_penilaian"
                                    name="tanggal_nd_permohonan_penilaian"
                                    placeholder="Masukkan tanggal nd permohonan penilaian">
                                <label for="tanggal_nd_permohonan_penilaian">Tanggal ND permohonan penilaian</label>
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
        {{-- Modal dokumen dinilai --}}
        <div class="modal fade" id="stepTwo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="stepTwoLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="stepTwoLabel">Penilaian dokumen</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nomor_ndr_penilaian"
                                    name="nomor_ndr_penilaian" placeholder="Masukkan nomor_ndr_penilaian">
                                <label for="nomor_ndr_penilaian">Nomor NDR penilaian</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="date" class="form-control" id="tanggal_ndr_diterima_penilaian"
                                    name="tanggal_ndr_diterima_penilaian"
                                    placeholder="Masukkan tanggal_ndr_diterima_penilaian">
                                <label for="tanggal_ndr_diterima_penilaian">Tanggal NDR diterima penilaian</label>
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
        {{-- Modal dokumen selesai --}}
        <div class="modal fade" id="stepThree" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="stepThreeLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="stepThreeLabel">Dokumen selesai</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="" method="post">
                        <div class="modal-body">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nomor_surat_persetujuan_penolakan"
                                    name="nomor_surat_persetujuan_penolakan"
                                    placeholder="Masukkan Nomor Surat Persetujuan/Penolakan">
                                <label for="nomor_surat_persetujuan_penolakan">Nomor Surat Persetujuan/Penolakan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="tanggal_surat_persetujuan_penolakan"
                                    name="tanggal_surat_persetujuan_penolakan"
                                    placeholder="Masukkan Tanggal Surat Persetujuan/Penolakan">
                                <label for="tanggal_surat_persetujuan_penolakan">Tanggal Surat
                                    Persetujuan/Penolakan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control"
                                    id="nilai_proporsional_harga_perolehan_nilai_bmn"
                                    name="nilai_proporsional_harga_perolehan_nilai_bmn"
                                    placeholder="Masukkan Nilai Proporsional Harga Perolehan">
                                <label for="nilai_proporsional_harga_perolehan_nilai_bmn">Nilai Proporsional Harga
                                    Perolehan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nilai_persetujuan"
                                    name="nilai_persetujuan" placeholder="Masukkan Nilai Persetujuan">
                                <label for="nilai_persetujuan">Nilai Persetujuan</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="number" class="form-control" id="periode_sewa"
                                    name="periode_sewa" placeholder="Masukkan periode sewa" min="1">
                                <label for="periode_sewa">Masukkan Periode Sewa</label>
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
        <!-- Footer-->
        <div class="d-sm-flex flex-wrap justify-content-between align-items-center text-center pt-4">
            <div class="custom-control custom-checkbox mt-2 mr-3">

            </div><a class="btn btn-primary btn-sm mt-2" href="#order-details" data-toggle="modal">View Order Details</a>
        </div>
    </div>
@endsection
