<link rel="stylesheet" href="<?= base_url(); ?>/assets/leaflet/leaflet.css" />
<script src="<?= base_url(); ?>/assets/leaflet/leaflet.js"></script>
<style>
#latlng { height: 50px; }
</style>
<div id="latlng">

 var map = L.map('latlng').setView([-7.9142456,112.6951788], 13);

L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map); 

</div>
