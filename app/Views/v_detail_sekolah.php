<div class="col-sm-6">
    <div id="map" style="width: 100%; height: 500px;"></div>
</div>

<div class="col-sm-6">
    <img src="<?= base_url('foto/' . $sekolah['foto']) ?>" width="100%" height="500px">
</div>

<div class="col-sm-12">
    <table class="table table-bordered table-sm">
        <tr>
            <th width="180px">Nama Sekolah</th>
            <th width="50px" class="text-center">:</th>
            <td><?= $sekolah['nama_sekolah'] ?></td>
        </tr>
        <tr>
            <th>Jenjang Sekolah</th>
            <th class="text-center">:</th>
            <td><?= $sekolah['jenjang'] ?></td>
        </tr>
        <tr>
            <th>Akreditasi Sekolah</th>
            <th class="text-center">:</th>
            <td><?= $sekolah['akreditasi'] ?></td>
        </tr>
        <tr>
            <th>Status Sekolah</th>
            <th class="text-center">:</th>
            <td><?= $sekolah['status'] ?></td>
        </tr>
        <tr>
            <th>Alamat Sekolah</th>
            <th class="text-center">:</th>
            <td><?= $sekolah['alamat'] ?>, Prov. <?= $sekolah['nama_provinsi'] ?>, Kab. <?= $sekolah['nama_kabupaten'] ?>, Kec. <?= $sekolah['nama_kecamatan'] ?></td>
        </tr>
    </table>
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

	var layerControl = L.control.layers(baseMaps).addTo(map);

    L.marker([<?= $sekolah['coordinat'] ?>]).addTo(map)

</script>
