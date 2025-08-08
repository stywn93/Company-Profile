<?php

namespace App\Libraries;

use App\Models\M_Login;
use CodeIgniter\Session\Session;

class UserLogin
{
    protected $loginModel;
    protected $session;

    public function __construct()
    {
        $this->loginModel = new M_Login();
        $this->session    = session(); // pakai service session bawaan CI4
    }

    public function login(string $username, string $password)
    {
        $user = $this->loginModel->login($username, $password);

        if ($user) {
            // Simpan data login ke session
            $this->session->set([
                'username' => $user->username,
                'role_id'  => $user->role_id,
                'email'    => $user->email,
                'logged_in'=> true
            ]);
            return true;
        }

        return false;
    }
}