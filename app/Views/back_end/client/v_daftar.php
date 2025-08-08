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
                      <th class="text-center">Nama Client</th>
                      <th class="text-center">Jenis Client</th>
                      <th class="text-center">Alamat</th>
                      <th class="text-center">Email</th>
                      <th class="text-center">No Telepon</th>
                      <th class="text-center">Website</th>
                      <th class="text-center">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1; foreach ($client as $c): ?>
                      <tr>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="text-center">
                          <?= esc($c->nama_client) ?>
                          <div class="table-links">
                            <div class="bullet"></div>
                            <a href="<?= base_url('client/edit/' . $c->id_client) ?>">Edit</a>
                            <div class="bullet"></div>
                            <a href="#" data-toggle="modal" data-target="#hapus<?= $c->id_client ?>" class="text-danger">Hapus</a>
                          </div>
                        </td>
                        <td class="text-center"><?= esc($c->nama_kategori) ?></td>
                        <td class="text-center"><?= esc($c->alamat) ?></td>
                        <td class="text-center"><?= esc($c->email_client) ?></td>
                        <td class="text-center"><?= esc($c->no_telepon) ?></td>
                        <td class="text-center">
                          <a href="<?= esc($c->website) ?>" target="_blank"><?= esc($c->website) ?></a>
                        </td>
                        <td class="text-center">
                          <span class="badge <?= $c->publish == 'Publish' ? 'badge-primary' : 'badge-warning' ?>">
                            <?= esc($c->publish) ?>
                          </span>
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
<?php foreach ($client as $c): ?>
  <div class="modal fade" id="hapus<?= $c->id_client ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h6 class="modal-title">
            Menghapus Client: <span class="badge badge-danger"><?= esc($c->nama_client) ?></span>
          </h6>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form method="POST" action="<?= base_url('client/hapus/' . $c->id_client) ?>">
            <?= csrf_field() ?>
            <h5>Apakah Anda yakin ingin menghapus client ini?</h5>
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