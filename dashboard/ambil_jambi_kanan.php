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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="60%" height="60%" viewBox="0 0 1043 528">
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
            </style>
            <filter id="filter" x="172" y="255" width="157" height="174" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="259" y="250" width="240" height="247" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="368" y="304" width="254" height="194" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="461" y="188" width="213" height="221" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="618" y="160" width="244" height="216" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="492" y="62" width="205" height="158" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="637" y="89" width="249" height="172" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="238" y="142" width="231" height="174" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="318" y="90" width="221" height="226" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="676" y="230" width="42" height="40" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="195" y="330" width="56" height="58" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_12" data-name="Color Fill 12" class="cls-1" width="1043" height="657" />
        <?php
        $kdwil = '15.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_11" data-name="Color Fill 11" class="cls-2" d="M241,267c2.486,0.7,1.624.514,3,2h1v2l3,2v2l2,1v1h1l1,2h2c1.206,0.967,2.662,4.65,4,6l5,4,1,2h2l4,5h2l2,3h1v2l6,5v1h2q2.5,7.5,5,15l3,2v1h3v1h3v1l3,1a39.688,39.688,0,0,1,1,8c2.39,1.387,3.136,3.567,5,5l3,1c1.3,2.264-.331,5.111,1,7l4,2q0.5,4,1,8l3,1,5,7c-3.984.519-3.474,1.263-6,3v1h-4c-0.708,5.076-1.106,8.8-6,10-0.112,2.1-.915,7.845-2,9-0.943,3.39-1.231,1.914-3,4h-1v4h-1c-1.364,1.822-2.689,2.422-4,4l-5-1s-0.664,1.321-3,1a1.575,1.575,0,0,0-2-1l-1,2-4-1v-2a12.71,12.71,0,0,0-5-1,15.682,15.682,0,0,0-1,6l-10-2q0.5,4.5,1,9h-1v4l2,1v6c-5.184-.157-5.765-2.244-9-4l-4-1v-1l-4-1-1-2-4-1-2-3h-2l-2-3-2,1-1-3-2,1v-1h-1v-2l-2,1v-1h-2l-1-2-3-1v-2l-2,1v-1h-2l-1-2h-2l-1-2h-2l1-2-2,1v-1l-2-1v-2l-3-1v-5l4-3v-2l2,1,1-3,2,1v-1h1v-2l2,1v-1h1v-2l2,1v-1h1v-2l2,1v-1h1v-1h-1l1-3c1.876,0.823,2.616,1.481,5,2v-2l2,1v-1h1v-1h-1c-0.979-1.654,1.44-.846,2-1q-0.5-5-1-10c2.523-1.339,3.5-1.99,8-2v-1h-1c0.763-1.481,1.915-1.236,3-3-2.006-1.32-2.489-3.228-3-6h-2q0.5-2,1-4h-1l-1-3c-1.582,1-.7,1.817-1,2h-1v-1h-8v1h-1v-1h-9v-1c-2.62-.748-4.981,1.017-6,1v-1h-4c-3.542,1.1-8.878,8.988-11,7-1.258-1.054-1.084-1.707-2-3h-1v-3l-2-1v-2h-1c-0.469-1.334.774,0.4,1-1v-1h-1v-5l-5-3,1-2-2,1-5-6h-2v-1h1c-2.4-6.634,2.059-4.925,3-11h2v-1h-1l2-3c-2.772-1.663-2.556-2.913-4-6h-1v-5l-3-2v-3c-0.5-1.321-.872.408-1-1h1v-1l-2-1V265c1.135-.844.145,0.127,1-1,2.491,0.847,1.648.447,5,1v1h-1c0.636,1.421,1.166.742,2,2,3.4-1.01,1.875-1.244,4-3v-1h3c0.144,2.614.262,3.409,1,5h1l-1,2h1v-1l6,2v-1c-1.575-1.258-.342-0.969,1-2v-1h1v1c1.654,0.979.846-1.44,1-2h2v-1h14v-1l2,1v-1h2v-1h1v1h5v-1l2,1v-1h3v-1l2,1v-2c1.189-1.164,2.673-.857,5-1l-1,2h2c0.462,1.337-.711-0.384-1,1Zm5,92-3,1,3,4h2v1h-1v1h1v-1h1l1,2,8-1a10.6,10.6,0,0,0,1-4h-1v-5c-5.714-1.207-5.311-1.048-10,1l-2-1v2Z" />
        </a>
        <?php
        $kdwil = '15.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_10" data-name="Color Fill 10" class="cls-3" d="M465,255h3c1.382,2.612,1.769,1.693,2,6-1.139,1.139-.4,0-1,2h-1v1h-4v1c2.129,1.688,2.845,3.164,3,7-2.025,1.733-.827,2.176-2,4l-2,1v2h-1v2l-5,4v2h-1c-1.922,5.118,2.691,10.783,2,14h-1v2h-1v10h2l-1,2h1v2h1v3h1l-1,3h2l-1,2,3,2-1,3h1v2l3,2-1,2c0.521,0.683,4.919,2.925,6,4l2,3,2,1v2l2-1,3,5,2-1,1,2h6s0.269,0.725,2,1l-1,2h2l-1,3h2c-0.2,2.271-.136,2.629-1,4h-1l1,2h-3l1,2-3,1v1h1a9.377,9.377,0,0,1-4,4v1h-1v-1c-1.654-.979-0.846,1.44-1,2l-3-1v1h-5s0.124-1.247-2-1a1.588,1.588,0,0,1-2,1v-1h-2v-1c-3.689-1.4-8.888,1.191-10,0h-1q-0.5,2.5-1,5h-2v1h1l-1,3h-2v2l-3-1,1,2h-1v3h-1q-1,4.5-2,9l-3,1,1,3h-1c-1.139,1.139,0,.4-2,1l-1,3h-1v3l-2-1v1h1v1h-1c-1.139,1.139,0,.4-2,1v2c-5.379.143-9.434,1.231-11,0-2.543-1.742-1.906-3.128-3-6l-3,1c-0.676-.586.326-1.493-1-1l-1,2h-2v2l-2-1-5,6h-2v1l-2-1-1,3H388a3.982,3.982,0,0,1-2,2c0.44,1.344.2-.169,1,1l-1,2h2v1h-1c1.132,1.173-.025.432,2,1v2h1l-1,3h1v-1c0.859-1.889,1,2,1,2h1v4h1v1h-1v1h1v1h-1c-0.97,1.4-1.116,1.629,0,3h-2c-2.422,4.307-4.916,4.862-8,6,0.243,1.393.08-.074,1,1-0.284,1.842-2.365,2.006-3,3l2,6h-1l1,2h-1v1h-3v1h-1v-1h-1v2h-1v-1l-2,1c1.139,1.139,0,.4,2,1,0.6,2.909,2.856,3.206,1,5h2c0.139,5.265.976,8.923,0,10-1.139,1.139,0,.4-2,1q0.5,6,1,12c-2,.362-4.143,1.937-7,1v-1h-3c-1.315-.521.412-0.923-1-1-0.042.063,0.039,1.959-1,1-1.859-1.717,1.08-1.838-3-3-0.607-2.393-.318-1.858-2-3v-1l-2,1v-1h-3v-1h-1l-1,2-2-1v1h-3v1l-3-1v1h-5v1h-1v-1h-2v-1h-3v-1h-2v-1l-3-1v-2c-0.919-1.4-5.582-1.027-7-3l-1-4h-1c-2.394-2.7-.142-0.332-3-2v-1h-2l-3-4h-2c-0.982-1.018.988-.964,1-1l-3-4-2,1v-2l-2-1v-2l-4-3v-2l-3-2v-1l-3-1v-3h-2v-2h-2v-1l-4,2v1h-3l-1,2-5-1v-2h-2v2h-1v-1l-6,2c0.549,2.784.77,0.1,0,3l-3,1v-1h-1v-7c2.254-2.508.607-7.567,2-11l2-1c0.27-1.13-1.593-1.749-1-4h1v-7h-1v-2h-1v-6h1q-0.5-3-1-6l9,2,2-6h3c0.929,3.45,1.3,1.867,3,4h2l1-2h9v1l3-1,3-4h1v-3l4-3v-2h1v-7l4-2,1-4h1v-4h1c2.782-3.5,1.074-.3,4-2v-1a8.237,8.237,0,0,1,4-2,5.442,5.442,0,0,0,2,2v-1l2-1v-1h-2l-1-3-5-4v-1h-2q-0.5-4-1-8c-1.8-.945-1.574-1.385-4-2l-1-4h-1l1-3-8-7c-2.137-4.146,1.671-4.212-3-8v-1h-3v-1c-2.418-1.195-5.518-.864-7-3v-2h-1v-3h-1v-2h-1c-1.265-2.9-.7-7.269-3-9v-1h1v-1l6-1v-2l6-1v1h4v-1h3v-1l3-1v-2l6,1,1-3,7,1c0.88-3.4,1.861-3.065,6-3,1.525,2.279,4.564,2.75,8,3l1,3c1.135-.844.145,0.127,1-1,1.139-1.139.4,0,1-2h3c0.06,1.413-.172-0.147-1,1-1.142,1.581,2.458.931,3,1,0.06-1.413-.172.146-1-1-1.142-1.581,2.458-.931,3-1v3h1v-1c1.351-.417-0.114.422,1,1,2.064,1.07,4.231.167,2,3h2v-1h3v3c1.413,0.06-.147-0.172,1-1,1.581-1.142.931,2.458,1,3h2v3c0.465,0.994,3.273.8,1,3h2v-2h2v-2c4.336-.488,2.641-1.423,7-2v-3h1v-1l10-1v1h1v-1h1l2-6h3c-0.759-3.626-1.918-4.948-2-10,1.135-.844.145,0.127,1-1l8-1,1,3c3.315,0,6.944.364,9-1l5-7,2,1-1-3h7c-0.166-1.4.311-.471-1-1,1.04-1.831.343,0.1,2-1v-1l2,1c0.8-.93.81-4.228,2-5l6-1c3.144-2.127-1.644-4.189,5-5,3.667,3.011,4.434-2.255,8,3h1l-1,2h1v-1l4,3v-1h2v-1l9-3c0.607-2.393.318-1.858,2-3v-1h1v1h1v-4h4v-2ZM292,304c1.139,1.139,0,.4,2,1C292.861,303.861,294,304.6,292,304Zm71,5c1.127,1.719.632,1.355,3,2A7.742,7.742,0,0,0,363,309Z" />
        </a>
        <?php
        $kdwil = '15.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            .id="Color_Fill_9" data-name="Color Fill 9" class="cls-4" d="M531,320q0.5,2,1,4h-1q-0.5,2.5-1,5l3,1c3.656,3.428,12.649,1.245,18,1v-1h1v-3h7l3-4h1c2.669-3.61.254-3.957,7-4v1c0.678,0.232,9.085-3.975,12-3v1h2q0.5,1,1,2h2v1h18v-1c1.452-.817,1.7-0.7,4-1v1c-4.826,2.643-6.18,6.143-6,14,1.342,1.082,1.812,2.782,3,4l7,6v2a26.172,26.172,0,0,1,3,13,12.71,12.71,0,0,1-5,1c-0.383,3.773-2.134,5.3-3,8v13c3.17,2.169,1.745,4.75,6,6,0.245,5.077,1.21,7.8-3,9q-0.5,1.5-1,3h-1v-1h-1q-0.5,1-1,2h-3q-0.5,1-1,2h-2q0.5,1,1,2h-3v1l-3-1v-1l-2,1q-0.5-1-1-2c-2.23-1.313-5.081-1.713-8-2v-2c-4.105-1.074-1.458-1.783-3-3l-3,1v-1h-1a11.878,11.878,0,0,1-1,5h-3v1a2.674,2.674,0,0,1-3-1l-5,1v-2c-1.413.054,0.393,0.758-1,1-0.86,1.889-1-2-1-2l-5,1q-0.5-1-1-2l-3,1q-0.5-1-1-2h-1v1c-2.118.671-.357-1.277-1-2h-1v1c-1.816.359-3.879-1.287-5-2v1c-3.6.877-4.421,3.048-8,4-0.616,2.926-2.285,6.224-1,8,1.71,6.714,4.034.2,6,7h1v1h-1c-1.295,2.319-3.467,3.1-5,5v1h1l-3,5h-3q-0.5,1-1,2h-1v1h1c-0.852,1.168-2.054,1.023-3,2q0.5,1,1,2h-2l-3,5h1v1h-1q-0.5,2.5-1,5l-2-1v2l-2-1-2,3h-2c-0.885,1.1.945,0.739,1,1q-0.5,1.5-1,3l-4,1a1.676,1.676,0,0,0-2-1v1h-1v-1h-1l-2,3h-1v-1l-3,2v2l-2-1-1,2h-4v1l-3,1,1,2h-1q-1,3.5-2,7c-4.091,1.124-1.084,1.009-3,3l-2-1v1h-6v-1h-1v1h-8l-1,2-2-1v1h1c1.142,1.581-2.458.931-3,1v2c-3.215-.972-6.346-0.759-11,0v-2h-1v1c-1.4.2,0.377-.678-1-1h-3v-1l-3,1v-2l-3,1c-0.373-4.465-.628-2.915,0-7-2.952-.464-7.752-1.953-12-1-0.252.056-.3,1.47-2,1v-1h-2l-1-2-2,1-1-3-2,1v-1h-1v-1c0.273-.329,1.761.192,1-1-0.359-.563-1.362-0.773-2-2-1.135.844-.145-0.127-1,1a16.12,16.12,0,0,0-6,4c1.139,1.139.4,0,1,2h-2l1,3h-2c-0.18,4.323.132,5.972-4,7v2l-13,2v2h-1v-1c-0.86-1.889-1,2-1,2h-2v1l-3-1v1c-1.242.959-1.061,2.231-2,3l-3,1,1,2h-2v1h1l-1,2h-2c-1.643-3.1-1.9-1.8-2-7h1c0.417-.979-1.591-4.31-1-7,0.3-1.381.888,0.41,1-1h-1c0.239-1.61,2.157-6.018,1-9h-1v-2l-2-1v-2h-1l1-3h-1c1.793-2.2,4.635-3.362,8-4-0.725-3.479-1.856-4.349-2-9l6-5v-1h2l1-2h1l2-3,2,1c-0.851-2.421-.486-0.608,0-3l-2-1v-3l-2-1v-3l-2-1c-1.072-1.77-1.793-5.514-2-8,1.135-.844.145,0.127,1-1h11v-1h3v-1h2v-1c0.644-.246,1.419,1.335,4,0l1-2,2,1v-1h-1c-0.226-1.4.374,0.268,1-1,2.131-3.772,7.383-6.776,13-7,1.139,1.139,0,.4,2,1-0.092,4.284-.217,4.695-1,7h1v-1h6v-1c2.6-.973,4.183-0.287,6-2v-2l2,1v-1h-1l1-3,2-1v-1l2,1v-1h-1v-1h1l1-3h2l-1-2h1v-3h1a18.034,18.034,0,0,1-1-4h2q0.5-2.5,1-5h2l5-7c0.618-1.211-.189-3.319,1-4h3v1c2.784,1.611,10.99-1.745,14-2v3h1v-1c1.523-.8,1.982,1,2,1l6-2,1-2h2l1-2h1v-2h1v-2h1l3-4h-1l1-3-2-1,1-2-11-2-1-2-5-4,1-2-6-5v-1l-2,1v-1c-1.139-1.139-.4,0-1-2l-3-1c0.113-3.16,1.955-1.874-1-3a29.413,29.413,0,0,0-1-7l-2,1v-4h-1v-2h-1v-5h-1c-0.722-2.772,1.449-.929,0-5h5v1h4v1a12.951,12.951,0,0,0,7,1,1.711,1.711,0,0,1,2-1v1l6,1v-1l6-1v1l6,1v1h5v1h2v1l6,2c2.587,1.429,2.48,3.039,6,4,3.05-4.336,4.069-.509,7-1v-1h4v-1l4,1v1Z" />
        </a>
        <?php
        $kdwil = '15.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_8" data-name="Color Fill 8" class="cls-5" d="M635,194c1.114,3.912,2.638,2.749,6,4,0.131,4.145,1.9,4.726,2,8h-1v1h1v2h1v4l2,1a18.582,18.582,0,0,1,4,7h3q0.5-1,1-2l6,1v-1h7v1c-1.635,1.249-2.314,5.089-1,9h1q0.5,1.5,1,3h-1q-0.5,2.5-1,5l-2,1q0.5,3,1,6h-1c-3.874,4.072-5.9-.844-6,8h-6q-0.5,1.5-1,3l6,1c0.564,3.025,1.857,7.012,0,10l-3,2v2h-1a1.59,1.59,0,0,0,1,2q-0.5,4-1,8l6,5v3h1c-0.574,2.01.12,0.865-1,2v1h-3v1c-3.516,2.835-3.13,3.683-3,10H636v21h4v7h2v1h1v-1c3.529,0.644,4.494.982,5,5h-1v5a12.2,12.2,0,0,1,2,2h13c2.864,5.5,2.075,16.484,2,25,3.268,2.212.726,4.623,2,9h1q0.5,5.5,1,11h-1v6h-1v2h-1c-0.781,1.957-.125,4.918-1,7h1v1h-4c-1.509-2.473-1.222-.627-3-2q-0.5-1-1-2h-1v-2l-2-1c-2.694-3.979-.148-5.628-7-6v-2l-2,1v-1h-1q0.5-1,1-2h-1v1h-1v-1l-6-10c-2.666-1.7-1.262,1.536-4-2h-1q-0.5-4-1-8l-2,1q-1-2-2-4l-3-1v-5h-1c-0.88,3.4-1.861,3.065-6,3-0.147-3.9-1.425-13.6-3-16l-3-2c-5.482-5.61-6.87-5.919-7-17,2.786-1.53,6.119-4.548,7-8l-5,1q-0.5,1-1,2h-8v1a2.636,2.636,0,0,1-3-1h-7v-1h-2q-0.5-1-1-2h-3v-1c-1.714-.343-1.708.931-2,1h-5v1h-2v1a2.626,2.626,0,0,1-3-1l-6,1q-0.5,1.5-1,3h-1v2h-1q-0.5,1-1,2h-2v1a15.682,15.682,0,0,0-6-1v4c-3.1,1.163-8.434,1.046-13,1v-1h-5c-0.092-.029.186-0.623-2-1q0.5-5,1-10l-6,1v-1h-7s0,1.286-2,1v-1c-3.945-.726-5.237,2.9-8,2l-2-3h-2v-1l-4-1v-1h-2v-1h-5v-1h-3v-1h-3v-1l-12,1v-1l-4-1v1l-4,1v-1c-3.17-2.935-.305-6.691-2-10h1v-1h6v2c1.807-.155,1.236-1.626,3,0v2c1.128,0.853.677-.919,1-1h1v1l9-1c0.543-2.553.594-1.639,2-3v-1h2v-1h-1c1.047-1.966,1.458-2.4,4-3v-2h2v-1l2,1v-1h1v-1h-1l1-3h1v-2l3-2,1-4h1v-1h-1c-0.451-3.019.612-4.216,1-7,2.908-.6,3.206-2.856,5-1v-2c-0.416-.579-1.634-0.147-1-2h1c1.139,1.139,0,.4,2,1q0.5-1.5,1-3l3,1v-1h-1q0.5-1.5,1-3c1.708-.5,2.841-0.084,3-2-0.279-.345-1.753.2-1-1l2-1v-3l2,1v-1l2-1v-1h-1c-0.139-1.407.776,0.4,1-1v-4l3-1v-1h-1q0.5-1.5,1-3h2v-1h-1v-1h1v-2h-1v-8l2-1q0.5-2,1-4l2-1q-0.5-1-1-2h1v-8h-1q-0.5-1.5-1-3h-1c-0.77-2.721,2.523-2.97,3-4v-5h4v-2l3,1v-1c1.731-1.416-.476-0.446,1-2,1.289-1.357,4.344-1.017,7-1v1l6,1,7,8h2v1h5v1h2v1l6,1v1c1.139,1.139.4,0,1,2l3-1a25.606,25.606,0,0,1,2-8h3a9.749,9.749,0,0,0-1-4h3c0.489,0.459,7.745,2.1,8,2v-1c2.734-1.735,3.465-3.966,7-5,1.129,1.975,1.417,2.338,4,3,1.575-2.619,5.45-4.365,8-6v1h1v3h1q0.5,1,1,2h2l4,5h3v-3c-3-.776-2.63-0.616-3-4h1v-3h1C626.977,193.693,630.571,193.886,635,194Z" />
        </a>
        <?php
        $kdwil = '15.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-6" d="M623,165h32v2l-9,1v-1h-3v7c3.316,1.756,4.368,2.058,10,2v1h3v2c1.224,0.676,1.372,1.575,2,2h2l3,4h3v2h10v1h1l2-3c2.067-.907,2.857.849,4,1v-1l3-1v2h1q-0.5,1-1,2h1v1h1v-1c0.4-.038,2.244.884,4,1q0.5,5,1,10c3.046,0.309,2.42.986,6,0v-1c1.287,0.182,1.761,1.742,4,1v-1h2v-1l14-1v-1h2v-1c1.206,0.142,1.857,1.858,4,1q0.5-1,1-2h8v-1h2v-1l4,1v-1h2v-1l18-1v-1h6v-1c1.969-.43,1.3.574,2,1,2.186,0.073,2-1,2-1h5v-1h15v-1c2.239-.935,3.843-0.893,7-1l7,6q-0.5,1-1,2h1c0.9,1.861.655,3.694,2,5h2c0.876,1.11-.935.726-1,1q0.5,1.5,1,3c2.762,0.723,2.237.279,3,3h1v1h-1c-0.979,1.654,1.44.846,2,1a11.793,11.793,0,0,0,2,5h1q-0.5,1-1,2h2q0.5,1,1,2l3,2v1h-1c1.272,2.57,1.53.718,3,2v1h-1l3,4h2q-0.5,1-1,2l4,3v1l3,1q-0.5,1-1,2c4.314,3.416,10.342,1.3,12,8h1q0.5,3.5,1,7h3v2c1.266,0.612,1.463,1.671,2,2l2-1v2h1c1,1.393.9,2.517,1,5-2.4,2.932,1.491,6.242,0,11h-1c-0.635,1.774-.448,2.61-1,4-1.135.844-.145-0.127-1,1-15.643-3.057-23.7,4.94-37,6a15.682,15.682,0,0,1-1-6h-1v-3l-12,2v1l-6-1v1l-4,1v1h-4v1h-2v1l-6-1v1h-5v1h-2v1h-5v1l-6,1v2l-10,2v1h-6q-0.5,1-1,2l-2-1v1l-11,1v1h-6v1h-3v1l-2-1v1l-4,1v1c-4.586,1.856-12.191-.791-17,1v1l-4,1v1h-2q-0.5,1-1,2l-5,1q-0.5,1-1,2l-4,1v1l-2,1v2l-2,1v12h2l4,5h2v1h1v8c-1.219.938-1.09,2.283-2,3h-2c-4.1,3.051-5.915,8.888-6,16,2.612,1.382,1.693,1.769,6,2v-1c1.824-.895,3.1.688,4,1v1h-1c-5.847,10.032-11.842,4.708-21,8v-2c-1.383-1.539-1.652-15.435-1-19h1c0.04-.291-0.93-2.269-1-4l-15-1c-1-2.652-1.041-6.944-1-11h-7v-8h-4q-0.5-1.5-1-3h1v-2c0.06-1.413-1.081.412-1-1h1v-8h-1v-1h1v-4h16c0.534-1.48.511-8.055,1-9h1c2.648-3.455,4.5-.816,6-6h-1v-3l-2-1v-2l-4-2v-6h1a1.453,1.453,0,0,0-1-2q0.5-2,1-4h2c0.36-1.972,1-2,1-2v-5h1q-0.5-3-1-6h-3v-2h3v-1h1v-5l6-1v-1h1q-0.5-3-1-6h1v-2h1v-3h1v-5h-1c-0.838-3.031.583-7.489,1-9,0.376-1.363-.291-0.07-1-1v-1h-7v1l-6-1q-0.5,1-1,2h-2l-4-6-2-1v-3h-1v-3h-1c-1.206-3.538.237-7.578-2-10v-1h-4l-2-3-12,1v-4h2q0.5-3,1-6h-1c-1.055-4.6-.148-12.931,1-16h-1c-1.139,1.139,0,.4-2,1v-4Zm61,91h-3v1h1a10.6,10.6,0,0,0-1,4,19.168,19.168,0,0,0,7,1c2.163-3.62,4.283-.308,5-2h1v2h3v1c1.139,1.139.4,0,1,2a9.749,9.749,0,0,0,4-1v-1h-1v-1h1q-0.5-1.5-1-3h1v-1h6v-1h1v-3h2v-4h2v-2h-1v1c-1.7-.2-1.531-1.794-2-2h-2a60.584,60.584,0,0,1-1-11h-8v-2c-3.209.322-2.428,0.413-4,2h-1v2c-1.587-.433-1.528-1.53-3,0v2c-2.422-1.1-3.386.16-4-1h-1v1a8.278,8.278,0,0,0-3,5l2-1v8h-1v4Z" />
        </a>
        <?php
        $kdwil = '15.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-7" d="M689,91c0.352,1.815,2.066,4.36,1,7l-2,1v8h-1q-1,3-2,6h-1v3h-1a9.017,9.017,0,0,0-2,4c-5.435,1.316-8.763,6.543-14,8-0.38,3.541-1.241,3.036-2,6h-2q-0.5,3.5-1,7h-1v6h1c1.228,4.238-.994,15.984-1,16l-3,1c-0.641,2.454-.4,1.739-2,3v1H629v4h-3v17h-1v2h-1q-0.5,2.5-1,5h-3v-1h-1v-3c-3.782.826-10.938,5.407-13,8l-3-1v-1l-3-1v1l-6,5-11-2c0.3,2.362,1.784,3.243,0,5l-3,1q0.5,1.5,1,3h-1c-1.011,2.185-.231,2.486-2,4-2.737-4.4-3.826-1.921-8-4v-1h-2v-1h-6l-7-8h-2a21.736,21.736,0,0,0-11-3c-0.9,1.532-6.27,5.792-8,6,0,0-.112-2.1-1-1q-0.5,3-1,6h-1v-1h-1q-1-3-2-6c0.125-.513,2.5-0.112,2-3h-1v-3l-2-1q-0.5-3-1-6h-1q-0.5-2.5-1-5l-3-2v-3l-4-3v-1h-5v-1c-1.919-1.353-2.289-2.3-5-3-0.568-2.831-2.17-4.77-3-7v-4l-2-1-1-4-2-1c-1.873-2.288-1.882-4.783-2-9,4.512-2.079,3.13-3.261,6-6,1.059-1.011,1.955-.695,3-2l8-1q0.5-3,1-6h3v-1c1.139-1.139.4,0,1-2h5q-0.5-2.5-1-5a60.575,60.575,0,0,0,6-4v-2l2-1,2-3h2l2-3h2v-1c1.745-1.437,2.412-2.293,5-3v-2h2v-2h2V98h2c1.625-3.628,4.429-6.277,7-9l2-1V86l3-2V82h1l1-3,2-1V76l4-3V71l3-2V68h15v1l6-1V67l10,1v1l7,1v1h6v1h6v1h13v1h4c2.612,0.921,6.151,4.671,11,3V76l5-1V74h2V73h4V72h4V71a1.7,1.7,0,0,1,2,1c2.327,0.38,2.633-.538,4-1v2h1v1h-1c-0.4,1.958.341,1.271,1,2,4.918,5.084,13.477-.748,14,10h1l-2,4h1C688.139,91.139,687,90.4,689,91Z" />
        </a>
        <?php
        $kdwil = '15.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-8" d="M689,94h5l4,5,3,1v2c3.22,0.573,3.613,2.3,6,1v2l2-1v2l2,1q0.5,1.5,1,3c3.474-1.266,6.074-.14,11,0,0.888,3.44,1.291,1.891,3,4h1v1h-1v1h1v4h1c1.819-1.682,7.561-1.1,11-1v2c3.907,0.825,7.139,2.483,9,1,1.591-1.148.2-1.572,2-2,0.118,0.146-.094,1.9,1,1v-2c1.308,0.03,1.724,1.8,4,1v-1a20.249,20.249,0,0,1,9-2s0.03-2.029,1-1v2l6,1v-1h1v1l8-1q0.5,1,1,2l5-1v2l2-1v2l2-1v1c1.647,1.065,1.339.939,3,0v2l2-1v2l2-1v2l3-1v1l4,2v-1h1v2l6,1v1c1.881,0.5,4.859-2.8,7-1v-2l14-1s-0.112.856,2,1v-1h1v2l2-1v2h1q-0.5,1-1,2h1c2.174-2.993,1.078-1.06,5-2v-1h1a2.365,2.365,0,0,0,2,1s0.556-1.356,3-1a1.432,1.432,0,0,0,2,1q0.5-1.5,1-3c1.058-.938.888,0.948,1,1h1v-1h1v-1h-1v-1h3c0.644,1.3,1.6,1.385,2,2v2h1c1.7,2.68-.953,1.9,3,3a26.4,26.4,0,0,0,1,4,1.5,1.5,0,0,0-1,2l2,1q-0.5,2-1,4h1v1c0.321,0.683,1.29.034,1,2h-1v6h1c0.177,1.4-.705-0.383-1,1q0.5,1.5,1,3l-3,1v6c-0.024.075-.626-0.161-1,2h2v2h-1v1h2c0.132,0.552-1.534,2.723,0,5l3,1q-0.5,1.5-1,3c0.443,0.776,2.21.715,3,2h-1v1l3,1v1h-1q0.5,1.5,1,3h2q-0.5,1-1,2h2q-0.5,1-1,2l2,1q-0.5,4-1,8s1.3,0.1,1,2c-0.219,1.4-.974-0.414-1,1-0.052,2.818,3.535,3.243,2,7l-2,1v2h-1q-0.5,2.5-1,5a1.535,1.535,0,0,1,1,2l-2,1a1.518,1.518,0,0,0,1,2c0.3,2.275-2.017,3.8-1,7h1v3h1v3l2,1q-0.5,1-1,2s1.288-.133,1,2a1.676,1.676,0,0,0-1,2h1q0.5,3,1,6l2,1q-0.5,1.5-1,3h2v1h-1q0.5,1.5,1,3c-2.933-.682-2.4-1.737-3-2h-1v1h-1v-1h-3v-1l-3-1v1l-2-1v1h-2v-1h-1v1l-7,1v2l-3-1v-1l-2,1v-2h-1c-1.4-1.409-.48-1.346-3-2-1.048-4.01-3.412-4.056-4-9-1.318-.426-2.007.909-2-1h1q-0.5-1-1-2h-1v1c-1.414-.019.363-0.623-1-1h-3l-2-3-2,1v-1c-1.441-1.387-.5-0.065,0-2l-2-1v-2l-5-4c-1.937-2.708-2.746-5.685-5-8l-3-2q-0.5-1-1-2h-2v-1h1q-0.5-1.5-1-3l-3-1v-1h1q-1-2-2-4h-2q0.5-1,1-2h-2c-0.946-1.051.959-.9,1-1,0.528-1.312-.41-0.487-1-1h-1q0.5-1,1-2h-1v-2h-1v-2h-1v-2l-8-7-7,1v-1h-7v1c-3.156,1.3-2.832-.288-4,0v1H768v1h-3v1c-3.148.96-5.1-1.417-7-1v1h-2v1c-1.319-.12-3.192-1.662-6-1v1h-1a1.476,1.476,0,0,0-2-1q-0.5,1-1,2l-15,1v2h-1v-1h-1v1h-7q-0.5,1-1,2c-1.113.161-2.611-1.716-5-1v1h-3v1l-3-1v1h-3v1h-7v2h-4c-1.4-.217.413-1.046-1-1v1h-2c-0.8-4.425-.27-5.064,0-10a12.71,12.71,0,0,0-5-1q-0.5-2-1-4l-5-1v2l-15,1v-1h-2l-4-5-2,1v-2l-2-1v-1l-2,1v-2l-2-1v-1H643q-0.5-3-1-6c2.316-.875,4.407-1.017,8-1v-1h1v1h4c-0.549-2.784-.77-0.1,0-3,2.784,0.549.1,0.77,3,0,0.653-1.322,1.58-1.36,2-2q-0.5-1-1-2h3q-0.5-2-1-4h1v-5c-0.571-2.046-2.672-4.617-2-8h1q-0.5-2.5-1-5h1q0.5-2.5,1-5c2.377-.586,4.034-1.108,4-4h-1v-1h1v-1l2,1v-1c-1.575-1.258-.342-0.969,1-2v-1h1v1l3-1q0.5-1,1-2c-2.029-.94.587-0.814,2-1a4.812,4.812,0,0,1,4-2v1h1v-1h1a10.6,10.6,0,0,0,1-4h3q-0.5-1.5-1-3h1c0.72-1.6.83-2.386,1-5h2v-7h-1C687.606,99.23,688.783,97.144,689,94Zm38,29h-2q-0.5,1.5-1,3h1v-1h3v-1h1v-1h-1v-2C726.861,122.139,727.6,121,727,123Z" />
        </a>
        <?php
        $kdwil = '15.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-9" d="M349,165h4q-0.5,3.5-1,7c-1.135.844-.145-0.127-1,1H341c-0.673,1.294-1.557,1.343-2,2v2l-3,2c-1.607,2.266-1.909,4.316-4,6,0.844,1.135-.127.145,1,1,1.9,8.3,11.536,10.471,19,13h4v1h3v1h5v1h3v1h9l4,5,6,1,1,3,2,1c2.8,2.829,1.237,2.777,7,3v-1h4v2c1.8,0.945,1.574,1.385,4,2,1.9,1.981.516,0.029,3,1,6.281,2.456,9.786-2.15,16-3v1h1c0.171,2.543.053,3.5,1,5h1v2h1c0.71,2.045-.492,5.765-1,7h-1v7l3,1v1h7v-1l22-2v1h3v1c1.681,1.848,2.855,15.223,3,19-2.808,1.651-3.4,4.03-7,5v2c-2.262.278-2.613,0.113-4,1v1h-2v1h-8v-3c-3.686-.326-4.21-0.818-5-4h-4c-1.439,2.465-3.138,2.788-4,6-4.261.343-5.507,2.019-8,4v1h-2v1c-5.207,2.853-11.192,2.622-12,10l-5,1v1h-5v-1l-8,1q0.5,5,1,10c-6.114,3.809-1.607,8.79-11,9-0.565-.664-2.341-2.694-4-2v1c-3.428.871-2.575,2.068-6,3l-1,3h-4c-1.395-.231.414-1.036-1-1v1h-6q-0.5-3-1-6c-2.69-.728-3.1-1.629-5-3v-1h-4l-1-2h-2l-1-2H329l-1-2h-3v-1c-3.748-.887-3.2,1.672-4,2h-6s-0.047.647-2,1l-1,4h-3v2c-4.03.222-4.627,0.8-8,2v1l-14-1v1l-6,1-5-6h-1v-2h-1l-1-2-3-1-4-5h-2l-2-3-6-5-1-3h-2l-1-2-4-3v-2l-2-1v-2h-1a8.027,8.027,0,0,1-2-4c2.612-1.382,1.693-1.769,6-2v-1h7c1.3-7.142,6.419-10.188,8-17,5.623-.689,3.2-2.386,6-4l5-1,2-3,3-1c2.592-1.865,1.664-3.772,6-5v-2h2l3-4h1l1-4h1l1-3,2-1v-2h1v-1c2.271-1.931,1.777,1.063,3-3h1v-1h-1c-1.148-3.791-1.108-1.688-3-4h-1v-5c3.053-1.639,4.819-3.278,5-8-3.334-2.829-5.038-8.56-5-15,2.749-1.588,4.274-4.421,5-8l5-1v1h1v-1c1.058-.147,2.729,2,5,1l2-3,6-1,2-3,4-3,1-3,3-2v-2l2-1,1-3h3v-1l3-1c3.368,4.475,3.533-1.254,7,1,1.087,0.9.191-.16,1,1h-1v1h4c0.844-1.135-.127-0.145,1-1q0.5,2.5,1,5c-4.036,2.272-1.321,1.685-3,5l-2,1Q348.5,162.5,349,165Z" />
        </a>
        <?php
        $kdwil = '15.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-10" d="M398,110h6v-1h2l1-2,10-3v1c5.737,1.561,2.634,4.489,6,7h2l1,2h2c0.661,0.378,5.794,3.57,6,4,2.319,4.83-4.048,3.023,1,7,1.239,0.81,7.856,1.108,13,1l3,4h1v2l2,1,1,3h5c3.483,3.023,8.842.185,14,2v1l4,1c4.061,0.409,10.6-1.116,13,1a27.448,27.448,0,0,1,4,5h1q0.5,3,1,6l3,2,1,4,2,1v5h1l2,6,4,2,1,3h6v1h1a9.145,9.145,0,0,0,2,2q0.5,2.5,1,5l3,2q0.5,3,1,6h1l3,9h-2c0.552,5.206,2.124,6.591,4,10v2l2,1v13l-2,1v3h-1v2h-1v10h-1v3l-2,1c-1.048,1.82-.9,4.188-1,7-2.393.607-1.858,0.318-3,2h-1v1h1c0.979,1.654-1.44.846-2,1-0.781,3.158-2.671,4.238-4,7h-3v3l-5,1v1c1.139,1.139.4,0,1,2l-3,1q-0.5,5-1,10l-2,1v2l-3,2v3h-1c-1.6,2.068-1.938,3.234-5,4-1.01,3.4-1.244,1.875-3,4h-1v3l-3,1v1h-2v1h-2v1c-4.306,1.365-9.071-4.6-15-5-0.918,2.437-1.037,6.193-1,10l-5-1v-1c-4.565-1.775-4.775,1.948-5-5,4.685-4.471-2.692-8.9,0-16h1v-2l5-4,1-4,2-1q0.5-2.5,1-5h1q-0.5-3-1-6l2-1c1.506-2,1.8-3.549,2-7h-1v-2c-1.289-1.357-4.344-1.017-7-1v-9l-2-1v-5h-1c-2.641-2.4-13.371-1.1-18-1-2.62,2.437-12.562,1.685-16,1l-1-3c0.343-2.277,4.512-8.53,3-12l-2-1v-2h-1v-4h-1v-1h-4c-2.293,2.773-11.27,5.675-16,3l-4-5c-3.578-1.635-5.428,3.148-9,0a12.223,12.223,0,0,1-4-6c-5.569-.056-7.135-1.48-10-4l-1-2h-8v-1l-9-1v-1h-4v-1h-3v-1l-7-1v-1h-2v-1h-3v-1c-1.882-1.394-2.338-2.238-5-3a34.58,34.58,0,0,1-1-7h2c0.838-4.55,2.12-3.526,4-6l1-3h11q1-4.5,2-9c-3.563-1.305-4.47-.381-5-5,3.037-2.055.427-1.85,2-4h1c1.139-1.139,0-.4,2-1-0.1-3.761-.9-4.59-2-7l-3,1v-2c-3.6.123-6.69,0.966-8,0-4.329-1.983-3.352-2.622-5-7-2.01.574-.865-0.12-2,1-1.139,1.139-.4,0-1,2h-2c-0.8-.348-0.21-2.72-3-2l-1,2h-2c-1.321-7.278-1.965-14.668-2-26l6-1v-1c1.139-1.139.4,0,1-2,6.049-.052,5.8-1.869,10-3,0.789-3.229,1.856-3.449,2-8,4.624-.853,5.264-2.329,10-1l1-3c1.474-1.718,6.684-2.882,10-3,2.318,2.619,4.521,1.624,8,3v1c2.151,0.857,14.616,4.786,17,4v-1l5-1C394.89,104.258,397.06,105.33,398,110Z" />
        </a>
        <?php
        $kdwil = '15.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-11" d="M707,236c-0.89,4.866-.181,6.471,0,12h4v1h1c-0.644,2.739-1.309,2.276-2,5h-2v2c-4.49.675-6.705,0.328-11,2q0.5,1,1,2l3,1v3h-3l-2-3h-2v-1c-2.168-1.35-1.439.455-3-2-1.727,1-3.88,3.671-6,4a20.309,20.309,0,0,0-4-1c0.339-3.112.727-3.116,2-5h1v-4h1v-2h1q-0.5-3.5-1-7h1q-0.5-1-1-2h1v-1l4,1q0.5-1,1-2h2l2-3h2v-1Z" />
        </a>
        <?php
        $kdwil = '15.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-12" d="M244,351h-7q-0.5,2.5-1,5a1.715,1.715,0,0,1,1,2h-1v7h-1c-1.417,1.782-.9,1.659-4,2v-1c-1.9-1.037-4.161.684-5,1l1,3h-1c-3.736,4.351-11.928,6.248-15,11-1.135-.844-0.145.127-1-1-2.5-1.663-2.144-4.778-2-9-2.712-3.062-.59-10.358-2-15h-1v-5l-2-1,1-2h-2c-1.167-1.167-.869-2.688-1-5l8-7c6.8-.09,15.817-0.5,21,1,4.219,1.22,8.127-1.326,10,0h2v1h-1q1,4,2,8h1v2h1Z" />
        </a>
    </svg>
    <div class="container-fluid mt-3 text-center">Sumber : <?= $sumber; ?>
    </div>
    <?php legend_kab($kd_indi); ?>
</div>
<input id="tahun" value="<?= $tahun; ?>" hidden>
<input id="tahun_besar" value="<?= $tahun_besar; ?>" hidden>
<input id="tahun_kecil" value="<?= $tahun_kecil; ?>" hidden>
<input id="provinsi" value="<?= $provinsi; ?>" hidden>
<input id="indikator" value="<?= $kd_indi; ?>" hidden>

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
                url: "ambil_jambi_kiri.php",
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
                url: "ambil_jambi_kanan.php",
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