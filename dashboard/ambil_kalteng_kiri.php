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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40%" height="40%" viewBox="0 0 600 450">
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

                .cls-12 {

                    filter: url(#filter-12);
                }

                a:hover .cls-12 {
                    fill: #d5d5d5f3;
                }

                .cls-13 {

                    filter: url(#filter-13);
                }

                a:hover .cls-13 {
                    fill: #d5d5d5f3;
                }

                .cls-14 {

                    filter: url(#filter-14);
                }

                a:hover .cls-14 {
                    fill: #d5d5d5f3;
                }
            </style>
            <filter id="filter" x="91" y="236" width="92" height="203" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="169" y="198" width="131" height="215" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="326" y="118" width="123" height="314" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="415" y="209" width="101" height="141" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="405" y="85" width="147" height="146" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="173" y="125" width="175" height="288" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="101" y="150" width="159" height="291" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="39" y="283" width="76" height="111" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="50" y="209" width="107" height="111" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="263" y="111" width="108" height="145" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="317" y="233" width="86" height="201" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="283" y="3" width="200" height="174" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="450" y="241" width="62" height="86" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="309" y="241" width="72" height="88" filterUnits="userSpaceOnUse">
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
        $kdwil = '62.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kotawaringin_Barat_01" data-name="Kab Kotawaringin Barat 01" class="cls-1" d="M159,255c3.137,0.56,4.19.974,5,4,2,2.639-1.416,3.934,0,8h1v2h1v2h1c1.661,2.858-.69.6,2,3v1h2l1,2h2c1,0.726,1.8,3.036,3,4v4h-2l-2,3h-1v2h-1q-0.5,2.5-1,5h-1c-1.891,4.763-1.973,9.413-2,16,1.135,0.844.145-.127,1,1h3c0.745,3.328,4.486,10.289,3,15h-1v3h-1q-0.5,2-1,4h-1q-0.5,5.5-1,11h-1v4h-1q-0.5,6-1,12c4.874,2.712,8.089,8.092,8,16h-1v6h-1v2h-1v3h-1q-0.5,2-1,4h-1q-0.5,3.5-1,7l-9,21-2,1q-2.5,6-5,12h-3c-1.139-1.139,0-.4-2-1,0.791-3.092,3.055-5.2,4-8V406h-1q-0.5-3.5-1-7h1v-6h1q0.5-5,1-10h-1q-0.5-2.5-1-5l-3-2q-0.5-2-1-4h-1v-2l-2-1-1-3c-3.067,1.3-4.561,1.849-5,6,0.88,0.593,2.739.911,2,3h-1v1h-4l-1,2a27.311,27.311,0,0,1-9,4v-2l-5-4v-1l-4-1v-1h-7v-1h-1a74.789,74.789,0,0,0,2-9h-1v-7a54.929,54.929,0,0,0,2-9c-3.111-1.34-6.519-2.623-10-4-0.363-4-3.243-7.32-2-12,0.424-1.6,2.285-7.938,1-11H97c-0.814-1.453-.7-1.7-1-4h5v-3h4v-1h-1v-3c3.9,0.528,3.874,1.5,7,3v1c3.039,1.144,16.41.27,18,0-0.066-5.4,1.153-7.251,2-11,2.531-1.025,4.3-2.316,7-3,0.908-3.655,3.462-5.2,5-8q0.5-2,1-4h1q0.5-2,1-4h1v-3h1v-2h1v-4h1v-3h1q-0.5-15-1-30h1c1.429,2.193,3.607,2.685,5,5h1v6C157.237,252.546,158.314,252.106,159,255Z" />
        </a>
        <?php
        $kdwil = '62.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kotawaringin_Timur_02" data-name="Kab Kotawaringin Timur 02" class="cls-2" d="M260,254h5c1.42,2.6,3.41,5.585,6,7h2v1h3l1,2,9,5q-0.5,3-1,6h1c1.425,1.438,5.583,2.546,8,3v10l-4,3v2h-1q1,4.5,2,9c-2.608,1.5-8.787,8.706-8,13,0.651,3.555,6.076,10.082,4,16h-1v2h-1v2h-1v2l-2,1v2l-2,1v2l-2,1v2l-2,1v2h-1c-1.512,4.077,1.186,11.774,2,14q1,4.5,2,9h1v3h1v3h1v4h1q-0.5,2.5-1,5c-3.543-.317-3.949-1.314-7-2v-2c-3.757-1.187-2.763-1.467-4-5h-1v2h-1q-0.5,2.5-1,5h-2c-1.874,3.239-4.4,4.265-5,9l3,1v1h3c-1.059,4.257-8.542,10.068-13,11l-6-19c-1.241-4.526,2-7.442,3-10v-3h1v-5h1c0.672-2.018.4-3.448,1-5l-3-2v-1l-6-2-1-2h-2l-1-2-4-1-1-2h-3v-1h-2v-1h-2l-1-2h-2l-2-3-4-1v-1l-5-4v-7c-1.9-2.141.178-5.784-1-9h-1v-2l-2-1v-6h-3v-6h-3v-7l-4-1-1-3h-1v-2l-2-1v-2h-1V275h-1v-4h-1q-0.5-2.5-1-5h-1l-1-3c-3.955-1.137-1.282-.3-3-3h-1v-2l-3-2v-2l-7-6q-0.5-2-1-4h-1c-1.719-5.1,3.8-9.249,5-12,1.736-3.978.914-11.507,1-17l18-3,3-4h2q0.5-1,1-2h2v-1h6v-1c4.645-1.322,15.746.536,18,2l3,4h2q0.5,1,1,2h2q0.5,1,1,2h2q0.5,1,1,2l4,3v2l2,1v2h1v2h1q1,8.5,2,17l2,1C257.663,246.988,259.68,248.47,260,254Z" />
        </a>
        <?php
        $kdwil = '62.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kapuas_03" data-name="Kab Kapuas 03" class="cls-3" d="M359,123h6c0.531,4.658,2.672,6.487,3,12h2v1h-1c-1.889.86,2,1,2,1,0.25,4.976,1.893,11.333,4,12l3,13c2.474,1.4.707,1.555,2,3l2-1v2c1.412,0.069-.046-0.049,1-1,1.37,0.755,1.169.734,2,2h1v1h-1l1,2,2-1c0.469,0.1.023,2.439,3,2v-1l8-1v-1c5.683-1.717,17.548.7,21,2l-5,6-2,1v2l-2,1v2h-1v8h1l1,4h1l1,2h2l1,2h15c1.212,2.128,2.252,2.177,3,5h-1v6h-1v2h-1v3l-2,1v14q0.5,4,1,8h-1v2h-1v3h-1v2h-1v2l-2,1v2h-1c-2.607,7.208,5.3,10.081,3,18-0.607,2.092-3.425,6.165-2,10h1v2l3,2v1l3,1c2.817,3.628,2.976,8.5,3,15h-1q-0.5,2.5-1,5h-1v3h-1v2h-1v3h-1v2h-1q-0.5,2.5-1,5h-1v3h-1v2h-1v3h-1q-0.5,2.5-1,5h-1q-0.5,3-1,6l4,1v-1a6.652,6.652,0,0,1,5,1v-1c3.719-2.542,2.651-6.57,8-8v1h1c-0.947,4.362-3.342,4.349-4,9l9,5v4c-2.446,2.12-2.307,4.939-6,6v1h-6v6c-1.135.844-.145-0.127-1,1h-5v1h-1q0.5,3.5,1,7h-1c-1.166-1.361-1.825-1.528-4-2l-1,4-2,1,1,4-2,1v2h-1c-0.917,1.373-.69,1.757-1,4a10.477,10.477,0,0,1,4,4h-1c-1.966,3.462-3.2,2.914-6,5v1l-2,1-1,3h-1l2,4h-1c-1.723,3.791-2.173,3.445-6,5q-0.5,3.5-1,7l-2,1a2.64,2.64,0,0,0,1,3q-0.5,4-1,8c-3.541-.38-3.036-1.241-6-2v-2c-3.2-.826-2.9-1.179-3-5-3.893.744-5.82,1.912-11,2l-1-3c2.041-1.816,5.609-12.283,6-16h3v-1c1.811-1.814,4.822-11.143,5-15a18.512,18.512,0,0,1-5-8l4-3v-4h1c1.024-2.591.864-7.692,0-9l3-1c6.928-10.22-2.5-33.2-3-44h-2c-0.828-1.147.878-.654,1-1l-4-5c-3.951-2.63-7.624-.08-9-6-3.871-4.465,1.486-12.5,0-17h-1v-3h-1l-2-3h-2l-3-4h-2l1-2h-1v-2h-1q-1-4.5-2-9h-1V252a2.534,2.534,0,0,1-1-3c0.524-2.09,3.137-5.342,2-9h-1v-2h-1l4-7v-1h-1V218h-1c-0.917-3.051,1.119-10.157,1-11h-1v-5h-1v-4h-1c-1.225-3.947,1.361-6.017,0-8-1.324-4.8-2.8-4.3-7-6v-1h-4v-1l-5-1v-1h-2v-1h-2l-2-3h-1v-2l-2-1q-0.5-2.5-1-5h-1q-0.5-2.5-1-5h-1v-2l-2-1v-4h1v-3l2-1v-2l5-4c2.3-3.508.7-7.337,2-12h1l-1-2,2-1-1-3h4v2h6v1h2v1l3-1v-6h2v-2Z" />
        </a>
        <?php
        $kdwil = '62.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Barito_Selatan_04" data-name="Kab Barito Selatan 04" class="cls-4" d="M475,214v2h2l1-2,9,1v2h14a2.523,2.523,0,0,1,3-1v1l3,1v1l2,1q0.5,2.5,1,5h-1c-1.852,2.03-2.55,2.217-5,1v1h-1v4h-1v3h-1l-3,13-11-1v1h-2v1H475l-1,2h-2v1l-6,1v1c-2.4,2.079-2.278,5.133-4,8l-2,1v4h-1v16h-1q-1,6-2,12h1c1.023,4.866-2.631,8.223-2,11h1v2h1l1,4h1v3h1l3,9-10,6-1,3-4,3v2l-5,3v4h-1c-1.553-2.48-4.677-4.3-8-5,1.033-4.845,3.8-4.735,5-9l-5-1-4,8h-6v1a24.2,24.2,0,0,0-4-1q0.5-3,1-6h1q0.5-2.5,1-5h1v-2h1v-3h1v-2h1v-3h1v-2h1v-3h1v-2h1v-3h1v-2h1c1.987-4.574,1.864-9.584,2-16-2.029-1.683-.852-2.387-2-4h-1l-1-2c-3.5-2.662-4.648-.62-5-7-2.208-3.114,3.131-9.931,1-16h-1l-1-4h-1c-0.686-2,.44-7.056,1-8l2-1,3-9h1v-6h-1v-8h1q-0.5-3.5-1-7l8,1v1h10v1h6v-1l6-1v-1h2v-1Z" />
        </a>
        <?php
        $kdwil = '62.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Barito_Utara_05" data-name="Kab Barito Utara 05" class="cls-5" d="M488,116h-2q0.5,3.5,1,7h2c-0.086,3.08-.133,5.13-1,7h1l6,7v4c2.762,0.723,2.237.279,3,3h1v8h1c1.856,6.507-2.406,10.405,3,14,2.694,2.532,4.463.555,8,2,2.9,1.187,7.154,6.567,8,10l9,5q0.5,3,1,6h1v1h3q0.5,1,1,2l3,1v5h1c0.826-3.2,1.179-2.9,5-3,1.584,2.731,2.742,2.446,3,7h-2l-4,5c-1.957,1.892-2.047,5.046-2,9l-4,1v1h-6v1l-4,1v1h-2q-0.5,1-1,2h-2v1h-7s-0.127.638-2,1l-1-2h-1q-0.5-2.5-1-5h-3v-1l-17,1v-2l-8-1v1h-1v-1c-1.446.507-.4,2.3-2,2v-1h-2v-1h-8c-3.407,1.027-12.5,6.074-17,5v-1l-2,1v-1h-9v-1h-3v-1h-3v-1c-1.139-1.139-.4,0-1-2h1v-3l2-1q0.5-5,1-10a12.077,12.077,0,0,1-2-2H418c-1.166-1.361-1.825-1.528-4-2-1.98-4.379-3.908-6.3-4-13,2-1.752.842-1.972,2-4h1v-2l3-2v-1h2l5-6h2l3-4h2l1-2c2.656-1.671,7.969-2.883,12-3h7l7-6v-2l3-2v-2l2-1v-2l2-1v-2l2-1q0.5-5,1-10h-1v-5l2-1v-5h1v-5h-1q1-6.5,2-13h1v-1l6-1V97h2l-1-2c1.381-1.695,4.808-2.024,8-2V91a34.622,34.622,0,0,1,7-1l1,3h1v4l-5,4v5l-2,1v2h-1v1h1v6Z" />
        </a>
        <?php
        $kdwil = '62.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Katingan_06" data-name="Kab Katingan 06" class="cls-6" d="M279,130h3v2h3v1c2.356,1.867,2.974,3.626,3,8-2.048,1.853-2.572,4.47-4,7h-1v2h-1v2h-1v2l-2,1v2l-3,2c-2.12,2.971-1.884,4.925-6,6-0.462,4.557-.8,5.621,0,10a8.615,8.615,0,0,1,2,2h4l3,4,3,2v1h2l6,7c0.112,10.223-4.056,9.892-5,18,2.107,1.893,2.413,4.6,4,7l2,1v2l3,2v2l2,1v2l2,1v2h1l1,3,2,1v2c1.524,1.912,4.991,1.489,7,3,1.16,0.873.976,2.067,0,3l5,1c0.364,2.329,1.775,4.648,1,8a2.677,2.677,0,0,0-1,3h1c0.944,3.741-1.11,8.64,1,11v2l6,5,1,3h2l3,9,2,1v2l4,3v2h1v19h1l1,3h2c1.745,1.492,2.78,5.694,3,9-1.988,1.762-.828,2.175-2,4l-2,1v2h-1v2h-1v2h-1v2h-1v2c-4.472,8.382-10.724,14.463-11,27h1v2l2,1v2l2,1c3.64,5.96,1.119,15.029,1,23l-4,3v1h-8c-5.9,1.843-6.6,2.606-9,8h-3v2h-1v-1c-0.4-.038-2.244.884-4,1-0.479-1.331-.468.31-1-1v-4h-1v2h-2v-2l-10-9-1-4-3-2q0.5-3,1-6h-1v-3h-1v-3h-1v-3h-1v-4c-1.076-3.038-6.159-13.329-4-19h1v-2l3-2v-2l2-1,1-4,2-1v-2h1l1-4h1c3.011-8.4-6.087-12.519-3-21h1l1-4h1c2.2-2.734,3.636-3.146,4-8-4.371-3.895-.128-6.89,2-10h1V278l-9-3v-2h1v-5l-6-2-2-3h-2v-1l-7-2v-1c-4.06-3.43-1.35-4.646-9-5v-5l-7-6v-7h-1q-0.5-5-1-10h-1q-0.5-2-1-4h-1v-2l-6-5q-0.5-1-1-2l-4-1q-0.5-1-1-2h-2l-3-4c-3.252-2.109-13.611-3.306-18-2v1h-6v1l-4,1-4,5-19,3q-1-17.5-2-35h1q0.5-3,1-6h2q-0.5-1-1-2h2q-0.5-1-1-2h1q0.5-2,1-4h1v-2h1q-0.5-1.5-1-3h-1q-0.5-4-1-8c0.789-2.873,3.611-4.627,5-7,3.927,1.014,4.192,2.883,6,6h1v2h1v2c0.329,0.523,1.373.817,2,2a12.012,12.012,0,0,0,2-2c2.794-1.273,5.761.345,8-1l2-3c1.935-.5,1.344.582,2,1h1v4h1v1c1.135-.844.145,0.127,1-1h1v-3h4v1h1v-1h2v-1a19.026,19.026,0,0,0,4,1c0.723-2.762.279-2.237,3-3v-1h6v-1c1.915-1.271,1.879-1.614,5-2v-4a7.5,7.5,0,0,0,3-2c1.859,0.389,3.983,2.032,5,2v-1h3l2-3,11-3v-2c6.845,0.2,7.794,1.125,13-1Z" />
        </a>
        <?php
        $kdwil = '62.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Seruyan_07" data-name="Kab Seruyan 07" class="cls-7" d="M170,155h7c2.706,0.882,4.247,2.537,8,3,1.409,7.592.065,12.149-3,18h-1v2h-1v3h-1v16h1q0.5,16,1,32c-1.811,5.589-5.7,7.431-6,15,1.95,1.746.85,2.334,2,4l7,6v2l3,2v2h1c1.732,2.716-.96,1.838,3,3l1,3h1v3h1v2h1v5h1v17h1v2l2,1c2.456,3.847.272,4.783,6,6v7h3v6l3,1c0.106,4.513.585,4.945,2,8h1q0.5,8,1,16l5,4v1l4,1,2,3h2l1,2h2v1h2v1h2v1h2v1l4,1,1,2h2l1,2,4,1,1,2h2c0.6,0.4.8,1.334,2,2-0.617,1.575-.326,2.949-1,5h-1v5c-0.933,2.783-5.3,8.369-4,13h1q0.5,4,1,8h1v3c1.089,2.784,2.582,5.1,3,9l-4,1-1,2-5,1-1,2h-2v1h-2v1h-2v1h-3l-2,4-5,1v1h-2v1c-1.389.906-1.75,0.679-4,1-2.205-2.629-6.256-2.863-9-5l-1-3c-1.7-2.156-6.22-2.774-9-4v-1l-13,1v1h-2v1h-2l-1,2-4,1-1,2h-2l-1,2h-2l-1,2h-2l-1,2h-2l-2,3h-2l-1,2c-1.542,1.446-3.675,2.348-5,4l-7-1c0.621-6.971,6.267-12.9,9-18v-2h1v-2h1v-3h1v-2h1v-3h1v-3h1v-3h1v-3h1v-3h1v-2h1q0.5-2.5,1-5h1v-2h1q0.5-6.5,1-13c-1.353-1.071-1.842-2.744-3-4l-2-1v-2l-3-2v-4h-1q0.5-2,1-4h1v-5h1q0.5-6,1-12h1v-3l2-1v-2h1v-4h1c1.231-4.323-2.346-10.481-3-14h-3v-1c-1.682-1.819-1.1-7.561-1-11,4.4-4.189,2.109-12.942,10-15q-0.5-3-1-6c-2.012-.883-7.961-4.46-9-6q-0.5-2-1-4h-1v-2h-1v-6h1v-1h-1v-4l-5-1q-0.5-1.5-1-3h-1v-6l-2-1q-0.5-1-1-2h-2l-2-3h-2v-1c-1.488-1.377-1.3-.517-2-3-2.617-.663-3.234-1.589-5-3v-1l-4-1-3-4h-2q-0.5-1-1-2l-10,1v-1h-4l-7-6v-2h-1c-1.428-1.728-2.329-2.412-3-5l3-1v-3c3.5-.513,14.186-2.284,16-4,1.139-1.139.4,0,1-2h-2c0.644-2.739,1.309-2.276,2-5h-2v-4c2.078-1.094,1.771-1.611,5-2v-2h2q-0.5-2.5-1-5c3.383-1.745,6.826-4.075,11-5v-2l5-1v-1c2.906-1.03,6.935-.213,9-1v-3h5v-1c-2.586-2.245-1.4-3.235-1-7h2v2l5,1v-1h4v-1h1v-4h-1v-5Z" />
        </a>
        <?php
        $kdwil = '62.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sukamara_08" data-name="Kab Sukamara 08" class="cls-8" d="M105,298v3h1c1.139,1.139,0,.4,2,1v7h-4v4h-3v2l-5,1c0.234,2.311.2,2.559,1,4h1v11H97c-1.064,4.029,1.1,6.963,2,9v3h1v1h4v1h2v1l3,1q-0.5,5-1,10h-1c-0.9,3.286,1.29,6.308,1,8h-1v5s-0.627.022-1,2c-5.213.276-6.751,2.164-10,4H94l-1,2H91l-1,2H88v1l-6,2v1H79v1H76v1l-9,2v-1H65v-1H62l-1-2H59l-1-2H56l-1-2H53v-1c-3.341-1.251-6.4,1.174-8,0H44l1-3,4-3v-1h4v-1h2v-1h3l1-2c2.833-1.263,5.777.45,8-1l5-7h4v-1h2v-1c4.483-1.994,6.536-.4,8-6h1v-3H83a10.6,10.6,0,0,1-1-4h1l-1-9H81l-1-14H79v-4H78v-3H77v-3H76c-1.357-2.629-2.243-3.942-3-7,1.5-.937,4.56-4.417,5-6l-1-5,2-1v-1h2l1-2h2l1-2h3c0.577,1.155,3.1,6.446,4,7h3l1,2Z" />
        </a>
        <?php
        $kdwil = '62.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Lamandau_09" data-name="Kab Lamandau 09" class="cls-9" d="M105,214c3.874,0.974,3.027,2.287,5,5l4,3q0.5,1,1,2h2v1c3.9,1.614,9.993-1.831,14,0q0.5,1,1,2h2l3,4h2q0.5,1,1,2h2l6,7h1v3c2.152,2.359-.006,7.276,1,11h1v7c0.034,14-4.277,20.216-9,29l-2,6-4,3v1c-1.326.907-3.979,0.706-5,2-1.068,1.353-.049,2.37-2,4v7c-5.214.965-13.963,0.148-20-1-0.918-2.437-1.037-6.193-1-10h-2q-0.5-2-1-4l-9-1-1-2H92v-1l-2-1v-3H89c-1.534-1.775-.862-1.517-4-2-1.391,2.2-6.109,5.29-9,6l-1-6,3-1v-3H75v-3H73l-1-2H68l1-7H67c0.092-4.265.183-6.65,2-9l2-1c1.14-2.556-1.594-8.87-2-11H66l-1,4H60l-1-3H56v-1H55v-5c1.135-.844.145,0.127,1-1h3v-3l6-1c0.945-1.8,1.385-1.574,2-4h3v2h2l1-2h4v2l5-1v-1c-0.721-.885-1.487-0.494-1-3h1v-5c1.645-2.987,4.572-.556,8-2l1-2h5l6-5v-4h3v-2Z" />
        </a>
        <?php
        $kdwil = '62.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Gunungmas_10" data-name="Kab Gunungmas 10" class="cls-10" d="M362,238a12.908,12.908,0,0,0-7,4l-1,3h-2v1H338l-13,3v-1h-2v-1c-4.7-1.141-3.6,4.08-7,2h-2v-6h-1v1l-5-3,1-2-2,1-7-5v-2h-1l1-2-3-1,1-2-3-1c-0.618-1.272.413-.8,1-1-0.916-.983.4-1.218-1-1,0,0-.1,2.094-1,1v-2l-2-1,1-2h-2v-1c-0.65-.76-0.82-0.427,0-1v-1l-3-1,1-2-2,1v-2c-1.7-2.794-3.077-3.967-3-9h1v-3l3-1c0.114-1.41-.149.129-1-1,0.628-1.689,3.462-4.684,2-8l-2-1,1-2-3-2-1-2-2,1-7-8h-3v-1c-2.407-1.358-1.267.307-3-2h-1v-8h2l-1-2,7-5-1-2h1v-1l3-1v-1h-1l2-4h2l-1-2h1l2-6,2,1v-1h-1v-1h1v-2h1v-3h1v-2h1v-3h1c1.827-2.472,2.376-2.091,3-6h2l6-8c1.6-1.14,2.285-.029,4-2,4.689-.056,7.777.442,11,2v1h3l2,3h2v1l4,1v1h6v1h3l5,6c1.867,4.963-2.466,13.825-4,16l-5,4v3h-1c-0.608,1.67-.535,2.716-1,4h1a8.739,8.739,0,0,0,2,4h1v3h1v2h1v3h1v2l5,6h2v1l4,1v1h3v1h3v1h3v1l3,1v1l2,1v11c4.359,4.582.016,14.721,2,22h1v12h-1v2h-1Z" />
        </a>
        <?php
        $kdwil = '62.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Pulang_Pisau_11" data-name="Kab Pulang Pisau 11" class="cls-11" d="M378,418h-3v-2c-2.784.549-.1,0.77-3,0-0.9-2.645-1.392-2.226,0-5h-1q-1,2.5-2,5l-9,2v1h-2v1l-2-1,1,2-3,1v-1h-1v2l-2,1s-0.219-2.179-1-1v2l-5,1v1h-6l-6,1v-1c-2.922-.743-6.7-0.577-9-1,0.844-1.135-.127-0.145,1-1-0.61-2.091-1.2-2.437,0-5h1v-2h1v-3h1q-0.5-6.5-1-13h-1v-2h-1q0.5-2.5,1-5l3-1q0.5-10,1-20h-1v-2h-1v-2h-1v-2l-2-1-1-4h-1c-0.709-2.323.927-2.65,1-4h-1v-1h1v-3h1v-2h1v-2h1v-2h1v-2h1v-2h1v-2h1v-2l2-1v-2h1v-2h1v-2h1v-2h1v-2q2.5-4,5-8h16c1.662-1.311,6.317-.414,10,0l-1-4h1a11.437,11.437,0,0,0-1-7h1v-1h1v1l2-1,2-3h1l-1-2c1.238-1.275.679,0.8,2-1h-1v-3h-1c-1.139,1.139,0,.4-2,1v-2l-3,1v-2c-0.477-.107-2.8,1.681-5,1v-1l-6-1c0.256-1.391.68,0.377,1-1l-3-5h-2l1-2-3-1,1-2c-0.98-1.024-2.214-.656-3-2h1v-1l-3-1,1-2-2-1q1-6.5,2-13h-1v-5c-0.358-1.368-.826.4-1-1h1v-1l-2-1v-6l2-1a5.368,5.368,0,0,1,0-4,9.561,9.561,0,0,0,2-2h4v-1l3-2v-2l6-3v1c4.285,3.991,1.012,6.343,0,10q1,9,2,18h1v2h1q0.5,3,1,6h1l4,5h2l1,2h1l1,4h1v6h-1c-1.425,5.235.8,11.022,2,14,1.1,0.534,1.7,1.84,2,2h3v1h2l1,2h2l1,3,2,1v5h1v3h1v1h-1v1h1v3h1q0.5,6,1,12h1v14h-1c-1.366,2.978-1.856,4.916-3,8h-1v1h1q-1,4.5-2,9h-1c-1.791,2.422-2.471,2.115-3,6a15.952,15.952,0,0,1,5,9h-1q-0.5,3-1,6h-1v2h-1v3l-4,2Z" />
        </a>
        <?php
        $kdwil = '62.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Murung_Raya_12" data-name="Kab Murung Raya 12" class="cls-12" d="M461,12q0.5,2.5,1,5h1q0.5,5,1,10l2,1q0.5,2,1,4l3,2q1,3,2,6l4,3v2h1c-0.116,1.378-.939,1.709-1,4-1.553.863-7.094,5.58-8,7a22.835,22.835,0,0,1-2-2c-2.255-.881-2.752,1.156-4,1V54h-2v1h-1V54l-6,1v1h-1v3l-2,1v2h-1c-1.354,1.483-.494,1.361-3,2-0.264,2.3-.182,2.561-1,4h-1q-0.5,5-1,10h1v1l3-1v1c1.28,0.727,1.265,1.461,2,2l2-1v1h1v1h1v1h-1c0.082,2.106,1,2,1,2v6h1v3l2,1q-0.5,2.5-1,5h1c0.637,2.291.342,3.306,1,5l3-1v-1h1v1c3.877,0.656,5.744.673,8,0v4c-1.73,2.027-.9,7.393-1,11q-0.5,3-1,6h-1q0.5,6,1,12h-1l-1,4-2,1v2l-3,2v2l-2,1v2h-1c-1.435,1.754-2.287,2.407-3,5-3.139.7-1.976,1.488-3,2h-3v1H437v1h-3v1l-4,1-3,4c-2.622,1.884-5.267,2.272-7,5l-5-2s-0.944,1.25-2,1c-2.182-.516-5.238-3.049-9-2-5.156,1.438-8.989,2.908-16,3l-5-6-2,1v-2l-2,1v-2h-2q-1-5-2-10h-1v-2h-1v-3h-1l1-2c-0.224-.494-1.788-0.3-2-2l1-2h-1l-1-3h1v-1h-2l1-2-3-1v-4h-1v-4l-2-1v-1h1l-1-2c-5.126,1.873-6.183,1.72-6,9a41.446,41.446,0,0,1-11-2v1h-1v-1l-3-1v4h-2v-2c-2.155-1.248-2.931-2.687-4-5l-14-3-2-3h-2v-1h-3v-1h-2v-1h-2v-1h-8v1c-5.65,1.507-6.366,7.435-12,9-1.146-4.293-3.293-2.924-4-8,1.979-1.658.9-2.545,2-4l4-2,1-3h4v-1c3.188-1.656,4.985-2.175,6-6,2.762-.723,2.237-0.279,3-3-2.01-.574-0.865.12-2-1a10.344,10.344,0,0,0,4-6c-0.419-1-2.377.062-2-3h1q0.5-2.5,1-5l-3-2c-1.353-2.941,1.154-6.417,0-8-3.245-5.131-11.034-4.615-13-12,1.109-.59,1.579-1.749,2-2h2V59l13,1V59c2.277-1.574,2.9-3.152,6-4V53l3-1V51c2.027-1.772,3.131-1.859,4-5,3.032-.536,5.594-1.791,7-4h1V37h1V36h2V35c1.317-.931,1.777-0.759,4-1l1-3h3c0.263-3.062.7-3.211,2-5h1c1.847-3.039-1.818-2.665,3-4V21h4v2h2V22h1V21h1v1h1V21h7v1h1V20c4.921-.221,5.655-2.063,10-3,1.509,2.422,2.916,1.58,4,3s0.039,2.341,2,4l-3,4h1v1h3v3c2.523,1.339,3.5,1.99,8,2V33c2.137-1.23,7.925.364,9,1l1,2h2v1h4V32c3.973-.976,3.851-1.963,10-2,0.392-2.7,1.482-2.812,0-5h1V24h5V23c3.184-1.61,5.017-2.2,6-6l5-1v1h1V16h2l1-2h5l1-2h2c0.7,1.395,1.451,1.238,2,2,1.836,2.548-1.091,1.877,3,3-1.831-5.194.787-4.305,3-8,2.01,0.574.865-.12,2,1C458.739,10.644,458.276,11.309,461,12Z" />
        </a>
        <?php
        $kdwil = '62.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Barito_Timur_13" data-name="Kab Barito Timur 13" class="cls-13" d="M498,247q-1.5,7.5-3,15h-1v3h-1c-0.128,3.194,2.806,1.638,1,7h9l1,2h2v2h-1a26.7,26.7,0,0,1,1,4,9.749,9.749,0,0,1-4-1v3h-2v3h1c1.139,1.139,0,.4,2,1v3c-3.144.584-4.461,1.621-8,2v5h-2q-0.5,4.5-1,9c-5.5-.961-1.677.088-5-3v3a7.91,7.91,0,0,0-4,2v1l-4,1-1,2h-2l-2,3h-2l-1,2h-2v1h-2v1h-1v2l-3,1v-1c-2.307-1.992-1.585-4.263-3-7h-1a49.2,49.2,0,0,1-3-8h-1v-1h1v-3h1c1.07-3.539-1.457-6.732-1-9h1v-3h1v-6h1v-4h1q-0.5-6-1-12c1.359-4.4,4.389-11.854,8-14v-1l6-1,1-2h2v-1h10v-1h2v-1Z" />
        </a>
        <?php
        $kdwil = '62.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Palangkaraya_71" data-name="Kota Palangkaraya 71" class="cls-14" d="M369,312h-2c0.123,3.6.966,6.69,0,8-3.221,3.648-3.567.469-7,1v1c-5.718,1.387-14.706-.153-19-1l1-4h-2l1-2-2-1-2-3h-2l1-2h-1v-3h-1c-0.416-1.759.91-1.659,1-2V293h-1v-1a1.459,1.459,0,0,0,1-2h-1l-1-2h-2v-1h1c-0.746-1.351-1.006-1.05-2-2v-1h-2l1-2-2-1v-2h-1l1-2h-2l1-2-4-3v-1h-2l1-2-4-3v-1h-2v-1h1c-0.785-1-1.246-.962-2-2h1c0.647-1.164.175-3-1-3v-1h2c-0.367-3.87-1.544-4.143-2-8,5.235-.111,3.882-0.384,7-2v-1l3,1v1l12-2v-1h10c0.944,1.8,1.385,1.574,2,4l-2,1c-0.11,1.41.931-.413,1,1l-1,3q0.5,2.5,1,5c-0.7.987-1.371-.365-1,1h1q0.5,3,1,6h-1v5h1q-0.5,3.5-1,7l1,2h-1v1h2l-1,2,3,1-1,2h1v1h2l-1,2h1v1h2l-1,2,2,1,1,3h2v1h-1v1h2v-1c1.626-.668,1.862.972,2,1h5v1l3-1-1,2c1.573,0.965,1.694-.78,2-1,1.546,0.53,1.016,1.169,2,2,1.412,0.073.393,0.233,1-1,1.605,1.543.574,0.259,1,3h-1l1,2C372.2,308.347,370.19,307.173,369,312Z" />
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
                url: "ambil_kalteng_kiri.php",
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
                url: "ambil_kalteng_kanan.php",
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