<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class Berita extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_berita' => 7,
                'id_user' => 2,
                'id_kategori' => 1,
                'slug_berita' => 'tips-temukan-pesan-tersembunyi-di-instagram',
                'judul_berita' => 'Tips Temukan Pesan Tersembunyi di Instagram',
                'isi_berita' => '<p><strong>CALIFORNIA</strong>&nbsp;- Instagram memungkinkan penggunanya untuk melakukan&nbsp;<em>direct message&nbsp;</em>(pesan langsung) satu sama lain selama beberapa waktu. Tapi apakah Anda tahu bahwa aplikasi berbagi foto ini bisa menyembunyikan pesan dari Anda?</p>\r\n<p>Instagram dikatakan bisa menyembunyikan pesan yang masuk ke kotak masuk Anda, namun pesan-pesan tersembunyi itu dengan mudah dapat ditemukan. Bagaimana caranya?</p>\r\n<div class="flying_carpet_div">&nbsp;</div>\r\n<p>Berikut ini cara membuka pesan tersembunyi di Instagram sebagaimana diberitakan&nbsp;<em><a href="http://www.businessinsider.co.id/how-to-find-hidden-direct-messages-in-instagram-2016-9/#P6gdlC3xOxGb8usC.97" target="_blank">Business Insider</a></em>, Selasa (6/9/2016).</p>\r\n<p>1. Untuk melihat apakah Anda memiliki pesan Instagram tersembunyi, tekan ikon inbox di kanan atas aplikasi. Anda juga bisa men-swipe ke kanan.</p>\r\n<div id="lastread">&nbsp;</div>\r\n<p>2. Jika Anda memiliki pesan tersembunyi, bar biru kecil akan muncul di bagian atas kotak masuk Anda mengatakan, &ldquo;Anda memiliki permintaan pesan.&rdquo;</p>\r\n<p>3. Ketuk bar biru itu, dan Anda akan melihat inbox lain dengan permintaan pesan Anda. "Ini dari orang yang Anda tidak follow," menurut Instagram. "Mereka hanya akan tahu Anda telah melihat permintaan mereka jika Anda memilih Allow." Anda bisa menghapus permintaan dari inbox ini tanpa membuka mereka atau mengintip dan memutuskan untuk memberi tahu pengirim bahwa Anda telah melihat pesan.</p>',
                'gambar_berita' => 'tips-temukan-pesan-tersembunyi-di-instagram-jv6jYtSpxp.jpg',
                'status_berita' => 'Publish',
                'jenis_berita' => 'Berita',
                'keywords' => 'Instagram',
                'date_cretated' => '2021-04-23 12:55:57',
                'last_modified' => '2021-04-30',
            ],
            [
                'id_berita' => 10,
                'id_user' => 3,
                'id_kategori' => 1,
                'slug_berita' => 'radiasi-handphone-memicu-kanker-otak-ini-faktanya',
                'judul_berita' => 'Radiasi Handphone Memicu Kanker Otak? Ini Faktanya',
                'isi_berita' => '<p>Tidak sedikit orang yang bermain handphone sebelum tidur. Setelah itu terlelap dalam keadaan posisi <a href="https://www.okezone.com/tag/handphone">handphone</a> di dekat kepala.</p>\r\n<p>Ada informasi yang mengatakan bahwa meletakan handphone di dekat kepala dapat memicu kanker otak akibat radiasinya. Tapi, apakah itu benar?</p>\r\n<p>Kementerian Komunikasi dan Informatika (<a href="https://www.okezone.com/tag/kominfo">Kominfo</a>) menegaskan bahwa informasi tersebut adalah mitos.</p>\r\n<p> </p>\r\n<p>Asumsi ini terbantahkan dari hasil penelitian yang diikuti oleh 420.000 pengguna handphone selama 20 tahun.</p>\r\n<p>Dalam penelitian tersebut, peneliti tidak menemukan hubungan antara handphone dan tumor otak. "Alias tidak ada bukti ilmiah risiko kanker meningkat akibat penggunaan ponsel," tulis Kominfo di akun Instagram resminya, dikutip Rabu (28/4/2021).</p>\r\n<p>Berdasarkan data dari Cancer Research di United Kingdom (UK), disebutkan bahwa radiasi elektromagnetik frekuensi radio yang dipancarkan dan diterima oleh handphone bersifat non-ionisasi dan sangat lemah.</p>\r\n<p> </p>\r\n<p>Energi non-ionisasi ini juga tidak memiliki energi yang cukup untuk merusak DNA. Inilah alasan penggunaan handphone tidak terbukti secara langsung menyebabkan kanker otak.</p>\r\n<p>Sampai saat ini, radiasi handphone dapat menyebabkan kanker atau tumor otak masih menjadi kontroversi.</p>\r\n<p>Kekhawatiran tersebut muncul bukan tanpa alasan. Sebab, handphone memancarkan energi radio frekuensi. Selain itu, jumlah pengguna handphone meningkat dengan sangat cepat, sehingga jumlah frekuensi penggunaan handphone turut semakin meningkat.</p>',
                'gambar_berita' => 'radiasi-handphone-memicu-kanker-otak-ini-faktanya-NuFF1VpANW.jpg',
                'status_berita' => 'Publish',
                'jenis_berita' => 'Berita',
                'keywords' => 'Handphone',
                'date_cretated' => '2021-04-30 10:34:57',
                'last_modified' => '0000-00-00',
            ],
            // ... Tambahkan data lain sesuai kebutuhan ...
        ];
        $this->db->table('tb_berita')->insertBatch($data);
    }
}
