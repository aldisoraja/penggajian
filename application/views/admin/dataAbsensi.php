<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card mb-3">
        <div class="card-header bg-primary text-white">
            Filter Rekap Absensi Pegawai
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

            <button type="submit" class="btn btn-warning mb-2 ml-auto"><i class="fas fa-eye"> Tampilkan Data</i></button>
            <a href="<?php echo base_url('admin/dataAbsensi/inputAbsensi') ?>" class="btn btn-success mb-2 ml-2"><i class="fas fa-plus"> Input Kehadiran</i></a>
            
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

    <?php $jml_data = count($absensi);
    if($jml_data > 0) { ?>

    <div class="card-body">
        <table class="table table-responsive table-bordered table-striped" id="table4" class="display" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIP</th>
                    <th>NIK</th>
                    <th>Nama Pegawai</th>
                    <th>Jenis Kelamin</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <th>Kategori</th>
                    <th>Status</th>
                    <th class="text-center">Hadir</th>
                    <th class="text-center">Ijin</th>
                    <th class="text-center">Alpha</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no=1; foreach($absensi as $a) : ?>
                    <tr>
                        <td><?php echo $no++ ?></td>
                        <td><?php echo $a->nip_peg ?></td>
                        <td><?php echo $a->nik_peg ?></td>
                        <td><?php echo $a->nama_peg ?></td>
                        <td><?php echo $a->jenis_kel ?></td>
                        <td><?php echo $a->gol_pang ?></td>
                        <td><?php echo $a->nama_jab ?></td>
                        <td><?php echo $a->kategori_jab ?></td>
                        <td><?php echo $a->kedudukan ?></td>
                        <td class="text-center"><?php echo $a->hadir ?></td>
                        <td class="text-center"><?php echo $a->ijin ?></td>
                        <td class="text-center"><?php echo $a->alpha ?></td>
                        <td>
                            <center>
                                <a class="btn btn-sm btn-success" href="<?php echo base_url('admin/dataAbsensi/updateAbsensi/'.$a->nip_peg) ?>"><i class="fas fa-edit"></i></a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <?php }else{ ?>
        <span class="badge badge-danger"><i class="fas fa-info-circle"></i>Data masih kosong, Silahkan input
        data kehadiran pada bulan dan tahun yang Anda pilih. </span>
    <?php } ?>

    <br>
    <br>
    <br>

</div>