<?php

use Config\Validation;
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <title>AYS - Rekam Medik Elektronik</title>
    <meta content="Admin Dashboard" name="description" />
    <meta content="Mannatthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.ico">

    <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>

    <link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
    <script>
        $(document).ready(function() {
            // $('#formRegis').validate();
            $('#formRegis').on('submit', function(e) {
                e.preventDefault();
                var formData = new FormData(this);


                $.ajax({
                    url: "<?= site_url('Registrasi/save') ?>",
                    type: "POST",
                    cache: false,
                    data: formData,
                    processData: false,
                    contentType: false,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.success == true) {
                            alert('Selamat Anda Berhasil');
                            Swal.fire('Saved', '', 'success')
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        alert('Maaf Error Yaa');
                        // Swal({
                        //     icon: 'error',
                        //     title: 'Oops...',
                        //     text: 'Something went wrong!',
                        //     footer: '<a href="">Why do I have this issue?</a>'
                        // });
                    }
                });
            })
        });
    </script>


</head>


<body class="fixed-left">

    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">

        <div class="card">
            <div class="card-body">

                <h3 class="text-center mt-0 m-b-15">
                    <h4>
                        <center>Form Registrasi</center>
                    </h4>
                </h3>

                <div class="p-3">
                    <?php $validation = \Config\Services::validation(); ?>

                    <?php if (isset($message)) : ?>
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <?php echo $message; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        </div>
                    <?php endif; ?>
                    <form class="form-horizontal" id="formRegis" action="javascript:void(0)">

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control
                                    <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" type="email" name="email" value="<?= set_value('email') ?>" placeholder="Email">
                                <?php if ($validation->getError('email')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('email'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control 
                                    <?= ($validation->hasError('username')) ? 'is-invalid' : ''; ?>" type="username" name="username" value="<?= set_value('username') ?>" placeholder="Username">
                                <?php if ($validation->getError('username')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('username'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>


                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control 
                                    <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" type="password" name="password" value="<?= set_value('password') ?>" placeholder="Password">
                                <?php if ($validation->getError('password')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('password'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-12">
                                <input class="form-control 
                                    <?= ($validation->hasError('confirmpassword')) ? 'is-invalid' : ''; ?>" type="password" name="confirmpassword" value="<?= set_value('confirmpassword') ?>" placeholder="ConfirmPassword">
                                <?php if ($validation->getError('confirmpassword')) { ?>
                                    <div class='alert alert-danger mt-2'>
                                        <?= $error = $validation->getError('confirmpassword'); ?>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>

                        <div class="form-group text-center row m-t-20">
                            <div class="col-12">
                                <button class="btn btn-danger btn-block waves-effect waves-light" type="submit">Register</button>
                            </div>
                        </div>

                        <div class="form-group m-t-10 mb-0 row">
                            <div class="col-12 m-t-20 text-center">
                                <a href="/login" class="text-muted">Uda punya akun ?</a>
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>



    <!-- jQuery  -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.17.2/dist/sweetalert2.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/popper.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/bootstrap.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/modernizr.min.js"></script>
    <script src="<?= base_url() ?>/assets/js/detect.js"></script>
    <script src="<?= base_url() ?>/assets/js/fastclick.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.slimscroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.blockUI.js"></script>
    <script src="<?= base_url() ?>/assets/js/waves.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.nicescroll.js"></script>
    <script src="<?= base_url() ?>/assets/js/jquery.scrollTo.min.js"></script>


    <!-- App js -->
    <script src="<?= base_url() ?>/assets/js/app.js"></script>

</body>

</html>