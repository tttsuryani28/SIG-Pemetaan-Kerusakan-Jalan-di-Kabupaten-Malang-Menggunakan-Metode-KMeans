<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary">Form Edit Data Valid</h2>
			<?= $this->session->flashdata('alert'); ?>
		</div>
		<div style="padding: 20px">
			<?php foreach ($valid as $val) : ?>

				<form method="post" action="<?php echo base_url('C_admin/C_valid/update_valid') ?>">

					<!-- <input type="hidden " name="id_valid" value="<?= $val->id_valid ?>"> -->
					<div class="form-group">
						<label>Kecamatan</label>
						<select class="form-control" name="id_kecamatan" id="kecamatan" required> 
							<option disabled>--Pilih Kecamatan--</option>
							<?php foreach ($kecamatan as $kec) {
								if ($val->id_kecamatan == $kec['id_kecamatan']) { ?>
									<option value="<?= $kec['id_kecamatan'] ?>" selected><?= $kec['nama_kecamatan'] ?></option>
								<?php } else{ ?>
									<option value="<?= $kec['id_kecamatan'] ?>"><?= $kec['nama_kecamatan'] ?></option>
								<?php } ?>

							<?php } ?>
						</select> 
						<input type="hidden" name="id_valid" value="<?php echo $val->id_valid ?>">

					</div>

					<div class="form-group">
						<label>Ruas</label>
						<select class="form-control ruas" name="id_ruas" id="ruas">
							<option value="" >--Pilih Ruas--</option>
						</select>
					</div>



					<div class="form-group">
						<label>Dari (KM STA)</label>
						<input type="text" name="dari" class="form-control" value="<?php echo $val->dari?>">
					</div>

					<div class="form-group">
						<label>Ke (KM STA)</label>
						<input type="text" name="ke" class="form-control" value="<?php echo $val->ke?>">
					</div>

					<div class="form-group">
						<label>Lebar</label>
						<input type="text" name="lebar" class="form-control" value="<?php echo $val->lebar?>">
					</div>

					<div class="form-group">
						<label>Luas</label>
						<input type="text" name="luas" class="form-control" value="<?php echo $val->luas?>">
					</div>

					<div class="form-group">
						<label>Jenis</label>
						<input type="text" name="id_kerusakan" class="form-control" value="<?php echo $val->id_kerusakan?>">
					</div>

					<div class="form-group">
						<label>Latitude</label>
						<input type="text" name="latitude" class="form-control" value="<?php echo $val->latitude?>">
					</div>

					<div class="form-group">
						<label>Longitude</label>
						<input type="text" name="longitude" class="form-control" value="<?php echo $val->longitude?>">
					</div>

					<div class="form-group">
						<label>Status</label>
						<select  class="form-control" name="status">
							<option disabled selected>-Pilih Status-</option>
							<option value="VALID">VALID</option>
							<option value="SUDAH DIPERBAIKI">SUDAH DIPERBAIKI</option>
							<!-- <?php foreach($status as $sts): ?>
								<option value="<?= $sts['status'] ?>"><?= $sts['status'] ?></option>
							<?php endforeach ?> -->
						</select>
					</div>

					<button type="submit" class="btn btn-success">Simpan</button>

					<button class="btn btn-danger" onclick="history.go(-1);">Kembali</button>
				</form>

			<?php endforeach; ?>
		</div>
	</div>
</div>
</div>