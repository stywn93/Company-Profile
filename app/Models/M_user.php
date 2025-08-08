<?php

namespace App\Models;

use CodeIgniter\Model;

class M_user extends Model
{
    protected $db;
    protected $session;
    protected $request;

    public function __construct()
    {
        parent::__construct();
        $this->db      = db_connect();
        $this->session = session();
        $this->request = \Config\Services::request();
    }

    public function editProfile()
    {
        $user = $this->db->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()->getRowArray();

        $nama  = $this->request->getPost('nama');
        $email = $this->request->getPost('email');
        $file  = $this->request->getFile('image');

        if ($file && $file->isValid() && !$file->hasMoved()) {
            if ($user['image'] !== 'default.png') {
                @unlink(FCPATH . 'assets/img/profile/' . $user['image']);
            }
            $fileName = $file->getRandomName();
            $file->move(FCPATH . 'assets/img/profile/', $fileName);
            $this->db->table('tb_user')->where('email', $email)->update(['image' => $fileName]);
        }

        $this->db->table('tb_user')
            ->where('email', $email)
            ->update(['nama' => $nama]);

        $this->session->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to('/user/profile');
    }

    public function changePassword()
    {
        $user = $this->db->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->get()->getRowArray();

        $current  = $this->request->getPost('password');
        $new      = $this->request->getPost('newpassword');

        if (!password_verify($current, $user['password'])) {
            $this->session->setFlashdata('message', view('components/alert', [
                'type' => 'danger',
                'title' => 'Password Salah !!!'
            ]));
            return redirect()->to('/user/changepassword');
        }

        if ($current === $new) {
            $this->session->setFlashdata('message', view('components/alert', [
                'type' => 'danger',
                'title' => 'Password Baru Tidak Boleh sama dengan Password Lama !!!'
            ]));
            return redirect()->to('/user/changepassword');
        }

        $this->db->table('tb_user')
            ->where('email', $this->session->get('email'))
            ->update(['password' => password_hash($new, PASSWORD_DEFAULT)]);

        $this->session->setFlashdata('success', 'Berhasil, Mengganti Password');
        return redirect()->to('/user/profile');
    }

    public function daftarUser()
    {
        return $this->db->table('tb_user')
            ->orderBy('id_user', 'DESC')
            ->get()->getResult();
    }

    public function addUser()
    {
        $data = [
            'nama'         => htmlspecialchars($this->request->getPost('name')),
            'email'        => htmlspecialchars($this->request->getPost('email')),
            'image'        => 'default.png',
            'password'     => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'role_id'      => htmlspecialchars($this->request->getPost('role_id')),
            'is_active'    => htmlspecialchars($this->request->getPost('is_active')),
            'date_created' => time()
        ];

        $this->db->table('tb_user')->insert($data);
        $this->session->setFlashdata('success', 'Berhasil Membuat akun ' . $data['nama']);
        return redirect()->to('/user/daftar_user');
    }

    public function editUser($user)
    {
        $this->db->table('tb_user')
            ->where('id_user', $user['id_user'])
            ->update([
                'role_id'   => $user['role_id'],
                'is_active' => $user['is_active']
            ]);

        $this->session->setFlashdata('success', 'Berhasil mengedit data');
        return redirect()->to('/user/daftar_user');
    }

    public function hapus($user)
    {
        $this->db->table('tb_user')
            ->where('id_user', $user['id_user'])
            ->delete();

        $this->session->setFlashdata('success', 'Berhasil menghapus data');
        return redirect()->to('/user/daftar_user');
    }
}