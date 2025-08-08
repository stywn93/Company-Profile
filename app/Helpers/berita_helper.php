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
            'keywords' => [
                'label'  => 'Keywords',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Keywords belum diisi !'
                ]
            ],
            'isi' => [
                'label'  => 'Isi berita',
                'rules'  => 'required',
                'errors' => [
                    'required' => 'Isi Berita belum diisi !'
                ]
            ]
        ]);
    }
}