<?php

include '../koneksi.php';

include 'capaian_provinsi.php';
include 'fungsi_tes.php';
include 'fungsi_warna_kab.php';
include 'legenda_peta.php';

$kd_indi = $_POST['indikator'];

if ($kd_indi == 4) {

  die;
}

$kdwil = $_POST['provinsi'];

// nama provinsi

$prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");

$namaprov = mysqli_fetch_assoc($prov)['nama'];


// $query = mysqli_query($koneksi, "SELECT max(tahun_nav) as kodeTerbesar FROM indikator_nav WHERE kode_indikator_nav = '$kd_indi'");

$query = mysqli_query($koneksi, "SELECT max(tahun_indi_pilar) as kodeTerbesar FROM transaksi_pilar WHERE kd_indi_pilar = '$kd_indi'");

$data = mysqli_fetch_array($query);
$tahun = $data['kodeTerbesar'];

// $cekkiri = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE tahun_nav < $tahun AND kode_indikator_nav = '$kd_indi' AND kode_wilayah_nav LIKE  '$kdwil%' ");

$cekkiri = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah)=5 AND tahun_indi_pilar < $tahun AND kd_indi_pilar= '$kd_indi' AND kode_wilayah LIKE  '$kdwil%' ");

$recekpanah = mysqli_num_rows($cekkiri);

// $cekdata = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE kode_indikator_nav = '$kd_indi' AND CHAR_LENGTH(kode_wilayah_nav)=5 AND kode_wilayah_nav LIKE '$kdwil%'");

$cekdata = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kd_indi_pilar = '$kd_indi' AND CHAR_LENGTH(kode_wilayah)=5 AND kode_wilayah LIKE '$kdwil%'");

$cekada = mysqli_num_rows($cekdata);

$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

$nil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah ='$kdwil' AND kd_indi_pilar = '$kd_indi' ");

$as = mysqli_fetch_assoc($nil);

$n = $as['nilai_indi_pilar'];


$sumber = $as['sumber'];

?>
<?php if ($cekada == 0) : ?>
  <div class="alert alert-danger text-center " role="alert">
    Maaf belum ada data
  </div>
  <?php die; ?>
<?php endif; ?>

<?php if ($kd_indi != 4 && $recekpanah != 0) : ?>
  <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
    <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
    &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
  </h5>
  <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
  <?php if ($n == 0) : ?>
    <div class="container-fluid text-center">Data capaian provinsi belum tersedia</div>
  <?php endif; ?>
  <?php if ($n != 0) : ?>
    <div class="container text-center">
      <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
      <div class="row">
        <div class="col">

        </div>
        <div class="col">
          CAPAIAN PROVINSI : <?php capaian_prov($n, $kd_indi); ?><?= $n; ?></span>

        </div>
        <div class="col">

        </div>
      </div>
    </div>
  <?php endif; ?>

<?php endif; ?>
<?php if ($kd_indi == 4 && $recekpanah != 0) : ?>
  <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
    <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
    &nbsp;&nbsp;PETA &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
  </h5>
  <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
  <?php if ($n == 0) : ?>
    <div class="container-fluid text-center">Data capaian provinsi belum tersedia</div>
  <?php endif; ?>
  <?php if ($n != 0) : ?>
    <div class="container text-center">
      <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
      <div class="row">
        <div class="col">

        </div>
        <div class="col">
          CAPAIAN PROVINSI : <?php capaian_prov($n, $kd_indi); ?><?= $n; ?></span>

        </div>
        <div class="col">

        </div>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>
<?php if ($recekpanah == 0) : ?>
  <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
    PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
  </h5>
  <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
  <?php if ($n == 0) : ?>
    <div class="container-fluid text-center">Data capaian provinsi belum tersedia</div>
  <?php endif; ?>
  <?php if ($n != 0) : ?>
    <div class="container text-center">
      <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
      <div class="row">
        <div class="col">

        </div>
        <div class="col">
          CAPAIAN PROVINSI : <?php capaian_prov($n, $kd_indi); ?><?= $n; ?></span>

        </div>
        <div class="col">

        </div>
      </div>
    </div>
  <?php endif; ?>
<?php endif; ?>

<div class="container-fluid text-center">
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="45%" height="45%" viewBox="0 0 588 450">
    <defs>
      <style>
        .cls-1 {

          filter: url(#filter);
        }

        a:hover .cls-1 {
          fill: #d5d5d5f3;
        }

        .cls-1,
        .cls-10,
        .cls-11,
        .cls-12,
        .cls-13,
        .cls-14,
        .cls-2,
        .cls-3,
        .cls-4,
        .cls-5,
        .cls-6,
        .cls-7,
        .cls-8,
        .cls-9 {
          fill-rule: evenodd;
        }

        .cls-2 {

          filter: url(#filter-2);
        }

        a:hover .cls-2 {
          fill: #d5d5d5f3;
        }

        .cls-3 {

          filter: url(#filter-3);
        }

        a:hover .cls-3 {
          fill: #d5d5d5f3;
        }

        .cls-4 {

          filter: url(#filter-4);
        }

        a:hover .cls-4 {
          fill: #d5d5d5f3;
        }

        .cls-5 {

          filter: url(#filter-5);
        }

        a:hover .cls-5 {
          fill: #d5d5d5f3;
        }

        .cls-6 {

          filter: url(#filter-6);
        }

        a:hover .cls-6 {
          fill: #d5d5d5f3;
        }

        .cls-7 {

          filter: url(#filter-7);
        }

        a:hover .cls-7 {
          fill: #d5d5d5f3;
        }

        .cls-8 {

          filter: url(#filter-8);
        }

        a:hover .cls-8 {
          fill: #d5d5d5f3;
        }

        .cls-9 {

          filter: url(#filter-9);
        }

        a:hover .cls-9 {
          fill: #d5d5d5f3;
        }

        .cls-10 {

          filter: url(#filter-10);
        }

        a:hover .cls-10 {
          fill: #d5d5d5f3;
        }

        .cls-11 {

          filter: url(#filter-11);
        }

        a:hover .cls-11 {
          fill: #d5d5d5f3;
        }

        .cls-12 {

          filter: url(#filter-12);
        }

        a:hover .cls-12 {
          fill: #d5d5d5f3;
        }

        .cls-13 {

          filter: url(#filter-13);
        }

        a:hover .cls-13 {
          fill: #d5d5d5f3;
        }

        .cls-14 {

          filter: url(#filter-14);
        }

        a:hover .cls-14 {
          fill: #d5d5d5f3;
        }
      </style>
      <filter id="filter" x="72" y="3" width="83" height="103" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-2" x="72" y="119" width="50" height="68" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-3" x="150" y="75" width="114" height="154" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-4" x="151" y="205" width="138" height="239" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-5" x="230" y="85" width="237" height="164" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-6" x="294" y="42" width="237" height="138" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-7" x="66" y="48" width="121" height="95" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-8" x="93" y="88" width="104" height="102" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-9" x="211" y="114" width="74" height="127" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-10" x="259" y="188" width="125" height="111" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-11" x="54" y="241" width="161" height="93" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-12" x="84" y="155" width="89" height="117" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-13" x="103" y="174" width="19" height="21" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-14" x="69" y="89" width="36" height="34" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
    </defs>
    <?php
    $kdwil = '61.01';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Sambas_01" data-name="Kab Sambas 01" class="cls-1" d="M139,8q-0.5,3-1,6l-6,1v1h1q-1,3-2,6h1l-1,3h1c0.809,1.544.911,2.407,1,5l6-1v1h3c-0.218,5.527-1.861,7.925-2,14l8,7c0.489,1.944-.55,1.327-1,2v2l-3,1-2,3h-4v1l-3,1v3h-2v1h1c2.272,2.78,2.721.584,3,6h-1c-1.412,2.447.705,5.284-2,8v1c-3.43,2.156-3.327-2.586-5,3h-1v4c-1.133,2.716-2.54,2.5-3,7l-5-1V92h-1v1H106l-5,7c-1.8-.945-1.575-1.385-4-2l-1-3-9,3V97H86c-0.25.094-.356,1.841-2,1V97c-2.284-2.023-.723-2.264-2-5H81c-1.762-3.388-3.521-5.523-4-10l5,1c-0.16-3.492-1.338-3.16,0-6h1V75h1V73l3-2V69h1c1.914-5-1.519-12.077,1-16h1l5-6h2V46l5-1,1-2,3-1V40h1V37l2-1V33h1V30l3-2V24h1c0.551-2.934-4.037-4.782,0-7h7l3-4h9s0.158-.682,2-1V9h1V8h3Z" />
    </a>
    <?php
    $kdwil = '61.02';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Mempawah_02" data-name="Kab Mempawah 02" class="cls-2" d="M104,137q-0.5,2.5-1,5c5.124,1.054,5.79,4.305,9,7q-0.5,1.5-1,3l-2-1q-0.5,1-1,2l-6,1q0.5,1,1,2h-2c-0.636,1.263.55,0.576,1,1v1l3-1v2h1v-1c1.414-.036-0.395.769,1,1,3.464,0.574,6.682.113,9,1-0.681,1.871-1.38.744,0,2v1h-2c0,1.414.821-.4,1,1v6h-1v1h1v2h1v1h-1v6h-2v-2h-3c-0.586.228-.43,2.889-3,2v-1c-1.727-.357-7.275-3.085-8-4l-1-3-2-1v-5H95v-3l-5-4v-1l-12-4v-2l2-1c1.184-2.274-.327-7.812-1-9l-2-1v-5c4.341,0.408,3.971.687,8,0,1.212-2.128,2.252-2.177,3-5h3v-2h2l4-5,3,1q0.5,1,1,2l2-1q0.5,1,1,2h3a10.238,10.238,0,0,0,2,2l-3,4h-1q0.5,1.5,1,3h-2Z" />
    </a>
    <?php
    $kdwil = '61.03';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Sanggau_03" data-name="Kab Sanggau 03" class="cls-3" d="M184,80c0.386,1.6.957,4.292,2,2h1c1.961,3.394-2.593,3.54,3,5l1,3c-0.22.148-1.85-.13-1,1,0.9,1.192,2.043-1.236,2,1h-1v1l2,1-1,3h2V96h3c-0.054,1.413-.758-0.393-1,1-1.889.859,2,1,2,1V97c2.084-1.09,2.891,1.234,4,1,0,0,.354-0.861,2-1,0.483,4.594,3.272,6.417,5,10l2-1v1c3.165,0.71,7.988.086,10,2q0.5-1.5,1-3c1.318-.513-0.2.653,1,1l2-1v2l3-1q-0.5,1-1,2h1v-1c1.032-.967.961,0.414,1-1h-1a3.854,3.854,0,0,1,2-2v-1c1.5-.989,4.453-0.321,5,0v-1h1v3c1.356,1.766-.119,3.921-1,8,2.132,0.673,2.034.017,1,2h2c1.006,0.994-1,1-1,1-1.383,1.435,1.786.939,2,1v1l5-2v1c1.139,1.139.4,0,1,2h3v-2a9.749,9.749,0,0,1,4,1v-2h3v2l3-1v2c-1.139,1.139-.4,0-1,2l-3,1c0.622,3.527,1.5,8.84-1,13l-2,1q-0.5,2-1,4h-1c-2.115,5.8,3.474,7.365,2,12h-1c-0.7,1.691-1.247,6.805-2,8l-4,2c-1.372,2.414.425,6.441-2,9v1l-7,1v1l-3,1q0.5,2.5,1,5h-1c-0.628,1.456-3.325,6.526-3,8h1q1,3,2,6l-3,1v-1l-6-1v4c-3,1.973-.941,2.825-5,4-1.139,1.139,0,.4-2,1,0.633,4.1.22,3.127,0,8h-1c-3.539-3.9-8.964-1.559-11,2h-1s1.477,4.931,1,6a10.675,10.675,0,0,0-2,2h-1c-0.574-2.01.12-.865-1-2q0.5-2,1-4h-4c-0.945,1.8-1.385,1.574-2,4-1.867-.311-2-1-2-1l-3,1q-0.5-1-1-2h-6v1l-5-1v-2c-2.045-.248-0.988-0.282-2-1l-2,1v-1h-1v1h-1v1h1q-0.5,1.5-1,3h-2c-0.607,2.393-.318,1.858-2,3v1h-1v-1h-1q0.5-2,1-4c-0.29-.63-3.722.434-5-5l3-2v-1c-0.153-.176-3.4.569-2-1h1l3-4h-1v1c-0.86,1.889-1-2-1-2h1c1.843-.95-2-1-2-1v-9c-1.135-.844-0.145.127-1-1h-3v-2h1c0.713-2.072-2.378-1.267-3-2q0.5-1,1-2l-2-1v-2h-1q-0.5-1.5-1-3c3.095-1.813,2.949-3.114,3-8l2,1v-2l2,1v-1h-1v-1h2v-1h-1c-1.113-1.594,1.552-.875,2-1v-2h1v1h1v-1l4,1v-2l2,1v-1h1q-0.5-1.5-1-3h1v1l3-1v1c2.457,0.545,3.668-.515,5-1-1.015-3.061.387-6.561-1-10h2c0.087-.175-0.985-2.607-1-4h1v1l2-1v1h1v-1h1v-1h-1c-0.979-1.654,1.44-.846,2-1v-2l-3,1c-0.574-2.01.12-.865-1-2l2-3h2q-0.5-1-1-2h1q0.5-2,1-4l3,1v-3h-1q0.5-1,1-2h-1v1l-2-1a10.6,10.6,0,0,1-1-4h2q-0.5-1.5-1-3h2v-1h-1q0.5-1.5,1-3l-2-1v-1l-2,1v-1h-1q0.5-1,1-2h-2c-0.2-1.4.223,0.182,1-1q-0.5-1.5-1-3c1.156-.595,1.551-1.732,2-2h2v-1l3,1v-1h1v-1c-2.128-1.212-2.177-2.253-5-3,0.251-3.487,1.095-5.68,0-7V97l-2,1V97c-1.432-.7-3.405-0.908-4,0V93c-2.61-1.911-.883-1.684-2-5l-3,1V88h1l-1-3,3-1-1-2h1c1.129-1.234-.025-0.415,2-1V80h3Z" />
    </a>
    <?php
    $kdwil = '61.04';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Ketapang_04" data-name="Kab Ketapang 04" class="cls-4" d="M273,231l3,1c-0.635,1.181-1.658,1.463-2,2v2l-2,1,1,3h1q-1,7.5-2,15l-5-1a7.173,7.173,0,0,0,1,4h-1a13.765,13.765,0,0,1-4,3c0.844,1.135-.127.145,1,1,1.139,1.139,0,.4,2,1v4l5,1,5,6c-0.279,3.632-3.092,7.432-3,8l3,2-1,3h1v1h4v3c0.274,0.6,3.138,1.468,3,3h-1c-1.964,7.548-10.1,7.478-17,10q-1,4.5-2,9h-3v-2h-3c-0.863.351-.081,2.582-3,2l-1-2h-1v1c-1.719,1.127-1.355.633-2,3h-4c-1.894,3.181-4.391,3.3-5,8,2.4,1.049,3.212,1.12,4,4h4l2-4,2,1c0.712,1.707,3.4,5.882,2,9l-3,2v4h-1c-0.438,2.973,1.763,2.251,2,3q-0.5,2.5-1,5h3c1.212,2.128,2.252,2.177,3,5h2v3c-0.111.283-1.751,0.4-2,2,0.361,0.853,2.386,7.752,2,9h-1v2c-0.565.961-3.845,1.443-3,4h1c0.577,2.328.9,2.384,2,4h1v4h1v3h1v4h1v10h1v3h1c1.1,3.839-1.475,3.673,0,8h3v3l-6,5-7,1-5,7h-6v1l-4,1v1h-4l-1,2-3,2q-0.5,2-1,4c-1.072,1.384-5.512,2.708-8,3-0.113-3.16-1.955-1.874,1-3a57.555,57.555,0,0,0-3-12,7.49,7.49,0,0,1-3-2l-12,4v1h-2l-1,2h-2v1c-2.315,1.92-3.711,4.06-7,5v-1c-2.538-1.488-4.256-4.837-5-8,2.557-2.131,3.045-5.155,3-10l-3-1q-0.5-4.5-1-9l-5-1,1-3h1v-2h1v-6h-1v-4l-2-1v-2h-1v-9h-1q-0.5-2-1-4l-3-2c-0.673-1.64.965-1.839,1-2l-1-3h1v-2h1v-5h1a2.681,2.681,0,0,0-1-3l1-3h-1q-1-3.5-2-7c-1.19-.618-1.492-1.686-2-2l-5-1-1-2c-2.173-1.39-4.635-2-7-3,0.982-3.071.352-2.061,0-6,3.541-.38,3.036-1.241,6-2,0.706-2.706,1.643-3.083,3-5h1v-4h1V308h1v-2h1q0.5-4.5,1-9l6-2v-1h4v-1h2v-1c2.436-.833,2.014,1.848,5,0l2-3c3.195-2.786,5.949-2.962,12-3,0.7-3.687,1.855-5.271,2-10-1.419-.652-5.41-2.837-6-4v-5h-1q-1-5.5-2-11c-2.652-.942-8.053.116-11-1v-1h-2q-0.5-1-1-2h-2l-3-4h-2v-1c-3.755-2.019-8.265-1.949-14-2q-0.5-1.5-1-3l-4,1v-4c-1.8-.945-1.575-1.385-4-2v-3h2q0.5-1.5,1-3h1v-3l3-1,2-3h3v-1l2-1v-2l3-2v-3h4q0.5,1.5,1,3a18.306,18.306,0,0,1,4,1v-1h2v-1c1.432-.364,9.427,2.391,11,3q0.5-2,1-4l3-1c0.1,3.761.9,4.59,2,7a6.749,6.749,0,0,0,4-5h-1v-4c3.851-2.24,3.142-3.039,10-3l2,3h1v2l3,2v2h1v8h1c0.764,2.594.135,4.693,1,7l10,1q0.5-1,1-2c4.332-2.041,2.416,1.581,6-3h1v-3h1c2.045-4.017.384-5.179,6-6q0.5,1,1,2h4v1l3,1v-1h6v1h4v1h5C271.793,226.475,272.705,229.672,273,231ZM179,409v5l-3,1v-1c-0.416-.579-1.634-0.147-1-2h1C176.723,409.238,176.279,409.763,179,409Zm4,15,3,1-1,2-2,1v-1h-1v-1Z" />
    </a>
    <?php
    $kdwil = '61.05';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Sintang_05" data-name="Kab Sintang 05" class="cls-5" d="M312,130a9.749,9.749,0,0,1,4,1v2c-0.493,1.1-2.874.43-2,4h1q0.5,2.5,1,5l-2,1v3h-1l-1,4c-3.2.825-2.9,1.179-3,5h1v3l2,1v1l14,3v3c1.1,0.117,7.379,1.109,10,0v-1c1.555-.869,2.42-0.81,5-1,1.239,1.974,2.3,2.438,5,3v4c2.717,1.81,1.643,3.413,6,4v-1l5-1v-1l2,1,1-2,10,1v-1h3v-1c3.611-1.044,6.875,1.131,9,2-0.077-4.185-.369-5.06,3-6v-1h3v2c3.118,1.683,3.8,2.643,6-1a3.978,3.978,0,0,1-2-2,13.3,13.3,0,0,0,4-3h2c0.923,0.426.924,3.206,5,2v-1l4-1v1h2l1,2,10,1v-1c2.581-3.334-2.152-3.763,3-7v-1l6-1c0.017,0.032,4,6,4,6h3v-1l10,1v1l2-1v1h1v2l3,2v1l5,1c2.443,1.543,2.078,5.917,2,10l2,1-1,2h1v1h-1v3c0.184,1.4.859,1.721,1,4-2.717,1.791-1.048,2.583-3,4v-1c-1.24-.68-0.712.556-1,1,1.759,1.381,2.605.443,1,2v1l-2-1,1,2h-2l1,2h-1v1l-2-1,1,2-8,2c-1.011.75-2.643,5.321-3,7h-2c1.139,1.139,0,.4,2,1,1.817,3.122,2.982,3.387,3,9-2.784-.549-0.1-0.77-3,0v1h1l-1,3h-3v-1h-1l1-2h-1v1l-4-3v2c-1.162,1.027-1.888.758-4,1v2l-8-1-1,2h-2v1h-3v1h-3l-1,2-2-1v1c-1.139,1.139-.4,0-1,2l-7-1q-1,2.5-2,5l-3-1-2,3h-4l-1,2-2-1,1,2h-5v1h-5v2h-4q0.5-7.5,1-15l-2-1v-6h-1v-6l-4-3c-1.27-2.671.457-13.5,1-15h-2v1h-2l-1,2h-2v1h-4v1h-2v1l-3,2v2l-3-1c-0.054.017,0.145,0.643-2,1l-1-3h-3v-1l-2,1v-2l-2-1v-1h-5v-1c-1.519-.888-2.433-0.865-5-1a10.477,10.477,0,0,1-4,4v-1c-1.719-1.127-1.355-.633-2-3l-6-1v-1h-2l-1-2c-1.265-.566-3.606-0.405-5-1v1l-2,1-1,3c-2.027,1.094-3.053-1.4-4-1l-2,3h-2v1h-1v-1a10.73,10.73,0,0,0-6,1c-0.879,2.872-1.365,3,0,6h-2l1,3c-1.279,2.32-5.263,2.073-9,2v2h-2l-2,3h-1v2l-3,1c-1.189,1.015-1.583,3.181-2,5l-9,1v-2l-3,1-1-3h-1l-1-3-2-1q-0.5-4.5-1-9c1.139-1.139.4,0,1-2h2c0.944-1.8,1.385-1.574,2-4,1.854-2.279-.84-6.617,1-10l4-2v-4q0.5-3,1-6h-1q-0.5-3.5-1-7c1.135-.844.145,0.127,1-1,3.515,0.915,2.853,2.433,7,3q0.5-2.5,1-5h3q-0.5-4-1-8a2.661,2.661,0,0,0,1-3h-1l-3-9h3v-1h1q-0.5-3-1-6h1v-3h1v-2h1c1.06-3.48-1.413-5.4-2-8h-6l-5-7-2-1v-2h-1l-1-2h-5c-3.78-3.082-7.92,2.051-13,0q-0.5-1-1-2l-5,1v-1c-1.246-1.142-.354-0.007-1-2h-1c-1.088-1.989.594-5.164,1-6h1a74.622,74.622,0,0,1-1-8h4l2-3h1V95c1.351-1.788,7.935-1.1,11-1,3.332-3.328,7-.541,12-2V91c3.226-1.013,9.11-1.223,12,0v1h2v1h4l1,2h3v1c0.164,0.019,4.774-1.948,8-2l1,3h1c1.09,2.084-1.234,2.891-1,4,0,0,.861.354,1,2,1.478,0.494,2.41,1.326,5,1a1.443,1.443,0,0,1,2-1v1c2.539,2.232.689,2.71,2,5l2,1,1,3,3,1v1c1.775,1.567,2.231,1.164,3,4-2.919,1.9-2.515,3.154-2,6h-1C312.8,126.984,312.363,126.825,312,130Z" />
    </a>
    <?php
    $kdwil = '61.06';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Kapuas_Hulu_06" data-name="Kab Kapuas Hulu 06" class="cls-6" d="M421,59v3h6V61l5-1v1c1.719,1.127,1.355.633,2,3l6,1V64h8v1h3v1l3,1v2a21.917,21.917,0,0,1,5,4l3-1V71h2V70l9,1q0.5,2.5,1,5h2v2c4.394-.223,4.5-1.23,7-3V74h4V73l6-2V65l9-3,2-3h2V58l5,1V58h9c1.082,1.707,2.129,2.124,4,3-0.574,2.01.12,0.865-1,2-1.139,1.139,0,.4-2,1,0.031,3.3-1.133,7.409-1,9a1.7,1.7,0,0,1,1,2h-1v2h-1q0.5,2,1,4l-2,1v2c-2.01-.574-0.865.12-2-1-2.8.621-2.724,1.891-3,2-1.792.711-1.475-.595-2-1h-1v1l-3-1v1h-1l-1,3h-1v3c-0.9,1.22-2.883.922-5,1v4h2c-0.224,3.672-.619,3.885-2,6h-1v5a6.749,6.749,0,0,1,4,5c-4.526,2.83-1.215,6.485-4,9h-2l-1,2h-1l1,2-3,2c-1.875,2.731-2.716,5.749-5,8-1.536,1.513-6.146,2.509-7,4v4l-2,1-1,2c-3.555,2.474-5.48.47-7,6-3.34.938-4.611,3.109-7,5v1h-2v1c-3.443,1.288-6.763-1.436-9-1v1h-3v1h-2v1l-7-1v-1c-4.593-1.163-4.239,2.791-7,1h-1v-3h-1l-2-3c-6.22,2.085-9.2,1.126-9,10h-8v-1l-4-1v-1c-3.925-1.225-4.51,1.845-5,2-3.335,1.058-3.21-1.714-4-2l-6,1a10.6,10.6,0,0,0-1,4c1.139,1.139.4,0,1,2l-3,1c-0.7-2.835-1.783-2.888-3-5-1.876.823-2.616,1.481-5,2v1h-1c-0.509,1.5,1.112,3.9,1,4h-2v-1l-7-1-1,2h-5v1c-1.327-.185-4.222-1.848-7-1v1h-4v1c-2.222.974-3.86,0.847-7,1l-1-3h-1v-4a11.638,11.638,0,0,1-7-4l-3,1v1h-2v1h-8l-1-4c-5.993.089-12.649-1.31-15-5h-1q-0.5-2.5-1-5c2.477-1.414,8.437-9.147,7-14h-1l-1-3h1c1.021-1.725,1.421-1.6,2-4-1.135-.844-0.145.127-1-1h-3c0.273-2.3.174-2.563,1-4h1v-5l3-2v-1h-1c-1.351-5.056-3.81-3.048-6-6v-2l-3-2v-3h-1l-1-3c-1.876.823-2.616,1.481-5,2a3.982,3.982,0,0,0-2-2l1-3a8.95,8.95,0,0,0,2-2h4V96c2.471-1.775,2.071-2.463,6-3,1.174,1.885.814,1,3,2v1l4-1,1,2c1.383,0.3-.4-0.781,1-1l6,1V96h1V92c3.457-.9,4.446-3.207,7-5V86h6V85c3.661-1.062,8.337-.008,11-1-1.184-3.522-.2-5.482,1-9V71l3-2V67h1c1.294-3.909-1.649-4.22-2-5V60a9.747,9.747,0,0,0,2-2h3V57h2V56h2l1-2,9-1V52h2l3-4c3.678-1.791,13.881,1.425,16,2l7-1v1l3-1,1,2h5c1.049-2.4,1.119-3.212,4-4,2.325,2.466,1.675,1.383,4,1,0.312,0.124.116,1.435,3,1a1.675,1.675,0,0,1,2-1v1h3a9.1,9.1,0,0,0,2,2l-2,3h-1c-1.881,3.061,1.8,2.615-3,4C421.861,59.139,423,58.4,421,59Z" />
    </a>
    <?php
    $kdwil = '61.07';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Bengkayang_07" data-name="Kab Bengkayang 07" class="cls-7" d="M152,57h3v4h4v1l4-1v1c3.586,0.936,3.156,2.61,3,7h1v3c3.835,0.315,5.244,1.713,8,3-0.644,2.739-1.309,2.276-2,5,3.239-1.163,2.524-.627,6,0l1,3c-4.111,1.048-1.2,1.31-3,3h-1V85c-1.252-.658-0.671.541-1,1,1.139,1.139.4,0,1,2,2.762,0.723,2.237.279,3,3h1l-1,2h1V92c0.859-1.889,1,2,1,2h-1c-1.127,1.719-.633,1.355-3,2V94c-1.426.51-1.627,1.236-4,1V94h-1v1h-7c-0.607-2.393-.318-1.859-2-3v1h1c0.271,1.388-.678-0.377-1,1v3h-1c-0.2.948,2.09,2.835,1,5h-1c-1.3,1.759-8.8,6.017-6,8h-4v1l-2-1v1h-5v-1h-1v1c-1.84,1.613-2.5,5.141-3,8l-5,1v1h-8c-0.437-1.7-.842-4.154-2-2h-1c-1.089-1.588.97-1.249-1-3v2c-2,.057-0.893-1.666-2,0-1.139,1.139-.4,0-1,2h-4c0.549-2.784.77-.1,0-3l-2,1v-1h-1q-0.5,1-1,2l-3,1v1l-4-1v1l-2-1v1h-1v1l-2-1q0.5,1,1,2H97a9.744,9.744,0,0,1-1,4l-2-1v1H93v1h1l-1,2c-3.357,1.206-5.958,1.205-7,5H83v2c-2.835-.7-2.888-1.783-5-3,0.945-2.624.571-6.982-1-10H76v-2l-2-1,1-4H74v-2H73l-2-3a15.684,15.684,0,0,1,6-1c2.055,3.037,1.85.427,4,2v1c1.139,1.139.4,0,1,2l5,1v-1h1v-5h1c2.262-2.885.972-.5,4-2v-1h2c2.09-1.409,3.384-4.986,4-8h3V98h2c1.525-6.4,9.148-5.288,17-5,1.165,1.361,1.824,1.528,4,2l3-9h1V85h-1l1-3c2.612-1.382,1.693-1.769,6-2,0.349-1.927,1-2,1-2V72h1V70h1q-0.5-2-1-4h-2c1.577-8.543,3.756-4.354,9-8,2.541-1.767,1.68-3.89,6-5v1C151.719,55.127,151.355,54.633,152,57Zm-46,61c1.139,1.139,0,.4,2,1C106.861,117.861,108,118.6,106,118Z" />
    </a>
    <?php
    $kdwil = '61.08';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Landak_08" data-name="Kab Landak 08" class="cls-8" d="M162,93l3,1v1l2-1v1h7V94l3,1V94h1l1,2,3-1v2h4a12.709,12.709,0,0,1,1,5c-1.139,1.139-.4,0-1,2h2c0.7,2.835,1.783,2.888,3,5h-2v1c-1.478.788-2-1-2-1l-2,1a12.692,12.692,0,0,0-1,5h2q-0.5,1.5-1,3c3.315,0.851,2.9,2.263,5,4-0.885,2.348-.581.668,0,3h-1q-0.5,1.5-1,3h-1c-0.449,1.441,1.677,1.4,2,2,0.669,1.246-.694.421-1,1-0.886,1.676,1.363.845,2,1v3h-1v1h-3c-0.337,5.065-1.524,4.51-4,7v1h1c0.954,1.517,1.954,1.694,3,3-1.139,1.139-.4,0-1,2h-3v1h-1q-0.5,3.5-1,7h2q-0.5,1-1,2c1.274,0.614.347,0.57-1,1v3h-7q-1,2-2,4h-7v1h-1v1h1c1.889,0.86-2,1-2,1q-0.5,1.5-1,3l-5,1v-1h-1v1h-3v1h-1v-1h-5v2c-5.98-2.153-4.1.538-8,2h-5v3c-4.082,1.157-1.064.91-3,3h-1v-1h-1q0.5-3,1-6l-2-1q0.5-3.5,1-7h-1v-2h-1a1.517,1.517,0,0,1,1-2q-0.5-1-1-2h1c0.521-1.315-.409-0.462-1-1-0.193-.267-2.97-4.162-3-1h-1v-2c-5.6.549-9.095,1.142-15-1h-4v-1c-1.139-1.139-.4,0-1-2l3-1v-1h2v-1h1v1l3-1a12.71,12.71,0,0,0,1-5l-8-6v-2h1c0.642-1.128.055-2-1-2v-1h2c0.7-2.835,1.783-2.888,3-5h-1c-0.221-1.988,1.568-.759,0-2-3.027-4.1-3.7-.421-5-1v-1a22.8,22.8,0,0,1-5-4c2.279-.256,2.6-0.14,4-1v-1h3v-1c1.416-.872,1.73-0.686,4-1-0.549,2.784-.77.1,0,3a13.326,13.326,0,0,0,5-5c2.352,1.079,3.249,2.293,6,3v-2h1v1c1.7-.2,1.531-1.794,2-2h2c1.948,3.3,4.372,3.675,7,4v-1h1v1h2v-2l2,1v-2h1v1c2.389,0.151,2.547-.463,4-1q-0.5-1-1-2h1c0.629-2.282.527-5.559,0-6h3v-1c0.95-1.843,1,2,1,2l9-1c0.658-1.284,1.288-1.085,2-2v-1h-1c0.581-1.405,1.323-1.057,2-2v-2l2,1v-2c1.412-.085.006-0.006,1,1,1.74-1.149,1.3-.645,2-3h-1V99h1Q162.5,96,162,93Z" />
    </a>
    <?php
    $kdwil = '61.09';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Sekadau_09" data-name="Kab Sekadau 09" class="cls-9" d="M258,119h3c1.212,2.128,2.252,2.177,3,5,3.861,0.947,4.108,3.687,7,6v1h2v1l3-1,1,3h1c0.99,1.385.926,2.52,1,5a9.637,9.637,0,0,0-3,9h1v1h-1v2h-4v1c3.876,3.792,3.866,11.546,5,18-3.091,1.326-3.851,1.5-4,6-3.748-.8-3.9-2.445-8-3,0.131,8.881,1.568,10.317,0,19l-3,1v4h-1q0.5,2.5,1,5h-1v2h-1c-1.768,2.3-5.7,5.6-4,11h1q0.5,2.5,1,5h1a8.36,8.36,0,0,1,2,4c-7.959.117-10.295-2.669-16-4-0.547,1.133-1.813,1.661-2,2v3l-2,1v3l-2,1c-2.391,2.516-.956,2.791-6,3-2.74,2.84-5.633,1.316-10,1v-6h-1v-2h-1v-8h-1v-2l-3-2v-3h-1q0.5-4,1-8c4.036-1.7,6.013-3.018,6-9l5,1v1l4-1c-0.322-2.295-.187-2.54-1-4h-1v-7l3-2v-6h1v-1c3.249-1.08,6.07-.223,8-3,1.957-1.892,2.047-5.046,2-9l4-1q0.5-3.5,1-7l2-1c2.14-5.332-4.135-7.218-2-13h1v-2l2-1v-2l2-1q0.5-6,1-12h1A9.5,9.5,0,0,0,258,119Z" />
    </a>
    <?php
    $kdwil = '61.10';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Melawi_10" data-name="Kab Melawi 10" class="cls-10" d="M349,207a2.375,2.375,0,0,0,2-1h1v1c1.8,0.285,5.138-2.133,6-3l1-3,3,1v-1h4v-1a8.8,8.8,0,0,1,4-2v12a1.467,1.467,0,0,0-1,2l5,4q-0.5,2.5-1,5l2,1c0.931,2.232-.779,3.874-1,5l3,2v3h1v1h-1v1h1v1h-2c-1.109,1.695,1.561.763,2,1l-1,3h-2v-1c-1.548-.413-2.214,2.541-3,3h-2v1l-4-1v1c-1.866.72-.7,1.262-2,0-2.13-1.852-2.244-4.712-4-7-0.592-.772-2.012-0.755-3-2-2.01.574-.865-0.12-2,1-3.132,1.855-4.426,4.33-3,8h-1v1h-3c-1.741-1.8-4.395-2-8-2q0.5,4,1,8l-8,1-1-3h-1v4h-1c-0.021.6,0.888,1.85,1,4l-3-1v1h-1v2l-2,1v1h-7v1h-1v-1h-1l-2,3h-2v1h-2v1c-1.366.9-1.749,0.736-4,1a7.173,7.173,0,0,0,1,4h-1c-0.743,1.281-1.428,1.24-2,2v2l-2-1c-1.085,1.336-.848,2.567-1,5h1c1.376,2.653-1.845,2.734,0,6h-1c-2.209,2.241-8.381,3.013-13,3-0.871,3.428-2.068,2.575-3,6l-3,1c-0.287-1.748-.96-6.1-3-6a1.752,1.752,0,0,1-2,1s-0.16-.738-2-1a21.314,21.314,0,0,1,1-4h-1l-1-2h1l-1-2h2v-1h-1l2-4c-4.3-2.175-.674-3.546-6-5v-2a10.6,10.6,0,0,1-4,1c-0.388-2.161-.973-1.915-1-2l1-3h-2c-1.527-1.835-.184-1.4,0-4h1v1c0.75,1.762,1-4,1-4h1v-1c0.871,0.308,2.214,1.912,4,1v-1c0.922-1.253.674-4.626,0-6h2v-1h-1c-0.094-2.234,1-2,1-2,0.313-1.11-1-2-1-2v-1h2v-3h-2v-1h1v-1h-1v-1h1v-1h-1v-1h2c1.241-1.119,1.464-2.017,2-4h-1c-1.139,1.139,0,.4-2,1-0.262-3.176-1.01-3.822-2-6l3-2-1-2h2l1-2h2c2.545-2.021-.1-3.6,5-5l1-4h1v1h1v-1c2.956-.417,2.223.5,3,1h2v-1l3-10h7l1-2h2v-1h1v1c3.893,0.287,4.76-2.763,6-5l2,1c0.462-.272.226-1.748,2-1l1,2h2v1c1.319,0.511-.36-0.711,1-1,1.383-.294-0.347.57,1,1l2-1v2l2-1v2h1l1,3,2-1c0.379,0.352-.227,1.7,1,1v-1c1.9-1.369,2.308-2.288,5-3,1.22,1.991,1.625,3.051,5,3v-1h1l2,3h2v1l3-1v2C349.139,206.139,348.4,205,349,207Zm-81,50v2h1C268.426,256.99,269.12,258.135,268,257Z" />
    </a>
    <?php
    $kdwil = '61.11';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Kayong_Utara_11" data-name="Kab Kayong Utara 11" class="cls-11" d="M164,246c7.274-.138,12.757.157,17,3l3,4h2q0.5,1,1,2l13,2c0.025,7.322,2.723,11.761,4,18l4,1,1,3h-1q-0.5,3-1,6c-6.413-.1-9.683,1.113-13,4l-2,3h-5a119.181,119.181,0,0,0-12,5c-0.854-3.835-2.379-5.041-5-7v-1c-3.737-2.067-3.2,2.545-5-3-1.139-1.139-.4,0-1-2h-2c0.6-2.729,3.3-5.849,2-7-1.777-1.915-1.786-.893-4-2v-1c-1.928-.875-5.994-0.418-7-2v-2c-4.776-1.481-.89-1.173-3-4h-1v-1h-2v-6h2c0.979-3.374,1.212-1.913,3-4h1v-2l7-1v-1c1.139-1.139.4,0,1-2C163.762,248.277,163.237,248.721,164,246Zm-39,19,6,1v1h1v-1l6-1v1c0.89,0.51,3.659,2.356,5,2l1-2h3l1,3c1.106,1.219,1.839,7.882,2,10l-6,2-2,3h-2v1h-2v1h-3v1l-4,1-1,2h-2v1c-1.477.993-2.476,0.8-5,1-2.247-2.5-3.836-.96-5-5,3.05-2.043,4.268-7.865,5-12v-7C123.2,267.538,124.315,267.838,125,265Zm-21,18h3v1c-1.139,1.139-.4,0-1,2h-2v-3ZM68,316v-2c4.424-.737,3.785-0.443,7,0l1-2h1v1c3.394,0.76,4.622,2.141,5,6-3.768,1.75-5.409,3.712-11,4-0.844-1.135.127-.145-1-1l1-5H70C68.861,315.861,70,316.6,68,316Zm-2,9v2l-7,1v-2A34.641,34.641,0,0,1,66,325Z" />
    </a>
    <?php
    $kdwil = '61.12';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kab_Kubu_Raya_12" data-name="Kab Kubu Raya 12" class="cls-12" d="M127,184l6-1q1-2,2-4l3,1v-2h3v-2l16-2v5h-2a22.315,22.315,0,0,0,3,10l3,2c1.873,3.035-1.812,2.641,3,4v7h1q0.5,2,1,4l-3,2q0.5,1.5,1,3h-1c-0.763,1.589-.84,2.392-1,5l3,1v3h1c0.8,1.82,1.257.779,0,2l-4,5h-2c-1.284,1.085-.041,2.428-1,4l-2,1c-2.008,2.192-3.486,3.171-4,7l5-1v1h1v4h1v1l4-1q-0.5,2.5-1,5c-2.762.723-2.237,0.279-3,3l-7,1v1c-1.139,1.139-.4,0-1,2-2.444.574-2.206,1.047-4,2v-3h-2v-2a12.71,12.71,0,0,0-5-1v-2h-2q-0.5-1.5-1-3h1c-1.139-1.139,0-.4-2-1v-4h3v1h-1l2,3c1.135-.844.145,0.127,1-1a3.982,3.982,0,0,0,2-2c-1.975-1.129-2.338-1.417-3-4l-6,2v-1h-1v-1h1q-0.5-1-1-2l-7-1v-1h-6v1l-3-1q-0.5-1.5-1-3h-4v-1h-1v1l-7,1q-0.5-1.5-1-3l-4-1v2c-2.613-.624-2.846-1.06-4-3-1.264-1.176-2.643-4.962-2-8,0.293-1.384,1.423.349,1-1H94c-0.451-2.2.663-2.989-1-4v-1h1v-1l4,1v-1l-4-2v-3H93c0.574-2.444,1.047-2.206,2-4H93c-1.139,1.139,0,.4-2,1v2c-1.139-1.139-.4,0-1-2H89v-3c1.994-.735,5.583-1.54,7-3H92v-1h1v-1h3v-1h1c-1.2-3.039-1.146-3.974,0-7,1.135,0.844.145-.127,1,1h1l1,6h1q-0.5-4-1-8H99v-2H98l1-6,9,2v5c1.892,1.133,4.481,4.686,6,3,2.934-1.661,3.1-3.241,3-8-2.765-3.042-.769-11.055-2-16-0.342-1.372-1.161.405-1-1h1v-2c2.523-1.339,3.5-1.99,8-2,1.139,1.139,0,.4,2,1q1,6,2,12h-1v1h1v3h1Q127.5,180.5,127,184ZM95,195H93v-3h1v1C95.139,194.139,94.4,193,95,195Zm2,1a14.821,14.821,0,0,1-1,6l6-1,2,3h2v1l3,1-2-3h-2q-0.5-1-1-2Zm23,40v2h-1v-1c-1.7.2-1.531,1.794-2,2h-2v-5h1C117.165,235.361,117.824,235.528,120,236Zm13,1v3h-2v6c1.135,0.844.145-.127,1,1,2.739-.644,2.276-1.309,5-2v1h-1c-1.889.86,2,1,2,1q-0.5,1.5-1,3c3.561,0.356,5.161,1.779,8,3v3h2v2h-2v6c-2.078,1.094-1.771,1.611-5,2-1.371-2.276-3.233-1.83-4-3-2.125-3.241,1.673-4.371-4-6-2.39-2.5-4.3-.876-8-2v-1h-2v-1c-1.352-.415-0.079.358-1,1-2.9,3.436,1.544,5.128-5,6v-1l-6-1-5-7V239c4.072,0.459,4.078,1.985,7,3h7v1h2q0.5,1,1,2h2v1l3-1v-2c-2.01-.574-0.865.12-2-1h1c0.771-1.016,1.229-.984,2-2-2.328-1.02-3.75-1.879-5-4a10.6,10.6,0,0,1,4-1v1Zm-10,3h2v2h-2v-2Z" />
    </a>
    <?php
    $kdwil = '61.71';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kota_Pontianak_71" data-name="Kota Pontianak 71" class="cls-13" d="M110,179l6,1v3c-3.541-.38-3.036-1.241-6-2v-2Zm-1,3h3c1.146,1.938,2.676,2.381,4,4a7.742,7.742,0,0,0-2,3h-2C109.677,185.231,107.658,186.726,109,182Z" />
    </a>
    <?php
    $kdwil = '61.72';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Kota_Singkawang_72" data-name="Kota Singkawang 72" class="cls-14" d="M88,110a29.367,29.367,0,0,1-1,7l-5-1c-1.47-4.779-.808-1.135-4-3l-1-2c-2.043-1.4-1.391.428-3-2,2.412-1.018,5.65-1.967,7-4v-2h1c1.769-3.96-2.326-3.293,3-5V97c1.9-1.169,4.144.88,5,1V97h3V96h2V95c1.275-.612.548,0.524,1,1a8.281,8.281,0,0,1,3,5H98v4C94.736,106.741,92.215,109.069,88,110Z" />
    </a>
  </svg>


  <div class="row">
    <div class="col">

    </div>
    <div class="col">
      Sumber : <?= $sumber; ?>
    </div>
    <div class="col">

    </div>
  </div>
  <?php legend_kab($kd_indi); ?>

  <input type="text" id="tahun" value="<?= $tahun; ?>" hidden ?>

  <script>
    function edit_user(id) {
      $('#isi_edituser').load('view_peta_prov.php?id=' + id);
    }
  </script>
  <script>
    function edit_user_p(id) {
      $('#isi4').load('view_kab.php?id=' + id);
    }
  </script>
  <script>
    $(document).ready(function() {
      $("#kiri_peta").on('click', function() {
        var provinsi = $("#provinsi").val();
        var tahun = $("#tahun").val();
        var indikator = $("#indikator").val();
        $(".loader").show();
        $.ajax({
          type: "POST",
          dataType: "html",
          url: "ambil_kalbar_kiri.php",
          data: {
            indikator: indikator,
            provinsi: provinsi,
            tahun: tahun
          },
          success: function(msg) {
            $("#isi").html(msg);
            $(".loader").hide();
            $("#isi").show();
          }
        });
      });
    });
  </script>
  <script>
    $(document).ready(function() {
      $("#kiri_peta").on('click', function() {
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
            $("#isi2").show();
          }
        });
      });
    });
  </script>

  <script>
    $(document).ready(function() {
      $('.hover').popover({
        title: fetchData,
        html: true,
        placement: 'right',
        trigger: 'hover'
      });


      function fetchData() {
        $(".loader").show();
        var ambil_data = '';
        var element = $(this);
        var id = element.attr("id");

        $.ajax({
          url: "ambil_data.php",
          method: "POST",
          async: false,
          data: {
            id: id
          },
          success: function(data) {
            ambil_data = data;
            $(".loader").hide();
          }
        });
        return ambil_data;

      }
    });
  </script>