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
            <h2>Surat Keterangan Gaji Pegawai</h2>
            <hr style="width: 50%; border-width: 5px; color: black">
        </center>

        <?php foreach($potongan as $p) {
            $potongan=$p->jml_potongan;
        } ?>

        <?php $no=1; foreach($print_slip as $ps) : ?>
        <?php $potongan_gaji=$ps->alpha * $potongan; ?>

            <table styele="width: 100%">
                <p>Menerangkan dengan sebenarnya, bahwa :</p>
                <tr>
                    <td width="20%">Nama Pegawai</td>
                    <td width="2%">:</td>
                    <td><?php echo $ps->nama_pegawai ?></td>
                </tr>

                <tr>
                    <td>NIP</td>
                    <td>:</td>
                    <td><?php echo $ps->nip ?></td>
                </tr>

                <tr>
                    <td>Golongan</td>
                    <td>:</td>
                    <td><?php echo $ps->nama_golongan ?></td>
                </tr>

                <tr>
                    <td>Jabatan</td>
                    <td>:</td>
                    <td><?php echo $ps->nama_jabatan ?></td>
                </tr>

                <tr>
                    <td>Kategori</td>
                    <td>:</td>
                    <td><?php echo $ps->kat_jab ?></td>
                </tr>

                <tr>
                    <td>Bulan</td>
                    <td>:</td>
                    <td><?php echo substr($ps->bulan, 0,2) ?></td>
                </tr>

                <tr>
                    <td>Tahun</td>
                    <td>:</td>
                    <td><?php echo substr($ps->bulan, 2,4) ?></td>
                </tr>
            </table>
            <br>
            <table class="table table-bordered table-striped mt-2">
                <tr>
                    <th class="text-center" width="5%">No</th>
                    <th>Keterangan</th>
                    <th>Jumlah Gaji</th>
                </tr>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Gaji Pokok</td>
                    <td>Rp. <?php echo number_format($ps->gaji_pokok,0,',','.') ?></td>
                </tr>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Tunjangan Jabatan</td>
                    <td>Rp. <?php echo number_format($ps->tj_jabatan,0,',','.') ?></td>
                </tr>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Tunjangan Keluarga</td>
                    <td>Rp. <?php echo number_format($ps->tj_keluarga,0,',','.') ?></td>
                </tr>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Tunjangan Pangan</td>
                    <td>Rp. <?php echo number_format($ps->tj_pangan,0,',','.') ?></td>
                </tr>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Tunjangan BPJS</td>
                    <td>Rp. <?php echo number_format($ps->tj_bpjs,0,',','.') ?></td>
                </tr>

                <tr>
                    <td><?php echo $no++ ?></td>
                    <td>Potongan Gaji</td>
                    <td>Rp. <?php echo number_format($potongan_gaji,0,',','.') ?></td>
                </tr>

                <tr>
                    <th colspan="2" style="text-align: right;">Total Gaji</th>
                    <td>Rp. <?php echo number_format($ps->gaji_pokok + $ps->tj_jabatan + $ps->tj_keluarga + $ps->tj_pangan + $ps->tj_bpjs
                    - $potongan_gaji,0,',','.') ?></td>
                </tr>

            </table>

            <td class="ml-3">
                <p>Demikian Surat Keterangan ini dibuat untuk digunakan sebagaimana mestinya.</p>
            </td>
            <br>
            <table width="100%">
                <tr>
                    <td></td>
                    <td width="200px">
                        <p>Surabaya, <?php echo date("d M Y") ?> <br> <?= $keuangan['jabatan']?></p>
                        <br>
                        <br>
                        <br>
                        <p class="font-weight-bold"><?= $keuangan['nama_pegawai']?><br>_______________________<br>NIP. <?= $keuangan['nip']?></p>
                    </td>

                </tr>
            </table>

        <?php endforeach; ?>
    
</body>
</html>

<script type="text/javascript">
    window.print();
</script>