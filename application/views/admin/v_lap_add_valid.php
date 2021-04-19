<div class="container-fluid">

	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary">Form Tambah Data Valid</h2>
		</div>
		<div class="col-12" style="margin-left: -10px">
			<div style="padding: 20px">
				<div class="form-group">
					<label>Pelapor</label>
					<input type="text" name="pelapor" class="form-control" value="<?= $lapor['pelapor'] ?>" disabled></input>
				</div>

				<div class="form-group">
					<label>Email</label>
					<input type="text" name="email" class="form-control" value="<?= $lapor['email'] ?>" disabled></input>
				</div>

				<div class="form-group">
					<label>Telepon</label>
					<input type="text" name="telepon" class="form-control" value="<?= $lapor['telepon'] ?>" disabled></input>
				</div>

				<div class="form-group">
					<label>Lokasi</label>
					<input type="text" name="lokasi" class="form-control" value="<?= $lapor['lokasi'] ?>" disabled >
				</div>

				<form method="post" action="<?php echo base_url('C_admin/C_lap/lap_add_valid') ?>">
					<div class="form-group">
						<label>Kecamatan</label>
						<select class="form-control" name="id_kecamatan" id="kecamatan" required > 
							<option disabled>--Pilih Kecamatan--</option>
							<?php foreach ($kecamatan as $kec) {
								if ($lapor['id_kecamatan'] == $kec['id_kecamatan']) { ?>
									<option value="<?= $kec['id_kecamatan'] ?>" selected><?= $kec['nama_kecamatan'] ?></option>
								<?php } else{ ?>
									<option value="<?= $kec['id_kecamatan'] ?>"><?= $kec['nama_kecamatan'] ?></option>
								<?php } ?>

							<?php } ?>
						</select> 
					</div>

					<div class="form-group">
						<label>Ruas</label>
						<select class="form-control ruas" name="id_ruas" id="ruas" required>
							<option value="" >--Pilih Ruas--</option>
						</select>
					</div>

					<div class="form-group">
						<label>Dari (KM STA)</label>
						<input type="text" name="dari" class="form-control" required></input>
					</div>

					<div class="form-group">
						<label>Ke (KM STA)</label>
						<input type="text" name="ke" class="form-control" required></input>

					</div>

					<div class="form-group">
						<label>Lebar</label>
						<select class="form-control ruas" name="lebar" required>
							<option>--Pilih Bobot Lebar--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>

					</div>

					<div class="form-group">
						<label>Luas</label>
						<select class="form-control ruas" name="luas" required>
							<option>--Pilih Bobot Luas--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>

					</div>

					<div class="form-group">
						<label>Jenis</label>
						<select class="form-control ruas" name="id_kerusakan" required>
							<option>--Pilih Bobot Kerusakan--</option>
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
						</select>

					</div>

					<div class="form-group">
						<label>Latitude</label>
						<input type="text" name="latitude" class="form-control" value="<?= $lapor['latitude'] ?>" ></input>
					</div>

					<div class="form-group">
						<label>Longitude</label>
						<input type="text" name="longitude" class="form-control" value="<?= $lapor['longitude'] ?>" ></input>
					</div>

					<button type="submit" class="btn btn-success">Simpan</button>

					<button class="btn btn-danger" onclick="history.go(-1);">Kembali</button>
					<br>
					<br>
					<div class="card border-left-primary shadow h-50 py-2">
						<div class="card-body">
							<div class="row no-gutters align-items-center">
								<div class="col mr-2">
									<h5><i class="fas fa-info-circle text-gray-600">
									Kriteria Bobot</i></h5><br>
									<div class="row">
										<div class="col-md-4">
											<h6>Lebar</h6>
											<span class="badge badge-success badge-pill">  1 = 0</span><br>
											<span class="badge badge-primary badge-pill">  2 = <1mm</span><br>
											<span class="badge badge-warning badge-pill">  3 = 1-2mm</span><br>
											<span class="badge badge-danger badge-pill">  4 = >2mm</span><br>
										</div>

										<div class="col-md-4">
											<h6>Luas</h6>
											<span class="badge badge-success badge-pill">  1 = 0</span><br>
											<span class="badge badge-primary badge-pill">  2 = <10%</span><br>
											<span class="badge badge-warning badge-pill">  3 = 10-30%</span><br>
											<span class="badge badge-danger badge-pill">  4 = >40%</span><br>
										</div>

										<div class="col-md-4">
											<h6>Jenis</h6>
											<span class="badge badge-success badge-pill">  1 = Retak Memanjang</span><br>
											<span class="badge badge-primary badge-pill">  2 = Retak Melintang</span><br>
											<span class="badge badge-warning badge-pill">  3 = Retak Tepi</span><br>
											<span class="badge badge-danger badge-pill">  4 = Retak Buaya</span><br>
										</div>
									</div>

								</div>
							</div>
						</div>
					</div>


				</div>
			</div>
		</div>
	</div>