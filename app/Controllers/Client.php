<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_Setting;
use App\Models\M_client;
use CodeIgniter\Controller;

class Client extends Controller
{
    protected $kategoriModel;
    protected $settingModel;
    protected $clientModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['client', 'form', 'url']);

        $this->kategoriModel = new M_kategori();
        $this->settingModel  = new M_Setting();
        $this->clientModel   = new M_client();
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
            'subtitle' => 'Daftar client',
            'isi'      => 'back_end/client/v_daftar',
            'client'   => $this->clientModel->daftar(),
            'user'     => $user,
            'image'    => $setting->image,
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function tambahClient()
    {
        addclient_validation();
        if ($this->request->getMethod() === 'GET') {
            if (!$this->validation->withRequest($this->request)->run()) {
                $setting = $this->settingModel->daftar();
                $user = db_connect()
                    ->table('tb_user')
                    ->where('email', $this->session->get('email'))
                    ->get()
                    ->getRowArray();

                $data = [
                    'title'    => $setting->nama_perusahaan,
                    'subtitle' => 'Tambah client',
                    'isi'      => 'back_end/client/v_tambah',
                    'user'     => $user,
                    'kategori' => $this->kategoriModel->daftarKategoriclient(),
                    'image'    => $setting->image,
                    'validation' => $this->validation,
                ];

                return view('back_end/layout/v_wrapper', $data);
            }
        } elseif ($this->request->getMethod() === 'POST') {
            if ($this->validation->withRequest($this->request)->run()) {
                return $this->clientModel->tambah();
            }
        }
    }

    public function edit($id_client)
    {
        editclient_validation();

        $setting = $this->settingModel->daftar();
        $client  = $this->clientModel->detail($id_client);
        $user    = db_connect()
                    ->table('tb_user')
                    ->where('email', $this->session->get('email'))
                    ->get()
                    ->getRowArray();

        if ($this->validation->withRequest($this->request)->run()) {
            $file = $this->request->getFile('image');
            $imageName = $client->gambar_client;

            if ($file && $file->isValid() && !$file->hasMoved()) {
                if ($imageName) {
                    @unlink(FCPATH . 'assets/img/client/' . $imageName);
                }

                $imageName = $file->getRandomName();
                $file->move(FCPATH . 'assets/img/client/', $imageName);
            }

            $data = [
                'id_client'     => $id_client,
                'jenis_client'  => $this->request->getPost('jenis'),
                'nama_client'   => $this->request->getPost('name'),
                'email_client'  => $this->request->getPost('email'),
                'alamat'        => $this->request->getPost('alamat'),
                'no_telepon'    => $this->request->getPost('no'),
                'website'       => $this->request->getPost('website'),
                'gambar_client' => $imageName,
                'publish'       => $this->request->getPost('status'),
                'last_modified' => date('Y-m-d'),
            ];

            $this->clientModel->edit($data);
            $this->session->setFlashdata('success', 'Berhasil mengedit data');
            return redirect()->to('/client');
        }

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Edit client',
            'isi'      => 'back_end/client/v_edit',
            'user'     => $user,
            'client'   => $client,
            'kategori' => $this->kategoriModel->daftarKategoriclient(),
            'image'    => $setting->image,
            'validation' => $this->validation,
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function hapus($id_client)
    {
        $client = $this->clientModel->detail($id_client);

        if (!empty($client->gambar_client)) {
            @unlink(FCPATH . 'assets/img/client/' . $client->gambar_client);
        }

        $this->clientModel->hapus(['id_client' => $id_client]);
        $this->session->setFlashdata('success', 'Data client berhasil dihapus');
        return redirect()->to('/client');
    }
}