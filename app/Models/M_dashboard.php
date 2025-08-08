<?php

namespace App\Models;

use CodeIgniter\Model;

class M_dashboard extends Model
{
    protected $db;

    public function __construct()
    {
        parent::__construct();
        $this->db = db_connect();
    }

    public function user()
    {
        return (object)[
            'total' => $this->db->table('tb_user')->countAllResults()
        ];
    }

    public function berita()
    {
        return (object)[
            'total' => $this->db->table('tb_berita')->countAllResults()
        ];
    }

    public function layanan()
    {
        return (object)[
            'total' => $this->db->table('tb_layanan')->countAllResults()
        ];
    }

    public function client()
    {
        return (object)[
            'total' => $this->db->table('tb_client')->countAllResults()
        ];
    }

    public function staff()
    {
        return (object)[
            'total' => $this->db->table('tb_staff')->countAllResults()
        ];
    }

    public function portfolio()
    {
        return (object)[
            'total' => $this->db->table('tb_portfolio')->countAllResults()
        ];
    }
}