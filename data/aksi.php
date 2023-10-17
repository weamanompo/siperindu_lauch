<?php

session_start();

include '../koneksi.php';

$tglref = date('Y-m-d');

// $kdi = '6';

$kdi = $_POST['indi'];
$provinsi = $_POST['provinsi'];

$_SESSION['provinsi'] = $provinsi  ;
$_SESSION['indi'] = $kdi  ;

if (isset($_POST["submit"])) {

  $thn1 = '';

  $th = '';
  $ths = '';

  $td = '';

  if (isset($_POST["ins"])) {

    $ins = $_POST['ins'];

    $jumlahins = count($ins);

    $_SESSION['jumlah'] =$jumlahins ;

    for ($x = 0; $x < $jumlahins; $x++) {

      $tahun = $ins[$x];

      if ($provinsi == 99) {
        $mtd = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kd_indi_pilar ='$kdi' AND tahun_indi_pilar = '$tahun' AND CHAR_LENGTH(kode_wilayah)=2 ");
      } else {
        $mtd = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kd_indi_pilar ='$kdi' AND tahun_indi_pilar = '$tahun' AND CHAR_LENGTH(kode_wilayah)=5 AND kode_wilayah LIKE '$provinsi%' ");
      }



      $nilai = mysqli_fetch_assoc($mtd);

      $nilaiindi = $nilai['nilai_indi_pilar'];


      $sumber = $nilai['sumber'];

      $td .= '<td>' . $nilaiindi . '</td>';

      $koma = ',';

      $thn1 .= $tahun . $koma;

      $th .= '<th scope="col" style="text-align: center;" >' . $tahun . '</th>';
      $ths .= '<th scope="col" style="text-align: center;" >' . $sumber . '</th>';
    }

    $asli = substr($thn1, 0, -1);

    $kurungbuka = '(';
    $kurungtutup = ')';

    $gabung = $kurungbuka . $asli . $kurungtutup;

    $data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  tahun_indi_pilar IN $gabung ORDER BY tahun_indi_pilar ASC ");

    $tebbe = mysqli_num_rows($data);
  } else {

    echo "<script>alert('Belum ada tahun yang dipilih, pilih satu atau lebih tahun terlebih dahulu');
        document.location.href = 'index.php';
        </script>";
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">


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
          <li><a class="nav-link scrollto" href="../dashboard">Dashboard</a></li>
          <?php if ($jmlh != 0) : ?>
            <li><a class="nav-link scrollto " href="../orientasi">Fasilitasi&nbsp;<span class="badge bg-danger"><?= $jmlh; ?> New</span></a></li>
          <?php endif; ?>
          <?php if ($jmlh == 0) : ?>
            <li><a class="nav-link scrollto " href="../orientasi">Fasilitasi&nbsp;</a></li>
          <?php endif; ?>
          <li><a class="nav-link scrollto" href="#data">Tabel Dinamis</a></li>
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
    .loader {

      width: 50px;
      position: absolute;
      top: 550px;
      left: 670px;
      z-index: 999;
      display: none;


    }
  </style>
  </style>
  <main id="main">

    <section class="inner-page">
      <div class="container">
        <!-- ======= Portfolio Section ======= -->
        <section id="data" class="portfolio">
          <img src="../assets/img/loader.gif" class="loader">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Tabel Dinamis</h2>
              <p></p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-lg-12 d-flex justify-content-center" style="padding-bottom: 0rem;">
                <ul id="portfolio-flters">
                  <li class="filter-active">Wilayah Per Indikator</li>
                  <li><a style="color : black ;" href="../data2">Indikator Per Wilayah</a></li>

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
                          $daerah = mysqli_query($koneksi, "SELECT * FROM indikator_fix JOIN indikator_pilar ON indikator_fix.indikator_kd = indikator_pilar.kode_indi_pilar WHERE indikator_fix.pilar_kd = '$kdpilar'  ORDER BY indikator_pilar.nama_indi_pilar ASC"); ?>
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

                    <option selected value="99">SEMUA PROVINSI</option>

                    <?php
                    $daerah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2 ");
                    ?>
                    <?php while ($d = mysqli_fetch_array($daerah)) : ?>
                      <?php $wil = $d['kode']; ?>

                      <?php if ($wil == $provinsi) : ?>
                        <option selected value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                      <?php endif; ?>
                      <?php if ($wil != $provinsi) : ?>
                        <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>
                      <?php endif; ?>
                    <?php endwhile; ?>
                  </select>
                </h5>
                <div class="card-body" id="isi">

                  <?php if (isset($_POST['provinsi'])) : ?>

                    <!-- tingkat provinsi -->

                    <?php if ($provinsi == 99) : ?>

                      <?php
                      $in = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kdi'");
                      $nmindi = mysqli_fetch_assoc($in)['nama_indi_pilar'];
                      ?>

                      <h5 class="text-center mt-3">INDIKATOR <span style="color:chocolate;"><?= strtoupper($nmindi); ?></span></h5>
                      <h5 class="text-center">SETIAP PROVINSI</h5>
                      <a class="btn btn-secondary btn-sm mb-2" href="pdf.php/<?= $asli; ?>" target="_blank">Download</a>
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">

                          <thead style="background-color: #0081B4; color :#eee;">
                            <tr>
                              <th class="text-center align-middle" scope="col" rowspan="2" style="text-align: center;" width="30px">#</th>
                              <th class="align-middle" scope="col" rowspan="2">&nbsp;&nbsp;P R O V I N S I</th>
                              <?= $th; ?>
                            </tr>
                            <tr>
                              <?= $ths; ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $wil = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2 ORDER BY kode ASC ");
                            $no = 1;
                            ?>
                            <?php while ($p = mysqli_fetch_assoc($wil)) : ?>
                              <?php
                              $kdwil = $p['kode'];

                              $td2 = '';

                              if (isset($_POST["ins"])) {

                                for ($x = 0; $x < $jumlahins; $x++) {

                                  $tahun = $ins[$x];

                                  // Provinsi

                                  $mtd = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kd_indi_pilar ='$kdi' AND tahun_indi_pilar = '$tahun' AND CHAR_LENGTH(kode_wilayah)=2 AND kode_wilayah ='$kdwil' ");

                                  $nilai = mysqli_fetch_assoc($mtd);

                                  $nilaiindi = $nilai['nilai_indi_pilar'];

                                  // khusus indikator bonus demografi

                                  if ($kdi == 11) {
                                    if ($nilaiindi == 1) {
                                      $nilaifix = "Belum Ada Tanda Bonus Demografi";
                                    } elseif ($nilaiindi == 2) {
                                      $nilaifix = "Tahap Pra-Bonus Demografi";
                                    } elseif ($nilaiindi == 3) {
                                      $nilaifix = "Bonus Demografi Sedang Berjalan";
                                    } elseif ($nilaiindi == 4) {
                                      $nilaifix = "Tahap Bonus Demografi Lanjut";
                                    }
                                    $td2 .= '<td class="align-middle" style="text-align: center;">' . $nilaifix . '</td>';

                                    $thn1 .= $tahun . $koma;
                                  }

                                  if ($kdi != 11) {


                                    $cek = substr_count($nilaiindi, ".");
                                    $cek2 = substr_count($nilaiindi, ",");

                                    if ($cek == 0 && $nilaiindi  != '') {

                                      $nilaifix = number_format($nilaiindi, 0, ",", ".");
                                    } elseif ($cek == 0 && $nilaiindi == 0) {

                                      $nilaifix = '*';
                                    } elseif ($cek != 0) {

                                      $data = explode(".", $nilaiindi);

                                      $angka = $data[0];

                                      $desimal = $data[1];

                                      $koma = ',';

                                      $nilaifix = $angka . $koma . $desimal;
                                    }

                                    $td2 .= '<td class="align-middle" style="text-align: center;">' . $nilaifix . '</td>';

                                    $thn1 .= $tahun . $koma;
                                  }
                                }
                              }

                              ?>

                              <tr>
                                <td scope="row" class="text-center align-middle" style="text-align: center;" width="30px"><?= $no; ?>.</td>
                                <td class="align-middle">&nbsp;&nbsp;<?= $p['nama']; ?></td>
                                <?= $td2; ?>
                              </tr>
                              <?php $no++; ?>

                            <?php endwhile; ?>

                            <!-- Rekap Nasional -->

                            <?php

                            $td2n = '';

                            if (isset($_POST["ins"])) {

                              for ($x = 0; $x < $jumlahins; $x++) {

                                $tahun = $ins[$x];

                                $mtd = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kd_indi_pilar ='$kdi' AND tahun_indi_pilar = '$tahun' AND kode_wilayah ='1' ");

                                $nilai = mysqli_fetch_assoc($mtd);

                                $nilaiindi = $nilai['nilai_indi_pilar'];

                                if ($kdi == 11) {
                                  if ($nilaiindi == 1) {
                                    $nilaifix = "Belum Ada Tanda Bonus Demografi";
                                  } elseif ($nilaiindi == 2) {
                                    $nilaifix = "Tahap Pra-Bonus Demografi";
                                  } elseif ($nilaiindi == 3) {
                                    $nilaifix = "Bonus Demografi Sedang Berjalan";
                                  } elseif ($nilaiindi == 4) {
                                    $nilaifix = "Tahap Bonus Demografi Lanjut";
                                  }
                                  $td2n .= '<th class="text-center align-middle" style="text-align: center;">' . $nilaifix . '</th>';
                                }

                                if ($kdi != 11) {

                                  $cek = substr_count($nilaiindi, ".");
                                  $cek2 = substr_count($nilaiindi, ",");

                                  if ($cek == 0 && $nilaiindi  != '') {

                                    $nilaifix = number_format($nilaiindi, 0, ",", ".");
                                  } elseif ($cek == 0 && $nilaiindi == 0) {

                                    $nilaifix = '*';
                                  } elseif ($cek != 0) {

                                    $data = explode(".", $nilaiindi);

                                    $angka = $data[0];

                                    $desimal = $data[1];

                                    $koma = ',';

                                    $nilaifix = $angka . $koma . $desimal;
                                  } elseif ($cek2 != 0) {
                                    $nilaifix = $nilaiindi;
                                  }

                                  $td2n .= '<th class="text-center align-middle" style="text-align: center;">' . $nilaifix . '</th>';
                                }
                              }
                            }

                            ?>

                            <tr style="background-color: #ECF8F9; color :#eee;">
                              <th colspan="2" class="text-center align-middle" style="text-align: center;">Nasional</th>
                              <?= $td2n; ?>
                            </tr>
                          </tbody>
                        </table>
                        <p>Keterangan : * Tidak ada data</p>
                      </div>
                    <?php endif; ?>

                    <!-- wilayah kab / kota -->

                    <?php if ($provinsi != 99) : ?>
                      <?php $prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");
                      $nm = mysqli_fetch_assoc($prov)['nama'];
                      $in = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kdi'");
                      $nmindi = mysqli_fetch_assoc($in)['nama_indi_pilar'];
                      ?>
                      <h5 class="text-center mt-3">INDIKATOR <span style="color:chocolate;"><?= strtoupper($nmindi); ?></span></h5>
                      <h5 class="text-center">SETIAP KABUPATEN/KOTA WILAYAH PROVINSI <?= strtoupper($nm); ?></h5>
                      <a class="btn btn-secondary btn-sm mb-2" href="pdf.php/<?= $asli; ?>" target="_blank">Download</a>
                      <div class="table-responsive">
                        <table class="table table-striped table-bordered">

                          <thead style="background-color: #0081B4; color :#eee;">
                            <tr>
                              <th class="text-center align-middle" scope="col" rowspan="2" style="text-align: center;" width="30px">#</th>
                              <th class="align-middle" scope="col" rowspan="2">&nbsp;&nbsp;KABUPATEN/KOTA</th>
                              <?= $th; ?>
                            </tr>
                            <tr>
                              <?= $ths; ?>
                            </tr>
                          </thead>
                          <tbody>
                            <?php $wil = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=5 AND kode LIKE '$provinsi%' ORDER BY kode ASC ");
                            $no = 1;
                            ?>
                            <?php while ($p = mysqli_fetch_assoc($wil)) : ?>
                              <?php
                              $kdwil = $p['kode'];

                              $td2 = '';

                              if (isset($_POST["ins"])) {

                                for ($x = 0; $x < $jumlahins; $x++) {

                                  $tahun = $ins[$x];

                                  $mtd = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kd_indi_pilar ='$kdi' AND tahun_indi_pilar = '$tahun' AND CHAR_LENGTH(kode_wilayah)=5 AND kode_wilayah ='$kdwil' AND nilai_indi_pilar != 0 ");

                                  $nilai = mysqli_fetch_assoc($mtd);

                                  $nilaiindi = $nilai['nilai_indi_pilar'];

                                  // khusus indikator bonus demografi

                                  if ($kdi == 11) {
                                    if ($nilaiindi == 1) {
                                      $nilaifix = "Belum Ada Tanda Bonus Demografi";
                                    } elseif ($nilaiindi == 2) {
                                      $nilaifix = "Tahap Pra-Bonus Demografi";
                                    } elseif ($nilaiindi == 3) {
                                      $nilaifix = "Bonus Demografi Sedang Berjalan";
                                    } elseif ($nilaiindi == 4) {
                                      $nilaifix = "Tahap Bonus Demografi Lanjut";
                                    }
                                    $td2 .= '<td class="align-middle" style="text-align: center;">' . $nilaifix . '</td>';

                                    $koma = ',';

                                    $thn1 .= $tahun . $koma;
                                  }

                                  if ($kdi != 11) {

                                    $cek = substr_count($nilaiindi, ".");
                                    $cek2 = substr_count($nilaiindi, ",");

                                    if ($cek == 0 && $nilaiindi  != '') {

                                      $nilaifix = number_format($nilaiindi, 0, ",", ".");
                                    } elseif ($cek == 0 && $nilaiindi == 0) {

                                      $nilaifix = '*';
                                    } elseif ($cek != 0) {

                                      $data = explode(".", $nilaiindi);

                                      $angka = $data[0];

                                      $desimal = $data[1];

                                      $koma = ',';

                                      $nilaifix = $angka . $koma . $desimal;
                                    }

                                    $td2 .= '<td class="align-middle" style="text-align: center;">' . $nilaifix . '</td>';

                                    $koma = ',';

                                    $thn1 .= $tahun . $koma;
                                  }
                                }
                              }

                              ?>

                              <tr>
                                <td scope="row" class="text-center align-middle" style="text-align: center;"><?= $no; ?>.</td>
                                <td class="align-middle">&nbsp;&nbsp;<?= $p['nama']; ?></td>
                                <?= $td2; ?>
                              </tr>
                              <?php $no++; ?>
                            <?php endwhile; ?>

                            <!-- Rekap Provinsi -->

                            <?php

                            $td2n = '';

                            if (isset($_POST["ins"])) {

                              for ($x = 0; $x < $jumlahins; $x++) {

                                $tahun = $ins[$x];



                                $mtd = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kd_indi_pilar ='$kdi' AND tahun_indi_pilar = '$tahun' AND kode_wilayah ='$provinsi' ");

                                $nilai = mysqli_fetch_assoc($mtd);

                                $nilaiindi = $nilai['nilai_indi_pilar'];

                                if ($kdi == 11) {
                                  if ($nilaiindi == 1) {
                                    $nilaifix = "Belum Ada Tanda Bonus Demografi";
                                  } elseif ($nilaiindi == 2) {
                                    $nilaifix = "Tahap Pra-Bonus Demografi";
                                  } elseif ($nilaiindi == 3) {
                                    $nilaifix = "Bonus Demografi Sedang Berjalan";
                                  } elseif ($nilaiindi == 4) {
                                    $nilaifix = "Tahap Bonus Demografi Lanjut";
                                  }
                                  $td2n .= '<th class="text-center align-middle" style="text-align: center;">' . $nilaifix . '</th>';
                                }

                                if ($kdi != 11) {

                                  $cek = substr_count($nilaiindi, ".");
                                  $cek2 = substr_count($nilaiindi, ",");

                                  if ($cek == 0 && $nilaiindi  != '') {

                                    $nilaifix = number_format($nilaiindi, 0, ",", ".");
                                  } elseif ($cek == 0 && $nilaiindi == 0) {

                                    $nilaifix = '*';
                                  } elseif ($cek != 0) {

                                    $data = explode(".", $nilaiindi);

                                    $angka = $data[0];

                                    $desimal = $data[1];

                                    $koma = ',';

                                    $nilaifix = $angka . $koma . $desimal;
                                  }

                                  $td2n .= '<th class="text-center align-middle" style="text-align: center;">' . $nilaifix . '</th>';
                                }
                              }
                            }

                            $namaprov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");
                            $asengprov = mysqli_fetch_assoc($namaprov)['nama'];

                            ?>

                            <tr style="background-color: #ECF8F9; color :#000000;">
                              <th colspan="2" class="text-center align-middle" style="text-align: center;">PROVINSI <?= $asengprov; ?></th>
                              <?= $td2n; ?>
                            </tr>
                          </tbody>
                        </table>
                        <p>Keterangan : * Tidak ada data</p>
                      </div>
                    <?php endif; ?>
                  <?php endif; ?>
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


  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>



  </script>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script>
    $(document).ready(function() {
      $("#provinsi").on('change', function() {
        var indikator = $("#indikator").val();
        var provinsi = $("#provinsi").val();
        $(".loader").show();
        $("#isi").hide();
        if (indikator == 1) {
          alert('Pilih Indikator Dahulu');
        } else {
          $.ajax({
            type: "POST",
            dataType: "html",
            url: "ambil_tahun.php",
            data: {
              indikator: indikator,
              provinsi: provinsi
            },
            success: function(msg) {
              $("#isi").html(msg);
              $("#isi").show();
              $(".loader").hide();
            }
          });
        }

      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#indikator").on('change', function() {
        var indikator = $("#indikator").val();
        var provinsi = $("#provinsi").val();
        $(".loader").show();
        $("#isi").hide();
        if (indikator == 1) {

          alert('Pilih Indikator Dahulu');

        }
        if (provinsi != 1) {

          $.ajax({
            type: "POST",
            dataType: "html",
            url: "ambil_tahun.php",
            data: {
              indikator: indikator,
              provinsi: provinsi
            },
            success: function(msg) {
              $("#isi").html(msg);
              $(".loader").hide();
              $("#isi").show();
            }
          });
        }
      });
    });
  </script>
  <title>DATA</title>
</body>

</html>