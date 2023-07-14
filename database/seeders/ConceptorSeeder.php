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
            'nama' => 'Agung'
        ]);

        Conceptor::create([
            'nama' => 'Yanto'
        ]);

        Conceptor::create([
            'nama' => 'Wiyana'
        ]);

        Conceptor::create([
            'nama' => 'Abdul Rohman'
        ]);

        Conceptor::create([
            'nama' => 'Maman'
        ]);
    }
}
