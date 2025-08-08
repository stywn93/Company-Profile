<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= base_url('staff') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="<?= base_url('staff') ?>">Daftar Staff</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($staff->nama_staff) ?></h2>

      <div class="row mt-sm-4">
        <div class="col-12">
          <div class="card profile-widget">
            <div class="profile-widget-header">
              <img alt="image" src="<?= base_url('assets/img/staff/' . $staff->gambar_staff) ?>" class="rounded-circle profile-widget-picture">
              <div class="profile-widget-items">
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Posts</div>
                  <div class="profile-widget-item-value">187</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Followers</div>
                  <div class="profile-widget-item-value">6,8K</div>
                </div>
                <div class="profile-widget-item">
                  <div class="profile-widget-item-label">Following</div>
                  <div class="profile-widget-item-value">2,1K</div>
                </div>
              </div>
            </div>

            <div class="profile-widget-description">
              <div class="profile-widget-name text-dark">
                <?= esc($staff->nama_staff) ?>
                <div class="text-muted d-inline font-weight-normal">
                  <div class="slash"></div> <?= esc($staff->nama_kategori) ?>
                </div>
              </div>
              <p><strong>Email:</strong> <?= esc($staff->email_staff) ?></p>
              <p><strong>No Telepon:</strong> <?= esc($staff->no_telepon) ?></p>
              <p><strong>Alamat:</strong> <?= esc($staff->alamat) ?></p>
              <p>
                <span class="badge badge-<?= $staff->publish == 'Publish' ? 'primary' : 'warning' ?>">
                  <?= esc($staff->publish) ?>
                </span>
              </p>
            </div>

            <div class="card-footer text-center">
              <div class="font-weight-bold mb-2">
                Tanggal Dibuat: <?= esc((new DateTime($staff->date_created))->format('d-M-Y')) ?>
              </div>
              <a href="#" class="mr-3"><i class="fab fa-facebook-f"></i></a>
              <a href="#" class="mr-3"><i class="fab fa-twitter"></i></a>
              <a href="#" class="mr-3"><i class="fab fa-github"></i></a>
              <a href="#"><i class="fab fa-instagram"></i></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>