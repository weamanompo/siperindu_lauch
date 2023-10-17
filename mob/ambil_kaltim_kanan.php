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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="555" height="479" viewBox="0 0 555 479">
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
            </style>
            <filter id="filter" x="201" y="324" width="92" height="131" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="185" y="112" width="203" height="237" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="247" y="23" width="247" height="146" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="167" y="224" width="121" height="126" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="233" y="87" width="263" height="165" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="260" y="309" width="63" height="79" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="50" y="114" width="178" height="155" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="293" y="330" width="36" height="31" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="320" y="268" width="33" height="45" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="350" y="226" width="22" height="26" filterUnits="userSpaceOnUse">
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
        $kdwil = '64.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Paser_01" data-name="Kab Paser 01" class="cls-1" d="M283,381v3l-19,6-1,3h-2c-1.389,5.217-3.1,2.335-6,5,3.768,0.366,5.3,1.542,9,0v-1h2v-1l2,1,1-2h1v1h6v4h-1v2c-0.305.626-2.425,0.529-2,2l3,2c1.094,2.457.063,13.122,0,15l-6,1a3.982,3.982,0,0,1-2,2v1h2c2.5,2.357,7.946.381,11,0v4h-3l-1,2-5,1v1h3c1.959-2.353,4.6-2.977,9-3v2l-4,1v2c1.135-.844.145,0.127,1-1,2.4-1.049,3.212-1.12,4-4h2c0.1,7.868-1.359,12.97-2,19l-6-1v-1l-10-1v-1l-10-2v-1l-9,1v-1H234v1l-6,1-1,3c-2.01-.574-0.865.12-2-1h-1c-1.2-2.134,1.221-5.23,1-6l-2-1v-4l-2-1v-2h-1c-0.222-1.4.77,0.395,1-1v-7h1c0.82-1.453.685-1.707,1-4-1.388-.473-1.655-1.339-4-1a1.755,1.755,0,0,1-2,1v-1h-2a7.173,7.173,0,0,1,1-4h-1a7.742,7.742,0,0,0-3-2c0.864-1.934,3.653-8,3-11h-1v-4h-3q0.5-3,1-6l-3-1q0.5-3,1-6l-3-2v-6h-1v-1l2-1v-3l3-2v-2h1v-2h1v-2h1v-2l2-1v-3c2.166-5.6,1.6-10.349,8-12-0.7-2.835-1.783-2.888-3-5a3.982,3.982,0,0,0,2-2l9,2v-1l3-1c1.678,0.246,4.5,3.429,8,2l1-2h2q0.5,2.5,1,5c3.1-.386,3.115-0.7,5-2v-1h4l1-2h1v-2h1l1-2h5v-1l2-1v-2c1.022-1.167,4.839-1.757,7-2,0.844,1.135-.127.145,1,1q0.5,2.5,1,5c-2.569,1.5-3.143,3.862-5,6l-2,1v7l-2,1c-1.1,1.97-1.982,8.658-1,12,1.214,4.132,2.673,8.772,3,14l2,1C272.571,378.575,279.9,380.713,283,381Z" />
        </a>
        <?php
        $kdwil = '64.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Kutai_Kartanegara_02" data-name="Kab Kutai Kartanegara 02" class="cls-2" d="M250,122v6h1v2h1q-0.5,4-1,8l-2,1c0.02,1.414.773-.4,1,1v7h-1v1h1v6l-6,1v7h-1v2h-1q0.5,4.5,1,9l-2,1v2c-0.375.571-1.346,0.824-2,2,5.112,0.953,6.283,3.882,11,5v3a29.413,29.413,0,0,1,7,1l1,3h1v2l2,1c1.743,1.988,1.868,3.131,2,7-3.17,2.159-1.312,4.061-1,9,3.277,0.647,4.957,2.162,7,4l1,2,6,1v1c6.438,5.15,3.611,19.144,2,27l20,1v-1h1v-6l4-3v-2l5-4v-2l2-1,1-3h1v-2h1l1-3,2-1c1.188-2.66-.752-7.835-1-9q0.5-5.5,1-11a3.982,3.982,0,0,0,2-2l3,1v-1c2.426,2.183,2.374,5.047,4,8h1v2l2,1v2l5,4v2l2,1c1.16,1.256,1.659,2.915,3,4,0.061,7.772-2.546,10.45-3,17,1.2,0.637,1.452,1.651,2,2h2v1h2l1,2h2l1,2h6s0.039,0.634,2,1v2h2v-1h1v1h9v4h1v1l-3,2q-1,4-2,8a9.733,9.733,0,0,0-4,1c0.828,2.656-.307,5.2,1,8l2,1v4h1c1.417-2.51,2.05-2.866,6-3a9.749,9.749,0,0,0,1,4c2.784-.549.1-0.77,3,0v1h1c-1.163,2.923-2.634,4.626-4,7h1c2.4-4.061,1.823-1.349,6-3v-1l5-1c1.139,1.139,0,.4,2,1v6l-6,2c1.139,1.139,0,.4,2,1a34.218,34.218,0,0,1-1,8h-2q0.5,2.5,1,5c-1.135.844-.145-0.127-1,1h-3v3h-4v1h5v2h7v2h1l-1,3h-8c0.549,2.784.77,0.1,0,3l-9-2,1,3h-1v-1h-1v1l-3-1v1c2.212,1.377,2.7,2.621,3,6l-7-1c-2.735.707-4.052,2.531-8,3a8.3,8.3,0,0,0-2-2v-4h-1q-0.5,2.5-1,5c-7.928.947-8.55,6.631-12,12l-2,1v2l-3,2v1h-7c-1.166-1.361-1.825-1.528-4-2-0.945-1.8-1.385-1.574-2-4h-5v-5c2.762-.723,2.237-0.279,3-3h2c1.916-2.293,3-1.275,4-5-2.719-1.466-4.57-3.078-5-7l-17-2c-0.644,1.319-1.6,1.378-2,2-2.21,3.415.667,4.326-5,5-2-2.521-4.527-3.833-9-4,0.262-3.176,1.01-3.822,2-6-4.827-.564-2.94-1.879-7-3-0.728-3.071-2.677-4.665-4-7v-2l-2-1-3-10h-2v-1h1l-1-2h1v-1a12.186,12.186,0,0,1-2-2c2.01-.574.865,0.12,2-1-2.393-.607-1.858-0.318-3-2,2.041-1.34,1.878-1.637,2-5h6l-1-3h-1v-3h-1v2l-6,2v-1c-5.875-1.13-7.951-5.27-12-8h-2l-1-2-3-1-1-3-6-5v-5c2.512-1.365,3.6-2.333,4-6l-3-2v-1h-2v-1c-2.68-1.715-1.887.965-3-3h-1v-5c-3.516.168-7.759,0.414-8,1h-1v-5c-1.735-1.595-2.071-2.079-1-4h-1v1c-1.4.226,0.268-.374-1-1-2.045-2.212-.221-7.217,0-11-4.181-2.46-5.884-7.614-11-9v-6c-6.262-1.1-4-1.673-7-5l-3-2v-2c-2.691-3.641-4.624.384-5-7h-1c-0.405-1.1,2.462-7,3-8h1v-2h1v-8h1v-5h-1v-5h-1v-3h-1c-0.9-1.515-.855-2.438-1-5,1.707-1.082,2.124-2.129,3-4,8.426-.3,9.471-2.917,17,0a15.853,15.853,0,0,1,7-9h3v-1c0.707-.617,2.164-0.543,2-2,0,0-1.784-.554-1-2h1c0.908-1.084-.188-0.232,1-1h1l2-3h3c2.422-1.606-.121-3.58,5-5q0.5,1,1,2c1.226,0.7.284-.845,1-1l3,1v1h2v1Zm23,147h7v-1c-1.139-1.139-.4,0-1-2l-3-1,1-3h-2a6.719,6.719,0,0,1-3,3Zm-1,1v3h1v-3h-1Zm62,6c-0.491,2.409-1.256,5.862-3,7-1.493.974-3-.341-4,1-1.433,1.913-.971,5.791-1,9,1.266,0.947,1.059,2.253,2,3h2c2.557,1.937,3.03,4.271,3,9,2.448,0.558,2.21,1.043,4,2v-1c1.139-1.139.4,0,1-2,2.927-.684,3.274-1.113,4-4h2c-0.213-1.73-.4-5.158-2-5v-1h2v-7l2-1q0.5-4,1-8c-1.135-.844-0.145.127-1-1l-4,1v-3h-1c-1.139-1.139,0-.4-2-1v-1c-1.312-.377-2.532,2.755-3,3h-2Zm26,0v2h1C360.426,275.99,361.12,277.135,360,276Zm-3,14h-2v3h1c1.286-2.269,1.628-2.637,5-3v-2c-1.413.054,0.393,0.758-1,1-0.86,1.889-1-2-1-2a3.982,3.982,0,0,0,2-2l-3-2C359.158,286.648,357.9,286.015,357,290Zm-10,5c1.139,1.139,0,.4,2,1C347.861,294.861,349,295.6,347,295Zm6,8v3h1v-3h-1Zm11,2v2h1C364.426,304.99,365.12,306.135,364,305Zm-26,8c1.34,2.041,1.637,1.878,5,2v-1A11.878,11.878,0,0,1,338,313Z" />
        </a>
        <?php
        $kdwil = '64.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Berau_03" data-name="Kab Berau 03" class="cls-3" d="M379,45c3.2,0.825,2.9,1.179,3,5,2.753,0.56,6.732,1.952,8,1l5-6,6,1,2-3h2c0.944,1.8,1.385,1.574,2,4h-2c1.139,1.139,0,.4,2,1v1l4-1q0.5,2,1,4h2c-0.955,5.924-4.937,11.01-12,11v1l-3-1v1h1c1.889,0.859-2,1-2,1V64c-1.139-1.139-.4,0-1-2h2V61l-20,3v1h2a3.982,3.982,0,0,0,2,2V65l3-1v1h1V64l4-1,1,2,2-1v3c-1.8.945-1.574,1.385-4,2V66h-1v3h-4V67l-3,1q-0.5,3-1,6h-1l1,3,3-1v1l4,1V77h-2V76h1V75h1v1c2.4,2.156.809,3.313,2,5h1V79c2.762,0.723,2.237.279,3,3h1v5h-2V85h-1v2c1.139,1.139.4,0,1,2h3v2c3.565,3.061,1.848,4.895,9,5v1h5v1h1c1.129,1.994-1.408,3.077-1,4l2,1v2l4,3,1,2h2l1,2h2l1,2h2l1,2,4,1,1,2,2-1,1,2h2l2,3,2-1v2c1.139,1.139.4,0,1,2h-3v2l3-1c-0.113,3.16-1.955,1.874,1,3,2.989,3.992,7.481,1.173,12,3v1h2l4,5c4.1,2.952,9.53,4.429,11,10h-4v1h1v1h3l2,3h2c1.2,1.062.883,2.764,1,5,5.092-.842,11.093-4.478,12,4h-1v-1l-3,1v-2h-1v1c-1.375.331,0.374-.663-1-1s0.378,0.683-1,1l-2-1v2h-1v-1h-5l-1-4h-1c-0.219-1.963,1.314-.222,0-4l-3,1v-1h-4v1h-1v-1h-1l-1,2h-1v-1l-3,1c-0.789-3.229-1.856-3.449-2-8h1v-4h-2l1-2h-2v1c-1.139,1.139-.4,0-1,2-2.517-.637-1.627-0.549-3-2h-1v-2c-0.727-.916-2.057-0.778-3-2l-2,1v1c-3.026.863-2.025-3.02-5-2v1h-1l1,3-2,1,1,3h-3v-1h-4c-1.772-.956-2.457-5.6-5-3v-2c-2.762.723-2.237,0.279-3,3h2v1h-1c-0.679,1.338-1.2,1.053-2,2v2c-1.1.892-.918-0.816-1-1-3.169,1.279-6.707-.274-9,1v-1c-2.581-1.5-7.373-10.673-10-8v-2a9.3,9.3,0,0,1-7-5c3.975-2.2,5.086-5.655,5-12-1.486-.448-1.779.878-2-1,0,0,2.069-.075,1-1l-2,1v-2c-1.946-2.494-3.128-1.455-4-6-2.01-.574-0.865.12-2-1,2.01-.574.865,0.12,2-1-2.01.574-.865-0.12-2,1h-1v1h1c0.979,1.654-1.44.846-2,1v1h-1v-1c-3.34-.84-2.177-0.825-5,0,0.085-4.107-.253-7.287-1-8-0.752,1.979-1.08,1.035,0,3h-2l1,2h-2l-2,3a11.04,11.04,0,0,1-2-2h-3v-1h-1v2l-2-1v1h-1v4h1l-1,2c-1.8.944-1.574,1.385-4,2l-2-3h-2l1-2-3-2v1c-1.3,1.556-.983-1.946-1-2l-3,1v1h1c1.889,0.86-2,1-2,1v2l-2-1c0.252,1.392-.211.269,1,1v1h-2v2h2c-1.27,3.362-.669,3.487,0,7h-2l1,3-3,1v1h-4l-1,3s-1.84-1.142-3,0v2h-1v-1c-5.178,1.385-2.646-.575-6-3v-1c-2.365-.919-2.834,1.965-3,2h-1v-1a9.015,9.015,0,0,0-6,1v-1h-1l1-3h-2c-0.9-1.092.952-.773,1-1,1.535-1.319-1.926-.977-2-1l1-3c-1.285-.59-0.341-0.569,1-1v-4h-1l1-2h-1v-1l-2,1v-2l-2,1v-1c-1.087-.9-0.191.16-1-1h1v-1h-4v-1l-3,1s-0.042-1.268-2-1a2.573,2.573,0,0,1-3,1l-2-3a1.461,1.461,0,0,0-2,1c-2.215.307-2-1-2-1-3.182-.852-7.2.465-9,1v-1h-1l-1,3h-1v-1h-3c-0.392-2.7-1.482-2.812,0-5h-1c-1.239-2.206-2.827-3.525-4-6l-6,1v-1h-1V99h-1v1l-4-3,1-2c-1.625-2.259-5-2.043-9-2V92l-3,1V92h-2a15.684,15.684,0,0,1-1-6c2.668-2.384.494-3.03,2-6l3-2V74h-1c-0.42-2.314.557-2.647,1-4,5.281,0.107,7.972-.825,9-5h1c0.065-.226-4.4-4.881-5-7,5.185-3.093,2.668-4.085,12-4v1h4l-1-2h1a18.821,18.821,0,0,1,2-2q-0.5-5-1-10h6v1c0.744,0.439,3.862,2.4,5,2V43c1.341-1.083,1.808-2.788,3-4,1.483-1.508,3.659-2.35,5-4,2.01,0.574.865-.12,2,1,1.82,1.807,3.416,7.811,4,11h2q1-3,2-6h1c2.946-3.364.523-.38,4-2V38a25.466,25.466,0,0,1,12-3c0.617-3.469,1.648-5.168,5-6,2.541-2.027,7.122,1.061,11,1a6.186,6.186,0,0,0,4-1V28h11c1.645,2.87,3.2,3.212,6,5l1,2h5l1,2,4-2v1c2.11,1.3,3.593,4.005,5,6h1v3Zm17,27c-0.723,2.762-.279,2.237-3,3l-1-3h3V71c-2.393-.607-1.858-0.317-3-2,1.8-.945,1.574-1.385,4-2v1h1c0.628,0.964-.087,3.549,1,4h-2Zm4-4h3v1h-1a7.741,7.741,0,0,1-3,2Zm-17,4h2v2h-2V72Zm8,10v2h1C391.426,81.99,392.12,83.135,391,82Zm55,46,3,1v2h-1c-1.139-1.139,0-.4-2-1v-2Z" />
        </a>
        <?php
        $kdwil = '64.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Kutai_Barat_07" data-name="Kab Kutai Barat 07" class="cls-4" d="M260,274c3.2,0.826,2.9,1.179,3,5-1.139,1.139-.4,0-1,2-2.316.875-4.407,1.017-8,1-1.746-2.049-4.051-2.062-8-2,1.006,3.858,2.93,3.142,4,7a5.442,5.442,0,0,0-2,2h1v1a19.168,19.168,0,0,1,7-1c1.305-3.563.381-4.469,5-5v1h3v2h-1c-0.711.656,2.874,1.766,3,2v5h1l1,4,2,1v2h1v2h1v2l2,1v2c0.958,1.305,5.047,3.54,7,4q-0.5,3-1,6a1.615,1.615,0,0,1,1,2h-1c-1.341,3.47-2.567,5.9-4,9-4.327.076-8.056,0.606-10,3l-1,3h-6c-1.159.669-1.234,4.076-2,5-1.283,1.548-3.028-.044-5,1l-2,3h-3q-0.5-2.5-1-5h-2l-1,2-4-1v1h-1v-1h-3v-1h-1v1l-6,1v-1h-2v-1c-3.808-1.053-6.7,3.013-9,4v-1h-1v-3c-3.515-.915-2.853-2.433-7-3v-5a25.059,25.059,0,0,1-9-7h-1v-2l-4-3v-1h-5v-1h-4q-0.5-2.5-1-5h-1v-9h-1v-7l-3-2q-0.5-2.5-1-5l-5-4c-0.288-.68,1.872-2.919,1-5l-2-1q-0.5-3.5-1-7h2c-0.145-3.644-1.253-4.6,0-7l2-1q-0.5-2-1-4l4-2v-2h1q-0.5-2.5-1-5l4-3q0.5-1.5,1-3l3,1q0.5-1,1-2l3-1c-0.119-7.688,2.457-7.367,10-7,2.744-2.478,13.939-1.119,18-1,0.944-1.8,1.385-1.574,2-4,2.753-.56,6.732-1.952,8-1h1q0.5,3,1,6l9,6v2c-2.442,1.243-5.776,4.6-4,7v2l5,4v2l4,3v1l4,1,4,5h2v1h2v1C259.77,272.712,258.811,270.088,260,274Z" />
        </a>
        <?php
        $kdwil = '64.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Kutai_Timur_08" data-name="Kab Kutai Timur 08" class="cls-5" d="M317,115v2h1v-1c1.481,0.764,1.236,1.915,3,3-0.978,2.886-.882,3.618,0,6h-2s0.891,0.591,1,4h2c-0.842,2.256-.749.746,0,3h-2v1h1v1h1v-1c1.672-.455,1.8.959,2,1a2.858,2.858,0,0,0,3-1l3,1v-1h2v1h2v1h-1a7.259,7.259,0,0,0,3,3v-1h-1c-1.843-.95,2-1,2-1v1h1v-2l2,1v-1h1v-2c1.048-.949.9,0.965,1,1,1.419,0.494,1.43-1.746,2-2,1.292-.575-0.159.777,1,1,2.271,0.438,2.232-.924,3-2h1l-1-2h2l-1-3h1c0.862-1.5.924-2.433,1-5-2.01-.574-0.865.12-2-1h1c0.642-1.128.055-2-1-2v-1h2v-2l2,1v-1h-1c-1.843-.95,2-1,2-1a7.742,7.742,0,0,1,3-2c0.644,2.523.584,1.605,2,3v1h2l-1,2c0.754,0.914,1.31.744,2,2,1.99-.649,2-1.344,4,0v-1h1v-1h-1s3.117-10.289,4-7l3-1,1,3c2.622-.85,1.439-0.046,4-1,0.839-2.241.771-.761,0-3h2l-1-3h1v1l3-1v7l3-1v1c1.139,1.139.4,0,1,2h2l-1-3,4-1v1h1a1.4,1.4,0,0,1-1,2c-0.372,2.316.892,2.18,2,3v1l2-1v1c1.139,1.139.4,0,1,2h2c-0.907,3.122-.407,4.367,0,9h-2a9.877,9.877,0,0,1-4,4v1h1l2,3,2-1,1,3,3-1v2l4,3,1,2h2v1h-1l1,2,3-1v2l3-1h1v1l3-1c0.175,0.232-.142,1.834,1,1v-2l2,1v-1h1v-1h1v-1h-2l1-3,3-1c0.7,2.835,1.783,2.887,3,5a10.6,10.6,0,0,1,4-1l1,3h2c-0.771-1.016-1.229-.984-2-2h3l-1-4h2c-0.549-2.784-.77-0.1,0-3,1.191,0.727,2.927,3.713,5,3v-1h1v-1h-1v-1h3c1.079,4.1,1.573,1.315,3,3l-1,2h1v1l3-1v1h1v-2l3-1v2h-1c-0.888,1.692,1,3,1,3,0.519,2.456-.255,2.141-1,3l1,3h-1v1h1v1h1v-1c1.654-.979.846,1.44,1,2h2v-2h6v1l4-1v1c1.006,0.835,3.118,3.14,3,5a1.777,1.777,0,0,0-1,2h1v1h1v-1c0.4-.038,2.244.884,4,1v-2c1.413,0.054-.393.758,1,1,0.859,1.889,1-2,1-2h3v2c1.413-.054-0.393-0.758,1-1,0.86-1.889,1,2,1,2l3-1v1c0.416,0.579,1.633.147,1,2h-1c-1.416,5.231-4.583,3.33-6,8h-4c-1.439,2.465-3.138,2.788-4,6l-8-1v-1c-1.3-.9-2.313-2.678-5-2v1h-3l-2,3c-1.774.743-1.551-.755-2-1h-1v1c-3.99.688-7.115-3.592-10-3v1h-3l-2,3-3-1v-3c-8.516-.609-16.336-3.445-24-5v-3h-1v-1h-3c-0.214-2.306-.189-2.574-1-4h-1v-1h1q-1-2.5-2-5l-7-4v2h-1v1h1l3,4h1v2h1v2h1v3h1v3h1c2,3.914,2.877,4.978,3,11a10.6,10.6,0,0,1-4,1c-1.524-2.485-1.082-.621-3-2v-1c-1.718-1.377-2.006-1.661-5-2-2.069,2.25-2.261.708-5,2v1h-2l-1,2h-2v1c-4.225,3.593-3.909,5.621-5,12h-3l-3,9-2,1v2h-1a1.548,1.548,0,0,0,1,2l-1,4h-1c-1.127-1.719-.633-1.355-3-2,0.715,4.169.248,4.189,0,9h-2q-0.5,3.5-1,7c0.262,1.39,1.247-.393,1,1h-1v1a10.6,10.6,0,0,1-4,1l-1,3h-1c-1.925,3.663,1.029,4.63-4,6q-0.5,3-1,6c-3.541-.38-3.036-1.241-6-2v2l-4-2-1-2a3.474,3.474,0,0,0-4,0v-2l-2,1v-2h-1a7.561,7.561,0,0,1-2-4h1l-1-4h2l-1-3h2l-1-3v-1h1l-1-3h1v-1h-2c-0.094-1.411.012,0.011,1-1-0.708-1.411-1-1.04-2-2v-1h-2l1-2-2-1-3-4h-2l1-2c-1.2-1.466-4.132-.142-2-2v-1h-2l1-3-2,1,1-3h-2l1-2h-1v-1h-2l-1,2h-1v1h1c0.979,1.654-1.44.846-2,1q0.5,4.5,1,9h-1v1h1v2h1c1.183,3.651-1.9,4.052-2,6h1v1h-2l1,2c-1.251,1.159-2.792-.379-3,2,2.1,1.413-1.74.682-2,3,2.059,1.384-.937.9-2,2l1,2h-2l-1,2-4,3,1,2h-2v1l-3,2v1h1c0.639,5.186-1.584,5.649-6,6-1.893-1.732-11.536-.133-16,0q-0.5-3-1-6l2-1q-0.5-2.5-1-5,0.5-4.5,1-9h-1l1-3h-2v-1h1l-2-4-2,1v-2a15.533,15.533,0,0,1-4,1v-2l-4-3v-1l-2,1v-2l-2,1c-1.285-.591.312-0.472-1-1,1.336-3.445.345-5.83-1-9,1.975-1.129,2.338-1.417,3-4h-2v-1h1l-3-4h-2v-1h1c-0.664-1.4-1.158-1.035-2-2v-1h1c-1.147-1.22-.028-0.333-2-1v1c-4.1,1.837-4.678-4.228-6-5l-3,1v-2l-2-1v-1c-2.08-1.6-2.383-.337-5,0v-4h1q-0.5-1-1-2h2v-1c1.406-1.41,1.323-.489,2-3h-2v-1h1v-1h-1v-1h1v-4h1q-0.5-1-1-2h1v-3h1q-0.5-1.5-1-3h2v-2l4,1v-1h1q-0.5-1.5-1-3h1v-1h-2q0.5-1.5,1-3h1q-0.5-1.5-1-3c0.774-.836,1.353.369,1-1h-2v-1h1v-3h1q-0.5-1-1-2,0.5-1,1-2c0.581-1.289,1.16.405,1-1h-1q0.5-1.5,1-3h-2v-1h1q-0.5-1.5-1-3h1q-0.5-1-1-2h1v-1h-1v-1c-2.153.671-1.823,1.173-4,0v-1l-2,1v-2l-3,1v-1h1v-1h-1v1c-1.258-1.119-.431.034-1-2,4.008-2.885.083-3.347,2-7h1l3-4,3,1v-2h1v-2h1v-3h1V97h1V94l3-1V92l3,1V92h1l1,2c4.443,2.024,4.17-1.716,7,3h1l-1,2h1c0.866,1.092.689,1.094,2,0,1.726,3.343-1.239,3.811,4,5,0.593-.88.911-2.739,3-2v1h1v2h1l1,2c0.489,0.256.589-.962,3,0a10.838,10.838,0,0,0,0,7h1v-1l2,1v-2l2,1,1-2,9,1v-1c1.435-.814,1.7-0.756,4-1l-1,2h1l1,2h1v-1h1v1l3-1v1h1v-1h1l2,1a1.561,1.561,0,0,1,2-1S314.383,114.437,317,115Zm-45-13h2v1h-2v-1Zm47,94h2v1C318.99,196.426,320.135,197.12,319,196Z" />
        </a>
        <?php
        $kdwil = '64.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Penajam_Paser_Utara_09" data-name="Kab Penajam Paser Utara 09" class="cls-6" d="M317,323q-0.5,2.5-1,5l-4,1-1,3c-3.458,1-1.83,1.318-4,3v1l-4-1v1c-1.474.769-1.682,0.721-4,1v3h-1c-1.87.9,2,1,2,1,1.044,4.112,1.769,1.457,3,3v1h-1l1,3s-1.664.592-1,2h1v1h1v-1h1v3h-1v4h-2v6l-9,2v1l-6,1-1,2-3,1v5h1q0.5,3.5,1,7h-1l-14-5c-2.172-2.834-.819-7.007-2-11-0.789-2.668-3.864-9.091-2-14h1v-2l2-1v-7l7-6q-0.5-4-1-8h1v-3h1v-2h1v-3h1c2.04-2.415,1.633-1.936,6-2,1.417,2.51,2.05,2.866,6,3,0.856-4.221,2.848-4.419,5-7l15,2,1,3,2,1C315.816,322.493,312.947,321.745,317,323Z" />
        </a>
        <?php
        $kdwil = '64.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Mahakam_Ulu_11" data-name="Kab Mahakam Ulu 11" class="cls-7" d="M117,127v3l3,1v1h2v1h5q0.5,1,1,2l2,1c1.766,3.589-2.413,1.871,0,4v1h2q0.5,1,1,2a29.973,29.973,0,0,0,8,6c0.574-2.444,1.047-2.206,2-4,4.526,2.2,3.38,2.962,9,2q0.5,2.5,1,5c2.066,0.732,6.516,1.714,10,1,1.385-.284-0.4-1.2,1-1v1a31.847,31.847,0,0,1,4,1,10.6,10.6,0,0,1,1,4c4.295,0.32,11.915,1.848,15-1h1v-2l3-2q-0.5-3-1-6l2-1v-2l6-2v3h-1v-1c-1.581-1.142-.931,2.458-1,3l3,1v1h-1c1.128,1.055-.006.45,2,1q-0.5,1.5-1,3h1q0.5,4.5,1,9-0.5,3-1,6h-1q0.5,1.5,1,3h-2q0.5,1,1,2h-2q0.5,1,1,2l-3,1c0.121,1.409.863-.408,1,1,0.214,2.189.323,4.176-1,5v1h1c1.873,2.728,1.2.95,4,2q-0.5,1-1,2l6,4c0.047,1.413-.094-0.086-1,1l2,3a10.6,10.6,0,0,1,4-1c0.513,3.361,1.587,3.725,0,7h1v1h1v-1c1.386,0.743,1.058.936,2,2h1v2l6,5v1h2q-0.5,3-1,6h-2c0.649,1.991,1.344,2,0,4h1c1.736,2.9,1.85.914,3,2,1.028,0.971-1,1-1,1-1.109,1.595,1.549.876,2,1v6h-2v3l-7,1a2.741,2.741,0,0,0-3-1v1h-4v-1h-1v1c-4.069,1.117-11.025-.046-12,1-1.951,1.674-2.722,4.666-3,8-3.583.627-7.16,1.632-9,4q-0.5,1.5-1,3h-1v-1h-1v1h-3v1h-2v1h-2v1h-2v1h-2l-2,4h-3v1h-2v1h-2l-1,2h-4v-1a2.7,2.7,0,0,0-3,1h-2v-1h-1v-7h-1v-2h-1v-5h-1c-0.7-2.248-.25-4.013-1-6l-7-1q-0.5-1.5-1-3h1v-3c0.832-2.231,2.355-4.195,3-7,4.047-1.03,1.263-.443,3-3h1c0.916-1.317.788-1.77,1-4l5-1v1h1v-1h6v2c1.135-.844.145,0.127,1-1,4.158-1.8,7.506-4.456,8-10a15.164,15.164,0,0,1-5-5v-2l-3-2q-0.5-2-1-4l-2-1v-4l-3-9c-2.213-1.192-2.988-2.33-6-3v2l-3,1v3h-2q-0.5-1.5-1-3h-2v1h-5l-2,3c-1.658-.21-1.061-1.348-2-2-1.6.216-1.2,1.372-4,2-1,4.2-4.655,6.022-10,6q-0.5,3-1,6l-6-1c-1.382,2.612-1.769,1.693-2,6-2.54-.152-3.514-0.055-5-1v-1H98v-1H85v-3H84c-1.139-1.139,0-.4-2-1l1-5c-1.139-1.139-.4,0-1-2a13.294,13.294,0,0,1-4-3c-7.948,3.244-12.516,4.925-23,3,1.364-5.036,3.767-2.805,5-5v-6h1a9.292,9.292,0,0,0,2-4c-3.1-1.677-4-3.032-4-8,5.5-3.094,1.791-5.095,1-10h4c1.61-4.392,1.972-6.805,8-7v1h1v-1h2v-1l3,1v-1c1.021-.85,3.1-3.121,3-5H80v-3l3-1-1-3H81v-1h1v-7l6-2v-2l6-1,1-2,6-1q0.5-1,1-2c1.967-.44,1.3.554,2,1C109.077,122.185,111.771,125.8,117,127Z" />
        </a>
        <?php
        $kdwil = '64.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kota_Balikpapan_71" data-name="Kota Balikpapan 71" class="cls-8" d="M321,343h2v5c-3.428.871-2.575,2.068-6,3v2c-4.416.927-5.5,1.97-12,2v-2c0.564-.605,1.522.314,1-1l-3-2q-0.5-3.5-1-7l-4-2,1-3c2.11-.316,2.815.055,4-1v-2h1v1a8.977,8.977,0,0,0,6-1v1c4.3,1.054,4.715,4.71,8,6l3-1v2Z" />
        </a>
        <?php
        $kdwil = '64.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kota_Samarinda_72" data-name="Kota Samarinda 72" class="cls-9" d="M342,278h5c-0.243,2.332-.252,2.523-1,4h-1l1,3h-1v2h-1v7h-2c0.844,1.135-.127.145,1,1,1.139,1.139,0,.4,2,1l-1,4c-2.762.723-2.237,0.279-3,3h-2l-2,4c-1.8-.945-1.574-1.385-4-2q0.5-3,1-6l-3-1-1-2h-2c-0.752-.578-0.786-2.019-2-3-0.013-3.185-.416-7.116,1-9,1.007-1.341,2.5-.027,4-1,1.759-1.142,2.485-4.59,3-7h2c0.648-.323,1.456-3.138,3-3v1l3,1v3Z" />
        </a>
        <?php
        $kdwil = '64.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Bontang_73" data-name="Kota Bontang 73" class="cls-10" d="M362,234c2.393,0.607,1.858.318,3,2h1v1h-1v1h-3v1h-1c0.993,3.074.934,0.955,0,4h3v1c-1.139,1.139-.4,0-1,2l-8-1v-5c3.423-2.033,3.182-5.06,6-7v-1C361.95,230.157,362,234,362,234Z" />
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
                url: "ambil_kaltim_kiri.php",
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
                url: "ambil_kaltim_kanan.php",
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