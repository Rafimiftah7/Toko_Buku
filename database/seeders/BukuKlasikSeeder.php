<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuKlasikSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul'        => '1984',
                'penulis'      => 'George Orwell',
                'kategori_id'  => 8,
                'deskripsi'    => 'Winston Smith hidup di bawah rezim totaliter Partai dan pengawasan ketat Big Brother, di mana setiap gerak-gerik selalu dipantau. Novel distopia ini secara brilian mengeksplorasi bahaya pengawasan teknologi massal, manipulasi informasi, dan hilangnya kemerdekaan individu yang terasa semakin relevan dengan era digital saat ini.',
                'harga'        => 89000,
                'penerbit'     => 'Bentang Pustaka',
                'tahun_terbit' => 1949,
                'stok'         => 60,
                'cover_color'  => 'linear-gradient(135deg, #1a1a1a 0%, #c62828 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'The Count of Monte Cristo',
                'penulis'      => 'Alexandre Dumas',
                'kategori_id'  => 8,
                'deskripsi'    => 'Edmond Dantès dikhianati oleh teman-temannya sendiri dan dipenjara tanpa pengadilan yang adil. Setelah berhasil melarikan diri dan menemukan harta karun rahasia, ia menyusun rencana balas dendam epik yang sangat terstruktur. Alur ceritanya yang panjang dan memikat memiliki kedalaman narasi yang akan sangat memuaskan.',
                'harga'        => 115000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 1844,
                'stok'         => 45,
                'cover_color'  => 'linear-gradient(135deg, #0d47a1 0%, #c9a227 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Frankenstein',
                'penulis'      => 'Mary Shelley',
                'kategori_id'  => 8,
                'deskripsi'    => 'Victor Frankenstein, seorang ilmuwan ambisius, berhasil melanggar batasan alam dengan merakit dan menghidupkan makhluk dari potongan-potongan tubuh tak bernyawa. Namun, ngeri dengan ciptaannya sendiri, ia membuang makhluk tersebut. Ini adalah kisah tragis tentang batas penciptaan dan tanggung jawab seorang kreator terhadap apa yang telah ia bangun.',
                'harga'        => 79000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 1818,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #263238 0%, #37474f 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'No Longer Human',
                'penulis'      => 'Osamu Dazai',
                'kategori_id'  => 8,
                'deskripsi'    => 'Kisah semi-otobiografi tentang Yozo Oba, seorang pemuda yang merasa sangat terasing dari masyarakat dan tak mampu memahami manusia lain. Untuk bertahan, ia selalu memakai "topeng" badut demi menyenangkan orang-orang di sekitarnya. Eksplorasi sisi psikologis dan krisis identitas yang kelam di buku ini sangat mendalam.',
                'harga'        => 72000,
                'penerbit'     => 'Penerbit Mai',
                'tahun_terbit' => 1948,
                'stok'         => 55,
                'cover_color'  => 'linear-gradient(135deg, #f5f5f5 0%, #9e9e9e 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Dracula',
                'penulis'      => 'Bram Stoker',
                'kategori_id'  => 8,
                'deskripsi'    => 'Disusun melalui kumpulan surat dan entri buku harian, novel ini menceritakan teror Count Dracula yang pindah dari kastil tuanya di Transylvania ke London. Kisah dark fantasy ini menghadirkan atmosfer gotik pekat, perburuan makhluk gaib kuno, dan intrik kelam yang menegangkan dari awal hingga akhir.',
                'harga'        => 85000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 1897,
                'stok'         => 35,
                'cover_color'  => 'linear-gradient(135deg, #1a0000 0%, #7b0000 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Do Androids Dream of Electric Sheep?',
                'penulis'      => 'Philip K. Dick',
                'kategori_id'  => 8,
                'deskripsi'    => 'Berlatar di masa depan pasca-apokaliptik yang hancur, pemburu hadiah Rick Deckard ditugaskan untuk melacak dan memensiunkan sekelompok android pemberontak yang wujud dan kecerdasannya sangat menyerupai manusia. Novel ini membedah garis tipis antara kecerdasan buatan dan kesadaran manusia seutuhnya.',
                'harga'        => 88000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 1968,
                'stok'         => 30,
                'cover_color'  => 'linear-gradient(135deg, #0a0a2e 0%, #00b4d8 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Crime and Punishment',
                'penulis'      => 'Fyodor Dostoevsky',
                'kategori_id'  => 8,
                'deskripsi'    => 'Raskolnikov, seorang mantan mahasiswa yang hidup miskin, merencanakan dan melakukan pembunuhan terhadap seorang rentenir tua. Alih-alih berfokus pada misteri pembunuhannya, novel ini menggali habis-habisan kondisi mental Raskolnikov yang hancur akibat rasa bersalah, paranoia, dan pergumulan moralnya.',
                'harga'        => 105000,
                'penerbit'     => 'Yayasan Pustaka Obor Indonesia',
                'tahun_terbit' => 1866,
                'stok'         => 35,
                'cover_color'  => 'linear-gradient(135deg, #4a148c 0%, #880e4f 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'The Metamorphosis',
                'penulis'      => 'Franz Kafka',
                'kategori_id'  => 8,
                'deskripsi'    => 'Gregor Samsa, seorang tulang punggung keluarga yang kelelahan akibat rutinitas pekerjaannya, terbangun pada suatu pagi hanya untuk mendapati dirinya telah berubah menjadi seekor serangga raksasa. Cerita surealis ini mengupas soal keterasingan, absurditas kehidupan, dan bagaimana masyarakat memperlakukan mereka yang sudah tidak berguna.',
                'harga'        => 65000,
                'penerbit'     => 'Kepustakaan Populer Gramedia (KPG)',
                'tahun_terbit' => 1915,
                'stok'         => 50,
                'cover_color'  => 'linear-gradient(135deg, #33691e 0%, #827717 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'To Kill a Mockingbird',
                'penulis'      => 'Harper Lee',
                'kategori_id'  => 8,
                'deskripsi'    => 'Diceritakan dari sudut pandang seorang anak perempuan bernama Scout Finch, novel ini memotret kasus hukum di kota kecil Alabama pada era 1930-an. Ayahnya, seorang pengacara bernama Atticus Finch, mempertaruhkan segalanya untuk membela seorang pria kulit hitam yang dituduh secara tidak adil atas kejahatan yang tidak dilakukannya.',
                'harga'        => 92000,
                'penerbit'     => 'Qanita',
                'tahun_terbit' => 1960,
                'stok'         => 45,
                'cover_color'  => 'linear-gradient(135deg, #e65100 0%, #ffd54f 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'The Old Man and the Sea',
                'penulis'      => 'Ernest Hemingway',
                'kategori_id'  => 8,
                'deskripsi'    => 'Kisah heroik nan sunyi tentang seorang nelayan tua asal Kuba bernama Santiago yang bertarung hidup dan mati selama berhari-hari melawan seekor ikan marlin raksasa di tengah perairan Teluk Meksiko. Sebuah alegori abadi tentang ketekunan, daya tahan fisik, dan ketegaran mental manusia saat menghadapi kekalahan.',
                'harga'        => 75000,
                'penerbit'     => 'Yayasan Pustaka Obor Indonesia',
                'tahun_terbit' => 1952,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #006994 0%, #ffd700 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
        ];

        foreach ($books as $book) {
            DB::table('buku')->insert(array_merge($book, [
                'created_at' => now(),
                'updated_at' => now(),
            ]));
        }

        echo 'Berhasil memasukkan ' . count($books) . " buku Klasik!\n";
    }
}
