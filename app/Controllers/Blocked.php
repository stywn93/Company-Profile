<?php

namespace App\Controllers;

use App\Models\M_dashboard;
use App\Models\M_Setting;
use CodeIgniter\Controller;

class Blocked extends Controller
{
    protected $dashboardModel;
    protected $settingModel;
    protected $session;

    public function __construct()
    {
        helper(['url']);

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
            'subtitle' => '403 Akses Diblock',
            'isi'      => 'back_end/v_blocked',
            'user'     => $user,
            'image'    => $setting->image
        ];

        return view('back_end/v_blocked', $data);
    }
}