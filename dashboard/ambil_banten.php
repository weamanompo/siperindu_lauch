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

<div class="container-fluid mt-4 text-center">
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40%" height="40%" viewBox="0 0 900 600">
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
            <filter id="filter" x="7" y="190" width="572" height="349" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="407" y="214" width="351" height="386" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="656" y="66" width="203" height="206" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="379" y="3" width="324" height="254" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="755" y="118" width="120" height="106" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="408" y="5" width="121" height="115" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="516" y="74" width="105" height="112" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="805" y="189" width="91" height="82" filterUnits="userSpaceOnUse">
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
        $kdwil = '36.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Pandeglang_01" data-name="Kab Pandeglang 01" class="cls-1" d="M539,206c4.625,1.151,4.677,3.6,11,4v-1h6v-1c3.28-1.567,4.342-2.759,9-3,1.239,1.974,2.3,2.438,5,3,0.13,2.263,3,15,3,15l-2,1q0.5,1,1,2l-3,1v2h-1c-0.113,1.41-.191.558,1,1-1.145,1.255-.02.332-2,1v2l-3,1q0.5,1,1,2h-1v1l-2-1v1c-1.361,1.165-1.528,1.824-2,4h-2l-3,4h-1v3h-1v1h1v1l-2,1v3h-1v12h-1v3l-2,1q0.5,1,1,2h-2q-0.5,1-1,2h-1v1c0.078,0.051,1.95-.048,1,1h-2q0.5,1,1,2h-2q-0.5,2.5-1,5h-1v9h-1v4h-1c-0.4,1.333-.429,4.056,1,4v1h-2v3h-5v-1l-2,1c-1.348-.972,1.206-1.634-1-2-0.391.333,0.223,1.71-1,1q-0.5-1-1-2l-5-1v-1l-3,1v-1l-18,1v1h-3v1l-3,1v2c-2.762.723-2.237,0.279-3,3h-2v2h-2v1h1c-0.2,1.7-1.794,1.531-2,2v2c-3.944,1.149-1.284.281-3,3h-1v2l-3,2v3l-2-1,1,2-3,1-1,3h-2l1,2-3,1,1,2-2,1-1,4h-1v6h-1v6h-1c-0.617,2.1,1.347,3.1,1,4-0.087.224-1.406,0.2-2,3l-3,1,1,2h-1c-1.139,1.139,0,.4-2,1v5c0.2,1.4,1.073-.412,1,1h-1v3h-1v4h1a24.587,24.587,0,0,0-1,4l-3,1v1h1l-1,2c-2.622.85-1.439,0.046-4,1l1,2h-1c-1.025.974,0.285,0.409-1,1v-1l-2,1c-0.847,2.491-.447,1.648-1,5h-2c-0.35,4.605-2.674,18.469-1,24h1v4q0.5,4,1,8h-1v1h1v1l-3,1,1,2-3,1-1,3c0.239,0.259,1.8-.165,1,1l-3,1,1,2h-2l-1,2h-1v2l-2-1-1,3-2-1v2l-2-1-1,3-2-1-1,3-2-1v1c-1.116,1.019-1.009.454,0,2h-2a1.8,1.8,0,0,0,0,3h-2c0.113,3.16,1.955,1.874-1,3l1,3-2,1v5h-1l1,3h-2q-0.5,2.5-1,5l-3,1v1h1c1.889,0.859-2,1-2,1q0.5,3,1,6c2.022,0.8.985,1.009,3,0l1,3h1c-1.683,4.77,1.015,4.857,0,9h-1v15l-7-1v-1h-1v1h-7v1h-1v-1h-1v1H383v1h-5v1h-4l-1,2-9,1v-1h-3v-1h-2v-1l-9-2v-1h-2v-1c-2.323-.752-2.669,1.039-4,1v-1H324v1l-9,1v1h-3v1h-7v1l-21,1v1h-3v1h-5v1h-5v1h-9v1h-4v1h-3v1c-6.837,5.9-1.666,8.271-16,8-4.614-4.162-13.865.054-21-2v-1h-6v-1h-3v-1h-3l-2-3-4-1-3-4h-2l-2-3h-2q-0.5-1-1-2c-2.541-1.272-3.784-.226-6,0q1,4.5,2,9a40.116,40.116,0,0,1-9-1,86.875,86.875,0,0,0-5-9v-2l-3-1-1-2-5-1v-1h-2v-1h-3l-1-2-9-1c-8.517-2.554-20.1-3.034-31-3-1.248,2.155-2.687,2.931-5,4v3h-2c-1.164,2.716-1.78,4.18-5,5q0.5,3,1,6h-1v4c-7.534.148-12.519-1.793-18-4l-1-3-4-3V498c-1.755-2.011-.856-5.381-2-8H79v-2H78l-3-8a21.057,21.057,0,0,1-10,0c-0.684-3.284-1.509-7.439,1-10v-1h3v1l5,1v1h3v1h2l1,2h5v1c5.6,1.586,10.218-2.153,14-3,2.405-5.133,5.662-10.7,10-14v-1h3v-1h2l1-2h2l2-3h2l2-3,3-1v-2c2.833-2.783,2.114-10.4,2-16l3-2v-1h2l1-2,6-2,1-2h2v-1h2v-1l3-1,1-2h8c0.631,2.9,2.287,2.589,2,5h-1v5h-1v1h1l1,3h1v2l3,2q1,6,2,12h1q0.5,2,1,4c1.929,2.914,3.191.407,4,6-1.8.944-1.575,1.385-4,2-0.886,5-.781,5.37,0,10l8,1q0.5-2,1-4l10,1,1,3,4,3v3c-4.038,3.114,1.36.726-1,5h-1v1h-5c-0.216-4.864-1.069-3.385-2-7h-5v1c1.059,1.177,1.7,7.214,2,9,3.271,0.8,3.773,2.309,5,5,1.139-1.139.4,0,1-2,1.139-1.139.4,0,1-2h2l-2,6h1v4h1v4h1q0.5,3.5,1,7c3.317,0.4,6.4,3.249,10,2v-1h2v-1h2v-1l3-1c1.05-4.066,3.171-3.468,5-6v-2l2-1v-1l3-2q0.5-3,1-6a118.372,118.372,0,0,0,6-28c8.547-1.669,8.622-6.636,13-12,1.321-1.619,6.856-2.805,9-4v-1h2v-1c3.881-3.217,5.2-8.793,9-12v-4h-2q0.5-3,1-6l12-3c1.376-2.457,3.771-3.27,5-5v-2l2-1v-2l2-1c1.292-2.133.112-4.144,1-7h1v-7l3-2c2.163-4.763-4.6-13.247-4-17h1v-5h1v-3h1v-3h1v-4h1q0.5-4,1-8h1v-2h1v-2l2-1v-2l2-1v-3l2-1v-3l3-2v-2a9.773,9.773,0,0,1,7-5v-3c2.612-1.382,1.693-1.769,6-2,1.965,3.534,3.851,4.2,4,10-5.392,4.489-1.225,8.941,0,14l4,1v2l4,1v1l9-1v2a3.982,3.982,0,0,1,2,2h2a20.9,20.9,0,0,1,7-7c1.969,0.08,6.543,1.985,10,1v-1h6v-1l4-1v-1h2l3-4,3-1v-2l2-1,1-4,2-1v-3h1l1-4h1l3-9h1v-3h1v-2h1q0.5-4.5,1-9h1l-1-2h1c1.542-6.308-.721-14.091-2-18v-4c-0.639-2.016-2.109-8.481-1-12h1v-3h1v-6h1v-7h1v-6l2-1v-3h1l1-4h-1q-0.5-3-1-6h-1l-1-4h-1V198h7v1h1v-1h1v2l4,1,1,2,8-1a44.445,44.445,0,0,1,15,2c3.746,1.141,8.507-.263,11,2h1v4c1.381,2.931,3.478,3.053,8,3,1.713-2.022,2.3-.838,4-2l3-4h3v-1c1.689-.344,1.746.944,2,1h7v1l14,1v1l18-2v-1h10v-1l6-1,1-3,3-1,3-4h2v-1c4.957-1.867,14.841,1.543,17,3l3,4,2,1v2ZM96,360H94c-3.439,5.728-5.084,2.617-5,13h1l1,5h1v2l2,1v11a2.523,2.523,0,0,1,1,3H94v2H93v2H92l-1,3H89c-0.856,4.785-3.8,10.621-7,13-2.1,1.555-1-1-3,2H77a9.111,9.111,0,0,0-6-5l1,6H67c-1.066,2.017-2.894,4.081-4,6v2l-3,2a21.793,21.793,0,0,0-3,8c-4.01-.236-7.087-1.562-8-5H48c-0.99-1.651-.066-8.571,0-9,2.447-1.575.647-.817,2-3h1v-2l2-1c3.169-3.4,4.909-6.325,5-13-1.24-.622-1.46-1.664-2-2H54v-1c-2.924-1.454-1.931,1.072-4-2-2.45-2.582-.834-4.194-2-8H47v-8H46v-1H43c-2,3.506-4.956,5.361-6,10l-3,1v1H32v1l-4,1c-2.157,1.841-.227,6.622,0,10a6.718,6.718,0,0,0-3,3c-2.01-.574-0.865.12-2-1-6.026-1.213-9.815-7.052-11-13,1.242-.679,1.36-1.565,2-2h2v-1c2.567-2.137,4.378-5.009,8-6a10.1,10.1,0,0,1,7-7v-2h2l3-4h2l2-3,4-1,1-2h2l1-2h2l2-3h4c1.754,1.643,7.389,2.03,11,2a7.5,7.5,0,0,1,2-2v-4c0.489-.841,4.921-3.605,7-3v1l6,2,3-4h2l1-2h6c1.382,2.612,1.769,1.693,2,6h1Zm152,52q0.5-3,1-6c4.936-.269,5.577-0.783,10,0a10.6,10.6,0,0,1,1,4l-3,1C254.508,413.428,251.437,412.351,248,412Zm0,9q-0.5,3-1,6h-4l-3-5c2.078-1.094,1.771-1.611,5-2v1h3ZM97,459c0.034,5.174-1.187,7.135-2,11-3.1,1.643-1.8,1.9-7,2l-1-3H86v-8l3-1C91.454,457.569,92.893,458.76,97,459Z" />
        </a>

        <?php
        $kdwil = '36.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Lebak_02" data-name="Kab Lebak 02" class="cls-2" d="M580,223c3.38,0.479,1.924,1.268,5,0v2l2-1q0.5,1.5,1,3c3.3,2.348,2.93-2.131,4,2a34.651,34.651,0,0,0,7,1v-2l3,1v-1h14v1c2.151,0.958,2.552.815,4,0v2h1v-1c1.346-1.5.969,1.9,1,2,5.931-.041,15.362-0.06,19,2l2,3,4,3v2l3,2c3.445,3.5,4.193,6.55,11,7a21.9,21.9,0,0,1,4-5c2.527,2.241,7.23.866,11,2,2.547,0.766,16.2,4.575,20,3q0.5-1,1-2h8q0.5,1.5,1,3c2.551,2.836.671,5.969,2,10h1v3h1v1h-1v1h1v2h1v3h1q0.5,2,1,4h2a11.035,11.035,0,0,0,3,7h1q0.5,1.5,1,3h2q-0.5,1-1,2c1.641,5.737.575,12.4,0,16l-3,1v1h-3v1h-4v1l-12-1v1h-1v3l-2,1v2h-1q0.5,11,1,22h-1c-1.52,4.908,1.872,10.421,3,13v3l3,2v3l2,1q0.5,2.5,1,5h1v2h1q0.5,16.5,1,33l3,9h-1c0.219,1.4.611-.36,1,1v10h-1q0.5,1,1,2h-1q-0.5,2-1,4h-1q0.5,1,1,2h-2v3c5.355,4.443,7.839,11.247,16,13v2l3,1v1h2v1h3v1c2.312,1.288,1.445-.416,3,2h1v3c2.842,0.513,10.634,4.14,12,6v2l3,2v4h1v4l2,1a25,25,0,0,0-1,4c-1.3.644-1.386,1.6-2,2h-2v1c-2.68,1.7-1.9-.953-3,3h-2q-0.5,2.5-1,5h-2c-0.644,2.739-1.309,2.276-2,5-3.672.884-5.052,3.1-9,4v2l-12,3q-0.5,1.5-1,3h-3v1c-1.139,1.139-.4,0-1,2-2.233.158-2.7,0.105-4,1v1l-2-1v4c3.967,3.421,1.624,7.086,3,13a2.482,2.482,0,0,1,1,3h-1c-0.777,1.478-.685,1.692-1,4h-2c-1.28,2.984-2.507,5.125-6,6-0.922,3.439-1.287,1.879-3,4h-1v12h-1c-0.609,2.036,1.355,3.2,1,4l-3,2v2h-1c-0.084,1.412-.227.548,1,1-1.142,1.269-.012.338-2,1,1.856,9.492,2.336,15.916-1,24l-13,5-10-1v1c-1.746.337-1.659-.913-2-1h-6v-1h-2v-1h-8v-1h-1c-0.7.55,0.32,1.508-1,1v-1h-2l-4-5-5-1v-1h-2v-1H622v-1c-2.248-1.588-2.917-3.159-6-4-1.006-3.858-2.93-3.142-4-7h-8c-1.4.21,0.414,1.021-1,1v-1h-2q-0.5-1.5-1-3h-1v-2h-1c-0.687-1.922.521-3.053,1-4h-1c1.139-1.139,0-.4,2-1v-2l3-1,2-3h2l2-3,2,1v-1h2v-1h2q0.5-1,1-2h3v-1l-12-1s0.166,1.032-2,1v-1h-1v1l-4,1v1h-2q-0.5,1-1,2h-2v1H584c-8.673,0-16.735-.758-23-3h-4v-1h-2v-1l-3-1c-1.375-4.865-7.56-6.268-12-8h-3v-1l-4-1v-1h-3q-0.5-1-1-2h-1v1l-2-1c-0.517-1.316-.416.288-1-1v-3l-3-2v-2h-1l-3-10h-1v-2l-2-1q-1-3-2-6l-3,1v-1h-2v-1h-9l-7,1v-1h-3v-1c-1.139-1.139-.4,0-1-2h-1v-3l-10-1c-1.4.32-5.823,2.488-8,2v-1c-3.147-.883-13.843-2.226-18-1v1l-12,2v1h-2v1c-3.227,1.155-6.865-.9-9,1h-1v4c3.109,2.049,1.485,4.219,1,8-3.584.41-4.837,1.5-8,0v-1h-3v-1c-1.139-1.139-.4,0-1-2,1.948-2.153,1.09-15.559,1-20h-2l1-2c-2.648-3.229-4.069-1.318-4-8h1v-2l4-3v-3h1v-4h1c0.746-2.381.635-8.01,0-8v-1h2l-1-3c3.585-.867,5.506-3.906,8-6v-1l3-1v-2l2,1,7-5-1-2,3-1-1-2h2c1.221-1.093,1.192-3.777,2-5l3-2V420c-3.353-3.814-.2-25.638,1-29h-1c1.048-1.327,1.9-.984,3-2l3-4h2l-1-2h1v-1h2v-1h1l1-3h1q0.5-7.5,1-15h1v-2l2-1v-2l3-2v-6h1v-7h1v-3h1v-3h1l-1-2,3-2v-2l6-5v-2l5-4,2-6,2-1v-2h1c2.132-2.554,5.027-4.385,6-8l5-1v-1h6v-1h8v-1h5v1l10,2v1l6,2c0.943-1.77,4.132-3.206,2-5h2q1-9,2-18h1q1-3,2-6h1v-2h1q0.5-1.5,1-3l3-2v-8c1.125-3.762,1.6-9.538,3-13h-1v-1h2c0.874-3.632,3-3.746,5-6q-0.5-1-1-2h2l2-3,5-4q-0.5-1-1-2h2c3.1-2.826-.569-3.777,3-5q0.5-3,1-6h1c1.233,1.358,4.627,3.829,6,2v2Z" />
        </a>

        <?php
        $kdwil = '36.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Tangerang_03" data-name="Kab Tangerang 03" class="cls-3" d="M807,132v3l-2-1-5,6-6,2q-0.5,1-1,2h-2v1h-2v1h-2v1h-2q-0.5,1-1,2h-2l-2,3h-2q-0.5,1-1,2h-2l-2,3-4,1-3,4-2,1v2l-2,1c-1.171,1.81-.014,2.239-2,4q0.5,4.5,1,9l2,1v2h1c1.034,2.828-.292,7.289-1,9h-1v8l7,5h4v1h8l15,2v1h3v1c2.46,0.97,5.916.727,8,2q0.5,1,1,2h2c2.809,1.58,5.511,4.068,9,5a39.688,39.688,0,0,1,1,8l-10,6q-0.5,2.5-1,5h1q0.5,2,1,4h1v3h1q0.5,2,1,4h1c1.9,4.852-.326,13.347-3,16-1.934,1.783-8.393,1.1-12,1l-9-3c-1.2-2.913-2.55-4.444-3-8l-3-1v1h-1q-0.5-1-1-2h-3v-1l-8-1v-1l-9-1v-1h-3v-1h-2v-1h-2l-2-3-4,1v3h2c0.621,2.328.912,2.352,2,4h1v7l-3,1c-1.449,1.3-9.941,1.977-13,1v-1h-3v-1l-9,1q-0.5-1.5-1-3h-1v-8q-0.5-4.5-1-9h-2c-2.865,3.432-6.694,4.817-8,10h-2c-0.644,2.739-1.309,2.276-2,5h-3v-3c-2.663-1.412-4.22-2.03-9-2v-1h-5l-2-3h-1v-2l-2-1q-0.5-3.5-1-7h-1v-2l-2-1q0.5-1.5,1-3h-1v-3h-1v-9h-1v-1c0.368-1.365.795,0.4,1-1h-1v-2h-1q-0.5-1.5-1-3h-1q0.5-1.5,1-3h-2c0.463-1.783,1.622-2.237,0-4h-2q0.5-1,1-2h-1q-0.5-2-1-4h-1v-8a2.457,2.457,0,0,1-1-3h1v-2h1v-2h1v-2l2-1q0.5-5,1-10h1q0.5-2,1-4h1v-3h1c0.9-2.679-.227-15.873-1-17h-1v-1h-3c-0.723-2.762-.279-2.237-3-3-1.178-4.673-2.881-2.66-5-5v-1h1q-0.5-1.5-1-3h-1q-1-3-2-6h-1a8.027,8.027,0,0,1-2-4c-2.01-.574-0.865.12-2-1,1.366-1.982-1.341-8.343,0-13h1q0.5-5,1-10h1q0.5-2,1-4l2-1q0.5-2,1-4c6-.708,6.229-4.479,13-5V81l3,1V80h1v1h1V80h4V79l7,1v2c0.654,1,6.386,2.274,8,3v1h2v1h3v1l6,2v1c2.768,1.556,9,5.33,14,4V94l2,1V94l4-1,1-3h2c2.207-4.939,6.1-7.823,12-9,0.317-3.543,1.314-3.949,2-7,1.1-.233,5.357-1.959,7-1v1h2v1l6,5v2l11,2V83h2V82h3V81h2V80h4V79h9V78h13V77h4v1l9,2c1.439-2.465,3.138-2.788,4-6h2V71h1v1c8.671-1.71,13.651,9.215,20,13-1.178,5.865-5.2,8.353-6,14h1v3h1c0.924,1.479.887,2.457,1,5l-7,5v2l-2-1q-1,2-2,4h-2l-3,4c-4.538,3.026-13.281,2.054-18,5q-0.5,1-1,2h-2q-0.5,1-1,2h-2v1Z" />
        </a>

        <?php
        $kdwil = '36.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kab_Serang_04" data-name="Kab Serang 04" class="cls-4" d="M500,9l6,1c1.048-.915-0.393-1.244,1-1v1h8v1c4.476,1.006,12.451,8.083,13,13h2v1h-1c-1.889.86,2,1,2,1v2l3,1-1,2h2l-1,3h1V45h-1l1,2-2,1v4c-0.534,1.31-.483-0.316-1,1-1.8.944-1.574,1.385-4,2-0.036,3.8.5,8.6,1,9l2,3h1V66c0.4-.038,2.244.884,4,1,1.5,5.206,2.207,1.388,5,4l1,3,2-1v1c2.313,1.908,4.611,4.278,8,5l1,3c1.39-.258-0.377-0.676,1-1l4,2v1c1.277,0.607-.01-0.781,1-1l2,1,1,3h1v9h-1q0.5,3,1,6l-3,2v1h-2v1h-3q-0.5,1-1,2h-3q-0.5,1-1,2h-2l-4,5h-2q-0.5,1-1,2h-2q-0.5,1-1,2h-1v2l-2,1q-0.5,1.5-1,3h-1v2l-3,2v1c-1.454.822-4.04-.636-5,1v5c3,2.6,2.058,7.89,0,11l-4,3v5c3.1,1.643,1.8,1.9,7,2,4.159-7.362,12.624-.3,17,1,1.974-3.629,4.116-4.158,10-4,1.155,1.05,6.228,1.7,8,2-0.5,3.8-1.579,4.03-3,7h-1v10h1v1h6q0.5,1,1,2c2.816,2.5,3.557,3.8,9,4,1.5-1.759,2.7-1.9,6-2a34.218,34.218,0,0,1,1-8c1.135-.844.145,0.127,1-1l15-3v-7l7-5,5-1v-1l3-2v-2h1v-2l-8-5v-2h-1l-2-3h-3v-1l-3-2v-1h1v-7c0.3-.776,2.666-0.162,2-3l-2-1q0.5-3,1-6l-2-1v-2h-1V97h-1c-1.7-6.256,4.276-8.868,3-13h-1V82h-1V81h-1V80h-2V79h-3V78h1V75c0.455-1.339,1.111.41,1-1a1.749,1.749,0,0,1-1-2h1q0.5-4.5,1-9h2l-1-2h2c1.006-.994-1-1-1-1-1.383-1.435,1.787-.939,2-1V56h2q0.5-2.5,1-5c1.652-.521,2.9-0.069,3-2-0.144-.145-1.887.1-1-1l4-2-1-2,2-1V42l2-1V39l2-1,1-3h4c1.172-.791-0.409-0.88,1-1v1l2-1v2h1V35l2,1c0.657,1.322,1.259,1.067,2,2l-1,2h1v1l3,1-1,2h1c1.941,2.175,4.122,4.528,7,3v2h1V48h1v1h3l2,3h1v2l2-1v1h2v1h2v1h2l-1,2,2-1v1l3,2v2h1c1.787,1.933.5,1.788,3,1v1c1.48,1.264,2.568,1.028,1,3h2l1,2h1v2l2-1v1l11,1c0.245-.053.329-1.3,2-1v1c2.769,0.725,4.883-.243,7,1l1,2h1V74c1.173-1.684,1,2,1,2l3-1v1c1.759,1.381,2.605.443,1,2-2.419,2.622-2.569.67-5,2v1c-1.347.432-.112-0.379-1-1h-1v1h-3l-1,2h-3v1l-2-1v2c-1.116,1.134-3,0-3,0v2c-1.4.178,0.164-.2-1-1l-2,1c-0.945,1.8-1.385,1.574-2,4-2.393.607-1.858,0.317-3,2h-1l1,2-2,1,1,2-2,1q-0.5,3.5-1,7c0.065,0.283,1.35.29,1,2h-1v12h2c-0.293,1.384-.215-0.176-1,1l3,5h1q0.5,2.5,1,5l4,3c0.96,1.554-.313,2.947,1,4l4,1q-0.5,1-1,2h1v-1l2,1c1.02,2.328,1.878,3.75,4,5-1.623,4.779.958,4.769,0,9,0,0-1.347.483-1,3a1.641,1.641,0,0,1,1,2h-1v2h-1v5c-0.009.028-.618-0.063-1,2l-2-1v9c-1.843,1.094-4.29,4.922-5,7-1.364,3.991,1.783,9.667,0,11h2q2,6,4,12h1q0.5,3,1,6h1v2h1a2.782,2.782,0,0,1-1,3q0.5,3,1,6h1q-0.5,1.5-1,3h1v3l2,1v5h1q0.5,2.5,1,5a10.1,10.1,0,0,1,7,7h2v2l-9,1v-1h-3v-1l-12-1v-1h-5v-1c-2.043-.244-1.178.433-2,1l-4,1q0.5,1,1,2h-9v-1h-1c-0.429-1.347.162-.778,1-1v-1l-2,1v-3h-1c-1.478-1.7-.853-1.683-4-2-0.525-2.3-.879-2.454-2-4h-1c-1.554-2.6,1.123-1.934-2-4v-1h-1v1c-1.654.979-.846-1.44-1-2a72.537,72.537,0,0,1-12-2h-6v1h-1v-2l-2,1v-2l-2,1v-2l-2,1q-0.5-1-1-2H603v2h-1v-1l-5,1v1c-2.867.6-5.749-4.473-8-2v-2c-2.909-.6-3.206-2.856-5-1v-2h-3v-1l-2,1v-2h-1v1l-3-1c-0.525-2.345-.913-2.389-2-4h-1v-4h-1c-1.632-4.071-.477-5.841-5-7v-1l-5-1q-0.5,1-1,2h-2q-0.5,1-1,2c-2.13,1.268-10.006,1.715-12,0a19.082,19.082,0,0,1-8-5c-1.8-2.327,1.057-1.76-3-3v-2l-7-2v-1h-7v1l-6,1-7,8h-4v1H493v1l-21,2v-1h-6v-1H455v-1h-3v-1h-1v1l-3,1v1h-2l-2,3-10,1a29.413,29.413,0,0,0-1-7c-5.117-.15-10-1.808-14-3h-7v-1l-14,1v-1l-6-2v-1h-2v-1h-5v-1h-1q1-3.5,2-7h2c-0.413-1.821-.9-1.91,0-5h1v-1h-1c0.086-2.044,1-2,1-2V171l2-1v-3h1v-3h1l-1-3,2-1v-4h1v-1h-1v-1h1q0.5-3,1-6h2l-1-3h2l-1-2h2l-1-2h1v-3h2l-1-2h2l-1-2h2c0.052-1.413-.22.179-1-1l1-3h2v-1h-1c-1.889-.86,2-1,2-1q0.5-3,1-6h-1v-1c0.35-.6,1.488-0.477,2-2-0.51-1.319-.733.389-1-1,0.967-1.609,5.262-4.451,3-6h3c2.3-2.035,6.971-.668,10-2l1-2c1.339,0,1.678,1.742,4,1v-1h3v-1l4-1v-1l8-1,1-3,2,1v-1l5-1V98c1.383,0.295-.175.213,1,1l9-3V94h1v1c0.4,0.038,2.244-.884,4-1V92h1v1h1V92h3l1-2c1.027-.319,1.815,1.626,4,1V90c3.11-1.078,11.047-2.39,14-1l1,2h2c0.632,0.407.645,1.365,2,2V92c0.991-1.586.979,3.733,1,4h-1v3h-2l1,2h-1v2h-1v7c2.612,1.382,1.693,1.769,6,2,2.215,2.117,6.491.534,9,0,0.658-2.579,1.57-3.291,3-5h1q0.5-1.5,1-3h2l2-3h1q-0.5-1-1-2l2-1q0.5-2.5,1-5h1l-1-2h1V89h1V86h1q-0.5-3-1-6h1V75h-1c-0.038-.326.9-2.273,1-4a9.237,9.237,0,0,1-7-8l-6-2,1-2h-1l-2-3h-2l1-2h-2V53h1c-1.831-4.783-.322-8.91,0-14h1v1c0.859,1.889,1-2,1-2h-1V37l-5-1c-0.222-5.909-2.6-7.252-3-13l3-1V21h-1c-0.5-1.789,1.681-.232,2-2h-1V15c-0.38-1.362-.663.373-1-1h1V13h-1Q500.5,11,500,9Z" />
        </a>

        <?php
        $kdwil = '36.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kota_Tangerang_71" data-name="Kota Tangerang 71" class="cls-5" d="M839,156c4.491,0.919,6,3.4,11,4,0.346,2.175.98,1.935,1,2v6h1v3h1v5h1v2h1a45.258,45.258,0,0,1,2,8h2v2a7.19,7.19,0,0,1,4,2v1c2.979,2.147,3.833.779,4,6,1.328,1.417,1.921,6.228,2,9a12.71,12.71,0,0,1-5,1v-1h-5v1c-1.936.222-1.653-2.688-5-2v1c-4.156,1.068-9.832.954-12-1h-1v-4h-1v-1l-3,1q0.5-1,1-2c-0.846-1.333-4.676-1.53-2-4h-4c-1.593,1.485-5.892,1.092-9,1,0.112,2.845-.611,2.484,1,4v1h-2c-0.048,1.413-.066.071,1,1v1h-2v1h1c-1.132,1.152.025,0.44-2,1,0.113,3.16,1.955,1.874-1,3v2h-1c-0.82,3.427,2.88,4.731,0,8v-1h-3v-2l-2,1q-0.5-1.5-1-3l-3,1v-2l-2-1s-0.228,2.185-1,1v-2l-4-1v1h-1v-2l-10-2v-1l-9-1v1h-4v-1l-10-1v-1l-2,1v-2c-1.3-1.268-1.839-.158-4-1,0.476-1.386,1.338-1.657,1-4a1.742,1.742,0,0,1-1-2h1v-4h1v-2h1q-0.5-3.5-1-7h-2q0.5-1,1-2h-1v-2h-1c-0.553-1.7,1.2-7.069-1-7v-1h2v-2l3-2v-2l2-1,3-4,4-1q0.5-1,1-2h1v-2c1.384-.091,1.75,1.523,4,0l2-3h1v-2l2,1v-1h2v-1l3-1v-2l2,1v-1c2.988-1.084,3.726-2.222,7-3q0.5-1.5,1-3l2,1v-1h-1v-1h1v-1h1v1h1l3-4h2q-0.5-1-1-2h3q0.5-1.5,1-3l2,1q0.5-1.5,1-3l2,1v-2l3,1v-1h2v-1l10-1c1.708,2.937,2.891,2.863,3,8,2.666,2.893-.8,14.137-1,19A9.11,9.11,0,0,1,839,156Z" />
        </a>

        <?php
        $kdwil = '36.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kota_Cilegon_72" data-name="Kota Cilegon 72" class="cls-6" d="M500,10l3,9h-1v2l-2,1v5h-1v1h1v3h1v3h1c2.632,3.314,4.229,1.525,5,7-2.814,1.892-2.159,7.309-2,12l3,1-1,2h1v2l2,1v1c0.948,0.853,3.375.492,4,1l-1,2h2l3,4c3.564,2.613,4.029.3,4,7h1v8h-1q-0.5,5-1,10h-1v2h-1q-0.5,3-1,6l-2,1c-1.16,1.444-1.473,2.891-2,5h-2c-1.5,2.63-3.189,3.378-4,7h-4c-1.395.231,0.414,1.036-1,1v-1h-6c-2.655-4.448-4.037-3-4-11,2.176-1.865,3.369-5.665,4-9a21.92,21.92,0,0,1-5-4h-8c-1.4-.2.414-1.028-1-1v1h-5v1l-8,1v1l-6,2v1h-3v1h-2v1l-9,2v1h-2v1h-2v1h-2v1l-6,2v1l-9,1c-4.6,1.559-9.76,3.658-16,4,0.722-3.1,3-4.552,4-7v-4c0.537-1.308.474,0.313,1-1l12-5,10-11h2V82l5-1V80l3-1V73h1V72h5V70c3.428-.871,2.575-2.068,6-3l1,3,3-1V67h-2c0.372-4.2,1.927-4.411,3-7V56h1q0.5-3,1-6h1V48h1V44h1V40h-1V36h-1V32h-1V31l2-1V28h1V26h1V23h1l6-7h2l1-2h2V13h3l1-2h2V10h9Z" />
        </a>

        <?php
        $kdwil = '36.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kota_Serang_73" data-name="Kota Serang 73" class="cls-7" d="M607,142c3.414,0.573,6.117,1.7,7,5h1v1h-1c-3,10.4-15.009,1.7-15,18-5.884.125-11.509,2.11-16,4-0.875,2.316-1.017,4.407-1,8-5.009.228-5.64,1.8-11,2l-5-6h-4c-3.786-.73-2.976-2.765-3-7h1q-0.5-2-1-4h1c1.366-3.052,2.527-3.138,3-7-6.171-1.088-10.356-2.309-16-2-0.574,2.444-1.047,2.206-2,4-1.1-.6-1.568-1.738-2-2h-2v-1l-7-1v-1h-1v1h-3l-2,3h-5c-1.643-3.1-1.9-1.8-2-7,2.345-1.3,7.645-7.094,6-12h-1c-0.931-2.277-.826-3.823-1-7,3.2-.622,6.406-1.813,8-4v-2l3-2q0.5-2,1-4c0.99-1.289,3.7-1.1,5-2l6-7h2q0.5-1,1-2h3q0.5-1,1-2h3v-1l4-1v-2h1V98h-1c-0.285-2.039,1-2,1-2,0.829-3.7-1.315-10.534-1-12h1V83c3.8,0.779,10.618,4.887,16,3V85l4-1,1-3c5.235-1.076,6.247-2.045,12-1,0.737,1.749,1.622,3.837,3,5q-0.5,2-1,4l-2,1v8h1v14h1v2l2,1v4h-1c-0.3,1.91,1,2,1,2q-1,6-2,12h1C601.708,137.326,605.345,135.507,607,142Z" />
        </a>

        <?php
        $kdwil = '36.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Kota_Tangerang_Selatan_74" data-name="Kota Tangerang Selatan 74" class="cls-8" d="M837,200l4,1c-0.574,2.01.12,0.865-1,2,0.574,2.01-.12.865,1,2,1.256,1.909,1.014,1.659,4,2,1.641-1.441,10.69-1.918,14-1v1h5v-1l3,1v-1c1.387-.278-0.4.822,1,1a24.419,24.419,0,0,1,4-1v5l2,1v3l2,1v2l2,1v2l4,3q0.5,3,1,6h1q0.5,2,1,4h1q0.5,3.5,1,7l2,1c1.379,3.128.353,7.939,0,10v6c-0.19.451-1.327,0.15-2,3l-10,1v-1h-4v1l-3-1v1h-2v1H851l-19-1a72.353,72.353,0,0,1-18,3q0.5-4,1-8c0.492-1.064,2.366.077,2-3h-1v-6l-2-1-4-13c1.241-.934,1.083-2.29,2-3h2q0.5-1,1-2c3.758-2.593,5.681-1.632,6-8h-1v-6h-2q0.5-2,1-4h-1v-1h2c0.043-4.8,2.1-5.092,1-8h2v-1h-1c-0.388-1.6,3.146-2.539,1-5h8v-1c1.285-.59-0.052.762,1,1,1.767,0.4,1.644-.9,2-1C835.823,194.51,836.857,197.986,837,200Z" />
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
                    url: "ambil_banten_kiri.php",
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