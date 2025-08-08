<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class KategoriStaff extends Seeder
{
    public function run()
    {
        $data = [
            [
                'id_kategori' => 2,
                'slug_kategori' => 'admin',
                'nama_kategori' => 'Admin',
                'date_created' => '2021-04-26 12:12:35',
            ],
            [
                'id_kategori' => 6,
                'slug_kategori' => 'software-developers',
                'nama_kategori' => 'Software Developers',
                'date_created' => '2025-07-10 11:18:38',
            ],
            [
                'id_kategori' => 7,
                'slug_kategori' => 'database-administrator',
                'nama_kategori' => 'Database Administrator',
                'date_created' => '2021-04-29 11:25:33',
            ],
            [
                'id_kategori' => 8,
                'slug_kategori' => 'hardware-engineer',
                'nama_kategori' => 'Hardware Engineer',
                'date_created' => '2021-04-29 11:25:42',
            ],
            [
                'id_kategori' => 9,
                'slug_kategori' => 'system-analyst',
                'nama_kategori' => 'System Analyst',
                'date_created' => '2021-04-29 11:25:50',
            ],
            [
                'id_kategori' => 10,
                'slug_kategori' => 'network-architect',
                'nama_kategori' => 'Network Architect',
                'date_created' => '2021-04-29 11:25:57',
            ],
            [
                'id_kategori' => 12,
                'slug_kategori' => 'information-security-analyst',
                'nama_kategori' => 'Information Security Analyst',
                'date_created' => '2021-04-29 11:26:15',
            ],
            [
                'id_kategori' => 13,
                'slug_kategori' => 'it-support',
                'nama_kategori' => 'IT Support',
                'date_created' => '2021-04-29 11:26:25',
            ],
            [
                'id_kategori' => 14,
                'slug_kategori' => 'system-manager',
                'nama_kategori' => 'System Manager',
                'date_created' => '2021-04-29 11:26:32',
            ],
        ];
        $this->db->table('tb_kategori_staff')->insertBatch($data);
    }
}
