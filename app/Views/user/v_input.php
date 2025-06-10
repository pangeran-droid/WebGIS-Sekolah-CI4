<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
        </div>
        <div class="card-body">
            <?php
            $session = session();
            $validation = \Config\Services::validation();
            ?>

            <!-- Menampilkan Error Jika Ada -->
            <?php if ($session->getFlashdata('errors')) { ?>
                <div class="alert alert-danger alert-dismissible">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fas fa-exclamation-triangle"></i> Error!</h5>
                    <ul>
                        <?php foreach ($session->getFlashdata('errors') as $error) { ?>
                            <li><?= esc($error) ?></li>
                        <?php } ?>
                    </ul>
                </div>
            <?php } ?>

            <!-- Form Input User -->
            <?php echo form_open_multipart('User/InsertData', ['method' => 'post']) ?>
            <div class="form-group">
                <label>Nama User</label>
                <input name="nama_user" value="<?= old('nama_user') ?>" placeholder="Nama User" class="form-control">
                <p class="text-danger"><?= $validation->getError('nama_user') ?></p>
            </div>

            <div class="form-group">
                <label>E-Mail</label>
                <input name="email" value="<?= old('email') ?>" placeholder="E-Mail" class="form-control">
                <p class="text-danger"><?= $validation->getError('email') ?></p>
            </div>

            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" value="<?= old('password') ?>" placeholder="Password" class="form-control">
                <p class="text-danger"><?= $validation->getError('password') ?></p>
            </div>

            <div class="form-group">
                <label>Foto</label>
                <input type="file" name="foto" class="form-control">
                <p class="text-danger"><?= $validation->getError('foto') ?></p>
            </div>

            <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
            <a href="<?= base_url('User') ?>" class="btn btn-success btn-flat">Kembali</a>

            <?php echo form_close() ?>
        </div>
    </div>
</div>
