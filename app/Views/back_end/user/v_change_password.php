<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= base_url('user/profile') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1>Ubah Password</h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="<?= base_url('user/profile') ?>">Profile</a></div>
        <div class="breadcrumb-item">Ubah Password</div>
      </div>
    </div>

    <div class="section-body">
      <div class="hero bg-danger text-white">
        <div class="hero-inner">
          <h3>Halaman Sensitif</h3>
          <p class="lead">Pastikan Anda mengingat password baru dengan baik.</p>
          <div class="mt-4">
            <a href="<?= base_url('user/profile') ?>" class="btn btn-outline-white btn-lg btn-icon icon-left">
              <i class="fas fa-arrow-left"></i> Setup Akun
            </a>
          </div>
        </div>
      </div>

      <div class="card card-danger mt-4">
        <div class="card-header">
          <h3 class="text-danger">Ubah Password</h3>
        </div>
        <div class="card-body">
          <?= session()->getFlashdata('message') ?>
          <form method="POST" action="<?= base_url('user/changepassword') ?>">
            <?= csrf_field() ?>

            <div class="form-group">
              <label for="password">Password Saat Ini</label>
              <input id="password" type="password" class="form-control" name="password" autofocus>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('password') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label for="newpassword">Password Baru</label>
              <input id="newpassword" type="password" class="form-control pwstrength" data-indicator="pwindicator" name="newpassword">
              <div id="pwindicator" class="pwindicator">
                <div class="bar"></div>
                <div class="label"></div>
              </div>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('newpassword') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label for="password-confirm">Konfirmasi Password</label>
              <input id="password-confirm" type="password" class="form-control" name="confirm-password">
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('confirm-password') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-danger btn-lg btn-block">Ubah Password</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>