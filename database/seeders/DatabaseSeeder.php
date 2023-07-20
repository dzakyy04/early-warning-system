<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Database\Seeders\Document\Document2021Seeder;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'name' => 'Kiagus Efan Fitriyan',
            'email' => 'superadmin@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Super Admin',
        ]);

        User::create([
            'name' => 'Iman Carrazi Syamsidi',
            'email' => 'adminpkn@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Admin Pkn',
        ]);

        User::create([
            'name' => 'Iman Carrazi Syamsidi',
            'email' => 'adminpenilai@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Admin Penilai',
        ]);

        $this->call([
            ConceptorSeeder::class,
            DocumentSeeder::class,
            HolidaySeeder::class,
            Document2021Seeder::class,
        ]);
    }
}
