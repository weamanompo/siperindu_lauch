<?php
include '../koneksi.php';

$tglref = date('Y-m-d');


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>PROFIL - SIPERINDU</title>
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
  video {
    width: 100%;
    height: auto;
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
          <li><a class="nav-link scrollto" href="#about">Profil</a></li>
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


  <main id="main">
    <section id="about" class="about mt-6">
      <div class="container" data-aos="fade-up">
        <div class="section-title text-center">
          <h2></h2>
          <p></p>
        </div>

        <div class="row">
          <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content text-center mt-4" data-aos="fade-right" data-aos-delay="100">
            <h3 style="color :chocolate;">PERINGATAN DINI PENGENDALIAN PENDUDUK</h3>
            <br>
            <h4 style="color :#00425A" class="mt-4">PENGERTIAN</h4>
            <p class="fst-italic" style="text-align: center;">Suatu usaha untuk memperingatkan potensi atau masalah kependudukan yang akan timbul baik bersifat segera ataupun yang akan datang akibat situasi kependudukan serta kebijakan pengendalian penduduk yang sedang dilaksanakan kepada masyarakat dan pemangku kepentingan di bidang pembangunan kependudukan.</p>
            <br>
            <p class="fst-italic text-center"><iframe width="600" height="400" src="https://www.youtube.com/embed/ChA0AtCcRo0?controls=0" title="" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe></p>
            <br>
            <h4 style="color :#00425A" class="mt-4">TUJUAN</h4>
            <p class="fst-italic" style="text-align: center;">Mencegah hal buruk yang akan terjadi agar bisa menghindari atau meminimalkan berbagai masalah kependudukan yang dapat menimbulkan gangguan tata kehidupan dan penghidupan masyarakat.
            </p>
            <br>
            <h4 style="color :#00425A" class="mt-4">KONSEP</h4>
            <br>
            <p class="fst-italic" style="text-align: center;"><img src="../assets/img/konsep.png" width="30%">
            </p>
            <br>
            <h4 style="color :#00425A" class="mt-4">PELAKSANA</h4>
            <br>
            <p class="fst-italic" style="text-align: center;"><img src="../assets/img/pelaksana.png" width="30%">
            </p>
            <br>
            <h4 style="color :#00425A" class="mt-4">ALAT BANTU
              PERINGATAN DINI PENGENDALIAN PENDUDUK
            </h4>
            <p class="fst-italic" style="text-align: center;">Siperindu adalah alat bantu bagi pemerintah dan masyarakat mendapatkan informasi peringatan dini situasi kependudukan serta rekomendasi kebijakan, untuk <span style="color:crimson;">kesiapsiagaan</span> dan <span style="color:crimson;">respon</span> terhadap program pengendalian penduduk.
            </p>
          </div>
        </div>


      </div>
    </section><!-- End About Section -->
  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong> BKKBN
      </div>
      <div class="credits">

        Designed by <a href="">WAM</a>
      </div>
    </div>
  </footer><!-- End Footer -->

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

</body>

</html>