<?php

use Config\Services;

if (!function_exists('changepassword_validation')) {
    function changepassword_validation()
    {
        $validation = Services::validation();

        $validation->setRules([
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|trim',
                'errors' => [
                    'required' => 'Password belum diisi !',
                ]
            ],
            'newpassword' => [
                'label'  => 'Password baru',
                'rules'  => 'required|min_length[6]|trim',
                'errors' => [
                    'required'   => 'Password Baru belum diisi !',
                    'min_length' => 'Password terlalu pendek !',
                ]
            ],
            'confirm-password' => [
                'label'  => 'Password baru',
                'rules'  => 'required|matches[newpassword]|trim',
                'errors' => [
                    'required' => 'Konfirmasi Password Baru belum diisi !',
                    'matches'  => 'Password Tidak sama',
                ]
            ]
        ]);
    }
}

if (!function_exists('addUser_validation')) {
    function addUser_validation()
    {
        $validation = Services::validation();

        $validation->setRules([
            'name' => [
                'label'  => 'Name',
                'rules'  => 'required|trim',
                'errors' => [
                    'required' => 'Nama belum diisi !'
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email|is_unique[tb_user.email]|trim',
                'errors' => [
                    'required'     => 'email belum diisi !',
                    'valid_email'  => 'format email tidak valid !',
                    'is_unique'    => 'email ini sudah terdaftar !'
                ]
            ],
            'password' => [
                'label'  => 'Password',
                'rules'  => 'required|min_length[6]|trim',
                'errors' => [
                    'required'   => 'password belum diisi !',
                    'min_length' => 'password terlalu pendek !'
                ]
            ]
        ]);
    }
}