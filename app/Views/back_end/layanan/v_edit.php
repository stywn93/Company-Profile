<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= base_url('layanan') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><a href="<?= base_url('layanan') ?>">Daftar Layanan</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">Di halaman ini Anda dapat mengedit layanan <strong><?= esc($layanan->judul_layanan) ?></strong></p>

      <div class="card">
        <div class="card-header">
          <h4><?= esc($title) ?></h4>
        </div>
        <div class="card-body">
          <form method="POST" action="<?= base_url('layanan/edit/' . $layanan->id_layanan) ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
              <div class="form-group col-lg-6">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= old('judul', $layanan->judul_layanan) ?>" autofocus>
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('judul') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-6">
                <label>Status</label>
                <select name="status" class="form-control selectric">
                  <option value="<?= esc($layanan->status_layanan) ?>" selected><?= esc($layanan->status_layanan) ?></option>
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                  <option value="Pending">Pending</option>
                </select>
              </div>
            </div>

            <div class="form-group">
              <label>Isi Layanan</label>
              <textarea name="isi" id="berita" class="form-control" rows="6" placeholder="Isi layanan"><?= old('isi', $layanan->isi_layanan) ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('isi') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <label>Gambar Saat Ini</label><br>
              <img class="rounded mb-3" style="max-width: 400px" src="<?= base_url('assets/img/layanan/' . $layanan->gambar_layanan) ?>" alt="Gambar Layanan" id="image-previews">
            </div>

            <div class="form-group">
              <label>Ganti Gambar (Opsional)</label>
              <input type="file" class="form-control" name="image" id="image-upload" onchange="previewFile(this);">
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('image') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-warning">Update Layanan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>