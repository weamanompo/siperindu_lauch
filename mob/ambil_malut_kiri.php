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

<div class="container-fluid mt-4 text-center">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="471" height="450" viewBox="0 0 471 450">
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
            <filter id="filter" x="263" y="60" width="42" height="107" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="294" y="164" width="161" height="81" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="280" y="33" width="49" height="129" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="235" y="178" width="135" height="201" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="96" y="358" width="106" height="70" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="289" y="89" width="96" height="106" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="323" y="3" width="56" height="61" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="12" y="349" width="95" height="47" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="179" y="108" width="95" height="59" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="260" y="154" width="50" height="73" filterUnits="userSpaceOnUse">
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
        $kdwil = '82.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_01_Kab_Halmahera_Barat" data-name="01 Kab Halmahera Barat" class="cls-1" d="M299,65q-0.5,3-1,6l-2,1v4h-1v2h-1v5h-1a2.586,2.586,0,0,0,1,3v4h1c1.194,4.134-.311,10.318-2,12-1.139,1.139,0,.4-2,1l-1,5h-1c-0.106,1.118,1.943,2.677,1,5l-2,1q-0.5,5-1,10h1v4h-1v3l-2,1c-0.695,1.814.651,1.475,1,2-0.085,1.445-1.414,1.571-1,4a1.715,1.715,0,0,1,1,2h-1v3h-1q0.5,3,1,6c3.5,2.058,4.64,5.821,9,7q0.5,2.5,1,5l-5-1v-1l-3,1-1-3,2-1v-2l-3-1v-1h-1c-0.365.291,0.2,1.74-1,1l-1-2-6-1q0.5-2.5,1-5h1l-1-3h-1q0.5-2.5,1-5c-4.327.223-5.666,1.233-7,0a3.982,3.982,0,0,1-2-2c2.336-1.553.808-.533,2-3,2.684-5.553-3.052-4.318-1-10h1v-2l2-1v-2l2-1v-2h1v-2h1v-3l2-1v-2h1v-4h1v-1h-1c-0.458-2.312.79-3.977-1-5V95l3-1q-1-3.5-2-7l-3,1c0.644-2.739,1.309-2.276,2-5l4,1V83c2.453-2.48.508-3.792,5-5,1.022-5.284,4.683-8.836,7-13h5Z" />
        </a>
        <?php
        $kdwil = '82.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_02_Kab_Halmahera_Tengah" data-name="02 Kab Halmahera Tengah" class="cls-2" d="M356,182v2c3.146,1.873,2.838,3.7,8,4v-1h3c0.38-3.541,1.241-3.036,2-6h2l1,4h1q-1,5-2,10c6.449,0.845,9.316,1.946,16,5v2h-1v-1l-7-1v-1h-4v-1h-5v-1h-3v-1h-6l-1-2h-2l-2-4h-2v-1l-2,1c-2.4.193-3-1-3-1l-4,1v-1c-0.57-.083-3.686,1.795-6,1v-1h-2v-1l-2,1-1-2h-2l-1-2h-7v-1l-10-1v1l-4,1-1,3a1.786,1.786,0,0,1,1,2h-1q-1,4.5-2,9h3q0.5,4,1,8c-1.707,1.082-2.124,2.129-3,4-2.612.1-3.426,0.252-5,1v-1c-1.975-1.129-2.338-1.417-3-4l3-1-1-3h-1v-1h1l-1-3,2,1c-0.948-1.866-2.242-1.823-2-5h1v-1h-1c-1.072-2.674-.393-1.977,0-4l-2-1v-5l3-1-1-2h1l2-6-3-1c-0.855-1.126.923-.679,1-1l-1-3h2v2l6-1a2.726,2.726,0,0,0,3,1v-1h4c0.771-.31.393-2.185,2-2v1h3l2,3,5,1v1h1v-1l2,1v-1h5l3,4,3-1,3,4Zm26-5c2.613,0.624,2.846,1.06,4,3,1.135,0.844.145-.127,1,1h-3Zm40,42h4l3,4h2l1,2c2.768,2.618,5.791,5.947,10,7,0.77,3.215,1.508,2.155,2,6l-4,1c-0.947-4.362-3.342-4.349-4-9-3.075-.626-3.462-1.6-7-2q-0.5-2.5-1-5l-3-1v-1h-3v-2Zm27,8h-3v-1h-1v-3c1.135-.844.145,0.127,1-1l2,1A10.6,10.6,0,0,1,449,227Z" />
        </a>
        <?php
        $kdwil = '82.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_03_Kab_Halmahera_Utara" data-name="03 Kab Halmahera Utara" class="cls-3" d="M300,38h3v1h-1l1,2h-1l-1,2-3-1V41A7.744,7.744,0,0,0,300,38Zm-3,5h2c0.1,2.612.252,3.426,1,5h-1v1c-2.716-1.164-4.18-1.78-5-5h1c1.139,1.139,0,.4,2,1V43Zm21,49c0.663,2.662,3.719,8.075,2,13h-1v3l-2,1v5h1v1h-1l1,2h-2c-1.152,1.134-.027,2.5-1,4l-2-1v1h1v1h-1v1h-1v-1h-1v5c-1.139,1.139-.4,0-1,2l-7,1c-1.1,4.132-3.647,5.1-7,7v1h-2v1a5.777,5.777,0,0,1-5,0v1c0.076,0.076,1.941-.055,1,1h-2l1,2h-1q-0.5,2.5-1,5h1v1h1v-1c1.654-.979.846,1.44,1,2h-1c-0.624,1.927,3.458,2.031,4,3v3h-1c-3.439-5.783-6.991-4.87-7-15h1v-4h-1v-1h1v-4h1v-3l2-1v-1h-1v-4h-1c-0.217-1.559,1.817-1.311,2-2q-0.5-3-1-6h2v-3h1a1.732,1.732,0,0,0-1-2q0.5-3,1-6l3-1q1-6,2-12h-1q-0.5-5.5-1-11h1V77h1V75h1V72h1V70h1c0.9-1.388.687-1.748,1-4a8.278,8.278,0,0,1-3-5l2,1V61h-1l4-6h1V53l2,1c1-.792,1.65-5.708,3-3h1V50h1V49h-1l1-2,2,1V47h-1V46h1c1.256-1.909,1.014-1.659,4-2v1s5.438-.922,7-1v1h-1l1,3h-1l-5,7-2,1q-1,3.5-2,7l-2-1v1h1v1h-1v1h-3c-2.114,1.411-2.035,4.336-2,8h-1v1h1l-1,2h1v1l6-1v1h2c1.107,0.761.863,2.124,0,3h2V79h1v1h1l-1,2,2-1v6C316.588,88.474,315.051,90.915,318,92Z" />
        </a>
        <?php
        $kdwil = '82.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_04_Kab_Halmahera_Selatan" data-name="04 Kab Halmahera Selatan" class="cls-4" d="M268,187a9.749,9.749,0,0,1,1-4l2,1,1,2h-1v1h-3Zm4,6v5c-2.078,1.094-1.771,1.611-5,2a13.3,13.3,0,0,0-3-4c1.146-1.938,2.676-2.381,4-4Zm37,15h2v6l-3,1c0.427,1.373,1.41,1.668,1,4a2.7,2.7,0,0,0-1,3h1v2h1v3l2,1q0.5,2.5,1,5h1v2h1q0.5,5,1,10l2,1v2h1v2h1v3h1v3l2,1,2,6,2,1v2l2,1v2l2,1v2h1v2h1v2h1v2h1l3,4h2l1,2h1v2l3,1v1c2.043,1.765,3.114,1.87,4,5a24.177,24.177,0,0,0-4,1l-1-2a1.535,1.535,0,0,0-2,1l-6-2-1-2c1.135-.844.145,0.127,1-1l3,1v1h1v-2h-2v-2c-1.318-.426-2.007.909-2-1h1l-1-2c-3.037,1-5.685.56-9-1v-1h-3l-7-5v-3h-1v-2h-1l-1-4h-1l-1-5-3-2v-4h-1c-1.723-3.558.45-3.628-4-5v-1h-3v-1l-3-1v5h-1c-1.139,1.139,0,.4-2,1q1-3.5,2-7c-4.105-1.8-6.53-4.575-7-10h1q0.5-3,1-6h1v-8c0.518-.884,4.126-2.065,6-2,1.206,0.739-.379,1.314,1,1v-1l3-1a36.174,36.174,0,0,1-3-10h2c1.037,0.463-.067,2.379,3,2v-1l2,1v-1C308.719,209.873,308.355,210.367,309,208Zm-34,15a11.878,11.878,0,0,0,1,5h-3v-3h-1v3c1.139,1.139.4,0,1,2l-4,1v-1h-1v-3h1v-4h1v-1a2.853,2.853,0,0,1-1-3h1c0.694-2.415.233-3.942,1-6h1c0.211,2.313.2,2.565,1,4h1c0.561,1.323.344,5.067-1,5v1h2Zm-24,0a14.809,14.809,0,0,1,6,1v1l-6,1v-1h1Q251.5,224,251,223Zm7,6c-0.684,2.927-1.113,3.274-4,4v-1c-1.135-.844-0.145.127-1-1C255.078,229.906,254.771,229.389,258,229Zm-11,10q-0.5,1.5-1,3c-1.135-.844-0.145.127-1-1-1.135-.844-0.145.127-1-1h1C246.139,238.861,245,239.6,247,239Zm-3,2v2l-3-1s-0.164,2.141-1,1v-2c1.135-.844.145,0.127,1-1Zm13,21h-2v2l-6,1v-1c-1.361-1.166-1.528-1.825-2-4h2c-1.139-1.139,0-.4-2-1-0.639-3.66-1.094-5.725,0-10h1q-0.5-2.5-1-5c2.437-.918,6.193-1.037,10-1v1h1q-0.5,3-1,6l3,2c0.235,1.571-1.784,1.291-2,2q0.5,2.5,1,5l-2,1v2Zm21-15,5,1c0.7,3.377,2.168,3.852,3,7h3c0.723,2.762.279,2.237,3,3-0.586,5.98-3.671,5.319-5,10h-2v5h4v5a10.6,10.6,0,0,0,4,1v-1l9-1v1h2v1l3,1v3h2c-1.245,3.257-2.139,5.357-5,7-2.878,3-6.506,1.334-11,1-0.6-1.155-1.717-1.533-2-2v-2h-1v-4h-1v-1c-5.222,1.2-9.653,4.77-15,6-0.5-2.424-2.814-5.2-2-8h1v-2h1l1-5h-3c-1.757-2.831-5.163-2.878-7-5l-1-3h-4v2h-6v-2h3v-3h4v-1h-1v-4l3-1v-3h1c0.04-.375-0.895-2.247-1-4l4-1v1c2.46,1.469,3.7,4.494,5,7,1.135-.844.145,0.127,1-1,3.123-2.066.455-1.356,2-4h1A8.207,8.207,0,0,0,278,247Zm75,20v3h-1c-1.139,1.139,0,.4-2,1-0.723-2.762-.279-2.237-3-3v-1c-1.134-.608-2.037,3.15-5-1,2.178-.422,2.848-0.664,4-2C349.515,264.915,348.853,266.433,353,267Zm-95,4-1,4h1c1.139,1.139,0,.4,2,1l1,3a1.509,1.509,0,0,0-1,2h1v2h1l1,3h-2v1c-1.442.2-2.548-2.828-3-3l-6,1c-1.094-2.078-1.611-1.771-2-5h1v-2l2-1v-2h1l-1-3h1v-1h4Zm12,4h-5a10.6,10.6,0,0,1-1-4c1.239,0.4,4.1,1.289,5,0v2C270.139,274.139,269.4,273,270,275Zm89-4,5,1v2h-2v-1l-3,1v-3Zm-12,27v3h1v1h-1c1.112,1.373-.006.358,2,1v-1h1v1h1c-0.574,2.01.12,0.865-1,2v1h-4c-1.643-3.1-1.9-1.8-2-7-1.139-1.139-.4,0-1-2h1v1h3Zm-1,10h1v3h1v-1c1.546-.607,4.4,2.117,4,3h-1a7.49,7.49,0,0,1-2,3c-1.536-1.684-5.324-3.011-6-5C343.147,310.725,345.3,309.241,346,308Zm-77,6h2c0.513,2.4,1.29,3.077,2,5h-1c-0.579.416-.147,1.633-2,1v-1h-1v-5Zm9,3c5.758,0.225,3.707,1.632,7,3h4v1c1.661,0.649,2.648.432,4,1l-1,4c-4.171-.3-9.389-4.459-13-3l-1,2h-2c-0.945-1.8-1.385-1.574-2-4C276.4,319.951,277.212,319.88,278,317Zm-10,10,4,1v1h-1v1h-5Zm33,9c2.84,0.655,2.605,1.837,3,2,2.273,0.94,3.846-.851,5-1v1l4,1v2c2.762,0.723,2.237.279,3,3,3.858,1.006,3.142,2.93,7,4v2l5-1c1.584,2.731,2.742,2.446,3,7-1.139,1.139-.4,0-1,2l-4,1-1,2c-3.981,1.739-11.159-2.582-14-3h-4v1h-8v-1l-4,1v-1l-5,3v1l-4-1v1h-7v-1h-3l-1-2h-2v-1a8.194,8.194,0,0,0-4-2q-0.5-3-1-6h1v-4h-2l1-5,2,1v-2c1.588-1.68,2.7-1.823,6-2,1.139,1.139,0,.4,2,1v-3c2.618-.623,3.249-1.6,5-3v-1h2v-1c2.17-1.354,1.43.451,3-2a9.208,9.208,0,0,1,2,2l2-1v1h2v-1h1v1l4,1C299.945,333.8,300.385,333.574,301,336Zm-32-2-1,3h-3c-0.586.228-.43,2.889-3,2v-1h-2v-3l4-1v-1Zm75,17c3,0.776,2.63.616,3,4a12.71,12.71,0,0,1-5,1l-1-3A7.49,7.49,0,0,0,344,351Zm-55,21a29.413,29.413,0,0,0-7,1v-3h1v-1c0.862-.535,3.992-0.475,5-1v1h1v3Z" />
        </a>
        <?php
        $kdwil = '82.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_05_Kab_Kepulauan_Sula" data-name="05 Kab Kepulauan Sula" class="cls-5" d="M123,367v2l9,1v-1c1.268-.176,1.284,1.442,4,0l1-2,3,1s0.021-1.258,2-1c1.4,0.183-.414,1,1,1,1.18-.78-0.4-1.218,1-1a2.708,2.708,0,0,0,3,1l1-2,12,2v-1l10,1v-1l13,1c1.386-.279-0.406-1.154,1-1v1h5v-1h6c-0.663,4.283.848,4-5,4v-1c-0.648-.271-2.114,1.311-4,1a1.61,1.61,0,0,0-2-1v1c-2.4.888-3.085,1.169-5,0v2l-2-1v2l-3-1v1h-1v-1h-1v1h-1v-1c-1.036-1.791-1,2-1,2-3.715-.594-2.289-0.58-6,0v-2a7.485,7.485,0,0,0-2,2c-1.665.8-1.744-.912-2-1-1.289-.446-0.741,1.267-2,2v-1c-1.331-1.521-.974,1.912-1,2h-2v-1h-1l-1,2-6,1v-1h1l-1-2-2,1v-2l-3,1v-1h-1v1h-2v1h-3v1c-2.225.77-12.695,0.4-13-1h-1v2c-3.16-.113-1.874-1.955-3,1h-3v-2l-5,1q-0.5-3-1-6c-2.391-.463-3.145-1.158-5-2v1h1c1.889,0.86-2,1-2,1v1c-1.4.226,0.268-.374-1-1h-1c-0.419-.661-0.62-3.237-1-4h1v-1h4c-0.325-2.315-1.069-.633,0-3,1.376,0.812,2.717,3.569,5,3l1-2h2v3h2v-2h2c-1.139-1.139,0-.4-2-1v-2l3-1v1c0.927,1.078.66-.076,1,2h-1v1h4Zm25,15h4v1c1.541,1.1,2.375,2.644,4,1v2h-1l1,2h-2l1,3h-1v-1c-0.86-1.889-1,2-1,2h1c-0.282,1.758-3.15,1.992-2,5l2,1-1,2h2l-1,2h2l-1,2h2l-1,2h2l-1,3h2l-1,2h2l-1,3,3,1v1c-2,1.369-.311,1.276,0,3h-1v1h1v1h-3v1h-1l-1-3-2,1v-1h-1l1-2h-2v-1h1c-1.136-1.13.009-.421-2-1,0.04-2.309-.461-4.032,1-5v-1h-2l1-2-3-1v-1h1l-2-3h-2v-1h1v-3h-1q0.5-2,1-4h-2l1-2h-1q-0.5-3-1-6l2,1v-2h1Z" />
        </a>
        <?php
        $kdwil = '82.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_06_Kab_Halmahera_Timur" data-name="06 Kab Halmahera Timur" class="cls-6" d="M376,98h-3q-0.5,2.5-1,5h1v3h1v2l4,2-1,3c0.371,0.514,1.72.209,1,2l-3,2v5h-1v2h-1c-1.386,3.893,1.351,9.363-1,12v1h-5l-1,2-3,1-3,4h-4v1h-2l-1,2h-4l-1,2c-2.113.9-3.03-1.387-4-1l-1,2h-2c-1.116.95-.734,2.05-1,4,1.139,1.139.4,0,1,2a6.812,6.812,0,0,1-4-2v2c-1.122,1.047-1.918.754-4,1v2c1.1,0.858,2.165,3.47,3,4h3l1,3,2,1v2c2.315,0.241,2.55.207,4,1v1a2.593,2.593,0,0,0,3-1h1v1h3l2,3h4v1h3l1,2,10,1-1,3-3-1v2l-2,1c-1.9,3.1,1.789,2.563-3,4v1c-1.666.916-3.254-.66-4-1v1c-1.139-1.139-.4,0-1-2h-1v-3l-5-1v-1c-1.813-.577-5,1-5,1l-1-2h-2l-2-3h-4v-1h-2l-1-2c-1.414-.018.176,0.215-1,1l-2-1v1h-1v-1h-5c-0.21.32,0.182,1.776-1,1v-2l-2,1v-2h-1v-1c-1.274-1.144-2.011-.3-4-1v-1l-5,1v1h-8v1c-2.064.29-4.231-2.421-7-3v-2c0.572-.629,1.511.319,1-1h-2l1-3c-1.953-.612-1.043.6-2-1h1v-1l-2,1v-3h-1l-1-4c2.931,0.713,2.33,1.7,3,2,3.119,1.4,5.453.107,9,0a9.11,9.11,0,0,1,6-5q-0.5-4-1-8h1v-2h1v-2h1l2-6c2.162-.493,5.182-2.826,7-3,1.408-.135-0.41.886,1,1,2,0.162,2-1,2-1,1.974-.426,1.291.538,2,1l3-1c1.643-3.1,1.9-1.8,2-7-1.139-1.139-.4,0-1-2-3.006-1.044-3.935-1.3-7,0v-1c-1.139-1.139-.4,0-1-2h2l6-9h3l1-2h2v-1h2v-1c4.235-1.926,5.555.2,7-5a8.919,8.919,0,0,0,4-2V98h3V97c3.547-.881,2.85,1.408,4,2l3-1c0.88-3.4,1.861-3.065,6-3V94l2,1V94l6,1Zm-29,63h-3v-1c-1.139-1.139-.4,0-1-2,1.135-.844.145,0.127,1-1,2.01,0.574.865-.12,2,1h1v3Z" />
        </a>
        <?php
        $kdwil = '82.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_07_Kab_Pulau_Morotai" data-name="07 Kab Pulau Morotai" class="cls-7" d="M341,58c-0.447-3.8-1.589-4.047-3-7h-1c-1.2-3.163.675-8.22,1-10h-1l-3-4c2.308-1.342,5.949-4.538,7-7q0.5-3,1-6h1l3-4h2V19h2V18l2-1V15h1l1-2,6,1V13h1V10h1V9c2.01,0.574.865-.12,2,1,2.325,2.011.634,2.494,2,5l2,1v2h1c3.432,3.953,3.942,1.263,4,9-5.906,3.984-1.976,5.517-4,12h-1v4l-3,2v3l-2,1,1,2h-1v1h-2l-3,4h-9C347.259,57.8,344.606,57.995,341,58ZM330,28h1q0.5,3,1,6a1.685,1.685,0,0,0-1,2h1v1h-3a12.709,12.709,0,0,1-1-5h1V29h1V28Z" />
        </a>
        <?php
        $kdwil = '82.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_08_Kab_Pulau_Taliabu" data-name="08 Kab Pulau Taliabu" class="cls-8" d="M84,364a14.823,14.823,0,0,1,1-6c1.4,0.7,1.24,1.455,2,2l2-1v1h1c0.419,1.3,1.509,1.738,1,4-0.031.136-1.736,0.387-1,2h1c1.139,1.139,0,.4,2,1l2-6,4,1c-0.329,3.237-.908,2.938-2,5h2c1.139-1.139,0-.4,2-1v9h-1v-1H95s0.122-1.308-2-1v1H89a2.622,2.622,0,0,0-3-1v1H84v1c-1.689.411-1.763-.949-2-1-2.663-.567-4.563.461-6,1l1,3-11-1v-1a8.114,8.114,0,0,0-6-1v1H57l-1,2-5,1-1,2-5,1v1H42v1c-3.006.457-2.09-1.644-3-2H35l-1,3H27c-0.31-5.5-2.259-6.1-4-10H22l2-12h1l-1-4a6.718,6.718,0,0,0,3-3c2.718,0.288,3.979,1.025,8,0v-1l3,1v-1h6v-1h1v1h6v1h3v1h4v1h7l1,2c4.023,1.715,6.9-1.091,10,2h1v1H76c-0.979,1.654,1.44.846,2,1v1Zm-64,0v3H19l-2-3h3Zm4,17v5H23c-1.72-2.135-2.033-.566-3-4,1.135-.844.145,0.127,1-1h3Zm11,2h3v2H35v-2Zm-11,3a9.749,9.749,0,0,1,4,1c-0.844,1.135.127,0.145-1,1-0.579.416-.146,1.633-2,1v-1C23.861,386.861,24.6,388,24,386Z" />
        </a>
        <?php
        $kdwil = '82.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_71_Kota_Ternate" data-name="71 Kota Ternate" class="cls-9" d="M189,114q-0.5,1.5-1,3c-2.01-.574-0.865.12-2-1-1.139-1.139-.4,0-1-2h1v-1Zm72,34,3,1-1,3c-1.135-.844-0.145.127-1-1h-1v-3Zm2,4c3.41,1.436,4.842,2.077,5,7-2.612,1.382-1.693,1.769-6,2a7.49,7.49,0,0,0-2-3c0.574-2.01-.12-0.865,1-2C261.574,153.556,262.047,153.794,263,152Z" />
        </a>
        <?php
        $kdwil = '82.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_72_Kota_Tidore_Kepulauan" data-name="72 Kota Tidore Kepulauan" class="cls-10" d="M294,221q0.5-3,1-6l-2-1v-8c1.529-5.483,3.013-5.767,2-12a33.855,33.855,0,0,1-8-1v-3c-2.794-.806-2.154-0.249-3-3-1.823-2.1,0-2.441-1-5-0.3-.774-2.765-2.439-3-3q0.5-8,1-16a13.272,13.272,0,0,0,5-4c3.291,1.192,8.537,1.7,12,3,0.47,4.077,5.442,14.37,5,16-0.814,3-4.5,4.006-3,7h-2s0.759,4.406,1,5l2,1c2.012,4.96-.481,9.317,0,13a1.68,1.68,0,0,1,1,2l-2,2c-1.623,5.038,2.288,10.259,1,12C300,220.68,296.559,220.6,294,221Zm-21-59a39.492,39.492,0,0,1-1,9c-3.163.338-1.611,1.686-4,0-2.023-1.411-1.839-1.589-2-5,1.4-1.322,1.669-3.62,3-5C270.167,162.02,270.648,161.864,273,162Z" />
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
    $(document).ready(function() {
        $("#kiri_peta").on('click', function() {
            var provinsi = $("#provinsi").val();
            var tahun = $("#tahun").val();
            var indikator = $("#indikator").val();
            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_malut_kiri.php",
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
                url: "ambil_malut_kanan.php",
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