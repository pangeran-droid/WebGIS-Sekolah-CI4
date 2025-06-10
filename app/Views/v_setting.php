<div class="col-md-12">
  <div class="card card-outline card-primary">
    <div class="card-header">
      <h3 class="card-title"><?= $judul ?></h3>
      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <div class="card-body">
      <?php
      if (session()->getFlashdata('pesan')){
        echo '<div class="alert alert-success alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
          <h5><i class="icon fas fa-check"></i>';
        echo session()->getFlashdata('pesan');
        echo '</h5></div>';
      }
      ?>

      <?= form_open('Admin/UpdateSetting') ?>
      <div class="row">
        <div class="col-sm-7">
          <div class="form-group">
            <label>Nama Website</label>
            <input name="nama_web" value="<?= $web['nama_web'] ?>" class="form-control" placeholder="Nama Website" required>
          </div>
        </div>
        <div class="col-sm-3">
          <div class="form-group">
            <label>Coordinat Wilayah</label>
            <input name="coordinat_wilayah" value="<?= $web['coordinat_wilayah'] ?>" class="form-control" placeholder="Coordinat Wilayah" required>
          </div>
        </div>
        <div class="col-sm-2">
          <div class="form-group">
            <label>Zoom View</label>
            <input type="number" name="zoom_view" value="<?= $web['zoom_view'] ?>" min="0" max="20" class="form-control" placeholder="Zoom View" required>
          </div>
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Simpan</button>
      <?= form_close() ?>
    </div>
  </div>
</div>

<div class="col-md-12">
  <div id="map" style="width: 100%; height: 800px;"></div>
</div>

<script>
  var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
  });

  var peta2 = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
    attribution: '&copy; OpenStreetMap contributors, Tiles style by Humanitarian OpenStreetMap Team'
  });

  var peta3 = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data: &copy; OpenStreetMap contributors, SRTM | Map style: OpenTopoMap'
  });

  var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; OpenStreetMap contributors, Imagery © Mapbox',
    id: 'mapbox/streets-v11'
  });

  var peta5 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; OpenStreetMap contributors, Imagery © Mapbox',
    id: 'mapbox/satellite-v9'
  });

  var peta6 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
    attribution: 'Map data &copy; OpenStreetMap contributors, Imagery © Mapbox',
    id: 'mapbox/dark-v10'
  });

  var map = L.map('map', {
    center: [<?= $web['coordinat_wilayah'] ?>],
    zoom: <?= $web['zoom_view'] ?>,
    layers: [peta1]
  });

  var baseMaps = {
    'Streets': peta1,
    'OpenStreetMap.HOT': peta2,
    'OpenTopoMap': peta3,
    'OpenStreetMap': peta4,
    'Satelite': peta5,
    'Night': peta6
  };

  L.control.layers(baseMaps).addTo(map);
</script>
