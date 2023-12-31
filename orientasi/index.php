<?php

// $data1 = file_get_contents('http://localhost/api_rindu/mahasiswa2');
$data1 = file_get_contents('http://siperindu.online/api_rindu/mahasiswa2');

$menu2 = json_decode($data1, true);

$data1 = $menu2['data'];

$jlmh2 = $menu2['data'][0]['jmlh'];

$tglref = date('Y-m-d');

function tgl_indo($tanggal)
{
  $bulan = array(
    1 =>   'Jan',
    'Feb',
    'Maret',
    'April',
    'Mei',
    'Juni',
    'Juli',
    'Agus',
    'Sep',
    'Okt',
    'Nov',
    'Des'
  );
  $pecahkan = explode('-', $tanggal);

  // variabel pecahkan 0 = tanggal
  // variabel pecahkan 1 = bulan
  // variabel pecahkan 2 = tahun

  return $pecahkan[2] . ' ' . $bulan[(int)$pecahkan[1]] . ' ' . $pecahkan[0];
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>ORIENTASI - SIPERINDU</title>
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





      <nav id="navbar" class="navbar order-last order-lg-0">
        
        <ul>
          <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
          <li><a class="nav-link scrollto" href="../profil">Profil</a></li>
          <li><a class="nav-link scrollto" href="../dashboard">Dashboard</a></li>
          
          <?php if ($jlmh2 != 0) : ?>
            <li><a class="nav-link scrollto " href="#fasilitasi">Fasilitasi&nbsp;<span class="badge bg-danger"><?= $jlmh2; ?> New</span></a></li>
          <?php endif; ?>
          <?php if ($jlmh2 == 0) : ?>
            <li><a class="nav-link scrollto " href="#fasilitasi">Fasilitasi&nbsp;</a></li>
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


    <!-- ======= Testimonials Section ======= -->
    <section id="fasilitasi" class="fasilitasi">
      <div class="container" data-aos="fade-up">
        <br>
        <h3 class="mt-4">FASILITASI</h3>


        <br>

        <div class="row">

          <!-- batas -->

          <?php $no = 0 ; ?>

          <?php  foreach($data1 as $ret)   : ?>
            <?php $tgl1 = $ret['tanggal'] ; 
                    
                    $tgl = tgl_indo("$tgl1");

                    $day = date('D', strtotime($tgl1));
            $dayList = array(
              'Sun' => 'Minggu',
              'Mon' => 'Senin',
              'Tue' => 'Selasa',
              'Wed' => 'Rabu',
              'Thu' => 'Kamis',
              'Fri' => 'Jumat',
              'Sat' => 'Sabtu'
            );
                    
                    ?>
            <?php if($tgl1 >=  $tglref )   : ?>

                <?php $no++; ?>
                
                <div class="col-lg-12 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
              <h5 style="color :chocolate;">NAMA KEGIATAN : <span style="color:darkslategray;"><?= $ret['kegiatan'] ; ?></span></h5>
              <ul>
                <li><i class="ri-check-double-line"></i><strong>Penyelenggara :</strong>
                  <span> <?= $ret['instansi'] ; ?></span>
                </li>
                <li><i class="ri-check-double-line"></i> <strong>Hari :</strong>&nbsp;<span><?= $dayList[$day]; ?></span>,&nbsp;<span><?= $tgl; ?></span></li>
                <li><i class="ri-check-double-line"></i> <strong>Jam :</strong>&nbsp;<span></span><?= $ret['mulai'] ; ?></span>&nbsp; s/d &nbsp;<span><?= $ret['selesai'] ; ?></span>&nbsp;<span><?= $ret['wib'] ; ?></span></li>
                <li><i class="ri-check-double-line"></i> <strong>Tempat :</strong> <span><?= $ret['tempat'] ; ?></span></li>
                <li><i class="ri-check-double-line"></i> <strong>Jumlah pendaftar sampai saat ini :</strong> <span><?= $ret['tebbe'] ; ?></span><br><br><a style="color:darkred;" href="<?= $ret['linkna'] ; ?>" target="_blank"><strong>AYO DAFTAR</strong></a></li>
              </ul>
            </div>
            <?php endif ; ?>
            <?php endforeach ; ?>
          <!-- batas -->
        </div>

      </div>
    </section><!-- End About Section -->
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