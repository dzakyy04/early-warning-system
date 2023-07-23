<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('document2020s', function (Blueprint $table) {
            $table->id();
            $table->string('pejabat_pemohon');
            $table->string('satker');
            $table->string('nomor_whatsapp_satker');
            $table->string('nomor_surat_masuk');
            $table->date('tanggal_surat_masuk');
            $table->date('tanggal_surat_diterima');
            $table->string('hal_surat_masuk');
            $table->date('tanggal_penerimaan_dokumen_lengkap');
            $table->string('nomor_nd_permohonan_penilaian');
            $table->date('tanggal_nd_permohonan_penilaian');
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
            $table->string('nilai_proporsional_harga_perolehan_nilai_bmn');
            $table->string('nilai_buku_nilai_bmn');
            $table->string('nilai_limit_nilai_bmn');
            $table->string('nilai_persetujuan');
            $table->integer('periode_sewa')->nullable();
            $table->string('penyewa');
            $table->string('total_nilai_sewa');
            $table->string('sop');
            $table->string('keterangan');
            $table->integer('usulan_sebelum_jatuh_tempo');
            $table->date('usulan_sewa_kembali');
            $table->foreignId('conceptor_id')->constrained();
            $table->string('nomor_laporan_satker');
            $table->date('tanggal_laporan_satker');
            $table->string('realisasi_rupiah');
            $table->string('realisasi_ntpn');
            $table->string('status_masa_aktif');
            $table->json('progress')->default(json_encode([
                'progress_masuk' => ['value' => 0, 'status' => false],
                'progress_dinilai' => ['value' => 0, 'status' => false],
                'progress_selesai' => ['value' => 0, 'status' => false],
            ]));
            $table->integer('total_hari')->virtualAs(
                "JSON_UNQUOTE(JSON_EXTRACT(progress, '$.progress_masuk.value')) +
                JSON_UNQUOTE(JSON_EXTRACT(progress, '$.progress_dinilai.value')) +
                JSON_UNQUOTE(JSON_EXTRACT(progress, '$.progress_selesai.value'))"
            );
            $table->string('status_progress');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document2020s');
    }
};
