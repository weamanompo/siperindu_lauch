<?php


include '../koneksi.php';

include 'fungsi_wpi.php';

include 'fungsi_pilar.php';

include 'fungsi_warna_tabel.php';

$query1 = "DELETE FROM indikator_fix";

mysqli_query($koneksi, $query1);

// $query = mysqli_query($koneksi, "SELECT max(tahun_indi_pilar) as kodeTerbesar FROM transaksi_pilar");
//               $data = mysqli_fetch_array($query);
//               $tahun = $data['kodeTerbesar'];

$query = mysqli_query($koneksi, "SELECT max(tahun_nav) as kodeTerbesar FROM indikator_nav");
              $data = mysqli_fetch_array($query);
              $tahun = $data['kodeTerbesar'];

$kdwil = '1';

$query2 = "DELETE FROM wip WHERE kd_wil = '$kdwil'";

mysqli_query($koneksi, $query2);

// insert wip

$pilar = mysqli_query($koneksi, "SELECT * FROM pilar");


while ( $ap = mysqli_fetch_assoc($pilar)  ){

$kdplr = $ap['kode_pilar'];



$nlindi = mysqli_query($koneksi, "SELECT * FROM indikator_pilar JOIN transaksi_pilar ON indikator_pilar.kode_indi_pilar = transaksi_pilar.kd_indi_pilar WHERE indikator_pilar .kd_pilar = '$kdplr' AND transaksi_pilar.tahun_indi_pilar = '$tahun' AND transaksi_pilar.kode_wilayah = '$kdwil' ");

while ($di = mysqli_fetch_assoc($nlindi)) {

$kdindina = $di['kd_indi_pilar'];

$n = $di['nilai_indi_pilar'];

pilar($n, $kdindina, $koneksi, $kdwil,$kdplr );

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
              <h4 class="mt-1 mb-4">NILAI INDIKATOR <span  style="color :chocolate;">NASIONAL</span></h4>


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
                  <div class="col-3" style="background-color: #0081B4; color :#eee; padding: 10px; border-style: solid; border-width: 1px;">
                    <b>SUMBER</b>
                  </div>
                </div>
              </div>
              <?php $ang = 1; ?>

                              <?php $query3 = "DELETE FROM rangking WHERE wil_kd = '$kdwil' AND tahun_rangking = '$tahun'";

mysqli_query($koneksi, $query3);  ; ?>

              <?php while ($apilar = mysqli_fetch_assoc($pilar)) : ?>

                <?php $kp = $apilar['kode_pilar']; ?>

                <?php $jmn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar JOIN indikator_pilar ON transaksi_pilar.kd_indi_pilar = indikator_pilar.kode_indi_pilar WHERE indikator_pilar.kd_pilar = '$kp' AND transaksi_pilar.tahun_indi_pilar = '$tahun' AND transaksi_pilar.kode_wilayah = '1' ");

                $jmlh = mysqli_num_rows($jmn);

                if($jmlh == 0){

                  $tebbe = '';

                }

                if($jmlh != 0){

                  $tebbe = $jmlh;

                }

                ?>



                <?php $kdi = $apilar['kode_pilar'];
                $indi = mysqli_query($koneksi, "SELECT * FROM indikator_pilar JOIN transaksi_pilar ON indikator_pilar.kode_indi_pilar = transaksi_pilar.kd_indi_pilar WHERE indikator_pilar.kd_pilar = '$kdi' AND transaksi_pilar.tahun_indi_pilar = '$tahun' AND transaksi_pilar.kode_wilayah = '$kdwil'");

                $merah = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kdi' AND skor = '4' ");

                $jmerah = mysqli_num_rows($merah);

                if($jmerah !=0) {

 $query31 = "INSERT INTO rangking
VALUES 
('','$kp',  '$kdwil','$jmerah','1', '$tahun' )";

    mysqli_query($koneksi, $query31);

}

                $kuning = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kdi' AND skor = '3' ");

                $jkuning = mysqli_num_rows($kuning);

if($jkuning != 0) {

$query32 = "INSERT INTO rangking
VALUES 
('','$kp',  '$kdwil','$jkuning','2', '$tahun' )";

    mysqli_query($koneksi, $query32);

}   

                $jkuning = mysqli_num_rows($kuning);

                 $hijau = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kdi' AND skor = '2' ");

                $jhijau = mysqli_num_rows($hijau);

                if($jhijau != 0){

 $query33 = "INSERT INTO rangking
VALUES 
('', '$kp', '$kdwil','$jhijau','3', '$tahun' )";

    mysqli_query($koneksi, $query33);

}

                $biru = mysqli_query($koneksi, "SELECT * FROM wip WHERE kd_wil = '$kdwil' AND kd_pil = '$kdi' AND skor = '1' ");

                $jbiru = mysqli_num_rows($biru);
   

if($jbiru !=0){

$query34 = "INSERT INTO rangking
VALUES 
('','$kp',  '$kdwil','$jbiru','4', '$tahun' )";

    mysqli_query($koneksi, $query34);


}


                ?>

                <button class="accordion">
                  <!-- PILAR <span style="color :chocolate;"><b><?= strtoupper($apilar['nama_pilar']); ?></b></span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<span><?= $jmlh; ?></span> -->
                  <div class="row">
                    <!-- <div class="col-1" style="text-align: right; padding-top: 15px;">
                    <b>PILAR </b>
                  </div> -->
                    <div class="col-7" style="padding-left: 14px; text-align: left; padding-top: 15px;">
                      <b>PILAR &nbsp;<span style="color :chocolate; "><?= strtoupper($apilar['nama_pilar']); ?></b></span>                  
                    </div>
                    <div class="col-1" style="padding-top: 10px; text-align: center ; " ><?= $tebbe; ?></div>

<!-- nilai skor -->

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

                    } if ($nilai_skor == 0) {

                      $bg = '';
                      $color = 'white';

                    }
                    
                    ?>
                    <div class="col-1 bg-<?= $bg ; ?>" style="padding-top: 10px; text-align: center ; color :<?= $color  ; ?> ;"><?= $arank['warna']  ; ?></div>
                  </div>
                </button>
                <div class="panel">
                  <?php $no = 1; ?>      
                  <?php while ($d = mysqli_fetch_assoc($indi)) : ?>

                    <?php $n = $d['nilai_indi_pilar'];

                    $kd_indi = $d['kd_indi_pilar'];


                    warnapilar($n,$kd_indi) ;

                    ?>

                    <div class="row">
                      <div class="col-1" style=" color :black; padding: 10px; border-style: solid; border-width: 1px; border-color :beige;">
                        <?= $no; ?>
                      </div>
                      <div class="col-6" style=" color :black; padding: 10px; border-style: solid; border-width: 1px; border-color :beige; text-align:left;">
                        <?= $d['nama_indi_pilar']; ?>
                      </div>
                      <div class="col-2 bg-<?= $bg; ?>" style=" padding: 10px; border-style: solid; border-width: 1px; border-color :beige;">
                        <a href="#" style="color :<?= $color ?>;" data-bs-toggle="modal" data-bs-target="#modal-<?= $bg; ?><?= $kd_indi; ?>"><b><?= $n; ?></b></a>
                      </div>
                      <div class="col-3" style=" color :black; padding: 10px; border-style: solid; border-width: 1px; border-color :beige;">
                        <?= $d['sumber']; ?>
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