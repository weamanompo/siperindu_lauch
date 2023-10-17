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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="580" height="331" viewBox="0 0 580 331">
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
            </style>
            <filter id="filter" x="16" y="133" width="154" height="114" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="74" y="151" width="104" height="82" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="130" y="137" width="72" height="66" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="154" y="138" width="104" height="74" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="157" y="188" width="88" height="74" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="228" y="197" width="69" height="76" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="217" y="141" width="68" height="84" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="269" y="164" width="79" height="76" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="328" y="134" width="90" height="93" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="339" y="202" width="68" height="56" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="382" y="201" width="54" height="60" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="389" y="231" width="108" height="96" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="398" y="187" width="78" height="66" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="393" y="151" width="76" height="60" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="354" y="95" width="131" height="74" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="449" y="84" width="101" height="99" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="472" y="45" width="88" height="62" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-18" x="397" y="8" width="92" height="112" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-19" x="391" y="44" width="48" height="70" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-20" x="367" y="7" width="72" height="79" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-21" x="341" y="60" width="74" height="84" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-22" x="305" y="123" width="79" height="81" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-23" x="251" y="125" width="79" height="63" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-24" x="249" y="83" width="84" height="71" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-25" x="207" y="87" width="75" height="67" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-26" x="173" y="82" width="65" height="80" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-27" x="123" y="73" width="80" height="89" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-28" x="84" y="83" width="80" height="83" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-29" x="40" y="70" width="91" height="109" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-30" x="297" y="185" width="16" height="21" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-31" x="394" y="199" width="26" height="22" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-32" x="342" y="159" width="22" height="28" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-33" x="308" y="97" width="51" height="43" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-34" x="202" y="85" width="22" height="24" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-35" x="104" y="82" width="25" height="21" filterUnits="userSpaceOnUse">
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
        $kdwil = '33.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="ciilacap_1" data-name="ciilacap 1" class="cls-1" d="M45,143h3v1h1v3l9,1,1,2h2v1l3-2v1c1.909,1.256,1.659,1.014,2,4l6,1v4c2.612,1.382,1.693,1.769,6,2v2h3v1c1.361,1.166,1.528,1.825,2,4h2v1l3-1c0.723,2.762.279,2.237,3,3a13.186,13.186,0,0,1-2,5H88v1h1l-1,3H86c0.067,11.771-3.4,6.983-8,12a7.739,7.739,0,0,1,2,3c4.648-2.089,4.081-1.338,10-1l1,3a2.614,2.614,0,0,0-1,3l2,1v2l5,1v3l5,1v1h2v1l2-1v1c1.139,1.139.4,0,1,2l18,1v-1h1v-3c8.985,0.12,8.6,5.047,16,6v5l12,2q0.5,1,1,2h3q0.5,1,1,2l4,1v1h-1q0.5,1.5,1,3h-2v1a2.189,2.189,0,0,0,2-1c0.488-1.327,1,1,1,1v3a3.982,3.982,0,0,0-2,2c-3.631-.674-8.606-2.031-12-3h-9v-1H127c-2.626-.735-15.047-2.379-19-1v1l-4,1c-1.5,2.63-3.189,3.378-4,7H96v-1H95c0.319-.8,2.048-3.14,1-5H95v3c-2.927-.684-3.275-1.113-4-4-2.52,2.048-.412,2.413-5,3-2.888-3.948-3.14-.178-7-2l-1-2-3-1v-3H74l-2-3c-3.051.751-5.257,3.532-8,3v-1l-3,1v-1c-1.139-1.139-.4,0-1-2H57l-2-3H54v-3H53c-0.869-1.406-.718-1.727-1-4,3.018-2.1,1.359-1.818,2-6h1v-1H54v-2H53v-3H52v-4l-3-2v-3c-0.769-3.552-.1-3.488,0-8-3.936-1.139-1.294-.281-3-3H45v-2l-2-1-1-5H41a8.046,8.046,0,0,1-2-4l-12,2v-1H25v-1l-3-1v-7H21v-1l2-1v-3l2-1,1-3H25c0.216-1.4.7,0.382,1-1l-1-5c-3.4-.88-3.065-1.861-3-6,0.8-.328,3.35-0.668,4-1l1-2h4v-1c1.533-.9,2.431-0.825,5-1,3.07,5.087,5.2,1.085,8,3C45.139,142.139,44.4,141,45,143Zm54,88v-3H98v2c-1.975,1.129-2.338,1.417-3,4h1C96.723,231.238,96.279,231.763,99,231Z" />
        </a>
        <?php
        $kdwil = '33.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="banyumas_2" data-name="banyumas 2" class="cls-2" d="M137,157q0.5,2,1,4h2c0.6,6.5,5.275,11.477,8,16,1.3,2.164.765,5.806,2,8h1l3,4c-0.408,1.354-.7-0.382-1,1,0.771,1.281,2.714.564,1,2-1.139,1.139,0,.4-2,1q-0.5,1.5-1,3h1v1h6c0.392,2.7,1.482,2.812,0,5h1c1.7,2.054,2.081.834,4,2q0.5,1,1,2h6v3h-2c0.071,3.86.339,5.872,2,8l2,1v4c-3.133.441-3.043,0.742-5,2v1c-2.03.92-2.888-.836-4-1q-0.5,1-1,2c-2.649.86-6.37-3.351-8-4l-12-2v-5c-2.243-.268-2.646-0.086-4-1v-1h-2q-0.5-1-1-2l-4-1v-1h-5v3h-1c-2.05,1.885-9.224,1.1-13,1v-1h-5v-3l-3,1v-1c-3.42-1.213-6.011-1.248-7-5H94c-1.68-2.84-3.451-2.719-4-7h1l-1-3-7-1v1H81v1H80v-1H79v-3h1v-1h3v-1l2-1v-2h1v-6h2l3-9,16,1,3-6h3c1.088-.595.763-3.235,3-1v-3l2,1c0.956-1.042,1.178-2.021,0-3h8c1.139-1.139,0-.4,2-1v-2h3v-1h1v1h5Zm-35,16c1.139,1.139,0,.4,2,1C102.861,172.861,104,173.6,102,173Z" />
        </a>
        <?php
        $kdwil = '33.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="purbalingga_3" data-name="purbalingga 3" class="cls-3" d="M193,165v5c-1.135.844-.145-0.127-1,1l-6-2v2h-1v3h2q1,4.5,2,9c-1.352.484-2.207,0.4-4,1v1l-3-1v1h1c1.141,1.988-.669,5.153-1,6-3.84-1.477-4.47-.024-8,0v-1h-1v1l-4,1q-0.5,1.5-1,3l-3-1v1h-2v1h-3v1h-4v-1a22.975,22.975,0,0,1-4,1q-0.5-1-1-2h1c1.139-1.139,0-.4,2-1v-2h1c0.455-1.453-1.728-1.4-2-2q0.5-1,1-2l-3-2q-0.5-2-1-4h-1q-0.5-2.5-1-5l-2-1v-3l-2-1v-2c-1.629-2.943-3.5-4.576-4-9h-2q-0.5-2-1-4h-2c0.723-2.762.279-2.237,3-3,2.531-2.475,4.23-.835,8-2v-1h5v-1l9-2v-1l8,1c1.239-2.206,2.827-3.524,4-6l2,1v1h1v5h1c1.8,2.471,4.4,3.384,6,6a34.651,34.651,0,0,1,7-1q-0.5,1-1,2h1c2.063,3.291,5.579,3.9,7,8h-1C193.861,165.139,195,164.4,193,165Z" />
        </a>
        <?php
        $kdwil = '33.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="banjarnegara_4" data-name="banjarnegara 4" class="cls-4" d="M213,144v3h1v1h5v1c2.412,0.856,2.09-1.583,3-2h2v-3h1c3.641,3.042,5.75-.851,9,0v1h3q0.5,1,1,2l3-1v-1h1v1h3v1l4-1v1c2.041,1.34,1.878,1.637,2,5a18.329,18.329,0,0,0-8,2q-0.5,1.5-1,3h-1v2h-1v4l-2,1c-3.188,3.528-7.286,6.042-8,12h-2c-1.049,2.4-1.12,3.212-4,4v1c3.092,0.359,3.137.7,5,2v1l9,2q-0.5,2.5-1,5c-6.122.094-7.835-1.062-12-2v3l-5,3v2l-2-1-2,3h-3v1l-3-1v-1l-3,1v-1c-1.139-1.139-.4,0-1-2-2.594.754-3.223,1.559-5,3v1h-2q-0.5,1-1,2l-7-1q-0.5,1-1,2h-2v-1l-3,1v-2a21.276,21.276,0,0,1-4-1v1h-2q-0.5,1-1,2h-4v1h-3q-0.5,1-1,2h-1v-1a19.456,19.456,0,0,1-5,1c-2.666-4.242-4.838-1.63-5-9l4-1v-1c1.69-.6,3.584-0.1,4,1h1v-2l2-1v-1h3v-1h1c0.845,0.617-.343,1.442,1,1v-1h2v-1l6,1v-6l6-1v-1c1.139-1.139.4,0,1-2-3.813-2.654-.26-2.439-2-6h-1c-1.1-1.623-1.409-1.674-2-4a12.71,12.71,0,0,1,5-1v1h3v-5l3-1q-1-3-2-6c-3.137-.56-4.19-0.974-5-4l3-1q0.5-1,1-2h3q0.5-1,1-2h2v-1c1.365-.371-0.021.307,1,1l2-1c0.945-1.8,1.385-1.574,2-4C207.746,144.47,209.024,144.687,213,144Z" />
        </a>
        <?php
        $kdwil = '33.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kebumen_5" data-name="kebumen 5" class="cls-5" d="M227,203c-3.518.611-4.589,1.076-5,5h1v5l2,1q0.5,1.5,1,3c2.325,0.267,2.521.245,4,1v1h1v-1h1v1l3-1c-0.292,4.281-.558,3.385-2,6h-1c0.061,1.413.736-.389,1,1v3h1c0.586,2.475-2.232,5.51-2,6h1c2.608,3.613,1.96.439,4,2,1.526,1.168,1.034,5.336,1,8,1.883,2.061.223,6.226,0,10a3.982,3.982,0,0,0-2,2l-25-7h-6v-1h-2v-1h-4v-1c-1.351-.08-1.627,1.615-4,1v-1l-11-1v-1c-5.1-1.455-10.1,1.251-13,2l-6-1c-1.382-2.612-1.769-1.693-2-6h1c0.856-2.412-1.583-2.09-2-3v-2h2v-2l-2-1v-1h1a1.624,1.624,0,0,0-1-2q0.5-1.5,1-3c2.523-.021,3.565-0.1,5-1v-1h3c1.3-.972,1.03-3.692,1-6-2.64-1.49-3.66-3.12-4-7,3.442-2.278,1.857-4.616,3-6v-1h6v-1h1c0.929,0.669-.357,1.4,1,1q0.5-1,1-2h6v1h4v-1c7.683-2.067,8.91,2.016,13-5l2,1v-1h1q0.5,1,1,2h2q0.5,1,1,2h1v-1l3,1v-2h2c0.769-.327.4-2.2,2-2v1h1v-1h-1c-1.843-.95,2-1,2-1v1c2.1,0.719,3.767-2.28,5-3v2C226.182,196.266,226.824,200.707,227,203Z" />
        </a>
        <?php
        $kdwil = '33.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="purworejo_6" data-name="purworejo 6" class="cls-6" d="M262,205q-0.5,3-1,6c2.078,1.094,1.771,1.611,5,2v2h3v-1h1v-4l3-2-1-3c2.762,0.723,2.237.279,3,3,1.194,1.1,2.7,2.691,1,4h2v-1c1.644,0.12,1.1,1.543,2,2,1.216-.055,1.559-0.922,4-1,0.579,2.893,1.613,4.023,3,6h1v4l3,1v1a13.483,13.483,0,0,0-3,4h-1l1,3h2c0.124,8.974-2.573,10-4,16h-2a57.8,57.8,0,0,1-4,6l-3,1v3h-1v2h-1v2h-1l1,2c-1.566,3.521-4,3.073-9,3-2.023-2.236-4.171-1.667-7-3v-1h-3c-5.529-2.214-11.339-4.774-19-5,0.367-1.993,1-2,1-2v-5h1q-0.5-7-1-14l-5-1q0.5-3.5,1-7h-1v-4h1v-2h1v-5l2-1v-2h1a8.294,8.294,0,0,0,2-4h2q0.5-1.5,1-3h1v-3h1c0.482,0.544.688,2.4,2,2l2-3c1.793-.766,5.961.573,7,1v1h6Z" />
        </a>
        <?php
        $kdwil = '33.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="wonosobo_7" data-name="wonosobo 7" class="cls-7" d="M267,169h2v2l7,6v1l3,1v4c-1.024,1.1-2.411,5.5-2,8h1v1h-1l1,2h-1v2h-1q-0.5,4.5-1,9h-3l1,3-4,3c-0.92,1.478.429,3.147-1,4h-2v-3h-1c-0.579.416-.147,1.633-2,1v-1h-1v-7l-4-1a1.628,1.628,0,0,1-2,1q-0.5-1-1-2h-6q-0.5,1-1,2l-4-1c-0.38,3.541-1.241,3.036-2,6h-2c-0.723,2.762-.279,2.237-3,3-0.808,3.218-2.559,3.556-4,6l-8-3v-3h-2a34.218,34.218,0,0,0-1-8c3.215-.77,2.155-1.508,6-2-0.689-2.882-1.769-2.466-2-3q-0.5-5.5-1-11h1c2.086,2.427,6.363,2.123,11,2q0.5-2.5,1-5c-4.468-.675-10.9-2.915-12-7,3-1.7,5.122-5.283,6-9h2c0.834-3.394,3.181-4.559,5-7h1v-3c0.455-1.085,3.2-6.55,4-7l7-1c1.38-.867-0.976-2.561,3-5v-1h1v1h1q-0.5,1-1,2l6,5,1,2,4,3v8C267.139,168.139,266.4,167,267,169Z" />
        </a>
        <?php
        $kdwil = '33.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="magelang_8" data-name="magelang 8" class="cls-8" d="M331,171c0.59,4.259,2.1,3.422,4,6h1v6h1v3l2,1c1.474,2.439,1.76,4.453,2,8h-1v2l-2,1v1c-3.031,1.718-2.532-1.545-5,2-1.135.844-.145-0.127-1,1,2.091,0.127,9.5,3.139,10,4v2h-2c-1.414,2.457-3.717,3.242-5,5v2l-2,1v1h-2l-3,4h-3l-3,4h-2v1l-4,3v3l-4,2v-2h-1v-4h1v-1h-1l1-2h-1c-1.139-1.139,0-.4-2-1v2h-4v-1c-1.7-.344-1.722.936-2,1a2.592,2.592,0,0,1-3-1c-5.768-1.53-7.921,1.736-11-3h-1v-4l-3-2q-0.5-2.5-1-5a34.651,34.651,0,0,1-7,1c-0.479-4.011-3.68-7.528-2-13h1v-4l2-1-1-4h-1l3-9a10.6,10.6,0,0,1,4-1v1l16-1v-1c0.259-.041,2.263.956,4,1v3h1c0.573-3.035,4.568-7.763,6-4l5-1,1-2,6-2a11.878,11.878,0,0,1,1-5A29.092,29.092,0,0,0,331,171Zm-30,29h2v1c1.411,0.088-.414-1.014,1-1l3,1v-5h-1v-7l-3,1Q302,195,301,200Z" />
        </a>
        <?php
        $kdwil = '33.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="boyolali_9" data-name="boyolali 9" class="cls-9" d="M394,139l-1,3h1c0.978,1.772,1.352,1.609,2,4h3v1h1v4c-2.126,1.419-2.023,2.617-3,5h5l7-8,3,1v2h-2c-0.579,1.176-1.752,1.574-2,2-0.894,1.538.415,3.117-1,4h-4l-1,2h-5c0.579,4.369.626,2.626,0,7l3-1-1-2h1c1.139-1.139,0-.4,2-1,0.594,3.715.58,2.289,0,6h2v4h-2l-1,3a2.614,2.614,0,0,1,1,3l-2,1v2h-2c1.415,3.624.724,5.325,0,9,4.119,1.017,1.106,1,3,3,0.973,1.026,1-1,1-1,1.575-1.142.886,1.576,1,2l3,9a3.982,3.982,0,0,0-2,2c-3.013-.468-1.651-0.823-4,0v-2c-1.356-.4.369,0.647-1,1-2.376.613-3.75-.5-5-1v2h-5v1l-2-1v2c1.974,1.239,2.438,2.3,3,5h-2l1,3-5,1c-0.06-1.413.172,0.146,1-1,1.142-1.581-2.458-.931-3-1v1c-2.081,1.085-2.878-1.193-4-1v1h-3v-2l-3,1v-2c-1.849.775-5.36,0.661-3,3h-5v-1l-2,1c-1.192,2.213-2.33,2.988-3,6-3.861-1-3.824-1.178-3-4h-1c-1.131-1.4-2.122-4.161-4-2v-2c-1.335-.361-1.994.854-2-1,0,0,2.084-.092,1-1h-2c-0.155-1.406.066,0.062,1-1-0.774-1.359-.75-1.149-2-2v-1c-1.487-.071-1.588,1.479-4,0l-1-2-9-3v-2l5-1c0.72-1.333,2.816-2.656,3-3v-4h1l1-4,2-1-1-2c1.049-1.02,1.271.765,3-2l7,2,1,4c3.2-1,3.427-1.356,6,1v2h1v-2l4-1c-0.1,2.612-.252,3.426-1,5h1c1.829,3.373,3.538,4.1,9,4,1.077,0.923-.076.663,2,1v-1h1v1h1v-4h-3l-2-3h3v-2l-4,2v-2c1.287-.9,2.114-0.625,2-3h-1v-1h1v-6h-1v1c-0.86,1.889-1-2-1-2,2.672-2.365.55-2.891,2-6,0.371-.795,1.284,0,2-3l-6,1v-1c-3.492-2.045-2.387-1.4-2-5,1.135-.844.145,0.127,1-1h3c0.272-2.322.236-2.524,1-4h1q-0.5-2.5-1-5h-1l1-4,3,1v1h3v1c1.516,0.927,2.444.82,5,1,0.513-2.405,1.29-3.077,2-5h-1c-1.139-1.139,0-.4-2-1v-2l7-5,1-3h2Z" />
        </a>
        <?php
        $kdwil = '33.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="klaten_10" data-name="klaten 10" class="cls-10" d="M344,207c3.117,0.858,4.506,2.663,6,5l1,3h2v2c2.356,1.987,2.348,4.035,6,5v-1h1v-3l4-3v-1c0.851-.435,2.04,2.114,4,1v-1c1.139-1.139.4,0,1-2l4,1v1h5v1h1a1.616,1.616,0,0,1,2-1v1h4v1c2.29,0.647,2.8-1.242,4-1v1l4,1,1,3,3-1v1c0.923,1.077.663-.076,1,2h-1v1h1v-1l2,1,1,3c-3.045,2.125-.51,1.095-2,4l-2,1v1h1v1h-1v4h-1v2h-1c-1.07,1.526-.977,1.461,0,3h-2v1l-3,2v2l-2,1,1,3h-1v1h-1v-1c-0.4-.038-2.244.884-4,1-0.844-1.135.127-.145-1-1v-3h-2v3l-9-1v1h-1v-1h-1l-1,2h-1v-1c-1.139-1.139-.4,0-1-2h-2v-1a1.75,1.75,0,0,0-2,1l-8-1v-2h-3C348.87,233.049,344.863,221.039,344,207Zm13,13h2v1C356.99,220.426,358.135,221.12,357,220Z" />
        </a>
        <?php
        $kdwil = '33.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="sukoharjo_11" data-name="sukoharjo 11" class="cls-11" d="M389,206c2.4,0.119,5.053,1.645,6,0v2h3c0.618,1.207,1.681,1.484,2,2v3l3-1c2.685,1.42.4,3.429,6,4l2-4c0.813-.707.6,0.743,2-1,3.469,0.48,1.079.743,4,0,0.7,0.473.583,1.349,2,2v-1h1v2a5.272,5.272,0,0,1,2,4h-1v1h4v1l3-1-1,2c0.753,1.2,1.234-.4,1,1a1.694,1.694,0,0,0-1,2h1q0.5,2.5,1,5h-1l1,3h-1v1a1.487,1.487,0,0,1,1,2l-2,1,1,3h-1v2h-1v1h1v4c-2.92-.653-3.954-1.629-6-3v-1h-7c-0.844,1.135.127,0.145-1,1q-0.5,5-1,10c-1.135-.844-0.145.127-1-1-1.139-1.139-.4,0-1-2h-4v-1l-6,1-1,3-2-1c-0.71.831-.507,4.4-2,2-1.719-1.127-1.355-.633-2-3l-4-1,1-3h1l1-3,2-1-1-2h2v-1l2-1q1-3.5,2-7c-0.537-.618-1.534.309-1-1l2-1v-2c0.2-.323,3.338-2.635,3-4h-1v-1l-3-1c-0.329.323,0.208,1.735-1,1v-1c-2.41-1.822-3.524-2.014-4-6-2.142.119-3.4,1.019-4,1v-1h-2l-1-3h2v-1h-1c1.126-1.229-.03-0.427,2-1Q389.5,208.5,389,206Z" />
        </a>
        <?php
        $kdwil = '33.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="wonogiri_12" data-name="wonogiri 12" class="cls-12" d="M473,237v3c2.57,0.554,3,2,3,2a1.5,1.5,0,0,0,2-1,1.765,1.765,0,0,1,2,1c1.7,0.205,2.771-2.893,5-2v1c1.016,0.771.984,1.229,2,2-0.626,3.075-1.6,3.462-2,7,2.762,0.723,2.237.279,3,3h1v5h2v2c-2.393.607-1.858,0.318-3,2h-1l1,3-2,1v3h-1v2l-2,1c-0.614,1.274.792,0,1,1l-1,2a12.71,12.71,0,0,1-5,1c-0.757-1.378-2.292-3.687-4-4v1a12.971,12.971,0,0,1-4,1v-2a15.682,15.682,0,0,0-6-1c-1.139,1.139,0,.4-2,1v2h-1c-0.181.892,2.184,2.939,1,5-0.824,1.434-2.654.024-4,1v1c0.53,0.54,2.112,7.548,2,8h-1v2h-1l1,3h-1v1h-6l1-5c-1.135-.844-0.145.127-1-1h-3c-0.246,1.783-1,2-1,2v1h1v1h-1v1h1l-1,2c-7.3,3.424-12.727,1.923-19-1-1.035,4.249-3.955,5.527-5,10l-3,1v1h1c0.179,1.4-.636-0.366-1,1v3h-1q0.5,5,1,10l-13-2,1-5-3-2v-3h-1c-0.776,3-.616,2.63-4,3q-0.5-7.5-1-15h-1l-1-4h-1v-2l-2-1c-0.472-1.265,1.517-6.868,2-8h1V267h1q0.5-3,1-6h1c0.355-1.691-.944-1.745-1-2v-5h1l-1-3a7.49,7.49,0,0,0,3-2l6,1v1c1.139,1.139.4,0,1,2h3c-0.119-5.228.589-7.889,2-11l3,1a1.547,1.547,0,0,1,2-1l6,5v-1h1v-6h4q0.5,2.5,1,5h1v-1a1.426,1.426,0,0,1,2,1h4v-1l4,1,1,3c1.135-.844.145,0.127,1-1h1l-1-3,5-1v-1l3,1,1-2,3,1,1-3c0.933-1.176,2.969-1.713,4-3Z" />
        </a>
        <?php
        $kdwil = '33.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="karanganyar_13" data-name="karanganyar 13" class="cls-13" d="M438,205c4.284,0.092,4.695.217,7,1v-1h-1v-1h1l-1-2h1a8.278,8.278,0,0,1,5-3c0.392,2.7,1.482,2.812,0,5h1v1l4-1a1.516,1.516,0,0,0,2,1l1-3c1.159-.715,1.677,1.893,2,2h3c0,3.019.048,4.932,1,7h1l-1,2h2l-1,2c0.6,1.28.462-.308,1,1,1.69,0.835,2.308,2.877,4,1v9h-1v1h1q-0.5,4-1,8l-10,2-1,3h-1v1l-2-1-1,2c-3.226,1.552-5.42-.637-8,2h-1v3h-1c-1.411-2.348-2.69-3.556-7-3v1h-1v-1c-1.972-.608-2.524-0.444-4-1v-3h-2v-1h-1v1l-2-1,1-3h-1v-1h1c0.95-3.114.357-1.877,0-5l2,1a8.367,8.367,0,0,0-2-2q-0.5-2.5-1-5a1.764,1.764,0,0,0,1-2c-0.318-1.378-.776.4-1-1h1v-1h-2v-1c-1.2-.754-0.406.88-1,1l-3-1v-1h-1c-0.539-1.916.591-1.366,1-2l-1-3-2,1v-2l-3,1v-2h-1v1c-1.581,1.142-.931-2.458-1-3,1.139-1.139.4,0,1-2-3.514-1.474-7.793-3.282-11-5,0.981-3.032-.226-4.357-1-8a3.982,3.982,0,0,0,2-2c2.59,0.924,5.808,1.506,8,3l2,3,9,1v-1h1v1l3-1v2h1c1.4-2.052.882,0.937,2,2l2-1v2h1v-1c1.4,0.645,1.038,1.2,2,2h1v-1C438.2,204.149,437.325,203.04,438,205Z" />
        </a>
        <?php
        $kdwil = '33.14';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="sragen_14" data-name="sragen 14" class="cls-14" d="M462,159v3h-1l-1,4h1c1.139,1.139,0,.4,2,1-0.665,2.888-1.793,2.514-2,3v9h-1v2h-1v2h-1c-0.908,1.383-.688,1.751-1,4h1q0.5,3.5,1,7h1v3h1c1.314,1.872,1.594,1.915,2,5-1.135.844-.145-0.127-1,1-2.444-.574-2.206-1.047-4-2-0.929,3.45-1.3,1.867-3,4l-4-1v-5c-4.864.216-3.385,1.068-7,2v4l-12-3-1-2-5-1v-1h-4v1l-4-1v-1h-3l-2-3-3-1v-1c-2.285-.99-3.91,1.11-5,1v-1c-2.022-.311-1.21.434-2,1h-1v-1c-1.4-.165.157,0.186-1,1l-2-1-1-2,2-1c-0.115-1.635-1.574-1.111-2-2,0.1-1.411.8,0.4,1-1v-3h-1v-1h1l-1-2h1v-1l2,1,2-3h-1v1c-0.86,1.889-1-2-1-2a4.765,4.765,0,0,0,2-4h-1v-1h1v-2c-0.386-.29-1.713.221-1-1h1v-1h2v1l2-1v1h1v1h-1c-0.979,1.654,1.44.846,2,1v2h1v-3h3v-2h-2c-0.626-3.075-1.6-3.462-2-7h1v1l5-1v1h4l1,2h1v-1l2,1,1-2a1.507,1.507,0,0,1,2,1l4-1-1,2h1v-1h4c0.518-.253.335-1.7,2-2v1h1l1-3,3,1v-1h1l1,2,3-1s0.069,1.316,2,1v-1h1c0.63,0.535-.31,1.533,1,1,0.34-.138.191-1.351,3-2v-2l2,1v-1h1v1h2v1C459.361,158.89,459.744,158.766,462,159Z" />
        </a>
        <?php
        $kdwil = '33.15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="grobogan_15" data-name="grobogan 15" class="cls-15" d="M471,118l3,1v8h-1v1l2,1v4h1v2h1q0.5,4,1,8h1q-1,6.5-2,13c-2.142.119-3.4,1.019-4,1v-1h-2v2c-2.261.386-7.587,2.393-11,1l-1-2h-5v1l-3-1v1c-2.6,1.711-1.949,2.452-6,3-1.749-2.024-1.4.1-3-1v-1h1c-1.118-1.014.02-.493-2-1-1.354,1.587-2.169,1.737-5,2v2l-9,1v-1h-3s-0.014-2.014-1-1v2h-3v-2h-8l-1-2h-2c-0.679-3.807-.662-3.2,0-7h1v-1h3v-1c-2.078-1.094-1.771-1.611-5-2l-1,3h-2l-1,3c-1.279,1.46-3.477,1.7-6,2l3-9h-1c-1.139-1.139,0-.4-2-1v-2l-4-1v-5h-2c-1.648,3.948-3.449,6.92-8,8l1,4h1q-0.5,2.5-1,5c-3.132-.382-3.07-0.744-5-2v-1l-2,1v-1h-7q-0.5-2.5-1-5a1.919,1.919,0,0,0-1,2l-3-1v1c-1.539.325-1.3-1.648-2-2h-2v-1l-3,1v-1h1l-1-3h2v-4h2v-2l5-1v-2c-3.394-.76-4.622-2.141-5-6,2.078-1.094,1.771-1.611,5-2,0.381-3.043.65-3.2,2-5h1c1.469-2.329,1.867-6.336,2-10l7-1a9.846,9.846,0,0,0,2,2c0.792,1.8-.578,3.153-1,4h1c1.139,1.139,0,.4,2,1-0.871,3.428-2.068,2.575-3,6h1c0.895-1.592,3.33-5.41,6-5v1l4,1v-1l5-1v-2l2-1c0.414-1.352-.655.371-1-1-0.824-3.272.592-5.746,1-8h1c1.139,1.139,0,.4,2,1l3,8h1v-1l2,1,1-2,3,1v-1c1.139-1.139.4,0,1-2l4-1,1,2h3l1-3c2.122,0.393,4,1.8,7,1v-1h12l3,1,9-3v-1a3.982,3.982,0,0,1-2-2h1c1.139-1.139,0-.4,2-1l1-3h1v7h-1l1,4c2.536-.8,4.592-0.1,9,0C466.982,113.974,469.9,113.886,471,118Z" />
        </a>
        <?php
        $kdwil = '33.16';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="blora_16" data-name="blora 16" class="cls-16" d="M475,89h2c0.982,0.432-.013,2.465,3,2V90l3-1v1h2v1h8v2l2-1v3c1.99-1.354,4.01-1.039,6,0v1a2.507,2.507,0,0,0,3-1c2.475-.556,2.186.392,3,1l3-1v1c1.33-.481-0.1-0.1,1-1,1.139-1.139.4,0,1-2l13,2v2h3c0.994,0.465.8,3.273,3,1v2l3-1v2h1c1.047,1.886-.692,4.172-1,5h1c2.247,2.531,2.705.687,5,2v1l3,2c-0.436,2.466-2.212,7.332-1,11h1q0.5,2,1,4l-3,2v1h1v7h-2q0.5,1,1,2l-2,1a25.639,25.639,0,0,0-3,8l-3-1v1h1v3l-3-1q-0.5,1-1,2h-2q-0.5,1.5-1,3l-3,1q-0.5,1-1,2l-3-1q-0.5,1-1,2l-4,1v-2h-1v3h-2q0.5,1.5,1,3h-1v2h-1l-1,3h5v1c-2.441,2.011-2.814,5.434-2,8h-3v-2l-10-2v-1c-1.426-.859-1.723-0.687-4-1v-2c-2.254-.213-2.649-0.112-4-1v-1h-2v-1l-4-1v-1c-3.534-1.377-5.467.6-8-2-1.139-1.139-.4,0-1-2h-2l-1-3h1c1.139-1.139,0-.4,2-1q0.5-3,1-6h1q-0.5-6.5-1-13h-1l-1-4h-1q-0.5-7.5-1-15c-4.092-1.119-1.032-.686-3-3h-1v-1l-3-1-1-2c-3.424-1.678-7.187.678-10-2-1.139-1.139-.4,0-1-2h1v-6h1v-1l4,1V99c5.048-.067,5.72-1.484,10-2q0.5-2,1-4h3V89Z" />
        </a>
        <?php
        $kdwil = '33.17';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="rembang_17" data-name="rembang 17" class="cls-17" d="M554,71v4h-4v1h-1c0.7,4.032.4,3.661,0,8-3.807.679-3.2,0.662-7,0-0.333,1.941-1,2-1,2v9l-2,1,1,3h-5c-0.219.045-.33,1.371-2,1V99c-1.881-.606-2.59-0.487-4-1v1h-1V97l-7-1-1-2-3,1V94h-2V93c-0.533-.048-2.1.911-4,1v3h-1c-4.213-4.3-4.609.652-10-1V95h-4l-2-3-11-2v1h-1V86h1c0.832-2.558-2.409-3.031-3-4V80h-1V74l-2-1V69h1c0.688-2.792-.432-5.5-1-7l10-1v1h2v1l11,1,16-7V53a13.307,13.307,0,0,0,4-3h2l1,2,5-1v1l5,1,2,3h2l2,3,5,4,1,2h2v1C549.288,67.92,550.725,70.08,554,71Z" />
        </a>
        <?php
        $kdwil = '33.18';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="pati_18" data-name="pati 18" class="cls-18" d="M445,16c-0.067,5.607.32,10.879,2,15h1v3l2,1v2h1v3h1v2h1v2h1q0.5,2,1,4l2,1v2l4,3,1,2h4v1h2v1l2-1v1c3.629,1.728,5.776,1.728,7,6,2.1,2.592-1.674,4.779,0,9l2,1v7l3,2c1.262,3.25-1.837,2.446,0,6h-1c-1.127,1.719-.633,1.355-3,2V89l-3-1v4c-3.217.738-3.641,1.357-4,5l-6,1v1l-4-1v3l-6-1a6.749,6.749,0,0,1-5,4c1.139,1.139,0,.4,2,1-0.723,2.762-.279,2.237-3,3-1.838,1.724-11.451,2.038-16,1v-1l-5,1v1c-3.372.871-4.312-1.122-6-2l-1,4c-2.123-.292-2.805.038-4-1v-2l-3,1-2,3-8,1a2.5,2.5,0,0,0-1-2c-0.3-1.555,1.78-1.311,2-2a1.527,1.527,0,0,0-1-2l1-4c2.01,0.574.865-.12,2,1,2.01-.574.865,0.12,2-1,2.22-1.5,2.484-4,3-7l5-1q-0.5-2-1-4h8c3.634-5.186,8.834-1.446,9-11-1.433-1.478-1.917-5.053-2-8h-3V72c-1.139-1.139-.4,0-1-2-2.762-.723-2.237-0.279-3-3h2c-0.4-6.912-4.415-8.772-6-14-0.792-2.614.778-4.636,1-6,1.3-8-.034-12.93,1-19,3.541-.38,3.036-1.241,6-2V24h1v1l2-1c0.844-1.135-.127-0.145,1-1V22h-1V21h1V14h4c1.4-.182-0.414-1.021,1-1v1C440.527,14.94,441.347,15.573,445,16Z" />
        </a>
        <?php
        $kdwil = '33.19';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kudus_19" data-name="kudus 19" class="cls-19" d="M420,50l-1,3,2,1q0.5,2,1,4l2,1v3h1c0.875,1.414.682,1.732,1,4h-2v3c2.84,1.68,2.719,3.451,7,4,0.228,5.9,2.753,10.748,1,13l-1,2h-3v1h-2l-1,2h-2v1c-2.176.87-5.033-.407-6-1v1h-1q0.5,2,1,4h-4c-1.176,2.807-2.642,6.43-4,9l-4-1v1h-1v3c-3.087-.7-4.254-1.949-5-5,0.44-.477,1.058-3.641,2-6l3-1c0.478-4.278,2.332-4.188,4-7h-3V87h-3V85c-2.455-1.5-.643-1.329-2-3h-1V81c-2.32-1.966-1.859,1.086-3-3h1V75h1c2.322-2.512,2.49-.848,6-2V72c1.3-.4,3-0.366,3,1h1V71h1c0.3-1.7-1.98-1.781-2-2V68h1q-0.5-2-1-4h2q0.5-3,1-6l2-1-1-2h2V51a3.983,3.983,0,0,0,2-2A12.7,12.7,0,0,0,420,50Z" />
        </a>
        <?php
        $kdwil = '33.20';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jepara_20" data-name="jepara 20" class="cls-20" d="M413,50c-0.138,2.554-.085,3.5-1,5h-1v3l-2,1v5h-3v1h1v5h2c-0.844,1.135.127,0.145-1,1v1h-5v1h-1c-0.48-.412.261-1.641-1-1l-1,2h-2c-1.236,1,.007,2.7-1,4-1.107,1.431-4.48,1-7,1V78l-3,1-1-3c-1.034-1.171-3.163-1.615-5-2V66l-8-1-1-3c1.164-.764,5.1-6.624,5-8h-1q-0.5-2-1-4l3-2q0.5-4,1-8h-2c-0.775-1.183.606-.9,1-1,1.894-3.181,4.391-3.3,5-8h-2l1-3,2,1V27l4-3c0.953-1.538-.354-3,1-4h2V19h6l1-2h2V16l3,1V16h4l2-3c3.917-1.864,21.918,1.168,24,2-0.633,4.1-.22,3.127,0,8l-2-1-2,3-3,1v1l-3,2v2h-1c0.571,4.037.724,2.72,0,6h1v1h-1v9c-0.045.221-1.368,0.33-1,2h1v1h-5V49Z" />
        </a>
        <?php
        $kdwil = '33.21';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="demak_21" data-name="demak 21" class="cls-21" d="M385,75q0.5,2,1,4h12v2h3c-0.231,1.4-.053-0.05-1,1l3,5,3-1v1h1l-1,2h1c1.139-1.139,0-.4,2-1-0.79,3.079-2.417,3.781-4,6h-1l1,3h-3c-1.178.906,0,3,0,3h-2l1,2h-2l1,2-2,1,1,2h-1v1h-1l1,3h-2c1.2,1.885.563-.713,2,1v1h-1v4l-2,1v1l-5,1v-1c-3.193-.549-5.489-1.848-8-3l1-3-2-1v-2l-9,1,1,5-2,1,1,2-2,1v2h-1c-0.919,1.366-.7,1.758-1,4l-5,1v4c2.128,1.212,2.177,2.252,5,3v2l-7,2v-1h-2v-1l-4,1-1-2h-2v-4l-3-1c0.7-2.835,1.783-2.888,3-5-1.975-1.129-2.338-1.417-3-4,2.155-1.248,2.931-2.687,4-5h-2l1-5h1l-1-5c-3.163-.589-4.631-1.657-6-4,3.012-1.839,7.31-7.8,9-11,2.081-3.939-.153-5.574,5-7l1-3h1q1-3.5,2-7h-3q0.5-2,1-4l-2-1V67h4v2a12.249,12.249,0,0,0,2-2l3,1V67h2l1-2,8,1c0.844,1.135-.127.145,1,1-0.24,1.307-1.1,6.82-1,7h1v1h4Z" />
        </a>
        <?php
        $kdwil = '33.22';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="semarang_22" data-name="semarang 22" class="cls-22" d="M344,128c3.561,0.356,5.161,1.779,8,3l-1,3h1v1l3,1v1c2.187,0.768,2.953-1.34,4-1l1,2h2v5l-2-1,1,2h-1l-1,3h5v1l2-1v2h2v-2l2,1v-1c2.012,1.86-.1.977,1,3l2,1v5h1l1,3h-1l-2,5h-3a29.413,29.413,0,0,0,1,7l6-1q-0.5,3-1,6h-1q0.5,4.5,1,9h-1l1,3-2,1c-0.831,2.582,1.342,4.483,2,6h3v3c-4.107.085-7.287-.253-8-1-2.269-1.286-2.637-1.628-3-5h-1c-0.664-1.2,1.725-.733,2-2h-1l-1-3h-4v2l-3-1-4,1v-1c-0.923-1.077-.663.076-1-2h1v-1h-1c-2.414-2.4-5.987-1.572-9-1a16.5,16.5,0,0,1-4,7v-1c-2.2-1.462-4.118-5.433-5-8v-5h-1v-2h-1c-1.856-2.018-2.026-.7-3-4l-8-2v-2h-1l1-2h-1v-2h-1l-1-2h-2l-3-4h-2c-0.129-4.585-1.461-5.228-3-8l3-1v-1l2,1v-1c1.71-.342,1.714.934,2,1,3.341,0.775,5.682-.621,8-1v-1h-2v-3l2,1v-1h-1l1-2h-1v-1h3c-0.316-2.738-1.052-4.739,0-6l1-2c3.287,1.469,7.114,2.964,10,0,1.139-1.139.4,0,1-2h5v-2Zm3,36q0.5,2.5,1,5h-1v5h1v5l3,1v1c1.2-.053,1.578-0.912,4-1v-4l3-1-2-6h-1v-5h-1c-2.583,3.054-.844,1.616-4,0v-1Z" />
        </a>
        <?php
        $kdwil = '33.23';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="temanggung_23" data-name="temanggung 23" class="cls-23" d="M297,131v2c-2.762.723-2.237,0.279-3,3h-3l1,3c7.425-.011,5.175,1.828,9,5v1c4.81,3.245,8.569-3.053,9,6h2q0.5,3,1,6h2l4,5,3,1v2c0.547,0.567,1.541-.307,1,1-0.136-.016-3.515-0.241-2,1h2a7.8,7.8,0,0,1-1,4h-1l1,3h-1c-1.744,2.042-5.634,2.638-8,4v1l-6-1v2l-4,1v-1H291c-1.4.378-6.093,1.972-9,1v-1h-3l-1-2h-2l-4-5-2-1v-2l-4-3v-9c-3.376-.813-9.155-6.64-10-10a24.6,24.6,0,0,0,10-4l3-4h2l2-3h2l1-2h4l1-2h2l1-2h2v-1S294.767,131.021,297,131Z" />
        </a>
        <?php
        $kdwil = '33.24';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kendal_24" data-name="kendal 24" class="cls-24" d="M304,90v2c1.677,1.382,3.941,6.236,5,7l9,3-1,4h-1v1h1v1h-1v3h-1v5l-2,1v6h3c1.382,2.612,1.769,1.693,2,6h1l-1,2h1c2.126,2.026,5.538.524,8,0v2h-1v1h1v5h-2v5h-3v1h3v3h-8v-1c-1.669-.264-1.744.943-2,1h-5v-2c-5.707.063-6.29-1.044-10-2v-2c-1.257-.673-2.782-2.889-3-3h-5v-1c-1.139-1.139-.4,0-1-2h3v-2l5-1q0.5-2.5,1-5h-3v3c-2.157-.026-11-1-11-1v1l-4,1-2,3-6,1-3,4h-2l-1,2h-2l-1,2c-2.867,2.6-5.6,3.79-11,4q0.5-3,1-6h1v-5l2-1v-2h1v-2h1v-2l2-1v-2h1q-0.5-4-1-8c4.27-.745,6.427-2.637,9-5l1-2h3v-1h-1q1-2.5,2-5h-1c-0.426-1.318.909-2.007-1-2v1l-2-1v-1h1c0.156-1.406-.99.414-1-1q0.5-2,1-4l9-1V96h1v1h1l1-2,5-1V93h2l1-2h2V90h-1l1-2Z" />
        </a>
        <?php
        $kdwil = '33.25';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="batang_25" data-name="batang 25" class="cls-25" d="M217,92c3.913,0.346,6.218,1.991,9,3h4v1h3v1h2v1h5v1h3v1h11V99h1v1h3v1l15-1c-0.113,3.16-1.955,1.874,1,3v2h2v1h-1v1h1v4h-2a16.878,16.878,0,0,1-6,7v1l-2-1c-0.816.605-.517,1.305-2,2v-1h-1v4h1q-0.5,3.5-1,7l-2,1-1,4h-1l-1,4h-1c-1.781,4.249,1.336,5.574-4,7v1c-3.135,1.526-3.248-2.264-6-2v1l-6-1c-1.333.017-1.688,1.753-4,1v-1h-2v-1c-3.31-1.749-4.972-.878-6-5h-1v-5l-5-1q0.5-1.5,1-3h1v-3h1a1.673,1.673,0,0,0-1-2q0.5-3,1-6h-1q-0.5-2.5-1-5l-3,1v-2c-1.148-1.051-1.906-.725-4-1-0.53-4.124-2.163-4.393-4-7h-1v-3l3-1q0.5-3,1-6h2Z" />
        </a>
        <?php
        $kdwil = '33.26';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="pekalongan_26" data-name="pekalongan 26" class="cls-26" d="M206,101h4c1.351,5.107,5.642,5.164,7,11h2l2,3,3-1q0.5,7.5,1,15h-1l-2,3h1c1.34,2.041,1.637,1.878,5,2,0.037,4.652,1.217,5.545,2,9h2v2c-4.218-.029-6.725.223-9,2q-0.5,1-1,2c-1.265.632-.08-0.793-1-1-0.976-.219-2.756,1.968-5,1l-2-3-9-2v2h-2q0.5,1,1,2h-1c-1.606,2.35-1.9,2.97-6,3q0.5-1,1-2h-1c-0.844,1.135.127,0.145-1,1q0.5,1,1,2h-1v1h-3v1l-2-1q-0.5,1.5-1,3l-2-1v1c-1.139-1.139-.4,0-1-2h-1v-3h-1v-4h-1v-1h1v-1h-2v-1h1v-1c-1.413-.06.146,0.172-1,1-1.581,1.142-.931-2.458-1-3h-1v-3h-1v-1h1v-1h-1v-3c2.393-.607,1.858-0.318,3-2l-2,1v-5a4.9,4.9,0,0,1-2-5h1v-1a1.48,1.48,0,0,1-1-2l2-1v-1h-1c-0.19-2.228,1-2,1-2v-6l5-4v-2l2,1q0.5-1,1-2h3v-1h-1c-0.479-1.438,1.762-1.417,2-2a1.518,1.518,0,0,0-1-2V96h2c0.6-2.909,2.856-3.206,1-5h2c0.8-3.506,1.772-3.9,6-4v1h5v1h1v4C206.035,94.891,206.2,97.044,206,101Z" />
        </a>
        <?php
        $kdwil = '33.27';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="pemalang_27" data-name="pemalang 27" class="cls-27" d="M189,80v3c2.771,1.57,4.044,3.2,8,4-1.263,6.034-6.008,7.894-4,14-5.656.4-11.808,4.94-12,11h1c0.8,1.857-3.27,5.569-3,7a1.706,1.706,0,0,1,1,2c-0.035.179-1.536,0.34-1,2l2,1v1h-1q1,2,2,4h-1v1h1c0.36,2.253-2.156,2.328,0,3v1h-2v3h2q-0.5,1-1,2h2c-0.021,1.084-2.048,2.015-1,4l3,1q-0.5,1-1,2h1v2h1c0.788,2.221-1.313,2.891-1,4h1q0.5,1.5,1,3h-2c-1.886-2.013-.826.081-3-1q-0.5-1-1-2l-3,1v-2c-2.444-.574-2.206-1.047-4-2v-1h1v-1h-1v-3h-1q0.5-1,1-2h-1v1l-2-1q0.5,1,1,2c-1.823,2.11-3.686,0-5,5h-3v-2l-2,1c-0.5-.317-0.206-1.723-2-1q-0.5,1-1,2l-2-1v2c-1.412.07,0.085-.093-1-1a6.13,6.13,0,0,0-2,2h-7v1l-2-1q-0.5,1-1,2c-1.78.72-1.481-.582-2-1-1.449.333-1.814,1.924-2,2l-3-1v1c-1.139,1.139-.4,0-1,2h-4v-1h1c0.335-1.54-1.684-1.307-2-2v-3h-1q0.5-2,1-4h-1v-4h-1a1.591,1.591,0,0,1,1-2q-0.5-1.5-1-3h4c1.373-3.177,3.185-6.307,4-10,3.16-.763,3.65-2.227,7-3,0.175-5.035,2.079-6.7,3-11h3c0.56-3.137.974-4.19,4-5q-0.5-4-1-8c1.574-4.418,6.151-2.67,4-9,9.287-.6,22.443-6.708,26-13h1v1l2-1C186.885,78.424,185.958,79.278,189,80Z" />
        </a>
        <?php
        $kdwil = '33.28';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Tegal_28" data-name="Tegal 28" class="cls-28" d="M153,108h-2v3h-1c-1.166,1.361-1.825,1.528-4,2-0.165,3.023-1.382,8.445-3,10-1.719,2.03-4.2,2.523-6,4-1.48,1.216-2.757,6.323-3,9l-5,1q0.5,7,1,14h1v2h1q-0.5,2-1,4h-2v2l-4,1q0.5-2.5,1-5l-5,1c-2.165-4.015-4.451-5.157-11-5v-3h-3v-1c-1.139-1.139-.4,0-1-2,3.053-1.639,4.819-3.278,5-8l-2-1v-1h-1v1h-1v3h-1v1h-2q-0.5-1-1-2l-3,1v-1l-7-1-1,3H90l-1-5h4a15.68,15.68,0,0,0,1-6,13.76,13.76,0,0,1-3-4c3.67-.217,3.89-0.618,6-2v-1h4q-0.5-2.5-1-5h1c1.086-3.054.717-2.536,0-5h4v-2h3v3h1v-5h1c0.215-1.4-.2.166-1-1,0.21-1.4.655,0.372,1-1q-0.5-5-1-10a10.6,10.6,0,0,1,4-1c1.5,1.759,2.7,1.9,6,2V95h3q0.5-3,1-6a10.6,10.6,0,0,1,4-1c3.873,5.621,21.3,3.308,29,3a3.981,3.981,0,0,0,2,2c-1.581,3.292-3.537,4.536-5,8h-1C151.93,101.274,152.948,106,153,108Z" />
        </a>
        <?php
        $kdwil = '33.29';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Brebes_29" data-name="Brebes 29" class="cls-29" d="M71,75v4c5.858,2.583,11.82,5.828,20,6V84h1V81l3,1,1-2h2l2-3h2V76h1v1c2.381,0.2,2.563-.479,4-1,1.048,4.188,4.817,7.535,6,12-3.064,2.116-.493,1.156-2,4l-2,1,1,2h-1v5h1q-0.5,5-1,10c-5.1.255-3.494,1.393-8,2-0.152,5.195-.71,5.761,0,10a7.174,7.174,0,0,1-4-1v1c-1.719,1.127-1.355.633-2,3H91v1c3.915,2.4,2.629,5.567,2,9H89l1,5h2l1-3c2.2,0.376,1.839.948,2,1h5v1l3-1v1c1.484,0.75,1.676.721,4,1v-4h3q0.5,2.5,1,5a9.11,9.11,0,0,0-5,6c2.4,1.049,3.212,1.12,4,4h7v2c3.748,0.989,3.079,2.661,8,3v4l-8,1v3l-2-1q0.5,1.5,1,3l-5,1q-0.5,1.5-1,3c-2.077,3.2-2.734,3.065-8,3v-1H91s-0.185-.694-2-1l-1-3H84l-3-5H79l-1-2c-4.156-2.141-4.317,1.949-6-4,1.139-1.139.4,0,1-2l-7-1v-4H65v-1l-5,1-1-2H55v-1a1.593,1.593,0,0,0-2,1,23.148,23.148,0,0,0-4-1v-3c-1.8-.945-1.575-1.385-4-2a13.816,13.816,0,0,1,5-7v-1c4.115-2.539,5.972,3.37,8-3h1l-1-3,2-1c1.5-3.9-2.457-4.384-1-7,1.139-1.139,0-.4,2-1l-1-5H59v-1H56l-1-13h1l1-4,7-5V89h1V87l2-1c1.339-2.9.371-9.876,0-11h4Z" />
        </a>
        <?php
        $kdwil = '33.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_magelang_71" data-name="kota magelang 71" class="cls-30" d="M302,200a29.37,29.37,0,0,1,2-10h2v1h-1l1,2h-1v2h1l1,4h-1v1h-4Z" />
        </a>
        <?php
        $kdwil = '33.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_surakarta_72" data-name="kota surakarta 72" class="cls-31" d="M410,215c-3.67-.217-3.89-0.618-6-2v-1h-4q-0.5-2.5-1-5c4.226,1.129,2.581.084,6-2v-1s5.3,0.982,7,1a7.49,7.49,0,0,0,2,3C412.994,211.858,411.07,211.142,410,215Z" />
        </a>
        <?php
        $kdwil = '33.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_salatiga_73" data-name="kota salatiga 73" class="cls-32" d="M347,164l8,1v5l2,1q0.5,2.5,1,5h-3v3h-1a8.445,8.445,0,0,1-3,2v-1c-2.729-1.541-3.013-2.6-3-7h-1q0.5-3,1-6h-1v-3Z" />
        </a>
        <?php
        $kdwil = '33.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_semarang_74" data-name="kota semarang 74" class="cls-33" d="M332,105h6c1.4,0.187-.409.883,1,1,1.882-.862,3.062-4.273,7-3v1l6,2,1,5h-1v2h-1q0.5,3,1,6h-2a12.71,12.71,0,0,0-1,5h2v3h-1c-3.142,3.479-3.93.586-5,1l-1,2-5,1v2a39.688,39.688,0,0,1-8,1v-3h-1v2c-3.315-.851-2.9-2.263-5-4v3a18.223,18.223,0,0,1-7-1v-1h1q-1-3.5-2-7h-4v-6h2q0.5-4,1-8l2-1v-1h-2l1-3,5-1v1h2v1c2.576,1.071,5.639,1.055,8,2v-2Z" />
        </a>
        <?php
        $kdwil = '33.75';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_pekalongan_75" data-name="kota pekalongan 75" class="cls-34" d="M209,90a34.228,34.228,0,0,1,8,1v2h1v1h-1v1h1c-0.085,1.129-.813,1.491-1,4h-2v4h-1v-1l-2,1v-1a12,12,0,0,0-5-1V94h2V90Z" />
        </a>
        <?php
        $kdwil = '33.76';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kota_tegal_76" data-name="kota tegal 76" class="cls-35" d="M123,88c-0.808,5.392-1.866,7.815-7,9-1.624-1.91-3.345-2-7-2q0.5-2.5,1-5c2.417-.622,2.207-1.046,4-2V87h1v1h3v1Z" />
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
                url: "ambil_jateng_kiri.php",
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
                url: "ambil_jateng_kanan.php",
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