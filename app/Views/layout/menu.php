<?php

use App\Controllers\Home;
?>
<?= $this->extend('layout/main') ?>

<?= $this->section('menu') ?>
<li>
                                <a href="<?= base_url('Home') ?>" class="waves-effect">
                                    <i class="mdi mdi-airplay"></i>
                                    <span> Beranda <span class="badge badge-pill badge-primary float-right">7</span></span>
                                </a>
                            </li>

                            <li class="has_sub">
                                <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-layers"></i> <span> Master </span> <span class="float-right"><i class="mdi mdi-chevron-right"></i></span></a>
                                <ul class="list-unstyled">
                                    <li><a href="<?= base_url('Dokter') ?>">Dokter</a></li>
                                    <li><a href="<?= base_url('Pasien') ?>">Pasien</a></li>
                                    <li><a href="<?= base_url('Obat') ?>">Obat</a></li>
                                    <!-- <li><a href="advanced-rangeslider.html">Admin</a></li>
                                    <li><a href="advanced-rangeslider.html">Registrasi</a></li> -->
                                    <li><a href="<?= base_url('Rawatinap/semua') ?>">Rawat Inap</a></li>
                                </ul>
                            </li>
<?= $this->endSection('') ?> 