<?php

namespace App\Models;

use CodeIgniter\Model;

class M_kategori extends Model
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

    // === KATEGORI BERITA ===
    public function daftarKategoriBerita()
    {
        return $this->db->table('tb_kategori_berita')
            ->orderBy('id_kategori', 'DESC')
            ->get()->getResult();
    }

    public function tambahKategoriBerita()
    {
        $name = $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $slug = url_title($name, '-', true);

        $data = [
            'slug-kategori' => $slug,
            'nama_kategori' => $name
        ];

        $this->db->table('tb_kategori_berita')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil Membuat Kategori ' . $name);
        return redirect()->to(base_url('kategori/kategoriberita'));
    }

    public function editKategoriBerita($kategori)
    {
        $this->db->table('tb_kategori_berita')
            ->where('id_kategori', $kategori['id_kategori'])
            ->update([
                'slug-kategori' => $kategori['slug_kategori'],
                'nama_kategori' => $kategori['nama_kategori'],
            ]);

        $this->session->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to(base_url('kategori/kategoriberita'));
    }

    public function hapusKategoriBerita($kategori)
    {
        $this->db->table('tb_kategori_berita')
            ->where('id_kategori', $kategori['id_kategori'])
            ->delete();

        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('kategori/kategoriberita'));
    }

    // === KATEGORI STAFF ===
    public function daftarKategoriStaff()
    {
        return $this->db->table('tb_kategori_staff')
            ->orderBy('id_kategori', 'DESC')
            ->get()->getResult();
    }

    public function tambahKategoriStaff()
    {
        $name = $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $slug = url_title($name, '-', true);

        $data = [
            'slug_kategori' => $slug,
            'nama_kategori' => $name
        ];

        $this->db->table('tb_kategori_staff')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil Membuat Kategori ' . $name);
        return redirect()->to(base_url('kategori/kategoristaff'));
    }

    public function editKategoriStaff($kategori)
    {
        $this->db->table('tb_kategori_staff')
            ->where('id_kategori', $kategori['id_kategori'])
            ->update([
                'slug_kategori' => $kategori['slug_kategori'],
                'nama_kategori' => $kategori['nama_kategori']
            ]);

        $this->session->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to(base_url('kategori/kategoristaff'));
    }

    public function hapusKategoriStaff($kategori)
    {
        $this->db->table('tb_kategori_staff')
            ->where('id_kategori', $kategori['id_kategori'])
            ->delete();

        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('kategori/kategoristaff'));
    }

    // === KATEGORI CLIENT ===
    public function daftarKategoriClient()
    {
        return $this->db->table('tb_kategori_client')
            ->orderBy('id_kategori', 'DESC')
            ->get()->getResult();
    }

    public function tambahKategoriClient()
    {
        $name = $this->request->getPost('name', FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $slug = url_title($name, '-', true);

        $data = [
            'slug_kategori' => $slug,
            'nama_kategori' => $name
        ];

        $this->db->table('tb_kategori_client')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil Membuat Kategori ' . $name);
        return redirect()->to(base_url('kategori/kategoriclient'));
    }

    public function editKategoriClient($kategori)
    {
        $this->db->table('tb_kategori_client')
            ->where('id_kategori', $kategori['id_kategori'])
            ->update([
                'slug_kategori' => $kategori['slug_kategori'],
                'nama_kategori' => $kategori['nama_kategori']
            ]);

        $this->session->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to(base_url('kategori/kategoriclient'));
    }

    public function hapusKategoriClient($kategori)
    {
        $this->db->table('tb_kategori_client')
            ->where('id_kategori', $kategori['id_kategori'])
            ->delete();

        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to(base_url('kategori/kategoriclient'));
    }
}