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
            $table->string('pejabat_pemohon')->nullable();
            $table->string('satker');
            $table->string('nomor_whatsapp_satker');
            $table->string('nomor_surat_masuk');
            $table->date('tanggal_surat_masuk');
            $table->date('tanggal_surat_diterima');
            $table->string('hal_surat_masuk')->nullable();
            $table->date('tanggal_penerimaan_dokumen_lengkap');
            $table->string('nomor_nd_permohonan_penilaian')->nullable();
            $table->date('tanggal_nd_permohonan_penilaian')->nullable();
            $table->string('nomor_ndr_penilaian')->nullable();
            $table->date('tanggal_ndr_diterima_penilaian')->nullable();
            $table->string('jenis_persetujuan');
            $table->string('nomor_surat_persetujuan_penolakan')->nullable();
            $table->date('tanggal_surat_persetujuan_penolakan')->nullable();
            $table->string('hal_surat_persetujuan_penolakan')->nullable();
            $table->string('rincian_bmn')->nullable();
            $table->string('link_file')->nullable();
            $table->string('luas_tanah_keseluruhan')->nullable();
            $table->string('nilai_tanah_keseluruhan')->nullable();
            $table->string('nilai_proporsional_harga_perolehan_nilai_bmn')->nullable();
            $table->string('nilai_buku_nilai_bmn')->nullable();
            $table->string('nilai_limit_nilai_bmn')->nullable();
            $table->string('nilai_persetujuan')->nullable();
            $table->integer('periode_sewa')->nullable();
            $table->string('penyewa')->nullable();
            $table->string('total_nilai_sewa')->nullable();
            $table->string('sop')->nullable();
            $table->string('keterangan')->nullable();
            $table->integer('usulan_sebelum_jatuh_tempo')->nullable();
            $table->date('usulan_sewa_kembali')->nullable();
            $table->foreignId('conceptor_id')->constrained();
            $table->string('nomor_laporan_satker')->nullable();
            $table->date('tanggal_laporan_satker')->nullable();
            $table->string('realisasi_rupiah')->nullable();
            $table->string('realisasi_ntpn')->nullable();
            $table->string('status_masa_aktif');
            $table->json('progress')->default(json_encode([
                'progress_masuk' => ['day' => 0, 'isCompleted' => false],
                'progress_dinilai' => ['day' => 0, 'isCompleted' => false],
                'progress_selesai' => ['day' => 0, 'isCompleted' => false],
            ]));
            $table->integer('total_hari')->virtualAs(
                "JSON_UNQUOTE(JSON_EXTRACT(progress, '$.progress_masuk.day')) +
                JSON_UNQUOTE(JSON_EXTRACT(progress, '$.progress_dinilai.day')) +
                JSON_UNQUOTE(JSON_EXTRACT(progress, '$.progress_selesai.day'))"
            );
            $table->string('status_progress')->virtualAs(
                "CASE WHEN JSON_UNQUOTE(JSON_EXTRACT(progress, '$.progress_selesai.isCompleted')) = 'true' THEN 'Selesai' ELSE 'Diproses' END"
            );
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
