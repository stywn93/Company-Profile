<?php

namespace App\Controllers;

use App\Models\M_user;
use App\Models\M_setting;
use CodeIgniter\Controller;

class User extends Controller
{
    protected $userModel;
    protected $settingModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['form', 'url', 'user']);
        $this->userModel    = new M_user();
        $this->settingModel = new M_setting();
        $this->session      = session();
        $this->validation   = \Config\Services::validation();
    }

    private function currentUser()
    {
        return db_connect()
            ->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()
            ->getRowArray();
    }

    public function profile()
    {
        $setting = $this->settingModel->daftar();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Profile',
            'isi'     => 'back_end/user/v_profile',
            'user'    => $this->currentUser(),
            'image'   => $setting->image
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function edit()
    {
        $this->validation->setRules([
            'nama' => 'required|trim'
        ]);

        if ($this->validation->withRequest($this->request)->run()) {
            return $this->userModel->editProfile();
        }
    }

    public function changepassword()
    {
        changepassword_validation();
        if ($this->request->getMethod() === 'GET') {
            
            $setting = $this->settingModel->daftar();
            $data = [
                'title'    => $setting->nama_perusahaan,
                'subtitle' => 'Ubah Password',
                'isi'     => 'back_end/user/v_change_password',
                'user'    => $this->currentUser(),
                'image'   => $setting->image
            ];
            if (!$this->validation->withRequest($this->request)->run()) {
                return view('back_end/layout/v_wrapper', $data);
            }
        } else if ($this->request->getMethod() === 'POST') {
            return $this->userModel->changePassword();
        }
    }

    public function blocked()
    {
        $setting = $this->settingModel->daftar();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Akses Di Tolak',
            'isi'     => 'v_login',
            'image'   => $setting->image
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function daftar_user()
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to('/blocked');
        }

        $setting = $this->settingModel->daftar();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Daftar User',
            'isi'     => 'back_end/user/v_daftar_user',
            'user'    => $this->currentUser(),
            'image'   => $setting->image,
            'users'   => $this->userModel->daftarUser()
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function addUser()
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to('/blocked');
        }

        addUser_validation();

        if (!$this->validation->withRequest($this->request)->run()) {
            return $this->daftar_user();
        }

        return $this->userModel->addUser();
    }

    public function editUser($id_user)
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to('/blocked');
        }

        $data = [
            'id_user'   => $id_user,
            'role_id'   => $this->request->getPost('role_id'),
            'is_active' => $this->request->getPost('is_active')
        ];

        return $this->userModel->editUser($data);
    }

    public function hapus($id_user)
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to('/blocked');
        }

        return $this->userModel->hapus(['id_user' => $id_user]);
    }
}
