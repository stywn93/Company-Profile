<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= base_url('client') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('home') ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">Di halaman ini Anda dapat membuat Client baru</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tambah Client</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="<?= base_url('client/tambah') ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row">
                  <div class="form-group col-lg-4">
                    <label>Nama Client</label>
                    <input type="text" class="form-control" name="name" value="<?= old('name') ?>" autofocus>
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('name') ?></small>
                    <?php endif ?>
                  </div>

                  <div class="form-group col-lg-4">
                    <label>Jenis Perusahaan</label>
                    <select name="jenis" class="form-control selectric">
                      <?php foreach ($kategori as $kat): ?>
                        <option value="<?= $kat->id_kategori ?>"><?= esc($kat->nama_kategori) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>

                  <div class="form-group col-lg-4">
                    <label>Website</label>
                    <input type="text" class="form-control" name="website" value="<?= old('website') ?>" placeholder="URL Website">
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('website') ?></small>
                    <?php endif ?>
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
                    <label>Status Publish</label>
                    <select name="status" class="form-control selectric">
                      <option value="Publish">Publish</option>
                      <option value="Draft">Draft</option>
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
                  <label>Gambar</label><br>
                  <input type="file" name="image" id="image-upload" onchange="previewFile(this);" class="form-control">
                  <img class="rounded mt-2" style="width: 300px" src="<?= base_url('vendor/back-end/assets/img/transparent.png') ?>" alt="Preview" id="image-previews">
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('image') ?></small>
                  <?php endif ?>
                </div>

                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">Buat Client</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>