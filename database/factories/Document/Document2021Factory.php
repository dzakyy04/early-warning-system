<?php

namespace Database\Factories\Document;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Document\Document2021>
 */
class Document2021Factory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pejabat_pemohon' => $this->faker->name,
            'satker' => $this->faker->company,
            'nomor_whatsapp_satker' => $this->faker->randomElement(['082269324126', '089660168080', '081368798772']),
            'nomor_surat_masuk' => $this->faker->unique()->numerify('#####'),
            'tanggal_surat_masuk' => $this->faker->date(),
            'tanggal_surat_diterima' => $this->faker->date(),
            'hal_surat_masuk' => $this->faker->sentence,
            'tanggal_penerimaan_dokumen_lengkap' => $this->faker->date(),
            'nomor_nd_permohonan_penilaian' => $this->faker->unique()->numerify('#####'),
            'tanggal_nd_permohonan_penilaian' => $this->faker->date(),
            'nomor_ndr_penilaian' => $this->faker->unique()->numerify('#####'),
            'tanggal_ndr_diterima_penilaian' => $this->faker->date(),
            'jenis_persetujuan' => $this->faker->randomElement(['Penjualan', 'Pemusnahan/Penghapusan', 'Sewa']),
            'nomor_surat_persetujuan_penolakan' => $this->faker->unique()->numerify('#####'),
            'tanggal_surat_persetujuan_penolakan' => $this->faker->date(),
            'hal_surat_persetujuan_penolakan' => $this->faker->sentence,
            'rincian_bmn' => $this->faker->sentence,
            'link_file' => $this->faker->url,
            'luas_tanah_keseluruhan' => $this->faker->randomNumber(4),
            'nilai_tanah_keseluruhan' => $this->faker->randomNumber(9),
            'nilai_proporsional_harga_perolehan_nilai_bmn' => $this->faker->randomNumber(9),
            'nilai_buku_nilai_bmn' => $this->faker->randomNumber(9),
            'nilai_limit_nilai_bmn' => $this->faker->randomNumber(9),
            'nilai_persetujuan' => $this->faker->randomNumber(9),
            'penyewa' => $this->faker->name,
            'total_nilai_sewa' => $this->faker->randomNumber(9),
            'sop' => $this->faker->word,
            'keterangan' => $this->faker->sentence,
            'usulan_sebelum_jatuh_tempo' => $this->faker->randomNumber(2),
            'usulan_sewa_kembali' => $this->faker->date(),
            'conceptor_id' => rand(1, 5),
            'nomor_laporan_satker' => $this->faker->unique()->numerify('#####'),
            'tanggal_laporan_satker' => $this->faker->date(),
            'realisasi_rupiah' => $this->faker->randomNumber(9),
            'realisasi_ntpn' => $this->faker->unique()->numerify('#####'),
            'status_masa_aktif' => $this->faker->randomElement(['Aktif', 'Nonaktif', 'Tenggang']),
            'status_progress' => $this->faker->randomElement(['Diproses', 'Selesai']),
            'progress' => json_encode([
                'progress_masuk' => ['value' => rand(0,3), 'status' => $this->faker->boolean()],
                'progress_dinilai' => ['value' => rand(0,15), 'status' => $this->faker->boolean()],
                'progress_selesai' => ['value' => rand(0,4), 'status' => $this->faker->boolean()],
            ]),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
