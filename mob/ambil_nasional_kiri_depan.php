<?php

include '../koneksi.php';
include 'capaian_provinsi.php';
include 'fungsi_tes.php';
include 'fungsi_warna_kab.php';
include 'legenda_peta.php';

$kd_indi = '9';

$tahun_mak = $_POST['tahun'];


// tahun kecil

$cekthnmin = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 2 AND   kd_indi_pilar = '$kd_indi' ORDER BY tahun_indi_pilar ASC LIMIT 1");

$acekthnmin = mysqli_fetch_assoc($cekthnmin);

$tahun_kecil = $acekthnmin['tahun_indi_pilar'];


$cekthn_b = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 2 AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar < $tahun_mak ");

$cekjum = mysqli_num_rows($cekthn_b);

if ($cekjum  == 2) {

    $cekthn_a = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 2 AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar < $tahun_mak ORDER BY tahun_indi_pilar DESC LIMIT 1 ");

    $acekthn_a = mysqli_fetch_assoc($cekthn_a);

    $tahun = $acekthn_a['tahun_indi_pilar'];
} else {

    $cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 2 AND   kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar < $tahun_mak ORDER BY tahun_indi_pilar DESC");

    $acekthn = mysqli_fetch_assoc($cekthn);

    $tahun = $acekthn['tahun_indi_pilar'];
}

$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

$nil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah ='1' AND kd_indi_pilar = '$kd_indi' ");

$as = mysqli_fetch_assoc($nil);

$n = $as['nilai_indi_pilar'];

$sumber = $as['sumber'];

?>

<?php if ($kd_indi != 4) : ?>
    <?php if ($cekjum == 1) : ?>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
            &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>&nbsp;&nbsp;SETIAP PROVINSI
            <a href="#indikator"><img src="../assets/img/kanan.png" width="3%" id="kanan_peta"><a>
        </h5>

        <div class="container text-center">
            <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    CAPAIAN NASIONAL: <?php capaian_prov($n, $kd_indi); ?><?= $n; ?></span>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    <?php endif; ?>
    <?php if ($tahun > $tahun_kecil) : ?>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
            <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
            &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>&nbsp;&nbsp;SETIAP PROVINSI
            <a href="#indikator"><img src="../assets/img/kanan.png" width="3%" id="kanan_peta"></a>
        </h5>

        <div class="container text-center">
            <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    CAPAIAN NASIONAL : <?php capaian_prov($n, $kd_indi); ?><?= $n; ?></span>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    <?php endif; ?>

    <?php if ($tahun == $tahun_kecil) : ?>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
            &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>&nbsp;&nbsp;SETIAP PROVINSI
            <a href="#indikator"><img src="../assets/img/kanan.png" width="3%" id="kanan_peta"></a>
        </h5>

        <div class="container text-center">
            <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
            <div class="row">
                <div class="col">

                </div>
                <div class="col">
                    CAPAIAN NASIONAL : <?php capaian_prov($n, $kd_indi); ?><?= $n; ?></span>
                </div>
                <div class="col">

                </div>
            </div>
        </div>
    <?php endif; ?>
<?php endif; ?>

<div class="container-fluid text-center">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="95%" height="95%" viewBox="0 0 1123 435">
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
                .cls-29,
                .cls-3,
                .cls-30,
                .cls-31,
                .cls-32,
                .cls-33,
                .cls-34,
                .cls-35,
                .cls-36,
                .cls-37,
                .cls-38,
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

                .cls-15 {

                    filter: url(#filter-15);
                }

                a:hover .cls-15 {
                    fill: #d5d5d5f3;
                }

                .cls-16 {

                    filter: url(#filter-16);
                }

                a:hover .cls-16 {
                    fill: #d5d5d5f3;
                }

                .cls-17 {

                    filter: url(#filter-17);
                }

                a:hover .cls-17 {
                    fill: #d5d5d5f3;
                }

                .cls-18 {

                    filter: url(#filter-18);
                }

                a:hover .cls-18 {
                    fill: #d5d5d5f3;
                }

                .cls-19 {

                    filter: url(#filter-19);
                }

                a:hover .cls-19 {
                    fill: #d5d5d5f3;
                }

                .cls-20 {

                    filter: url(#filter-20);
                }

                a:hover .cls-20 {
                    fill: #d5d5d5f3;
                }

                .cls-21 {

                    filter: url(#filter-21);
                }

                a:hover .cls-21 {
                    fill: #d5d5d5f3;
                }

                .cls-22 {

                    filter: url(#filter-22);
                }

                a:hover .cls-22 {
                    fill: #d5d5d5f3;
                }

                .cls-23 {

                    filter: url(#filter-23);
                }

                a:hover .cls-23 {
                    fill: #d5d5d5f3;
                }

                .cls-24 {

                    filter: url(#filter-24);
                }

                a:hover .cls-24 {
                    fill: #d5d5d5f3;
                }

                .cls-25 {

                    filter: url(#filter-25);
                }

                a:hover .cls-25 {
                    fill: #d5d5d5f3;
                }

                .cls-26 {

                    filter: url(#filter-26);
                }

                a:hover .cls-26 {
                    fill: #d5d5d5f3;
                }

                .cls-27 {

                    filter: url(#filter-27);
                }

                a:hover .cls-27 {
                    fill: #d5d5d5f3;
                }

                .cls-28 {

                    filter: url(#filter-28);
                }

                a:hover .cls-28 {
                    fill: #d5d5d5f3;
                }

                .cls-29 {

                    filter: url(#filter-29);
                }

                a:hover .cls-29 {
                    fill: #d5d5d5f3;
                }

                .cls-30 {

                    filter: url(#filter-30);
                }

                a:hover .cls-30 {
                    fill: #d5d5d5f3;
                }

                .cls-31 {

                    filter: url(#filter-31);
                }

                a:hover .cls-31 {
                    fill: #d5d5d5f3;
                }

                .cls-32 {

                    filter: url(#filter-32);
                }

                a:hover .cls-32 {
                    fill: #d5d5d5f3;
                }

                .cls-33 {

                    filter: url(#filter-33);
                }

                a:hover .cls-33 {
                    fill: #d5d5d5f3;
                }

                .cls-34 {

                    filter: url(#filter-34);
                }

                a:hover .cls-34 {
                    fill: #d5d5d5f3;
                }

                .cls-35 {

                    filter: url(#filter-35);
                }

                a:hover .cls-35 {
                    fill: #d5d5d5f3;
                }

                .cls-36 {

                    filter: url(#filter-36);
                }

                a:hover .cls-36 {
                    fill: #d5d5d5f3;
                }

                .cls-37 {

                    filter: url(#filter-37);
                }

                a:hover .cls-37 {
                    fill: #d5d5d5f3;
                }

                .cls-38 {

                    filter: url(#filter-38);
                }

                a:hover .cls-38 {
                    fill: #d5d5d5f3;
                }
            </style>
            <filter id="filter" x="845" y="172.594" width="75" height="53.531" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="899.875" y="183" width="74.125" height="88" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="960" y="235" width="84" height="56.062" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="1027.88" y="246" width="78.18" height="49" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="961.812" y="187" width="145.188" height="76" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="1029" y="279" width="78.59" height="102" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="757" y="236.625" width="209" height="129.375" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="723" y="112" width="105" height="116" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="643" y="238" width="74" height="74" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="608" y="217" width="58" height="128" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="594" y="195" width="26" height="59" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="610" y="141.375" width="96.188" height="100.625" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="650" y="149" width="53" height="16.125" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="697" y="67" width="85" height="97.438" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="481" y="111" width="117" height="116.031" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="492" y="205" width="53" height="63" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="498" y="70.813" width="77" height="76.188" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-18" x="411" y="155" width="114.125" height="98" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-19" x="366" y="126" width="122" height="115" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-20" x="598" y="357.406" width="143" height="66.594" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-21" x="527.875" y="359" width="74.125" height="23" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-22" x="495" y="359" width="27" height="18" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-23" x="412" y="329" width="116" height="46" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-24" x="393" y="348" width="16.594" height="13.125" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-25" x="359" y="320" width="71" height="41" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-26" x="309" y="309" width="54.031" height="43" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-27" x="315.875" y="313" width="5.125" height="5" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-28" x="278" y="308.906" width="38" height="23.094" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-29" x="278.875" y="207.875" width="82.125" height="42.125" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-30" x="244" y="259" width="56" height="59" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="0.667" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-31" x="210" y="209.906" width="91.031" height="75.094" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-32" x="185" y="225" width="61" height="75" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-33" x="188" y="190" width="75" height="44.375" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-34" x="239" y="61" width="134" height="126" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-35" x="163" y="119" width="85" height="77.906" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-36" x="129" y="152" width="74" height="98" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-37" x="96" y="76" width="74" height="112" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-38" x="49" y="34" width="72" height="93" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" in="SourceAlpha" />
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
        $kdwil = '96';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Papua_Barat_Daya" data-name="Papua Barat Daya" class="cls-1" d="M872,177c-2.826-.668-3.77-1.849-5-4,5.149-1.05,13.3-.467,14,6-1.135.844-.145-0.127-1,1-3.006-1.044-3.935-1.295-7,0v-1C871.861,177.861,872.6,179,872,177Zm-5,2-7-1q0.5-2,1-4a9.749,9.749,0,0,0,4-1Q866,176,867,179Zm2,2,3-1v3c-1.135-.844-0.145.127-1-1-1.413.054,0.393,0.758-1,1C869.14,184.889,869,181,869,181Zm50,5-3,1q0.5,2,1,4h-2v1l-2-1v1h-1v6l3,1c-0.155,3.665-.635,3.913-2,6h-1v6h-1q-0.5,3-1,6h-1v1h1q0.5,3,1,6h-1c-0.771,1.016-1.229.984-2,2-2.01-.574-0.865.12-2-1-2.716-1.164-4.18-1.78-5-5h-2c-0.734-3.919-.717-4.086,0-8h-3q0.5-1.5,1-3c-2.731.277-2.75,1.15-6,0v-1h-4v-1h-2v-1l-3-1v2l-8-1q0.5-1.5,1-3c-4.864-.216-3.385-1.068-7-2-0.218-4.873-.623-3.9,0-8l-3,1v-1c-1.82-.65-2.987-1.329-4,0v-2a40.116,40.116,0,0,0,9-1v3h1c1.6,1.735,2.079,2.071,4,1v1h1v4h-1v3c5.4-.494,5.151-2.937,6-8,0.234-1.4.989,0.414,1-1h-1v-2l15-2v-1c1.139-1.139.4,0,1-2,2.633-.7,3.193-1.591,5-3v-1h2v-1l12-1a13.765,13.765,0,0,0,4,3Q919.5,184.5,919,186Zm-60,27v2h1a26.7,26.7,0,0,0-1,4h-2q-0.5,1-1,2c-2.533.875-8.739-2.484-11-3v-2c2.737-.558,4.835-2.472,7-3a1.634,1.634,0,0,1,2,1Z" />
        </a>
        <?php
        $kdwil = '92';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Papua_Barat" data-name="Papua Barat" class="cls-2" d="M920,183l6,2v1l2-1v2h1q0.5,1,1,2l2-1c3.249,1.113,8.283,1.051,13,1a3.982,3.982,0,0,0,2,2,12.71,12.71,0,0,0-1,5h2q-0.5,1-1,2c0.345,0.965,4.43,2.506,4,6h-1c-0.165,1.2,1.484,1.527,0,4l-3,2v5h1v9c1.142,3.362,4.006,5.246,5,9h2c-1.01,3.129-.557,1.518,0,5h2q-0.5-4-1-8h3c0.507,9.907,4.887,18.465,1,24l13,3a27.116,27.116,0,0,0,1,4l-4,2q0.5,1,1,2l-3,1c-0.066,1.413.018-.018,1,1-0.744,1.381-.745,1.163-2,2v1h-1c-0.329-.273.192-1.761-1-1-0.563.359-.773,1.362-2,2v-2l-2-1v-4c1.135-.844.145,0.127,1-1l6,1v-1a42.015,42.015,0,0,1-8-1c-0.945.583-1.2,2.792-3,3l-2-3c-2.013-.635-3.538,1.611-5,2v-1h-1c-0.913-1.54.56-1.645,1-2-0.946-2.093-1.243-1.629-4-2-1.139,1.139,0,.4-2,1a9.836,9.836,0,0,0-3-6c-1.828,2.487-.763,1.288-4,1,0.755-2.229.991-4.054,1-9h2c0.558-.282,1.277-2.7,3-3v1h1l-2-3a10.6,10.6,0,0,1-4,1,46.016,46.016,0,0,0-1,9h-3v1c1.139,1.139.4,0,1,2l-4-1v1h2v3c-0.269.66-2.379,0.485-2,2h2c-0.458,1.708-3.794,2.388-3,3h2c-0.55,2.028-.762,2.816-2,4h-2v1h1c1.139,1.139,0,.4,2,1v3h-4v-2c-2.078-1.094-1.771-1.611-5-2v1h-3q-0.5-1.5-1-3h-1q-0.5-3.5-1-7h-1c-0.47-1.479,1.09-3.919,1-4h-2c-0.79-4.627-.787-4.373,0-9l-3-2v-1l-2,1q-0.5-1.5-1-3c-2.821-1.7-5,.436-7-1-1.139-1.139-.4,0-1-2,1.139-1.139.4,0,1-2l8-1s0.013,1.154,2,1v-1c3.851-.169,2.868,3.99,6,2,2.019-.562,2.82-0.756,4-2q-0.5-1-1-2h2c3.293-2.587.508-3.551,7-4,2.569,4.594,7.062,3.056,12,2q-0.5-1-1-2l3-1q0.5-2,1-4c-0.679-1.24-1.276.387-1-1h1v-2l-3,1v1h-3v1H926v1c-1.443.249-.577-1.237-4,0v1a1.609,1.609,0,0,1-2-1,1.774,1.774,0,0,0-2,1h-1v-1c-1.415.2-1.507,0.805-4,1,0.224-1.4.021,0.02,1-1-0.4-1.406-1.19-2.677-2-1h-1v-2h-1q0.5-4.5,1-9h1v-5h1v-2h1v-2h1c0.92-1.391.644-1.761,1-4l-3-1q-0.5-3-1-6h5v-2h1q-0.5-1.5-1-3h1c1.139-1.139,0-.4,2-1v-3Zm44,41-3-1q-0.5-3-1-6c1.135-.844.145,0.127,1-1l2,1v1h1v2h-1A26.7,26.7,0,0,1,964,224Zm-12-1q-0.5-2-1-4c1.8-.945,1.574-1.385,4-2v1h1v3h-1v1h1v1h-4Z" />
        </a>
        <?php
        $kdwil = '94';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Papua_Tengah" data-name="Papua Tengah" class="cls-3" d="M999,242c4.1,1.1,1.04.714,3,3h1v1c1.45,1.1,2.35.018,4,2h1v-1l3,1c0.33-1,.67-2,1-3l3,1c0.33-.667.67-1.333,1-2,0.67,0.333,1.33.667,2,1v-1c1.08-.974,1.05-0.523,0-2h2v-1c1.32-.937,1.78-0.743,4-1,0.33,1,.67,2,1,3,2.34-.707,2.07-1.145,5,0v1h8v6h1v2h1c-0.33.667-.67,1.333-1,2,1.67,0.333,3.33.667,5,1v6h-6c-0.33,1-.67,2-1,3l-5,1c-0.61,1.581-.34,2.918-1,5h-1v7h-1v2h-1c-0.59,1.287.49,0.539,1,1,1.13,1.975,1.42,2.338,4,3v5h-2c-0.77.327-.4,2.2-2,2v-1h-1v1h1c1.14,1.581-2.46.931-3,1v-1h-3c-0.33-.667-0.67-1.333-1-2h-2v-1l-3,1v-2c-1.99-.2-0.87,1.6-3,0-0.33-.667-0.67-1.333-1-2h-1v1l-6-1v-1c-0.67.333-1.33,0.667-2,1v-2c-3.2-.631-1.97-1.486-3-2-0.67.333-1.333,0.667-2,1-2.133-1.2-4.753-3.634-7-2q-0.5-1.5-1-3l-2,1v-1h-5v-1h-5v-1h-1v1c-5.375,1.167-9.6-4.159-11-2v-2h-1v-3c3.1-2.057,3.73-6.03,7-8v-1c-2.845-.463-4.806-2.082-7-3h-3v-1h-3v-1h1v-1h-1q0.5-1,1-2-0.5-5-1-10h4c0.051,3.944.614,5.474,3,7v1h1v-1h1q0.5,1,1,2h10l3-5h2v-1l3-2v-2l2,1v-3h-1c-1.843-.95,2-1,2-1q0.5-1,1-2l3,1C996.439,238.465,998.138,238.788,999,242Z" />
        </a>
        <?php
        $kdwil = '95';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Papua_Pegunungan" data-name="Papua Pegunungan" class="cls-4" d="M1045,246c0.33,1,.67,2,1,3h4v-1h1a1.67,1.67,0,0,0,2,1v-1h1v1h1v-1h1c0.33,0.667.67,1.333,1,2h2v1c2.14,0.8,3.01-1.366,4-1,0.33,0.667.67,1.333,1,2h4v1h1a1.466,1.466,0,0,1,2-1c0.33,0.667.67,1.333,1,2h6v1h3v1h2v1h3v1c1.48,0.523,3.92-1.093,4-1v2l3,1v3c4.29-.083,9.14.261,12-1v1c1.5,1.686,1,5.819,1,9v23c-2.72-.62-2.83-1.934-3-2l-6,1c-0.33-.667-0.67-1.333-1-2l-6,1v-1h-2v-1l-3,1c-0.33-.667-0.67-1.333-1-2l-3,1c-0.33-.667-0.67-1.333-1-2l-3,1v-1h-4v-2c-3.16.113-1.87,1.955-3-1l-3,1c-0.33-1-.67-2-1-3-0.67.333-1.33,0.667-2,1v-2h-1c-0.33-.667-0.67-1.333-1-2l-6,1h-6v-1h-2v-1l-4,1v-2h-13v1h-1v-1h-2c0.84-1.135-.13-0.145,1-1-0.33-.667-0.67-1.333-1-2h2c-0.37-1.189-1.05-5.337,0-8h1v-2h1c0.33-1,.67-2,1-3l3,1v-1h1c0.64-1.128.06-2-1-2v-1h2v1h5v-2c0.67,0.333,1.33.667,2,1v-2a7.731,7.731,0,0,1-2-3h-1v1c-0.86,1.889-1-2-1-2-2.21-1.377-2.7-2.622-3-6C1042.86,247.784,1041.38,246.932,1045,246Z" />
        </a>
        <?php
        $kdwil = '91';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Papua" class="cls-5" d="M978,187a19.149,19.149,0,0,1,7,2q-0.5,1.5-1,3c-3.428-.871-2.575-2.068-6-3v-2Zm9,1c1.857,1.052,3.071,4,5,2v3c1.2,1.891,4.739,3.058,7,4v1h-1v1h-6v-1l-4,1v-1c-1.016-.771-0.984-1.229-2-2C986.811,193.218,985.812,191.329,987,188Zm-23,4c3.893,0.672,4.886,1.368,5,6l-3,1v1h-1v-1C959.615,197.192,962.273,195.058,964,192Zm3,13h10a10.6,10.6,0,0,1,1,4h-1v-1a1.434,1.434,0,0,0-2,1l-7-1v-1C966.861,205.861,967.6,207,967,205Zm73,5,3-1v2c1.41,0.014.34,0.253,1-1,1.23,1.126.43-.03,1,2l8,1,3,4,6,1v1h2c0.33,0.667.67,1.333,1,2l3-1v2l6,2v1c0.67-.333,1.33-0.667,2-1v2c0.67-.333,1.33-0.667,2-1v2l3-1v1h4a1.506,1.506,0,0,1,2-1c0.33,0.667.67,1.333,1,2h2v1c1.67-.333,3.33-0.667,5-1v1c2.28,0.638,3.31.345,5,1-0.33,1-.67,2-1,3h8v28c-2.61,1.382-1.69,1.769-6,2v-1c-1.74-.794-1.58.754-2,1l-5-1v-1h-1v-3l-4,1c-0.33-.667-0.67-1.333-1-2-1.22-.719-0.37.826-1,1-1.39,1.45-.96-1.846-1-2-2.4-.119-5.05-1.645-6,0v-2c-5.66-1.088-10.68-3.938-16-2v-3h-2v2c-0.67-.333-1.33-0.667-2-1v1h-4c-0.33-.667-0.67-1.333-1-2l-10-1c0.33-.667.67-1.333,1-2h-1v1c-2.65,1.715-4.05-.8-5,1h-1v-2h-1c-0.33-.667-0.67-1.333-1-2-0.91.046-4.63,2.021-7,1-0.33-.667-0.67-1.333-1-2-0.67.333-1.33,0.667-2,1-0.67-1-1.33-2-2-3h-1v1h-3v1c-0.67-.333-1.33-0.667-2-1v1c-2.62,1.643-1.13,2.169-2,3-1.51-.319-1.61-0.916-4-1v2h-1v-1c-1.41-.155.39,0.734-1,1h-4v1h-1v-1h-4v-1h-1c0.33-.667.67-1.333,1-2h-2c-0.077-1.405,1.51-1.732,0-4h-1l-3-4c-2.551-1.576-1.884,1.071-4-2l5-1q0.5-2.5,1-5h1c1.62-3.736.109-4.5,5-5v1h4v1h1c0.33-.667.67-1.333,1-2l4-1v-2c3.24,1.163,2.52.627,6,0-0.7-3.377-2.17-3.852-3-7,5.7-.52,7.03-3.815,12-5v-2l3,1v-1h4c0.67,1,1.33,2,2,3h1v-1C1040.4,206.569,1039.95,209.83,1040,210Zm-56-1h13v2l2-1v2h1v-1c4.15-.673,8.12.467,11,1v3h-3v-1c-0.9-1.87-1,2-1,2l-8-1-2,1v-1h-1l-2,1q-0.5-1-1-2l-3,1v-2l-5-1v-1C983.861,209.861,984.6,211,984,209Z" />
        </a>
        <?php
        $kdwil = '93';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>id="Papua_Selatan" data-name="Papua Selatan" class="cls-6" d="M1096,370c-3.27-.906-4.72-3.085-7-5v-1h-2c-0.33-.667-0.67-1.333-1-2h-1c-0.67-1-1.33-2-2-3-2.26-1.206-8.84.028-12,1v1c-3.77.855-3.25-1.712-4-2l-8,1v-5l3-1c0.16-3.619.58-3.976,2-6h1c0.22-.4.71-3.334,1-4h-2v1h-4c-0.33-1.333-.67-2.667-1-4-0.67-.333-1.33-0.667-2-1,0.33-1,.67-2,1-3h-1a8.264,8.264,0,0,0-5-3v-2c0.67-.333,1.33-0.667,2-1v-1h-1c0.33-2,.67-4,1-6-2.3-1.309-5.97-4.56-7-7v-4c-1.08-2.691-2.54-2.5-3-7h-2v-2h-2v-5c-4.29-1.146-2.92-3.293-8-4-0.77-3.215-1.51-2.155-2-6,2.4-1.049,3.21-1.12,4-4-1.8-.945-1.57-1.385-4-2-0.33-1-.67-2-1-3h4v-1l11,1v1h5v1h13l3,4h2v1h3v1h3v1h4v1h4v1h4v1h4v1c4.59,1.408,13.07-.68,16,2,2.05,2.27,1.09,18.217,1,23h-1c-0.43.532-2.85,10.217-2,12,1.33,1,2.67,2,4,3a1.418,1.418,0,0,1-1,2v1h1v10c0,9.775,1.87,27.446-1,35h-2C1101.53,376.793,1097.26,375.594,1096,370Zm-39-23h4c-0.33,2-.67,4-1,6-5.55,1.781-.75,1.542-3,5-0.91,1.4-2.57.025-4,1-0.33,1-.67,2-1,3l-3,1v1c-1.74,1.4-2,1.593-5,2-2.05-1.885-9.22-1.1-13-1,0.33-2,.67-4,1-6,0.67-.333,1.33-0.667,2-1v-3h1v-2c0.67-.333,1.33-0.667,2-1v-2q3.495-3,7-6l12-1c0.84,1.135-.13.145,1,1v3Zm-1,14c0.33,1.333.67,2.667,1,4h-4v-3h1C1055.14,360.861,1054,361.6,1056,361Z" />
        </a>


        <?php
        $kdwil = '81';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Maluku" class="cls-7" d="M848,239c3.057,0.6,2.38,1.727,3,2h6v1h1v-1h4l2,3h2c1.191,1.053.9,2.769,1,5h2q-0.5,1-1,2h4q0.5,2.5,1,5h-1v4c-6.221-.17-6.193-3.216-10-5h-3v-1h-2v-1h-3v-1c-1.556-1.3-1.363-.523-2-3l-11-1v1c1.719,1.127,1.355.633,2,3l-14-3v-3c-4.153.266-6.119,1.413-7,5l-5,1v-1a8.278,8.278,0,0,1-3-5h-2v-3h-2v-4c4.05-1.511,11.386-1.049,17-1v-1h1v1l3-1c0.353,3.736.3,3.609,4,4,1.455-2.507.955-.671,3-2q0.5-1,1-2c3.609-1.633,7.444,2.681,9,0v2Zm-39,1q-0.5,4.5-1,9l-3-1c0.087-2.408.506-2.469,1-4-0.917-1.27-2.53-.736-4-3,2.078-1.094,1.771-1.611,5-2C808.139,240.139,807,239.4,809,240Zm-24,10h4v6c-4.63.46-4.579,2.383-9,3v2c-1.366-.366.362-0.62-1-1l-3,1v-1h-2v-1c-5.085-2.319-10.587-3.14-12-9h-1v-5l5,1q0.5-1,1-2h3v-1h10q0.5,1,1,2c2.09,0.706,2.863-.631,4-1v3h-1Q784.5,248.5,785,250Zm16-6c-0.1,3.761-.9,4.59-2,7-2.01-.574-0.865.12-2-1-2.762-.723-2.237-0.279-3-3C796.531,245.975,798.3,244.684,801,244Zm13,9v3c-3.942.287-5.445,1.614-8,3v-3C809.52,255.353,810.873,253.814,814,253Zm-24,10h-3v-1c-1.139-1.139-.4,0-1-2,1.135-.844.145,0.127,1-1,2.01,0.574.865-.12,2,1h1v3Zm96,6h-3a21.928,21.928,0,0,0-4-5q0.5-1.5,1-3c1.135,0.844.145-.127,1,1a7.742,7.742,0,0,1,2,3h1c0.563-.572.14-3.906,2-3v1a8.445,8.445,0,0,1,2,3h-1Q886.5,267.5,886,269Zm-33,9c-2.782-.013-6.079-1.6-7,0v-2l6-1Q852.5,276.5,853,278Zm38-2,3,1v1h-1c-1.139,1.139,0,.4-2,1v-3Zm10,18q-0.5,1.5-1,3h-3q0.5-1.5,1-3h3Zm22,9c-0.578,3.878-1.082,6.266-4,8v1c-0.95,1.843-1-2-1-2h-4v-2c-2.078,1.094-1.771,1.611-5,2,0.485-2.278,4.46-8.189,2-10h3a1.8,1.8,0,0,0,0-3h3c0.627,2.963,1.778,2.481,2,3,0.537,1.256.332,4.059-1,4v1h2c0.38-3.541,1.241-3.036,2-6l3-1v-1h-1q0.5-1.5,1-3c1.139,1.139.4,0,1,2h1q-0.5,3-1,6h-1C923.861,303.139,925,302.4,923,303Zm43,8-3-1q0.5,1.5,1,3h-2v1h-1c-0.034,1.582,2.379,1.792,0,3v1c1.223,1.575,1.837-1.08,3,3h2c-1.093,2.465-2.339,4-3,7-2.248-.513-6.456-2.626-9-1v1c-1.139,1.139-.4,0-1,2h-2v1l-4-2a15.682,15.682,0,0,0,1-6h2q0.5,1.5,1,3h1v-2h-1v-3h-1c-0.924-1.48-.887-2.457-1-5h1v1a13.765,13.765,0,0,1,3,4c1.836-1.277.115-1.349,1-2h1v1l3-1q-0.5,1-1,2h1v-1c1.139-1.139.4,0,1-2l-3-1v-1l-7-1q0.5-1.5,1-3h-1c-1.139,1.139,0,.4-2,1q0.5-1.5,1-3h4v-1c-1.139-1.139-.4,0-1-2h-2q1-4.5,2-9c1.8,0.944,1.574,1.385,4,2v-4c1.8-.945,1.574-1.385,4-2,0.957,1.427,1.4,2.738,3,1v5C964.555,302.2,965.3,307.027,966,311Zm-57-12c-0.64,2.743-1.9,3.69-3,6h-3C903.654,300.473,903.7,299.138,909,299Zm49,0c1.139,1.139,0,.4,2,1C958.861,298.861,960,299.6,958,299Zm-58,1q-0.5,2-1,4h-2a9.749,9.749,0,0,0-1-4h4Zm61,2c-2.393.607-1.858,0.318-3,2h1v-1h1v1C961.654,304.979,960.846,302.56,961,302Zm-5,7q-0.5,1.5-1,3h1q0.5-1.5,1-3h-1Zm-104,7c2.762,0.723,2.237.279,3,3h-3v-3Zm36,9h3v4c-3,1.973-.941,2.825-5,4C886.286,329.463,887.348,328.116,888,325Zm-45,1v3h-3C840.723,326.238,840.279,326.763,843,326Zm114,3h3v1h-1c-1.139,1.139,0,.4-2,1v-2Zm-125,3h3q-0.5,1.5-1,3c-1.135-.844-0.145.127-1-1C831.861,332.861,832.6,334,832,332Zm56,2,4,1v1a2.6,2.6,0,0,0,3-1l4,1v1h-1v1h1c1.889,0.86-2,1-2,1v1h-1v-1l-4,1c-0.776,2.2-1.18,6.812-2,9l-3,1c-0.909,3.789-2.209,3.189-5,5v1l-3,1q0.5-3,1-6h2v-1c-1.135-.844-0.145.127-1-1a22.854,22.854,0,0,1-4-1q-0.5,1-1,2h-2v-2l-3-1v-3h2v1h1q0.5-1,1-2l5-1q0.5-1,1-2l3,1q0.5-3,1-6C888.16,335.113,886.874,336.955,888,334Zm-66,4h-2v-3h1v1C822.139,337.139,821.4,336,822,338Zm-29,7v2h1v-1c1.581-1.142.931,2.458,1,3h-1v-1l-3,1q0.5-1.5,1-3s-2.141-.164-1-1h2Zm54,0v3l-3-1v-1h1C846.139,344.861,845,345.6,847,345Zm-69,4v2l-5,1q-0.5,1.5-1,3c-7.922-.153-9.378-1.489-15,1v-3c1.139-1.139.4,0,1-2,1.488-.519,3.287-1.516,6-1v1h1v-1h4v-1l6-2C776.127,348.719,775.633,348.355,778,349Zm74,0,4,1v3h-3v-1h-1v-3Zm-3,4a9.749,9.749,0,0,1-1,4h-2c-0.945-1.8-1.385-1.574-2-4,1.135-.844.145,0.127,1-1A10.6,10.6,0,0,0,849,353Zm-59,7h-4a9.749,9.749,0,0,1,1-4c2.01,0.574.865-.12,2,1h1v3Zm9,3v-3h1c1.139-1.139,0-.4,2-1v-1h1v1h7v1h1c-1.139,1.139,0,.4-2,1v1Zm23-4,8,1q0.5,1,1,2h1v1h-1v1h-3v-1l-7-2Q821.5,360,822,359Zm53,3q0.5-1.5,1-3h1v3l-5,4v-3h1C874.139,361.861,873,362.6,875,362Z" />

        </a>
        <?php
        $kdwil = '82';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Malut" class="cls-8" d="M821,112v2l2,1-3,8-6,2v-1c-2.079-2.134-1.353-4.591-1-7h1q0.5-1.5,1-3Zm-15,11q-0.5,2.5-1,5l-2-1v3c4.92,2.154,4.274,4.094,4,11l-5,6h-2q-0.5,1-1,2h-1v3h-2c-0.173-2.561-.086-3.48-1-5h-1v-2h-1q0.5-1.5,1-3h1v-2h1q0.5-4.5,1-9C800.751,128.69,801.118,124.311,806,123Zm7,28v2h-2v1h1c1.9,3.439,4.738,4.861,10,5v5c-6.025-.534-9.848-2.832-17-3a12.71,12.71,0,0,0-1,5h1q-0.5,3.5-1,7h1v2h1v4l6,10h-3c-1.139-1.139,0-.4-2-1q-1-3.5-2-7c-1.876-.823-2.616-1.481-5-2q-0.5-1.5-1-3h1v-5h1c0.077-1.412-.779.4-1-1q0.5-3,1-6c-2.393-.607-1.858-0.318-3-2h-1q-0.5-2.5-1-5h1c0.463-2.391,1.158-3.145,2-5,4.1,2.137.855,1.793,6,1q0.5-2.5,1-5c1.894-.934,4.81-2.222,6-4-1.719-1.127-1.355-.633-2-3,4.477-2.016,6.664-4.654,13-5q-0.5,1-1,2h2v1h-1c0.718,2.2,1.044,2.316,0,5h-1q0.5,1.5,1,3h-1C820.141,149.2,816.675,150.646,813,151Zm-23-1c4.062,1.051,1.246.44,3,3h1q0.5,1.5,1,3h-1v1h-3A34.651,34.651,0,0,1,790,150Zm34,8h3q0.5,2,1,4C825.073,161.316,824.725,160.887,824,158Zm-32,1h2q0.5,3,1,6h-4Q791.5,162,792,159Zm3,9q0.5,3,1,6c-1.135.844-.145-0.127-1,1h-3v-6Zm-7,9h4v4l-2,1v1h2v-2l3,1c0.43-.282.277-1.81,2-1v1h1c-0.679,3.807-.662,3.2,0,7h-2v1l-4-2v3h-5q-1-6-2-12h3c-0.113,3.16-1.955,1.874,1,3Q788.5,179.5,788,177Zm16,14-3,1v-1a3.982,3.982,0,0,1-2-2,10.6,10.6,0,0,1,4-1Q803.5,189.5,804,191Zm6,18v2l-15,1c-1.094-2.078-1.611-1.771-2-5l3-1,2-3h3c2.07,3.12,1.4.444,4,2v1C806.831,207.394,807.346,208.312,810,209Zm-87,2c3.734-.731,7.82-1.477,12,0v1h3v1a1.609,1.609,0,0,0,2-1c2.128-.3,3.516,1.342,5,2v1l-11,1v1l-2-1v2h-1v-1a21.337,21.337,0,0,1-7,1A19.168,19.168,0,0,1,723,211Zm39,3v2l-5,1v-1h-1v1h-1v-1h-6v-2C753.743,213.161,755.956,213.918,762,214Zm-4,4h2c0.177,5.027,2.058,5.95,3,10h-1v-1h-1C759.461,224.109,758.213,222.64,758,218Z" />

        </a>
        <?php
        $kdwil = '74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Sultenggara" class="cls-9" d="M648,238c3.033,0.516,1.634.711,4,0v1c2.618,2.047.346,2.286,5,3,2.432-3.807,4.457-2.221,9-1v1h1v-1l5,1c0.723,2.762.279,2.237,3,3a11.005,11.005,0,0,1-1,5h-1v1h1q-0.5,3-1,6c1.824,0.462,6.205,2.763,7,4,1.989,3.1-1.764,2.483,3,4v3h1c1.052,0.91.379,1.284,3,1v-1l2,1c-0.993,3.074-.934.955,0,4h-3v-1s-14.135,3.6-16,4a39.688,39.688,0,0,0-1,8c-3.53-.029-9.292-1.223-11-3h-1v-5h1v-5h1v-2a28.645,28.645,0,0,1-3-3h2v-2h-4c-0.945-1.8-1.385-1.574-2-4h-3v-2c-3.313-1.4-5.531-2.573-6-7C646.454,248.257,647.949,244.21,648,238Zm45,15v-2c1.135,0.844.145-.127,1,1h1C693.861,253.139,695,252.4,693,253Zm-2,12h3v1h1v3c-1.135.844-.145-0.127-1,1l-2-1A10.6,10.6,0,0,1,691,265Zm-1,10h3c1.094,2.078,1.611,1.771,2,5h-2l-3,7h-1V277C690.139,275.861,689.4,277,690,275Zm-14,19c0.292-2.308.208-2.535,1-4h1q-0.5-4-1-8h4v-1l3-1v1h1v6C680.16,290.081,683.411,293.548,676,294Zm-10-3c0.739,0.4,4,3.694,2,6l-4-3Zm29,2v3c-3.518.473-3.206,0.344-7,1v2h-1q0.5,1.5,1,3h-5q-0.5-1.5-1-3c3.62-2.627.349-1.625,2-4l3-1q0.5-1,1-2a1.485,1.485,0,0,1,2,1h1v-1Zm11,3h-2v-3h1v1C706.139,295.139,705.4,294,706,296Zm3,5v-3h1a7.742,7.742,0,0,0,3,2v1h-4Zm6,7-4-1a9.749,9.749,0,0,1,1-4c2.01,0.574.865-.12,2,1h1v4Zm-1,1h3v3C714.238,311.277,714.763,311.721,714,309Z" />

        </a>
        <?php
        $kdwil = '73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Sulsel" class="cls-10" d="M633,217v2c2.052,1.115,3.895,5.136,6,3v2a20.317,20.317,0,0,0,4-1v1h2v1h3q0.5,1,1,2h4c3.425,1.289,5.5,3.456,10,4v4c-1.974,1.239-2.438,2.3-3,5h-1v-1c-2.6.7-.9,1.853-2,3l-2-1v1h-1v-4h-1v-1l-2,1v-1h-2q-1-2-2-4h-6v-1h-2v1a12.208,12.208,0,0,0-6,3v1h-2q-0.5,1-1,2c-1.784,1.171-2.291-.045-4,2,1.361,1.165,1.528,1.824,2,4l3,1q0.5,6.5,1,13h-1v2h-1v7h1q-0.5,1.5-1,3h1q-0.5,2-1,4h1v4h1v1h-1v3l-2,1v6c-0.037.186-1.527,0.335-1,2l2,1v2h1q0.5,2.5,1,5c-2.7-.809-2.848-1.17-6,0v1l-6-1-2,3c-1.994.726-9.644-4.281-10-5v-6h1v-2l2-1v-3h1v-1h-1v-4h1v-2h1q0.5-8,1-16h-2q-0.5-2-1-4h-1q0.5-4,1-8h-1q-0.5-2.5-1-5l5-1v-2c-2.01-.574-0.865.12-2-1h1v-6h3l2-3c-3.962-2.818-.223-3.106-2-7a9.733,9.733,0,0,1-2-2l4-3v-1h3v-1c1.4-.87,1.727-0.718,4-1v1l2-1v1l3,1v-1h1v-1h-1v-1h3Zm3,91c0.207,6.545.01,15.9-3,19-1.139,1.139,0,.4-2,1-0.032-6.8-.748-12.473,0-17h2v-4h1C635.139,308.139,634,307.4,636,308Zm12,15h-2v-3h1v1C648.139,322.139,647.4,321,648,323Zm3,3v4l-3,1v-2h-2C646.825,325.8,647.179,326.1,651,326Zm-15,8h4q0.5,2,1,4h-5v-1h-1Q635.5,335.5,636,334Zm5,4,9,3c-0.574,2.01.12,0.865-1,2v1l-4-1v-1h-4v-1h-1v-1Q640.5,339,641,338Zm21,3h4q-0.5,2-1,4l-3-1v-3Z" />

        </a>
        <?php
        $kdwil = '76';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Sulbar" class="cls-11" d="M610,195h2v5l-2,1q-0.5,1.5-1,3h1c1.911,2.609,1.684.883,5,2q-0.5,1-1,2h1c1.327,2.532,2.863,6.225,5,8-1.427,5.279-5.138,3.85-6,10,0.508,0.461,3.343,6.2,3,7h-1v2h-4v2h1v1h-1q0.5,3,1,6l-5,1q1,3,2,6h-1v1c-1.325.022-1.69-1.769-4-1v1l-7,2v-1c-4.226-3.617-1.925-10.7-1-15l-3-1v-3h4c0.944-1.8,1.385-1.574,2-4l3-1c-0.184-3.449-1.267-3.7,0-7h1v-3l4-3q-0.5-2-1-4h-1q0.5-2.5,1-5a2.708,2.708,0,0,1-1-3h1v-4h1C609.293,198.087,609.566,198.106,610,195Z" />

        </a>
        <?php
        $kdwil = '72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Sulteng" class="cls-12" d="M655,143v3h1c1.139,1.139,0,.4,2,1,2.174,2.021,5.043.373,8,0v2l-4,1v2h-1v-1c-1.7-.388-1.735.941-2,1-4.089.916-6.705-.392-9,2h-1v3c1.338,0.679,1.053,1.2,2,2h2c0.892,1.1-.816.918-1,1v1c-2.268,1.515-10.45.876-13,0v-1c-3.989-1.21-7.708,1.094-10,2-0.654,1.162-1.627,1.434-2,2v2l-2,1c-0.358.679-3.114,11.528-3,12h1v3h1c0.083,1.174-1.858,2.615-1,5h1v2h1q0.5,1.5,1,3h2v2l6,1q0.5,1.5,1,3h1v1h-1c0.361,3.486,1.183,1.625,2,3q0.5,1.5,1,3c3.061-1.059,6.076-.1,11,0,1.066-5.528,4.46-7.983,8-11q0.5-1,1-2c2.721-.775,2.982,2.545,4,3l10-1v-3c2.042-.319,2-1,2-1h9v1c2.354,0.479,2.606-.675,4-1h3v-1a3.982,3.982,0,0,1-2-2l11-1c1.382,2.612,1.769,1.693,2,6h-1v4c-2.391-.463-3.145-1.158-5-2v-3l-4,1v1h-4v1c-1.361,1.165-1.528,1.824-2,4h-2a14.717,14.717,0,0,1-14,11c-1.354,1.587-2.169,1.737-5,2-0.663,3.818-1.759,5.583-6,6-1.365-2.512-2.333-3.6-6-4q0.5,3,1,6l3-1v1l2,1q0.5,1.5,1,3h3l2,3h1v2l2,1v2h1v2h1q-0.5,1-1,2c1.031,1.375,4.974,3.467,7,4q-0.5,1.5-1,3c-2.918-.618-2.57-1.821-3-2h-4v1c-1.413-.061.388-0.728-1-1l-3,1v-2h-1c-1.5-2.773,1.7-2.215,0-5,1.652-1.506.668,0.8,2-1-2.324-.669-1.924-0.23-3-2h1c1.525-1.33-1.917-.974-2-1v-1l-3,1q-0.5-1.5-1-3c-2.083-1.05-2.991,1.372-4,1v-1l-3-1q-0.5-1-1-2h-4v-1h-1c-1.128.779,0.38,1.311-1,1v-1c-1.534-.377-3.843,1.136-4,1v-2l-4-3q-0.5-1.5-1-3h-2c-0.826,3.2-1.179,2.9-5,3v-1h-1v1c-1.654.979-.846-1.44-1-2-2.444.574-2.206,1.047-4,2a15.648,15.648,0,0,0-3-10l-2-1c-0.278-.509-0.676-3.251-1-4h-4v-1c2.454-1.554.66-.813,2-3l2-1v-1h-1v-3h-1q0.5-2,1-4h2v-2h2q0.5,2,1,4c1.135-.844.145,0.127,1-1,1.139-1.139.4,0,1-2-1.216-1.14-4.036-7.594-3-11h1v-4h1v-2h1q-0.5-2.5-1-5s-2,0-1-1h2v-2h-1a26.7,26.7,0,0,0,1-4,9.749,9.749,0,0,0,4-1q-0.5-1-1-2c-0.24-4.424,3.608-1.917,5-4v-2a56.111,56.111,0,0,1,8,3c0.424-1.844.81-3.951,2-5l3-1v-4h1q-0.5-1.5-1-3c3.021-.152,4.837-1.328,8,0q0.5,1,1,2Zm23,38-5-1q-0.5,1.5-1,3h-6c-0.249.054-.328,1.291-2,1v-1h-2c0.607-2.393.317-1.858,2-3,1.894-2.021.745,0.065,3-1v-1h2c4.674-2.177,4.285-2.119,9,0v3Zm10,27c-0.679-3.807-.662-3.2,0-7,1.135-.844.145,0.127,1-1l5-1v1h1v2C691.921,203.9,692,206.9,688,208Zm11-7,5,1v3a3.982,3.982,0,0,0-2,2c-1.135-.844-0.145.127-1-1l-3-2Q698.5,202.5,699,201Zm4,7c3.2,1.558,2.5,2.964,3,3h-1v1h-1C702.921,211.19,703.154,209.867,703,208Zm-11,4a11.878,11.878,0,0,1,5,1q-0.5,1.5-1,3c-1.8.944-1.575,1.385-4,2v-1c-1.139-1.139-.4,0-1-2h1v-3Z" />

        </a>
        <?php
        $kdwil = '75';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Gorontalo" class="cls-13" d="M703,158v5a3.982,3.982,0,0,0-2,2c-2.01-.574-0.865.12-2-1-2.712-.765-3.04-1.65-5-3v-1H684c-10.205,0-12.693,1.193-21,2q-0.5-1.5-1-3l-8,1q-0.5-1-1-2l-3-1v-3l11-2v-2h1v1l4-1a2.6,2.6,0,0,0,3,1q0.5-1,1-2h10v1h3q0.5,1,1,2h2v1l3,1v-1c2.078-1.094,1.771-1.611,5-2,0.861,1.154,2.454,1.2,3,2v3l2-1v2C699.949,158.072,701.034,157.812,703,158Z" />

        </a>
        <?php
        $kdwil = '71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Sulut" class="cls-14" d="M781,67q0.5,3,1,6h-1v1l-4-1q0.5-2.5,1-5ZM747,86l3,1v2h-1c-1.139-1.139,0-.4-2-1V86Zm3,4c2.762,0.723,2.237.279,3,3h1v1h-3Q750.5,92,750,90Zm-5,16a11.878,11.878,0,0,1,5,1v1h-1c-0.038.4,0.884,2.244,1,4l-4,1v-1h-1v-6Zm-1,10a14.809,14.809,0,0,1,6,1q-0.5,1-1,2c-1.864.695-6.129,1.444-6-2h1v-1Zm-3,18c0.574,2.444,1.047,2.206,2,4-5.96,1.627-2.4,4.008-5,8l-4,3v1h-2v1c-2.977,2.55-5.485,4.942-6,10-4.645.274-18.3,4.874-21,3h-2c0.333-.81,2.154-4.056,1-6h-1v-1l-5-1q-0.5-2.5-1-5l17,2q0.5-1,1-2h3v-1l4-1q0.5-2,1-4h5q0.5-1,1-2a3.982,3.982,0,0,1-2-2c1.135-.844.145,0.127,1-1l6-1v-4a7.5,7.5,0,0,0,3-2Z" />

        </a>
        <?php
        $kdwil = '64';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kaltim" class="cls-15" d="M569,118l3,1q0.5-1,1-2l5,1c-1.125,4.218-3.988,3.24-9,3v4c3.456,2.157,2.8,5.323,8,6v2l8,5q0.5,1.5,1,3h4v1l3,1v3c2.078,1.094,1.771,1.611,5,2-0.7,2.835-1.783,2.888-3,5l-5-1s-0.586,1.454-3,1v-1h-1a1.6,1.6,0,0,1-2,1v-1h-3v-1h-3v-1c-1.809-1.441-2.086-2.736-4-4v2h1q0.5,2.5,1,5h-5c-3.026,5.825-6.736,10.393-7,19l-3-1v1c1.692,1.123,2.437,1.775,2,5h-1v1h1c0.414,3.244-.515,4.663-1,7h-3v1h1c0.784,1.5-.533,3.508-1,4h-2c-0.735.892,1.815,0.917,2,2l-2,1c-1.371,1.721-3.42,4.724-4,7-2.7.392-2.812,1.482-5,0v1h-1v3l-5,1v4c-2.78,1.128-5.11,1.752-6,5l4-1v7h-2c1.139,1.139,0,.4,2,1v2h3v4c-2.094-.311-2-1-2-1-2.179-.637-2.982,1.324-4,1q-0.5-1-1-2c-4.913-1.961-7.4,2.793-9-1h-1v-5l-2-1v-5h-1v-4h-1c-0.781-3.909,1.334-2.835,2-4q0.5-2.5,1-5a10.576,10.576,0,0,0,2-2c-3.2-.866-4.839-3.067-7-5q-0.5-1-1-2h-3v-4l-2-1v-1h1v-1l-2-1v-7h1q-0.5-1-1-2h1v-1h-3c-1.748,2.893-3.953,3.6-6,1h-1l1-3h-1c-0.779-1.43-.836-1.679-1-4,1.092-.506,1.773-1.882,2-2,3.955-2.046,4.215,2.355,5-4h-1v-2l-2-1v-3c-0.93-1.239-2.862-.882-5-1v1h-3l-1,2h-2v1a7.958,7.958,0,0,1-4,2v-1h-3v-1c-1.139-1.139-.4,0-1-2-2.848.089-4.289,0.2-6,1v-1h-1v-1h1v-7c1.135-.844.145,0.127,1-1l6-1v-7c4.057-.707,8.4-1.355,11,2v2l2,1v1h4v1l2-1v2l2-1,1,2h5c0.882-4.977,2.954-5.262,9-5,0.736-3.16,2.032-3.262,4-5v-1h2q-0.5-1-1-2h2c1.227-.957,2.522-4.313,3-6-0.324-1.377-.773.4-1-1h1v-2h1v-2l2-1v-4h1v-2h1q-0.5-1-1-2h3v1h5v-2l2,1v-2l3,1v-1l7-2v1h4q0.5,1,1,2h1v-1l2,1C567.944,115.8,568.385,115.574,569,118Z" />

        </a>
        <?php
        $kdwil = '63';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kalsel" class="cls-16" d="M521,205c0.264,8.789,4.129,14.252,5,22,2.381-.578,4.818-2.616,7-3l6,1v1l6-1v1h-1v4h-1v1h-7c-1.139,1.139,0,.4-2,1v3h2v-2h2a34.218,34.218,0,0,1-1,8h-2q-0.5-2.5-1-5c-1.135.844-.145-0.127-1,1-2.181,1.864-2.1,4.8-2,9h2c-0.611,1.208-1.692,1.5-2,2v2h-1v4h-1v1h-3l-2,3h-3v1h-2v1h-3v1h-2v1l-5,1v1h-2c-2.6,1.349-4.491,3.208-8,4,0.007-4.685-1.742-7.374,0-11h-1c-1.086-3.922-2.9-3.306-5-6h-1v-2c0.993-.681,1.8-0.506,2-2-0.263-.285-1.78.18-1-1l4-3-1-2h1l1-4h2c0.646-1.25,1.62-1.412,2-2v-2h1v-2l3-2v-2l2,1,1-3,2,1,1-2,3-1v-3h2q-0.5-4.5-1-9c0.646-1.827,4.263-4.051,2-6h3Zm17,22c1.256,1.909,1.014,1.659,4,2v-1Zm-2,36c-2.444.574-2.206,1.047-4,2v-6h-1v-7c2.193-1.429,2.685-3.607,5-5v4h1q-0.5,2-1,4h1Q536.5,259,536,263Z" />

        </a>
        <?php
        $kdwil = '65';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kaltara" class="cls-17" d="M563,74c-0.317,2.738-1.052,4.739,0,6,1.821,2.724,3.992,1.985,6,4-2.587.089-3.465,0.175-5,1v1c-3.761,1.471-5.087-2.5-8,0a11.882,11.882,0,0,1,5,1v1h-7v1h3l1,3h-1v1h3q0.5,2,1,4a9.746,9.746,0,0,1-4-1v1a7.744,7.744,0,0,1,2,3l3-1v1h-1v5c3.129-1.01,1.518-.557,5,0q0.5,1.5,1,3h3v1h1v3l4,3v1c-2.739.644-2.276,1.309-5,2-1.5-5.466-1.537-2.106-5-4-0.361-.2-0.8-1.457-2-2v1h-1v-2l-12,2v2l-2-1v2h-1v-1l-3,1v-1l-4-1c-0.992,3.966-2.672,3.627-3,9h-2q-0.5,4-1,8h-1v2h-1q-0.5,1.5-1,3h-2c-1.95,3.624-4.214,5.97-10,6v2l-2-1q-1,2-2,4l-8-1v-2h-5l-1-3-3-2v-3c4.865-2.981,1.026-2.888,3-6h1c1.139-1.139,0-.4,2-1a9.733,9.733,0,0,1,1-4h-2a7.173,7.173,0,0,0-1-4h1v-1h3v-1c2.448-1.9,2.983-3.5,7-4-0.657-2.336-.939-2.311-2-4h-1c-0.441-1.1.773-5.608,1-7,3.8-.6,3.5-0.481,7-1q0.5-1.5,1-3h1V94l2-1c0.471-1.543-2.239-8.556-1-12h1V79h1V76h1c1.816-2.081,1.982-.653,3-4l6,1,1-2c1.873-.61,1.421.641,2,1l3-1c0.336,0.11.282,1.987,2,2l3-2v1h16l1,2h2Zm11,2v3h-1c-1.139-1.139,0-.4-2-1l-1-3h1v1h3Zm-7,1,3,1v1h-1v1h-1V79C566.861,77.861,567.6,79,567,77Zm-2,16h3v3C565.238,95.277,565.763,95.721,565,93Z" />

        </a>
        <?php
        $kdwil = '62';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kalteng" class="cls-18" d="M502,171h2q0.5,3,1,6c4.264-.4,4.521-2.069,8-3q-0.5,4.5-1,9l2,1v2h1v5h1v1h3v1c1.832,1.473,2.268,1.208,3,4l3,1c-0.574,2.01.12,0.865-1,2-1.476,4.777-.943,1.025-4,3q-0.5,1-1,2h-1c-1.633,2.323-1.061,4.831-2,8h-1q0.5,3,1,6h-1c-0.776,1.473-.712,1.686-1,4-2.533.61-1.621,0.578-3,2h-1v2l-2-1c-1.025.983-.649,2.219-2,3v-1h-1v1l-3,2v3l-5,3q-0.5,3-1,6l-2,1v3h-1c-0.869,1.379-.776,1.729-1,4-2.767-.442-4.7-1.04-6-3-3.769,1.7-5.67,3.695-11,4,0.679-3.807.662-3.2,0-7h-4c-0.764.277-.4,2.167-2,2l-1-2h-2c-0.929-3.45-1.3-1.867-3-4-2.01.574-.865-0.12-2,1-2.051,1.459-2.261,1.655-1,4h-1c-1.55,1.828-1.971.869-4,2v1h-2l-1,2h-3c-1.378-2.213-2.622-2.7-6-3-1.7,2.051-2.234.831-4,2v1c-1.948,1.5-2.441,1.816-6,2v-1c2.435-2.575.592-10.163,0-13l-3-1-1,3h-2l-1-2c-4.315-1.71-6.977,2.267-9,3h-5l-1-3h2v-2h1v1l5-3-3-10a1.691,1.691,0,0,1,1-2l-1-3a1.744,1.744,0,0,0,1-2l-2-1v-6h-3v-2l6-1c0.723-2.762.279-2.237,3-3v-2l2,1v-1c1.139-1.139.4,0,1-2l4-1q1-3.5,2-7l2,1,1-2,2,1,1-2h2v-1c1.379-.922,1.76-0.668,4-1v-2h2v2l9-1v-2h1v1c0.353,0.063,3.609-1.7,5-2v-2c1.261,0.473,2.614,1.628,5,1v-1l2,1v-1h1c1.03-1.653-.777-3.219-1-4l5-3c2.3-4.493-1.984-8.313-3-10,5.762-.387,7.689-4.046,11-7l1-2h7l1,3a14.619,14.619,0,0,0,5-1v2h1v-1c4.31-2.03,5.6-4.668,12-5l1,2h1v1h-1l1,3,2,1v1h-1v1h-4v1C502.637,166.81,502.193,166.767,502,171Z" />

        </a>
        <?php
        $kdwil = '61';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kalbar" class="cls-19" d="M384,131v5c2.84,1.679,2.719,3.451,7,4v2a55.779,55.779,0,0,1,6,4l1,3h2l2,3h6v-1h3l2-3,13,1v1h2v-1h7l2-3h4v-1h1v-3h1c1.583-3.4-1.461-2.675,3-4,1.565-1.795,5.959-2.93,10-2v1l6-1v1c-1.719,1.127-1.355.633-2,3,1.66-.191,5.31-1.152,8,0l1,2h5l1,2c1.97,0.434,1.3-.549,2-1,5.474-1.5,2.453-3.859,11-4v6c-1.135.844-.145-0.127-1,1l-6,1v8h-1v2h-1l-7,8h-4v1h-1c1.139,1.139,0,.4,2,1,0.333,1.621,2.435,6.426,1,9l-5,3c-0.436.848,2.137,2.054,1,4h-1c-1.961-1.468-7.156,1.489-11,2v3h-1v-1l-4,1s-0.263-1.2-2-1a1.534,1.534,0,0,1-2,1l-1-2h-2c-1.655,2.477-3.554,2.289-6,4l-3,4-2-1v2h-1v-1h-1v2h-1v1h1c0.979,1.654-1.44.846-2,1v2c-6.332.778-2.3,2.326-5,5l-2-1v1h-2l-1,2h-3v1l-3,1c0.574,2.01-.12.865,1,2v1h3v1h-1v5h2v5c-0.05.235-1.4,0.314-1,2h1v2h1v2h1v1h-1v4h1l-1,3-2-1v1a9.948,9.948,0,0,1-4,1v2h-1v-1l-3,2c-0.574-2.444-1.047-2.206-2-4-0.952.424-6.5,3.173-7,3v-1h-1c0.915-2.506,1.21-3.081,0-6h-1v-5h-1v-4h-1q0.5-2.5,1-5h-1v-2h-1c-1.319-1.53-.512-1.362-3-2,0.591-2.338.913-2.36,2-4h1v-6s0.629-.037,1-2c-1.577-.887-3.378-2.2-4-4h1v-1h-1c-2.622-2.858-3.739-1.289-4-7h-2l1-3h-1v-1l-7-1v-1h-5v-1h-1v-3c0.86-1.123.846,0.406,1-1l-1-2h3c0.844,1.135-.127.145,1,1-1.643-3.1-1.9-1.8-2-7a9.749,9.749,0,0,1,4,1c-1.256-1.909-1.014-1.659-4-2-0.792-4.132-2.655-5.482-6-7v-1h1v-1h-1q-0.5-5-1-10h2c-0.118-4.235-1.587-6.088,0-9l2-1v-5h1l1-2h2c1.434-1.2,2.691-5.411,3-8a9.749,9.749,0,0,0,4-1C381.077,129.865,380.833,130.118,384,131Zm-10,58,8,1v2h-3v-1c-0.9-1.87-1,2-1,2C375.073,192.316,374.725,191.887,374,189Zm12,7-1,3c-2.375,1.134-4.489,3.031-6,2h-1v-1h1v-4a10.6,10.6,0,0,1,4-1v1h3Z" />

        </a>
        <?php
        $kdwil = '53';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="NTT" class="cls-20" d="M690,361h-6v-1c1.139-1.139.4,0,1-2,1.719-.174,4.175-1.251,6,0v1C689.861,360.139,690.6,359,690,361Zm50,0v3h-1c-0.755.664-6.863,2.01-8,2v-1h-1v1c-2.632.628-4.09,0.3-6,1v-3h1c1.139-1.139,0-.4,2-1v-4h1C729.892,361.814,735.309,361.159,740,361Zm-27,0v3h-1c-1.139,1.139,0,.4-2,1v1h-5C705.907,361.934,707.88,360.944,713,361Zm-52,1a9.749,9.749,0,0,1,4,1q-0.5,1.5-1,3l-3-1v-3Zm14,1c2.444,0.574,2.206,1.047,4,2v1c-1.961.159-2,1-2,1l-3-2Q674.5,364,675,363Zm19,0a11.878,11.878,0,0,1,5,1v1h-1c-0.692.662-1.049,1.558-3,1v-1l-2,1Q693.5,364.5,694,363Zm25,5h-3v-2h2q0.5-1.5,1-3h2v1C719.639,365.165,719.472,365.825,719,368Zm-92-4c7.124-.035,12.73.04,18,2v1l7,1,2,3h5q0.5-1,1-2h7v-1c3.01-.451,5.343,5.366,10,4v-1h3c2.88-1.789-.691-4.073,6-5q0.5,2,1,4l-9,3v1l-8-1q-0.5,1-1,2h-3v1h-2v1c-2.344.507-5.8-3.731-10-2q-0.5,1-1,2l-9,1q-0.5-1-1-2l-5,1q-0.5-1-1-2h-7v1l-11-1v-1l-2-1c-0.8,1.017.193,4.131-3,3v-1c-2.01-.574-0.865.12-2-1,1.139-1.139.4,0,1-2l3-1v-1l2,1,2-3,6-1v-1C627.139,364.861,626.4,366,627,364Zm78,5h-4c-1.4.217,0.413,1.046-1,1v-1h-2v-1h1c1.286-2.269,1.628-2.637,5-3v1h1v3Zm-94-1h2v1h-1c-0.73.474-.011,1.392-2,1Q610.5,369,611,368Zm-1,5q0.5,1.5,1,3h-2v1l-3-1v-2Zm126,7v2c2.391-.463,3.145-1.158,5-2v4l-3-1v1h-1v3c3.927,2.669.686,3.741,0,8h-2a62.078,62.078,0,0,1-4,6h-2v1l-3,2q-0.5,1-1,2h-8l-2,3c-2.287,1.433-6.376,1.93-10,2q-0.5-1.5-1-3c2.319-.966,4.684-1.952,6-4-1.135-.844-0.145.127-1-1h-3c0.982-6.9,2.754-13.169,11-14v1h4v2h2C724.218,385.825,729.957,381.236,736,380ZM627,391c0.3,3.009.135,2.723,2,4v1c1.075-.058,2.811-2.046,5-1v1l3,2v2h1c1.377,1.479.509,1.311,3,2v4a9.462,9.462,0,0,0-2,2h-5q-0.5,1-1,2h-1v-1h-5c-1.556-2.374-2.86-1.569-4-3v-2h-1l-2-3h-3l-3-4H603c-1.831-.7-4-3.3-5-5,1.089-.591,1.582-1.749,2-2h2v-1h10c0.254-.056.332-1.266,2-1v1c4.511,1.01,5.678-2.351,7-1C623.748,389.584,622.8,390.47,627,391Zm72,14c3.2,0.826,2.9,1.179,3,5h-3v-2h-1Q698.5,406.5,699,405Zm-36,12v-2h1v-1h-1q0.5-1,1-2l5,2v1h-1a7.5,7.5,0,0,1-2,3v-1h-3Zm35,0c0.119,2.142,1.019,3.4,1,4h-1v2l-10,1v-3h1v-1h4q0.5-1,1-2Z" />

        </a>
        <?php
        $kdwil = '52';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="NTB" class="cls-21" d="M579,360c0.644,2.739,1.309,2.276,2,5h2v1c1.332,0.351,2.557-2.8,3-3h4c1.094,2.078,1.611,1.771,2,5-1.139,1.139-.4,0-1,2h1v-1c3.3-3.73-1.152-4.934,7-5,0.359,5.329.979,5.26,2,10l-3-1v-1h-1v1h-5v2l-6,2v-1h-1c0.193-.913,2.094-3.028,1-5h-1l-5,6c-1.322.06-1.681-1.765-4-1v1h-2v1l-3-1v1h-3v1h-2v1h-3v1l-6-1q-0.5,1-1,2l-9-2q0.5-2,1-4h1a1.6,1.6,0,0,0-1-2c-0.374-2.322.526-2.639,1-4h1v-1h3v-1c1.869-1.321,1.919-1.584,5-2,2.451,2.528,4.345,1.378,8,1v2l4,2v2c1.2,1.3,3.524.928,6,1,2.719-3,4.543-.867,6-2,1.139-1.139.4,0,1-2l-3-1q-0.5-1-1-2h-4v-1c-2.955-1.537-4.087-1.393-5-5a7.5,7.5,0,0,0,3-2Zm23,0v2c-1.135-.844-0.145.127-1-1-1.135-.844-0.145.127-1-1h2Zm-56,4c-0.054,5.123-2.895,10.98-7,12v1h-7v-1l-2,1h-1v-1c-1.135-.844-0.145.127-1-1,1.135-.844.145,0.127,1-1l3,1v-7h-1v-1h1c1.127-1.719.633-1.355,3-2v-2C540.376,361.978,540.977,362.945,546,364Z" />

        </a>
        <?php
        $kdwil = '51';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Bali" class="cls-22" d="M513,377l-4-1,1-3h-1v-3l-7-5c-4.822-1.934-5.243,2.119-7-4l12,1v-1h2v-1c1.395-.892,1.741-0.695,4-1v1l5,1,3,4h1v2h-1c-2.38,2.269-4.89.919-7,4h-1v1h1Q513.5,374.5,513,377Zm5-4,3,1v1C518.607,374.393,519.142,374.682,518,373Z" />

        </a>
        <?php
        $kdwil = '35';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Jawa_Timur" data-name="Jawa Timur" class="cls-23" d="M438,329l1,3,9-1v1h2v-1h1v2h1q0.5,3,1,6h3v1h1v7h1v1c0.83,0.339,3.318.654,4,1l1,2,6,1v-1h3v-1c1.627-.3,4.806,1.961,8,1v-1l6-1c2.478,0.57,5.2,2.4,8,3q-0.5,2.5-1,5h1v1h-1v4h-1c-1.637,5.124-.476,9.353,5,10v3h-1v-1h-3l-1-3-10-1v-1h-2v-1h-4v-1l-4-1v-1h-3v-1h-2v-1c-2.048-.687-5.782.475-7,1v1h-4v1l-4,1v-1h-4v-1h-2v-1l-15-1v1h-5v-1l-13-1-1-3h5v-1c1.139-1.139.4,0,1-2h3v-1h1v-4l-3-1q-0.5-4.5-1-9c1.135-.844.145,0.127,1-1,2.449,1.091,3.225,1.813,7,2v-1h-1c0.61-1.225,3.568-2.163,4-3v-8h1v-1h8Zm84,2v4h-1c-1.894-1.861-6.314-2-9-3v-1a12.71,12.71,0,0,1,5-1v-1h1v2h1v-1Zm-68,6c0.624-2.613,1.06-2.846,3-4v-1h3c3.768-1.379,3.446,1.037,8,0v-1c2.314-.483,3,1,3,1,2.551,0.48,3-1,3-1,4.123-1.022,9.162.453,12,1-0.844,1.135.127,0.145-1,1v1h-3l-1,2h-6l-2,3Zm45-1,1,3h-7c-0.945-1.8-1.385-1.574-2-4,1.135-.844.145,0.127,1-1Zm28,4c-3-.776-2.63-0.616-3-4a10.6,10.6,0,0,1,4-1v1h-1v4Z" />

        </a>
        <?php
        $kdwil = '34';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="DIY" class="cls-24" d="M402,348v3c3.1,1.643,1.8,1.9,7,2,0.223,4.327,1.233,5.666,0,7-1.139,1.139,0,.4-2,1v-1l-6-1-1-2-7-2c0.77-3.215,1.508-2.155,2-6l4,1,1-2h2Z" />

        </a>
        <?php
        $kdwil = '33';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Jateng" class="cls-25" d="M417,326c2.343,0.379,4.631,1.742,8,1a2.5,2.5,0,0,1,3-1,16.666,16.666,0,0,0,2,2,14.258,14.258,0,0,1-2,2v4h1l-1,4c-1.063.531-5.026,3.338-6,3v-1l-4-1q-0.5,3-1,6h1q0.5,3,1,6h1c0.862,1.424.684,1.725,1,4-5.169.636-2.8,2.26-8,3l-1,3-3-1v-1h1v-1h-1q0.5-3,1-6h-6l-2-6a9.075,9.075,0,0,0-2,2h-5c-2.537,1.545.887,4.316-5,6v-1l-20-4v1c-1.576.819-2.4,0.818-5,1a7.819,7.819,0,0,0-2-2q-0.5-3.5-1-7h-1c-1.139-1.139,0-.4-2-1v-3l4-1c0.508-1.449,1.195-1.61,1-4h-1v-1h1v-2l6-1v1l5,1,9-1v1h3v1l10-1v1l5,1,2-3h1c2.593-3.91.425-7.526,6-9v-1h4c0.844,1.135-.127.145,1,1Q416.5,323.5,417,326Z" />

        </a>
        <?php
        $kdwil = '32';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Jabar" class="cls-26" d="M358,322v6c4.831,1.77,5.19,1.191,5,8a12.71,12.71,0,0,1-5,1v5h3a34.651,34.651,0,0,1,1,7h-4l-1,3c-5.38.09-14.813-1.079-18-3l-1-2-4-1v-1h-7v-1c-0.765-.224-9-1-9-1v1h-1v-1h-6s-0.106-.637-2-1c0.3-4.213.476-3.44,2-6h1c1.521-4.259-2.482-3.2-3-4l1-3h2v-1c-3.453-2.228-2.436-4.925-2-9h11c0.138-2.329,1.907-8.892,3-10v1h2v1c1.139-.081,1.943-1.963,4-1l4,5,9,1v1l5,1v1c1.765-.144,2-3.26,5-2v1l2,1,1,3h2Z" />

        </a>
        <?php
        $kdwil = '31';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="DKI_Jakarta" data-name="DKI Jakarta" class="cls-27" d="M321,314l-1,4c-2.762-.723-2.237-0.279-3-3-1.139-1.139-.4,0-1-2h1v1h4Z" />

        </a>
        <?php
        $kdwil = '36';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Banten" class="cls-28" d="M315,312q0.5,3,1,6c-2.848-.089-4.289-0.2-6-1v1c-2.623,2.644-1.631,5.732-1,10,0.207,1.4.837-.4,1,1h-1l-1,3-6-1-1-2c-1.584-.679-11.471.934-12,1,0.488-4.336,1.423-2.641,2-7h4q1-5.5,2-11c4.108-1.059,1.156-1.214,3-3,0.746-.723,1.7,2.886,2,3l5-1c2.206,0.115,1.985,1,2,1h6Zm-32,10v3h2a9.749,9.749,0,0,0,1,4h-4l-1-3-3-1v-1C280.078,322.906,279.771,322.389,283,322Z" />

        </a>
        <?php
        $kdwil = '19';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Babel" class="cls-29" d="M291,213a9.733,9.733,0,0,1,4,1v-2h-1v-3h-1v-1h6l2,6,2,1v4c0.321,5.479,1.377,8.819,6,10v1l7,1c-0.924,3.8-2.713,4.947-3,10h2v2c-3.567-.148-4.05-0.526-6-2v-1l-4-1v-1l-6-1-1-3h-1q0.5-3,1-6l-3-1v-1h1v-1h-1v-3h-1v-1h-3c-1.376-.325.372-0.658-1-1a2.7,2.7,0,0,0-3,1l-7-1v-1c-1.135-.844-0.145.127-1-1l7-4-1-4,3-1v-1c2.01,0.574.865-.12,2,1h1v4Zm45,16,4,1a2.766,2.766,0,0,1,3-1c1.008,0.282,6.323,2.956,7,3,0,0,.116-2.1,1-1,2.132,2.664-1.793,2.577,3,4,0.723-2.762.279-2.237,3-3v-3c2.927,0.684,3.274,1.113,4,4h-3v2h-2c-0.359,4.793-2.378,6.627-4,10,3.518,0.611,4.589,1.076,5,5l-9-3v1l-4,1v-3h-3l-1,4h-3v-2h-4l-1-3h3v-1h-5v-1h-1v-6a6.929,6.929,0,0,0,2-2l3,1v-1C336.435,233.1,335.987,233.241,336,229Zm-15,10v4h-4v-3h1v-1h3Z" />

        </a>
        <?php
        $kdwil = '18';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Lampung" class="cls-30" d="M283,260c9.5,1.057,4.092,6.826,12,8,0.1,3.192.117,4.714,1,7h1c0.731,2.3-.911,2.665-1,4h1q-1.5,14-3,28h-3v-1h-1v-3c-1.83-.4-3.973-0.819-5-2l-1-3h-2v2l-2,1v4c-6-1.247-7.458-5.489-14-6-0.844,1.135.127,0.145-1,1,1.758,3.073,3.529,4.194,4,9h-2v-2l-8-7-1-2h-2l-1-2h-1v-2l-2-1v-3c-3.858-1.006-3.142-2.93-7-4v-2c2.481-.28,3.094-1.739,5,0v2c1.136,0.843.653-.913,1-1l2,1c3.911,0.7,6.6-1,9-2-0.918-2.437-1.037-6.193-1-10,1.214-.647,1.428-1.63,2-2h2l1-2a1.487,1.487,0,0,1,2,1l9-2,1-3,2-1c1.76-2.419-1.059-1.764,3-3v-2Zm8,50h-2l1-3h1v3Zm-3,1v4l-3,1v-2h-2C283.826,310.8,284.179,311.1,288,311Z" />

        </a>
        <?php
        $kdwil = '16';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Sumsel" class="cls-31" d="M264,218h3v3h1c1.129-1.975,1.417-2.338,4-3a3.982,3.982,0,0,0,2,2c-0.574,2.01.12,0.865-1,2v2h-2a3.982,3.982,0,0,1-2,2c0.462,1.337.506-.325,1,1v5h1v-5h1c1.139-1.139,0-.4,2-1v2c1.139-1.139.4,0,1-2l5,1a1.741,1.741,0,0,1,2-1v1l8,1v5c1.135,0.844.145-.127,1,1h3v5c1.1,0.507,1.767,1.879,2,2h4c1.328,0.925,1,3.728,1,6-1.98,1.111-7.835,6.635-6,11l3,2-1,4h-1v3h-3c-2.052-3.991-4.944-7.944-10-9v3h-2c-1.5,2.63-3.189,3.378-4,7l-4,1v1c-1.922.693-4.325,0-5-1-2.117.721,0.323,0.834-1,2h-1v-1a6.982,6.982,0,0,0-4,3h-1l1,2-2,1,1,2h-1c-1.131,3-.273,2.392,0,6l-9,1-4-5h-2l1-2h-1v-1h-1c-1.092-.9.314-0.478-1-1v1c-1.958.4-1.271-.341-2-1-1.139-1.139-.4,0-1-2,1.139-1.139.4,0,1-2-3.319-.814-4.1-1.928-9-2v-2l-3-1,1-3h-4c-1.212-2.128-2.253-2.177-3-5,2.4-1.422,1.679-3.076,3-4h3c1.323-1.018.977-3.658,1-6h-4v-1h-4v1l-3-1v-4h-2v-2h-4c-0.915-3.515-2.433-2.853-3-7h2q0.5-1,1-2l4,1v1l4-1v-2h4q0.5-1.5,1-3l2-1q-0.5-1-1-2h8v-4h3c-0.155,1.406-.742-0.39-1,1-0.333,1.795,2.479,2.615,4,3,0.277-2.3.19-2.55,1-4h1v-8c2.01,0.574.865-.12,2,1,2.553-.529,5.031-2.739,7-3l3,1q0.5-1,1-2l3,1,1-2c1.377-.321-0.179.253,1,1l3-1v1h1v3h-1v4Z" />

        </a>
        <?php
        $kdwil = '17';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Bengkulu" class="cls-32" d="M196,228v3c4.389,0.283,4.493,1.2,7,3v1h4q0.5,1,1,2l4,3q0.5,1.5,1,3h5v5h1v-1c1.226-.539,1.346,2.719,2,3,0,0,4.773-1.449,6-1v1l3,1q-0.5,1.5-1,3l-3-1v1c-1.962,1.678-.89,2.515-2,4-0.554.74-2.031,0.77-3,2h1c1.2,2,2.844,4.759,5,3v2l5,6a1.448,1.448,0,0,0,2-1c2.23-.263,3.4,1.375,5,2v-1h1v4c-1.139,1.139-.4,0-1,2h1v-1c0.859-1.889,1,2,1,2l5,1v4a3.978,3.978,0,0,0-2,2c-2.01-.574-0.865.12-2-1-4.322-1.144-3.443-3.193-6-5h-2l-1-2-4-1-1-2h-1l-1-2h-2l-2-3h-2l-2-3h-2v-1l-2-1q-0.5-3.5-1-7h-1l-2-3h-2q-0.5-1-1-2h-2q-0.5-1-1-2h-2l-2-3h-2l-7-13h-2v-1l-4-3q0.5-1.5,1-3l2,1c1.025-.369,1.61-4.685,3-2,1.185-.772.087,0.08,1-1C194.135,226.72,192.566,227.033,196,228Zm15,67,3,1v-1c2.977-.816,2.754,1.8,3,4a12.71,12.71,0,0,1-5,1C210.274,296.731,209.865,298.894,211,295Z" />

        </a>
        <?php
        $kdwil = '15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Jambi" class="cls-33" d="M262,197q0.5,6,1,12c-3.053.672-2.213,1.634-3,2h-4v1l-9,1v1h-3v1l-3,1c1.181,3.221.325,4.085-1,7-3.215-.77-2.155-1.508-6-2v4h-8v4c-2.905,1.6-3.819,3.475-8,4v1c-1.588.229-1.261-1.732-2-2h-4v2c-4.169.715-4.189,0.248-9,0l-3-4h-2l-3-4h-2v-1l-2-1v-4h-1v-2h-1q-0.5-3-1-6c9.252,0.08,6.341-2.393,12-4q0.5-3,1-6l4-3c0.758-1.618-.962-1.846-1-2-0.767-3.129,2.491-3.712,5-4v1h5q0.5,1,1,2c2.68,1.658,4.568,1.97,9,2l7-8h5v1h6l2,3h2q0.5,1,1,2Z" />

        </a>
        <?php
        $kdwil = '21';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kepri" class="cls-34" d="M345,61h3v1h-1c-1.139,1.139,0,.4-2,1V61Zm3,24h3V83h-1v1l-3-1q-0.5-2-1-4c2.078-1.094,1.771-1.611,5-2a6.719,6.719,0,0,0,3,3c-0.649,1.99-1.344,2,0,4h-1a7.492,7.492,0,0,1-2,3V86c-1.128-.642-2-0.055-2,1h-1V85Zm-42,9h2q0.5,3.5,1,7c-2.178-.422-2.848-0.664-4-2h1V94Zm-11,11h-3l1-3h1v1C295.139,104.139,294.4,103,295,105Zm44-3h3v2h-3v-2Zm25,1h2q0.5,3,1,6l-3,1v-7Zm9,8v4h-2v-1l-2,1v-1h-1v-1C369.876,112.177,370.616,111.519,373,111ZM252,149v-3l4-1v1h1c-0.574,2.01.12,0.865-1,2v1h-4Zm15,3c-3.636-.931-4.053-3.08-8-4,0.844-1.135-.127-0.145,1-1,1.256-1.909,1.014-1.659,4-2v1l2-1v1c1.909,1.256,1.659,1.014,2,4C266.861,151.139,267.6,150,267,152Zm9-1h-3v-4h1c0.844,1.135-.127.145,1,1Zm55-4c2.391,0.463,3.145,1.158,5,2-0.844,1.135.127,0.145-1,1v1l-3-1Zm-84,4h2q-0.5,1-1,2c1.274,0.614.347,0.57-1,1v-3Zm-8,1c2.613,0.624,2.846,1.06,4,3h1v1h-1v1c-2.1-.709-0.905-1.03-3,0v-1h-1v-4Zm21,0,1,3h-1v1c-1.135-.844-0.145.127-1-1a7.742,7.742,0,0,1-2-3h3Zm68,6-1,3-3-1v-1l-3,1a9.733,9.733,0,0,1,1-4C325.136,157.561,324.2,157.392,328,158Zm-64,4c0.366,3.218,1.224,3.708,2,6h-1v1l-2-1a7.49,7.49,0,0,0-2-3v-2Zm5,8,3,1v3l-3-1v-3Zm0,7h-5v-1a7.742,7.742,0,0,0,2-3l2,1Zm8,3c-3.715.594-2.289,0.58-6,0v-2l2,1v-1h1v-1h-1c-0.979-1.654,1.44-.846,2-1v1C276.719,178.127,276.355,177.633,277,180Zm-20,0a16.843,16.843,0,0,1,9,2c-0.574,2.01.12,0.865-1,2-0.777,3-.616,2.63-4,3v-1h-1v-4l-3-1v-1Z" />

        </a>
        <?php
        $kdwil = '14';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Riau" class="cls-35" d="M210,140q1,5,2,10c2.506,1.139,3.8,2.729,6,4q-0.5-1.5-1-3l-4-3v-5h-1q0.5-1.5,1-3h2v-1l-6-1q-0.5-1.5-1-3l10,2q-0.5,6.5-1,13h2v-2l4,1a9.733,9.733,0,0,1,1-4h2v1l2-1v1c2.719,1.466,4.57,3.078,5,7l-2-1v4h-2v-2c-3.268-.114-8.3-0.569-10,1h8v1h2c1.141,0.726,2.126,5.633,3,3h1v-3h1v-1c1.744,0.8,3.174,1.209,4,3v2l2-1v2l3,1,5,6v4a29.413,29.413,0,0,0-7,1v3h-1v1h-4v1h-1c1.6,2.905,3.475,3.819,4,8-1.135.844-.145-0.127-1,1h-2v2a18.223,18.223,0,0,0-7,1c0.549,2.784.77,0.1,0,3-1.313.656-1.072,1.268-2,2l-2-1c0.025,1.414-.228.3,1,1v1h-3c-2.884,2.42-5.89-.588-8-2v-1h-6v-1c-3.493-.714-3.942,1.82-8,2-1.742-5.565-1.335-.946-5-3l-4-5-3,1v-2c-2.241-2.661-3.342-1.071-4-6h-6c0.844-1.135-.127-0.145,1-1-0.4-1.083-1.834-2.809-1-5l2-1a1.455,1.455,0,0,0-1-2q0.5-1.5,1-3c-3.131-1.049-1.96-.828-5,0l-4-5-4,1v-1h-1q-0.5-2.5-1-5a1.522,1.522,0,0,0,1-2l-3-2q0.5-2.5,1-5h-1q0.5-1.5,1-3h-1q-0.5-3-1-6c1.047,0.432,2.844,1.828,5,1v-1h2c1.18-.941.966-2.848,1-5-3.172-2.08-3.135-6.623-3-12h2c-0.054-1.413-.758.393-1-1-1.889-.86,2-1,2-1,1.573,2.4.661,0.713,3,2v1h3v1h2v1l3,1v-1c-1.974-1.239-2.438-2.3-3-5a12.71,12.71,0,0,1,5-1l4,5,3,1v3h1c1.6,3.982-2.119,3.438,3,5v1h7q0.5,1,1,2l3,1v1A7.99,7.99,0,0,0,210,140Zm-16-15,6-1v1c1.719,1.127,1.355.633,2,3h-1v3h-1a8.445,8.445,0,0,1-3,2v-1l-3-1c-0.119-2.142-1.019-3.4-1-4h1v-2Zm30,23c1.139,1.139,0,.4,2,1C224.861,147.861,226,148.6,224,148Zm9,12c-1.613,2.474-5.229,3.766-8,5v1h4c1.165-1.361,1.825-1.528,4-2,0.308-.871,1.912-2.214,1-4h-1Zm9,17,5,1v2l-4,1v2h-4v-2h2Q241.5,179,242,177Z" />

        </a>
        <?php
        $kdwil = '13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Sumbar" class="cls-36" d="M158,152l3,1c0.59-1.285.569-.341,1,1l4,1q-0.5,2.5-1,5a7.742,7.742,0,0,1,2,3c3.971-1.151,4.994.455,8,3q0.5,1,1,2a16.829,16.829,0,0,1,4-1c-0.7,3.687-1.856,5.271-2,10,1.767,0.848,3.854,1.026,2,3,1.37,0.595,3.534.372,5,1v3c2.908,0.6,3.206,2.856,5,1v2c4.7,1.251,3.983,4.283,10,5,0.723,2.762.279,2.237,3,3v5l-3,1v1h1v1h-1c-1.763,6.3-4.687,8.279-13,8,0.844,1.135-.127.145,1,1-0.677,1.891-1.719,4.11,0,6h2q-0.5,1.5-1,3h2v3a21.9,21.9,0,0,0-5,4c-2.01-.574-0.865.12-2-1a6.374,6.374,0,0,1-3-7,1.659,1.659,0,0,0,1-2h-1v-3l-2-1v-2l-2-1v-2h-1q-0.5-3-1-6l-5-4c-0.8-1.716.635-1.545,1-2q-1-3-2-6l-3-2v-1l-2-1v-2l-7-6q-0.5-3-1-6l-2-1q-0.5-1-1-2c-3.758-2.591-6.462-.545-8-6,1.443-.961,2.72-1.389,1-3h3v-1c1.865-1,4.2.627,5,1v1h1v-1h5C159.719,155.743,158.384,157.29,158,152Zm-28,43,5-1q0.5,1.5,1,3l2,1q0.5,2.5,1,5h1v3l2,1q0.5,2.5,1,5h-1v1h-3v-1h-2l-2-3h-1v-2a39.66,39.66,0,0,0-5-6Q129.5,198,130,195Zm20,23,5,1c0.367,3.87,1.544,4.143,2,8l-6-1Q150.5,222,150,218Zm16,14c0.8,3.768,2.84,5.624,5,8l2,1v3h1q0.5,2,1,4h-2v2h-3v-2h-3v-3c-3.45-.929-1.867-1.3-4-3q0.5-1.5,1-3h-4q-0.5-4.5-1-9c1.135-.844.145,0.127,1-1h2C163.129,230.975,163.417,231.338,166,232Z" />

        </a>
        <?php
        $kdwil = '12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Sumut" class="cls-37" d="M116,76h2v2c2.438-.225,3.151-1.254,6,0v1h2l2,3,3,1v2l2,1v1l5,1,12,8v2c5.857,0.411,10.037,4.479,10,11,3.75,1.231,1.377.086,3,3v1h1v-2c5.235,1.394,3.384,2.3,3,6l2,1c1.756,4.648-1.877,8.991-2,12l2,1q0.5,3.5,1,7l-9,2q0.5,1.5,1,3h1v2h1v7c-1.135.844-.145-0.127-1,1l-6-2c0.228,2.5.755,2.538,1,4h-1v1h1q1,2,2,4h-1v1c-1.958,1.1-5.188-.6-6-1v-1h-1v1l-3-1v2l-2-1v1h1v1h-1c-1.139,1.139,0,.4-2,1v2c-2.1-.709-0.905-1.03-3,0v-1c-1.753-2.079-.84-6.3-2-9h-1v-2h-1q-0.5-3-1-6h-1v-2h-1v-4h-1v-2h-1q0.5-3.5,1-7h-1v-1h-3l-5-6h-3v-1l-3-1c-0.162-7.874-2.763-10.384-1-16h-3q-0.5-1.5-1-3h-1q0.5-1.5,1-3h1v-1h-1V96h1q-0.5-2.5-1-5h-2q-0.5-3-1-6l2-1C114.856,81.629,115.7,80.014,116,76Zm8,56h5c0.844,1.135-.127.145,1,1-0.574,2.01.12,0.865-1,2v1h-3c-1.139-1.139,0-.4-2-1v-3Zm-17,13,4,1v2l2,1c0.08,0.272-.978,6.819-1,9h-4c-0.575-2.987-1.879-4.587-3-7-2.01.574-.865-0.12-2,1-1.139,1.139-.4,0-1,2H98v-1H97v-3h3v-1c-2.73-2.448-1.532-2.355-1-5H98c-1.09-1.6-1.489-1.658-2-4h2l1-2h4C104.356,140.912,106.137,141.8,107,145Zm30,27c-4.169-.715-4.189-0.248-9,0,0.263,6.561,1.21,10.184-1,16-2.779-1.128-5.11-1.752-6-5h1q0.5-3,1-6a12.71,12.71,0,0,0-5-1q0.5-3,1-6l6,1v-1h1v-3h2v-1c1.675-.287,1.745.944,2,1h5C136.094,169.078,136.611,168.771,137,172Z" />

        </a>
        <?php
        $kdwil = '11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Aceh" class="cls-38" d="M55,35l1,3H55l-1,2H51c-0.644-2.739-1.309-2.276-2-5h1V34A12.7,12.7,0,0,0,55,35ZM66,45v2c1.46,2.372,13.212,6.637,19,5V51h8l1,2,11-1,5,7,3,1q0.5,3.5,1,7h1v1l5,1v1h1v2h-2v2h-3q-0.5,4-1,8l-2-1q-0.5,2.5-1,5c-2-.05-0.84-1.629-2,0,1.251,0.849,1.232.636,2,2h-1c-1.54,1.316,1.93.978,2,1a22.863,22.863,0,0,1-1,4l2,1v2h-2c0.634,2.822,1.869,2.675,2,3,0.723,1.791-.643,1.491-1,2,0.191,1.4.552-.341,1,1v3l2,1v2h1v6h1q0.5,3,1,6h-1v1c-3.479-.725-4.349-1.856-9-2v-2h-2q-0.5-6-1-12l-5-1c-1.254-3.114-2.507-7.038-6-8-1.143-4.641-4.771-5.611-6-10L79,85l-1-3-3-2V78c-1.024-1.373-4.98-3.465-7-4V72H66V70c-2.451-1.419-3.244-3.718-5-5H59l-1-2H57V61l-2-1V56l-2-1V52H52V46H51V45a11.423,11.423,0,0,0,2-2h2V42h1v1h6v1Zm6,65,5,1v2c3.217,0.738,3.641,1.357,4,5a12.708,12.708,0,0,1-5,1c-1.127-1.719-.633-1.355-3-2v-2l-3-1v-1c-1.2.053-1.578,0.912-4,1v-2H63v-2H61l1-5a12.709,12.709,0,0,1,5-1C68.659,106.7,71,106.565,72,110Zm30,16H98v-2H96l-1,3H94v-1H93v-4h1l-1-2h1c1.139-1.139,0-.4,2-1v-2l3,1c0.386-.2.669-1.5,2-2v1c2.347,1.437,1.791,2.654,3,5h-1v1h-2Q101.5,124.5,102,126Z" />
        </a>
    </svg>
</div>
<div class="container-fluid text-center">Sumber : <?= $sumber; ?>
</div>
<?php legend_kab($kd_indi); ?>

<input type="text" id="tahun" value="<?= $tahun; ?>" hidden>
<input type="text" id="indikator" value="<?= $kd_indi; ?>" hidden>

<input type="text" id="kecil" value="<?= $tahun_kecil; ?>" hidden>

<script>
    function edit_user_p(id) {
        $('#isi4').load('view_ind.php?id=' + id);
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
                url: "ambil_nasional_kiri_depan.php",
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
                url: "table_map_kiri_depan.php",
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
        $("#kanan_peta").on('click', function() {
            var provinsi = $("#provinsi").val();
            var tahun = $("#tahun").val();
            var indikator = $("#indikator").val();
            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_nasional_kanan_depan.php",
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
        $("#kanan_peta").on('click', function() {
            var provinsi = $("#provinsi").val();
            var tahun = $("#tahun").val();
            var indikator = $("#indikator").val();
            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "table_map_kanan_depan.php",
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
                url: "ambil_data_ind.php",
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