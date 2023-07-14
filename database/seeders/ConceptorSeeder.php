<?php

namespace Database\Seeders;

use App\Models\Conceptor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ConceptorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Conceptor::create([
            'nama' => 'Agung',
            'no_whatsapp' => '085740319698',
        ]);

        Conceptor::create([
            'nama' => 'Yanto',
            'no_whatsapp' => '085788888888',
            
        ]);

        Conceptor::create([
            'nama' => 'Wiyana',
            'no_whatsapp' => '085711111111',
        ]);

        Conceptor::create([
            'nama' => 'Abdul Rohman',
            'no_whatsapp' => '085722222222',
        ]);

        Conceptor::create([
            'nama' => 'Maman',
            'no_whatsapp' => '085733333333',
        ]);
    }
}
