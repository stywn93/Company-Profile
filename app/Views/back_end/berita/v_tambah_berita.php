<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= base_url('berita') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('home') ?>">Dashboard</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">Di halaman ini Anda dapat membuat Berita baru</p>

      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h4>Tulis Berita</h4>
            </div>
            <div class="card-body">
              <form method="POST" action="<?= base_url('berita/tambah') ?>" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <label>Judul</label>
                    <input type="text" class="form-control" name="judul" autofocus value="<?= old('judul') ?>">
                    <?php if (isset($validation)) : ?>
                      <small class="text-danger"><?= $validation->getError('judul') ?></small>
                    <?php endif ?>
                  </div>

                  <div class="form-group col-lg-6">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control selectric">
                      <?php foreach ($kategori as $kat): ?>
                        <option value="<?= $kat->id_kategori ?>"><?= esc($kat->nama_kategori) ?></option>
                      <?php endforeach ?>
                    </select>
                  </div>
                </div>

                <div class="row">
                  <div class="form-group col-lg-6">
                    <label>Status</label>
                    <select name="status" class="form-control selectric">
                      <option value="Publish">Publish</option>
                      <option value="Draft">Draft</option>
                      <option value="Pending">Pending</option>
                    </select>
                  </div>

                  <div class="form-group col-lg-6">
                    <label>Jenis Berita</label>
                    <select name="jenis_berita" class="form-control">
                      <option value="Berita">Berita</option>
                      <option value="Profil">Profil</option>
                      <option value="Layanan">Layanan</option>
                    </select>
                  </div>
                </div>

                <div class="form-group">
                  <label>Keywords</label>
                  <textarea class="form-control" name="keywords" style="height: 60px; resize: none"><?= old('keywords') ?></textarea>
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('keywords') ?></small>
                  <?php endif ?>
                </div>

                <div class="form-group">
                  <label>Isi Berita</label>
                  <textarea name="isi" id="berita"><?= old('isi') ?></textarea>
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('isi') ?></small>
                  <?php endif ?>
                </div>

                <div class="form-group text-center">
                  <label for="image-upload">Gambar</label><br>
                  <input type="file" required name="image" id="image-upload" onchange="previewFile(this);">
                  <img class="rounded mt-2" style="width: 100%; height: auto;" src="<?= base_url('vendor/back-end/assets/img/transparent.png') ?>" alt="Preview" id="image-previews">
                  <?php if (isset($validation)) : ?>
                    <small class="text-danger"><?= $validation->getError('image') ?></small>
                  <?php endif ?>
                </div>

                <div class="form-group text-center">
                  <button type="submit" class="btn btn-primary">Buat Berita</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>