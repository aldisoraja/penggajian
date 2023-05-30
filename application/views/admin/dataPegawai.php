<div class="container-fluid" style="margin-bottom: 100px">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <a class="btn btn-sm btn-primary mb-3" href="<?php echo base_url('admin/dataPegawai/tambahData') ?>">
    <i class="fas fa-plus"></i> Tambah Data</a>
    <?php echo $this->session->flashdata('pesan') ?>

    <div class="card-body table-responsive">
        <table class="table table-bordered table-striped" id="table1" class="display" width="100%">
            <thead>
                <tr>
                    <th class="text-center">NIP</th>
                    <th class="text-center">NIK</th>
                    <th class="text-center">Nama Pegawai</th>
                    <th class="text-center">Jenis Kelamin</th>
                    <th class="text-center">Golongan</th>
                    <th class="text-center">Jabatan</th>
                    <th class="text-center">Kategori</th>
                    <th class="text-center">Status</th>
                    <th class="text-center">Foto</th>
                    <th class="text-center">Hak Akses</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=10000001; foreach($pegawai as $p) : ?>
                    <tr>
                        <td class="text-center"><?php echo $no++ ?></td>
                        <td class="text-center"><?php echo $p->nik ?></td>
                        <td class="text-center"><?php echo $p->nama_pegawai ?></td>
                        <td class="text-center"><?php echo $p->jenis_kelamin ?></td>
                        <td class="text-center"><?php echo $p->golongan ?></td>
                        <td class="text-center"><?php echo $p->jabatan ?></td>
                        <td class="text-center"><?php echo $p->kat_jab ?></td>
                        <td class="text-center"><?php echo $p->status ?></td>
                        <td class="text-center"><img src="<?php echo base_url().'assets/avatar/'.$p->foto ?>" width="75px"></td>
                        <?php if($p->hak_akses=='1') { ?>
                            <td>Admin</td>
                        <?php }else{ ?>
                            <td>Pegawai</td>
                        <?php } ?>

                        <td>
                            <center>
                                <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/dataPegawai/updateData/'.$p->nip) ?>"><i class="fas fa-edit"></i></a>
                                <a onclick="return confirm('Yakin Data ini akan Dihapus ?')" class="btn btn-sm btn-danger" href="<?php echo base_url('admin/dataPegawai/deleteData/'.$p->nip) ?>"><i class="fas fa-trash-alt"></i></a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</div>
       