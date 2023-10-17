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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="364" height="292" viewBox="0 0 364 292">
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
                .cls-6 {
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
            </style>
            <filter id="filter" x="24" y="9" width="161" height="232" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="119" y="96" width="142" height="102" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="208" y="131" width="97" height="129" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="232" y="74" width="96" height="78" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="239" y="128" width="91" height="93" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="164" y="116" width="32" height="27" filterUnits="userSpaceOnUse">
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
        $kdwil = '96.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Raja_Ampat_01" data-name="Kab Raja Ampat 01" class="cls-1" d="M151,14c1.975,1.129,2.338,1.417,3,4-1.135.844-.145-0.127-1,1l-2-1C150.007,14.926,150.066,17.045,151,14ZM140,48h4l-1,3h-3V48ZM69,51v2c3,0.776,2.63.616,3,4-1.139,1.139-.4,0-1,2H68c-1.212-2.128-2.252-2.177-3-5h1C66.723,51.238,66.279,51.763,69,51Zm96,11h5c2.272,3.354,4.675,2.155,5,8-2.075,2.608.6,3.941,2,6,0,0,2,0,1,1h-1c-1.72,2.135-2.033.566-3,4l-4,1c0.549,2.784.77,0.1,0,3-4.772-1.042-4.934-3.843-8-5h-9l-1,2h-4v1c-2.251.515-5.5-1.4-7-2v5l-4,1-1,2h-4v1h-2v1h-8V90h-1q-0.5-3.5-1-7h-1q0.5-3,1-6l-9,1c-0.5,1.44-1.387,2.442-1,5a1.54,1.54,0,0,1,1,2l-2,1v2h-2V86h1V85h-1V79l-4-2a10.6,10.6,0,0,0,1-4l-5,1v2c-2.724-.528-2.948-1.981-3-2H95v1c-2.582.862-10.042-1.109-11-2-1.139-1.139-.4,0-1-2H78V69l10,1c-0.723-2.762-.279-2.237-3-3V64H82V61h1V60h5v1h3a9.746,9.746,0,0,1,1-4h2l1,2c3.312,1.087,3.125-1.617,4-2,3.241-1.42,6.7-.323,9,0l2-3c2.323-.746,3.222,2.067,5,2V55h2V54l7-1v2h4V54h-2V52c5.291-.361,9.9-1.14,15,1v1h2v1c2.432,0.718,5.268-1.736,7-2l2,3h2v1h7l1,2C164.623,60.8,163.845,57.932,165,62ZM124,76l6,1a1.527,1.527,0,0,1,2-1l1,2h6V77h-1V74h-1V73c-1.341-.451.336-0.535-1-1h-7V71h-1V66c-0.885-1.417-2.53-.058-4-1V64l-2-1c-2.7-3.7.952-4.594-6-5v1c-0.6.021-1.85-.888-4-1v1c4.791,1.43,1.1.91,3,4l3,2A23.341,23.341,0,0,1,124,76ZM90,65c-0.113,3.16-1.955,1.874,1,3v3c2.762-.723,2.237-0.279,3-3h3l-1-3c-2.142.119-3.4,1.019-4,1V65H90ZM76,75l3,1v3l-3-1V75ZM47,86a9.746,9.746,0,0,1,4,1,11,11,0,0,1-2,2l1,4H49c-1.127,1.719-.633,1.355-3,2a13.3,13.3,0,0,0-3-4l1-3A7.485,7.485,0,0,0,47,86Zm66,1h4c1.082,1.707,2.129,2.124,4,3-1.3,3.185-2.28,6.051-6,7v1h-4V93h-3c-0.826,3.2-1.179,2.9-5,3V95H99l1-5h3v1c1.139,1.139.4,0,1,2h3c0.723-2.762.279-2.237,3-3V89h3V87Zm17,31,4,1c1.413-.048-0.363-0.624,1-1,3.082-.849,4.016.615,5,2,1.135,0.844.145-.127,1,1-4.864.216-3.385,1.068-7,2q0.5,2,1,4h-1c-3.265,3.167-6.292.5-11,2v1h-3v1l-12,1v1c-3.638.724-3.037-1.7-4-2a1.527,1.527,0,0,0-2,1l-4-1-1,2H94c0.727-2.931,1.507-2.185,3-4h1c2.417-4.1-2.8-5.654,5-6,0.565,0.664,2.341,2.693,4,2v-1c1.139-1.139.4,0,1-2l5,1a1.63,1.63,0,0,1,2-1v1l6-1v1h4v-1l2,1c0.639-.285.069-1.3,3-2v-3Zm31,21q-0.5,3.5-1,7h-1v1h-4c-0.723,2.762-.279,2.237-3,3a34.218,34.218,0,0,1-1,8h-1v-1h-3v-1c-5.95-1.969-8.309,4.577-14,2l-2-3c-4.648-2.154-5.263,3.008-7-1a9.11,9.11,0,0,1-5-6c0.88-.593,2.739-0.911,2-3h-1c-0.618-3.469-1.648-5.168-5-6q-0.5-1.5-1-3h1c2.517-2.472,4.228-.848,8-2v-1h6q0.5-1,1-2l10-1,3,4c2.434-1.168,6.931-3.556,9-2,2.168,1.955,3.2,5.485,2,8h1v-1h6ZM55,153v2c-3.52.647-4.873,2.186-8,3v-2l-12,2-1-2-3,1v-1c-1.139-1.139-.4,0-1-2l3-1c1.139-1.139,0-.4,2-1l-1,3h1c0.678-.686,10.873-4.207,12-4v1Zm36,46c-0.3,4.882-.643,3.017-2,6h1c1.45,2.457,3.258,2.885,6,4l1,7c-1.3,1.048-1.489,2.043-3,3v1H93v-1l-2,1-1,3h1c3.436,2.9,5.128-1.544,6,5H96l1,3-6,1v-3H90v-1c-2.388-.089-2.489-0.667-4-1v1c-1.654,1.07-1.64,1.439-4,2l-1,4H78v1H73v-1a2.682,2.682,0,0,0-3,1l-4-1v-2H58l-1-2c-2.571-1.146-4.92.2-7-1l-1-2H44l-1-2-3-1v-1H38l-2-3c-3.061-1.884-2.612,1.8-4-3,1.2-.606,1.51-1.7,2-2h2v-1l10-2,2-3,8-1,1-2,6-1v-1l3,1h1v-1h7v-1l6,1v-1c1.139-1.139.4,0,1-2Z" />
        </a>
        <?php
        $kdwil = '96.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sorong_02" data-name="Kab Sorong 02" class="cls-2" d="M253,123l-5,1q0.5,1,1,2h-1c-1.129,1.233.025,0.415-2,1v3c4.348,0.355,5.528,2.086,9,3v3c-4.472.944-6.633,3-9,6h-1c-1.957,3.152,1.762,2.475-3,4v-2c-2.506.784-5.416,0.079-10,0-0.611-3.518-1.076-4.589-5-5-1.251,1.586-3.353,2.8-5,4v1h-2v3h1q-0.5,1-1,2h1c2.321,3.462,3.648.942,4,7h-1v3h-7q0.5,1,1,2l-3,1v1h1v1h-1q0.5,1,1,2h-1v1h2q-0.5,1.5-1,3h1v-1h4c-0.112,2.335-.763,2.543-1,4,0.249,0.52,1.6.142,1,2l-2,1c-0.326,1.277,3.128,3.455,2,6l-3,1v1h1v5s-0.663.119-1,2c-1.135-.844-0.145.127-1-1-6.908,2.535-14.18-1.327-19-4h-2q-0.5-1-1-2c-1.146-.689-4.1-0.254-4-2h-1v2l-3,1v-1c-2.826-.668-3.77-1.849-5-4h2v-3c-2.155-1.248-2.931-2.687-4-5h-2c-1.584,2.748-2.47,1.8-3,6,0.88,0.593,2.739.911,2,3h-1v2a42.479,42.479,0,0,0-8,2q-0.5,1-1,2h-1v-1c-1.4-1.2-2.207-3.241-3-5h-5v-1h-2v-1h-1v1h-6v1l-7-1c0.705-3.087,1.949-4.254,5-5,0.354-4.424,2.133-6.218,3-10a13.3,13.3,0,0,0,4-3l9-1,3-9h1v-2h1v-5h1q0.5-2.5,1-5h2v-3h3v-1h6v1c3.442,0.923,6.666-.574,9-1a10.6,10.6,0,0,0,1-4c-2.036-1.668-.857-2.416-2-4-3.457-4.792-6.012,1.817-6-9,4.967-.4,6.629-2.4,11-3v3c3.044-.5,5.663-2.242,8-3h10v-1h4c5.684-1.905,12.232-3.1,13-10,3.671-.868,4.866-2.857,8-4v1c1.738,1.559.976,1.8,2,4h1v6h1c2.307,2.5,2.316.709,5,2v1h2v1l2,1v2l3,2v2ZM124,154a19.514,19.514,0,0,1,9,2v1h7q0.5-1,1-2h6q0.5,1,1,2l3-1v5l-3,2v3h-1c-0.656,1.266-.921,4.393-2,5h-3c-2.3-3.415-4.51-2.116-8-4v-1h-2l-3-4h-3c-1.284-.593.305-0.454-1-1A29.413,29.413,0,0,0,124,154Z" />
        </a>
        <?php
        $kdwil = '96.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sorong_Selatan_03" data-name="Kab Sorong Selatan 03" class="cls-3" d="M243,172l13,1,1-3c2.01,0.574.865-.12,2,1,5.278,1.039,8.953,5.834,10,11h-2v8c-4.73,1.448-2.328,2.027-4,6h-1v3h-1c-1,1.373-1.7,2.922-3,4a12.122,12.122,0,0,0,2,5h1v4h1c2.034,1.829,8.307.987,12,1,6.932,0.024,10.175,1.537,15,3,1.447,0.439,4.077-1.063,4,1h1v-2h3v6h-1c-1.414,2.052-3.049,3.464-4,6h1c0.666,1.188,1.6,1.4,2,2v2l3,2c-0.025,1.624-2.743,5.835-2,8l2,1c0.96,2.334-1.239,2.367,1,4v1h-1c-0.7,2.835-1.783,2.888-3,5-2.01-.574-0.865.12-2-1h-2q-0.5-2.5-1-5h-1v-1h-3v1h-3v1h-2v1h-2v1h-2v1h-3v1h-2l-1,2-8,1-8-10h-2q-0.5-1-1-2l-6-1-2-3h-2c-0.628-.423-0.764-1.327-2-2q0.5-1.5,1-3a7.5,7.5,0,0,0,3-2c-1.135-.844-0.145.127-1-1a10.6,10.6,0,0,1-4,1c-1.026-3.407-1.256-1.861-3-4h-1c-0.7-1.319-.154-3.892,1-4v-1h-3q-0.5-1.5-1-3l-2-1v-3h2v-1c-1.909-1.256-1.659-1.014-2-4h2c1.164-2.716,1.78-4.18,5-5q0.5-1.5,1-3h-6v1h-4q-1-5.5-2-11c-3.728-.553-3.183-0.866-7,0v1h-1v-1c-1.587-1.354-1.737-2.169-2-5h1q0.5-3,1-6l2,1v-1h-1c-1.49-2.527,1.506-8.893,2-11h-5c-0.844-1.135.127-.145-1-1q0.5-1,1-2l-2-1c-0.381-1.807,1.786-.421,0-4h1c2.034-2.564,4.178-3.054,9-3q-0.5-1.5-1-3h1v-4l-2-1c-1.866-3.045-1.921-5.041-2-10l3-1,3-4h3a7.742,7.742,0,0,0,3,2c-0.549,2.784-.77.1,0,3,2.3,0.737,11.01,1.4,12,3v2C245.593,148.635,243.159,166.64,243,172Z" />
        </a>
        <?php
        $kdwil = '96.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Tambrauw_04" data-name="Kab Tambrauw 04" class="cls-4" d="M322,90v3c-2.391.463-3.145,1.158-5,2q-0.5,3.5-1,7h-1q0.5,3,1,6a60.584,60.584,0,0,1-11,1,36.4,36.4,0,0,0-4,10l5,1q-0.5,3.5-1,7c-1.135.844-.145-0.127-1,1-4.62-.2-15.68.156-18,2q-1,2.5-2,5h1l4,11c-2.762-.723-2.237-0.279-3-3-6.224.129-9.955-.158-13-3l-2-3h-3l-1-2h-3l-1-2c-2.23-.956-3.878.82-5,1v-1h-2v-1h-3q-0.5-1-1-2h-4q-0.5-1.5-1-3h-1c0.844-1.135-.127-0.145,1-1,1.854-2.181,5.149-2.847,7-5h-1q-0.5-1.5-1-3h-1c-2.777-3.231-4.869-4.994-10-6v-3h-1v-1h1c0.2-1.541-1.185-4.3-2-5h-2q0.5-1,1-2h-1v-1l6-2V94h1l2-3h2V90h2l2-3,7-2V83h9V81l3,1V81c1.248-.6,3.528-1.7,6-1v1h4v1l5-1v1h9v1l6-1v1h2v1h2v1h2v1h2v1h2v1h2v1h2v1h2v1Z" />
        </a>
        <?php
        $kdwil = '96.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Maybrat_05" data-name="Kab Maybrat 05" class="cls-5" d="M287,153l5,1v1h2v1l6-2v-1a19.3,19.3,0,0,0,4,1v1h3l1,2h1v2l3,2v2c2.016,2.769,7.484,4.573,11,6a7.173,7.173,0,0,0,1,4h-1c-1.127,1.719-.633,1.355-3,2,0.063,5.707-1.044,6.29-2,10-4.786.951-7.246,3.9-12,5-1.574-2.911-3.846-5.536-8-6-1.4,1.654-3.457,2.476-6,3l2,6h1c1.362,4.036-2.355,8.719-3,11q0.5,5.5,1,11c-4.9-.114-9.165-1.869-13-3H263l-2-6-2-1c-0.228-.912,2.461-5.187,3-6h1q0.5-3,1-6l4-3v-7h1c0.827-1.454.667-1.713,1-4-1.367-1.183-.972-1.832-2-3l-2-1-1-3-6-2a10.406,10.406,0,0,0-2-2v1c-2.78,2.272-.584,2.721-6,3v-1h-7q1-13.5,2-27c4-2.329,5.5-5.8,11-7v-3c1.135,0.844.145-.127,1,1,4.916-1.8,8.2,1.795,12,4h2l3,4h2v1c4.9,1.927,7.164-3.177,9,3h1v6Z" />
        </a>
        <?php
        $kdwil = '96.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Sorong_93.71" data-name="Kota Sorong 93.71" class="cls-6" d="M182,121v6l5,1c1.134,2.375,3.031,4.489,2,6-1.582,2.394-3.954,2.124-8,2-2.126-2.026-5.538-.524-8,0q0.5-2,1-4c-3.928-1.944-5.006-2.1-5-8Z" />
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
                    url: "ambil_papuabd_kiri.php",
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