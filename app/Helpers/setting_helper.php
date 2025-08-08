<?php

use Config\Services;

if (!function_exists('setting_validation')) {
    function setting_validation()
    {
        $validation = Services::validation();

        $validation->setRules([
            'nama' => [
                'label'  => 'Nama',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Nama Perusahaan belum diisi !',
                ]
            ],
            'email' => [
                'label'  => 'Email',
                'rules'  => 'required|valid_email',
                'errors' => [
                    'required'    => 'email belum diisi !',
                    'valid_email' => 'format email tidak valid !',
                ]
            ],
            'alamat' => [
                'label'  => 'alamat',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Alamat Perusahaan belum diisi !',
                ]
            ],
            'no' => [
                'label'  => 'no',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'No. Telepon Perusahaan belum diisi !',
                ]
            ],
            'profile' => [
                'label'  => 'profile',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Profile Perusahaan belum diisi !',
                ]
            ],
            'sejarah' => [
                'label'  => 'sejarah',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Sejarah Perusahaan belum diisi !',
                ]
            ],
            'visi' => [
                'label'  => 'visi',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Visi Perusahaan belum diisi !',
                ]
            ],
            'misi' => [
                'label'  => 'misi',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Misi Perusahaan belum diisi !',
                ]
            ],
        ]);
    }
}