<div class="col-md-12">
    <div class="card card-outline card-primary">
          <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>

            <div class="card-tools">
              <a href="<?= base_url('Wilayah/Input')?>" class="btn btn-flat btn-primary btn-sm">
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
          <table id="example2" class="table table-bordered table-striped">
            <thead>
              <tr class="text-center">
                <th width="50px">No</th>
                <th>Nama Wilayah</th>
                <th>Warna</th>
                <th width="100px">Aksi</th>
              </tr>
            </thead>
            <tbody>
              <?php $no = 1;
              foreach ($wilayah as $key => $value) { ?>
              <tr>
                <td><?= $no++ ?></td>
                <td><?= $value['nama_wilayah'] ?></td>
                <td style="background-color: <?= $value['warna'] ?> ;"></td>
                <td class="text-center">
                  <a href="<?= base_url('Wilayah/Edit/' . $value['id_wilayah']) ?>" class="btn btn-sm btn-warning btn-flat"><i class="fas fa-pencil-alt"></i></a>
                  <a href="<?= base_url('Wilayah/Delete/' . $value['id_wilayah']) ?>" onclick="return confirm('Yakin Hapus Data...?')" class="btn btn-sm btn-danger btn-flat"><i class="fas fa-trash"></i></a>
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

<div class="col-md-12">
<div id="map" style="width: 100%; height: 800px;"></div>
</div>
<script>
	var peta1 = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	});

    var peta2 = L.tileLayer('https://{s}.tile.openstreetmap.fr/hot/{z}/{x}/{y}.png', {
      attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Tiles style by <a href="https://www.hotosm.org/" target="_blank">Humanitarian OpenStreetMap Team</a> hosted by <a href="https://openstreetmap.fr/" target="_blank">OpenStreetMap France</a>'
    });

    var peta3 = L.tileLayer('https://{s}.tile.opentopomap.org/{z}/{x}/{y}.png', {
      attribution: 'Map data: &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, <a href="http://viewfinderpanoramas.org">SRTM</a> | Map style: &copy; <a href="https://opentopomap.org">OpenTopoMap</a> (<a href="https://creativecommons.org/licenses/by-sa/3.0/">CC-BY-SA</a>)'
    });

    var peta4 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/streets-v11'
	});

	var peta5 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
		id: 'mapbox/satellite-v9'
	});

    var peta6 = L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1IjoibWFwYm94IiwiYSI6ImNpejY4NXVycTA2emYycXBndHRqcmZ3N3gifQ.rJcFIG214AriISLbB6B5aw', {
		attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> contributors, ' +
			'<a href="https://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, ' +
			'Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
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
		'Nigth' : peta6,
	};

	var layerControl = L.control.layers(baseMaps).addTo(map);

  <?php foreach ($wilayah as $key => $value) { ?>
    var geojsonData = <?= json_encode($value['geojson']) ?>;
    console.log("GeoJSON Data for <?= $value['nama_wilayah'] ?>:", geojsonData); // Debugging
    
    try {
      L.geoJSON(JSON.parse(geojsonData), {
  style: function (feature) {
    return {
      fillColor: '<?= $value['warna'] ?>',
      color: '<?= $value['warna'] ?>', // Menentukan warna garis
      weight: 1,
      opacity: 1,
      fillOpacity: 0.5
    };
  }
})
      .bindPopup("<b><?= $value['nama_wilayah'] ?></b>")
      .addTo(map);
    } catch (error) {
      console.error("Error parsing GeoJSON:", error);
    }
  <?php } ?>
</script>


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