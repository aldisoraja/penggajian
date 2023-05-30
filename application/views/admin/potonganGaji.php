<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
</div>

<a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/potonganGaji/tambahData') ?>">
<i class="fas fa-plus"></i> Tambah Data</a>
<?php echo $this->session->flashdata('pesan') ?>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="table5" class="display" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Potongan</th>
                    <th>Jumlah Potongan</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($pot_gaji as $p) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $p->potongan_gaji ?></td>
                        <td>Rp. <?php echo number_format($p->jml_potongan,0,',','.') ?></td>

                        <td>
                            <center>
                                <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/potonganGaji/updateData/'.$p->id_potongan) ?>"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Yakin Data ini akan Dihapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/potonganGaji/deleteData/'.$p->id_potongan) ?>"><i class="fas fa-trash-alt"></i></a>
                            </center>

                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
       