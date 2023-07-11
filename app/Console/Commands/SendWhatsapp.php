<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class SendWhatsapp extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:whatsapp';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Perintah untuk mengirimkan pesan whatsapp';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $scheduledUsers = User::where('isChatted', false)
            ->where('expire_date', '<', now())->get();

        $curl = curl_init();

        if ($scheduledUsers->isNotEmpty()) {
            foreach ($scheduledUsers as $user) {
                curl_setopt($curl, CURLOPT_POSTFIELDS, array(
                    'target' => $user->phone_number,
                    'message' => "Halo $user->name.
                                Perkenalkan saya Rara dari Tim Bangkit.

                                Kami sudah mengirimkan tawaran penerimaan di akun Kampus Merdeka Anda.
                                Terima tawaran tersebut sekarang juga untuk menjadi peserta Bangkit 2023 Batch 2.

                                Note: Tawaran tersebut memiliki kedaluwarsa jika Anda tidak menerimanya segera.

                                Mohon konfirmasi melalui pesan ini jika Anda tidak melanjutkan pendaftaran atau menolak penawaran dari kami.

                                Salam,
                                Bangkit Team",
                    'countryCode' => '62',
                ));

                curl_setopt_array($curl, array(
                    CURLOPT_URL => 'https://api.fonnte.com/send',
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => '',
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => 'POST',
                    CURLOPT_HTTPHEADER => array(
                        'Authorization: XWK289SI!@C2VfF!2T7!'
                    ),
                ));

                $response = curl_exec($curl);
                // User::where('id', $user->id)
                //     ->update(['isChatted' => true]);

                $this->info($response);
            }
        } else {
            $this->info('Tidak ada pesan yang harus dikirim');
        }
    }
}
