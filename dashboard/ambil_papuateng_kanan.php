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

$query = mysqli_query($koneksi, "SELECT max(tahun_indi_pilar) as kodeTerbesar FROM transaksi_pilar WHERE kd_indi_pilar = '$kd_indi' AND CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' ");
$data = mysqli_fetch_array($query);
$tahun_besar = $data['kodeTerbesar'];

$cekthn_d = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar > $tahun_mak ORDER BY tahun_indi_pilar ASC LIMIT 1");

$acekthn_d = mysqli_fetch_assoc($cekthn_d);

$tahun_d = $acekthn_d['tahun_indi_pilar'];

if ($tahun_mak == $tahun_d) {

    $cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%'  AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar > $tahun_mak ORDER BY tahun_indi_pilar DESC LIMIT 1");

    $acekthn = mysqli_fetch_assoc($cekthn);

    $tahun = $acekthn['tahun_indi_pilar'];
} elseif ($tahun_mak == $tahun_besar) {

    $cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%'  AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun_mak' ");

    $acekthn = mysqli_fetch_assoc($cekthn);

    $tahun = $acekthn['tahun_indi_pilar'];
} else {

    $cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%'  AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar > $tahun_mak ORDER BY tahun_indi_pilar DESC LIMIT 2");

    $acekthn = mysqli_fetch_assoc($cekthn);

    $tahun = $acekthn['tahun_indi_pilar'];
}

$cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%'  AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar > $tahun_mak ORDER BY tahun_indi_pilar ASC LIMIT 1");

$acekthn = mysqli_fetch_assoc($cekthn);

$tahun = $acekthn['tahun_indi_pilar'];



$cekthnmin = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' AND  kd_indi_pilar = '$kd_indi'  ORDER BY tahun_indi_pilar ASC LIMIT 1");

$acekthnmin = mysqli_fetch_assoc($cekthnmin);

$tahun_kecil = $acekthnmin['tahun_indi_pilar'];


$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

$nil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah ='$provinsi' AND kd_indi_pilar = '$kd_indi' ");

$as = mysqli_fetch_assoc($nil);

$n = $as['nilai_indi_pilar'];

$sumber = $as['sumber'];

if (!$as) {

    $asumber =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah)= 5 AND  tahun_indi_pilar = '$tahun' AND kode_wilayah LIKE '$kdwil%' AND kd_indi_pilar = '$kd_indi' ");

    $as = mysqli_fetch_assoc($asumber);

    $sumber = $as['sumber'];
}

?>

<h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
    <?php if ($tahun == $tahun_besar) : ?>
        <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
        &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
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
<?php if ($tahun < $tahun_besar) : ?>
    <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
    &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
    <a href="#indikator"><img src="../assets/img/kanan.png" width="3%" id="kanan_peta"></a></h5>
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
<div class="container-fluid text-center">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40%" height="40%" viewBox="0 0 800 522">
        <defs>
            <style>
                .cls-1 {

                    filter: url(#filter);
                }

                a:hover .cls-1 {
                    fill: #d5d5d5f3;
                }

                .cls-1,
                .cls-2,
                .cls-3,
                .cls-4,
                .cls-5,
                .cls-6,
                .cls-7,
                .cls-8 {
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
            </style>
            <filter id="filter" x="-5" y="-5" width="397" height="279" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="297" y="263" width="205" height="104" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="42" y="262" width="674" height="266" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="598" y="47" width="208" height="221" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="480" y="72" width="262" height="256" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="363" y="65" width="230" height="224" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="299" y="126" width="238" height="198" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="100" y="233" width="246" height="113" filterUnits="userSpaceOnUse">
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
        $kdwil = '94.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Nabire_01" data-name="Kab Nabire 01" class="cls-1" d="M59,1c0.1,2.612.252,3.426,1,5H59c-1.522,2.813-2.621,3.844-7,4V9L47,8c-0.5-2.978-1.309-4.734,1-7V0h4V1h7ZM347,25v3c3.615,2.029,9.9,8.533,11,13h4l3,9,2,1c1.383,1.691,1.656,3.181,2,6-2.729,1.541-3.013,2.6-3,7,2.935,2.548,9.53,17.156,7,25h-1q-0.5,2.5-1,5l-3,2c-0.7,1.775,1.649,6.15,2,8h6c2.948,6.69,6.731,13.5,9,21v6c0.147,1.645,1,2,1,2q-0.5,5.5-1,11h-3v-1c-3.021-3.479.8-6.133-6-7-2.242,3.366-5.73,3.248-7,8a17.889,17.889,0,0,1-9,0l-1-3h-1v-4h-1c-1.26-1.705-2.712-2.452-4-4h-6v-1c-1.669-.264-1.744.943-2,1h-5c-0.844,1.135.127,0.145-1,1,0.11,3.1.47,7.411-1,9v1h-3v-1h-1v8c2.44,2.606.606,13.047,0,16-3.626.758-4.948,1.918-10,2-0.674,1.284-1.559,1.347-2,2v2l-3,2c-3.782,5.313-5.21,8.546-13,10-1.293,6.382-5.291,19.725,0,25,1.041,4.69,5.733,9.462,11,10,1.236,1.133,6.815,1.834,9,2,0.358,2.149,1.808,3.972,1,7-0.63,2.36-3.475,8.89-2,13h1l1,4h1v3h1c1.479,3.753,1.9,8.171,2,13l-6-1v-1h-1v1l-7-1-1-2h-2c-0.58-.406-4.018-5.515-5-5v1h-1l-1,3c-1.869,2.353-5.672,2.059-10,2v-1c-3.316-.966-2.678,3.294-4,4h-8c-2.022-2.258-2.193-.766-5-2v-1h-2v-1h-5v-1h-1v1h-3v1h-3c-2.525.9-9.845,3.2-14,2l-18-5c-1.719,3.76-4.958,7.674-9,9H214v1h-2v1c-1.483.941-2.46,0.86-5,1v-1h-4v-1h-2v-1h-2c-6.05-3.977-8.767-10.958-18-12-1.974,3.629-4.116,4.158-10,4v-1h-2l-3-4h-2v-1a1.586,1.586,0,0,0-2,1c-5.186.948-8.032-1.465-9-5h-1q-0.5-3-1-6h-2q-0.5,1-1,2c-3.744,1.553-13.364-1.9-15-3l-4-5h-1v-2l-5-2q-0.5-2-1-4h-1v-2l-2-1c-0.885-1.705-3.081-12.652-2-16h1q0.5-2.5,1-5c3.046-1.775,3.825-4.063,8-5,0.367-3.87,1.544-4.143,2-8l-3-1v3l-6,2q-0.5,1-1,2h-2v-2l-3-2c-2-2.046-6.071-2.5-9-1v1h-2q-0.5,1-1,2h-2v1H92c-1.23-1.977-2.562-2.134-4-4H87c-1.973-3.469,1.505-5.025,0-9H86v-2l-6-5v-2l-2-1v-1l-6-2a34.239,34.239,0,0,0-1-8l-4-1v-1H64v-1H61l-4-8a34.768,34.768,0,0,1-12-2v-1c-2.821-.676-4.7,1.656-8,2-1.366-2.145-7.529-5.117-8-6l1-8H29l-1-3H27v-1H25l-1-3-2-1v-2H21v-4c-2.265-6.93-.014-13.107-6-17-1.139-1.139,0-.4-2-1v-2c-2.325-1.267-3.09-3.53-5-5L5,95V93c2.372-1.531.783-.6,2-3H8L9,73H8V70H7V67H6L5,47H4V43H3V40H2V37H1L0,24H5V23c4.607-1.327,3.167-3.52,6-6V16h3c0.595,1.141,1.736,1.558,2,2v2h1V36h1l1,5,4,3c1.678,3.867-2.407,4.093-2,7l4,10c4.649,2.05,8.109,3.9,15,4,0.719-4.268.428-6.208,1-10l6,1V55c1.139-1.139.4,0,1-2a7.741,7.741,0,0,1-2-3c1.8-.944,1.574-1.385,4-2V41h2l1,2h4c1.127-1.719.633-1.355,3-2v1c-5.789,5.073-.6,10.088-3,17H56l-1,4a6.749,6.749,0,0,1,4,5l-8,6v3H50l2,6,3,1v1h4v2c-3.553.072-6.785-.157-9-1-0.037,4.652-1.217,5.545-2,9h3V94l2-1v1l6,7h1v6a11.757,11.757,0,0,0-3,4h1v1l4-1-1,9c3.875,0.7,6.2,1.855,11,2v-1H71v-3l3-1v1l4,1v-5c3.4,0.88,3.065,1.861,3,6-2.647,1.643-3.014,3.619-3,8,3.717,2.454,5.609,8.349,10,10l15-1a52.36,52.36,0,0,1,6,4v2h1v2h1v1h1v1h6v-1c0.609-.468,5.342-1.53,7-1v1h2v1h8v-1l18,2c1.812,0.58,6.092,3.7,10,2q0.5-1,1-2l9-3h8v1l9-1v-1c3.867-1.563.938,1.26,4-2h1q0.5-1.5,1-3h2l8-9h1v-9h1v-2h1v-2l2-1v-3h1v-2l2-1q0.5-1.5,1-3h2l2-3,11-4h4V99c1.789-.849,3.836-0.633,5-2l1-3c4.654-3.369,8.376,1.043,9-8l-6-2V81h1c1.564-1.813,1.971-.866,4-2V78h2l1-2h2V75h3V74c2.235-.5,2.123,4.533,4,2,1.782-1.5,2.154-4.636,4-6h2l1-2,3-1V66h2l1-2h2V63h2l1-2c3.058-1.953,3.95-.58,6-4,2.236-2.172,2.1-6.476,2-11a15.68,15.68,0,0,0-6-1V40c3.765-1.762,7.655-4.929,9-9V21h1l2-3h2l1-2,5-4V10l2-1V6h1V5a19.167,19.167,0,0,0,7,1c0.608,1.235,1.689,1.488,2,2v2h1v4h1v2h1c1.335,1.516.508,1.351,3,2,2.466,2.108,7.259-.131,11,1C334.986,20.811,339.594,24.265,347,25Z" />
        </a>

        <?php
        $kdwil = '94.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Deiyai_02" data-name="Kab Deiyai 02" class="cls-2" d="M344,277c3.38,0.258,6.327,1.312,8,0,3.387-1.473,5.165-2.907,6-7,2.178,0.422,2.848.664,4,2h-1v3l4,1v1c1.387,0.278-.364-0.627,1-1h4v-2c2.142-.119,3.4-1.019,4-1v1h2c-1.32,4.52-.116,1.546,1,6,2.274-.449.87-0.921,4,0v1c1.339,0.1,1.638-1.647,4-1v1h4c1.361,0.385-.413.937,1,1l3-1v1h2v1l4-1v1h4v1l4-1,1,2,4-1c0.687,2.442.39,1.722,2,3v1l2-1,9,10h1l-1,2h1v-1l2,1c-0.5,2.068-.448,3.76-1,7h-1v-1l-4,3,2,4,2-1,1,2,3-1,1,2h1v-1l4,1v1l2-1,1,2,2-1v1l4,1v1h6v-1l2,1,1-2h6c0.067-.021-0.157-0.636,2-1,0.44-4.442.754-4.8,0-9-1.135-.844-0.145.127-1-1h-3v-2h-1v1c-1.38.309,0.112-.215-1-1-2.437-1.72-1.411-.849-1-4l2-1c3.1-3.239,6.32-.356,12-1v-1l3,2v-1h1l1,2h4l1,2c2.125,0.892,2.621-.773,3-1h1v1h3l1,2,3-1v2l3-1v2h1v-1c1.229,1.126.427-.03,1,2h1v4c-1.654,1.39-2.334,3.624-4,5-1.139-1.139,0-.4-2-1v2h-1v-1l-3,1v2h-1v-1c-2.582.662-.887,1.726-2,3l-2-1c-2.556,2.119.077,3.6-5,5v2l-2-1v1a9.948,9.948,0,0,1-4,1v2h-1v-1c-2.774-.534-3.065,4.155-3,7,1.759,1.5,1.9,2.7,2,6-1.881.833-2.921,1.323-4,3a12.71,12.71,0,0,0-5-1v2h-1v-1l-2,1c-0.612,1.263-1.674,1.467-2,2v2h-1l1,2-2,1v3h-1c-1.922,3.467-1.645,4.836-7,5-1.867-2.075-.873.1-3-1-1.129-.584.083-2.354-3-2v1l-2-1v1l-3-1v2c-3.043-.926-2.881-1.163-6,0-0.634-2.529-.6-1.6-2-3v-1h-2l1-2h-1v-3h-1l-1-3h-1v1c-0.86,1.889-1-2-1-2l-7,1c0.132-1.408-.208-0.265,1-1v-1h-2v-2a11.005,11.005,0,0,0-5,1v1h-1v-1l-6,1v2l-2-1c-1.2.743,0.383,1.294-1,1,0,0-.008-1.26-2-1v1h-1a1.988,1.988,0,0,0-2-1l-2,1v-1h-2v2l-3-1v2h-1v-1l-4,3c-0.814-.465-1.7-3.49-5-2l-1,3c-0.012.007-6-2-6-2-1.139-1.139-.4,0-1-2l-3-1v-1h-3v-1c-2.962.64-2.454,1.764-3,2l-3-1-1,3c-1.111.875-.73-0.93-1-1l-3,1v2l-2-1v2l-2-1v1l-6,1v-1h-2v-1c-1.277-.239-1.593,2.616-4,0v2l-8,4v1c-1.034.349-1.825-1.792-4-1l-1,2-3-1v2l-2-1v1c-4.667.9-6.749,0.954-7-5h2v-1h-1c-1.889-.86,2-1,2-1v-2h-1v-1h1v-4h-1l1-3-3-1,1-2-4-3v-1l-3-1v-5h1q0.5-2.5,1-5l2-1v-2l2-1,1-3,5-4v-2h1v-2h1v-3h1l1-3,2-1v-7h-1a6.4,6.4,0,0,1,1-5h1v-2c3.268,0.114,8.3.569,10-1,3.087-.7,4.254-1.949,5-5,3.37-3.247,1.358-9.143,1-14l2,1v-2h1v1l3-1v1h1c1.069,2.007-1.036,2.9-1,4h1v1h-1v1h1v2Zm1,9v3h1l1,3h1v2c1.426,2,4.529,3.012,7,4-0.7,3.377-2.168,3.852-3,7,1.135,0.844.145-.127,1,1,1.135-.844.145,0.127,1-1l3-2v-1c2.734-1.961,4.012-1.138,5-5-1.135-.844-0.145.127-1-1l-5,1v-1h-1v-5c1.91-1.624,2-3.345,2-7a10.6,10.6,0,0,0-4-1v1h-5C347.331,284.3,347.95,285.3,345,286Z" />
        </a>

        <?php
        $kdwil = '94.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Mimika_03" data-name="Kab Mimika 03" class="cls-3" d="M553,289c13.169-.3,25.413.1,35,3h11q0.5,1,1,2l3,1v1h3v1h2v1h2v1h2v1h2v1l4,1,3,4h3c5.726,2.329,11.572,3.246,13,10a48.371,48.371,0,0,1,14,2c4.565,1.332,15.966-1.129,19-2l15,1v1h3v1l9-5,9,1v1a8.818,8.818,0,0,0,4,2v4h-8c-1.643,3.1-1.9,1.8-2,7h1v2h1c0.931,1.317.759,1.777,1,4-2.28,1.194-3.846,2.366-7,3,0.723,2.762.279,2.237,3,3q0.5,5.5,1,11h-4a10.6,10.6,0,0,0-1,4c3.113,1.835,3.962,5.163,7,7v1h-1c-1.256,1.909-1.014,1.659-4,2q-2,6-4,12h-1c-1.513,3.487-1.9,11.2-2,16l-7,6a60.687,60.687,0,0,0-12,1v7h1q0.5,1.5,1,3h1q0.5,1.5,1,3l2,1v2l2,1v2l5,4q0.5,1,1,2h2q0.5,1,1,2h2l4,5h2q0.5,1,1,2c3.986,2.563,6.106.538,7,7h-1q-0.5,2.5-1,5h-1v3h-1v3h-1v3h-1q-0.5,2.5-1,5l-5,4v2h-1c-0.887,2.623,1.787,6.237,2,10l-5,4v4h-1v2h-1v8h-1v1h-7c-1.758-3.173-3.2-2.739-8-3v-1h-1l-2,3h-2v1c-7.356,3.366-15.1-1.677-15,10,1.907,1.557,2.959,5.707,4,8h-1c-1.57,1.807-1.976.863-4,2v1h-2q-0.5,1-1,2h-2v1H634v1l-6,1q-0.5-1-1-2h-2v-1c-1.256-.279-4.692,1.831-8,2l-5-7h-3v-1c-2.729.6-5.849,3.3-7,2-6.618-1.362-15.837-10.064-19-15q-0.5-2-1-4c-0.658-.946-3.07-1.834-4-3-11.223,5.118-10.688-4.675-21-6a12.223,12.223,0,0,1-6,4c-1.612-2.5-3.554-2.307-6-4l-2-3h-2v-1c-4.462-1.5-5.159,2.868-8,1-7.287-2-6.478-9.66-16-10-1.772,2.848-4.237,3.087-9,3-1.741-2.178-6.887-6.223-10-7v-2c-2.663-1.412-4.22-2.03-9-2-2.04,2.371-6.329,3.34-10,4l-1,3-4-1-1-2c-1.928-.863-3.318,1.416-4,1v-1h-1v-3l-3-2v-1h-4v-1h-3v-1l-4-1v-1h-3v-1h-3v-1h-3v-1h-3v-1h-2v-1h-2v-1h-2v-1l-15-5-1-3c-5.954.013-7.1-1.283-10-4l-1-2h-2l-1-2h-2v-1h-2v-1h-6v-1h-3l-6-7h-2v-1h-2l-1-2h-2l-1-2h-4c-1.746-.651-6.917-4.116-10-3-0.793.287-.8,3.1-5,2l-12-4-1-2-5-1v-1l-6,1v-1h-4l-1-2h-2v-1h-8l-3-4h-3v-1h-2v-1h-3l-1-2-4-1-2-3h-2l-1-2-3-1v-1l-4-1-6-7h-2v-1l-4-1v-1h-4v-1l-28,1c-1.188.341-6.948,2.887-9,2l-2-3h-3v-1l-16-1v-1l-7-1v-1h-2v-1c-2.389-.812-3.853,1.127-5,1v-1l-10-1v-1h-6v-1h-8v-1c-3.224-.914-8.293.514-10,1l-18,1v1l-12,1v1l-9,2v-1c-2.02-.613-2.482-0.4-4-1l-1-3a18.58,18.58,0,0,1-7-3l-2-3h-2v-1h-2v-1h-5l-1-2h-2l-1-2h-2l-2-3H99l-1-2-3-1v-1H93l-1-2H90l-1-2H87v-1H85v-1H83v-1H80v-1H78v-1H76v-1c-3.346-2.967-.416-0.384-2-4H73v-3H72l-2-3H68l-1-2H63v-1H59v1c-2.133.5-10.142-1.239-11-2H47v-5l8-6,1-2,3-1,4-5c2.015-1.262,6.087-.788,9,0a2.453,2.453,0,0,0,3,1v-1l4-1,2-3h2l1-2,3-1,1-6,11-10h9q0.5,2,1,4l10,1v1h1v6c-4.5,2.506-3.034,6.179-2,11,3.28,1.9,4.751,4.9,9,6v-1c1.139-1.139.4,0,1-2h2v-1h12v-1h8l4,5h2v1h1v-1c3.5-.545,8.891-0.27,11,1l1,2h2l6,7h2v1c2.969,1.119,9.163-.936,10-2q0.5-2,1-4l3-2v-1h12c3.415,3.864,6.905.31,12,2v1h2v1c3.444,0.9,6.985-3.267,9-4h6l2,3h1l2,6,8,6h2v1h4v1h5v1h14v-1h14c8.842-2.467,20.567-2.922,23,6h1q0.5,3.5,1,7h-1v3h-1v2l-2,1v4a39.688,39.688,0,0,0,8,1c3.189-3.509,5.369-1.481,10-3v-1h4l3-5h2v-1c2.647-.592,5.226,3.665,10,2v-1h2v-1h3v-1l4-1,1-2c1.769-1.051,4.227-.9,7-1v1h2l1,2h3v1c1.277,0.9,2.328,2.678,5,2v-1l6-1,1,2c1.608,0.332,2.162-2.474,3-3h2v-1h2v-1h3v-1c2.344-.612,6.212,1.758,8,2l1-2,13-2a8.354,8.354,0,0,0,2,2c0.637,1.263-.7.288-1,1v1h1v-1h7c0.532,1.106,1.842,1.707,2,2v3h1c1.709,3.351.913,4.941,5,6v1l9-2v1l6,1v1c1.511,0.9,2.439.862,5,1l3-4h1v-3h1v-3h1v-3h1l2-3h2v-1h4c4.05-1.43,5.278-.923,6-6-1.8-1.741-2-4.394-2-8,1.058-.526,1.739-1.859,2-2h3v-1h2v-1h2l6-7h2l1-2c3.47-2.2,7.763-1.585,10-5l3-10c3.082-2.394,10.744.8,14-1v-1h1v-7l2-1v-2h1c1.35-2.214-.436-1.412,2-3v-1h8v-1h2c0.822-.5,1.132-2.564,3-3l3,1,8-9c1.611-3.9-1.574-3.188,2-6v-1h8C553.96,272.278,553.051,282.047,553,289Z" />
        </a>

        <?php
        $kdwil = '94.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Puncak_Jaya_04" data-name="Kab Puncak Jaya 04" class="cls-4" d="M760,52l5,1q-0.5,13-1,26c0,3.523.713,9.08-1,11-1.264,5.273-5.715,4.278-12,4l-8,3c-0.511,5.278-2.276,13.78,0,19h1q0.5,2,1,4l3,2q0.5,2.5,1,5h1q-0.5,11.5-1,23c2.232,0.842,5.438,1.029,9,1v2l4,2q-0.5,1.5-1,3h-3v1c6.546-.144,11.826.268,16,2a15.682,15.682,0,0,1,1,6l6,1c1.079,2.874,1.044,7.691,1,12h-1q-0.5,3.5-1,7h-1v2h1v9l2,1v2h1v2h1v3h1v4h1c0.688,1.976.376,3.449,1,5,6.713,2.281,10.277,2.439,10,12,3.207,3.284,2.947,11.172,2,16-2.316.875-4.407,1.017-8,1-1.746-2.049-4.051-2.062-8-2l-7,5v3l-2,1c-2.27,2.45-2.966,4.116-7,5v5l-22,1-2-3h-1v-2h-1v-3l-3-1-4-5h-7c-1.928,2.2-2.066.93-5,2v1h-7v-1l-5-1-7-8h-2v-1l-4-3q-0.5-5-1-10c0.044-.216,1.428-0.323,1-2h-1c-1.618-3.778-1.9-4.58-7-5-0.611-3.518-1.076-4.589-5-5-4.462,5.539-10.775,7.1-21,7-1.759-1.994-1.968-.842-4-2v-1h-2q-0.5-1-1-2l-5-4v-2h-1v-2h-1v-2h-1v-2h-1v-2h-1v-2l-4-3q-0.5-1-1-2h-2q-0.5-1-1-2h-1v-4h1v-2l3-2v-1h2q0.5-1,1-2h1c0.491-.612-0.736-0.591,1-2-1.245-6.275-5.884-14.849-11-17h-4v-1h-3v-1h-3v-1c-3.528-1.754-3.626.49-5-4-1.139-1.139-.4,0-1-2h-2v-1l-8-7V134h-1q-0.5-2.5-1-5l-2-1c-1.539-1.891-1.835-3.626-2-7h1v-3l2-1v-2h1v-2l4-3v-2l14-11,1-3,7-6V87h5c1.909,1.722,6.871,1.116,9,0V86h2l2-3h2l1-2h1c1.709-2.748-1.479-1.19,2-4V76l6-1,1,3c1.475,0.28,5.735,2.038,8,1V78c1.952-1.269,1.875-1.544,5-2v5a7.489,7.489,0,0,1,3,2l3-1V81l5,1,3-4,3-1v1c4.082,1.157,1.064.91,3,3h1V80h1V76l4-2c0.951-1.634-2-2.919,0-4l8,1V70c2.518-1.731,2.02-2.5,6-3a3.982,3.982,0,0,0,2,2l-2,4h5V72h3q-0.5-3.5-1-7h2c2.319,1.412-.086,3.558,5,5V69h1q0.5-3,1-6h4l1,3h1v5h1v1h12s0.188,0.694,2,1V67l-4,1c-0.927.493-.582,2.812-3,2V69h-1V66a21.92,21.92,0,0,0,5-4l6,1V62l3-1v1h2q0.5-2.5,1-5l-4-1Q759.5,54,760,52Z" />
        </a>

        <?php
        $kdwil = '94.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Puncak_05" data-name="Kab Puncak 05" class="cls-5" d="M653,79q-0.5,2.5-1,5c-1.115.593-1.57,1.742-2,2h-2v1h-6v1l-8-1v1h-2l-2,3h-1v2l-5,4v2c-1.057,1.3-3.66,1.081-5,2l-3,4-7,6v2l-2,1v2l-2,1q-0.5,2-1,4h-1c-1.063,3.775,5.052,9.125,6,12,1.6,4.848-1.419,11.343,1,15h1q0.5,1,1,2h2q0.5,1,1,2l4,3v2h1l3,4h3v1h2v1h3v1c2.514,0.861,5-.293,7,1l3,4h1v2h1c1.537,2.782,3.893,8.965,2,12l-4,3c-1.487,1.511-2.356,3.65-4,5q0.5,2,1,4c8.033,1.861,8.53,8.689,12,15h1v2l2,1v2h1l2,3h2q0.5,1,1,2c3.086,1.9,8,2,13,2v-1l6-1q0.5-1,1-2h2v-1c1.957-1.517,2.441-1.776,6-2l3,5h2c2.775,1.079,3.074.93,4,4,2.407,2.888-1.245,4.761,0,9h1q0.5,2.5,1,5c6.544,3.583,10.31,10.682,18,13,4.183,1.261,8.607-2.256,11-3,3.333-1.036,6.757.6,9,1v3c-5.219.418-14.98,7.54-17,11h-1v3c-1.629,4.285,1.377,5.285,0,10h-1v3h-1c-1.894,6.293,2.6,9.832,4,13q1,4.5,2,9h1q0.5,1,1,2h2v1c-3.338.015-9.086,2.113-10,4v5c2.026,2.126.524,5.538,0,8a46.016,46.016,0,0,1-9,1c-0.672-3.893-1.368-4.886-6-5v-2h-2v2h-5q-0.5,1.5-1,3c-8.228.065-10.055-1.053-17-1v-2h-4v2c-1.983-.029-6.791-1.058-7-1q-0.5,1-1,2l-6-1-4,1-2-1a2.7,2.7,0,0,1-3,1q-0.5-1-1-2l-6,1v-2h-6c-1.3-3.067-1.849-4.561-6-5v-2h-4v-2a10.6,10.6,0,0,1-4,1v-2c-5.639-.674-3.281-2.568-6-4h-4v-1l-4-1v-2a34.651,34.651,0,0,0-7-1c-0.723-2.762-.279-2.237-3-3-4.288-4.726-7.785-.007-12-1v-1h-4q-0.5-1-1-2l-7,1v-1h-2v-1H551V269c5.055,0.028,6.393-1.184,10-2,0.662-2.9,1.79-2.508,2-3v-9h1a9.485,9.485,0,0,0,2-4h-1q-0.5-3-1-6h-1q-0.5-1-1-2h-2q-0.5-1-1-2l-3-2v-8c2.132-1.843,2.379-4.568,4-7l2-1v-2l3-2v-2l6-5,9-10h2q0.5-1,1-2c2.687-2.561,4.437-3.036,5-8l-3-2v-1l-4-1-6-7v-2h-1q-1-5-2-10h-2c-2.318,3.914-4.5,2.719-8,5v1a8.027,8.027,0,0,1-4,2c-1.076,4.573-4.347,4.249-10,4v1h-4v1h-3v1l-13-1v-1h-2v-1h-4v-1l-6-2-2-3-2-1v-2l-2-1v-3h-1l-1-4h-1v-3h-1l-1-3-2-1-1-3h-2a118.546,118.546,0,0,1,1-14c-2.313-1.319-5.945-4.551-7-7v-4l-2-1v-2h-1l-1-2c-3.178-2.405-4.285-.54-5-6,3.858-2.179,4.167-5.012,5-10h5v-2h1c0.3-1.662-.952-1.77-1-2-0.656-3.132.592-4.765,1-7,3.858-1.006,3.142-2.93,7-4v1h7v1h2l1,2h2v1h9v1h2v1h7c1.212-2.128,2.252-2.177,3-5l5-1v1c0.822,0.417,4.026,2.085,6,1V95c3.087-.705,4.254-1.949,5-5,1.142,0.9,1.393,2.581,2,3l3-1V91c1.4,0.212-.379.684,1,1h3v1l11-2V90l13-2V87h2V86l3-1,2,4h2v1c1.219,0.963,1.933.731,3,2l6,1V92l5-1V90h4V89l6-1V87l4-1V85h2l2-3,4-1V80c3.011-.692,4.14,3.675,8,2l2-3h2V78c3.409-1,3.122,1.666,4,2C648.719,81.034,651.115,79.344,653,79Z" />
        </a>

        <?php
        $kdwil = '94.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Intan_Jaya_06" data-name="Kab Intan Jaya 06" class="cls-6" d="M416,99h-2c-2.24,3.851-3.039,3.142-3,10h1q0.5,2.5,1,5c3.37,1.543,10.039,6.7,16,5,5.446-1.555,17.913-7.682,23-3,3.972,1.017,4.123,2.918,6,6h1v2c0.62,0.842,2.1.841,3,2,1.938-.814,6.414-3.484,10-2v1c1.459,0.812,1.7.684,4,1,1.434-2.274,5.588-4.623,9-5,1.251,1.586,3.353,2.8,5,4v1h2q1,4,2,8l2,1c2.551,2.761,3.766,3.6,4,9-1.485,1.593-1.092,5.892-1,9,8.071,4.813,7.131,12.783,12,20l2,1,4,5,6,2v1h4v1c2.256,1.011,9.12,3.22,13,2v-1h3v-1l12-1a24.766,24.766,0,0,1,8-8l4-1v-1c1.785-1.359,1.968-1.621,5-2,0.188,8.78,3.594,11.671,8,16q0.5,1,1,2c4.217,3.765,5.591-.824,6,8-1.214.977-1.981,3.243-3,4h-2v1l-4,3-2,3h-2q-0.5,1-1,2l-4,3v2l-6,5v2l-2,1v2c-3.379,5.072-5.893,4.924-6,14,3.151,1.856,4.02,4.925,8,6q1,5,2,10h-2c-1.937,3.669-2.078,5.9-2,12h-1c-2.381,2.785-5.79,3.377-10,2v-1l-6,1c-2.244,5.629-2.543,12.377-9,14v1h-3l-2-3h-2q-0.5-1-1-2l-3-2v-2l-4-3v-2h-1q-0.5-2-1-4h-1v-3h-1v-4h-1v-4h-1q-0.5-4-1-8l-2-1-1-2h-4c-1.072-.923-7.486-2.635-10-2v1h-7v-1h-4v-1h-2v-1l-6-2v-1h-2v-1l-7-1v-1l-16-2-1-2-3-1v-1h-2v-1h-2v-1h-3v-1h-2v-1l-16-3c0.137-4.539.7-5.467,2-9h1q-0.5-7-1-14l-3-1v-1h-7v-1h-2l-1-2h-2v-1h-6l-3-6-9-3q-1-5.5-2-11l-8-6c-1.152-1.637.021-2.3-2-4q0.5-4,1-8h-1v-4h1l1-4,2-1v-3h1c1.136-3.506-.395-10-1-12v-5h-1q-0.5-3-1-6h-1v-2h-1v-3l-2-1v-3l-2-1-1-3a14.809,14.809,0,0,1-6-1q-0.5-5-1-10l2-1c1.565-2.657,1.085-4.54,2-8h1q-1-6.5-2-13c6.762,0.027,8.792-1.768,15-2,3.25,6.268,10.1,11.53,19,9h8c2.379-.731,4.4-1.753,8-2,0.944,1.8,1.385,1.574,2,4-2.106,1.413-3.193,4.489-4,7v5h-1v3h-1Z" />
        </a>

        <?php
        $kdwil = '94.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Paniai_07" data-name="Kab Paniai 07" class="cls-7" d="M355,133v2h1v-1l2,1v1h-1c0.183,1.9,1.648,1.47,2,4,0,0-2.076.083-1,1h2v2c2.4,0.513,3.077,1.29,5,2v-1c3.956-.938,7.426-4.554,9-8,2.068,0.5,3.76.448,7,1v3h-1c-1.87.9,2,1,2,1l1,3h-1c-0.74,2.019-3.272,5.859-3,8h1c0.72,3.881-2.479,6.1,0,9,1.023,3.772,5.535,7.242,8,10l2,1v7h1v2h1l2,3h2v1h4l4,7c2.1,1.521,5.379,0,8,1v1h2l1,2h3v1c0.992,0.1,2.86-2.126,5-1v1c2.3,2.522,1.1,12.542,1,17-1.759,1.5-1.9,2.7-2,6l4,1v1h6v1h4v1h3v1h3v1l4,1v1l4,1,1,2h2v1l19,3v1l6,1v1h2v1l6,2v1h3v1h8c6.084,0.017,10.764.355,15,2q2,9.5,4,19h1v3h1q0.5,1.5,1,3l2,1v2l2,1c2.357,2.5,7.028,6.607,8,10l-3,1v1h-2v1h-8q-0.5,1.5-1,3h-1v2l-2,1q-0.5,4.5-1,9h-1v-1c-1.209-.231-1.7,1.626-4,1v-1h-6c-1.486.574-3.632,4.909-6,4l-1-3-2,1c-0.916-.552-0.338-1.878-2-2v1h-1l-1-2-3,1-1-2-2,1-1-2-2,1h-1v-1h-2v-1l-2,1v-2c-1.4-.2-0.118-0.011-1,1-1.873-1.222.557-.395-1-2l-2,1-1-2-6,1v-1c-3.406-.75-2.936,2.019-5,2v-1h-1l-1,2-3-1v2h-2l1,3h-1v1h2v2c4.853,1.78,7.027,2.14,7,9-3.1,1.643-1.8,1.9-7,2v1l-2-1-1,2c-2.3.977-3.861-1.017-5-1-0.116.155,0.1,1.892-1,1v-2l-2,1c-1.082-1.019,1.236-2.042-1-2v1h-1l-1-2-2,1v-1h-3v-1h-2v-1l-3,1-1-2c-1.411-.091.189,0.234-1,1l-3-1-1-3,2,1v-1c2.47-1.387,3.658-2.31,4-6h-1v-3l-8-7v-1h-2v-2l-4-3v-1l-2,1c-1.571-1.291-.985-2.887-4-3v1h-1v-1h-2v-1l-4,1v-1h-4v-1l-4,1-1-2-5,1v-1h-4v-1a1.605,1.605,0,0,0-2,1l-3-1-1-3-2-1,1-2c-1.157-1.213-.678.8-2-1l-5,1a9.733,9.733,0,0,1,1-4h-2l1-3h4s0.032-2.031,1-1v2h3v-1h1c1.11-2.054-.9-4.024-1-5,0.33-.557,1.592-0.162,1-3a2.531,2.531,0,0,1-1-3l2-1q0.5-2.5,1-5l-5,1-1-2c-1.912-.753-3.044.581-4,1v-1c-1.139-1.139-.4,0-1-2h-2v-2h-2v-2l-6-1v-1l-3,1v1h1l-1,2h1v1h-1v1h1v3h-1v2h-1c-1.1,1.577-.923,1.4,0,3h-2c-1.464,1.327-.563,1.543,0,3h-2a22.068,22.068,0,0,1,1,4c1.135,0.844.145-.127,1,1l2-1v1h1v3h3v2h3l-1,3h-1c-0.176-.152.569-3.4-1-2v1c-4.68,2.038-3.317,2.152-5,7h-1v-1c-1.647-.9-0.878,1.371-1,2-1.772-.227-2-1-2-1l-4,1v-1c-3.53-3.814.441-4.3-1-7h-1c-0.771-1.016-1.229-.984-2-2l-4,1v1l-2-1v2h-3v-1c-3.21-2.909-1.684-4.254-3-9h-1l1-4-2-1v-3c-0.506-1.321-.888.41-1-1,0.465-.5,1.606.278,1-1-0.243-.513-1.743-0.311-2-2h1v-1h-2l1-2h-2l1-2-2-1q0.5-4.5,1-9l2-1v-1c0.274-2.163-1-2-1-2-0.446-1.777,1.279-3.54,1-4h-1c-1.139-1.139,0-.4-2-1v-2l-5,1v-1c-2.639-1.008-2-.549-4,0l-2-3h-1v1c-1.305,1.552-.982-1.941-1-2l-3-2v-1h-2l1-2h-2l1-2-2-1V190h1l1-4c-0.6-.988-1.424.349-1-1h1v-1h3v-1h1v1h1l1-3,2,1v-1l3-2v-3l4-2v-1h-1c1.428-2.526,1.04-.665,3-2l1-2h3v-1h1a1.433,1.433,0,0,0,2,1l2-3c0.144-.135,3.683-1.485,3-2h-1c1.526-4.112,1.273-11.523,0-16h-1q0.5-2.5,1-5h4l1-3h1c-0.034-1.414-.827.4-1-1-0.323-2.618,1.271-5.215,2-7,2.363,0.419,4.606,1.677,8,1,0.2-.041.33-1.434,2-1l1,2Z" />
        </a>

        <?php
        $kdwil = '94.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Dogiyai_08" data-name="Kab Dogiyai 08" class="cls-8" d="M153,239c0.663,4.68,1.517,8.879,6,10v1h1v-1h6c4.139,1.569,3.237,5.25,10,6,1.974-3.629,4.116-4.158,10-4,1.569,1.812,1.992.856,4,2v1h2l2,3,3,2v1h2l2,3c2.5,1.637,5.058,1.9,9,2,3.58-3.974,7.664-.256,13-2v-1h3v-1l5-4q0.5-1.5,1-3h7c3.111,3.061,19.057,5.932,25,4,2.51-.816,6.665-4.171,11-3v1h5v1h2v1l9,2c1.582-3.67,2.513-4.142,8-4v1h4c1.376-2.531,3.18-3.817,4-7h4c2,3.493,3.733,3.908,7,6l1,2h8v1l4,1c0.286,3.537,1.348,4.884,2,8l3,1s0.164-2.141,1-1v2c2.236,2.172,2.1,6.476,2,11-2.834,2-1.983,5-5,7v1h-3c-4.567.4-7.875,0.247-10,3h-1q0.5,5.5,1,11h-1v2l-2,1v2h-1v2h-1v2h-1v2h-1v2l-5,4-1,3-2,1-3,9h-1q0.5,2.5,1,5h-1c-1.465-1.28-8.942-1.86-12-1v1H279c-3.084.869-20.637,2.292-25,1v-1h-4v-1h-3v-1l-4-1-1-2-4-3-4-8h-6c-0.913,1.077-6.621,4.7-9,4v-1h-2l-1-2c-0.989-.336-5.14,1.9-8,1v-1c-5.411-1.916-9.27-1.956-15-1l-1,3h-1v2h-1l-2,3h-2v1c-8.514-.006-11.8-2.9-16-7l-2-3c-4.095-2.683-10.651-1-16-2-0.945-1.8-1.385-1.574-2-4-6.026-1.092-13.029.6-20,1-0.945,1.8-1.385,1.574-2,4-5.467-.619-5.493-3.735-10-5v-2l-2-1v-7h-1v-2h1v-2h1a8.642,8.642,0,0,0,2-4,10.652,10.652,0,0,1-2-2l-5,1c-3.3-.784-5.539-4.283-7-7h6c3.926,5.471,8.269-.9,13,0v1h4a2.693,2.693,0,0,1,3-1v1l9,1v1h3v1h4v1l8-1v-2h1c0.226-1.4-.374.268-1-1-2.473-3.393-1.454-.491-5-2v-1h-2a17.559,17.559,0,0,1-6-6h-1q-0.5-2.5-1-5a1.839,1.839,0,0,0,1-2h-1v-3h-1q-0.5-6-1-12c1.976-1.166,5.17-3.852,6-6v-7h1v-3h1q-0.5-1-1-2h1C147.722,238.384,148.823,238.909,153,239Z" />
        </a>
    </svg>
    <div class="container-fluid text-center">Sumber : <?= $sumber; ?>
    </div>
    <?php legend_kab($kd_indi); ?>
</div>
<input id="tahun" value="<?= $tahun; ?>" hidden>
<input id="tahun_besar" value="<?= $tahun_besar; ?>" hidden>
<input id="tahun_kecil" value="<?= $tahun_kecil; ?>" hidden>
<input id="provinsi" value="<?= $provinsi; ?>" hidden>
<input id="indikator" value="<?= $kd_indi; ?>" hidden>


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
                url: "ambil_papuateng_kiri.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi,
                    tahun: tahun
                },
                success: function(msg) {
                    $("#isi").html(msg);
                    $(".loader").hide();
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
                url: "ambil_papuateng_kanan.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi,
                    tahun: tahun
                },
                success: function(msg) {
                    $("#isi").html(msg);
                    $(".loader").hide();
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