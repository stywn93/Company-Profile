<?php
// Atur salam berdasarkan jam
date_default_timezone_set("Asia/Jakarta");
$jam = date('H:i');
if ($jam > '05:30' && $jam < '10:59') {
  $salam = 'Pagi';
} elseif ($jam >= '11:00' && $jam < '15:00') {
  $salam = 'Siang';
} elseif ($jam < '18:00') {
  $salam = 'Sore';
} else {
  $salam = 'Malam';
}
$pesan = 'Selamat ' . $salam;
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= esc($title) ?> &rsaquo; <?= esc($subtitle) ?></title>

  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/fonts/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/fonts/iconic/css/material-design-iconic-font.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/plugins/toastr/toastr.min.css">
  <link rel="shortcut icon" href="<?= base_url('assets/img/company/' . $image) ?>" type="image/x-icon">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="d-flex flex-wrap align-items-stretch">
        <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
          <div class="p-4 m-3">
            <img src="<?= base_url('assets/img/company/' . $image) ?>" alt="logo" width="80" class="shadow-light rounded-circle mb-5 mt-2">
            <h4 class="text-dark font-weight-normal">Welcome to <span class="font-weight-bold">Company Profile</span></h4>
            <p class="text-muted">Silakan masuk untuk melanjutkan.</p>

            <?php if (session()->getFlashdata('message')) echo session('message'); ?>

            <form method="POST" action="<?= base_url('auth') ?>">
              <?= csrf_field() ?>

              <div class="form-group">
                <label for="email">Email</label>
                <input id="email" type="text" class="form-control" name="email" value="<?= old('email') ?>" autofocus>
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('email') ?></small>
                <?php endif; ?>
              </div>

              <div class="form-group">
                <label for="password">Password</label>
                <input id="password" type="password" class="form-control" name="password">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('password') ?></small>
                <?php endif; ?>
              </div>

              <div class="form-group custom-control custom-checkbox">
                <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
                <label class="custom-control-label" for="remember-me">Ingat saya</label>
              </div>

              <div class="form-group d-flex justify-content-between">
                <a href="<?= base_url('auth/forgotpassword') ?>" class="text-sm">Lupa Password?</a>
                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right">
                  Masuk
                </button>
              </div>

              <div class="text-center mt-3">
                Belum punya akun? <a href="<?= base_url('auth/register') ?>">Daftar sekarang</a>
              </div>
            </form>

            <div class="text-center mt-5 text-small">
              &copy; <?= date('Y') ?>
              <div class="mt-2">
                <a href="#">Privacy Policy</a>
                <span class="bullet mx-1">•</span>
                <a href="#">Terms of Service</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="<?= base_url() ?>vendor/back-end/assets/img/unsplash/login-bg.jpg">
          <div class="absolute-bottom-left index-2 p-5 text-light">
            <h1 class="display-4 font-weight-bold"><?= $pesan ?></h1>
            <h5 class="text-muted-transparent">Bali, Indonesia</h5>
            <small>Photo by <a class="text-light bb" href="https://unsplash.com/photos/a8lTjWJJgLA" target="_blank">Justin Kauffman</a> on <a class="text-light bb" href="https://unsplash.com" target="_blank">Unsplash</a></small>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/bootstrap.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/moment.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/stisla.js"></script>
  <!-- JS Libraies -->

  <!-- Template JS File -->
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/custom.js"></script>

  <script>
    <?php foreach (['success', 'info', 'warning', 'error'] as $type) : ?>
      <?php if (session()->getFlashdata($type)) : ?>
        toastr.<?= $type ?>("<?= esc(session($type)) ?>");
      <?php endif; ?>
    <?php endforeach; ?>
  </script>
</body>
</html>