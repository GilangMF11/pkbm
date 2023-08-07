<!DOCTYPE html>
<html>
<head>
    <title>Data Pembayaran SPP</title>
    <!-- Include any necessary CSS styling here -->
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        /* Add any other custom styles for the PDF */
        /* For example, you can hide some elements that are not relevant in the PDF */
        .hide-in-pdf {
            display: none;
        }
        /* Adjust the table styles to fit the PDF layout */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
    <h1>Data Pembayaran SPP</h1>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>NISN</th>
                <th>Nama</th>
                <th>Paket</th>
                <th>Jenis</th>
                <th>Nominal spp</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($dataSiswa as $row): ?>
                <tr>
                    <td><?= $row->no ?></td>
                    <td><?= $row->nisn ?></td>
                    <td><?= $row->nama_siswa ?></td>
                    <td><?= $row->kode_jurusan ?></td>
                    <td><?= $row->kategori ?></td>
                    <td><?= $row->nominal_jenis ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
