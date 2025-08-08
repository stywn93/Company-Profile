<?php

namespace App\Models;

use CodeIgniter\Model;

class M_layanan extends Model
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
        return $this->db->table('tb_layanan')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_layanan.id_user', 'left')
            ->orderBy('id_layanan', 'desc')
            ->get()->getResult();
    }

    public function detail($id_layanan)
    {
        return $this->db->table('tb_layanan')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_layanan.id_user', 'left')
            ->where('id_layanan', $id_layanan)
            ->get()->getRow();
    }

    public function tambah()
    {
        $user   = $this->session->get('id_user');
        $judul  = $this->request->getPost('judul', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $slug   = url_title($judul, '-', true);
        $isi    = $this->request->getPost('isi');
        $status = $this->request->getPost('status');

        $gambar = null;
        $file   = $this->request->getFile('image');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambar = $file->getRandomName();
            $file->move(FCPATH . 'assets/img/layanan/', $gambar);
        }

        $data = [
            'id_user'        => $user,
            'slug_layanan'   => $slug,
            'judul_layanan'  => $judul,
            'isi_layanan'    => $isi,
            'gambar_layanan' => $gambar,
            'status_layanan' => $status,
        ];

        $this->db->table('tb_layanan')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil Membuat Layanan');
        return redirect()->to('/layanan');
    }

    public function edit($data)
    {
        return $this->db->table('tb_layanan')
            ->where('id_layanan', $data['id_layanan'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tb_layanan')
            ->where('id_layanan', $data['id_layanan'])
            ->delete();

        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/layanan');
    }

    public function read($slug_layanan)
    {
        return $this->db->table('tb_layanan')
            ->where('slug_layanan', $slug_layanan)
            ->get()->getRow();
    }
}