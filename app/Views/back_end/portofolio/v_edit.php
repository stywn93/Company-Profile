<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="section-header-back">
        <a href="<?= base_url('portfolio') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
      </div>
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="<?= base_url('dashboard') ?>">Dashboard</a></div>
        <div class="breadcrumb-item active"><a href="<?= base_url('portfolio') ?>">Daftar Portfolio</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead">
        Di halaman ini Anda dapat mengedit Portfolio <strong><?= esc($portfolio->judul_portfolio) ?></strong>
      </p>

      <div class="card">
        <div class="card-header"><h4>Edit Portfolio</h4></div>
        <div class="card-body">
          <form method="POST" action="<?= base_url('portfolio/edit/' . $portfolio->id_portfolio) ?>" enctype="multipart/form-data">
            <?= csrf_field() ?>

            <div class="row">
              <div class="form-group col-lg-6">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= old('judul', $portfolio->judul_portfolio) ?>" autofocus>
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('judul') ?></small>
                <?php endif ?>
              </div>

              <div class="form-group col-lg-6">
                <label>Client</label>
                <select name="client" class="form-control selectric">
                  <option value="<?= $portfolio->id_client ?>" selected><?= esc($portfolio->nama_client) ?></option>
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
                  <option value="<?= $portfolio->status_portfolio ?>" selected><?= esc($portfolio->status_portfolio) ?></option>
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                  <option value="Pending">Pending</option>
                </select>
              </div>

              <div class="form-group col-lg-3">
                <label>Tanggal Project</label>
                <input type="date" class="form-control" name="date" value="<?= esc($portfolio->date_project) ?>">
              </div>

              <div class="form-group col-lg-3">
                <label>Layanan Portfolio</label>
                <select name="layanan" class="form-control selectric">
                  <option value="<?= esc($portfolio->judul_layanan) ?>" selected><?= esc($portfolio->judul_layanan) ?></option>
                  <?php foreach ($layanan as $values): ?>
                    <option value="<?= esc($values->judul_layanan) ?>"><?= esc($values->judul_layanan) ?></option>
                  <?php endforeach ?>
                </select>
              </div>

              <div class="form-group col-lg-3">
                <label>Website</label>
                <input type="text" class="form-control" name="website" value="<?= old('website', $portfolio->website_portfolio) ?>" placeholder="www.example.com">
                <?php if (isset($validation)) : ?>
                  <small class="text-danger"><?= $validation->getError('website') ?></small>
                <?php endif ?>
              </div>
            </div>

            <div class="form-group">
              <label>Testimoni</label>
              <textarea class="form-control" name="testimoni" style="height: 60px; resize: none"><?= old('testimoni', $portfolio->testimoni) ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('testimoni') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group">
              <label>Isi Portfolio</label>
              <textarea name="isi" id="portfolio" class="form-control"><?= old('isi', $portfolio->isi_portfolio) ?></textarea>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('isi') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <label>Gambar Saat Ini</label><br>
              <img class="rounded mb-3" style="max-width:400px" src="<?= base_url('assets/img/portfolio/' . $portfolio->gambar_portfolio) ?>" alt="Preview" id="image-previews">
            </div>

            <div class="form-group">
              <label>Ganti Gambar (Opsional)</label>
              <input type="file" name="image" class="form-control" id="image-upload" onchange="previewFile(this);">
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('image') ?></small>
              <?php endif ?>
            </div>

            <div class="form-group text-center">
              <button type="submit" class="btn btn-primary">Edit Portfolio</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
</div>