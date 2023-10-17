<?php

include '../koneksi.php';

include 'capaian_provinsi.php';
include 'fungsi_tes.php';
include 'fungsi_warna_kab.php';
include 'legenda_peta.php';

if (!isset($_POST["indikator"])) {

    die;
}

$kd_indi = $_POST['indikator'];

if ($kd_indi == 4) {

    die;
}

if ($kd_indi == 0) {

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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800" height="305" viewBox="0 0 800 305">
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
            <filter id="filter" x="648" y="96" width="52" height="49" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="90" y="139" width="32" height="26" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="82" y="66" width="109" height="69" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="229" y="132" width="90" height="135" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="447" y="39" width="345" height="181" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="435" y="52" width="191" height="169" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="262" y="52" width="320" height="214" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="156" y="74" width="86" height="154" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="94" y="108" width="88" height="127" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="39" y="111" width="118" height="113" filterUnits="userSpaceOnUse">
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
        $kdwil = '52.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_10" data-name="Color Fill 10" class="cls-1" d="M659,101h2q0.5,2,1,4h1q-0.5,3.5-1,7c2.3-.105,2.593-0.832,4-1v1h2v1c1.4,0.874,1.729.72,4,1q0.5,1.5,1,3h3v-3c4.565,0.944,5.951,2.8,12,3,1.315,5.1,3.14,2.509,5,5-1.711,4.531-.755,4.583,1,8l-13,3v1l-2,1v2h-1c-1.6,1.691-.822,1.515-4,2q-0.5-2-1-4l-3-1q-0.5,1-1,2l-6,1v-1h-3v-1c-2.076-1.8-.64-2.016-4-3q-0.5-2.5-1-5l3-1c-1.139-1.139,0-.4-2-1q1-3.5,2-7h-2v-2c-2.762-.723-2.237-0.279-3-3h2q-0.5-2.5-1-5h2C656.7,104.623,658.168,104.148,659,101Z" />
        </a>


        <?php
        $kdwil = '52.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_9" data-name="Color Fill 9" class="cls-2" d="M102,144c2.262,0.234,2.631.118,4,1v1h2v1h4c1.306,0.542-.311.471,1,1q-0.5,1-1,2h1c1.718,2.374,1.816.084,3,4l-2,1-9,3v-1h-1q-0.5,1-1,2H98c-0.875-2.316-1.017-4.407-1-8H96c-1.047-1.886.692-4.172,1-5H96v-1h3v1C99.932,146.234,101.543,144.49,102,144Z" />
        </a>

        <?php
        $kdwil = '52.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_8" data-name="Color Fill 8" class="cls-3" d="M129,124c-0.672,3.893-1.368,4.886-6,5-0.853-1.48-2.217-3.523-4-4-0.326.168-.836,1.854-3,1v-1c-1.532-.839-2.418-0.9-5-1q-0.5,1.5-1,3l-14-1v-1l-6,2v-1H89v-4H88v-1a24.211,24.211,0,0,0,2-2h1v-3h1l1-3c4.489-.543,10.328-0.463,11-7h-1v-3h1c0.819,1.145.684,2.331,3,2v-1h3l3-4h5V99c4.722-3.5.907-2.141,3-6h1l1-2h2l1-3h2c1-3.854,2.252-3.048,5-5l2-3,6-2V77h3V76h2V75l4-1V73h3V72a22.122,22.122,0,0,1,10,0v1l11,1v1h6v1h2v1l3,1c-0.675,2.74-1.673,3.049-3,5h-1c-1.652,3.358.789,10.6-1,14l-2,1q-0.5,2-1,4l-3,2v2l-4,3c-0.518,1.387,1.916,1.523,2,2v1h-1c-0.532,2-.79,4.525,0,5h-2a8.445,8.445,0,0,1-3,2v-1l-4-2v-1h1v-1h-1c-3.722,3.1-5.936-1.868-10,0l-3,4h-3v1a5.908,5.908,0,0,1-5,0q-1,2-2,4ZM95,99v4H92v-1c-0.9-1.87-1,2-1,2-2.927-.684-3.275-1.113-4-4h1V99c3.215,0.77,2.155,1.508,6,2v-1H93C91.111,99.14,95,99,95,99Zm7,1v6H96v-3l4,1a9.747,9.747,0,0,0-1-4h3Z" />
        </a>

        <?php
        $kdwil = '52.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_7" data-name="Color Fill 7" class="cls-4" d="M250,137c-0.437,2.962-.849,5.543-3,7-0.844,1.135.127,0.145-1,1q-0.5-3-1-6C247.739,138.356,247.276,137.691,250,137Zm15,1h3c-0.574,2.01.12,0.865-1,2,0.574,2.01-.12.865,1,2a15.258,15.258,0,0,0,5,5h2l6,7,3,1v-1h1v2l3,1s0.164-2.141,1-1v2c4.235,0.894,6.283,3.585,9,6v1h2l-1,2h1c0.754,0.813.439,1.945,2,2,0.321-.28-0.193-1.76,1-1l2,3,2-1v1h1c1.948,2.221-1.081,1.838,3,3,0.591,2.78,2.324,9.466,0,12v2h-1l-3,4c-1.475.824-4.021-.639-5,1v4h1v-1h3c0.838,2.911,5.558,5.812,5,8l-2,1-1,4h-2c0.476,3.772,1,3.117,3,5v1h2l-1,2h1c1.1,3.09.2,7.291,0,9h-3v1c-2.33,3.02,1.454,5.443,0,10h-1v3h-1q0.5,3.5,1,7l-2,1v3h-1v2h-1v3h-1c-0.756,1.768-.591,4.524,0,5h-3v-1l-3,1v-1l-4-1v-1h1l-1-2a10.6,10.6,0,0,1-4,1c-0.684-2.927-1.113-3.274-4-4v-2l-7-1-1,2-6,1v-2l-4,1v-2l-2,1v-1h-2l1-2c-1.237-.686-0.457.708-1,1-1.659.892-.863-1.368-1-2l-6,1v-1h-2v-1l-5,1v-2h-2q-0.5-1.5-1-3l-2,1v-1c-1.313-.983-1.007-2.145-2-3-1.414-.012.179,0.219-1,1l-3-1a10.818,10.818,0,0,1,0-7h-1v1c-1.421-.636-0.742-1.166-2-2a3.978,3.978,0,0,1,2-2v-1l2,1v-1h-1q0.5-2.5,1-5c2.784,0.549.1,0.77,3,0-1.139-1.139,0-.4-2-1v-2a10.6,10.6,0,0,1-4,1c0.748-2.057,1.028-.95,0-3h2q-0.5-1-1-2h5v-1c-2.118-.805-0.883-0.924-3,0-1.467-1.687.854-.75-1-2a10.6,10.6,0,0,0,1-4h4v-1h1v1h1v-1h-1c0.056-1.413.655,0.371,1-1,0.84-3.34.825-2.177,0-5l3,1c0.231-.082,1.8-3.426,3-3v2h1v-1c2.616-1.722,2.091-2.823,2-7h-1c-0.226-1.4.374,0.268,1-1l-7-5c-0.93-1.88,1.427-3.362,1-4-2.929,1.193-.507.945-3-1q0.5-1,1-2c-1.274-.614-0.347-0.57,1-1v1h1v-1h1v-3h-2q-0.5-4-1-8h-1v1l-2-1v1h-1v-1h-1v-1h1q-0.5-1-1-2c1.346-1.678,1.8,1.069,3-3h2a10.6,10.6,0,0,1-1-4l3-1v-1h-1q1-3,2-6c2.814-1.153,5.5-3.294,8-2v-1h1l-1-2h2v-1h-1v-6h2v2h1v-1h3v-1l2,1v-2Z" />
        </a>

        <?php
        $kdwil = '52.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_11" data-name="Color Fill 11" class="cls-5" d="M539,71v2h-1c-0.188,1.4.709-.384,1,1v4l4,3,1,3h4l3,4h1c1.341,2.7-.438,5.829,1,8h1c1.626,1.939,3.655,2.757,5,5,2.135-1.72.566-2.033,4-3-0.1,2.612-.252,3.426-1,5h1c4.955,4.509,9.9-1.91,10,9-4.509,2.805-.788,3.2-4,6l-2-1v1a17.736,17.736,0,0,0-2,2c-1.368.033-1.627-1.639-4-1v1h-6v-1c-1.739-.338-1.67.917-2,1h-6v-1h1c0.242-1.338-2.178-2.5-3-3v-1l-2,1q-0.5-1-1-2h-2v-1c-1.366-.366-0.108.264-1,1l-3-1v-1h-2q0.5-1,1-2h-2v-1h-2v-1l-2,1v-2l-2,1v-2l-3-2v-1l-2,1-2-3-2,1v-2h-1l-3-4h-2l1-2h-2l1-2h-2l1-2c-0.6-1.279-.477.314-1-1l-2,1-1-2-2,1V87l-2,1V86l-2,1-1-3h-1v1l-2-1-1-2c0.349-.357,1.711.222,1-1h-1l-3-4h-2V76h1l-3-4-13,2c-0.167-.055-0.4-1.8-2-2-0.017.029,0.017,1.983-1,1l-1-3-2,1-1-3c-1.35-1.536-2.445.579-3,0-1.915-2,1.094-1.885-3-3V63h-1v1l-3-1c-1.173-3.926-1.3-1.626-3-4h-1l1-3c1.139-1.139.4,0,1-2,2.087-.346,4.045-1.881,7-1v1a8.02,8.02,0,0,0,6,0l1-2h2l1-2h2l1-2,7-1V46c2.973-1.5,3.578-1.814,8-2,2.4,4.812,2.731,5.215,10,5V48l7-1v1h2v1h3v1c4.029,1.164,5.09-2.961,8-2l2,3h3l1,2,5,1v1l3,1c-0.119,3.94-.973,11.836,1,14C538.139,71.139,537,70.4,539,71ZM454,52h-2V48h1v1h1v3ZM741,75c-3.432.93-4.473,3.176-7,5v1l-10,1c-1.587-2.445-.84-0.634-3-2V79h-2c-1.022-.787-1.444-4.353-2-5h-1c1.873-5.649.6-12.731,5-16h2V57c2.485-2.062,3.19-2.95,8-3v1c0.6,0.021,1.85-.888,4-1,3.444,5.847,7.745,5.878,8,16h-1Q741.5,72.5,741,75Zm-96,61h2c-0.781,3.158-2.671,4.238-4,7h1c1.256-1.909,1.014-1.659,4-2q0.5-2.5,1-5l2,1q0.5-1,1-2h2v-1a8.423,8.423,0,0,1,4-2c3.46,7.84,8.411,3.566,15,3q0.5,2,1,4h3c3.277-6.337,7.3-8.152,17-8q-0.5-2-1-4h-1q0.5-2.5,1-5h-1c-2.175-2.845-3.269-.936-4-6l-4,1c-2.155-.384-5.385-2.405-8-3v3h-3v-2c-1.306-.542.286-0.411-1-1h-3v-1c-1.869-1.321-1.919-1.584-5-2-1.139,1.139,0,.4-2,1,0.384-3.689,1.792-6.413,0-10h-1q-0.5-1.5-1-3l5-2V95h1l1-3,5-1,3-4h2V86c3.135-1.121,7.339,1.533,9,2l9-1v1l11,1v1h2v1l9,1c-0.417,3.446-1.1,4.074-2,7h-1q0.5,1,1,2v6h1v2l4,3v2h1v2c0.84,1.405,1.589-.479,2,3h-1v1h3v3h2v2h-3v1c3.842,2.127,2.618,4.255,1,8h3v1c-1.286.705-2.7,2.843-3,3h-4a9.268,9.268,0,0,1-2,2c1.95,4.417,1.29,3.279,1,9h2q0.5,2,1,4h1v10c3.973,0.976,3.851,1.963,10,2,2.042-3.189,6.035-4.232,10-5v-2c-3.217-.738-3.641-1.357-4-5l5,1c2.055-3.037,1.85-.427,4-2v-1h-1v-4l4-1q-0.5,1-1,2h1c-0.111,1.41.314,0.478-1,1,1.1,1.446.012,0.322,2,1,1.139,1.139,0,.4,2,1q0.5,2.5,1,5h-3v1c1.719,1.127,1.355.633,2,3l-6,1v1h1v2h1v1h-1c-0.6,3.2.625,4.7,1,7h2q-0.5,1.5-1,3h1c1.47,1.21-3.624.985-4,1v1h-1c1.165,1.361,1.824,1.528,4,2-1.139,1.139,0,.4-2,1v1h-3q-1,2.5-2,5l-2-1c-0.945-1.8-1.385-1.574-2-4h-3q0.5,2,1,4l-9-1v-1h-2v-1c-2.181-.728-5.617.494-7,1v1a1.618,1.618,0,0,1-2-1l-9,2v-1c-2.5-2.247-.96-3.836-5-5v-2c-2.808-1.651-3.4-4.03-7-5v-1h-4c-1.048,1.3-2.043,1.489-3,3h-1c-0.442.8,2.039,2.041,1,4h-1c-1.917,2.453-1.748,1.964-6,2-2.446-3.486-1.615-.417-5-2q-0.5-1-1-2h-4v1c-3.266.493-1.252-1.723-5,0v-1a7.742,7.742,0,0,1-2-3l-3,1c-1.356,2.912-3.137,3.8-4,7h-2l-2,3a27.359,27.359,0,0,0-4-1v3l6,1v1h1v3h1c2.1-2.988,3.783-.937,8-2v-1l8,1v-1h1c2.157,0.262,5.246,3.183,9,2v-1h2v-1l10,1c0.463,2.391,1.158,3.145,2,5l3-1v2l3-1q-0.5,1.5-1,3h1q0.5,2,1,4h-1c-1.751,2.079-6.522,4.95-11,4,0,0-.017-1.3-2-1v1h-5v-1h-2v-1c-2.855-.558-2.45,1.855-3,2l-5-1v-2c-0.134-.067-2-2-2-2a1.485,1.485,0,0,0-2,1l-4-1v-2c-3.377-.7-3.852-2.168-7-3v2c-1.318-.556-4.981-2.576-7-2v1h-2v1h-4v1a1.639,1.639,0,0,1-2-1l-9,2v1c-1.917,1.3-1.9,1.537-5,2v2l-6,1v1h-5q-0.5,1-1,2c-4.885,2.966-9.748,5.539-17,6q0.5-6,1-12l2-1q0.5-2.5,1-5h1c0.987-3,.194-6.883,1-9l2,1-2-3c2.131-2.228.749-4.956,2-8h1q0.5-2,1-4l3-2c0.759-1.578-.634-7.442-1-8l-2,1q-0.5-3-1-6c0.507-.626,1.55.3,1-1l-3-2v-8c-1.141-3.3-2.7-4.1-3-9,3.373-1.829,4.1-3.538,4-9-2.1-2.036-2.078-5.744-2-10l2,1v-2l2,1q0.5-2,1-4l3-1v-1h-1c1.727-5.239-.25-3.3-2-7q0.5-1,1-2l-2,1q-0.5-1-1-2l-3-1q-0.5-1.5-1-3c-1.993-.166-0.752,1.563-2,0-2.647-2.351-.623-2.76-2-6h-1V91l-5-4V85h-1l1-3c2.748-1.584,1.8-2.47,6-3v1l5-1,2,3h4v1l11,1c0.8-.677-0.352-1.415,1-1l1,2h4l2,3h2v1h1V88c2.379-.227,2.567.494,4,1l8,12c0.969,2.469.588,9.815,0,13h-1c-0.247,1.392.682-.378,1,1v5h-1q0.5,1,1,2h-1v3h-1v2l-3,2Q645.5,132.5,645,136Zm141-22c-0.488,4.336-1.423,2.641-2,7h-2v-3h-2q-0.5,3-1,6h-1c-1.139,1.139,0,.4-2,1v-3h-2q0.5-1.5,1-3h-1c-0.865-3.192-.331-1.811,0-5l3,1v1h1v-1h3q0.5-1,1-2Zm-24,57q1-3,2-6l2,1q0.5,1.5,1,3h-1C764.834,170.361,764.175,170.528,762,171Z" />
        </a>

        <?php
        $kdwil = '52.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_5" data-name="Color Fill 5" class="cls-6" d="M480,74V72h7v1c3.158,0.781,4.238,2.671,7,4l-1,2,2-1v1h1l-1,2,5,4v1l2-1v2l2-1v2c1.4,0.224-.191-0.237,1-1,1.529,0.429,1.609.869,4,1l1,3h1V90c0.86-1.889,1,2,1,2h1v1h-1c-0.979,1.654,1.44.846,2,1v2h1l-1,2h1v1h1c2.084,2.31.683-1.152,3,1v2l3-1q0.5,1.5,1,3l2-1v1h1q-0.5,1-1,2h1v1l2-1v2l2-1v1h4v1h1v1h-1c-1.889.86,2,1,2,1v1h3q0.5,1.5,1,3a20.614,20.614,0,0,0,4-1v2l3,2v1l2-1v1h2v1l6-1v1h1v-1l6,1v-2l2,1v-2h1v1c1.639,1.011.855-1.467,1-2h2a6.719,6.719,0,0,1,3-3c-1.355-3.739-.613-4.459,0-8l3-1a9.733,9.733,0,0,1,1-4l4,1V99c1.122-1.668,3.317.175,5-1,1.47-1.027.973-4.54,1-7,6.177-1.143,8.367-5.489,14-7v1h1l-1,2h2v1l3,2v3h1l-1,3c1.017,1.324,1.692-1.215,2,1h-1v1l4,3v1l2-1c1.157,1.092-1.233,1.888,1,2,0,0,.071-2.067,1-1v2l2,1v1h2q-0.5,1-1,2h2v1h-1a12.71,12.71,0,0,1,1,5l-2-1q0.5,1,1,2h-2v1l-3,2v2l-2-1v1h-1c0.626,1.65.362,3.127,1,5h1q-0.5,1-1,2h2q-0.5,1-1,2h1c0.769,2.788-1.345,5.944-2,9l-2-1v1h1v1h-1q0.5,1.5,1,3h-1v1h2q-0.5,1-1,2l2,1q-0.5,4-1,8l4,2c0.832,1.667-1,3-1,3-0.287,1.666.948,1.757,1,2q-0.5,1-1,2h1v1l2-1v2h1q-0.5,1.5-1,3h1c0.273,2.6-1.919,1.832,0,3v1h-2q-0.5,1-1,2h-1q0.5,1,1,2h-2q0.5,1,1,2h-1v3h-1c-1.206,2.854-.331,2.091,0,5h-2c0.322,2.38.949,0.56,0,3h-1v1h1v7h-2q0.5,1.5,1,3c-2.784-.549-0.1-0.77-3,0,1.148,3.644-.837,8.2-1,14l-4-1a2.759,2.759,0,0,1-3,1v-1h-2v-1l-5-1q-0.5-1-1-2l-4-3v-2h-1v-4h-1v-1h1v-5h-1q-0.5-1.5-1-3c1.326-.652,7.362-2.955,8-4q0.5-2.5,1-5h1c1.347-1.787,1.643-1.961,2-5-5.633-5.152,1.377-5.186,1-8h-1q-0.5-1.5-1-3h-1v-1h1q-0.5-3-1-6l-5-1v-3c-2.762.723-2.237,0.279-3,3h-1q0.5,1.5,1,3h1v6h4v3l-5,1v2c-3.541-.38-3.036-1.241-6-2-1.049,2.4-1.12,3.212-4,4v2c-2.1-.709-0.9-1.03-3,0v-1h-1q0.5-1,1-2h-1v1l-3-1v1h-4v-1h-4v1h-3v1c-5.507,1.689-13.072-.683-16-2,0.982-3.071.352-2.061,0-6,3.617,0.406,7.49,1.837,11,0q0.5-1,1-2l3-1v3h1c1.34-2.041,1.637-1.878,5-2q-0.5-1.5-1-3h3q0.5-3,1-6h-1q-0.5-2.5-1-5c-4.388-1.464-5.795.026-6-6-2.613-.624-2.846-1.06-4-3-1.331.479,0.31,0.468-1,1h-4v1c-1.139,1.139-.4,0-1,2h-3a18.329,18.329,0,0,0-2-8c-5.006-1.869-9.443-3.545-10-10h-3q-0.5,1.5-1,3c-1.135-.844-0.145.127-1-1-6-5.588.9-9.293-13-9v1l-2-1v1l-12,2c-1.808-3.026-5.672-5.576-9-7h-3l-1-2-4-1-2-3h-2l-1-2h-2l-3-4-5-1v-1l-3-1v-3l-9-8V90h-1l-2-3h-2V86h-2c-1.315-1.051-.041-2.446-1-4h-1l-2-3c-0.669-.529-0.593.738-2-1h-4c0.693-2.787,1.72-2.968,3-5h1c0.576-1.291-.757.109-1-1-0.4-1.822.862-1.561,1-2V65l2-1q0.5-2.5,1-5c2.01,0.574.865-.12,2,1l3-1V58l3-1v1c0.793,0.385,2.981.846,3,2-0.708.732-1.447,0.619,0,2l2-1v2c1.412,0.076-.127-0.145,1-1l4,2-1,2h1v1l2-1v2l2-1,1,2h1v2c1.379,1.567,2.932-.059,3,0,1.244,1.081-1.226,1.788,1,2,0.379-.168.257-1.755,2-1C477.559,72.242,477.023,73.366,480,74Z" />
        </a>

        <?php
        $kdwil = '52.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_4" data-name="Color Fill 4" class="cls-7" d="M409,106c-3.428.871-2.575,2.068-6,3-1.826-2.881-6.155-5.2-10-6,0.3-3.57,1.2-5.967,3-8l2-1,3-10c-2.612-1.382-1.693-1.769-6-2q0.5-4.5,1-9h-1V66l3-1,1-2h2l2-3h4V59h2V58c1.389-.9,1.745-0.7,4-1,2.683,2.7,13.374,3.048,19,2V58l3,1c1.679,2.84,3.451,2.719,4,7l-3,1v1h-3l-4,5h-2v1h-2l-2,3h-1v6l-5,3v4h-1q-0.5,2-1,4h-1l1,3-2,1v2h-1A12.768,12.768,0,0,0,409,106Zm-52,12v2l3-1v1l5,1v1h2v1h3l1,3,3-1,1,2,4-1c0.207-3.614.549-3.971,2-6h1v-3h1c1.477-2.059,1.71-2.382,2-6h2l1,3h18v-1h2v-1l5,1q0.5,3,1,6h-1l-1,4h1l-1,3h1v5c0.014,0.043.618-.094,1,2a9.749,9.749,0,0,1,4,1v-5h-2q-0.5-5.5-1-11l4,1v-1h1v1l5,1,1,3h1v2h1q-0.5,3-1,6h-1c-0.914,3.225,1.348,4.974,1,7h-1l-1,3h2v5h1v-1l10,2v2c3.551-.838,6.362-2.535,11-3v3h-1c-0.8,1.82-1.257.779,0,2,1.052,0.91.379,1.284,3,1v-1l2,1a10.6,10.6,0,0,1,1,4c-4.5,3.122-.438,2.378-1,6h-1v3c1.135,0.844.145-.127,1,1h3c-0.254,3.074-1.09,1.945,0,5h1c0.486,1.669-.961,1.805-1,2v1h1v1h-1l1,3,3,1v1h1v-1c1.935-.108,2,1,2,1l5-1v-2c2.739,0.644,2.276,1.309,5,2l4-5c1.381-.305-0.4.836,1,1h5c0.844,1.135-.127.145,1,1-1.157,4.082-.91,1.064-3,3v1h1c1.129,1.975,1.417,2.338,4,3v-1c1.139-1.139.4,0,1-2a29.362,29.362,0,0,1,7,1l-1,3h6l3-4h1l-1-2c0.661-1.25.475,0.313,1-1a10.6,10.6,0,0,0,4,1c1.259-4.756,4.669-4.223,6-9,2.831-.583,4.772-2.131,7-3h3v-1l6,1v-1l2,1v-1h6v1a24.341,24.341,0,0,1,4-1c0.653,2.963,1.748,2.423,2,3,0.753,1.726-1.152,4.807-1,5l3,1q-0.5,1-1,2h1c2.6-2.3,8.059.216,12-1v-1h3v-1h6v1c2.019,0.314,2-1,2-1h5v1h-1c1.087,2.143,2.643.823,4,2v1h-1v3h-1v1h-4v1h-2v1l-3,1c0.119,2.142,1.019,3.4,1,4h-1v2h-5q-0.5,2-1,4h-2c-1.631,2.415-.816.62-3,2v1h-2c-1.048.817-2.629,5.265-3,7-2.628.727-3.187,1.584-5,3v1c-2.08,1.322-4.3-.061-7,1v1h-2v1c-0.649.439-3.921,2.374-5,2v-1c-4.02-1.126-4.171-3.889-7-6v-1h-4c-4.134,4.752-9.446,1.109-12,3l-5,4c-1.706,2.817,1.509,1.227-2,4v1h-4c-0.732.314-.424,2.272-2,2l-1-2c-2.87-.429-3.407,1.935-4,4l-6,1-1,4-7-1-1-2a20.85,20.85,0,0,1-4,1v-3c-2.717-1.81-1.643-3.413-6-4v1h-2v1l-2,1v2c-0.764,1.021-3.017,1.789-4,3-0.691-.3-3.553-0.754-4-1l-2-3c-3.214-1.5-6.856,1.268-9,1v-1c-3.054-.343-5.22,2.72-7,4v1h-4l-2,3-7,2v2c-3.089.692-2.092,1.562-3,2h-4l-2,3h-2v1l-4-1-1,2h-2v1l-4,1v1h-7v1h-3v1h-2v1l-5,1-1,2c-3.9,1.79-6.189-.677-10,0a1.525,1.525,0,0,1-2,1l-2-3c-1.312-.37-2.574,2.8-3,3h-3c-2.2-3.052-3.807-.717-8-2v-1h-4v-1l-4-1v-1h-3v-1H331l-4,7h-2l-2,3h-1c-0.1.171-.808,3.546-1,4l-18,3-1-3h1v-3l2-1v-2h1l-1-2,2-1v-9h1V227h1c2.093-2.532,2.356-.423,3-5-1.05-1.155-1.7-6.228-2-8l-3-1-1-3,3-2v-2h1q0.5-2.5,1-5l-4-3v-1h-4c-1.309-.535.316-0.481-1-1v-3l6-1,1-3h2c0.241-2.322,2.461-10.974,1-14h-1c-1.349-1.96-2.24-2.286-3-5h-4v-1c-5.7-1.435-6.021-7.293-10-10h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2l-5-6h-2l-1-2c-3.353-2.257-5.745-1.3-7-6l3-1v-1h7l1-2h5c1.41-.843,0-2.712,1-4,1.051-1.353,3.635-.921,6-1v-1c1.4-.226-0.268.374,1,1a7.742,7.742,0,0,1,2,3l2-1v-1h1l-1-3h2v-4c3.45-1.864,5.831-4.916,10-6v-3a29.413,29.413,0,0,0,7-1q-0.5-2.5-1-5h2v-3h2v-2h4l1,2c3.151,0.755,2.666-3.232,5-3v1c2.394,0.7,3.769.931,2,3h3v1c2.424,1.919,3,3.489,7,4,1.165-1.361,1.825-1.528,4-2C345.2,114.793,352.057,117.065,357,118Zm74,4h3v1c1.139,1.139.4,0,1,2h1c0.013,1.363-1.676,1.641-1,4h1v6c-1.135.844-.145-0.127-1,1h-3v2c-2.927-.684-3.274-1.113-4-4h1v-4h2C430.185,127.416,430.86,126.2,431,122Zm20,19,3,1v1l3-1v1h-1v3h-1v1h-4c-1.212-2.128-2.253-2.177-3-5-4.334-1.01-4.22-3.617-4-9h-2c0.56-3.137.974-4.19,4-5v-1c1.4-.226-0.268.374,1,1h1l-1,3h1v2h1v5C449.277,138.626,450.313,138.057,451,141Zm51,25-5,1c0.723-2.762.279-2.237,3-3v-2a12.71,12.71,0,0,0-5-1v-2h1l-2-3c2.01-.574.865,0.12,2-1l5,1v1h1v2l3,2v5h1v2h1c0.337,2.012-.446,1.225-1,2l-1,3h-2v-1l-3,1v-1a11.9,11.9,0,0,0,4-7c-1.135-.844-0.145.127-1-1C501.861,165.139,502.6,164,502,166Zm-5-7h2v-1c-1.135-.844-0.145.127-1-1C496.861,158.139,497.6,157,497,159Z" />
        </a>

        <?php
        $kdwil = '52.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_3" data-name="Color Fill 3" class="cls-8" d="M232,122h-2a24.42,24.42,0,0,1-8,8,17.048,17.048,0,0,0,2,2c1.537,3.915-2.472,5.125-3,7-0.741,2.628,1.8,4.1,2,8l-9,8v4h-1v2h-1v2c-2.38,3.79-6.709,6.981-8,12h-2q0.5,1,1,2l-4,3v5l-2,1v2l-2-1v1h1c-0.834,1.142.121,0.138-1,1-1.065,1.281-1.786,1.03-3,2v1l-3,1c-1.114,1.794.678,3.876-1,5h-4v1h3q0.5,1.5,1,3h-1c-0.431,2.124.438,1.956-1,3v1h1v1h1v-2h2v1l3-1v-2l3-1v4h-2q1,2.5,2,5h1v-3h3q0.5,1.5,1,3c1.135-.844.145,0.127,1-1h1v-1h-1v-1h4a9.749,9.749,0,0,1-1,4l-2-1v1h1v1h-1v3l-2-1c-0.675,1.243.7,0.437,1,1,0.9,1.66-1.371.862-2,1v-1c-1.406.152,0.336,0.535-1,1-3.1,1.077-1.011.862-4,0q0.5,1,1,2h-4q0.5-1,1-2l-2-1q-0.5-2.5-1-5h-1q-0.5,4.5-1,9l-4,1v1H173c0.844-1.135-.127-0.145,1-1q-0.5-1-1-2l3-2v-4h1c0.978-2.2.874-3.871,1-7h3c0.463-2.391,1.158-3.145,2-5l-4-1v1h2c1.78,1.053-2,1-2,1-1.868,2.016-.475.053-3,1-3.686,1.382-3.688.539-7-1v2h1q-0.5,1.5-1,3h-3v-1h-1q-0.5-2.5-1-5c2.61-1.376,4.907-3.123,6-6v-4h1c0.826-1.428.75-1.7,1-4h2c1.094-2.078,1.611-1.771,2-5h-1q0.5-1,1-2h-1c-1.658-2.68-1.894-2.387-2-7l-3-1v-1h-2v-1c-1.132-.128-1.93,2.071-4,1q-0.5-1.5-1-3h-1c0.473-3.23,1.223-5.042,0-9h-1q0.5-11,1-22h1v-7l4-3v-2h1q-0.5-3-1-6c0.459-.859,4.694-1.622,5-2v-1h-1q0.5-3,1-6h-1v-1h1q0.5-1.5,1-3l2-1v-2l2-1v-2l4-3c1.373-2.7.051-9.144,0-13,3.095-1.928,2.362-4.361,7-5v1h8v1h2v1l9,2,1,2h9c3.8,1.287,8.112,5.7,10,9h1c0.221,1.988-1.568.759,0,2v1c2.773,1.754,2.549-1.533,5,2,1.168,1.133,3.436,8.638,2,12l-2,1Q232.5,117.5,232,122Z" />
        </a>

        <?php
        $kdwil = '52.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_2" data-name="Color Fill 2" class="cls-9" d="M172,173q2,6,4,12c-4.861,2.134-7.083,5.887-7,13-3.893.672-4.886,1.368-5,6,1.361,1.165,1.528,1.824,2,4l-3,1q0.5,1.5,1,3h1v3c0.466,0.971,2.553.053,2,3h-1v2h-1c-1.675,4.844,2.849,6.238-3,8v1h-1v-1h-1q-0.5-3-1-6c1.975-1.129,2.338-1.417,3-4-5.136.923-4.281,0.054-9-1v1c1.361,1.165,1.528,1.824,2,4-2.357-.618-2.311-0.944-4-2v-1l-3,1v-1h-4q-0.5-1.5-1-3h-3c-0.776,3-.616,2.63-4,3v-1h-3v3h-2v-3c-4.1.633-3.127,0.22-8,0v2h-5c-0.592-1.131-1.742-1.567-2-2v-2h-1c-0.865-2.344.827-3.784,1-5-0.21-.374-1.442-0.839-2-2a15.035,15.035,0,0,0-2,2h-4v-1l-6,1v-3c-0.378-.919-3.013-0.592-2-4h1v-2l2-1v-2l2-1v-3l3-2v-3l2-1c0.556-1.671-.959-1.8-1-2-0.558-2.673.465-4.553,1-6a10.29,10.29,0,0,0,8,0c-1.479-4.414,1.027-3.913,0-8h-1v-3l4,1v-1h-1c-1.889-.86,2-1,2-1q-0.5-3.5-1-7l-2,1v-4h1c0.226-1.4-.374.268-1-1v-1h3c0.844,1.135-.127.145,1,1v-1h-1c-0.226-1.4.374,0.268,1-1,1.543-1.756,1.815-.974,4-2v-1h5v-1h2v-1a8.285,8.285,0,0,1,4-2c-0.993-3.074-.934-0.955,0-4l2,1c1.025-.369,1.61-4.685,3-2,1.185-.772.087,0.08,1-1h1v-1h-1c-0.025-.1,3.509-6.738,4-9h1c0.3-1.321-2.976-3.947-3-4v-5h1q-0.5-1-1-2c3.012-1.982.506-1.044,2-3l2-1v-1h2c-0.016-1.414-.007.007-1-1,1.163-1.714.625-1.32,3-2,0.606-.552,5.907-1,8,0q0.5,1,1,2c1.1,0.623,3.367-.169,4,1v3h-1c0.066,1.12,2.087,3.646,1,6l-3,2v2h-1v6h-1q-0.5,13-1,26h1v2h1a27.053,27.053,0,0,0-1,5,22.114,22.114,0,0,1,3,3c0.937,0.392,1.9-1.869,4-1C169.388,171.16,169.189,172.331,172,173Z" />
        </a>

        <?php
        $kdwil = '52.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-10" d="M151,116v3l-2-1q0.5,1,1,2h-2q0.5,1,1,2c-0.9.987-2.161,0.835-3,2h1v4l2,1q-0.5,1-1,2h2q-0.5,3-1,6l-2,1v3l-3,1-2,3h-3c-0.677,3.3-1.5,5.518-4,7v1l-2-1v1h-2v1l-5,1q-0.5,1-1,2l-2-1v1l-4,1v2c0.327,0.769,2.2.4,2,2h-1v1c1.413,0.06-.147-0.172,1-1,1.581-1.142.931,2.458,1,3h1v4l-5,2c0.509,1.329,1.7,3.448,1,6h-1q0.5,1,1,2h-1c-1.365,2.512-2.333,3.6-6,4v-2c-1.139,1.139-.4,0-1,2h-1q0.5,3,1,6h-1v3l-2-1v1h1q-0.5,1.5-1,3h-2q-0.5,1.5-1,3h1v1l-3,1q0.5,1,1,2l-3,1v1h1q-0.5,1.5-1,3h2v4H99l-1,3H92l-1-3,6-2c-1.139-1.139,0-.4-2-1v-1c-1.712-.849-3.231.607-4,1v1a2.438,2.438,0,0,1-3-1c-1.374-.337.337,0.538-1,1H84v1c-1.139,1.139-.4,0-1,2h3v1c1.139,1.139.4,0,1,2H85l-1,3-3-1v-2c-1.122-1.415-4.9-3.447-7-4-1.05-4.111-.661-1.031-3-3v-1H70v-2H69c-1.554-1.638-.811-1.65-4-2v2c-2.26-.276-2.618-0.109-4-1v-1H59v-1H55l-1-2-5,1v-2c-2.762-.723-2.237-0.279-3-3H45l1-5H45c-0.784-1.563-.9-2.4-1-5l3-2v-2c0.98-2.1,1.224-1.6,4-2,0.9,1.087-.159.19,1,1v-1h1v5l3,1v3h2v-2l4,3v1l6-1v-1h1v-3l3-1v-1c1.212-.965,1.932-0.735,3-2l3,1s0.622-1.583,2-1v1c2.008,1.315,2.254,2.242,5,3,1.584-2.749,2.47-1.8,3-6h3l-1,4h1v1H89l1,4h1v-1l4,2-1-4,2-1v-2l3-1v-1H94l1-9h1v-3h1c0.352-1.682-.948-1.758-1-2l1-8c6.437,0.049,10.478-1.423,16-2l4-5c-1.8-.945-1.575-1.385-4-2v-3l-6-1v-1h-2v-1c-5.045-1.664-4.009,3.846-8-1H96v-5H95l-1-4c-2.156-2.931-4.189.549-5-6a7.74,7.74,0,0,0,2-3l6-1v1h1l-1,2h1c2.246-3.371,3.93-1.876,7-1h5v-1h-1c0.73-2.422,2.884-2.054,6-2,2.271,2.475,2.182,1.307,6,1v2l2-1c1.617,1.3-1.093,1.882,3,3,0.657-1.4,2.844-5.428,4-6h5c3.3-.4,3.538-2.409,6-1v-1c1.139-1.139.4,0,1-2h3v-1l3,1q0.5-1,1-2h2Z" />
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
                    url: "ambil_ntb_kiri.php",
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