<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px">
        <div class="card-body">

            <?php foreach ($golongan as $g): ?>
            <form method="POST" action="<?php echo base_url('admin/dataGolongan/updateDataAksi') ?>">

                <div class="form-group">
                    <label>Nama golongan</label>
                    <input type="hidden" name="id_golongan" class="form-control" value="<?php echo $g->id_golongan ?>">
                    <input type="text" name="nama_golongan" class="form-control" value="<?php echo $g->nama_golongan ?>">
                    <?php echo form_error('nama_golongan','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Gaji Pokok</label>
                    <input type="number" name="gaji_pokok" class="form-control" value="<?php echo $g->gaji_pokok ?>">
                    <?php echo form_error('gaji_pokok','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tunjangan Keluarga</label>
                    <input type="number" name="tj_keluarga" class="form-control" value="<?php echo $g->tj_keluarga ?>">
                    <?php echo form_error('tj_keluarga','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tunjangan Pangan</label>
                    <input type="number" name="tj_pangan" class="form-control" value="<?php echo $g->tj_pangan ?>">
                    <?php echo form_error('tj_pangan','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Tunjangan BPJS</label>
                    <input type="number" name="tj_bpjs" class="form-control" value="<?php echo $g->tj_bpjs ?>">
                    <?php echo form_error('tj_bpjs','<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">Update</button>

            </form>
            <?php endforeach; ?>
        </div>
    </div>

</div>