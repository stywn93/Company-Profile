<?php

namespace App\Models;

use CodeIgniter\Model;

class M_staff extends Model
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
        return $this->db->table('tb_staff')
            ->select('*')
            ->join('tb_kategori_staff', 'tb_kategori_staff.id_kategori = tb_staff.id_kategori', 'left')
            ->orderBy('id_staff', 'DESC')
            ->get()->getResult();
    }

    public function detail($id_staff)
    {
        return $this->db->table('tb_staff')
            ->select('*')
            ->join('tb_kategori_staff', 'tb_kategori_staff.id_kategori = tb_staff.id_kategori', 'left')
            ->where('id_staff', $id_staff)
            ->get()->getRow();
    }

    public function tambah()
    {
        $gambarStaff = null;
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambarStaff = $file->getRandomName();
            $file->move(FCPATH . 'assets/img/staff/', $gambarStaff);
        }

        $data = [
            'id_kategori'  => $this->request->getPost('jabatan'),
            'nama_staff'   => htmlspecialchars($this->request->getPost('name')),
            'email_staff'  => htmlspecialchars($this->request->getPost('email')),
            'alamat'       => $this->request->getPost('alamat'),
            'no_telepon'   => $this->request->getPost('no'),
            'gambar_staff' => $gambarStaff,
            'publish'      => $this->request->getPost('status'),
            'gender'       => $this->request->getPost('gender'),
        ];

        $this->db->table('tb_staff')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil Membuat Staff');
        return redirect()->to('/staff');
    }

    public function edit($data)
    {
        return $this->db->table('tb_staff')
            ->where('id_staff', $data['id_staff'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tb_staff')
            ->where('id_staff', $data['id_staff'])
            ->delete();

        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/staff');
    }

    public function read($slug_berita)
    {
        return $this->db->table('tb_staff')
            ->select('*')
            ->join('tb_user', 'tb_user.id_user = tb_staff.id_user', 'left')
            ->join('tb_kategori_staff', 'tb_kategori_staff.id_kategori = tb_staff.id_kategori', 'left')
            ->where('slug_berita', $slug_berita)
            ->get()->getRow();
    }
}