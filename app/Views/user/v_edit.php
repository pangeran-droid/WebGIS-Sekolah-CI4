<div class="col-md-12">
    <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>


                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
          <div class="card-body">
          <?php
          session();
          $validation = \Config\Services::validation();
          ?>

          <?php if (session()->getFlashdata('errors')) { ?>
              <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                  <ul>
                      <?php foreach (session()->getFlashdata('errors') as $error) { ?>
                          <li><?= esc($error) ?></li>
                      <?php } ?>
                  </ul>
              </div>
          <?php } ?>

          <?php echo form_open_multipart('User/UpdateData/' . $user['id_user']) ?>
          <div class="form-group">
                <label>Nama User</label>
                <input name="nama_user" value="<?= $user['nama_user'] ?>" placeholder="Nama User" class="form-control">
                <p class="text-danger"><?= $validation->hasError('nama_user') ? $validation->getError('nama_user') : '' ?></p>
              </div>

              <div class="form-group">
                <label>E-Mail</label>
                <input name="email" value="<?= $user['email'] ?>" placeholder="E-Mail" class="form-control">
                <p class="text-danger"><?= $validation->hasError('email') ? $validation->getError('email') : '' ?></p>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input name="password" value="<?= $user['password'] ?>" placeholder="Password" class="form-control">
                <p class="text-danger"><?= $validation->hasError('password') ? $validation->getError('password') : '' ?></p>
              </div>

              <div class="row">
                <div class="row-sm-4">
                  <div class="form-group">
                    <label>Ganti Foto</label>
                    <input type="file" name="foto" value="<?= old('foto') ?>" placeholder="Foto" class="form-control">
                    <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
                  </div>
                </div>
                <div class="row-sm-8">
                  <img src="<?= base_url('foto/' . $user['foto']) ?>" width="150px">
                </div>
              </div>

              <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
              <a href="<?= base_url('User')?>" class="btn btn-success btn-flat">Kembali</a>

          <?php echo form_close() ?>

      </div>
      <!-- /.card-body -->
    </div>
  <!-- /.card -->
</div>

