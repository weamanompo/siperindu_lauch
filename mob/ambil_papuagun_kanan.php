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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35%" height="35%" viewBox="0 0 1181 806">
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
            <filter id="filter" x="285" y="244" width="240" height="274" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="41" y="248" width="307" height="156" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="256" y="26" width="371" height="283" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="-5" y="339" width="400" height="289" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="834" y="209" width="354" height="604" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="86" y="0" width="265" height="271" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="434" y="146" width="427" height="209" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="335" y="219" width="533" height="536" filterUnits="userSpaceOnUse">
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
        $kdwil = '95.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Jayawijaya_08" data-name="Kab Jayawijaya 08" class="cls-1" d="M440,291h4c0.369,2.181,1.762,3.934,1,7h-1v5h1v2l2,1c1.306,2.221.958,5.561,1,9l-3,2v1h-2c-1.367,1.212-1.043,4.4-1,7,1.139,1.139.4,0,1,2a10.6,10.6,0,0,0,4,1v-1l6-1,6-7h2v-1c2-1.07,9.294-3.126,13-2v1h4v1h3v1l4,1v1h2l1,2h2l3,4h2l5,6h2l2,3h1v2c-2.1,1.268-3.341,4.282-2,6,0.787,3.08,2.732,4.615,4,7l1,4h1c2.251,5.18,3.212,19.9,1,26h2v-1c1.361-1.166,1.528-1.825,2-4,4.789,1.138,4.264,5.111,4,11-1.987,2.167-1.1,10.054-1,14a21.88,21.88,0,0,0-5,4H498v-1l-13-1v1l-14,1c-4.515,1.443-10.557,3.622-15,5l-12,1v1h-3v1h-2l-2,3h-1v2h-1v1l-3,1v1H415v1h-2c-1.57,2.771-3.2,4.044-4,8-2.807.6-4.773,2.248-7,3-3.008,1.016-15.455,1.838-17,1l-3-4h-2v-1h-2v-1h-2v-1h-2l-1-2c-5.013-4.689-5.73-7.386-14-6-1.869,3.511-4.046,6.275-5,11h-2c-2.7,4.669-7.172,8.3-9,14-1.813,5.652,1.6,19.754,3,23h1v2h1v3h1v2h1v3h1q0.5,2.5,1,5h1c0.216,1.476-2.681,2.39-3,3v3h-1v18s-0.684.178-1,2l-3,1v1h-5v1c-4.869,1.41-10.251-.882-14-1l-17,1c-6.877-2.311-18.276-12.472-19-21,1.719-1.127,1.355-.633,2-3h2c1.429-2.1,3.482-2.888,5-5h1v-6c-1-.973-2.933-5.265-2-8h1v-2h1q1-5.5,2-11h1q0.5-5.5,1-11c2.073-6.856,2.783-16.328,5-23v-4h1v-3h1v-4h1v-2h1v-3h1v-2h1c0.691-2.484-1.186-4.645-2-6h-1q0.5-9,1-18h1v-4h1v-4h1v-3h1v-3h1v-3h1v-2h1v-3h1a39.633,39.633,0,0,0,3-8c3.264-.6,11.9-5.882,12-6h1v-3h2c0.274-4.7,1.135-4.312,0-8v-4h-1v-2h-1q-0.5-2.5-1-5h-2c-0.971-3.655-3.857-6.536-5-10-1.615-4.9,1.72-15.2,2-16-5.206.888-19.292-5.179-20-12-2.762-.723-2.237-0.279-3-3-3.716-3.143-7.786-21.946-6-24,1.9-3.474,4.992-6.533,10-7,0.935,1.245,2.287,1.08,3,2v2l2,1v2c1.989,2.612,7.334,2.106,12,2v1h6v1h3v1h3v1h3v1h2v1h3v1h2v1l6,1v1h4v1c4.923,1.469,12.934-1.1,16-2h6v-1c4.883-1.382,12.475.362,16,1,2.243,5.209,1.85,14.629,3,21,1.127,0.6,1.561,1.737,2,2h2v1c2.974,1.152,5.723-.433,8,1l2,3c4.469,3.084,8.244,3.947,16,4C434.809,295.872,438.715,295.9,440,291Z" />

        </a>

        <?php
        $kdwil = '95.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Lanny_Jaya_07" data-name="Kab Lanny Jaya 07" class="cls-2" d="M314,398c-5.134-.561-3.236-2.195-6-4h-2v-1l-18-4v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1l-6-2v-1h-3v-1l-4-1v-1l-24-8-9-1v-1h-4v-1h-5v-1h-5v-1h-6v-1h-6c-1.52-.445-6.991-2.106-10-1-5.424,1.994-6.3,7.17-14,8l-3-4h-1q-0.5-2-1-4l-4-3v-2l-2-1v-1h-2v-1l-3-1-1-2h-3v-1l-12-2v1c-4.112,1.138-7.476-.4-10,2-9.557,2.666-4.1,12.775-12,15-3.089,3.339-13.544,3.968-20,4H96l-25,7v1l-12,4c0.789-3.229,1.856-3.449,2-8-2.128-1.212-2.177-2.253-5-3v-2H55l1-7H55a7.294,7.294,0,0,0-2-4H52c-2.133-3-1.156-4.491-6-5,0.266-4.427,1.245-4.445,3-7h1v-7h1l2-6h1v-3h1c0.682-2.714-2.541-7.345-3-9l1-6a32.958,32.958,0,0,0,9-6l2-3h2l2-3h2l1-2h2v-1h2v-1h3v-1H88v-1l6-1c2.454,2.926,4.976,3.307,6,8l3,1v1h2v1h4v1h8v-1h12v-1h2v-1h3v-1l6-2v-1l4-1,1-2,4-1,1-2h2c0.281-.207,3.827-5.616,4-6v-3h1v-2l2-1,1-3h2l1-2h3v-1l12-1v1h3v1h2v1h4v1h4v-1c7.316-2.7,7.22-4.174,7-14q-0.5-4.5-1-9h8v2c3.137,0.56,4.19.974,5,4h2c0.825,3.2,1.179,2.9,5,3v-1l14-2v-1h4v-1h3v-1h3q0.5-1,1-2h3q0.5-1,1-2h10l1,2h3v1l4,1v1h6v1l32-4a10.074,10.074,0,0,0,2,2v6h1v4h1v4h1v3h1l1,4h1v2l3,2v2l2,1v1h2l2,3h2v1l4,1v1c3.753,1.659,4.293-.5,7,3h1v5c-1.06,1.034-2.866,5.175-2,8h1v3h1v3l2,1,1,4,2,1c3.135,4.967,3.789,10,4,18l-4,7h-2l-2,3h-2l-7,5-3,9h-1v2h-1v3A83.078,83.078,0,0,0,314,398Z" />

        </a>
        <?php
        $kdwil = '95.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Memberamo_tengah_06" data-name="Kab Memberamo tengah 06" class="cls-3" d="M386,39l-1,3h-8V41c-3.855-1.089-8.373.592-11,1a16.441,16.441,0,0,0,1,10c9.225-1.894,20.633-1.022,27,3v1l3,1,1,2h2l3,4c2.721,1.98,4.008,1.127,5,5h1q0.5,3.5,1,7c-2.363,1.933-3.255,4.4-5,7l-2,1v2c-3.562,6.416-5.29,13.551-5,24,0.062,2.233,1.027,3.073,1,4h-1v4h1c1.709-1.97,2.42-.865,4-2l1-2h1q2.5-7,5-14l6-5h3V93c2.508-.866,4.994.291,7-1l10-11,6-2c7.7-4.112,12.88-7.933,25-8,2.809,3.128,6.715,3.1,8,8h1v6l-3,1c-1.354,1.587-2.169,1.737-5,2v2c3.054,0.008,11.208,2.627,12,4v2h1v6c2.066,0.336,2,1,2,1h7v1l4,1v13h-1v2h-1q-0.5,4-1,8c2.663,1.412,4.22,2.03,9,2v-1c1.3-.716,6.519.716,7,1l1,2,4,1v1h4c3.164-6.851,12.591-10.63,22-11a7.486,7.486,0,0,0,2,3,39.688,39.688,0,0,0-1,8,21.9,21.9,0,0,1,5,4h8q0.5-1,1-2c2.7-1.6,4.914-1.83,9-2,0.714,1.4,2.808,2.635,3,3,2.3,4.392-2.3,7.068,5,8,1.536-3.768,5.076-11.919,9-13,1.459-1.428,6.236-2.153,10-1v1h5v1h9l10,3,7,8c0.143,4.729-.139,5.472-2,8q0.5,1,1,2h-3c-0.579-.416-0.147-1.634-2-1v1h-1v3h-1v1h-3q-0.5-1.5-1-3c-1.135.844-.145-0.127-1,1l-4,3v2l-2,1v3h-1v6h1q-0.5,7-1,14h-1v3l-2,1v2l-8,6h-3v1c-2.522.863-4.981-.287-7,1l-3,4h-2l-6,8v2h-1v2h-1q-1,5-2,10c-1.083,2.991-7.979,17.017-10,18h-8v-1h-1v1h-1c1.714,3.659,3.7,4.636,4,10h-1v2l-3,2v1h-9v-1l-5-1v-1h-2q-0.5-1-1-2c-1.811-1.181-11.5-4.973-15-4-3.939,1.094-17.487,6.478-24,4l-7-6v2c4.673,3.833,5.1,11.3,5,20-2.442,1.542-.62,1.209-2,3h-1l-1,2h-2l-2,3h-2l-1,2-6,2-1,2h-2v1h-2v1h-3v1h-2v1l-16,5c-1.584,6.552-13.336,12.538-22,9v-1l-4-1-1-2h-2l-1-2-4-1v-1h-6v-1h-1c-0.6-1.192-1.718-1.529-2-2v-2h-1c-2.706-7.133,4.208-16.612-4-19-1.3-1.111-7.185-1.805-10-1-4.462,1.276-19.93,5.245-27,3v-1h-3v-1h-3v-1h-3v-1h-2v-1l-6-1v-1h-2v-1l-7-1v-1l-9-1v1h-4v-1h-2q-2.5-4-5-8h-3c-1.756,3.262-3.989,5.794-9,6-1.138-.853-5.3-0.126-9,0v-3l2-1v-1h-1v-3h-1c-2.032-6.845,5.945-14.994,10-16,1.662-1.65,9.791-3.188,14-2v1c4.049,1.136,9.22-.527,12-1l2-3h1v-2h1q0.5-3,1-6l2-1,1-3h1v-3h1v-2l2-1v-2h1c1.685-3.171,1.891-6.351,2-11-1.218-.981-1.975-3.234-3-4h-2l-2-3h-1q-0.5-4-1-8h-1v-3h-1v-3h-1v-3h-1v-4h-1c-1.4-4.693,1.136-10.462-1-14l-2-1-1-3h-2l-3-4h-2l-1-2h-2l-1-2h-2l-1-2-3-1-3-4h-2l-1-2h-1v-2l-4-3v-2q-2.5-4-5-8l-4-1v-1l-6-2v-1h-3v-1h-4v-1h-4v-1h-3l-2-3-2-1V98h1V95h1V94l-4-1V90h6c2.015-3.555,3.975-4.868,5-10h1c0.069,4.535,1.151,6.343,4,8,3.626,3.767,12.316,3.121,18,2l2-3h1c1.41-2.131,2.053-5.468,3-8h1c0.128-1.073-2-2.725-1-5l2-1V71h1l3-4h2l1-2,9-3V61h7V60c-2.156-1.822-2.294-4.661-4-7-2.513-3.446-5.138-.453-6-7,1.139-1.139.4,0,1-2a19.164,19.164,0,0,1,7-1c1.828,1.772,6.225,2.037,10,2,1.32-2.414,3.648-3.151,5-5V38c2.7-3.65,7.642-3.155,14-3,4.917,4.024,10.267-6.4,18-3l1,2C375.839,36.393,380.242,38.731,386,39Z" />

        </a>
        <?php
        $kdwil = '95.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Nduga_05" data-name="Kab Nduga 05" class="cls-4" d="M2,542v2H0c0.565-2.828,2.2-4.77,3-7l1-13H5l1-12,2-1v-2l4-3v-5H11c-0.9-3.461.561-6.651,1-9l5-1v-4H16v-2l-2-1c-0.715-1.395-1.928-11.406-1-14h1l2-6c1.305-2.392,5.181-4.3,4-9H19v-5l-2-1c-1.359-1.736-1.665-3.147-2-6,2.212-1.192,2.988-2.33,6-3,0.915-3.515,2.433-2.853,3-7-4.4-2.423-5.177-5.866-5-13h1v-3h1c1.632-2.075,1.929-3.2,5-4,2.854-2.65,15.31-2.187,20-3l1-3h1v-5H47c-1.036-3.87.533-8.364,1-11h2c1.963-3.024,1.1-.533,3-2l1-2h1v-2c1.362-2.33,3.219-3.943,4-7,3.523-.692,5.422-2.661,8-4h2v-1h3v-1h3v-1h3v-1l7-1v-1h5v-1l12-1h9v-1h6c2.223-.748,4.213-2.363,7-3,0.607-1.21,1.7-1.5,2-2v-2h1v-4a11.821,11.821,0,0,1,5-6v-1h3v-1h3v-1h8v-1h5v1h6v1h3v1l4,1v1h2l2,3,3,1v2l3,2v2l2,1c2.3,3.365.674,4.207,6,5,5.529-10.133,22.219-7.285,33-4h6l34,9v1h2v1l6,1v1l4,1v1h3v1l6,2v1l4,1,1,2h2v1h3v1l4,1v1h3c9.713,3.934,22.951,3.159,23,17-2.227,2.041-1.666,4.16-3,7h-1v3h-1v4h-1v4h-1v5c-2.186,7.133-2.822,16.864-5,24v5h-1l-3,13h-1q0.5,3,1,6h1v8l-3,2v1h-2l-1,2h-2c-0.762.588-.774,2.014-2,3a10.6,10.6,0,0,1,1,4l3,2v2l5,4,1,2h2l2,3c2.01,1.285,10.895,3.154,15,2v-1c3.025-.846,7.5.584,9,1,6.274,1.735,12.666-1.165,17-2l1-3h1V487h1c0.642-1.763.433-2.605,1-4,5.239-2.105,10.152-3,18-3l3,4h1q0.5,2.5,1,5h1q0.5,10.5,1,21h1v3h1v3l2,1v2l8,7v2h1c1.77,4.827-4.318,13.653-6,16l-5,4v2h-1c-0.961,1.237-.716,1.938-2,3v9h1v2l2,1c1.99,3.059,5.929,11.56,4,18h-1v4h-1v3h-1v3h-1l-1,4h-1v3l-2,1c-1.049,1.812-.9,4.194-1,7h1v1h3v1c-4.967,4.621-2,11.877-12,12a15.682,15.682,0,0,1-1-6h1v-7c-6.026-2.233-17.237-1.051-25-1-1.465-1.28-8.943-1.86-12-1v1l-34,1v-1l-6-1-2-3-10-1v1h-3v1h-2v1l-9,1v1h-6v-1l-7-1q-0.5-1-1-2h-2q-0.5-1-1-2l-5-1v-1c-1.854-.466-9.541,2.322-11,3v1h-3v1h-1v-1h-3v-1h-3v-1l-5,1-1,3h-1v4h-1v5c-0.124.311-3.861,5.931-4,6h-6c-1.139-1.139,0-.4-2-1-0.954-1.912-3.28-4.1-4-6v-6h-1q-0.5-3-1-6h-1l-1-4h-1v-3l-2-1-1-3h-2c-2.075-1.878-9.482-.914-12,0v1l-15,2v1h-3v1l-6,2v1h-2v1h-3v1l-6,2v-1c-8.267-5.048-16.085-21.127-20-31-3.42-8.625-1.245-18.4-13-19v-1l-11,1v1H91l-2,3H87l-2,3c-3.3,3.121-6.525,3.8-13,4l-6-5v-1H63c-2.281,2.682-14.279,6.194-21,4l-17-9-2-3H21v-1H19l-1-2-6-2-1-2H9v-1C6.19,539.993,3.969,541.684,2,542Z" />

        </a>
        <?php
        $kdwil = '95.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Pegunungan_Bintang_04" data-name="Kab Pegunungan Bintang 04" class="cls-5" d="M1019,377l6,1,3-4h1v-7c2.13-6.107,6.48-6.217,15-6,2.07-5.105,3.37-8.145,11-8v1h6c0.03-12.576-8.75-13.316-11-23,2.73-1.584,2.45-2.742,7-3,2.34,3.868,3.25,1.906,6,4,0.33,1,.67,2,1,3,0.67,0.333,1.33.667,2,1v2h1c0.33,0.667.67,1.333,1,2,1.6,1.139,2.29.024,4,2l17-1c5.49,0,6.28,1.5,11,0h4v-1h3v-1h2v-1h2c0.33-.667.67-1.333,1-2h2c0.33-.667.67-1.333,1-2,6.32-4.218,12.53-8.04,23-8h6v1h2v1c6.64,2.311,17.73-3.259,21-1,4.43,2.867.91,3.825,3,8h1c1.33,1.666,2.67,3.333,4,5h5v1h1v5c-2.21,2.55-1,19.8-1,25v70h-1c-1.37,4.929-.01,25.382,1,29v24q0.495,6.5,1,13h-1v6c-0.86,2.336-4.72,5.071-3,10h1c0.67,2,1.33,4,2,6h1c1.09,3.164-1.36,4.762-1,7h1v17c-2.86,10.213-1,28.737-1,41q0.495,37.5,1,75h-1v82c0,7.593,1.6,24.307-1,27v1h-5a5.748,5.748,0,0,0-6-2v1l-8,1v1c-5.94,1.733-13.1-1.128-18,1v1l-4,1v1h-2c-0.33.667-.67,1.333-1,2h-2c-1.33,1.666-2.67,3.333-4,5h-2v1h-2v1h-4v1h-8c-10.75,3.048-27.7.007-38,3h-6v1h-4v1h-3v1h-3v1h-2v1l-4,1v1h-3c-2.22.878-6.53,3.429-11,2v-1c-1.67-.333-3.33-0.667-5-1-0.33-.667-0.67-1.333-1-2h-7v1l-10-1v-1l-6-1v-1h-2v-1l-6-2v-1h-3v-1h-3v-1h-3v-1h-3v-1h-7c-7.64-.027-14.635.361-20-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1l-6-2v-1l-10-3q-0.5-1-1-2h-2q-0.5-1-1-2h-2l-3-4h-2q-0.5-1-1-2c-2.84-1.9-8.013-4.524-12-5q-0.5-1.5-1-3h1q0.5-5,1-10h-1v-4h-1v-2h-1v-3h-1c-1.912-3.655-2.544-6.867-7-8v-1h-8c-4.079-1.212-17.048-5.259-24-3v1h-3v1h-2q-0.5,1-1,2h-6c-2.106-2.417-4.9-3.5-8-5v-1a1.486,1.486,0,0,0-2,1h-1v-5c2.128-1.212,2.177-2.253,5-3a41.482,41.482,0,0,1,5-11l2-1v-2h1v-5h1c1.531-5.3-.284-19.442-2-22l-10-8-5-7c0-6.709.738-10.631,3-15h1v-2h1q0.5-6,1-12h1V618h1V608h1v-9h1v-9h1V579c0.988-3.513,2.348-23.173,1-28h-1q-0.5-7-1-14c-3.894-13.327-4-30.994-4-48,0-9.21-1.1-21.5,1-29V430h1q-0.5-31.5-1-63h-1v-6c-0.871-2.843-4.337-8.459-3-13,2.99-10.154,12.6-14.382,13-27-1.44-1.384-7.318-11.158-6-15h1q1-3,2-6h1v-3h1q1-7.5,2-15h1q1-3,2-6h1c1.256-3.928-2.153-6.046-3-8v-3h-1v-3h-1v-3h-1v-4h-1c-1.755-5.929,1.679-19.164,2-25,3.851-2.24,3.142-3.039,10-3,1.922,1.713,6.861,1.123,9,0v-1h2l7-8h5v-1h5v-1h7v-1h6v-1l8,1a3.982,3.982,0,0,0,2,2q-0.5,3-1,6h1v3h1c2.136,5.3,2.1,11.51,8,13,3.947,4.422,18.388,1.311,23,0l10,1,4,8,3,23h1v3h1v4h1v2h1v3h1c1.1,3.636-1.4,6.932-2,9q0.5,6.5,1,13h1q1,3,2,6h1v2l3,2v2l5,4v2l5,4q0.5,2,1,4h1q0.5,2,1,4h1q1,4.5,2,9h1q0.5,3,1,6h1v2h1v3l2,1v2c2.33,1.666,4.67,3.333,7,5h3v1h2v1h2v1a21.257,21.257,0,0,1,5,6v2h1C1018.33,375,1018.67,376,1019,377Z" />

        </a>
        <?php
        $kdwil = '95.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Tolikara_03" data-name="Kab Tolikara 03" class="cls-6" d="M124,75q0.5-3,1-6l2-1V66h1l1-2h2l2-3,4-1V59l3-1,1-2h2V55l4-3V50l3-2c6.9-6.98,11.937-10.086,26-10v1h3l2,3,3,1v2l3,2v2l2,1,3,4h2l1,2h2v1h2v1h3v1h3v1h4v1l7,1V61l5-1,1-2c1.915-1.557,3.613-1.787,7-2,2.271,2.672,3.741,1.811,4,7l-3,1v2c6.778,3.125,13.9,12.082,17,19,3.1-1.643,1.8-1.9,7-2,1.439,2.465,3.138,2.788,4,6l10,3c-0.25,4.244-4.058,9.945-3,13,1.567,4.522,8.425,5.484,13,7h4v1l6,2v1l4,1,5,6v2h1v2l10,11h2l2,3h2l1,2h2l12,10c3.444,5.149-.067,11.5,2,18h1q0.5,3,1,6h1v2h1v4h1v6h1l1,2h2l5,6c0.243,9.035-3.064,12.553-6,18l-2,6-2,1v2h-1v3h-1v3l-5,4v1h-4c-3.929,3.26-13.688-2.33-20,0v1h-2l-6,5v2l-2,1v6c1.587,1.354,1.737,2.169,2,5-3.122,1.817-3.387,2.982-9,3-3.666,3.174-24.853,2.164-29,0l-1-2h-2v-1l-5-1v1h-3v1l-6,2v1h-2v1l-26,5-3-4h-2l-3-4-4-1v-1l-4,1v-1a4.575,4.575,0,0,1-2-2c-2.054-2.283-1.489-7.132-3-10-4.342-8.24-10.346-10.163-21-12,0.145-5.41,1.519-8.265,0-13v-4h-1v-2h-1v-3l-2-1v-2l-2-1v-2h-1q-0.5-2-1-4h-1V182h1q1-14.5,2-29l-3-2v-1h-3c-1.053-.449-6.593-3.238-7-4-2.218-4.151,2.5-5.988-4-8-3.354-2.854-11.149.566-16-1v-1h-3v-1h-2v-1h-2q-0.5-1-1-2h-2l-2-3h-2q-0.5-1-1-2l-3-2v-1h-2v-1a8.047,8.047,0,0,0-4-2c-1.054-5.984-.535-9.59,1-15V84h-1V80h-1q-0.5-2-1-4h-1V74l-2-1V71l-3-2c-2.763-2.849-3.148-5.17-5-9H94c-3.3-7.586-2.25-22.284,0-30V24h1l1-4,3-1,1-2,8-1V15h8c7.243-2.149,15.344-2.078,17-10h1c1.682,16.445,21.531,14.383,23,27L144,43l-3,4h-2l-1,2-7,1v1h-3l-1,2c-4.648,4.526-7.069,11.666-7,21h1v1h3Z" />

        </a>
        <?php
        $kdwil = '95.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Yalimo_02" data-name="Kab Yalimo 02" class="cls-7" d="M612,151h6v2c5.31,0.786,7.084,1.616,7,8h-1v1h1v1h5c2.311,1.318,2.077,5.233,2,9-1.064,1.17-1.767,6.346-1,9a118.04,118.04,0,0,1,5,32c2.013,1.068,4.078,2.908,6,4h2q0.5,1,1,2h2q0.5,1,1,2h2l2,3h2q0.5,1,1,2c2.236,1.892,4.083,2.713,8,3v-1h1a41.139,41.139,0,0,1,3-12l3-1v-1h3v-1h4c4.668-1.623,11.69-2.939,13-8,3.672-3.264,4.862-19.834,5-27-5.619-1.332-7.662-8.286-7-13,4.753,1,5.463,3.593,11,4,1.417-2.51,2.05-2.866,6-3v6h5l7-11h8c1.139,1.139,0,.4,2,1,1.3,7-.721,7.758-1,15,1.17,0.6,1.534,1.719,2,2h2v1l9,1v1h4v1h3v1h3v1h3v1l6,1,3,4h1v2l3,2v2l8,7c2.621-.69,3.216-1.585,5-3v-1h2v-1c2.174-1.149,4.247.022,7-1v-1h2v-1h7c1.139,1.139,0,.4,2,1-0.461,5.149-3.02,5.677-5,9,4.845,1.033,4.735,3.8,9,5,0.667,2.6,1.579,3.255,3,5h1c2.229,3.18,4.105,8.675,5,13l6-1a34.218,34.218,0,0,1,1-8c1.266-.632,1.428-1.638,2-2,4.792-3.03,8.513-.909,10-8h3v1c2.017,1.735.829,2.209,2,4l2,1q0.5,1.5,1,3l17,8v1h-1c-3.8,6.419-12.934,7.763-21,10l-15-1v1h-3l-2,3c-2.884,2.515-5.705,3.834-11,4v-1h-2l-2-3h-1v-2l-2-1v-2h-1v-2l-3-2v-1h-2q-0.5-1-1-2h-3c-3.376-1.328-18.137-4.875-24-3v1l-5,1-5,6h-1q-0.5,2-1,4l-13,12h-2q-0.5,1-1,2h-2q-0.5,1-1,2h-2l-2,3-6,2c0.125,8.526-2.906,12.784-7,17l-3,2v2l-2,1v2h-1v2h-1v3h-1v2h-1v2l-5,4c-4.58,4.59-11.469,11.707-14,18q-0.5,5-1,10h-1q-0.5,2-1,4l-3,2v2l-3,2v2h-1l-3,9h-3c-1.745-2.014-2.156-.827-4-2q-0.5-1-1-2h-2v-1c-6.049-2.25-15.085,2.881-19,4h-7v-1c-3.185-.895-13.094-0.889-16,0v1l-8,1v1h-3v1h-3v1c-5.9,1.865-16.454-.976-20-2H566v-1l-6-2v-1h-3v-1c-4.919-1.577-16.033.754-19,2v1h-2v1c-4.679,1.542-8.628-2.96-11-4h-3v-1h-3v-1h-4v-1H502v-1h-2l-4-5c-9.329-6.735-13.825-12.895-30-13v1h-3l-2,3h-2l-4,5c-2.925,1.9-8.126,2.009-13,2-2.142-4.012-3.01-5.328-3-12,0.167-.088,6-4,6-4v-2h1c0-.007-2.59-6.076-3-7h-1V290l13-4v-1h2v-1h3v-1l6-2v-1l4-1v-1l3-1,1-2c4.681-3.144,9.349-3.763,10-11h1l-3-10-2-1v-2h-1v-6a10.6,10.6,0,0,1,4-1c1.16,2.14,2.859,4.857,5,6h2v1c8.507,3.08,19.484-6.367,28-4v1h5v1h2v1l4,1q0.5,1,1,2h2v1c3.176,1.72,6.038,1.992,11,2q0.5-1.5,1-3l2-1c-0.007-1.919-3.486-4.649-4-6v-5a15.682,15.682,0,0,1,6-1v1h4l2-3h1v-2h1v-2l2-1q0.5-2,1-4h1v-3h1v-3h1v-3h1v-3h1v-3h1v-3h1v-2h1v-2l3-2v-2l3-1,4-5,7-1c5.021-1.789,10.62-5.537,13-10,1.2-2.251,3.087-10.973,2-15h-1v-7h1v-3h1v-2h1c2.488-4.365,2.142-5.832,9-6v2c1.139-1.139.4,0,1-2C612.139,151.861,611.4,153,612,151Z" />

        </a>
        <?php
        $kdwil = '95.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Yahukimo_01" data-name="Kab Yahukimo 01" class="cls-8" d="M861,227v3c-2.762.723-2.237,0.279-3,3-2.79,3.129-.69,8.274-2,13h-1v6h1v5h1v3h1v3h1q0.5,2,1,4h1v3h1v9l-2,1v2h-1v3h-1v3h-1v6h-1v5h-1v3h-1v3l-2,1c-2.327,5.776,8.28,11.762,5,22h-1q-0.5,2.5-1,5l-2,1v2l-2,1v2l-2,1v2l-2,1q-0.5,2-1,4h-1c-1.261,3.531,2.275,14.449,3,17v35h1v3q-0.5,33-1,66c-1.863,6.653-1,17.677-1,26v11h1v13h1v9h1v7h1v6h1v7h1v10c0,8.32.867,19.351-1,26v11h-1v9h-1v9h-1v10h-1v13h-1q-0.5,5-1,10h-1v2h-1l-3,11c1.986,1.729.845,2.327,2,4l5,4q0.5,1,1,2h2l7,8c0.1,7.832,1.429,22.15-1,28h-1v2l-2,1v2l-2,1v2h-1v2h-1v3h-1c-2.54,3.211-3.174.86-4,6l-4,1v1l-10,1v1l-4,1v1h-3v1h-4v-1l-12-2-24,1v-1H772v1l-4,1v1l-5,1v1c-5.109,1.808-21.708-.727-26-1l-7,1c-12.548.555-26.15-.68-36,2-2.541.691-11.911-1.308-14-2v-1l-6,1a7.705,7.705,0,0,1-2,4h-1v2l-3,2v2l-2,1-4,6h-1c-0.574-2.01.12-.865-1-2v-1h1v-3l2-1v-2h1v-2c1.952-2.91,3.206-.423,4-6-3.983-2.191-3.306-2.969-10-3a9.11,9.11,0,0,1-6,5v-2l-3-2v-2l-4-3v-1h-2l-2-3h-2q-0.5-1-1-2l-4-1q-0.5-1-1-2l-5-1v-1h-2v-1l-6-1v-1c-7.819-2.766-24.139-.991-34-1h-9v-1H565c-4.956-1.4-13.45-1-20-1-13.357,0-29.737-1.019-40,2-4.563,1.342-15.959-1.14-19-2H470v-1h-9v-1h-8v-1h-9v-1H434v-1H421l-27-9c-1.663-7.188-3.108-9.478,0-17,1.158-.6,1.548-1.729,2-2h2v-1l17,1v-1h5v-1h4v-1h3v-1c4.436-1.727,6.729,1.027,8-2-3.228-3.446,1-7.43,3-9v-1h3v-1l4-1c-0.723-2.762-.279-2.237-3-3-3.632-4.164-18.148-5.93-26-6-1.643-3.1-1.9-1.8-2-7h1q0.5-2.5,1-5h1v-3h1v-3h1l1-2h2v-1l5-4v-3l-12,1v-1l-4-1-5-6-4-1-1-2h-2l-1-2h-2v-1h-2v-1h-3c-3.347-1.554-2.576-3.312-8-4-1.95,4.259-4.424,4.9-7,8l-4-1a22.176,22.176,0,0,0-1-4h1q0.5-2.5,1-5h1v-2h1q0.5-2.5,1-5h1v-2h1q0.5-3,1-6h1c1.433-4.421-.66-15.9-2-18l-3-2-1-4h-1v-7c2.138-1.846,2.319-4.623,4-7l5-4,1-3,2-1v-2h1v-2h1c1.286-3.324.194-4.871,0-8h-1v-2h-1l-1-2h-2l-6-8v-3h-1v-3h-1v-8c-0.111-4.391-1.52-17.465-4-19h-2c-3.8-3.964-12.135-.083-17,1-2.216-10.658-14.262-27.255-9-41h1v-2h1v-2l6-8,4-3v-3h1c1.729-3.39.919-4.872,5-6v-1h7c2.05,3.591,8.174,9.224,12,11h3l1,2h2l2,3h8c1.991-1.729,5.343-.916,8-2v-1h3v-1c2.814-2.254.174-.017,2-3h1v-2h1l2-3h2v-1h4v-1l13,1v-1h2l6-8,15-2c4.548-1.417,10.538-3.576,15-5h5v-1h7v-1l19,1v1c3.4,0.948,11.063.27,13-1,4.114-2.7,3.082-11.195,3-18h1c0.96-1.683-.761-5.865-1-7-1.135.844-.145-0.127-1,1-2.78,2.272-.584,2.721-6,3,0.87-8.444,1.491-14.534-1-22v-4h-1l-1-4h-1v-2l-2-1v-2l-2-1v-6c1.139-1.139.4,0,1-2,6.473-1.153,15.248-1.5,21,1v1h2v1l4,1v1h3v1c3.125,0.775,8.861-3.3,11-4h6c0.28-.065.312-1.272,2-1v1h6v1h3v1l4,1v1h3v1h20v1h5v1c8.523,2.456,18.194-2.307,23-4l9-1v-1l14,1a2.626,2.626,0,0,0,3,1v-1h6c3.657-1.186,7.612-4.319,14-3,3.514,0.725,6.752,6.137,10,4h1q0.5-2.5,1-5h1v-2h1v-2l3-2v-2l3-2q0.5-2.5,1-5h1v-6h1q0.5-2.5,1-5c3.159-6.078,8.333-11.322,13-16l5-4q0.5-2.5,1-5h1v-3l2-1v-2l2-1v-2l6-5v-2l2-1q0.5-2.5,1-5h1v-6h1c1.763-1.989,1.962-.842,4-2v-1h2l2-3h2q0.5-1,1-2h2v-1l3-1q0.5-1,1-2h2l7-8,2-1q0.5-2,1-4l6-5q0.5-1,1-2c1.672-1.156,2.281,0,4-2,9.049-.144,22.274-0.07,28,3q0.5,1,1,2h2l5,6v2l2,1v2c0.724,1,3.042,1.795,4,3,8.08-.149,9.534-4.355,15-7v-1h22v-1h4v-1l6-2v-1h2l3-4h7Z" />
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
                url: "ambil_papuagun_kiri.php",
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
                url: "ambil_papuagun_kanan.php",
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