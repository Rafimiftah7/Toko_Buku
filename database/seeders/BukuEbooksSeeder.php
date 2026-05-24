<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuEbooksSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul'        => 'Laut Bercerita',
                'penulis'      => 'Leila S. Chudori',
                'kategori_id'  => 2,
                'deskripsi'    => 'Novel sejarah ini menceritakan kisah persahabatan, cinta, keluarga, dan pengkhianatan di kalangan aktivis mahasiswa tahun 1998 yang menyuarakan keadilan, namun berujung diculik dan dihilangkan. Cerita dituturkan dari sudut pandang korban dan keluarga yang ditinggalkan.',
                'harga'        => 89000,
                'penerbit'     => 'Kepustakaan Populer Gramedia (KPG)',
                'tahun_terbit' => 2017,
                'stok'         => 50,
                'cover_color'  => 'linear-gradient(135deg, #1e3a5f 0%, #2980b9 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Filosofi Teras',
                'penulis'      => 'Henry Manampiring',
                'kategori_id'  => 2,
                'deskripsi'    => 'Buku ini merupakan pengantar filsafat Stoikisme (filosofi kuno Yunani-Romawi) yang disesuaikan dengan kehidupan sehari-hari masa kini. Tujuannya membantu pembaca mengatasi kecemasan, emosi negatif, dan menemukan ketenangan di tengah dunia yang serba tidak pasti.',
                'harga'        => 98000,
                'penerbit'     => 'Penerbit Buku Kompas',
                'tahun_terbit' => 2018,
                'stok'         => 75,
                'cover_color'  => 'linear-gradient(135deg, #2d6a4f 0%, #52b788 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Atomic Habits',
                'penulis'      => 'James Clear',
                'kategori_id'  => 2,
                'deskripsi'    => 'Panduan praktis dan terbukti secara ilmiah tentang cara membentuk kebiasaan baik, menghilangkan kebiasaan buruk, dan menguasai langkah-langkah kecil yang secara konsisten akan membawa pada perubahan hidup yang luar biasa.',
                'harga'        => 109000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2019,
                'stok'         => 100,
                'cover_color'  => 'linear-gradient(135deg, #f5a623 0%, #f53d2d 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Hujan',
                'penulis'      => 'Tere Liye',
                'kategori_id'  => 2,
                'deskripsi'    => 'Berlatar di masa depan ketika bumi mengalami bencana alam dahsyat akibat intervensi teknologi. Novel ini berfokus pada kisah Lail dan Esok yang berjuang bertahan hidup, dibalut dengan tema cinta, persahabatan, perpisahan, dan bagaimana manusia berdamai dengan kenangan.',
                'harga'        => 79000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2016,
                'stok'         => 60,
                'cover_color'  => 'linear-gradient(135deg, #2c3e50 0%, #4ca1af 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'The Psychology of Money',
                'penulis'      => 'Morgan Housel',
                'kategori_id'  => 2,
                'deskripsi'    => 'Melalui 19 cerita pendek, buku ini mengungkap bahwa kesuksesan finansial tidak selalu tentang seberapa pintar kita, melainkan tentang bagaimana kita berperilaku, mengendalikan emosi, dan mengelola ego ketika berhadapan dengan uang.',
                'harga'        => 99000,
                'penerbit'     => 'Baca',
                'tahun_terbit' => 2021,
                'stok'         => 80,
                'cover_color'  => 'linear-gradient(135deg, #1a1a2e 0%, #e94560 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Cantik Itu Luka',
                'penulis'      => 'Eka Kurniawan',
                'kategori_id'  => 2,
                'deskripsi'    => 'Menggabungkan realisme magis, sejarah, dan satir, novel ini mengisahkan Dewi Ayu, seorang perempuan cantik legendaris di Halimunda yang dipaksa menjadi pelacur di era kolonial. Ia memiliki empat putri, tiga sangat cantik namun bernasib tragis, dan yang terakhir diberi nama Cantik.',
                'harga'        => 85000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2002,
                'stok'         => 45,
                'cover_color'  => 'linear-gradient(135deg, #8b0000 0%, #c0392b 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Sapiens: Riwayat Singkat Umat Manusia',
                'penulis'      => 'Yuval Noah Harari',
                'kategori_id'  => 2,
                'deskripsi'    => 'Sebuah eksplorasi revolusioner mengenai sejarah umat manusia dari zaman batu hingga abad ke-21. Buku ini membahas bagaimana biologi dan sejarah membentuk spesies Homo sapiens, serta bagaimana kognisi, pertanian, hingga revolusi sains mengubah dunia.',
                'harga'        => 119000,
                'penerbit'     => 'Kepustakaan Populer Gramedia (KPG)',
                'tahun_terbit' => 2015,
                'stok'         => 55,
                'cover_color'  => 'linear-gradient(135deg, #3d1c02 0%, #d4a053 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Gadis Kretek',
                'penulis'      => 'Ratih Kumala',
                'kategori_id'  => 2,
                'deskripsi'    => 'Mengisahkan perjalanan tiga bersaudara yang mencari seorang wanita bernama Jeng Yah atas permintaan ayah mereka yang sedang sekarat. Perjalanan ini secara perlahan mengupas rahasia keluarga dan sejarah panjang industri kretek lokal di Indonesia.',
                'harga'        => 82000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2012,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #7b3f00 0%, #cd853f 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Bumi Manusia',
                'penulis'      => 'Pramoedya Ananta Toer',
                'kategori_id'  => 2,
                'deskripsi'    => 'Buku pertama dari Tetralogi Buru ini berlatar masa kebangkitan nasional awal abad ke-20. Menceritakan Minke, pemuda pribumi cerdas di sekolah Belanda, yang jatuh cinta pada Annelies dan harus berhadapan dengan ketidakadilan hukum kolonial serta kehebatan karakter Nyai Ontosoroh.',
                'harga'        => 95000,
                'penerbit'     => 'Lentera Dipantara',
                'tahun_terbit' => 1980,
                'stok'         => 35,
                'cover_color'  => 'linear-gradient(135deg, #5d4037 0%, #bcaaa4 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Insecurity is My Middle Name',
                'penulis'      => 'Alvi Syahrin',
                'kategori_id'  => 2,
                'deskripsi'    => 'Buku self-healing yang sangat dekat dengan keresahan anak muda masa kini. Penulis mengajak pembaca untuk berdamai dengan rasa tidak aman (insecure), memvalidasi keraguan diri mengenai fisik maupun masa depan, dan menemukan makna kebahagiaan versi diri sendiri.',
                'harga'        => 72000,
                'penerbit'     => 'Alvi Legenda Nusantara',
                'tahun_terbit' => 2021,
                'stok'         => 90,
                'cover_color'  => 'linear-gradient(135deg, #6a0572 0%, #ab47bc 100%)',
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

        echo 'Berhasil memasukkan ' . count($books) . " buku!\n";
    }
}
