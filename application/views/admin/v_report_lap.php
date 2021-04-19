<!DOCTYPE html>
<html><head>
	<title>PDF Laporan Warga</title>
</head><body>

<h2 style="text-align: center">Laporan Warga Kerusakan Jalan Kabupaten Malang</h2>
<!-- <img src="assets/img/logo.png"> -->
<br><br><br>

	<table border="1" style='border-collapse : collapse; text-align:center;' > 
		
		<tr>
			<th>No</th>
			<th>Pelapor</th>
			<!-- <th>NIK</th> -->
			<!-- <th>Email</th> -->
			<th>Lokasi</th>
			<th>Kerusakan</th>
			<th>Keterangan</th>
			<th>Tanggal</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<!-- <th>Gambar</th> -->
			<th>Status</th>
		</tr>

		<?php
		$id=1;
		foreach ($cetak as $pdf) : ?>
			<tr>
				<td width="20px"><?php echo $id++ ?></td>
				<td><?php echo $pdf['pelapor']?></td>
				<!-- <td><?php echo $pdf['nik']?></td> -->
				<!-- <td><?php echo $pdf['email']?></td> -->
				<td><?php echo $pdf['lokasi']?><br><?php echo $pdf['nama_kecamatan']?></td>
				<td><?php echo $pdf['jenis']?></td>
				<td><?php echo $pdf['keterangan']?></td>
				<td><?php echo $pdf['tanggal']?></td>
				<td><?php echo $pdf['latitude']?></td>
				<td><?php echo $pdf['longitude']?></td>
				<!-- <td><img src="<?php echo base_url('gambar/') . $pdf['gambar']; ?>" width ="100"></td> -->
				<td><?php echo $pdf['status']?></td>
			</tr>
		<?php endforeach; ?>

	</table>
	<!-- <script type ="text/javascript">window.print();</script> -->
</body></html>