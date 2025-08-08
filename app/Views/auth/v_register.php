<!DOCTYPE html>
<html lang="id">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1" name="viewport">
  <title><?= esc($title) ?> &rsaquo; <?= esc($subtitle) ?></title>

  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/fonts/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/node_modules/bootstrap-social/bootstrap-social.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/iziToast.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/components.css">
  <link rel="shortcut icon" href="<?= base_url('assets/img/company/' . $image) ?>" type="image/x-icon">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-2">
        <div class="row">
          <div class="col-xl-7 offset-xl-2 col-lg-8 offset-lg-2 col-md-8 offset-md-2 col-sm-10 offset-sm-1 mx-auto">
            <div class="login-brand text-center">
              <img src="<?= base_url('assets/img/company/' . $image) ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Register</h4>
              </div>

              <div class="card-body">
                <form method="POST" action="<?= base_url('auth/register') ?>">
                  <?= csrf_field() ?>

                  <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input id="nama_lengkap" type="text" class="form-control" name="nama_lengkap" value="<?= old('nama_lengkap') ?>" autofocus>
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('nama_lengkap') ?></small>
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?= old('email') ?>">
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('email') ?></small>
                    <?php endif; ?>
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label for="password">Password</label>
                      <input id="password" type="password" class="form-control" name="password">
                      <?php if (isset($validation)) : ?>
                        <small class="text-danger"><?= $validation->getError('password') ?></small>
                      <?php endif; ?>
                    </div>

                    <div class="form-group col-6">
                      <label for="password-confirm">Konfirmasi Password</label>
                      <input id="password-confirm" type="password" class="form-control" name="password-confirm">
                      <?php if (isset($validation)) : ?>
                        <small class="text-danger"><?= $validation->getError('password-confirm') ?></small>
                      <?php endif; ?>
                    </div>
                  </div>

                  <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">Saya setuju dengan syarat & ketentuan</label>
                    </div>
                  </div>

                  <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Register
                    </button>
                  </div>

                  <div class="text-center mt-3">
                    Sudah punya akun? <strong><a href="<?= base_url('auth') ?>">Masuk</a></strong>
                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer text-center">
              &copy; <strong><?= date('Y') ?></strong>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- Scripts -->
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/moment.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/stisla.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/plugins/toastr/toastr.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/custom.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/page/auth-register.js"></script>

  <script>
    <?php foreach (['success', 'info', 'warning', 'error'] as $type) : ?>
      <?php if (session()->getFlashdata($type)) : ?>
        toastr.<?= $type ?>("<?= esc(session($type)) ?>");
      <?php endif; ?>
    <?php endforeach; ?>
  </script>
</body>

</html>