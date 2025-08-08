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
                <th class="text-center">Nama Staff</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Email</th>
                <th class="text-center">Jenis Kelamin</th>
                <th class="text-center">No Telepon</th>
                <th class="text-center">Status</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($staff as $s): ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center">
                    <a href="<?= base_url('staff/detail/' . $s->id_staff) ?>" class="text-dark"><?= esc($s->nama_staff) ?></a>
                    <div class="table-links">
                      <div class="bullet"></div>
                      <a href="<?= base_url('staff/edit/' . $s->id_staff) ?>">Edit</a>
                      <div class="bullet"></div>
                      <a href="#" data-toggle="modal" data-target="#hapus<?= $s->id_staff ?>" class="text-danger">Hapus</a>
                    </div>
                  </td>
                  <td class="text-center"><?= esc($s->nama_kategori) ?></td>
                  <td class="text-center"><?= esc($s->email_staff) ?></td>
                  <td class="text-center"><?= esc($s->gender) ?></td>
                  <td class="text-center"><?= esc($s->no_telepon) ?></td>
                  <td class="text-center">
                    <?php if ($s->publish == "Publish"): ?>
                      <span class="badge badge-primary"><?= esc($s->publish) ?></span>
                    <?php else: ?>
                      <span class="badge badge-warning"><?= esc($s->publish) ?></span>
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

<!-- Hapus Modal -->
<?php foreach ($staff as $s): ?>
  <div class="modal fade" id="hapus<?= $s->id_staff ?>" tabindex="-1">
    <div class="modal-dialog">
      <div class="modal-content">
        <form method="POST" action="<?= base_url('staff/hapus/' . $s->id_staff) ?>">
          <?= csrf_field() ?>
          <div class="modal-header">
            <h6 class="modal-title">
              Menghapus Staff: <span class="badge badge-danger"><?= esc($s->nama_staff) ?></span>
            </h6>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
          </div>
          <div class="modal-body">
            <h5>Apakah Anda yakin ingin menghapus staff ini?</h5>
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