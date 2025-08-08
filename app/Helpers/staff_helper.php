<?php

use Config\Services;

if (!function_exists('addStaff_validation')) {
    function addStaff_validation()
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
                'rules'  => 'required|valid_email|is_unique[tb_staff.email_staff]|trim',
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
            'alamat' => [
                'label'  => 'alamat',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat belum diisi !'
                ]
            ],
        ]);
    }
}

if (!function_exists('editStaff_validation')) {
    function editStaff_validation()
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
            'alamat' => [
                'label'  => 'alamat',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat belum diisi !'
                ]
            ],
        ]);
    }
}