<?php

namespace App\Controllers;

use App\Models\M_berita;
use App\Models\M_kategori;
use App\Models\M_layanan;
use App\Models\M_setting;
use App\Models\M_staff;
use App\Models\M_portofolio;
use App\Models\M_client;
use App\Models\M_dashboard;

class Home extends BaseController
{
    protected $berita;
    protected $kategori;
    protected $layanan;
    protected $setting;
    protected $staff;
    protected $portfolio;
    protected $client;
    protected $dashboard;

    public function __construct()
    {
        
        $this->berita    = new M_berita();
        $this->kategori  = new M_kategori();
        $this->layanan   = new M_layanan();
        $this->setting   = new M_setting();
        $this->staff     = new M_staff();
        $this->portfolio = new M_portofolio();
        $this->client    = new M_client();
        $this->dashboard = new M_dashboard();
        
    }

    public function index()
    {
        $setting = $this->setting->daftar();

        $data = [
            'title'     => $setting->nama_perusahaan,
            'isi'       => 'front-end/v_home',
            'layanan'   => $this->layanan->daftar(),
            'setting'   => $setting,
            'berita'    => $this->berita->recent_berita(),
            'staff'     => $this->staff->daftar(),
            'portfolio' => $this->portfolio->daftar(),
            'client'    => $this->client->daftar(),
            'image'     => $setting->image,
            'client_total' => $this->dashboard->client()->total,
            'staff_total' => $this->dashboard->staff()->total,
        ];

        return view('front-end/layout/v_wrapper', $data);
        
    }

    public function blog()
    {
        $setting = $this->setting->daftar();

        $data = [
            'title'         => $setting->nama_perusahaan,
            'subtitle'      => 'Blog',
            'isi'           => 'front-end/v_blog',
            'berita'        => $this->berita->daftar(),
            'kategori'      => $this->kategori->daftarKategoriBerita(),
            'lastst_berita' => $this->berita->lastst_berita(),
            'layanan'       => $this->layanan->daftar(),
            'setting'       => $setting,
            'image'         => $setting->image,
        ];

        return view('front-end/layout/v_wrapper', $data);
    }

    public function detail($slug_berita)
    {
        $setting = $this->setting->daftar();
        $berita  = $this->berita->read($slug_berita);

        $data = [
            'title'         => $berita->judul_berita,
            'isi'           => 'front-end/v_blog_detail',
            'layanan'       => $this->layanan->daftar(),
            'berita'        => $berita,
            'kategori'      => $this->kategori->daftarKategoriBerita(),
            'lastst_berita' => $this->berita->lastst_berita(),
            'setting'       => $setting,
            'image'         => $setting->image,
        ];

        return view('front-end/layout/v_wrapper', $data);
    }

    public function detailLayanan($slug_layanan)
    {
        $setting = $this->setting->daftar();
        $detail  = $this->layanan->read($slug_layanan);

        $data = [
            'title'   => $detail->judul_layanan,
            'isi'     => 'front-end/v_layanan_detail',
            'layanan' => $this->layanan->daftar(),
            'detail'  => $detail,
            'setting' => $setting,
            'image'   => $setting->image,
        ];

        return view('front-end/layout/v_wrapper', $data);
    }

    public function portfolioDetail($slug_portfolio)
    {
        $setting   = $this->setting->daftar();
        $portfolio = $this->portfolio->read($slug_portfolio);

        $data = [
            'title'     => $portfolio->judul_portfolio,
            'isi'       => 'front-end/v_portfolio_detail',
            'layanan'   => $this->layanan->daftar(),
            'setting'   => $setting,
            'berita'    => $this->berita->recent_berita(),
            'staff'     => $this->staff->daftar(),
            'portfolio' => $portfolio,
            'image'     => $setting->image,
        ];

        return view('front-end/layout/v_wrapper', $data);
    }
}