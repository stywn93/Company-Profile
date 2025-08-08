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
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">Di halaman ini Anda dapat mengedit <strong><?= esc($staff->nama_staff) ?></strong></p>

      <div class="card">
        <div class="card-header"><h4>Edit Staff</h4></div>
        <div class="card-body">
          <form method="POST" action="<?= base_url('staff/edit/' . $staff->id_staff) ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
              <div class="form-group col-lg-4">
                <label>Nama Staff</label>
                <input type="text" class="form-control" name="name" value="<?= old('name', $staff->nama_staff) ?>" autofocus>
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('name') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-4">
                <label>Jabatan</label>
                <select name="jabatan" class="form-control selectric">
                  <option value="<?= esc($staff->id_kategori) ?>" selected><?= esc($staff->nama_kategori) ?></option>
                  <?php foreach ($kategori as $values): ?>
                    <option value="<?= $values->id_kategori ?>"><?= esc($values->nama_kategori) ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group col-lg-4">
                <label class="d-block">Jenis Kelamin</label>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="radio1" value="Laki-Laki" <?= $staff->gender == "Laki-Laki" ? 'checked' : '' ?>>
                  <label class="form-check-label" for="radio1">Laki-Laki</label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="gender" id="radio2" value="Perempuan" <?= $staff->gender == "Perempuan" ? 'checked' : '' ?>>
                  <label class="form-check-label" for="radio2">Perempuan</label>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-4">
                <label>Email</label>
                <input type="email" class="form-control" name="email" value="<?= old('email', $staff->email_staff) ?>">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('email') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-4">
                <label>Nomor Telepon</label>
                <input type="tel" class="form-control" name="no" value="<?= old('no', $staff->no_telepon) ?>" onkeypress="validate(event)">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('no') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-4">
                <label>Status Publish di Web</label>
                <select name="status" class="form-control selectric">
                  <option value="<?= esc($staff->publish) ?>" selected><?= esc($staff->publish) ?></option>
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label>Alamat</label>
              <textarea class="form-control" name="alamat" style="height:60px; resize:none"><?= old('alamat', $staff->alamat) ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('alamat') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <label>Gambar Saat Ini</label><br>
              <img class="rounded mb-3" style="max-width:400px" src="<?= base_url('assets/img/staff/' . $staff->gambar_staff) ?>" alt="Preview" id="image-previews">
            </div>

            <div class="form-group">
              <label>Ganti Gambar (Opsional)</label>
              <input type="file" name="image" id="image-upload" class="form-control" onchange="previewFile(this);">
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('image') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Update Staff</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>