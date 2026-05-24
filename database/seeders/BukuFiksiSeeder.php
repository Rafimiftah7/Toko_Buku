<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BukuFiksiSeeder extends Seeder
{
    public function run(): void
    {
        $books = [
            [
                'judul'        => 'Aroma Karsa',
                'penulis'      => 'Dee Lestari',
                'kategori_id'  => 4,
                'deskripsi'    => 'Jati Wesi memiliki penciuman luar biasa yang membawanya bekerja di perusahaan kosmetik raksasa. Misi utamanya adalah menemukan Puspa Karsa, tanaman misterius dari mitos kuno yang konon bisa mengendalikan kehendak manusia. Pencarian ini membawanya pada rahasia besar tentang asal-usul dirinya sendiri.',
                'harga'        => 99000,
                'penerbit'     => 'Bentang Pustaka',
                'tahun_terbit' => 2018,
                'stok'         => 55,
                'cover_color'  => 'linear-gradient(135deg, #1b4332 0%, #52b788 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Pulang',
                'penulis'      => 'Leila S. Chudori',
                'kategori_id'  => 4,
                'deskripsi'    => 'Novel sejarah ini mengikuti perjalanan hidup Dimas Suryo, seorang eksil politik Indonesia yang terdampar di Paris setelah tragedi 1965. Ia tidak bisa pulang ke tanah airnya, dan kerinduannya diwariskan kepada anak perempuannya, Lintang Utara, yang akhirnya berangkat ke Jakarta untuk merekam dokumenter tepat pada kerusuhan Mei 1998.',
                'harga'        => 89000,
                'penerbit'     => 'Kepustakaan Populer Gramedia (KPG)',
                'tahun_terbit' => 2012,
                'stok'         => 45,
                'cover_color'  => 'linear-gradient(135deg, #1a237e 0%, #5c6bc0 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Lelaki Harimau',
                'penulis'      => 'Eka Kurniawan',
                'kategori_id'  => 4,
                'deskripsi'    => 'Dengan sentuhan realisme magis, novel ini menelusuri alasan mengapa Margio, seorang pemuda dari keluarga miskin yang dikenal tenang, tiba-tiba membunuh tetangganya secara brutal. Di dalam diri Margio, bersemayam seekor harimau putih gaib yang diwariskan dari kakeknya.',
                'harga'        => 79000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2004,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #4a0404 0%, #b71c1c 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Perahu Kertas',
                'penulis'      => 'Dee Lestari',
                'kategori_id'  => 4,
                'deskripsi'    => 'Kisah tentang Kugy, gadis eksentrik yang bercita-cita menjadi penulis dongeng, dan Keenan, pelukis berbakat yang dipaksa ayahnya belajar ekonomi. Keduanya memiliki ketertarikan yang sama, namun terhalang oleh berbagai keadaan, ego, dan persahabatan yang membawa mereka menyusuri jalan panjang sebelum akhirnya takdir mempertemukan mereka kembali.',
                'harga'        => 85000,
                'penerbit'     => 'Bentang Pustaka',
                'tahun_terbit' => 2009,
                'stok'         => 70,
                'cover_color'  => 'linear-gradient(135deg, #006994 0%, #48cae4 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Raden Mandasia Si Pencuri Daging Sapi',
                'penulis'      => 'Yusi Avianto Pareanom',
                'kategori_id'  => 4,
                'deskripsi'    => 'Sebuah novel petualangan epik dengan balutan komedi dan fantasi kerajaan. Mengisahkan Sungu Lembu yang mendendam pada Kerajaan Gilingwesi, dan Raden Mandasia, pangeran yang punya hobi aneh mencuri daging sapi. Keduanya melakukan perjalanan panjang yang penuh bahaya, pertarungan, dan intrik konyol menuju Kerajaan Gerbang Agung.',
                'harga'        => 75000,
                'penerbit'     => 'Banana',
                'tahun_terbit' => 2016,
                'stok'         => 30,
                'cover_color'  => 'linear-gradient(135deg, #7b3f00 0%, #f5a623 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Amba',
                'penulis'      => 'Laksmi Pamuntjak',
                'kategori_id'  => 4,
                'deskripsi'    => 'Diambil dari epos Mahabharata namun berlatar sejarah Indonesia, novel ini menceritakan cinta tragis antara Amba dan Bhisma yang terpisah akibat pergolakan politik tahun 1965. Pencarian Amba puluhan tahun kemudian membawanya ke Pulau Buru, tempat para tahanan politik diasingkan.',
                'harga'        => 92000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2012,
                'stok'         => 35,
                'cover_color'  => 'linear-gradient(135deg, #4a148c 0%, #ce93d8 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Ronggeng Dukuh Paruk',
                'penulis'      => 'Ahmad Tohari',
                'kategori_id'  => 4,
                'deskripsi'    => 'Berkisah tentang Srintil, seorang ronggeng pujaan di desa miskin Dukuh Paruk, dan Rasus, teman masa kecilnya yang memilih masuk tentara. Berlatar belakang masa sebelum dan sesudah tragedi 1965, novel ini memotret keluguan masyarakat desa yang tersapu oleh kejamnya intrik politik nasional.',
                'harga'        => 82000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 1982,
                'stok'         => 40,
                'cover_color'  => 'linear-gradient(135deg, #3e2723 0%, #a1887f 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => '5 cm',
                'penulis'      => 'Donny Dhirgantoro',
                'kategori_id'  => 4,
                'deskripsi'    => 'Kisah persahabatan lima anak muda—Arial, Riani, Zafran, Ian, dan Genta—yang menantang diri mereka sendiri untuk mendaki Puncak Mahameru. Perjalanan fisik yang melelahkan tersebut ternyata menjadi perjalanan batin yang mengubah cara pandang mereka tentang cinta, cita-cita, dan nasionalisme.',
                'harga'        => 78000,
                'penerbit'     => 'Grasindo',
                'tahun_terbit' => 2005,
                'stok'         => 65,
                'cover_color'  => 'linear-gradient(135deg, #01579b 0%, #e1f5fe 100%)',
                'is_bestseller'=> true,
                'is_new'       => false,
            ],
            [
                'judul'        => 'O',
                'penulis'      => 'Eka Kurniawan',
                'kategori_id'  => 4,
                'deskripsi'    => 'Sebuah fabel kontemporer dan satir tentang O, seekor monyet betina yang berusaha menjadi manusia demi cintanya pada Entang Kosasih. Novel ini dengan cerdas mengkritik sifat-sifat serakah, kejam, dan liciknya manusia melalui sudut pandang hewan.',
                'harga'        => 80000,
                'penerbit'     => 'Gramedia Pustaka Utama',
                'tahun_terbit' => 2016,
                'stok'         => 30,
                'cover_color'  => 'linear-gradient(135deg, #33691e 0%, #aed581 100%)',
                'is_bestseller'=> false,
                'is_new'       => false,
            ],
            [
                'judul'        => 'Tenggelamnya Kapal Van der Wijck',
                'penulis'      => 'Prof. Dr. Hamka (Buya Hamka)',
                'kategori_id'  => 4,
                'deskripsi'    => 'Salah satu karya klasik sastra Indonesia yang menceritakan cinta tak sampai antara Zainuddin, pemuda berdarah campuran Minang-Bugis yang dianggap tidak memiliki suku, dengan Hayati, gadis Minang totok. Cinta mereka terhalang adat dan kasta, membawa pada akhir yang tragis dan memilukan.',
                'harga'        => 70000,
                'penerbit'     => 'Gema Insani',
                'tahun_terbit' => 1938,
                'stok'         => 50,
                'cover_color'  => 'linear-gradient(135deg, #263238 0%, #90a4ae 100%)',
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

        echo 'Berhasil memasukkan ' . count($books) . " buku Fiksi!\n";
    }
}
