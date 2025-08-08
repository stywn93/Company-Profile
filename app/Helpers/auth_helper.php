<?php

use Config\Services;
use CodeIgniter\HTTP\RedirectResponse;


if (!function_exists('register_validation')) {
    function register_validation()
    {
        $validation = Services::validation();

        $validation->setRules([
            'nama_lengkap' => [
                'label'  => 'Username',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'username belum diisi !',
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email|is_unique[tb_user.email]',
                'errors' => [
                    'required'    => 'email belum diisi !',
                    'valid_email' => 'format email tidak valid !',
                    'is_unique'   => 'email ini sudah terdaftar !'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[6]|trim',
                'errors' => [
                    'required'   => 'password belum diisi !',
                    'min_length' => 'password terlalu pendek !',
                ]
            ],
            'password-confirm' => [
                'label'  => 'Konfirmasi Password',
                'rules'  => 'required|matches[password]|trim',
                'errors' => [
                    'required' => 'Konfirmasi Password belum diisi !',
                    'matches'  => 'Password Tidak sama',
                ]
            ]
        ]);
    }
}

if (!function_exists('login_validation')) {
    function login_validation()
    {
        $validation = Services::validation();

        $validation->setRules([
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => 'email belum diisi !',
                    'valid_email' => 'format email tidak valid !'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|trim',
                'errors' => [
                    'required' => 'password belum diisi !'
                ]
            ]
        ]);
    }
}

if (!function_exists('forgot_validation')) {
    function forgot_validation()
    {
        $validation = Services::validation();

        $validation->setRules([
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => 'Email belum diisi !',
                    'valid_email' => 'format email tidak valid !'
                ]
            ]
        ]);
    }
}

if (!function_exists('changepass_validation')) {
    function changepass_validation()
    {
        $validation = Services::validation();

        $validation->setRules([
            'password' => [
                'label'  => 'Password baru',
                'rules'  => 'required|min_length[6]|trim',
                'errors' => [
                    'required'   => 'Password belum diisi !',
                    'min_length' => 'Password terlalu pendek !'
                ]
            ],
            'conf-password' => [
                'label'  => 'Password baru',
                'rules'  => 'required|matches[password]|trim',
                'errors' => [
                    'required' => 'Konfirmasi Password belum diisi !',
                    'matches'  => 'Password Tidak sama',
                ]
            ]
        ]);
    }
}

if (!function_exists('is_logged_in')) {
    function is_logged_in()
    {
        $session = session();

        if (! $session->get('email')) {
            $session->setFlashdata('warning', 'Anda Harus Masuk Terlebih Dulu');
            $response = new RedirectResponse(site_url('auth'));
            $response->send(); // paksa redirect karena kita di luar controller
            exit; // pastikan proses berhenti setelah redirect
        }
    }
}
