<?php

include "../koneksi.php";

include 'fungsi_table.php';

if (!isset($_POST['indikator'])) {

  die;
}

$kd_indi = $_POST['indikator'];

$provinsi = $_POST['provinsi'];

$prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");

$aprov = mysqli_fetch_assoc($prov);

// ambil tahun maksimum terbesar

$query = mysqli_query($koneksi, "SELECT max(tahun_nav) as kodeTerbesar FROM indikator_nav WHERE kode_indikator_nav = '$kd_indi' ");
$data = mysqli_fetch_array($query);
$tahun = $data['kodeTerbesar'];

//  Ambil tahun untuk buttom sebelum

$cekthn = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE tahun_nav < $tahun AND kode_indikator_nav = '$kd_indi' AND CHAR_LENGTH(kode_wilayah_nav)=5 AND kode_wilayah_nav LIKE '$provinsi%' ORDER BY tahun_nav DESC");

$ambthn = mysqli_fetch_assoc($cekthn)['tahun_nav'];

//  Cek apakah data sebelumnya

$cekdata = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah)=5 AND kode_wilayah LIKE '$provinsi%' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$ambthn' AND nilai_indi_pilar != 0 ");

$htg = mysqli_num_rows($cekdata);

//  ambil nama indikator

$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

//  ngecek ada tidaknya data untuk indikator

$cekjum = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah)=5 AND kode_wilayah LIKE '$provinsi%' AND kd_indi_pilar = '$kd_indi' ");

$numcek = mysqli_num_rows($cekjum);

?>


<div class="row mt-2">
  <div class="col-1">
  </div>
  <div class="col-1">
  </div>
  <div class="col-8">

  <!-- ngecek data -->

    <?php if ($numcek  == 0) : ?>

      <div class="alert alert-danger text-center" role="alert">
        Maaf data Kabupaten / Kota di Provinsi <?= $aprov['nama']; ?> belum tersedia
      </div>

    <?php endif; ?>

    <!--  Tampilkan data  -->

    <?php if ($numcek  != 0) : ?>
      <blockquote>
        <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">TABEL INDIKATOR ANGKA &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span> </h5>
        <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">SETIAP KABUPATEN/KOTA </h5>
        <h5 id="judul_wpi_d" class="card-title text-center mb-4" style="color
    :#13005A;">WILAYAH PROVINSI <?= $aprov['nama']; ?></h5>
        <table class="table table-bordered table-striped" width="60%">
          <thead style="background-color: #0081B4 ; color : #fff ;">


            <?php $tableindi =  mysqli_query($koneksi, "SELECT * FROM wilayah_2022 JOIN transaksi_pilar ON wilayah_2022.kode = transaksi_pilar.kode_wilayah  WHERE CHAR_LENGTH(wilayah_2022.kode)=5 AND transaksi_pilar.tahun_indi_pilar = '$tahun' AND transaksi_pilar.kd_indi_pilar = '$kd_indi' ");

            $sumber = mysqli_fetch_assoc($tableindi);

            ?>

            <tr>
              <th class="text-center align-middle" scope="col" rowspan="2">#</th>
              <th class="text-center align-middle" scope="col" rowspan="2"> KABUPATEN / KOTA</th>
              <th style="text-align: center;" scope="col" width="160px">
                <?php if ($htg != 0) : ?>
                  <a href="#indikator"><img src="../assets/img/tombol_panah_kiri.png" width="15%" id="kiri_kab"></a>&nbsp;&nbsp;
                  <?= $tahun; ?>
              </th>
            <?php endif; ?>
            <?php if ($htg == 0) : ?>
              <?= $tahun; ?></th>
            <?php endif; ?>
            </tr>
            <tr>
              <th scope="col" style="text-align: center;"><?= $sumber['sumber']; ?></th>
            </tr>
          </thead>
          <tbody>
            <?php $wilayah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=5 AND kode LIKE '$provinsi%'"); ?>
            <?php $no = 1; ?>
            <?php while ($d = mysqli_fetch_assoc($wilayah)) : ?>
              <?php $kdwil = $d['kode']; ?>
              <?php $nilai =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun'");

              $amnilai = mysqli_fetch_assoc($nilai);

              $n = $amnilai['nilai_indi_pilar'];

              ?>

              <tr>
                <td style="text-align: center;" scope="row" width="10px"><?= $no; ?>.</td>
                <td style="text-align: left ;">&nbsp;&nbsp;<?= $d['nama']; ?></td>

                <?php warnatable($n, $kd_indi); ?>
              </tr>
              <?php $no++; ?>
            <?php endwhile; ?>
 
            <!-- menampilkan data provinsi -->

            <?php $nprov = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$provinsi' AND tahun_indi_pilar = '$tahun' AND kd_indi_pilar = '$kd_indi'");
            $n = mysqli_fetch_assoc($nprov)['nilai_indi_pilar'];

            ?>
            <tr>
              <th style="text-align: center ;" colspan="2">PROVINSI <?= $aprov['nama']; ?></th>
              <?php if($n) : ?>
                <?php warnatable($n, $kd_indi); ?>
                <?php endif ; ?>
                   <?php if(!$n) : ?>
                <td style="text-align: center;" scope="row">Data tidak tersedia</td>
                <?php endif ; ?>      
            </tr>
          </tbody>
        </table>
      </blockquote>
    <?php endif; ?>


  </div>
  <div class="col-1">
  </div>
  <div class="col-1">
  </div>
</div>
<input id="tahun" value="<?= $tahun; ?>" hidden>
<script>
  $(document).ready(function() {
    $("#indikator").on('change', function() {
      var indikator = $("#indikator").val();
      var provinsi = $("#provinsi").val();
      $(".loader").show();
      if (indikator == 1) {
        alert('Pilih Indikator Dahulu');
        return false;
      }
      if (provinsi != 99) {
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "table_kab.php",
          data: {
            indikator: indikator,
            provinsi: provinsi
          },
          success: function(msg) {
            $("#isi2").html(msg);
            $(".loader").hide();
          }
        });
      }

    });
  });
</script>

<script>
  $(document).ready(function() {
    $("#kiri_kab").on('click', function() {
      var provinsi = $("#provinsi").val();
      var tahun = $("#tahun").val();
      var indikator = $("#indikator").val();
      $(".loader").show();
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "table_kab_kiri.php",
        data: {
          indikator: indikator,
          provinsi: provinsi,
          tahun: tahun
        },
        success: function(msg) {
          $("#isi2").html(msg);
          $(".loader").hide();
        }
      });
    });
  });
</script>