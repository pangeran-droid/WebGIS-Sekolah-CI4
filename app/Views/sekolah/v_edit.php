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

          <?php echo form_open_multipart('Sekolah/UpdateData/' . $sekolah['id_sekolah']) ?>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label>Nama Sekolah</label>
                <input name="nama_sekolah" value="<?= $sekolah['nama_sekolah'] ?>" placeholder="Nama Sekolah" class="form-control">
                <p class="text-danger"><?= $validation->hasError('nama_sekolah') ? $validation->getError('nama_sekolah') : '' ?></p>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Akreditasi</label>
                <input name="akreditasi" value="<?= $sekolah['akreditasi'] ?>" placeholder="Akreditasi" class="form-control">
                <p class="text-danger"><?= $validation->hasError('akreditasi') ? $validation->getError('akreditasi') : '' ?></p>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Status</label>
                <select name="status" class="form-control">
                  <option value="<?= $sekolah['status'] ?>"><?= $sekolah['status'] ?></option>
                  <option value="Negeri">Negeri</option>
                  <option value="Swasta">Swasta</option>
                </select>
                <p class="text-danger"><?= $validation->hasError('akreditasi') ? $validation->getError('akreditasi') : '' ?></p>
              </div>
            </div>

            <div class="col-sm-2">
              <div class="form-group">
                <label>Jenjang</label>
                <select name="id_jenjang" class="form-control">
                  <option value=""> --Pilih Jenjang-- </option>
                  <?php foreach ($jenjang as $key => $value) { ?>
                    <option value="<?= $value['id_jenjang'] ?>" <?= $value['id_jenjang'] == $sekolah['id_jenjang'] ? 'selected' : '' ?>><?= $value['jenjang'] ?></option>
                  <?php } ?>
                </select>
                <p class="text-danger"><?= $validation->hasError('id_jenjang') ? $validation->getError('id_jenjang') : '' ?></p>
              </div>
            </div>
          </div>

            <div class="form-group">
                <label>Coordinat Sekolah</label>
                <div id="map" style="width: 100%; height: 500px;"></div>
                <input name="coordinat" id="Coordinat" value="<?= $sekolah['coordinat'] ?>" placeholder="Coordinat Sekolah" class="form-control" readonly>
                <p class="text-danger"><?= $validation->hasError('coordinat') ? $validation->getError('coordinat') : '' ?></p>
              </div>

            <div class="row">
              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Provinsi</label>
                    <select name="id_provinsi" id="id_provinsi" class="form-control select2" style="width: 100%;">
                      <option value=""> --Pilih Provinsi-- </option>
                      <?php foreach ($provinsi as $key => $value) { ?>
                        <option value="<?= $value['id_provinsi'] ?>" <?= $value['id_provinsi'] == $sekolah['id_provinsi'] ? 'selected' : '' ?>><?= $value['nama_provinsi'] ?></option>
                      <?php } ?>
                    </select>
                  <p class="text-danger"><?= $validation->hasError('id_provinsi') ? $validation->getError('id_provinsi') : '' ?></p>
                </div>
              </div>

              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kabupaten</label>
                    <select name="id_kabupaten" id="id_kabupaten" class="form-control select2">
                      <option value="<?= $sekolah['id_kabupaten'] ?>"><?= $sekolah['nama_kabupaten'] ?></option>
                    </select>
                  <p class="text-danger"><?= $validation->hasError('id_kabupaten') ? $validation->getError('id_kabupaten') : '' ?></p>
                </div>
              </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label>Kecamatan</label>
                    <select name="id_kecamatan" id="id_kecamatan" class="form-control select2">
                      <option value="<?= $sekolah['id_kecamatan'] ?>"><?= $sekolah['nama_kecamatan'] ?></option>
                    </select>
                  <p class="text-danger"><?= $validation->hasError('id_kecamatan') ? $validation->getError('id_kecamatan') : '' ?></p>
                </div>
              </div>
            </div>

            <div class="row">
              <div class="col-sm-8">
                <div class="form-group">
                  <label>Alamat</label>
                  <input name="alamat" value="<?= $sekolah['alamat'] ?>" placeholder="Alamat Sekolah" class="form-control">
                  <p class="text-danger"><?= $validation->hasError('alamat') ? $validation->getError('alamat') : '' ?></p>
                </div>
              </div>

              <div class="col-sm-4">
                  <div class="form-group">
                    <label>Wilayah Administrasi</label>
                    <select name="id_wilayah" class="form-control">
                    <option value=""> --Pilih Wilayah Administrasi-- </option>
                      <?php foreach ($wilayah as $key => $value) { ?>
                        <option value="<?= $value['id_wilayah'] ?>"<?= $value['id_wilayah'] == $sekolah['id_wilayah'] ? 'selected' : '' ?>><?= $value['nama_wilayah'] ?></option>
                      <?php } ?>
                    </select>
                  <p class="text-danger"><?= $validation->hasError('id_wilayah') ? $validation->getError('id_wilayah') : '' ?></p>
                </div>
              </div>
            </div>

              <div class="form-group">
                  <label>Ganti Foto Sekolah</label>
                  <input type="file" accept=".jpg" name="foto" value="<?= old('foto') ?>" class="form-control">
                  <p class="text-danger"><?= $validation->hasError('foto') ? $validation->getError('foto') : '' ?></p>
              </div>

              <button class="btn btn-primary btn-flat" type="submit">Simpan</button>
              <a href="<?= base_url('Sekolah')?>" class="btn btn-success btn-flat">Kembali</a>

          <?php echo form_close() ?>

          </div>
    </div>
</div>

<script>
  $(document).ready(function() {
    //Initialize Select2 Elements
    $('.select2').select2();

    $('#id_provinsi').change(function () {
      var id_provinsi = $('#id_provinsi').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Sekolah/Kabupaten') ?>",
        data: {
          id_provinsi: id_provinsi,
        },
        success: function (response) {
          $('#id_kabupaten').html(response);
        }
      });
    });

    $('#id_kabupaten').change(function () {
      var id_kabupaten = $('#id_kabupaten').val();
      $.ajax({
        type: "POST",
        url: "<?= base_url('Sekolah/Kecamatan') ?>",
        data: {
          id_kabupaten: id_kabupaten,
        },
        success: function (response) {
          $('#id_kecamatan').html(response);
        }
      });
    });

  });
</script>

<script>
    var peta1 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

	var peta2 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});


	var peta3 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

	var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/dark-v10'
	});


	var map = L.map('map', {
		center: [<?= $sekolah['coordinat'] ?>],
		zoom: [<?= $web['zoom_view'] ?>],
		layers: [peta3]
	});

	var baseMaps = {
		'OpenStreetMap': peta1,
		'Satelite': peta2,
		'Streets': peta3,
		'Nigth' : peta4,
	};

	var layerControl = L.control.layers(baseMaps).addTo(map);

  var coordinatInput = document.querySelector("input[name='coordinat']");

  var curLocation = [<?= $sekolah['coordinat'] ?>];
  map.attributionControl.setPrefix(false);
  var marker = new L.marker(curLocation, {
    draggable : 'true',
  });

  //mengambil coordinat saat marker di geser
  marker.on('dragend', function(e) {
    var position = marker.getLatLng();
    marker.setLatLng(position, {
      curLocation
    }).bindPopup(position).update();
    $("#Coordinat").val(position.lat + "," + position.lng);
  });

  //mengambil coordinat saat map onclick
  map.on("click", function(e) {
    var lat = e.latlng.lat;
    var lng = e.latlng.lng;
    if (!marker) {
      marker = L.marker(e.latlng).addTo(map);
    }else {
      marker.setLatLng(e.latlng);
    }
    coordinatInput.value = lat + ',' + lng;
  });

  map.addLayer(marker);
</script>
