<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= esc($subtitle) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><?= esc($subtitle) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($subtitle) ?></h2>
      <p class="section-lead"><?= esc($subtitle) ?></p>

      <div class="card card-info">
        <div class="card-header">
          <h4><?= esc($subtitle) ?></h4>
        </div>
        <div class="card-body table-responsive">
          <table class="table table-striped" id="example1">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Pembuat</th>
                <th class="text-center">Tanggal Buat</th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($layanan as $lay): ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center">
                    <?= esc($lay->judul_layanan) ?>
                    <div class="table-links">
                      <div class="bullet"></div>
                      <a href="<?= base_url('layanan/edit/' . $lay->id_layanan) ?>">Edit</a>
                      <div class="bullet"></div>
                      <a href="#" data-toggle="modal" data-target="#hapus<?= $lay->id_layanan ?>" class="text-danger">Hapus</a>
                    </div>
                  </td>
                  <td class="text-center"><?= esc($lay->nama) ?></td>
                  <td class="text-center"><?= esc($lay->date_cretated) ?></td>
                  <td class="text-center">
                    <?php if ($lay->status_layanan == 'Publish'): ?>
                      <span class="badge badge-primary"><?= esc($lay->status_layanan) ?></span>
                    <?php elseif ($lay->status_layanan == 'Pending'): ?>
                      <span class="badge badge-warning"><?= esc($lay->status_layanan) ?></span>
                    <?php else: ?>
                      <span class="badge badge-danger"><?= esc($lay->status_layanan) ?></span>
                    <?php endif ?>
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

<!-- Modal Hapus -->
<?php foreach ($layanan as $lay): ?>
  <div class="modal fade" id="hapus<?= $lay->id_layanan ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="<?= base_url('layanan/hapus/' . $lay->id_layanan) ?>">
          <?= csrf_field() ?>
          <div class="modal-header">
            <h6 class="modal-title">
              Menghapus Layanan: <span class="badge badge-danger"><?= esc($lay->judul_layanan) ?></span>
            </h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h5>Apakah Anda yakin ingin menghapus layanan ini?</h5>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
            <button type="submit" class="btn btn-danger">Hapus</button>
          </div>
        </form>
      </div>
    </div>
  </div>
<?php endforeach ?>