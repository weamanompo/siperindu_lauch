<?php
include '../koneksi.php';

$tglref = date('Y-m-d');


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

    width: 50px;
    position: absolute;
    top: 250px;
    left: 550px;
    z-index: 999;
    display: none;


  }
</style>
<style>
  .loader2 {

    width: 50px;
    position: absolute;
    top: 450px;
    left: 650px;
    z-index: 999;
    display: none;


  }
</style>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="../index.php" class="logo me-auto me-lg-0"><img src="../assets/img/logo_ban.png" alt="" class="img-fluid"></a>
      <?php $jml = mysqli_query($koneksi, "SELECT * FROM agenda WHERE tanggal = '$tglref' ");

      $jmlh = mysqli_num_rows($jml);

      ?>
      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../profil">Profil</a></li>
          <li><a class="nav-link scrollto" href="#data">Dashboard</a></li>
          <?php if ($jmlh != 0) : ?>
            <li><a class="nav-link scrollto " href="../orientasi">Agenda Fasilitasi&nbsp;<span class="badge bg-danger"><?= $jmlh; ?> New</span></a></li>
          <?php endif; ?>
          <?php if ($jmlh == 0) : ?>
            <li><a class="nav-link scrollto " href="../orientasi">Agenda Fasilitasi&nbsp;</a></li>
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
              <h2>Preview Data</h2>
              <p></p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-lg-12 d-flex justify-content-center" style="padding-bottom: 0rem;">
                <ul id="portfolio-flters">
                  <li><a style="color : black ;" href="../dashboard">Wilayah Per Indikator</a></li>
                  <li class="filter-active">Indikator Per Wilayah</li>

                </ul>
              </div>
              <div class="card" style="width: 100rem;">
                <h5 class="card-header text-center">
                  <select class="form-select" aria-label="Default select example" id="provinsi">
                    <option>-- PILIH WILAYAH --</option>
                    <option value="1">NASIONAL</option>
                    <?php
                    $daerah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2 ");
                    while ($d = mysqli_fetch_array($daerah)) {
                    ?>
                      <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                    <?php
                    }
                    ?>
                  </select>
                  <select class="form-select form-select" id="form_kab" name="kabupaten">
                    <option value="1">Pilih KABUPATEN/KOTA</option>
                  </select>
                </h5>
                <div class="card-body">
                  <img src="../assets/img/loader.gif" class="loader">
                  <div id="isi"></div>
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

  <?php

  $aksi = mysqli_query($koneksi, "SELECT * FROM benchmark JOIN indikator_pilar ON benchmark.kd_indikator = indikator_pilar.kode_indi_pilar JOIN indikator_fix ON benchmark.kd_indikator = indikator_fix.indikator_kd ");

  ?>

  <?php while ($ben = mysqli_fetch_assoc($aksi)) : ?>

    <div class="modal fade" id="modal-primary<?= $ben['kd_indikator']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content bg-primary">
          <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-primary">
              <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">Peringatan Dini dan Rekomendasi </h5>
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI </h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="card-body">
                <div class="card">
                  <img src="" class="card-img-top">
                  <div class="card-body text-center" style="background-color:#81C6E8 ;">
                    <h5 class="card-title" style="font-size: 2rem;">Indikator "<?= $ben['nama_indi_pilar']; ?>"</h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Peringatan Dini </h5>
                    <p class="card-text"><?= $ben['normal_alert']; ?></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Rekomendasi :</h5>
                    <p class="card-text"><?= $ben['normal_saran']; ?></p>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-success<?= $ben['kd_indikator']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content bg-success">
          <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-success">
              <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">Peringatan Dini dan Rekomendasi</h5>
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI </h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="card-body">
                <div class="card">
                  <img src="" class="card-img-top">
                  <div class="card-body text-center" style="background-color:#97DECE ;">
                    <h5 class="card-title" style="font-size: 2rem;">Indikator "<?= $ben['nama_indi_pilar']; ?>"</h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Peringatan Dini </h5>
                    <p class="card-text"><?= $ben['waspada_alert']; ?></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Rekomendasi :</h5>
                    <p class="card-text"><?= $ben['waspada_saran']; ?></p>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>

    <div class="modal fade" id="modal-warning<?= $ben['kd_indikator']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content bg-warning">
          <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-warning">
              <h5 class="card-title" style="font-size: 1.5rem; color
              :#000000;">Peringatan Dini dan Rekomendasi</h5>
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI</h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="card-body">
                <div class="card">
                  <img src="" class="card-img-top">
                  <div class="card-body text-center" style="background-color:#F8F988 ;">
                    <h5 class="card-title" style="font-size: 2rem;">Indikator "<?= $ben['nama_indi_pilar']; ?>"</h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Peringatan Dini :</h5>
                    <p class="card-text"><?= $ben['siaga_alert']; ?></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Rekomendasi :</h5>
                    <p class="card-text"><?= $ben['siaga_saran']; ?></p>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
    <div class="modal fade" id="modal-danger<?= $ben['kd_indikator']; ?>">
      <div class="modal-dialog modal-lg">
        <div class="modal-content bg-danger">
          <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-danger">
              <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">Peringatan Dini dan Rekomendasi</h5>
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI</h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="" method="post">
              <div class="card-body">
                <div class="card">
                  <img src="" class="card-img-top">
                  <div class="card-body text-center" style="background-color:#FF97C1 ;">
                    <h5 class="card-title" style="font-size: 2rem;">Indikator "<?= $ben['nama_indi_pilar']; ?>"</h5>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Peringatan Dini </h5>
                    <p class="card-text"><?= $ben['awas_alert']; ?></p>
                  </div>
                  <div class="card-body">
                    <h5 class="card-title">Rekomendasi :</h5>
                    <p class="card-text"><?= $ben['awas_saran']; ?></p>
                  </div>
                </div>
              </div>
          </div>
          <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
          </div>
          </form>
        </div>
        <!-- /.modal-content -->
      </div>
      <!-- /.modal-dialog -->
    </div>
  <?php endwhile; ?>
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
      $("#provinsi").on('change', function() {
        var provinsi = $("#provinsi").val();
        $(".loader").hide();
        $(".loader2").show();
        $("#isi").hide();
        if (provinsi == 1) {
          $.ajax({
            type: "POST",
            dataType: "html",
            url: "wpi.php",
            data: {
              provinsi: provinsi,
            },
            success: function(msg) {
              $("#isi").html(msg);
              $("#isi").show();
              $(".loader2").hide();
            }
          });
        }
        if (provinsi != 1) {

          $.ajax({
            type: "POST",
            dataType: "html",
            url: "wpi_wil.php",
            data: {
              provinsi: provinsi,
            },
            success: function(msg) {
              $("#isi").html(msg);
              $(".loader2").hide();
              $("#isi").show();
            }
          });
        }

      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {
      // sembunyikan form kabupaten
      $("#form_kab").hide();
      // ambil data kabupaten ketika data memilih provinsi
      $('body').on("change", "#provinsi", function() {
        var provinsi = $("#provinsi").val();
        var id = $(this).val();
        var data = "id=" + id + "&data=kabupaten";
        if (provinsi != 1) {
          $.ajax({
            type: 'POST',
            url: "get_daerah.php",
            data: data,
            success: function(hasil) {
              $("#form_kab").html(hasil);
              $("#form_kab").show();
            }
          });
        } else {
          $("#form_kab").hide();
        }
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#form_kab").on('change', function() {
        var provinsi = $("#form_kab").val();
        $(".loader").show();
        $(".loader2").show();
        $("#isi").hide();
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "wpi_wil.php",
          data: {
            provinsi: provinsi
          },
          success: function(msg) {
            $("#form_kab").show();
            $("#isi").show();
            $("#isi").html(msg);
            $(".loader").hide();
            $(".loader2").hide();

          }
        });
      });
    });
  </script>
</body>

</html>