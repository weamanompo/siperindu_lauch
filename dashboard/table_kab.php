<?php

include "../koneksi.php";

include 'fungsi_table.php';
include 'legenda_tabel.php';

if (!isset($_POST['indikator'])) {

  die;
}


$kd_indi = $_POST['indikator'];

$provinsi = $_POST['provinsi'];


// nama provinsi

$prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");

$aprov = mysqli_fetch_assoc($prov);

// ambil tahun terbesar

$query = mysqli_query($koneksi, "SELECT max(tahun_nav) as kodeTerbesar FROM indikator_nav WHERE kode_indikator_nav = '$kd_indi'");
$data = mysqli_fetch_array($query);
$tahun = $data['kodeTerbesar'];

// ambil tahun sebelumnya

$cekthn = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE tahun_nav < $tahun AND kode_indikator_nav = '$kd_indi' ORDER BY tahun_nav DESC");

$ambthn = mysqli_fetch_assoc($cekthn)['tahun_nav'];

//  Cek ada tidaknya data tahun sebelumnya

$cekdata = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah)=5 AND kode_wilayah LIKE '$provinsi%' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$ambthn' AND nilai_indi_pilar != 0 ");

$htg = mysqli_num_rows($cekdata);

// nama indikator

$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

// cek ada tidaknya data

$cekjum = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah)=5 AND kode_wilayah LIKE '$provinsi%' AND kd_indi_pilar = '$kd_indi' ");

$numcek = mysqli_num_rows($cekjum);

?>

<style>
  .tengah {
    display: flex;
    justify-content: center;
    align-items: center;

  }
</style>

<div class="row mt-5">
  <div class="col-1">
  </div>
  <div class="col-1">
  </div>
  <div class="col-8">

    <!--  cek adanya data -->
    <?php if ($numcek  == 0) : ?>

      <div class="alert alert-light text-center" role="alert">
        <!-- Maaf data Kabupaten / Kota di Provinsi <?= $aprov['nama']; ?> belum tersedia -->
      </div>

    <?php endif; ?>

    <?php if ($numcek  != 0) : ?>
      <blockquote>

        <?php if ($htg != 0) : ?>
          <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">TABEL INDIKATOR&nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span> </h5>
          <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">SETIAP KABUPATEN/KOTA WILAYAH PROVINSI <?= $aprov['nama']; ?></h5>


        <?php endif; ?>
        <?php if ($htg == 0) : ?>
          <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">TABEL INDIKATOR&nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span> </h5>
          <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">SETIAP KABUPATEN/KOTA WILAYAH PROVINSI <?= $aprov['nama']; ?></h5>


        <?php endif; ?>

        <table class="table table-bordered table-striped mt-3" width="60%">
          <thead style="background-color: #0081B4 ; color : #fff ;">
            <?php $tableindi =  mysqli_query($koneksi, "SELECT * FROM wilayah_2022 JOIN transaksi_pilar ON wilayah_2022.kode = transaksi_pilar.kode_wilayah  WHERE CHAR_LENGTH(wilayah_2022.kode)=5 AND transaksi_pilar.tahun_indi_pilar = '$tahun' AND transaksi_pilar.kd_indi_pilar = '$kd_indi' ");
            $sumber = mysqli_fetch_assoc($tableindi);
            ?>
            <tr>
              <th class="text-center align-middle" scope="col" rowspan="2">#</th>
              <th class="align-middle" scope="col" rowspan="2"> KABUPATEN / KOTA</th>
              <th style="text-align: center;" scope="col" width="160px">
                <?php if ($htg != 0) : ?>

                  <?= $tahun; ?></th>
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
              $namawil = $d['nama'];

              $data = explode(".", $namawil);

              $dki = substr_count($namawil, "ADM.");

              if ($dki == 0) {

                $kab = $data[0];

                if ($kab == "KAB") {

                  $nm = "KABUPATEN ";

                  $title = $data[1];

                  $ase = "{$nm}{$title}";
                }
                if ($kab != "KAB") {

                  $ase = $data[0];
                }
              }
              if ($dki != 0) {

                $ase = $namawil;
              }



              ?>

              <tr>
                <td style="text-align: center;" scope="row" width="10px"><?= $no; ?>.</td>
                <td style="text-align: left ;">&nbsp;&nbsp;<?= $ase; ?></td>

                <?php warnatable($n, $kd_indi, $kdwil); ?>
              </tr>
              <?php $no++; ?>
            <?php endwhile; ?>
            <?php $nprov = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$provinsi' AND tahun_indi_pilar = '$tahun' AND kd_indi_pilar = '$kd_indi'");
            $n = mysqli_fetch_assoc($nprov)['nilai_indi_pilar'];
            $kdwil = $provinsi;
            ?>
            <tr>
              <th style="text-align: center ;" colspan="2">PROVINSI <?= $aprov['nama']; ?></th>
              <?php if ($n) : ?>
                <?php warnatable($n, $kd_indi, $kdwil); ?>
              <?php endif; ?>
              <?php if (!$n) : ?>
                <td style="text-align: center;" scope="row">Data tidak tersedia</td>
              <?php endif; ?>
            </tr>
          </tbody>
        </table>
        <p>Keterangan : * Tidak ada data</p>
      </blockquote>
    <?php endif; ?>
  </div>
  <div class="col-1">
  </div>
  <div class="col-1">
  </div>
</div>
<input id="tahun" value="<?= $tahun; ?>" hidden>
<input id="indikator" value="<?= $kd_indi; ?>" hidden>
<input id="provinsi" value="<?= $provinsi; ?>" hidden>
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
          $("#isi").hide();
        }
      });
    });
  });
</script>
<script>
  $(document).ready(function() {


    const tes = document.querySelectorAll('#ambil');

    const indi = document.querySelectorAll('#bench');

    const provinsi = document.querySelectorAll('#wilayah');
    const indikator = document.querySelectorAll('#indikator');



    for (let i = 0; i < tes.length; i++) {

      tes[i].addEventListener('click', function() {

        var nilai = indi[i].value;
        var wil = provinsi[i].value;
        var indika = indikator[i].value;

        $.ajax({
          type: "POST",
          dataType: "html",
          url: "view.php",
          data: {
            nilai: nilai,
            wil: wil,
            indika: indika

          },
          success: function(msg) {
            $("#isi3").html(msg);

          }
        });

      });

    }


  });
</script>