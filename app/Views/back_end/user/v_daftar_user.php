<!-- Main Content -->
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1><?= esc($title) ?></h1>
      <div class="section-header-breadcrumb">
        <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
        <div class="breadcrumb-item"><?= esc($title) ?></div>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= esc($title) ?></h2>
      <p class="section-lead"><?= esc($title) ?></p>

      <div class="card card-info">
        <div class="card-header">
          <h4><?= esc($title) ?></h4>
          <div class="float-right">
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-tambah">
              <i class="fas fa-fw fa-plus"></i> Tambah User
            </button>
          </div>
        </div>

        <div class="card-body table-responsive">
          <table class="table table-striped" id="example1">
            <thead>
              <tr>
                <th class="text-center">No</th>
                <th class="text-center">Nama</th>
                <th class="text-center">Email</th>
                <th class="text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1; foreach ($users as $u): ?>
                <tr>
                  <td class="text-center"><?= $no++ ?></td>
                  <td class="text-center"><?= esc($u->nama) ?></td>
                  <td class="text-center"><?= esc($u->email) ?></td>
                  <td class="text-center">
                    <?php if ($u->role_id != 1): ?>
                      <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $u->id_user ?>">
                        <i class="fas fa-fw fa-edit"></i> Edit
                      </button>
                      <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $u->id_user ?>">
                        <i class="fas fa-trash"></i> Hapus
                      </button>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modal-tambah" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="<?= base_url('user/adduser') ?>" class="needs-validation" novalidate>
        <?= csrf_field() ?>
        <div class="modal-header">
          <h5 class="modal-title">Tambah User</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" class="form-control" name="name" required value="<?= old('name') ?>">
            <?php if (isset($validation)) : ?>
              <small class="text-danger"><?= $validation->getError('name') ?></small>
            <?php endif ?>
          </div>
          <div class="form-group">
            <label>Email</label>
            <input type="email" class="form-control" name="email" required value="<?= old('email') ?>">
            <?php if (isset($validation)) : ?>
              <small class="text-danger"><?= $validation->getError('email') ?></small>
            <?php endif ?>
          </div>
          <div class="form-group">
            <label>Password</label>
            <input type="password" class="form-control" name="password" required>
            <?php if (isset($validation)) : ?>
              <small class="text-danger"><?= $validation->getError('password') ?></small>
            <?php endif ?>
          </div>
          <div class="form-group">
            <label>Level</label>
            <select name="role_id" class="form-control">
              <option value="1">Admin</option>
              <option value="2">Staff</option>
            </select>
          </div>
          <div class="form-group">
            <label>Aktivasi</label>
            <select name="is_active" class="form-control">
              <option value="1">Aktif</option>
              <option value="0">Tidak Aktif</option>
            </select>
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

<!-- Modal Edit & Hapus -->
<?php foreach ($users as $u): ?>
  <?php if ($u->role_id != 1): ?>
    <div class="modal fade" id="edit<?= $u->id_user ?>" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="<?= base_url('user/edituser/' . $u->id_user) ?>">
            <?= csrf_field() ?>
            <div class="modal-header">
              <h5 class="modal-title">Edit User: <?= esc($u->nama) ?></h5>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <input type="text" class="form-control mb-2" name="name" readonly value="<?= esc($u->nama) ?>">
              <input type="email" class="form-control mb-2" name="email" readonly value="<?= esc($u->email) ?>">
              <input type="password" class="form-control mb-2" name="password" placeholder="Password Baru">
              <select name="role_id" class="form-control mb-2">
                <option value="<?= $u->role_id ?>" selected><?= $u->role_id == 1 ? 'Admin' : 'Staff' ?></option>
                <option value="1">Admin</option>
                <option value="2">Staff</option>
              </select>
              <select name="is_active" class="form-control mb-2">
                <option value="<?= $u->is_active ?>" selected><?= $u->is_active ? 'Aktif' : 'Tidak Aktif' ?></option>
                <option value="1">Aktif</option>
                <option value="0">Tidak Aktif</option>
              </select>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-primary">Edit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="hapus<?= $u->id_user ?>" tabindex="-1">
      <div class="modal-dialog">
        <div class="modal-content">
          <form method="POST" action="<?= base_url('user/hapus/' . $u->id_user) ?>">
            <?= csrf_field() ?>
            <div class="modal-header">
              <h6 class="modal-title">Menghapus Akun: <span class="badge badge-danger"><?= esc($u->nama) ?></span></h6>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
              <h5>Apakah Anda yakin ingin menghapus akun ini?</h5>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-info" data-dismiss="modal">Tutup</button>
              <button type="submit" class="btn btn-danger">Hapus</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php endif ?>
<?php endforeach ?>