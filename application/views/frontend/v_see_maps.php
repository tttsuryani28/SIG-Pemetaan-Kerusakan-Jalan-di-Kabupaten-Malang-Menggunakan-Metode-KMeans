<?php include_once APPPATH.'views/metode.php'; ?>




<!-- End Header -->
<!-- <div id="map" class="card"></div> -->

<!-- <script type="text/javascript">
	var hasil = <?php echo json_encode($hasilSekarang); ?>;
</script>


<script type="text/javascript">
	var map = L.map('map').setView([-7.8913365,112.6329754], 14);
	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map);

	<?php foreach ($see as $key => $value) 
	{ if($value['status']=='VALID') 
	{ ?>
		L.marker([<?= $value['latitude'] ?>, <?= $value['longitude'] ?>]).bindPopup("<b>Nama Pelapor : </b><?= $value['pelapor'] ?><br><b>Lokasi : </b><?= $value['lokasi'] ?><br>").addTo(map);
	<?php }
} ?>

</script>





 -->

