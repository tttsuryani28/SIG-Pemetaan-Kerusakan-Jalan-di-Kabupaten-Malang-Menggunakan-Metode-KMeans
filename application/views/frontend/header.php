<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Pelaporan Kerusakan Jalan</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="<?php echo base_url() ?>assets/img/logo.png" width="100px" height="170px" rel="icon">
  <link href="<?php echo base_url() ?>assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="<?php echo base_url() ?>https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="<?php echo base_url() ?>assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/venobox/venobox.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo base_url() ?>assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="<?php echo base_url() ?>assets/css/style.css" rel="stylesheet">

  <!-- search marker -->
  <link rel="stylesheet" href="<?php echo base_url() ?>leaflet-search/src/leaflet-search.css" />
  <script src="<?php echo base_url() ?>leaflet-search/src/leaflet-search.js"></script>

<!-- card -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js"></script>
  <!-- =======================================================
  * Template Name: Rapid - v2.2.0
  * Template URL: https://bootstrapmade.com/rapid-multipurpose-bootstrap-business-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
<link href="<?php echo base_url('assets/vendor/datatables/dataTables.bootstrap4.min.css')?>" rel="stylesheet">
<style type="text/css">
 .posisi {
  margin-top: 180px;
  margin-left: 150px;
  position: center;
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 80%;
} 

body {
  overflow: scroll;
}


</style>


<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>

  <style type="text/css">
    #map {
        position:   absolute; 
        right:  130px;left:   130px;bottom:   30px;top:  230px;
    }

    #latlng {
        position:   absolute; 
        right:  50px;left:   30px;bottom:   75px;top:  30px;
    }
    
  </style>
</head>
<body>
  
  <header id="header" class="fixed-top header-transparent">
    <div class="container d-flex align-items-center">
      <img src="<?php echo base_url('assets/img/logo.png')?>" width="80px" height="90px"/>
      <h1 class="logo mr-auto"></a></h1>
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a> -->

      <nav class="main-nav d-none d-lg-block">
        <ul>
          <li><a href="<?php echo base_url('dashboard/home')?>">Beranda</a></li>
          <!-- <li><a href="<?php echo base_url('dashboard/map')?>">Maps</a></li> -->
          <li class="drop-down"><a href="">Pelaporan</a>
            <ul>
              <li><a href="<?php echo base_url('dashboard/tambah_laporan')?>">Form Pelaporan</a></li>
              <li><a href="<?php echo base_url('dashboard/index')?>">Data Laporan Kerusakan Jalan Valid</a></li>
              <!-- <li><a href="<?php echo base_url('dashboard/add_marker')?>">input marker</a></li> -->
            </ul>
          </li>
          <li><a href="<?php echo base_url('dashboard/marker')?>">Peta Persebaran</a></li>
          <li><a href="<?php echo base_url('main/login')?>">Admin</a></li>
        </ul>
    </div>
  </header>
