<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriClient extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori' => 1,
                'slug_kategori' => 'perushaan-negara',
                'nama_kategori' => 'Perushaan Negara',
                'date_created' => '2021-04-27 12:49:08',
            ],
            [
                'id_kategori' => 3,
                'slug_kategori' => 'perusahaan-agraris',
                'nama_kategori' => 'Perusahaan Agraris',
                'date_created' => '2021-04-29 11:24:26',
            ],
            [
                'id_kategori' => 4,
                'slug_kategori' => 'perusahaan-industri',
                'nama_kategori' => 'Perusahaan Industri',
                'date_created' => '2021-04-29 11:24:34',
            ],
            [
                'id_kategori' => 5,
                'slug_kategori' => 'perusahaan-perdagangan',
                'nama_kategori' => 'Perusahaan Perdagangan',
                'date_created' => '2021-04-29 11:24:42',
            ],
            [
                'id_kategori' => 6,
                'slug_kategori' => 'perusahaan-jasa',
                'nama_kategori' => 'Perusahaan Jasa',
                'date_created' => '2021-04-29 11:24:52',
            ],
        ];
        $this->db->table('tb_kategori_client')->insertBatch($data);
    }
}
