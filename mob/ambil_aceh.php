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
  <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="65%" height="65%" viewBox="0 0 1043 657">
    <defs>
      <style>
        .cls-1 {
          fill: #fff;
        }

        .cls-2 {

          filter: url(#filter);
        }

        a:hover .cls-2 {
          fill: #d5d5d5f3;
        }

        .cls-10,
        .cls-11,
        .cls-12,
        .cls-13,
        .cls-14,
        .cls-15,
        .cls-16,
        .cls-17,
        .cls-18,
        .cls-19,
        .cls-2,
        .cls-20,
        .cls-21,
        .cls-22,
        .cls-23,
        .cls-24,
        .cls-3,
        .cls-4,
        .cls-5,
        .cls-6,
        .cls-7,
        .cls-8,
        .cls-9 {
          fill-rule: evenodd;
        }

        .cls-3 {

          filter: url(#filter-2);
        }

        a:hover .cls-3 {
          fill: #d5d5d5f3;
        }

        .cls-4 {

          filter: url(#filter-3);
        }

        a:hover .cls-4 {
          fill: #d5d5d5f3;
        }

        .cls-5 {

          filter: url(#filter-4);
        }

        a:hover .cls-5 {
          fill: #d5d5d5f3;
        }

        .cls-6 {

          filter: url(#filter-5);
        }

        a:hover .cls-6 {
          fill: #d5d5d5f3;
        }

        .cls-7 {

          filter: url(#filter-6);
        }

        a:hover .cls-7 {
          fill: #d5d5d5f3;
        }

        .cls-8 {

          filter: url(#filter-7);
        }

        a:hover .cls-8 {
          fill: #d5d5d5f3;
        }

        .cls-9 {

          filter: url(#filter-8);
        }

        a:hover .cls-9 {
          fill: #d5d5d5f3;
        }

        .cls-10 {

          filter: url(#filter-9);
        }

        a:hover .cls-10 {
          fill: #d5d5d5f3;
        }

        .cls-11 {

          filter: url(#filter-10);
        }

        a:hover .cls-11 {
          fill: #d5d5d5f3;
        }

        .cls-12 {

          filter: url(#filter-11);
        }

        a:hover .cls-12 {
          fill: #d5d5d5f3;
        }

        .cls-13 {

          filter: url(#filter-12);
        }

        a:hover .cls-13 {
          fill: #d5d5d5f3;
        }

        .cls-14 {

          filter: url(#filter-13);
        }

        a:hover .cls-14 {
          fill: #d5d5d5f3;
        }

        .cls-15 {

          filter: url(#filter-14);
        }

        a:hover .cls-15 {
          fill: #d5d5d5f3;
        }

        .cls-16 {

          filter: url(#filter-15);
        }

        a:hover .cls-16 {
          fill: #d5d5d5f3;
        }

        .cls-17 {

          filter: url(#filter-16);
        }

        a:hover .cls-17 {
          fill: #d5d5d5f3;
        }

        .cls-18 {

          filter: url(#filter-17);
        }

        a:hover .cls-18 {
          fill: #d5d5d5f3;
        }

        .cls-19 {

          filter: url(#filter-18);
        }

        a:hover .cls-19 {
          fill: #d5d5d5f3;
        }

        .cls-20 {

          filter: url(#filter-19);
        }

        a:hover .cls-20 {
          fill: #d5d5d5f3;
        }

        .cls-21 {

          filter: url(#filter-20);
        }

        a:hover .cls-21 {
          fill: #d5d5d5f3;
        }

        .cls-22 {

          filter: url(#filter-21);
        }

        a:hover .cls-22 {
          fill: #d5d5d5f3;
        }

        .cls-23 {

          filter: url(#filter-22);
        }

        a:hover .cls-23 {
          fill: #d5d5d5f3;
        }

        .cls-24 {

          filter: url(#filter-23);
        }

        a:hover .cls-24 {
          fill: #d5d5d5f3;
        }
      </style>
      <filter id="filter" x="551" y="363" width="163" height="222" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-2" x="595" y="361" width="138" height="141" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-3" x="601" y="124" width="130" height="184" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-4" x="444" y="170" width="185" height="135" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-5" x="383" y="196" width="108" height="119" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-6" x="250" y="45" width="138" height="121" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-7" x="359" y="74" width="124" height="155" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-8" x="527" y="122" width="125" height="95" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-9" x="354" y="491" width="168" height="148" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-10" x="574" y="541" width="185" height="104" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-11" x="454" y="120" width="103" height="71" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-12" x="495" y="307" width="100" height="91" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-13" x="517" y="276" width="200" height="107" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-14" x="292" y="123" width="129" height="150" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-15" x="433" y="224" width="107" height="151" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-16" x="673" y="238" width="101" height="111" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-17" x="506" y="167" width="116" height="74" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-18" x="406" y="117" width="65" height="71" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-19" x="289" y="68" width="24" height="24" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-20" x="279" y="21" width="36" height="31" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-21" x="565" y="126" width="34" height="36" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-22" x="700" y="236" width="38" height="32" filterUnits="userSpaceOnUse">
        <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
        <feComposite result="composite" />
        <feComposite result="composite-2" />
        <feComposite result="composite-3" />
        <feFlood result="flood" flood-color="#fff" />
        <feComposite result="composite-4" operator="in" in2="composite-3" />
        <feBlend result="blend" in2="SourceGraphic" />
        <feBlend result="blend-2" in="SourceGraphic" />
      </filter>
      <filter id="filter-23" x="682" y="478" width="64" height="90" filterUnits="userSpaceOnUse">
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
    <rect id="Color_Fill_24" data-name="Color Fill 24" class="cls-1" width="1043" height="657" />

    <?php
    $kdwil = '11.01';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>

      id="Color_Fill_23" data-name="Color Fill 23" class="cls-2" d="M588,368h3c2,3.4,7.737,8.821,11,11l8,4v3h1c0.621,1.483.508,2.778,1,4,2.3-1.038,4.533-1.775,7-3v-1h3l2-3h1v1c2.128,1.212,2.177,2.252,5,3v-1h2v-1c1.317-.931,1.777-0.759,4-1a11.6,11.6,0,0,0,2,2q0.5,4,1,8l2,1c0.432,1.972-.537,1.293-1,2v1h-3l-2,3h-1v2l-2,1a22.887,22.887,0,0,0-4,10c5.126,3.09,6.165,8.524,9,14h1v2h1v18h1v2h1v2l3,2,4,5h2q0.5,1,1,2h2l3,4h2l5,6q0.5,2.5,1,5h1v2h1a2.528,2.528,0,0,1-1,3v10l3,1c1.4,1.265,13.869,3.862,17,4q0.5-1.5,1-3h1v-3l4-1q0.5,1,1,2h1v-1c1.139-1.139.4,0,1-2,2.7,0.029,11.828,1.883,13,3h1v7l-3,2v1h-2v1h-2c-2.264,1.916-.3,4.279,0,6h-1c-2.862,4.568-4.515,3.549-9,6v1h-2v1l-3,1,3,9h1v3h1v2h1v3h1v2h1q-0.5,1.5-1,3h1v2h1c0.713,2.624-2.338,6.354-3,8v3h-1v3h-1v8h-1v2l-3,2v2c-3.354,4.95-8.355,9.334-16,10v-1h-1v-7h-1V559c0-9.632.2-18.853-2-26v-6h-1v-4h-1v-4h-1v-4h-1q-0.5-3.5-1-7h-1v-2l-2-1c-0.485-.979,1.073-0.213,0-3h-1v1c-1.391.253,0.387-.723-1-1l-8,1v-2h-2q-0.5-1.5-1-3h-1v1c-1.507.389-1.346-1.726-2-2h-7v-1l-4-1-6-7-4-3v-2l-2-1q0.5-1,1-2c-0.9-.983-1.993-0.735-3-2-0.881-1.106-.444.3-1-1h1q-0.5-1.5-1-3h-1v-3h-2v-2h2v-2c-1.313-.689-1.061-1.2-2-2l-2,1v-3h-1q-0.5-3.5-1-7h-1q-0.5-2-1-4h-1v-2h-1q-0.5-1-1-2h-4v-1h-1q0.5-1,1-2h-1v1l-3-2v-1l-5,1q0.5-1,1-2h-2c-0.684-3.409-2.228-4.613-3-8l-3-1c-0.149-3.594-.553-4.012-2-6h-1q0.5-1,1-2h-2q-0.5-1-1-2h-1q0.5-1,1-2h-2q0.5-1,1-2l-2-1q-1-3.5-2-7h-2c-0.51-2.313-.889-2.443-2-4h-1q0.5-1,1-2l-4-3c-1.63-1.9.368-2.531,0-3-1.136-1.447-6.02-2.887-9-3q-0.5-2-1-4c3.341-2.253,2.7-5.329,8-6,1.593,1.9,3.738,2.7,7,3q0.5-1.5,1-3h2l7-6,3-4,3-1v-5C587.027,369.914,587.614,370.165,588,368Z" />
    </a>

    <?php
    $kdwil = '11.02';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>
    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_22" data-name="Color Fill 22" class="cls-3" d="M695,378c2.762,0.723,2.237.279,3,3,2.5,2.31.69,2.424,2,5l2,1a1.445,1.445,0,0,1-1,2v1h1v4h1c1.5,1.709,3.785,2.1,6,3,0.281,5.257,1.616,3.71,2,9l4,1c-0.4,2.983-3.29,6.848-2,10l2,1v5h1c2.312,2.493,2.316.707,5,2,2.571,1.238,5.225,4.865,6,8h-1v4c-3.8,2.117-4.559,3.946-11,4v3h-5v-1l-7,1v2h7c1.15,4.625,3.6,4.677,4,11-1.139,1.139-.4,0-1,2a7.537,7.537,0,0,1,6,6h1v6a6.719,6.719,0,0,0-3,3c-1.082-.573-2.1-2.7-4-2v1h-1v3c1.328,1.417,1.921,6.228,2,9l-6-1q-0.5-1-1-2c-1.942-.786-5.8.563-7,1v1h-1v-1l-4,1a12.71,12.71,0,0,0-1,5l-5-1-2,3h-1v3c-1,1.317-3.674.992-6,1-2-1.862-9.739-2.435-13-3q-0.5-1.5-1-3h-1v-7c0.314-.833,2.553-0.066,2-3h-1l-4-11-3-2v-1h-2l-3-4h-2q-0.5-1-1-2h-2v-1h-2q-0.5-1.5-1-3l-5-4c-0.712-1.1-2.835-12.721-2-16h1v-4h-1q-1-3-2-6h-1v-2h-1q-0.5-2-1-4l-2-1c-1.879-2.244-2.733-4.076-3-8,2.178-1.786,6.224-7.916,7-11h4c0.944-1.8,1.385-1.574,2-4-2.571-1.606-2.942-3.115-4-6v-4h-1c-0.771-1.016-1.229-.984-2-2-3.515.915-2.853,2.433-7,3-1.286-2.269-1.628-2.637-5-3-1.632,2.515-7.552,5.28-11,6q-1-3.5-2-7h-1v-1h-3q-0.5-1-1-2h-2v-1l-3-1v-2c1.983-.063,3.392-1.055,4-1v1l4,1v1h4a2.6,2.6,0,0,0,3,1v-1h8v-1h6v-1h6v-1h6v-1l6,1v-1h3v-1h7v-1h6v-1h2v-1h11c5.332-1.548,10.028-2.9,17-3v1h1C690.242,373.937,693.411,371.5,695,378Z" />
    </a>

    <?php
    $kdwil = '11.03';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_21" data-name="Color Fill 21" class="cls-4" d="M642,129h3v1l2-1v1h1v2l2-1v1h1c0.895,1.824-.688,3.1-1,4h3a16.547,16.547,0,0,0,7,10v1c1.3,0.559.292-.545,1-1h1v1h3v1a8.515,8.515,0,0,0,4,2c-0.488,4.336-1.423,2.641-2,7h1v1l2-1,7,9,2-1,3,5h1v1l2-1v1l2,1v2l2,1,4,5c1.4,0.172.267,0.08,1-1,1.183,0.847,1.016,2.058,2,3l2-1q0.5,1.5,1,3l2-1v1h2v1h5v1h1v1h-1c-1.889.86,2,1,2,1,0.184,3.244,3.576,9.967,2,11h2q0.5,3,1,6h1q-0.5,1-1,2h1v2h1v1h-1v1h1v3h1v2h1c0.83,3.008-3.088,2.078-2,5h1q0.5,1,1,2h2v1h1q-0.5,1-1,2l4,3a19.486,19.486,0,0,1-2,2q0.5,1,1,2h-2q-0.5,1-1,2c-3.571,3.609-2.515,1.107-2,7-1.783-.12-3.563-1.039-4-1v1h-3v-1h-1v1a9.11,9.11,0,0,0-5,6h-1q-0.5,3.5-1,7l4,1v-1h1l2,3,7-1c0.738,3.217,1.357,3.641,5,4-1.561,5.916-8.48,5.26-16,5v1c-2.494.987-5-4.033-7-2l-6,4q-0.5,1-1,2c-3.183,1.826-4.452-.748-7,3h-1q0.5,1.5,1,3l-3,2q-0.5,2.5-1,5h-1q-0.5,1.5-1,3l-10,1v1a8.618,8.618,0,0,1-4,2c-0.945-1.8-1.385-1.574-2-4l-5-1-4,10h-4v-1l-5,1c-0.811,4.634-2.34,5.195-8,5v-1l-5-1v-1h-3v-1l-4-1q-0.5-1-1-2c-2.573-1.848-1.844,1.082-3-3h-1q0.5-10.5,1-21l2-1q-0.5-5-1-10l-3-2c-1.63-3.474,1.17-8.466-1-11v-1h-6v1h-4q0.5-1.5,1-3c3.541-.38,3.036-1.241,6-2,0.093-3.535-.408-9.33-2-11-0.8-3.506-1.772-3.9-6-4-1.139,1.139,0,.4-2,1v-5h8v-1h1c0.054-2.579.172-3.484,1-5h1v-5h-1c-0.457-2.154,2.068-6.532,3-7h3v1h4q0.5,1,1,2h5v-2h-3v-2l5-1v-4l3-1v-3h4c1.245-3.257,2.139-5.357,5-7-1.139-1.139,0-.4-2-1-1.146-4.293-3.293-2.924-4-8,1.135-.844.145,0.127,1-1h3q0.5-6.5,1-13h1q-0.5-2-1-4l2-1v-2l-3-1q-0.5-1-1-2l-2,1v-1c-1.139-1.139-.4,0-1-2-2.01-.574-0.865.12-2-1a13.765,13.765,0,0,0,3-4,3.978,3.978,0,0,1-2-2c3.686-.326,4.21-0.818,5-4h-1q0.5-2.5,1-5C643.737,134.818,642.329,132.706,642,129Z" />
    </a>

    <?php
    $kdwil = '11.04';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>

      id="Color_Fill_20" data-name="Color Fill 20" class="cls-5" d="M513,176c0.571,2.8,2.321,4.784,3,7,0.985,3.215-1.4,4.748-1,7h1v5l2,1c2.121,5.219-3.742,8.708-3,11h1v1h4q0.5,1.5,1,3l3,1q0.5,1,1,2h1v-1c6.313-.3,6.973,2.171,8,7l3-1q0.5,1,1,2h6v1h7v1h1v-1h1v1h5v1h2v1h3q0.5,1,1,2h2q0.5,1,1,2h4q0.5,1,1,2h2v1h4v1h2v1h5v1l23-1v-1l5-2v1c1.438,1.425,2.546,5.583,3,8l-3,1v1c-3.369,1.841-3.631-1.408-5,4l5,1v-1l5-1v1c1.856,2.128-.052,5.726,1,9h1q0.5,2.5,1,5l2,1v8l-2,1v11h1q-0.5,2.5-1,5h-1q0.5,3.5,1,7c-4.935,2.186-9.488,5.547-16,6q-0.5-1.5-1-3l-2-1q-1-3-2-6l-8-6v-1h-3l-2,3h-2v1h-3q-0.5,1-1,2l-3,1v1l-11,3v1l-4,1v1h-3v1c-0.558.048-2.084-.911-4-1v-1h-3v-1a13.263,13.263,0,0,0-6-3v-2c-3.626-1.647-6.271-4.422-9-7q-0.5-1-1-2h-2v-1l-3-2-3-4-4-1v-1l-3,1v-2l-3,1q-0.5-1-1-2h-3v-1c-2.025-.841-4.15-0.63-5,0v-2c-1.218-1.491-6.439-6.029-8-4v-2c-2.01-.574-0.865.12-2-1,2.014-1.766,2.733-6.574,3-10h-2v-1h1v-1h-1v-4h-1a1.64,1.64,0,0,1,1-2l-2-6-3-2v-1h-2v-1l-9-3-1-2s-5.224.968-7,1v-2l-6-5v-1l-4-1v-1c-4.184-1.543-10.255.878-14-1-4.335-2.174-4.019-1.577-4-8h1v-4h1v-1c5.317,0.919,6.539.467,12,0l4-11,2-1,2-3h2c1.832-1.343,3.363-4.3,4-7h2l1,3,6,2v-1l4-3v-2l2-1v-1C496.443,175.4,505.972,175.963,513,176Zm30,49q-0.5,2.5-1,5c1.135,0.844.145-.127,1,1h6v1h2v1h6q0.5,1,1,2h5q0.5-1.5,1-3l-6-5Z" />
    </a>

    <?php
    $kdwil = '11.05';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_19" data-name="Color Fill 19" class="cls-6" d="M451,201c-0.7,2.914-1.732,2.393-2,3q-0.5,5-1,10c2.731,1.584,2.446,2.742,7,3v1l7-1v1c2.381,0.544,2.648-1.084,4-1v1l4,1c1.856,3.151,4.925,4.02,6,8,4.032,0.7,3.661.4,8,0q0.5,2.5,1,5a1.55,1.55,0,0,0-1,2h1v4h-1v1h-3v1c-2,1.595-2.746,3.623-5,5l1,3h1c1.665,2.061,3.186,3.034,4,6h-1c-3.72,6.452-8.909,4.431-16,7v1h1l-1,2c-3.946,1.8-5.188,3.819-11,4q-1,6.5-2,13h-1l1,3h-1l-1,4h-1q0.5,7.5,1,15c-1.914,1-4.094,3.227-6,4h-4v1c-1.663.643-2.658,0.448-4,1v-2l-2,1-2-3h-2v-1h-1v1h-1v-1h-3l-9-10c-2.776-1.344-2.9,1.849-6,0l-7-8-3-2,1-2c-2.57-2.726-5.29-.025-4-5l-9-7,1-3a43.166,43.166,0,0,0,5-6v-3l2-1v-3h1l1-4h1l1-4,6-5h2l2-3,5-1c-0.159-4.634-.328-4.282-2-7h-1q0.5-3.5,1-7l8-5v-2l2-1v-3l2-1q0.5-3,1-6h1c3.318,4.781,4.366.773,7,0l8,1v-1C445.547,203.3,446.361,201.656,451,201Z" />
    </a>

    <?php
    $kdwil = '11.06';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_18" data-name="Color Fill 18" class="cls-7" d="M255,50h4q0.5,2,1,4h4c1.094,2.078,1.611,1.771,2,5h3v1c1.139,1.139.4,0,1,2h-9v1h-1V62h-2l1-3h-1c-1.139-1.139,0-.4-2-1V56h2q-0.5-2-1-4h-2V50Zm78,24V72c0.739-.124,8.3-0.7,9-1V70c1.451-.819,1.7-0.7,4-1,1.619,2.412.738,0.649,3,2v1h2v1h2l1,2h3v1l9,2c-0.586,2.263-3.535,4.923-3,7l2,1c0.577,1.992-1.352,2.865-2,4h1c1.239,1.974,2.3,2.438,5,3v2h4c-0.618,3.469-1.648,5.168-5,6q0.5,5,1,10l-2,1v6c3.006,2.078.426,1.838,2,4l5,2v2c-0.323.648-3.138,1.456-3,3h1l2,6,5,4v2l2,1v3h1l-1,4h-1v4l-2,1c-2.451,2.4-5.52.689-9,2v1h-2l-1,2c-2.387,1.014-12.185-1.249-13-2-4.334-1.01-4.22-3.617-4-9l2-1c0.2-.595-3.479-6.946-4-9-3.132-.364-3.079-0.746-5-2v-1h-7v-1h-6v-1c-1.7-.322-1.717.935-2,1h-6v-1c-4.094-1.169-7.112,1.36-9,0-3.04-2.047-2.127-4.377-7-5-1.286,2.269-1.628,2.637-5,3q0.5,4,1,8c-1.8.944-1.575,1.385-4,2l-2-4h-3l-1-2h-1v-2h-1v-4l-2-1v-1h1c0.03-2.412-.468-2.5-1-4l-3,1q-0.5-2.5-1-5l4-1-1-4c0.553-2.863,4.588-4.79,3-10h-1c-1.327-3.854-.353-5.887,0-9h-1q-1-3-2-6c-3.088-.705-4.254-1.949-5-5l3-2c1.962-3.05-1.783-2.542,3-4v2c1.679,0.243,6.93,1,8,2-0.416.579-1.634,0.147-1,2h1c1.243,1.436,2.771,1.556,4,3l8-4V79h3V78c-1.351-1.012-.974-2.035-2-3h-2V74h1l2-3h2V70l5-4V65h6l5,7c0.969,0.988,1.971.744,3,2h4Zm-61-8c3.4,0.811,4.318,2.552,5,6-2.739.644-2.276,1.309-5,2V72l-3,1V72h-1V71A6.749,6.749,0,0,0,272,66Z" />
    </a>

    <?php
    $kdwil = '11.07';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_17" data-name="Color Fill 17" class="cls-8" d="M395,104h3c1.953,3.235,4.941,3.843,8,6l2,3h2l1,2h2v1l4,3a9.712,9.712,0,0,1-2,2v3h-1q0.5,2.5,1,5c-0.161.587-2.546,0.128-2,3h1v2h1v6h-2a3.982,3.982,0,0,1-2,2v5h2v2l3,2v1h3l1,2h5l1,2h2v1c1.135,0.3,1.782-1.863,4-1l1,2h5q0.5,3.5,1,7h-1v2h-1c-0.606,2.37.828,2.586,1,3,1.917,4.62,2.563,6.87,8,8v2a12.4,12.4,0,0,1,2,2h2v1h4v-1h4v-1c2.241-1.609,2.935-3.112,6-4l1,2a2.462,2.462,0,0,0,3-1c3.577-.81,6.545.608,9,1-0.736,8.625-9.059,8.788-12,15l-3,9H452l-1-3-6,2-2,3c-2.235,1.183-14.238.334-18,0v5c-2.707,1.848-2.2,4.462-4,7-1.493,2.1-4.525,2.721-6,5-1.135-.844-0.145.127-1-1-2.686-2.2-2.733-3.994-3-8h-2v-1h1l-1-3h-2l1-2h-1v-3h-1v-3l-4-3v-1h-2v-1h1l-2-3h-3s-1.6-1.7-2-2v-1h-1v1h-1v-2c-0.525-.184-3.019.67-2-1,0,0,2.024-.024,1-1h-2l1-2h-2v-1h1c-0.465-2.011-.788-2.876-2-4l-2,1v-2l-2-1v-1h1l-3-4-2-1v-1l-2,1-1-4-4-3v-2l-2-1v-3h-1v1h-1v-2c1.135-.844.145,0.127,1-1,4.734-.1,7.782-1.525,11-3q1-5,2-10h-1v-3l-4-3v-2l-3-2v-2h-1q0.5-4.5,1-9h-3v-1h-1l1-3h-1c-1.761-2.082-2.075-.605-3-4,2.357-2.31,1.121-4.89,2-9,0.051-.239,1.285-0.337,1-2h-1v-3c3.4-.811,4.318-2.552,5-6l-5-1V92h-3V91h-1V88c1.139-1.139.4,0,1-2h-2V82a6.719,6.719,0,0,0,3-3l6,2v1h3v1h2v1h3l1,2h3v1h2l2,3h1c1.146,2.1-1.2,4.1-1,5h1v2l2,1v2h1A7.97,7.97,0,0,1,395,104Z" />
    </a>

    <?php
    $kdwil = '11.08';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_16" data-name="Color Fill 16" class="cls-9" d="M569,128v2l2,1q-1,3-2,6h3a10.669,10.669,0,0,0,2,2v3l2,1c3.6,3.3,4.788,2.043,5,9,2.285,0.268,2.583.151,4,1v1l8,1v-8l3-1v-1h3v-1h4q0.5-1,1-2l2,1v-2c2.273,0.122,2.65.162,4,1v-2l2,1v-2l2,1v-2l3,1v-1l5-1v-1h2v-1l2,1v-2c5.9-.485,9.122-3.321,15-4,0.445,2.352,1.7,5.9,2,8l-2,1,2,3h-1c-1.127,1.719-.633,1.355-3,2-0.02,5.169-.391,3.966-2,7h2v3l6,4c-0.44,1.4-1.362,1.646-1,4a1.543,1.543,0,0,1,1,2l-2,1c-0.617,1.868.659,1.433,1,2,0.078,2.227-1,2-1,2v5h-1q0.5,1,1,2h-1v1h-3v5h2v2h2q-0.5,4-1,8h-2v1l-3-1v1c-2.91,1.776-3.979,4.191-4,9h-2v-2h-2a12.71,12.71,0,0,0-1,5l-5-1v-2a12.71,12.71,0,0,1-5,1q-0.5,1.5-1,3h-1v2c-1.738,2.32-5.771,2.165-10,2q-0.5-2.5-1-5h1v-2l2-1v-2h1q0.5-2.5,1-5l-2-1v-3h-1q-0.5-1.5-1-3l-14-4v-1h-2v-1l-11,1v-1h-9v-1h-2v1c-2.22,1.5-2.484,4-3,7H555v-1h-4v-1c-1.671-.323-1.764.95-2,1a13.528,13.528,0,0,1-7-1q-0.5-1-1-2c-2.477-2.3-5.5-6.009-9-7,0.933-3.6,2.831-3.405,4-6q1-8,2-16l4-1,6-10q-0.5-3.5-1-7h2v2c1.139-1.139.4,0,1-2,1.975-1.129,2.338-1.417,3-4-2.162-1.419-2.01-2.366-2-6C556.958,127.4,563.037,126.894,569,128Z" />
    </a>

    <?php
    $kdwil = '11.09';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_15" data-name="Color Fill 15" class="cls-10" d="M375,496v2c3.686,0.326,4.21.818,5,4h2c-0.993-3.075-.934-0.955,0-4a41.275,41.275,0,0,1,9,2l3,7h-2c-0.476-.631-3.666-3.517-5-3v1h-1v4h2c0.776,3,.616,2.63,4,3a6.719,6.719,0,0,1,3-3c1.584,5.912,3.589,1.569,5,5,4.361,0.883,2.926,1.378,4,4h3c1.137,4.066,2.039,2,4,5,2.232-.842,5.438-1.029,9-1v5h1v-2a9.749,9.749,0,0,1,4,1l-1,3h1c0.978,1.772,1.352,1.609,2,4h-3v2l-2-1c-0.813,1.8.589,2.479,1,3l-1,3h2v2a9.371,9.371,0,0,0,4-1v-1h1v1l6,1v3h2q-0.5-2.5-1-5h3l3,4h2l1,2h1v3l3,2v1l3-1v2c4.161,0.147,4.722,1.258,8,2a12.71,12.71,0,0,1,1,5c2.762,0.723,2.237.279,3,3h2l-1,2,2,1,1,4h3v-1c1.139-1.139.4,0,1-2-1.139-1.139-.4,0-1-2h2v2c2.444-.574,2.206-1.047,4-2,0.719,2.71,1.646,3.07,3,5h1v5l2,1v2h1c-0.036,1.259-2.875,1.067-2,2,0,0,4.751-.08,3,1h-1c0.749,2.063,1.371,2.916,0,5h-1v1h1c1.438,1.394-1.836.953-2,1v1l-3-1v1c-1.9,1.264-1.877,1.645-5,2-1.767-2-2.04-.83-4-2l-1-2a2.509,2.509,0,0,0-3,1c-2.832.61-7.821-.908-9-2,2.51-1.417,2.866-2.05,3-6h-1v1h-3c0.574-2.444,1.047-2.206,2-4l-2-1v-1l-2,1c-0.969-.645-0.423-1.593-2-2a2.361,2.361,0,0,1-3,1l-1-2-2,1v-2l-3,1v-3c-1.866-.98-3.087-4.071-5-2v-3c-3.686-.326-4.21-0.818-5-4-4.544-.844-5.278-2.969-9-4v-2l-2,1v-2l-2-1v-1c-1.694-.817-1.555.617-2,1-1.083-.139-1.839-1.994-2,0h-1v-2l-5-1v-1l-5,1a2.637,2.637,0,0,0-3-1v1c-1.981,1.233-1.85,1.56-5,2v-2l-3-2v-1c-1.9-1.037-4.161.684-5,1a7.173,7.173,0,0,1,1-4h-1v-1l-2,1-1-3c-2.241.839-.761,0.771-3,0v2l-3-1v-2c-4.336.488-2.641,1.423-7,2v-1c0.664-.565,2.693-2.341,2-4h-1c-1.145-3.909-1.951-2.141-4-5h-1l1-3c-0.339-.686-6-4-6-4l1-3-5,1-1-4h1c0.895-1.625,1.244-.934,0-2v-1h2v-1h-1c1.129-1.168-.032-0.448,2-1l1-3c2.4,0.981,7.622,2.03,9,1a7.742,7.742,0,0,0,2-3c-4.325-.36-4.914-1.423-5-6,2.064-1.872-.1-0.858,1-3h1c1.226-2.156.634-1.87,0-4h3Zm88,41,7,2c-0.844,1.135.127,0.145-1,1v1h-3c-1.139-1.139,0-.4-2-1Zm-68,19h1v1h4v1h-1l1,2h-6c-0.639-1.262.774-.147,1-1v-1h-1Zm49,29h4v1h-1v1c-1.334.418-3.872,1.987-4-1h1v-1Zm68,30v3h-1v1h-5c-0.582-1.48-1.444-1.641,0-3-1.814-1.1-1.184.973-3-1h1v-1l-1-2h4C508.286,614.269,508.628,614.637,512,615Zm-3,8c4.165,0.846,3.547,2.006,6,4-0.574,2.01.12,0.865-1,2-1.288,2.2-3.733,2.838-6,4v-1c-3.8-.869-4.068-2.31-4-7h1v-1h4v-1Z" />
    </a>

    <?php
    $kdwil = '11.10';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_14" data-name="Color Fill 14" class="cls-11" d="M706,601v-3l-4,1q-0.5,1.5-1,3c-4.163-.5-4.687-1.89-10-2q-0.5,2.5-1,5h-2c-1.4-.915-0.072-2.485-1-4l-4-3v-2h-1v-5h-1c-1.353-1.927-2.289-2.289-3-5-3.258-.784-5.556-3.444-7-6,3.135-1.2,7.349-2.075,10-4q0.5-1,1-2h1v-2l3-2v-2l2-1v-2h1q0.5-1.5,1-3a34.218,34.218,0,0,1,8,1q0.5-3,1-6h-1v-2h1v-1h3c1.127,1.719.633,1.355,3,2l2-3h2v-1h3q0.5-1,1-2l3,1c1.783-.585,4.047-3.38,5-5,2.105,1.115,4.628,3.2,7,4h6c2.727,1.656,1.309,11.788,3,15h1v2h1q0.5,1,1,2l3,1v2l2,1q0.5,1.5,1,3h1v3h1v2h1v3h1q0.5,2,1,4h1v3h1q-1,7-2,14c-2.432,1.6-.644.787-2,3h-1v2l-2,1v2c-0.4.606-1.337,0.775-2,2h-2c-1.777-2.95-3.946-3.275-7-5v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2q-0.5-1-1-2h-2v-1h-2v-1h-3v-1l-2,1v-1a6.452,6.452,0,0,0-5,1v1h-2Zm-110,8h6v-3h1v-1h5c2.229,2.425,1.882,1.395,5,1q-0.5,2.5-1,5l2,1q0.5,1.5,1,3h2l2,3h1q-0.5,3-1,6l3,2c-0.123,1.689-1.894,1.693-2,2v8h-2v-3c-4.063-1-10-7.847-11-12h-2v-2c-2.128-1.212-2.177-2.253-5-3v-3l-3-1v1h-4q-0.5-1-1-2h-2v-1h-5v-1c-1.139-1.139-.4,0-1-2l4-1a2.572,2.572,0,0,0,3,1q0.5-1,1-2h2C594.944,606.8,595.385,606.574,596,609Zm-11,30h-2c-1-4.754-3.593-5.463-4-11h2v-3h1v-1h3c1.047,1.3,1.934.99,3,2,1.221,1.157,1.668,2.921,3,4-0.574,2.01.12,0.865-1,2C586.983,636.182,585.439,631.491,585,639Z" />
    </a>

    <?php
    $kdwil = '11.11';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_13" data-name="Color Fill 13" class="cls-12" d="M550,129c0.3,2.608,1.28,5.381,0,7v1h-1v1l-2-1v1c-2.84,3.606,1.566,4.11,0,8l-2,1v3c-1.245,2.574-4.859,5.221-8,6q-0.5,7.5-1,15h-1v2h-1q-0.5,1.5-1,3l-3,1-2-3h-3v-1l-14-1-1,3c-6.657-.064-15.092.351-19,3v1l-2,1v2l-3,2v1h-4c-1.652-3.7-5.856-10.224-13-8v1l-3,1-1-2-6-1a8.259,8.259,0,0,1,2-4h1v-2h1q0.5-3,1-6h1v-2h1v-1h-1v-3h-1v-9h-1v-3h-1V134c1.135-.844.145,0.127,1-1,2.631,0.556,7.341,3.305,11,2v-1a41.724,41.724,0,0,1,8-3c1.713,3.744,2.887,3.435,5,6a38.253,38.253,0,0,0,11-2h10v-1l6-1v-1l4-1v-1h3v-1h3v-1h5v-1h3v-1h2v-1h8C543.677,128.1,545.032,129,550,129Z" />
    </a>

    <?php
    $kdwil = '11.12';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_12" data-name="Color Fill 12" class="cls-13" d="M522,312h3c1.786,3.106,5.4,3.6,7,6,3.519,5.287-.623,11.99,7,14,3.365,3.287,6.94.583,12,2v1h14q0.5-1,1-2c4.507-1.862,12.951,1.437,16,2a37.728,37.728,0,0,1,0,14c-0.051.241-1.393,0.311-1,2h1v2h1v2h1v2c1.714,3.236,3.211,4.264,4,9h1v1l-2,1v3h-1v4l-4,2c-3.611,3.323-5.219,7.732-11,9v2c-5.166-.241-6.173-1.864-12-2-0.64,2.743-1.9,3.69-3,6l-3-1v1c-4.368-3.571-5.287-9.391-6-14h-2v-1h1a7.259,7.259,0,0,0-3-3v-1l-2,1c-1.012-.578-0.834-2.908-2-1h-1v-2l-2,1q-0.5-1.5-1-3h-3v-1h-1v1h-1v-2l-2,1v-1H514v-1l-9,1q-0.5-6-1-12h-1c-1.825-2.52-2.66-2.613-3-7h1q0.5-3.5,1-7l3-2q0.5-2.5,1-5c3.043-4.55,11-4.088,14-9,2.017-1.9-.059-0.726,1-3h1v-2h1C524.024,316.983,522.405,314.031,522,312Z" />
    </a>

    <?php
    $kdwil = '11.13';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_11" data-name="Color Fill 11" class="cls-14" d="M592,283v2c10.283,2.374,7.356,13.791,16,15,1.535-1.776,1.836-.96,4-2v-1h4v-1h2v-1c1.482-.948,2.462-0.852,5-1,3.135,3.627,14.9,7.922,22,8,0.724-4.2,2-5.879,7-6v1h4c0.177-5.027,2.058-5.95,3-10h4v2c2.612,1.382,1.693,1.769,6,2,1.882-3.3,4.673-3.176,10-3-0.778,3.844-1.647,9,0,13h1v3l3,1q0.5,1,1,2h2v1h1q0.5,1.5,1,3h1q0.5,6.5,1,13h1v2l4,3v2l2,1c2.393,3.688,0,5.27,6,6v-1h4v1h1q0.5,4.5,1,9h1q-0.5,1-1,2h1c0.454,1.761-1.276,3.562-1,4h1v1h-2l-2,3h-1q-0.5,1.5-1,3l-2-1q-1,2-2,4l-2-1-2,3h-2v1H683v1h-4v1H665v1l-4,1v1h-7v1l-3-1v1h-3v1l-22,2v1l-15,1v-1h-4q-0.5-1-1-2h-9l-3-5h-2v-1l-3-2v-2h-1v-2h-1v-3h-1v-2l-2-1q-0.5-2-1-4h-1q0.5-5.5,1-11h1q-0.5-3-1-6c-1.135-.844-0.145.127-1-1-4.78-.229-9.008-4.108-15-2v1l-4,1v1c-2.418.776-3.719-.8-5-1H547v-1c-2.33-.667-6.976-0.626-9-1l-2-3h-1v-2h-1c-1.251-3.227.582-6.543-1-9l-2-1c-2.728-2.922-5.078-5.206-9-7l4-11,2-1q0.5-1,1-2h2q0.5-1.5,1-3h1c1-1.453.818-2.488,1-5h-1v-6l4-1v1l6,5v1l3,1q0.5,1.5,1,3h3l2,3c2.909,1.887,6.238,1.968,11,2,2.189-3.111,5.187-2.532,9-4v-1h4v-1h2l2-3,5-1q0.5-1,1-2h2v-1C589.366,283.081,589.758,283.3,592,283Z" />
    </a>

    <?php
    $kdwil = '11.14';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_10" data-name="Color Fill 10" class="cls-15" d="M369,159c2.186,10.266,13.82,12.746,15,21,3.4,0.811,4.318,2.552,5,6h2v1h-1l1,3a7.962,7.962,0,0,1,4,2v1l4,1v1l2,1v2l4,3v2h1v4l2,1v2h1v2h1v3h1v2h1v4h1q-0.5,3.5-1,7h-1l1,3,3,1q-0.5,2.5-1,5h-3v1a8.307,8.307,0,0,0-4,2v1l-4,1-5,7v2h-1v2h-1v3l-2,1v3h-1v2l-3,2-1,3h-3c-2.234-4.155-5.8-7.738-9-11l-3-2v-2l-5-4v-2l-2-1v-1h-2l-4-5h-2l-1-2-3-1v-1h-2l-1-2c-3.3-3.112-5.96-6.629-12-7l1-4a3.982,3.982,0,0,1-2-2c-1.082.573-2.1,2.7-4,2v-1h-1v-3l-4-3v-4l-3-2v-2l-6-5-1-3-4-2v-5c-1.139-1.139-.4,0-1-2l-3-1c0.153-3.469,1.364-3.192,0-6h-1v-2l-3-2q0.5-3.5,1-7h-1v-3l-2-1q0.5-3,1-6c-0.6-1.126-4.063-1.259-5-2v-1h-1q-0.5-3-1-6h-1c-1.3-1.905-1.563-1.9-2-5h1v-1h-1q0.5-2.5,1-5l4-3q-0.5-4-1-8h3c0.6-.274,1.468-3.138,3-3v1c3.873,2.429,1.71,4.616,8,5v-1c2.262-1.066,6.3,1.795,8,2l11-1,1,2,6-1,2,3h3v1h1v3l3,2v3c-2.4,2.38-1.488,6-1,9,2.612,1.382,1.693,1.769,6,2v1h5v1Zm-61,29h3v1h-1c-1.139,1.139,0,.4-2,1v-2Z" />
    </a>

    <?php
    $kdwil = '11.15';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_9" data-name="Color Fill 9" class="cls-16" d="M485,229c5.318,0.918,12.744,3.936,14,9,1.895,2.159-.3,5.865,1,9l2,1v4h1v1l-2,1v3h-1l-1,3h1v1h3l1,2h2l3,4,2-1v2h1v-1h1v2c4.381,0.337,13.16,3.029,16,5v1l2,1v2h1v1h2v2h-2a60.584,60.584,0,0,1,1,11c-2.4,1.554-1.556,2.85-3,4h-2v1l-3,2v2h-1v3h-1v3h-1v3h-1q0.5,5.5,1,11l-2,1c-0.374.746-.633,3.113-1,4-4.223,1.8-11.7,4.518-14,8q-0.5,2.5-1,5l-3,2v5h-1q-0.5,3-1,6c2.23,1.245,5.695,4.018,5,8,0,0-1.479.746-1,3h1v5l-13,1v-1l-4-1-1-2h-2l-3-4h-2l-4-5-6-5-1-3-4-3v-2l-2-1-1-3h-1v-2l-2-1v-2l-2-1v-2l-2-1v-2l-3-2v-2l-5-4v-2l-2-1c-2.178-2.3-5.067-4.552-6-8,7.944-2.623,13.308-1.757,13-13h-1c-0.293-1.144,1.809-1.764,1-4-0.277-.767-2.616-0.124-2-3h1v-2l2-1v-6c1.046-3.431,1.709-8.788,3-12l3,1,8-5c0.935-1.455-.429-3.146,1-4h8v-1h3l1-2,4-3v-2c-2.586-1.414-5.179-3.768-6-7,1.974-1.239,2.438-2.3,3-5l5-1V229Z" />
    </a>

    <?php
    $kdwil = '11.16';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_8" data-name="Color Fill 8" class="cls-17" d="M734,244q0.5,1.5,1,3c1.135-.844.145,0.127,1-1,1.139-1.139.4,0,1-2h7q0.5,1,1,2h4l4,5,2-1v1h2v1l3,1q-0.5,2-1,4h5c0.912,1.75,2.782,2.218,1,4,1.889,1.1,1.166-.985,3,1l-2,1q0.5,2,1,4c0.552,8.733-1.418,13.007-10,13-1.911-1.7-5.31-.217-9,0q-0.5,2.5-1,5l-8,1v-1h-4a10.6,10.6,0,0,0-1,4l3,1v5l-5,1c0.789,3.229,1.856,3.449,2,8l-3,1c0,3.684-1.892,16.863-2,17-1.139,1.139,0,.4-2,1q0.5,4,1,8l-5,1c-1.683,5.787-2.969,1.819-6,4v1h-1v6h-1v-1h-3v-1l-3-1v-2c-2.612-1.382-1.693-1.769-6-2a5.442,5.442,0,0,1-2,2v-1c-4.254-2.577-2.623-4.463-5-8l-5-4q-0.5-6.5-1-13h-1c-0.81-1.763-.637-3.9-2-5h-2q-0.5-1-1-2h-2v-1l-2-1v-3h-1c-1.643-4.517-.121-7,0-12l3-2v-2h1v-4l4-3v-4c1.007-1.459,4.555-1,7-1,1.074-4.125,4.031-4.024,6-7,2.5,1.16,13.006,3.863,18,2v-1l4-1,2-3h2v-1l3-1q0.5-4,1-8c-0.065-.278-1.424-0.282-1-2h1v-2h1q-0.5-1.5-1-3h2C733.139,243.861,732,244.6,734,244Z" />
    </a>

    <?php
    $kdwil = '11.17';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_7" data-name="Color Fill 7" class="cls-18" d="M606,189q1,3,2,6h1c0.871,2.772-2.02,7.393-3,9l-2,1q0.5,3.5,1,7l11-2v6c-3.09,2.077-.417,1.606-2,4-0.368.557-2.13,0.876-3,2l-6-1a18.223,18.223,0,0,0,1,7c3.643-.754,4.676-2.326,7,1h1v1h-1v1h-3v1h-2v1h-9v1h-2v1l-14-1-11-4q-0.5-1-1-2l-6-1q-0.5-1-1-2c-2.276-1.389-5.255-1-8-2v-1l-16-1v-1h-2q-0.5-1-1-2h-3q-1-2.5-2-5h-7q-0.5-1-1-2l-3-1q-0.5-1.5-1-3c-1.521-.874-1.646.467-2,1-1.893-.849-1.326-0.835-2-3,2.387-1.616,2.913-6.179,3-10h-2v-3h-1V181h-1q-1-3-2-6h-2v-1h1c1.819-1.682,7.561-1.1,11-1v1l5,1q0.5,1,1,2h2v1h2l8,9c2.866,1.833,7.119-.222,11,1v1h3v1h10l3-8h3v1l6-1v1l5,1v-1l6-1v1h2v1l6,1C599.071,186.215,602.4,188.211,606,189Z" />
    </a>

    <?php
    $kdwil = '11.18';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_6" data-name="Color Fill 6" class="cls-19" d="M459,181l-10,1c-0.945-1.8-1.385-1.575-2-4-5.554-1.3-7.69-5.5-10-10,4.98-3.2,1.68-7.114,1-12-2.044.4-8,1.334-11,0l-1-2-6-1-1-2h-3v-1l-5-4v-2c1.285-1.026,5.166-5.892,5-8h-1v-3h-1v-1c-0.131-1.614,1.032-5.68,1-9a12.71,12.71,0,0,1,5-1v1l3-1v1h3v1h4v1h2v1h3v1l13-1v1l6,2,1,2h3c3.836,1.691,3.927,1.483,4,7h-1q0.5,5,1,10h1v9h1q0.5,3,1,6h-1v2l-2,1q-0.5,3-1,6l-3,2c0.06,1.732,1.929,1.745,2,2Q459.5,178.5,459,181Z" />
    </a>

    <?php
    $kdwil = '11.71';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_5" data-name="Color Fill 5" class="cls-20" d="M305,73v3h2v2l-3,1a10.6,10.6,0,0,1,1,4c-3.748.8-3.9,2.445-8,3-1.127-1.719-.633-1.355-3-2V80l4-3V76h2l2-3h3Z" />
    </a>

    <?php
    $kdwil = '11.72';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_4" data-name="Color Fill 4" class="cls-21" d="M284,26l4,1-1,2h1c1.139,1.139,0,.4,2,1v2c1.77,0.943,3.206,4.133,5,2v2h2V31h2a7.322,7.322,0,0,1,2-2l-1-3h1c1.139,1.139,0,.4,2,1l1,3h1v2h1v2l3,1v1h-1c-0.165,1.883-.105,1.322,1,2v1h-1c-1.139,1.139,0,.4-2,1-0.105-.223-1.439-3.626-2-3v1h-1v6a9.807,9.807,0,0,0-2,2l-3-1v1h-1V45h-2V44l-2,1V44h-1l1-2h-1a21.46,21.46,0,0,1-2-8C286.094,33.126,284.138,30.8,284,26Z" />
    </a>

    <?php
    $kdwil = '11.73';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_3" data-name="Color Fill 3" class="cls-22" d="M571,131l9,1v2h1c3.121,3.069,6.231-.269,8,6h-2v3c1.375,0.681,1.282,1.5,2,2,3.034,2.1,3.807.815,4,6-0.923,1.077-.663-0.076-1,2h1v1h-1c-0.579.416-.147,1.633-2,1v-1c-2.24-.238-7.237-1.772-8-3v-4l-4-3v-1h-3c-0.614-5.684-1.8-3.978-4-7h-1v-1h1v-4Z" />
    </a>

    <?php
    $kdwil = '11.74';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_2" data-name="Color Fill 2" class="cls-23" d="M732,242c-0.709,3.035-1.6,2.159-2,3v4l-2,1c-0.692,2.542,2,3,2,3q-1,3.5-2,7c-4.882.3-3.017,0.643-6,2v-1c-3.873-2.429-1.71-4.616-8-5v1h-3v-2h-6q1-4.5,2-9a9.877,9.877,0,0,0,4-4c4.882,1.836,6.244-.666,10,0a2.819,2.819,0,0,0,3,1v-1h3v-1c2.154-.055,1.278,1.907,2,2Z" />
    </a>

    <?php
    $kdwil = '11.75';
    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
    $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
    ?>

    <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
      <?php warnakab($n, $kd_indi, $kdwil); ?>
      id="Color_Fill_1" data-name="Color Fill 1" class="cls-24" d="M715,501c6.394,0.616,9.559,4.426,13,8l2,1q0.5,1.5,1,3h7v1h1q0.5,2.5,1,5h-1v1h-4v1h-1q0.5,2,1,4a1.691,1.691,0,0,0-1,2h1q0.5,2,1,4l2,1c0.1,0.161,2,14,2,14h-1v1h-3v2h-9v-1h-2v-1l-5-1a6.749,6.749,0,0,1-5,4v-2c-3.443,1.978-4.8,4.438-10,5v2c-3.215-.77-2.155-1.508-6-2v1h-1v4c0.217,1.4,1.046-.413,1,1h-1v2a15.682,15.682,0,0,1-6,1c-0.875-2.316-1.017-4.407-1-8h1q0.5-3,1-6h1v-3h1v-5h-1v-6h-1q-0.5-2-1-4h-1q-2-6-4-12l14-9c1.246-2.5-.908-5.366,1-7l4-1c1.435-1.039,4.354-5.513,3-9h-1v-2c-1.581-2-5.155-.119-8-1v-1l-5-1q0.5-1.5,1-3l11-1v1l4,1v1h4v1h1a15.682,15.682,0,0,1,1,6C715.567,494.478,715.083,498.053,715,501Z" />
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
          url: "ambil_aceh_kiri.php",
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

  <!-- <script>
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
  </script> -->