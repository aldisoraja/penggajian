<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card" width="50%">
        <div class="card-body">
            <form method="POST" action="<?php echo base_url('pegawai/ubahPassword/ubahPasswordAksi') ?>">
                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="passBaru" class="form-control">
                    <?php echo form_error('passBaru','<div class="text-small text-danger"></div>') ?>
                </div>

                <div class="form-group">
                    <label>Konfirmasi Password</label>
                    <input type="password" name="konfirmasiPass" class="form-control">
                    <?php echo form_error('konfirmasiPass','<div class="text-small text-danger"></div>') ?>
                </div>

                <button type="submit" class="btn btn-success">Simpan</button>

            </form>
        </div>
    </div>

</div>