<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Dashboard</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item">Dashboard</div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-6">
        <div class="row">
          <?php foreach ([
            ['label' => 'User', 'icon' => 'far fa-user', 'bg' => 'primary', 'value' => $totalUser],
            ['label' => 'Staff', 'icon' => 'fas fa-users', 'bg' => 'warning', 'value' => $totalStaff],
            ['label' => 'Client', 'icon' => 'fas fa-user-tie', 'bg' => 'success', 'value' => $totalClient],
            ['label' => 'Layanan', 'icon' => 'fas fa-hand-holding-usd', 'bg' => 'primary', 'value' => $totalLayanan],
            ['label' => 'Berita', 'icon' => 'far fa-newspaper', 'bg' => 'danger', 'value' => $totalBerita],
            ['label' => 'Portfolio', 'icon' => 'fas fa-briefcase', 'bg' => 'success', 'value' => $totalPortfolio]
          ] as $stat): ?>
            <div class="col-md-6 col-sm-6 mb-3">
              <div class="card card-statistic-1">
                <div class="card-icon bg-<?= $stat['bg'] ?>">
                  <i class="<?= $stat['icon'] ?>"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header"><h4><?= $stat['label'] ?></h4></div>
                  <div class="card-body"><?= $stat['value'] ?></div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <div class="card-header"><h4>Statistik kunjungan terakhir</h4></div>
          <div class="card-body"><div id="line"></div></div>
        </div>
      </div>
    </div>

    <div class="section-body mt-4">
      <div class="hero text-white hero-bg-image hero-bg-parallax mb-4" data-background="<?= base_url('vendor/back-end/assets/img/unsplash/andre-benz-1214056-unsplash.jpg') ?>">
        <div class="hero-inner">
          <h3>Selamat Datang <?= esc($user['nama']) ?></h3>
          <p class="lead">You almost arrived, complete the information about your account to complete registration.</p>
          <a href="<?= base_url('user/profile') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left mt-3">
            <i class="far fa-user"></i> Setup Account
          </a>
        </div>
      </div>

      <div class="card card-info">
        <div class="card-header"><h3>Petunjuk Penggunaan</h3></div>
        <div class="card-body">
          <p align="justify">
            1. Pilih menu yang ingin dilakukan pengolahan data<br>
            2. Pilih submenu yang ingin dilakukan pengolahan data<br>
            3. Inputkan Data Dengan benar<br>
            4. Tekan Tombol Submit Jika telah selesai melakukan pengisian data<br>
            5. Logout sebelum menutup browser
          </p>
        </div>
      </div>

      <div class="card card-warning">
        <div class="card-header"><h3>Kebijakan Pengguna</h3></div>
        <div class="card-body">
          <p align="justify">
            1. Jaga Keamanan Username dan Password<br>
            2. Isi Data dengan kebenaran<br>
            3. Lakukan Logout Sebelum Keluar
          </p>
        </div>
      </div>
    </div>
  </section>
</div>