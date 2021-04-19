<!DOCTYPE html>
<html>
<head>
	<title>Data Laporan Kerusakan Jalan di Kabupaten Malang</title>
</head>
<body>
	<style type="text/css">
		body{
			font-family: sans-serif;
		}
		table{
			margin: 20px auto;
			border-collapse: collapse;
		}
		table th,
		table td{
			border: 1px solid #3c3c3c;
			padding: 3px 8px;

		}
		a{
			background: blue;
			color: #fff;
			padding: 8px 10px;
			text-decoration: none;
			border-radius: 2px;
		}
	</style>

	<?php
	header("Content-type: application/vnd-ms-excel");
	header("Content-Disposition: attachment; filename=Data Laporan Kerusakan Jalan.xls");
	?>

	<center>
		<h1>Data Laporan Kerusakan Jalan di Kabupaten Malang</h1>
	</center>

	<table border="1">
		<tr>
			<th>No</th>
			<th>Pelapor</th>
			<th>NIK</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Lokasi</th>
			<th>Kerusakan</th>
			<th>Tanggal</th>
			<th>Latitude</th>
			<th>Longitude</th>
		</tr>
		<?php 
		$id = 1;
		foreach ($cetak as $ctk) : ?>
			<tr>
				<td><?php echo $id++ ?></td>
				<td><?php echo $ctk['pelapor']?></td>
				<td><?php echo $ctk['nik']?></td>
				<td><?php echo $ctk['email']?></td>
				<td><?php echo $ctk['telepon']?></td>
				<td><?php echo $ctk['lokasi']?><br><?php echo $ctk['nama_kecamatan']?></td>
				<td><?php echo $ctk['jenis']?></td>
				<td><?php echo $ctk['tanggal']?></td>
				<td><?php echo $ctk['latitude']?>
				<td><?php echo $ctk['longitude']?>
			</tr>

		<?php endforeach; ?>
	</table>
</body>
</html>