<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
  <title><?= esc($title) ?> &mdash; <?= esc($subtitle) ?></title>

  <!-- Styles -->
  <link rel="stylesheet" href="<?= base_url('vendor/back-end/assets/css/bootstrap.min.css') ?>">
  <link rel="stylesheet" href="<?= base_url('vendor/back-end/assets/fonts/fontawesome/css/all.css') ?>">
  <link rel="stylesheet" href="<?= base_url('vendor/back-end/assets/css/style.css') ?>">
  <link rel="stylesheet" href="<?= base_url('vendor/back-end/assets/css/components.css') ?>">
  <link rel="shortcut icon" href="<?= base_url('assets/img/company/' . $image) ?>" type="image/x-icon">

  <!-- Scripts -->
  <script src="<?= base_url('vendor/back-end/assets/js/bootstrap.bundle.min.js') ?>"></script>
</head>

<body>
  <div id="app">
    <section class="section">
      <div class="container mt-5 text-center">
        <lottie-player src="<?= base_url('vendor/back-end/assets/plugins/lottie/403error.json') ?>" background="transparent" speed="1" style="width:200px; height:200px;" loop autoplay></lottie-player>
        
        <div class="page-error mt-4">
          <h2 class="text-danger"><?= esc($subtitle) ?></h2>
          <p class="text-dark">Silakan kembali ke dashboard!</p>

          <form class="my-3">
            <div class="input-group floating-addon-not-append">
              <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-search"></i></span>
              </div>
              <input type="text" class="form-control" placeholder="Search">
              <div class="input-group-append">
                <button class="btn btn-primary btn-lg" type="submit">Search</button>
              </div>
            </div>
          </form>

          <a href="<?= base_url('dashboard') ?>" class="btn btn-outline-dark mt-2">← Kembali ke Dashboard</a>
        </div>

        <div class="simple-footer mt-4">
          &copy; <?= date('Y') ?>
        </div>
      </div>
    </section>
  </div>

  <!-- Scripts -->
  <script src="<?= base_url('vendor/back-end/assets/js/jquery-3.3.1.min.js') ?>"></script>
  <script src="<?= base_url('vendor/back-end/assets/js/bootstrap.min.js') ?>"></script>
  <script src="<?= base_url('vendor/back-end/assets/plugins/lottie/lottie-player.js') ?>"></script>
  <script src="<?= base_url('vendor/back-end/assets/js/main.js') ?>"></script>
</body>
</html>