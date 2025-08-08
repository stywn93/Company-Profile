<?php

namespace App\Models;

use CodeIgniter\Model;

class M_portofolio extends Model
{
    protected $db;
    protected $session;
    protected $request;

    public function __construct()
    {
        parent::__construct();
        $this->db      = db_connect();
        $this->session = session();
        $this->request = \Config\Services::request();
    }

    public function daftar()
    {
        return $this->db->table('tb_portfolio')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_portfolio.id_user', 'left')
            ->join('tb_client', 'tb_client.id_client = tb_portfolio.id_client', 'left')
            ->join('tb_layanan', 'tb_layanan.judul_layanan = tb_portfolio.nama_layanan', 'left')
            ->orderBy('id_portfolio', 'DESC')
            ->get()->getResult();
    }

    public function detail($id_portfolio)
    {
        return $this->db->table('tb_portfolio')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_portfolio.id_user', 'left')
            ->join('tb_client', 'tb_client.id_client = tb_portfolio.id_client', 'left')
            ->join('tb_layanan', 'tb_layanan.judul_layanan = tb_portfolio.nama_layanan', 'left')
            ->where('id_portfolio', $id_portfolio)
            ->get()->getRow();
    }

    public function tambah()
    {
        $file = $this->request->getFile('image');
        $gambar = null;

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambar = $file->getRandomName();
            $file->move(FCPATH . 'assets/img/portfolio/', $gambar);
        }

        $data = [
            'id_user'           => $this->session->get('id_user'),
            'nama_layanan'      => $this->request->getPost('layanan'),
            'id_client'         => $this->request->getPost('client'),
            'judul_portfolio'   => htmlspecialchars($this->request->getPost('judul')),
            'slug_portfolio'    => url_title($this->request->getPost('judul'), '-', true),
            'isi_portfolio'     => $this->request->getPost('isi'),
            'gambar_portfolio'  => $gambar,
            'website_portfolio' => $this->request->getPost('website'),
            'status_portfolio'  => $this->request->getPost('status'),
            'date_project'      => $this->request->getPost('date'),
            'testimoni'         => $this->request->getPost('testimoni')
        ];

        $this->db->table('tb_portfolio')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil Membuat portfolio');
        return redirect()->to('/portfolio');
    }

    public function edit($data)
    {
        return $this->db->table('tb_portfolio')
            ->where('id_portfolio', $data['id_portfolio'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tb_portfolio')
            ->where('id_portfolio', $data['id_portfolio'])
            ->delete();

        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/portfolio');
    }

    public function read($slug_portfolio)
    {
        return $this->db->table('tb_portfolio')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_portfolio.id_user', 'left')
            ->join('tb_client', 'tb_client.id_client = tb_portfolio.id_client', 'left')
            ->join('tb_layanan', 'tb_layanan.judul_layanan = tb_portfolio.nama_layanan', 'left')
            ->where('slug_portfolio', $slug_portfolio)
            ->get()->getRow();
    }

    public function recent_portfolio()
    {
        return $this->db->table('tb_portfolio')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_portfolio.id_user', 'left')
            ->join('tb_layanan', 'tb_layanan.judul_layanan = tb_portfolio.nama_layanan', 'left')
            ->orderBy('id_portfolio', 'DESC')
            ->limit(6)
            ->get()->getResult();
    }

    public function lastst_portfolio()
    {
        return $this->db->table('tb_portfolio')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_portfolio.id_user', 'left')
            ->join('tb_layanan', 'tb_layanan.judul_layanan = tb_portfolio.nama_layanan', 'left')
            ->orderBy('id_portfolio', 'DESC')
            ->limit(10)
            ->get()->getResult();
    }
}