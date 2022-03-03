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
        <h2>Laporan Dokter</h2>
        <table id="example" class="display" style="width:100%">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Dokter</th>
                <th>Nama Dokter</th>
                <th>No Hp Dokter</th>
            </tr>
        </thead>
        <tbody>
        <?php
                $no = 1;
                if (count($Dokters) > 0) {
                    foreach ($Dokters as $data) {
                ?>
                        <tr>
                            <td> <?= $no++; ?></td>
                            <td> <?= $data['id_dokter']; ?></td>
                            <td> <?= $data['nama_dokter']; ?></td>
                            <td> <?= $data['nohp_dokter']; ?></td>
                        </tr>
                <?php
                    }
                }
                ?>
        </tbody>
        <tfoot>
            <tr>
            <th>No</th>
                <th>ID Dokter</th>
                <th>Nama Dokter</th>
                <th>No Hp Dokter</th>
            </tr>
        </tfoot>
    </table>
    </div>
</body>

</html>