<?php include_once APPPATH.'views/metode.php'; ?>




<!-- End Header -->
<!-- <div id="map" class="card"></div> -->

<!-- <script type="text/javascript">
	var hasil = <?php echo json_encode($hasilSekarang); ?>;
</script> -->


<script type="text/javascript">
	
    // var data = 
    // [
    //     <?php foreach ($marker as $key => $value) { ?>
    //         {"jenis":[<?= $value->latitude ?>,<?= $value->longitude ?>], "nama_kecamatan":"<?= $value->nama_kecamatan ?>"},
    //     <?php } ?>	
    // ];
    
	// var map = new L.Map('map', {zoom: 13, center: new L.latLng(-7.8913365,112.6329754) });	//set center from first location
	// map.addLayer(new L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
	// 	attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
 //    }));
    
	// var markersLayer = new L.LayerGroup();	//layer contain searched elements
	// map.addLayer(markersLayer);

	// var controlSearch = new L.Control.Search({
	// 	position:'topright',		
	// 	layer: markersLayer,
	// 	initial: false,
	// 	zoom: 12,
	// 	marker: false
	// });

	// map.addControl( controlSearch );

	////////////populate map with markers from sample data
	// for(i in data) {
		// var nama_kecamatan = data[i].nama_kecamatan;	//value searched
        // var jenis = data[i].jenis;		//position found
		// var	marker = new L.Marker(new L.latLng(jenis), {title: nama_kecamatan} );//se property searched
	// 	marker.bindPopup('kecamatan: '+ nama_kecamatan );
	// 	markersLayer.addLayer(marker);
	// }
<!-- </script> -->
