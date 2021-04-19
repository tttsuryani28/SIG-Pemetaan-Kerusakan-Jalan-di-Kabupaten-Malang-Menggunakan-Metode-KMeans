<body>
  <div class="posisi">
    <div class="card">
      <div class="container" style="margin-top: 30px">
        <center><h2>Data Laporan Kerusakan Jalan Valid</h2></center>
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>No</th>
                <th>Pelapor</th>
                <th>Lokasi</th>
                <th>Kerusakan</th>
                <!-- <th>Keterangan</th> -->
                <th>Tanggal</th>
                <th>Latitude</th>
                <th>Longitude</th>
                <th>Gambar</th>
                <th>Maps</th>
                <!-- <th>Status</th> -->
              </tr>
            </thead>
            <?php 
            $id = 1;
            foreach ($lapor as $lap) 
            {
              if($lap['status']=='VALID')
                { ?>
                  <tbody>
                   <tr>
                    <td><?php echo $id++ ?></td>
                    <td><?php echo $lap['pelapor']?></td>
                    <td><?php echo $lap['lokasi']?><br><?php echo $lap['nama_kecamatan']?></td>
                    <td><?php echo $lap['jenis']?></td>
                    <!-- <td><?php echo $lap['keterangan']?></td> -->
                    <td><?php echo $lap['tanggal']?></td>
                    <td><?php echo $lap['latitude']?></td>
                    <td><?php echo $lap['longitude']?></td>
                    <td><img src="<?php echo base_url() . '/gambar/' . $lap['gambar']; ?>" width ="90"></td>
                    <td><a href="<?= base_url('Dashboard/marker').'?lat='.$lap['latitude'].'&lng='.$lap['longitude']; ?>" class="badge badge-sm  badge-primary badge-pill"><i>See Map</i></a><br></td>
                  </tr>
                </tbody>
              <?php }
            } ?>
          </table>
        </div>

        <br>
        <div class="card border-left-primary shadow h-50 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <h7 style = "font-style: italic;"><b>Keterangan : </b> Jika terdapat data laporan yang semula ada kemudian tidak ada, maka kerusakan sudah diperbaiki</i></h7><br>
              </div>
            </div>
          </div>
        </div>
        <br>

    </div>
  </div>
</div>