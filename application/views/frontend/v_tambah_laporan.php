<!-- <body>
  <div class="posisi">
    <div class="card">
      
    
 <center><h2 style="margin-top: 30px">Form Pelaporan Kerusakan Jalan</h2></center>
<div class="container" style="margin-top: 30px">
	<form method="post" action="<?php echo base_url('dashboard/simpan_laporan') ?>">
		<div class="form-group">
			<label>Pelapor</label>
			<input type="text" name="pelapor" class="form-control"></input>
			<?php echo form_error('pelapor', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Email</label>
			<input type="text" name="email" class="form-control"></input>
			<?php echo form_error('email', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Telepon</label>
			<input type="text" name="telepon" class="form-control"></input>
			<?php echo form_error('lokasi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Lokasi</label>
			<input type="text" name="lokasi" class="form-control"></input>
			<?php echo form_error('lokasi', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Kecamatan</label>
			<select name="id_kecamatan" type="text" class="form-control" placeholder="-Pilih Kecamatan-"> 
            	<option value="lawang">Lawang</option>
            	<option value="singosari">Singosari</option>
            	<option value="karangploso">Karangploso</option>
            	<option value="dau">Dau</option>
    		</select>
			<?php echo form_error('id_kecamatan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Kerusakan</label>
    		<select name="id_kerusakan" type="text" class="form-control" placeholder="-Pilih Kerusakan-"> 
            	<option value="lawang">Retak Memanjang</option>
            	<option value="singosari">Retak Melintang</option>
            	<option value="karangploso">Retak Tepi</option>
            	<option value="dau">Retak Buaya</option>
    		</select>
			<?php echo form_error('luas', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Keterangan</label>
    		<input type="text" class="form-control" name="keterangan" placeholder="Keterangan">
			<?php echo form_error('keterangan', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
    		<label>Tanggal</label>
    		<input type="date" class="form-control" name="tanggal"  placeholder="">
    		<?php echo form_error('tanggal', '<div class="text-danger small" ml-3>') ?>
  		</div>

  		<div class="form-group">
    		<label>Gambar</label>
    		<input type="text" class="form-control" name="gambar" placeholder="Gambar">
    		<?php echo form_error('gambar', '<div class="text-danger small" ml-3>') ?>
  		</div>

		<div class="form-group">
			<label>Longitude</label>
			<input type="text" name="longitude" class="form-control"></input>
			<?php echo form_error('longitude', '<div class="text-danger small" ml-3>') ?>
		</div>


		<div class="form-group">
			<label>Latitude</label>
			<input type="text" name="latitude" class="form-control"></input>
			<?php echo form_error('latitude', '<div class="text-danger small" ml-3>') ?>
		</div>

		<div class="form-group">
			<label>Status</label>
			<input type="text" name="status" class="form-control"></input>
			<?php echo form_error('status', '<div class="text-danger small" ml-3>') ?>
		</div>

		<button type="submit" class="btn btn-primary">Simpan</button>
	</form>
</div> -->