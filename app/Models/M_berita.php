<?php

namespace App\Models;

use CodeIgniter\Model;

class M_berita extends Model
{
    protected $db;
    protected $session;
    protected $request;
    protected $upload;

    public function __construct()
    {
        parent::__construct();
        $this->db      = db_connect();
        $this->session = session();
        $this->request = \Config\Services::request();
        $this->upload  = \Config\Services::upload(); // untuk upload image
    }

    public function daftar()
    {
        return $this->db->table('tb_berita')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_berita.id_user', 'left')
            ->join('tb_kategori_berita', 'tb_kategori_berita.id_kategori = tb_berita.id_kategori', 'left')
            ->orderBy('id_berita', 'DESC')
            ->get()->getResult();
    }

    public function detail($id_berita)
    {
        return $this->db->table('tb_berita')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_berita.id_user', 'left')
            ->join('tb_kategori_berita', 'tb_kategori_berita.id_kategori = tb_berita.id_kategori', 'left')
            ->where('id_berita', $id_berita)
            ->get()->getRow();
    }

    public function tambah()
    {
        $user     = $this->session->get('id_user');
        $kategori = $this->request->getPost('kategori');
        $judul    = $this->request->getPost('judul');
        $slug     = url_title($judul, '-', true);
        $isi      = $this->request->getPost('isi');
        $status   = $this->request->getPost('status');
        $jenis    = $this->request->getPost('jenis_berita');
        $keywords = $this->request->getPost('keywords');

        $gambarBertia = null;
        $file = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambarBertia = $file->getRandomName();
            $file->move(FCPATH . 'assets/img/berita/', $gambarBertia);
        }

        $data = [
            'id_user'       => $user,
            'id_kategori'   => $kategori,
            'slug_berita'   => htmlspecialchars($slug),
            'judul_berita'  => htmlspecialchars($judul),
            'isi_berita'    => $isi,
            'gambar_berita' => $gambarBertia,
            'status_berita' => $status,
            'jenis_berita'  => $jenis,
            'keywords'      => htmlspecialchars($keywords),
        ];

        $this->db->table('tb_berita')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil Membuat Berita');
        return redirect()->to('/berita');
    }

    public function edit($data)
    {
        return $this->db->table('tb_berita')
            ->where('id_berita', $data['id_berita'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tb_berita')->where('id_berita', $data['id_berita'])->delete();
        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/berita');
    }

    public function read($slug_berita)
    {
        return $this->db->table('tb_berita')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_berita.id_user', 'left')
            ->join('tb_kategori_berita', 'tb_kategori_berita.id_kategori = tb_berita.id_kategori', 'left')
            ->where('slug_berita', $slug_berita)
            ->get()->getRow();
    }

    public function recent_berita()
    {
        return $this->db->table('tb_berita')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_berita.id_user', 'left')
            ->join('tb_kategori_berita', 'tb_kategori_berita.id_kategori = tb_berita.id_kategori', 'left')
            ->orderBy('id_berita', 'DESC')
            ->limit(6)
            ->get()->getResult();
    }

    public function lastst_berita()
    {
        return $this->db->table('tb_berita')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_berita.id_user', 'left')
            ->join('tb_kategori_berita', 'tb_kategori_berita.id_kategori = tb_berita.id_kategori', 'left')
            ->orderBy('id_berita', 'DESC')
            ->limit(10)
            ->get()->getResult();
    }
}