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
            </style>
            <filter id="filter" x="311" y="254" width="203" height="230" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="517" y="396" width="157" height="197" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="386" y="83" width="256" height="196" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="638" y="329" width="205" height="268" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="476" y="301" width="298" height="186" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="245" y="191" width="155" height="178" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="284" y="21" width="174" height="213" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="382" y="221" width="319" height="139" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="401" y="414" width="149" height="162" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="583" y="193" width="159" height="124" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="448" y="306" width="50" height="52" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="397" y="64" width="123" height="137" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_14" data-name="Color Fill 14" class="cls-1" width="1043" height="657" />
        <?php
        $kdwil = '14.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_12" data-name="Color Fill 12" class="cls-2" d="M452,294q-0.5,6-1,12l-2,1,1,3,3,1v1c3.5,2.165,5.445.673,6,6-1.354.675-1.305,1.525-2,2-3.325,2.272-4.783,1.392-5,7l7,5a11.055,11.055,0,0,1-2,2v6c-0.4.975-2.954,0.523-2,4h1l1,4h1l-1,3c2.568-.3,4.162-1.149,8,0v1l2-1v1l4,1v-3h2l1-2,13,3v1c3.738,0.567,1.82-1.711,3-3h1v1l5,7h6v1c1.971,0.646,3.293.35,5,1-1.36,3.6-3.166,6.359-4,10,1.938,1.146,2.381,2.676,4,4-0.574,2.01.12,0.865-1,2v1c-1.68.941-13.187-.011-16,1q-0.5,4-1,8l4,3c-2.564,6.007-2.631,14.55-4,22-1.876.823-2.616,1.481-5,2-0.35,1.941-1,2-1,2v6h-1v2h-1q0.5,6.5,1,13c-3.218-.366-3.708-1.224-6-2v1h-1v3h-4c-1.577-2.892-4.079-4.574-5-8h-2c-0.641,3.154-1.547,2.068-2,3v4h-1c-1.4,1.852-1.237,2.315-4,3-1.335-6.294-3.773-3.689-6-7q-0.5-3-1-6c-1.267-3.048-4.372-5.246-6-8-1.135.844-.145-0.127-1,1-3.079,2.114-.435,1.381-2,4l-3,2v2l-3,2v2l-3,2v2h-1q0.5,6,1,12l-2,1c-1.352,1.737-1.678,3.144-2,6h-3q0.5,2.5,1,5l-2,1v2h-1v2h-1c-0.032.128,1.849,4.081,1,6l-2,1q-1,3.5-2,7c-2.528-1.086-9.349-3.252-11-2h-1v-4l-5-4v-1l-3,1v-2l-11,1-2,3h-6v-1c-1.374-.337.4,0.786-1,1h-2v-1h-1l1-3a2.17,2.17,0,0,1-1-2h1v-1h-1c-1.6-1.735-2.079-2.071-4-1v-1h-1q-0.5-3-1-6l-3-1,1-2h-1c-0.8-3.06-1.628-1.935,1-3a8.455,8.455,0,0,0-2-4h-1v-3h-1v-1h1v-1h-1v-2h-1v-1h1v-1h-1v-6h-2v-1h1l-1-3c3.078-1.9,3-4.9,7-6,0.693,1.068.514,1.7,2,2v-1h1l1,3h1v-1c1.586-1.251,2.8-3.353,4-5h1v-2h-1c-0.578-1.053.774-5.727,1-7a3.982,3.982,0,0,1-2-2,21.507,21.507,0,0,1-7,2c-0.3-2.121.04-2.807-1-4h-2v-1c1.431-1.146.162-.118,1-2h1c0.829-1.444.7-1.708,1-4h2c2.11-3.423,5.8-3.538,7-8-2.213-2.3-1.288-4.81-1-8-3.122-1.817-3.387-2.982-9-3v-1c-1.367-.362.2,0.336-1,1a22.474,22.474,0,0,0-2,2l-10-1-1,4-2,1c-0.608,1.277.788-.021,1,1l-1,2h-2v-1l-2,1v-2l-2,1v-1c-4.12-3.467-5-10.4-12-12v-3h-4a34.58,34.58,0,0,1-1-7h-1v2c-1.975,1.129-2.338,1.417-3,4h-6l-1-3c-1.312-1.451-2.037-11.616-2-15l4-3v-1l6-1,8-11c1.135,0.844.145-.127,1,1l3,1v1h2v1l2,1v2l2,1,4,5,5,3v2h1l1,2h2l2,3h1v-1c1.95,0.885-.252.89,1,2a2.116,2.116,0,0,0,1-2h1v1l2-1,1,2a10.684,10.684,0,0,0,7,3v-1h2v-1l2-1V344c-4.239-2.948-3.162-9.418-9-11-1.082,1.707-2.129,2.124-4,3-1.179-4.076-.418-1.134-3-3l-1-2h-2l-3-4-4-1-2-3h-1v-2h-1v-2l-3-1-2-3h-2c1.158-3.648-.1-3.015-1-7,2.518-.654,1.605-0.577,3-2h1v-2l2,1,1-3,2,1q2.5-4.5,5-9l2-1-1-3h1c0.98-1.21.56-2.147,3-2a1.546,1.546,0,0,0,2,1l1-2h2l1-2,6-5v-2l5-4v-2l2-1,2-3h1v-2l4-3v-2h1l1-2h3c2.7,3.087,5.392,3.031,9,5v1h2l1,2h2v1l6,2v1l2-1,1,3h2v1h2v1h2v1h2l1,2h2v1h2v1h2v1h2l1,2h2v1h2v1h2v1h2v1h2l1,2,4,1v1C447.346,292.884,447.722,293.75,452,294Z" />
        </a>
        <?php
        $kdwil = '14.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_11" data-name="Color Fill 11" class="cls-3" d="M667,402v65c0,5.142.813,21.847,0,23v1h-4c0.058,4.894.546,10.421-1,14h-1q-0.5,2-1,4h-1v8h1q-0.5,3-1,6h-2q-0.5,2.5-1,5h-1v16h-1v2l-3,2v1h-2c-1.146.867-3.5,5.552-4,7q-1.5,15.5-3,31c-4.883-.77-11.78-1.367-16-3-0.823-1.876-1.481-2.616-2-5l-4-1v-1h-9v-6l-8-4-3-5h-7c-1.285,2.226-5.087,4.457-7,3h-2v-3c-2.749-1.584-1.8-2.47-6-3v1h-2v1c-1.933.431-1.38-.706-2-1h-1v-1h-5v-1h-3v-1h-2v-1h-3v-1h-7l-2,3h-6q-0.5-1.5-1-3c-5.63.648-3.286,2.564-6,4h-4v1h-1q-0.5-3-1-6c-3.973-1.017-4.915-3.913-9-5-0.066-2.148-1.041-8.8-1-9h1v-3h1v-5h1c0.076-1.338-1.7-1.65-1-4h1v-3h1q0.5-3,1-6l3-2v-1l2-1v-2l7-6v-2h1c0.964-1.24.7-1.942,2-3q0.5-5.5,1-11h-1q-0.5-2-1-4h-1c-1.307-3.395-.149-4.811,0-8h1c1.583,1.484,6.787,1.987,10,2l8-9,2-1v-2l2-1,3-4h2q0.5-1,1-2h2q0.5-1,1-2c2.21-.988,7.9-0.244,10-1q0.5-1.5,1-3h1v-6h1v-2h1c1.644-2.724-.877-1.919,3-3,1.453-1.279,8.954-1.864,12-1,5.568,1.58,13.991,3.072,19,0q0.5-1,1-2h2l3-4,2-1v-2l2-1v-2h1v-3h1v-6h1q0.5-5,1-10l2-1v-2l6-5v-1h2C647.551,400.421,660.156,401.89,667,402Z" />
        </a>
        <?php
        $kdwil = '14.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_10" data-name="Color Fill 10" class="cls-4" d="M511,93q0.5,3,1,6h2q-0.5,1-1,2h2l2,3h2c0.959,1.039-.976.915-1,1-0.253.9,4.112,5.444,5,6-0.5,1.5-1.08,1.581-1,4,0.669,0.739,1.431-.347,1,1l-2,1c-0.683,1.71,1.3,3.637,1,4h-2l-2,3s2.175,0.213,1,1h-2c0.826,5.139.412,2.67-1,7-0.843,2.583.824,4.671,1,6h-1q-0.5,2.5-1,5l-5,4c-1.316,1.681.75,0.608-1,2-1.139-1.139,0-.4-2-1v2h-1v-1c-2.6.741-.869,1.72-2,3l-2-1v2l-2-1-2,3h-5v1h-1v-1h-2v-1h-4v1c-1.616-.292-1.6-1.819-2-2l-3,1v-2c-3.16.113-1.874,1.955-3-1l-3,1v-1l-3-1v-1h-2l1-2h-2l1-3h-1c-0.452-.985-3.173-7.592-3-8h1v-2c-2.01-.574-0.865.12-2-1,1.139-1.139.4,0,1-2h-2l1-3-2-1v-2h-1v-2h-1l1-3h-1v-1l2-1V107h1l1-4h1c2.035-2.357,5.281-3.385,7-6,2.465,1.093,4,2.339,7,3l1,3h2v-2c6.958,2.178,6.047-1.9,9-6l3-2V92l5-1,1-3h1C503.179,89.377,508.9,92.478,511,93Zm-49,43c3.586,0.936,3.156,2.61,3,7h-2v-2h-2v3l-3-1,1-3h3v-4Zm52,23h5q0.5,1.5,1,3h1v-1c1.326,0.781,1.067.933,2,2h1v2l3,2,5,6,2-1q0.5,1.5,1,3c1.794,1.979,2.267-.549,3,0q0.5,1.5,1,3l2-1v1l3,1v2l4,3v1l2-1v1h1q0.5,1.5,1,3l2-1v1h1v2l3,2v1h1v-1h1v2l2-1q0.5,1,1,2h1v2l2-1q0.5,1.5,1,3l2-1q0.5,1.5,1,3l2-1v2c1.4,0.208-.2-0.246,1-1,1.531,0.437,1.6.879,4,1v2c1.413-.054-0.393-0.758,1-1,0.859-1.889,1,2,1,2h2q-0.5,8.5-1,17h1v2h1c1.1,3.245-.608,6.832-1,9h-2c-1.523,2.468-2.847,1.531-4,3v2l-2,1v2l-3,2v2h-1q-0.5,1.5-1,3l-2,1v2l-2,1q-0.5,1.5-1,3l-4,3v2l-6,5v2h-1q-0.5,1-1,2h-6v-1h-3v2l-9,1c0.713-5.756,4.51-8.646,6-14,1.02-3.665-1.253-6.137-2-8q-0.5-2.5-1-5l-2-1v-2c-2.843-3.889-15.913-8.878-23-9l-1,3h-1v2l-2,1-1,4-2,1-1,4-2,1-1,4-2,1-1,4-2,1v2c-2.772,4.157-7.507,7.448-9,13-4.49-.625-2.548-0.839-5-3v-1h-3l-1-2h-2l-2-3h-1l-1-3c-2.963-2.162-6.938-.785-11-2v-1h-6v-1l-4-1v-1h-3c-0.78-.349-0.389-2.186-2-2v1c-3.5,2.058-4.64,5.821-9,7l-2-3h-2l-4-5h-2l-3-4h-2l-3-4h-2l-3-4h-2l-4-5h-2l-3-4h-2l-3-4c-4.3-3.1-5.8-1.31-6-9,1.484-1.583,1.987-6.787,2-10,5.492,0.031,9.489-1.122,14-2v-2l2,1v-2l2,1v-2l2,1v-1l2-1v-2l2,1,1-2h2v-1h3l1-2,4-1v-2h1v1l3-2v1h1l1-2,3,1v-2c3.006,1.024,3.688,1.089,7,0v-1c1.12-.248,1.759,1.484,4,1a2.635,2.635,0,0,1,3-1v1l5,1,1,2h3c2.222,0.933,4.174,2.382,7,3v-4h8l1-4h6c1.849-3.35,6.288-7.475,11-8,2.809,3.263,8.793,3.116,15,3v-1h1C509.285,173.511,513.426,167.709,514,159Zm66,15,3-1q0.5,1,1,2c2.183,0.847,5.554-1.077,6-1v1l8,1v1l3-1v1h3v1h7c0.872-.646-0.35-1.421,1-1q0.5,1,1,2h5c0.184,0.06-.231.85,2,1,0,0,.092-2.084,1-1v2c3.16-.113,1.874-1.955,3,1l3-1c0.649,2.523.593,1.6,2,3v1h2v1h-1q0.5,1.5,1,3l2,1c0.935,3.014-2.819,1.951-2,5l2,1v9h1v1h-1v6l2,1c0.423,1.349-.71-0.384-1,1q0.5,4.5,1,9l-3-1v-1h-2c-0.9-.589-0.338-1.911-2-2-1.412,2.2-1.28-2.789-4-3-1.393,2.049-.895-0.931-2-2l-2,1v-2l-2-1c-2.27-2.358-7.132-6.76-8-10-3.217-.826-4.82-3.092-7-5q-0.5-1-1-2l-3,1v-1a1.636,1.636,0,0,0-2,1h-1v-1c-3.227-.912-7.179.7-9,1v-1h-2c-0.372-.132.236-1-2-1v1c-1.568.285-1.275-1.669-2-2a1.414,1.414,0,0,0-2,1h-1v-2a18.252,18.252,0,0,1-7-3l-2-3h-2q-0.5-1-1-2l-5-4q-1-3-2-6h-1c-0.895-1.367-.747-1.745-1-4,2.316-.875,4.407-1.017,8-1v-1l2,1v1l3-1q0.5,1,1,2h3v1h3v1l3-1v2Z" />
        </a>
        <?php
        $kdwil = '14.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_9" data-name="Color Fill 9" class="cls-5" d="M828,384h2c-0.407,2.084-1.009,1.254,0,4h1c1.123,3.138-1.527,4.841-1,7h1v2h1c0.3,1.11-1.723,1.769-1,4h1v2h1q-0.5,1-1,2h1c1.05,2.373.705,2.24,0,4h2v1h-1q0.5,1.5,1,3h2v1h-1v1h1v4l-8,1c-0.215-.044-0.354-1.287-2-1v1c-4.165,1.071-8.419,1.316-12,0v1c2.609,1.911.883,1.684,2,5h-5c0.256-1.391.724,0.387,1-1q-1-2-2-4h3v-1h-2v-1l-2,1v-1c-1.139,1.139-.4,0-1,2,1.909,1.256,1.659,1.014,2,4-4.331-1.208-3.415-3.14-6-5-1.309.041-2.925,1.585-5,2v2l3-1v1h1c-1.349,2.325-3.4,3.06-5,5-3.247.119-6.292,1.388-9,0q-0.5-1-1-2a12.322,12.322,0,0,0-6-3v3h3q0.5,3,1,6l-3,1v3h1v-1l4,2c-0.709,2.1-1.03.9,0,3h-1c-0.754,1.3-1.4,1.216-2,2v2l-2-1v2l-2-1v1l-2,1v2l-2-1-2,3h-1v2c-0.992,1.008-1-1-1-1-1.366-1.478-.962,1.873-1,2h-5v1h-1v-1h-1v1h-2v1l-11-2c-0.945,1.8-1.385,1.574-2,4-2.391.463-3.145,1.158-5,2v1h1c1.139,1.139,0,.4,2,1v3c4.158,0.832,3.607,2.024,6,4l2-1v2l2-1v2l2-1v1h1c-1.093,2.465-2.339,4-3,7,4.4,2.364,3.528,2.988,3,8h7l3,13c6.351,0.96,7.3,2.389,7,10-2.762.723-2.237,0.279-3,3h2c-0.907,4.066-2.881,5.056-8,5v1l-4-1v-2l9-3v-1h-2v1l-6,1q-0.5,1-1,2h-2q-0.5,1.5-1,3l-3,2v1h-3v1h3c1.139-1.139,0-.4,2-1q0.5-1.5,1-3h4v1l8-1v2l2,1c0.571,2.548-3.047,4.381-4,6a11.878,11.878,0,0,1,5,1q-0.5,2-1,4a2.327,2.327,0,0,0,2-1h1v1c3.843,1.144,5.054,1.08,6,5h-5v1h-1v-1h-1v1c-1.824,1.113-1.154.8-3,0v2l-2-1q-0.5,1-1,2c-1.311.531,0.366-.76-1-1h-1v1c-2.386.72-3.737-.649-5-1v1h-1q-0.5-1-1-2l-2,1v-1h-2v-1l-3,1v-1h-6v-1h-1v1l-9-1q-0.5-1-1-2l-3,1v-1h-2v-1h-1v1h-1c-0.272-.1-0.133-1.423-3-1v1h-1v-1l-3,1c-2.229.172-2-1-2-1H714v2l-2-1v1h-1q0.5,1,1,2l-3,1q0.5,1,1,2h-2q-0.5,1-1,2h-1q0.5,1,1,2l-3,1q0.5,1,1,2h-2l-2,3-4,3q0.5,1,1,2h-1q-0.5,1-1,2h-2q-0.5,1.5-1,3l-2-1-3,4h-1v2l-2-1q-0.5,1-1,2l-8,7q0.5,1.5,1,3h-4v2h-2c-0.936,2.43-.966,3.512-3,5v1h-1v-1l-2,1h-3v1h-1q0.5,1,1,2h-2c-0.916.705-.906,4.5-2,2l-3,1v-1h-2c-0.057-2,1.666-.893,0-2v1h-1v-2h-1v1h-1v-1l-6,1v-1h-1v-7c1.584-1.862.976-6.6,1-10q1-8,2-16l10-11V526h1v-2l3-2c1.677-3.581-1.464-8.682-1-11h1v-3h1v-2h1q1-7,2-14h3v-1c2.14-2.446,1-18.052,1-23V402c1.135-.844.145,0.127,1-1l14-2v-1h2v-1l3-1q0.5-1,1-2h2v-1l4-3v-2l7-6,4-5h2l2-3h2q0.5-1,1-2h2v-1l11-2q0.5-1,1-2h1v1l6-2q0.5-1,1-2l8-7v-2h1q0.5-1,1-2h2l2-3h2q0.5-1,1-2h2q0.5-1.5,1-3l2,1v-2l3,1s0.038-.686,2-1v-2l2,1v-1l4-8,4,1v1l2-1,2,3,2-1v2l2,1v1l2-1v2l2,1,3,4,3,1v-1h1v2l2-1,7,8h1v-1c1.4,0.73,1.144.773,2,2,1.231,1.2.829,0.21,0,2h2v1h-1c-0.156,2.378.749,2.1,2,3v1c1.732,1.142,4.962.552,6,0v2l2-1v2l2-1c1.173,1.4-.75.966,1,2v-1h1c1.086,1.5.171,4.236,3,2q0.5,2,1,4l3,1q-0.5,1-1,2l3,1v1h-1c-0.54,1.307.418,0.516,1,1h1q-0.5,1-1,2h2Q828.5,382.5,828,384Zm-31-35,3,1v1h3v1c-1.139,1.139-.4,0-1,2-1.135-.844-0.145.127-1-1C798.6,351.951,797.788,351.88,797,349Zm9,70c1.139,1.139,0,.4,2,1C806.861,418.861,808,419.6,806,419Zm-10,11h6v1h1c-0.574,2.01.12,0.865-1,2-0.4,1.3.893,2.036-1,2,0,0-.039-2.037-1-1v2l-2-1v1h-3v1l-3-1v1c-1.139-1.139-.4,0-1-2,2.43-1.522.637-1.309,2-3C793.737,431.085,795.052,431.21,796,430Zm-5,2c-0.738,3.217-1.357,3.641-5,4C786.738,432.783,787.357,432.359,791,432Zm-2,16v-2l9-1a10.6,10.6,0,0,1,1,4l-2-1c-0.957.478-.1,2.6-3,2v-1Zm-2,9c-0.931,3.636-3.08,4.053-4,8l-15-3v1h1c1.131,1.006,10.831,2.615,13,3v4c-3.122,1.817-3.387,2.982-9,3-3.077,2.834-4.853-.057-7-1v1c-2.113.982-.213-4.379-4-2q-0.5-1.5-1-3l-2,1v-2l-2,1v-2h-1l-2-3c-1.214-.726-0.384.832-1,1-1.311.357-3.49-3.151-4-4,2.927-.684,3.274-1.113,4-4l13,2q0.5-1,1-2h3v-1h1s0.764,1.458,2,1q0.5-1,1-2l2,1v-1l3-1v-2l2,1v-1l10-2v1h1c-1,1.971-5.076,5.286-3,7h-2Zm46,14c-8.406-.122-9.823,1.417-16,2v2c-2.11-.562-1.857-1.3-4,0v1h-2v1h-2v1h-3v1l-4-1v-1h-1v1h-1v-1h-3v1l-3-1v-2a3.978,3.978,0,0,1-2-2l-9,2q-0.5-1.5-1-3c2.884-2.687.627-2.853,2-6h1v-2l2-1v-2l3-2q-0.5-1-1-2h2l4-5h4v-1h1q0.5,1,1,2h9l3,4c3.607,2.257,5.751-1.018,9,1q0.5,1,1,2l3,2v1h2v1a7.906,7.906,0,0,0,4,2v1h-1c0.2,1.7,1.794,1.531,2,2v2Zm-68-9h2v-1h-1v-2h-1v3Zm-4,12h4v1l2-1c1.248,0.954-1.234,1.912,1,2v-1h1q0.5,1,1,2h7q0.5-1,1-2c1.414-.041-0.392.751,1,1l3-1v2l11-1c-0.222,1.4.105,0.117-1,1,0.376,1.529.936,1.218,2,2v1h1v-1a14.708,14.708,0,0,1,8,1h1q0.5,2.5,1,5h-1v2l-5,4v2l-2,1v1h-2q-0.5,1-1,2h-5c-1.139,1.139,0,.4-2,1v-2l-2,1v-1h-4v1l-7,1q-1-3-2-6h-1v-6a10.287,10.287,0,0,1-2-2l-6,1q0.5-2.5,1-5c-2.4-1.049-3.212-1.12-4-4C761.139,474.861,760.4,476,761,474Zm-8,48c1.139,1.139,0,.4,2,1C753.861,521.861,755,522.6,753,522Zm-6,1c0.723,2.762.279,2.237,3,3,2.012,1.962,8.152,2,11,1v-1c3.471-1.123,7.761,1.085,10-1-4.962.1-18.608,2.134-21,0-1.139-1.139-.4,0-1-2h-2Z" />
        </a>
        <?php
        $kdwil = '14.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_8" data-name="Color Fill 8" class="cls-6" d="M705,314c0.649,2.469.978,3.036,3,4v-1h1v1l3,2v2l4,3v1h2v1h-1q0.5,1.5,1,3l2,1v2h1q0.5,1,1,2h2l3,4h2q-0.5,1-1,2h2q0.5,2.5,1,5h-2v2a22.718,22.718,0,0,0-8,2v1l-2-1q-0.5,1.5-1,3l-2-1q-0.5,1.5-1,3l-2-1a21.551,21.551,0,0,1-2,2v1h-1v-1h-1v2c-2.79.443-1.9,1.144-4,0v2l-2-1c-1.237,1.753-3.545,7.947-6,5v2l-4,1v1l-2-1v2c-5.027.177-5.95,2.058-10,3a14.809,14.809,0,0,0,1,6l3-1q0.5-2,1-4a21.326,21.326,0,0,0,10-4l2,1v-2l2,1v-2l3,1v1a9.877,9.877,0,0,0-4,4h1c2.25-2.509,3.649-1.636,7-3v-1l2,1q0.5-1.5,1-3l2,1v-1l3-2q0.5-1.5,1-3l2,1q0.5-1.5,1-3l2,1v-2c1.4-.2.523-0.073,1,1h1v-2h2v1c1.439,0.483,1.436-1.827,2-2l3,1v-1c2.507-.876,3.681-0.624,5,0v-2h1v1l2-1c0.742-1.424,1.353-1.165,2-2q-0.5-1-1-2l3-1q-0.5-1-1-2h2q-0.5-1.5-1-3h2v-1h-1q0.5-1,1-2c1.413,0.054-.393.758,1,1,0.859,1.889,1-2,1-2,2.876-.42,1.8-1.081,4,0v-2l2,1v-1h5c1.338-.459-0.392-0.752,1-1v1h1v-2c3.99-1.943,1.7-.837,3-4h1v1l3-1v3h1c1.87,0.9-2,1-2,1-0.318,3.543-1.314,3.949-2,7h-1c-1.139-1.139,0-.4-2-1v2l-2-1v2l-2-1v2l-2-1v2h-1v-1l-6,4v1h-2q-0.5,1-1,2l-7,6v2l-3,2v2l-2-1v1l-4,1v1h-4q-0.5,1-1,2l-3-1v2h-1v-1l-6,1q-0.5,1-1,2h-2l-2,3h-2v1l-3,2-2,3h-2q-0.5,1.5-1,3l-4,3q0.5,1,1,2h-2l-2,3h-2q-0.5,1-1,2h-2q-0.5,1.5-1,3l-2-1v2h-1v-1h-1v1h-5v1l-33,3c-1.557,2.444-1.146.612-3,2l-5,6v2h-1v2h-1v6h-1v7h-1v3h-1v2h-1v2l-2,1-6,7c-1.681,1.155-2.265.021-4,2H603c-2.269-.641-9.352-3.262-13-2v1l-4,1-4,14-11,1c-1.6,2.518-3.587,2.281-6,4q-0.5,1-1,2l-3,2c-2.617,3.616-2.973,7.659-8,9-0.723,2.762-.279,2.237-3,3v1l-12-2v-1c-3.044-.412-2.011,1.58-3,2h-2c-0.945-1.8-1.385-1.575-2-4-6.549-.009-7.4-2.351-13-3q0.5-3.5,1-7c-4.342-1.1-4.831-4.59-8-7v-1h-3v-1h-3l-1-2h-5l-1-2-2,1v-1c-1.655-1.4-2.476-3.457-3-6-4.866-1.227-3.921-3.288-6-7h-1v-2l-4-3v-8h-1q0.5-3,1-6h1v-2h1v-6h1c3.2-3.113,4.669.125,5-7,1.984-2.529-1.115-3.891,0-8,1.035-3.817,2.78-7.179,3-12-2.927-.684-3.274-1.113-4-4h1q0.5-2.5,1-5l16-1v-5l-3-2,4-11-12-2c-2.018-3.746-4.93-6.174-6-11l3-1c-1.35-3.492-.7-4.417,0-8,3.973-.976,3.851-1.963,10-2v1h1q0.5,5,1,10h1q-0.5,4.5-1,9h3v-1c2.748-2.81.315-4.316,6-5,0.981,1.737,7.942,6.934,11,6v-1c2.84-1.228,3.814-2.216,7-3,1.117-5.755.127-6.008-1-11h7c0.072,3.553-.157,6.785-1,9h5v-1h1c0.11-2.022.944-8.865,2-10l8-5v-3l22-3v-1l41-2v-1h9v-1h8v-1h9v-1h10c11.276-3.228,26.078-2.746,38-5q1-3,2-6l3-1v-1a9.151,9.151,0,0,1,6,4h1v1h-1q0.5,1,1,2Zm51,6h2v1h-1c-0.387,1.723.931,1.707,1,2,1.239,5.228-.375,10.283-3,12v1c-3,1.984-5.661-.82-9,0v1h-4v2l-2-1v1l-3,1v-1c-5.107-4.219-3.848-10.7-2-17v-8h1q0.5-2,1-4l2,1v-2l3,1v-1h4c1.742,1.943,2.355.855,4,2l4,5h2v1h-1Q755.5,318.5,756,320Zm-38,4c-0.915-3.515-2.433-2.853-3-7a7.742,7.742,0,0,0,2-3h2c3.174,5.678,5.472,6.985,4,15h-1c-1.139-1.139,0-.4-2-1q0.5-1,1-2h-2v-1h1C721.011,323.361,718.533,324.145,718,324Zm10-10c2.041,1.34,1.878,1.637,2,5l-3,2v-5C728.139,314.861,727.4,316,728,314Zm-23,47h2v3h1c0.493-.427,1.251-1.853,3-1v1h-1v3l-3,1v-1h-1v1h1c1.889,0.859-2,1-2,1v-1c-1.139-1.139-.4,0-1-2a3.982,3.982,0,0,0,2-2h-1c-1.127,1.719-.633,1.355-3,2v-3l2,1v-1C705.234,361.871,704.415,363.025,705,361Zm-12,14a7.742,7.742,0,0,1-3,2v2h1a8.278,8.278,0,0,1,5-3v-1h-3Zm-7,3c0.493,0.427,1.251,1.853,3,1v-1h-3Z" />
        </a>
        <?php
        $kdwil = '14.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-7" d="M393,201c0.426,2.62,1.125,5.306,0,9h-1v6h-1v8h-1v8h-1v8h-1q-0.5,8.5-1,17h-1v2l-3,2v2l-4,3v2l-5,4v2l-5,4v2l-8,7h-4v2h-1v-1l-2,1-1,2a1.431,1.431,0,0,1,1,2l-2,1v2l-2,1v2l-2,1-1,4-2-1-1,3-2-1-1,2-3,1v2l3,1-1,3h2l-1,2,6,5v2l6,5h2l3,4c1.856,1.306,5.619,3.5,7,2v2h2c0.918-.4.575-2.851,3-2v1h1v2l2,1v3h1v2l2,1v16l-3,1v1c-1.722.86-6.768-2.537-7-3v-2c-3.215.77-2.155,1.508-6,2l-10-11h-2l-1-2h-1l-6-8h-2v-1c-2.2-1.365-1.39.427-3-2-1.135.844-.145-0.127-1,1l-5,4v2h-1v2h-1v1h-1v1h-4c-2.238.987-6.748,5.83-8,8-1.8-.945-1.574-1.385-4-2-1.051,1.88-7.293,7.449-11,6l-2-3s-6.316,1.016-8,1l-1-3h-1v-2h-1v-4l-3-1v-1h1c0.392-1.359-.755.393-1-1l1-3c-2.927-.684-3.275-1.113-4-4,1.975-1.129,2.338-1.417,3-4a7.13,7.13,0,0,1-2-2l-8-1v-1h1c-1.05-2.991-.245-3.921,0-8h2a10.1,10.1,0,0,1,7-7V304c-1.329-.482.312-0.472-1-1h-4l-2-4h-2l-3-4c-3.229-2.342-5.4-1.848-6-7l3-1c0.872-1.113-.835-0.843-1-1q0.5-4,1-8l-3,1v-1c-1.719-1.127-1.355-.633-2-3h1v-1h-1c-0.979-1.654,1.44-.846,2-1,0.579,0.416.147,1.633,2,1v-1c-1.139-1.139-.4,0-1-2h2a34.651,34.651,0,0,0,1-7h2v-2c-2.4-1.049-3.212-1.12-4-4h1l-1-3h1v-2h-3a19.4,19.4,0,0,1,2-9h1v1h1v-1h6v-1h-1v-1h-3v-1h1c-1.4-2.261-1.558-2.588-5-3-0.385-2.2-.775-1.381-1-2-0.65-1.786,2.077-.835,0-3h-2v-1h1v-1h-1v-1h1v-1h-1q0.5-3,1-6l-3-2v-1l-3,1v-1l-3-2v-2l-2-1c-2.74-2.911-3.973-4.045-4-10h1v-3l6-1v-1h4v1h6v-1h5v1l5-1c1.035,0.785-.378,1.319,1,1v-1h2l1-2,5,1,1-2,8,1v-1c1.462-.793,1.69-0.716,4-1,2.489,4.264,6.977,6.351,11,9h2v1l4,3v2l2,1v1h2l2,3h2l1,2h2l1,2h2l2,3h2l1,2h2v1c1.961,1.529,2.443,1.753,6,2,0.662-1.287,1.579-1.365,2-2v-2l2-1q0.5-2.5,1-5h1l5,7h15l3-9,2-1C377.717,209.533,385.577,202.54,393,201ZM339,308c1.139,1.139.4,0,1,2h-1v-2Z" />
        </a>
        <?php
        $kdwil = '14.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-8" d="M298,26v5h-1v1h2v1h-1c0.369,1.365.489-.319,1,1v3h1v4h1v1c-0.177.149-1.87-.115-1,1h2l-1,2h1l1,3c-0.383.473-1.658-.252-1,1l2,1v2h1v2h1l-1,2h2c0.019,0.913-.907,1.807-1,4l3,1v1h2l-1,2h1l1,2h2l-1,2c1.365,1.508,8.748,6.012,6,8h3v1l3-1c1.047,3.718,2.059,2.7,4,5h1v3h3v1l2-1,1,3,5-1v1l12,1,1,3,2-1v2c1.411,0.1-.087-0.1,1-1,1.455,0.558,1.04,1.3,2,2l2-1,1,2c1.8,0.7,1.53-.755,2-1l3,1v2l7,5c-1.895-3.256-3.731-3.633-4-9,6.388,1.548,8.735,7.438,13,11v4h-3v1c1.251,0.849,1.232.636,2,2h-1c-1.54,1.316,1.931.978,2,1v3h1c0.118-3.6.769-10.07-1-12v-2h-1l-5-6h-2l-1-2c-2.811-1.928-3.944-1.179-5-5h-2v1l-2-1v1h-1V86l-2,1V85l-2-1V83h-2V82h1V81h-2l1-2-2-1c-0.438-1.345.416-.03,1-1-0.281-1.386-.608.359-1-1-0.51-1.77,1.14-4.777,1-5h-1c1.377-1.762.292,0.443,2-1,0.943-.8.77-2.029,2-3,1.139,1.139,0,.4,2,1l1,3h1c0.57,1.649-.969,1.838-1,2v1h1v3l2,1v6h1c0.034-5.174-1.187-7.135-2-11,2.068-1.206,5.034-3.817,6-6V63h1v1h1l2-3h6V60h14v1h2v1h11v1l2-1v1h1l-1,3h-1v4h-1q-0.5,2-1,4h-1v3h-1v3h-1v3h-1v5h-1q0.5,2.5,1,5h1q0.5,3.5,1,7h1l1,4h1q0.5,3,1,6h1v5h1l1,4,2,1v2l2,1v2l3,2,2,6,3,2v2l5,4v2l4,3v2l2,1v2h1l1,3,3,2,1,4,2,1v2h1v2h1v3h1l1,4h1v5h1q0.5,3,1,6h1c0.862,1.423.687,1.725,1,4-2.523,1.339-3.5,1.99-8,2v1h-6v1h-3v1h-3v1h-4v1h-2v1h-2l-1,2-5,1-1,2h-2l-2,3h-2l-1,2-5,1-1,2H394c0.221-4.109,1.446-5.546-1-8v1h-4v1h-2v1h-2l-1,2h-2l-5,6h-2l-1,2h-1c-4.067,5.6-.166,11.673-10,12-1.593-1.485-5.892-1.092-9-1-0.924-2.284-4.453-7.715-6-6h-1v4l-3,2v2c-0.419.623-1.328,0.772-2,2l-5-3v-1h-2l-1-2h-2l-2-3h-2l-1-2c-3.068-2.071-4.757-.6-6-5h-3c-1.5-3.294-5.867-8.532-9-10l-5-1v-1c-2.709-2.161-3.152-3.716-8-4v-2c-4.5-.27-6.572-1.524-7-6h3v1l4-1v1c1.139,1.139.4,0,1,2,6.809,0.112,8.4-.967,13-2v-1h-1v-1h1v-4c0.4-.935,2.512-0.023,2-3h-1v-3h-1v-4h-1c-0.6-2.426,2.422-4.4,2-5h-2c-0.385-1.361.331,0.011,1-1l-1-3h1v-1h-1v-1h1v-1h-1v-1h1l-1-3,2-1v-2c-3.872.641-4.634,0.583-8,1v-2l-2,1v-1c-1.016-.771-0.984-1.229-2-2q1-5,2-10c-5.011,1.081-11.329-.148-12-7h1c0.241-.66-1.8-1.985,0-5h-1c1.021-1.35,2-.972,3-2v-2l2,1v-1h-1v-1h1V113h1V96h1q0.5-3,1-6l2-1-1-2h2c0.921-1.073-.935-0.856-1-1V85c1.836-1.349,1.579.536,3-2h-1V82h2c0.119-3.928.018-8.343-2-10h-2V71h1c-1.125-1.121.038-.476-2-1q-0.5-3-1-6h-2l1-2-2-1q-0.5-3.5-1-7h-1c-2.271-7.1,1.39-23.963,3-28h3Zm67,44c0.624-2.613,1.06-2.846,3-4,0.844-1.135-.127-0.145,1-1v3C367.2,68.945,367.426,69.385,365,70Zm-21,3h2v1a27.494,27.494,0,0,1,4,5h1v3h-1l-6-5V76h1Z" />
        </a>
        <?php
        $kdwil = '14.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-9" d="M391,226a16.574,16.574,0,0,1,7,4l1,2,3,1,2,3h2l4,5h2l3,4h2l3,4h2l4,5h2l1,2h1l1,2h2v1c1.747,1.441,2.415,2.279,5,3l7-8,3,1v1h3l1,2h6v1h3v1a1.628,1.628,0,0,0,2-1c0.638-.1,7.412,2.562,8,3l1,3,7,5h2v1h1v2c1.027,1.12,2,.686,4,1l1-3h1v-2l2-1v-2l3-2v-2l2-1,1-3h1l1-4,2-1,1-4,2-1,1-4,2-1v-2h1v-2l2-1c2.168-3.375.133-4.716,5-6v1l7,1v1h3v1h3l2,3h2v1l3,2v2l2,1c1.075,1.762,3.221,10.362,2,14h-1v3l-2,1v2c-1.079,1.925-2.894,4.01-4,6h11v-2h10c1.465-3.219,3.72-5.584,6-8l2-1v-2l3-2v-2l3-2v-2l2-1v-2l2-1v-2l3-2v-2l2-1v-2l8-5v-4l3-1v1c1.251,0.849,1.232.636,2,2h-1c-1.54,1.316,1.93.978,2,1q-0.5,5.5-1,11l-2,1q0.5,1.5,1,3h-1c-0.611,2.7.968,2.913,1,3,0.49,1.326-.766-0.4-1,1v1h2q1,3.5,2,7h1q0.5,3.5,1,7h1v1h2l2,3h1v2l2-1,5,6h3v1l2,1v2l4,3q-0.5,1-1,2l3,1v1h1q-0.5,1-1,2l3,1q0.5,1,1,2h1v2c0.965,1.034,1-1,1-1,1.607-1.087.868,1.531,1,2,2.232,0.291,2.651.069,4,1v1h2l2,3,2-1q0.5,1,1,2l13,2c3.155,0.1,6.006-1.395,7,0v-2h5v-1l10,1v2l3-1v1a17.411,17.411,0,0,0,7,1c5.053-.157,12.2-2.8,16,1-1.139,1.139-.4,0-1,2h-2c-0.872,5.836-1.959,7.222-9,7-2.124,1.8-5.687.051-9,1v1h-8v1H656v1h-9c-10.941,3.12-25.969,1.886-37,5H596v1H583s-0.068.834-2,1H570a105.827,105.827,0,0,1-18,4v3h-1c-1.862,2.251-5.19,3.736-8,5v5h1v1h-1a9.379,9.379,0,0,0-1,4h-3v-9a40.116,40.116,0,0,0-9,1v2l2,1c1.16,2.843-.644,6.107-1,8-2.25.292-2.625,0.093-4,1v1h-2q-0.5,1-1,2l-8-4q-0.5-1-1-2h-5c-0.823,1.876-1.481,2.616-2,5h-2c0.17-5.395-.81-16.679-3-19v-1h-6c-1.166,1.361-1.825,1.528-4,2-0.945-1.8-1.385-1.575-2-4,0.458-.489,2.118-7.663,2-8h-1c-1.369-2.343-1.445-1.441-2-5h-4l-1-3c-2.5.359-10.487,1.3-14,0v-1l-4-1v-1c-0.619-.426-3.956-2.377-5-2v1c-1.719,1.127-1.355.633-2,3a15.491,15.491,0,0,1-10-7c2.839-1.928,3.1-8.077,3-13h-1v-1h-4l-2-3-3-1v-1h-2v-1h-2v-1h-2v-1h-2l-1-2h-2v-1h-2v-1h-2v-1h-2l-1-2h-2v-1h-2v-1h-2v-1h-2v-1h-2l-1-2h-2v-1h-2v-1h-2v-1h-2l-1-2h-2v-1h-2v-1h-2v-1h-2l-1-2h-2v-1h-2v-1c-1.23-.681-4.392-0.9-5-2v-3c1.819-2.106.065-5.689,1-9Z" />
        </a>
        <?php
        $kdwil = '14.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-10" d="M445,419c0.733,3.1,2.912,4.563,4,7q0.5,3,1,6h1l1,2h2l4,7c2.884-2.369,4.393-6.371,6-10h2l2,3h1c2.18,2.991.762,3.788,6,4l1-4c3.029,0.736,2.107,1.571,3,2h4v1l3,2c2.6,3.779.287,6.366,6,8,0.7,3.377,2.168,3.852,3,7,3.528,0.287,3.925,1.944,7,2v-1h1l2,3h1v-1l5,2c1.5,2.63,3.189,3.378,4,7h3q0.5,1.5,1,3h-1a9.556,9.556,0,0,0-1,4l5,1v1h2q0.5,1,1,2c2.046,0.885,2.878-.8,4-1l4,5c2.662,0.823,2.34-1.74,3-2h3v7h1q0.5,2,1,4h1v11h-1q-0.5,2-1,4h-1c-1.423,1.793-2.278,2.384-3,5h-2l-5,7-2,1q-0.5,3-1,6h-1v3h-1v5h-1c-1.152,3.933-.473,15.34,0,16l2,3h2l2,3,3,1v5h1v1a10.409,10.409,0,0,0,2-2h3v-1c2.04-1.46,2.384-1.764,6-2q-1,4.5-2,9l-3,1v1h-2v1h-3q-0.5,1-1,2h-5v-1c-0.855-.648-5.049-1.386-7-1a2.548,2.548,0,0,1-3,1q-0.5-1-1-2h-2v-1h-2v-1c-3.375-1.656-2.623,1.542-4-3,2.353-1.959,2.977-4.6,3-9h-4c-1.384-2.605-3.136-8.056-8-7v1h-4c-1.029.445-.493,2.931-4,2v-1h-2v-1h-3l-2-3-7-1-3-5-4-1-4-5-2-1-1-3h-2v-1l-3-1-3-4-2-1v-2l-2-1v-1h-2l-1-2h-3v-1l-6,1v-1c-1.139-1.139-.4,0-1-2-4.3-.912-7.025-3.842-9-7l-1-3-4-1v-1h-3l-3-4-5,1v-1c-4.069-2.628-7.386-11.956-8-18h2l1-2,11,2q0.5-3,1-6l2-1v-2h1c0.074-.4-1.823-3.833-1-6h1v-2l2-1c1.53-2.181.343-2.3,0-5l3-1c0.195-4.431,1.28-4.456,3-7h1q-0.5-6-1-12h1v-2l3-2v-2l2-1,1-3h2v-4C442.8,420.055,442.574,419.615,445,419Z" />
        </a>
        <?php
        $kdwil = '14.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_13" data-name="Color Fill 13" class="cls-11" d="M597,198c7.53,0.777,12.154,9.206,16,14l3,1,2,3h2v1h2l2,3h1q0.5,1,1,2h2v1l3,2v2h1v1h-1c-0.3,1.382.2-.125,1,1-0.3,1.382-.524-0.332-1,1v3h-1q-0.5,2-1,4h-1v3h-1q-0.5,4-1,8h-1q-0.5,2.5-1,5h1v2h1v3l2,1c1.247,2.133-.031,4.258,1,7h1q0.5,2.5,1,5c-1.135.844-.145-0.127-1,1-2.211-.979-2.819-1.663-6-2-1.282,2.747-4.826,7.419-8,5-3.442-.9-5.709-3.839-8-6q-0.5-1-1-2h-2l-2-3h-2q-0.5-1-1-2h-1l-3-10h-1q-0.5-2-1-4h-1c-0.967-3.047,3.791-10.37,2-16h-1v-3h-1v-3l-2-1c-1.033-1.635-3.1-4.81-2-8h1q0.5-2,1-4h1c1.925-5.115-1.555-10.6-3-13h1v-1h7v-1Zm121,62c4.96,1.289,5.457,5.392,8,9l3,2v2l6,5v2h1v5l-3,2v1l-10,1c-1.835-3.02-4.945-5.263-8-7h-2q-0.5-1-1-2h-2v-1h-2v-1l-4-1v-1l-2-1v-2l-3-1q-0.5-1-1-2h-2q-0.5-1-1-2c-6-3.7-13.855-.877-16-9l5-2v-1h-2c-6.675,6.712-8.065-1.493-16,1-3.77,1.185-7.572,4.049-12,5v-3h3a8.15,8.15,0,0,1,2-2q1-5,2-10l2-1v-2l3-1,2-3c1.719-1.162,2.257-.017,4-2,8.141-.129,14.33,2.7,20,5h3v1h2v1h3v1h2v1l6,1,9,10h1v2Zm-69,3,10,1v-1h2v-1c2.877-1.423,6.972-1.851,11-2v3c2.292-.391,4.181-1.911,6,0q0.5,1.5,1,3h2v1h4v1h2v1h4v1h2v1c1.817,1.422,2.377,2.252,5,3v2l6,5v1l5,1q0.5,1,1,2h2v1h2q0.5,1,1,2c3.069,2.128,3.745.807,4,6h1c0.687,1.183-1.532,11.517-2,12-0.829,3.724-2.456,4.885-7,5l-6-8-3-2q-0.5-1.5-1-3l-12-3v-1c-0.448-.089-6.572.993-9,1H657c-2.912.865-9.068,5.174-13,4v-1l-6-1v-1l-4-1v-1h-2v-1h-3v-1h-2q-0.5-1-1-2l-3-1q-0.5-1.5-1-3l-2-1v-5a20.115,20.115,0,0,0,5-7l7,1q0.5-1,1-2h2q-0.5-1.5-1-3h-1q-0.5-4-1-8h-1v-3h-1c-1.434-3-1.821-4.7-2-9h1v-2h1v-2c1.755-2.375,5.757-2.084,10-2,1.812,4.023,7.31,9.888,11,12A57.634,57.634,0,0,0,649,263Zm-2-1-4,5c0.785-.376,5.538-3.98,5-5h-1Zm-7,5c1.139,1.139,0,.4,2,1C640.861,266.861,642,267.6,640,267Zm-2,1q-0.5,1-1,2c0.074-.042,2.9-1.586,2-2h-1Zm90,26q0.5,5,1,10c-1.8.944-1.575,1.385-4,2v-1h-1v-8c1.139-1.139.4,0,1-2Z" />
        </a>
        <?php
        $kdwil = '14.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-12" d="M461,311c5.435,0.566,4.789,2.749,8,4h6l1,2c0.288,0.088,6.777-1.008,9-1v2a12.71,12.71,0,0,0,5,1v3l2,1q-0.5,4.5-1,9h-1c0.2,1.625,1.914,1.757,2,2v4h-1q0.5,3,1,6c-3.586.936-3.156,2.61-3,7l-15-4c-1.973,3-2.825.941-4,5l-6-1v-1h-6v-1h-1v-5h-1v-3h2q0.5-5.5,1-11l-4-1c-0.77-3.215-1.508-2.155-2-6l3-2v-1h2v-1c1.117-1.019,2.863-2.1,3-4h-1v-2h1v-2Z" />
        </a>
        <?php
        $kdwil = '14.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')" >
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-13" d="M409,69h2v2l6,7h2l1,2,4,3,3,4h2l1,2,3,1v1h2v1h2v1h2v1h2v1h2l3,5,3,2c2.1,3.213.766,6.768,2,11h1v8h1v4h1v2h1v4h1v2h1q-0.5,4.5-1,9c1.2,4.144,4.892,6.715,6,11l3,1v1h2v1c4.173,1.6,6.974-1.083,10,2,1.139,1.139.4,0,1,2,3.786,0.992,11.254,6.516,18,4v-1h2l1-2,15-2-6,23H496v-1l-6-2c-2.354,4-7.145,5.527-10,9h-5v3h-8v1h-1v3c-4.085-.659-12.855-4.438-15-7l2-1-2-6h-1q-0.5-4-1-8h-1l-2-6h-1v-4l-2-1-1-4-2-1v-2l-3-2v-2h-1l-1-3-2-1v-2l-2-1v-1l-2-1v-2l-5-4v-2l-3-2-2-6-3-2v-2l-2-1v-2l-2-1-3-13h-1c-1.458-3.028-6.491-15.1-5-20h1q0.5-3,1-6C406.19,75.936,408.27,72.6,409,69Z" />
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
                    url: "ambil_riau_kiri.php",
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