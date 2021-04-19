<div class="container-fluid">

	<?php echo $this->session->flashdata('pesan') ?>
	
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Detail Data Valid</h2>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div style="padding: 20px">
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
                                <th>Kecamatan</th>
                                <td><?php echo $detail->id_kecamatan?></td>
                            </tr>
                            <tr>
                                <th>Ruas</th>
                                <td><?php echo $detail->id_ruas?></td>
                            </tr>     

                            <tr>
                                <th>Dari</th>
                                <td><?php echo $detail->dari?></td>
                            </tr>  
                            <tr>
                                <th>Ke</th>
                                <td><?php echo $detail->ke?></td>
                            </tr>    
                            <tr>
                                <th>Lebar</th>
                                <td><?php echo $detail->lebar?></td>
                            </tr>
                            <tr>
                                <th>Luas</th>
                                <td><?php echo $detail->luas?></td>
                            </tr>    
                            <tr>
                                <th>Jenis</th>
                                <td><?php echo $detail->id_kerusakan?></td>
                            </tr>
                            <tr>
                                <th>Latitude</th>
                                <td><?php echo $detail->latitude?></td>
                            </tr>
                            <tr>
                                <th>Longitude</th>
                                <td><?php echo $detail->longitude?></td>
                            </tr>
                        </thead>
                    </table>
                    <button class="btn btn-danger" onclick="history.go(-1);">Kembali</button>
                </div>
            </div>
        </div>
    </div>
</div>