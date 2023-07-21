<?php

namespace Database\Seeders\Document;

use App\Models\Document\Document2020;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Document2020Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document2020::factory(50)->create();
    }
}
