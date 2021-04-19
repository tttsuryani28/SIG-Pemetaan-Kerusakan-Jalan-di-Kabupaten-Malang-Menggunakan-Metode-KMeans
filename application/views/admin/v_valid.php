<div class="container-fluid">
    <?php ini_set('memory_limit', '1024M');?>

    <?php echo $this->session->flashdata('pesan') ?>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h2 class="m-0 font-weight-bold text-primary">Data Valid</h2>
            <?= $this->session->flashdata('alert'); ?>
        </div>
        <div style="padding: 20px">
            <div class="col-12" style="margin-left: -10px">
                <?php echo anchor('C_admin/C_valid/chained', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-plus fa-sm"></i>Tambah Data</button>')?>
                <!-- <?php echo anchor('c_admin/c_valid/pdf', '<button class="btn btn-sm btn-primary mb-3"><i class="fas fa-file fa-sm"></i>Export PDF</button>')?> -->
            </div>


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
                                <!-- <th>LEBAR</th> -->
                            <!-- <th>LUAS</th>
                            <th>JENIS</th>
                            <th>LATITUDE</th>
                            <th>LONGITUDE</th> -->
                            <th>STATUS</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody id="tbodyid">
                        <?php
                        $id=1;
                        foreach ($valid as $val) : ?>
                            <tr>
                                <td><?php echo $id++ ?></td>
                                <td><?php echo $val['nama_kecamatan']; ?></td>
                                <td><?php echo $val['nama_ruas']; ?></td>
                                <td><?php echo $val['dari'] ?></td>
                                <td><?php echo $val['ke'] ?></td>
                                <!-- <td><?php echo $val['lebar'] ?></td> -->
                                <!-- <td><?php echo $val['luas'] ?></td>
                                <td><?php echo $val['id_kerusakan'] ?></td>
                                <td><?php echo $val['latitude'] ?></td>
                                <td><?php echo $val['longitude'] ?></td> -->
                                <td>
                                    <center>
                                  <?php if($val['status']=="VALID")
                                  { ?>
                                    <div class="badge badge-md badge-primary"><i class="fa fa-list"></i></div>
                                  <?php } 

                                  elseif ($val['status']=="SUDAH DIPERBAIKI") {?>
                                    <div class="badge badge-md badge-success"><i class="fa fa-check"></i></div>
                                  <?php }
                                  ?>
                                </center>
                                </td>
                                <td>
                                    <a href="<?php echo base_url('C_admin/C_valid/update/') ?><?php echo $val['id_valid']; ?>" class="btn btn-xs btn-warning">     <i class="fa fa-edit"></i></a>
                                    <a href="<?php echo base_url('C_admin/C_valid/delete/') ?><?php echo $val['id_valid']; ?>" class="btn btn-xs btn-danger" onclick = "return confirm('Yakin ingin menghapus data?')"><i class= "fa fa-trash"></i></a>
                                    <a href="<?php echo base_url('C_admin/C_valid/detail/') ?><?php echo $val['id_valid']; ?>" class="btn btn-xs btn-primary"><i>Detail</i></a>
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
