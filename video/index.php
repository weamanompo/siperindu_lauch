<?php

include '../koneksi.php';

$tglref = date('Y-m-d');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>VIDEO- SIPERINDU</title>
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

</head>
<style>
    @charset "UTF-8";

    * {
        box-sizing: border-box;
    }

    html {
        height: 100%;
        overflow: hidden;
        width: 100%;
    }

    body {
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
        font-size: 16px;
        height: auto;
        line-height: 1;
        overflow-x: hidden;
        padding: 2rem;
        width: 100%;
    }

    .video {
        position: relative;
        padding-top: 4.1%;
        padding-bottom: 51.95%;
        height: 0;
    }

    .video iframe {
        position: absolute;
        top: 0;
        left: 0;
        height: 100%;
        width: 100%;
        min-height: 0;
    }

    .video-gallery {
        margin-top: 3em;
        position: relative;
        width: 100%;
    }

    .video-gallery .video {
        animation: 1200ms fadeOut ease;
        animation-fill-mode: both;
        grid-column-start: 1;
        grid-row-start: 1;
        grid-row-end: 7;
        max-height: 19.5em;
        opacity: 0;
        transition: all 300ms ease;
    }

    .video-gallery input[type=radio] {
        font-size: 0;
        height: 0;
        opacity: 0;
        padding: 0;
        position: fixed;
        width: 0;
    }

    .video-gallery input {
        grid-column-start: 1;
        grid-row-start: 1;
    }

    .video-gallery label {
        color: #000000;
        font-size: 1.25em;
        font-weight: 400;
        grid-column-start: 2;
        margin: 0 !important;
        padding: 1rem 0 1rem 3rem;
        position: relative;
        border-bottom: 1px solid #CCCCCC;
    }

    .video-gallery label:last-of-type {
        border: 0 none;
    }

    .video-gallery input[type=radio]:checked+label {
        color: #E41F35 !important;
    }

    .video-gallery input[type=radio]:checked+label:before {
        content: "▶";
        left: 0;
        top: 12px;
        position: absolute;
    }

    .grid-row {
        display: block;
        height: 56vw;
        max-height: 19.5em;
        position: relative;
    }

    .grid-row label {
        left: calc(50% + 16px);
        position: relative;
        width: calc(50% - 16px);
    }

    .grid-row .video {
        padding: 0;
        position: absolute;
        top: 0;
        width: 0;
    }

    .grid-row:after {
        content: "";
        clear: both;
        display: table;
    }

    #video-1:checked~.video-1,
    #video-2:checked~.video-2,
    #video-3:checked~.video-3,
    #video-4:checked~.video-4,
    #video-5:checked~.video-5,
    #video-6:checked~.video-6 {
        animation: 1200ms fadeIn ease;
        animation-fill-mode: both;
        opacity: 1;
        width: 50%;
    }

    @keyframes fadeOut {
        0% {
            display: block;
            height: 56vw;
            opacity: 1;
            width: 50%;
        }

        25% {
            display: block;
            height: 56vw;
            opacity: 1;
            width: 50%;
        }

        49% {
            display: block;
            height: 56vw;
            opacity: 0;
            width: 50%;
        }

        50% {
            display: none;
            height: 0;
            opacity: 0;
            width: 0;
        }
    }

    @keyframes fadeIn {
        0% {
            opacity: 0;
            width: 0;
        }

        49% {
            display: none;
            height: 0;
            opacity: 0;
            width: 0;
        }

        50% {
            display: block;
            height: 56vw;
            opacity: 0;
            width: 50%;
        }

        100% {
            display: block;
            height: 56vw;
            opacity: 1;
            width: 50%;
        }
    }

    @supports (display: grid) {
        .grid-row {
            align-items: start;
            display: grid;
            grid-column-gap: 16px;
            grid-row-gap: 0;
            grid-template-columns: 1fr 1fr;
            grid-template-rows: 1fr 1fr 1fr 1fr 1fr 1fr;
            width: 100%;
        }

        .grid-row label {
            left: auto;
            width: 100%;
        }

        .grid-row .video {
            position: relative;
            width: 100%;
        }

        @keyframes fadeOut {
            0% {
                display: block;
                height: 56vw;
                opacity: 1;
                width: 100%;
            }

            25% {
                display: block;
                height: 56vw;
                opacity: 1;
                width: 100%;
            }

            49% {
                display: block;
                height: 56vw;
                opacity: 0;
                width: 100%;
            }

            50% {
                display: none;
                height: 0;
                opacity: 0;
                width: 0;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                width: 0;
            }

            49% {
                display: none;
                height: 0;
                opacity: 0;
                width: 0;
            }

            50% {
                display: block;
                height: 56vw;
                opacity: 0;
                width: 100%;
            }

            100% {
                display: block;
                height: 56vw;
                opacity: 1;
                width: 100%;
            }
        }
    }

    @media (max-width: 767px) {
        .video-gallery {
            display: flex;
            flex-direction: column;
            height: auto;
            max-height: none;
        }

        .video-gallery label {
            left: auto;
            order: 2;
            width: 100%;
        }

        .video-gallery .video {
            order: 1;
            padding-top: 4.1%;
            padding-bottom: 51.95%;
            position: relative;
            top: auto;
            width: 100%;
        }

        #video-1:checked~.video-1,
        #video-2:checked~.video-2,
        #video-3:checked~.video-3,
        #video-4:checked~.video-4,
        #video-5:checked~.video-5,
        #video-6:checked~.video-6 {
            width: 100%;
        }

        @keyframes fadeOut {
            0% {
                display: block;
                height: 56vw;
                opacity: 1;
            }

            25% {
                display: block;
                height: 56vw;
                opacity: 1;
            }

            49% {
                display: block;
                height: 56vw;
                opacity: 0;
            }

            50% {
                display: none;
                height: 0;
                opacity: 0;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
            }

            49% {
                display: none;
                height: 0;
                opacity: 0;
            }

            50% {
                display: block;
                height: 56vw;
                opacity: 0;
            }

            100% {
                display: block;
                height: 56vw;
                opacity: 1;
            }
        }
    }
</style>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="../index.php" class="logo me-auto me-lg-0"><img src="../assets/img/logo_ban.png" alt="" class="img-fluid"></a>

            <?php $jml = mysqli_query($koneksi, "SELECT * FROM agenda WHERE tanggal >= '$tglref' ");

            $jmlh = mysqli_num_rows($jml);

            ?>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="../profil">Profil</a></li>
                    <li><a class="nav-link scrollto" href="../dashboard">Dashboard</a></li>
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

    <style>
        .video {
            position: relative;
            padding-top: 4.1%;
            padding-bottom: 51.95%;
            height: 0;
        }

        .video iframe {
            position: absolute;
            top: 0;
            left: 0;
            height: 100%;
            width: 100%;
            min-height: 0;
        }

        .video-gallery {
            margin-top: 3em;
            position: relative;
            width: 100%;
        }

        .video-gallery .video {
            animation: 1200ms fadeOut ease;
            animation-fill-mode: both;
            grid-column-start: 1;
            grid-row-start: 1;
            grid-row-end: 7;
            max-height: 19.5em;
            opacity: 0;
            transition: all 300ms ease;
        }

        .video-gallery input[type=radio] {
            font-size: 0;
            height: 0;
            opacity: 0;
            padding: 0;
            position: fixed;
            width: 0;
        }

        .video-gallery input {
            grid-column-start: 1;
            grid-row-start: 1;
        }

        .video-gallery label {
            color: #000000;
            font-size: 1.25em;
            font-weight: 400;
            grid-column-start: 2;
            margin: 0 !important;
            padding: 1rem 0 1rem 3rem;
            position: relative;
            border-bottom: 1px solid #CCCCCC;
        }

        .video-gallery label:last-of-type {
            border: 0 none;
        }

        .video-gallery input[type=radio]:checked+label {
            color: #E41F35 !important;
        }

        .video-gallery input[type=radio]:checked+label:before {
            content: "▶";
            left: 0;
            top: 12px;
            position: absolute;
        }

        .grid-row {
            display: block;
            height: 56vw;
            max-height: 19.5em;
            position: relative;
        }

        .grid-row label {
            left: calc(50% + 16px);
            position: relative;
            width: calc(50% - 16px);
        }

        .grid-row .video {
            padding: 0;
            position: absolute;
            top: 0;
            width: 0;
        }

        .grid-row:after {
            content: "";
            clear: both;
            display: table;
        }

        #video-1:checked~.video-1,
        #video-2:checked~.video-2,
        #video-3:checked~.video-3,
        #video-4:checked~.video-4,
        #video-5:checked~.video-5,
        #video-6:checked~.video-6 {
            animation: 1200ms fadeIn ease;
            animation-fill-mode: both;
            opacity: 1;
            width: 50%;
        }

        @keyframes fadeOut {
            0% {
                display: block;
                height: 56vw;
                opacity: 1;
                width: 50%;
            }

            25% {
                display: block;
                height: 56vw;
                opacity: 1;
                width: 50%;
            }

            49% {
                display: block;
                height: 56vw;
                opacity: 0;
                width: 50%;
            }

            50% {
                display: none;
                height: 0;
                opacity: 0;
                width: 0;
            }
        }

        @keyframes fadeIn {
            0% {
                opacity: 0;
                width: 0;
            }

            49% {
                display: none;
                height: 0;
                opacity: 0;
                width: 0;
            }

            50% {
                display: block;
                height: 56vw;
                opacity: 0;
                width: 50%;
            }

            100% {
                display: block;
                height: 56vw;
                opacity: 1;
                width: 50%;
            }
        }

        @supports (display: grid) {
            .grid-row {
                align-items: start;
                display: grid;
                grid-column-gap: 16px;
                grid-row-gap: 0;
                grid-template-columns: 1fr 1fr;
                grid-template-rows: 1fr 1fr 1fr 1fr 1fr 1fr;
                width: 100%;
            }

            .grid-row label {
                left: auto;
                width: 100%;
            }

            .grid-row .video {
                position: relative;
                width: 100%;
            }

            @keyframes fadeOut {
                0% {
                    display: block;
                    height: 56vw;
                    opacity: 1;
                    width: 100%;
                }

                25% {
                    display: block;
                    height: 56vw;
                    opacity: 1;
                    width: 100%;
                }

                49% {
                    display: block;
                    height: 56vw;
                    opacity: 0;
                    width: 100%;
                }

                50% {
                    display: none;
                    height: 0;
                    opacity: 0;
                    width: 0;
                }
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                    width: 0;
                }

                49% {
                    display: none;
                    height: 0;
                    opacity: 0;
                    width: 0;
                }

                50% {
                    display: block;
                    height: 56vw;
                    opacity: 0;
                    width: 100%;
                }

                100% {
                    display: block;
                    height: 56vw;
                    opacity: 1;
                    width: 100%;
                }
            }
        }

        @media (max-width: 767px) {
            .video-gallery {
                display: flex;
                flex-direction: column;
                height: auto;
                max-height: none;
            }

            .video-gallery label {
                left: auto;
                order: 2;
                width: 100%;
            }

            .video-gallery .video {
                order: 1;
                padding-top: 4.1%;
                padding-bottom: 51.95%;
                position: relative;
                top: auto;
                width: 100%;
            }

            #video-1:checked~.video-1,
            #video-2:checked~.video-2,
            #video-3:checked~.video-3,
            #video-4:checked~.video-4,
            #video-5:checked~.video-5,
            #video-6:checked~.video-6 {
                width: 100%;
            }

            @keyframes fadeOut {
                0% {
                    display: block;
                    height: 56vw;
                    opacity: 1;
                }

                25% {
                    display: block;
                    height: 56vw;
                    opacity: 1;
                }

                49% {
                    display: block;
                    height: 56vw;
                    opacity: 0;
                }

                50% {
                    display: none;
                    height: 0;
                    opacity: 0;
                }
            }

            @keyframes fadeIn {
                0% {
                    opacity: 0;
                }

                49% {
                    display: none;
                    height: 0;
                    opacity: 0;
                }

                50% {
                    display: block;
                    height: 56vw;
                    opacity: 0;
                }

                100% {
                    display: block;
                    height: 56vw;
                    opacity: 1;
                }
            }
        }
    </style>

    <main id="main">
        <!-- ======= Portfolio Section ======= -->

        <section id="portfolio" class="portfolio mt-4">
            <div class="container mt-4" data-aos="fade-up">
                <div class="section-title mt-4">
                    <h2 class="mt-4 mb-3">K I E</h2>
                    <p>VIDEO</p>
                </div>
                <div class="grid-row reverse video-gallery">
                    <?php $galeri = mysqli_query($koneksi, "SELECT * FROM video"); ?>
                    <?php while ($g = mysqli_fetch_array($galeri)) : ?>
                        <input type="radio" value="<?= $g['id']; ?>" name="video-list" id="video-<?= $g['id']; ?>" checked="checked" /><label for="video-<?= $g['id']; ?>"><?= $g['judul']; ?></label>
                        <!-- videos -->
                        <div class="video video-<?= $g['id']; ?>">
                            <?= $g['alamat']; ?>
                        </div>
                        <!-- videos -->
                    <?php endwhile; ?>
                </div>

            </div>
        </section><!-- End Portfolio Section -->
    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <!-- <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong> BKKBN
      </div>
      <div class="credits">
        
        Designed by <a href="">WAM</a>
      </div>
    </div>
  </footer> -->
    <!-- End Footer -->

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
    <script src="../assets/js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>



</body>

</html>