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
            'website' => [
                'label'  => 'Website',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'website belum diisi !'
                ]
            ],
            'testimoni' => [
                'label'  => 'Testimoni berita',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'testimoni portfolio belum diisi !'
                ]
            ],
            'isi' => [
                'label'  => 'Isi portfolio',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi portfolio belum diisi !'
                ]
            ]
        ]);
    }
}