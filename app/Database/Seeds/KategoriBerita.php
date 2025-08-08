<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriBerita extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori' => 1,
                'slug-kategori' => 'teknologi',
                'nama_kategori' => 'Teknologi',
                'date_created' => '2021-04-20 12:12:59',
            ],
            [
                'id_kategori' => 2,
                'slug-kategori' => 'kegiatan-perusahaan',
                'nama_kategori' => 'Kegiatan perusahaan',
                'date_created' => '2025-07-10 11:15:32',
            ],
            [
                'id_kategori' => 7,
                'slug-kategori' => 'percetakan',
                'nama_kategori' => 'Percetakan',
                'date_created' => '2025-07-10 11:15:41',
            ],
        ];
        $this->db->table('tb_kategori_berita')->insertBatch($data);
    }
}
