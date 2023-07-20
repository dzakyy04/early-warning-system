<?php

namespace Database\Seeders\Document;

use App\Models\Document\Document2021;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Document2021Seeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Document2021::factory(50)->create();
    }
}
