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
            <h2>Laporan Rekap Absensi Pegawai</h2>
        </center>

        <?php
        
        $bulan=$this->input->post('bulan');
        $tahun=$this->input->post('tahun');
            
        ?>
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
        <table class="table table-bordered table-striped mt-2">
            <tr>
                <th class="text-center">No</th>
                <th class="text-center">NIP</th>
                <th class="text-center">Nama Pegawai</th>
                <th class="text-center">Golongan</th>
                <th class="text-center">Jabatan</th>
                <th class="text-center">Kategori</th>
                <th class="text-center">Status</th>
                <th class="text-center">Hadir</th>
                <th class="text-center">Ijin</th>
                <th class="text-center">Alpha</th>
            </tr>

            <?php $no=1; foreach($lap_kehadiran as $l) : ?>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td class="text-center"><?php echo $l->nip_peg ?></td>
                    <td class="text-center"><?php echo $l->nama_peg ?></td>
                    <td class="text-center"><?php echo $l->gol_pang ?></td>
                    <td class="text-center"><?php echo $l->nama_jab ?></td>
                    <td class="text-center"><?php echo $l->kategori_jab ?></td>
                    <td class="text-center"><?php echo $l->kedudukan ?></td>
                    <td class="text-center"><?php echo $l->hadir ?></td>
                    <td class="text-center"><?php echo $l->ijin ?></td>
                    <td class="text-center"><?php echo $l->alpha ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    
</body>
</html>

<script type="text/javascript">
    window.print();
</script>