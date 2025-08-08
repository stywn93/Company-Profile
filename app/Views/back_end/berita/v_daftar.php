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

      <div class="row">
        <div class="col-12">
          <div class="card card-info">
            <div class="card-header">
              <h4><?= esc($subtitle) ?></h4>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table table-striped" id="example1">
                  <thead>
                    <tr>
                      <th class="text-center">No</th>
                      <th class="text-center">Judul</th>
                      <th class="text-center">Kategori</th>
                      <th class="text-center">Jenis</th>
                      <th class="text-center">Pembuat</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($berita as $value): ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center">
                          <?= esc($value->judul_berita) ?>
                          <div class="table-links">
                            <div class="bullet"></div>
                            <a href="<?= base_url('berita/edit/' . $value->id_berita) ?>">Edit</a>
                            <div class="bullet"></div>
                            <a href="#" data-toggle="modal" data-target="#hapus<?= $value->id_berita ?>" class="text-danger">Hapus</a>
                          </div>
                        </td>
                        <td class="text-center"><?= esc($value->nama_kategori) ?></td>
                        <td class="text-center"><?= esc($value->jenis_berita) ?></td>
                        <td class="text-center"><?= esc($value->nama) ?></td>
                        <td class="text-center">
                          <?php if ($value->status_berita == "Publish"): ?>
                            <span class="badge badge-primary"><?= esc($value->status_berita) ?></span>
                          <?php elseif ($value->status_berita == "Pending"): ?>
                            <span class="badge badge-warning"><?= esc($value->status_berita) ?></span>
                          <?php else: ?>
                            <span class="badge badge-danger"><?= esc($value->status_berita) ?></span>
                          <?php endif; ?>
                        </td>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Modal Hapus -->
<?php foreach ($berita as $value): ?>
  <div class="modal fade" id="hapus<?= $value->id_berita ?>" tabindex="-1">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">
            Menghapus Berita: <span class="badge badge-danger"><?= esc($value->judul_berita) ?></span>
          </h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="POST" action="<?= base_url('berita/hapus/' . $value->id_berita) ?>">
            <?= csrf_field() ?>
            <h5>Apakah Anda yakin ingin menghapus berita ini?</h5>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
<?php endforeach ?>