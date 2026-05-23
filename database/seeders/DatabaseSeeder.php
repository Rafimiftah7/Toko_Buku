<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed user admin
        User::firstOrCreate(
            ['email' => 'admin@tokobuku.com'],
            [
                'name'     => 'Administrator Toko',
                'email'    => 'admin@tokobuku.com',
                'password' => Hash::make('admin123'),
                'role'     => 'admin',
            ]
        );

        // Seed user customer demo
        User::firstOrCreate(
            ['email' => 'customer@tokobuku.com'],
            [
                'name'     => 'Agus Santoso',
                'email'    => 'customer@tokobuku.com',
                'password' => Hash::make('customer123'),
                'role'     => 'customer',
            ]
        );

        // Seed kategori dan buku
        $this->call([
            KategoriSeeder::class,
            BukuSeeder::class,
        ]);
    }
}
