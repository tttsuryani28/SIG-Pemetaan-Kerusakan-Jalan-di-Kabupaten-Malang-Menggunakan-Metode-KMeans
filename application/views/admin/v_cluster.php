<div class="container-fluid">

	<?php echo $this->session->flashdata('pesan') ?>
	
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Clustering</h2>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div style="padding: 20px">
		
		<?php include_once APPPATH.'views/metode.php'; ?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
						<th>NO</th>
						<th>KECAMATAN</th>
						<th>RUAS</th>
						<th>DARI</th>
						<th>KE</th>
						<th>LEBAR</th>
						<th>LUAS</th>
						<th>JENIS</th>
						<!-- <th>LATITUDE</th>
						<th>LONGITUDE</th> -->
						<th>CLUSTER</th>

                        </tr>
                    </thead>
                    <tbody id="tbodyid">
                    <?php
                    $id = 1;
				foreach ($dataValid as $val) : ?>
					<tr>
						<td width="20px"><?php echo $id++ ?></td>
						<?php 
							foreach ($kecamatan as $kec) {
								if ($kec['id_kecamatan'] == $val['id_kecamatan']) { ?>
									<td><?php echo $kec['nama_kecamatan']; ?></td>
						<?php		}
							}

							foreach ($ruas as $r) {
								if ($r['id_ruas'] == $val['id_ruas']) { ?>
									<td><?php echo $r['nama_ruas']; ?></td>

						<?php		}
							}
						 ?>

						<td><?php echo $val['dari'] ?></td>
						<td><?php echo $val['ke'] ?></td>
						<td><?php echo $val['lebar'] ?></td>
						<td><?php echo $val['luas'] ?></td>
						<td><?php echo $val['id_kerusakan'] ?></td>
						<!-- <td><?php echo $val['latitude'] ?></td>
						<td><?php echo $val['longitude'] ?></td>-->

						<td>

							<?php 
							foreach ($hasilSekarang as $key => $hasil) {


								foreach ($hasil as $h) {
									if ($h == $val['id_valid']) {
										if ($key == 'C1') {
											echo 'Ringan';
										} elseif ($key == 'C2') {
											echo "Sedang";
										} elseif ($key == 'C3') {
											echo "Berat";
										}
									}
								}
							}
							?>
						</td>
				</tr>
			<?php endforeach; ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
