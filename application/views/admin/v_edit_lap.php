<div class="container-fluid">
	<div class="card shadow mb-4">
		<div class="card-header py-3">
			<h2 class="m-0 font-weight-bold text-primary">Form Edit Status Laporan</h2>
		</div>
		<div class="col-12" style="margin-left: -10px">
			<!-- <div class="card shadow mb-4"> -->
				<div style="padding: 20px">
					<?php foreach ($lapor as $lap) : ?>

						<form method="post" action="<?php echo base_url('C_admin/C_lap/update_lap') ?>">

							<div class="form-group">
								<label>Status</label>
								<select  class="form-control" name="status">
									<option disabled selected>-Pilih Status-</option>
									<?php foreach($status as $sts): ?>
										<option value="<?= $sts['status'] ?>"><?= $sts['status'] ?></option>
									<?php endforeach ?>
								</select>
								<input type="hidden" name="id_laporan" value="<?php echo $lap->id_laporan ?>">
							</div>
							<button type="submit" class="btn btn-success">Simpan</button>
							<button class="btn btn-danger" onclick="history.go(-1);">Kembali</button>

						</form>
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>