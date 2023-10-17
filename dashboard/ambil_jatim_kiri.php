<?php

include '../koneksi.php';
include 'capaian_provinsi.php';
include 'fungsi_tes.php';
include 'fungsi_warna_kab.php';
include 'legenda_peta.php';

$kd_indi = $_POST['indikator'];

$tahun_mak = $_POST['tahun'];

$provinsi = $_POST['provinsi'];

// nama provinsi

$prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");

$namaprov = mysqli_fetch_assoc($prov)['nama'];

// tahun kecil

$cekthnmin = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' AND  kd_indi_pilar = '$kd_indi' ORDER BY tahun_indi_pilar ASC LIMIT 1");

$acekthnmin = mysqli_fetch_assoc($cekthnmin);

$tahun_kecil = $acekthnmin['tahun_indi_pilar'];


$cekthn_b = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar < $tahun_mak ");

$cekjum = mysqli_num_rows($cekthn_b);

if ($cekjum  == 2) {

    $cekthn_a = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar < $tahun_mak ORDER BY tahun_indi_pilar DESC LIMIT 1 ");

    $acekthn_a = mysqli_fetch_assoc($cekthn_a);

    $tahun = $acekthn_a['tahun_indi_pilar'];
} else {

    $cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar < $tahun_mak ORDER BY tahun_indi_pilar DESC");

    $acekthn = mysqli_fetch_assoc($cekthn);

    $tahun = $acekthn['tahun_indi_pilar'];
}

$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

$nil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah ='$provinsi' AND kd_indi_pilar = '$kd_indi' ");

$as = mysqli_fetch_assoc($nil);

$n = $as['nilai_indi_pilar'];

$sumber = $as['sumber'];

?>

<?php if ($kd_indi != 4) : ?>
    <?php if ($cekjum == 1) : ?>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
            &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
            <a href="#indikator"><img src="../assets/img/kanan.png" width="3%" id="kanan_peta"><a>
        </h5>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
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
    <?php if ($tahun > $tahun_kecil) : ?>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
            <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
            &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
            <a href="#indikator"><img src="../assets/img/kanan.png" width="3%" id="kanan_peta"></a>
        </h5>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
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

    <?php if ($tahun == $tahun_kecil) : ?>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
            &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
            <a href="#indikator"><img src="../assets/img/kanan.png" width="3%" id="kanan_peta"></a>
        </h5>
        <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="700" height="402" viewBox="0 0 700 402">
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
            <filter id="filter" x="283" y="189" width="30" height="46" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="304" y="99" width="53" height="37" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="120" y="167" width="20" height="21" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="273" y="143" width="19" height="16" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="351" y="171" width="23" height="20" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="400" y="190" width="24" height="24" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="303" y="221" width="27" height="32" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="227" y="244" width="21" height="23" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="196" y="197" width="30" height="27" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="470" y="37" width="213" height="80" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="433" y="47" width="57" height="71" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="380" y="46" width="83" height="69" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="317" y="46" width="90" height="67" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="266" y="47" width="62" height="99" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="217" y="44" width="89" height="97" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="132" y="25" width="119" height="77" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="109" y="65" width="134" height="91" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-18" x="55" y="108" width="104" height="72" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-19" x="67" y="153" width="65" height="58" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-20" x="112" y="136" width="78" height="78" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-21" x="158" y="133" width="85" height="84" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-22" x="215" y="124" width="75" height="83" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-23" x="260" y="118" width="66" height="89" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-24" x="282" y="123" width="79" height="51" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-25" x="301" y="158" width="96" height="80" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-26" x="360" y="184" width="128" height="65" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-27" x="468" y="169" width="161" height="73" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-28" x="478" y="194" width="113" height="73" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-29" x="513" y="216" width="139" height="161" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-30" x="417" y="230" width="140" height="106" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-31" x="355" y="217" width="91" height="86" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-32" x="253" y="194" width="121" height="126" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-33" x="170" y="168" width="103" height="78" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-34" x="198" y="220" width="97" height="84" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-35" x="156" y="207" width="79" height="90" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-36" x="103" y="215" width="85" height="93" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-37" x="81" y="196" width="97" height="78" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-38" x="19" y="221" width="99" height="71" filterUnits="userSpaceOnUse">
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
        $kdwil = '35.79';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_batu_79" data-name="kota batu 79" class="cls-1" d="M306,225h-2v-1h-1v1h-2v1h-8l-1,2c-1.929.512-1.357-.609-2-1h-2l2-6h1q0.5-4,1-8h1c0.3-1.7-.933-1.714-1-2v-6h-1v-2h-1l1-3c5.725-1.549,3.837-5.5,12-6,2.24,3.851,3.039,3.142,3,10-3.93,2.5-3.171,9.541-3,16a13.3,13.3,0,0,1,4,3C305.861,224.139,306.6,223,306,225Z" />
        </a>
        <?php
        $kdwil = '35.78';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="surabaya_78" data-name="surabaya 78" class="cls-2" d="M318,124c-3.217-.738-3.641-1.357-4-5h1c2.242-4.413-3.948-6.377-5-8l-1-5a23.973,23.973,0,0,0,9-2v1c3.652,2.181,3.491,3.971,10,4,1.524-2.485,1.082-.621,3-2v-1c1.718-1.377,2.006-1.661,5-2,0.988,1.217,2.408,1.238,3,2v2l3,2v2l2,1v1l3,1,1,2c2.8,2.743,2.842,1.279,3,7-4.125,2.479-3.752,4.959-11,5v-1h-6v1h-5v-1h-4v1l-5,1C318.618,127.388,318.231,128.307,318,124Z" />
        </a>
        <?php
        $kdwil = '35.77';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_madiun_77" data-name="kota madiun 77" class="cls-3" d="M132,172c2.332,1.747,1.212,2.464,1,7-2.128,1.212-2.177,2.252-5,3v-1h-1v-3h-1q-0.5-1.5-1-3a7.666,7.666,0,0,0,2-2h5v-1Z" />
        </a>
        <?php
        $kdwil = '35.76';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="mojokerto_76" data-name="mojokerto 76" class="cls-4" d="M286,148v3h-1v1h-5c-0.092.029,0.186,0.623-2,1v-4Z" />
        </a>
        <?php
        $kdwil = '35.75';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_pasuruan_75" data-name="kota pasuruan 75" class="cls-5" d="M357,177c4.042-.085,8.369,0,11,1v2c-3.522,2.11-3.33,4.662-9,5C357.168,181.287,355.54,181.382,357,177Z" />
        </a>
        <?php
        $kdwil = '35.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="probolinggo_74" data-name="probolinggo 74" class="cls-6" d="M405,198c3.5-.841,4.664-2.53,9-3,1.412,2.663,2.03,4.22,2,9,1.135,0.844.145-.127,1,1-2.613.624-2.846,1.06-4,3l-6-2,1-2h-1C405.572,201.357,405.325,202.3,405,198Z" />
        </a>
        <?php
        $kdwil = '35.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_malang_73" data-name="kota malang 73" class="cls-7" d="M324,236v3l-2,1c-1.194,2.013-.878,5.945-3,7h-3l-2-3h-1v-2l-3-2v-2h-1q0.5-3,1-6l-2-1v-2c5.138-2.913,3.987-3.342,11-2,0.494,1.479,1.326,2.41,1,5a1.443,1.443,0,0,0-1,2h1C321.166,235.361,321.825,235.528,324,236Z" />
        </a>
        <?php
        $kdwil = '35.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_blitar_72" data-name="kota blitar 72" class="cls-8" d="M238,249l3,1q0.5,3,1,6h-1c-1.139,1.139,0,.4-2,1-0.738,3.217-1.357,3.641-5,4-0.683-3.305-1.753-3.839-2-8l4,1v-1C237.361,251.834,237.528,251.175,238,249Z" />
        </a>
        <?php
        $kdwil = '35.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_kediri_71" data-name="kota kediri 71" class="cls-9" d="M210,202v2c4.314,2.647,3.758,6.611,10,8v4c-1.135.844-.145-0.127-1,1l-5,1v-1c-3.149-.755-4.93-3.1-7-5q-0.5-1-1-2c-2.783-1.709-1.2,1.489-4-2h-1v-2h1v-1h3v-1C206.869,202.679,206.919,202.416,210,202Z" />
        </a>
        <?php
        $kdwil = '35.29';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="sumenep_29" data-name="sumenep 29" class="cls-10" d="M615,42h2q-0.5,2-1,4h1v1h-2V42ZM551,56l4,1v1h3l1,2h2c1.373,1.061.681,2.466,3,4-0.574,2.01.12,0.865-1,2v2c-2.01-.574-0.865.12-2-1a7.863,7.863,0,0,0-4,2v1h-2v1l-5,1v1h-1V72h-7v1c-2.275,1.583-2.908,3.132-6,4-1.087-1.8-2.177-1.983-4-3v1h-1v1h1l-1,3-2-1-1,2h-2c-1.332,1.008-.713,2.485-3,4l1,2a1.426,1.426,0,0,0-1,2h1c1.072,1.67,1.376,1.658,2,4-3.494,1.847-5.13,2.071-11,2-2.9-3.21-4.43-.768-9-2V91h-1v1h-1l-1-2-4,1V90l-10-1-1,2c-2.318,1.31-5.017,1.666-8,2,0.363-4.679,2.917-5.711,1-9l-3-2c-0.825-1.772.6-3.175,1-4h-1V77h-3c1.454-4.784,1.234-.885,4-3V73h1V67l3-2V62h1V60h1c0.9-1.385.7-1.747,1-4a3.983,3.983,0,0,1-2-2c1.8-.944,1.574-1.385,4-2V51c1.378-.014,1.621,1.621,4,1a2.536,2.536,0,0,1,3-1v1h5a24.144,24.144,0,0,1,9-1l4,1V51h3V50h7l1-2,2,1V48c6.94-2.1,16.663,4.013,20,6h2v1l3-1v2Zm78-2V50c1.135-.844.145,0.127,1-1,2.01,0.574.865-.12,2,1h1v2C631.2,52.945,631.426,53.385,629,54ZM576,65v6a10.6,10.6,0,0,1-4,1l-1-3h1V66h1V65h3Zm34,36h-5v-1l-2,1V99c-5.891-.533-10.148-6.3-13-10h1V86l5-4V81h4l7,6v4h1v2h1v2l2,1Q610.5,98.5,610,101ZM535,82c2.3,0.278,2.55.19,4,1v1h13c0.573,1.082,2.7,2.1,2,4h-1l-1,2c-1.339-.515-2.288-0.374-4-1V88h-7V87h-3V86l-3-1V82Zm122,4c4.864,0.216,3.385,1.069,7,2l-1,3c-3.215-.77-2.155-1.508-6-2V86Zm18,6h2a3.981,3.981,0,0,1-2,2v1h-1Zm-36,2a25.615,25.615,0,0,1,8,2v1h-1v1h-4c-1.139-1.139,0-.4-2-1ZM524,107v-4l8-4v1c2.369,1.541,2.9,4.259,4,7h-4v-1h-1v1h-3v1Zm4-4v1h-1c-1.889.86,2,1,2,1,1.139-1.139,0-.4,2-1v-1h-3Zm-17,8v-2h2q-0.5-1.5-1-3h2v1h1v2C513.2,109.945,513.426,110.385,511,111Z" />
        </a>
        <?php
        $kdwil = '35.28';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="pamekasan_28" data-name="pamekasan 28" class="cls-11" d="M444,108l-1-4-2-1V97h-1c-1.139-1.139,0-.4-2-1q0.5-4.5,1-9h2c0.639-2.974,1.755-2.436,2-3V77l5-4c1.236-2.407-.283-5.023,1-7l7-6c3.139-3.633-.513-5.624,7-6,1.592-1.424,15.6-2.029,19-2v1h1q0.5,3.5,1,7c-2.433,1.592-.651.778-2,3h-1v2l-2,1v5h-1l-2,3h-2l-1,3c6.557,3,1.619,1.378,4,6h1c1.289,1.867,1.653,1.9,2,5-2.518,2.193-3.117,5.073-5,8l-2,1v3h-1v3l-2,1v4l-4,3v1h-2C461.036,107.417,451.6,107.862,444,108Z" />
        </a>
        <?php
        $kdwil = '35.27';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="sampang_27" data-name="sampang 27" class="cls-12" d="M456,53l1,3h-1a19.211,19.211,0,0,1-5,8l-2,1v2l-2,1v5l-5,3q0.5,3,1,6h-1v2l-5,4c0.145,1.187,2.015,3.584,1,6l-2,1v2h3v1h1v4h-1c-1.037,1.9.684,4.161,1,5H430c-2.625,2.11-3.974-1.524-8,0l-1,2-12-1v1h-3v-1c-1.992-1.229-1.849-1.541-5-2l-1,3c-6.2.138-10.894-.365-15-2v-3h2l-1-4a6.719,6.719,0,0,0,3-3c2.01,0.574.865-.12,2,1h2c0.15-4.557.26-4.356,2-7h1c1.441-3.061.229-10.275,0-13h2a13.294,13.294,0,0,1,3-4V70h1V69h-1V67l-6,1c-0.241-3.809-1.033-4.483-2-7h1V60h3q0.5-3,1-6a10.6,10.6,0,0,1,4-1c2.12,1.544,13.12.012,19,0h10V52l7,1V52c2.057-.319,3.669,1.7,7,1V52c1.682-.269,1.727.938,2,1h9Z" />
        </a>
        <?php
        $kdwil = '35.26';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="bangkalan_26" data-name="bangkalan 26" class="cls-13" d="M396,59h-2a3.981,3.981,0,0,1-2,2l3,9c0.868-.4,3.805-2.462,5-2v1h1q-1,3.5-2,7h-2c-1.094,2.078-1.611,1.771-2,5,0.994,1.18.231,8.852-1,11l-2,1v3h-2c-1.307,1.581-2.638,2.17-4,4h-1v4c-0.413.868-1.268-.021-2,3l-5-1v-1l-3,1v-1h-3v-1l-2,1-1-2h-1v1c-1.381-.305.337-0.538-1-1h-4l-1-2h-3v-1h-2V99l-2,1V99h-7V98h-9V97l-4-1v2h-3v1c-1.82.8-.779,1.257-2,0-3.394-.76-4.622-2.141-5-6,1.759-1.5,1.9-2.7,2-6-1.8-.945-1.574-1.385-4-2a34.643,34.643,0,0,1-1-7l10-1,3-4h2l1-2h2V70l2-1V67l3-2V63l2-1V61h-1l1-3c2.762-.723,2.237-0.279,3-3,10.957-2.5,34.253-6.238,47-1A12.709,12.709,0,0,0,396,59Z" />
        </a>
        <?php
        $kdwil = '35.25';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="gresik_25" data-name="gresik 25" class="cls-14" d="M302,52h3c1.026,3.424,1.279,1.846,3,4h1c1.79,3.531-2.017,4.725,0,8l8,7v2h1v7l-3,2v5h-3q0.5,3,1,6l7,5v2h1c-0.574,2.01.12,0.865-1,2-1.693,1.986-4.258,1.991-7,3v1l-5-1c0.042,2.533.1,3.548,1,5h1c1.826,3.368-1.386,3.654,4,5-0.245,5.077-1.21,7.8,3,9,0.366,3.218,1.224,3.708,2,6h-1c-3.223,4.743-5.735.972-10,3l-2,3h-2l-1,2c-3.407,2.031-9.549.65-13,0-0.875-2.316-1.017-4.407-1-8,2.026-2.126.524-5.538,0-8l-12,2c0.4-2.181,1.733-3.929,1-7h-1v-4c0.254-.565,9.844-7.387,11-8h2v-1c1.6-.787,3.177.4,4-1V99c-3.644-.485-5.477.264-6-5,3.084-1.148,4-.47,5-4h2V89h2l1-2h1V84h1l1-3h1V80h-1c-1.494-1.484-4.961-2.18-7-3V73l-4-1V71l-6,1V71l-13-3V65l9-2a10.6,10.6,0,0,0,1-4h-1V56c2.465-1.439,2.788-3.138,6-4,2.352,3.665,8.977,4.089,15,4V55h1V52Z" />
        </a>
        <?php
        $kdwil = '35.25';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="lamongan_24" data-name="lamongan 24" class="cls-15" d="M279,63a39.652,39.652,0,0,1-8,1q-0.5,2.5-1,5h1v1h7v1h2v1h3l1,2c2.623,0.759,2.66-1.922,3-2h1v1h4v4c3.209,0.614,2,1.5,3,2,3.96,1.97,4.265-2.361,5,4-1.974,1.24-2.438,2.3-3,5l-5,1v2l-4,1v7h4c0.844,1.135-.127.145,1,1v2c-6.379,3.132-16.185,6.5-18,14,2.616,1.722,2.091,2.823,2,7l-9,3-2,3h-4v1h-3v1h-6c-0.262.058-.3,1.381-2,1v-1l-7-2v1h-5v1h-3v1l-10,3v-1h-2c-0.183-2.59-.163-3.432-1-5h-1q0.5-3,1-6h1v-5h1c0.378-2.087-2.374-4.077-1-7l5-4v-2h1v-2h1v-2h1V99l2-1c2.117-2.4,3.05-6.212,2-9l3-1,3-4h3c1.478-1.106.935-4.48,1-7l-2-1c-0.268-.652,1.778-5.312,1-8h-1V64h-1V57h-1c-1.745-2.129-2-.589-3-4h1V52l6-1V50l9,1V50l16-1v1l10-1c0.945,1.8,1.385,1.575,2,4C279.6,55.019,279.71,58.659,279,63Z" />
        </a>
        <?php
        $kdwil = '35.23';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="tuban_23" data-name="tuban 23" class="cls-16" d="M156,31l6,1v1h7v1h3v1h3v1h2v1h3v1h4V37h6V36l5-1V34l6-2V31c1.355-.406.07,0.345,1,1,3.943,1.189,1.268.254,3,3h1v2l2,1v2l2,1v3l2,1v2l8,7,6-1v1l3,1,8-1v1c1.966,1.249,1.861,1.56,5,2q1,5.5,2,11-0.5,4.5-1,9l2,1v5a34.622,34.622,0,0,1-7,1v3c-1.8.945-1.574,1.385-4,2-2.062-2.454-5.647-3.827-10-4-0.776-3-.616-2.63-4-3-2.3,2.16-6.025.376-9,0l1,3-2,1v2h-1v2h-1c-0.912,1.381-.683,1.754-1,4l-3,1V94l-3-1v1c-1.139,1.139-.4,0-1,2-2.762-.723-2.237-0.279-3-3-3,.465-3.013,1.217-6,0V92h-5l-5-6h-2V85h-5V84h-4v1l-10-1c-0.945-1.8-1.385-1.575-2-4-3.428-.871-2.575-2.068-6-3q-0.5-3-1-6h-1V70h-3l-4-5-4-1c-0.715-.529-0.794-2.043-2-3q0.5-2,1-4l5-1q0.5-6.5,1-13h1V42c9.659,0.139,5.78-2.486,8-9h3V31Z" />
        </a>
        <?php
        $kdwil = '35.22';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="bojonegoro_22" data-name="bojonegoro 22" class="cls-17" d="M144,70h4c0.621,1.186,1.682,1.488,2,2v2h1v3l6,5,1,2h2v1h15v1h2v1h3l5,6h2v1c1.861,0.624,1.448-.684,2-1h1v1h7v4l3-1c-0.549-2.784-.77-0.1,0-3h1v1c0.4,0.038,2.244-.884,4-1-0.308.871-1.912,2.213-1,4h1c1.139,1.139,0,.4,2,1q-0.5-3-1-6h5q-0.5-2-1-4l2-1V85h6V83c3.1,0.3,3.145.725,5,2v1h4v1c1.139,1.139.4,0,1,2h5a6.718,6.718,0,0,0,3,3c-0.574,2.01.12,0.865-1,2-0.7,2.617-1.581,3.216-3,5h-1v2h-1v2h-1v3l-2,1c-3.648,3.816-3.819,1.5-4,9,1.414,1.724,0,6.4-1,9h-1q0.5,2.5,1,5h1q-0.5,3-1,6l-3,1v1h-8v1c-4.526,1.287-8.549.266-12,0,0.558,2.448,1.043,2.21,2,4h-1v1h-2v1l-7-1v1H178c-1.973,3-2.825.941-4,5l-6-1q-0.5-1-1-2h-2v-1h-3l-2-3h-2l-2-3h-2v-1h-2v-1h-2v-1h-2v-1h-2q-0.5-1-1-2c-2.611-2.411-4.112-3.644-9-4-4.229,5.079-10.652,1.289-18,1q-0.5-3.5-1-7h-3v-4l3-2v-2h1q0.5-1,1-2l4,1v-1c1.139-1.139.4,0,1-2h4c1.773-2.666,3.99-2.3,5-6h3c0.623-1.272,1.652-1.441,2-2q1-3,2-6h2c0.628-3.033,1.81-2.374,2-6h-1V91h2q-0.5-3-1-6h1c0.5-.89,2.372-3.677,2-5l-2-1C143.764,76.682,144.028,73.512,144,70Z" />
        </a>
        <?php
        $kdwil = '35.21';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="ngawi_21" data-name="ngawi 21" class="cls-18" d="M66,116l11-3v1c1.738,1.407.506,1.376,1,2l3,2v1l8,1,1,2,6,2,2,3h3v1h2v1l8,1v1h2l2,3c3.158,1.191,3.306-1.727,4-2h8v1h2v1c3.431,0.917,5.134-2.332,7-3h4c3.22,3.939,8.056,6.774,13,9v2h-1q-0.5,1.5-1,3l-4,3v1c-1.33.913-3.96,0.7-5,2v2l-2,1v2h-1l-2,3h-2v1h-2q-0.5,1-1,2h-4c-2-4.69-4-5.248-11-5v1h-3q-0.5,1-1,2l-4,1v1h-5l-2,5H99v1H97v1H92l-3,4c-1.328.488,0.362-.657-1-1H82v1l-9,1-2-3H70v-2l-3-2-1-10c0.032-.168,1.516-0.347,1-2l-2-1-1-6H63l-1-4H61c-1.028-3.742,3.237-5.964,4-8V126l2-1c0.695-2.794-1.762-2.314-2-3Z" />
        </a>
        <?php
        $kdwil = '35.20';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="magetan_20" data-name="magetan 20" class="cls-19" d="M125,165h-2q-0.5,1.5-1,3l-2,1v4h-1a9.022,9.022,0,0,0-2,4c2.716,1.164,4.18,1.78,5,5h3v5l-7,5v2h-1v6a9.906,9.906,0,0,0-2,2c-2.5-.387-6.183-1.111-10,0v1H97v1H93v1l-4-1c0.44-4.442.754-4.795,0-9l-10,1-3-4H74l-1-2H72v-3c1.583-1.705,1.1-6.727,1-10a8.84,8.84,0,0,0,2-2l9-2v-1l6,1,2-3h5v-1c2.632-1.214,4.621-1.905,7-3v-3l9-2q0.5-1,1-2h2v-1h9a12.71,12.71,0,0,1,1,5C124.861,164.139,125.6,163,125,165Z" />
        </a>
        <?php
        $kdwil = '35.19';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="madiun_19" data-name="madiun 19" class="cls-20" d="M182,155v3c0.777,0.672,1.378-.363,1,1h-1c-0.6,1.414-1.332,5.031-4,4v-1h-2l-3,9q-0.5,5-1,10l-3,2q-1,3.5-2,7l-3,2v2h-1v1h1c0.494,2.685-1.092,4.458-2,6h1c1.139,1.139,0,.4,2,1v5l-6,1a72.568,72.568,0,0,0-5-8h-3c-2.509,2.458-5.843.475-9,2l-3,4c-5.359,2.5-19.453-3.4-21-5h-1v-4h1v-3l4-3v-1h2q0.5-1.5,1-3l2-1v-2c1.07-1.289,2.459-.032,4-1v-1l2-1v-2h1a29.413,29.413,0,0,1,1-7c-1.135-.844-0.145.127-1-1l-9,2q-0.5,2.5-1,5l2,1v3c-2.739-.644-2.276-1.309-5-2v-2h-2c0.424-3.967,2.19-6.006,3-10,5.728-3.439,2.617-5.084,13-5v-3h1v-1c1.343-1,2.98.236,4-1v-2l2-1v-2h1l2-3h2v-1l3-1c2.9-2.891.467-5.47,6-7l3,4h2q0.5,1,1,2h3q0.5,1,1,2h2v1l8-1v1C178.564,151.85,178.364,153.994,182,155Z" />
        </a>
        <?php
        $kdwil = '35.18';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="nganjuk_18" data-name="nganjuk 18" class="cls-21" d="M222,151c3.875-.7,6.195-1.855,11-2a6.719,6.719,0,0,0,3,3c-0.574,2.01.12,0.865-1,2-0.825,4.9-3.378,6.981-6,10l-2,1q0.5,2.5,1,5h-1v2h-1v6l-2,1v2h-1q-0.5,2-1,4h-1v5l-2,1q-0.5,1-1,2h-5q-0.5,2.5-1,5l-3-1c-0.487-4.955-2.635-5.6-3-11l-5-1c-1.649,2.884-4.043,4.285-5,8h-2l-8,9h-2l-4,5h-2v1c-1.482,1.375-1.309.51-2,3h-3c-3.253-4.88-9.179-5.348-10-13h1v-4l2-1q0.5-1.5,1-3h1v-3h1v-2l2-1v-2l2-1v-5a115.68,115.68,0,0,0,3-12h2v-1l3,1v-1h1v-5a9.149,9.149,0,0,0,2-2c-3.529-1.8-6.481-4.1-7-9l3-1v-1c2.966-1.688,7.045,1.356,9,1v-1h3v-1l8,1,3-5h4c0.038-.012.271-1.422,3-1a1.757,1.757,0,0,0,2,1v-1l7-1c0.844,1.135-.127.145,1,1q-0.5,2-1,4h1C221.138,146.03,221.73,147.029,222,151Z" />
        </a>
        <?php
        $kdwil = '35.17';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jombang_17" data-name="jombang 17" class="cls-22" d="M265,130v6h1v2h1q-1,5-2,10h9v4h-2c-0.2,4.886-3.206,9.813-2,14h1v5l5,4q0.5,3,1,6h1v5l2,1,4,13c-1.135.844-.145-0.127-1,1l-5-1v1h-5l-1-2h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-9l-5-6v-2l-2-1v-2l-5-4v-2h-1q-0.5-1-1-2h-5v-1h-3c-0.846-4.537-1.59-8.184,2-11l3-1,3-9c-1.139-1.139-.4,0-1-2-1.749-.737-3.837-1.622-5-3l-9,2v-4h-1c-1.177-2.941-1.093-5.907,1-8v-1h5v-1h2v-1l7-1v-1h2v-1h5v-1a8.345,8.345,0,0,1,6,1v1h6v-1h1v1Z" />
        </a>
        <?php
        $kdwil = '35.16';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="mojokerto_16" data-name="mojokerto 16" class="cls-23" d="M289,123q0.5,3,1,6h-1v5h-1v1h1q0.5,3,1,6c-4.2,2.515-4.476,6.6-11,7v1a1.444,1.444,0,0,1-2-1H267l-1-3c0.991-1.083,1.873-6.455,1-9h-1v-2h-1l1-3c2.748-2.81.315-4.316,6-5v1h4l1-2h2v-1Zm-2,25,6,1v1l12,2,2,3h2l2,3,9,7a15.682,15.682,0,0,0-1,6l-7,4v2c0.228,0.5,3.635,1.945,2,5h-1c-0.659,2.622-1.592,3.228-3,5h-1v2h-1v2h-1l-1,3-8-1-5,6c-2.122,1.356-5.635.962-9,1-0.051-3.116-.043-4.822-1-7h-1q-0.5-3-1-6l-2-1v-2h-1q-0.5-4.5-1-9l-4-3v-2h-1v-4c-1.383-4.283.036-7.247,0-13,2.128-1.212,2.177-2.252,5-3v4h4v-1c0.4-.041,2.228.9,4,1C286.382,151.388,286.769,152.307,287,148Z" />
        </a>
        <?php
        $kdwil = '35.15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="sidoarjo_15" data-name="sidoarjo 15" class="cls-24" d="M350,128q-0.5,11-1,22h-1v1h-3v1c3.81,2.392,2.741,5.636,9,6,0.478,4.87,1.454,5.882,0,10a10.6,10.6,0,0,0-4-1c-0.88-3.4-1.861-3.065-6-3v1h-3v1h-2v1h-8l-4-5a20.065,20.065,0,0,1-8,2l-3-4h-2l-6-7h-2l-1-2-9-1v-1h-3v-1l-3,1v-2c-2.762-.723-2.237-0.279-3-3l4-3v-1l12-1v-1h2l3-4,8-1v-1h3v-1h2v-1h4v-1h2v-1l3,1v1l5-1,11,1v-1Z" />
        </a>
        <?php
        $kdwil = '35.14';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="pasuruan_14" data-name="pasuruan 14" class="cls-25" d="M368,179c3.147,0.391,3.045.763,5,2v1h4v-1c3.492-.869,6.623.565,9,1l5,7-1,3h-1l-1,3-2,1q-0.5,6-1,12l-4,3-9,10-3,1c-3.515,3.954,3.17,6.9-4,9-2.361,1.966-12.328-1.73-17-2v-1l-3-1-4-5h-1v-4l-7-5v-3h-1v-1a28.245,28.245,0,0,1-13-3v-1h-2v-1h-4l-3-4h-2l-1-2h-1v-5c4.145-2.752,5.3-8.813,9-12-0.463-2.391-1.158-3.145-2-5l7-5-1-4,3-1,1-2h2v-1c3.092,0.852,3.733,2.419,6,4v1h8c1.959-2.353,4.6-2.977,9-3l4,5h3c1.111,0.734.822,2.62,3,4-1.708,2.937-2.891,2.863-3,8,1.791,1.131,3,3.144,4,5,2.01-.574.865,0.12,2-1C365.238,185.216,367.171,183.2,368,179Z" />
        </a>
        <?php
        $kdwil = '35.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="probolinngo_13" data-name="probolinngo 13" class="cls-26" d="M457,189h6v1h2v1h10v2l-2,1v4c1.783,1.03,5.615,3.891,5,7-0.062.313-1.865,0.128-2,2h1l1,3h1c0.22,0.993-1.76,2.69-1,5h1v2h1v4h1v4c0.206,1.4.824-.4,1,1h-1v2l-2,1c-1.57,4.6,4.206,3.534,2,7v1l-6-1v1h-5l-2,3h-2v1l-3,1v-1c-3.428-.871-2.575-2.068-6-3v4a15.682,15.682,0,0,1-6,1c-2.214-2.686-2.767-.69-6-2-0.561-.227-0.491-2.932-3-2v1c-1.139,1.139-.4,0-1,2h-3c-0.251-6.71-4.559-9.862-6-15h-9a12.71,12.71,0,0,1-1-5c-4.382.82-5.445,0.457-10,0v1h-1v4h-1l-7,8-5,1v1a2.536,2.536,0,0,1-3-1c-3.016-.718-6.329.412-8,1v3l-3-1v-2h-1c-2.375-2.68-2.956-3.707-8-4-1.594,2.769-3.949,3.685-8,4-0.945-1.8-1.385-1.574-2-4,2.544-1.558,3.479-2.213,4-6v-3l10-9,2-3h2l1-2h1v-4h1q0.5-5,1-10l3-2v-2c0.98-1.116,2.03-.72,4-1l1,2h4v1h2v1c1.379,0.886,1.738.742,4,1q-0.5,3-1,6l2,1q0.5,2.5,1,5l7,1,1-2h2q-0.5-5-1-10h3l1,3h1c1.589,1.773,1.165,2.2,4,3,3.762-5.058,5.1.5,9-1l1-2h2l2-3h2v-1l10-1v-1h2l1-2,3-1v-2Z" />
        </a>
        <?php
        $kdwil = '35.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="situbondo_12" data-name="situbondo 12" class="cls-27" d="M557,178c0.624,4.221,1.969,9.068,5,11,3.269,3.2,10.931,1.552,17,2v1h1c1-.555,1.384-3.815,4-3v1c2.593,0.614,6.145,3.391,8,5q0.5,1,1,2h5v1h2v1c0.807,0.061,3.542-1.809,6-1v1h3q0.5,1,1,2h2v1c4.134,2.275,7.674,1.877,9,7h2q-0.5,5.5-1,11c-2.465,1.439-2.788,3.138-6,4v4l-10-2v-1h-2v-1l-5-1v-1c-1.825-1.373-1.964-1.539-5-2-3.183,5.624-9.2,9.055-11,16-3.244-.336-7.8-3.05-11-2v1l-6,1q-0.5-2.5-1-5h-1v-7h-1q-0.5-2-1-4h-1v-9h-1v-5h-1v-2h-1v-4h-1c-1.139-1.139,0-.4-2-1v-1l-10,1q-0.5,1-1,2l-9-1c-0.945,1.8-1.385,1.574-2,4h-4v1h-5v-1h-1v1c-2,.3-1.256-0.589-2-1l-3,1c-0.88,3.4-1.861,3.065-6,3-2.032-3.415-4.163-2.181-9-3a1.4,1.4,0,0,0-2-1v1h-1q-0.5,3-1,6h1v1h-1v3h-1v3h-1l-6,7h-2l-1,2h-1v2c-1.067,1.3-4.616,2.712-7,3q0.5-2.5,1-5h1c1.3-4.027-2.263-8.728-3-11v-7h-1v-8h-1c-1.587-2.272-3.124-2.912-4-6,1.8-.945,1.574-1.385,4-2,0.871-.7,5.475-0.9,8,0v1h2v1l7-2v-2l3,1v-1h1v2c4.677,0.552,6.95,3.293,12,1v-1h2v-1l2-1c1.857-2.337-1.054-1.751,3-3v-2h7q0.5,1,1,2l8,1v-2l4-1c1.256-4.82,4.519-4.512,8-7v-1l3-2c0.9-1.136-.744-0.6,1-2v1h4v1A8.647,8.647,0,0,0,557,178Z" />
        </a>
        <?php
        $kdwil = '35.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="bondowoso_11" data-name="bondowoso 11" class="cls-28" d="M584,238q0.5,6.5,1,13l-2-1v1c-3.17,2.1-.69,3.619-5,5q-0.5,1.5-1,3c-10.179-3.987-15.448,1.329-26,2-0.5-1.322-.473.312-1-1v-4l-3-2q-0.5-1.5-1-3h-3v-1h-2v-1h-2v-1l-4-1q-0.5-1-1-2a18.754,18.754,0,0,0-9-3q-0.5,1.5-1,3c-2.391-.463-3.145-1.158-5-2a7.173,7.173,0,0,0,1,4h-1v1c-1.41-.5-3.364-1.628-6-1v1h-4v-1l-4-1v2h-3c-1.963-3.87-4.251-6.777-10-7-0.763-3.16-2.227-3.65-3-7-3.715.594-2.289,0.58-6,0v-3h2c1.01-1.263,2.361-1.192,3-2v-2h1l1-2h2l6-7h1q1-6.5,2-13c8.172,0.036,8.248,2.836,17,3q0.5-1.5,1-3l10,1v-1h2v-1c1.373-.339-0.074.26,1,1l2-1q0.5-1.5,1-3c2.013,0.009,9,1,9,1l2-3h10v1h1c0.092,2.568.132,3.49,1,5h1v4h1v11h1q1,3,2,6h1v6h1v2h1v4h1c2.524-3.091,6.839-3.573,11-2h3v1Z" />
        </a>
        <?php
        $kdwil = '35.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="banyuwangi_10" data-name="banyuwangi 10" class="cls-29" d="M615,230q1,10,2,20h-1v2h-1q-1,3-2,6l-2,1q0.5,3,1,6h-1v3h-1v2h-1q0.5,5,1,10l-2,1v2h-1v2h-1v7h-1v5h-1v3h-1v7h-1v4c-0.256,1.391-1.066-.413-1,1h1v3h1q0.5,2,1,4h1c1.249,3.7-1.615,6.608-2,10a10.6,10.6,0,0,0,4,1c1.643-3.1,1.9-1.8,2-7h3v1c2.294,2.979-1.254,4.721,0,9,0.621,2.119,5.852,13.368,7,14h3q0.5-1.5,1-3c4.264,0.975,5.666,4.5,9,6l5,1c0.468-.3.232-1.756,2-1v1l2,1v2l3,2v2l2,1v3h-1q-0.5,2.5-1,5a13.3,13.3,0,0,0-4,3c-4.7.264-4.306,1.161-8,0h-4q-0.5-1-1-2l-6-1v-1H608v-1h-4v-3h2c1.339-2.523,1.99-3.5,2-8-1.361-1.166-1.528-1.825-2-4l-4-3v-1h-2v-1l-4-1v-1h-4v-1a23.91,23.91,0,0,0-8-2c-1.247,2.48-1.9,5.116-3,8l-11-3v-1h-6v-1h-5v1a25.042,25.042,0,0,1-8,2v-1h-1v-5l-3-1v-1c-4,1-4.394,3.374-9,4,0.644-2.739,1.309-2.276,2-5-2.84-1.679-2.719-3.451-7-4-1.286,2.269-1.628,2.637-5,3-2.719-4.03-5.262-1.541-8-4h-1v-3c1.719-1.127,1.355-.633,2-3-4.73-2.749-1.526-6.839-1-13,2.731-1.584,2.446-2.742,7-3v3h1v1h3c1.649-2.884,4.043-4.285,5-8-2.148-1.142-6.681-5.571-5-10l2-1q-0.5-3-1-6l2-1v-6h1v-1h3v-1h1c1.2-2.081-.821-5.073-1-6l8-6v-2l3-2v-1h4q0.5-1,1-2h5q0.5-1,1-2h6v-1l5-1v1h2v1l3,1,2-3h2q0.5-1.5,1-3c1.91-2.568,3.838-1.7,5-6h1v-1l-2-1v-6h-1q-0.5-2.5-1-5c2.466-1.672,2.272-3.567,4-6l5-4v-2h1c1.568-1.674.819-1.586,4-2,2.092,3.136,4.245,2.347,8,4v1h2v1h3v1h2v1Z" />
        </a>
        <?php
        $kdwil = '35.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jember_09" data-name="jember 09" class="cls-30" d="M491,241c3.52,0.647,4.873,2.186,8,3v2c3,1.973.941,2.825,5,4,0.776-3,.616-2.63,4-3l1,2,11-1q0.5-1.5,1-3c5.1-.255,3.494-1.393,8-2,3.089,3.7,11.332,7.88,17,9a8.423,8.423,0,0,0,2,4h1v3h1c0.874,1.41.7,1.73,1,4h-3l-6,8h-2v1l-2,1v3h1v3l-3,1c-1.139,1.139,0,.4-2,1-0.1,4.449-.767,5.812-2,9h-1q0.5,2.5,1,5l-3,2c-0.221,1.6,1.675,1.24,2,2q0.5,3,1,6l3,1c-0.574,2.01.12,0.865-1,2-0.705,3.087-1.949,4.254-5,5-1.2-2.773-1.2-3.572-5-4-1.139,1.139,0,.4-2,1a13.3,13.3,0,0,1-3,4q-0.5,5.5-1,11h1c0.808,1.456.7,1.7,1,4-3.08.086-5.13,0.133-7,1v-1h-1v-1h1c-0.135-1.672-1-2-1-2q0.5-1,1-2h-1c-1.256-1.909-1.014-1.659-4-2-2.051,3.134-1.352.461-4,2v1c-1.823,1.323-1.935,1.646-5,2l-3-7c-2.857,1.827-.85,1.736-2,3h-1v-1c-3.436,1-3.36.7-7,0-2.067-5.66-3.114-9-11-9-3.21-3.6-7.043-1.319-11-1l-1-2-5-1c-0.56-3.137-.974-4.19-4-5v-1c-1.362-.761-6.37.692-7,1v1h-2v1h-3c-0.637-1.164-1.659-1.467-2-2l-1-4-2-1-4-5-4-2v-4c2.731-2.678,1.224-5.3,1-10l9-7v-4c0.392-.831,1.29.028,2-3h-1q-0.5-3-1-6h-1v-5h-1v-2h-1c-1.239-4.2,2.254-7.29,5-8l1-3,4,1v1h3v1h2v1l6-1,1-3c2.175,0.458,5.35,3.072,8,2l1-2h2l1-2h2v-1l9,1v-2a34.651,34.651,0,0,1,7-1C489.079,237.352,490.293,238.249,491,241Zm-69,81v-3h1c2.191-2.756,4.8-3.1,10-3v1l5-1v1h5l1,3h1c0.226,1.4-.374-0.268-1,1-1.381,1.6-14.474,4.972-19,3l-1-2h-2Z" />
        </a>
        <?php
        $kdwil = '35.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="lumajang_08" data-name="lumajang 08" class="cls-31" d="M432,228l1,3h1v2h1v3l2,1q0.5,3.5,1,7l-2,1q-0.5,2.5-1,5h1l1,4h1v7h1q0.5,3,1,6c-3.124,2.064-.437,1.45-2,4l-2,1-1,2c-3.345,2.473-5.316,1.459-6,7,2.026,2.126.524,5.538,0,8a12.71,12.71,0,0,1-5,1c-2.036-1.963-15.488-4.675-21-3-2.152.654-4.515,2.472-8,2-1.2-.162-3.571-2-6-1l-1,2h-4v1l-11,3-1,3h-5v-6h-3v-1c-1.139-1.139-.4,0-1-2-3.083-3.757,1.524-4.545,1-8h-1c-0.609-2.456-2.919-12.5-2-15h1v-2l2-1v-8h-1c-1.379-2.119-1.773-2.326-2-6,3.3-1.857,4.97-4.716,5-10l8-2,2-3c1.93-.513,1.352.593,2,1,3.783,0.919,5.545,3.8,7,7,2.01-.574.865,0.12,2-1h1v-2c1-2.067,1.2-1.636,4-2v1l6,1c2.075-3.065,1.065-.547,4-2v-1h2v-1c1.786-1.414,2.377-2.31,5-3,0.493-2.3.883-2.469,2-4h1v-2c0.929-2.062,1.245-1.68,4-2v1h5l2,4c1.764,0.815,3-1,3-1Z" />
        </a>
        <?php
        $kdwil = '35.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="malang_07" data-name="malang 07" class="cls-32" d="M289,229h2v-2h10v-1c2.245-.936,3.84-0.88,7-1-0.58-4-1.241-3.445-3-6h-1V207l2-1q0.5-2.5,1-5c3.7,0.468,4.173,1.522,7,3v1h3v1h2v1l6,1v1h2v1l3-1v1h1v1h1v2l7,6,2,6,7,4v1h7c1.236,1.133,6.815,1.834,9,2l2,6-2,1,1,4-2,1c-2.158,2.579-2.824,4.173-3,9a6.749,6.749,0,0,1,4,5h-1v3h-1v2h-1v2h-1l3,18h-2a12.71,12.71,0,0,0-1,5c0.218,0.118,6,4,6,4v4h1c0.883,1.508.892,2.436,1,5-2.84,1.679-2.719,3.451-7,4v-2h-2c-0.463,2.391-1.158,3.145-2,5-1.876-.823-2.616-1.481-5-2v-2a6.719,6.719,0,0,1-3-3c-1.135.844-.145-0.127-1,1-1.57,1.088-3.138,5.806-6,5l-2-3h-2l-1,4-4,1v1h-7v1h-2l-1,2-6,1c-1.272-1.809-3.9-3.214-6-4h-4v-1h-2l-1-2-5,1v-1h-2v-1l-6,1v-1h-9l-1-2h-3v-1c-5.833-2.4-7.831.618-8-8,1.253-1.056,4.528-6.373,4-9h-1v-6c0.3-.771,2.842-0.212,2-4h-1v-4h-1c-0.837-1.443-.682-1.714-1-4,1.607-.232,8.015-1.088,9-2,2.927-.684,3.274-1.113,4-4,2.822-3.315-.768-4.514,0-8h1v-8h1v-5h1v-5l2-1v-1h-1l-1-3h-1v-2l-2-1c-0.277-.512-0.682-3.259-1-4h-2c-1.664,2.893-8.432,7.116-12,8l-1-2h-3v-1c-1.261-.657-4.4-0.922-5-2v-3c6.5-5.333-1.264-16.769-3-23,1.89,0.334,4.278,2.04,7,1,0.915-.35.55-2.971,4-2v1h2l1,2h2v1l6-2v-1a2.713,2.713,0,0,1,3,1l6-1c1.382,2.612,1.769,1.693,2,6h1q-0.5,6.5-1,13l-2,1v8Zm19-3,1,3h-2c-1.139-1.139,0-.4-2-1v2c0.039,0.015,5.12,1.351,4,2h-1l1,2h-1c-0.967,1.781-1.347,1.608-2,4h2v2c3.038,1.72,5.345,4.925,7,8h1v-1c0.4-.038,2.244.884,4,1,1.64-3.122,3.519-5.564,4-10h2l-1-3-4-1c-0.594-3.715-.58-2.289,0-6-2.749-1.584-1.8-2.47-6-3v-1l-3,1v1h-4Z" />
        </a>
        <?php
        $kdwil = '35.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kediri_06" data-name="kediri 06" class="cls-33" d="M267,197v3h-1c-1.354,1.587-2.169,1.737-5,2-1.166-1.361-1.825-1.528-4-2,0.426,3.119.723,3.072,2,5h1v6h1c0.752,1.736,2.873,7.355,2,10h-1v2h-1q-0.5,3-1,6l-2-1v1l-9,2v1h-3v1h-4v1h-2v1h-5v1c-4.557,1.3-7.167-2.572-9-2l-3,4h-7l-13,2v-1c-1.9-1.593-2.7-3.738-3-7h-8l-3-4h-1q-0.5-2-1-4l-5-4q-0.5-1-1-2c-3.7-2.534-5.147.144-6-6l7-6q0.5-1,1-2h2l9-10h2v-1l2-1c2.864-4.043-.242-5.5,7-6,0.709,4.754,2.59,10.826,6,13v1h1v-1h1q-0.5-2-1-4h1v-1l6-1,2-3h1v-6l2-1v-2h1v-2h1v-5h1v-1h3v1h6l2,3h1v2l2,1v2l3,2q0.5,2,1,4h1l5,6h3v-1l6,1v1h2v1h2v1h3Zm-66,8v4h1v1h3q0.5,1,1,2l7,6h8q0.5-3,1-6l-5-1-2-3h-1v-2h-1c-1.436-1.743-2.3-2.412-3-5C205.027,201.589,205.854,203.848,201,205Z" />
        </a>
        <?php
        $kdwil = '35.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="blitar_05" data-name="blitar 05" class="cls-34" d="M215,293q-0.5-2.5-1-5h-1l1-3c0.265-2.639-1-3-1-3v-7h1q-0.5-2.5-1-5a10.6,10.6,0,0,1,4-1c1.419,2.162,2.366,2.01,6,2a9.11,9.11,0,0,1,6-5v-6l-3-1v-1l-6,1v-1h-2v-1l-9-2v-1h-1v-6l-5-4q0.5-1.5,1-3c2.612-1.382,1.693-1.769,6-2v1l7-1v-1h8v-2l3-1v1h10v-1l7-1v-1h2v-1h5v-1h2v-1l6-1v-1c2.255-.555,7.314,2.212,9,3v1h4c2.56-4.281,3.553-1.805,7-4v-1a8.051,8.051,0,0,1,4-2v1h1v3l2,1v2h1l1,3c-2.991,3.143-.458,5.671-2,10h-1v2h-1c-1.944,5.418,1.9,12.558,0,16l-2,1-1,2-9,1v1l-3,1c1.147,1.855,3.363,3.774,4,6v4h-1v11l-2,1c-2.091,4.023,1.165,5.251-5,6l-1-2-6,1s-0.026-1.278-2-1h-1s-2.695,3.233-4,3v-1h-5l-2-3Zm22-40c-2.612-.1-3.426-0.252-5-1v1h-1v3h1v3h1l1,3h3v-1c1.408-1.1,2.931-3.487,4-5h1v-3h-1v-1h1q-0.5-1.5-1-3h-3v1h-1v3Z" />
        </a>
        <?php
        $kdwil = '35.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="tulungagung_04" data-name="tulungagung 04" class="cls-35" d="M175,213v3c4.294,2.3,6.828,5.621,10,9l2,1v2h1q0.5,1.5,1,3h1v1l9,1v1h1q0.5,3.5,1,7h1q0.5,2,1,4h1v2l3,2c1.775,3.5-1.818,3.32,2,6v1h4v1h2v1h4v1h2v1a1.619,1.619,0,0,0,2-1l5,1q0.5,2,1,4h-1c-1.471,2.358-4.772,4.37-7,6v1h-2c-1.239-1.974-2.3-2.438-5-3-0.958,5.8.044,17.5-2,23-2.909-.6-3.206-2.856-5-1v-2a46.016,46.016,0,0,0-9-1c-0.936,3.586-2.61,3.156-7,3-1.139-1.139,0-.4-2-1-1.319-5.086-1.348-2.344-5-4-0.409-.185-0.4-1.691-2-2-0.9.418-.692,3.088-4,2l-1-2h-6c-0.844,1.135.127,0.145-1,1l1,3h-4q-0.5-2.5-1-5l-2-1v-8l-2-1c-1.381-2.612-.188-2.335,0-5a7.742,7.742,0,0,0,2-3l17-2,1-3h1v-4l-5-1q-0.5-1.5-1-3l-4-3v-2l-4-1q-0.5-3-1-6a2.544,2.544,0,0,0,1-3l-3-2q-0.5-3.5-1-7h1v1l3-1q-0.5-2-1-4h1v-2l2-1v-7h1v-1Z" />
        </a>
        <?php
        $kdwil = '35.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="trengggalek_03" data-name="trengggalek 03" class="cls-36" d="M165,226v8l3,2q-0.5,4-1,8l7,5v2h1l3,4c1.452,0.917,3.182-.44,4,1v4c-5.764,1.384-9.889,2.951-18,3-0.905,1.776-2.482,4.721-4,6l1,3h1v2l2,1q-0.5,3-1,6h1v2l2,1q0.5,2,1,4h1c1.888,2.477,1.823,2.62,2,7-1.135.844-.145-0.127-1,1-2.01-.574-0.865.12-2-1h-1c-1.011-1.776.8-3.107,1-4h-1c-1.739-2.384-1.815-2.835-6-3v6h-4v3c3.217,0.738,3.641,1.357,4,5a21.513,21.513,0,0,1-8-2v-1h-3l-1-3-3-2v-1h-1v1h-4v1l-3-1v-2a12.71,12.71,0,0,0-5-1c-1.139,1.139,0,.4-2,1l-1,3-3-1v-1h-2l-1-2-5,1v-1h-1v-6h-1v-1c-1.3-.419-1.738-1.509-4-1-0.136.031-.387,1.736-2,1v-1c-3.119-2.673-1.272-6.16-1-11,2.746-.688,3.032-1.678,5-3v-1l6,1v-1h1c1.531-2.726-.98-6,2-9v-1h6v-1h1v-4l2-1v-2c1.02-1.29,3.709-1.091,5-2v-1l2-1v-2c1.11-1.291,2.31-.1,4-1v-1c1.493-.926,2.452-0.863,5-1,1.127,1.719.633,1.355,3,2a40.116,40.116,0,0,1,1-9h-2q-0.5-2-1-4h1v1c1.391,0.255-.376-0.672,1-1,5.4-1.288,2.755.72,6-3h1v-2l2-1v-1c1.033-.925,3.222-0.41,4-1v-1c2.01,0.574.865-.12,2,1a8.445,8.445,0,0,1,2,3h-1C165.861,226.139,167,225.4,165,226Z" />
        </a>
        <?php
        $kdwil = '35.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="ponorogo_02" data-name="ponorogo 02" class="cls-37" d="M168,207c0.979,3.374,1.212,1.913,3,4h1v2c-4.148,2.966-.347,1.4-1,5h-1v2c-2.652,1-6.944,1.041-11,1-0.536,3.032-1.791,5.594-4,7v1h-4c-0.905.436,0.048,1.274-3,2v3h2q0.5,3,1,6c-1.135.844-.145-0.127-1,1-6.336-1.214-9.01.161-13,4l-2,3c-2.8,1.714-1.155-1.451-4,2h-1v3h-1c-0.613,1.5-.53,2.789-1,4a18.223,18.223,0,0,0-7,1v5h-1q0.5,2,1,4h-1v1h-3c-1.911-1.7-5.31-.217-9,0l-2-3h-1v-3l-2-1c-1.847-2.146-1.945-3.791-2-8-3.28-3.985,2.519-6.548,2-8l-3-2q0.5-3.5,1-7l-3-1-4-7-6,1v-1c-1.139-1.139-.4,0-1-2,2.951-1.959,1.548-2,3-5h1v-4l3-1,1-2c-2.849-1.772-3.087-4.237-3-9h2v-1h5v-1h9v-1h7v1c2.452,0.72,3.686-.77,5-1q0.5,1,1,2c1.808,1.023,9.87,3.7,13,3v-1l5,1,3-4,11-2,6,8,4-1c0.927-.493.582-2.812,3-2v1h2Z" />
        </a>
        <?php
        $kdwil = '35.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="pacitan_01" data-name="pacitan 01" class="cls-38" d="M100,236c-0.059,1.6-1,7-1,7,0.154,0.461,2.818,1.42,3,3l-2,1v2H99v4h1v4H99v2h1c2.814,3.306,3.912,1.317,4,8l6,1v1c1.139,1.139.4,0,1,2l-3,1c0.371,2.767,1.441,2.735,0,5l-2,1c-0.77,2.726,1.735,2.308,2,3v5c-2.349-.629-2.315-0.939-4-2v-1l-10,1v-1H88v-1l-5-1-1,2-2-1c-5.65,2.013-5.733,4-15,4v-1H64v-2l-5-1-1-5H53v3a3.981,3.981,0,0,0-2,2l-3-1v1l-8-1-1-2H36v-1H34v-1H29l-1-2c-2.171-2.03-2.847-1.6-3-6H24s0.922-5.438,1-7h2l6-11h3a8.278,8.278,0,0,0,5,3v-2c4.557,0.462,5.621.8,10,0a3.983,3.983,0,0,1,2-2,12.7,12.7,0,0,1-1-5h4v5c3.715-.594,2.289-0.58,6,0a18.326,18.326,0,0,1,1-7h1v-1H63c-0.564-3.45.544-5.585,1-8h2v-6a7.492,7.492,0,0,0,3-2c2.793,0.767,2.907,1.75,5,3v1l3-2s1.026,1.747,2,0h1l1,3,13-2C95.556,233.477,94.722,234.918,100,236Z" />
        </a>
    </svg>
</div>
<div class="container-fluid text-center">Sumber : <?= $sumber; ?>
</div>
<?php legend_kab($kd_indi); ?>

<input type="text" id="tahun" value="<?= $tahun; ?>" hidden>
<input type="text" id="indikator" value="<?= $kd_indi; ?>" hidden>
<input type="text" id="provinsi" value="<?= $provinsi; ?>" hidden>
<input type="text" id="kecil" value="<?= $tahun_kecil; ?>" hidden>
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
                url: "ambil_jatim_kiri.php",
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
        $("#kanan_peta").on('click', function() {
            var provinsi = $("#provinsi").val();
            var tahun = $("#tahun").val();
            var indikator = $("#indikator").val();
            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_jatim_kanan.php",
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
                url: "table_kab_kanan.php",
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