<?php
include 'koneksi.php';

$tglref = date('Y-m-d');

$jml = mysqli_query($koneksi, "SELECT * FROM agenda WHERE tanggal >= '$tglref' ")  ;
      
      $jmlh = mysqli_num_rows($jml);   

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />

    <title>SIPERINDU</title>
    <meta content="" name="description" />
    <meta content="" name="keywords" />

    <!-- Favicons -->
    <link href="assets/img/favicon.png" rel="icon" />
    <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/aos/aos.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet" />
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet" />
    <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet" />
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet" />
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet" />

    <!-- Template Main CSS File -->
    <link href="css/style.css" rel="stylesheet" />
</head>

<body>
    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center justify-content-lg-end">
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="#" class="logo"><img src="img/logo.png" /></a>

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li>
                        <a class="nav-link scrollto active" href="download"><i class="ri-download-2-line"></i></a>
                    </li>
                    <li>
                        <a class="nav-link scrollto active" href="https://www.instagram.com/siperindu.bkkbn/?hl=id"><i class="ri-instagram-line"></i></a>
                    </li>
                    <li>
                        <a class="nav-link scrollto active" href="https://siperindu.online/2023/pb/login" target="_blank"><i class="ri-login-box-line"></i></a>
                    </li>
                </ul>
            </nav>
            <!-- .navbar -->
        </div>
    </header>
    <!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
        <div class="container" data-aos="fade-up">
            <div class="menu row" data-aos="zoom-in" data-aos-delay="250">
                <div class="col-xl-2 col-md-4"></div>
                <div class="col-xl-2 col-md-4">
                    <img src="img/logodepan.jpg" />
                </div>
                <div class="col-xl-2 col-md-4"></div>
            </div>
            <div class="menu2 row" data-aos="zoom-in" data-aos-delay="250">
                <div class="col-xl-2 col-md-4">
                <div class="icon-box"><a href="profil">
              <i class="ri-folder-user-line"></i>
              <h3>Profil</h3>
            </a>
          </div>
                </div>
                <div class="col-xl-2 col-md-4">
                <div class="icon-box"><a href="dashboard">
              <i class="ri-dashboard-3-line"></i>
              <h3>Dashboard</h3>
            </a>
          </div>
                </div>
                <div class="col-xl-2 col-md-4">
                <div class="icon-box"><a href="orientasi">
              <i class="ri-award-fill"></i>
              <?php if($jmlh != 0) : ?>
              <h3>Agenda Fasilitasi <span class="badge bg-danger"><?= $jmlh ; ?> New</span></h3>
<?php endif ; ?>
<?php if($jmlh == 0) : ?>
              <h3>Agenda Fasilitasi</h3>
<?php endif ; ?>
            </a>
          </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Hero -->
    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>
</body>

</html>