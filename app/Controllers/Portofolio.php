<?php

namespace App\Controllers;

use App\Models\M_layanan;
use App\Models\M_Setting;
use App\Models\M_portofolio;
use App\Models\M_client;
use CodeIgniter\Controller;

class Portofolio extends Controller
{
    protected $layananModel;
    protected $settingModel;
    protected $portfolioModel;
    protected $clientModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['form', 'url', 'portofolio']);

        $this->layananModel   = new M_layanan();
        $this->settingModel   = new M_Setting();
        $this->portfolioModel = new M_portofolio();
        $this->clientModel    = new M_client();
        $this->session        = session();
        $this->validation     = \Config\Services::validation();
    }

    private function getUser()
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
            'title'     => $setting->nama_perusahaan,
            'subtitle'  => 'Daftar portfolio',
            'isi'       => 'back_end/portofolio/v_daftar',
            'user'      => $this->getUser(),
            'image'     => $setting->image,
            'portfolio' => $this->portfolioModel->daftar(),
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function tambah()
    {
        tambah_validation();
        if ($this->request->getMethod() === 'GET') {
            if (!$this->validation->withRequest($this->request)->run()) {
                $setting = $this->settingModel->daftar();

                $data = [
                    'title'     => $setting->nama_perusahaan,
                    'subtitle'  => 'Tambah Portfolio',
                    'isi'       => 'back_end/portofolio/v_tambah',
                    'user'      => $this->getUser(),
                    'image'     => $setting->image,
                    'layanan'   => $this->layananModel->daftar(),
                    'client'    => $this->clientModel->daftar(),
                    'validation' => $this->validation,
                ];
                return view('back_end/layout/v_wrapper', $data);
            }
        } else if ($this->request->getMethod() === 'POST') {
            if ($this->validation->withRequest($this->request)->run()) {
                return $this->portfolioModel->tambah();
            }
        }

    }

    public function edit($id_portfolio)
    {
        tambah_validation();

        $setting   = $this->settingModel->daftar();
        $user      = $this->getUser();
        $portfolio = $this->portfolioModel->detail($id_portfolio);
        $file      = $this->request->getFile('image');

        if ($this->validation->withRequest($this->request)->run()) {
            $imageName = $portfolio->gambar_portfolio;

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if ($imageName) {
                    @unlink(FCPATH . 'assets/img/portfolio/' . $imageName);
                }
                $imageName = $file->getRandomName();
                $file->move(FCPATH . 'assets/img/portfolio/', $imageName);
            }

            $judul = $this->request->getPost('judul', FILTER_SANITIZE_STRING);
            $slug  = url_title($judul, '-', true);

            $data = [
                'id_portfolio'      => $id_portfolio,
                'nama_layanan'      => $this->request->getPost('layanan'),
                'id_client'         => $this->request->getPost('client'),
                'judul_portfolio'   => $judul,
                'slug_portfolio'    => $slug,
                'isi_portfolio'     => $this->request->getPost('isi'),
                'website_portfolio' => $this->request->getPost('website'),
                'gambar_portfolio'  => $imageName,
                'status_portfolio'  => $this->request->getPost('status'),
                'testimoni'         => $this->request->getPost('testimoni'),
                'last_modified'     => date('Y-m-d'),
                'date_project'      => $this->request->getPost('date'),
            ];

            $this->portfolioModel->edit($data);
            $this->session->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/portfolio');
        }

        $data = [
            'title'     => $setting->nama_perusahaan,
            'subtitle'  => 'Edit portfolio',
            'isi'       => 'back_end/portofolio/v_edit',
            'layanan'   => $this->layananModel->daftar(),
            'portfolio' => $portfolio,
            'user'      => $user,
            'client'    => $this->clientModel->daftar(),
            'image'     => $setting->image,
            'validation' => $this->validation
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function hapus($id_portfolio)
    {
        $portfolio = $this->portfolioModel->detail($id_portfolio);

        if (!empty($portfolio->gambar_portfolio)) {
            @unlink(FCPATH . 'assets/img/portfolio/' . $portfolio->gambar_portfolio);
        }

        $this->portfolioModel->hapus(['id_portfolio' => $id_portfolio]);
        $this->session->setFlashdata('success', 'Data portfolio berhasil dihapus');
        return redirect()->to('/portfolio');
    }
}
