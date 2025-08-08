<?php

namespace App\Controllers;

use App\Models\M_dashboard;
use App\Models\M_Setting;
use CodeIgniter\Controller;

class Dashboard extends Controller
{
    protected $dashboardModel;
    protected $settingModel;
    protected $session;

    public function __construct()
    {
        helper(['url']);
        // is_logged_in(); // Pastikan helper ini sudah ditransformasikan sesuai CI4

        $this->dashboardModel = new M_dashboard();
        $this->settingModel   = new M_Setting();
        $this->session        = session();
    }

    public function index()
    {
        $setting = $this->settingModel->daftar();
        $user = db_connect()
            ->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()
            ->getRowArray();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle' => 'Dashboard',
            'isi'      => 'back_end/dashboard/v_home',
            'user'     => $user,
            'image'    => $setting->image,
            'totalUser' => $this->dashboardModel->user()->total,
            'totalStaff'    => $this->dashboardModel->staff()->total,
            'totalClient'   => $this->dashboardModel->client()->total,
            'totalLayanan'  => $this->dashboardModel->layanan()->total,
            'totalBerita'   => $this->dashboardModel->berita()->total,
            'totalPortfolio'    => $this->dashboardModel->portfolio()->total,
        ];

        return view('back_end/layout/v_wrapper', $data);
    }
}