<?php


include '../koneksi.php';

include 'fungsi_pilar.php';



$ambil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar JOIN indikator_pilar ON transaksi_pilar.kd_indi_pilar = indikator_pilar.kode_indi_pilar  WHERE nilai_indi_pilar != '' ");

?>



<?php

// $query = mysqli_query($koneksi, "SELECT max(tahun_indi_pilar) as kodeTerbesar FROM transaksi_pilar");
//               $data = mysqli_fetch_array($query);
//               $tahun = $data['kodeTerbesar'];

// $query = mysqli_query($koneksi, "SELECT max(tahun_nav) as kodeTerbesar FROM indikator_nav");
// $data = mysqli_fetch_array($query);
// $tahun = $data['kodeTerbesar'];

$kdwil = '1';





$pilar = mysqli_query($koneksi, "SELECT * FROM pilar");


while ($ap = mysqli_fetch_assoc($pilar)) {

  $kdplr = $ap['kode_pilar'];

  // $nlindi = mysqli_query($koneksi, "SELECT * FROM indikator_pilar JOIN transaksi_pilar ON indikator_pilar.kode_indi_pilar = transaksi_pilar.kd_indi_pilar WHERE indikator_pilar .kd_pilar = '$kdplr' AND transaksi_pilar.tahun_indi_pilar = '$tahun' AND transaksi_pilar.kode_wilayah = '$kdwil' ");

  // AMBIL  kode indikator 

  $ambilindi = mysqli_query($koneksi, "SELECT * FROM indikator_fix WHERE pilar_kd = '$kdplr'");

  // while ($di = mysqli_fetch_assoc($nlindi)) {

  while ($di = mysqli_fetch_assoc($ambilindi)) {

    $kdindina = $di['indikator_kd'];

    // $n = $di['nilai_indi_pilar'];

    // ambil tahun maksimum

    $query = mysqli_query($koneksi, "SELECT max(tahun_indi_pilar) as kodeTerbesar FROM transaksi_pilar WHERE  kd_indi_pilar = '$kdindina'  AND kode_wilayah ='$kdwil'");
    $data = mysqli_fetch_array($query);
    $tahun_besar = $data['kodeTerbesar'];
    $tahun = $tahun_besar;

    // ambil nilai indikator :

    $amnilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdindina' AND tahun_indi_pilar = '$tahun'");

    $nilindi = mysqli_fetch_assoc($amnilai);

    $n = $nilindi['nilai_indi_pilar'];


  }
}

$ambil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar JOIN indikator_pilar ON transaksi_pilar.kd_indi_pilar = indikator_pilar.kode_indi_pilar  WHERE transaksi_pilar.nilai_indi_pilar != '' ");


?>

<style>
  .accordion {
    background-color: #eee;
    color: #0081B4;
    cursor: pointer;
    padding-right: 12px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
  }

  /* .active, .accordion:hover {
  background-color: #FFF;
} */

  .accordion:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
  }

  .active:after {
    content: "\2212";
  }

  .panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
  }
</style>

<div class="container text-center">
  <div class="row">
    <div class="col-1">
    </div>
    <div class="col-10">
      <div class="content-wrapper">

        <!-- Main content -->
        <section class="content" style="padding
                                    : 0 ;">
          <div class="container-fluid">
            <div id="isi">
              <h4 class="mt-1 mb-4">CAPAIAN INDIKATOR <span style="color :chocolate;">NASIONAL</span></h4>


              <?php

              $pilar = mysqli_query($koneksi, "SELECT * FROM pilar");

              ?>

              <div class="container text-center">
                <div class="row">
                  <div class="col-1" style="background-color: #0081B4; color :#eee; padding: 10px; border-style: solid; border-width: 1px;">
                    #
                  </div>
                  <div class="col-6" style="background-color: #0081B4; color :#eee; padding: 10px; border-style: solid; border-width: 1px;">
                    <b>INDIKATOR</b>
                  </div>
                  <div class="col-2" style="background-color: #0081B4; color :#eee; padding: 10px; border-style: solid; border-width: 1px;">
                    <b>CAPAIAN</b>
                  </div>
                  <div class="col-1" style="background-color: #0081B4; color :#eee; padding: 10px; border-style: solid; border-width: 1px;">
                    <b>TAHUN</b>
                  </div>
                  <div class="col-2" style="background-color: #0081B4; color :#eee; padding: 10px; border-style: solid; border-width: 1px;">
                    <b>SUMBER</b>
                  </div>
                </div>
              </div>
              <?php $ang = 1; ?>



              <!-- Input rangking -->

              <?php while ($apilar = mysqli_fetch_assoc($pilar)) : ?>

                <?php $kp = $apilar['kode_pilar']; ?>

                <?php $jmn = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kp' AND skor != 5");

                $jmlh = mysqli_num_rows($jmn);

                if ($jmlh == 0) {

                  $tebbe = '';
                }

                if ($jmlh != 0) {

                  $tebbe = $jmlh;
                }

                ?>

                <?php $kdi = $apilar['kode_pilar'];


                $merah = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kdi' AND skor = '4' ");

                $jmerah = mysqli_num_rows($merah);

              
                $kuning = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kdi' AND skor = '3' ");

                $jkuning = mysqli_num_rows($kuning);

                

                $jkuning = mysqli_num_rows($kuning);

                $hijau = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kdi' AND skor = '2' ");

                $jhijau = mysqli_num_rows($hijau);

                $biru = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kdi' AND skor = '1' ");

                $jbiru = mysqli_num_rows($biru);


                ?>

                <button class="accordion">

                  <div class="row">
                    <!-- <div class="col-1" style="text-align: right; padding-top: 15px;">
                    <b>PILAR </b>
                  </div> -->
                    <div class="col-7" style="padding-left: 14px; text-align: left; padding-top: 15px;">
                      <b>PILAR &nbsp;<span style="color :chocolate; "><?= strtoupper($apilar['nama_pilar']); ?></b></span>
                    </div>
                    <div class="col-1" style="padding-top: 10px; text-align: center ; "><?= $tebbe; ?></div>

                    <!-- nilai skor -->

                    <!-- cek nilai warna  -->

                    <?php $rank = mysqli_query($koneksi, "SELECT * FROM rangking WHERE wil_kd = '$kdwil' AND pilar_kd = '$kdi' AND tahun_rangking = '$tahun' ORDER BY warna DESC, nilai_skor ASC");

                    $arank = mysqli_fetch_assoc($rank);

                    $nilai_skor = $arank['nilai_skor'];

                    if ($nilai_skor == 4) {

                      $bg = 'primary';
                      $color = 'white';
                    }

                    if ($nilai_skor == 3) {

                      $bg = 'success';

                      $color = 'white';
                    }

                    if ($nilai_skor == 2) {

                      $bg = 'warning';
                      $color = 'black';
                    }

                    if ($nilai_skor == 1) {

                      $bg = 'danger';
                      $color = 'white';
                    }
                    if ($nilai_skor == 0) {

                      $bg = '';
                      $color = 'white';
                    }

                    ?>
                    <div class="col-1 bg-<?= $bg; ?>" style="padding-top: 10px; text-align: center ; color :<?= $color; ?> ;"><?= $arank['warna']; ?></div>
                  </div>
                </button>
                <?php $no = 1; ?>
                <div class="panel">
                  <?php $nmindi = mysqli_query($koneksi, "SELECT * FROM indikator_fix JOIN wip ON indikator_fix.indikator_kd = wip.kd_ind WHERE indikator_fix.pilar_kd = '$kp' AND wip.kd_wil = '$kdwil' AND wip.skor != 5"); ?>
                  <?php while ($w = mysqli_fetch_assoc($nmindi)) : ?>
                    <?php $kindi = $w['indikator_kd'];
                    $athnbes =  mysqli_query($koneksi, "SELECT max(tahun_indi_pilar) as kodeTerbesar FROM transaksi_pilar WHERE  kd_indi_pilar = '$kindi'  AND kode_wilayah ='$kdwil'");
                    $datab = mysqli_fetch_assoc($athnbes);
                    $tahun_bes = $datab['kodeTerbesar'];

                    $ambil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND tahun_indi_pilar = '$tahun_bes' AND kd_indi_pilar = '$kindi'");

                    $kon = mysqli_fetch_assoc($ambil);

                    $n = $kon['nilai_indi_pilar'];

                    $kd_indi = $kon['kd_indi_pilar'];


                    if ($kd_indi == 5) {

                      if ($n > 0 &&  $n < 1) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (1 <= $n && $n < 1.5) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (1.5 <= $n && $n < 2) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 2) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }
                    // Ketergantungan

                    if ($kd_indi == 7) {

                      if ($n > 0 &&  $n < 50) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (50 <= $n && $n < 55) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (55 <= $n && $n < 60) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 60) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Rasio Jenis Kelamin

                    if ($kd_indi == 6) {

                      if ($n == 100) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (100 < $n && $n <= 105) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (95 < $n && $n <= 100) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (105 < $n && $n <= 110) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif (90 < $n && $n <= 95) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 110 ||  $n <= 90) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // CPR Modern

                    if ($kd_indi == 12) {

                      if ($n > 60) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (50 < $n && $n <= 60) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (40 <= $n && $n <= 50) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n < 40) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // TFR

                    if ($kd_indi == 9) {

                      if ($n >= 2 && $n <= 2.19) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (2.2 <= $n && $n <= 2.39) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (1.8 <= $n && $n <= 1.99) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (2.4 < $n && $n <= 2.69) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 && $n <= 1.8) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 2.7) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // ASFR

                    if ($kd_indi == 10) {

                      if ($n < 18) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (18 <= $n && $n < 30) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (30 <= $n && $n < 40) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif (40 <= $n) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // AKB KEmatian Bayi

                    if ($kd_indi == 19) {

                      if ($n < 16) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (16 <= $n && $n < 30) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (30 <= $n && $n < 40) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif (40 <= $n) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Harapan Hidup

                    if ($kd_indi == 17) {

                      if ($n > 75) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (70 < $n && $n <= 75) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (65 < $n && $n <= 70) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n <=  65 &&  0 < $n) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // MKJP

                    if ($kd_indi == 13) {

                      if ($n > 29) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (25 <= $n && $n < 29) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (20 <= $n && $n < 25) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 &&  $n < 20) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // unmet need

                    if ($kd_indi == 14) {

                      if ($n > 0 && $n < 7.5) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (7.5 <= $n && $n < 8) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (8 <= $n && $n < 9.9) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >=  9.9) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Indeks pembangunan gender

                    if ($kd_indi == 30) {

                      if ($n >= 91.39) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (90 <= $n && $n < 91.39) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (80 <= $n && $n < 90) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 &&  $n < 80) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Indeks pemberdayaan gender

                    if ($kd_indi == 31) {

                      if ($n >= 74.18) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (70 <= $n && $n < 74.18) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (60 <= $n && $n < 70) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 &&  $n < 60) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // kemiskinan ekstrem

                    if ($kd_indi == 36) {

                      if ($n == 0.0001) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (0 < $n && $n <= 2) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (2 < $n && $n < 5) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 5) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if ($n == 0) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // kemiskinan

                    if ($kd_indi == 35) {

                      if ($n > 0 && $n < 7) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (7 < $n && $n <= 9.6) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (9.6 < $n && $n < 12) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 12) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Perempuan di parlemen

                    if ($kd_indi == 32) {

                      if ($n > 30) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (20 < $n && $n <= 30) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (10 < $n && $n <= 20) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n <= 10) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // capaian akta kelahiran

                    if ($kd_indi == 42) {

                      if ($n == 100) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (80 <= $n && $n < 100) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (60 <= $n && $n < 80) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 && $n < 60) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // rata rata rata usia sekolah

                    if ($kd_indi == 26) {

                      if ($n >= 9) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (7.5 <= $n && $n < 9) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (6 <= $n && $n < 7.5) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 && $n < 6) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Pengangguran terbuka

                    if ($kd_indi == 28) {

                      if ($n > 0 && $n <= 4.3) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (4.3 < $n && $n <= 6.5) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (6.5 < $n && $n < 8.5) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 8.5) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Angka Kematian Ibu

                    if ($kd_indi == 18) {

                      if ($n > 0 && $n < 183) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (183 <= $n && $n < 200) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (200 <= $n && $n < 300) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 300) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Angka partisipasi sekolah 7 - 12


                    if ($kd_indi == 23) {

                      if ($n == 100) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (95 <= $n && $n < 100) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (90 <= $n && $n < 95) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 &&  $n < 90) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Angka partisipasi sekolah 13 - 15


                    if ($kd_indi == 24) {

                      if ($n == 100) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (95 <= $n && $n < 100) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (90 <= $n && $n < 95) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 &&  $n < 90) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Angka partisipasi sekolah 16 - 18


                    if ($kd_indi == 25) {

                      if ($n >= 80) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (70 <= $n && $n < 80) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (60 <= $n && $n < 70) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 &&  $n < 60) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Penduduk perkotaan

                    if ($kd_indi == 37) {

                      // if (60 < $n && $n <= 70) {

                      if (60 < $n && $n <= 100) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (50 <= $n && $n < 60) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (40 <= $n && $n < 50) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 &&  $n < 40) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Rumah layak huni

                    if ($kd_indi == 33) {

                      if (70 < $n) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (60 <= $n && $n < 70) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (50 <= $n && $n < 60) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 &&  $n < 50) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // prevalensi stunting

                    if ($kd_indi == 20) {

                      if ($n > 0 && $n <= 14) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (14 < $n && $n <= 20) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (20 < $n && $n <= 30) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 30) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // gini ratio

                    if ($kd_indi == 29) {

                      if ($n > 0 && $n <= 0.374) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (0.374 < $n && $n <= 0.385) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (0.385 < $n && $n <= 4) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 4) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // kepadatan penduduk

                    if ($kd_indi == 38) {

                      if ($n > 0 && $n < 200) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (200 <= $n && $n < 300) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (300 <= $n && $n < 1000) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 1000) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // risen netto

                    if ($kd_indi == 39) {

                      if ($n > -1 && $n < 1) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (-5 <= $n && $n <= -1) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (1 <= $n && $n <= 5) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (-10 <= $n && $n < -5) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif (5 <= $n && $n < 10) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n < -10) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      } elseif ($n > 10) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // migrasi seumur hidup

                    if ($kd_indi == 40) {

                      if ($n > -1 && $n < 1) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (-5 <= $n && $n <= -1) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (1 <= $n && $n <= 5) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (-10 <= $n && $n < -5) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif (5 <= $n && $n < 10) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n < -10) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      } elseif ($n > 10) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // pembangunan keluarga

                    if ($kd_indi == 45) {

                      if ($n >= 61) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (59 <= $n && $n < 61) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (50 <= $n && $n < 59) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 && $n < 50) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // median kawin pertama

                    if ($kd_indi == 15) {

                      if (21 <= $n  && $n < 23) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (20 <= $n && $n < 21) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (23 <= $n && $n < 25) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (19 <= $n && $n < 20) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif (25 <= $n && $n < 27) {


                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n < 19 && $n > 0) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      } elseif ($n >= 27) {

                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // indeks pembangunan manusia

                    if ($kd_indi == 43) {

                      if ($n >= 80) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (70 <= $n && $n < 80) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (60 <= $n && $n < 70) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 && $n < 60) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // angka kematian balita

                    if ($kd_indi == 44) {

                      if ($n > 0 && $n < 25) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (25 <= $n && $n < 45) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (45 <= $n && $n < 55) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 55) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // angka kelahiran kasar

                    if ($kd_indi == 46) {

                      if ($n > 0 && $n < 20) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (20 <= $n && $n < 30) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (30 <= $n && $n < 40) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 40) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // bonus demografi

                    if ($kd_indi == 11) {

                      if ($n == 4) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif ($n == 3) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif ($n == 2) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n == 1) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if ($n == 0) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // proporsi lansia

                    if ($kd_indi == 8) {

                      if ($n > 0 && $n < 10) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (10 <= $n && $n < 15) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (15 <= $n && $n < 20) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 20) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if ($n == 0) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // air bersih

                    if ($kd_indi == 34) {

                      if ($n == 100) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (90 <= $n && $n < 100) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (80 <= $n && $n < 90) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n > 0 && $n < 80) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if ($n == 0) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // sanitasi

                    if ($kd_indi == 47) {

                      if ($n >= 90) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (80 <= $n && $n < 90) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (70 <= $n && $n < 80) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n < 70) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if ($n == 0) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    //  perkawinan anak

                    if ($kd_indi == 48) {

                      if ($n > 0 &&  $n <= 8.74) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (8.74 < $n && $n < 11) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (11 <= $n && $n < 13) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif (13 <= $n && $n < 17) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if ($n == 0) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // JKN

                    if ($kd_indi == 50) {

                      if ($n >= 98) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (85 <= $n && $n < 98) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (70 <= $n && $n < 85) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif (0 < $n && $n < 70) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if ($n == 0) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // angka putus kb

                    if ($kd_indi == 16) {

                      if ($n > 0 && $n < 25) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";
                      } elseif (25 <= $n && $n < 30) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";
                      } elseif (30 <= $n && $n < 35) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";
                      } elseif ($n >= 35) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";
                      }
                      if ($n == 0) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    $namaindikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kindi'");

                    $get = mysqli_fetch_assoc($namaindikator)['nama_indi_pilar'];



                    ?>
                    <div class="row">
                      <div class="col-1" style=" color :black; padding: 10px; border-style: solid; border-width: 1px; border-color :beige;">
                        <?= $no; ?>.
                      </div>
                      <div class="col-6" style=" color :black; padding: 10px; border-style: solid; border-width: 1px; border-color :beige; text-align:left;">
                        <?= $get; ?>
                      </div>
                      <!-- khusus indikator bonus demograpi -->

                      <?php
                      if ($kindi == 11) {
                        if ($n == 1) {
                          $nilaifix = "Belum Ada Tanda Bonus Demografi";
                        } elseif ($n == 2) {
                          $nilaifix = "Tahap Pra-Bonus Demografi";
                        } elseif ($n == 3) {
                          $nilaifix = "Bonus Demografi Sedang Berjalan";
                        } elseif ($n == 4) {
                          $nilaifix = "Tahap Bonus Demografi Lanjut";
                        }
                      };
                      if ($kindi != 11) {

                        $nilaifix = $n;
                      }

                      ?>


                      <div class="col-2 bg-<?= $bg; ?>" style=" padding: 10px; border-style: solid; border-width: 1px; border-color :beige;">
                        <a href="#" style="color :<?= $color ?>;" data-bs-toggle="modal" data-bs-target="#modal-<?= $bg; ?><?= $kd_indi; ?>"><b><?= $nilaifix; ?></b></a>
                      </div>
                      <div class="col-1" style=" color :black; padding: 10px; border-style: solid; border-width: 1px; border-color :beige;">
                        <?= $tahun_bes; ?>
                      </div>
                      <div class="col-2" style=" color :black; padding: 10px; border-style: solid; border-width: 1px; border-color :beige;">
                        <?= $kon['sumber']; ?>
                      </div>
                    </div>
                    <?php $no++; ?>
                  <?php endwhile; ?>
                </div>
                <?php $ang++; ?>
              <?php endwhile; ?>
            </div>
          </div>
        </section>
      </div>
    </div>
    <div class="col-1">
    </div>
  </div>
</div>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>

<script>
  var acc = document.getElementsByClassName("accordion");
  var i;

  for (i = 0; i < acc.length; i++) {
    acc[i].addEventListener("click", function() {
      this.classList.toggle("active");
      var panel = this.nextElementSibling;
      if (panel.style.maxHeight) {
        panel.style.maxHeight = null;
      } else {
        panel.style.maxHeight = panel.scrollHeight + "px";
      }
    });
  }
</script>