<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Generate PDF</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/jquery.dataTables.min.css">
    
    <style>
        table th {
            background: #0c1c60 !important;
            color: #fff !important;
            border: 1px solid #ddd !important;
            line-height: 15px !important;
            text-align: center !important;
            vertical-align: middle !important;

        }

        table td {
            line-height: 15px !important;
            text-align: center !important;
            border: 1px solid;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Laporan Pasien</h2>
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Obat</th>
                <th>Nama Obat</th>
                <th>Jenis Obat</th>
                <th>Stok </th>
                <th>Harga</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $no = 1;
                if (count($Obats) > 0) {
                    foreach ($Obats as $data) {
                ?>
                        <tr>
                            <td> <?= $no++; ?></td>
                            <td> <?= $data['id_obat']; ?></td>
                            <td> <?= $data['nama_obat']; ?></td>
                            <td> <?= $data['jenis_obat']; ?></td>
                            <td> <?= $data['stok']; ?></td>
                            <td> <?= $data['harga']; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
        </tbody>
    </table>
    </div>
</body>

</html>