<div class="container-fluid">

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><?php echo $title ?></h1>
    </div>

    <div class="card-body">
        <table class="table table-responsive table-bordered table-striped" id="table1" class="display" width="100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Bulan/Tahun</th>
                    <th>NIP</th>
                    <th>Nama Pegawai</th>
                    <th>Golongan</th>
                    <th>Jabatan</th>
                    <th>Kategori</th>
                    <th>Gaji Pokok</th>
                    <th>Tunjangan Jabatan</th>
                    <th>Tunjangan Keluarga</th>
                    <th>Tunjangan Pangan</th>
                    <th>Tunjangan BPJS</th>
                    <th>Potongan</th>
                    <th>Total Gaji</th>
                    <th class="text-center">Cetak Slip</th>
                </tr>
            </thead>
            <tbody>

                <?php foreach($potongan as $p) {
                    $potongan=$p->jml_potongan;
                } ?>

                <?php $no=1; foreach($gaji as $g) : ?>
                <?php $pot_gaji=$g->alpha * $potongan; ?>
                <tr>
                    <td><?php echo $no++ ?></td>
                    <td><?php echo $g->bulan ?></td>
                    <td><?php echo $g->nip ?></td>
                    <td><?php echo $g->nama_pegawai ?></td>
                    <td><?php echo $g->nama_golongan ?></td>
                    <td><?php echo $g->nama_jabatan ?></td>
                    <td><?php echo $g->kat_jab ?></td>
                    <td>Rp. <?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->tj_jabatan,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->tj_keluarga,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->tj_pangan,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->tj_bpjs,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($pot_gaji,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->gaji_pokok + $g->tj_jabatan + $g->tj_keluarga + $g->tj_pangan 
                    + $g->tj_bpjs - $pot_gaji,0,',','.') ?></td>
                    <td>
                        <a class="btn btn-sm btn-success" href="<?php echo base_url('pegawai/dataGaji/cetakSlip/'.
                        $g->id_kehadiran) ?>"><i class="fas fa-print"> Cetak</i></a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    
</div>