<?php

namespace App\Controllers;

use App\Models\M_kategori;
use App\Models\M_Setting;
use CodeIgniter\Controller;

class Kategori extends Controller
{
  protected $kategoriModel;
  protected $settingModel;
  protected $session;
  protected $validation;

  public function __construct()
  {
    helper(['form', 'url', 'kategori']); // jika ada helper tambahan

    $this->kategoriModel = new M_kategori();
    $this->settingModel  = new M_Setting();
    $this->session       = session();
    $this->validation    = \Config\Services::validation();
  }

  private function loadSessionUser()
  {
    return db_connect()
      ->table('tb_user')
      ->where('email', $this->session->get('email'))
      ->get()
      ->getRowArray();
  }

  // === Kategori Berita ===
  public function kategoriBerita()
  {
    $setting = $this->settingModel->daftar();
    $data = [
      'title'     => $setting->nama_perusahaan,
      'subtitle'  => 'Daftar Kategori Berita',
      'isi'       => 'back_end/kategori/v_kategori_berita',
      'user'      => $this->loadSessionUser(),
      'image'     => $setting->image,
      'kategori'  => $this->kategoriModel->daftarKategoriBerita(),
    ];
    return view('back_end/layout/v_wrapper', $data);
  }

  public function tambahKategoriBerita()
  {
    $this->validation->setRules([
      'name' => [
        'label' => 'Nama',
        'rules' => 'required|is_unique[tb_kategori_berita.nama_kategori]',
        'errors' => [
          'required' => 'Nama Kategori belum diisi !',
          'is_unique' => 'Kategori Sudah Ada',
        ]
      ]
    ]);

    if (!$this->validation->withRequest($this->request)->run()) {
      return $this->kategoriBerita();
    }

    return $this->kategoriModel->tambahKategoriBerita();
  }

  public function editKategoriBerita($id_kategori)
  {
    $name = $this->request->getPost('name');
    $slug = url_title($name, '-', true);
    $kategori = [
      'id_kategori'     => $id_kategori,
      'slug_kategori'   => $slug,
      'nama_kategori'   => $name
    ];

    $this->validation->setRules([
      'name' => [
        'label' => 'Nama',
        'rules' => 'required',
        'errors' => ['required' => 'Nama Kategori belum diisi !']
      ]
    ]);

    if (!$this->validation->withRequest($this->request)->run()) {
      return $this->kategoriBerita();
    }

    return $this->kategoriModel->editKategoriBerita($kategori);
  }

  public function hapusKategoriBerita($id_kategori)
  {
    return $this->kategoriModel->hapusKategoriBerita(['id_kategori' => $id_kategori]);
  }

  // === Kategori Staff ===
  public function kategoriStaff()
  {
    if ($this->session->get('role_id') != '1') {
      return redirect()->to('/blocked');
    }

    $setting = $this->settingModel->daftar();
    $data = [
      'title'     => $setting->nama_perusahaan,
      'subtitle'  => 'Daftar Kategori Staff',
      'isi'       => 'back_end/kategori/v_kategori_staff',
      'user'      => $this->loadSessionUser(),
      'image'     => $setting->image,
      'kategori'  => $this->kategoriModel->daftarKategoriStaff(),
    ];
    return view('back_end/layout/v_wrapper', $data);
  }

  public function tambahKategoriStaff()
  {
    if ($this->session->get('role_id') != '1') {
      return redirect()->to('/blocked');
    }

    $this->validation->setRules([
      'name' => [
        'label' => 'Nama',
        'rules' => 'required|is_unique[tb_kategori_staff.nama_kategori]',
        'errors' => [
          'required' => 'Nama Kategori belum diisi !',
          'is_unique' => 'Kategori Sudah Ada',
        ]
      ]
    ]);

    if (!$this->validation->withRequest($this->request)->run()) {
      return $this->kategoriStaff();
    }

    return $this->kategoriModel->tambahKategoriStaff();
  }

  public function editKategoriStaff($id_kategori)
  {
    if ($this->session->get('role_id') != '1') {
      return redirect()->to('/blocked');
    }

    $name = $this->request->getPost('name');
    $slug = url_title($name, '-', true);
    $kategori = [
      'id_kategori'     => $id_kategori,
      'slug_kategori'   => $slug,
      'nama_kategori'   => $name
    ];

    $this->validation->setRules([
      'name' => [
        'label' => 'Nama',
        'rules' => 'required',
        'errors' => ['required' => 'Nama Kategori belum diisi !']
      ]
    ]);

    if (!$this->validation->withRequest($this->request)->run()) {
      return $this->kategoriStaff();
    }

    return $this->kategoriModel->editKategoriStaff($kategori);
  }

  public function hapusKategoriStaff($id_kategori)
  {
    if ($this->session->get('role_id') != '1') {
      return redirect()->to('/blocked');
    }

    return $this->kategoriModel->hapusKategoriStaff(['id_kategori' => $id_kategori]);
  }

  // === Kategori Client ===
  public function kategoriClient()
  {
    $setting = $this->settingModel->daftar();
    $data = [
      'title'     => $setting->nama_perusahaan,
      'subtitle'  => 'Daftar Kategori Client',
      'isi'       => 'back_end/kategori/v_kategori_client',
      'user'      => $this->loadSessionUser(),
      'image'     => $setting->image,
      'kategori'  => $this->kategoriModel->daftarKategoriClient(),
    ];
    return view('back_end/layout/v_wrapper', $data);
  }

  public function tambahKategoriClient()
  {
    $this->validation->setRules([
      'name' => [
        'label' => 'Nama',
        'rules' => 'required|is_unique[tb_kategori_client.nama_kategori]',
        'errors' => [
          'required' => 'Nama Kategori belum diisi !',
          'is_unique' => 'Kategori Sudah Ada',
        ]
      ]
    ]);

    if (!$this->validation->withRequest($this->request)->run()) {
      return $this->kategoriClient();
    }

    return $this->kategoriModel->tambahKategoriClient();
  }

  public function editKategoriClient($id_kategori)
  {
    $name = $this->request->getPost('name');
    $slug = url_title($name, '-', true);
    $kategori = [
      'id_kategori'     => $id_kategori,
      'slug_kategori'   => $slug,
      'nama_kategori'   => $name
    ];

    $this->validation->setRules([
      'name' => [
        'label' => 'Nama',
        'rules' => 'required',
        'errors' => [
          'required' => 'Nama Kategori belum diisi !'
        ]
      ]
    ]);

    if (!$this->validation->withRequest($this->request)->run()) {
      $setting = $this->settingModel->daftar();
      $data = [
        'title'     => $setting->nama_perusahaan,
        'subtitle'  => 'Daftar Kategori',
        'isi'       => 'back_end/kategori/v_kategori_client',
        'user'      => $this->loadSessionUser(),
        'image'     => $setting->image,
        'kategori'  => $this->kategoriModel->daftarKategoriClient(),
        'validation' => $this->validation
      ];
      return view('back_end/layout/v_wrapper', $data);
    }

    return $this->kategoriModel->editKategoriClient($kategori);
  }

  public function hapusKategoriClient($id_kategori)
  {
    return $this->kategoriModel->hapusKategoriClient([
      'id_kategori' => $id_kategori
    ]);
  }
}
