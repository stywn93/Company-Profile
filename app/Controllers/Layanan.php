<?php

namespace App\Controllers;

use App\Models\M_layanan;
use App\Models\M_Setting;
use CodeIgniter\Controller;

class Layanan extends Controller
{
    protected $layananModel;
    protected $settingModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['form', 'url', 'layanan']);
        $this->layananModel = new M_layanan();
        $this->settingModel = new M_Setting();
        $this->session      = session();
        $this->validation   = \Config\Services::validation();
    }

    private function loadUser()
    {
        return db_connect()
            ->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()
            ->getRowArray();
    }

    public function index()
    {
        $setting = $this->settingModel->daftar();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Daftar layanan',
            'isi'     => 'back_end/layanan/v_daftar',
            'user'    => $this->loadUser(),
            'image'   => $setting->image,
            'layanan' => $this->layananModel->daftar(),
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function tambah()
    {
        tambah_validation();
        if ($this->request->getMethod() === 'GET') {
            $setting = $this->settingModel->daftar();
            $data = [
                'title'     => $setting->nama_perusahaan,
                'subtitle'  => 'Tambah layanan',
                'isi'       => 'back_end/layanan/v_tambah',
                'user'      => $this->loadUser(),
                'image'     => $setting->image,
                'validation' => $this->validation
            ];
            // echo 'im GET';
            // if ($this->validation->withRequest($this->request)->run()) {
            return view('back_end/layout/v_wrapper', $data);
            // }
        } else if ($this->request->getMethod() === 'POST') {
            if ($this->validation->withRequest($this->request)->run()) {
                return $this->layananModel->tambah();
            }
            return redirect()->to(base_url('layanan'));
        }
    }

    public function edit($id_layanan)
    {
        tambah_validation();

        $layanan = $this->layananModel->detail($id_layanan);
        $setting = $this->settingModel->daftar();
        $user    = $this->loadUser();

        if ($this->validation->withRequest($this->request)->run()) {
            $file      = $this->request->getFile('image');
            $slug      = url_title($this->request->getPost('judul'), '-', true);
            $newImage  = $layanan->gambar_layanan;

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if (!empty($newImage)) {
                    @unlink(FCPATH . 'assets/img/layanan/' . $newImage);
                }
                $newImage = $file->getRandomName();
                $file->move(FCPATH . 'assets/img/layanan/', $newImage);
            }

            $data = [
                'id_layanan'     => $id_layanan,
                'slug_layanan'   => $slug,
                'judul_layanan'  => $this->request->getPost('judul'),
                'isi_layanan'    => $this->request->getPost('isi'),
                'status_layanan' => $this->request->getPost('status'),
                'gambar_layanan' => $newImage,
                'last_modified'  => date('Y-m-d'),
            ];

            $this->layananModel->edit($data);
            $this->session->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/layanan');
        }

        $data = [
            'title'     => $setting->nama_perusahaan,
            'subtitle'  => 'Edit Layanan',
            'isi'       => 'back_end/layanan/v_edit',
            'layanan'   => $layanan,
            'user'      => $user,
            'image'     => $setting->image,
            'validation' => $this->validation
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function hapus($id_layanan)
    {
        $layanan = $this->layananModel->detail($id_layanan);

        if (!empty($layanan->gambar_layanan)) {
            @unlink(FCPATH . 'assets/img/layanan/' . $layanan->gambar_layanan);
        }

        $this->layananModel->hapus(['id_layanan' => $id_layanan]);
        $this->session->setFlashdata('success', 'Layanan berhasil dihapus');
        return redirect()->to('/layanan');
    }
}
