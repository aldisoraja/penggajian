<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/dataGolongan/tambahData') ?>">
    <i class="fas fa-plus"></i> Tambah Data</a>
    <?php echo $this->session->flashdata('pesan') ?>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="table1" class="display" width="100%">
            <thead>
                <tr>
                    <th class="text-center">id Golongan</th>
                    <th class="text-center">Nama Golongan</th>
                    <th class="text-center">Gaji Pokok</th>
                    <th class="text-center">Tj Keluarga</th>
                    <th class="text-center">Tj Pangan</th>
                    <th class="text-center">Tj BPJS</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=3001; foreach($golongan as $g) : ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $g->nama_golongan ?></td>
                        <td class="text-center">Rp. <?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
                        <td class="text-center">Rp. <?php echo number_format($g->tj_keluarga,0,',','.') ?></td>
                        <td class="text-center">Rp. <?php echo number_format($g->tj_pangan,0,',','.') ?></td>
                        <td class="text-center">Rp. <?php echo number_format($g->tj_bpjs,0,',','.') ?></td>
                        <td>
                            <center>
                                <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/dataGolongan/updateData/'.$g->id_golongan) ?>"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Yakin Data ini akan Dihapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataGolongan/deleteData/'.$g->id_golongan) ?>"><i class="fas fa-trash-alt"></i></a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
       