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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="309" height="463" viewBox="0 0 309 463">
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

               

                a:hover .cls-16 {
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

                a:hover .cls-15 {
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
            </style>
            <filter id="filter" x="140" y="301" width="121" height="136" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="109" y="253" width="50" height="48" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="102" y="270" width="29" height="30" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="74" y="276" width="43" height="32" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="56" y="266" width="42" height="34" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="64" y="252" width="61" height="46" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="107" y="249" width="41" height="34" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="93" y="185" width="64" height="81" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="73" y="224" width="48" height="48" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="56" y="211" width="53" height="49" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="80" y="175" width="31" height="65" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="90" y="177" width="40" height="44" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="104" y="143" width="53" height="59" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="87" y="131" width="61" height="60" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="70" y="114" width="37" height="66" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="89" y="113" width="41" height="54" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="103" y="70" width="51" height="85" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-18" x="65" y="75" width="61" height="58" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-19" x="84" y="12" width="88" height="87" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-20" x="146" y="25" width="111" height="81" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-21" x="88" y="66" width="41" height="54" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-22" x="66" y="249" width="23" height="21" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-23" x="84" y="167" width="18" height="20" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-24" x="117" y="86" width="24" height="25" filterUnits="userSpaceOnUse">
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
        $kdwil = '73.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kepulauan_Selayar_01" data-name="Kab Kepulauan Selayar 01" class="cls-1" d="M147,334h2v3h2q0.5-3.5,1-7c-1.689-7.031-1.319-17.059,1-23,1.135,0.844.145-.127,1,1h1v4l2,1v6h1v3h1c1.891,5.749-.619,10.3-2,15q0.5,5.5,1,11h-1l-2,6h-1v1h1c0.329,2.575-.47,3.537-1,5h-1q-0.5-3.5-1-7h1v-8l-2-1v-5h-1c-0.493.427-1.251,1.853-3,1v-1c-1.139-1.139-.4,0-1-2h1v-3Zm4,43h-2v-7h1v-1h-1v-2h1v1h1q0.5,3.5,1,7C150.861,376.139,151.6,375,151,377Zm27,6c0.119,2.142,1.019,3.4,1,4h-1v2h-2c-0.1-2.612-.252-3.426-1-5h1C177.139,382.861,176,383.6,178,383Zm-2,22q-0.5,2-1,4a53.612,53.612,0,0,0-11,1c-0.325-2.073.493-2.078-1-3-0.6.455-.136,1.611-2,1-0.048-.016-0.094-0.728-2-1v-3h3c0.684-2.927,1.113-3.274,4-4C167.838,403.222,171.056,404.838,176,405Zm1,14,20,2v3l-6,1v-1h-3v-1h-5v-1l-6-1v-2Zm21,4c3.541,0.38,3.036,1.241,6,2-0.929,3.45-1.3,1.867-3,4-2.01-.574-0.865.12-2-1h-1v-5Zm54,1c3,0.776,2.63.616,3,4-2.749,1.584-1.8,2.47-6,3l-1-3h1C249.929,424.55,250.3,426.133,252,424Z" />
        </a>
        <?php
        $kdwil = '73.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Bulukumba_02" data-name="Kab Bulukumba 02" class="cls-2" d="M153,261h-3v-2l3-1v3Zm-1,34h-4l-2-3h-1v-3c-1-1.317-3.674-.992-6-1l-1,2h-5l-1,2h-3v1l-4,1c0.066-9.212-3.35-8.953-5-15l-6-2v-1a3.982,3.982,0,0,0,2-2l3,1c0.708-.671-0.345-1.436,1-1v2c2.017-.966-0.892-0.808,1-2h1v1l3-1v-2h1v1l3-1v1h1v-1h1v1h1v-1h5v-1h1v1c1.688,0.309,3.623-1.223,4-1v1l5,3q1,5,2,10l2,1C151.365,286.848,151.811,294.027,152,295Z" />
        </a>
        <?php
        $kdwil = '73.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Bantaeng_03" data-name="Kab Bantaeng 03" class="cls-3" d="M115,279h4c1.25,2.794,2.577,4.153,4,7h1c1.391,3.322-.1,5.688,1,7v1h-4c-0.9-.906-7.277-3.15-9-3a1.838,1.838,0,0,1-2,1v-1h-3a21.642,21.642,0,0,1,3-8l2-1v-2h1l-1-3h1v-1c1.135,0.844.145-.127,1,1C115.139,278.139,114.4,277,115,279Z" />
        </a>
        <?php
        $kdwil = '73.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Janeponto_04" data-name="Kab Janeponto 04" class="cls-4" d="M111,281c-0.763,3.16-2.227,3.65-3,7h-2l1,2h-1c1.243,1.435,2.771,1.556,4,3l-5,4,1,2-3,1-1,2H92c-0.844-1.135.127-.145-1-1a9.746,9.746,0,0,1,1-4c-3.541-.38-3.036-1.241-6-2a9.746,9.746,0,0,1-1,4c-1.016-.771-0.984-1.229-2-2l2-3-4-1v-4l-2-1v-1l2-1c0.609-1.346.52-2.848,1-4,3.492,1.35,4.418.7,8,0v3c2.454,1.468.664,1.417,2,3h1v-1l3,2-1,2h1v-1h1v2h1v-1h1v1c2.281,0.3.541-1.718,3,0v-1h1l-1-2,3-1-1-3h2v-1A10.226,10.226,0,0,1,111,281Z" />
        </a>
        <?php
        $kdwil = '73.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Takalar_05" data-name="Kab Takalar 05" class="cls-5" d="M82,271l6,2-1,2h2l-1,2,3,1-1,2s2.153,0.181,1,1H89v2c-3.648-.36-6.607-1.15-8,0H80c-1.059,1.885.918,3,1,4l-2,1,1,3c-2.762.723-2.237,0.279-3,3l-3-1,1-5H74v-2l-3-2c-0.193-.34-0.737-3.389-1-4h3l1,3h1c-0.132-2.092.018-1.016-1-2,0.286-1.69,2.764-2.51,3-3l-1-3h2v-2l2,1v-2h1v1C82.639,274.011,81.855,271.533,82,271Zm-13,2c3,0.776,2.63.616,3,4l-3,2v-6Zm-7,10h4v1H65v1h1v4a10.6,10.6,0,0,1-4,1,10.6,10.6,0,0,1-1-4l2,1A10.6,10.6,0,0,1,62,283Z" />
        </a>
        <?php
        $kdwil = '73.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Gowa_06" data-name="Kab Gowa 06" class="cls-6" d="M107,257c2.4,0.562,2.288.971,4,2v1l3-1v1c1.139,1.139.4,0,1,2a9.749,9.749,0,0,1,4,1c-1,1.32-2.084.992-3,2-0.065,1.413.1-.09,1,1-0.623,1.43-1.565,1.329-2,2v2l-2,1v2h-1v6h-1l-1,3h-1v-1l-2,1c-0.55,1.156-1.8,1.645-2,2l1,2-3,2,1,2h-2v1c-1.315.943-1.783,0.74-4,1-0.881-1.16-2.414-1.176-3-2v-3l-2,1v-1H91v-1h1c-0.276-1.558-1.9-1.743-2-2a3.351,3.351,0,0,1,1-4v-1c-0.727-.883-2.759.509-3-2,0.063-.054,1.955.043,1-1H87l1-2-2,1c-0.822-1.712.774-1.606,1-2l-1-2-5,1v2c-2.622-.85-1.439-0.046-4-1-0.356,5.01-2.541,7.13-7,8,0.6-2.909,2.856-3.206,1-5h2v-2l-3-1c-0.564-.942,3-4,3-4v-5h8v-2a24.067,24.067,0,0,1,5,1c0.777-.064-0.2-1.727,2-2l1,2a1.578,1.578,0,0,0,2-1l8,1v1c1.546,0.877,2.423.821,5,1C105.708,262.063,106.891,262.137,107,257Z" />
        </a>
        <?php
        $kdwil = '73.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sinjai_07" data-name="Kab Sinjai 07" class="cls-7" d="M138,258v5h1c1.575,3.332,2.665,4.314,3,9h-1c-0.99-.865-5.245-0.773-8,0v1l-2-1v1a3.245,3.245,0,0,1-2-2c-1.985-.4-1.267.491-2,1h-1v1h1c0.979,1.654-1.44.846-2,1v-1c-3.154-1.33-2.309,2.336-3,3-1.442,1.386-.859-1.643-2,0-1.3-1.048-1.489-2.043-3-3v1h1c1.889,0.86-2,1-2,1v-1c-0.6-.021-1.85.888-4,1v-1a13,13,0,0,0,5-9l3-1v-1c-2.369-.9-3.614-0.931-5-3a19.168,19.168,0,0,1,7-1c0.934-4,4.913-6.285,9-4q0.5,1,1,2Zm-11,14h2v1C126.99,272.426,128.135,273.12,127,272Z" />
        </a>
        <?php
        $kdwil = '73.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Bone_08" data-name="Kab Bone 08" class="cls-8" d="M135,195c2.329-.552,2.4-0.9,4-2v-1l2,1q0.5-1,1-2c1.315-.52-0.293.705,1,1l3-1v3h-1q0.5,1.5,1,3h1v5c-1.135.844-.145-0.127-1,1l-2-1v1h1q-0.5,1.5-1,3h1v2l2,1c0.946,2.327-1.066,3.858-1,5h1v1h-1v1h1v4h3v1h1v5l-3,1q-1,5.5-2,11l-5,1v3l-2,1v1h1c1.124,4.311-.449,10-1,13l-5-1v1h-1q-0.5-1-1-2l-6-2c-1.506,2.445-1.322.641-3,2l-2,4-11,1,1-2h-1c-1.311-2.093-3.4-2.026-4-3v-2c4.2-2.842,1.195-3.425,3-8h1v-2l2-1v-4h1v-3h1q0.5-1.5,1-3c-3.748-.989-3.079-2.661-8-3v2c-2.927.684-3.274,1.113-4,4l-5,1a9.835,9.835,0,0,1,3-6c1.139,1.139,0,.4,2,1q-0.5-2.5-1-5c-3.2-.826-2.9-1.179-3-5l3-1q0.5-3,1-6c5.838,0.987,10.255.344,17,0,1.339-2.523,1.99-3.5,2-8-1.135-.844-0.145.127-1-1,3.425-.338,3.175-0.044,4-3-3.64-3.4.109-1.826-1-6h-1v-2c1.881-.833,2.921-1.323,4-3,3.8,0.6,3.5.481,7,1Q134.5,193.5,135,195Z" />
        </a>
        <?php
        $kdwil = '73.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Maros_09" data-name="Kab Maros 09" class="cls-9" d="M115,232v2h-2q-0.5,2.5-1,5h-1q0.5,1.5,1,3l-2,1v2h-1v4h-1v2l-2,1q0.5,5,1,10a11.333,11.333,0,0,0-2,2h-2v1c-3.459.972-3-1.562-4-2H95v-1c-4.989-1.563-9.017-.049-14,0v-2l2-1v-4c-1.135-.844-0.145.127-1-1l-3,1v-1H78v-5c2.356-1.867,2.974-3.626,3-8,3.607,0.228,4.982,1.507,8,0v1a9.88,9.88,0,0,1,4,4c1.484-.551,2-0.4,4-1v-1h1v1c2.368,0.255,2.582-.5,4-1-0.167-4.9.223-11.1,3-13v-1l5-1v1C112.739,230.644,112.276,231.309,115,232Z" />
        </a>
        <?php
        $kdwil = '73.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Pangkajene_dan_Kepulauan_10" data-name="Kab Pangkajene dan Kepulauan 10" class="cls-10" d="M89,217l1,6,2,1c-0.2.909-2.007,2.206-1,4h1c1.139,1.139,0,.4,2,1v5l2,1v1h1v-1c3.028-.722,1.494,2.326,5,0v1h1c-0.776,2.205-1.18,6.812-2,9l-4-1v1H93v-1H91l-2-3-4,1v-1H80c-0.594-3.715-.58-2.289,0-6H79c-1.139,1.139,0,.4-2,1-0.345-2.209-.561-1.076-1-2l1-2H74v1c-0.027,3.162-1-3-1-3l2,1v-1c-1.139-1.139-.4,0-1-2l4-3v4h1c1.139-1.139,0-.4,2-1v-4h2l1-5h2v-3h1C88.139,217.139,87,216.4,89,217ZM68,227h2v2H68v-2Zm2,13v-2l3-1v2H72C70.861,240.139,72,239.4,70,240Zm-7,2H61l1-3h1v3Zm8,1c2.393,0.607,1.858.318,3,2,1.135,0.844.145-.127,1,1H71v-3Zm-5,6,2,1v1H67v1H66v-3Zm-4,2h2l-1,3H62v-3Z" />
        </a>
        <?php
        $kdwil = '73.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Barru_11" data-name="Kab Barru 11" class="cls-11" d="M88,180h7v1l2-1v2h1l-1,6h1v2H96v4h2c0.418,2.337,1.715,4.635,1,8-0.049.232-1.267,0.347-1,2,0.226,1.4.79-.4,1,1v6h1c0.885,1.354,3.534,4.571,2,8h-1c-1.731,2.682-1.823,2.412-2,7,2.391,0.463,3.145,1.158,5,2-0.574,2.01.12,0.865-1,2-1.833,2.013-1.1-.109-3,1l-1,2c-2.15,1.487-2.33.415-5,0v-5H92v-5l-2-1v-4l-4-3a2.448,2.448,0,0,1,1-3v-7h1v-2h1v-4h1c0.424-2.772-3.571-4.974-3-7h2l-1-2,2-1Z" />
        </a>
        <?php
        $kdwil = '73.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Soppeng_12" data-name="Kab Soppeng 12" class="cls-12" d="M95,193v-3h1v1l3-1v-1H97v-3a8.949,8.949,0,0,0,2-2h4v-1c1.527-.892,2.431-0.843,5-1,1.048,1.3,2.043,1.489,3,3h1q-0.5,1.5-1,3l2,1v1h-1c0.047,3.023.314,2.764,2,4v1c1.121-.076,2.756-2,5-1q0.5,1,1,2l2-1v1c1.182,1.266,1.824,5.707,2,8l-2,1c-0.614-1.274-.57-0.347-1,1h1c0.578,1.053-.774,5.727-1,7a15.682,15.682,0,0,1-6,1v1l-6-2v1h-8c0.549-2.784.77-.1,0-3l-2,1v-1c-2.44-2.606-.606-13.047,0-16C97.2,194.055,97.426,193.615,95,193Z" />
        </a>
        <?php
        $kdwil = '73.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Wajo_13" data-name="Kab Wajo 13" class="cls-13" d="M146,191l-6,1-2,3-3-1v-2l-4,1v-2h-2v1l-3-1v2h-3q-0.5,1.5-1,3a8.091,8.091,0,0,1-2-2h-6v-1h-1a3.225,3.225,0,0,1,1-4v-1c-0.386-.467-1.574.4-3-2,1.135-.844.145,0.127,1-1l3,1v-1h1q-0.5-1-1-2h1q0.5-2,1-4h-3q0.5,1,1,2h-5q-0.5-3.5-1-7h1q0.5-2,1-4h8c1.382-2.612,1.769-1.693,2-6l6-1v-1c2.4-2.156.809-3.313,2-5h1c1.139,1.139,0,.4,2,1,0.624-2.613,1.06-2.846,3-4v-1c0.817-.433,2.009,1.986,4,1,1.148-.569,3.352-4.6,4-6h1v1h3v1l2-1v2c1.587,1.354,1.737,2.169,2,5-2.952,1.759-3.287,3.95-5,7h-1v2h-1v2h-1v4h1v8h-1q0.5,1,1,2l-2,1c0.4,1.823,2.337.1,2,2h-1v1h1v-1c1.4-.226-0.268.374,1,1h1v6Z" />
        </a>
        <?php
        $kdwil = '73.14';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sidenreng_Rappang_14" data-name="Kab Sidenreng Rappang 14" class="cls-14" d="M131,137q1,3,2,6h-1v1h1v-1l3,1q0.5,1.5,1,3h1v-1l2,1a3.982,3.982,0,0,0,2,2c-0.945,1.8-1.385,1.574-2,4h-6c-1.326,3.091-1.5,3.851-6,4q-0.5,3-1,6h-5c-1.531,4.209-1.19,5.821-7,6v1c-0.6.021-1.85-.888-4-1-0.88,3.4-1.861,3.065-6,3v3l5,3q-0.5,2.5-1,5l-6-1c-1.419,2.162-2.366,2.01-6,2-0.549-1.2-1.792-1.624-2-2v-1h1l-2-8c-0.27-.444-1.4-0.891-2-2,4.194-2.426,5.337-4.577,4-8h2v-1H97c-0.33-1.543,1.764-1.32,2-2v-1H98c-0.3-1.732.916-1.666,1-2v-1H98l1-2c2.1,0.709.906,1.03,3,0v1c4.525,3.073,1.552,5.833,10,6,1.048-1.3,2.043-1.489,3-3-2.279-1.525-2.75-4.564-3-8h2v-1l2,1v-1h1v-3l2-1v-2h1c2.164-3.643,2.7-6.362,8-7v1h3Z" />
        </a>
        <?php
        $kdwil = '73.15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Pinrang_15" data-name="Kab Pinrang 15" class="cls-15" d="M75,119c3.428,0.871,2.575,2.068,6,3,1.256-1.909,1.014-1.659,4-2v1h3v1l2,1v3c0.591,1.285.46-.307,1,1h3l1,10H94v1h1v2h1v8l3,2v2h1c1.067,3.334-1.677,3.171-2,4l1,6H97c0.113,3.16,1.955,1.874-1,3-0.6,2.768-4.06,4.083-2,6H91c-0.565.664-2.341,2.693-4,2v-1H85l-1-4-2-1-1-6H80v-2H79v-3l-3-2v-6l3-1,1-5h1l-3-6h1v-1H78v-3H77v-5l-2-1v-7Z" />
        </a>
        <?php
        $kdwil = '73.16';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Enrekang_16" data-name="Kab Enrekang 16" class="cls-16" d="M100,118c2.6,0.168,3.428.183,5,1v1l6-1c0.9,1.422,1.37,2.3,3,3h2q0.5,1.5,1,3h1c1,1.432.861,2.5,1,5,4.047,1.03,1.263.443,3,3h1c0.916,1.317.788,1.77,1,4-1.719,1.127-1.355.633-2,3h-2l-3,9h-4a3.982,3.982,0,0,1-2,2l3,9-7,1q-1-2-2-4l-2-1v-2h-1v-1h-2c-1.114-1.018-.7-2.007-1-4H97c-0.954-6.294-2.656-15.3-3-23h2v-5h3v-1C100.139,118.861,99.4,120,100,118Z" />
        </a>
        <?php
        $kdwil = '73.17';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab._Luwu_17" data-name="Kab. Luwu 17" class="cls-17" d="M124,75c6.84,2.588,18.413,16.113,10,20-2.667-6.827-7.8-2.813-12,0-3.858-2.206-13.64-12.98-14-15h2C113.724,78.212,121.105,77.824,124,75Zm-1,27,5,4c3.689-1.873,5.225-3.206,8-1v7c7.13,1.1,8.129,3.11,12,7-3.194,11.18.052,21.366,0,30-21.315-2.666-23.427-19.087-32-32C118.059,111.059,119.789,106.315,123,102Z" />
        </a>
        <?php
        $kdwil = '73.18';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Tana_Toraja_18" data-name="Kab Tana Toraja 18" class="cls-18" d="M85,80l8,1,1,12h1l1,3,5-1q0.5,3.5,1,7l4-1v2c4.365-1.371,3.75.846,8,2q0.5,2.5,1,5a2.6,2.6,0,0,0-1,3l2,1v5l3,2q0.5,2.5,1,5h-2q-0.5-2-1-4l-5-1q-0.5-1-1-2l-5,1q-0.5-1-1-2h-5v2l-4,1v4c-1.8.945-1.575,1.385-4,2v-1c-3.113-3.2.125-4.669-7-5v-1l-6,1v-1H77v-1l-6-1-1-3c1.139-1.139.4,0,1-2h8l1-2a10.209,10.209,0,0,1,10-2,25.67,25.67,0,0,0-3-3l1-2H87v1H86c-0.8-1.06-2.417-5.838-2-8,0.034-.176,1.512-0.343,1-2l-2-1Z" />
        </a>
        <?php
        $kdwil = '73.22';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Luwu_Utara_22" data-name="Kab Luwu Utara 22" class="cls-19" d="M146,17c5.795,1.534,5.8,7.185,10,10v2h-1c-0.228,1.4.635-.366,1,1,0.87,3.26-.7,7.15-1,9h1v1h-2q-0.5,3-1,6h1V45l2,1-1,2h1c1.139,1.139,0,.4,2,1v3h-2c1.094,2.078,1.611,1.771,2,5h2c-0.212,1.4-.162-0.139-1,1,0.284,1.616,1.45,1.056,2,2v2l2,1-1,2h1v3l2,1a6.8,6.8,0,0,1,0,6v1h-2V75l-3,1v3h-2v2l-3,1-4,5h-2v1l-5,1v1c-1.791,1.412-2.374,2.309-5,3V92h-1q-0.5-3-1-6a10.1,10.1,0,0,1-7-7h-2V75l-7,1v1h-5v1c-2.806,1.012-5.526,1.018-8,2V79c-1.421-1.22-2.487-2.907-2-6h1l-1-3h-1c-0.565.664-2.341,2.694-4,2V71c-3.724-.829-4.885-2.456-5-7h1V61H95l-1-3h1c0.72-1.6.83-2.386,1-5-2.472-1.48-.645-1.328-2-3l-3-1c-1.365-1.252-1.027-4.371-1-7h2c2.391-3.593,6.63-3.874,8-9h3q0.5-2.5,1-5l4-1c0.665,0.153.458,2.184,2,2l1-2h2c0.829-3.724,2.456-4.885,7-5v1h5v1c1.139,1.139.4,0,1,2a126.735,126.735,0,0,1,17,3C143.83,24.538,145.683,22.239,146,17Z" />
        </a>
        <?php
        $kdwil = '73.24';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Luwu_Timur_24" data-name="Kab Luwu Timur 24" class="cls-20" d="M156,30c3.087,0.705,4.254,1.949,5,5a7.631,7.631,0,0,1,4,2v1h2l1,2,4,1v1h6V41l12,1v1l4,1v1h6l6,8h1V52l9,1v1h3v1c3.358,1.093,6.514-.564,9,1l2,3,3,1v1h6l2,4h4l1,2h1v2l4,3v4c-3.083,2.111-.444,1.338-2,4l-3,2,1,3h-1v1h-3q0.5,3,1,6a23.842,23.842,0,0,0-11,2l-1,3c-4.045.877-4.092,2.654-9,3-2.519-3.547-4.542-.7-6-6,1.909-1.256,1.659-1.014,2-4-1.4-1.2-2.207-3.241-3-5-4.123.733-6.023,2.467-10,3V86c-1.527-.419-6.75-3.5-8-3v1c-3.748.989-3.079,2.661-8,3-1.139-1.139,0-.4-2-1V85h1V84l3,1,2-3h2V81l3-1V77h-3V76h-1V75h1V74h-3v1l-8-1V73h-5l-1-2c-3.25-1.334-9.23,1.865-13,2V72h-1V68l-3-1,1-2h-1V62h-2c1.015-3.5.936-1.995-1-5h-1V54h-2c0.662-2.231,1.542-5.161-1-8l-3-1c-0.615-.939,1.485-0.591,0-3h2l-1-2h2Q155.5,35,156,30Zm52,27,1,3,6,1,1,2,6,1,1,3h1V66c1.139-1.139.4,0,1-2h2a46.715,46.715,0,0,0-6-5l-5-1V57h-2V56Zm22,14V67l-3,1c0.574,2.01-.12.865,1,2C229.139,71.139,228,70.4,230,71Zm-4,14h-3V84c-0.686-.394-3.132-0.865-3-2h-1v2l4,1,1,3h-1c-1.728,3.15-1.8,1.8-2,7h1V94h6l5-6h1V85l4-3V81l5-3V73h-4l-1,2-3-1V73l-2,1-9-1v1h-1C223.918,78.357,225.8,79.316,226,85Zm5-4a9.746,9.746,0,0,1,4,1v1h-4V81Z" />
        </a>
        <?php
        $kdwil = '73.26';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Toraja_Utara_26" data-name="Kab Toraja Utara 26" class="cls-21" d="M106,71q0.5,5,1,10l7,2c0.19,4.418,1.269,4.475,3,7h1c0.445,0.845-1.1.331,0,3l2-1v1h1v1h-1v1h1v4l2,1v2c-2.419,1.622-.6.93-2,3l-2,1c-1.653,3.072-.067,5.395-3,8v-1l-2-1c0.493-1.387,1.318-1.657,1-4h-1v-1h1v-3c-1.4.214,0.043,0.045-1,1-1.638-.226-1.063-1.459-2-2h-2q-0.5-1-1-2c-1.209.184-1.852,1.823-4,1q0.5-1,1-2h-2a3.982,3.982,0,0,1-2,2V99h-1l1-3h-1V95H95L93,82h1V80l3-1c1.194-1.034,1.57-3.169,2-5C102.16,73.237,102.65,71.773,106,71Z" />
        </a>
        <?php
        $kdwil = '73.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Makassar_71" data-name="Kota Makassar 71" class="cls-22" d="M80,260l1,4H79v-1a2.843,2.843,0,0,0-3,1l-5-1v-1c3.092-2.065.418-1.657,2-4l3-1,2-3c3.075,0.993.955,0.934,4,0v2h1v3Z" />
        </a>
        <?php
        $kdwil = '73.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Pare-pare_72" data-name="Kota Pare-pare 72" class="cls-23" d="M90,172h3v1c1.634,1.5,1.954,4.978,3,7H95v1H89A40.134,40.134,0,0,1,90,172Z" />
        </a>
        <?php
        $kdwil = '73.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Palopo_73" data-name="Kota Palopo 73" class="cls-24" d="M126,105c-1.1-4.349-3.612-4.5-4-10,3.434-1.534,5.472-3.489,10-4,0.979,2.211,1.663,2.819,2,6h-1V96l-2,1c1.316,1.547,4.9,3.269,3,5q-0.5,1-1,2l-3-1v1A9.556,9.556,0,0,1,126,105Z" />
        </a>
    </svg>
</div>
<div class="container-fluid mt-3 text-center">Sumber : <?= $sumber; ?>
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
                url: "ambil_sulsel_kiri.php",
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
                url: "ambil_sulsel_kanan.php",
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