<?php include_once APPPATH.'views/metode.php'; ?>




<!-- End Header -->
<div id="map" class="card"></div>

<div class="form-group" style="margin-left: 130px">
	<!-- <div class="form-inline"> -->
		<div class="row">
			<div class="col-sm-4" style="margin-top: 150px">
				<label id="labelKec">Kecamatan</label>
				<select  class="form-control" name="id_kecamatan" id="filterKec">
					<option value="semua" selected>-Semua Kecamatan-</option>
					<?php foreach($kecamatan as $kec): ?>
						<option value="<?= $kec['id_kecamatan'] ?>"><?= $kec['nama_kecamatan'] ?></option>
					<?php endforeach ?>
				</select>
			</div>
			<!-- <div class="col-sm-4" style="margin-top: 150px">
				<label>Kerusakan</label>
				<select  class="form-control" name="id_kerusakan" id="filterKerusakan">
					<option value="semua">-Semua Kerusakan-</option>
					<?php foreach($kerusakan as $rus): ?>
						<option value="<?= $rus['id_kerusakan'] ?>"><?= $rus['jenis'] ?></option>
					<?php endforeach ?>
				</select>
			</div> -->
		</div>
		<!-- </div> -->
	</div>

	<?php 
		$goToMap= [];
		if (isset($_GET['lat']) && isset($_GET['lng'])) {
			$goToMap = ["lat" => $_GET['lat'], "lng" => $_GET['lng']];
		}
	 ?>



	<script type="text/javascript">
		var hasil = <?php echo json_encode($hasilSekarang); ?>;
		var markerPass = <?php echo json_encode($marker); ?>;
		var goToMapPass = <?php echo json_encode($goToMap); ?>;
	</script>


	<script src="<?php echo base_url('assets/admin/vendor/jquery/jquery.min.js')?>"></script>

	<script type="text/javascript">

	</script>


	<script type="text/javascript">

		$( document ).ready(function() {



			var map = L.map('map').setView([-7.8913365,112.6329754], 13);

			L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
				attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
			}).addTo(map);

			var iconKuning = L.icon({
				iconUrl: '<?=base_url('assets/img/marker/yellow.png')?>',
				iconSize: [40, 40]
			});

			var iconMerah = L.icon({
				iconUrl: '<?=base_url('assets/img/marker/red.png')?>',
				iconSize: [40, 40]
			});

			var iconHijau = L.icon({
				iconUrl: '<?=base_url('assets/img/marker/green.png')?>',
				iconSize: [40, 40]
			});



			var marker = [];

			
			

			console.log(goToMapPass);

			if (goToMapPass.length != 0) {
				console.log("hahahehe");

				document.getElementById("filterKec").style.visibility = "hidden";
				document.getElementById("labelKec").style.visibility = "hidden";

				Object.keys(hasil).forEach(key => {
					if (key == "C1") 
					{
						hasil[key].forEach(function(data) 
						{
							// console.log(markerPass);
							markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
										// console.log(goToMapPass.lat);
										if ((markerData.latitude == goToMapPass.lat) && (markerData.longitude == goToMapPass.lng)) {
											// console.log("adaaaaaaaaa");
							    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconKuning})
							    				.bindPopup(`
							    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
							    					<b>Ruas : </b>${markerData.nama_ruas}<br>
							    					<b>Kerusakan : </b>${markerData.jenis}<br>
							    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
							    					<b>Ke : </b>${markerData.ke}<br>
							    					<b>Cluster : </b>Ringan<br>
							    					<b>Status : </b>${markerData.status}`)
							    				.addTo(map));
										}
									}
								}
							});

						});
					} 
			

					else if(key == "C2")
					{
						hasil[key].forEach(function(data) 
						{
					   		markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
						    			if ((markerData.latitude == goToMapPass.lat) && (markerData.longitude == goToMapPass.lng)) {
						    				// console.log("adaaaaaaaaa");
							    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconHijau})
							    				.bindPopup(`
							    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
							    					<b>Ruas : </b>${markerData.nama_ruas}<br>
							    					<b>Kerusakan : </b>${markerData.jenis}<br>
							    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
							    					<b>Ke : </b>${markerData.ke}<br>
							    					<b>Cluster : </b>Sedang<br>
							    					<b>Status : </b>${markerData.status}`)
							    				.addTo(map));
										}
									}
								}
							});
						});
					} 
					else if(key == "C3")
					{
						hasil[key].forEach(function(data) 
						{
					    	markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
						    			if ((markerData.latitude == goToMapPass.lat) && (markerData.longitude == goToMapPass.lng)) {
						    				// console.log("adaaaaaaaaa");
							    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconMerah})
							    				.bindPopup(`
							    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
							    					<b>Ruas : </b>${markerData.nama_ruas}<br>
							    					<b>Kerusakan : </b>${markerData.jenis}<br>
							    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
							    					<b>Ke : </b>${markerData.ke}<br>
							    					<b>Cluster : </b>Berat<br>
							    					<b>Status : </b>${markerData.status}`)
							    				.addTo(map));
										}
									}
								}
							});
						});
					}
				});

			} else {

				mapAll();
			
				var idKecFilter = '';
				var idKerusakanFilter = '';


				$('#filterKec').change(function(){ 
					if ($(this).val() == "semua") {
						mapAll();
					} else {
						idKecFilter = $(this).val();

						if (marker) {
							marker.forEach(val => {
								map.removeLayer(val);
							});
						}
						mapFilterKecamatan();
					}
				});
			}


			function mapAll() {
				Object.keys(hasil).forEach(key => {
					if (key == "C1") 
					{
						hasil[key].forEach(function(data) 
						{
							// console.log(markerPass);
							markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
						    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconKuning})
						    				.bindPopup(`
						    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
						    					<b>Ruas : </b>${markerData.nama_ruas}<br>
						    					<b>Kerusakan : </b>${markerData.jenis}<br>
						    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
						    					<b>Ke : </b>${markerData.ke}<br>
						    					<b>Cluster : </b>Ringan<br>
						    					<b>Status : </b>${markerData.status}`)
						    				.addTo(map));
									}
								}
							});

						});
					} 
			

					else if(key == "C2")
					{
						hasil[key].forEach(function(data) 
						{
					   		markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
						    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconHijau})
						    				.bindPopup(`
						    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
						    					<b>Ruas : </b>${markerData.nama_ruas}<br>
						    					<b>Kerusakan : </b>${markerData.jenis}<br>
						    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
						    					<b>Ke : </b>${markerData.ke}<br>
						    					<b>Cluster : </b>Sedang<br>
						    					<b>Status : </b>${markerData.status}`)
						    				.addTo(map));
									}
								}
							});
						});
					} 
					else if(key == "C3")
					{
						hasil[key].forEach(function(data) 
						{
					    	markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
						    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconMerah})
						    				.bindPopup(`
						    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
						    					<b>Ruas : </b>${markerData.nama_ruas}<br>
						    					<b>Kerusakan : </b>${markerData.jenis}<br>
						    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
						    					<b>Ke : </b>${markerData.ke}<br>
						    					<b>Cluster : </b>Berat<br>
						    					<b>Status : </b>${markerData.status}`)
						    				.addTo(map));
									}
								}
							});
						});
					}
				});
			}
			
			function mapFilterKecamatan() {
				Object.keys(hasil).forEach(key => {
					if (key == "C1") {
						hasil[key].forEach(function(data) {

							markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
										if (idKecFilter == markerData.id_kecamatan) {
							    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconKuning})
							    				.bindPopup(`
							    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
							    					<b>Ruas : </b>${markerData.nama_ruas}<br>
							    					<b>Kerusakan : </b>${markerData.jenis}<br>
							    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
							    					<b>Ke : </b>${markerData.ke}<br>
							    					<b>Cluster : </b>Ringan<br>
							    					<b>Status : </b>${markerData.status}`)
							    				.addTo(map));
										}
									}
								}
							});

						});
					} else if(key == "C2"){
						hasil[key].forEach(function(data) {
							markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
										if (idKecFilter == markerData.id_kecamatan) {
							    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconHijau})
							    				.bindPopup(`
							    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
							    					<b>Ruas : </b>${markerData.nama_ruas}<br>
							    					<b>Kerusakan : </b>${markerData.jenis}<br>
							    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
							    					<b>Ke : </b>${markerData.ke}<br>
							    					<b>Cluster : </b>Sedang<br>
							    					<b>Status : </b>${markerData.status}`)
							    				.addTo(map));
										}
									}
								}
							});
						});
					} else if(key == "C3"){
						hasil[key].forEach(function(data) {
							markerPass.forEach(function(markerData) 
							{
								if (markerData.status != "SUDAH DIPERBAIKI") {
									if (data == markerData.id_valid){
										if (idKecFilter == markerData.id_kecamatan) {
							    			marker.push(L.marker([markerData.latitude, markerData.longitude], {icon:iconMerah})
							    				.bindPopup(`
							    					<b>Kecamatan : </b>${markerData.nama_kecamatan}<br>
							    					<b>Ruas : </b>${markerData.nama_ruas}<br>
							    					<b>Kerusakan : </b>${markerData.jenis}<br>
							    					<b>KM STA</b><br><b>Dari : </b>${markerData.dari}<br>
							    					<b>Ke : </b>${markerData.ke}<br>
							    					<b>Cluster : </b>Berat<br>
							    					<b>Status : </b>${markerData.status}`)
							    				.addTo(map));
										}
									}
								}
							});
						});
					}
				});
			}

		// 	function mapFilterKerusakan() {
		// 		Object.keys(hasil).forEach(key => {
		// 			if (key == "C1") {
		// 				hasil[key].forEach(function(data) {
		// 			    // console.log(data);
		// 			    <?php foreach ($marker as $key => $value) {
		// 			    	?>
		// 			    	if (data == <?= $value->id_valid ?>) {
		// 			    		if (idKerusakanFilter == <?= $value->id_kerusakan ?>) {
		// 				    		marker.push(L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {icon:iconKuning})
		// 				    		.bindPopup("<b>Kecamatan : </b><?= $value->nama_kecamatan ?><br><b>Ruas : </b><?= $value->nama_ruas ?><br><b>Kerusakan : </b><?= $value->jenis ?><br><b>KM STA</b><br><b>Dari : </b><?= $value->dari ?><br><b>Ke : </b><?= $value->ke ?><br><b>Cluster : </b>Ringan")
		// 				    		.addTo(map));
		// 			    		}
		// 			    	}

		// 			    <?php } ?>
		// 			});
		// 			} else if(key == "C2"){
		// 				hasil[key].forEach(function(data) {
		// 			    // console.log(data);
		// 			    <?php foreach ($marker as $key => $value) {
		// 			    	?>
		// 			    	if (data == <?= $value->id_valid ?>) {
		// 			    		if (idKerusakanFilter == <?= $value->id_kerusakan ?>) {
		// 				    		marker.push(L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {icon:iconHijau})
		// 				    		.bindPopup("<b>Kecamatan : </b><?= $value->nama_kecamatan ?><br><b>Ruas : </b><?= $value->nama_ruas ?><br><b>Kerusakan : </b><?= $value->jenis ?><br><b>KM STA</b><br><b>Dari : </b><?= $value->dari ?><br><b>Ke : </b><?= $value->ke ?><br><b>Cluster : </b>Sedang")
		// 				    		.addTo(map));
		// 				    	}
		// 			    	}

		// 			    <?php } ?>
		// 			});
		// 			} else if(key == "C3"){
		// 				hasil[key].forEach(function(data) {
		// 			    // console.log(data);
		// 			    <?php foreach ($marker as $key => $value) {
		// 			    	?>
		// 			    	if (data == <?= $value->id_valid ?>) {
		// 			    		if (idKerusakanFilter == <?= $value->id_kerusakan ?>) {
		// 				    		marker.push(L.marker([<?= $value->latitude ?>, <?= $value->longitude ?>], {icon:iconMerah})
		// 				    		.bindPopup("<b>Kecamatan : </b><?= $value->nama_kecamatan ?><br><b>Ruas : </b><?= $value->nama_ruas ?><br><b>Kerusakan : </b><?= $value->jenis ?><br><b>KM STA</b><br><b>Dari : </b><?= $value->dari ?><br><b>Ke : </b><?= $value->ke ?><br><b>Cluster : </b>Berat")
		// 				    		.addTo(map));
		// 				    	}
		// 			    	}

		// 			    <?php } ?>
		// 			});
		// 			}
		// 		});
		// 	}

	});


</script>
