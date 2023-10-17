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

<div class="container-fluid text-center">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="625" height="369" viewBox="0 0 625 369">
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
            </style>
            <filter id="filter" x="161" y="23" width="140" height="73" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="427" y="172" width="54" height="57" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="330" y="253" width="81" height="109" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="56" y="43" width="78" height="43" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="275" y="37" width="124" height="117" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="136" y="29" width="85" height="49" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="521" y="175" width="60" height="115" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="32" y="277" width="259" height="83" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="50" y="47" width="82" height="57" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="167" y="73" width="28" height="23" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="398" y="175" width="61" height="39" filterUnits="userSpaceOnUse">
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
        $kdwil = '81.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Maluku_Tengah_01" data-name="Kab Maluku Tengah 01" class="cls-1" d="M228,28l4,1v2h-3V30C227.861,28.861,228.6,30,228,28Zm24,4c11.925-.167,13.343,2.76,24,5l1,3a10.6,10.6,0,0,1,4-1v2c5.365,1.1,7.232,3.745,14,4q-1,5.5-2,11a32.463,32.463,0,0,0-10-2c-0.147,4.161-1.258,4.722-2,8a15.68,15.68,0,0,1-6,1v1c-1.313.525,0.213-.685-1-1l-15-1c1,4,3.374,4.394,4,9-1.135.844-.145-0.127-1,1-3.659-.749-6.609-2.967-10-4h-9V67l-4-1V65h-3V64l-10,1c0.789-3.229,1.856-3.449,2-8l-6-1c-2.418,4.144-1.87,1.2-5,3v1c-1.829,1.32-1.931,1.645-5,2V57l-2-1c-1.543-1.979-1.76-3.569-2-7,2.259-.787,6.471-1.432,8-3-1.358-1.626-.149-6.08,0-10h1v1l10-1V35l6-2v1h1c1.153,2.077-1.231,4.141-1,5,0,0,.875.061,1,2h2c0.849,0.352.381,1.938,2,2V42h4l2-3h2c0.7-.4,5.759-3.517,6-4V32ZM166,74h2v2h-2V74Zm25,0c-0.373,4.465-.628,2.915,0,7h-3V80c-1.139-1.139-.4,0-1-2l-5,1C182.989,74.595,185.394,73.839,191,74Zm13,0c5.1,0.255,3.494,1.393,8,2V74c1.135,0.844.145-.127,1,1h1v4l-4-1v2h-2c-0.684-2.927-1.113-3.275-4-4V74Zm-8,1h6a6.719,6.719,0,0,0,3,3v1h-2v1h-5c-0.092.029,0.186,0.623-2,1V75Zm-18,4v2c-2.391.463-3.145,1.158-5,2,0.944,1.8,1.385,1.575,2,4-3.428.871-2.575,2.068-6,3-1.382-2.612-1.769-1.693-2-6C172.441,82.508,170.267,79.272,178,79Zm40,4c0.86,1.123.846-.406,1,1l-1,2h-1Z"/>
        </a>
        <?php
        $kdwil = '81.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Maluku_Tenggara_02" data-name="Kab Maluku Tenggara 02" class="cls-2" d="M475,178c-0.239,7.159-3.64,13.618-5,20-1.876.823-2.616,1.481-5,2-0.871,3.428-2.068,2.575-3,6h-2v-5c1.8-.945,1.574-1.385,4-2,0.155-6.545,3.833-15.65,6-21l3-1v1h2Zm-28,19-1,3h3c0.255,5.1,1.393,3.494,2,8h2q-0.5,4-1,8l-4,1v-2c-2.762-.723-2.237-0.279-3-3,4.851-4.268-1.148-7.769-2-14Zm12,10h2c0.1,2.612.252,3.426,1,5h-1a11.576,11.576,0,0,1-5,6v-3C457.388,213.657,458.746,209.694,459,207Zm-17,1a9.733,9.733,0,0,0,1,4h-3c-1.139-1.139,0-.4-2-1v-1h1C440.127,208.281,439.633,208.645,442,208Zm-5,4h2v1h-1v3h-1v-1h-1v-1Zm-5,8h3v1c-1.135.844-.145-0.127-1,1l-2,1v-3Z"/>
        </a>
        <?php
        $kdwil = '81.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_Tanimbar_03" data-name=" Tanimbar 03" class="cls-3" d="M384,259v2h-2v-1l-3,1v-1h1l1-2Zm-6,3h2l1,4-3,1v-1c-1.139-1.139-.4,0-1-2C378.139,262.861,377.4,264,378,262Zm-1,8v3h-1c-1.139,1.139,0,.4-2,1v-3h1C376.139,269.861,375,270.6,377,270Zm24,10c0.778,0.1,3.845-.708,3,1C401.589,281.942,402.675,281.868,401,280Zm-29,7a11.878,11.878,0,0,0-1-5h3a10.6,10.6,0,0,1,1,4Zm13-2v4h1v-1h3l1,3h-1c-3.109,2.771-4.2-1.031-5,5h1q0.5,2.5,1,5a1.761,1.761,0,0,0-1,2h1v4h-1l1,3h-1v2h-1v3h-1c-1.4,1.877-2.241,2.34-3,5l-5,1q-0.5,2.5-1,5h-2c-2.361,2.847-4.871,3.51-6,8-1.139-1.139-.4,0-1-2h-2v3c-2.078,1.094-1.771,1.611-5,2v-1l-4,1v-1h-1q0.5-3,1-6l-2-1v-2a9.749,9.749,0,0,0,4-1,10.6,10.6,0,0,1-1-4h-3l-1-4h2c-1.139-1.139,0-.4-2-1v-2h4v1c-1.139,1.139-.4,0-1,2h2l1,3h4v-1c-3.091-1.326-3.851-1.5-4-6,3.753-2.557,1.168-3.838,3-7l2-1,1-2h4v-1c1.874-1.485,2.371-2.153,3-5l3,1-1-3,2-1,1-3h3a7.173,7.173,0,0,0-1-4h1C379.248,286.722,382.867,285.438,385,285Zm19,7c-4.605-.69-2.429-0.91-5-3v-1H389v-2c1.273-1.863,8.916-1.143,12-1,0.944,1.8,1.385,1.574,2,4h1v3Zm-33-2v3h-3C368.723,290.238,368.279,290.763,371,290Zm-10,6,3,1c-0.574,2.01.12,0.865-1,2v1c-2.01-.574-0.865.12-2-1h-1Zm-5,6c-1.036,4.047-.438,1.261-3,3l-1,2h-7v-3h1C347.219,302.894,353.882,302.161,356,302Zm-19,6,7,1v1c-1.139,1.139-.4,0-1,2l-6-1v-3Zm17,0h3v2h-3v-2Zm-9,13c0.723-2.762.279-2.237,3-3,1.139-1.139,0-.4,2-1v1a7.742,7.742,0,0,0-2,3h-3Zm9-2v2h1C354.426,318.99,355.12,320.135,354,319Zm14,19h-3v-1h1a3.982,3.982,0,0,1,2-2v3Zm-16,5-1,3h1c1.774-3.2,1.887-2.932,5-2-0.844,1.135.127,0.145-1,1-3.092,3.528-10.539,5.007-16,6v1c1.139,1.139.4,0,1,2l-6,2c0.308-3.182.362-2.474,2-4v-1h2v-1c1.328-.9,1.761-0.791,4-1a9.749,9.749,0,0,0-1-4h6c-0.993-3.074-.934-0.955,0-4C349.8,341.944,349.574,342.385,352,343Z"/>
        </a>
        <?php
        $kdwil = '81.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Buru_04" data-name="Kab Buru 04" class="cls-4" d="M119,60c-2.01-.574-0.865.12-2-1l-3,1c1.025,2.531,2.316,4.3,3,7h4V65l7,2c-1.163,3.1-1.046,8.434-1,13l-13-3V76h-3V75h-4V74h-4V73H98V72H94V71H89V70H84V69H82V68L62,62c0.063-3.577-.128-5.715-1-8h2v1c1.3,0.935,4.061.957,5,0V53l2-1V51h2V50h1v1s8.391-.827,9-1V49H95V48h6v1l4,1,1,2h2v1h5l1,2C116.84,56.851,117.985,56.214,119,60Z"/>
        </a>
        <?php
        $kdwil = '81.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Seram_Bagian_Timur_05" data-name="Seram Bagian Timur 05" class="cls-5" d="M309,42v2c3.39,0.8,4.572,3.191,7,5v1a6.225,6.225,0,0,0,5,0v2l4,3q0.5,4.5,1,9h-1v1c0.356,0.91.777-.225,1,2,1.359,0.454,1.68,1.4,4,1a2.875,2.875,0,0,1,3-1v1h2c0.944,1.8,1.385,1.575,2,4h-2v2l5,3v1h-1c-0.038.4,0.884,2.244,1,4h-3c-0.113,3.16-1.955,1.874,1,3v9c-4.307-.116-18.47-4-15-7h-5l-1-2h-2V82l-6-1-1-2-2,1V78h-1v1a16.248,16.248,0,0,0-5-1V76l-2,1-2-3h-2V73l-3,1-2-3-3-1c0.188-3.846,1.533-3.142-1-5V64c-0.913.193-3.028,2.094-5,1V64c2.528-2.282,1.581-3.683,3-7h1V54h1v1c2.064,1.113,2.923-1.277,4-1v1l3,1V55h1c1.675,1.481-.881.716,1,2V54h1V48c-0.637-.726-1.453.34-1-1l2-1,1-3h2l-1,2h4V43l2,1V43A11.994,11.994,0,0,1,309,42Zm24,19,3,1v3l-3-1V61Zm7,34h6v1h-1c-0.771,1.016-1.229.984-2,2-2.01-.574-0.865.12-2-1C339.861,95.861,340.6,97,340,95Zm20,2v2h-3V96h1C359.139,97.139,358,96.4,360,97Zm10,3c4.152,1.2,2.721,3.418,4,7h-3a7.49,7.49,0,0,0-2-3Zm-8,2v4h-1c-1.139-1.139,0-.4-2-1l-1-3h4Zm0,5h4c2.047,3.04,4.377,2.127,5,7-2.306-.512-2.453-0.884-4-2v-1C363.763,109.077,363.422,112.561,362,107Zm24,20c0.255,5.1,1.393,3.494,2,8h-3v-1h-1c-0.195-3.261-1.535-3.739,0-6h-1v-1h3Zm6,17,1,3h-1v1h-3v-5h1C391.139,144.139,390,143.4,392,144Z"/>
        </a>
        <?php
        $kdwil = '81.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Seram_Bagian_Barat_06" data-name="Seram Bagian Barat 06" class="cls-6" d="M215,36v7c-0.225,1.4-1.035-.414-1,1h1v3l-8,1q0.5,3.5,1,7l3,2v5l2,1v2l-3,1v1h2c0.194,1.99-1.6.8,0,2v1h-6c-1.892,1.957-5.046,2.047-9,2-0.661-2.437-.953-3.731-3-2-1.207-2.1-.432-2.543,0-4l-2-1V64h-2l1-2h-2V61h1c1.077-1.614-1.522-.864-2-1q-0.5-2-1-4l-6,1c0.213-2.312.2-2.565,1-4h1V52h-1V51h1V50h-1l1-2h-1v1l-2-1v1l-4,3v1h1v1h-1q-0.5,5.5-1,11l-4,1q-0.5,2.5-1,5a9.746,9.746,0,0,0-4,1V67l2,1c-0.5-1.325-.452.3-1-1V63l-3-2,1-2h-1q-0.5-3-1-6c3.16,0.113,1.874,1.955,3-1l4-1,1-2c2.678-1.37,4.142.006,7-1-0.473-1.261-1.628-2.614-1-5h1l-1-2h1c0.863-1.1.691-1.09,2,0V38h1c1.58-1.783,1.451-1.942,5-2v1s2.911-1.361,5-1v1h1V36c2.319-.374,2.642.522,4,1V36h-1V35h5C201.66,33.555,213.017,35.806,215,36Zm-47,3h3q-0.5,3-1,6c-3.1,1.643-1.8,1.9-7,2V43c2.739-.644,2.276-1.309,5-2V39Zm-8,20c-3.877.232-3.745,1.592-7,0v1c-1.016-.771-0.984-1.229-2-2,0.944-1.8,1.385-1.575,2-4l2,1V54h-1c-1.843-.95,2-1,2-1v1c0.519,0.455,6.369.735,3,2Zm-12,3,3,1-1,3c-4.4-1.867-1.842-1.318-7-1-0.574-2.444-1.047-2.206-2-4,1.135-.844.145,0.127,1-1l2,1V60c2.195-.711,2.077-1.021,3,0C148.139,61.139,147.4,60,148,62Z"/>
        </a>
        <?php
        $kdwil = '81.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="_Kepulauan_Aru_07" data-name=" Kepulauan Aru 07" class="cls-7" d="M558,180q-0.5,2.5-1,5h-1v-1l-2,1v-1c-1.139-1.139-.4,0-1-2h2q-0.5-1-1-2h4Zm-6,6c4.457,0.321,5.389,1.136,9,0v5l2-1v5c-3.1-.869-1.8-2-4,1,2.364-.469.8-0.856,4,0v1l3-1c-0.267,1.389-.074-0.069-1,1,0.2,1.619,1.926,1.784,2,2q-0.5,1-1,2h1v1h-2q0.5,1,1,2h-3v1c2.762,0.723,2.237.279,3,3h-2l-3,4h-2c-1.463,1.164-.566,2.455-3,4,0.549,2.784.77,0.1,0,3h1c1.256-1.909,1.014-1.659,4-2q-0.5,1.5-1,3h1c1.127-1.719.633-1.355,3-2a11.878,11.878,0,0,1-1,5h1c1.139-1.139,0-.4,2-1,0.644,2.739,1.309,2.276,2,5l-5,3v1h2c1.139-1.139,0-.4,2-1v3h-1q-0.5,1.5-1,3h1v1h-3q0.5,1.5,1,3h-2c-1.28,1.015-4.014.52-7,0-0.325-2.073.493-2.078-1-3-0.6.455-.136,1.611-2,1-0.048-.016-0.094-0.728-2-1v-2h-4v-2c-2.391-.463-3.145-1.158-5-2v1h1v1h2l3,4c3.5,2.049,4.377-1.529,6,4,3.518,0.611,4.589,1.076,5,5h-1v1h-3a9.858,9.858,0,0,1-2,2v-1h-1v3a7.742,7.742,0,0,0-2,3h4v3h-2v1h1c1.889,0.86-2,1-2,1v-1h-3q0.5,1.5,1,3h-1c-1.139,1.139,0,.4-2,1-0.584,7.043-4.254,9.33-9,10v2l-3-1q-0.5-1.5-1-3h2v-2l-4,2v-1c-3.795-.869-4.068-2.31-4-7,2.442-2.545,2.1-9.828,2-15h1c1.139,1.139,0,.4,2,1q0.5,1,1,2s-2.153.181-1,1h2v-1c0.95-1.843,1,2,1,2,2.822,1.966,2.565,4.973,6,7-0.739-1.31-2.795-2.627-3-3q-1-5.5-2-11c-2.448.558-2.211,1.043-4,2v-1c-1.719-1.127-1.355-.633-2-3a7.5,7.5,0,0,0,3-2l-2-1v-1h1q-0.5-3-1-6c1.135-.844.145,0.127,1-1,2.01,0.574.865-.12,2,1,4.538,0.595,4.275,1.705,6,5h1v3l2,1v2c1.026,0.973.984-.947,1-1l3,1v-1h-1q0.5-3,1-6l-3,1q-0.5-1-1-2h-3q-0.5-1-1-2h-1q-0.5-1.5-1-3c-1.51-.906-1.656.511-2,1-1.877-.827-1.364-0.835-2-3a3.982,3.982,0,0,0,2-2l-3,1v-1c-2.475-2.271-1.307-2.183-1-6l6,1c0.227,1.772,1,2,1,2q-0.5,2-1,4h1c1.256,1.909,1.014,1.659,4,2v-1c-1.139-1.139-.4,0-1-2h-2q0.5-1.5,1-3h1v-2h1v-5h1v-1a1.463,1.463,0,0,1-1-2l2-1v-2h2v-3h3v-1c-1.953.073-3.418,1.053-4,1v-1h-2v-1l-3-1v1l-4,1v2h-2c0.233-3.116.761-3.144,2-5h1c0.7-1.23-.547-0.784-1-1,0.436-3.1.874-2.595,4-3,1.139,1.139,0,.4,2,1v1h-1q0.5,1,1,2l2-1v1h1v-4l4-3q-0.5-1-1-2h1v-1h2v-1l3,1v2l3-1v-1h-3v-5c-2.01-.574-0.865.12-2-1C552.139,186.861,551.4,188,552,186Zm-15,4,3,1c-1.139,1.139,0,.4-2,1v1h-1v-3Zm2,7c0.776-3,.616-2.63,4-3v1h1l-2,3Zm19,6c1.139,1.139,0,.4,2,1C558.861,202.861,560,203.6,558,203Zm3,1c0.607,2.393.318,1.858,2,3A7.49,7.49,0,0,0,561,204Zm1,7a7.5,7.5,0,0,1,3,2h-1q0.5,2.5,1,5h-1C562.357,214.9,562.1,216.2,562,211Zm4,1c0.778,0.1,3.845-.708,3,1C566.589,213.942,567.675,213.868,566,212Zm-13,3q-0.5,1-1,2c0.074-.042,2.9-1.586,2-2h-1Zm-11,6v2h2v-1l4,2q-0.5-1.5-1-3h-5Zm27,17h3v2h3v1c-1.194,1.1-2.7,2.69-1,4h-2v2c-1.139-1.139-.4,0-1-2h-1q0.5-2.5,1-5C568.285,240.792,569.25,240.817,569,238Zm-4,4h2v3h-2v-3Zm-16,4c1.139,1.139,0,.4,2,1C549.861,245.861,551,246.6,549,246Zm18,6h-5q-0.5-3-1-6c2.1,0.709.9,1.03,3,0v1A8.278,8.278,0,0,1,567,252Zm-9-5h2v1h-1c0.636,1.42,1.166.742,2,2-2.592-.265-3.3.1-4-2C557.39,246.641,557.72,248.386,558,247Zm-5,4v-2l2,1v-1h1v3h-1C553.861,250.861,555,251.6,553,251Zm17-2h2a3.982,3.982,0,0,1-2,2v1h-1Q569.5,250.5,570,249Zm-6,5c2.162,1.419,2.01,2.366,2,6-1.858,1.2-2.142,2.8-4,4v1h-1v-1c-1.139-1.139-.4,0-1-2C562.07,260.2,562.9,256.723,564,254Zm-10,5v2h-3v-1h1C553.139,258.861,552,259.6,554,259Zm-3,3h2q-0.5,1.5-1,3h-1v-3Zm16,8v2l-7-1v2h-3v-2h2q0.5-1,1-2Zm-16,12h3v2h-3v-2Z"/>
        </a>
        <?php
        $kdwil = '81.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Maluku_Barat_Daya_08" data-name="Maluku Barat Daya 08" class="cls-8" d="M212,284v3h-2l1,3h-1v1h-3a8.278,8.278,0,0,0-5-3v-3h1a8.278,8.278,0,0,1,5-3C209.256,283.909,209.014,283.659,212,284Zm-78,24c2.161,0.287,1.7.892,2,1,4.231,1.515,4.352-1.834,5,4-1.135.844-.145-0.127-1,1h-3l-1,3h-3v-3l2-1v-1h-1v-4Zm-31,14c-7.574-.108-9.251,1.827-15,3l-2,3H85v2l-2,1v1h1l-1,3H81l-1-2H74v-1l-9,1v-1H63v-1H54c-4.115,1.259-6.557,4-11,5v-3h1l-1-4,4-3-1-2,2-1,1-3h1l1-3c2.28,0.3,2.577.145,4,1v1h3v1h4v1a6.362,6.362,0,0,0,5-1v-1c0.94-.389,8-0.817,9-1l1-3h4l1-2,9-2v1h1v2l2,1v1C98.519,319.022,102.03,314.2,103,322Zm163,10h-2v-5c1.832-1.083,4.243-4.221,8-3v1h2v1h4v1c2.078,1.881-.043.646,1,3a7.727,7.727,0,0,1,2,2h-1l-4,8h-4c-1.139-1.139,0-.4-2-1C268.644,336.088,266.863,335.2,266,332Zm-6-3h2l1,4h-3v-4ZM40,339l-3-1v-3l2,1v-1h1v4Zm82,0,3,1-1,3c-1.135-.844-0.145.127-1-1h-1v-3Zm162,6c-3.428.871-2.575,2.068-6,3v-1h1c1.371-1.874-1.293-2.738,2-4,1.85-.709.761-1.358,2,0C284.139,344.139,283.4,343,284,345Zm-126-2,7,1v1h2v1h1v-1h4v1a1.714,1.714,0,0,0,2-1c2.3-.413,2.661.534,4,1-0.844,1.135.127,0.145-1,1-0.974,1.309-2.172,1.016-3,2v2c-1.084,1.187-2.747.89-5,1C165.144,346.936,158.524,352.822,158,343Zm-2,4v3l-6,1v-1a3.982,3.982,0,0,1-2-2c3.215-.77,2.155-1.508,6-2C155.139,347.139,154,346.4,156,347Zm65,3-1-3h8c1.048,1.3,2.043,1.489,3,3,1.135,0.844.145-.127,1,1h-4v-1c-2.081-1.085-2.878,1.193-4,1v-1h-3Zm-37-1,1,3h-1c-2.454,2.431-3.893,1.24-8,1v-3h1v-1h7Z"/>
        </a>
        <?php
        $kdwil = '81.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Buru_Selatan_09" data-name="Buru Selatan 09" class="cls-9" d="M61,52v6h1l-1,4h1v1l6,1v1h4v1h3v1h2v1l5,1v1h3v1l23,4,18,6v2h-2v1h-1V83l-9,2v1l-3,1-2,3-8,1v1H99l-1,2c-3.376,1.428-7.29-2.3-9-3l-6-1V89H81l-1-2-4-1V85H74V84H72l-2-3c-2.35-1.478-3.1.33-4,0V80H65l-2-6c-2.739-.644-2.276-1.309-5-2l-2-6H55V55C57.213,53.808,57.988,52.67,61,52Zm61,41h4a9.749,9.749,0,0,1-1,4c-2.01-.574-0.865.12-2-1h-1V93Z"/>
        </a>
        <?php
        $kdwil = '81.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Ambon_71" data-name="Kota Ambon 71" class="cls-10" d="M187,78c0.215,4.864,1.068,3.385,2,7-2.937,1.709-2.863,2.891-8,3-1.139,1.139,0,.4-2,1a7.536,7.536,0,0,1,6-6V81l-3,1v1h-2v1h-2l-1,2h-1V85l-2,1V85c-1.135-.844-0.145.127-1-1,1.43-.957,2.734-1.4,1-3h4V80c1.843-1.26,4.87-.359,6,0V79h-1V78h4Z"/>
        </a>
        <?php
        $kdwil = '81.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Tual_72" data-name="Kota Tual 72" class="cls-11" d="M404,180l3,1-1,3h-3Zm19,12h3v1h1v3h-2l1,2h-4v-2h2Zm27,2h2q0.5,3,1,6h-1c-1.139,1.139,0,.4-2,1C449.321,197.193,449.338,197.8,450,194Zm-34,9c1.719,1.127,1.355.633,2,3-1.135.844-.145-0.127-1,1-1.135-.844-0.145.127-1-1h-1v-1Z"/>
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
                url: "ambil_maluku_kiri.php",
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
                url: "ambil_maluku_kanan.php",
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