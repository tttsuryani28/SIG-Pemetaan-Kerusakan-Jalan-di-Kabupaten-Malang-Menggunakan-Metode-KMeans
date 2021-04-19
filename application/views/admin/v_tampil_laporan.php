<div class="container-fluid">

	<?php echo $this->session->flashdata('pesan') ?>
	
  <div class="card shadow mb-4">
    <div class="card-header py-3">
      <h2 class="m-0 font-weight-bold text-primary">Laporan Data Kerusakan Jalan</h2>
      <?= $this->session->flashdata('alert'); ?>
    </div>
    <div class="card-body">
      <div class="table-responsive">

        <!-- dropdown export -->
<!--         <div class="dropdown">
          <button class="btn btn-sm btn-primary" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            <i class="fa fa-download"></i> Export
            <span class="caret"></span>
          </button>
          <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">
            <li><a href="<?php echo base_url('C_admin/C_lap/pdf')?>">PDF</a></li>
            <li><a href="<?php echo base_url('C_admin/C_lap/excel')?>">Excel</a></li>
          </ul>
        </div>
        <br>
        <br> -->


        <?php echo anchor('C_admin/C_lap/pdf', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-file-pdf fa-md"></i> Export PDF</button>')?>
        <?php echo anchor('C_admin/C_lap/excel', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-file fa-md"></i> Export Excel</button>')?>
        <br>
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th>No</th>
              <th>Pelapor</th>
              <th>Lokasi</th>
              <th>Kerusakan</th>
              <th>Tanggal</th>
              <th>Gambar</th>
              <th>Status</th>
              <th class="text-center" style="width : 125">AKSI</th>
            </tr>
          </thead>
          <tbody id="tbodyid">
            <?php
            $id=1;
            foreach ($lapor as $lap) : ?>
              <tr>
                <td width="20px"><?php echo $id++ ?></td>
                <td><?php echo $lap['pelapor']?></td>
                <td><?php echo $lap['lokasi']?><br><?php echo $lap['nama_kecamatan']?></td>
                <td><?php echo $lap['jenis']?></td>
                <td><?php echo $lap['tanggal']?></td>
                <!-- <td><?php echo $lap['longitude']?></td> -->
                <td><img src="<?php echo base_url() . '/gambar/' . $lap['gambar']; ?>" width ="100"></td>
                <!-- <td><?php echo $lap['status']?></td> -->
                <td>
                  <center>
                    <?php if($lap['status']=="BELUM DIPROSES")
                    { ?>
                      <div class="badge badge-md badge-secondary"><i class="fa fa-clock"></i></div>
                    <?php } 

                    elseif ($lap['status']=="VALID") {?>
                      <div class="badge badge-md badge-primary"><i class="fa fa-list"></i></div>
                    <?php }

                    elseif ($lap['status']=="SURVEY") {?>
                      <div class="badge badge-md badge-warning"><i class="fa fa-edit"></i></div>
                    <?php }

                    elseif ($lap['status']=="TIDAK VALID") {?>
                      <div class="badge badge-md badge-danger"><i class="fa fa-times"></i></div>
                    <?php }

                    elseif ($lap['status']=="SUDAH DIPERBAIKI") {?>
                      <div class="badge badge-md badge-success"><i class="fa fa-check"></i></div>
                    <?php }
                    ?>
                  </center>
                </td>
                <td>
                  <a href="<?php echo base_url('C_admin/C_lap/update/') ?><?php echo $lap['id_laporan']; ?>" class="badge badge-md  badge-light badge-pill"><i>Edit</i></a><br>
                  <a href="<?php echo base_url('C_admin/C_lap/delete/') ?><?php echo $lap['id_laporan']; ?>" class="badge badge-md badge-light badge-pill" onclick = "return confirm('Yakin ingin menghapus data?')"><i>Hapus</i></a><br>
                  <a href="<?php echo base_url('C_admin/C_lap/detail/') ?><?php echo $lap['id_laporan']; ?>" class="badge badge-md badge-light badge-pill"><i>Detail</i></a><br>
                  <a href="<?php echo base_url('C_admin/C_lap/lap_add/') ?><?php echo $lap['id_laporan']; ?>" class="badge badge-md badge-light badge-pill"><i>Add Valid</i></a>
                  <a href="<?php echo base_url('C_admin/C_lap/send_email/') ?><?php echo $lap['id_laporan']; ?>" class="badge badge-md badge-light badge-pill"><i>Verifikasi</i></a>
                </td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
        <br>

        <div class="card border-left-primary shadow h-50 py-2">
          <div class="card-body">
            <div class="row no-gutters align-items-center">
              <div class="col mr-2">
                <h4>Keterangan</h4>
                <span class="badge badge-secondary badge-pill"><i class="fa fa-clock">  Belum diproses</i></span>
                <span class="badge badge-primary badge-pill"><i class="fa fa-list">  Valid</i></span>
                <span class="badge badge-warning badge-pill"><i class="fa fa-edit">  Survey</i></span>
                <span class="badge badge-danger badge-pill"><i class="fa fa-times">  Tidak Valid</i></span>
                <span class="badge badge-success badge-pill"><i class="fa fa-check">  Sudah diperbaiki</i></span>
              </div>
            </div>
          </div>
        </div>




      </div>
    </div>
  </div>
</div>

