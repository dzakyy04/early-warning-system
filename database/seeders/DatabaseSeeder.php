<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::factory()->create([
            'name' => 'Iman',
            'email' => 'iman@example.com',
            'phone_number' => '081368798772',
            'expire_date' => now(),
        ]);

        User::factory()->create([
            'name' => 'Dzaky',
            'email' => 'dzaky@example.com',
            'phone_number' => '082269324126',
            'expire_date' => now(),
        ]);
    }
}
