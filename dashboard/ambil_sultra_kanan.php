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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="35%" height="35%" viewBox="0 0 447 461">
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
            </style>
            <filter id="filter" x="227" y="333" width="38" height="39" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="213" y="160" width="36" height="34" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="217" y="354" width="55" height="38" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="152" y="313" width="97" height="52" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="194" y="249" width="58" height="55" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="273" y="169" width="52" height="46" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="50" y="76" width="122" height="156" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="262" y="217" width="59" height="106" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="88" y="44" width="140" height="123" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="18" y="21" width="84" height="130" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="338" y="325" width="90" height="109" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="93" y="218" width="90" height="142" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="150" y="171" width="132" height="78" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="244" y="305" width="77" height="79" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="198" y="235" width="86" height="98" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="79" y="35" width="173" height="164" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="49" y="122" width="97" height="134" filterUnits="userSpaceOnUse">
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
        $kdwil = '74.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="bau_bau_72" data-name="bau bau 72" class="cls-1" d="M250,341a9.749,9.749,0,0,0,4-1,7.173,7.173,0,0,1-1,4h1c1.139-1.139,0-.4,2-1v2h2l-1,2h1v2h1c0.12,0.695-1.532,2.222,0,3h-2c0.113,3.16,1.955,1.874-1,3,0.113,3.16,1.955,1.874-1,3v2c-4.1.633-3.127,0.22-8,0v2l-2-1v1h-2v1l-3-1v1c-1.719,1.127-1.355.633-2,3l-6-2a9.3,9.3,0,0,1,5-7v-1h6v-1h1v-3c-1.139-1.139-.4,0-1-2-2.393-.607-1.858-0.318-3-2h2c0.195-2.293.169-2.6,1-4h1v-4h1v-1h3v1h1v-1C250.654,338.021,249.846,340.44,250,341Z" />
        </a>

        <?php
        $kdwil = '74.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kendari_71" data-name="kendari 71" class="cls-2" d="M228,169a60.687,60.687,0,0,1,12,1q-0.5,1.5-1,3c-4.712-.113-6.931-1.036-10,0,0.844,1.135-.127.145,1,1,2.678,2.022,4.125-1.768,8,0l2,3h3v1h-1c-0.892,1.174-2.391,1.157-3,2v2h-1c-1.477,2.9,1.068,1.909-2,4v1c-0.95,1.843-1-2-1-2-3.87.367-4.143,1.544-8,2v-2h-2v-2c-2.762-.723-2.237-0.279-3-3l-4-1c0.112-2.1.915-7.845,2-9,0.76-3.394,2.141-4.622,6-5C226.944,166.8,227.385,166.574,228,169Z" />
        </a>

        <?php
        $kdwil = '74.15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="buto_selatan_15" data-name="buto selatan 15" class="cls-3" d="M259,384c-0.262-3.176-1.01-3.822-2-6-1.135.844-.145-0.127-1,1-1.4,1.2-2.207,3.241-3,5-1.135-.844-0.145.127-1-1-0.967-1.339.609-3.667,1-7h-2l-6,10h-2c-0.6-1.148-1.717-1.534-2-2v-2h-1v-4l-2-1v-2c-1.479-2.9-2.723-4.551-3-9l2-1c1.007-.993-0.261-0.359,1-1v1c1.456,0.421,1.382-1.647,2-2h2v-1l3,1,1-3h1v1h4v-1a1.669,1.669,0,0,1,2,1c2.28,0.441,2.684-.535,4-1,0.688,2.36,3.265,5.32,5,3v2c2.424,2.485.939,4.177,2,8,0.378,1.363.763-.394,1,1-0.758,1.194-1.3-.382-1,1h1q0.5,2.5,1,5c-4.018,2.8-1.018,5.594-8,6l-1-2h2Zm-36-21,5-1v1h-1v5h-1v1h-2c-0.945-1.8-1.385-1.574-2-4C223.139,363.861,222.4,365,223,363Zm3,14h5a15.682,15.682,0,0,1,1,6c-2.609,1.381-4.038,2.612-8,3-1.139-1.139,0-.4-2-1C223.146,380.707,225.293,382.076,226,377Z" />
        </a>

        <?php
        $kdwil = '74.14';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="buton_tengah_14" data-name="buton tengah 14" class="cls-4" d="M202,318h5c0.51,1.319.412-.286,1,1v3l2,1v1h2l1,2c4.305,2.629,8.93,1.575,14,1v-3c2.3,0.276,2.551.19,4,1v1h7v2h-2l-1,3h7v1h1v12c-3.16.113-1.874,1.955-3-1l-3,1v5c0.055,0.25,1.292.327,1,2h-1v2h-1c-2.826-3.908-3.241.2-8,1q-0.5-2.5-1-5l2-1q0.5-4.5,1-9h-2c0.317-3.543,1.314-3.949,2-7h-1c-1.361,2.39-2.852,3.35-6,4,0.3,2.313.228,2.523,1,4h1q-0.5,2.5-1,5h-2v4h-3v1h-1v-1h-4c-0.844-1.135.127-.145-1-1-0.286-3.537-1.349-4.884-2-8l7-1v-1l-7,1c-0.844,1.135.127,0.145-1,1q0.5,3,1,6h-1c-1.34,2.041-1.637,1.878-5,2-2.174,2.021-5.043.373-8,0-0.036-4.245-.712-10.262,1-13l3-2q0.5-2,1-4h1l-1-3h-1c-0.466-2.924,1.834-2.39,2-3Q202.5,320.5,202,318Zm-45,41a46.016,46.016,0,0,0,1-9c4.906-.19,8-1.476,12,0-0.98,2.851-1.319,3.064,0,6h-1c-1.256,1.909-1.014,1.659-4,2C163.147,356.6,160.4,358.552,157,359Z" />
        </a>

        <?php
        $kdwil = '74.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="muna_barat_13" data-name="muna barat 13" class="cls-5" d="M241,283c3.2,0.826,2.9,1.179,3,5h-1c-0.226,1.4.374-.268,1,1-0.959,1.179-3.294,2.021-4,3v2l-2,1,1,2c-1.538,1.623-.693-0.814-2,1-3.336-.825-4.646-3.149-7-5v-1l-4-1s-0.081,2.075-1,1v-2l-3,1v-2l-2,1v-2c-1.026-.974-0.958.972-1,1-1.614,1.075-.864-1.521-1-2-2.037.321-2,1-2,1l-3-1-1,2-5,1q-0.5-2-1-4h-1v-4h-1v-2h-1l1-3c2.6-1.7,4.669-6.11,6-9,1.152,0.193,9.394,1.195,12,0l1-2h2v-1h2v-1h2l1-2h3l3-4h1v-3h1v-1h1v1h3v1h-1v2h1v5l3,1c0.935,1.061-.875.962-1,1l-1,3-2-1-1,2h-1v2l-2-1v1l-4,3c0.574,2.01-.12.865,1,2l1,3c0.8-.319,3.14-2.048,5-1v1h1v4Zm-34-16h-3v-1c1-.684,1.8-0.5,2-2-0.563-.857-1.469.334-1-1,0.068-.193.692-0.019,1-2h2l1-3h1v4C207.731,263.286,207.363,263.628,207,267Zm-7-6c0.686,0.129,4.79,1.28,4,2h-1c0.844,1.135-.127.145,1,1v1h-4c-0.844-1.135.127-.145-1-1Zm34,13c1.139,1.139.4,0,1,2h-1v-2Z" />
        </a>

        <?php
        $kdwil = '74.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="konawe_kepulauan_12" data-name="konawe kepulauan 12" class="cls-6" d="M288,174c2.252,0.247,2.639.1,4,1v1h2v1h2l1,2c1.895,0.813,5.82-.592,7-1v-1l2,1c1.234-.126,2.625-1.855,5-1l8,7v4h-1q-0.5,3-1,6h-3v1h-1v3l-4,2v1l-2,1v2h-1v2l-2,1v1h-2v1c-3.471-1.379-7.1-3.491-11-4v-2l-5-1q-0.5-2.5-1-5l-2-1v-2l-3-2v-3c-0.084-.294-1.637-0.273-1-2h1c0.616-4.53.88-2.517,3-5h1v-2h2Z" />
        </a>

        <?php
        $kdwil = '74.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kolaka_timur_11" data-name="kolaka timur 11" class="cls-7" d="M68,81h7c0.442,6.434,7.508,18.322,12,20H98c0.712,3.581,2.923,6.638,5,9l2,1q0.5,4.5,1,9h1v2l2,1q0.5,2,1,4h1v4h1v2h1v2l3,2v6h1v1l6-1,4,6,7-2q0.5-1,1-2c2.145-1.869,3.795-1.918,8-2,1.048,1.3,2.043,1.489,3,3h1c0.43,0.831-1.981,2-1,4l7,5h2c1.176,0.882,3.235,5.553,5,7q-1,10-2,20h1v4h1v2l3,2v3h1v2h1v3h1v23c-4.651,2.436-10.665,2.081-18,2-1.7,2.609-4.661,3.013-9,3v-2h1q-2-6-4-12c-2.128-1.212-2.177-2.252-5-3,0.714-2.926,1.7-2.338,2-3v-5l2-1v-2h1q-0.5-8-1-16c-2.3-1.31-3-3.408-5-5v-1h-3v-1c-2.778-1.621-1.893.826-3-3,1.909-1.256,1.659-1.014,2-4-2-1.237-2.181-3.525-3-4-2.127-1.234-4.593.8-6-1q-1-4.5-2-9l-3-1q-0.5-1-1-2h-2l-5-7h-2v-1h-2v-1c-4.531-2.072-6.167.28-7-6h1v-6a3.981,3.981,0,0,1-2-2c-2.01.574-.865-0.12-2,1-4.174.852-5,3.218-8,5l1,4-4,1v-1l-5-1-2-3H71v-3H70v-3l-5-4v-1H62v-1h1c0.589-1.286-.473-0.572-1-1v-1H60l-1-5c-3-.776-2.63-0.616-3-4a9.88,9.88,0,0,0,4-4c-0.039-.015-5.12-1.351-4-2h1v-1H56l1-6,2-1V95h1V90l2-1,2-3h2V85C67.7,83.4,67.506,84.175,68,81Z" />
        </a>

        <?php
        $kdwil = '74.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="buton_utara_10" data-name="buton utara 10" class="cls-8" d="M297,233h3l1,3,2-1v1c2.009,1.745.828,2.189,2,4l2,1v2l2,1q0.5,2.5,1,5h1l1,3c-1.951,1.674-2.722,4.666-3,8,1.8,0.944,1.574,1.385,4,2q-0.5,6-1,12h1v5a1.438,1.438,0,0,1,1,2h-1v1h-3l-1-3c-2.107-2.389-.727-5.669,0-8h-1v-1h-3v-2h1l-1-3c-2.762-.723-2.237-0.279-3-3h-2c0.4,4.409.748,8.394-1,13h3v6a15.682,15.682,0,0,1-6,1c-1.166-1.361-1.825-1.528-4-2v-2h2v-3h4v-1h-1v-5c-3.32.494-2.857,1.5-6,0v1h-1l1,3h1v3l-5,1q0.5,7,1,14l-5,3q-0.5,4-1,8h-1c-0.529,1.177,2.687,1.4,3,2v6h-1c-0.3,1.382.688-.379,1,1q-0.5,2.5-1,5a12.71,12.71,0,0,1-5,1c-3.459-4.919-5.929-.057-10-4h-1v-3c2.994-2.009.339-.664,2-3l3-2v-4h1l-1-3h1v-4h1v-1h-1c-1.676-1.184,2-1,2-1-0.113-3.16-1.955-1.874,1-3q0.5-2.5,1-5h1c0.062-.917-1.385-2.465-1-5,0.212-1.4,1.3.383,1-1l-2-1q0.5-6.5,1-13h1a1.761,1.761,0,0,0-1-2q0.5-5,1-10h-8l-2-3h1q0.5-2.5,1-5h1v-3h1v-2l2-1v-2l2-1v-2h1l1-2h2l3-4,4-1c3.49-1.932,3.151-3.714,9-4a10.6,10.6,0,0,1,1,4l-5,2C294.247,230.5,295.836,228.96,297,233Z" />
        </a>

        <?php
        $kdwil = '74.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="konawe_utara_09" data-name="konawe utara 09" class="cls-9" d="M175,54l4,1v1h6v1h1v4h-1v3l5,3,1,3,9,1c0.163,0.084,1.843,2.341,3,3q-1,3-2,6h-1c-0.13.632,1.225,1.81,1,4-0.144,1.407-1.057-.413-1,1h1v2h1l-3,4h-1v1h2v6c-3.315.851-2.9,2.263-5,4-1.139-1.139,0-.4-2-1v2c3.31,1.791,6.78,4.932,7,10h-6v1h5v1h-1v3l-3,1v1c0.152,0.176,3.4-.57,2,1h-1v1l-5,1v-1h-1a2.289,2.289,0,0,1-2,1v6c3.151,1.856,4.02,4.925,8,6v2l5,1a9.151,9.151,0,0,0,4,6v1c1.673,1.049,4.526.418,6,0v-1c2.913-.556,2.242,1.741,3,2l4-1v1h1c1.971,3.14-1.864,3.033,3,6q-0.5,1.5-1,3l-5,2q-0.5,1.5-1,3h-8v1h-3c-1.382-2.612-1.769-1.693-2-6-3.795-.869-4.068-2.31-4-7l-3-1v-1h-2v-1h-5q-0.5,1-1,2l-4-1q-0.5-2-1-4l-9-1c-1.007-1.881-3.512-3.766-4-6-0.2-.9,2.165-2.919,1-5h-1c-2.009-2.444-4.954-3.524-8-5v-1h-5v-1l-3-1v1l-9-1v1l-6,1c-1.382-2.612-1.769-1.693-2-6h-1v-5c-5.4.12-8.586-.574-12-2q-0.5-1.5-1-3h1v-3h-7v-1h-2v-1h-2v-1c-1.492-.973-2.465-0.8-5-1-0.945,1.8-1.385,1.574-2,4h-1v3c-4.845-1.26-2.858-2.625-5-6l-2-1V99H96V97l-2-1V94H93l1-7c1.183-.637,1.459-1.654,2-2h2V84h2l2-3,5-1,1-2c3.588-3.341,4.723-4.918,12-5,0.655,1.273,1.6,1.386,2,2v2l2,1-1,2h1c1.808,1.933,12.769,5.065,16,3V82c3.865-1.052,3-2.251,5-5h1l3-4,25-24Q174.5,51.5,175,54Zm29,45c3.96,0.7,5.27,2.415,8,4a34.651,34.651,0,0,0-1,7h-2q-1-3.5-2-7l-3,1V99Zm9,3h2c1.269,5.779,5.158,5.127,6,11l-3-1v1h1v3c-2.01-.574-0.865.12-2-1C213.675,112.321,212.919,108.2,213,102Zm-8,17q0.5,3,1,6c-4.873-.218-3.9-0.623-8,0q1-3,2-6h2v-1Z" />
        </a>

        <?php
        $kdwil = '74.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kolaka_utara_08" data-name="kolaka utara 08" class="cls-10" d="M62,30v3c2.749,1.584,1.8,2.47,6,3,0.644-2.739,1.309-2.276,2-5h4V30l2,1V29l5,1,4,12c-2.762.723-2.237,0.279-3,3H81c-0.269,1.41,2.9,3.805,3,4v2h2v1H85l1,3c-0.232,1.4-1.187-.4-1,1a2.353,2.353,0,0,1,1,2c-0.518.52-1.57-.294-1,1l4,3-1,3h1a14.018,14.018,0,0,0,2,2v2l2,1-1,2h1V71h1v1h1v4H94l1,5H94c-0.067.2-1.947,11.892-1,14l2,1,1,5a53.613,53.613,0,0,1-11-1c-3.388-5.987-9.479-10.282-10-19H68l-1,4c-3.858,1.006-3.142,2.93-7,4v6l-2,1v2c-0.565.944-1.607,0.451-2,2h1l-1,5h1c1.057,1.689,1.378,1.645,2,4-3.45.929-1.867,1.3-4,3,0.852,3.344,1.209,2,3,4h1c1.99,2.873-1.81,2.635,3,4v2c4.548,2.313,8.772,5.209,9,12-1.171.614-1.508,1.7-2,2H67v1H64v1H62v1H60l-1,2a18.288,18.288,0,0,1-7,4v-3H50v-2c-4.453-.8-6.251-3-10-4v-3l-4-1v-2H33l1-2-5-4c-0.787-1.135-.811-4.29-2-5H25l-2-13h2l2-3h1c-1.239-2.9-.893-2.611,1-5h1V96h1c1.556-1.672.821-1.607,4-2,0.119-2.142,1.019-3.4,1-4H35V88h2c-0.054-1.413-.758.393-1-1-1.889-.859,2-1,2-1V84l5-1,1-5,3-1v1l2,1c-1.15-2.13-2.74-3.768-2-8h1V70H47V67H46l2-7c-2.393-.607-1.858-0.318-3-2,3.99-.646,4.738-0.993,7-5-1.975-1.129-2.338-1.417-3-4h2l-1-2h1V43H50V42h1V41H50c-1.1-3.094-.2-2.311,0-6H48l1,3H48c-2.131-3.8-3.184-3.41-7-4V32h5c-0.644-2.739-1.309-2.276-2-5l10-1v1h2v1h2v1C59.383,29.907,59.75,29.69,62,30Z" />
        </a>

        <?php
        $kdwil = '74.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="wakatobi_07" data-name="wakatobi 07" class="cls-11" d="M366,346a39.688,39.688,0,0,1-8,1c-1.182-4.075-.754-1.053-3-3v-1h-1c-1.637-2.238-2.659-8.555-3-12,2.232-.842,5.438-1.029,9-1,3.259,4.677,6.843,1.255,7,10h-1v6Zm-16-1c-3.137-.56-4.19-0.974-5-4-1.135-.844-0.145.127-1-1h3C348.212,342.128,349.252,342.177,350,345Zm11,4c3.686,0.326,4.21.818,5,4-1.135.844-.145-0.127-1,1-2.319-.966-4.684-1.952-6-4C361.01,349.426,359.865,350.12,361,349Zm12,9c8.174,1.5,10.166,7.528,16,11a7.327,7.327,0,0,1-2,2l1,3h-1v-1h-3v-1c-1.3-1.055-1.034-1.759-2-3h-1v-2h-1l-1-2h-2l-1-2h-2l1-2h-1Zm17,10c3.215,0.77,2.155,1.508,6,2v3h-5A12.71,12.71,0,0,1,390,368Zm28,11h3v1h1v4h-2C419.356,381.261,418.691,381.724,418,379Zm-19,9c5.609,0.414,8.028,3.082,12,5l-1,2c-2.316.875-4.407,1.017-8,1-1.139-1.139,0-.4-2-1l-1-3h-1C397.105,390.176,398.688,388.9,399,388Zm22,39-4,1q0.5-4,1-8a40.116,40.116,0,0,1-9-1l-1-4h-1v-1h1v-5c1.135-.844.145,0.127,1-1,2.01,0.574.865-.12,2,1,7.465,1.516,5.47,5.14,8,11h1l1,4h1Z" />
        </a>

        <?php
        $kdwil = '74.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="bombana_06" data-name="bombana 06" class="cls-12" d="M170,237c3.543,0.317,3.949,1.314,7,2q-0.5,2-1,4h1v1h-2c-1.029,4.116-1.854,1.526-3,3q0.5,1.5,1,3h-1v3l-2-1q0.5,1,1,2h-1q-0.5,1.5-1,3l-3-1v1l2,1v7h1q0.5,3,1,6h2c-0.549,2.784-.77.1,0,3h1v-1l3,1v1h-1v1h1c0.279,2.357-.5,2.6-1,4l-2-1v1h1c1.889,0.86-2,1-2,1v2h-1v-1c-0.86-1.889-1,2-1,2l-3,1s-0.164-2.141-1-1v2l-9,1v-1l-10-1,1-2h-1v1l-3-1-1-3h-1v1c-0.178.029-3.664-1.549-6-1-0.291.068-.3,1.273-2,1v-1h-1v1c-1-.224-1.141-2.689-2-2v2c-1.478,1.274-4.2,1-7,1l1-2-3-1,1-2h-3v-1l-2-1v-3h-1v2h-4v-1l-2,1v-2l-2,1v-2l-2,1v-3h-1v1l-3-2,1-2h-2c-0.1-1.209,1.568-2.052,0-4l-2,1v-1c-1.021-.979-0.155.134-1-1H98V250l9-2v-1l7,1v-1h3v-1c1.89-.563,1.367.5,2,1h1v-1h3q0.5-1,1-2h3v-1l3-2v-3l4-3v-1h2q0.5-1,1-2h1v-2l2-1v-2c1.3-1.51,2.877-.106,5-1v-1a17.641,17.641,0,0,1,8-2C157.81,228.543,167.841,228.752,170,237Zm-19,70v4c1.135,0.844.145-.127,1,1h1v-1c0.859-1.889,1,2,1,2h2l-1-2h1v-1h-1c1.1-1.447.012-.322,2-1a5.442,5.442,0,0,1,2-2v1c2.061,1.895,3.666,6.866,2,8h2l-1,3h1v1l5-1v1h2l-1,2c0.941,1.069,2.763,1.184,3,3h-1v1h1c0.346,2-.381,1.228-1,2-0.574,2.01.12,0.865-1,2-1.139-1.139,0-.4-2-1v2l2,1v3h1v1h-1v1c0.155,0.336,1.822.307,1,2h-1c-1.139,1.139,0,.4-2,1v2h1a26.7,26.7,0,0,0-1,4h2v3H158v5h-3v-1h1c-0.2-1.7-1.794-1.531-2-2v-2l-4,1,1-2c-1.392.252-.269-0.211-1,1h-1v-2c-3.077-.775-2.911-0.711-2-3h-2l1-2h-1l-1-2c-1.177-.783-0.625.8-1,1-1.67.873-.854-1.353-1-2h-1v-3c-1.574-.433-1.665.832-2-1,0,0,2.056-.06,1-1h-1v1c-1.241-1.118-.445.039-1-2h1v-1h-1c-0.444-1.586,4.544-6.164,2-8h2v1l2-1v-1h-3q-0.5-2.5-1-5h1l1-3h1v-2l2-1v-3l2,1v-2C147.94,306.937,149.038,307.168,151,307Zm-3,5h-2c0.844,1.135-.127.145,1,1v1h1v-2Zm1,5a9.749,9.749,0,0,1-4-1v1h1a7.742,7.742,0,0,0,3,2v-2Z" />
        </a>

        <?php
        $kdwil = '74.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="konawe_selatan_05" data-name="konawe selatan 05" class="cls-13" d="M226,187l3,1v-1l4-1v-1c1.917-.315,1.341,3.018,4,2v-1h1q0.5-2.5,1-5l7-4v4h-1q0.5,1,1,2l-2,1q0.5,1,1,2h-1v1h2c-0.159,1.405-.3-0.231-1,1q0.5,1.5,1,3h-1v1l2,1q-0.5,1-1,2c0.51,1.319.51-.327,1,1a10.6,10.6,0,0,1,4-1v2h1q-0.5-1.5-1-3h2v1h3v1l3,1v-1c2.977-1.2,1.175-.852,4,0v-1h-1c-3.162-.027,3-1,3-1,1.139,1.139,0,.4,2,1v-4h-1v-1l-2,1v-2c-1.175-1.158-2.681-.877-5-1v-1h1l-2-3c2.316-.875,4.407-1.017,8-1v1h1v-1c1.379,0.762,1.113.806,2,2h1l-1,3,3,1c0.113,1.741-1.788,1.25,0,3h2c-0.026,1.3-1.812,1.735-1,4h1v2h1c0.763,2.233-1.3,2.876-1,4h1v2h1v1h-1l1,3-2-1v1h1l-2,3h1v1c-0.046.222-1.293,0.347-1,2h1l-1,2,2,1a1.519,1.519,0,0,1-1,2v1h1c-0.065,1.413-.82-0.4-1,1l1,4c-2.739.644-2.276,1.309-5,2v2l-2-1v4h-1v-1c-1.135.844-.145-0.127-1,1-1.962-1.741.084-1.447-1-3-1.068,1-3.508.954-5,0l1-2-2,1-2-3h-2q0.5-1,1-2l-2,1q0.5-1.5,1-3h-2c-2.821-2.347-.691-3.259-6-4-0.844,1.135.127,0.145-1,1,0.574,2.01-.12.865,1,2,0.669,2.324.23,1.924,2,3v-1c1.33-1.525.974,1.917,1,2,1.139,1.139.4,0,1,2h2q-0.5,1-1,2h1v1h1v-1c1.654-.979.846,1.44,1,2,4.084,1.077,3.216,3.138,3,8a15.682,15.682,0,0,1-6,1v-2h-2v-2c-1.842.99-.031,0.216-1,2-1.189-.818-0.734-1.262-2-2q0.5,2,1,4l-2-1v1c-1.621-1.428-.647-0.317-1-3h1q-0.5-1.5-1-3h-1q0.5-1,1-2l-2,1-5-7a12.71,12.71,0,0,1-5,1c0.549,2.784.77,0.1,0,3l-3-1c-0.61,2.151-.231,2.367-2,1-1.091,2.19,1.085,1.127-1,3v-1l-4,1q-0.5-1-1-2h-1v1c-1.294.155-1.663-1.682-4-1v1h-3c-0.254.134-.9,1.484-2,2v-1h-1v2l-11,2v1h-5v-1c-0.862.02-1.681,0.841-4,1v-1h1c-0.64-2.128-1.453-1.711-4-2v1c1.139,1.139.4,0,1,2h-2c-1.439,2.465-3.138,2.788-4,6l-6-1v-4l-6-1-5-7h-2q-0.5-1-1-2h-2c-1.506-.878-5.057-3.522-6-5h5v-1h1v1h1c0.75-.277.405-2.208,2-2v1h1v-1h-1v-1h1V207h1a2.76,2.76,0,0,0-1-3q0.5-2.5,1-5c-2.01-.574-0.865.12-2-1,1.139-1.139.4,0,1-2h-2v-1h1q-0.5-1-1-2h1c1.256-1.909,1.014-1.659,4-2v1h3v-2h1v1l2-1v1h1v-1h1v-1h-1c-0.979-1.654,1.44-.846,2-1v1h1q0.5-1.5,1-3l2,1v-2l2,1c0.938-.742.66-1.351,2-2v1h1v-2c-1.139-1.139-.4,0-1-2l2,1,3-4c1.694-1.162,2.309.046,4-2,5.842,2.145,7.55,2.836,14,4-0.549-2.784-.77-0.1,0-3l5-1v1h4C219.527,181.108,224.552,181.606,226,187Z" />
        </a>

        <?php
        $kdwil = '74.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="buton_04" data-name="buton 04" class="cls-14" d="M261,310h4c0.607,2.393.318,1.858,2,3,2.928,2.826,5.358.341,9,2l1,2,3,1-1,3h-2v1h2a11.878,11.878,0,0,0,1,5c2.512-1.365,3.605-2.333,4-6,2.762-.723,2.237-0.279,3-3,2.448-.558,2.21-1.043,4-2v1a8.114,8.114,0,0,1,5,3h-1l-1,3h2v-2a10.6,10.6,0,0,0,4,1,9.749,9.749,0,0,1-1,4l3-1v1c2.369,1.732.092,1.824,4,3v2c3.532-1.009,1.968-.932,5,1v1h4q-0.5,2.5-1,5h-2l-1,4c-3.141.813-4.932,3.071-7,5l-1,2-14,5c-0.649-1.3-1.294-1.081-2-2v-1h1l-2-3c-2.1.709-.906,1.03-3,0v1c-1.139,1.139-.4,0-1,2h-2v2c-2.886.168-7.538,1.471-9,3-2.564,2.034-3.054,4.178-3,9h1c1.5-1.759,2.7-1.9,6-2,0.058,3.579-.228,6.3-2,8-0.922,1.245-2.316,1.092-3,2-2.444,3.24.938,4.238-5,5l1-2c-1.392.252-.269-0.211-1,1h-1v-2h1l-1-3h-1q0.5-3.5,1-7c-0.677-1.22-2.958.043-3,0v-2h-1v1c-1.288-1.042-1-1.969-2-3l-2,1v-5h1c0.642-1.128.055-2-1-2v-1h2a9.749,9.749,0,0,1,1-4h-2l1-4c-1.574-.433-1.665.832-2-1,0,0,2.056-.06,1-1h-1v1c-1.241-1.118-.445.039-1-2h-1v-3a11.878,11.878,0,0,0-5,1v-5c1.909-1.256,1.659-1.014,2-4h2l1-2,6,1v-2l2,1v-1h1v-6l-3-1c-0.723,2.762-.279,2.237-3,3v-4c-2.01-.574-0.865.12-2-1h1v-2l2-1v-2l3-2v-3Z" />
        </a>

        <?php
        $kdwil = '74.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="muna_03" data-name="muna 03" class="cls-15" d="M254,245l-3-1c-0.386.2-.669,1.5-2,2v-1h-1v-4l4,1q-0.5-1-1-2h4v1h-1v4Zm-5,6v2c1.44-.273,1.906-1.309,4,0q-0.5,1-1,2h1v-1l2,1a12.71,12.71,0,0,0-1,5h-2c0.549,2.784.77,0.1,0,3l2-1v4h1l-1,2c1.413,0.06-.147-0.172,1-1,1.581-1.142.931,2.458,1,3h-1v-1c-0.86-1.889-1,2-1,2,1.033,0.77,2.485.73,2,3l-2,1q0.5,2,1,4h-2c0.75,2.1.993,0.906,0,3h2l-1,3h1c1.139,1.139,0,.4,2,1v3h1v1h-1c-0.387,2.545.472,3.573,1,5l-4,1,1-2h-1c-0.631,1.168-2.951,2.9-3,3l1,3h-2l-2,3-2,1,1,2h-2c-0.844-1.135.127-.145-1-1l1,2h-2l-1,2h-2c-0.757,1.194.778,0.581,1,1,0.878,1.661-1.356.865-2,1v2h1v1h-1l1,2c-0.853,1.079-2.257.621-3,2h1v1h-2q1,3.5,2,7c-3.263-.043-5.82.093-8-1l-1-2h-1v1h-1l-1,3H216v-1l-3-1v-1c-3.064-2.014-4.513-1.237-5-6-4.377-.6-5.072.6-5-6h1v1c1.375,0.33-.351-0.582,1-1,2.568-.8,2.225.975,4-1h-1v-1l3,1v-2h1v1l2,1-1-3c-4.409-1.188-3.255-4.731-3-10h1v-3c-1.385-.387-1.925.863-2-1,0.152-.183,1.869.116,1-1-0.654-.84-1.254-0.577-2-2h1v-1h3v-1a8.224,8.224,0,0,1,4-2v1l3-1v2h1v-1h1v2h1v-1c1.337-1.513.971,1.9,1,2,3.16-.113,1.874-1.955,3,1,5.555,1.2,5.976,5.588,11,7v-1h1l-1-2h2v-1l2-1v-2l2-1-1-2h2c1.063-1.052.774-1.965,1-4h-1v1l-2-1v-1h1l-2-6h-1v1h-1v-1h-4q-0.5-2-1-4l4-3v-2h1v1c1.354-.75,1.052-0.986,2-2h1v-2h1v1a4.06,4.06,0,0,0,2-2h-1v1c-0.86,1.889-1-2-1-2h1v-1h-1v-1h-1v1h-1v-4h1v-5l2-1v-1l2,1v-1c-1.135-.844-0.145.127-1-1h4Zm19,1h10q-0.5,10-1,20,0.5,5,1,10h-1q-0.5,3-1,6h-1v2h-1q-1,7-2,14c-3.078,1.9-3,4.9-7,6v-1h-4c0.844-1.135-.127-0.145,1-1l-1-2h2c0.462-1.337-.711.384-1-1l1-3c-1.135.844-.145-0.127-1,1h-1v-1c-1.7.2-1.531,1.794-2,2h-2a9.733,9.733,0,0,1,1-4h1v1l3-2v-2l2,1v-1h-1v-1h1v-6h1v1l2-1-2-4h1v-1h-1l-2-4h1v-1h3v-1h1v-1h-1c-0.932-3.695,2.613-.478,1-5h2c1.215-1.612-1.65-.822-2-1l1-3h-2a19.043,19.043,0,0,1,1-7h-2l1-2h-1v-3h2C266.99,253.871,267.443,255.482,268,252Zm-33,45h2v1C234.99,297.426,236.135,298.12,235,297Z" />
        </a>

        <?php
        $kdwil = '74.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="konawe_02" data-name="konawe 02" class="cls-16" d="M126,40l1,3h1V42h1v1h5l1,3a29.368,29.368,0,0,1,7,1l-1,2h1V48h1v1h7v1l5,1V50h4V49h2V48h3V47c2.37-.669,2.5.756,3,1h1V47h5c-1.229,4.756-5.964,6.964-9,10l-7,8-3,2v2l-8,7-3,5c-2.281,1.68-5.224,1.936-9,2V82l-4,1V82l-5-1V80h-1V77h-1a8.226,8.226,0,0,1-2-4h-9c-0.348.618-3.644,5.74-4,6h-2v1l-5,1-2,3-6,2V85h1l-1-4h1V78h1a1.654,1.654,0,0,0-1-2l1-3H93V71H91l1-4a6.749,6.749,0,0,1-4-5H86l-1-6h1V55a1.6,1.6,0,0,1-1-2h1V52H85V51h1V50h3l-1,2h1V51h1l1,2h4c0.768,0.312.4,2.195,2,2V54c1.3-.8,2.722-0.941,1-2V51c3.444-2.708,6.627-.4,8-6a8.239,8.239,0,0,0,4-2V42h2V41Zm-3,65q-0.5,3-1,6h1v1l6,1v1l6-1q0.5,5,1,10l2,1v1c1.77,0.536,5.731-2.824,7-3l5,2v-1h6c6.073,1.821,9.166,5.335,14,8-1.294,6.15-.054,11.085,8,11v1l3-1q0.5,1.5,1,3h1c1.571,1.747,1.145,2.271,4,3,0.825-3.2,1.179-2.9,5-3,1.665,1.89,3.5,1.7,5,4h1v5l4,2v3c0.887,2.3,1.977,1.826,5,2,2.129-1.935,6.1.53,9-1q0.5-1.5,1-3l7-3v1c1.517,0.954,1.694,1.954,3,3v4h2v2l3-1v1l3,1q0.5-1,1-2h10v5l-3-1v1h1c1.889,0.86-2,1-2,1-1.161.959-8.907,0.118-13,0-0.945-1.8-1.385-1.574-2-4l-6,1q-0.5,1.5-1,3h-1a1.509,1.509,0,0,0,1,2v1h-1v4a9.463,9.463,0,0,0-2,2l-9-2c-0.866.264-.471,2.785-5,2l-2-1c-1.283-.595.4-1.177-1-1v1h-2v-3h-1v2c-3.8.6-3.5,0.481-7,1-1.775,3.046-4.063,3.825-5,8-7.073.738-9.257,6.329-16,7v-1h-1v1l-3,1v-1h-2c-0.615-2.905-1.616-3.994-3-6h-1v-4h-1c-1.914-6.325,5.285-15.141,1-20a13.548,13.548,0,0,0-6-8h-2q-0.5-1-1-2h-2v-1c-1.221-1.157-1.974-.444-2-3,0,0,1.567-.684,1-2h-1q-0.5-1-1-2h-2v-1c-2.612-.1-3.426-0.252-5-1v1l-4,3v1l-8,1c-1.454-3.992-.511-4.819-6-5v1h-3c-0.844-1.135.127-.145-1-1v-7l-4-3v-2h-1v-4h-1v-2h-1v-2l-2-1v-2h-1v-6h-1v-3h-1v-2h-1q0.5-1.5,1-3c1.361-1.166,1.528-1.825,2-4l4-1v1h2q0.5,1,1,2h2v1h8Z" />
        </a>

        <?php
        $kdwil = '74.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="kolaka_01" data-name="kolaka 01" class="cls-17" d="M93,140l11,4q0.5,1,1,2l3,2v2c1.036,1.382,4.969,3.458,7,4,0.067,5.048,1.484,5.72,2,10l6,1c1.584,2.749,2.47,1.8,3,6h-2v3c1.067,0.549,1.682,1.822,2,2h3l6,7q0.5,7.5,1,15l-3,2v6l-2,1v2l5,3,3,11h1v1h-1c-0.365,2.17.376,2.817,1,4h-1c-1.478,3.452-2.63,4.336-6,6q0.5,1,1,2c-2.909,1.71-1.178-1.469-4,2h-1c-2.665,4.337,2.787,4.282-3,5-1.671,2.221-.616,1.53-3,1-1.168.908-1.065,2.41-3,3-1.282-.6.414-1.043-1-1v1l-3-1q-0.5,1-1,2c-1.36.388,0.365-.631-1-1-2.888-.782-7.431,1.871-8,0v2h-4v1h-1v-1H99c-0.083-8.127,3.184-12.074,5-18V216h1v-4h1q-0.5-1.5-1-3h1v-1a1.4,1.4,0,0,1,2,1c2.316,0.372,2.18-.892,3-2h1v-6l2-1v-2h1v-2h1q-0.5-6-1-12l-9-3v-1h-2v-1H99s0.208-1.286-2-1a2.612,2.612,0,0,1-3,1l-1-2-10-1,1-3c-4.865-1.153-1.117-1.248-3-4H80v1H79v-5c-1.139-1.139-.4,0-1-2l-3-1-1,2H72v-3l-2-1v-1h2l-1-4-9,1v-3H60v-2c-2.465-1.439-2.788-3.138-6-4v-3c2.619-.683,3.222-1.585,5-3v-1h2c3.79-2.178,6.159-4.613,12-5,1.716,2.991,4.385,3.886,9,4l1-3a1.557,1.557,0,0,1-1-2l8-6c2.01,0.574.865-.12,2,1,2.162,1.419,2.01,2.366,2,6H93v5ZM83,167l-1,2c0.074-.042,2.9-1.586,2-2H83Zm2,5c1.139,1.139,0,.4,2,1C85.861,171.861,87,172.6,85,172Zm2,14,1,4H87c-1.048-1.3-2.043-1.489-3-3h1C86.139,185.861,85,186.6,87,186Zm4,0h2c0.206,4.3.625,3.4,2,6h1c0.7,1.767-1.212.768-2,1l1,3H89l1-4a1.586,1.586,0,0,1-1-2h1C90.765,188.521,90.713,188.318,91,186Zm8,4-1,4H96v-1h1l-1-2h1C98.139,189.861,97,190.6,99,190Z" />
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
                url: "ambil_sultra_kiri.php",
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
                url: "ambil_sultra_kanan.php",
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