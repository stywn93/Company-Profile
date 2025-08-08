<!-- Main Content -->
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
      <p class="section-lead"><?= esc($subtitle) ?></p>

      <div class="card card-info">
        <div class="card-header">
          <h4><?= esc($subtitle) ?></h4>
          <div class="float-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
              <i class="fas fa-fw fa-plus"></i> Tambah Kategori
            </button>
          </div>
        </div>

        <div class="card-body table-responsive">
          <table class="table table-striped" id="example1">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama Kategori</th>
                <th class="text-center">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($kategori as $kat): ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center"><?= esc($kat->nama_kategori) ?></td>
                  <td class="text-center">
                    <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $kat->id_kategori ?>">
                      <i class="fas fa-fw fa-edit"></i> Edit
                    </button>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $kat->id_kategori ?>">
                      <i class="fas fa-trash"></i> Hapus
                    </button>
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

<!-- Tambah Modal -->
<div class="modal fade" id="modal-tambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= base_url('kategori/tambahKategoristaff') ?>" class="needs-validation" novalidate>
        <?= csrf_field() ?>
        <div class="modal-header">
          <h5 class="modal-title">Tambah Kategori</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Kategori</label>
            <input type="text" class="form-control" name="name" value="<?= old('name') ?>" required>
            <?php if (isset($validation)) : ?>
              <small class="text-danger"><?= $validation->getError('name') ?></small>
            <?php endif ?>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Edit Modal -->
<?php foreach ($kategori as $kat): ?>
  <div class="modal fade" id="edit<?= $kat->id_kategori ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="<?= base_url('kategori/editkategoristaff/' . $kat->id_kategori) ?>" class="needs-validation" novalidate>
          <?= csrf_field() ?>
          <div class="modal-header">
            <h5 class="modal-title">Edit Kategori</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label>Nama Kategori</label>
              <input type="text" class="form-control" name="name" value="<?= old('name', $kat->nama_kategori) ?>" required>
              <?php if (isset($validation)) : ?>
                <small class="text-danger"><?= $validation->getError('name') ?></small>
              <?php endif ?>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-primary">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>

<!-- Hapus Modal -->
<?php foreach ($kategori as $kat): ?>
  <div class="modal fade" id="hapus<?= $kat->id_kategori ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="<?= base_url('kategori/hapuskategoristaff/' . $kat->id_kategori) ?>">
          <?= csrf_field() ?>
          <div class="modal-header">
            <h5 class="modal-title">
              Menghapus Kategori: <span class="badge badge-danger"><?= esc($kat->nama_kategori) ?></span>
            </h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h5>Apakah Anda yakin ingin menghapus kategori ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>