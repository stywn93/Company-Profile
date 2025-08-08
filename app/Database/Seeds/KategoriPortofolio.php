<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriPortofolio extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori' => 1,
                'slug_kategori' => 'web-developer',
                'nama_kategori' => 'Web Developer',
                'date_created' => '2021-04-30 11:52:30',
            ],
            [
                'id_kategori' => 3,
                'slug_kategori' => 'mobile-developer',
                'nama_kategori' => 'Mobile Developer',
                'date_created' => '2021-04-30 11:51:47',
            ],
        ];
        $this->db->table('tb_kategori_portfolio')->insertBatch($data);
    }
}
