<?php

namespace App\Models;

use CodeIgniter\Model;

class M_setting extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    public function daftar()
    {
        return $this->db->table('tb_setting')
            ->orderBy('id_setting', 'desc')
            ->get()
            ->getRow(); // Ambil hanya satu baris paling akhir
    }

    public function updatenya($data)
    {
        return $this->db->table('tb_setting')
            ->where('id_setting', $data['id_setting'])
            ->update($data);
    }
}