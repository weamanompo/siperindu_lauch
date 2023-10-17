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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="668" height="464" viewBox="0 0 668 464">
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
                .cls-25,
                .cls-26,
                .cls-27,
                .cls-28,
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

                .cls-25 {

                    filter: url(#filter-24);
                }

                a:hover .cls-25 {
                    fill: #d5d5d5f3;

                }

                .cls-26 {

                    filter: url(#filter-25);
                }

                a:hover .cls-26 {
                    fill: #d5d5d5f3;

                }

                .cls-27 {

                    filter: url(#filter-26);
                }

                a:hover .cls-27 {
                    fill: #d5d5d5f3;

                }

                .cls-28 {

                    filter: url(#filter-27);
                }

                a:hover .cls-28 {
                    fill: #d5d5d5f3;

                }
            </style>
            <filter id="filter" x="513" y="331" width="54" height="34" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="441" y="317" width="43" height="51" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="297" y="218" width="24" height="33" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="119" y="102" width="55" height="43" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="160" y="69" width="43" height="62" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="524" y="187" width="26" height="34" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="305" y="220" width="54" height="41" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="154" y="233" width="31" height="29" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="122" y="146" width="38" height="49" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="477" y="360" width="121" height="92" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="223" y="185" width="133" height="109" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="175" y="11" width="84" height="139" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="202" y="17" width="136" height="158" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="231" y="123" width="97" height="93" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="300" y="73" width="102" height="152" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="374" y="84" width="165" height="109" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="348" y="161" width="119" height="115" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-18" x="417" y="153" width="93" height="130" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-19" x="480" y="147" width="126" height="121" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-20" x="493" y="207" width="103" height="103" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-21" x="447" y="267" width="133" height="128" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-22" x="386" y="265" width="127" height="186" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-23" x="277" y="244" width="171" height="190" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-24" x="238" y="214" width="164" height="124" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-25" x="132" y="166" width="170" height="216" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-26" x="40" y="192" width="167" height="175" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-27" x="47" y="100" width="197" height="119" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_28" data-name="Color Fill 28" class="cls-1" width="668" height="580" />

        <?php
        $kdwil = '32.79';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_27" data-name="Color Fill 27" class="cls-2" d="M536,336h2v1a26.7,26.7,0,0,1,4-1q-0.5,1-1,2h1v-1h1v1h1q0.5,1,1,2c1.63,0.524,1.423-2.436,4-2q0.5,1,1,2h1v-2h5v1h1v-1a9.379,9.379,0,0,1,4-1v1h-1c-0.97,1.569,1,3,1,3q-0.5,1-1,2h1v1h-2c-0.621,1.271.729,0.159,1,1,0.63,1.954-1.182.549-2,1q0.5,1,1,2h-3v-1l-2,1v-1c-2.439.628-3.313,3.539-5,5-0.557-1.031-1.838-3.786-4-3v1c-1.135.844-.145-0.127-1,1l3-1v1a17.357,17.357,0,0,0-7,8h-1v-2h-2v-2c-2.984-.608-2.485-1.781-3-2l-3,1v-1c-1.614-.888-3.429-1.549-5,0v-2c-0.882-.878-2.222-1.1-3,0v-2c-3.893-.672-4.886-1.368-5-6a13.3,13.3,0,0,0,4-3c3.259,1.571,2.668,1.293,7,2v-2l2,1v-1c2.383-1.287,1.374-1.487,5-2v-2Z" />
        </a>
        <?php
        $kdwil = '32.78';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_26" data-name="Color Fill 26" class="cls-3" d="M463,328v2c4.272,0.934,4.432,2.794,10,3,1.657,5.59,1.576.856,5,3v1c-3.527,2.008-2.465,2.689-2,7h-1v-1l-3,1v2l2,1c0.283,1.386-.892-0.41-1,1-0.14,1.819,1,2,1,2a2.143,2.143,0,0,1-1,2l1,3h-1c-1.311,2.166-2.784,3.821-7,3v-1l-2,1c-0.69-.543.317-1.515-1-1l-1,2h-3v1a8.289,8.289,0,0,1-4,2,8.214,8.214,0,0,0-1-4h-1v-1h1a2.621,2.621,0,0,0-1-3l1-3h-1v-2l-2-1v-3l-3-1c-0.891-1.1.935-.77,1-1l-1-3h2v-1a9.877,9.877,0,0,1-4-4l2-1c0.469-1.334-.456-0.088-1-1,0.684-3.1.792-2.745,0-7h2v-1l3,1v-1h-1c-0.333-1.8,2.479-2.615,4-3C456.583,325.53,458.768,327.16,463,328Z" />
        </a>
        <?php
        $kdwil = '32.77';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_25" data-name="Color Fill 25" class="cls-4" d="M315,236h-3v1c1.91,1.624,2,3.345,2,7l-3,1v-1c-3.15-1.728-1.8-1.8-7-2v-2l-2-1,1-4h1v-3l4-3-1-3h1l1-3c1.139,1.139.4,0,1,2h1v2l3,2-1,3h1C314.76,233.467,314.771,233.671,315,236Z" />
        </a>
        <?php
        $kdwil = '32.76';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_24" data-name="Color Fill 24" class="cls-5" d="M137,107h7v1c-2.325,2-.673,2.386-2,5h-1c-0.856,1.406-.744,1.719-1,4a10.6,10.6,0,0,0,4,1c2.672-3.86,2.707-.153,6-2v-1c2.1-1.761.6-2.037,4-3q0.5,2,1,4c3.16-.113,1.874-1.955,3,1,4.644,1.2,3.465,2,9,1q-0.5,1-1,2h1v1h-1v3h-2v1h2c1.139-1.139,0-.4,2-1v4h-2c-2,3.506-4.956,5.361-6,10h-2v1a26.7,26.7,0,0,0-4-1v-4h-2c-0.723,2.762-.279,2.237-3,3-1.139,1.139,0,.4-2,1v-2a9.749,9.749,0,0,1-4-1v2h-2v-2c-3.45-.554-10.786-0.794-14-2,1.565-4.848-2.3-10.17-3-16a53.612,53.612,0,0,0,11-1,12.71,12.71,0,0,0,1-5h1v-4Z" />
        </a>
        <?php
        $kdwil = '32.75';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_23" data-name="Color Fill 23" class="cls-6" d="M194,80c-0.034,6.065,1.4,6.555,2,11h-2a6.719,6.719,0,0,1-3,3v1h1l-1,3h1v1c1.128,0.642,2,.055,2-1h1v2h1c1.683,2.872-1.9,8.294-3,9v1l-2-1v1h1q-1,3-2,6l-4-1q-0.5,1-1,2h-2c-1.382-2.612-1.769-1.693-2-6h1q-0.5-2-1-4h2v-1h-4v-1c2.01-.574.865,0.12,2-1-2.01.574-.865-0.12-2,1h-1v6l-2,1v3l-2,1v3h-1l-5,6h-2v-2h-1c-0.232-1.85,1.807-1.142,0-2v-1l3-1v-6h1v-6h1v-1h-1v-3l-2-1q-0.5-4-1-8a39.652,39.652,0,0,1,8-1c0.089-2.91.4-6.565,2-8l3-1V81c0.82-1.886,2.117-4.9,3-7,2.976,1.147,3.04,1.09,6,0v2h1c0.9,1.824-.688,3.1-1,4h6Z" />
        </a>
        <?php
        $kdwil = '32.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_22" data-name="Color Fill 22" class="cls-7" d="M539,192c1.047,5.48,4.295,6.313,5,12l-5,1c-0.6,1.128-1.728,1.551-2,2q-1,4-2,8c-1.139-1.139-.4,0-1-2l-3-1q0.5-3,1-6h-1c-1.25-1.972-1.543-1.862-2-5,3.215-.77,2.155-1.508,6-2q-0.5-3-1-6Z" />
        </a>
        <?php
        $kdwil = '32.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_21" data-name="Color Fill 21" class="cls-8" d="M320,225c4.1,1.1,1.64,2.011,3,3l3-1c0.021,0.007-.074.635,2,1l-1,3,2,1v4c1.741,0.274,2,1,2,1h4v-1c2.224-.6,2.735.629,4,1v-1h1v1c1.891,1.355,2.3,2.34,5,3v-3h1c1.139-1.139,0-.4,2-1v3h1v-1h4c-0.556,2.33-.9,2.394-2,4h-1v4l-2,1v2h-1l1,3h-1c-1.536,1.754-6.919,3.169-11,2-5.816-1.666-12.451-1.838-20-2-1.973-3-2.825-.941-4-5-1.139-1.139-.4,0-1-2l3,1v-2h-1c0-1.31,1.8-1.716,1-4h-1q-0.5-2.5-1-5h3v-1h1v-3h1A13.263,13.263,0,0,0,320,225Z" />
        </a>
        <?php
        $kdwil = '32.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_20" data-name="Color Fill 20" class="cls-9" d="M176,240c0.513,3.309,3.355,4.876,2,9h-1v3h-1v1h-5v1l-4,1v1l-4-1v-1l-4,1v-3a39.688,39.688,0,0,1,8-1c-0.427-4.286-1.819-4.966-2-10,1.517-.954,1.694-1.954,3-3C169.155,239.05,174.228,239.7,176,240Z" />
        </a>
        <?php
        $kdwil = '32.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_19" data-name="Color Fill 19" class="cls-10" d="M144,182c-4.864.215-3.385,1.068-7,2,0.526-3.8,1.952-4.1,3-7h-1a17.929,17.929,0,0,0-3-7l-2-1v-2h-1q-0.5-1-1-2h-3q-0.5-1.5-1-3h-1c0.053-1.2.912-1.578,1-4h2c0.918,0.4.575,2.851,3,2v-1h1v-7l4-1v1c2.483,1.724,1.96,4.165,3,7,1.876-.823,2.616-1.481,5-2l2,3h1v3h1v3h1v1c0.011,1.727-3.226,4.321-2,8h1v2h1v2l2,1c0.934,2.309-.908,3.825-1,5q0.5,1.5,1,3h-1v1h-3c-1.139-1.139,0-.4-2-1C145.921,185.648,144.707,184.751,144,182Z" />
        </a>
        <?php
        $kdwil = '32.18';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_18" data-name="Color Fill 18" class="cls-11" d="M569,368h2v-2l3,1c0.282,5.709,2.424,6.126,4,10q0.5,3,1,6l2,1q-0.5,5-1,10h-2q-0.5,3-1,6c4.793,1.425,1.092.921,3,4h1l3,4h3q0.5,1.5,1,3c1.037,1.183,2.675,0,4,1v1c-1.171.828-1.42,0.519-2,2,0.146,0.063,1.916-.078,1,1h-1a7.742,7.742,0,0,1-3,2v-3h-1c-3.958,4.348-5.665.317-9-1h-4v-1c-4.525-1.326-7.769,1.407-11,2q-0.5,1.5-1,3c-2.773-.652-4.783-2.27-7-3h-8v-1h-1v1h-7v1h-4v1h-3v1h-3l-2,3-2,1v8c3.429,2.285.863,5.313,0,9a19.339,19.339,0,0,0-7,5h-4v2l-13-1v-1l-12,1v-2h-2c-0.252-2.327-.242-2.526-1-4h-1l1-4h-1a2.806,2.806,0,0,1,1-3c0.2-1.4-.768.395-1-1s0.842,0.4,1-1l-1-3h-2c0.684-2.927,1.113-3.274,4-4l-2-6c1.135-.844.145,0.127,1-1l2,1v-2c1.946-1.652,2.494-.362,5,0v-1h-1c-0.259-1.58,1.646-1.258,2-2v-2h1v-1h-1v-3h-1v-7h1l-1-2h1v-2h-1v-6h-1v-2h-1l-1-2c-2.41-1.923-1.765,1.059-3-3h1v-1h-1v-1h1c0.232-1.395-.833.4-1-1l1-3c-0.21-.129-1.862.121-1-1h1c1.127-1.253.3-.856,2,0v-2l2,1,1-4,2,1c1.2-.994,1.154-2.5,3-3,0.324,0.081.283,1.266,2,1a1.416,1.416,0,0,1,2-1l3,5,3-1,2,3h2v1l6,1q1,2,2,4l12-1c-1.2,4.644-2,3.465-1,9h5v-2l8,1v-1h1a1.59,1.59,0,0,0,2,1q0.5-1,1-2h4v-1c2.664-1.326,3.913-2.279,7-3q1-5,2-10c-1.974-1.239-2.438-2.3-3-5l3-1v-1h8v1h1v2Zm-5,54a9.749,9.749,0,0,1-1,4c-2.128-1.212-2.177-2.253-5-3q0.5-1.5,1-3C561.739,420.644,561.276,421.309,564,422Z" />
        </a>
        <?php
        $kdwil = '32.17';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_17" data-name="Color Fill 17" class="cls-12" d="M271,191c2.24,0.357,3.869,1.705,7,1a2.474,2.474,0,0,1,3-1l2,3c2.069,0.956,4.3-1.294,5-1l6,7,9,3,3,5,3-1,1,3,4-1v1l3,1v-4c-1.157-.769-2.345-0.725-2-3h1l-1-2h1l2-3,3,1a19.168,19.168,0,0,1,1,7h4l1,3h10c1.212,2.128,2.252,2.177,3,5,2.848-.089,4.289-0.2,6-1v1c2.773,1.195,3.572,1.2,4,5-1.094.9-.214-0.176-1,1v1l-5,3-1-3h-1v1h-7l-1,2h-2v1a8.793,8.793,0,0,1-4,2v-1a3.254,3.254,0,0,0-4,1h-1c-1.576-1.267,1.106-1.934-3-3-0.841,3.982-3,4.373-4,8h-3v-1h1v-1h-1l1-3-2,1v-1h-1v-1h1l-1-4h-1v1l-2-1,1,2h-1l-1,4-2,1q-0.5,3.5-1,7l-2-1v1c2.039,1.771,1.749,1.951,1,4h2v1h-1c-0.27,1.388.717-.386,1,1l-1,3h2c-0.709,2.1-1.03.905,0,3h-1c-1.376,2.531-3.18,3.817-4,7h-5v5h-2c0.233,6.3,1.06,6.731-1,12l-3-1c-1.408.128,0.395,1.231-1,1v-1h-4v1l-4,1v5l-2,1v5h-1a8.278,8.278,0,0,1-5,3c-2.17-1.906-5.734-1.039-9-2v-1h-1v1l-2-1v1h-1v-1l-4-1q-0.5-2-1-4c-2.271-.252-2.61-0.128-4-1v-1l-2,1c-2.338-2.454-.39-3.778-5-5v-2c-1.98-.079-3.375-1.05-4-1v1h-3l-1,2c-2.113.869-2.819-.84-4-1v1c-1.872.7-.729,1.332-2,0-1.016-.771-0.984-1.229-2-2v-1h2c0.007-.977-0.907-1.757-1-4h2v-2h-2l1-2h-2c0.644-2.739,1.309-2.276,2-5-1.909-1.256-1.659-1.014-2-4l2,1v-1c2.445-1.557.612-1.143,2-3,3.165,1.42,2.834.11,3-4h4v-1l3-1v1h1v-1h-1v-1h6v-1l3,1v-1c1.705-1.042,1.625-1.4,4-2v-2l2,1v-1h1v-1h-1c-0.979-1.654,1.44-.846,2-1v-2c3.129,1.01,1.518.557,5,0-0.475-1.8-1.6-2.212,0-4h2v-1h-1c0.549-2.784.77-.1,0-3h-1v2l-2-1v1h-1v-3h-2v-4h-1c-0.043-1.414.827,0.4,1-1q-0.5-3-1-6c-2.743-.64-3.69-1.9-6-3v-1c1.171-.828,1.42-0.519,2-2-0.146-.063-1.916.078-1-1h1v-1h4v-1h1v3c3.687-.378,4.324-1.72,7-3v-1h-3v-1l-2,1v-3h1v-5h2l-1-3h2v-1h-1c-1.889-.86,2-1,2-1v1h1v-1c1.654-.979.846,1.44,1,2C270.762,193.277,270.237,193.721,271,191Zm-43,67c1.139,1.139.4,0,1,2h-1v-2Z" />
        </a>
        <?php
        $kdwil = '32.16';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_16" data-name="Color Fill 16" class="cls-13" d="M209,21l-3,13h1l-1,2,2,1v2h1l-1,3h4c0.871,3.428,2.068,2.575,3,6h2l-1,2h3v2l5-1v1c3.216,1.831,1.224,2.043,5,1v3l5,1,1,2h8v3h1V61c1.824-.895,3.1.688,4,1v3h2v4h2v2h-2l3,13h-5v1c1.719,1.127,1.355.632,2,3h-2a39.691,39.691,0,0,1,1,8l-3,2q-0.5,1.5-1,3h-2q-0.5,1-1,2l-2-1v1c-2.385,1.851-3.541,1.989-4,6h-1l3,5h-1c-1.139,1.139,0,.4-2,1-0.77,3.215-1.508,2.155-2,6a9.733,9.733,0,0,1,4,1v2h-1q0.5,1.5,1,3h-1q-0.5,1-1,2l-3,1v2h1v3h1q-0.5,1.5-1,3h2v3c-2.448-.558-2.211-1.043-4-2v1c-2.912,1.356-3.8,3.137-7,4-2.642-2.889-4.712-1.4-8-3q-0.5-1-1-2l-4,1q-0.5-1-1-2l-4-1q-0.5-1-1-2h-2v-1l-3-1c-0.063-3.577.128-5.714,1-8h-3c-1.37,2.082-1.037,1.315-4,2v1h-1q-0.5-1-1-2h-3q-0.5-2.5-1-5h-2q-0.5-3-1-6h1a7.742,7.742,0,0,0,3,2v-2h1v-5h2v-1l2,1v-1h1q-0.5-1-1-2l2-1v-1h-1q0.5-2.5,1-5a9.245,9.245,0,0,1-2-2l-3,1V98h-1V95h2c-0.549-2.784-.77-0.1,0-3l2,1V92c3.066-2.757.545-2.706,1-4h1V87l-2,1V80c-3.643,1.413-5.577.743-6-4,1.139-1.139.4,0,1-2h-1c-2.928,2.842-5.993.1-8-1,1.477-4.006.085-10.7,0-17,4.8-.21,5.208-1.683,10-2V52c-2.762-.723-2.237-0.279-3-3-1.139-1.139-.4,0-1-2l3-1V45h-1c-1.889-.86,2-1,2-1V41h-4c-0.574-2.444-1.047-2.206-2-4h1V36h3c1.359-.951.226-2.285,1-4h1c1.38-3,1.156-6.947-1-9-1.139-1.139,0-.4-2-1,0.9-3.893,3.542-5.643,8-6C197.374,19.727,202.839,21.032,209,21Z" />
        </a>
        <?php
        $kdwil = '32.15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_15" data-name="Color Fill 15" class="cls-14" d="M322,92h-4v3h-1v5h1q-0.5,4.5-1,9l-2,1v3h-1l-1,4h-2a12.152,12.152,0,0,1-2,5h-1c-2.339,4.92,2.826,7.677-6,8l-1-2h-1v1l-2-1v1c-1.6.992-3.993,2.205-2,4h-5c-0.844-1.135.127-.145-1-1v1h1v1h-2a17.629,17.629,0,0,1-2,2c-1.143.833,0.358,0.606-1,1v-1h-1c-0.633,1.264.575,0.52,1,1l-1,3c-5.7.173-9.838,2.381-14,1v1c2.006,1.32,2.489,3.228,3,6h-2v-1a26.7,26.7,0,0,1-4,1l-1-3c-1.32.441-2.555,1.593-5,1a2.487,2.487,0,0,0-3-1v1h-2v1l-2-1q-0.5,1.5-1,3l-2-1c-1.3.56,0.321,0.494-1,1v1h1q-1,3.5-2,7l-2-1v1h1c1.889,0.86-2,1-2,1-0.622,2.822-4.02,4.008-2,6h-2v2h-2v-1h-1v2c-1.571,1.548-1.333.37-3,0q-0.5,1-1,2l-5-1c-1.053-2.563-2.492-3.346-1-6h-1c-1.139-1.139,0-.4-2-1-0.507-4.53-4.009-10.357-3-13l2-1q-0.5-1-1-2h1c1.466-2.719,3.078-4.57,7-5,0.579,0.416.147,1.633,2,1v-1h1c-1.656-3.643-2.942-5.233-3-11h2c1.643-3.1,1.9-1.8,2-7a13.3,13.3,0,0,1-4-3c1.909-1.256,1.659-1.014,2-4h3v-3l-2-1c-0.741-2.234,1.535-4.862,2-7,3.16,0.113,1.874,1.955,3-1,2.706-.5,3.761-1.069,5-3h1V97l2-1V88a10.437,10.437,0,0,0,2-2h-2V84l3,1V84c1.139-1.139.4,0,1-2h1c0.4-1.356-.628.364-1-1V78l-2-1q-0.5-3-1-6h2q0.5-2,1-4l-3,1c0.252-1.391.66,0.373,1-1s-0.394.278-1-1V64l-2,1V62c-0.876-1.176-2.9-.993-5-1V58c-7.819,1.524-6.678-.529-13-2l-1-3-3,1-2-3c-1.781-.8-3.172.583-4,1V51c-1.361-1.166-1.528-1.825-2-4h-3c-1.212-2.128-2.253-2.177-3-5-2.324-.669-1.924-0.23-3-2h1c1.525-1.33-1.917-.974-2-1q-0.5-5-1-10h1V27h1V26h-1c-0.336-1.374.472,0.312,1-1V22h1v1l7,8,5,1v1l11-1,1-2,9-1V28h3V27c3.422-1.207,10.791-1.276,14,0v1h3l1,2h2l1,2,6,5v2l4,3v2h1v2h1v2h1v2l2,1q0.5,2,1,4l4,3v2h1v2h1v2l5,6h2v1h3v1h3v1l6,2v1h6v1h2v1c4.8,1.688,8.663-.843,11,1,1.614,1.328,2.069,2.849,4,4-0.844,1.135.127,0.145-1,1-1.5,2.21-5.525,3.867-8,5v3Z" />
        </a>
        <?php
        $kdwil = '32.14';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_14" data-name="Color Fill 14" class="cls-15" d="M309,136c0.145,5.832,1.106,5,3,9h1v6h-1l1,4h-1v3a1.748,1.748,0,0,1,1,2h-1v2h-1c-0.4,1.356.337,0.068,1,1,1.139,1.139,0,.4,2,1,0.99,3.322,1.159,1.955,3,4h1v2h1q-1,4.5-2,9h1c1.739,2.784,3.423,2.763,4,7-3.5,2.813-2.655,8.693-2,13h-3c-1.094,2.078-1.611,1.771-2,5h1l-1,3h1l1,3h-1v-1l-5,1c-1.608-2.431-.82-0.629-3-2v-1h-2l-1-3c-1.171-1.378-3.228-1.114-5-2v-1l-5-1-6-7h-7l-1-2-8,1v-1h-2l-1,2c-0.724.184-5.658-1.914-9-2a15.682,15.682,0,0,0-1,6h-6v-1h1c0.465-1.813-3.551-2.713-5-3v2l-3-1v-1h-3q-0.5-1-1-2l2-1v-5h1v-2h1q-0.5-1.5-1-3h1v-1l-7-5v-2c-0.773-1.033-3.019-1.773-4-3h1c0.749-1.315,1.4-1.217,2-2v-2l2,1q0.5-1,1-2h2l2-3h1q-0.5-1.5-1-3c1.552-1.76,1.9,1.1,3-3h3q-0.5,2-1,4h-1v1h1c1.316,4.37-.437,10.942-1,14h-2c1.68,2.446,2.24,3.278,1,7h2l5,6c1.73,1.365.609-.751,2,1,3.531,0.261,5.87,1.834,8,0-5.959-.431-7.058-1.653-10-5h-1v-2h-1q0.5-1.5,1-3h1v-1h-1q0.5-1.5,1-3h-2v-4h2q-0.5-4-1-8c2.826-.668,3.77-1.849,5-4l3,1,2,3h3v2h1v-3h3c1.094,2.078,1.611,1.771,2,5h3c-0.679-3.807-.662-3.2,0-7-2.84-.756-2.435-1.231-4-3h-1l-1-3h-2l-1-2h-2l-1-2h-2v-1l-3-1v-2h3v1h1v-1c1.884,0.017,2,1,2,1l2-1v1c1.139,1.139.4,0,1,2a13.608,13.608,0,0,0,4-1c0.8-2.087.654,0.144,2,1-0.684-2.927-1.113-3.274-4-4v-3c6.5-.434,7.954-1.471,14-2v-1h-1c-1.889-.86,2-1,2-1v-2l3,1v-1h1l-1-2c1.419-1.237,1.14,1.033,3-2l2,1v1h1v-1c2.84-1.679,2.719-3.451,7-4v1h-1c0.376,1.529.936,1.218,2,2v-1h-1c-3.162-.027,3-1,3-1,0.844,1.135-.127.145,1,1-0.461,3.292-1.639,3.071,1,5C308.139,136.139,307,135.4,309,136Z" />
        </a>
        <?php
        $kdwil = '32.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_13" data-name="Color Fill 13" class="cls-16" d="M378,78c0.262,3.176,1.01,3.822,2,6,1.783-.667,1.265-1.266,3,0V82h1c0.956-.99.621-1.272,2-2v1h1V79h2v4h-3l1,3h1c-0.338,1.037-2.576.95-2,2h1c1.267,1.843,7.455,5.852,9,4v3h-1v1h-3v1c0.954,0.136,4.191.554,2,1,0.687,2.058,1.9,5.946,0,8h2v2h-2c1.139,1.139,0,.4,2,1l-1,4h-1q0.5,2.5,1,5l-2,1v2l-2-1,1,2-4,3v4h-1c-0.355,1.526,1.8,1.347,2,2l-2,6c1.135,2.786,1.945,3.432,2,8h1c1.139-1.139,0-.4,2-1,0.113,2.368.69,2.5,1,4-0.347.553-1.372,0.755-2,2h1c1.139-1.139,0-.4,2-1q-1,4.5-2,9h-1c-2.007,2.209-1.634.073-3,1l-1,3h-1c-3,3.112-.982,1.232-6,2v1h-1v-1h-1v1h1v4h1v1h-1v1h1v1h-2v1c1.553,1.834,1.032,6.626,1,10l-3,1v1h1c1.889,0.86-2,1-2,1v1h-5v1h-1c1.139,1.139,0,.4,2,1v1c0.851,0.435,2.04-2.114,4-1v1h1v6h-1c-0.13,1.408.281-.218,1,1v1h-1v1h1v12l-5,2v1h1l-1,3a12.71,12.71,0,0,1-5,1v-1l-5-1v2l-10,1-1-3-4-1v-1a1.562,1.562,0,0,0-2,1c-3.783.591-5.329-2.327-6-5H328v-1c-2.481-1.623-1.883-1.679-6-2l1-4c-0.494-2.459-3.562-4.353-3-8h1v-1h-1v-5h1c0.926-2.239.909-3.841,1-7-4.334-1.01-4.22-3.617-4-9,2.729-2.132.86-2.279,0-6-2.927-.684-3.274-1.113-4-4-2.01-.574-0.865.12-2-1h1v-5h-1v-1l2-1v-1h-1a17.135,17.135,0,0,1,1-9h-1c-0.723-2.762-.279-2.237-3-3q-0.5-3-1-6c-2.4-1.049-3.212-1.12-4-4,2.558-2.131,3.045-5.155,3-10h2c0.618-5.595,2.417-3.237,4-6q0.5-3,1-6l2-1v-2h1l-1-3,2-1c0.807-2.817-2.7-2.525-1-7V93h1V92h3V89c2-.583,7.066-4.757,9-4v1c3.565,3.061,1.848,4.895,9,5,1.139-1.139,0-.4,2-1q0.5-2,1-4l3,1v1h2v1h5c2.055-3.037,1.85-.427,4-2V86c1.139-1.139.4,0,1-2l9-2V81h2l2-3h7Z" />
        </a>
        <?php
        $kdwil = '32.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_12" data-name="Color Fill 12" class="cls-17" d="M457,89c2.393,0.4,2.389,1.436,4,0v3c0.363,0.16,4.1-2.744,7-2v1h11v1h3v1l3,1c0.607,2.393.318,1.858,2,3v1h1V91h1V90h3l1,3h1v5h1v2h1v1h-1v8c0.71,2.22,2.4,4.208,3,7h2c1.212,0.757,1.2,3.81,2,5l3,2v2h1l2,3,6,5q0.5,1,1,2h2l2,3,4,1,10,6c-0.227,1.772-1,2-1,2q0.5,2,1,4h-1v1h-3l-2,3c-3.041,2.167-4.415,1.147-5,6-3.127.4-3.073,0.735-5,2v1h-4q-0.5-5-1-10a15.682,15.682,0,0,0-6-1c-1.792,2.166-7.779,5.3-11,6v2l-2-1v1c-2,1.723-.842,2.315-2,4l-5,4v4h-1v1l-3-1v2l-6-2v2l-3-1c0.339-3.955.964-2.907,0-6-6.646-.076-8.721-2.586-15-3l-4,8-3-1-5,1q-1-5-2-10h-3v-4l-3-1v2c-4.524,1.134-4.969,4.29-10,5,0.111,3.927-.075,7.145-2,9v1h-2v1l-2,1-1,3-2-1v4h-1c-0.642,1.128-.055,2,1,2v1h-2v1h-5v-1h-1v1l-4-2,1-2-3-1v-1h1a4.374,4.374,0,0,0-2-2v-1l-2,1v-2l-2,1-7-8-2,1v-2l-2,1c-2.977-1.16-6.094-2.7-10-3v-4c1.138,0.416,1.9,1.653,4,1v-1h2l1-2h2v-1c2.735-2.286,4.242-3.608,5-8h1c0.05-.863-1.618-3.268-2-5h2v-1c-2.078-1.094-1.771-1.611-5-2v-3h-2v-1h1v-1h-1c-0.27-1.041,1.457-1.814,1-4a2.54,2.54,0,0,1-1-3l2-1v-1h-1q0.5-3.5,1-7h1l3-4h1l-1-2h2c1.268-1.588-1.7-.831-2-1v-1h1l-1-2c0.66-1.034,3.311-.841,1-3h2v-5h-2v-4h1a2.713,2.713,0,0,0-1-3q0.5-3,1-6a26.28,26.28,0,0,1,10,3l1,2h2v1h2v1h2v1h2l1,2,3,1v1l17,5v2h6v-1h1v-3c6.073-.573,7.362-4.194,13-5V98h4Q458,93.5,457,89Z" />
        </a>
        <?php
        $kdwil = '32.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_11" data-name="Color Fill 11" class="cls-18" d="M390,168v2l2-1v2l4,3,2,3h1v-1c1.464,0.59,1.026,1.221,2,2l2-1v2h1l1,2h2l-1,2,3,1,2,3,7,1c-0.113-3.16-1.955-1.874,1-3q0.5-3,1-6h1c1.015,1.274,2.348,1.18,3,2v2l2,1v1h3l1,2h2l4,5h1l1,3h5l2,3,3,1c-0.684,3.409-2.228,4.613-3,8h3v1h1v3h1c0.04,0.375-.895,2.247-1,4h-3c0.628,2.89,1.831,2.591,2,3l-1,3h1l1,3,2-1v1h1v4l4,3-1,4c0.5,1.041,4.255,1.336,5,2-0.308,2.643-1.815,5.141,1,7v1h-1c-1.693,2.081-3.764,2.369-6,4l-2,3h-1q-1,4.5-2,9l-3,2v2l-2,1v2c-0.406.608-1.333,0.785-2,2-1.991-.649-2-1.344-4,0v-1c-1.975-1.129-2.338-1.417-3-4h-2l1-2-2-1v-1h1c-0.3-3.511-.842-1.422-2-3-0.163-1.993,1.511-.689,0-2-1.518,1.876-2.052.841-4,2l-1,2a2.734,2.734,0,0,1-3-1h-1v1l-2-1c-0.069.133,0.074,1.919-1,1l-1-3-2,1v-1h-6v-1l-2,1c-1.821-1.624,1.081-1.839-3-3l-1-3a12.71,12.71,0,0,1-5,1v-2l-2,1v-1h-1v1c-1.447-1.1-.322-0.012-1-2l-6,1-1,2h-6v1h-4v1c-1.675.292-1.746-.944-2-1H366v-1h-2v-1l-7-1v-1h1v-1h-1v-3c0.286-1.133,2.218-6.4,1-9l-4-3c-1.267-2.7,1.188-12.106,2-13,1.139-1.139,0-.4,2-1v-2l2,1v-2h1v1h1v-1c1.751-.329.927,2.054,4,0v1l2,1v-1h-1c-1.843-.95,2-1,2-1v1c1.4,0.226-.268-0.374,1-1h1l-1-2h2v-1l3-2v-2h1l-1-4a2.864,2.864,0,0,0,1-3s-1.254-.074-1-2a1.643,1.643,0,0,0,1-2h-1v-2h-1q1-2.5,2-5h-1v-1h-1v1l-2-1-1-3h3v-2l2,1v-1c1.861-1.271,2.416-1.294,3-4h-1c-0.97-1.928.828-2.974,1-4h-1v-1h1q-0.5-3-1-6l2,1c-0.945-1.8-1.385-1.574-2-4a10.6,10.6,0,0,1,4-1v1l5,1v1Z" />
        </a>
        <?php
        $kdwil = '32.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_10" data-name="Color Fill 10" class="cls-19" d="M444,163q0.5,4.5,1,9l3,1v1c1.7-.1,1.65-1.874,2-2l4,1v-1c1.233-1.148,3.47-6.711,4-7h4c1.978,2.024,6.88,2.961,11,3v2h1a26.7,26.7,0,0,0-1,4l3,1v1c1.4,0.177-.407-0.855,1-1l5,1v-2h2v2c0.8-.319,3.14-2.048,5-1v1h1v6h-1q-0.5,3-1,6h4v1h1v3h2c-0.277,2.081.06,2.868-1,4h-2v1h1c1.139,1.139,0,.4,2,1-0.255,5.1-1.393,3.494-2,8l9,3v3h2v7h-1v2h-1v4h1a1.762,1.762,0,0,1-1,2c-0.277,2.117,1,2,1,2q-0.5,8.5-1,17l-3,2v2h-1q0.5,3,1,6h-1v8l2,1q-0.5,2.5-1,5h-1v1h1v5h-2v-2l-7-1c-0.574,2.444-1.047,2.206-2,4a21.782,21.782,0,0,1-3-3c-2.248-1.017-3.891.993-5,1-1.257.007-2.549-1.768-5-1v1h-2v1l-2-1c-1.175.028-2.673,1.937-5,1l-1-2h-2v-1h-1v1h-4v1c-1.656.342-1.792-.959-2-1l-5,1v-1h-1v1c1.139,1.139.4,0,1,2h-4c-1-4-3.375-4.394-4-9,4.141-2.524,1.164-1.84,3-5l3-2q0.5-3.5,1-7l2-1v-2l6-3v-2c2.762-.723,2.237-0.279,3-3-2.187-1.563-1.992-4.117-1-7h-5l1-2h-1v-1h1v-3h-2v-2h-2v-2h1l-1-3h-4l-1-3a1.462,1.462,0,0,0,1-2l-2-1v-2h3c0.574-2.01-.12-0.865,1-2-0.62-3.159-1.57-2.106-2-3l1-3h-4l3-9-3-1v-1h-2v-1h-3v-1h-2l-2-4-3-1v-2l-5-1v-2c-3.4-.854-4.56-3.285-6-6l3-2v-1h2c1.367-1.212,1.043-4.4,1-7h1v-3l3-1v-1l4-1,3-4h1v1h1v3h-1v1h4Z" />
        </a>
        <?php
        $kdwil = '32.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_9" data-name="Color Fill 9" class="cls-20" d="M533,152q1,5,2,10h-1v9h1v3h1q1,9,2,18l-4,1q0.5,3,1,6c-3.543.317-3.949,1.314-7,2,0.82,3.548,3.261,3.638,4,6q-0.5,2.5-1,5h1a4.494,4.494,0,0,0,2,2v1h1v-1c2.618-2.364.656-2.695,2-6h1q0.5-1.5,1-3l6-1q1,2,2,4c0.813,0.707.6-.743,2,1l2-1v1h5l2-3,6,1v1h1a15.682,15.682,0,0,0-1,6,21.9,21.9,0,0,1,5,4l14,1,10-6v-6c0.054-.249,1.291-0.328,1-2h-1v-2c3.215,0.77,2.155,1.508,6,2q-0.5,5-1,10c0.712,0.859,1.386-.361,1,1l-2,1v6l-2,1v2c-1.324,2.38-3.183,3.888-4,7h-4c-0.945,1.8-1.385,1.574-2,4h-2q0.5,1,1,2h-1v2c-0.492,1-2.521.029-2,3h1v2h1v4h-1c-0.264,1.691.933,1.712,1,2v5l-4,1a9.749,9.749,0,0,1-1,4l-3-1c-0.442-1.39-1.5-2.486-1-5h1v-4l-2-1c-1.5-2.809,1.094-1.918-2-4v-1h-4q-0.5-1-1-2c-2-.458-3.539,2.47-7,3,0.77-3.215,1.508-2.155,2-6a3.978,3.978,0,0,1-2-2l-3,1v1l-6-2v-1c-1.282-.361-5.2,1.349-8,0q-0.5-1-1-2l-9-2q0.5-1.5,1-3c-2.831-.141-5.034.45-3-2-1.494-.658-2.708-0.409-4-1q0.5-1.5,1-3h-1v-1a1.613,1.613,0,0,0,1-2s-1.5-.752-1-3h1v-5h-5v-1h-1c-0.5.24-.353,1.688-2,2q-0.5-1-1-2h-1v2h-3v-3l-12,1v-3h-1c-1.781-1.932-1.825-.877-4-2v-1h-3l-1-2h-1v-2l3-1c-0.268-2.324-.24-2.523-1-4h-1c-0.97-2.9,2-4,2-4,0.079-.656-1.674-3.377-2-5-3.518-.611-4.589-1.076-5-5,2.213-2.3,1.288-4.81,1-8h-4q0.5-3.5,1-7c0.561-.326,5.817-3.733,6-4v-3l3-1,1-2h3l1-3c4.925-.506,4.761-2.606,10-3,0.6,1.176,1.722,1.537,2,2v2h1v8h1v-1h3q0.5-1,1-2c0.581-.3,3.242-0.688,4-1v-3C526.872,156.724,527.4,152.788,533,152Z" />
        </a>
        <?php
        $kdwil = '32.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_8" data-name="Color Fill 8" class="cls-21" d="M526,229h3v3l3-1v3c4.549,0.176,5.291,1.612,8,3h2v1l10,1v1h2v1c2.786,0.811,3.552-1.243,5-2v1c1.909,1.256,1.659,1.014,2,4-0.223.1-3.626,1.439-3,2h1v1l5-1v-2c5.015,2.44,10.27,4.145,11,11h-1v4h-1v1c2.739,0.644,2.276,1.309,5,2v-1h1v-3l5-1q0.5,1,1,2h3c0.683,3.305,1.753,3.839,2,8-3,.776-2.63.616-3,4,4.151,3.562.993,4.219,0,7v6h-1v2h-1v1h-9v1c-1.139,1.139-.4,0-1,2h-2c-0.624,2.613-1.06,2.846-3,4v1h-3v1c-2.285.908-6.831,1.164-9,0l-2-3h-4c-2.672,2.967-3.686.37-7,2v1c-2.022,1.386-3.092,2.356-6,3v4a10.6,10.6,0,0,1-4,1v-1h-5v-1h1q-0.5-1.5-1-3h-2q0.5-1,1-2h-2a9.749,9.749,0,0,1,1-4h-1v1c-0.8,1.8-1-4-1-4h-1v1h-1q-0.5-1-1-2h-1v1l-4-1v-1c-1.387-.279.182,0.223-1,1h-1v-1h-6v-3c-2.9-1.736-.914-1.85-2-3-0.971-1.028-1,1-1,1-1.6,1.109-.876-1.549-1-2l-3-1v-1l-2,1v-2l-2,1V267c0.515-.782,1.305.022,1-2h-1v-2h-1q0.5-5.5,1-11h-1v-1h1v-2l3-2q0.5-9,1-18s-1.274.054-1-2h1v-3a2.606,2.606,0,0,1-1-3l2-1v-3h1v-1h-1l1-3c1.135-.844.145,0.127,1-1l3,1,4-1v1a7.742,7.742,0,0,1,2,3c1.284-.637,1.41-1.624,2-2h1v1c2.234,0.086,2-1,2-1h6a12.71,12.71,0,0,1,1,5l-2,1c-0.313,1.4,1.978,1.569,2,2,0.073,1.412-.835-0.405-1,1v6Z" />
        </a>
        <?php
        $kdwil = '32.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-22" d="M497,275l1,3,2-1v2l2-1v2h1c1.592,1.613.8,1.616,4,2v2c2.784-.549.1-0.77,3,0l-1,2c1.413-.054-0.393-0.758,1-1,0.859-1.889,1,2,1,2,2.854,0.069,4.285.246,6,1v1h1v-1h4v2h1v-1c1.488-.385,1.351,1.641,2,2,1.237,0.685.275-.806,1-1,1.277-1.582.991,1.97,1,2h1v1h-1q0.5,1.5,1,3h-2v1h1v1h3q-0.5,1.5-1,3h1v1h1v-1l3,1v1h-1c-1.889.859,2,1,2,1,1.139-1.139,0-.4,2-1v2h1v-1c0.7-.651,1.769,2.785,2,3,1.012,0.945,2.06,1.189,3,0v11h-2a15.682,15.682,0,0,0-1,6l-3,1c0.97,2.347,2.085,6.549,1,8-1.139,1.139,0,.4-2,1,0.113,3.16,1.955,1.874-1,3v2l-3-1c-0.8,3.506-1.772,3.9-6,4a13.765,13.765,0,0,0-4-3q-0.5,1.5-1,3h-1v-1h-1v1c-1.587,1.354-1.737,2.169-2,5h1v1l2-1v2l2-1v2l2-1q0.5,1.5,1,3l2-1v1h2q0.5,1,1,2h2v1l2-1,2,3,2-1v1l3,1v-1h1v-1h-1q0.5-1,1-2c2.784,0.549.1,0.77,3,0v-1h1q-0.5-1.5-1-3c3.176,0.262,3.822,1.01,6,2v-1h-1v-1c0.914-.757,4.605-0.508,2-3h3v1l3-1c0.551-3.156,1.788-4.755,3-7,1.135,0.844.145-.127,1,1l3,2c-0.113,3.16-1.955,1.874,1,3a7.173,7.173,0,0,0,1,4h-1v1c1.324,1.01,3.051-.327,4,1v2c0.916,2.045,1.571,2.336,4,3v5l-2,1c-0.609,1.276.77,0.021,1,1q-0.5,1-1,2l-3,1v-2h-6c-1.383-.3.393-1.246-1-1v1l-5,1c0.167,2.553.072,3.492,1,5h1v2h1c0.069,0.33-1.806,6.949-2,8-1.169.637-1.463,1.657-2,2h-2v1h-2q-0.5,1-1,2l-2-1v1h-2v1h-5c-4.349,1.251-3.068.74-7-1v3h-4c-1.382-2.612-1.769-1.693-2-6h1v-1h3v-1h-2q-0.5-1-1-2l-5,1v1h-1v-1a32.048,32.048,0,0,1-4,1c-0.945-1.8-1.385-1.574-2-4l-9-2v-3h2v-1h-4v-7h1v-1h-1v-2h-1v-5c-3.893-.672-4.886-1.368-5-6,2.129-1.688,2.845-3.164,3-7-1.135-.844-0.145.127-1-1-2.1.4-1.234,1-4,0v-1c-2.236-.731-2.716.8-4,1l-1-2-5,1v-1c-1.459-.8-1.69-0.724-4-1v-2l-2,1-1-2h-8c-0.607-2.393-.318-1.858-2-3v-1l-3,1-1-2h-2l-1-2c-2.88-1.916-6.116-2.12-8-5h-1q-0.5-3-1-6s1.072-.076,1-2h-1v-1h1l1-3h-1c-0.583-3.127,1.361-7.746,1-9l-2-1,1-2c-0.032-.166-1.564-0.349-1-2l2-1v-4l4-3q-0.5-2.5-1-5h1c0.651-2.231.347-3.331,1-5-4.1-.857-4.959-2.681-10-3v-2a23.8,23.8,0,0,1,5,1v-1c1.475-.487,4.741-1.753,7-1v1h2v1h8l1-2h4v1l5-1,1,2,4,1c0.574-2.444,1.047-2.206,2-4,2.01,0.574.865-.12,2,1Z" />
        </a>
        <?php
        $kdwil = '32.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-23" d="M441,270c5.065,1.432,2.621,2.72,5,6l2,1v1h2l1-2h1v1h4l2,3h3q-0.5,5.5-1,11l-3,1c-0.253,4.852-2.369,4.727-2,10,0.188,2.691,2.15,7.07,1,11h-1v5h-1v3h-1c-0.858,1.425-.692,1.722-1,4l-6,1q1,3.5,2,7c-0.445.809-3.215,0.9-2,4l3,2a1.442,1.442,0,0,1-1,2l1,4h1v3l3,2c0.8,1.743-1,3-1,3-0.337,1.862,4.372,7.76,2,9h4c2.6-4,1.429-1.231,5-3l1-2h1v1c4.132,0.328,6.31.127,8-2h1v-8h1l-2-3a21.9,21.9,0,0,0,5-4h-2l1-3h2v1h1v-1h5v2l7,1v-1h1v1h2v1l3-1v1l5,1,1,4-3,2v6l5,1q0.5,7,1,14a3.978,3.978,0,0,0-2,2c-1.135-.844-0.145.127-1-1-1.719-1.127-1.355-.633-2-3h-6v1l-3,1v1c-2.567,1.781-1.912-1.082-3,3l-3,1a19.345,19.345,0,0,1-2,10c4.765,0.539,4.318,2.743,7,5v14c-0.045.215-1.464,0.319-1,2,0.158,0.572,3.337,1.5,2,5l-2,1v2c-2.578.107-3.472,0.148-5,1v1h-1v-1l-3,1v1c1.4,1.2,2.207,3.241,3,5-3.16-.113-1.874-1.955-3,1h1l-1,3h1q1,5,2,10c-0.2.46-1.8,0.3-2,2h1v2h1l3,4h-1v1h-5c-3.015-2.5-8.657-.692-13-2v-1h-6v-1h-6v-1h-5v-1h-6v-1h-6v-1h-3v-1h-4v-1l-9-1-1-2-7-1v-1h-3v-1h-5v-1l-15-2v-1c-1.139-1.139-.4,0-1-2,1.55-1.028,4.153-4.695,4-7h-1v-4c0.17-1.285,1.753-1.763,1-4l-2-1q0.5-4,1-8h-1l-1-4h1c0.331-.985-0.863-2.446,1-2,0,0,.054,2.051,1,1v-2c1.409-.116.063-0.06,1,1,1.929-1.364,1.53-.971,2-4-1.719-1.127-1.355-.633-2-3,2.269-1.286,2.637-1.628,3-5-3.539-2.413.14-3.872-2-8h2l-1-2h2q-0.5-2.5-1-5h1v-1h-1q0.5-5,1-10h-1v-1h-1l1-3c-1.413.054,0.393,0.758-1,1-0.86,1.889-1-2-1-2h-2l1-2-6-5,1-3,2,1v-2l2,1v-1h-1c-1.843-.95,2-1,2-1,0.77-3.215,1.508-2.155,2-6h-3v-2h1c0.633-2.182-2.494-1.191-3-2a18.9,18.9,0,0,0,1-4h1v1h3v-2c3.16,0.113,1.874,1.955,3-1l5,1,2-4h2l1-2c2.935-2.785,5.781-5.5,11-6,1.139,1.139,0,.4,2,1v-2h2v-1h-1l3-4c-1.413.054,0.393,0.758-1,1-0.86,1.889-1-2-1-2h1c0.123-1.222-1.484-1.642,0-4l3-2-3-9c1.643-.972,5.2-3.193,3-5h2v1c1.24-.044,1.814-1.885,4-1,0.324,0.131.208,1.348,3,2-0.868-1.728-.115-0.342-2-1v-1h2v-4h-2v-1h1v-1h-1v-1h3v-1h1l-1-2h1v-1h-1v-3Z" />
        </a>
        <?php
        $kdwil = '32.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-24" d="M409,257l5-1s-0.036.973,2,1v-1h1l1,3,2-1v2h1v-1h1v1a1.621,1.621,0,0,0,2-1l3,1v-1h-1v-1h1c1.256-1.909,1.014-1.659,4-2,1.139,1.139,0,.4,2,1-0.806,2.485-1.555,2.345,0,5h1l-1,2h2l-1,2h1v-1c1.395,0.725,1.046.984,2,2h1v2h1v-1h1v3h2v4h-1c-1.976,2.469-2.135.048-1,3h-2c-1.157,1.64,1.6.809,2,1,0.217,1.4-.771-0.4-1,1q0.5,2.5,1,5c-3.148-.463-5.734-1.25-7,0-3.218.808-3.556,2.559-6,4v2c2.512,1.365,3.605,2.333,4,6l-3,2,1,2h-2v1h1l-1,2c1.413-.054-0.393-0.758,1-1,0.86-1.889,1,2,1,2-3.042,2.079-2.24,4.736-3,7h-1c-1.341-.451.4-1.2-1-1v1h-5v1l-2-1v2c-1.993.164-.792-1.594-2,0h1v1h-1v1h-1v-1l-2,1c-0.629,1.269-1.643,1.433-2,2-0.753,1.2.862,0.432,1,1,1.565,1.293-1.954.986-2,1v-1h-1v1c-1.139,1.139-.4,0-1,2h-3v2c-3.16-.113-1.874-1.955-3,1l-5-1v2l-2-1v2h2v1h-1l2,4h1v3c-4.667,3.436,1.859,3.281-5,5v2h-3v1l7,6v2l2-1v3h1l-1,2,2,1c1.4,3.035-1,8.38-1,10h1c0.656,3.168-1.422,2.432,0,6h-2l1,2h-1v3h-1v1h1l1,3h-1v3c-0.51,1.023-3.786,1.314-3,4l2,1,1,4-2-1v2l-2-1c-0.954,1.123-.174,2.431-2,4v2l2,1q-0.5,2.5-1,5a1.969,1.969,0,0,1,1,2h-1v1h1v5h1c0.822,1.444.714,1.7,1,4l-2-1,1,2h-2c-0.132,1.408-.147.345,1,1-1.132,1.072-.008.423-2,1v2h-1l1,3h-2l-1,2c-3.646,1.515-12.733-.707-14-2-2.949-3.437.609-6.273-6-8v-1l-5-1v-1h-5v-1h-4v-1h-5v-1c-3.635-1.057-6.461,1.14-8,0h-1v-4h-1v-2h-1v-2l-3-2v-1h-2l-1-2h-2l-1-2h-3l-1-3-3-1-2-3-7-1v-1h-2v-1h-4v-1h-3l-1-2h-4v-1c-2.988-1.247-3-.424-6,0-0.463-2.391-1.158-3.145-2-5-4.286-.427-4.966-1.819-10-2q-0.5-5.5-1-11h1v-3h1v-1h-1v-1h1v-3h1c1.942-2.224,6.207-3.743,9-5l-1-4h1c1.026-3.428,1.561-4.413,2-8-4.021-2.335-5.948-7.7-6-14l3-2c0.763-1.068.843-4.351,2-5h3c3.4,2.933,7.007-.694,11,0v1h1v-1h3l1,2h2l1,3c1.016,1.186,3.179,1.589,5,2v4a3.982,3.982,0,0,1,2,2l12-4v2h2v3c1.178-.227,7.48-2.088,8-2v1l4,1v-4h1l-1-3h1c1.242-1.974,1.556-1.857,2-5-3.557-1.433-6.492-2.25-7-7,2.128-1.212,2.177-2.253,5-3q-0.5-3-1-6l2-1,1-4c3.919,0.734,4.086.717,8,0v-1h-1l1-2a12.71,12.71,0,0,0,5,1,18.659,18.659,0,0,1,3-3V284l3-1c1.9-1.531,2.633-3.824,3-7l4-1v-1h4v-1h2v-1l10,1,1-3h1v-1h-1v-1l-4,1c-0.368-2.206-.919-1.754-1-2v-9c-0.089-.169-3.722-1.45-3-2h1c1.256-1.909,1.014-1.659,4-2v-4l3-1v2c2.324-.216,2.986-1.472,6,0v1h2v1l2-1v1h1l-1,2h1v1h1v-1C409.654,254.021,408.846,256.44,409,257Z" />
        </a>
        <?php
        $kdwil = '32.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-25" d="M355,219q-0.5,7-1,14h1v2l3,2c0.951,2.206-1.19,2.8-1,4h1q-0.5,5-1,10l9,1v1h6v1l3-1v1h3v-1h5v-1l4,1v-1c1.994-1.209,1.834-1.586,5-2v1h1v3h-4a3.982,3.982,0,0,1-2,2v1l4,1c-0.085,4.042,0,8.369,1,11l4-1v4c-2.316.875-4.407,1.017-8,1v-1c-1.848-.968-4.233.579-5,1v1h-5l-1,2h-2q-0.5,2.5-1,5c-1.876.823-2.616,1.481-5,2,0.114,3.268.569,8.3-1,10-0.8,3.506-1.772,3.9-6,4-1.139-1.139,0-.4-2-1v3h-1v1l-6-1v1c-1.89,1.665-1.7,3.5-4,5,0.823,1.876,1.481,2.616,2,5-3.893.672-4.886,1.368-5,6,1.319,0.644,1.378,1.6,2,2,3.415,2.21,4.326-.667,5,5-2.934,1.661-3.1,3.241-3,8h-3v-1c-0.774-.125-6.339.984-9,1l-1-4h-2v-1h-1l-2,3h-5v1h-2v1c-1.3.549-.47-0.451-1-1-3.433-2.5-.243-2.3-2-5-0.91-1.4-2.578-.025-4-1l-1-3h-1c-2.353-2.638-1.029-2.707-6-3v1s-3.542-1.378-5-1v1h-7v-1h-8l-1,2h-4v-1c-1.245-.2-1.709,1.792-4,1v-1h-2l-1-2-2,1-1-2h-3v-1h-4v-1h-1s-1.132,1.993-3,1v-1h-1v-5h-1v1h-1v-1h-1l1-2h-4c-2.167,1.987-10.054,1.1-14,1v-4l2,1v-1a9.948,9.948,0,0,1,4-1,9.733,9.733,0,0,1,1-4l2,1v-1c1.139-1.139.4,0,1-2h4a34.651,34.651,0,0,0,1-7c-1.909-1.256-1.659-1.014-2-4a19.168,19.168,0,0,1,7-1v1l3-1v1h2v1l8,1c0.678-1.27,2.88-2.765,3-3v-5l3-2c0.807-1.642-.5-1.567-1-2,0.552-1.494.847-1.172,2-2,2.878-3,6.506-1.334,11-1q0.5-3.5,1-7h-1v-4l3-2-1-3h1v-1c1.813-.914,3.1.7,4,1,0.589-4.973,2.848-4.146,4-9h1c-0.124-1.644-1.542-1.1-2-2l1-3c1.135-.844.145,0.127,1-1h2q2.5,4,5,8c4.007,2.961,8.483.5,14,2v1l18,1v-1l3-1-1-3h1v-2l2-1v-4h1a9.354,9.354,0,0,0,2-4h-2v-1l-3,1v-2l-3,1v3h-2v-2a8.053,8.053,0,0,1-2-2l-3,1v-2h-2l-1,2-5-1v-1h-1q-0.5-3-1-6a25.023,25.023,0,0,0,6-4l1-2h6v-1l5,3v-1h2c1.376-.891-0.007-2.7,1-4C350.047,218.648,352.638,219.076,355,219Z" />
        </a>
        <?php
        $kdwil = '32.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-26" d="M240,175c3.906,0.874,5.862,3.2,6,8h-1v7l-3,1c0.844,1.135-.127.145,1,1v1l5,1v2c-1.414-.011.084-0.091-1-1l-4,3c2.316,3.482,1.765,3.019,1,8l2-1v4c-2.136,1.779-2.867,4.125-3,8h1c0.315-3.835,1.713-5.244,3-8l2,1v-1h1v3h2v2h3v1c2.283,1.748.656,0.542,2,3h1v3l2,1-1,3h1c0.608,1.973.442,2.522,1,4l4-1v3h-1c-0.5,1.323.62-.193,1,1,0.578,1.814-3.062,2.81-5,3-0.673,1.987.473,0.917-1,2v-1h-1l1,2-3,1v2l-3-1-3,4c-3.015,1.807-3.958-1.574-7,0q-0.5,1.5-1,3c-1,1-1-1-1-1-1.661-.971-0.841,1.433-1,2a7.173,7.173,0,0,1-4-1v1h-1v2l-2,1v2l-2-1-2,3h1c1.549,1.308-1.939.981-2,1q0.5,2,1,4h-1v1h1v3h1v3s2.012,0.012,1,1h-2c-0.212,4.253-.921,4.036,0,7,1.851-1.189.244-1.5,1-2h1v1l3-1v1h3l2-3c1.272-.617.013,0.792,1,1l3-1v2c2.326,1.313,3.14,3.355,5,5l2-1v2c1.078,1.284,5.4,3.163,7,4l-1,4h1v1h-1v1h2c0.067,1.413-.2-0.165-1,1a15.325,15.325,0,0,1,1,5l-10,7v2l-2-1v2l-2-1v1h-1v3l3-1v1h7c1.372-.344-0.413-0.939,1-1l3,1,1-2h3l-1,2,4,3v1h-1c0.713,1.413.778,1.147,2,2v1h1v-1l4,1c0.764-.5-0.313-1.524,1-1l1,2,3-1v2c2.862,0.654,2.578,1.824,3,2l3-1,1,2c1.009,0.3,1.829-1.519,4-1v1c3.367,0.872,4.318-1.119,6-2v1h1v3c-1.938,1.146-2.381,2.676-4,4l4,12h1a8.469,8.469,0,0,1,2,4c-3.814,2.69-1.538,6.258-4,9v1h-3l-1,2-4,1c-0.371,2.129-.982,1.944-1,2v6l-2,1c-0.522,1.67.961,1.806,1,2v4h-1c-0.137,1.408.726-.387,1,1v4c-2.349-.093-3.789.12-5-1v-2l-2,1v1c-3.418,1.189-10.071-.39-12-1H251v-1h-8v-1h-5v-1h-5v-1h-4v-1h-4v-1h-4v-1h-4v-1l-11-1v-1H196v-1H184v-1H173v-1H163v-1h-2v-1l-20,2a18.223,18.223,0,0,0-1-7l-3,1a9.749,9.749,0,0,1,1-4l3,1v-1h1c1.651-2.808,4.03-3.4,5-7a26.906,26.906,0,0,1,12,0l2-3h2l1-2h1v2h2v-5l3-1v2h3l-1-2c1.751-1.929,6.195-.384,8-3v-2h1c2.245-4.837-1.122-6.662-2-11,3.373-1.829,4.1-3.538,4-9h-1v-2h-1l-1-3h1v-3h-1c-1.246-1.944-1.612-1.859-2-5h2q-0.5-2-1-4c-2.352-1.079-3.249-2.293-6-3q1-6,2-12l2-1v-5h1c0.65-1.7.423-2.624,1-4,2.128-1.212,2.177-2.253,5-3,2.5,5.489,2.01,2.846,7,5v1l5,1,1-3h1l-1-2h1v-5l-2-1q-0.5-2.5-1-5a7.742,7.742,0,0,0,2-3c1.082,0.573,2.1,2.7,4,2v-1c1.139-1.139.4,0,1-2-3.865-2.11-4.19-4.751-4-11h-2q-0.5-1.5-1-3h-1q0.5-1.5,1-3h-1q-0.5-2.5-1-5c-2.826-.668-3.77-1.849-5-4-2.557-2.62-.616-4.415-2-8h-1q-0.5-2-1-4h-1v-1h-2q-0.5-1.5-1-3c1.289-.9,2.111-0.626,2-3h-1v-1h1v-2l4-1q0.5-1.5,1-3h-1v-5c0.264-.611,3.07-1.426,3-3h-1v-2h-2v-3h6c1.551-.464,5.2-2.831,8-2v1h2v1l3-1v1c3.567,0.915,6.734-1.456,9-1v1l4,1v-1c3.317-.931,1.989-1.164,4-3v-1h2v-1h8v-1c1.755-.644,2.606-0.429,4-1-0.941-2.758-.672-4.279,2-6v-1c1.4-.226-0.268.374,1,1C240.139,174.139,239.4,173,240,175Z" />
        </a>
        <?php
        $kdwil = '32.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-27" d="M135,205a34.651,34.651,0,0,0,7,1v2l9,1q0.5,1,1,2h6v1h3v1h9c1.547-3.668,2.745-5.821,8-6a22.109,22.109,0,0,0,4,6l2,1v2l2,1q0.5,4.5,1,9l6,4c1.447,2.173-.336,5.293,1,8l4,3v8h1a9.428,9.428,0,0,1,2,4l-5-1c-0.422,2.178-.664,2.848-2,4a8.519,8.519,0,0,0,2,4h1v2h1q-0.5,3.5-1,7c-1.8.944-1.574,1.385-4,2-2.432-3.568-1.872-.317-5-2v-1c-2.537-1.861-2.921-3.5-7-4-0.722,1.244-2.825,2.681-3,3v3h-1c-1.108,3.195-.3,4.658,0,7h-1v-1l-2,1c1.415,4.087-.811,6.962-1,13,3.788,1.384,5.481,1.072,6,6-1.022.832-1.623,0.441-2,2h1a12.555,12.555,0,0,0,2,4h1c0.37,0.811-1.668,1.96-1,4h1v3h1c0.865,1.428.667,1.729,1,4-1.586,1.251-2.8,3.353-4,5h-1v2c3.334,1.934,4.1,8.093,1,11-0.771,1.016-1.229.984-2,2h-2v-1l-3,1v2c-2.448-.558-2.21-1.043-4-2v1h-1c-0.939,1.377-.219,4.839,0,5h-2v-1l-3,1v1h-3v2c-2.209-.748-4.8-1.019-10-1l-3,4h-1v2l-8,4v3h1v-1c2.422,0.73,2.054,2.884,2,6l-3,1v1h-1v-1h-8v-1h-2v-1h-4v-1H112v-1h-7l-1-2-18,1v-1l-7-1v-2c-3.469-.618-5.168-1.648-6-5-3.115-.572-14.126-4.573-16-4v1l-5,1v-8c-0.21-1.4-1.021.414-1-1h1v-2l-5,1-1-6a1.534,1.534,0,0,0,1-2l-2-1v-2l3-1-1-7,2-1v-6h2v-4c2.069-.343,2-1,2-1h6v-1c1.665-.325,1.773.953,2,1l5-1,1-3H65v-2l-2-1c-0.74-2.2,1.532-4.894,2-7h2c4.007-6.775,11.308-5.676,15-12,1.6-1.623,3.119-7.031,2-11,0,0-.9.114-1-2-0.186-4.075.532-3.516,1-7l-3-1v-1H79l-1-2H72v-1l-4,1-1-2-11,1v4H50v-5h1v-1H50v-5c0.315-.834,2.553-0.066,2-3H51l-1-4c2.762-.723,2.237-0.279,3-3,2.762-.723,2.237-0.279,3-3h2l3-13h3l1-3c3.728-.054,5.412-2.641,7-1v-2h3v-1l3-1v-1l2-1v-2l2-1v-1h4c1.147-.652,3.567-5.3,4-7h3l1,5h1v1h7v1l3,1v-1l5-1v-3c4.275,0.245,3.408.571,6,2v1a26.263,26.263,0,0,1,4-1c1.071-4.1.467-1.208,3-3q0.5-1,1-2l6-1C131.775,200.046,134.063,200.825,135,205Zm23,50h4s0.032-2.031,1-1v2c2.875-.071,5.1.025,7-1q0.5-1,1-2l5,1q0.5-2,1-4h1q-0.5-5-1-10c-3.972-.286-6.927-1.7-10-3v2c-3.63,3.217-1.748,7.595,0,11h-1v1h-6v1h-1Q158.5,253.5,158,255Z" />
        </a>
        <?php
        $kdwil = '32.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-28" d="M71,113H69v1h1c2.541,2.488,5.039,1.166,10,1l2-3H81c-1.139-1.139,0-.4-2-1v-2l16,5v3l24-1v1h4c0.465,2.43,1.355,3.056,2,5h-1v1l2,1v2h1q-0.5,1.5-1,3h1q0.5,3,1,6c4.028-1.575,7.972-.793,12,0q0.5,1.5,1,3l4-3v1h2v3c2.739-.644,2.276-1.309,5-2v-2h2a9.749,9.749,0,0,0,1,4c2.645-.9,2.226-1.392,5,0v-1h1q0.5-2.5,1-5l4-3v-1h2c0.313-4.077,1.928-5.763,4-8l2-1q0.5-2,1-4l2-1c0.856-1.556.438-4.607,0-5h2v-5c3,0.776,2.63.616,3,4h-1q-0.5,2.5-1,5l3,1q-0.5,1-1,2h2v1h1v2l3,1q0.5,2.5,1,5c3.215,0.77,2.155,1.508,6,2a8.278,8.278,0,0,1,5-3c-0.367,1.624-2.061,4.279-2,5l2,1q-0.5,1-1,2h1v1h3l2,3h4l2,3,3-1q0.5,1,1,2l2-1q0.5,1,1,2h4q0.5,1,1,2l3,1v1l-2,1c-0.433,1.346.739-.39,1,1v1h-1v1h1q-0.5,1-1,2h2q-0.5,1-1,2h2q-0.5,1.5-1,3h1v2l2,1q-0.5,1-1,2l3,2a3.215,3.215,0,0,0,0,3l7,2q-0.5,2.5-1,5l-2,1v4c-0.549,1.3-.467-0.31-1,1h-3v1c-3.234.863-6.078-2-9,0v1h-1v3c-1.911.312-2,1-2,1l-11-1c-0.261.058-.316,1.3-2,1v-1h-5v-1c-4.078-1.236-7.7,1.374-10,2-1.365.371,0.4-.768-1-1s0.364,0.625-1,1h-4c0.611,2.376.965,2.287,2,4h1c1.185,3.163-1.6,3.186-2,4v2h-1q1,2.5,2,5h-3v2l-3,1a11.878,11.878,0,0,1-1,5c-3.9-2.122-3.031-1.943-8-1-0.989,4.405-3.394,5.161-9,5v-1h-5v-1h-2v-1h-5q-0.5-1-1-2l-5,1v-1h-2l-2-3c-1.723-.793-1.537.628-2,1l-5-3v-2h-1v-2l-3-1v-1c-4.417-1.647-6.044,2.449-10,3-0.826,3.2-1.179,2.9-5,3-1.419-2.126-2.617-2.023-5-3v4l-7,1v-1c-2.936-.749-6.677-0.562-9-1l-1-6H91l-5,7-5,1v1c-1.374.89-1.741,0.744-4,1-1.977-2.307-5.571-2.114-10-2l-1-4-3-1v-6H62c-1.139-1.139,0-.4-2-1l-1-4H58a2.516,2.516,0,0,1,1-3V175H58c-0.867-3.241,1.367-5.006,1-7H58v-4l-2-1,1-4-3-2v-3H53c-0.988-3.056.345-7.057,1-9h1c0.164-1.405-.844.406-1-1-0.225-2.028.538-1.206,1-2v-1H54v-4h7c1.544-3.28,2.862-3.864,3-9l-3-1v-4l-2-1v-6H58v-2h1a11.257,11.257,0,0,1,10-9l1,3h1v5Zm57,45c-0.373,4.465-.628,2.915,0,7h4c1.094,2.078,1.611,1.771,2,5h2c0.857,4.1,2.681,4.959,3,10-1.975,1.129-2.338,1.417-3,4,4.864-.216,3.385-1.068,7-2l2,3h1c2.18,2.991.762,3.788,6,4q0.5-1.5,1-3h-1q0.5-3,1-6l-2-1q-0.5-2.5-1-5h-1q0.5-3.5,1-7h1q-0.5-2-1-4h-1v-4h-1c-2-2.457-1.675-1.918-6-2-1.139,1.139,0,.4-2,1v-2h1v-1h-1v-3h-1v-1h-4c-0.844,1.135.127,0.145-1,1v6h-1v1h-3C128.861,157.861,130,158.6,128,158Z" />
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
                    url: "ambil_jabar_kiri.php",
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