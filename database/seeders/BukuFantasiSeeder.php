<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuFantasiSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul'        => 'The Last Wish (Harapan Terakhir)',
                'penulis'      => 'Andrzej Sapkowski',
                'kategori_id'  => 6,
                'deskripsi'    => 'Buku ini adalah kumpulan cerita pendek yang menjadi gerbang pembuka ke dunia Geralt dari Rivia, seorang pemburu monster bayaran yang bermutasi. Di benua yang gelap dan penuh intrik, kisah ini menawarkan narasi mendalam yang sangat memikat, terutama jika Anda menyukai alur cerita kompleks di mana manusia sering kali bisa jauh lebih kejam daripada monster yang mereka buru.',
                'harga'        => 95000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 1993,
                'stok'         => 45,
                'cover_color'  => 'linear-gradient(135deg, #1a1a2e 0%, #16213e 50%, #0f3460 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Mistborn: The Final Empire',
                'penulis'      => 'Brandon Sanderson',
                'kategori_id'  => 6,
                'deskripsi'    => 'Di dunia di mana matahari berwarna merah, abu terus turun dari langit, dan penguasa abadi menindas rakyatnya selama seribu tahun, sekelompok pencuri merencanakan pemberontakan epik. Mereka menggunakan sistem sihir unik bernama Allomancy, di mana kekuatan sihir berasal dari menelan dan membakar logam di dalam tubuh.',
                'harga'        => 109000,
                'penerbit'     => 'Noura Books',
                'tahun_terbit' => 2006,
                'stok'         => 55,
                'cover_color'  => 'linear-gradient(135deg, #2d2d2d 0%, #6d4c41 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Six of Crows',
                'penulis'      => 'Leigh Bardugo',
                'kategori_id'  => 6,
                'deskripsi'    => 'Berlatar di kota Ketterdam yang kumuh namun kaya, seorang jenius kriminal bernama Kaz Brekker ditawari misi perampokan yang mustahil. Ia mengumpulkan lima orang buangan dengan keahlian unik untuk menembus benteng paling aman di dunia. Aksi penuh taktik dan intrik jalanan di buku ini terasa sangat intens.',
                'harga'        => 98000,
                'penerbit'     => 'Kepustakaan Populer Gramedia (KPG)',
                'tahun_terbit' => 2015,
                'stok'         => 60,
                'cover_color'  => 'linear-gradient(135deg, #0d0d0d 0%, #b71c1c 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'The Name of the Wind',
                'penulis'      => 'Patrick Rothfuss',
                'kategori_id'  => 6,
                'deskripsi'    => 'Sebuah autobiografi fiktif yang menceritakan perjalanan hidup Kvothe, seorang musisi berbakat dan calon penyihir legendaris. Cerita mengalir menelusuri masa mudanya yang keras di jalanan hingga perjuangannya bertahan dalam kerasnya rutinitas belajar dan memecahkan misteri di sebuah universitas sihir yang sangat bergengsi.',
                'harga'        => 105000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2007,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #4a0e0e 0%, #e65100 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'A Game of Thrones',
                'penulis'      => 'George R.R. Martin',
                'kategori_id'  => 6,
                'deskripsi'    => 'Mengambil latar di benua fiktif Westeros, buku pertama dari seri epik ini berfokus pada intrik politik berdarah antar klan bangsawan demi memperebutkan Takhta Besi. Di tengah persaingan kekuasaan tersebut, ancaman musim dingin abadi dan makhluk-makhluk mematikan perlahan bangkit dari ujung utara yang membeku.',
                'harga'        => 119000,
                'penerbit'     => 'Fantasious',
                'tahun_terbit' => 1996,
                'stok'         => 50,
                'cover_color'  => 'linear-gradient(135deg, #1c1c1c 0%, #c9a227 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'The Lies of Locke Lamora',
                'penulis'      => 'Scott Lynch',
                'kategori_id'  => 6,
                'deskripsi'    => 'Locke Lamora adalah pencuri ulung sekaligus penipu ulung di kota Camorr yang terinspirasi dari Venesia kuno. Bersama kelompoknya yang bernama Gentlemen Bastards, ia merampok kaum bangsawan dengan rencana-rencana yang sangat brilian. Namun, kehadiran tokoh misterius mengancam menghancurkan seluruh dunia kriminal bawah tanah yang ia kenal.',
                'harga'        => 92000,
                'penerbit'     => 'Bantam Books',
                'tahun_terbit' => 2006,
                'stok'         => 30,
                'cover_color'  => 'linear-gradient(135deg, #1a237e 0%, #283593 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Bumi',
                'penulis'      => 'Tere Liye',
                'kategori_id'  => 6,
                'deskripsi'    => 'Mewakili fantasi lokal dengan sentuhan petualangan lintas dimensi, buku ini menceritakan Raib, seorang remaja 15 tahun yang memiliki kemampuan unik bisa menghilangkan diri. Petualangannya yang mendebarkan dimulai ketika rahasia dunia paralel terungkap, membawanya dan teman-temannya menjelajahi klan-klan ajaib.',
                'harga'        => 79000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2014,
                'stok'         => 75,
                'cover_color'  => 'linear-gradient(135deg, #0d47a1 0%, #26c6da 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'The Hobbit',
                'penulis'      => 'J.R.R. Tolkien',
                'kategori_id'  => 6,
                'deskripsi'    => 'Karya klasik ini mengisahkan Bilbo Baggins yang sangat menyukai kenyamanan hidup. Tanpa disangka, ia terseret dalam petualangan tak terduga bersama penyihir Gandalf dan rombongan kurcaci untuk merebut kembali kerajaan dan harta karun mereka dari cengkeraman naga ganas bernama Smaug.',
                'harga'        => 89000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 1937,
                'stok'         => 80,
                'cover_color'  => 'linear-gradient(135deg, #2e7d32 0%, #a5d6a7 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'American Gods',
                'penulis'      => 'Neil Gaiman',
                'kategori_id'  => 6,
                'deskripsi'    => 'Setelah keluar dari penjara, Shadow Moon bekerja sebagai pengawal untuk pria misterius bernama Mr. Wednesday. Ia pun terbawa dalam perjalanan melintasi Amerika dan terperangkap di tengah perang besar antara dewa-dewa kuno dari berbagai mitologi melawan dewa-dewa modern yang mewakili teknologi, internet, dan media massa.',
                'harga'        => 99000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2001,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #37474f 0%, #b0bec5 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'The Poppy War',
                'penulis'      => 'R.F. Kuang',
                'kategori_id'  => 6,
                'deskripsi'    => 'Terinspirasi dari sejarah kelam Tiongkok abad ke-20, buku ini menceritakan Rin, seorang gadis yatim piatu yang berhasil masuk ke akademi militer paling elite. Saat perang brutal meletus, Rin menyadari bahwa satu-satunya cara untuk menyelamatkan bangsanya adalah dengan membangkitkan kekuatan dewa api kuno yang mematikan.',
                'harga'        => 102000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2018,
                'stok'         => 45,
                'cover_color'  => 'linear-gradient(135deg, #b71c1c 0%, #ff6f00 100%)',
                'is_bestseller'=> false,
                'is_new'       => true,
            ],
        ];

        foreach ($books as $book) {
            DB::table('buku')->insert(array_merge($book, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        echo 'Berhasil memasukkan ' . count($books) . " buku Fantasi!\n";
    }
}
