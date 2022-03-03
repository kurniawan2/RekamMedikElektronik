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
                <th>ID Pasien</th>
                <th>Nama Pasien</th>
                <th>Alamat Pasien</th>
                <th>No Rekam Medis</th>
                <th>No Hp Dokter</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $no = 1;
                if (count($pasiens) > 0) {
                    foreach ($pasiens as $data) {
                ?>
                        <tr>
                            <td> <?= $no++; ?></td>
                            <td> <?= $data['id_pasien']; ?></td>
                            <td> <?= $data['nama_pasien']; ?></td>
                            <td> <?= $data['alamat_pasien']; ?></td>
                            <td> <?= $data['no_rm_pasien']; ?></td>
                            <td> <?= $data['nohp_pasien']; ?></td>
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