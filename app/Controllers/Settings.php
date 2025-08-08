<?php

namespace App\Controllers;

use App\Models\M_setting;
use CodeIgniter\Controller;

class Settings extends Controller
{
    protected $settingModel;
    protected $session;
    protected $validation;

    public function __construct()
    {
        helper(['form', 'url', 'setting']);
        $this->settingModel = new M_setting();
        $this->session      = session();
        $this->validation   = \Config\Services::validation();
    }

    private function getUser()
    {
        return db_connect()
            ->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()
            ->getRowArray();
    }

    public function index()
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to('/blocked');
        }

        $setting = $this->settingModel->daftar();

        $data = [
            'title'    => $setting->nama_perusahaan,
            'subtitle'=> 'Setting',
            'isi'     => 'back_end/setting/v_settings',
            'user'    => $this->getUser(),
            'image'   => $setting->image,
            'setting' => $setting
        ];

        return view('back_end/layout/v_wrapper', $data);
    }

    public function update()
    {
        if ($this->session->get('role_id') != '1') {
            return redirect()->to('/blocked');
        }

        $setting = $this->settingModel->daftar();
        setting_validation();

        $file = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            $configPath = FCPATH . 'assets/img/company/';

            if (!empty($setting->image)) {
                @unlink($configPath . $setting->image);
            }

            $fileName = $file->getRandomName();
            $file->move($configPath, $fileName);
        } else {
            $fileName = $setting->image;
        }

        $data = [
            'id_setting'      => '1',
            'nama_perusahaan' => $this->request->getPost('nama'),
            'alamat'          => $this->request->getPost('alamat'),
            'no_telepon'      => $this->request->getPost('no'),
            'profile'         => $this->request->getPost('profile'),
            'email'           => $this->request->getPost('email'),
            'visi'            => $this->request->getPost('visi'),
            'misi'            => $this->request->getPost('misi'),
            'sejarah'         => $this->request->getPost('sejarah'),
            'image'           => $fileName,
        ];

        $this->settingModel->updatenya($data);
        $this->session->setFlashdata('success', 'Berhasil mengupdate data');
        return redirect()->to(base_url('settings'));
    }
}