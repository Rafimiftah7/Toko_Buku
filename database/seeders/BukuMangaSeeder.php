<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuMangaSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul'        => 'Berserk',
                'penulis'      => 'Kentaro Miura',
                'kategori_id'  => 5,
                'deskripsi'    => 'Berlatar di dunia dark fantasy bergaya Eropa pertengahan, kisah ini mengikuti Guts, seorang pendekar pedang bayaran yang terus dihantui oleh iblis. Dengan pedang raksasanya, ia memburu Griffith, mantan sahabat yang mengorbankan pasukannya sendiri demi menjadi dewa. Ceritanya sangat matang, kelam, dan penuh intrik politik.',
                'harga'        => 35000,
                'penerbit'     => 'Level Comics',
                'tahun_terbit' => 1989,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #0d0d0d 0%, #4a0404 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Monster',
                'penulis'      => 'Naoki Urasawa',
                'kategori_id'  => 5,
                'deskripsi'    => 'Dr. Kenzo Tenma adalah seorang ahli bedah saraf brilian yang mempertaruhkan karirnya demi menyelamatkan nyawa seorang anak laki-laki bernama Johan. Bertahun-tahun kemudian, Tenma menyadari bahwa anak yang ia selamatkan telah tumbuh menjadi seorang pembunuh berantai psikopat yang jenius. Tenma pun memulai perjalanan melintasi Eropa untuk menghentikan "monster" yang ia ciptakan sendiri.',
                'harga'        => 32000,
                'penerbit'     => 'M&C!',
                'tahun_terbit' => 1994,
                'stok'         => 35,
                'cover_color'  => 'linear-gradient(135deg, #1a237e 0%, #455a64 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Fullmetal Alchemist',
                'penulis'      => 'Hiromu Arakawa',
                'kategori_id'  => 5,
                'deskripsi'    => 'Dua bersaudara, Edward dan Alphonse Elric, menggunakan ilmu alkimia terlarang untuk menghidupkan kembali ibu mereka yang telah mati. Tragedi terjadi; Ed kehilangan kaki dan tangannya, sementara tubuh Al hancur dan jiwanya terikat pada baju zirah. Keduanya berkelana mencari Batu Bertuah untuk mengembalikan tubuh mereka, namun malah terseret ke dalam konspirasi militer raksasa.',
                'harga'        => 30000,
                'penerbit'     => 'Elex Media Komputindo',
                'tahun_terbit' => 2001,
                'stok'         => 60,
                'cover_color'  => 'linear-gradient(135deg, #b71c1c 0%, #f9a825 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Vagabond',
                'penulis'      => 'Takehiko Inoue',
                'kategori_id'  => 5,
                'deskripsi'    => 'Adaptasi epik dari novel Musashi karya Eiji Yoshikawa. Manga ini menceritakan perjalanan hidup Miyamoto Musashi, dari seorang pemuda beringas pembuat onar di desa hingga perjalanannya mencari pencerahan batin untuk menjadi samurai terhebat di Jepang. Karya ini sarat dengan filosofi tentang kehidupan, kematian, dan arti dari sebuah kekuatan.',
                'harga'        => 38000,
                'penerbit'     => 'Level Comics',
                'tahun_terbit' => 1998,
                'stok'         => 30,
                'cover_color'  => 'linear-gradient(135deg, #3e2723 0%, #795548 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Jujutsu Kaisen',
                'penulis'      => 'Gege Akutami',
                'kategori_id'  => 5,
                'deskripsi'    => 'Yuji Itadori, seorang siswa SMA dengan kekuatan fisik luar biasa, menelan jari dari roh kutukan tingkat tinggi, Ryomen Sukuna, untuk menyelamatkan teman-temannya. Yuji bergabung dengan SMA Jujutsu Metropolitan Tokyo dan masuk ke dalam dunia gelap para penyihir yang bertugas membasmi kutukan mematikan yang lahir dari emosi negatif manusia.',
                'harga'        => 28000,
                'penerbit'     => 'Elex Media Komputindo',
                'tahun_terbit' => 2018,
                'stok'         => 90,
                'cover_color'  => 'linear-gradient(135deg, #4a148c 0%, #880e4f 100%)',
                'is_bestseller'=> true,
                'is_new'       => true,
            ],
            [
                'judul'        => 'Tokyo Ghoul',
                'penulis'      => 'Sui Ishida',
                'kategori_id'  => 5,
                'deskripsi'    => 'Ken Kaneki, seorang mahasiswa biasa, hampir tewas akibat serangan Ghoul—makhluk pemakan daging manusia yang hidup bersembunyi di Tokyo. Ia selamat setelah menerima transplantasi organ dari Ghoul tersebut, yang mengubahnya menjadi manusia setengah Ghoul. Kaneki kini harus berjuang bertahan hidup di antara dua dunia yang saling bertentangan.',
                'harga'        => 27000,
                'penerbit'     => 'M&C!',
                'tahun_terbit' => 2011,
                'stok'         => 55,
                'cover_color'  => 'linear-gradient(135deg, #212121 0%, #b71c1c 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Attack on Titan',
                'penulis'      => 'Hajime Isayama',
                'kategori_id'  => 5,
                'deskripsi'    => 'Umat manusia hidup bersembunyi di balik tembok raksasa untuk berlindung dari ancaman Titan, raksasa pemakan manusia. Eren Yeager bersumpah untuk menghabisi seluruh Titan setelah ibunya dimakan di depan matanya sendiri. Namun, di balik keberadaan Titan, tersimpan rahasia sejarah dan geopolitik dunia yang jauh lebih kelam dan tak terduga.',
                'harga'        => 30000,
                'penerbit'     => 'Level Comics',
                'tahun_terbit' => 2009,
                'stok'         => 80,
                'cover_color'  => 'linear-gradient(135deg, #37474f 0%, #b0bec5 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Vinland Saga',
                'penulis'      => 'Makoto Yukimura',
                'kategori_id'  => 5,
                'deskripsi'    => 'Mengambil latar era penaklukan Viking di Eropa Utara. Thorfinn adalah seorang pemuda yang memendam dendam kesumat pada Askeladd, pemimpin Viking yang membunuh ayahnya. Alih-alih membunuhnya langsung, Thorfinn bergabung demi mendapatkan duel yang adil. Kisah ini adalah transisi brilian dari balas dendam penuh darah menuju pencarian kedamaian.',
                'harga'        => 36000,
                'penerbit'     => 'Elex Media Komputindo',
                'tahun_terbit' => 2005,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #0d47a1 0%, #90caf9 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => '20th Century Boys',
                'penulis'      => 'Naoki Urasawa',
                'kategori_id'  => 5,
                'deskripsi'    => 'Sekelompok pria paruh baya menyadari bahwa serangkaian serangan teroris berskala global sangat mirip dengan cerita "kiamat" yang mereka karang saat masih kecil. Dalang di balik semua itu adalah seorang pemimpin sekte misterius yang hanya dipanggil "Sahabat". Kenji dan teman-teman masa kecilnya harus bersatu kembali untuk menyelamatkan dunia.',
                'harga'        => 34000,
                'penerbit'     => 'Level Comics',
                'tahun_terbit' => 1999,
                'stok'         => 35,
                'cover_color'  => 'linear-gradient(135deg, #e65100 0%, #ffd54f 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Death Note',
                'penulis'      => 'Tsugumi Ohba & Takeshi Obata',
                'kategori_id'  => 5,
                'deskripsi'    => 'Seorang siswa jenius, Light Yagami, menemukan sebuah buku catatan misterius bernama Death Note. Siapa pun yang namanya ditulis di buku itu akan mati. Light memutuskan menggunakan kekuatan itu untuk menciptakan dunia baru tanpa kejahatan. Hal ini memicu permainan kucing-kucingan psikologis yang intens melawan L, detektif eksentrik terbaik di dunia.',
                'harga'        => 29000,
                'penerbit'     => 'M&C!',
                'tahun_terbit' => 2003,
                'stok'         => 75,
                'cover_color'  => 'linear-gradient(135deg, #1a1a1a 0%, #f5f5f5 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
        ];

        foreach ($books as $book) {
            DB::table('buku')->insert(array_merge($book, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        echo 'Berhasil memasukkan ' . count($books) . " buku Manga!\n";
    }
}
