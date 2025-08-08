<?php

namespace App\Models;

use CodeIgniter\Model;

class M_client extends Model
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
        return $this->db->table('tb_client')
            ->select('*')
            ->join('tb_kategori_client', 'tb_kategori_client.id_kategori = tb_client.jenis_client', 'left')
            ->orderBy('id_client', 'DESC')
            ->get()->getResult();
    }

    public function detail($id_client)
    {
        return $this->db->table('tb_client')
            ->select('*')
            ->join('tb_kategori_client', 'tb_kategori_client.id_kategori = tb_client.jenis_client', 'left')
            ->where('id_client', $id_client)
            ->get()->getRow();
    }

    public function tambah()
    {
        $gambarclient = null;
        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $gambarclient = $file->getRandomName();
            $file->move(FCPATH . 'assets/img/client/', $gambarclient);
        }

        $data = [
            'jenis_client'  => $this->request->getPost('jenis'),
            'nama_client'   => htmlspecialchars($this->request->getPost('name', FILTER_SANITIZE_STRING)),
            'email_client'  => htmlspecialchars($this->request->getPost('email', FILTER_SANITIZE_EMAIL)),
            'website'       => $this->request->getPost('website'),
            'alamat'        => $this->request->getPost('alamat'),
            'no_telepon'    => $this->request->getPost('no'),
            'gambar_client' => $gambarclient,
            'publish'       => $this->request->getPost('status'),
        ];

        $this->db->table('tb_client')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil membuat client');
        return redirect()->to('/client');
    }

    public function edit($data)
    {
        return $this->db->table('tb_client')
            ->where('id_client', $data['id_client'])
            ->update($data);
    }

    public function hapus($data)
    {
        $this->db->table('tb_client')->where('id_client', $data['id_client'])->delete();
        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/client');
    }
}