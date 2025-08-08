<?php

namespace App\Controllers;

use App\Models\M_Auth;
use App\Models\M_setting;
use CodeIgniter\Controller;

class Auth extends Controller
{
    protected $session;
    protected $validation;
    protected $email;
    protected $authModel;
    protected $settingModel;

    public function __construct()
    {
        helper('auth');
        helper('form');

        $this->session      = session();
        $this->validation   = \Config\Services::validation();
        $this->email        = \Config\Services::email();
        $this->authModel    = new M_Auth();
        $this->settingModel = new M_setting();
    }

    public function index()
    {
        // lakukan verifikasi method yang masuk
        if ($this->request->getMethod() === 'GET') {
            $setting = $this->settingModel->daftar();
            login_validation();
            if (!$this->validation->withRequest($this->request)->run()) {
                $data = [
                    'title'    => $setting->nama_perusahaan,
                    'subtitle' => 'Login',
                    'isi'      => 'v_login',
                    'image'    => $setting->image,
                    'validation' => $this->validation,
                ];
            }
            return view('auth/v_login', $data);
        } elseif ($this->request->getMethod() === 'POST') {
            return $this->authModel->login();
        }
    }

    public function register()
    {
        $setting = $this->settingModel->daftar();

        if ($this->session->get('email')) {
            return redirect()->to('/dashboard');
        }

        register_validation();

        if (!$this->validation->withRequest($this->request)->run()) {
            $data = [
                'title'    => $setting->nama_perusahaan,
                'subtitle' => 'Register',
                'isi'      => 'v_register',
                'image'    => $setting->image,
                'validation' => $this->validation,
            ];
            return view('auth/v_register', $data);
        }

        return $this->authModel->register();
    }

    public function verify()
    {
        return $this->authModel->verify();
    }

    public function forgotpassword()
    {
        $setting = $this->settingModel->daftar();

        if ($this->session->get('email')) {
            return redirect()->to('/dashboard');
        }

        forgot_validation();

        if (!$this->validation->withRequest($this->request)->run()) {
            $data = [
                'title'    => $setting->nama_perusahaan,
                'subtitle' => 'Lupa Password',
                'isi'      => 'v_forgotpass',
                'image'    => $setting->image,
                'validation' => $this->validation,
            ];
            return view('auth/v_forgotpass', $data);
        }

        return $this->authModel->forgotPassword();
    }

    public function resetPassword()
    {
        $email = $this->request->getGet('email');
        $token = $this->request->getGet('token');

        $db = \Config\Database::connect();

        $user = $db->table('tb_user')->where('email', $email)->get()->getRowArray();

        if ($user) {
            $user_token = $db->table('tb_user_token')->where('token', $token)->get()->getRowArray();

            if ($user_token) {
                $this->session->set('reset_email', $email);
                return $this->changePassword();
            } else {
                $this->session->setFlashdata('error', 'Reset Password Gagal, Token Salah');
                return redirect()->to('/auth');
            }
        } else {
            $this->session->setFlashdata('error', 'Reset Password Gagal, Email Belum Terdaftar');
            return redirect()->to('/auth');
        }
    }

    public function changePassword()
    {
        $setting = $this->settingModel->daftar();

        if ($this->session->get('email')) {
            return redirect()->to('/dashboard');
        }

        changepass_validation();

        if (!$this->validation->withRequest($this->request)->run()) {
            $data = [
                'title'    => $setting->nama_perusahaan,
                'subtitle' => 'Ubah Password',
                'isi'      => 'v_changepass',
                'image'    => $setting->image,
                'validation' => $this->validation,
            ];
            return view('auth/v_changepass', $data);
        }

        return $this->authModel->changePassword();
    }

    public function logout()
    {
        $this->session->remove(['email', 'role_id']);
        $this->session->setFlashdata('success', 'Anda Berhasil Logout');
        return redirect()->to(base_url('auth'));
    }
}
