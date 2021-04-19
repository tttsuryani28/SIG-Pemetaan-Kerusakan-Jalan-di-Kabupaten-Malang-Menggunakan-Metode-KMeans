
<!-- End Header -->
<div id="map" class="card"></div>
<script type="text/javascript">

	var map = L.map('map').setView([-7.9142456,112.6951788], 13);

	L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
		attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
	}).addTo(map); 

</script>
