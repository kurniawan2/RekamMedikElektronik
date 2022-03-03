
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Annex - Rekam Medik Elektronik</title>
        <meta content="Admin Dashboard" name="description" />
        <meta content="Mannatthemes" name="author" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <link rel="shortcut icon" href="<?= base_url()?>/assets/images/favicon.ico">

        <link href="<?= base_url()?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url()?>/assets/css/style.css" rel="stylesheet" type="text/css">

    </head>


    <body class="fixed-left">

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="<?= base_url()?>/assets/images/logo.png" height="24" alt="logo"></a>
                    </h3>
        <?php
            if(session()->getFlashdata('msg')) : ?>
            <div class="alert alert-danger">
            <?= session()->getFlashdata('msg') ?> </div>
            <?php endif ; ?>


                    <div class="p-3">
                        <form class="form-horizontal m-t-20" action="form/upload" method="post">

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required="" name="namadokter" placeholder="Nama Dokter">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" required="" name="nomerhp" placeholder="Nomor Hp">
                                </div>
                            </div>

                            <div class=" form-group">
                                    <label for="jenis_kelamin" class=" form-control-label">Jenis kelamin</label>
                                    <select class="form-control" name="jenis_kelamin" id="jenis_kelamin" data-bv-notempty="true" data-bv-notempty-message="Jenis kelamin belum dipilih">
                                        <option value="" selected disabled>- Pilih Jenis Kelamin -</option>
                                        <option value="Laki-laki">Laki-laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlFile1">foto Dokter</label>
                                    <input type="file" name="upload" class="form-control-file" id="upload">
                                </div>


                            <div class="form-group row">
                                <div class="col-12">
                                    <!-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="customCheck1">
                                        <label class="custom-control-label" for="customCheck1">Remember me</label>
                                    </div> -->
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-danger btn-block waves-effect waves-light" name="upload" type="submit">Upload</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <!-- <div class="col-sm-7 m-t-20">
                                    <a href="pages-recoverpw.html" class="text-muted"><i class="mdi mdi-lock"></i> <small>Forgot your password ?</small></a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="pages-register.html" class="text-muted"><i class="mdi mdi-account-circle"></i> <small>Create an account ?</small></a>
                                </div> -->
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>


        <!-- jQuery  -->
        <script src="<?= base_url()?>/assets/js/jquery.min.js"></script>
        <script src="<?= base_url()?>/assets/js/popper.min.js"></script>
        <script src="<?= base_url()?>/assets/js/bootstrap.min.js"></script>
        <script src="<?= base_url()?>/assets/js/modernizr.min.js"></script>
        <script src="<?= base_url()?>/assets/js/detect.js"></script>
        <script src="<?= base_url()?>/assets/js/fastclick.js"></script>
        <script src="<?= base_url()?>/assets/js/jquery.slimscroll.js"></script>
        <script src="<?= base_url()?>/assets/js/jquery.blockUI.js"></script>
        <script src="<?= base_url()?>/assets/js/waves.js"></script>
        <script src="<?= base_url()?>/assets/js/jquery.nicescroll.js"></script>
        <script src="<?= base_url()?>/assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->
        <script src="<?= base_url()?>/assets/js/app.js"></script>

    </body>
</html>