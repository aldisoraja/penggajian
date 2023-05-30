<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($jabatan as $j): ?>
            <form method="POST" action="<?php echo base_url('admin/dataJabatan/updateDataAksi') ?>">

                <div class="form-group">
                    <label>Nama Jabatan</label>
                    <input type="hidden" name="id_jabatan" class="form-control" value="<?php echo $j->id_jabatan ?>">
                    <input type="text" name="nama_jabatan" class="form-control" value="<?php echo $j->nama_jabatan ?>">
                    <?php echo form_error('nama_jabatan','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Kategori</label>
                    <select name="kategori" class="form-control">
                        <option value="<?php echo $j->kategori ?>"><?php echo $j->kategori ?></option>
                        <option value="Struktural">Struktural</option>
                        <option value="Fungsional">Fungsional</option>
                        <option value="-">Tidak Ada Kategori</option>
                    </select>
                    <?php echo form_error('kategori','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tunjangan Jabatan</label>
                    <input type="number" name="tj_jabatan" class="form-control" value="<?php echo $j->tj_jabatan ?>">
                    <?php echo form_error('tj_jabatan','<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>