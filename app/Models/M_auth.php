<?php

namespace App\Models;

use CodeIgniter\Model;

class M_auth extends Model
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

    public function login()
    {
        $email    = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $user = $this->db->table('tb_user')->where('email', $email)->get()->getRowArray();

        if ($user) {
            if ($user['is_active'] == 1) {
                if (password_verify($password, $user['password'])) {
                    $data = [
                        'id_user' => $user['id_user'],
                        'email'   => $user['email'],
                        'role_id' => $user['role_id'],
                        'isLoggedIn' => true,
                    ];
                    $this->session->set($data);
                    $this->session->setFlashdata('success', 'Selamat Datang ' . $user['nama']);
                    // dd(session()->get()); die();
                    return redirect()->to(base_url('dashboard'));
                } else {
                    $this->session->setFlashdata('error', 'Password Salah');
                }
            } else {
                $this->session->setFlashdata('success', 'Selamat, akun anda berhasil diregistrasi');
            }
        } else {
            $this->session->setFlashdata('warning', 'Akun Tidak Ditemukan');
        }

        return redirect()->to(base_url('auth'));
        
    }

    public function register()
    {
        $email = htmlspecialchars($this->request->getPost('email', FILTER_SANITIZE_EMAIL));
        $data = [
            'nama'         => htmlspecialchars($this->request->getPost('nama_lengkap')),
            'email'        => $email,
            'image'        => 'default.png',
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id'      => 2,
            'is_active'    => 1,
            'date_created' => time()
        ];

        $token = base64_encode(random_bytes(32));
        $user_token = [
            'email'        => $email,
            'token'        => $token,
            'date_created' => time()
        ];

        $this->db->table('tb_user')->insert($data);
        $this->db->table('tb_user_token')->insert($user_token);

        // $this->_sendEmail($token, 'verify');

        $this->session->setFlashdata('success', 'Selamat, akun anda berhasil diregistrasi');
        return redirect()->to('/auth');
    }

    public function forgotPassword()
    {
        $email = $this->request->getPost('email');
        $user  = $this->db->table('tb_user')->where(['email' => $email, 'is_active' => 1])->get()->getRowArray();

        if ($user) {
            $token = base64_encode(random_bytes(32));
            $user_token = [
                'email'        => $email,
                'token'        => $token,
                'date_created' => time()
            ];

            $this->db->table('tb_user_token')->insert($user_token);
            // $this->_sendEmail($token, 'forgot');

            $this->session->setFlashdata('success', 'Berhasil, Silahkan Cek Email');
        } else {
            $this->session->setFlashdata('error', 'Email Belum Terdaftar / Belum Aktif');
        }

        return redirect()->to('/auth/forgotpassword');
    }

    public function changePassword()
    {
        $password = password_hash($this->request->getPost('password'), PASSWORD_DEFAULT);
        $email    = $this->session->get('reset_email');

        $this->db->table('tb_user')->where('email', $email)->update(['password' => $password]);
        $this->db->table('tb_user_token')->where('email', $email)->delete();

        $this->session->remove('reset_email');
        $this->session->setFlashdata('success', 'Berhasil, Password telah diganti, silakan login');

        return redirect()->to('/auth');
    }
}