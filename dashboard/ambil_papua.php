<?php

include '../koneksi.php';

include 'capaian_provinsi.php';
include 'fungsi_tes.php';
include 'fungsi_warna_kab.php';
include 'legenda_peta.php';

$kd_indi = $_POST['indikator'];

if ($kd_indi == 4) {

    die;
}

$kdwil = $_POST['provinsi'];

// nama provinsi

$prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");

$namaprov = mysqli_fetch_assoc($prov)['nama'];


// $query = mysqli_query($koneksi, "SELECT max(tahun_nav) as kodeTerbesar FROM indikator_nav WHERE kode_indikator_nav = '$kd_indi'");

$query = mysqli_query($koneksi, "SELECT max(tahun_indi_pilar) as kodeTerbesar FROM transaksi_pilar WHERE kd_indi_pilar = '$kd_indi'");

$data = mysqli_fetch_array($query);
$tahun = $data['kodeTerbesar'];

// $cekkiri = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE tahun_nav < $tahun AND kode_indikator_nav = '$kd_indi' AND kode_wilayah_nav LIKE  '$kdwil%' ");

$cekkiri = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah)=5 AND tahun_indi_pilar < $tahun AND kd_indi_pilar= '$kd_indi' AND kode_wilayah LIKE  '$kdwil%' ");

$recekpanah = mysqli_num_rows($cekkiri);

// $cekdata = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE kode_indikator_nav = '$kd_indi' AND CHAR_LENGTH(kode_wilayah_nav)=5 AND kode_wilayah_nav LIKE '$kdwil%'");

$cekdata = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kd_indi_pilar = '$kd_indi' AND CHAR_LENGTH(kode_wilayah)=5 AND kode_wilayah LIKE '$kdwil%'");

$cekada = mysqli_num_rows($cekdata);

$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

$nil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah ='$kdwil' AND kd_indi_pilar = '$kd_indi' ");

$as = mysqli_fetch_assoc($nil);

$n = $as['nilai_indi_pilar'];


$sumber = $as['sumber'];

if (!$as) {

    $asumber =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah)= 5 AND  tahun_indi_pilar = '$tahun' AND kode_wilayah LIKE '$kdwil%' AND kd_indi_pilar = '$kd_indi' ");

    $as = mysqli_fetch_assoc($asumber);

    $sumber = $as['sumber'];
}

?>
<?php if ($cekada == 0) : ?>
    <div class="alert alert-danger text-center " role="alert">
        Maaf belum ada data
    </div>
    <?php die; ?>
<?php endif; ?>

<?php if ($kd_indi != 4 && $recekpanah != 0) : ?>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
        <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
        &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
    </h5>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
    <?php if ($n == 0) : ?>
        <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
        <div class="container-fluid text-center">Data capaian provinsi belum tersedia</div>
    <?php endif; ?>
    <?php if ($n != 0) : ?>
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
<?php if ($kd_indi == 4 && $recekpanah != 0) : ?>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
        <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
        &nbsp;&nbsp;PETA &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
    </h5>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
    <?php if ($n == 0) : ?>
        <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
        <div class="container-fluid text-center">Data capaian provinsi belum tersedia</div>
    <?php endif; ?>
    <?php if ($n != 0) : ?>
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
<?php if ($recekpanah == 0) : ?>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
        PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
    </h5>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI <?= $namaprov; ?></h5>
    <?php if ($n == 0) : ?>
        <div class="container-fluid text-center">TAHUN : <?= $tahun; ?></div>
        <div class="container-fluid text-center">Data capaian provinsi belum tersedia</div>
    <?php endif; ?>
    <?php if ($n != 0) : ?>
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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="610" height="311" viewBox="0 0 610 311">
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
            </style>
            <filter id="filter" x="417" y="150" width="111" height="126" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="57" y="77" width="159" height="54" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="36" y="15" width="138" height="52" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="310" y="93" width="164" height="161" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="491" y="180" width="66" height="113" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="136" y="139" width="122" height="99" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="83" y="11" width="42" height="28" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="204" y="78" width="200" height="172" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="515" y="162" width="42" height="37" filterUnits="userSpaceOnUse">
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
        $kdwil = '91.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>


            id="Kab_Jayapura_03" data-name="Kab Jayapura 03" class="cls-1" d="M520,174h2v7l-6-1v1c1.139,1.139.4,0,1,2h4q-0.5,3-1,6h-5v1h-2v1c-2.912.539-2.283-1.77-3-2l-9,1c-1.339,2.523-1.99,3.5-2,8h-1v5c1.551,6.082-.119,12.21,0,20l-3,1q0.5,3,1,6h-1v4h-1v1l2,1v2l2,1v5h1c0.809,3.8-2.6,2.86-2,6h1v2h1q0.5,3.5,1,7h1c0.3,1.969-1.28,3.711-2,5h-1q0.5,3,1,6c-5.374-.045-8.2-1.779-12-3l-9-1-1-2c-2.537-1.487-6.17-1.829-10-2l-1-3c-2.689.464-4.606,1.735-7,0l-1-2h-3v-1h-4l-1-2h-2v-1h-2v-1c-4.2-1.423-5.588,1.6-9,2v-4c-1.87.521-5.461,3.579-7,3v-1c-1.408-1.1-2.931-3.487-4-5h-1v-3c1.033-.991,4.691-8.542,4-11h-1v-2h-1v-8l2-1c1.064-3.341-1.657-3.147-2-4V208h-1v-7h-1q-1.5-17.5-3-35c1.135-.844.145,0.127,1-1l9-1v-1h6v-1l14-1c5.185,0.014,11.235.437,15,2v-1h1c1.575-2.169-1.048-1.946,2-4v-1h5v-1c1.433-.823,1.7-0.744,4-1v1h2l1,2h2l2,3h4v1h2c3.345,1.744,1.372,2.648,7,3,1.195-2.773,1.2-3.572,5-4,3.783,3.556,13.327,1.334,17,5h1v3C519.959,170.34,520.122,170.637,520,174Z"/>
        </a>
        <?php
        $kdwil = '91.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>


            id="Kab_Kepulauan_Yapen_05" data-name="Kab Kepulauan Yapen 05" class="cls-2" d="M64,82l12,1v1c1.655,0.3,1.777-.954,2-1l10,1v3H87v1H81v1H73V88c-1.215.264-1.839,1.748-4,1V88H67V87c-2.223-1.07-1.107,1.008-3-1-1.139-1.139-.4,0-1-2C64.139,82.861,63.4,84,64,82ZM95,94c5.02,0.834,12.3,1.66,17,3h11v1l3,1v1c2.139,0.577,3.871-2.775,6-3v1c5.055,1.267,10.772.978,17,1h7v1l7,1v1h2v1h3v1l13-1v1h4v1l19,1v1h3v1l3,1v3l-7-1v1h-4v-1h-1v1h-2v1h-2q-0.5,1-1,2h-8c-1.382.3,0.4,1.179-1,1a2.615,2.615,0,0,0-3-1v1c-1.563.842-2.411,0.824-5,1v2l-2-1v1l-4,3q0.5,1.5,1,3l-5-1v1h-1l-4-5h-2v-1l-3-1v-3l-11-1v-1h-2v-1h-5l-3-4h-2v-1l-4-1v-1h-5v-1l-4-1v-1h-3v-1c-2.274-.712-2.819,1.261-4,1v-1h-2v-1h-7V99c-2.789-.781-5.844,1.487-7,1V99C94.959,97.66,95.122,97.363,95,94Z"/>
        </a>
        <?php
        $kdwil = '91.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>


            id="Kab_Biak_Numfor_06" data-name="Kab Biak Numfor 06" class="cls-3" d="M124,20h3c2.529,4.778,6.694,8.057,11,11h2v1l2,1c1.966,3.037-1.784,2.547,3,4v2h1v2l2,1,5,7,8-2,3,4c0.3,0.169,3.432.757,4,1l-1,2a9.681,9.681,0,0,0-2,2c-1.3.7-16.25,4.6-18,4V59h-2V58h-2l-1-2c-4.658-2.044-10.236,1.759-14,2l-2-3h-1V53h-1c0.009-.788,1.921-4.491,1-7h-1q-0.5-2-1-4h-1V38h-1c-1.175-3.022-1.016-5.166-2-8h-1l1-3A9.353,9.353,0,0,0,124,20ZM42,40h7c1.643,3.1,1.9,1.8,2,7H50v3h4l-1,4a34.622,34.622,0,0,1-7,1c-3.061-5.237-5-3.925-5-13C42.139,40.861,41.4,42,42,40Z"/>
        </a>
        <?php
        $kdwil = '91.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>


            id="Kab_Sarmi_10" data-name="Kab Sarmi 10" class="cls-4" d="M358,109v2c2.739,0.644,2.276,1.309,5,2v2c2.128,1.212,2.177,2.252,5,3,0.723,2.762.279,2.237,3,3v2h3l1,2c1.7,0.549,1.766-.947,2-1l10,1v1h2l1,2h3v1h2v1h3l1,2h2v1c1.371,0.925,1.762.677,4,1v2l9,2v1h2v1h3l1,2h3v1l3,1,1,2,6,2,1,2h4l1,2h2v1h2l1,2h3v1l4,1v3c-10.9-.095-17.009,3.786-28,4-1.412,2.663-2.03,4.22-2,9h1v5s1.315-.157,1,2h-1v6h1v3h1v14l2,1v15a2.555,2.555,0,0,1,1,3h-1l-1,3h1v7h1q0.5,2.5,1,5h-2v5h-2c-1.077,4.084-3.138,3.216-8,3v2l-4-1a1.522,1.522,0,0,1-2,1l-2-4c-2.467-.9-2.675,1.915-3,2l-6-1v-5l-5-3,1-3a9.879,9.879,0,0,1-2-2l-3,1v-1c-1.759-1.5-1.9-2.7-2-6,1.278-1.248,2.562-4.867,3-7h2c2.379-4.184,5.359-6.682,6-13l-5-6h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1l-4-1-1-2-6-2c-4.936-2.639-9.922-6.619-16-8,0.365-5.506,1.1-3.711,3-7v-2l2-1v-2l2-1v-4h1v-1h-1c-1.926-6.545-6.58-7.692-8-14-0.5-.085-8.593-0.814-9-1l-1-2-3-1v-1h-3l-1-2h-2v-1h-2v-1l-3-2-2-6-4-3c-0.95-1.563.335-2.967-1-4l-9-3q-0.5-3.5-1-7h1l1-4h1v-4h1v-3h-1q1-3,2-6l3,1v1h3v1l4,1v1h3C339.763,105.723,349.161,108.629,358,109Zm93,53v-2h3l-1-2h8v-1c2.085-1.227,6.1.643,7,1l-1,3h-1l1,2H457v-1h-6Z"/>
        </a>
        <?php
        $kdwil = '91.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>


            id="Kab_Keerom_11" data-name="Kab Keerom 11" class="cls-5" d="M543,190v2h4v2c2.438,0.68,1.734.38,3,2h1v88c-3.16.1-4.757,0.07-7,1v1c-6.476,2.23-12.27-1.845-17-2-4.826-.158-5.892,2.706-9,2v-1h-3v-1l-11-1c0.459-2.985,1.224-4.228,0-8h-1v-5l-3-2q0.5-3,1-6h1q-0.5-5-1-10h-1v-2h-1a2.753,2.753,0,0,1,1-3c0.316-1.929-1-2-1-2q0.5-3.5,1-7h-1c-1.71-2.636-2.417-1.924-3-6,1.059-1.177,1.7-7.214,2-9h2c-0.46-2.611-2.066-7.159-1-11h1V197h-1v-3c3.1-1.643,1.8-1.9,7-2v-2h4c0.891,0.352.025,2.5,3,2v-1h2v-1l5,1,3-4h2v-1C531.334,183.608,537.384,189.619,543,190Z"/>
        </a>
        <?php
        $kdwil = '91.15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>


            id="Kab_Waropen_15" data-name="Kab Waropen 15" class="cls-6" d="M203,146l6-1,3,4h1q0.5,2,1,4h1q-0.5,3-1,6h1v1h2q0.5,1,1,2h5l3,5,4,1q0.5,1,1,2h2q0.5,1,1,2c3.022,2.019,5.77,2.056,8,5h1v8c0.486,0.72,1.418.022,1,2l-2,1q0.5,3.5,1,7l8,4q0.5,3.5,1,7l-17,9a7.173,7.173,0,0,0,1,4h-1v1l-3-1v1h-2q-0.5,1.5-1,3l-16,2c-1.863,4.4-3.38,6.133-10,6v1h-5v-1h-3v-1h-3v-1l-12-1-2-3h-1v-2h-1c-0.935-2.307.293-5.064-1-7l-7-5v-7l-4-3c-4.012-4.057-6.124-8.675-13-10q-0.5-1.5-1-3a34.651,34.651,0,0,1-7,1c-0.945-1.8-1.385-1.574-2-4a9.161,9.161,0,0,0,2-2h3v-1h4v-1h2v-1l5-1q0.5-1.5,1-3h1q0.5-1.5,1-3l2-1q0.5-4.5,1-9h1v-2l3-2v-2h1a1.6,1.6,0,0,0-1-2c-0.6-3.192.614-4.707,1-7,2.718-.743,3.045-1.653,5-3v-1h10c2.063,3.1,1.186.506,4,2q0.5,1,1,2h5c1.4,0.21-.412,1.085,1,1v-1h2v-1c4.121-1.065,4.137,4.06,6,2h1v-3Z"/>
        </a>
        <?php
        $kdwil = '91.19';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>


            id="Kab_Supiori_19" data-name="Kab Supiori 19" class="cls-7" d="M88,16l11,1v1l5-1,1,2a2.732,2.732,0,0,0,3-1l4,1,1,3,6,1v3h-4l-4,7h-3c-1.256-1.909-1.014-1.659-4-2V29c-1.912-1.028-6.865-4.243-8-6l-2,1v1H93V24C90.251,22.412,88.726,19.579,88,16Z"/>
        </a>
        <?php
        $kdwil = '91.20';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>


            id="Kab_Membramo_Raya_20" data-name="Kab Membramo Raya 20" class="cls-8" d="M325,127l-1,3h1l4,5h1v2c0.323,0.556,3.732,5.841,4,6l6,1v1h2v1h2l1,2h2v1h6s0.053,0.657,2,1l1,3h1l1,3,2,1v2l3,2v6c-2.1,1.721-7.58,10.6-8,14l3,1v1h2v1h3l1,2h3l1,2h3l1,2h2v1h2v1h2v1h2v1h2v1l4,1,1,2h3l1,2h2l5,6a8.7,8.7,0,0,1-2,2q-0.5,3-1,6l-4,2v2l-3,2v3h-1c-1.49,3.84-.162,4.666,0,9,3.067,1.3,4.561,1.849,5,6a7.742,7.742,0,0,0-2,3l-4-1v1h-2v1a22.862,22.862,0,0,1-8,2c-0.944-1.243-2.266-1.073-3-2-2.09-2.64-1.073-3.975-5-5v-2h-2v-2h-7v1h-2v1h-3v1h-2v1l-15-1c-0.653-1.32-1.581-1.361-2-2v-2l-2-1v-4c-1.267-2.131-4.444-2.053-8-2v1h-4v1l-3,1v3c-2.16.393-4.553,1.243-7,0l-1-2h-3v-1c-3.1-3.322-.165-6.432-6-8-1.692-1.5-5.815-.994-9-1l-20-1c-0.945-1.8-1.385-1.574-2-4-2.285-.1-2.607-0.847-4-1v1h-4v-1l-4-1c-0.676-2.631-1.594-3.208-3-5h-1l-3-10-6-1c-0.381-2.276-1.824-4.706-1-8h1v-4h-1c-0.759-2.814-.586-6.764-1-9l-10-5-2-3-4-1-3-5h-5v-1h-2c-0.442-.269-0.9-1.4-2-2,3.2-8.4-4.233-9.915-6-16h6q0.5-1.5,1-3c1.82-.263,2-1,2-1h5v-1h2v-1h9v-1h2q0.5-1,1-2h2c1.1-.955.765-2.039,1-4h-1v-6c-4.422-1.979-2.617-1.729-5-5-1.841-2.527-3.957-1.938-5-6,1.139-1.139.4,0,1-2l6-2v-1h5v-1h2q0.5-1,1-2h2v-1h2v-1h2v-1h2v-1h2l1-2h2l1-2h2l1-2,12-4,1-2h2V87h2V86h4V85h2V84l13-1c1,1.264,2.372,1.2,3,2v2l5,4,1,2h2l1,2,9,3q-0.5,3-1,6a1.713,1.713,0,0,1,1,2h-1v3h-1v3h-1v2h-1c-1.039,3.079.887,7.881,2,9v1l6,1v1Zm-34-15c0.259,3.1,2.01,6.69,4,8v1h1v-1l8,1,1-4-4-3v-1Z"/>
        </a>
        <?php
        $kdwil = '91.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Jayapura_71" data-name="Kota Jayapura 71" class="cls-9" d="M528,167v5l-2,1v3h-1q0.5,1.5,1,3c2.875,0.412,4.366,1.34,8,0v-1h2v-1l7,1v1a2.84,2.84,0,0,0,3-1l5,1v14l-11-4q-0.5-1-1-2l-7-1v-1c-4.084-1.232-7.1,1.382-9,0-3.006-2.035-2.157-9.02-2-14h1v-3Z"/>
        </a>
    </svg>

    <div class="row">
        <div class="col">

        </div>
        <div class="col">
            Sumber : <?= $sumber; ?>
        </div>
        <div class="col">

        </div>
    </div>
    <?php legend_kab($kd_indi); ?>

    <input type="text" id="tahun" value="<?= $tahun; ?>" hidden ?>

    <script>
        function edit_user(id) {
            $('#isi_edituser').load('view_peta_prov.php?id=' + id);
        }
    </script>

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
                    url: "ambil_papua_kiri.php",
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