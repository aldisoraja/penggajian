<div class="container-fluid">

<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
</div>

<a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/dataJabatan/tambahData') ?>">
<i class="fas fa-plus"></i> Tambah Data</a>
<?php echo $this->session->flashdata('pesan') ?>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="table2" class="display" width="100%">
            <thead>
                <tr>
                <th>id Jabatan</th>
                <th>Nama Jabatan</th>
                <th>Kategori</th>
                <th>Tj. Jabatan</th>
                <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=2001; foreach($jabatan as $j) : ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $j->nama_jabatan ?></td>
                    <td><?php echo $j->kategori ?></td>
                    <td>Rp. <?php echo number_format($j->tj_jabatan,0,',','.') ?></td>
                    <td>
                        <center>
                            <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/dataJabatan/updateData/'.$j->id_jabatan) ?>"><i class="fas fa-edit"></i></a>
                            <a onclick="return confirm('Yakin Data ini akan Dihapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/datajabatan/deleteData/'.$j->id_jabatan) ?>"><i class="fas fa-trash-alt"></i></a>
                        </center>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
       