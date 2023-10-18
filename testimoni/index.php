<?php
include '../koneksi.php';

$tglref = date('Y-m-d');


?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>TESTIMONI - SIPERINDU</title>
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
            <li><a class="nav-link scrollto " href="../orientasi">Agenda Fasilitasi&nbsp;<span class="badge bg-danger"><?= $jmlh; ?> New</span></a></li>
          <?php endif; ?>
          <?php if ($jmlh == 0) : ?>
            <li><a class="nav-link scrollto " href="../orientasi">Agenda Fasilitasi&nbsp;</a></li>
          <?php endif; ?>
          <li><a class="nav-link scrollto" href="../data">Tabel Dinamis</a></li>
          <li><a class="nav-link scrollto" href="../piramida">Piramida Penduduk</a></li>
          <li><a class="nav-link scrollto" href="#portfolio">Testimoni</a></li>
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

    <section id="portfolio" class="portfolio" style="padding: 4rem;">
      <div class="container" data-aos="fade-up">
        <div class="section-title" style="padding: 3rem 0 0 0;">
          <h2>.</h2>
          <p>Testimoni</p>
        </div>
      </div>
    </section><!-- End Portfolio Section -->
    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="testimonials-slider swiper" data-aos="fade-up" data-aos-delay="100">
          <div class="swiper-wrapper">

            <!-- query -->

            <?php $testimoni = mysqli_query($koneksi, "SELECT * FROM testimoni JOIN peserta_orientasi  ON  testimoni.identitas = peserta_orientasi.id_peserta"); ?>

            <?php while ($t = mysqli_fetch_assoc($testimoni)) : ?>
              <?php $kode = $t['id_peserta'];
              $induk = substr($kode, 0, 2);
              $tebbe = strlen($kode);
              if ($induk == 01) {

                $asal = 'BKKBN PUSAT';
              } elseif ($induk == 02 && $tebbe == 10) {

                $kdprov = substr($kode, 2, 2);

                $aprov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdprov'");

                $nmprov = mysqli_fetch_assoc($aprov)['nama'];

                $asal = "PERWAKILAN BKKBN PROVINSI $nmprov ";
              } elseif ($induk == 03 && $tebbe == 10) {

                $kdprov = substr($kode, 2, 2);

                $aprov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdprov'");

                $nmprov = mysqli_fetch_assoc($aprov)['nama'];

                $asal = "OPD PROVINSI $nmprov ";
              } elseif ($induk == 04 && $tebbe == 13) {

                $kdprov = substr($kode, 2, 5);

                $aprov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdprov'");

                $nmprov = mysqli_fetch_assoc($aprov)['nama'];

                $asal = "OPD $nmprov ";
              } elseif ($induk == 05) {

                $nmins = strtoupper($t['nama_instansi']);

                $asal = "Mitra Pemerintah $nmins ";
              } elseif ($induk == 06) {

                $nmins = strtoupper($t['nama_instansi']);

                $asal = "Mitra Swasta $nmins ";
              } elseif ($induk == 07) {

                $nmins = strtoupper($t['nama_instansi']);

                $asal = "Mitra LSM $nmins ";
              }

              ?>

              <div class="swiper-slide">
                <div class="testimonial-item">
                  <img src="../assets/img/testimonials/logo.jpg" class="testimonial-img" alt="">
                  <h3><?= strtoupper($t['nama_peserta']); ?></h3>
                  <h4><?= $asal; ?></h4>
                  <p>
                    <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                    <?= strtoupper($t['isi']); ?>
                    <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                  </p>
                </div>
              </div>
            <?php endwhile; ?>
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="../assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                <h3>Puspita Sari</h3>
                <h4>OPD Kota Puruk Cahu</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  aplikasi nya sangat bagus sehingga kita bisa langsung mengetahui segala sesuatu tentang kebijakanpengendalian penduduk
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> -->
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="../assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                <h3>Dewi Kania</h3>
                <h4>Perwakilan BKKBN Jawa Tengah</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  APLIKASI SANGAT BAIK DALAM MENDUKUNG KEBIJAKAN DAERAH
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> -->
            <!-- End testimonial item -->

            <!-- <div class="swiper-slide">
              <div class="testimonial-item">
                <img src="../assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                <h3>Asep Syaifuddin</h3>
                <h4>Mitra</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Aplikasi SIPERINDU sangat membantu dalam mengetahui data wilayah dan kependudukan
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div> -->
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section>
    <!-- End Testimonials Section -->

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
  <script src="../assets/js/script.js"></script>

  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

  <script>
    $(document).ready(function() {
      $("#form_prov").hide();
      $("#wilayah1").hide();

    });
  </script>

  <script>
    $(document).ready(function() {
      $("#form_prov").on('change', function() {
        var provinsi = $("#form_prov").val();
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "wpi_wil.php",
          data: {
            provinsi: provinsi
          },
          success: function(msg) {
            $("#form_kab").show();
            $("#garis").show();

            $("#isi").html(msg);
          }
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $("#form_prov").on('change', function() {
        var provinsi = $("#form_prov").val();
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "ubah_wilayah.php",
          data: {
            provinsi: provinsi
          },
          success: function(msg) {
            $("#subwilayah").html(msg);
          }
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $("#form_kab").on('change', function() {
        var provinsi = $("#form_kab").val();
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "ubah_wilayah_kab.php",
          data: {
            provinsi: provinsi
          },
          success: function(msg) {
            $("#subwilayah").html(msg);
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      // sembunyikan form kabupaten
      $("#form_kab").hide();
      $("#garis").hide();
      // ambil data kabupaten ketika data memilih provinsi
      $('body').on("change", "#form_prov", function() {
        var id = $(this).val();
        var data = "id=" + id + "&data=kabupaten";
        $.ajax({
          type: 'POST',
          url: "get_daerah.php",
          data: data,
          success: function(hasil) {
            $("#form_kab").html(hasil);
            $("#form_kab").show();
          }
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#form_kab").on('change', function() {
        var provinsi = $("#form_kab").val();
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "wpi_wil.php",
          data: {
            provinsi: provinsi
          },
          success: function(msg) {
            $("#form_kab").show();
            $("#isi").html(msg);
          }
        });
      });
    });
  </script>

</body>

</html>