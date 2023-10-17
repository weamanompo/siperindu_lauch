<?php

include '../koneksi.php';




// $kdi = '6';


  $thn1 = '';

  $th = '';
  $ths = '';

  $td = '';
  $provinsi = $_POST['provinsi'];

$teb = strlen($provinsi);

if (isset($_POST["submit"])) {





  if (isset($_POST["ins"])) {

    $ins = $_POST['ins'];

    $jumlahins = count($ins);

    for ($x = 0; $x < $jumlahins; $x++) {

      $tahun = $ins[$x];

      $mtd = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah ='$provinsi' AND tahun_indi_pilar = '$tahun' ");

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

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top header-inner-pages">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1> -->
      <!-- Uncomment below if you prefer to use an image logo -->
      <a href="" class="logo me-auto me-lg-0"><img src="../assets/img/logo_ban.png" alt="" class="img-fluid"></a>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="../upload">Upload Data</a></li>
          <li><a class="nav-link scrollto" href="#data">Preview Data</a></li>


          </li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>

      </nav><!-- .navbar -->


    </div>
  </header><!-- End Header -->


  <main id="main">

    <section class="inner-page">
      <div class="container">
        <!-- ======= Portfolio Section ======= -->
        <section id="data" class="portfolio">
          <div class="container" data-aos="fade-up">

            <div class="section-title">
              <h2>Preview Data</h2>
              <p></p>
            </div>

            <div class="row" data-aos="fade-up" data-aos-delay="100">
              <div class="col-lg-12 d-flex justify-content-center" style="padding-bottom: 0rem;">
                <ul id="portfolio-flters">
                  <li><a style="color : black ;" href="../data">Wilayah Per Indikator</a></li>
                  <li class="filter-active">Indikator Per Wilayah</li>

                </ul>
              </div>
              <div class="card" style="width: 100rem;">

                <h5 class="card-header text-center">
                  <select class="form-select" aria-label="Default select example" id="provinsi">
                    <option value="">-- PILIH WILAYAH --</option>

                    <option value="1">NASIONAL</option>

                    <?php
                    $daerah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2 ");
                    ?>
                    <?php while ($d = mysqli_fetch_array($daerah)) : ?>



                      <option value="<?php echo $d['kode']; ?>"><?php echo $d['nama']; ?></option>

                    <?php endwhile; ?>
                  </select>
                  <select class="form-select form-select" id="form_kab" name="kabupaten">
                    <option value="1">Pilih KABUPATEN/KOTA</option>
                  </select>




                </h5>
                <div class="card-body" id="isi">



                  <?php
                  $in = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$provinsi'");
                  $nmindi = mysqli_fetch_assoc($in)['nama_indi_pilar'];
                  ?>

                  <?php if ($provinsi == 1) : ?>

                    <h5 class="text-center mt-3">NILAI INDIKATOR</h5>
                    <h5 class="text-center mb-4">NASIONAL</h5>

                  <?php endif; ?>

                  <?php if ($provinsi != 1 && $teb == 2) : ?>

                    <?php $prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");
                    $nm = mysqli_fetch_assoc($prov)['nama'];

                    ?>

                    <h5 class="text-center mt-3">NILAI INDIKATOR</h5>
                    <h5 class="text-center mb-4">PROVINSI <?= $nm; ?> </h5>

                  <?php endif; ?>

                  <?php if ($provinsi != 1 && $teb == 5) : ?>

                    <?php $prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");
                    $nm = mysqli_fetch_assoc($prov)['nama'];

                    $data = explode(".", $nm);

                    $kab = $data[0];

                    if ($kab == "KAB") {

                      $nm = "KABUPATEN ";

                      $title = $data[1];

                      $ase = "{$nm}{$title}";
                    }
                    if ($kab != "KAB") {

                      $ase = $data[0];
                    }

                    $namawilayah = $ase;

                    ?>

                    <h5 class="text-center mt-3">NILAI INDIKATOR</h5>
                    <h5 class="text-center mb-4"> <?= $namawilayah; ?> </h5>

                  <?php endif; ?>


                  <table class="table table-striped table-bordered">

                    <thead style="background-color: #0081B4; color :#eee;">
                      <tr>
                        <th class="text-center align-middle" scope="col" rowspan="2" style="text-align: center;" width="30px">#</th>
                        <th class="align-middle" scope="col" rowspan="2">&nbsp;&nbsp;INDIKATOR</th>
                        <?= $th; ?>
                      </tr>
                      <tr>
                        <?= $ths; ?>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $wil = mysqli_query($koneksi, "SELECT * FROM indikator_fix JOIN indikator_pilar ON indikator_pilar.kode_indi_pilar = indikator_fix.indikator_kd  ");
                      $no = 1;
                      ?>
                      <?php while ($p = mysqli_fetch_assoc($wil)) : ?>
                        <?php

                        $kdindi = $p['indikator_kd'];

                        $td2 = '';

                        if (isset($_POST["ins"])) {

                          for ($x = 0; $x < $jumlahins; $x++) {

                            $tahun = $ins[$x];

                            $mtd = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar JOIN indikator_pilar ON transaksi_pilar.kd_indi_pilar = indikator_pilar.kode_indi_pilar WHERE transaksi_pilar.kd_indi_pilar='$kdindi' AND transaksi_pilar.tahun_indi_pilar = '$tahun'  AND transaksi_pilar.kode_wilayah ='$provinsi' ");

                            $nilai = mysqli_fetch_assoc($mtd);

                            $nilaiindi = $nilai['nilai_indi_pilar'];
                            
                            $cek = substr_count( $nilaiindi, "." );
                              $cek2 = substr_count( $nilaiindi, "," );

                              if($cek == 0 && $nilaiindi != 0 ) {


                                $nilaifix1 = number_format($nilaiindi,0,",",".");

                                $nilaifix = $nilaifix1;

                              }elseif($cek == 0 && $nilaiindi == 0){

$nilaifix = '';

                              }

                              elseif($cek !=0) {

$data = explode("." , $nilaiindi);

$angka = $data[0];

$desimal = $data[1];

$koma = ',';

$nilaifix1 =$angka .$koma.$desimal ;

$nilaifix = $nilaifix1;
                              }

                              

                            $td2 .= '<td style="text-align: center;">' . $nilaifix . '</td>';

                            $koma = ',';

                            $thn1 .= $tahun . $koma;
                          }
                        }

                        ?>

                        <tr>
                          <td scope="row" style="text-align: center;" width="30px"><?= $no; ?>.</td>
                          <td>&nbsp;&nbsp;<?= $p['nama_indi_pilar']; ?></td>
                          <?= $td2; ?>
                        </tr>
                        <?php $no++;
                        $td2 = ''; ?>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
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
  <script>
    $(document).ready(function() {
      $("#provinsi").on('change', function() {
        var provinsi = $("#provinsi").val();
        {
          $.ajax({
            type: "POST",
            dataType: "html",
            url: "ambil_tahun.php",
            data: {
              provinsi: provinsi,
            },
            success: function(msg) {
              $("#isi").html(msg);
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
        {
          $.ajax({
            type: "POST",
            dataType: "html",
            url: "ambil_tahun.php",
            data: {
              provinsi: provinsi,
            },
            success: function(msg) {
              $("#isi").html(msg);
            }
          });
        }

      });
    });
  </script>

</body>

</html>