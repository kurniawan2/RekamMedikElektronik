<?= $this->extend('layout/main')  ?>
<?= $this->extend('layout/menu')  ?>

<?= $this->section('isi')  ?>



<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Data Dokter</h4>
                <!-- Large modal -->
                <a href="/Rawatinap" class="btn btn-primary waves-effect waves-light" style="margin-top:-7px"><span class="fa fa-plus"></span> Tambah Data </a>
                <a href="<?php echo base_url('generate-pdf') ?>" class="btn btn-primary btn-sm pull-right" style="margin-top:-7px">
                    Download Laporan Pdf
                </a>
                <!--  Modal content for the above example -->
                <form action="/dokter/save" method="post">
                    <?php if (!empty(session()->getFlashdata('error'))) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h4>Periksa Entrian Form</h4>
                            </hr />
                            <?php echo session()->getFlashdata('error'); ?>
                            <button type="button" id="addModal" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-6">
                                        <label>ID Dokter</label>
                                        <input type="text" class="form-control" name="iddokter">
                                    </div>
                                    <div class="col-md-10">
                                        <label>Nama Dokter</label>
                                        <input type="text" class="form-control" name="namadokter">
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. Hp</label>
                                        <input type="text" class="form-control" name="nohpdokter">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </form>

                <form action="/dokter/edit" method="post">
                    <div class="modal fade bs-example-modal-lg" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Tambah Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <div class="col-md-6">
                                        <label>ID Dokter</label>
                                        <input type="text" class="form-control iddokter" name="iddokter">
                                    </div>
                                    <div class="col-md-10">
                                        <label>Nama Dokter</label>
                                        <input type="text" class="form-control namadokter" name="namadokter">
                                    </div>
                                    <div class="col-md-6">
                                        <label>No. Hp</label>
                                        <input type="text" class="form-control nohpdokter" name="nohpdokter">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </form>

                <form action="/dokter/delete" method="post">
                    <div class="modal fade bs-example-modal-lg" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-lg">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0" id="myLargeModalLabel">Hapus Data</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                </div>
                                <div class="modal-body">
                                    <h5>Yakin mau menghapus data ini?</h5>
                                </div>
                                <div class="modal-footer">
                                    <input type="hidden" name="iddokter" class="iddokter">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                                    <button type="submit" class="btn btn-primary">Ya</button>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </form>

                <br>
                <table id="datatable" class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No </th>
                            <th>Nama Dokter</th>
                            <th>Nama Pasien</th>
                            <th>Nama Poli</th>
                            <th>Nama Ruangan</th>
                            <th>Tanggal Masuk</th>
                            <th>Tanggal Keluar</th>
                            <th>Catatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($semua as $row) : $no++ ?>
                            <tr>
                                <td> <?= $no; ?></td>
                                <td> <?= $row['nama_dokter']; ?></td>
                                <td> <?= $row['nama_pasien']; ?></td>
                                <td> <?= $row['nama_poli']; ?></td>
                                <td> <?= $row['nama_ruangan']; ?></td>
                                <td> <?= $row['tglmasuk']; ?></td>
                                <td> <?= $row['tglkeluar']; ?></td>
                                <td> <?= $row['catatanmedis']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-info btn-sm btn-edit" data-id="<?= $row['id_rawatinap']; ?>">
                                        <i class="fa fa-tags"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" data-id="<?= $row['id_rawatinap']; ?>">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<!-- <script>
    google.charts.load('current', {
        'packages': ['corechart', 'bar']
    });


    // Bar Chart
    //google.charts.setOnLoadCallback(showBarChart);
    google.charts.setOnLoadCallback(drawBarChart);


    function drawBarChart() {
        var data = google.visualization.arrayToDataTable([
            ["Element", "Density", { role: "style" } ],
        ["Copper", 8.94, "#b87333"],
        ["Silver", 10.49, "silver"],
        ["Gold", 19.30, "gold"],
        ["Platinum", 21.45, "color: #e5e4e2"]
           
        ]);
        var view = new google.visualization.DataView(data);
        var options = {
            title: ' Bar chart products sell wise',
            is3D: true,
        };
        var chart = new google.visualization.BarChart(document.getElementById('GoogleBarChart'));
        chart.draw(view, options);
    }
</script> -->

<!-- <script>
    $(document).ready(function() {
        $('#datatable').DataTable();
    });

    $('.btn-delete').on('click', function() {
        const id = $(this).data('id');
        $('.iddokter').val(id);
        $('#deleteModal').modal('show');
    });

    $('.btn-edit').on('click', function() {
        const id = $(this).data('id');
        const nama = $(this).data('nama');
        const nohp = $(this).data('nohp');

        $('.iddokter').val(id);
        $('.namadokter').val(nama);
        $('.nohpdokter').val(nohp).trigger('change');

        $('#editModal').modal('show');
    });
</script> -->

<?= $this->endSection('')  ?>