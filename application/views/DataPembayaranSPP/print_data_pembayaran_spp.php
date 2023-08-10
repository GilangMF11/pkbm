<!DOCTYPE html>
<html>
<head>
    <title>Laporan Data Pembayaran SPP</title>
    <style>
        /* Add any necessary CSS styling for the printable content here */
        body {
            font-family: Arial, sans-serif;
        }
        /* ... */
    </style>
</head>
<body>
    <!-- Printable content goes here -->
    <h2>Data Pembayaran SPP <?= $dataSiswa->nama_siswa ?></h2>
    <table border="1" cellspacing="0" cellpadding="5">
        <thead>
            <tr>
                <th>Bulan</th>
                <th>Nominal Pembayaran</th>
                <th>Tanggal</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($ganjil as $angkaBulan => $namaBulan) :
                $dataPembayaran = DataPembayaranSpp($pembayaran, $valueTahunAjaran->kode_ta, $angkaBulan);
            ?>
                <tr>
                    <td><?= $namaBulan ?></td>
                    <td><?= $dataPembayaran['nominal'] ?></td>
                    <td><?= $dataPembayaran['tanggal'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <!-- ... Additional content ... -->
</body>
</html>
