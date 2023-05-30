<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 80%; margin-bottom: 100px">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('admin/dataPegawai/tambahDataAksi') ?>" enctype="multipart/form-data">

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>NIK</label>
                            <input type="text" name="nik" class="form-control" placeholder="Contoh : 3567865786876908">
                            <?php echo form_error('nik','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Nama Pegawai</label>
                            <input type="text" name="nama_pegawai" class="form-control" placeholder="Enter Name...">
                            <?php echo form_error('nama_pegawai','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Username...">
                            <?php echo form_error('username','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Password...">
                            <?php echo form_error('password','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control">
                                <option value="">--Pilih Jenis Kelamin--</option>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            <?php echo form_error('jenis_kelamin','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Golongan</label>
                            <select name="golongan" class="form-control">
                                <option value="">--Pilih golongan--</option>
                                <?php foreach($golongan as $g) : ?>
                                <option value="<?php echo $g->nama_golongan ?>"><?php echo $g->nama_golongan ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('golongan','<div class="text-small text-danger"></div>') ?>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan" class="form-control">
                                <option value="">--Pilih Jabatan--</option>
                                <?php foreach($jabatan as $j) : ?>
                                <option value="<?php echo $j->nama_jabatan ?>"><?php echo $j->nama_jabatan ?></option>
                                <?php endforeach; ?>
                            </select>
                            <?php echo form_error('jebatan','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Kategori</label>
                            <select name="kat_jab" class="form-control">
                                <option value="">--Pilih Kategori--</option>
                                <option value="Struktural">Struktural</option>
                                <option value="Fungsional">Fungsional</option>
                                <option value="-">Tidak Ada Kategori</option>
                            </select>
                            <?php echo form_error('katjab','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control">
                                <option value="">--Pilih Status--</option>
                                <option value="Outsourcing">Outsourcing</option>
                                <option value="P3K">P3K</option>
                                <option value="PNS">PNS</option>
                            </select>
                            <?php echo form_error('status','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Hak Akses</label>
                            <select name="hak_akses" class="form-control">
                                <option value="">--Pilih Hak Akses--</option>
                                <option value="1">Admin</option>
                                <option value="2">Pegawai</option>
                            </select>
                            <?php echo form_error('hak_akses','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <div class="form-group">
                            <label>Foto</label>
                            <input type="file" name="foto" class="form-control">
                            <?php echo form_error('foto','<div class="text-small text-danger"></div>') ?>
                        </div>

                        <button type="submit" class="btn btn-success mt-3">Submit</button>
                    </div>
                </div>

            </form>
        </div>
    </div>

</div>