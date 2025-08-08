<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= esc($title); ?> &rsaquo; <?= esc($subtitle); ?></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/fonts/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/plugins/toastr/toastr.min.css">
  <link rel="shortcut icon" href="<?= base_url('assets/img/company/' . $image); ?>" type="image/x-icon">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
            <div class="login-brand">
              <img src="<?= base_url('assets/img/company/' . $image); ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Ubah Password</h4>
              </div>

              <div class="card-body">
                <p class="text-muted text-center">Masukkan Password Baru, <?= esc(session('reset_email')) ?></p>

                <form method="POST" action="<?= base_url('auth/changePassword'); ?>">
                  <?= csrf_field() ?>

                  <div class="form-group">
                    <label for="password">Password Baru</label>
                    <input id="password" type="password" class="form-control" name="password" value="<?= old('password') ?>">
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('password') ?></small>
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <label for="conf-password">Konfirmasi Password</label>
                    <input id="conf-password" type="password" class="form-control" name="conf-password" value="<?= old('conf-password') ?>">
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('conf-password') ?></small>
                    <?php endif; ?>
                  </div>

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Ubah Password</button>
                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; <?= date('Y'); ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <!-- General JS Scripts -->
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/moment.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/stisla.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/plugins/toastr/toastr.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/custom.js"></script>

  <script>
    <?php if (session()->getFlashdata('success')) : ?>
      toastr.success("<?= session('success') ?>");
    <?php elseif (session()->getFlashdata('info')) : ?>
      toastr.info("<?= session('info') ?>");
    <?php elseif (session()->getFlashdata('warning')) : ?>
      toastr.warning("<?= session('warning') ?>");
    <?php elseif (session()->getFlashdata('error')) : ?>
      toastr.error("<?= session('error') ?>");
    <?php endif; ?>
  </script>
</body>

</html>