<!DOCTYPE html>
<html>
<head>
    <style>
        /* Define your CSS styles here */
        body {
            font-family: Arial, sans-serif;
        }
        .content-wrapper {
            width: 100%;
            margin: auto;
        }
        /* ... (other styles) ... */
    </style>
</head>
<body>
    <div class="content-wrapper">
        <h1>Data Pembayaran SPP - <?= $dataSiswa->nama_siswa ?></h1>
        <!-- ... (other content) ... -->
        
        <?php foreach ($tahunAjaran as $keyTahunAjaran => $valueTahunAjaran) : ?>
            <?php if ($dataSiswa->{'kelas_' . $no} !== null) : ?>
                <h2>Angsuran SPP Tahun Ajaran <?= $valueTahunAjaran->tahun_ajaran ?></h2>
                <table>
                    <thead>
                        <tr>
                            <th>Bulan</th>
                            <th>Nominal Pembayaran</th>
                            <th>Tanggal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ganjil as $angkaBulan => $namaBulan) : ?>
                            <?php $dataPembayaran = DataPembayaranSpp($pembayaran, $valueTahunAjaran->kode_ta, $angkaBulan); ?>
                            <tr>
                                <td><?= $namaBulan ?></td>
                                <td><?= $dataPembayaran['nominal'] ?></td>
                                <td><?= $dataPembayaran['tanggal'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php endif; ?>
            <?php $no++; ?>
        <?php endforeach; ?>
        <!-- ... (other content) ... -->
    </div>
</body>
</html>
<?php var_dump($dataSiswa); ?>
<?php var_dump($tahunAjaran); ?>
<?php var_dump($ganjil); ?>
<?php var_dump($pembayaran); ?>