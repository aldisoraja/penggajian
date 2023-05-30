<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title ?></title>
    <style type="text/css">
        body{
            font-family: Arial;
            color: black;
        }
    </style>
</head>
<body>

        <center>
            <h1>DISNAKERTRANS JATIM</h1>
            <h2>Daftar Gaji Pegawai</h2>
        </center>
        <br>
        <table>
            <tr>
                <td>Bulan</td>
                <td>:</td>
                <td><?php echo $bulan ?></td>
            </tr>

            <tr>
                <td>Tahun</td>
                <td>:</td>
                <td><?php echo $tahun ?></td>
            </tr>
        </table>
        <br>
        <br>
        <table class="table table-bordered table-striped mt-2">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIP</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Golongan</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Gaji Pokok</th>
                <th class="text-center">Tunjangan Jabatan</th>
                <th class="text-center">Tunjangan Keluarga</th>
                <th class="text-center">Tunjangan Pangan</th>
                <th class="text-center">Tunjangan BPJS</th>
                <th class="text-center">Potongan</th>
                <th class="text-center">Total Gaji</th>
            </tr>

            <?php foreach ($potongan as $p) {
                $alpha=$p->jml_potongan;
            } ?>
            <?php $no=1; foreach($cetakGaji as $g) : ?>
            <?php $potongan = $g->alpha * $alpha ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $g->nip ?></td>
                    <td class="text-center"><?php echo $g->nama_pegawai ?></td>
                    <td class="text-center"><?php echo $g->nama_golongan ?></td>
                    <td class="text-center"><?php echo $g->nama_jabatan ?></td>
                    <td class="text-center"><?php echo $g->kat_jab ?></td>
                    <td>Rp. <?php echo number_format($g->gaji_pokok,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->tj_jabatan,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->tj_keluarga,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->tj_pangan,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->tj_bpjs,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($potongan,0,',','.') ?></td>
                    <td>Rp. <?php echo number_format($g->gaji_pokok + $g->tj_jabatan + $g->tj_keluarga + $g->tj_pangan 
                    + $g->tj_bpjs - $potongan,0,',','.') ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
        <br>
        <br>
        <table width="100%">
            <tr>
                <td></td>
                <td width="200px">
                    <p>Surabaya, <?php echo date("d M Y") ?> <br> <?= $keuangan['jabatan']?></p>
                    <br>
                    <br>
                    <p class="font-weight-bold"><?= $keuangan['nama_pegawai']?><br>_______________________<br>NIP. <?= $keuangan['nip']?></p>
                </td>
            </tr>
        </table>
    
</body>
</html>

<script type="text/javascript">
    window.print();
</script>