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
            </style>
            <filter id="filter" x="476" y="382" width="163" height="127" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="643" y="161" width="247" height="315" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="426" y="263" width="233" height="231" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="362" y="340" width="150" height="136" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="292" y="220" width="200" height="148" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="376" y="53" width="280" height="261" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="549" y="36" width="255" height="263" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="564" y="364" width="136" height="160" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="441" y="457" width="168" height="127" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="587" y="266" width="95" height="136" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="315" y="327" width="103" height="110" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="475" y="260" width="114" height="77" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="224" y="147" width="223" height="142" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="639" y="238" width="50" height="46" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="396" y="420" width="58" height="55" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="338" y="281" width="43" height="51" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="559" y="316" width="46" height="48" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_18" data-name="Color Fill 18" class="cls-1" width="1043" height="657" />

        <?php
        $kdwil = '16.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_17" data-name="Color Fill 17" class="cls-2" d="M618,389h5q0.5,2,1,4h1v-1c0.92-.142,5.884,1.774,8,2v6c-7.9,3.533-6.489,7.664-8,17l-3,1v1h-5l-4,5c-1.731.8-1.553-.689-2-1l-2,1a10.6,10.6,0,0,0-1,4h-3v1l-4-1v1h-1v3h-1c-1.964,3.793-1.245,5.762-6,7,0.19,1.014.61,8.065,1,9l2,1v6h1v2h-1v2c-2.407,3.569-6.355-2.635-7,7-6.558.236-4.541,1.231-9-1q-1,10-2,20l-7,5-2,3-9,3-2,3h-5v1a8.452,8.452,0,0,1-6,1v-1h-5v1c-1.661,1.079-1.666,1.371-4,2-0.945-1.8-1.385-1.574-2-4h-2l-4-5h-1c-0.766-1.113-.835-4.333-2-5h-7v-1c-2.224-2.67.219-8.026-1-12h-1v-4h-1v-2h-1v-2l-3-2v-2h-1c-0.962-1.242-.708-1.941-2-3-2.234,2.586-6.144,2.982-9,5l-6,7-13,1c-0.269-6.11-1.166-6.54,0-13h2v1h1l2-3c2.37-1.494,4.5-1.766,8-2V442c1.135-.844.145,0.127,1-1h7l1-3,2,1v-1c0.676-.737.834-0.448,0-1v-1h2l2-3,4-1q0.5-1,1-2h1v-2c1.406,0.155-.089.1,1,1a6.749,6.749,0,0,0,4-5c2.393-.607,1.858-0.318,3-2,1.433-1.478,1.917-5.053,2-8h1v1c1.619,0.086,1.2-1.694,2-2h1v1l3-2q0.5-1,1-2h5c1.139,1.139,0,.4,2,1v1h-1c0.64,2.128,1.453,1.711,4,2,2.772-2.513,5.911-.782,10-2v-1l2,1q0.5-1,1-2c2.17-.854,2.645.81,3,1h1v-1h3v-1h3l2-3,4-1v-1a8.068,8.068,0,0,1,4-2v-3c3.776-2.252,3.494-5.846,7-8v-1h1c2.782,2.1,3-3.341,7-2,0.749,0.251.085,2.55,3,2v-1h3v-1h1v1h5v1h1v-1h1l2,3,4-1v-1l3,1v-1l3,1v-2Z" />
        </a>

        <?php
        $kdwil = '16.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_16" data-name="Color Fill 16" class="cls-3" d="M808,178h-2q0.5,1,1,2h-2q0.5,1,1,2l-2,1q0.5,1,1,2h-1v2h-1c-1.989,5.518,2.693,9.833,1,13h2v1h-1c-0.513,1.318.386,0.485,1,1,1.309,1.1.83,0.327,0,2h2q-0.5,1-1,2h1l4,5,2-1v2l2-1v2h6v1l10-1v1c1.481,0.759,1.68.714,4,1-0.373,2.585-1.1,6.088,0,10h1c0.713,2.483-.972,3.705-1,5,0,0,1.316.876,1,2h-1v2h-1v6h1q-0.5,1-1,2h1q-0.5,2-1,4l2,1c1.316,1.773.586,1.178,0,3,0.924,1.006,2.17.774,3,2h1q-0.5,1-1,2h1v-1c1.435,0.715.938,2.061,2,3l2-1,3,5,2-1q0.5,1,1,2c2.461,0.7,2.021-1.4,3-2h1v1l3-1a1.494,1.494,0,0,0,2,1q0.5-1,1-2c2.651-1.346,2.3-.232,5,0v1h-1c-1.142,1.581,2.458.931,3,1v-1c1.648,0.247,1.05,1.385,2,2l2-1v2l3-1q0.5,2,1,4h2c-0.4,1.758-.931,1.986,0,5h1q-0.5,1.5-1,3h1v5h-1q0.5,1,1,2h-1c-0.613,2.225.689,2.881-1,4v1h2q-0.5,1-1,2h2q-0.5,1-1,2l2,1q-0.5,1-1,2h2v1h-1c0.648,1.515,1.447,1.217,2,2q-0.5,1-1,2h1v2h1v1h-1c-0.165,2.09,1,2,1,2q-0.5,1-1,2h1c-1.071,1.249-1.776,1.047-3,2v1h-2q-0.5,1.5-1,3c-1.414.021,0.077-.084-1-1-1.365.644-1.052,1.243-2,2l-2-1v2l-2-1q-0.5,1-1,2h-1v2c-1.388,1.627-2.433-.606-3,0q-0.5,1.5-1,3l-2-1-5,6h-1q0.5,1.5,1,3h-2c-1.083,1.087.183,2.807,0,3h-2q0.5,1,1,2h-2q-0.5,1-1,2l-3,1q0.5,1,1,2l-2,1q0.5,1,1,2h-2v1h1q-1,2-2,4h-1q0.5,1,1,2h-2q0.5,1,1,2h-2q0.5,1,1,2h-1v4l-2,1q0.5,1,1,2h-2q0.5,1.5,1,3h-1v2h-1q0.5,1.5,1,3h-1v12h1q-0.5,1-1,2l3,2q-0.5,1-1,2l2,1v3h1c1.459-2.051,1.655-2.261,4-1v-1c1.763,1.251.725,2.51,3,1v2h1c0.954,1.015.61,1.272,2,2v-1h1v2l3,1v1h-1l2,3h2c0.748,1.2-.769.565-1,1-0.88,1.66,1.358.866,2,1-0.059,2.578-.169,3.484-1,5h-1c-0.081,1.412.169-.144,1,1q-1,2-2,4h-1q0.5,1,1,2h-2v1h1v1h-2q0.5,1,1,2h-2q0.5,1,1,2l-3,1v1h1c-1.4,2.521-1.4.67-3,2v1h1c-1.136,1.1-.006.412-2,1-0.277,1.913-1,2-1,2q0.5,1,1,2h-2q0.5,1,1,2h-2q0.5,1,1,2l-2,1v1h1c-0.3,1.381-.589-0.353-1,1v5l-2,1q0.5,1.5,1,3l-2,1v1h1q-0.5,5-1,10h-3c-0.657-1.288-1.287-1.083-2-2q0.5-1,1-2h-2q0.5-1,1-2h-1v-1c-3.61.956-1.883,0.945-5-1v-1h-1v1h-1c-1.075,2,1.423,3.108,1,4-0.739,1.558-2.556-.2-3,0v2c-1.4.28-2.493-2.765-3-3h-3v2l-2-1a10.6,10.6,0,0,1-1-4h2v-2h-2v1l-3-1q0.5-1,1-2h-1c0.111-1.41-.314-0.478,1-1-1.1-1.447-.012-0.322-2-1-0.593.88-.911,2.739-3,2v-1c-2.01-.574-0.865.12-2-1h1v-3h1v1c1.529-.376,1.218-0.936,2-2-1.135-.844-0.145.127-1-1h-1v1h-1v-1l-3,1v-2h-1v1h-1v1h1v1h-4v-1h1v-1h-1c-1.889-.86,2-1,2-1v-2h1q-0.5-1-1-2h1c1.139-1.139,0-.4,2-1-1.106-4.1-1.517-1.273-3-3v-1h1q-0.5-1.5-1-3a1.9,1.9,0,0,0-3,0v-4h1c1.139,1.139,0,.4,2,1v-2a3.978,3.978,0,0,1-2-2c-1.8.944-1.575,1.385-4,2a3.982,3.982,0,0,0-2-2v-1h1q-0.5-1.5-1-3l2,1c-0.818-1.275-.934-2.742-2-1h-1c-1.91-2.032,1.11-1.946-3-3v1h1q-0.5,1-1,2c-2.813-1.522-3.844-2.621-4-7h2v-3c-2.4.014-6.89-.068-8-1-1.083-.91,1-1,1-1,0.962-1.661-1.426-.842-2-1v2h-6v-3h-1v-1h1c0.387-2.545-.472-3.573-1-5l-2,1c-1.2-.686.37-1.35-1-1v1h-3v-1h-1c-0.673.58-.3,3.627-3,4v-1h-1c-0.465.885-.257,0.669-1,0h-1q0.5-1,1-2h-1q0.5-3,1-6h-2q0.5-1,1-2h-2v-2l-3,1q0.5,1,1,2l-2,1q0.5,1,1,2h-2v1h1q-0.5,1.5-1,3h1v1h-2c-0.828,1.171-.519,1.42-2,2-0.063-.146.078-1.916-1-1v1h1v4h-1c0.263,1.2,2,2,2,2,0.636,2.455-1.3,2.021-2,3q0.5,1,1,2h-2v1h1q-0.5,1-1,2l-2-1v1h-1v1h1c0.979,1.654-1.44.846-2,1v1h-1v-1h-1q-0.5-1-1-2l-3,1a1.432,1.432,0,0,0-2-1q-0.5,1.5-1,3c-1.013.987-.98-0.986-1-1-1.588-1.133-.874,1.569-1,2h-2a9.749,9.749,0,0,1-1,4,10.6,10.6,0,0,0-4-1v1h1c0.4,1.284-1.538.865-2,2h2v1h-1c-0.913,3.006-.459,3.16,0,5h-1l-2,3h-2c-1.053.944,1,1,1,1,1.035,1.622-1.486.868-2,1v2c2.762,0.723,2.237.279,3,3a7.173,7.173,0,0,1-4-1v1c-1.739,1.621-2.064,2.055-1,4h-2q0.5,1,1,2h-2v1l-2,1q0.5,2,1,4l-4,3v1l-2-1v1h1c1.889,0.859-2,1-2,1-0.929,3.45-1.3,1.867-3,4-3.8-.6-3.5-0.481-7-1v2c-1.4-.224.093-0.1-1-1-1.7.2-1.531,1.794-2,2h-2v2c-1.744-.431-2.282-1.666-4,0v2h-1v-1l-3,1q-0.5,1-1,2h-1v2l-2-1v1h-3v1h-1v-1l-5,1c-0.949.425-.037,2.535-3,2v-1c-1.334-.47.379,0.686-1,1-1.274,1.589-.993-1.98-1-2h-2v-5h1v-2h1c0.9-1.4.68-1.745,1-4h2q0.5-4,1-8l3-2v-1c1.462-.9,3.2.442,4-1q-0.5-3-1-6l3-1q0.5-1.5,1-3l3-2v-1l5-1v-1l2-1c1.126-1.553.047-2.292,2-4v-6c-6.065-.034-6.555,1.4-11,2a10.6,10.6,0,0,1-1-4c5.237-3,1.567-4.427,1-10h2c0.118-5.937.9-7.975,0-13-5.124-2.878-9.729-8.365-16-10v-7l-6-2c-0.723-2.762-.279-2.237-3-3-2.414-2.242-8.219-.217-12,0a61.118,61.118,0,0,1,1-10c0.295-1.841.34-3.5-1-4v-1h2q0.5-1,1-2h1q1-4.5,2-9l3-1q0.5-1.5,1-3c3.428,0.871,2.575,2.068,6,3l2-3h2v-1c3.213-.952,3.893,3.82,7-1h1q-0.5-1.5-1-3h-1a1.651,1.651,0,0,1,1-2q-0.5-3.5-1-7h1v-2h1a2.72,2.72,0,0,0-1-3,1.766,1.766,0,0,1,1-2c0.468-2.416-.837-2.556-1-4h1v-1l-3-2v-2h1v-9l2-1c0.756-2.6-3.811-5.47-3-8h1c1.488-2.569,1.728-1.766,2-6h-1v-1h-3v-1c2.22-1.5,2.484-4,3-7l-3-1v-1c1.135-.844.145,0.127,1-1a10.6,10.6,0,0,0,4,1v2c3.122,1.817,3.387,2.982,9,3q0.5,2,1,4l3,1q-0.5,2.5-1,5c2.414,0.322,7.654,3.311,10,2v-1a7.407,7.407,0,0,0,4-2v-1l3-1q0.5-1.5,1-3h2v-1l2-1V271h1c0.983-1.882-.609-4.193-1-5h-1q0.5-2.5,1-5h-2v-2c5.931-.5,6.895-3.274,12-4v-4l-4-1c0.007-3.106-.111-6.018,1-8l2-1q-0.5-6.5-1-13h-1c-0.214-1.6,1.708-1.246,2-2v-7h1v-1l12,4,7-1a39.688,39.688,0,0,0,1-8c-3.04-2.047-2.127-4.377-7-5v-2h5c0.734-3.919.717-4.086,0-8h4a24.348,24.348,0,0,1,3-6l3-1v-2h1q0.5-1.5,1-3h1v-1c1.529-.97,2.864.175,4-1,2.055-2.125-1.667-4.376,4-6q0.5-1.5,1-3l4,1a2.566,2.566,0,0,1,3-1v1l3,1v-1h3v-1h1c1,0.158,6.732,3.2,7,3q0.5-1.5,1-3l3,1v-2c1.259-1.312,3.427-1.048,5-2q0.5-1,1-2h7v-1h1v1h1v-2l2,1v-1c1.8-1.334,1.951-1.658,5-2v1h-1v1h1v7h-1Q807.5,176.5,808,178Z" />
        </a>

        <?php
        $kdwil = '16.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_15" data-name="Color Fill 15" class="cls-4" d="M608,270a11.878,11.878,0,0,1-1,5h14v1h3q0.5,1,1,2l6-2v-1h7q0.5,1.5,1,3c2.762-.723,2.237-0.279,3-3l7-1v-3h1c2.048,2.52,2.413.412,3,5-1.139,1.139-.4,0-1,2l-2-1q-0.5,1-1,2h-2v1l-2,1v2h-1c-2.765-4.255-7.743-2.366-13-2v-2c-1.368.836-.537,2.3-2,2v-1a16.212,16.212,0,0,0-4-1v2h-1v-1l-3,2q0.5,1.5,1,3a1.643,1.643,0,0,0-1,2h1q0.5,3,1,6h2q-0.5,1-1,2h2q-0.5,1-1,2h1v1l2,1s0.181-2.153,1-1v2a29.413,29.413,0,0,1,7,1v1h-1c-0.895,1.824.687,3.1,1,4-6,1.105-4.066.42-6,5h-1v1h1v1h-2q0.5,2.5,1,5h1q-0.5,3-1,6l-7,5v2l-3-1q0.5,1,1,2c-1.224.709-4.364,0.877-5,2v11l-5,1v1l-7-1v1h-1v-1c-5.022-1.042-9.147.864-12-2,1.293-1.062,2.033-2.615,3-4h1v-5h1v-2h1q-0.5-1-1-2h2q-0.5-1-1-2h2q0.5-1,1-2s-2,0-1-1c1.589-1.573.7,0.819,2-1-1.987-.272-1.882-0.961-2-1l-3,1v-2h-1v1c-1.205-1.131-.425.026-1-2h-2v2h-1v-1c-1.407-.139.4,0.776-1,1h-4v2a15.682,15.682,0,0,0-6-1c-1.382-2.612-1.769-1.693-2-6,4.063-3.181,4.163-5.741,4-13l-3-1q0.5-1.5,1-3h1v-2h1v-8h1v-7h1v-6h1c2.234-2.584,3.718-.908,5-5a9.733,9.733,0,0,1,4,1v-3h-3q0.5-1.5,1-3l12-1v1Zm-89,47v3c2.612-.1,3.426-0.252,5-1v1l5,3v3h1c1.317,2.328-.4,1.391,2,3v1l15,2v-7c2.652-1,6.944-1.041,11-1v-1l3,1v1l3-1v3l3,2v8l-2,1c-0.539,1.278-.326,4.035,1,4v1h-2v2h2c-0.644,2.739-1.309,2.276-2,5,1.719,1.127,1.355.633,2,3l2-1v2c0.61,0.285,2.128-1.369,4-1v1l4-1v-1h1v1h7v1h-1q0.5,1,1,2h-2c-1.764,1.071,2,1,2,1v1h5v-2l3,1c0.494,1.479,1.326,2.41,1,5a1.443,1.443,0,0,0-1,2h1c1.256,1.909,1.014,1.659,4,2v-2l2,1v-2a15.533,15.533,0,0,0,4,1c0.458-1.89.449-3.252,2-4,0.321,0.216,1.024,1.985,3,1v-1l3-2v-3h1c2.434,2.888,5.857,3.674,7,8h2c-0.9,2.238-5.544,12.218-7,13h-2v2h-1v-1c-0.353-.063-3.609,1.7-5,2v2l-3,1c0.236,4.09,1.02,5,0,8h-1v-1c-1.5-.509-3.9,1.112-4,1v-2c-3.45.929-1.867,1.3-4,3a20.676,20.676,0,0,0-5-4v1c-2.591,1.6-1.205,2.26-2,3h-1v-1h-1v2c-1.323.5,0.386-.72-1-1l-3,1q0.5,1.5,1,3h-2v1l-2,1v1h-1q0.5,1,1,2h-1q-0.5,1-1,2h-2l-2,3h-2q-0.5,1.5-1,3l-2-1q-0.5,1.5-1,3h-1v-1c-1.452.609-1.33,1.57-2,2-0.5.025-4.726-1.943-7-1q-0.5,1-1,2h-8q-0.5,1-1,2h-1v-1l-3,1v-1c-1.8-.945-1.574-1.385-4-2v-2c-3.086.728-6.028,1.9-8,4v2l-3-1c-0.571,2.033.257,0.88-1,2v-1h-1c-0.813,2.342.73,3.779,1,5l-4,3q-0.5,2-1,4l-2-1v1c-1.951,1.6-5.345,4.414-8,5v2l-2-1v1h-1l1,2h-2l-2,3c-2.679,1.85-5.349,2.012-10,2v15c-1.135.844-.145-0.127-1,1h-3v2c-3.172-1.007-4.334.033-7,2v1c-1.459.9-3.2-.443-4,1v4h2l-1,2h2l-1,2h1v1h-1v3l-2,1q-1,4.5-2,9c-3.08-.086-5.13-0.133-7-1v1c-1.139,1.139-.4,0-1,2l-6,1-1-2h-3v-1h-2l-1-2c-3.1-1.928-11.175-3.807-16-4l-1-3c-1.382.3,0.163,0.2-1,1l-6-2-1-2s2.153-.181,1-1h-2v-4c4.11-1.054,1.193-1.307,3-3l2,1v-2h1v1l3-1,1-3,2,1,1-3,2,1,1-2h2v-1l3-1c0.013-2.782,1.6-6.079,0-7h2l-1-3c2.393-.607,1.858-0.318,3-2,2.465,1.439,2.788,3.138,6,4,2.368-3.807,5.191-3.012,9-1v-1h1q0.5-2.5,1-5h1l-1-2,3-1c1.493-2.169.079-5.19,1-8h1v-4h1v-1h1v1l3-2v-2l2,1-1-3h1v-1h-1v-3l2,1,3-4,6-1c-0.082-4.6.209-7.513,2-10-0.613-2.141-1.294.224-2-1v-1h1v-3l3-2v-1h-1l1-3c-0.46-.474-1.615.273-1-1h1c1.742-2.556,4.395-3.347,6-6-1.978-1.305-3.393-4.426-4-7l3-1v1h1v-5h-3v-3l3-1a40.116,40.116,0,0,1,1-9c-2.825-.475-5.392-1.751-8,0l-1-3h-2v-1h-2l-1-2-4-1v-1l-3-1-1-2c-3.044-1.218-3.173,1.477-4,2h-2l-1,2c-2.062,1.712-4.191,1.9-8,2,0.552-5.417,1.124-3.866-1-8,2.128-1.212,2.177-2.253,5-3l-1-3h2v-1h1v1l2-1c0.675-1.823,1.24-1.218,0-3h2a1.8,1.8,0,0,0,0-3h2c0.1-7.543,1.129-7.443,0-14h1c1.127,1.719.632,1.355,3,2,0.811,3.4,2.552,4.318,6,5-0.339-3.955-.964-2.907,0-6,3.82,1.757,4.486,2.359,9,1h5v-1h2l1-2h2v-1a1.593,1.593,0,0,1,2,1C515.164,318.594,516.738,317.431,519,317Zm46,31c1.139,1.139.4,0,1,2h-1v-2Z" />
        </a>

        <?php
        $kdwil = '16.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_14" data-name="Color Fill 14" class="cls-5" d="M461,348c-0.078,3.353.007,5.72,1,8h1v5h1v1h4c-0.063-3.577.128-5.714,1-8,7.251,2.63,7.552-4.006,15-5v1h2l1,2h2v1h2l1,2a20.477,20.477,0,0,0,12,4v6a1.436,1.436,0,0,1,1,2h-1c-1.962,2.659-2.3.283-3,5h3v4h-4c0.484,4.515,2.958,6.052,4,10h-3a28.788,28.788,0,0,1-3,3c-0.716,1.736,1,3,1,3l-1,4-3,1v3h1q-1,6-2,12c-1.328.487,0.325,0.5-1,1h-5v1c-1.938,1.359-2.3,2.251-5,3v2c0.4,0.918,2.851.576,2,3h-1c-1.694,2.048-4.341,2.91-7,4l1,3h-1v1h1c-1.1,1.423,0,.349-2,1,0.041,4.534-.466,6.19-2,9h-1l-2,6c-1.361-.515-5.331-2.023-8-1-0.679.26-.293,2.785-3,2-0.195-.057-2.656-4.11-4-4v1c-2.747,1.922-1.627,2.954-3,6h-1v5l-3,1-1,2h-2l-1,2h-2l-1,2h-2l-1,2h-2v1h-2v1l-3,1c0.221-4.921,2.063-5.655,3-10,4.04-1.143,1.224-.361,3-3l2-1v-4h-1c-0.479-2.39.752-2.573,1-4h-1v-1h1c1.044-1.7,1.413-1.622,2-4l3-1,3-14a21.342,21.342,0,0,0-10,2c-2.294,6.424-1.874,7.353-11,7l-1-2c1.719-1.127,1.355-.633,2-3-1.135-.844-0.145.127-1-1l-10-2v-1a2.628,2.628,0,0,0-3,1l-3-1v1h-3l-1,2h-3v1l-3,1c0.276-2.262.113-2.614,1-4h1v-2h1v-6c-4.11-1.051-1.176-.523-3-3h-1c-1.627-2.009-2.009-3.1-2-7h1v-3l5-1a18.358,18.358,0,0,1,5-8c-0.979-4.247-2.714-5.668-4-10h-1v-1h1v-5h1v-1h-1q0.5-2.5,1-5h-1c-1.294-2.008-4.9-4.191-4-8h1v-5l3-2v-3l3-2c2.286-4.25-3.125-6.067,3-8v-1l3,1v1c1.194,0.235,1.71-1.594,4-1v1h8v1h6l1,2,5,1v1l11-1,1-2h2v-1h9ZM409,467h-3v1l-2-1v2h-1v-1l-3,1v-2h-1v2l-3-1v2h-4c-0.844-1.135.127-.145-1-1,0.166-2.579,1.555-2.2,0-4h-2l2-4c-0.124-1.409-.9.411-1-1h1v-1l-3-2c-2.084-2.31-.683,1.152-3-1v-2l-3,1v-2l-4-3v-1l-4-1-1-3-3,1-1-3-2-1v-7l8,1c-0.085-1.412-.9.411-1-1v-1h4l-1-2h1v-1l5-1v1h4v-1l10-1c2.478,3.5,3.565.244,5,5,2.075,2.224.852,4.844,2,8h1v3l2,1v2l2,1v2h1C411.785,455.789,409.354,463.312,409,467Z" />
        </a>

        <?php
        $kdwil = '16.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_13" data-name="Color Fill 13" class="cls-6" d="M450,244l-3,9h1c1.129,1.975,1.417,2.338,4,3,0.434,4.969,4.973,10.67,7,15h3q0.5,3,1,6l3,1,2,3h5a9.546,9.546,0,0,0,2,2c-0.574,2.01.12,0.865-1,2v2h3c0.317,3.543,1.314,3.949,2,7l5,1,1,4h-1v4l2,1v1h-1c-1.139,1.139,0,.4-2,1l-1,4-3,1q1,4.5,2,9h-1v1c0.751,1.272,1.914-.476,2,3v2h-1v5h-1v3h-1c-0.58,1.29.777-.136,1,1v1h-2c-1.286,2.269-1.628,2.637-5,3-0.62,4.608-.952,2.452-3,5h-1c-1.172,2.194.884,4.993,1,6l-2,1c-1.258,3.283-.086,8.538-1,11h-3c-0.445-5.069-1.913-7.86-2-14H451v1h-2l-1,2H435l-2-3h-4v-1l-16-1-3-6c-4.542,1.094-6.114,3.628-12,4-2.661-4.6-7.737-7.038-11-11l-7-1v-6c-5.2-2.6-5.262-3.2-5-11h1v-8h-4c0.574-2.01-.12-0.865,1-2a21.252,21.252,0,0,0-3-8l-3-2v-1h1l-1-3h-1v1c-0.86,1.889-1-2-1-2-7.2-.437-2.85-2.062-6-4h-2q-2.5,4-5,8l-2-1v1h1l-1,3h-1v1h1v3h-1l1,3h-1c-1.256,1.909-1.014,1.659-4,2v2c-3.8.936-5.255,4.16-6,8h-9v1h-2v1h-2v1h-2l-1,2-5-1v-1h-4l-5-6-4-1-1-2-3-1-1-2h-1v-2h-1l2-6-2-1V285h-1v-2l6-2,1-2h4v-1c1.534-.9,2.431-0.82,5-1,0.723-2.762.279-2.237,3-3v-1l3,1,1-2h2v-1h3v-1h2l3-4,5,1v-1h3c1.413,0.062-.41,1.111,1,1v-1h2l1-2c2.162-.926,6.689,1.03,7,1l1-2a1.576,1.576,0,0,1,2,1l5-1v-2a9.733,9.733,0,0,1,4,1v-2h-1v-6a12.71,12.71,0,0,1,5-1c1.139,1.139,0,.4,2,1q-1-4-2-8l13-2v-1l4-1v-1h8v-1l7-1v-9l4-1v-1l4,1v-1h2l1-2h2v-1h8v1l7-1,8,9,2,1v2l2,1,1,3C442.668,241.434,445.045,243.46,450,244Z" />
        </a>
        <?php
        $kdwil = '16.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_12" data-name="Color Fill 12" class="cls-7" d="M601,115h2q-0.5,1.5-1,3h2v1h-1q1,2,2,4h2v1h-1c0.739,1.373.985,1.049,2,2v1h2v1h-1c1.453,2.471,1.416.665,3,2v1h-1l2,3,2-1v2l2,1,3,4,2-1q0.5,1.5,1,3l3,1c0.05-.065-0.042-1.956,1-1v2c1.4,0.2.531,0.075,1-1h1v2c3.16-.113,1.874-1.955,3,1h2v-2c3.129,1.01,1.518.557,5,0v-2h5c0.644,2.739,1.309,2.276,2,5h2q-0.5,1.5-1,3h2q-0.5,1-1,2h1c0.676,1.882,1.344.707,0,2l-2,3h-1v2l-2-1-2,3h-1v2l-2-1q-0.5,1.5-1,3l-2-1q-0.5,1-1,2l-3-1v2l-2-1c-1.6.067-1.2,1.228-2,2h-1v2l-2-1v1l-4,1v2l-2-1v2c-1.255.652-.14-0.807-1-1l-5,1v1l-3-1v2a34.651,34.651,0,0,0-7-1v1l-5,1q-0.5,1-1,2c-2.329,2.173-4.535,5.066-8,6v2l-2-1a2.6,2.6,0,0,1-3,1s0.155-1-2-1v1h-1l-2-3-2,1v-2l-4-3-5-6-2,1q-0.5-1.5-1-3l-3,1v-2h-3v2h-1v-1l-4,3q0.5,1,1,2h-1v1l3,1q-0.5,1-1,2c0.761,1,2.789.391,3,2h-1v1c0.354,0.211,1.757-.195,1,1h-1c-2.272,2.78-2.721.584-3,6l4,1q0.5,1,1,2c3.191,1.255,3.205-2.39,5-2v1l4,1q0.5,1,1,2l2-1q0.5,1.5,1,3l2-1v2c1.41,0.1.455,0.194,1-1h1v2h1l-2,3c4.43,0.356,4.471,1.805,6,5h1v-1c1.661-.878.865,1.356,1,2l3-1v3l-4,3v2c-0.978,1.022-1-1-1-1-1.592-.7-1.713,1.942-2,3l3,1-7,8h-1q0.5,1,1,2h-2v1l-3,2q0.5,1,1,2h-2v1l-4,3q0.5,1,1,2h-1c-1.139,1.139,0,.4-2,1v2l2-1v2l2-1v2l2-1c1.953,2.335,2.078,5.6,2,10,1.35,2.343-2.247,2.8-1,7h1v2h1q-0.5,5-1,10c-2.7-.392-2.812-1.482-5,0v-1c-1.139-1.139-.4,0-1-2h-2a9.733,9.733,0,0,1,1-4h-1c-2.215,1.264-3.312-1.57-7-1v1a1.738,1.738,0,0,1-2-1l-5,1-2,3c-2.748,1.1-7.531-3.324-9-1v-2c-3.683.458-3.088,0.959-6,0q-0.5,1.5-1,3c-0.815.664-1.631-2.375-4,1h-1q0.5,1,1,2h-2q-1,3.5-2,7c-0.978-.394-3.849-2.035-6-1v1l-6,5v2l-3,1,1,2h-1c-1.1,3-.745,2.584,0,5h-2v1h2v1h-1a2.789,2.789,0,0,0,1,3c0.625,3.057-3.407,3.819-1,6h-2c-1.4,2.278-5.318,3.326-7,2-4.361-.883-2.926-1.378-4-4-3.822,2.408-1.162,2.6-7,3l-2-3h-1v-2h-1c-0.248-.873,2.083-2.87,1-5h-1c-2.7-3.566-1.608-.342-4-2-1.73-1.2-1.137-4.724-2-6-0.842-1.245-2.976-.009-4-1-0.3-.289,1.814-2.373,1-4l-2-1c-2.573-2.561-.164-2.166-4-1l-2-3c-1.953-1.4-1.414.436-3-2h-1q-0.5-3-1-6h-3v-1c-1.951-1.793-.849-1.907-2-4h-1v-2h-1v-2l-2-1c-1.917-3.381,1.52-3.508-4-5q-0.5-2.5-1-5h1l2-6c-4.846-.348-9.11-2.356-13-4-0.639-1.189-1.65-1.453-2-2v-2h-1v-2l-2-1c-2.274-2.427-6.048-5.544-7-9h1v-2c2.748,1.317,4.184-.657,6-3h1l-1-2,3-1q0.5-3,1-6s-2.054-.057-1-1h2c-0.113-3.16-1.955-1.874,1-3-0.113-3.16-1.955-1.874,1-3v-5h-1l1-2h-2l1-2h-1l-1-4h-1v-1c-1.663-.609-3.7,1.259-4,1v-2c-2.454-2.8-5.9-3.639-7-8,1.139-1.139.4,0,1-2-3.541.38-3.036,1.241-6,2l1,4h-1l-4,5c-2.808-1.651-3.4-4.03-7-5-1.139,1.139,0,.4-2,1a18.329,18.329,0,0,0-2-8l-4,1v-1h-1v1h-1v-1c-1.74-1.008-1.255-.959-3,0v-2h-1v1c-1.618,1.069-.862-1.516-1-2-4.047-1.03-1.263-.443-3-3h-1c-0.916-1.317-.788-1.77-1-4h-6v-5c-0.374-1.364-.809.4-1-1h1v-1h-2l1-3,4,1v-1h1v-1c-0.273-.329-1.761.192-1-1,0.359-.563,1.362-0.773,2-2l3,2v1h3l1,2c1.57,0.831,4.688.421,5,0v2a7.173,7.173,0,0,1,4,1v-1c1.719-1.127,1.355-.633,2-3l9-3q-1-5-2-10h-1l-1-2h-2l1-3h1a2.943,2.943,0,0,0-2-2s0.982-6.187,1-8c1.707-1.082,2.124-2.129,3-4h1v1c1.408,0.133-.394-0.763,1-1h5v-1l3,1v3l2-1c0.992,1.208,1.027,7.6,4,4v6c1.135,0.844.145-.127,1,1,2.784-.549.1-0.77,3,0,1.748,4.093,3.56,7.558,7,10v1l3-1v3l3,2v1h2v1h-1c0.355,2.075.054,0.917,1,2v-1l4,1v3h2c-0.452-1.172-1.873-3.622-1-6h1v-1h-1v-1h2q0.5-5,1-10h-1v-3h-1c-1.3-4.167,3.362-7.427,1-9h4v1l5-1v-1h4v-1l4-3v-1l-9-1v-1h1l-1-3h2c-1.579-4.742-.826-3.185,2-6l1-2,3-1c0.359-.671-1.626-2.057-1-4h1c0.651-1.732.415-2.608,1-4h-2v-2c-1.218-.583-1.545-1.734-2-2h-3c-1.689-1.267-1.106-7.085-1-10h2l-1-2h2l1-3h1v1l3-1V81h4V79h3V77c6.858,0.209,12.1-.13,17-2V74h4V73h3V72l2,1V72h7V71h3V70h5V69h3V68h6V67c1.139-1.139.4,0,1-2l8-1V63h3V62c2.847-.492,2.817,1.967,3,2h1V63h3V62h4l2-3c2.49-.82,2.224,1.789,4,2l1-2a13.935,13.935,0,0,1,9,0V58c1.783,1.934,1.1,8.393,1,12h1q0.5,2,1,4h1v2l3,1-1,2h2l-1,2h2c0.213,1.4.018,0.26-1,1v1h2c0.145,1.311-1.558,1.8,0,4l3,1-1,2h1v1h2v1h-1c0.753,1.334,1.012,1.052,2,2v1h2l-1,2,2,1,3,4h2q-0.5,1-1,2h1l3,4C597.334,110.345,600.06,111.145,601,115Z" />
        </a>
        <?php
        $kdwil = '16.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_11" data-name="Color Fill 11" class="cls-8" d="M631,66h2V64h2a11.875,11.875,0,0,0-1-5c2.01-.574.865,0.12,2-1,2.01,0.574.865-.12,2,1h1q-0.5,2.5-1,5h2c-1.8,5.207.718,3.465,2,8h-2v1c-1.4.188,0.383-.707-1-1h-7l-1-3c1.139-1.139.4,0,1-2-3.515.915-2.853,2.433-7,3v2c-4.649,1.282-1.282.826-3,4h-1l-1,3h-2q0.5,2,1,4h1c-0.083,1.412-.656-0.372-1,1v3h-1c-0.976,3.157.825,7.828,2,9-0.247-4.81-.7-4.832,0-9l4,1v2l2-1v1c1.3-1.048,1.489-2.043,3-3V86h-1c-0.038-.4.884-2.244,1-4h2a7.174,7.174,0,0,0-1-4h1V77h3v2l2-1v2l2-1v2l2-1v2l7,6c-0.574,2.01.12,0.865-1,2v2c-2.927.684-3.275,1.113-4,4h2l-1,2h2c0.848-1.251.636-1.232,2-2v1c1.316,1.54.978-1.93,1-2h3v1h-1c0.376,1.529.936,1.218,2,2v1h1V98l2,1c-0.258.428-3,3-3,3a17.7,17.7,0,0,1,1,4h-1v1h2q-0.5,1.5-1,3c-5.31-.872-4.651-0.351-9,2q0.5,1.5,1,3h1c0.368,1.523-1.732,1.333-2,2v3l-4-1v1h1v1h4v-1h1v-3h1q-0.5-2.5-1-5h1v-1h8v-7h1q-0.5-1-1-2h2c3.617-3.654,14.559-.273,23,0,0.61,2.532.574,1.623,2,3v1h2v1h-1c-0.646,1.258.522,0.666,1,1,1.139,1.139,0,.4,2,1q0.5,1.5,1,3s-2.141.164-1,1h2q0.5,3.5,1,7h1v13l-4,3v2l-2-1-4,5h-3q-0.5,1-1,2h-1q-0.5,1.5-1,3h-1v-1a6.371,6.371,0,0,0-3,3h-1v1h1q-0.5,1.5-1,3h-2c-0.575,2.987-1.879,4.587-3,7l-3-1v1h-1v-2h-1v1l-3-1c0.958,3.489,3.22,4.375,5,7h1q-0.5,1.5-1,3h1v2h1q-0.5,1-1,2l2,1c1.741,4.115-1.849,7.221-2,9,0.154,0.127,1.888-.1,1,1h-2q0.5,1,1,2h-1v3h-1c-0.21,1.4.732-.389,1,1v8h1v-2h1v-8h1v-4h1v-6h1a2.645,2.645,0,0,0-1-3c-0.854-3.516.575-6.6,1-9l4,1q0.5-1.5,1-3l2,1v-2l2,1v-1h1l2-3h1q-0.5-1-1-2h2c-0.012-1.414-.346.254-1-1v-2h1c0.228-1.4-.834.4-1-1q0.5-1.5,1-3h-1v-1h1v-1l5,1v-1l6-1c0.426,2.181,2.567,8.678,1,12h-1a9.609,9.609,0,0,0-2,4h2q0.5,2.5,1,5h1q-0.5,1-1,2h2v2h1v-2h-1a1.44,1.44,0,0,1,1-2v-8h-1q0.5-2,1-4h12v2l2-1v1c1.139,1.139.4,0,1,2h2c-0.549,2.784-.77.1,0,3l2-1v1h1v-1h2v-1c1.163-.237,1.729,1.518,4,1v-1l6,2q1-2,2-4h1v1c2.56-1.348.674-1.317,2-3h1v1h1v-2c4.382-.3,3.306-0.372,7-1q0.5,1.5,1,3l2-1v2l2-1v2l3-1q0.5,1.5,1,3l3-1v2c2.2-.7,3.452-0.783,7,0v1c0.456,0.08,3.722-1.723,6-1v1h3v1c3.11,1.024,8.394-.54,10-1h7q0.5,1,1,2l2-1v1c4.281,1.31,4.4-1.669,7,2,1.135,0.844.145-.127,1,1-4.51.192-5.342,1.484-8,3h-2l-2,3h-3q-0.5,1-1,2l-3-1v-1c-3.192-.965-6.368,1.3-8,1v-1h-3v-1a1.688,1.688,0,0,0-2,1,1.611,1.611,0,0,1-2-1l-4,1v3h-2c-1.3,7.282-3.578,4.81-7,9h-1v3h-1q-0.5,1-1,2h-2v1c-2.716,2.725-1.445,3.726-7,4q0.5,3.5,1,7a12.71,12.71,0,0,1-5,1q-0.5,1.5-1,3h1c2.48,2.453,3.792.508,5,5h1v6c-2.523,1.339-3.5,1.99-8,2-1.527-1.449-8.818-2.883-12-3v1h-1q0.5,2.5,1,5h-1v2c-0.407.816-2.124,0.37-2,2h1v7h1v3c0.3,1.381,1.151-.406,1,1h-1v2h-1c-1.438,2.951-1.869,4.728-2,9l4,1v4c-2.293.259-2.575,0.165-4,1v1h-4v1c-1.539.9-2.431,0.808-5,1v2l3,1q-0.5,2.5-1,5h2q-0.5,8-1,16h-1q-0.5,1-1,2l-3,1v2h-3c-0.94,4.074-2.933,4.166-8,4-1.166-1.361-1.825-1.528-4-2a7.173,7.173,0,0,1,1-4h-1c-0.862-1.15-2.453-1.2-3-2-1.088-1.586.964-1.249-1-3v-1l-5,1v-1c-3.347-2.2-2.4-4.676-8-5v-2h-3v-2h5c1.374-2.991,3.179-4.383,4-8h2a13.3,13.3,0,0,1,3-4c-0.77-3.215-1.508-2.155-2-6h-4v1l-3,1v-1h-1c-0.916-1.666.66-3.254,1-4h-1v-1h-3q-0.5,1-1,2c-1.812.859-6.681-1.532-7-2v-3l-2-1v-1c-2.384-1.574-1.971,1.139-4-2-1.991.649-2,1.344-4,0v1c-1.909,1.256-1.659,1.014-2,4,0.664,0.565,2.693,2.341,2,4h-1v2c-3.379-1.358-4.828-2.253-6,2-1.889,1.95-2.736,9.182-1,12l3,2v5h-5c-0.51-1.471-1.144-1.6-1-4h1v-1h-1v-1c-1.139,1.139-.4,0-1,2-0.25.283-1.29,5.282,0,6h-2v-1c-2.823-1.634-9.016.213-11,1v1l-5-1v-1c-4.568-1.547-11.381.311-15-1,1.175-3.3,2.184-3.821-2-5-3.239-3.03-11.766-.861-16,0q-0.5,1.5-1,3h2v2h-3q-0.5,1.5-1,3c-2.577.117-3.471,0.141-5,1v1h-6q-0.5,1-1,2h-1v-1l-5,1q0.5-3,1-6h1c1.139-1.139,0-.4,2-1q-0.5-4-1-8a2.653,2.653,0,0,0,1-3l-2-1v-1h1v-5h-1v-1l2-1v-7c-1.372-.654-1.046-1.213-2-2l-2,1v-2l-2,1v-2h-2a16.6,16.6,0,0,1,4-7l2-1q0.5-1.5,1-3l3-2q0.5-1.5,1-3h1c2.193-2.32,5.033-4.545,6-8-1.719-1.127-1.355-.633-2-3,4.431-1.168,3.55-3.76,8-5v-2l-5-1v-1h-1v-3l-5-1q0.5-2,1-4l-3,1v-2l-2,1v-2h-1q-0.5-1-1-2l-4-1q-0.5-1-1-2l-7,1q-0.5-1-1-2l-3-1v-3h2a3.978,3.978,0,0,1,2-2v-1h-1c-0.644-2.523-.584-1.6-2-3v-1h-2q0.5-1,1-2c-0.754-.915-1.31-0.744-2-2,2.325-1.349,3.06-3.4,5-5v1l6,1v1l2-1v2l4,3,5,6,2-1q0.5,1.5,1,3l10,1c1.05-1.313,1.906-.989,3-2,3.337-3.085,4.589-6.817,10-8v-2c5.535,2.068,10.917-1.1,16-1v-2h1v1l6-2v-1h2l2-3,6-1v-1l4-1q0.5-1,1-2c3.853-2.6,8.71-3.853,10-9-2.829-2.648-1.47-6.663-5-9v-1l-2,1q-0.5-1-1-2l-5,1v1l-6,2v-2c-3.417-.675-5.625-2.371-8-4l-2,1v-2l-4-3q-0.5-1-1-2h-2q-0.5-1-1-2h-1v-2l-2-1v-2l-3-2v-2l-2-1-3-9-10-9v-2l-6-5V95h-1l-2-3h-2l1-2c-0.734-.907-2.915-0.453-3-2h1l-3-6h-2l1-2h-1V78h-1V76h-1V74c-0.538-1.009-4.7-6.356-4-8h1V64c4.164-.349,7.778-2.009,11-3l3,1V60l3,1V59h1v1h1V59a25.982,25.982,0,0,1,11,1V59h-1c-0.722-1.924,2.4-.122,1-4h2q-1-2.5-2-5h1l-1-2,2-1-1-2h1l1-3h4v1h1V41h1v1l3-1v1h2v1h3l3,4h2l1,2h3v1l3,1v1h-1c-0.091,1.608,1.723,1.217,2,2l-1,2,2,1v9Zm-5,32c3.336,0.418,10.786,5.137,13,4v-1h-4v-1h-2l-1-2h-3V97h-2V96h-1V95h-1V91h-1C624.216,95.864,625.068,94.385,626,98Zm16,4q0.5-1.5,1-3h-1l-2,3h2Zm52,71c1.139,1.139,0,.4,2,1C694.861,172.861,696,173.6,694,173Z" />
        </a>
        <?php
        $kdwil = '16.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_10" data-name="Color Fill 10" class="cls-9" d="M663,375l5,1a10.3,10.3,0,0,1,1,5h-1v1l3,2v1h2v1h2q0.5,1,1,2h2q0.5,1,1,2h2l2,3,2,1v11h-2q-0.5,2.5-1,5c0.238,0.709,3.083.714,2,4l-2,1q-0.5,1.5-1,3h1q0.5,1.5,1,3l3-1v-1h2v-1l6,1v1l-3,9c-8.179.76-8.294,6.177-14,9,0.325,0.859,2.14,4,1,6-0.82,1.439-2.546.083-4,1l-2,3h-1v6h-1v2l-2,1q-0.5,2-1,4l-2,1c-1.824,4.333,3.879,2.368-1,6v1l-7,1v-1h-1v1h-6v-2l-6-2v-3h1c1.87-.9-2-1-2-1v1c-1.139,1.139-.4,0-1,2-3.093.305-3.155,0.716-5,2v1l-7,1v1a3.982,3.982,0,0,1,2,2c-3.448.065-5.7,0.572-8,2q-0.5,1-1,2l-2-1v1h-1v1h1v1h-4v-2l-4,2v2l-3,2v1h-4c-1.675,1.111.036,3.118-1,5l-5,4v2l-2,1v3h-1v3h-1c-0.826,3.255,3.043,5.418,0,9-1.139,1.139,0,.4-2,1,0.626,3.075,1.6,3.462,2,7a19.4,19.4,0,0,1-9-2q-0.5-1.5-1-3h-1v-3c-0.928-1.367-2.638,0-4-1l-4-10c-3.6-.877-4.421-3.048-8-4v-3h2c4.562-7.532,8.153-2.182,8-16,2.66-2.6,1.283-4.763,1-9,3.48,0,7.666-.579,8-1,3.646-3.9-.713-5.92,8-6,0.574-2.444,1.047-2.206,2-4-3.214-2.858-.4-4.108-2-8l-2-1a2.68,2.68,0,0,1,1-3q-0.5-2.5-1-5h2c0.726-1.424,2.787-2.6,3-3v-4c1.252-2.683,2.854-2.98,7-3v-1h3v-4c4.4-.147,4.5-1.274,7-3v-1h5c5.307-2.249,5.27-6.363,5-14l8-7v-4l3-2q0.5-1.5,1-3h1v-4l2-1v-3l3-2,3-9c5.466,1.854,3.923-.029,8-1,2.221-.529,5.517,1.409,7,2Q662.5,373.5,663,375Z" />
        </a>
        <?php
        $kdwil = '16.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_9" data-name="Color Fill 9" class="cls-10" d="M519,489h8v1h1v3l8,7q0.5,1.5,1,3h3c4.766-7.09,6.658.548,11-1q0.5-1,1-2c2.029-1.119,4.568.193,7-1l2-3c2.312-1.484,4.545-1.821,8-2,1.11,1.314,2.748,1.837,4,3q0.5,1,1,2l3,1q0.5,2,1,4h1c0.963,1.463.86,2.473,1,5h3c0.559,1.161,1.788,1.623,2,2v3l2,1c2.385,2.509.959,2.8,6,3v1l2-1v1c2.049,1.746,2.061,4.051,2,8h-1q-0.5,2.5-1,5h-4q-0.5,5-1,10c2.927-.684,3.274-1.113,4-4l5,1c-0.564,2.186-3.741,5.241-2,9l3,2c1.763,2.731,2.737,7.879,3,12a13.869,13.869,0,0,0-5,7c-5.261,1.251-5.824,3.48-9-2h-1q-0.5,1.5-1,3c-3.282,1.66-6.765-1.2-8-2v-1h-4c-0.638,1.757-3.974,9.406-5,10h-2c-1.884,1.33-10.312-.848-13-2q-0.5-1.5-1-3h-3v2c-4.28.156-10.7,0.631-14,2v-1c-2.269-1.286-2.637-1.628-3-5l5-1v1l3,1v-1c3-.776,2.63-0.616,3-4-5.176-2.819-8.05-6.55-16-7-1.543,4.069-3.529,7.882-8,9v-4l-3-2v-1h-3c-1.34-.931.011-2.691-1-4-1.118-1.449-4.471-.972-7-1l-1-3h-1v-3h-1c-1.9-2.275-4.993-2.767-8-4v-1l-6,1c0.723-2.762.279-2.237,3-3,1.139-1.139,0-.4,2-1q-0.5-4-1-8c-3.017-2.161-.418-1.423-2-4l-2-1c-3.316-3.585-3.592-5.047-11-5,0.841-3.982,3-4.373,4-8-2.63-1.5-3.378-3.189-7-4q-0.5,2.5-1,5c-2.891.028-5.4-.208-7,1l-1,2h-2v1h-7l-2-4h-2v-1c-2.419-2.049-3.8-3.6-8-4q0.5-4,1-8l2-1v-2h1v-8h1c1.837-4,2.3-6.828,7-8v1h4l1,2,5-1v1h1l2-3c4.587-2.16,5.36,3.039,7-1l3-8,3-1v-1h10l2-3c2.5-2.4,11.817-10.16,15-8C517.314,468.134,519.054,477.438,519,489Zm0,83h3v1h-1v4h-4v-2l2,1v-4Z" />
        </a>
        <?php
        $kdwil = '16.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_8" data-name="Color Fill 8" class="cls-11" d="M670,274h2v2h-1c0.269,2.412,3.379,1.806,3,5h-1c-0.4,1.753.033,1.464,1,2v1c-0.459.6-3.9,0.062-3,2h1v1h3q-0.5,1.5-1,3h1v1h-1a9.091,9.091,0,0,0-2,4h2v1h-1c0.5,1.968,1.891,1.586,3,3a8.065,8.065,0,0,0-2,3h-1s1.428,4.249,1,6h-1c-0.6,2.3.728,2.658,1,4h-2v1h1a13.3,13.3,0,0,0,3,4q-0.5,1.5-1,3h-1c-0.482,1.7.948,1.761,1,2,0.561,2.555-.817,3.6-1,5h1v1c-0.977,1.343-1.431-1.162-2,1l2,1v1h-1q0.5,1.5,1,3h-2c-1.263,1.654,1.71.769,2,1q-0.5,1-1,2s1.585,0.71,1,2h-1c-1.354,1.587-2.169,1.737-5,2v-2c-2.981,1.839-.8,1.645-2,3l-2-1q-0.5,1-1,2h-1v-1l-2,1v-2l-2,1v-2h-1v1c-2.128,1.212-2.177,2.252-5,3v4h-1q0.5,1.5,1,3h-1c-1.18,1.9-3.582,4.454-2,6h-2v2h1c0.759,3.927-1.456.274,0,4h-2v1h1v6l-2,1q-0.5,2.5-1,5h-1q-0.5,2.5-1,5l-3,2v2l-2,1v4h-1v2h-1q-0.5,1.5-1,3l-3,1v-2h-1v1c-1.229-1.126-.427.03-1-2l-6-1v-2l-7-2v3l-4-1v2h-1v-1l-3,1v-1l-4-1q-0.5-4-1-8h2l2-3h2q0.5-1,1-2h3l2-3h1q-0.5-1-1-2l3-1q1-3.5,2-7h-2q0.5-1,1-2h-2q0.5-1,1-2l-5-4v-1h-2v2l-2-1v1c-2.677,1.943-.265,2.281-5,3v2c-1.4-.224.093-0.1-1-1-1.7.2-1.531,1.794-2,2h-2v2l-2-1v2a15.533,15.533,0,0,0-4-1,7.49,7.49,0,0,0-2-3c1.139-1.139,0-.4,2-1-0.355-2.186-1.771-3.93-1-7h1c0.715-2.78-.456-5.513-1-7h16v-1l3,1v-2l3,1v-1c1.682-1.819,1.1-7.561,1-11,2.365-.681,3.808-0.961,2-3h3v-1h2v-1c1.359-.913,1.756-0.725,4-1,1.183-4.439,2.892-3.222,3-10h1c0.671-2.16-2.538-1.221-3-2q0.5-1,1-2h-1v-1l2-1v-1h-1c-1.611-1.251,2-1,2-1v-2h3v-1h1v-1h-1c-0.979-1.654,1.44-.846,2-1v-3c-1.318-.426-2.007.909-2-1h1q-0.5-1-1-2h-1v1h-1v-1c-2.357-.28-2.6.5-4,1-0.633-2.523-.568-1.617-2-3v-1h-2v-1h1c0.554-1.389-1.3-.582-2-2h1c0.413-1.494-1.772-1.371-2-2-0.353-.975,1.711-1.853,1-4h-1q-0.5-2-1-4c1.975-1.129,2.338-1.417,3-4,2.4,0.4,3.077,1.678,5,2v-1a1.675,1.675,0,0,1,2,1h1v-1c3.393-.845,5.631.8,8,1v-1h1v2h2v1h1v-2l2,1q0.5-1,1-2c3.208-2.092,5.921-1.671,7-6,2.739,0.644,2.276,1.309,5,2v4h2q0.5-2,1-4h2v-3c2.078-1.094,1.771-1.611,5-2Q669.5,272.5,670,274Z" />
        </a>
        <?php
        $kdwil = '16.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-12" d="M380,332c12.969,0.189,11.427,9.573,20,12v-1h4v-1h2v-1l6,1c-0.717,2.718-1.652,3.06-3,5h-1v6l-2,1v2l-2,1v2l-3,2v10c8.6,4.97,1.121,9.444,3,16,1.181,4.123,3.711,3.74,4,10-1.314,1.052-1.029,1.762-2,3h-1v2h-1l-1,2h-3c-2.063,1.453-2.034,6.231-2,10,3.02,1.95.7,1.457,2,3l4,2v1h-1v5l-2,1c-1.993,3.556,1.616,3.324-4,4-3.256-2.789-4.5.688-8,0-1.388-.273.4-1.166-1-1v1H374c-0.444-.187-0.159-1.325-3-2v-2c-2.731-1.584-2.446-2.742-7-3l-1,2h-4v1h-1v-1l-3-1v-1c-1.293.077-1.484,0.947-4,1v-3c-3.469-.618-5.168-1.648-6-5h-1v-3h-3c-2.454-5-2.957-3.269-7-6l-1-2-3-1v-2h-1c-1.669-2.693.745-.662-2-3v-1h-2v-1c-3.944-1.773-3.3,2.332-5-3,4.517-.623,2.526-0.864,5-3v-1l13-3c-0.051-6.711,1.893-10.552,3-16,2.84-1.679,2.719-3.451,7-4,0.574-2.444,1.047-2.206,2-4-1.077-.873-1.306-1.749-2-3h-1c-0.7-2.689,2.612-3.159,3-4v-5c9.373,1.587,10.959,6.206,14,14l6-7h1v-5c0.02-.063.624,0.136,1-2h5c1.339-2.523,1.99-3.5,2-8h1c1-2.037-.951-2.877-1-4-0.094-2.141,1-2,1-2v-5Z" />
        </a>
        <?php
        $kdwil = '16.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-13" d="M570,273q-1,4.5-2,9h1q0.5-1,1-2l3,1v-1l9-1v1h1c-0.969,2.605-.177,5.094-1,8h-1v10h-1v3c-0.521,1-3.816,1.364-3,4h1c1.139,1.139,0,.4,2,1q0.5,4,1,8l-2,1c-1.661,2.2-1.866,4.092-2,8-5.749-.241-7.114-2.616-13-3q0.5,1.5,1,3l-5,1c-0.172-.042-0.274-1.856-2-2v1h-2v1h-9a34.58,34.58,0,0,0-1,7c-6.242.1-9.589-1.079-14-2-0.532-1.065-1.849-1.723-2-2v-3h-1q-0.5-1.5-1-3h-2c-0.927-.753-0.775-2.046-2-3a8.445,8.445,0,0,1-3,2v-1c-1.139-1.139-.4,0-1-2l-7,1c-0.673-.214-0.149-2.614-3-2v1h-2l-2,3h-5v1h-2v1c-3.267.9-6.8-3.146-8-3v1h-1v5c-4.89-1.262-6.655-6.21-10-9v-6h2v-1c2.462-2.149.5-2.377,5-3,0,0,0-2,1-1v2c2.075-.276,2.877.064,4-1v-2h1v1h1v-1l3,1v1h-1l1,2,3-1a2.6,2.6,0,0,0,3,1l1-2,2,1v-1c1.324-1.217.749-.18,0-2h2l-1-3h1v-2h1q-0.5-3-1-6h1q0.5-3,1-6h2c1.921-4.491,4.4-7.978,11-8v-2l2,1v-1h-1c-0.51-1.355,4.633-3.518,2-6h2c1.127-1.719.633-1.355,3-2v-2l2,1q0.5-1,1-2c3.6-1.279,5.76,3.5,8,1v2l6,1v-1c1.7-1.053,1.651-1.358,4-2v-2h1v1l4-1v1l5-1v1c4.152,1.2,2.721,3.418,4,7h1v-1Z" />
        </a>
        <?php
        $kdwil = '16.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-14" d="M363,152v2h1v-1l5,1v1l9,1v2h1v-1l2,1c1.335,2.986,2.008,5.05,2,10h5l4,7h3l1,2h2v1c2.276,0.777,2.467-.668,3-1,5.152-.062,4.93,2.932,5,8h5c0.944,1.8,1.385,1.574,2,4h4c0.735-1.406,2.781-2.593,3-3v-4h1c1.412-1.86,1.238-2.291,4-3v2h1l-1,3c5.168,1.385,4.4,5.215,11,6,0.478,1.937.8,3.811,2,5h2v1h-1c-0.1.444,1.651,2.813,1,5h-1c-0.655,1.839-1.11,5.36,0,6h-2q-0.5,4-1,8c-2.43,1.567-.611,1.156-2,3l-8,6h-2v1c-4.413,1.869-9.482-2.043-15,0v1h-2l-1,2-5-1-1,2h-3v9c-1.135.844-.145-0.127-1,1l-12,2v-1h-1v1l-4,1v1c-4.029,1.755-8.406,1.924-14,2q0.5,4,1,8l-6-1v9c-2.3.259-2.558,0.188-4,1v1h-6s0.1,1.3-2,1v-1h-5v1l-4,1v1a1.572,1.572,0,0,1-2-1c-2.135-.3-2,1-2,1h-6v2l-3,1v1h-2v1h-3l-1,2h-5c-0.055.018,0.082,0.593-2,1v2c-2.288.3-2.565,0.161-4,1v1h-4v1h-2l-1,2h-4c-0.195.044-.335,1.641-2,1v-1h-1v-3h-2v-2c-2.918-.677-2.439-1.756-3-2h-6v-1l-5-1c-1.673,2.635-5.052,3.682-9,4l-3-4h-3v-1c-4.429-1.62-4.27,2.489-6-3h-1l1-2-2-1v-6h-1v-3h-1q0.5-1.5,1-3l-2-1v-1c-1.414.009,0.205,0.26-1,1h-1v-1l-2,1v-1c-1.248-.915-0.964-0.581,0-2h-3v-1c-1.69-1.344-2.008-1.75-5-2-0.642-2.909-1.8-2.535-2-3-0.863-2.047.543-4.057,1-5h-1c-1.139-1.139,0-.4-2-1v-2c-4-.737-7.066-3.179-8-7,1.135-.844.145,0.127,1-1l4,1q0.5-1.5,1-3h1c1.835-2.794,1.2-4.064,5-5,2.615-2.817,5.233-1.627,9-3v-1l2,1q0.5-1,1-2l2,1v-1h1v-3l2-1-1-2,2-1v-3h1c0.917-1.291.743-1.945,2-3a11.9,11.9,0,0,0,7,4v2c6.855-.184,7.627-1.282,12,0l1,3h-1v1h1v1c2.232,0.842,5.438,1.029,9,1l-1,2h1v-1l5,2v-1l2,1c0.2-.078.239-1.39,3-2v-2a98.623,98.623,0,0,1,16-1,3.982,3.982,0,0,1,2-2v-1h-1c-0.038-.4.884-2.244,1-4h2v-3a34.651,34.651,0,0,1,7-1c0.607-2.393.317-1.858,2-3v-1l3,1v-1l3-1v2h1v-2h2l-1-2h2l1-3,2,1v-2l2,1v-1h1a2.083,2.083,0,0,0-1-3v-1h2a11.372,11.372,0,0,0,3-7h2c1.775-3.046,4.063-3.825,5-8,2.444-.574,2.206-1.047,4-2-1.139-1.139,0-.4-2-1l1-3c-1.4.181,0.369,0.646-1,1-1.488.385-1.351-1.641-2-2h-1v1c-1.277,1.582-.991-1.97-1-2h1c1.843-.95-2-1-2-1,0.682-5.636,2.492-3.244,4-6v-2C360.739,153.356,360.276,152.691,363,152Z" />
        </a>
        <?php
        $kdwil = '16.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-15" d="M681,254q-0.5,1.5-1,3h3v3l-5,3v3l-3,2q-0.5,1.5-1,3c-3.042-1.258-6.741-1.367-9,1h-1v3h-1l-2,3h-1c-1.223-3.9-.2-1.28-3-3v-1h-2v-1h-2v-1h-2q-0.5-1-1-2c-3.25-3.048-5.667-3.742-6-10h1q0.5-3,1-6h2v-2c2.739,0.644,2.276,1.309,5,2q-0.5-5-1-10a12.71,12.71,0,0,1,5-1v1c0.581,0.508,4.32,1.023,5,2v3h1c1.986,2.286.825,1.775,5,2v1l3-1v-1h3v1c-1.759,1.381-2.605.443-1,2l2,3C677.211,255.021,677.819,254.337,681,254Z" />
        </a>
        <?php
        $kdwil = '16.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-16" d="M435,456q-0.5,2.5-1,5l-2,1v5c-1.21,2.118-4.486,2.086-8,2l-1-2h-6s0.1-1.267-2-1a2.809,2.809,0,0,1-3,1v-1h-2c0.525-4.662,2.1-11.393,0-16h-1v-2l-3-2v-2h-1v-4h-1v-3c-0.764-2.018-2.12-5.061-3-7l4-1v-1h3v-1h2v-1h9v1h2v1h6c-0.4,4.019-1.156,3.614,0,7,2.232-.842,5.438-1.029,9-1q1-3.5,2-7c2.944-.6,7.291-2.259,9-1h1l-3,9v3l-6,5c-2.022,3.93,1.617,7.4,1,9h-1C438.316,454.927,437.887,455.274,435,456Z" />
        </a>
        <?php
        $kdwil = '16.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-17" d="M375,307v16c-1.135.844-.145-0.127-1,1-6.287.155-4.453,1.258-10,2-0.844-1.135.127-.145-1-1-0.452-5.278-.989-3.038,1-7h-2c-1.541,2.729-2.6,3.013-7,3-1.742-2.543-3.128-1.906-6-3-1.578-3.184-1.382-3.335-3-7h-3v-2h2c1.9-3.079,4.9-3,6-7-1.955-2.007-.832-6.923,0-9h3v-3a6.719,6.719,0,0,0,3-3c2.01,0.574.865-.12,2,1,1.318,0.426,2.007-.909,2,1h-1l1,2h1v-1h1v1h3v1h1v4l2,1a14.665,14.665,0,0,1,3,8c-1.759,1.381-2.605.443-1,2v1Z" />
        </a>
        <?php
        $kdwil = '16.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-18" d="M565,321l10,2v1h2v1c2.2,0.814,8.779.794,11,0v-1h2v-1l6,1v1l3-1v3c-2.638,1.782-2.579,3.926-4,7h-1v5h-1c-1.139,1.139,0,.4-2,1-0.574,2.01.12,0.865-1,2q0.5,2,1,4l2,1v8c-1.749.737-3.837,1.622-5,3l-5-1q0.5-2.5,1-5c-8.372-.117-7.3.972-17,1v-2l-2-1c-0.676-2.238,1.831-3.3,2-5-0.513-1.04-2.467.012-2-3h1v-4l2-1v-8l-2-1C563.825,325.144,564.81,324.861,565,321Z" />
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
                url: "ambil_sumsel_kiri.php",
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
                url: "ambil_sumsel_kanan.php",
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