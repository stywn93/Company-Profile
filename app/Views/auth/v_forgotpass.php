<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title><?= esc($title) ?> &rsaquo; <?= esc($subtitle) ?></title>

  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/fonts/fontawesome/css/all.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/style.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/css/components.css">
  <link rel="stylesheet" href="<?= base_url() ?>vendor/back-end/assets/plugins/toastr/toastr.min.css">
  <link rel="shortcut icon" href="<?= base_url('assets/img/company/' . $image) ?>" type="image/x-icon">
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row justify-content-center">
          <div class="col-xl-4 col-lg-6 col-md-6 col-sm-8">
            <div class="login-brand">
              <img src="<?= base_url('assets/img/company/' . $image) ?>" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>

            <div class="card card-primary">
              <div class="card-header">
                <h4>Lupa Password</h4>
              </div>

              <div class="card-body">
                <p class="text-muted">Kami akan mengirim link untuk reset password Anda</p>

                <form method="POST" action="<?= base_url('auth/forgotpassword') ?>">
                  <?= csrf_field() ?>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input id="email" type="email" class="form-control" name="email" value="<?= old('email') ?>" autofocus>
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('email') ?></small>
                    <?php endif; ?>
                  </div>

                  <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                      Kirim Link Reset
                    </button>
                  </div>
                </form>
              </div>
            </div>

            <div class="simple-footer">
              Copyright &copy; <?= date('Y') ?>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>

  <script src="<?= base_url(); ?>vendor/back-end/assets/js/jquery-3.3.1.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/jquery.nicescroll.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/moment.min.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/stisla.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/scripts.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/js/custom.js"></script>
  <script src="<?= base_url(); ?>vendor/back-end/assets/plugins/toastr/toastr.min.js"></script>

  <script>
    <?php foreach (['success', 'info', 'warning', 'error'] as $type) : ?>
      <?php if (session()->getFlashdata($type)) : ?>
        toastr.<?= $type ?>("<?= esc(session($type)) ?>");
      <?php endif; ?>
    <?php endforeach; ?>
  </script>
</body>

</html>