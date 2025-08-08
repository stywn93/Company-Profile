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
        </div>
        <div class="card-body table-responsive">
          <table class="table table-striped" id="example1">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Judul</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Client</th>
                <th class="text-center">Tanggal Project</th>
                <th class="text-center">Website</th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($portfolio as $value): ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center">
                    <?= esc($value->judul_portfolio) ?>
                    <div class="table-links">
                      <div class="bullet"></div>
                      <a href="<?= base_url('portfolio/edit/' . $value->id_portfolio) ?>">Edit</a>
                      <div class="bullet"></div>
                      <a href="#" data-toggle="modal" data-target="#hapus<?= $value->id_portfolio ?>" class="text-danger">Hapus</a>
                    </div>
                  </td>
                  <td class="text-center"><?= esc($value->judul_layanan) ?></td>
                  <td class="text-center"><?= esc($value->nama_client) ?></td>
                  <td class="text-center"><?= esc((new DateTime($value->date_project))->format('d-M-Y')) ?></td>
                  <td class="text-center"><?= esc($value->website_portfolio) ?></td>
                  <td class="text-center">
                    <?php if ($value->status_portfolio == "Publish"): ?>
                      <span class="badge badge-primary"><?= esc($value->status_portfolio) ?></span>
                    <?php elseif ($value->status_portfolio == "Pending"): ?>
                      <span class="badge badge-warning"><?= esc($value->status_portfolio) ?></span>
                    <?php else: ?>
                      <span class="badge badge-danger"><?= esc($value->status_portfolio) ?></span>
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
<?php foreach ($portfolio as $value): ?>
  <div class="modal fade" id="hapus<?= $value->id_portfolio ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="<?= base_url('portfolio/hapus/' . $value->id_portfolio) ?>">
          <?= csrf_field() ?>
          <div class="modal-header">
            <h6 class="modal-title">
              Menghapus Portfolio: <span class="badge badge-danger"><?= esc($value->judul_portfolio) ?></span>
            </h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h5>Apakah Anda yakin ingin menghapus portfolio ini?</h5>
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