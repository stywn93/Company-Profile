<?php

namespace App\Controllers;

use App\Models\M_dashboard;
use App\Models\M_Setting;
use CodeIgniter\Controller;

class My404 extends Controller
{
    protected $dashboardModel;
    protected $settingModel;
    protected $session;

    public function __construct()
    {
        helper(['url']);
        is_logged_in(); // pastikan helper ini sudah CI4-style

        $this->dashboardModel = new M_dashboard();
        $this->settingModel   = new M_Setting();
        $this->session        = session();
    }

    private function getCurrentUser()
    {
        return db_connect()
            ->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()
            ->getRowArray();
    }

    public function index()
    {
        $setting = $this->settingModel->daftar();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle'=> '404 Halaman Tidak Ditemukan',
            'isi'     => 'back_end/v_error_404',
            'user'    => $this->getCurrentUser(),
            'image'   => $setting->image
        ];

        return view('back_end/v_error_404', $data);
    }
}