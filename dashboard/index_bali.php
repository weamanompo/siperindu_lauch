<?php


include '../koneksi.php';



$tglref = date('Y-m-d');

$kd_indi = 17;

$query1 = "DELETE FROM indikator_fix";

mysqli_query($koneksi, $query1);

$ambil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar JOIN indikator_pilar ON transaksi_pilar.kd_indi_pilar = indikator_pilar.kode_indi_pilar  WHERE nilai_indi_pilar != '' ");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>DATA - SIPERINDU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

</head>

<style>
    .loader {

        width: 70px;
        position: absolute;
        top: 350px;
        left: 550px;
        z-index: 999;
        display: none;


    }
</style>

<style>
    .loader2 {

        width: 70px;
        position: absolute;
        top: 400px;
        left: 630px;
        z-index: 999;
        display: none;


    }
</style>

<style>
    .map {
        font-family: 'Circular Std Book';
        font-style: normal;
        font-weight: normal;
        font-size: 14px;
        color: #71748d;
        background-color: #fff;
        z-index: -999;

    }

    .map-highlight:hover {
        fill: #FFFFCC !important;
    }

    a:hover .map-highlight {
        fill: #fff9f2 !important;
    }
</style>

<body>

    <?php $kdi = ""; ?>
    <?php while ($d = mysqli_fetch_assoc($ambil)) : ?>
        <?php $ki = $d['kd_indi_pilar']; ?>
        <?php if ($kdi !== $ki) : ?>
            <?php $p = $d['kd_pilar'];
            $i = $d['kd_indi_pilar'];
            ?>
            <?php

            $query1 = "INSERT INTO indikator_fix

            VALUES 
            ('',  '$p','$i' )";

            mysqli_query($koneksi, $query1);
            ?>
        <?php endif; ?>
        <?php $kdi = $ki; ?>
    <?php endwhile; ?>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="" class="logo me-auto me-lg-0"><img src="../assets/img/logo_ban.png" alt="" class="img-fluid"></a>
            <?php $jml = mysqli_query($koneksi, "SELECT * FROM agenda WHERE tanggal >= '$tglref' ");

            $jmlh = mysqli_num_rows($jml);

            ?>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="../profil">Profil</a></li>
                    <li><a class="nav-link scrollto" href="#data">Dashboard</a></li>
                    <?php if ($jmlh != 0) : ?>
                        <li><a class="nav-link scrollto " href="../orientasi">Fasilitasi&nbsp;<span class="badge bg-danger"><?= $jmlh; ?> New</span></a></li>
                    <?php endif; ?>
                    <?php if ($jmlh == 0) : ?>
                        <li><a class="nav-link scrollto " href="../orientasi">Fasilitasi&nbsp;</a></li>
                    <?php endif; ?>

                    <li><a class="nav-link scrollto" href="../data">Tabel Dinamis</a></li>
                    <li><a class="nav-link scrollto" href="../piramida">Piramida Penduduk</a></li>
                    <li><a class="nav-link scrollto" href="../testimoni">Testimoni</a></li>
                    <li class="dropdown"><a href="#portfolio"><span>Galeri</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="../galeri">Aktivitas</a></li>
                            <li class="dropdown"><a href="#portfolio"><span>K I E</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="../kie">Foto</a></li>
                                    <li><a href="../video">Video</a></li>
                                </ul>
                            </li>
                            <li><a href="../download">Artikel</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>

            </nav><!-- .navbar -->

            <a href="http://siperindu.online/2023/pb/login" target="_blank" class="get-started-btn scrollto">LOGIN</a>


        </div>
    </header><!-- End Header -->


    <main id="main">

        <section class="inner-page">
            <div class="container">
                <!-- ======= Portfolio Section ======= -->
                <section id="data" class="portfolio">
                    <img src="../assets/img/loader.gif" class="loader2">
                    <div class="container" data-aos="fade-up">
                        <div class="section-title">
                            <h2>Dashboard</h2>
                            <p></p>
                        </div>

                        <div class="row" data-aos="fade-up" data-aos-delay="100">
                            <div class="col-lg-12 d-flex justify-content-center" style="padding-bottom: 0rem;">
                                <ul id="portfolio-flters">
                                    <li class="filter-active">Wilayah Per Indikator</li>
                                    <li><a style="color : black ;" href="../pilar">Indikator Per Wilayah</a></li>

                                </ul>
                            </div>
                            <div class="card" style="width: 100rem;">
                                <h5 class="card-header text-center">
                                    <select class="form-select" aria-label="Default select example" id="indikator">
                                        <option selected value="1">-- PILIH INDIKATOR --</option>
                                        <?php
                                        $pilar = mysqli_query($koneksi, "SELECT * FROM pilar JOIN indikator_fix ON pilar.kode_pilar = indikator_fix.pilar_kd ORDER BY indikator_fix.pilar_kd ASC "); ?>
                                        <?php $kodepilar = ''; ?>
                                        <?php while ($p = mysqli_fetch_assoc($pilar)) : ?>
                                            <?php $kdpilar = $p['kode_pilar'];   ?>
                                            <?php if ($kodepilar !== $kdpilar) : ?>
                                                <optgroup label="-- Pilar <?= $p['nama_pilar']; ?> --">
                                                    <?php
                                                    $daerah = mysqli_query($koneksi, "SELECT * FROM indikator_fix JOIN indikator_pilar ON indikator_fix.indikator_kd = indikator_pilar.kode_indi_pilar WHERE indikator_fix.pilar_kd = '$kdpilar' AND indikator_fix.indikator_kd NOT IN (43,44,46,8,11,16,21,22,27,41,34)  ORDER BY indikator_pilar.nama_indi_pilar ASC  "); ?>
                                                    <?php while ($d = mysqli_fetch_assoc($daerah)) : ?>
                                                        <option value="<?php echo $d['indikator_kd']; ?>"><?php echo strtoupper($d['nama_indi_pilar']); ?></option>
                                                    <?php endwhile; ?>
                                                <?php endif; ?>
                                                <?php $kodepilar = $kdpilar; ?>
                                            <?php endwhile; ?>
                                    </select>
                                </h5>
                                <h5 class="card-header text-center">
                                    <select class="form-select" aria-label="Default select example" id="provinsi">
                                        <option selected value="1">-- PILIH WILAYAH --</option>
                                        <option value="99">SEMUA PROVINSI</option>
                                        <?php
                                        $daerah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2 ");
                                        while ($d = mysqli_fetch_array($daerah)) {
                                        ?>
                                            <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                                        <?php
                                        }
                                        ?>
                                    </select>
                                </h5>
                                <div class="card-body">
                                    <img src="../assets/img/loader.gif" class="loader">
                                    <div id="isi" class="mt-3">
                                    </div>
                                    <!-- akhis isi -->
                                    <div id="isi2">
                                    </div>
                                </div>
                </section>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
            <!-- isi peta -->
            </div>
        </section>
        <!-- End Portfolio Section -->
        </div>
        </section>
    </main><!-- End #main -->
    <!-- modal tabel-->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="isi3">
        </div>
    </div>
    <!-- modal peta -->
    <div class="modal fade" id="user_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" id="isi_edituser">
        </div>
    </div>
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>
    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
    <script>
        $(document).ready(function() {
            $("#indikator").on('change', function() {
                $("#isi").hide();
                $("#isi2").hide();
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#isi").load("ambil_depan.php");
            $("#isi2").load("table_map_depan.php");
            $("#provinsi").on('change', function() {
                var indikator = $("#indikator").val();
                var provinsi = $("#provinsi").val();
                $(".loader2").show();
                $(".loader").hide();
                $("#isi").hide();
                if (indikator == 1) {
                    alert('Pilih Indikator Dahulu');
                    return false;
                }
                if (provinsi == 99) {
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: "ambil_map.php",
                        data: {
                            indikator: indikator,
                            provinsi: provinsi
                        },
                        success: function(msg) {
                            $("#isi").html(msg);
                            $(".loader2").hide();
                            $(".loader").hide();
                            $("#isi").show();
                        }
                    });
                }
                if (provinsi == 51) {
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: "ambil_peta.php",
                        data: {
                            indikator: indikator,
                            provinsi: provinsi
                        },
                        success: function(msg) {
                            $("#isi").html(msg);
                            $(".loader2").hide();
                            $(".loader").hide();
                            $("#isi").show();
                        }
                    });
                }
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#provinsi").on('change', function() {
                var indikator = $("#indikator").val();
                var provinsi = $("#provinsi").val();
                $("#isi2").hide();
                if (indikator == 1) {
                    alert('Pilih Indikator Dahulu');
                    return false;
                }
                if (provinsi == 99) {
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: "table_map.php",
                        data: {
                            indikator: indikator,
                            provinsi: provinsi
                        },
                        success: function(msg) {
                            $("#isi").show();
                            $("#isi2").show();
                            $("#isi2").html(msg);
                        }
                    });
                }
                if (provinsi != 99) {
                    $.ajax({
                        type: "POST",
                        dataType: "html",
                        url: "table_kab.php",
                        data: {
                            indikator: indikator,
                            provinsi: provinsi
                        },
                        success: function(msg) {
                            $("#isi").hide();
                            $("#isi2").html(msg);
                            $("#isi2").show();
                            $(".loader2").hide();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>