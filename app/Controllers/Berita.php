<?php

namespace App\Controllers;

use App\Models\M_berita;
use App\Models\M_kategori;
use App\Models\M_Setting;
use CodeIgniter\Controller;

class Berita extends Controller
{
    protected $beritaModel;
    protected $kategoriModel;
    protected $settingModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['form', 'url', 'berita']);
        // is_logged_in(); // pastikan fungsi helper ini tersedia dan aman dipanggil

        $this->beritaModel   = new M_berita();
        $this->kategoriModel = new M_kategori();
        $this->settingModel  = new M_Setting();
        $this->session       = session();
        $this->validation    = \Config\Services::validation();
    }

    public function index()
    {
        $setting = $this->settingModel->daftar();
        $user = db_connect()
            ->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()
            ->getRowArray();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Daftar Berita',
            'isi'      => 'back_end/berita/v_daftar',
            'berita'   => $this->beritaModel->daftar(),
            'user'     => $user,
            'image'    => $setting->image
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function tambah()
    {
        tambah_validation();

        if (!$this->validation->withRequest($this->request)->run()) {
            $setting = $this->settingModel->daftar();
            $user = db_connect()
                ->table('tb_user')
                ->where('email', $this->session->get('email'))
                ->get()
                ->getRowArray();

            $data = [
                'title'    => $setting->nama_perusahaan,
                'subtitle' => 'Tulis Berita',
                'isi'      => 'back_end/berita/v_tambah_berita',
                'kategori' => $this->kategoriModel->daftarKategoriBerita(),
                'user'     => $user,
                'image'    => $setting->image,
                'validation' => $this->validation
            ];

            return view('back_end/layout/v_wrapper', $data);
        }

        return $this->beritaModel->tambah();
    }

    public function edit($id_berita)
    {
        tambah_validation();

        $setting = $this->settingModel->daftar();
        $user = db_connect()
            ->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()
            ->getRowArray();

        $berita = $this->beritaModel->detail($id_berita);
        $file = $this->request->getFile('image');

        if ($this->validation->withRequest($this->request)->run()) {
            $slug = url_title($this->request->getPost('judul'), '-', true);

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!empty($berita->gambar_berita)) {
                    @unlink(FCPATH . 'assets/img/berita/' . $berita->gambar_berita);
                }
                $newName = $file->getRandomName();
                $file->move(FCPATH . 'assets/img/berita/', $newName);
            } else {
                $newName = $berita->gambar_berita ?? null;
            }

            $data = [
                'id_berita'     => $id_berita,
                'id_kategori'   => $this->request->getPost('kategori'),
                'slug_berita'   => $slug,
                'judul_berita'  => $this->request->getPost('judul'),
                'isi_berita'    => $this->request->getPost('isi'),
                'jenis_berita'  => $this->request->getPost('jenis_berita'),
                'status_berita' => $this->request->getPost('status'),
                'gambar_berita' => $newName,
                'keywords'      => $this->request->getPost('keywords'),
                'last_modified' => date('Y-m-d'),
            ];

            $this->beritaModel->edit($data);
            $this->session->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/berita');
        }

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Edit Berita',
            'isi'      => 'back_end/berita/v_edit',
            'kategori' => $this->kategoriModel->daftarKategoriBerita(),
            'berita'   => $berita,
            'user'     => $user,
            'image'    => $setting->image,
            'validation' => $this->validation,
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function hapus($id_berita)
    {
        $berita = $this->beritaModel->detail($id_berita);
        if (!empty($berita->gambar_berita)) {
            @unlink(FCPATH . 'assets/img/berita/' . $berita->gambar_berita);
        }

        $this->beritaModel->hapus(['id_berita' => $id_berita]);
        $this->session->setFlashdata('success', 'Berita telah dihapus');
        return redirect()->to('/berita');
    }
}