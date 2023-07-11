<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('data2021s', function (Blueprint $table) {
            $table->id();
            $table->string('pejabat_pemohon');
            $table->string('satker_lokasi_bmn');
            $table->string('nomor_surat_masuk');
            $table->date('tanggal_surat_masuk');
            $table->string('hal_surat_masuk');
            $table->date('tanggal_penerimaan_dokumen_lengkap');
            $table->string('nomor_ndr_penilaian');
            $table->date('tanggal_ndr_diterima_penilaian');
            $table->string('jenis_persetujuan');
            $table->string('nomor_surat_persetujuan_penolakan');
            $table->date('tanggal_surat_persetujuan_penolakan');
            $table->string('hal_surat_persetujuan_penolakan');
            $table->string('rincian_bmn');
            $table->string('link_file');
            $table->string('luas_tanah_keseluruhan');
            $table->string('nilai_tanah_keseluruhan');
            $table->string('harga_perolehan_nilai_bmn');
            $table->string('nilai_buku_nilai_bmn');
            $table->string('nilai_limit_nilai_bmn');
            $table->integer('periode_sewa');
            $table->string('penyewa');
            $table->string('total_nilai_sewa');
            $table->string('sop');
            $table->string('keterangan');
            $table->integer('usulan_sebelum_jatuh_tempo');
            $table->date('usulan_sewa_kembali');
            $table->foreignId('konseptor_id')->constrained();
            $table->string('nomor_laporan_satker');
            $table->date('tanggal_laporan_satker');
            $table->string('realisasi_rupiah');
            $table->string('realisasi_ntpn');
            $table->string('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data2021s');
    }
};