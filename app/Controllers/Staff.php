<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_Setting;
use App\Models\M_staff;
use CodeIgniter\Controller;

class Staff extends Controller
{
    protected $kategoriModel;
    protected $settingModel;
    protected $staffModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['staff', 'form', 'url']);

        $this->kategoriModel = new M_kategori();
        $this->settingModel  = new M_Setting();
        $this->staffModel    = new M_staff();
        $this->session       = session();
        $this->validation    = \Config\Services::validation();
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
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Daftar Staff',
            'isi'     => 'back_end/staff/v_daftar',
            'user'    => $this->getUser(),
            'staff'   => $this->staffModel->daftar(),
            'image'   => $setting->image
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function tambahStaff()
    {
        addStaff_validation();
        if ($this->request->getMethod() === 'GET') {
            if (!$this->validation->withRequest($this->request)->run()) {
                if ($this->session->get('role_id') != '1') {
                    return redirect()->to('/blocked');
                }

                $setting = $this->settingModel->daftar();

                $data = [
                    'title'    => $setting->nama_perusahaan,
                    'subtitle' => 'Tambah Staff',
                    'isi'     => 'back_end/staff/v_tambah_staff',
                    'user'    => $this->getUser(),
                    'kategori' => $this->kategoriModel->daftarKategoriStaff(),
                    'image'   => $setting->image,
                    'validation' => $this->validation
                ];
                return view('back_end/layout/v_wrapper', $data);
            }
        } else if ($this->request->getMethod() === 'POST') {
            if ($this->validation->withRequest($this->request)->run()) {
                return $this->staffModel->tambah();
            }
        }
    }

    public function edit($id_staff)
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to('/blocked');
        }

        editStaff_validation();

        $setting = $this->settingModel->daftar();
        $staff   = $this->staffModel->detail($id_staff);
        $file    = $this->request->getFile('image');

        if ($this->request->getMethod() === 'GET') {
            if (!$this->validation->withRequest($this->request)->run()) {
                $data = [
                    'title'    => $setting->nama_perusahaan,
                    'subtitle' => 'Edit Staff',
                    'isi'     => 'back_end/staff/v_edit',
                    'staff'   => $staff,
                    'user'    => $this->getUser(),
                    'kategori' => $this->kategoriModel->daftarKategoriStaff(),
                    'image'   => $setting->image,
                    'validation' => $this->validation
                ];
                return view('back_end/layout/v_wrapper', $data);
            }
        }
        // If the request method is POST and validation passes
        if ($this->request->getMethod() === 'POST') {
            if ($this->validation->withRequest($this->request)->run()) {
                $imageName = $staff->gambar_staff;

                if ($file && $file->isValid() && !$file->hasMoved()) {
                    if (!empty($imageName)) {
                        @unlink(FCPATH . 'assets/img/staff/' . $imageName);
                    }
                    $imageName = $file->getRandomName();
                    $file->move(FCPATH . 'assets/img/staff/', $imageName);
                }

                $data = [
                    'id_staff'      => $id_staff,
                    'id_kategori'   => $this->request->getPost('jabatan'),
                    'nama_staff'    => $this->request->getPost('name'),
                    'email_staff'   => $this->request->getPost('email'),
                    'alamat'        => $this->request->getPost('alamat'),
                    'no_telepon'    => $this->request->getPost('no'),
                    'gender'        => $this->request->getPost('gender'),
                    'publish'       => $this->request->getPost('status'),
                    'gambar_staff'  => $imageName,
                    'last_modified' => date('Y-m-d'),
                ];

                $this->staffModel->edit($data);
                $this->session->setFlashdata('success', 'Berhasil mengedit data');
                return redirect()->to(base_url('staff'));
            }
        }
    }

    public function detail($id_staff)
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to('/blocked');
        }

        $setting = $this->settingModel->daftar();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Detail Staff',
            'isi'     => 'back_end/staff/v_detail',
            'staff'   => $this->staffModel->detail($id_staff),
            'user'    => $this->getUser(),
            'kategori' => $this->kategoriModel->daftarKategoriStaff(),
            'image'   => $setting->image,
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function hapus($id_staff)
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to(base_url('blocked'));
        }

        $staff = $this->staffModel->detail($id_staff);

        if (!empty($staff->gambar_staff)) {
            @unlink(FCPATH . 'assets/img/staff/' . $staff->gambar_staff);
        }

        $this->staffModel->hapus(['id_staff' => $id_staff]);
        $this->session->setFlashdata('success', 'Staff berhasil dihapus');
        return redirect()->to(base_url('staff'));
    }
}
