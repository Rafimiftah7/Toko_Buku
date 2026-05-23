<?php

namespace Database\Seeders;

use App\Models\Kategori;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Data awal Kategori Buku — sesuai data dari server.ts
     */
    public function run(): void
    {
        $kategori = [
            ['nama_kategori' => 'Semua',      'slug' => 'all',         'icon' => 'BookOpen', 'deskripsi' => 'Semua koleksi buku'],
            ['nama_kategori' => 'eBooks',     'slug' => 'ebooks',      'icon' => 'Smartphone', 'deskripsi' => 'Buku digital yang bisa dibaca di HP atau tablet'],
            ['nama_kategori' => 'Terbaru',    'slug' => 'new',         'icon' => 'Sparkles',   'deskripsi' => 'Sari rilis terbaru bulan ini'],
            ['nama_kategori' => 'Fiksi',      'slug' => 'fiction',     'icon' => 'Feather',    'deskripsi' => 'Novel fiksi ilmiah, roman, dan drama'],
            ['nama_kategori' => 'Manga',      'slug' => 'manga',       'icon' => 'Layers',     'deskripsi' => 'Komik bergaya Jepang dengan kisah petualangan seru'],
            ['nama_kategori' => 'Fantasi',    'slug' => 'fantasy',     'icon' => 'Flame',      'deskripsi' => 'Kisah fantasi epik dengan naga, sihir, dan dunia mistis'],
            ['nama_kategori' => 'Bestseller', 'slug' => 'bestsellers', 'icon' => 'Award',      'deskripsi' => 'Koleksi buku paling laku dan direkomendasikan'],
            ['nama_kategori' => 'Klasik',     'slug' => 'classics',    'icon' => 'Bookmark',   'deskripsi' => 'Karya literatur klasik abadi sepanjang masa'],
        ];

        foreach ($kategori as $kat) {
            Kategori::firstOrCreate(['slug' => $kat['slug']], $kat);
        }
    }
}
