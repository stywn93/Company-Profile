<?php

use Config\Services;

if (!function_exists('addClient_validation')) {
    function addClient_validation()
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
                'rules'  => 'required|valid_email|is_unique[tb_Client.email_client]|trim',
                'errors' => [
                    'required'     => 'email belum diisi !',
                    'valid_email'  => 'format email tidak valid !',
                    'is_unique'    => 'email ini sudah terdaftar !'
                ]
            ],
            'no' => [
                'label'  => 'Nomor',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'No belum diisi !'
                ]
            ],
            'website' => [
                'label'  => 'website',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'website belum diisi !'
                ]
            ],
            'alamat' => [
                'label'  => 'alamat',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat belum diisi !'
                ]
            ]
        ]);
    }
}

if (!function_exists('editClient_validation')) {
    function editClient_validation()
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
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => 'email belum diisi !',
                    'valid_email' => 'format email tidak valid !'
                ]
            ],
            'no' => [
                'label'  => 'Nomor',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'No belum diisi !'
                ]
            ],
            'website' => [
                'label'  => 'website',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'website belum diisi !'
                ]
            ],
            'alamat' => [
                'label'  => 'alamat',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat belum diisi !'
                ]
            ]
        ]);
    }
}