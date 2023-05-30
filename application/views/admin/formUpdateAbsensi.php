<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Update Rekap Absensi Pegawai
        </div>
        <div class="card-body">
        <form class="form-inline">
            <div class="form-group mb-2">
                <label for="staticEmail2">Bulan :</label>
                <select name="bulan" class="form-control ml-2">
                    <option value="">--Pilih Bulan--</option>
                    <option value="01">Januari</option>
                    <option value="02">Februari</option>
                    <option value="03">Maret</option>
                    <option value="04">April</option>
                    <option value="05">Mei</option>
                    <option value="06">Juni</option>
                    <option value="07">Juli</option>
                    <option value="08">Agustus</option>
                    <option value="09">September</option>
                    <option value="10">Oktober</option>
                    <option value="11">November</option>
                    <option value="12">Desember</option>
                </select>
            </div>
            

            <div class="form-group mb-2 ml-5">
                <label for="staticEmail2">Tahun :</label>
                <select name="tahun" class="form-control ml-2">
                    <option value="">--Pilih Tahun--</option>
                        <?php $tahun = date('Y');
                        for($i=2021;$i<$tahun+5;$i++) { ?>
                    <option value="<?php echo $i ?>"><?php echo $i ?></option>
                        <?php } ?>
                </select>
            </div>

            <button type="submit" class="btn btn-warning mb-2 ml-auto"><i class="fas fa-eye"> Generate</i></button>
            
        </form>
        </div>
    </div>

    <?php
        if((isset($_GET['bulan']) && $_GET['bulan']!='') && (isset($_GET['tahun']) && $_GET['tahun']!='')){
            $bulan      = $_GET['bulan'];
            $tahun      = $_GET['tahun'];
            $bulantahun = $bulan.$tahun;
        }else{
            $bulan      = date('m');
            $tahun      = date('Y');
            $bulantahun = $bulan.$tahun;
        }
    ?>

    <div class="alert alert-info">
        Menampilkan Rekap Absensi Pegawai Bulan: <span class="font-weight-bold"><?php echo $bulan ?></span>
        Tahun: <span class="font-weight-bold"><?php echo $tahun ?></span>
    </div>

    <form action="" method="POST">
        <button type="submit" name="submit" class="btn btn-success mb-3" value="submit">Simpan</button>
        <div class="card-body">
            <table class="table table-responsive table-bordered table-striped mt-2" id="table3" class="display" width="100%">
                <thead>
                    <tr>
                        <th>NIP</th>
                        <th>NIK</th>
                        <th>Nama Pegawai</th>
                        <th>Jenis Kelamin</th>
                        <th>Golongan</th>
                        <th>Jabatan</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="text-center" width="8%">Hadir</th>
                        <th class="text-center" width="8%">Ijin</th>
                        <th class="text-center" width="8%">Alpha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($update_absensi as $ua) : ?>
                        <tr>
                            <td><?php echo $ua->nip_peg ?></td>
                            <td><?php echo $ua->nik_peg ?></td>
                            <td><?php echo $ua->nama_peg ?></td>
                            <td><?php echo $ua->jenis_kel ?></td>
                            <td><?php echo $ua->gol_pang ?></td>
                            <td><?php echo $ua->nama_jab ?></td>
                            <td><?php echo $ua->kategori_jab ?></td>
                            <td><?php echo $ua->kedudukan ?></td>
                            <td><input type="number" name="hadir" class="form-control" value="<?php echo $ua->hadir ?>"></td>
                            <td><input type="number" name="ijin" class="form-control" value="<?php echo $ua->ijin ?>"></td>
                            <td><input type="number" name="alpha" class="form-control" value="<?php echo $ua->alpha ?>"></td>
                            <input type="text" hidden name="nip" value="<?= $ua->nip_peg ?>">
                            <input type="text" hidden name="bulan" value="<?= $ua->bulan ?>">
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </form>
    <br>
    <br>
    <br>

</div>