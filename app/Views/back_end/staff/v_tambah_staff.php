<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= base_url('staff') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1><?= esc($subtitle) ?></h1>
      <div class="breadcrumb-item active"><a href="<?= base_url('home') ?>">Dashboard</a></div>
      <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">Di halaman ini Anda dapat membuat Staff baru</p>

      <div class="card">
        <div class="card-header"><h4>Tambah Staff</h4></div>
        <div class="card-body">
          <form method="POST" action="<?= base_url('staff/tambah') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
              <div class="form-group col-lg-4">
                <label>Nama Staff</label>
                <input type="text" class="form-control" name="name" value="<?= old('name') ?>" autofocus>
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('name') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-4">
                <label>Jabatan</label>
                <select name="jabatan" class="form-control selectric">
                  <?php foreach ($kategori as $value): ?>
                    <option value="<?= $value->id_kategori ?>"><?= esc($value->nama_kategori) ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group col-lg-4">
                <label class="d-block">Jenis Kelamin</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="genderL" value="Laki-Laki" <?= old('gender') == 'Laki-Laki' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="genderL">Laki-Laki</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="genderP" value="Perempuan" <?= old('gender') == 'Perempuan' ? 'checked' : '' ?>>
                  <label class="form-check-label" for="genderP">Perempuan</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-4">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?= old('email') ?>">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('email') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-4">
                <label>Nomor Telepon</label>
                <input type="tel" class="form-control" name="no" value="<?= old('no') ?>" onkeypress="validate(event)">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('no') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-4">
                <label>Status Publish di Web</label>
                <select name="status" class="form-control selectric">
                  <option value="Publish" <?= old('status') == 'Publish' ? 'selected' : '' ?>>Publish</option>
                  <option value="Draft" <?= old('status') == 'Draft' ? 'selected' : '' ?>>Draft</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" style="height: 60px; resize: none"><?= old('alamat') ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('alamat') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <label>Foto Staff</label><br>
              <input type="file" name="image" id="image-upload" class="form-control-file" onchange="previewFile(this);">
              <img class="rounded mt-2" style="max-width:400px" src="<?= base_url('vendor/back-end/assets/img/transparent.png') ?>" id="image-previews" alt="Preview">
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('image') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Buat Staff</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>