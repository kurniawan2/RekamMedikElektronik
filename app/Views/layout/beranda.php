<?= $this->extend('layout/main') ?>
<?= $this->extend('layout/menu') ?>
<?= $this->section('isi') ?>
<div class="col-sm-12">
<div class="card m-b-60">
<h4 class="card-header mt-0">
    Selamat Datang
</h4>
</div>
<div class="card-body">
<p class="card-text">
 <div class="alert alert-info"> Selamat Datang Di RME kami </div>
 </p>
 </div>
 </div>
 <div class="row">
                                <!-- Column -->
                                <div class="col-md-5 col-lg-5 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-webcam"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 align-self-center text-center">
                                                    <div class="m-l-10">
                                                        <h5 class="mt-0 round-inner"><?= $dokter ?></h5>
                                                        <p class="mb-0 text-muted">Total Dokter</p>                                                                 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-webcam"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 align-self-center text-center">
                                                    <div class="m-l-10">
                                                        <h5 class="mt-0 round-inner"><?= $pasien ?></h5>
                                                        <p class="mb-0 text-muted">Total Pasien</p>                                                                 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-webcam"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 align-self-center text-center">
                                                    <div class="m-l-10">
                                                        <h5 class="mt-0 round-inner"><?= $poli ?></h5>
                                                        <p class="mb-0 text-muted">Total Poli</p>                                                                 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                                <!-- Column -->
                                <div class="col-md-6 col-lg-6 col-xl-3">
                                    <div class="card m-b-30">
                                        <div class="card-body">
                                            <div class="d-flex flex-row">
                                                <div class="col-3 align-self-center">
                                                    <div class="round">
                                                        <i class="mdi mdi-webcam"></i>
                                                    </div>
                                                </div>
                                                <div class="col-7 align-self-center text-center">
                                                    <div class="m-l-10">
                                                        <h5 class="mt-0 round-inner"><?= $rawatinap ?></h5>
                                                        <p class="mb-0 text-muted">Total Rawat</p>                                                                 
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Column -->
                               
                            </div>

                            <div class="row">
    <div class="col-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-tittle">Data Kunjungan Saat Ini </h4>
                <div class="mb-5 mt-5">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['poli', 'total'],
                                <?php
                                foreach ($grafik as $row) {
                                    echo "['" . $row['nama_poli'] . "'," . $row['total'] . "],";
                                }

                                ?>
                            ]);

                            var view = new google.visualization.DataView(data);


                            var options = {
                                title: "Kunjungan saat ini",
                                is3D: true,

                            };
                            var chart = new google.visualization.LineChart(document.getElementById("Line"));
                            chart.draw(view, options);
                        }
                    </script>
                    <div id="Line" style="height: 300px; width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-tittle">Poli yang sering dikunjungi</h4>
                <div class="mb-5 mt-5">
                    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                    <script type="text/javascript">
                        google.charts.load("current", {
                            packages: ["corechart"]
                        });
                        google.charts.setOnLoadCallback(drawChart);

                        function drawChart() {
                            var data = google.visualization.arrayToDataTable([
                                ['poli', 'total'],
                                <?php
                                foreach ($grafik as $row) {
                                    echo "['" . $row['nama_poli'] . "'," . $row['total'] . "],";
                                }

                                ?>
                            ]);

                            var view = new google.visualization.DataView(data);


                            var options = {
                                title: "Data kunjungan Saat Ini",
                                is3D: true,

                            };
                            var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
                            chart.draw(view, options);
                        }
                    </script>
                    <div id="barchart_values" style="height: 300px; width: 100%"></div>
                </div>
            </div>
        </div>
    </div>
</div>


<?= $this->endSection('') ?>

