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
            </style>
            <filter id="filter" x="637" y="369" width="100" height="84" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="557" y="202" width="127" height="75" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="409" y="101" width="167" height="528" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="689" y="386" width="138" height="136" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="538" y="302" width="146" height="114" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="305" y="19" width="169" height="178" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="473" y="100" width="118" height="134" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="571" y="245" width="79" height="67" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="526" y="245" width="85" height="79" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="534" y="288" width="37" height="50" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_12" data-name="Color Fill 12" class="cls-1" width="1043" height="657" />
        <?php
        $kdwil = '17.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_10" data-name="Color Fill 10" class="cls-2" d="M690,380v3l-2,1c-0.6,2.554,1.427,1.927,2,3v2h1v3h2v1l3-1v-1h2v-1l7,1q0.5-1,1-2h4v-1l6,1v1c1.748,0.14,6.706-2.144,10-1v1l4,1a10.6,10.6,0,0,1,1,4h-1v3H720q-0.5,1-1,2l-4,1q0.5,6.5,1,13h-1v3l-6,1a8.724,8.724,0,0,1-2,4h-1q-0.5,3-1,6l-3,2-3,4h-1q-0.5,2-1,4l-2,1v2h-1v6c-6.253-.275-4.253-2.235-8-4l-5-1q-0.5-1-1-2h-4c-4.282-1.594-10.631-3.169-15-5-1.911-5.516-3.062-11.516-9-13v-2c-3.722-1.526-7.948-4.719-10-8h1v-2c3.432-.553,5.508-1.474,7-4,1.7-1.681,2.739-6.857,3-10,2.393-.607,1.858-0.318,3-2h1v-8h1v-4l2-1c0.355-.7.643-3.143,1-4,1.479,0.27,5.734,2.046,8,1l2-3c2.224-1.015,4.02,1.206,5,1v-1l5-1v1h3v1C686.107,377.638,687,379.205,690,380Z" />
        </a>
        <?php
        $kdwil = '17.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_9" data-name="Color Fill 9" class="cls-3" d="M587,207v2l2-1q0.5,1.5,1,3l2-1,2,3h2q0.5,1,1,2h1l4,5,3-1c1.382,0.3-.4.8,1,1,0,0,.119-2.106,1-1v2c2.739,0.644,2.276,1.309,5,2,0.747-1.35,1.391-1.2,2-2v-2l2,1v-2a1.8,1.8,0,0,1,3,0v-2l11,1v-1h1v-4l2,1v-1h-1c-3.162-.027,3-1,3-1v-1h1v1h4q-0.5,1-1,2h1v1h1v1h-1c0.264,2.848,1.867,3.015,3,5l3-1q0.5,1,1,2c5.043,2.07,7.412-1.606,11,2h-1v4c1.413-.054-0.393-0.758,1-1,0.859-1.889,1,2,1,2h3v-2a12.71,12.71,0,0,0,5,1v-2h9v1h-1c0.6,1.225,1.841,1.4,3,2-0.559,1.512-1.68,4.194-1,7h1v1h-1q0.5,1,1,2h-1v1h1v1h-1v5q0.5,1,1,2h-1v2h-1q0.5,2.5,1,5h-2v2a29.413,29.413,0,0,0-7,1c-0.611,1.808-1.96,5.222,0,7h-2l-2,3c-1.823,1.358-1.553-.524-3,2h1v1h-3v1h-1v-1h-1c-0.941-1.605.517-2.585,1-3v-1h-2q0.5-1,1-2h-2c-2.125-2.118.7-1.328,0-3-0.545-1.305-.517.329-1-1l-2,1v-1h-1v-1h1c0.979-1.654-1.44-.846-2-1v-1l-3,1v-2l-2,1v-2l-9,3v1l-5-1v1c-1.317.531-5.741,1.8-8,1v-1h-2v-1h-3v-1c-3.339-1.042-2.837,1.887-6,0l-3-4-6,2v-1h-2q-0.5-1-1-2h-2v-1l-13-1a10.577,10.577,0,0,1-9,6c-1.139-1.139,0-.4-2-1q-4.5-10.5-9-21h-3c0.029-4.72,1.23-6.345,2-10l10-1c1.079-2.352,2.293-3.249,3-6,3.218,0.366,3.708,1.224,6,2v-1l3-2c-1.27-2.73-2.532-3.292-3-7C584.8,208.055,584.574,207.615,587,207Z" />
        </a>
        <?php
        $kdwil = '17.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_11" data-name="Color Fill 11" class="cls-4" d="M537,206c3.672,0.884,5.052,3.1,9,4q0.5,4,1,8h-1c-1.742,2.62-2.663,2.541-3,7l6,1v1h11a3.982,3.982,0,0,0,2,2q-1,2-2,4h1v1c0.963,0.808,4.224.8,5,2v3h1v2h1v3h1v2h1q-0.5,3-1,6h-1v-1c-1.7.2-1.531,1.794-2,2h-2v2c-3.035-1.058-4.576-.17-9,0v2h-3c-2.138,3.543-6.106,5.216-9,8l-2,3c-4.576,2.263-5.932-3.449-8,3h-1v6l-4,1v-1c-2.593-.667-3.266-1.575-5-3v-1h-2l-2-3h-2l-2-3h-2l-3-4-3-1-1-2-5-1-1-2h-2v-1h-2v-1h-3l-1-2-4-1v-1l-4-1v-1l-5-1-2-6-2-1-3-4-6-2-1-2-4-1v-2l-2,1-1-2-4-1-2-3h-2v-1l-3-1-1-2h-2l-3-4h-2l-1-2h-1v-2l-2,1v-1a7.91,7.91,0,0,0-4-2v-2c-2-.213-3,0.073-4-1v-2l-2,1v-1h-1v-1h-1v-2l-2,1c-1.259-.643.3-0.444-1-1-0.709-2.1-1.03-.905,0-3h-1c-1.139-1.139,0-.4-2-1v-2h-2q-0.5-3-1-6c3.022-1.966.524-1.085,2-3l2-1v-1h2l1-2,10-3c1.222-4.727,5.745-6.195,8-10-2.425-2.229-1.395-1.882-1-5h2v-1l3-1,1-2h1v-2l2-1v-1h3v-1c2.363-1.89,2.741-1.72,3-6-2.487-2.875-.36-4.951,1-7h1q0.5-5,1-10l4-3,2-3h1v-2l2-1v-3h1v-2h1c1.742-4.777-2.055-8.568,0-14,2.951,0.683,2.371,1.721,3,2h5c0.052,0.017-.083.6,2,1l1,3h1v2l3,2v2h1v2h1v2h1v2h1l3,4c1.541,0.952,3-.354,4,1,2.39,3.22-.861,5.351,0,8h1v2l4,3q1,6,2,12l3,1v1h3l5,6v3l3,2v1h2c0.8,0.631.744,1.994,2,3q-0.5,7-1,14h-1v3h-1c-0.238,2.045.436,1.175,1,2q0.5,1.5,1,3h1c2.374,3.855.768,6.353,7,7v-1h6l3,4,3,1v2Zm-8,380v2c1.413-.054-0.393-0.758,1-1,0.859-1.889,1,2,1,2h6v2c3.079,0.755,3.793,2.425,6,4v1h4v1h4v1l3-1v2c2.26,0.248,2.629.112,4,1v1l7,2v4h-2a8.053,8.053,0,0,1-2,2q0.5,1.5,1,3h-2v3h-3v-2h-1v1c-0.416.579-1.634,0.147-1,2h1v1h3v2c0.4,0.918,2.851.575,2,3h-1v1h-3v-1h-4c-0.945-1.8-1.385-1.575-2-4l-6,1v-1h-1v1h-1a10.6,10.6,0,0,0-1,4c-6.754-1.778-1.659-3.591-4-7-1.67-2.432-3.691.109-5-5h-2c-0.463-2.391-1.158-3.145-2-5l-4,1-2-3h-2v-2a12.71,12.71,0,0,0-5-1v-2c-3.16.113-1.874,1.955-3-1h-2v-2h-2c0.237-3.391.835-4.614,3-6v-1h5v-1c2.771-3.109-1.031-4.205,5-5C523.511,585.435,525.071,585.893,529,586Z" />
        </a>
        <?php
        $kdwil = '17.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-5" d="M736,392v2h2v3h2v2l3-1v1a9.556,9.556,0,0,0,4,1v2l9,1c3.114,1.065,6.4,3.187,10,4v3h-2l-3,4h-1v3h-1q-0.5,6-1,12h-2q-0.5,3.5-1,7h-2v5h6v2l7,6q0.5,1,1,2h4v-1l5,1v-2l2,1v-1c3.68-2.169,2.664-3.846,8-2v-3h2v-2h4a6.719,6.719,0,0,0,3,3q-0.5,2.5-1,5h-2l-2,3h-1v1h1v1h1v-1l3,1v-1h3q0.5,1,1,2h1v-1c1.383-1.458.956,1.854,1,2a9.11,9.11,0,0,1,5,6h2q-0.5,1-1,2c0.669,1.032,3.965,1.45,3,4h-1v2h2c-1.079,2.352-2.293,3.249-3,6a9.733,9.733,0,0,0-4,1v1h1v1c1.413-.066-0.411-0.909,1-1h7q0.5,1,1,2c1.735,1.35,3.145,1.683,6,2v2h2q-0.5,1.5-1,3h-3v1c-4.038.906-8.039,5.075-9,9h-3v2h-1v-1c-2.994-.477-1.931,1.421-3,2h-2v1h-3v2c-1.413-.054.393-0.758-1-1-0.86-1.889-1,2-1,2h-4v3h-2v3h1c1.87,0.9-2,1-2,1v2l-3,1v1h-1v-1c-3.658-.884-4.1-0.434-5-4-1.318-.426-2.007.909-2-1h1q-0.5-1-1-2c-2.294-.257-2.574-0.167-4-1v-1l-2,1q-0.5-1-1-2h-5v-1l-9,1q-0.5-1.5-1-3l2-1v-2c-2.26-1.42-1.446-2.442-3-4s-2.569-.762-4-3c-1,.259-5.273,1.036-6,0v2c-3.688-.378-4.324-1.72-7-3a10.6,10.6,0,0,0,1-4h2v-1h-2v-1h1l-2-3-2,1q-0.5-2-1-4l-2-1q0.5-1,1-2l-3-1v-1c-1.757-1.571-2.254-1.152-3-4h-2v-2l-2,1v-2h-1a15.742,15.742,0,0,0-2-2v-1h-1v1h-1v-2h-2v-2c-7.262-1.861-9.508-10.527-20-11-0.131-1.187-1.123-6.558,0-9l2-1q0.5-2,1-4l4-3v-2l5-4v-3h1q0.5-2.5,1-5l7-2v-3h1q-0.5-6-1-12c2.986-.594,3.872-1.732,6-3v-1c1.315-.522-0.12.64,1,1,2.816,0.9,6.512-.443,8-1,0.718-2.176.359-4.746,3-7C735.139,392.139,734,391.4,736,392Z" />
        </a>
        <?php
        $kdwil = '17.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-6" d="M628,321v2c2.822,1.266,3.7,2.213,5,5h3v3h1q0.5,1.5,1,3l3,1q0.5,1,1,2h2v3l6-1v2h2v1l8-2v-2c3.428,0.871,2.575,2.068,6,3,0.684,2.927,1.113,3.274,4,4v2h6v3c-3.545.833-3.639,3.257-6,4l-6-1v1h-1v4h1c0.021,0.6-.888,1.85-1,4,3.063,0.722,4.683,2.655,7,4h2v1l6,5v1h-1c-3.546,4.942-2.606.1-6,1v1c-3.108,1.328-3.1,2.538-7,3-1.166-1.361-1.825-1.528-4-2-0.22,3.653-.594,3.912-2,6h-1q-0.5,6-1,12c-2.762.723-2.237,0.279-3,3h-1v5h-1c-1.608,3.4-.985,4.935-5,6v1l-6,1c-1.47-2.288-6.862-5.331-10-6v-2l-3-1v-2h-1c-2.2-2.522-3.018-4.084-7-5v-2l-3-1v-1h-2q-0.5-1-1-2h-2l-2-3h-2l-3-4h-2l-2-3h-2l-2-3c-1.849-1.642-6.232-4.35-9-5v-2a12.5,12.5,0,0,1-6-3v-1h-2l-2-3-4-1-2-3h-2v-1a13.046,13.046,0,0,0-6-3v-2c-4.549-.827-3.533-2.135-6-4l-3-1v-2c-3.756-.679-6.12-2.395-7-6-3.2-.826-2.9-1.179-3-5h6q1-3,2-6l5-1v-3l6-1,2-3,5-1v-1h2v-1h4v-1h6v-1h6v-1h3v-1l4,1v-1c3.113-3.2-.125-4.669,7-5v1l7-1v1h2v1h4v1l5,4c0.131,1.408-.19-0.159-1,1q0.5,1,1,2C622.991,318.374,624.383,320.179,628,321Z" />
        </a>
        <?php
        $kdwil = '17.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-7" d="M411,73l8-1v1h5V72h2V71c1.5-.953,2.456-0.811,5-1,3.212,5.545,10.186,9.285,12,16,2.488,0.7,1.622.519,3,2h1v2l7,5v1h3v4h1v1h4v1l2,1v2h1v7h1v5c0.062,0.258,1.553.288,1,2l-2,1q-0.5,2.5-1,5l-2,1v2l-6,5c-1.573,2.446-.1,7.87-2,10-1.139,1.139,0,.4-2,1-1.244,6.435-.331,4.817,1,10-6.44,3.606-10.229,9.783-17,13,0.823,1.876,1.481,2.616,2,5l-8,7-1,2h-3v1h-3v1c-3.677,1.91-6.837,2.55-8,7l-3,1v-1c-1.277-1.064-1.041-1.764-2-3h-1v-2l-6-5v-6h-1v-2h-1a8.316,8.316,0,0,1-2-4h-2q-0.5-4-1-8l-4-3v-2l-10-9v-2l-2-1v-3h-1v-2h-1l-1-4h-1q-0.5-3-1-6h-1l-1-4h-1v-3h-1l-1-4h-1l-1-4-2-1q-0.5-2.5-1-5h-1l-1-2h-2l-2-3h-2l-1-2-6-2V97h-2V96h-2V95h-2V94h-2V93h-3l-1-2h-2l-1-2h-2l-1-2-4-3q-0.5-2-1-4l-2-1-1-3-3-2V72L310,62l1-3h2l2-3h2l2-3,4-1,2-3h2l2-3h2l2-3c1.809-1.01,6.107-.844,8-2l1-2,4-1V37a8.222,8.222,0,0,1,4-2V31l7-5,1-2h3c3.042,4.917,8.1,5.866,13,9v1l3,1,1,2,4,1,2,3h3l1,2h2l1,2h2l1,2h2v1h2v1h2v1h2v1h2v1h2l1,2,3,1v4c-2.474,2.5-3.6,12.4-4,17a3.983,3.983,0,0,1,2,2h1V77C410.909,75.744,410.659,75.986,411,73Z" />
        </a>
        <?php
        $kdwil = '17.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-8" d="M517,135c4.972,0.589,4.146,2.848,9,4q0.5,1.5,1,3l6,1q1,4.5,2,9h1c1.5,4.549-.613,9.547,3,12,1.979,1.344,4.537-.216,7,1q0.5,1,1,2c2.2,1.931,2.826,2.8,7,3v-1h4v-1h3q0.5-1,1-2l12,2,3,4,3,1v2h1c0.97,1.226.706,1.94,2,3v9h1q-0.5,4.5-1,9h2q-0.5,2.5-1,5h-1c-0.434,1.86,2,3.9,1,7h-1v2h-1c-0.676,3.909,4.143,2.672,2,6-1.593,1.485-5.892,1.092-9,1q-0.5,2.5-1,5c-1.479.562-2.031,0.389-4,1v1a1.664,1.664,0,0,1-2-1c-2.5-.484-3.621.51-5,1v3c-5.622.179-15.423-.358-18-3h-1v-3c2.512-1.365,3.605-2.333,4-6h-1v-5h-1v-1h-3q-0.5-1-1-2h-2l-4-5h-2s-1.757-1.79-2-2q-0.5-1-1-2h-5v1h-4c-2.262-4.115-5.612-5.933-6-12h1v-3h1v-1s-1.394-.855-1-2l2-1a2.666,2.666,0,0,0-1-3q0.5-3,1-6l-2-1v-2c-5.661-1.528-4.213-5.082-7-9-1.7-2.393-7.1-4.677-10-6q-0.5-5.5-1-11l-4-3v-2h-1c-0.864-2.3,1.213-3.991,1-5h-1l-1-4a11.666,11.666,0,0,1-8-6v-2l-2-1v-3l-2-1c-2.71-3.136-2.482-4.276-2-8l5,1c1.722-2.616,2.823-2.091,7-2,1.431,2.383,4.476,5.824,7,7l6,1c1.484,1.033.962,5.534,3,7h2v1l4,1q0.5,1.5,1,3l2,1v5h1v3Z" />
        </a>
        <?php
        $kdwil = '17.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-9" d="M644,261h-2v2h-2v1h1q-0.5,1.5-1,3h2v6l-4,1v2c-2.784-.549-0.1-0.77-3,0-0.525,1.064-1.86,1.739-2,2v3h-1v4h-1v5l-2,1c-0.737,1.781.657,1.5,1,2l-3,5h-3v1h-2v1l-3-1q-0.5,1-1,2h-4q-0.5,1-1,2h-1q0.5,1,1,2h-3v1h-1v-1l-2,1v-1c-3.034-2.114-.542-1.029-2-4h-1v-2l-2-1v-2h-1v-4h-1v-7h-1q-0.5-1-1-2l-3-1v-2h-3v-1h-1q-0.5-2.5-1-5h-1v-4h-1v-4l-6-5v-1c-4.107-2.242-4.253,2.077-6-4,2.358,0.078,2.529.759,4,1l2-3h2l2-3,6-1v1l6,1q0.5,1,1,2h2v1h2v1c1.164-.08,3.594-2.043,6-1q0.5,1,1,2h2v1h5q0.5,1,1,2l6-1q0.5,1,1,2l5-1v-1h9v-1h2v-1c2.013-.333,1.232.49,2,1h1v3Z" />
        </a>
        <?php
        $kdwil = '17.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-10" d="M590,280h3c1.413,2.5,3.316,3.763,6,5q0.5,5,1,10h1v2c1.909,3.774,3.567,4.066,4,10a16.342,16.342,0,0,0-4,1v-1l-3-1v1c-2.269,1.286-2.637,1.628-3,5l-13,1q-0.5,1-1,2h-9v1h-2v1c-3.667,1.2-7.537-1.669-11-2,0.618-2.381,1.292-2.9,0-6h-1v-4l-3-2q-0.5-5-1-10l-4,1v-1h-1c-0.924.5-.756,3.114-4,2l-2-3h-1v2h-4a3.982,3.982,0,0,0-2-2c0.037-.112,1.8-5.225,1-7h-1a9.514,9.514,0,0,1-2-4h-2q-0.5-3-1-6l2-1v-4h1c2.967-3.178,4.453-.225,8-2l3-4h1q0.5-1,1-2h2l3-4h2q0.5-1,1-2l11-2v-1l2-1v-2h1v1l3,1v2l2,1c0.928,1.606-.337,2.959,1,4l5,1,7,6v4h1q-0.5,1.5-1,3h1v2h1C589.927,276.481,589.881,277.457,590,280Z" />
        </a>
        <?php
        $kdwil = '17.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-11" d="M565,317c-1.44,5.456-1.714,2.252-6,4v1l-3,1v3l-5,1v1c-2.906,2.941.377,3.682-6,4-1.212-2.128-2.253-2.177-3-5,1.1-.562,1.643-1.8,2-2h3q0.5-1.5,1-3h1l-3-9-3-2v-2h-1c-1.443-1.754-2.267-2.415-3-5,1.608-1.13,2.811-2.611,2-6h-1c-0.569-2.464.556-3.662,1-5,2.712,0.619,2.342,1.224,5,2v1c1.16,0.345,4.048-4.126,6-2,3.954,3.014.3,3.643,2,8h1v2l2,1v2h1C560.733,312.207,557.183,316.034,565,317Z" />
        </a>
    </svg>
</div>
<div class="container-fluid mt-3 text-center">Sumber : <?= $sumber; ?>
</div>
<?php legend_kab($kd_indi); ?>

<input type="text" id="tahun" value="<?= $tahun; ?>" hidden>
<input type="text" id="indikator" value="<?= $kd_indi; ?>" hidden>
<input type="text" id="provinsi" value="<?= $provinsi; ?>" hidden>
<input type="text" id="kecil" value="<?= $tahun_kecil; ?>" hidden>
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
                url: "ambil_bengkulu_kiri.php",
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
                url: "ambil_bengkulu_kanan.php",
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