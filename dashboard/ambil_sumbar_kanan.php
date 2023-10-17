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
<div class="container-fluid mt-3 text-center">
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
            </style>
            <filter id="filter" x="593" y="284" width="150" height="241" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="603" y="218" width="133" height="130" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="657" y="184" width="118" height="114" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="584" y="180" width="93" height="68" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="530" y="186" width="85" height="84" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="502" y="143" width="127" height="76" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="576" y="71" width="101" height="132" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="498" y="-2" width="102" height="165" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="321" y="275" width="308" height="385" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="712" y="260" width="123" height="146" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="671" y="290" width="130" height="122" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="412" y="53" width="141" height="121" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="581" y="248" width="52" height="71" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="620" y="250" width="31" height="22" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="641" y="221" width="32" height="44" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="593" y="206" width="20" height="15" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="587" y="179" width="21" height="18" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-18" x="624" y="165" width="27" height="24" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-19" x="550" y="221" width="24" height="28" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_20" data-name="Color Fill 20" class="cls-1" width="1043" height="657" />
        <?php
        $kdwil = '13.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_19" data-name="Color Fill 19" class="cls-2" d="M622,289h3v1h-1v1c1.1,2.207-.085,6.82,1,9l4,3q0.5,1.5,1,3c2.4-.513,3.076-1.29,5-2v1c3.459,4.126-1.963,5.926,7,6v-1h4c0.881-.37.611-2.9,3-2v1l4,1v1h-1v1h1v6h1v1h5a8.126,8.126,0,0,0,2,4h1v2h1q-0.5,2-1,4l2,1c1.049,3.129-2.618,4.531-1,7v1h1v-1l3,1q0.5,1.5,1,3c2.135-.115,3.418-1.021,4-1v1h1c2.259,3.868,5.365,5.139,6,11-1.759,1.381-2.605.443-1,2,3.414,4.092,6.369,1.371,6,10h-1v1h1q0.5,1,1,2h2v1h2c1.739,1.415.907,4.952,2,7l2,1v2l3,2v7h1c2.385,3.188,5.3,2.812,6,8l10,3c0.323,1.956,1,2,1,2v13h1v3l2,1v4h1v2h1c0.963,1.5.8,2.46,1,5-1.361,1.165-1.528,1.824-2,4h-2a10.6,10.6,0,0,0-1,4c1.236,0.68,1.359,1.563,2,2h2v1l3,2v2l3,1c0.085,5.829,1.844,8.191,4,12h1q0.5,2,1,4l3,2,3,29-7,5c-0.991,1.458.263,2.944-1,4h-2l-2,3h-3q-0.5,1-1,2h-3v1h-2l-2,3h-2q-0.5,1-1,2h-2c-4.283,2.863-6.436,7.211-13,8v-2l-13-14-6-5v-3h-1v-4h-1v-6h-1v-2l-3-2v-2l-3-2v-2h-1q-0.5-2.5-1-5c1.139-1.139.4,0,1-2l3-1c0.764-2.689,1.628-3.076,3-5h1v-4h1c0.959-3.181-.529-8.332-1-10q-0.5-6.5-1-13h-1q-0.5-2-1-4h-1v-2l-2-1v-2l-7-6v-2l-2-1q-1-3-2-6l-2-1v-2l-3-2q-0.5-1.5-1-3l-2-1q-0.5-2-1-4l-2-1v-2l-7-6v-5h-1v-5h-1v-2h-1v-7c-1.757-.333-4.08-0.855-5-2v-2h-1c-1.369-1.7-1.693-2.011-2-5,1.719-1.127,1.355-.633,2-3-2.762-.723-2.237-0.279-3-3h4q-0.5-2-1-4l-2-1v-5h-1v-1c-1.126-.578-1.6-1.766-2-2h-2v-1h-1v1l-5-1v-1c-1.89-1.381-2.322-2.267-5-3q-0.5-1.5-1-3h-3v3h-4q-0.5-3-1-6h2v2h2q-0.5-4.5-1-9h-1v1l-3-1c-0.723-2.762-.279-2.237-3-3q-0.5-3-1-6h2l2-3,3-1q-0.5-2-1-4l2-1v-2l3-2c1.863-1.919,2.883-4.3,5-6v-1h3v-1l4-1Q621.5,291,622,289Zm-24,36h4q0.5,2.5,1,5h-1v-1h-4v-4Z" />
        </a>

        <?php
        $kdwil = '13.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-3" d="M644,226h3q0.5,5,1,10l-2,1v1h1v3h1q-0.5,6-1,12c2.01,0.574.865-.12,2,1,2.739-.644,2.276-1.309,5-2,1.666,2.777,4.667,3.915,7,6q0.5,1,1,2l9,1v1c2.547,1.814,3.555,4.068,7,5,1.256-1.909,1.014-1.659,4-2,1.554,2.455.821,0.657,3,2v1h2l2,3h3v4l4,1v1l3-1v1h1l4,10h-1q-0.5,1-1,2h-1v1h1c1.286,2.269,1.628,2.637,5,3,1.928-2.273,6.037-2.687,9-4v-1h5a1.424,1.424,0,0,1,2-1v1h1v3c-3.692,2.656-.54,4.21-3,7v1h-5c0.7,3,1.65,2.241,2,3v4h1q0.5,4.5,1,9l2,1v2l3,1v1l2,1v2l3,2v4a7.742,7.742,0,0,0-2,3c-3.286-1.5-5.681-3.163-10-4q-0.5-2-1-4c-3.151-.888-4.9-3.041-7-5q-0.5-1-1-2l-4-1v-1h-6l-4-1v1c-2.01.574-.865-0.12-2,1,4.467,3.58,3.4,7.921,3,14l-6,5v1h-2v1h-2v1h-6v1h-2v1a8.432,8.432,0,0,1-4,2c-1.946-3.3-1.845-2.309-6-2q-0.5-1.5-1-3l-3,1v-1c-1.139-1.139-.4,0-1-2h1q-0.5-1.5-1-3h2q-0.5-1.5-1-3h-1c-0.6-1.868,1.341-3.433,1-4h-1v-2h-1a20.783,20.783,0,0,0-3-4v-1h-5v-1h-1a12.3,12.3,0,0,1,1-5l-2-1v-2l-6-1v1h-2v1l-6,1a8.091,8.091,0,0,0-2-2v-6h-1c-1.354,1.587-2.169,1.737-5,2-0.735-2.629-1.583-3.182-3-5h-1q-1-6-2-12h-1c-0.3-2.026.467-1.21,1-2,1.04-3.915,2.812-3.472,3-9-1.587-1.354-1.737-2.169-2-5h-2c0.262-3.176,1.01-3.822,2-6l2,1v-1l10-2v-1c1.605-.173,1.233,1.714,2,2h5v-1h1c-1.808-4.922.312-4.173,1-9a10.6,10.6,0,0,0-4-1v1h-3v1h-1q-0.5,1.5-1,3c-2.28.349-2.549,0.163-4,1v1h-5l-2,3c-2.437.99-7.583-2.165-8-3v-4l-4-1v-3h-3q-0.5-1-1-2c-1.957-1.892-2.047-5.046-2-9h8c0.072-.03,2.506-3.134,4-3q0.5,1,1,2l2-1v1h1v1c-0.131.138-1.895-.095-1,1l4,2c0.16,1.405-.214-0.176-1,1q0.5,1,1,2c2.1-.709.9-1.03,3,0v-1c1.139-1.139.4,0,1-2h1c-0.11-2-1.884-1.3-2-4h1v-1l-2-1v-3h-1c-0.051-.455.928-2.145,1-4,1.765-1.446,2.991-3.814,4-6l2,1v-1c2.689-.968,5.205-1.985,8-3v1C644.139,225.139,643.4,224,644,226Z" />
        </a>

        <?php
        $kdwil = '13.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_17" data-name="Color Fill 17" class="cls-4" d="M712,219v2l3,1v1l5,1v1c2.739,2.345.314,0.236,2,3a11.952,11.952,0,0,0,8,6q0.5,1.5,1,3c9.057-.25,15.381,3.05,17,10l3,1v1l4,1q0.5,1.5,1,3l5,4q0.5,1,1,2c3.294,2.271,4.683.028,6,5h1q-0.5,1.5-1,3c-3.156.663-2.014,1.512-3,2h-4v1c-1.654,1.4-2.476,3.457-3,6h-2v3h1q-0.5,2-1,4h1v1h-2c-2.928,2.842-5.993.1-8-1v4l-13-1q-0.5-1-1-2l-6-1v-1c-1.139-1.139-.4,0-1-2a9.749,9.749,0,0,0-4,1c1.163,3.239.627,2.524,0,6-2.9,0-5.389-.182-7,1q-0.5,1-1,2l-10,2c-1.139-1.139,0-.4-2-1,0.77-3.215,1.508-2.155,2-6-1.438-1.425-2.546-5.583-3-8a57.634,57.634,0,0,0-8-2v-4c-3.075-.366-3.159-0.683-5-2v-1h-3l-2-3-7,1-4-5h-5v-1h-1c-0.135-5.4-1.841-7.9-3-12-1.1-3.876,1.456-8.639,2-11q-0.5-6-1-12l3-1v-1c3.667-1.806,3.336,1.618,4-4-1.139-1.139-.4,0-1-2l-4-1q0.5-2.5,1-5h-1v-4l2-1v-4h1q-1-3.5-2-7h2c3.786-5.869,4.282.528,10-2l2-3c2.58-1.353,10.2-.685,12,1a7.537,7.537,0,0,1,6,6c3.072,4.358-2.512,2.533-1,7l2,1v5h1v3l2,1v2h1c1.711,2.717-.941,1.859,3,3v1h1v-1h4Z" />
        </a>

        <?php
        $kdwil = '13.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_16" data-name="Color Fill 16" class="cls-5" d="M629,189h2c3.261,2.2-2.166,5.855,6,7v-1l3,1v-1h3v-3l9,3q0.5,1,1,2h3v1c1.34,0.316,3.819-2.934,4-3,2.276-.834,2.239,2.52,6,0v1c3.936,3.507.625,9.285-1,13,0.143,1.414,1.474,2.422,1,5a1.46,1.46,0,0,0-1,2h1v1c2.821,2.055,2.591-1.8,4,3h1v1h-1c-2.5,3.477-2.21.245-5,2q-1,2-2,4h-1q-0.5-1-1-2h-1v1h-9q-0.5,1-1,2h-2v-2c-2.762-.723-2.237-0.279-3-3h-7v1c-2.726,1.782-1.722,2.294-5,1q-0.5,1.5-1,3l-2,1c-1.806,2.472,1.054,1.75-3,3v-3l-4-3v-1h-4q-0.5-1-1-2l-4,1c1.029,5.978,4.237,9.518,5,15l-3,1c-1.705,1.583-6.727,1.1-10,1v-1h1c-0.376-1.529-.936-1.218-2-2v-1h-5v-1h1c2.271-2.672,3.741-1.811,4-7-1.8-.945-1.574-1.385-4-2-0.363-1.982-1-2-1-2v-5h-1q0.5-1.5,1-3a19.168,19.168,0,0,1,7-1v-4c-1.135-.844-0.145.127-1-1l-5-1v1c-3.217.738-3.641,1.357-4,5h-5c-1.862-3.388-2.888-3.325-3-9h1v-2h1v-2h1q0.5-1,1-2h20c1.978-4.6,4.834-8.78,6-14,3.319-.814,4.1-1.928,9-2v1h1v3Z" />
        </a>

        <?php
        $kdwil = '13.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_15" data-name="Color Fill 15" class="cls-6" d="M562,191c0.976,3.973,1.963,3.851,2,10,3.412,2.037,3.107,3.866,9,4v3c1.395,0.7,1.237,1.451,2,2,2.548,1.836,1.877-1.091,3,3l4,1v-1c3.218-.808,3.556-2.559,6-4,0.745,5.637.312,7.091,7,7v1l2-1v1h3q-0.5,3-1,6h1v3c2.149,0.616,2.173.1,1,2h2v1c1.421,1.354,1.45.454,2,3h-1c-0.673,1.284-1.258,1.079-2,2v2h-1v-1l-3,1c1.139,1.139,0,.4,2,1v1h5v1h1v3l2,1q0.5,5,1,10l-9,3q-0.5,1-1,2h-2v1a8.216,8.216,0,0,1-4,2v2a24.436,24.436,0,0,1-11,0q0.5-1,1-2h-1l-8-9h-3v-1l-6-5q0.5-1,1-2a1.442,1.442,0,0,1-1-2l3-2q-0.5-1-1-2h1q0.5-2,1-4c-3.853-2.036-6.155-4.959-8-9-3.3.683-3.839,1.753-8,2q-0.5-1-1-2h1v-1l-4-3v-1h-2l-6-8c-2.251-1.629-4.283-1.934-6-4a8.278,8.278,0,0,0,3-5h3c-0.38-3.541-1.241-3.036-2-6,1.135-.844.145,0.127,1-1a46.006,46.006,0,0,0,9,1c0.6-3.018,1.795-3.816,3-6A21.057,21.057,0,0,0,562,191Z" />
        </a>

        <?php
        $kdwil = '13.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_14" data-name="Color Fill 14" class="cls-7" d="M581,148c4.042,0.294,4.961,2.689,8,1v1c1.272,0.989,1.923,3.17,3,4h2q0.5,1.5,1,3h1c1.647,2.06,1.93,3.069,2,7l3,1v1h2v1h4v1h1q0.5,2.5,1,5c5.5,1.317,8.2,5.666,14,7q-0.5,2.5-1,5h-1c-1.139,1.139,0,.4-2,1q-1,3-2,6h-1v2l-2,1c-1.315,2.39.528,2.735-2,5v1h-9v-1l-12,1q-1,3-2,6h-2c-1.547,3.668-2.745,5.821-8,6-1.354-5.114-3.4-2.588-5-5v-3c-0.194-.335-1.44-0.963-2-2l2-1q0.5-8,1-16h-1q-0.5-2-1-4a15.682,15.682,0,0,0-6-1c-1.584,2.731-2.742,2.446-3,7,1.759,1.5,1.9,2.7,2,6-3.374-.979-1.913-1.213-4-3v-1h-2c-2.366,2.688-4.312,1.241-9,1-3.822,8.592-5.922,3.664-13,6,0.823,1.876,1.481,2.616,2,5h-2c-0.738,3.217-1.357,3.641-5,4-1.332-2.067-2.423-2.024-4-4h-1v-3l-6-7h-2q-0.5-1-1-2h-2v-1h-2l-2-3h-1q-0.5-5-1-10h-1a39.284,39.284,0,0,1-3-8c5.784,0.125,7.252-.861,11-2h10v-1h3v-1c3.1-1.1,7.886-.047,10-2h1q0.5-2.5,1-5h1c3.023-3.839,5.313-3.146,12-3v-1l3,1v2l7,2c2.318-3.414,5.554-2.909,9-5q0.5-1,1-2h4v-1C581.139,148.861,580.4,150,581,148Zm11,35v3c3.836,2.3,3.486,4.844,10,5v-1h1v-1h-1v-3h-1Z" />
        </a>

        <?php
        $kdwil = '13.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_13" data-name="Color Fill 13" class="cls-8" d="M620,93V91h2v3h1v1h3l6,7,2,1v2l2,1c2.718,2.867,4.5,5.855,9,7l3-8h11q0.5-1,1-2h1v1l4-1v1c3.506,0.8,3.9,1.772,4,6h1v6c-2,1.044-1.727,1.9-3,3l-2-1v2l-3,1c-1.288,1.074-2.742,4.613-3,7,1.765,1.446,2.991,3.814,4,6,2.612-1.382,1.693-1.769,6-2a3.982,3.982,0,0,0,2,2c-0.875,2.316-1.017,4.407-1,8l-3,1q-0.5,1.5-1,3c-3.377-.7-3.852-2.168-7-3a6.749,6.749,0,0,1-5,4c-0.031,3.374,0,5.691,1,8h1v4h1c0.284,1.385-.659-0.372-1,1q1,4.5,2,9l2,1q-0.5,2.5-1,5l2,1c1.795,2.176,2.589,4.337,3,8,5.293,0.95,5.3,3.625,5,10-4.557.462-5.621,0.8-10,0-0.777,3-.616,2.63-4,3-2.062-2.406-5.131-2.292-8-4q-0.5-1-1-2h-3c-1.01,4.334-3.617,4.22-9,4a15.682,15.682,0,0,1-1-6h-3v-4l-3-1-3,1q-1-3-2-6h-2v-1h-2q-0.5-1-1-2h-2v-1h-2q-0.5-1-1-2l-3-1c-1.127-1.83.575-3.758-1-5l-6-1-3-4h-1v-4l-2-1v-2l-3-1v-1c-1.761-1.621-2.361-2.071-3-5-3.807.679-3.2,0.662-7,0-0.945-1.8-1.385-1.574-2-4l6-1c0.629-1.269,1.643-1.433,2-2,0.753-1.2-.862-0.432-1-1-1.565-1.293,1.954-.986,2-1,0.77-3.215,1.508-2.155,2-6-2.01-.574-0.865.12-2-1h1q-0.5-3-1-6h1v-1a2.619,2.619,0,0,1-1-3h1q0.5-2.5,1-5h1a8.294,8.294,0,0,0,2-4h-1v-3l-2-1v-7l-3-1c-0.4-.576,1.834-2.145,1-4a10.743,10.743,0,0,1-2-2c2.49-1.561,3.667-4.263,4-8l-5-6h2V80c1.255-.342,3.937,2.978,4,3h1V82h5c1.524-2.327,4.273-2.927,6-5,2.01,0.574.865-.12,2,1l3,2v4c0.269,2.162,1.647,9.119,3,10h2v1h1V94Zm10,78c0.131,2.371,1.979,7.592-1,8h2v2c2.663,1.412,4.22,2.03,9,2v-4l4-1v-3h1q0.5-1,1-2h-1c-0.88-3.4-1.861-3.065-6-3-1.293-.572.41-1.1-1-1q-0.5,1-1,2h-4v-1Z" />
        </a>

        <?php
        $kdwil = '13.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_12" data-name="Color Fill 12" class="cls-9" d="M577,29c0.066,1.563,1,7,1,7h-1l-1,3h-2l-1,2h-1v2l-3,2q-0.5,5-1,10a57.648,57.648,0,0,0,8,2v3c-0.274.6-3.138,1.468-3,3h1c0.722,1.367,2.807,2.637,3,3v4l2,1c3.276,5.515.825,9.293,9,11q0.5,2,1,4l2,1v4h-1l1,2-3,1v1h1v1h-1c0.056,1.05.835,1.527,1,4h2q-0.5,1-1,2h2c0.357,1.368-.759-0.393-1,1q0.5,1.5,1,3h-1v2h2q-0.5,1-1,2h2q-0.5,1-1,2h1v3c-1.533.94-4.071,2.285-2,4h-2q-0.5,5.5-1,11h2v1h-1c-0.139,1.407.776-.4,1,1v4c-2.517,1.7-2.237,4.032-5,6v1l-3-1q-0.5,1.5-1,3c-1,1-1-1-1-1-1.655-.978-0.845,1.439-1,2h1v1h-1v3h-1v1h-4v1h-2q-0.5,1-1,2l-9,3c-4.054-4.923-7.84-3.341-15-3a7.49,7.49,0,0,0-2-3c0.77-3.215,1.508-2.155,2-6l-2,1v-2h-1a7.1,7.1,0,0,1-2-4h-2v-1l-6-5v-2c2.044-1.045,3.482-.78,2-3h2a43.087,43.087,0,0,0,4-6V111h1c0.476-1.332-.577.211-1-1-0.466-1.335.339-.408,1-1h1c0.9-1.088-.957-0.779-1-1-1.533-1.322,1.924-.976,2-1v-4c-1.707-1.082-2.124-2.129-3-4l-5-1v1h-1V98c-1.68-.65-3.193-1.063-4,0V96c-3.16.113-1.874,1.955-3-1-4.032-.7-3.661-0.4-8,0v2l-3-1V95h-2V94l-8,1V92l-5,1q0.5-3,1-6h1v1c0.86,1.889,1-2,1-2-1.334-.656-1.349-1.57-2-2l-2,1V81h3V80c1.139-1.139.4,0,1-2h7a19.171,19.171,0,0,0,1-7l13-2c0.788-2.836,1.228-2.419,3-4V64l3-1q0.5-4.5,1-9h-1l-1-3-4-2V47h-1q0.5-2,1-4h-1c-0.666-2.608-.222-3.871-1-6h-3V36h-4v1l-4-1c-0.164-2.044-2.042-6.731-2-7h1V27l2-1V15h-1c-0.08-1.341,1.678-1.644,1-4h-1q-0.5-2.5-1-5c2.826-1.27,4.132-2.575,8-3V4h2l1,2h5V7h2l3,5,9,2v1h2l2,3h2v1h3v1h3v1l6,2v1l7,1,2,4,3-1v1h2Z" />
        </a>

        <?php
        $kdwil = '13.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_11" data-name="Color Fill 11" class="cls-10" d="M374,283h-2v3l5-1v3h2l-1,2h2a15.533,15.533,0,0,0-1,4h-1a3.982,3.982,0,0,0-2-2c-0.574,2.01.12,0.865-1,2,0.644,2.739,1.309,2.276,2,5h2c-1.91,4.949-.081,4.9,1,9,2.282,0.195,2.616.152,4,1v1c1.994,0.158.7-1.519,2,0h1v3c0.528,1.312.719-.386,1,1-0.3.269-1.767-.188-1,1h2l-1,3h2l-1,2h1c1.14,1.942,2.65,2.4,4,4-1.587,1.354-1.737,2.169-2,5l6,2v1h-1c1.163,3.733-.434,3.387-1,8l6,1-1,2h1q0.5,3,1,6h1v1h-1v1h1v4h1v-1h3l-1,2h3l1,2h2v1h-1c0.982,3.071.352,2.061,0,6-1.135-.844-0.145.127-1-1l-2,1v-2l-3-2v3c1.315,0.75,1.215,1.4,2,2h2l-1,2,3,1c3.037,2.178,1.359,4.352,7,5-0.616,2.926-2.285,6.224-1,8,1.139,1.139,0,.4,2,1v2h2l-1,2h1v-1h1v2a18.579,18.579,0,0,1,4-1v-1c0.681-1.949,1,2,1,2,4.238,3.063-.71,3.439,3,5q-0.5,2.5-1,5c1.578,0.909,3,1.467,3,4h-1v1h1q-0.5,2.5-1,5h-3c-0.27-6.244-3.766-9.247-5-15-1.234-.339-2.129.855-2-1h1c-1.353-1.869-.955-1.619-4-2l-1,3h4c0.844,1.135-.127.145,1,1q-0.5,2.5-1,5l2,1v5h1l-1,3h2l-1,2h1l1,3h-2v2c-4.251-.692-5.88-1.958-13-2v2l-2-1v1c-1.139,1.139-.4,0-1,2-4.709.173-5.971,1.5-7-1-2.965-.4-1.615-1.424-3,0h-1l-1-2-2,1-1-3-2,1v-2l-2,1-1-3h-2l-1-2-2,1-1-3-2,1v-2l-2,1v-2l-3-1v-1l-2,1v-2l-2,1v-2l-2-1s-0.306,2.232-1,1v-3c-1.241-.416-2.108.915-2-1,0,0,2.054-.058,1-1h-2v-1c0.1-.09,1.926.069,1-1h-1v-1h-1v1h-1v-2l-2-1a2.542,2.542,0,0,1,1-3c0.436-3-1.692-2.144-2-3l1-2h-2l1-2h-2c-0.189-1.4.062,0.059,1-1l-2-4h-1l1-2h-1l-3-4h-2l1-2-3-1,1-2h-1v-1h-2c-0.192-1.4-.038-0.171,1-1v-1h-2l1-2h-2v-1c0.211-.228,1.825.148,1-1h-1l-2-3h-2l1-2h-1v-2h-1l-1-2h-2c-2.248-1.986.966-1.6,0-3h-1l-2-3h-2v-1h1v-1h-1v-3h-1l1-2h-2c-2.07-2.171.761-1.167,0-3h-1v-1l-2,1v-1h-1l1-2-2-1,1-3c1.533-.94,4.071-2.285,2-4h2c0.482-2.977.87-1.688,0-4h2l-1-3h1l1-2h1l-1-2,2-1-1-3h1q0.5-7,1-14l3-2v-2l2,1v-2c1.053-.944.946,0.911,1,1,2.227-.641,1.741-1.106,4,0v1h1v-1h1v1c1.96,0.451,1.294-.485,2-1h1v1c2.547,0.479,2.129-.38,3-1l3,1v-2l2,1v-1a27.1,27.1,0,0,0,2-2l5,1v-1h2v-1l4-3v1C374.139,282.139,373.4,281,374,283Zm56,133,3,1q0.5,2.5,1,5a3.982,3.982,0,0,0-2,2l-3-1v1l-4,1v-1c-1.135-.844-0.145.127-1-1,3-1.973.941-2.825,5-4v2h2Q430.5,418.5,430,416Zm2,16c3.074,0.993.955,0.934,4,0a7.173,7.173,0,0,0,1,4h-1v1h-3A12.71,12.71,0,0,1,432,432Zm42,9c4.334,0.644,6.528,1.227,7,6h-4a10.6,10.6,0,0,0-1,4h1v1h-1v1h3v-1l9,3v2l3,1s0.164-2.141,1-1v2c4.642,2.855,1.18,2.059,3,6l2,1q-0.5,2.5-1,5h1q0.5,2.5,1,5h1l1,3h2l-1,2h2l-1,2h1v1l2,1s0.181-2.153,1-1v2h1v5c0.9,1.413,2.51.065,4,1l3,4h2c0.074,1.412-.089-0.081-1,1v1l3,2v1h-1q0.5,1.5,1,3c-1.135-.844-0.145.127-1-1l-2,1c-0.823-.863,1.2-2.409-1-2v1h-4l-2-4c-1.243-.567-4.418,2.208-7,1l-1-2-3-1v-1h-2c-0.161-1.74,1.8-1.231,0-3l-2,1-1-3-3,1v-2a14.805,14.805,0,0,1-6-1v3h-1c-1.127-1.719-.633-1.355-3-2,0.77-3.215,1.508-2.155,2-6h-2v-3l-3,1-1-2h-2v-2h-2c0.259-1.39.213,0.175,1-1l-2-4h-1v-3c1.135-.844.145,0.127,1-1h3v2l3-1c-1.195-1.763-1.5-.274-2-1l1-3h-1c-0.867-1.52-.891-2.428-1-5-2.01-.574-0.865.12-2-1,1.139-1.139.4,0,1-2l3-1c-0.982-3.071-.352-2.061,0-6h-3v-1c-1.139-1.139-.4,0-1-2C474.955,445.9,474.707,445.224,474,441Zm25,61,4,1q-0.5,2.5-1,5l-6-2v-2h3v-2Zm38,23c7.363,0.218,5.7,2.446,9,6h1q0.5,1,1,2h2q-0.5,1-1,2h2q0.5,1,1,2c1.183,0.775.507-.863,1-1,1.308-1.548.981,1.937,1,2,3.14,0.825,4.93,3.065,7,5q0.5,1,1,2h2v1h2v1l3,1q-0.5,1.5-1,3h1v2l2,1v3h1q0.5,1.5,1,3h2q-1,3-2,6l-2-1v1c-2.087.821-5.735,1.56-7,3v2h-1v-1c-1.254-.653-0.672.532-1,1h1q-0.5,2-1,4h-1v-1c-4.024,1.341-3.936-.274-8,0v1h-1c-0.574-.372-0.787-1.352-2-2v-1h-1v1l-2-1v1c-0.923,1.077-.663-0.076-1,2h1v1h-1v1c-2.886,1.678-2.937-2.356-5,0v-2c1.8-1.087,1.983-2.177,3-4h-1c-0.958-1.425-1.4-2.739-3-1v-8c1.111-.58,2.486-0.753,3-2h-1q-0.5-3-1-6l2-1v-3c-1.214-.7-1.1-1.263-2-2h-2q0.5-1.5,1-3l-2-1v-1h1v-1h-1q0.5-1.5,1-3l-4-3c-0.444-1.471,1.781-1.394,2-2v-9Zm50,56h2v1l2-1v2h1q0.5,1,1,2l2-1v1h1q-0.5,1-1,2l2,1c0.354,0.429,2,2,2,2v2l6,5q0.5,2,1,4h1v-1a4.45,4.45,0,0,1,2,2h1c-0.134,1.107-1.991,2.784-1,5l3,2c0.569,1.649-.969,1.838-1,2-0.425,2.192,1.257,2.945,1,4l-2,1c-0.645,2.861,1.674,2.187,2,3v3h-1v1h-1v-1l-3,1a1.537,1.537,0,0,0-2-1q-0.5,1-1,2a1.483,1.483,0,0,1-2-1c-2.943-.541-1.977,1.448-3,2h-3v1h3q1,4.5,2,9h2v3c1.413-.054-0.393-0.758,1-1,0.859-1.889,1,2,1,2h2a20.889,20.889,0,0,1-1,4h2q0.5,1,1,2h2q-0.5,1-1,2h1q0.5,1.5,1,3h2q-0.5,1.5-1,3a9.733,9.733,0,0,0-4,1c-0.6-2.579-1.587-3.312-3-5h-1q-0.5-1.5-1-3l-2,1v-2l-2,1c-2.424-3.37,1.529-5.492-4-7v-1l-4,1v-1c-1.91-1.624-2-3.345-2-7l3,1v-3c-1.039-.753-2.488-0.744-2-3l2-1a16.826,16.826,0,0,1-1-5c-4.153-2.493-1.17-1.891-3-5h-1l-2-3c-4.291.647-3.809,0.4-7,2v-3h2q-0.5-2-1-4l-5,1c1.112-3.824-.393-5.143-3-8l-2-1q-0.5-3-1-6h2c0.574-2.01-.12-0.865,1-2-0.6-2.8-1.912-2.774-2-3v-1h1c0.438-1.787-.89-1.619-1-2v-6a45.815,45.815,0,0,1-2-10c3.27-.362,6.658-1.983,8-1l3,2v2l2,1v3h1v1h2v1C586.685,579.767,585.827,576.993,587,581Zm27,43h3q-0.5,1.5-1,3h1c1.82,1.415,2.367-1.223,5,3h1v1h-1v1c-3.071-.982-2.061-0.352-6,0v-2h-2v-2h1A26.7,26.7,0,0,1,614,624Z" />
        </a>

        <?php
        $kdwil = '13.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_10" data-name="Color Fill 10" class="cls-11" d="M777,266q0.5,1.5,1,3c4.557,0.057,4.788,1.171,8,2v-2l2,1v-1h2v-1h6v1h-1c-1.889.86,2,1,2,1v3h1v1h4c0.734,3.919.717,4.086,0,8h-2a9.749,9.749,0,0,1-1,4c3.523,0.266,4.518,3.147,7,1v2c2.739,0.644,2.276,1.309,5,2v-2l8,1v2h1c0.165,1.284-1.583,1.657-1,4h1v6h-1c-0.316,1.669.95,1.765,1,2,0.6,2.833-.769,2.558-1,3q0.5,1.5,1,3a3.982,3.982,0,0,1,2,2c3.259-1.571,2.668-1.293,7-2-0.144,3.548-.51,4.076-2,6h-1v2l-2,1v1h1c-0.662,1.47-.973,1.046-2,2v1l-3,1c-0.054,1.413.092-.084,1,1l-2,3h-1v-1c-0.4-.038-2.244.884-4,1v2h-5v1c-2.355.66-2.674-1.113-4-1v1h-1c-1.145,3.352-.183,4.906-4,6,0.556,5.731,3.57,6.8,4,13-4.086,2.3-3.385,3.419-3,8h3c-0.5,3.966-1.262,3.5-3,6h-1v3h-2c-0.77,3.215-1.508,2.155-2,6h-3l-4,5h-2v1c-1.481,1.375-1.311.509-2,3-4.5.391-5.746,2.431-9,4v3h-2q0.5,1,1,2h-2q0.5,1,1,2h-1v1h-2c-0.105,2,1.624.832,0,2v1h-2v1l-3-1v2a29.413,29.413,0,0,0-7,1v-1h1c0.778-1.476-1-2-1-2q1-3.5,2-7l7-6v-1h3c1.641-1.128,1.916-6.123,3-8l2-1v-3h-1v-3c3.217-.738,3.641-1.357,4-5,9.054-.334,9.281-6.335,17-8v-2l-3-2v-1h-3v-1h-2v-1l-3-1v-2c-1.62-2.375-9.68-.322-12,0q0.5-2.5,1-5c-3.537-.286-4.884-1.349-8-2a12.71,12.71,0,0,1-1-5h-2a34.651,34.651,0,0,1-1-7c-4.661-1.051-6.151-3.962-6-10h1v-3l3-2v-2h1v-6h1c1.393-2.11,1.765-2.334,2-6-2.612-1.382-1.693-1.769-6-2-0.931,3.664-3.031,3.643-5,6h-4c-1.4-.217.413-1.046-1-1v1h-2q-0.5,5-1,10h1v4l-11,1-2-1v1l-4,1-5-7c-2.95-2.045-2.522,1.776-4-3h-1v-4h-1q-0.5-1.5-1-3c3.865-.077,4.118.167,5-3h1v-5l2-1q-0.5-2-1-4h-1v-7c2.69,0.734,3.092,1.628,5,3v1h4q0.5,1,1,2h2v1h10v1h1l2-3c2.4-1.064,4.894,1.054,6,1v-1l5-1v-2h-2c-0.053-4.838,2.276-10.208,5-12v-1l3,1q0.5-1,1-2c2.6-2.29,3.773-3.007,9-3C776.139,266.139,775,265.4,777,266Z" />
        </a>

        <?php
        $kdwil = '13.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_9" data-name="Color Fill 9" class="cls-12" d="M763,296v5l-2,1c-1.234,2.871.416,5.75-1,8l-3,2c-1.517,2.318-1.752,4.542-2,8h1v3c0.855,1.359,4.358,3.233,6,4v1h-1v1h1v4c3.2,0.825,2.9,1.179,3,5l8,3q-0.5,2.5-1,5c5.009-.228,5.64-1.8,11-2,2.224,3.931,6.964,6.958,12,8v2c-0.763,1.215-3.823,1.191-5,2l-4,5h-2v1h-5c-1.424.862-.04,2.583-1,4l-4,2q0.5,3,1,6l-2,1q-1,3.5-2,7h-2c-4.084,4.836-9.8,6.028-10,15-2.287.289-2.57,0.158-4,1v1h-4v1c-3.026.945-5.369-1.5-7-1q-0.5,1-1,2c-2.9,1.2-7.451-.726-9-1q-0.5,1-1,2h-2v1c-0.573.4-4.021,2.387-5,2v-1c-4.865-2.981-1.026-2.888-3-6h-1v2c-1.139,1.139-.4,0-1,2-3.034-.362-3.218-0.647-5-2v-1h-2c-3.273-1.859-5.023-3.431-10-4v-2c-1.2-.984-1.984-3.24-3-4h-2l-2-3h-1q0.5-3,1-6l-4-3v-2l-2-1q-0.5-3-1-6c-1.01-1.328-2.531-.016-4-1q-0.5-1-1-2h-1a1.422,1.422,0,0,1,1-2v-1h-1c-0.177-1.144,2.058-1.894,1-4h-1a8.278,8.278,0,0,0-5-3q0.5-2.5,1-5h-1q-0.5-2.5-1-5h-1q-0.5-1.5-1-3c2.122-1.1,4.625-3.175,7-4,2.5-.869,5,0.293,7-1l7-8c0.2-8.477-.526-8.811-3-14h9c3.134,3.437,7.522,2.37,9,8,1.473,0.334,4.357,1.1,5,2v3h1v1h4v1a17.751,17.751,0,0,0,8,2q0.5-3,1-6h-1a7.271,7.271,0,0,0-2-4h-1v-2h-1c-1.358-1.473-.489-1.366-3-2-0.866-3.508-2.5-3.744-3-8l4,1v2a13.326,13.326,0,0,1,5,5l6-2a1.809,1.809,0,0,0,2,1v-1l5,1v-1l5-1q-0.5-5-1-10h1v-4h3v1c4.592,0.818,7.7-4.12,9-7A10.6,10.6,0,0,0,763,296Z" />
        </a>

        <?php
        $kdwil = '13.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_8" data-name="Color Fill 8" class="cls-13" d="M487,61h2a29.366,29.366,0,0,0,1,7,10.274,10.274,0,0,1,2,2h3v1c1.5,0.922,2.446.846,5,1,1.01-4.335,3.617-4.22,9-4,1.545,2.444,1.191.618,3,2,1.053,0.8,1.759,3.006,3,4l-2,4-6-1v1c-1.139,1.139-.4,0-1,2h-4l-1,3h1a13.76,13.76,0,0,0,4,3c-1.584,2.731-2.742,2.446-3,7h1v1l4-1,1,3,8-1v1l5,1V96l6-1v1l5,1v1h2v1h6q0.5,1,1,2c2.378,2.207,2.949,2.111,3,7-1.77,1.539-3.89,3.9-3,8a2.678,2.678,0,0,1,1,3c-1.3,5.39-4.688,10.507-9,13,2.3,4.9,7.551,6.726,9,12l4,1c-0.232,2.331-.246,2.528-1,4h-1q0.5,2.5,1,5l-3,2q-1,3-2,6a30.436,30.436,0,0,0-12,2v1h-6v1h-1v-1c-1.772-.417-1.639.9-2,1h-6v1h-3v1l-6-1a13.3,13.3,0,0,0-3-4l1-3h1v-7h1v-2h-1c-1.534-6.542-6.058-6.2-10-10l-6-7h-2l-1-2h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1l-6-2v-1h-4v-1h-3v-1h-5v-1h-1l-1-2a1.439,1.439,0,0,0,1-2l-2-1v-3h-1c-1.447-1.813-1.2-2.327-4-3v-1c-2.183-1.268-11.058,1.474-12,2l-1,2c-1.663.591-1.816-.961-2-1h-3v1l-3-1c-0.866-3.508-2.5-3.744-3-8,3.011-2.529,6.251-8.571,10-10h8v1l2-1,6-10q0.5-2.5,1-5l5-4c1.711-2.809-1.483-1.194,2-4V66h4l2-3h2l1-2h3V60c1.4-.861,1.722-0.74,4-1l1,3c3.68,0.367,6.453,2.431,8,2V63l4-1V61h3l2-3h1v1C487.139,60.139,486.4,59,487,61Z" />
        </a>

        <?php
        $kdwil = '13.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-14" d="M614,257h3v1h1v4c0.015,0.023,5.64,3.8,6,4-0.979,2.211-1.663,2.819-2,6h2l3,9c-3.194,1.992-4.169,5.721-6,9v2h-1v1l-6,1v1l-2,1v2h-1l-4,5h-1v2h-1v2h-1c-1.706,3.973,2.245,3.346-3,5v1h-1a8.114,8.114,0,0,0-3-5v-2a19.168,19.168,0,0,1,7-1v-5c-1.135-.844-0.145.127-1-1h-3q0.5-1.5,1-3h-1q-0.5-1.5-1-3l-2,1v-1c-3.423-3.171-1.5-8.152-3-13h-1v-5h-1q-0.5-2-1-4h-1c-1.665-2.07-3.178-3.03-4-6a34.651,34.651,0,0,1,7-1v-2c2.619-.681,3.223-1.586,5-3v-1h2v-1h2v-1l5-1v-1l6-1v1h1v3Z" />
        </a>

        <?php
        $kdwil = '13.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_18" data-name="Color Fill 18" class="cls-15" d="M645,255c-0.3,2.305-.207,2.533-1,4h-1q0.5,3,1,6l-5-1v-1c-3.933-1.149-9.915,2.545-14,3v-2c4.455-1.017,8.477-3.965,13-5C638.869,255.205,640.31,254.932,645,255Z" />
        </a>

        <?php
        $kdwil = '13.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-16" d="M651,229q0.5-1.5,1-3c2.437,0.918,6.193,1.037,10,1,1.094,2.078,1.611,1.771,2,5h-1l2,3h-1q-1,5-2,10h1q0.5,5,1,10l2,1c0.468,1.954-.57,1.321-1,2v1l-4-1v-1c-1.812-1.42-2.02-2.173-4-1v-2h-1q-0.5-1-1-2a1.413,1.413,0,0,0-2,1l-2-1s-0.725,1.634-2,1v-1h-1c-0.5-.843-0.547-3.095-1-4h2q-0.5-1-1-2h1v-5l-2-1c-1.079-3.258,1.814-3.379,2-4,0.328-1.095-1.19-4.077-2-6h2C650.139,228.861,649,229.6,651,229Z" />
        </a>

        <?php
        $kdwil = '13.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-17" d="M598,215q0.5-1.5,1-3l6-1q0.5,1,1,2h1v1h-1v1h-8Z" />
        </a>

        <?php
        $kdwil = '13.75';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-18" d="M602,191h-4l-6-7h3c3.291,2.817,4.317-1.558,6,4h1v3Z" />
        </a>

        <?php
        $kdwil = '13.76';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-19" d="M639,182c-4.465.372-2.915,0.628-7,0v-2c-0.348-.8-2.72-0.21-2-3l2-1v-2h-2q0.5-1.5,1-3a23.214,23.214,0,0,1,4,1v-1l7-1a7.742,7.742,0,0,0,3,2q-0.5,2.5-1,5h-1C641,179.264,640.061,178.328,639,182Z" />
        </a>

        <?php
        $kdwil = '13.77';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-20" d="M561,229h2v3c2.739,0.644,2.276,1.309,5,2-0.558,3.781-1.382,7.027-5,8v1h-1v-1c-1.139-1.139-.4,0-1-2h-2v-1h1a10.6,10.6,0,0,1-1-4c-2.132-.673-2.034-0.017-1-2h-2c-1.006-.994,1-1,1-1,1.383-1.435-1.787-.939-2-1v-3h1v-1c0.661-.419,3.237-0.62,4-1v1C561.139,228.139,560.4,227,561,229Z" />
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
                url: "ambil_sumbar_kiri.php",
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
                url: "ambil_sumbar_kanan.php",
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