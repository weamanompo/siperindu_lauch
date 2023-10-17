<?php

include '../koneksi.php';
include 'fungsi_kab.php';
include 'legenda_peta.php';
include 'fungsi_modal.php';
include 'capaian_provinsi.php';

$kd_indi = $_POST['indikator'];
$kdwil = $_POST['provinsi'];

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
        Maaf data provinsi belum tersedia, data baru tersedia untuk wilayah kabupaten/kota. Silakan pilih wilyah provinsi untuk melihat data setiap kabupaten/kota.
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
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI SULAWESI TENGAH</h5>
    <div class="container text-center">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                CAPAIAN PROVINSI : <?php capaian_prov($n, $kd_indi); ?><?= $n; ?></span>&nbsp;&nbsp;
                TAHUN : <?= $tahun; ?>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($kd_indi == 4 && $recekpanah != 0) : ?>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
        <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
        &nbsp;&nbsp;PETA &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
    </h5>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI SULAWESI TENGAH</h5>
    <div class="container text-center">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                CAPAIAN PROVINSI : <?php capaian_prov($n, $kd_indi); ?><?= $n; ?>&nbsp;&nbsp;
                TAHUN : <?= $tahun; ?>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
<?php endif; ?>
<?php if ($recekpanah == 0) : ?>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
        PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
    </h5>
    <h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">SETIAP KABUPATEN / KOTA WILAYAH PROVINSI SULAWESI TENGAH</h5>
    <div class="container text-center">
        <div class="row">
            <div class="col">

            </div>
            <div class="col">
                CAPAIAN PROVINSI : <?php capaian_prov($n, $kd_indi); ?><?= $n; ?></span>&nbsp;&nbsp;
                TAHUN : <?= $tahun; ?>
            </div>
            <div class="col">

            </div>
        </div>
    </div>
<?php endif; ?>

<div class="container-fluid mt-3 text-center">
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
                .cls-14,
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

                .cls-14 {

                    filter: url(#filter-13);
                }

                a:hover .cls-14 {
                    fill: #d5d5d5f3;
                }
            </style>
            <filter id="filter" x="313" y="256" width="51" height="56" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="447" y="335" width="172" height="159" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="726" y="362" width="144" height="95" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="298" y="284" width="106" height="166" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="455" y="190" width="206" height="206" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="330" y="85" width="200" height="256" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="694" y="319" width="115" height="77" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="525" y="444" width="237" height="206" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="452" y="9" width="180" height="98" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="361" y="5" width="148" height="113" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="278" y="81" width="108" height="292" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="355" y="313" width="125" height="161" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="575" y="245" width="220" height="150" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="3" in="SourceAlpha" />
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
        <!-- KOTA PALU -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.71' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.71';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_12" data-name="Color Fill 12" class="cls-2" d="M334.52,264.26H338.9v1.46c-2.511,1.645-1.98.923-2.922,4.38l10.226-1.46v2.92c-2.663.425-10.294,3.143-7.3,4.38l-1.461,2.92H338.9c2.029,3.521,5.066,5.648,11.686,4.38v-1.46l2.922,1.46c1.031,2.726,1.45,5.709,1.461,10.22-1.664,1.663-.582,0-1.461,2.92l-2.922-1.46v2.92c-1.781,1.047-.86-1.011-1.461-1.46-4.82-.548-3.54,4.739-7.3,1.46l-1.461,4.38c-3.751-2.7-.076-3.129-4.383-1.46v-2.92c-2.338-1.818-1.205,2.45-1.46,2.92l-4.383-1.46-1.461-7.3c-5.062,1.183-4.991,3.554-5.843-2.92h-1.46v-1.46h1.46c1.7-1.987,2.666-2.231,5.843-2.92v1.46h-1.46c-2.76,1.255,2.921,1.46,2.921,1.46V292a14.24,14.24,0,0,1,5.843,1.46V292h-1.46v-1.46h1.46c0.523-3.226-1.572-6.666-1.46-7.3h1.46v-1.46l-2.921,1.46v-7.3H331.6v-7.3h2.922v-4.38Z" />
        </a>
        <text x="190" y="220" font-size="15" font-family="Verdana"><?= $n1; ?></text>
        <!-- KAB. MOROWALI UTARA -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.12' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.12';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_13" data-name="Color Fill 13" class="cls-3" d="M598.922,343.1v5.84h1.46v1.46h-1.46v1.46l2.921-1.46v2.92l4.382-1.46,1.461,5.84h1.461l-1.461,5.84h-2.921v4.38h2.921l-1.461,13.14,2.922,1.46v2.92h-4.382v1.46c-1.664,1.663-.582,0-1.461,2.92l-13.147,5.84V394.2h-2.922v-1.46h-1.46v2.92h-2.922l-2.922,4.38h-1.46v4.38H577.01l-1.461,5.84h-1.461l-1.461,7.3-11.686,10.22H547.794q-2.192-2.919-4.382-5.84l-4.383-1.46v-2.92l-4.382-1.46c0.261-4.772,2.271-3.106-1.461-5.84V408.8h-1.461v1.46c-2.592.631-2.391-1.314-2.921-1.46l-4.382,1.46-1.461-2.92-5.843-2.92c-1.153,4.715-2.711,5.035-2.922,11.68h5.843q-1.461,5.109-2.921,10.22h2.921v7.3H521.5c1.233-1.657-.185-0.212,1.461-1.46l1.461-4.38h-1.461v-7.3h1.461v1.46h5.843l-1.461,4.38h1.461v2.92h1.46l1.461,4.38c7.307,2.009,3.417,5.241,10.226,7.3l1.461,8.76h-1.461v1.46h1.461v1.46l-7.3,4.38q0.729,4.38,1.46,8.76h-1.46l-1.461,5.84h-1.461v8.76s-0.92.1-1.461,2.92c-2.728,1.031-5.712,1.45-10.225,1.46v-1.46h-5.843V481.8H514.2v-1.46h-7.3v-1.46l-7.3,1.46-8.764-11.68c-3.257-2.113-7.527.369-11.687-1.46l-1.461-2.92h-4.382c-5.116-2-8.2-2.844-16.069-2.92-0.127-7.809-3.2-19.015,0-24.82l4.383-2.92V430.7l2.921-1.46c2.029-2.453,2.416-4.656,2.922-8.76a21.352,21.352,0,0,1-8.765-10.22v-4.38h-1.461q-0.729-2.19-1.46-4.38h1.46v-4.38c1.42-3.226,3.517-6.088,4.383-10.22,6.376,0.023,16.494-.47,20.451-2.92l2.921-4.38h13.147v-1.46h-1.46c0.291-2.483,2.62-2.235,2.921-2.92V372.3c8.212-.9,4.94-3.984,8.765-5.84H521.5l1.461-2.92c3.452-2.215,6.322-2.784,8.764-5.84l4.383,1.46V357.7h-1.461v-1.46h1.461v-1.46h5.843c2.4,3.865,5.286,4.4,11.686,4.38,2.371-3.534,1.318-.884,4.383-2.92q0.729-1.46,1.46-2.92h7.3l2.922-4.38h7.3l1.461-2.92,2.921,1.46v-1.46h1.461c0.8,0.352.161,2.195,2.922,1.46C590.69,346.171,591.293,343.465,598.922,343.1Zm-75.961,70.08H528.8l-1.461,4.38c-2.936-.837-1.264.175-2.921-1.46C522.758,414.437,523.84,416.1,522.961,413.18Z" />
        </a>
        <!-- KAB. BANGGAI LAUT -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.11' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.11';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_11" data-name="Color Fill 11" class="cls-4" d="M797.588,370.84l2.922,14.6c4.491-1.45,1.395-1.364,5.843,0l-1.461,4.38h1.461v4.38h-1.461v2.92c-6.4,1.2-7.953.667-14.608,0-0.368-3.672-.669-12.248-1.461-13.14h2.922v-2.92c-0.508-1.168-3.973-.307-2.922-4.38l2.922-1.46V372.3Zm-33.6,30.66h2.922l7.3-8.76c1.657,1.232.212-.185,1.46,1.46l2.922,1.46c-0.838,2.934.175,1.263-1.461,2.92-1.526,2.194-.831,2.534-4.382,2.92-0.409-.441.28-2.572-1.461-1.46l-1.461,4.38h-1.46c-2.291,2.543-1.669,3.333-5.844,4.38C763.766,405.163,763.183,406.394,763.99,401.5Zm-20.451,2.92c1.568,5.993,2.605,2.129,4.383,4.38l-1.461,4.38h1.461v1.46a11,11,0,0,0-8.765,8.76h-4.383v-1.46l2.922-1.46c0.927-2.327-1.441-2.8-1.461-2.92-0.789-4.733.923-6.8,1.461-10.22C740.327,405.961,740,405.318,743.539,404.42Zm112.481,8.76h2.921c0.141,3.814.368,5,1.461,7.3h-1.461v1.46c-2.886-1.648-3.415-2.069-4.382-5.84C856.222,414.437,855.141,416.1,856.02,413.18Zm-48.206,16.06v-8.76c5.22-1.454,4.253-2.8,7.3-5.84h1.46v1.46h1.461v5.84c-1.5,1.266-2.019,2.518-2.921,4.38-1.484-1.126-1.438-1.794-2.922-2.92,0.8,5.109,1.436,2.7,0,7.3Zm26.294-1.46c4.964,1.284,4.477,2.717,4.382,8.76h1.461l-2.922,4.38h1.461c1.664-1.662,0-.582,2.922-1.46v2.92h4.382l1.461,4.38h-4.382c-4.3-3.858-6.722.275-8.765-7.3h1.461v-4.38h-1.461V438h-2.922c-1.014-.627-4.7-7.64-4.382-10.22a2.39,2.39,0,0,0,1.461-2.92H826.8l-1.461-4.38h2.922v-1.46h1.46v1.46C832.609,422.29,833.287,423.843,834.108,427.78Zm-16.069-5.84,4.383,1.46v2.92l-2.922,1.46v1.46h-1.461v-1.46h-1.461C816.548,426.91,817.875,425.08,818.039,421.94Zm4.383,13.14a14.24,14.24,0,0,1,5.843,1.46l-1.461,4.38h-2.922Q823.152,438,822.422,435.08Z" />
        </a>
        <!-- KAB. SIGI -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.10' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.10';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_10" data-name="Color Fill 10" class="cls-5" d="M324.294,292h5.843v7.3c5.447-.808,4.65-1.265,10.226,0v1.46h1.461V299.3c1.663-1.663.581,0,1.46-2.92h5.843v-1.46c1.9-.645,6.57-1.44,8.765,0v1.46h1.461v8.76h1.461c0.931,2.521.662,3.844,1.46,5.84h4.383v2.92l11.686,1.46a22.9,22.9,0,0,1,1.461,8.76c4.629,0.956,2.926,2.2,4.382,2.92h1.461v-1.46a18.263,18.263,0,0,1,8.765,1.46v4.38l-7.3,1.46-1.461,4.38c-3.443-.158-3.707-0.435-5.843-1.46v1.46a17.163,17.163,0,0,0-4.382,5.84h1.46c3.955,4.642,9.245,5.212,10.226,13.14h-1.461v4.38h-4.382c-2.943,9.035-2.679,1.225-8.765,4.38v1.46c-4.284,3.1-7.376,5.562-8.765,11.68h4.383v1.46h1.46c2.174,3.989-1.946,7.349-1.46,10.22h1.46v7.3h1.461c1.359,3.229,1.384,5.634,1.461,10.22h-5.843c-1.182,1.919-1.029,1.719-2.922,2.92,2.031,3.724,3.771,4.531,4.383,10.22h-4.383v11.68h-7.3V430.7c-2.273-1.266-3.533-1.183-7.3-1.46-1.741,3.23-3.4,4.362-4.382,8.76h-4.382v2.92c-7-1.662-6.229-7.462-5.843-16.06h-1.461c-0.76-1.92,1.02.4,1.461-1.46V413.18h-1.461l1.461-8.76-4.383,1.46-8.764-11.68v-2.92l-4.383-2.92v-5.84l-2.921-1.46c-2.839-3.2-4.062-4.135-4.383-10.22,3.863-3.372,3.267-7,4.383-10.22h1.46v1.46c1.921,0.578,2.1-3.4,5.844,0v-2.92h-2.922V357.7h1.461c-0.261-2.381-2.828-2.633-2.922-2.92q0.73-8.759,1.461-17.52h2.922q0.729-2.19,1.46-4.38c-1.877-.862-0.5-0.831,1.461-1.46v-8.76c0.04-.219,2.257-0.524,1.461-2.92l-2.922-1.46c-0.926-1.846,1.1-.242,1.461-1.46q-2.191-2.919-4.382-5.84h1.461v-1.46H316.99v1.46h-7.3l-1.461-2.92s3.146-.264,1.461-1.46h-2.921v-5.84h7.3q0.729-1.46,1.46-2.92h-1.46c2.086-2.367.462-.944,4.382-1.46v1.46c0.871,0.03,2.7-1.3,5.843-1.46V292Zm35.059,52.56-1.461,7.3c1.658,1.233.213-.185,1.461,1.46,1.657-1.233.212,0.185,1.461-1.46,2.318-1.977,2.537-3.167,2.921-7.3h-4.382Z" />
        </a>
        <!-- KAB. TOJO UNA UNA -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.09' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.09';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_9" data-name="Color Fill 9" class="cls-6" d="M559.48,198.56v8.76a22.917,22.917,0,0,1-8.764,1.46c-1.38-2.63-2.023-2.3-2.922-5.84C552.085,200.446,551.976,198.719,559.48,198.56Zm68.657,13.14v2.92h2.922V219c-4.492-.914-5.058-2.331-10.226-2.92,0.838-3.568,1.53-3.22,2.922-5.84Zm17.53,7.3c-4.611-.967-2.942-2.208-4.383-2.92h-5.843v-1.46h2.922L636.9,211.7h4.382l10.226,5.84V219h-1.461v5.84h-1.461v-1.46h-1.461Q646.4,221.19,645.667,219Zm-23.373,14.6-4.382,1.46-1.461-2.92H614.99v1.46l-4.382-1.46-1.461,2.92c-3.308,1.244-3.972-1.563-5.843-1.46v1.46H596v1.46l-4.382,1.46c1.273,7.752.513,6.79-2.922,13.14-7.128-2.89-10.389-5.676-20.451-5.84-0.818,4.579-1.423,6.117-5.843,7.3-1.664,1.662,0,.582-2.922,1.46,0.73-3.668,3.448-9.841,5.844-11.68l4.382-1.46v-1.46l4.382,1.46-1.461-4.38,7.3,1.46c1.879-3.313,2.379-3.85,7.3-4.38v-2.92h-1.46q0.729-2.19,1.46-4.38c3.892-.171,3.055-2.258,5.843,0v2.92h1.461v-1.46h4.383V226.3l5.843,1.46v1.46c2.247,0.5,1.921-2.518,2.921-2.92h4.383a17.341,17.341,0,0,1,1.46-7.3c1.658,1.233.213-.185,1.461,1.46h1.461v4.38h1.461C620.018,227.652,621.386,229.438,622.294,233.6ZM559.48,297.84l5.844,1.46q0.729,1.459,1.46,2.92l5.843,1.46v1.46c0.619,0.149,7.1-1.409,10.226-1.46,0.2,9.828,4.105,16.537,7.3,23.36L596,325.58l1.461-2.92h1.461v1.46H603.3v1.46a2.286,2.286,0,0,0,2.921-1.46h1.461v2.92c3.556,2.974,7.024,9.583,7.3,16.06-2.828,2.341-3.917,5.32-7.3,7.3v1.46L603.3,350.4l-1.461,2.92h-1.461V350.4h-2.921c0.817-3.475,1.205-.878,0-4.38h1.461c2.235-1.6-5.366-1.442-5.844-1.46v1.46H588.7c-1.934.727,0.6,1.289-1.461,1.46-1.536-1.1.546-1.949-1.46-1.46v1.46c-2.341.6-5.5-1.735-5.844-1.46q-0.731,2.19-1.46,4.38l-10.226,1.46v2.92c-3.122.008-4.6,0.56-5.843-1.46h-1.461c-1.019.744,0.5,4.78-2.921,4.38v-1.46h-1.461v1.46h1.461c2.759,1.255-2.922,1.46-2.922,1.46-4.6,5.042-5.953,2.228-10.225,0h-2.922l-1.461-2.92c-2.468-.751-8.948,3.732-11.686,4.38-0.838,2.934.175,1.263-1.461,2.92-3.458,3.975-5.813,3.823-13.147,4.38h-4.382l-2.922,4.38-7.3,1.46v1.46h1.461c0.33,2.038-.547-0.392-1.461,1.46-1.664,1.662,0,.582-2.921,1.46v2.92c-4.448.02-8.9-.181-11.687,1.46q-0.731,1.46-1.46,2.92H480.6v1.46h-8.765c-1.038-3.913-2.369-4.555-4.382-7.3H465.99v-4.38a36.231,36.231,0,0,1-2.921-14.6l14.607-1.46v1.46c4.969,1.77,5.775,2.5,11.687,2.92,1.258-1.7,3.582-1.746,4.382-2.92,2.915-4.275-2.626-3.784,4.382-5.84,0.71-8.2,5.408-14.669,7.3-21.9h2.922c1.057-4.033.408-3.266,4.382-4.38,1.447-7.907,6.743-14.479,14.608-16.06v-4.38c3.654-1.714,7-3.82,8.765-7.3,1.254-2.48-.495-4.321,1.461-5.84l14.607-4.38v-4.38H555.1c1.341-.578.841-4.163,4.382-2.92v1.46h1.461V292H559.48v5.84Z" />
        </a>
        <!-- KAB. PARIGI MOUTONG -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.08' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.08';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_8" data-name="Color Fill 8" class="cls-7" d="M505.431,102.2c1.523,5.779,3.77,5.084,8.765,7.3v1.46l4.382-1.46v1.46h1.461c1.73,3.011-1.71,5.987-1.461,7.3h1.461v4.38h-1.461c-2-2.051-6.74-3.212-10.225-1.46l-1.461,2.92h-2.921v1.46l-4.383-1.46v1.46c-1.988,1.7-2.232,2.664-2.921,5.84H487.9v1.46h-1.461l-1.461-2.92-4.382-1.46v-1.46l-4.382,1.46v1.46l-13.147,2.92c-4.607-9.468-2.133-2.112-8.765-5.84l-1.461-4.38c-1.517.537-5.522,2.95-8.765,1.46l-2.921-4.38-7.3-1.46V116.8l-21.912,1.46v1.46H409.02l-1.461,2.92h-7.3v1.46l-5.843,1.46-1.461,2.92-4.382,1.46c-1.04,1.366-1.258,5.886-2.922,7.3l-4.382,1.46-2.922,8.76-7.3,5.84v2.92l-2.921,1.46v2.92h-1.461l1.461,5.84L365.2,167.9l-1.461,18.98-8.764,4.38q0.729,5.109,1.46,10.22l-4.382,2.92V219l2.922,1.46q0.729,5.84,1.46,11.68h1.461l1.461,5.84h1.461l-1.461,4.38h-1.461v14.6h1.461l1.461,11.68,2.921,1.46v2.92H365.2v2.92h1.461l1.461,4.38c3.567,0.968,4.48,1.4,5.843,4.38v2.92c1.4,1.985,3.756.017,5.843,1.46l10.225,14.6c1.33-.554,4.726-0.9,5.843-1.46l1.461-2.92h7.3l1.461,4.38c2.361,5.561,3.354.711,7.3,2.92v1.46l4.382,2.92v4.38h1.461c2.044,2.7,3.322,3.426,4.382,7.3a32.921,32.921,0,0,0-11.686,2.92v1.46h-8.765v1.46h-4.382v1.46l-4.382,1.46V328.5c1.663-1.663.582,0,1.46-2.92H391.49v-1.46a4.2,4.2,0,0,0-4.382,1.46l-7.3-1.46v-7.3c-2.885-1.044-8.777-1.432-11.686-2.92l-1.461-2.92c-0.957-.5-4.607-0.934-5.843-1.46l-1.461-10.22c1.663-1.663.582,0,1.461-2.92l-5.843-1.46c0.571-3.085,2.883-7.142,1.46-11.68h-1.46v-4.38H353.51l1.461-4.38H353.51c-0.355-2.752,1.461-2.92,1.461-2.92l-2.922-14.6-4.382-2.92-1.461-4.38h-1.461q-1.461-9.489-2.921-18.98h-1.461l1.461-10.22c-0.249-1.83-2.834-5.121-1.461-8.76l2.921-1.46c1.079-3.819-5.59-8.032-4.382-11.68l4.382-2.92v-2.92h1.461l-1.461-7.3c0.378-2.264,2.776-5.83,2.922-13.14,4.148-2.452,3.972-5.038,10.225-5.84V160.6c4-.941,3.326-1.911,7.3-2.92-0.376-5.1-.727-7.2-2.921-10.22L357.892,146v-1.46h1.461l1.461-10.22h1.46v-1.46h4.383v-7.3l4.382-1.46c0.143-7.783,2.063-6.807,2.922-13.14h2.921q-0.731-2.19-1.46-4.38c5.875-.535,11.524-2.451,14.607-5.84V97.82l4.383,1.46V97.82L406.1,99.28l1.461,2.92H413.4v-1.46a32.976,32.976,0,0,0,5.843,1.46v4.38l11.686,1.46,1.461-2.92h2.922c0.941-4,1.912-3.323,2.921-7.3a15.2,15.2,0,0,0,11.687,0V96.36l4.382,1.46V96.36h2.921c1.781-.923-0.241-3.192,4.383-2.92V94.9l2.921-1.46,1.461,2.92a3.688,3.688,0,0,0,4.383-1.46l2.921,1.46,1.461-2.92,21.912,2.92v1.46C500.312,100.4,499.661,101.4,505.431,102.2Z" />
        </a>
        <!-- KAB. BANGGAI KEPULAUAN -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.07' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.07';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_7" data-name="Color Fill 7" class="cls-8" d="M749.382,327.04c5.2,1.241,8.2,5.823,8.765,11.68-1.663,1.663-.582,0-1.461,2.92l-4.382-1.46v2.92h1.461l-1.461,5.84h1.461v2.92h1.46c1.669,2.258,2.049,2.524,2.922,5.84h2.922l2.921-4.38h1.461l-1.461-4.38,4.383-2.92c3.729-4.269,3.678-8.5,10.225-10.22,1,4.273,1.626,4.781,5.843,5.84v-2.92c4.734,0.919,2.756,2.082,4.382,2.92,6.731,3.468,9.84-2.312,10.226,8.76l-2.922,1.46q-0.729,6.57-1.46,13.14l-7.3,1.46v1.46h1.46q-0.729,2.19-1.46,4.38H781.52v1.46h-1.461V372.3c-2.335-1.065-3.486-1.223-7.3-1.46l1.461-2.92h-1.461c-1.881-3.48-2.172-2.007-2.922-7.3H763.99v2.92h-2.921l-1.461,13.14h-1.461c-0.059.493,1.329,3.3,1.461,5.84-5.476,1.167-5.7,3.57-11.686,4.38-2.883-4.381-4.128-1.374-5.844-7.3H745c2.59-3.893,5.829-3.36,7.3-8.76h-1.461v-7.3h-1.461v-1.46h1.461v-1.46h-1.461l1.461-4.38-2.921-1.46v-5.84h1.46q-0.731-2.19-1.46-4.38a15.472,15.472,0,0,1-5.844,1.46c-0.816,7.461-3.127,4.74-5.843,8.76l-1.461,5.84-2.921,1.46v7.3h-1.461l-2.921,4.38h-2.922l-7.3,10.22h-4.382a13.194,13.194,0,0,0-2.922-2.92v-7.3c-0.448-.993-1.864-0.115-2.921-4.38-6.442-1.734-4.756-6.907-4.383-14.6H704.1l1.461-8.76h1.461V343.1l5.843-2.92c3.863-5.1-.421-7.61,8.764-8.76a8.986,8.986,0,0,0,4.383,4.38v-1.46c5.333-2.423,8.866-4.487,16.068-5.84a14.427,14.427,0,0,0,5.844,5.84v-2.92h1.46v-4.38Zm20.451,4.38q-0.731,4.38-1.46,8.76h-2.922l-1.461-7.3c1.658-1.233.213,0.185,1.461-1.46h4.382Z" />
        </a>
        <!-- KAB. MOROWALI -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.06' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.06';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_6" data-name="Color Fill 6" class="cls-9" d="M546.333,452.6v2.92c3.081,0.039,17.553,1.6,18.991,2.92h2.921l1.461,4.38h1.461l5.843,7.3h4.382c2.218,12.812,12.323,19.283,17.53,29.2,3.867,7.366.88,11.519,8.764,16.06-1.771,3.107-3.29,3.178-4.382,7.3l7.3,4.38v2.92h1.461l1.46,2.92h7.3v1.46c2.376,1.608,2.459,2.019,5.843,2.92v7.3c1.658,1.232.213-.185,1.461,1.46,5.917-1.133,7.238-1.107,13.147,0a15.451,15.451,0,0,1,1.461,5.84l-7.3,8.76H633.98c-0.986,1.814.874,0.906,1.461,1.46,2.692,4.7,8.548,6.185,11.686,10.22l1.461,4.38h4.383c0.719-.624,1.827-2.706,4.382-1.46v1.46c1.663,1.663.582,0,1.461,2.92H663.2v2.92h-5.843V584h-1.461l1.461,7.3-4.382-1.46a2.15,2.15,0,0,1-2.922,1.46v-1.46c-2.145-1.148-2.469-1.032-5.843-1.46-1.057,4.033-.408,3.266-4.383,4.38l1.461-4.38a2.148,2.148,0,0,1-1.461-2.92h1.461c1.149-2.144,1.033-2.467,1.461-5.84a14.68,14.68,0,0,1-2.922-2.92h-8.764v-1.46l-5.843-4.38v-7.3c-1.508-2.375-4.832-.326-7.3-1.46v-1.46H614.99c-4.731-3.581,2.9-5.715-7.3-7.3v1.46l-4.382-1.46v1.46h-2.922v1.46h-5.843v1.46l-7.3-1.46V554.8c-3.262-1.1-3.97,1.208-5.843,1.46l-1.461-2.92H577.01v-1.46h-2.922v-1.46l-8.764-1.46V547.5h-1.461v-4.38H562.4l-1.461-4.38c3.036-1.6,2.587-2.352,7.3-2.92,0.259-3.7.056-5.128,1.461-7.3h1.461V525.6h1.46v-4.38l4.383-2.92c0.753-2.816-.875-1.979-1.461-2.92v-2.92l-7.3-5.84V503.7h-1.461q-0.731-1.459-1.46-2.92h-7.3V496.4h-1.461v-1.46H546.333l-1.46-2.92h-2.922v-1.46a18.883,18.883,0,0,0-8.765-4.38l2.922-16.06h1.461V467.2h1.46c1.216-3.406-.665-7.123-1.46-8.76h1.46C540.783,455.252,542.249,453.63,546.333,452.6ZM749.382,629.26c0.749,3.511,1.885,4.492,2.922,7.3h-1.461v1.46H745v2.92a15.7,15.7,0,0,1-10.226-7.3l4.383-1.46v-1.46Z" />
        </a>
        <!-- KAB. BUOL -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.05' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.05';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_5" data-name="Color Fill 5" class="cls-10" d="M531.725,17.52c4.675,1.205,4.24,1.721,4.383,7.3l-7.3,1.46v1.46c6.059,4.33.507,2.046,1.461,7.3h1.46v2.92c6.6,4.042,10.228,11.09,20.451,11.68,2.131,0.123,5.935-1.16,5.844,1.46h1.46V48.18c4.729,0.481,4.292,1.325,7.3,2.92V46.72h1.461l1.461,2.92,4.382-1.46V46.72l20.451-1.46v2.92c3.969,2.642,2.4,4.983,8.765,5.84,2.955-4.511,1.574-.832,5.843-2.92l1.461-2.92c1.915-.592,6.565,2.295,11.686,2.92v2.92c-3.385.359-3.716,0.313-5.843,1.46v1.46c-2.314.9-2.825-1.445-2.922-1.46l-4.382,1.46c-2.711,4.6-7.194,5.87-8.765,11.68h-2.921L596,65.7l-4.382-1.46c-3.657-4.336-.125-4.8-8.765-5.84-2.453,4.05-4.257,3.7-8.765,5.84V65.7h-5.843v1.46h-2.921v1.46l-8.765,1.46v1.46h-2.922V73c-2.64.939-6.595,0.149-7.3-1.46h-1.46l-1.461,4.38c-3.541,2.022-14.753.092-21.912,0v7.3l-16.069-1.46c-1.771,3.106-3.29,3.178-4.382,7.3h-1.461l1.461,2.92h-1.461v4.38l-8.764,1.46V94.9h-1.461v1.46c-0.8.183-7.232-2.763-8.765,0V93.44h-2.922q-0.729,1.46-1.46,2.92h-1.461V94.9l-11.686,1.46V94.9c-2.511-1.645-1.98-.924-2.922-4.38h1.461V89.06h-1.461c1.935-2.654,3.507-.96,1.461-4.38h2.921l2.922-4.38h1.461V77.38l2.921,1.46V75.92c1.934-.728-0.566,1.063,1.461,1.46l4.382-1.46V74.46h-1.46V73h1.46V67.16h1.461V65.7l-1.461-4.38h1.461l1.461-5.84h-2.922c-1.131-1.728.886-1.311,1.461-1.46,2.643-4.529,7.491-6.034,10.226-10.22-1.557-1.05-3.617-1.126-2.922-4.38H487.9V36.5h1.461L487.9,33.58h1.461V32.12h1.461v1.46l2.921-1.46c1.38-2.63,2.023-2.3,2.922-5.84l5.843-1.46v1.46c2.088,0.734,6.976,2.531,10.225,1.46V26.28h2.922V24.82c3.509-1.183,5.459,1.224,7.3,1.46V24.82l5.843-1.46C530.184,20.73,530.827,21.061,531.725,17.52Z" />
        </a>
        <!-- KAB. TOLI TOLI -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.04' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.04';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_4" data-name="Color Fill 4" class="cls-11" d="M468.912,13.14A43.873,43.873,0,0,1,480.6,16.06v1.46h2.922v1.46c2.5,0.712,2.543-1.373,2.921-1.46,4.812-1.107,10.05,3.3,11.686,5.84h1.461v1.46h-1.461c-1.664,1.662,0,.582-2.921,1.46-1.273,5-3.021,3.759-4.382,8.76H487.9V36.5h1.461c0.71,2.551-2.417.419-2.922,2.92,0.687,1.179,4.3,1.038,2.922,4.38l-7.3,4.38v1.46h1.461l-1.461,2.92H480.6V51.1l-2.922,1.46c1.883,2.668.81-.692,2.922,1.46,0.351,2.035-.377-0.3-1.461,1.46v1.46H480.6l-1.461,8.76h-1.461c0.1,1.416,3.051,3.151,1.461,5.84h-1.461c-1.237,4.656-3.907,6.457-7.3,8.76l-2.922-1.46-2.922,4.38h-1.46q0.729,1.46,1.46,2.92h-2.921l1.461,2.92h-2.922l1.461,2.92h-2.922v1.46c-2.09,2.022-1.992.7-2.921,4.38l-2.922-1.46v1.46c-3.957,1.529-9.477,2.168-13.147,0-1.64,1.808.872,3.322-2.922,4.38-1.908-.789.536-0.928-1.46-1.46,0.079,2.063,1.107-.574,1.46,1.46,2.76,1.255-2.921,1.46-2.921,1.46v2.92l-2.922-1.46,1.461,2.92H428.01c-2.247-1.726-3.181-.5-8.765,0V102.2c-6.408,2.214-9.354-.942-16.069-2.92V97.82a23.1,23.1,0,0,1-5.843,1.46V96.36c-1.663,1.663-.582.005-1.461,2.92-4.519.359-4.632,1.075-7.3,2.92v1.46l-2.922-1.46v2.92l-2.922-1.46v2.92h-5.843a18.529,18.529,0,0,1-1.46-7.3h1.46V94.9c-2.037-1.026-1.807-2.118-2.921-2.92-3.722-2.68-2.743,1.593-4.383-4.38h5.844c2.882-4.381,4.127-1.374,5.843-7.3,2.879-3.712-1.957-6.843,0-13.14h1.46c0.929-2.6.65-3.8,1.461-5.84l8.765-2.92v1.46c4.842,5.5-2.055,11.556,0,16.06h1.461c2.989,4.172,4.188,1.594,5.843,7.3l11.686,1.46V83.22h7.3l1.461,4.38,4.382,1.46V87.6h1.461l-1.461-4.38c0.593-1.446,3.434.1,2.922-4.38a2.358,2.358,0,0,1-1.461-2.92c1.024-3.923,3.87-6.194,4.382-11.68,5.905-.43,7.247-3.926,11.687-1.46V61.32c3.913-3.336,3.28-6.455,10.225-7.3L451.382,43.8h-1.46q0.729-3.65,1.46-7.3H454.3c0.721-4.814,1.191-6.617,0-13.14h-1.461c-0.05-.386,1.331-3.376,1.461-5.84C463.322,17.918,467,20.439,468.912,13.14Zm-67.2,42.34h-2.922c-0.14-3.814-.368-5-1.461-7.3h1.461V46.72c2.936,0.837,1.264-.175,2.922,1.46h1.46Q402.447,51.83,401.716,55.48Z" />
        </a>
        <!-- KAB. DONGGALA -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.03' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.03';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_3" data-name="Color Fill 3" class="cls-12" d="M369.578,89.06v2.92l2.922-1.46v2.92l2.922-1.46c1.968,2.239,1.593,7.39,1.46,11.68h-1.46v7.3h-1.461c-2.234,4.677-2.886,5.961-2.922,13.14h-2.921c-1.182,1.919-1.029,1.719-2.922,2.92l1.461,5.84h-4.383v1.46c-3.043,2.732.138,1.206-1.46,4.38l-2.922,1.46,1.461,4.38h-1.461v2.92h1.461c1.664,1.662,0,.582,2.921,1.46l1.461,7.3-7.3,4.38v4.38l-10.225,5.84v4.38h-1.461v1.46h1.461v1.46h-1.461v2.92h-1.461v8.76h1.461l-1.461,5.84h-2.921l-1.461,5.84h1.461c0.824,2.287,2.427,6.706,1.461,10.22h-1.461v4.38H338.9c-0.433,2.281,2.536,1.888,2.922,2.92l-1.461,11.68s1.72,0.264,1.461,2.92a2.422,2.422,0,0,0-1.461,2.92h1.461v2.92h1.46v8.76h1.461v2.92l7.3,5.84v5.84h1.461v4.38h1.461l-1.461,7.3h1.461v1.46H353.51l1.461,7.3H353.51v-1.46l-8.765,1.46v-1.46l-7.3-1.46a14.211,14.211,0,0,0-1.461-5.84H338.9v-1.46l7.3-1.46v-2.92c-3.618.647-5.362,1.342-10.226,1.46v-2.92c3.57-.838,3.223-1.529,5.844-2.92V262.8H335.98l-4.382,7.3c-1.657-1.233-.212.185-1.461-1.46-3.873-3.492-.8-4.2-2.921-8.76l-2.922-1.46v-8.76h-1.461v-2.92h-1.46v-8.76h-1.461v-1.46h1.461l-1.461-8.76h1.461v-4.38h1.46v-5.84h1.461v-2.92h1.461l1.461-7.3h1.46q-0.729-2.19-1.46-4.38h-1.461c-0.243-2.05,1.311.6,1.461-1.46l-1.461-5.84,4.382,1.46v-1.46c2.417-2.029,3.41-5.291,5.843-7.3,0.173-5.259,1.124-14.7-1.46-17.52-1.259-4.568-2.866-4.746-5.844-7.3v-1.46h-2.921l-1.461-2.92h-1.461v-4.38a18.551,18.551,0,0,1,7.3-1.46v1.46c1.26,0.781,5.832.694,7.3,1.46v-1.46H338.9v-5.84c-2.908-2.417-4.378-6.365-7.3-8.76q2.192-2.919,4.382-5.84h1.461c3.329-7.179-5.817-4.276,1.461-10.22v-1.46h10.225c3.327-1.128,5.878-4.224,8.765-5.84a60.941,60.941,0,0,1-4.382-18.98c3.073-2.086,4.218-5.084,7.3-7.3V89.06h8.764Zm-59.892,91.98c6.133,1.057,8.588,2.923,8.765,10.22l4.382,1.46a14.227,14.227,0,0,0,1.461,5.84h-2.921v1.46h-7.3c-2.195-3.389-4.378-2.422-5.844-4.38q-0.729-2.92-1.46-5.84H305.3a11.826,11.826,0,0,1-2.922-5.84h7.3v-2.92Zm11.687,105.12v11.68c-3.954-.987-4.861-1.809-8.765,1.46l-1.461,2.92-2.922-1.46v1.46h-1.46c1.036,3.064,1.5,1.322,0,4.38h1.46c2.074,3.156,3.456,2.935,8.765,2.92v-1.46h4.383l-1.461,2.92h1.461c1.664,1.662,0,.582,2.921,1.46v2.92h1.461l-1.461,2.92,2.922,1.46-1.461,7.3h-1.461l1.461,4.38h-2.922c-0.386,3.369-.286,3.724-1.46,5.84h-1.461v1.46h1.461v1.46h-1.461V350.4a3.569,3.569,0,0,0-1.461,4.38h1.461c1.134,2.148,1.05,2.459,1.461,5.84-1.658,1.233-.213-0.185-1.461,1.46-6.4-1.907-2.761.459-10.226,1.46-2.223-4.107-3.828-5.612-10.225-5.84-2.07,3.664-3,4.184-8.765,4.38-1.057-4.033-.408-3.266-4.382-4.38v-8.76h1.46v-1.46h4.383v-1.46h-5.843v-1.46c5.965-3.461,8.959-10.863,11.686-17.52h4.382v-4.38h-2.921L298,309.52h-2.922l1.461-4.38h-1.461v-7.3h1.461v-4.38H298l-1.461-4.38h4.383l4.382-7.3,2.921,1.46v-2.92l2.922-1.46c3.057-6.491-6.358-7.32,4.382-10.22l1.461-4.38,2.922,1.46c2.338,5.929,5.071,11.73,5.843,18.98Z" />
        </a>
        <!-- KAB. POSO -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.02' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.02';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_2" data-name="Color Fill 2" class="cls-13" d="M457.225,359.16h5.844q0.729,8.758,1.46,17.52h1.461c2.232,4.464,3.548,4.615,4.383,10.22h-8.765c-1.172,5.163-6.88,13.939-4.383,17.52,1.373,6.952,5.683,10.228,7.3,16.06h2.922a17.846,17.846,0,0,1-4.382,10.22l-2.922,1.46v2.92l-2.922,1.46v2.92h-1.46q0.731,10.949,1.46,21.9c-4.74.655-6.337,4.634-11.686,2.92v-1.46h-2.921v-1.46l-5.844-1.46v-1.46l-4.382-1.46-1.461-2.92H428.01l-2.922-4.38h-1.461v-2.92l-4.382-2.92c-3.8-3.906-8.8-11.509-10.225-17.52-4.275-1-4.784-1.625-5.844-5.84h-2.921l-4.383,18.98a15.461,15.461,0,0,1-5.843,1.46c-5.155-5.5-18.021-.57-23.372-5.84-3.37-2.886-3.088-8.134-2.922-14.6h5.843c-1.068-5.292-3.63-6.432-5.843-10.22l4.383-1.46v-1.46H372.5c-0.1-4.585-.092-6.992-1.461-10.22h-1.461v-7.3h-1.46c-0.417-2.442,1.379-2.551,1.46-2.92v-7.3h-1.46v-1.46h-4.383v-1.46H365.2V372.3c5.552-1.52,3.293-2.831,7.3-5.84V365h7.3v-1.46c1.663-1.663.582,0,1.461-2.92h4.382l1.461-8.76c-2.269-1.26-10.363-8.147-11.686-10.22h2.921l1.461-4.38h5.843V335.8c1.663-1.663.582,0,1.461-2.92,7.03-1.361,11.707-5.372,17.529-7.3H413.4v-1.46h4.382v-1.46l5.843-1.46v1.46c2.9,2.851,3.007,6.294,1.461,10.22h-1.461v7.3l8.765,7.3v7.3l2.922,1.46q0.73,2.19,1.46,4.38l4.383-2.92v-1.46h4.382c4.166-1.787,4.461-3.648,10.226-4.38A18.529,18.529,0,0,1,457.225,359.16Zm-39.441,48.18c0.041,5.045,3.315,9.8,0,13.14v1.46l4.383,2.92c2.793,4.775-2.246,5.223,5.843,7.3l1.461,8.76h1.46c1.127,1.483,1.8,1.437,2.922,2.92,2.936-.837,1.264.175,2.921-1.46,2.789-1.834,2.424-1.48,2.922-5.84h-1.461l-1.461-8.76h-1.46v-7.3l-2.922-1.46v-4.38h-1.461V404.42h-1.46C427.159,407.915,423.7,407.52,417.784,407.34Z" />
        </a>
        <!-- KAB. BANGGAI -->
        <?php $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '72.01' AND kd_indi_pilar ='$kd_indi' ");
        $n1 = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        $n = $n1;
        $kdwil = '72.01';
        $nama = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
        $aseng1 =  mysqli_fetch_assoc($nama)['nama'];
        ?>
        <?php modal($n, $kd_indi, $kdwil); ?>
        <?php warnakab($n, $kd_indi); ?> id="Color_Fill_1" data-name="Color Fill 1" class="cls-14" d="M778.6,262.8c-0.838,2.934.175,1.263-1.461,2.92,1.76,6.819,4.139,3.865,7.3,7.3l-1.461,2.92h1.461l1.461,4.38h-1.461c-1.837,2.408,0,7.3,0,7.3L778.6,292v4.38h-1.461a4.072,4.072,0,0,0,1.461,4.38c0.262,1.687-3.659,11.225-4.382,11.68h-2.922v1.46H761.069l-1.461-5.84h-4.383c-2.064-3.657-4.843-5.494-8.764-7.3l1.461-7.3L745,292v-2.92l-4.382-1.46v1.46L736.235,292v2.92l-4.382-1.46,1.461,2.92-5.843-1.46v1.46h-5.844v1.46h-4.382v1.46c-3.391,1.014-4-1.736-5.843-1.46v1.46l-8.765,1.46c0.093,8.332-1.525,9.183-2.921,14.6h-2.922c-1.6,3.6-3.416,5.841-4.382,10.22h-5.843v2.92l-4.383,1.46v1.46h1.461c0.081,2.475-3.386,2.39,0,4.38v1.46h-1.461v1.46c-1.751,1.247-6.716.45-8.764,2.92,2.124,6.012.8,3.618-2.922,7.3l-1.461,2.92-4.382,1.46v4.38l-4.383,1.46q-0.729,1.459-1.46,2.92h-2.922c-1.2,5.577-3.484,7.405-7.3,10.22v1.46l-8.765,1.46L636.9,379.6H633.98l-2.921,4.38h-2.922v1.46l-4.382-1.46c-3,.4-8.129,1.53-13.147,1.46a19.413,19.413,0,0,0-4.383-5.84c0.529-2.7,3.185-7.606,1.461-11.68l-2.921-1.46v-2.92l4.382-1.46-1.461-10.22h1.461c3.171-6.838,5.444-5.991,5.843-16.06-4.058-2.555-6.263-7.594-7.3-13.14-1.663,1.663-.582,0-1.461,2.92-4.492-.914-5.057-2.331-10.225-2.92-1.835,2.787-1.481,2.422-5.843,2.92-2-4.236-8.965-16.268-5.843-20.44v-1.46l13.147,2.92c2.142-3.969,4.5-6.673,10.225-7.3v1.46l8.765,1.46v-1.46c6.649-3.878,1.78-3.51,4.382-10.22l2.922-1.46-1.461-4.38,5.843-1.46v-1.46h14.608v-1.46h14.608l1.461-2.92,8.764,1.46v1.46l14.608-1.46v1.46l13.147,4.38v-1.46h2.922l1.461-2.92h7.3c2.034-.358-0.541-0.949,1.46-1.46a2.353,2.353,0,0,1,2.922,1.46l13.147-4.38c-1.657-1.233-.212.185-1.461-1.46l-5.843,1.46v-1.46h-2.921l-1.461-2.92-14.608-1.46-1.461-4.38c3.758-.226,5.065-0.173,7.3-1.46V262.8h5.843v-1.46l4.383,1.46v-1.46h4.382v-1.46h1.461l1.46,2.92h2.922v-2.92l8.765-1.46,2.921-4.38c3.493-1.557,7.17,1.564,8.765,1.46v-1.46c2.646-.147,2.922,1.46,2.922,1.46l8.764-1.46v1.46h7.3l1.461,2.92h4.382v1.46h2.922v1.46C774.779,262.657,775.307,262.356,778.6,262.8Z" />
        </a>
        <!-- sumber -->
        <text x="20" y="630" font-size="17" font-family="Verdana">Sumber : <?= $sumber; ?></text>
        <?php legend($kd_indi); ?>
    </svg>

</div>

<input type="text" id="tahun" value="<?= $tahun; ?>" hidden ?>
<!-- <input type="text" id="provinsi" value="<?= $kdwi; ?>" hidden ?>
<input type="text" id="indikator" value="<?= $kd_indi; ?>" hidden ?> -->
<script>
    function edit_user(id) {
        $('#isi_edituser').load('view_peta_prov.php?id=' + id);
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
                url: "ambil_sulteng_kiri.php",
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