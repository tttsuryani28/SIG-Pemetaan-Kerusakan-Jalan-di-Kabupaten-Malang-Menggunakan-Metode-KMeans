<div class="container-fluid">

	<?php echo $this->session->flashdata('pesan') ?>
	
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Detail Data Laporan Warga</h2>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div style="padding: 10px">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered"width="50%" cellspacing="0">
                        <thead>
                        <?php  
                        $id = 1;
                        ?>
                            <tr>
                                <th>No</th>
                                <td><?php echo $id++ ?></td>
                            <tr>
                                <th>Pelapor</th>
                                <td><?php echo $detail->pelapor?></td>
                            </tr>
                            <tr>
                                <th>NIK</th>
                                <td><?php echo $detail->nik?></td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td><?php echo $detail->email?></td>
                            </tr>       
                            <tr>
                                <th>Telepon</th>
                                <td><?php echo $detail->telepon?></td>
                            </tr>  
                            <tr>
                                <th>Lokasi</th>
                                <td><?php echo $detail->lokasi?></td>
                            </tr>    
                            <tr>
                                <th>Kecamatan</th>
                                <td><?php echo $detail->id_kecamatan?></td>
                            </tr>
                            <tr>
                                <th>Kerusakan</th>
                                <td><?php echo $detail->id_kerusakan?></td>
                            </tr>    
                            <tr>
                                <th>Keterangan</th>
                                <td><?php echo $detail->keterangan?></td>
                            </tr>
                            <tr>
                                <th>Tanggal</th>
                                <td><?php echo $detail->tanggal?></td>
                            </tr>
                            <tr>
                                <th>Latitude</th>
                                <td><?php echo $detail->latitude?></td>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <td><?php echo $detail->longitude?></td>
                            </tr>
                            <tr>
                                <th>Gambar</th>
                                <td><img src="<?php echo base_url() . 'gambar/' . $detail->gambar; ?>" width ="100"></td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td><strong><?php echo $detail->status?></strong></td>
                            </tr> 
                        </thead>
                    </table>
                    <button class="btn btn-danger" onclick="history.go(-1);">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</div>

