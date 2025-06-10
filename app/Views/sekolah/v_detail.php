<div class="col-md-12">
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title"><?= $judul ?></h3>
            <!-- /.card-tools -->
        </div>
        <!-- /.card-header -->
         <div class="card-body">
            <div class="row">
                <div class="col-sm-6">
                <div id="map" style="width: 100%; height: 500px;"></div>
                </div>

                <div class="col-sm-6">
                    <img src="<?= base_url('foto/' . $sekolah['foto'] ) ?>" width="100%" height="500px">
                </div>

                <div class="col-sm-12">
                    <table class="table table-bordered">
                        <tr>
                            <th>Nama Sekolah</th>
                            <th width="30px">:</th>
                            <td><?= $sekolah['nama_sekolah'] ?></td>
                        </tr>
                        <tr>
                            <th>Jenjang Sekolah</th>
                            <th>:</th>
                            <td><?= $sekolah['jenjang'] ?></td>
                        </tr>
                        <tr>
                            <th>Status Sekolah</th>
                            <th>:</th>
                            <td><?= $sekolah['status'] ?></td>
                        </tr>
                        <tr>
                            <th>Akreditasi Sekolah</th>
                            <th>:</th>
                            <td><?= $sekolah['akreditasi'] ?></td>
                        </tr>
                        <tr>
                            <th>Alamat Sekolah</th>
                            <th>:</th>
                            <td><?= $sekolah['alamat'] ?>,<?= $sekolah['nama_kecamatan'] ?>,<?= $sekolah['nama_kabupaten'] ?>,<?= $sekolah['nama_provinsi'] ?></td>
                        </tr>
                    </table>
                    <a href="<?= base_url('Sekolah')?>" class="btn btn-success btn-flat">Kembali</a>
                </div>
            </div>

         </div>
    </div>
</div>



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

    L.geoJSON(<?= $sekolah['geojson'] ?>, {
        fillColor: '<?= $sekolah['warna'] ?>',
        fillOpacity: 0.5,
    })
    .bindPopup("<b><?= $sekolah['nama_wilayah'] ?></b>")
    .addTo(map);

    var icon = L.icon({
    iconUrl: '<?= base_url('marker/' . $sekolah['marker'])?>',
    iconSize:     [30, 40], // size of the icon
});
    L.marker([<?= $sekolah['coordinat'] ?>], {
        icon:icon
    }).addTo(map);

</script>
