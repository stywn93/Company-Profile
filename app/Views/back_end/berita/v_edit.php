<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= base_url('berita') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="<?= base_url('berita') ?>">Daftar Berita</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">
        Di halaman ini Anda dapat mengedit berita <strong><?= esc($berita->judul_berita) ?></strong>
      </p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4><?= esc($title) ?></h4>
            </div>
            <div class="card-body">
              <form method="POST" action="<?= base_url('berita/edit/' . $berita->id_berita) ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" value="<?= old('judul', $berita->judul_berita) ?>" autofocus>
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('judul') ?></small>
                    <?php endif ?>
                  </div>

                  <div class="form-group col-lg-6">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control selectric">
                      <option value="<?= esc($berita->id_kategori) ?>" selected><?= esc($berita->nama_kategori) ?></option>
                      <?php foreach ($kategori as $kat) : ?>
                        <option value="<?= $kat->id_kategori ?>"><?= esc($kat->nama_kategori) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <label>Status</label>
                    <select name="status" class="form-control selectric">
                      <option value="<?= $berita->status_berita ?>" selected><?= $berita->status_berita ?></option>
                      <option value="Publish">Publish</option>
                      <option value="Draft">Draft</option>
                      <option value="Pending">Pending</option>
                    </select>
                  </div>

                  <div class="form-group col-lg-6">
                    <label>Jenis Berita</label>
                    <select name="jenis_berita" class="form-control">
                      <option selected><?= $berita->jenis_berita ?></option>
                      <option value="Berita">Berita</option>
                      <option value="Profil">Profil</option>
                      <option value="Layanan">Layanan</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>Keywords</label>
                  <textarea class="form-control" name="keywords" style="height: 60px; resize: none;"><?= old('keywords', $berita->keywords) ?></textarea>
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('keywords') ?></small>
                  <?php endif ?>
                </div>

                <div class="form-group">
                  <label>Isi Berita</label>
                  <textarea name="isi" id="berita" class="form-control" rows="8"><?= old('isi', $berita->isi_berita) ?></textarea>
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('isi') ?></small>
                  <?php endif ?>
                </div>

                <div class="form-group text-center">
                  <label>Gambar Saat Ini</label><br>
                  <img class="rounded" width="300" src="<?= base_url('assets/img/berita/' . $berita->gambar_berita) ?>" alt="<?= esc($berita->judul_berita) ?>" id="image-previews">
                </div>

                <div class="form-group">
                  <label for="image-upload">Ganti Gambar (optional)</label>
                  <input type="file" name="image" id="image-upload" class="form-control" onchange="previewFile(this);">
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('image') ?></small>
                  <?php endif ?>
                </div>

                <div class="form-group text-center">
                  <button type="submit" class="btn btn-warning">Update Berita</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>