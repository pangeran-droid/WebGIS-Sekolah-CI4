<div class="col-md-12">
    <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
              <a href="<?= base_url('User/Input')?>" class="btn btn-flat btn-primary btn-sm">
                <i class="fas fa-plus"></i>Tambah
                  </a>
                </div>
                <!-- /.card-tools -->
            </div>
            <!-- /.card-header -->
          <div class="card-body">
            
          <?php
          //notif insert data
              if (session()->getFlashdata('insert')){
                echo '<div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('insert');
                echo '</h5></div>';
              }

              //notif update data
              if (session()->getFlashdata('update')){
                echo '<div class="alert alert-primary alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('update');
                echo '</h5></div>';
              }

              //notif delete data
              if (session()->getFlashdata('delete')){
                echo '<div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-check"></i>';
                echo session()->getFlashdata('delete');
                echo '</h5></div>';
              }
              ?>
          <table id="example2" class="table table-sm table-bordered table-striped">
            <thead>
              <tr class="text-center">
                <th width="50px">No</th>
                <th>Nama User</th>
                <th>E-mail</th>
                <th>Password</th>
                <th>Foto</th>
                <th width="150px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($user as $key => $value) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama_user'] ?></td>
                <td class="text-center"><?= $value['email'] ?></td>
                <td class="text-center"><?= $value['password'] ?></td>
                <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" width="100px" height="100px"></td>
                <td class="text-center">
                  <a href="<?= base_url('User/Edit/' . $value['id_user']) ?>" class="btn btn-xs btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                  <a href="<?= base_url('User/Delete/' . $value['id_user']) ?>" onclick="return confirm('Yakin Hapus Data...?')" class="btn btn-xs btn-danger btn-flat"><i class="fas fa-trash"></i></a>
                </td>
              </tr>
              <?php } ?>
            </tbody>
          </table>

      </div>
      <!-- /.card-body -->
    </div>
  <!-- /.card -->
</div>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>