<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">Di halaman ini Anda dapat membuat Layanan baru</p>

      <div class="card">
        <div class="card-header">
          <h4><?= esc($subtitle) ?></h4>
        </div>
        <div class="card-body">
          <form method="POST" action="<?= base_url('layanan/tambah') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
              <div class="form-group col-lg-6">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" autofocus value="<?= old('judul') ?>" placeholder="Judul layanan">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('judul') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-6">
                <label>Status</label>
                <select name="status" class="form-control selectric">
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                  <option value="Pending">Pending</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label>Isi Layanan</label>
              <textarea name="isi" id="berita" class="form-control" rows="6" placeholder="Tulis konten layanan"><?= old('isi') ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('isi') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <label>Gambar Layanan</label><br>
              <input type="file" class="form-control-file" required name="image" id="image-upload" onchange="previewFile(this);">
              <img class="rounded mt-2" style="max-width:400px" src="<?= base_url('vendor/back-end/assets/img/transparent.png') ?>" alt="Preview" id="image-previews">
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('image') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Buat Layanan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>