<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class AllSeed extends Seeder
{
    public function run()
    {
        $this->call('Berita');
        $this->call('Client');
        $this->call('File');
        $this->call('KategoriBerita');
        $this->call('KategoriClient');
        $this->call('KategoriPortofolio');
        $this->call('KategoriStaff');
        $this->call('Layanan');
        $this->call('Portofolio');
        $this->call('Setting');
        $this->call('Staff');
        $this->call('User');
        $this->call('UserToken');
    }
}
