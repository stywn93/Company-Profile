<?php if ($mode === 'entri') : ?>
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <div class="section-header-back">
          <a href="<?= base_url('artikel') ?>" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <h1>Tulis Artikel</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Artikel</a></div>
          <div class="breadcrumb-item">Tulis Artikel</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Tulis Artikel</h2>
        <p class="section-lead">Di halaman ini Anda dapat membuat posting baru dan mengisi semua kolom.</p>

        <div class="card">
          <div class="card-header"><h4>Tulis Postingan</h4></div>
          <div class="card-body">
            <form method="POST" action="<?= base_url('artikel/tambah') ?>" enctype="multipart/form-data">
              <?= csrf_field() ?>

              <div class="form-group">
                <label>Judul</label>
                <input type="text" class="form-control" name="judul" value="<?= old('judul') ?>">
              </div>

              <div class="form-group">
                <label>Kategori</label>
                <select name="kategori" class="form-control selectric">
                  <option value="Tech">Tech</option>
                  <option value="News">News</option>
                  <option value="Political">Political</option>
                </select>
              </div>

              <div class="form-group">
                <label>Isi</label>
                <textarea name="isi" id="isi" class="form-control"><?= old('isi') ?></textarea>
              </div>

              <div class="form-group">
                <label>Thumbnail</label>
                <input type="file" name="image" id="image-upload" class="form-control">
              </div>

              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control selectric">
                  <option value="Publish">Publish</option>
                  <option value="Draft">Draft</option>
                  <option value="Pending">Pending</option>
                </select>
              </div>

              <div class="form-group text-center">
                <button class="btn btn-primary">Create Post</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php else : ?>
  <div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Daftar Artikel</h1>
        <div class="section-header-breadcrumb">
          <div class="breadcrumb-item active"><a href="#">Artikel</a></div>
          <div class="breadcrumb-item">Daftar Artikel</div>
        </div>
      </div>

      <div class="section-body">
        <h2 class="section-title">Daftar Artikel</h2>
        <p class="section-lead">
          Kami menggunakan DataTables dari @SpryMedia. <a href="https://datatables.net/">Dokumentasi di sini</a>.
        </p>

        <div class="card">
          <div class="card-header"><h4>Daftar Artikel</h4></div>
          <div class="card-body table-responsive">
            <table class="table table-striped" id="table">
              <thead>
                <tr>
                  <th class="text-center" style="width: 15%;">No</th>
                  <th class="text-center">Judul Artikel</th>
                  <th class="text-center">Opsi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 1; foreach ($artikel as $a): ?>
                  <tr>
                    <td class="text-center"><?= $no++ ?></td>
                    <td><?= esc($a->judul) ?></td>
                    <td class="text-center">
                      <a href="<?= base_url('artikel/detail/' . $a->id) ?>" class="btn btn-secondary">Detail</a>
                    </td>
                  </tr>
                <?php endforeach ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </section>
  </div>
<?php endif ?>