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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20%" height="20%" viewBox="0 0 350 463">
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
            <filter id="filter" x="158" y="11" width="96" height="160" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="73" y="214" width="172" height="136" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="114" y="296" width="106" height="113" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="95" y="364" width="103" height="79" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="76" y="339" width="56" height="108" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="133" y="148" width="125" height="98" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
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
        $kdwil = '76.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Pasangkayu_01" data-name="Kab Pasangkayu 01" class="cls-1" d="M201.6,14.819h2.8c-0.706,3.12-3.455,9.317-2.1,14.009H203v7.7l2.1,1.4v1.4h0.7c-0.093.954-1.165,1.17-.7,2.8h0.7q1.4,5.953,2.8,11.907H210l0.7,2.1H210v0.7h-3.5c-0.064.02,0.13,0.437-1.4,0.7,0.025,3.056-.572,6.4-2.1,7.7l-2.1.7q-0.35,1.751-.7,3.5c-2.068,3.933-4.97,7.918-9.1,9.806a7.433,7.433,0,0,1,.7,2.8l6.3-.7q0.35,1.4.7,2.8h-0.7c-1.785,1.825-6.155,1.48-9.8,1.4v1.4h-1.4v-1.4c-0.8.8-.279,0-0.7,1.4-1.165,1.242-.857,5.661,0,7l2.8,2.1v1.4c6.066,0.866,7.306,1.777,7,9.106l12.6-4.2,0.7-2.1a19.57,19.57,0,0,1,8.4,0l0.7,2.1h1.4v1.4c0.7,1.275,5.575,2.744,4.9,4.9H224c-0.69,2.994-4.982,6.871-3.5,11.207h0.7q0.35,1.4.7,2.8c1.934,0.506,1.566.195,2.1,2.1,3.469,0.915,3.937,4.328,6.3,6.3-0.173,3.369-.492,3.384,0,6.3,1.107,0.247,4.459,1.437,4.9,2.1q0.35,1.75.7,3.5l1.4,0.7v1.4H238v2.8l1.4,0.7V150l1.4,0.7c2.17,3.2,4.062,6.731,8.4,7.705v2.1h-0.7v0.7h-2.1c-1.441-1.556-3.367-1.633-5.6-.7v0.7l-5.6.7v0.7h-1.4v0.7H231v0.7h-1.4l-0.7,1.4c-0.86.442-9.514,1.44-11.2,0.7l-0.7-1.4c-1.666-.96-3.628-0.7-5.6-1.4v-0.7h-5.6v-0.7h-1.4v-0.7h-2.8v-0.7c-1.905-.717-4.01-0.425-5.6-1.4l-0.7-1.4h-1.4l-0.7-1.4h-1.4l-0.7-1.4H189q-1.4-2.451-2.8-4.9h-4.9c-0.8.8,0,.279-1.4,0.7v1.4c-4.4.725-10.213,4.451-11.2,8.405h-2.1q-0.7-4.552-1.4-9.106h-0.7q-0.35-2.8-.7-5.6h-0.7c-0.679-1.055-1.993-2.805-1.4-4.9h0.7v-2.1l2.1-1.4q0.35-2.451.7-4.9l1.4-.7c0.7-1.184,2.271-5.937,1.4-8.4h-0.7q-0.35-1.751-.7-3.5h-0.7v-1.4h-0.7v-2.8h-0.7v-2.8h-0.7v-2.1h-0.7v-2.8h-0.7V96.069a19.4,19.4,0,0,0,5.6-4.9h0.7v-1.4h0.7q-0.35-1.751-.7-3.5H168v-4.2c-0.673-1.8-3.754-2.908-2.8-6.3h0.7q0.7-3.152,1.4-6.3H168c1.062-2.632.59-4.8,2.8-6.3v-0.7h2.8c0.634-.305-0.034-0.892,2.1-1.4l0.7-2.1h0.7v-1.4l2.1-.7,0.7-1.4c1.8-1.715,3.4-3.593,6.3-4.2,0.685-2.75,3.2-4.077,4.2-6.3q0.35-3.5.7-7h0.7q0.349-1.4.7-2.8h0.7v-1.4l2.8-2.1q0.35-2.1.7-4.2h0.7v-1.4l1.4-.7v-1.4h0.7v-3.5h0.7v-2.8h0.7C201.488,16.611,201.377,16.419,201.6,14.819Z" />
        </a>
        <?php
        $kdwil = '76.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Mamuju_02" data-name="Kab Mamuju 02" class="cls-2" d="M218.4,245.96h1.4l0.7,1.4h1.4l0.7,1.4H224v0.7l1.4,0.7q0.35,1.75.7,3.5l1.4,0.7c1.17,1.825,1.412,3.238,1.4,6.3-2.31,1.5-2.868,4.449-2.8,8.405,0.9,0.721.811,1.623,1.4,2.1l2.1,0.7c0.766,1.007.04,1.632,1.4,2.8l-0.7,1.4c0.4,0.532,1.039-.23.7,0.7h-0.7v1.4h-0.7v2.1h-0.7c-0.74,1.605-.669,3.254-0.7,5.6,4.441,2.417,6.707,7.755,11.9,9.106v2.8h-1.4v1.4c-1.917.451-1.593,0.916-3.5,1.4q-0.349,2.452-.7,4.9h-0.7c-0.529,1.949-.806,1.772-2.1,2.8V309h-2.1q-1.4,1.75-2.8,3.5c-1.18.81-1.588,0.009-2.8,1.4h-9.1v-0.7h-2.1v-0.7h-4.9v-0.7h-2.1c-0.335-.175-1.173-2.357-2.1-2.1l-0.7,1.4h-2.8v0.7l-9.1.7-1.4,2.1h-1.4v0.7l-4.2,1.4v0.7h-2.8a1.007,1.007,0,0,1-1.4.7v-0.7c-1.917-.452-1.593-0.917-3.5-1.4-0.425-1.676-.222-1.3-1.4-2.1v-0.7l-4.9-.7v-0.7H168v-0.7h-2.1l-1.4-2.1h-1.4a11.02,11.02,0,0,0-1.4-1.4v-0.7l-9.1.7v-0.7h-1.4l-4.2-6.3-14.7-1.4c-0.947,1.683-2.526,2.2-3.5,3.5l-0.7,2.1h-1.4l-0.7,1.4h-1.4v0.7l-2.8,2.1v2.1h-0.7c-1.133,2.07-.947,2.821-3.5,3.5q-0.349,2.8-.7,5.6h0.7v7.705c-0.128,1.573-1.416,3.333-.7,5.6h0.7v2.1h0.7c0.992,2.7-.023,6.2,1.4,8.4H119l-0.7,1.4-2.8-1.4v-1.4h-0.7c-1.3-1.386-.114-0.568-2.1-1.4v-0.7c-0.831-.174-1.2,1.151-2.8.7-1.67-.47-5.818-2.987-8.4-2.1v0.7l-4.2.7c-0.322-1.046-.8-1.1-0.7-2.8,0.57-.8.9,0.269,0.7-0.7H96.6v-2.1l-2.1-1.4v-1.4H93.8c-0.955-1.028-.343-0.952-2.1-1.4-1-.92-6.969-1.378-9.1-0.7v0.7H80.5v0.7l-2.1-.7v-7.7H77.7v-1.4H77c-0.769-1.574-.641-3.282-0.7-5.6l3.5-2.8L79.1,304.8h0.7l0.7-2.8,2.8-2.1v-1.4H84v-1.4h0.7l0.7-2.1h1.4c1.054,1.842,2.232,2.366,2.8,4.9,3.291,0.87,2.317,2.514,7,2.8v-0.7l3.5-.7v-0.7h1.4v-0.7h1.4l2.1-2.8,4.2-.7v-0.7h1.4l0.7-1.4,2.8-.7v-0.7l1.4-.7c0.68-1.076-.19-2.043.7-2.8h1.4l0.7-1.4c1.907-1.841,2.722-1.635,2.8-5.6-1.634-1.712,0-4.71.7-6.3a5.963,5.963,0,0,0,1.4-1.4h1.4v-0.7h2.1c2.037-.8,10.507-3.521,11.2-4.9v-2.1c-2.775-3.19,1.218-8.65,0-12.608h-0.7l-2.1-9.806a7.386,7.386,0,0,0,1.4-1.4h1.4v-0.7l8.4,0.7,0.7-1.4c1.957-1.733,5.436-5.194,8.4-5.6v-1.4h1.4v-1.4c1.912-.476,2.14-1.167,3.5-2.1v-0.7h4.9l2.8-3.5h4.9v-0.7h1.4v-0.7h2.8v-0.7h6.3v-0.7h0.7v0.7h0.7v-0.7c0.9-.679.723-1.537,1.4-2.1h1.4q0.35-1.05.7-2.1c2.384-.717,1.3-0.878,2.8-2.1v-0.7h15.4c0.948,0.837,4.295,1.082,6.3.7a1.025,1.025,0,0,1,1.4-.7v0.7c3.844,1.144.78,0.892,2.1,3.5l1.4,0.7v1.4l1.4,0.7c1.1,1.7,1.36,2.82,1.4,5.6l-4.2,2.1v1.4h-0.7v1.4h-0.7c0.229,1.4.7,1.4,0.7,1.4v6.3h0.7C217.245,243.83,217.867,244.06,218.4,245.96ZM95.2,298.492c-0.428-3.9-.733-3.805.7-7,1.407,0.4.606-.084,1.4,0.7,1.111,0.948,1.216,1.52,1.4,3.5H98v2.1H97.3v0.7H95.2Z" />
        </a>
        <?php
        $kdwil = '76.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Mamasa_03" data-name="Kab Mamasa 03" class="cls-3" d="M163.1,311.1l12.6,3.5q0.35,1.4.7,2.8c2.866,0.426,3.511,2.69,5.6,2.1v-0.7h1.4l0.7-1.4,6.3-2.1,1.4-2.1H196v-0.7h4.9v-0.7l3.5-.7a4.728,4.728,0,0,0,3.5,2.8,21.08,21.08,0,0,1-2.1,7h-0.7v14.008l-1.4.7v4.9l2.1,1.4v1.4h0.7q-0.35,5.6-.7,11.206h0.7v2.1h0.7v2.8l1.4,0.7v2.1h0.7c0.607,0.989.494,1.209,0.7,2.8h1.4v-0.7l2.1,0.7c0.341,3.47,1.845,3.922,2.1,7.7h-0.7v0.7c-2.917-.037-4.448.8-6.3,1.4h-3.5v0.7c-3.421,1.305-6.073,1.167-7,4.9h-1.4c-0.425,1.676-.222,1.3-1.4,2.1v0.7c-3.832,2.506-10.821-1.731-14.7,0l-0.7,1.4h-1.4v0.7h-1.4v0.7c-2.465,1.043-1.813-1-3.5,1.4h0.7v-0.7c0.6-1.323.7,1.4,0.7,1.4,0.8,0.8.279,0,.7,1.4h1.4v1.4c1.865,0.424,3.176,1.365,4.9,2.1l0.7,2.1,1.4,0.7c1.377,2.686.163,5.424,0,8.405-3.137-.014-3.13-0.207-4.9-1.4v-0.7h-2.8v-0.7l-3.5-.7v-0.7l-2.8-.7v-0.7H168l-2.1-2.8h-1.4l-2.1-2.8h-0.7v-7.7c-1.965-1.156-2.382-2.823-4.9-3.5-0.3-3.4-1.316-5.112-1.4-9.106-2.7-1.568-4.15-4.928-5.6-7.7a7.1,7.1,0,0,0-1.4,1.4h-2.1l-1.4,2.1c-2.014,1.762-4,2.688-7.7,2.8-0.506-1.935-.195-1.567-2.1-2.1v-0.7c-1.352-.749-3.657.382-4.2,0.7v0.7l-4.2.7a18.851,18.851,0,0,1-.7-6.3h-0.7v-2.8h1.4q0.35-1.052.7-2.1l1.4-.7v-2.8c0.3-.62.87,0,1.4-2.1-0.92-.366.2-0.29-0.7-0.7h-2.1l-1.4-2.1-4.2-1.4v-0.7l-2.8-2.1c0.55-1.283,2.434-3.718,1.4-6.3l-1.4-.7v-5.6l-1.4-.7c-0.986-2.51,1.116-5.329,1.4-7,0.849-5.016-3.054-8.046,0-11.207v-0.7c0.944-.7,2.155.258,2.8-0.7v-2.1c0.819-1.7,2.256-2.737,2.8-4.9l3.5-.7q0.35-1.052.7-2.1l4.9-4.2c1.809,0.09,2.421.108,3.5,0.7v0.7c3.5,1.422,5.116-1.988,7-.7,4.868,1.051,2.836,2.563,4.9,5.6h0.7l1.4,2.1h1.4V309c3.054-.559,5.091-1.36,9.1-1.4l0.7,2.1C163.2,310.5,162.679,309.7,163.1,311.1Z" />
        </a>
        <?php
        $kdwil = '76.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Polewali_Mandar_04" data-name="Kab Polewali Mandar 04" class="cls-4" d="M150.5,367.134c0.306,2.919,1.335,3.938,2.8,5.6l1.4,0.7v6.3h0.7v1.4l4.2,3.5v1.4h0.7c0.982,2.405.052,3.654,0,6.3h1.4q0.35,1.752.7,3.5l2.8,0.7v1.4c1.572,0.181,1.852.064,2.8,0.7v0.7h1.4l0.7,1.4h2.8v0.7H175l0.7,1.4h2.8v0.7c1.781,1.278,1.821,1.843,4.9,2.1v2.8c1.934,0.507,1.566.2,2.1,2.1h2.1c0.036,2.841.314,4.443,1.4,6.3l1.4,0.7a1,1,0,0,1-.7,1.4v0.7h0.7v4.9h0.7v1.4h0.7v1.4l1.4,0.7a47.426,47.426,0,0,0-.7,4.9h-4.2c-0.849-1.49-1.577-1.524-2.1-3.5H182v-1.4c-2.463-.331-2.244-0.241-4.9-0.7v-1.4c-3.411.153-2.73,0.437-5.6,0v-1.4l-5.6-.7v-1.4h-1.4v-1.4h-2.1a6.833,6.833,0,0,1-.7,2.8l-2.1-.7v0.7h-0.7v1.4h-0.7q0.35,0.7.7,1.4h-1.4l-1.4,2.1h-1.4l-0.7,1.4h-2.1l0.7,1.4h-1.4v0.7h-2.8v0.7h-9.8v0.7l-3.5.7-1.4,2.1h-4.2q-0.35-.7-0.7-1.4a1.043,1.043,0,0,0-1.4.7l-2.1-.7v0.7h-2.8l-0.7,1.4h-3.5v0.7h-1.4v0.7l-2.1-.7c-0.506-1.935-.195-1.567-2.1-2.1v-2.1H112v-0.7h-2.1v-0.7c-0.958-.772-2.937-1.516-1.4-2.8h-1.4v-4.2h-0.7v0.7c-3.062-.714-0.891-2.42-2.1-4.2l-2.1-1.4s-0.16,1.531-.7.7v-1.4h0.7q-0.7-4.553-1.4-9.105h-0.7v-1.4H99.4c-0.325-1.211.651-1.2,0.7-1.4l-0.7-4.2,1.4,0.7v-0.7h-0.7c0.085-1.415,1.964-1.227,1.4-4.2h-0.7q0.35-1.051.7-2.1l-1.4-.7v-5.6h1.4v-1.4h-1.4v-1.4c-1.407-.4-0.606.084-1.4-0.7,1.475-1.673.509-3.97,0-5.6h0.7c0.746-.651-0.231-0.363.7-0.7v0.7c1.095-.265.736-1,1.4-1.4h1.4l0.7-1.4c1.524-.66,2.027.924,2.8,0.7v-0.7h0.7v-2.1h0.7v-0.7h-0.7v-7.7a16.567,16.567,0,0,0,3.5-.7c0.512,0.043-.121,1.207,1.4,1.4q0.35-.7.7-1.4a1.1,1.1,0,0,1,1.4.7h2.8v-0.7c2.886-.725,2.493,1.065,5.6,0,0.386,1.428-.218.632,0.7,1.4v-0.7h0.7c1.182,2.523.029,3.244,3.5,3.5v-0.7h3.5l0.7-1.4,3.5-.7q0.35,1.051.7,2.1h2.1v1.4l6.3-2.1v-1.4C147.031,368.621,147.064,367.376,150.5,367.134Z" />
        </a>
        <?php
        $kdwil = '76.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Majene_05" data-name="Kab Majene 05" class="cls-5" d="M113.4,343.32c1.252,5.218,3.975,3.963,7.7,6.3l0.7,1.4h1.4v0.7h1.4v0.7H126v0.7a1.818,1.818,0,0,1,.7.7h0.7v4.2h-0.7v1.4l-2.1,1.4c-0.853,1.648-.071,4.728,0,7.705a6.034,6.034,0,0,1-2.8-.7v-0.7l-12.6,2.1v-2.1h-1.4v2.1l-2.1.7c0.369,3.619.669,6.218,0,9.806-2.665.475-2.238,0.464-4.9,0q-0.35,1.4-.7,2.8H98.7l-0.7,4.2,1.4,0.7s0.127-1.508.7-.7v1.4h0.7c1.174,2.02-.847,6.318.7,8.405v0.7h-0.7v2.1h1.4a5.286,5.286,0,0,1-.7,2.8h-0.7l0.7,1.4h-0.7v1.4h-0.7c-0.992,2.855,1.188,5.4,1.4,7v0.7h-0.7c-0.133,1.55.7,1.4,0.7,1.4,0.59,2.282-.42,4.032-0.7,5.6l2.1,0.7v2.1H105v1.4l1.4,0.7a1.022,1.022,0,0,1-.7,1.4l0.7,2.1c1.934,0.507,1.566.2,2.1,2.1h0.7v0.7h-0.7l0.7,2.1c1.794,0.738,2.342,1.746,4.2.7v0.7h0.7v2.1c-0.8.8-.279,0-0.7,1.4h1.4v2.8a2.79,2.79,0,0,0-1.4,1.4,13.461,13.461,0,0,0-6.3,0v-0.7h-0.7v1.4h-2.8l-1.4-2.1h-0.7q-0.35-1.4-.7-2.8l-2.1-1.4-0.7-4.2-1.4-.7v-2.1H95.9v-1.4H95.2v-4.2l-4.9-9.806v-9.106H91v-1.4h0.7c0.367-1.142-1.038-6.318-1.4-7l-1.4-.7v-1.4H88.2v-4.2h0.7l-0.7-8.4-1.4-.7v-1.4l-1.4-.7-2.1-2.8H81.9v-0.7l-1.4-.7v-2.1l-1.4-.7v-4.2l4.9-.7v0.7c1.01,0.276,2.861-.722,2.8.7h0.7v-1.4c1.934-.507,1.566-0.195,2.1-2.1,1.059-.934,3.654-5.752,2.8-8.405H91.7l-0.7-4.2h0.7v-2.1h0.7v-1.4h0.7l1.4-5.6C102.881,341.759,104.815,341.74,113.4,343.32Z" />
        </a>
        <?php
        $kdwil = '76.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Mamuju_Tengah_06" data-name="Kab Mamuju Tengah 06" class="cls-6" d="M246.4,161.909v1.4a9.654,9.654,0,0,0,4.2-.7v0.7h0.7v3.5H252v1.4l1.4,0.7q-0.35,2.1-.7,4.2l-1.4.7a2.313,2.313,0,0,0,1.4,1.4v4.9h-1.4q0.349,1.75.7,3.5h0.7c1.128,3.266-.251,12.239-0.7,14.709-1.261.661-1.1,0.97-2.8,1.4v0.7l-3.5.7c-0.49,2.836-.687,8.63-2.8,9.806h-2.8v0.7h-1.4c-1.907,1.043-2.954,3.167-3.5,5.6l-2.8.7v1.4H231c-0.451,1.918-.916,1.594-1.4,3.5l-2.1.7v1.4c-1.247,1.422-3.609,1.368-6.3,1.4l-3.5-4.9v-4.2c-1.507-.27-2.774-1.242-4.9-0.7v0.7h-3.5v-0.7h-9.8v-0.7h-2.8v0.7c-2.835.542-3-1.983-4.9-.7-3.933,1.069-2.547,3.834-6.3,4.9-0.517,2.253-.95,2.55-3.5,2.8-2.158-1.91-3.774.967-7,.7v-0.7l-2.1,1.4v0.7h-5.6l-1.4,2.1-2.8.7v0.7l-2.8-.7v0.7c-0.8.8-.279,0-0.7,1.4h-1.4l-4.9,5.6h-2.1l-0.7,2.1-3.5,1.4v2.1c-3.415.117-8.159,0.2-9.8-1.4h-0.7v-2.8c1.387-1.228.584-1.57,1.4-2.8l2.1-1.4v-4.2h-0.7q0.349-3.151.7-6.3h0.7v-1.4l2.1-1.4v-0.7h1.4v-0.7l1.4-.7v-4.2h0.7v-1.4l1.4-.7q-0.349-2.451-.7-4.9h0.7v-2.8h0.7q0.35-2.8.7-5.6h0.7v-1.4h0.7v-3.5h0.7v-0.7a6.7,6.7,0,0,0,1.4-1.4l3.5-.7,1.4-2.1h2.1v-0.7h6.3v0.7c1.6,0.322,1.874-.392,2.8-0.7q0.35-1.752.7-3.5h0.7v-4.2h0.7v-1.4h0.7q0.35-3.151.7-6.3l1.4-.7q-0.7-3.5-1.4-7h-1.4c-1.026-5.506.272-2.944,1.4-7a6.093,6.093,0,0,0,2.8-1.4v-0.7h2.1v-0.7l2.8-.7,0.7-1.4,4.2-1.4v0.7h0.7c0.4,0.475.674,2.924,1.4,3.5h1.4l0.7,1.4,4.2,1.4v0.7l2.1,0.7,0.7,1.4h3.5l0.7,1.4h2.1v0.7h2.1v0.7h2.8v0.7c2.309,0.587,2.842-1.163,5.6,0v0.7h1.4v0.7l4.2,1.4v0.7l6.3-.7c0.783,0.1,1.94,1.384,3.5.7l1.4-2.1H231v-0.7l2.8-.7v-0.7h2.1v-0.7h4.9l0.7-1.4,3.5-.7C245.8,162.006,245,161.487,246.4,161.909Z" />
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
                    url: "ambil_sulbar_kiri.php",
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