<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('home') ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">Di halaman ini Anda dapat Mengubah Pengaturan</p>

      <div class="card">
        <div class="card-header"><h4><?= esc($subtitle) ?></h4></div>
        <div class="card-body">
          <form method="POST" action="<?= base_url('settings/update') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
              <div class="form-group col-lg-6">
                <label>Nama Perusahaan</label>
                <input type="text" class="form-control" name="nama" value="<?= old('nama', $setting->nama_perusahaan) ?>" autofocus>
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('nama') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-6">
                <label>Email Perusahaan</label>
                <input type="email" class="form-control" name="email" value="<?= old('email', $setting->email) ?>">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('email') ?></small>
                <?php endif ?>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-6">
                <label>Alamat Perusahaan</label>
                <input type="text" class="form-control" name="alamat" value="<?= old('alamat', $setting->alamat) ?>">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('alamat') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-6">
                <label>Nomor Telepon</label>
                <input type="tel" class="form-control" name="no" value="<?= old('no', $setting->no_telepon) ?>" onkeypress="validate(event)">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('no') ?></small>
                <?php endif ?>
              </div>
            </div>

            <div class="form-group">
              <label>Profile</label>
              <textarea name="profile" id="profile"><?= old('profile', $setting->profile) ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('profile') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Sejarah</label>
              <textarea name="sejarah" id="sejarah"><?= old('sejarah', $setting->sejarah) ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('sejarah') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Visi</label>
              <textarea name="visi" id="berita"><?= old('visi', $setting->visi) ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('visi') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Misi</label>
              <textarea name="misi" id="misi"><?= old('misi', $setting->misi) ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('misi') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <label>Logo Saat Ini</label><br>
              <img class="rounded mb-3" style="max-width:400px" src="<?= base_url('assets/img/company/' . $setting->image) ?>" alt="Logo" id="image-previews">
            </div>

            <div class="form-group">
              <label>Ganti Logo (optional)</label>
              <input type="file" name="image" id="image-upload" class="form-control" onchange="previewFile(this);">
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('image') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>