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
      <p class="section-lead">Di halaman ini Anda dapat membuat Portfolio baru</p>

      <div class="card">
        <div class="card-header"><h4>Tulis Portfolio</h4></div>
        <div class="card-body">
          <form method="POST" action="<?= base_url('portfolio/tambah') ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
              <div class="form-group col-lg-6">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= old('judul') ?>" autofocus>
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('judul') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-6">
                <label>Client</label>
                <select name="client" class="form-control selectric">
                  <?php foreach ($client as $value): ?>
                    <option value="<?= $value->id_client ?>"><?= esc($value->nama_client) ?></option>
                  <?php endforeach ?>
                </select>
              </div>
            </div>

            <div class="row">
              <div class="form-group col-lg-3">
                <label>Status</label>
                <select name="status" class="form-control selectric">
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                  <option value="Pending">Pending</option>
                </select>
              </div>

              <div class="form-group col-lg-3">
                <label>Tanggal Project</label>
                <input type="date" class="form-control" name="date" value="<?= old('date') ?>">
              </div>

              <div class="form-group col-lg-3">
                <label>Layanan</label>
                <select name="layanan" class="form-control selectric">
                  <?php foreach ($layanan as $value): ?>
                    <option value="<?= esc($value->judul_layanan) ?>"><?= esc($value->judul_layanan) ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group col-lg-3">
                <label>Website</label>
                <input type="text" class="form-control" name="website" value="<?= old('website') ?>" placeholder="www.example.com">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('website') ?></small>
                <?php endif ?>
              </div>
            </div>

            <div class="form-group">
              <label>Testimoni</label>
              <textarea class="form-control" name="testimoni" style="height:100px; resize:none"><?= old('testimoni') ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('testimoni') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Isi Portfolio</label>
              <textarea name="isi" id="portfolio" class="form-control"><?= old('isi') ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('isi') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <label>Gambar</label><br>
              <input type="file" name="image" id="image-upload" required class="form-control-file" onchange="previewFile(this);">
              <img class="rounded mt-2" style="max-width:400px" src="<?= base_url('vendor/back-end/assets/img/transparent.png') ?>" alt="Preview" id="image-previews">
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('image') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Buat Portfolio</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>