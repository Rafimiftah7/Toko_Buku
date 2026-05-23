<?php

namespace Database\Seeders;

use App\Models\Buku;
use App\Models\Kategori;
use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     * Data awal buku — sesuai data dari server.ts
     */
    public function run(): void
    {
        $fantasy   = Kategori::where('slug', 'fantasy')->first();
        $fiction   = Kategori::where('slug', 'fiction')->first();
        $classics  = Kategori::where('slug', 'classics')->first();
        $ebooks    = Kategori::where('slug', 'ebooks')->first();

        $bukuData = [
            [
                'judul'         => 'A Court of Thorns and Roses',
                'penulis'       => 'Sarah J. Maas',
                'kategori_id'   => $fantasy?->id,
                'deskripsi'     => 'Seret ke dalam dunia sihir berbahaya dari Fae. Feyre harus menavigasi cinta dan perang demi menyelamatkan kerajaannya.',
                'harga'         => 185000,
                'penerbit'      => 'Bloomsbury Publishing',
                'tahun_terbit'  => 2015,
                'stok'          => 15,
                'cover_color'   => 'linear-gradient(135deg, #f43f5e 0%, #fb923c 100%)',
                'is_bestseller' => true,
                'is_new'        => false,
            ],
            [
                'judul'         => 'A Court of Mist and Fury',
                'penulis'       => 'Sarah J. Maas',
                'kategori_id'   => $fantasy?->id,
                'deskripsi'     => 'Kelanjutan epik dari perjuangan Feyre yang kini memikul takdir baru di Pengadilan Malam (Night Court) bersama Rhysand.',
                'harga'         => 195000,
                'penerbit'      => 'Bloomsbury Publishing',
                'tahun_terbit'  => 2016,
                'stok'          => 20,
                'cover_color'   => 'linear-gradient(135deg, #0d9488 0%, #10b981 100%)',
                'is_bestseller' => true,
                'is_new'        => true,
            ],
            [
                'judul'         => 'Green on Green',
                'penulis'       => 'Dionne White',
                'kategori_id'   => $fiction?->id,
                'deskripsi'     => 'Sebuah narasi menyentuh tentang ritme alam, perubahan musim, dan ikatan kekeluargaan di daerah pedesaan yang asri.',
                'harga'         => 145000,
                'penerbit'      => 'Greenwillow Books',
                'tahun_terbit'  => 2020,
                'stok'          => 8,
                'cover_color'   => 'linear-gradient(135deg, #65a30d 0%, #84cc16 100%)',
                'is_bestseller' => false,
                'is_new'        => false,
            ],
            [
                'judul'         => 'Le Monde Aerien',
                'penulis'       => 'Arthur Miongin',
                'kategori_id'   => $classics?->id,
                'deskripsi'     => 'Petualangan fantastis melintasi kota-kota layang di atas awan, menyingkap misteri peradaban kuno yang hilang.',
                'harga'         => 168000,
                'penerbit'      => 'Gallimard',
                'tahun_terbit'  => 2018,
                'stok'          => 12,
                'cover_color'   => 'linear-gradient(135deg, #6366f1 0%, #a855f7 100%)',
                'is_bestseller' => false,
                'is_new'        => true,
            ],
            [
                'judul'         => 'Voroshilovgrad',
                'penulis'       => 'Sethly Zhadan',
                'kategori_id'   => $classics?->id,
                'deskripsi'     => 'Sebuah potret tajam, puitis, dan penuh petualangan tentang wilayah industri Ukraina timur serta nilai persahabatan sejati.',
                'harga'         => 155000,
                'penerbit'      => 'Deep Vellum Publishing',
                'tahun_terbit'  => 2010,
                'stok'          => 5,
                'cover_color'   => 'linear-gradient(135deg, #1e3a8a 0%, #3b82f6 100%)',
                'is_bestseller' => true,
                'is_new'        => false,
            ],
            [
                'judul'         => 'The Morris Classics',
                'penulis'       => 'Sarah J. Maas',
                'kategori_id'   => $ebooks?->id,
                'deskripsi'     => 'Kumpulan esai dan karya sastra antik dengan ilustrasi menawan dari era keemasan seni hias abad ke-19.',
                'harga'         => 130000,
                'penerbit'      => 'Classic House',
                'tahun_terbit'  => 2019,
                'stok'          => 2,
                'cover_color'   => 'linear-gradient(135deg, #b45309 0%, #f59e0b 100%)',
                'is_bestseller' => false,
                'is_new'        => false,
            ],
            [
                'judul'         => 'A Court of Wings and Ruin',
                'penulis'       => 'Sarah J. Maas',
                'kategori_id'   => $fantasy?->id,
                'deskripsi'     => 'Perang besar membayangi dunia Prythian. Feyre harus memutuskan siapa sekutu sejatinya di tengah pusaran pengkhianatan.',
                'harga'         => 210000,
                'penerbit'      => 'Bloomsbury Publishing',
                'tahun_terbit'  => 2017,
                'stok'          => 18,
                'cover_color'   => 'linear-gradient(135deg, #475569 0%, #64748b 100%)',
                'is_bestseller' => true,
                'is_new'        => false,
            ],
            [
                'judul'         => 'A Court of Frost and Starlight',
                'penulis'       => 'Sarah J. Maas',
                'kategori_id'   => $fantasy?->id,
                'deskripsi'     => 'Feyre, Rhysand, dan kawan-kawan membangun kembali dunia pasca-perang sembari merayakan Titik Balik Musim Dingin.',
                'harga'         => 160000,
                'penerbit'      => 'Bloomsbury Publishing',
                'tahun_terbit'  => 2018,
                'stok'          => 10,
                'cover_color'   => 'linear-gradient(135deg, #0284c7 0%, #38bdf8 100%)',
                'is_bestseller' => false,
                'is_new'        => false,
            ],
        ];

        foreach ($bukuData as $buku) {
            if ($buku['kategori_id']) {
                Buku::firstOrCreate(['judul' => $buku['judul']], $buku);
            }
        }
    }
}
