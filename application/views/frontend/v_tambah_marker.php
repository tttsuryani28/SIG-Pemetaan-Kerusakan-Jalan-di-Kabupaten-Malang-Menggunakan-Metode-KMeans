
<div class="container" style="margin-top: 170px">
	<div class="card">
		<form method="post" enctype="multipart/form-data" action="<?php echo base_url('dashboard/simpan_custom_marker')?>">
		<h2 style="margin-top: 10px">Form</h2>
		<div class="card-body">
			<div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group ">
								<label>Cluster</label>
								<input type="text" class="form-control" name="cluster" required>
							</div>
							<div class="form-group">
								<label>Marker</label>
								<input type="file" class="form-control" name="userfile" size="20" required="">
							</div>
						</div>
							<div class="form-group">								
								<!-- <button type="submit" name="submit" class="btn btn-primary float-right" style="margin-top: 450px">Simpan</button> -->

								<button type="submit" class="btn btn-success" style="margin-top: 450px">Simpan</button>

								<button class="btn btn-danger" style="margin-top: 450px" onclick="history.go(-1);">Kembali</button>
							</div>
						</div>

					</div>
				</table>				
			</div>
		</div>	
		</form>
			<!-- <?php echo form_close(); ?> -->
	</div>
</div>

