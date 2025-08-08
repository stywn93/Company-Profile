<?php

use Config\Services;

if (!function_exists('tambah_validation')) {
    function tambah_validation()
    {
        $validation = Services::validation();

        $validation->setRules([
            'judul' => [
                'label'  => 'Judul',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Judul belum diisi !'
                ]
            ],
            'isi' => [
                'label'  => 'Isi Layanan',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi Layanan belum diisi !'
                ]
            ]
        ]);
    }
}