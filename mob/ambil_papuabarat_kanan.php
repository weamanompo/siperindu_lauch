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

$query = mysqli_query($koneksi, "SELECT max(tahun_indi_pilar) as kodeTerbesar FROM transaksi_pilar WHERE kd_indi_pilar = '$kd_indi' AND CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' ");
$data = mysqli_fetch_array($query);
$tahun_besar = $data['kodeTerbesar'];

$cekthn_d = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar > $tahun_mak ORDER BY tahun_indi_pilar ASC LIMIT 1");

$acekthn_d = mysqli_fetch_assoc($cekthn_d);

$tahun_d = $acekthn_d['tahun_indi_pilar'];

if ($tahun_mak == $tahun_d) {

    $cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%'  AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar > $tahun_mak ORDER BY tahun_indi_pilar DESC LIMIT 1");

    $acekthn = mysqli_fetch_assoc($cekthn);

    $tahun = $acekthn['tahun_indi_pilar'];
} elseif ($tahun_mak == $tahun_besar) {

    $cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%'  AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun_mak' ");

    $acekthn = mysqli_fetch_assoc($cekthn);

    $tahun = $acekthn['tahun_indi_pilar'];
} else {

    $cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%'  AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar > $tahun_mak ORDER BY tahun_indi_pilar DESC LIMIT 2");

    $acekthn = mysqli_fetch_assoc($cekthn);

    $tahun = $acekthn['tahun_indi_pilar'];
}

$cekthn = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%'  AND  kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar > $tahun_mak ORDER BY tahun_indi_pilar ASC LIMIT 1");

$acekthn = mysqli_fetch_assoc($cekthn);

$tahun = $acekthn['tahun_indi_pilar'];



$cekthnmin = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE CHAR_LENGTH(kode_wilayah) = 5 AND kode_wilayah LIKE '$provinsi%' AND  kd_indi_pilar = '$kd_indi'  ORDER BY tahun_indi_pilar ASC LIMIT 1");

$acekthnmin = mysqli_fetch_assoc($cekthnmin);

$tahun_kecil = $acekthnmin['tahun_indi_pilar'];


$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

$nil = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah ='$provinsi' AND kd_indi_pilar = '$kd_indi' ");

$as = mysqli_fetch_assoc($nil);

$n = $as['nilai_indi_pilar'];

$sumber = $as['sumber'];


?>

<h5 id="judul_indi" class="card-title text-center mt-1" style="color
    :#13005A;">
    <?php if ($tahun == $tahun_besar) : ?>
        <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
        &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
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
<?php if ($tahun < $tahun_besar) : ?>
    <a href="#indikator"><img src="../assets/img/kiri.png" width="2.5%" id="kiri_peta"></a>
    &nbsp;&nbsp;PETA INDIKATOR &nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>
    <a href="#indikator"><img src="../assets/img/kanan.png" width="3%" id="kanan_peta"></a></h5>
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
<div class="container-fluid text-center">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="381" height="366" viewBox="0 0 381 366">
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
                .cls-7 {
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
            </style>
            <filter id="filter" x="99" y="14" width="154" height="88" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="51" y="206" width="144" height="122" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="106" y="77" width="165" height="176" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="233" y="125" width="82" height="177" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="123" y="219" width="219" height="142" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="212" y="78" width="48" height="82" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="163" y="50" width="79" height="78" filterUnits="userSpaceOnUse">
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
        $kdwil = '92.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Manokwari_02" data-name="Kab Manokwari 02" class="cls-1" d="M152,22v2l4,1a1.455,1.455,0,0,1,2-1l3,4h3l5,6,2,1v2l8,4v1h5v1c3.171,0.964,8.339-.516,10-1l15,1,1-2c4.316-1.726,5.151,2.61,8,2V42h2l1-2,5,1v1l5-1v1c1.634,1.339,1.823,4.066,3,5h2l1,2h3l3,4h2v1h-1v1a12.7,12.7,0,0,0-5-1c-0.417,1.84-.813,3.957-2,5l-3,1v3c3,1.973.941,2.825,5,4v5c2.459,1.545.615,1.138,2,3h1c2.124,2.494,4.173,4.154,5,8a157.288,157.288,0,0,1-17-1l-4-11c-5.531,1.83-4.084-.506-8-2h-5V68h-2V67c-0.876-.663-4.4-3.533-6-3v1c-2.468.55-8.591,4.31-10,6l-9-3h-1c-1.305-1.687-.029-5.116-1-7l-2-1c-2.484-2.757-3.565-5.041-8-6q-0.5,2-1,4h1q0.5,2,1,4c-5.008,2.755-8.116,6.88-8,15h1v4h-4v5c-4.385-.022-8.111.459-11,2v1h-2l-1,2h-2v1c-2.041,1.686-3.056,3.155-6,4V93h-1c-2.242-2.519-4.576-1.4-7-3V89l-5-4V83l-2-1-1-3-6-1V77l-6,1v1c-3.532,1.067-5.343-1.451-8-2,0.306-4.327.619-3.344,2-6h1l-1-3h-1a26.539,26.539,0,0,1-3-11c3.316-1.756,4.368-2.058,10-2V54c0.689-.389,8.6-0.5,10-1q0.5-4.5,1-9l-5-1V42h1V39h1c1.36-2.41-.3-1.262,2-3V35c3.476-1.777,7.46,1.458,11-2,1.139-1.139.4,0,1-2l-2-1c-0.688-1.56,2.466-8.795,3-10a12.7,12.7,0,0,1,5-1C144.131,21.558,147.155,22.045,152,22Z"/>
        </a>
        <?php
        $kdwil = '92.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Fakfak_03" data-name="Kab Fakfak 03" class="cls-2" d="M121,302l15,1c0.551-5.452,3.653-11.369-1-15-1.058-.825-4.211-0.781-5-2q-1-4.5-2-9h1v-2h1c0.668-2.57-1.5-4.621-2-7-2.326-.083-2.566-0.811-4-1v1a9.462,9.462,0,0,1-4,1v5c-4.5-.27-6.572-1.524-7-6-2.613-.624-2.846-1.06-4-3h4v-4c-5.1-.255-3.494-1.393-8-2,0.1-2.612.252-3.426,1-5h-1l-6-5-1-2H96l-1-2-4-1-1-2-4-1-1-2H83v-1l-14-1-1,2-3-1v2H62a9.746,9.746,0,0,0-1-4l-3,1v-1H57l1-4H57c-0.212-1.4.212,0.174,1-1l-1-3h2l2-3c-1.331-.479.31-0.468-1-1H56v-1h1c2.895-3.231,8.621-2.405,13-4-0.945-1.8-1.385-1.574-2-4l20,1v1h2v1l5-1,1,3a13.278,13.278,0,0,0,2-2c2.378-1.04,11.954,1.322,13,2l5,6h6c3.076-4.848,9.152-3.058,11-10,2.509-.754,5.143-4.541,7-4l2,3h2v1h4v1h2v1h2v1h2v1h2q0.5,1,1,2h2v1l3,2v2l2,1v3l-5,4c0.844,1.135-.127.145,1,1,1.553,2.5,3.482,2.421,6,4q0.5,1,1,2h6v1c2.412,0.856,2.09-1.583,3-2h2q2.5,4,5,8h2v1c1.289,0.527,3.961-.9,4-1v4c-2.015,2.017-2.858,13.01-3,17l-4,3v1h-2l-2,3h-2l-1,2h-2l-2,3h-2l-2,3h-2l-1,2h-2l-2,3h-2l-1,2h-2l-2,3h-1v2l-3,2-6,7c-4.56,4.56-11.771,9.411-15,15-1.135-.844-0.145.127-1-1h-1v-5h-1v-2h-1q-0.5-2.5-1-5h-1Q121.5,305,121,302Z"/>
        </a>
        <?php
        $kdwil = '92.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Teluk_Bintuni_06" data-name="Kab Teluk Bintuni 06" class="cls-3" d="M166,82a63.4,63.4,0,0,1,8,2v1l6-1V83h13c0.666,1.228,1.592,1.388,2,2v2l2,1v2l2,1v2h1c1.384,1.772,1.586,1.987,2,5h-1v2l-2,1v2h-1v2l-2,1v2h-1v2l-2,1c-1.193,2.789.654,6.15,1,8l11-1q0.5,1,1,2h5q0.5,1,1,2c1.551,1.293,5.5,1.5,3,4h2c1.127,1.719.633,1.355,3,2a23.53,23.53,0,0,0,3,8h-1c-3.837,5.148-4.331-2.039-5,5,1.328,1.417,1.921,6.228,2,9h8c1.993,3.707,3.978,5.093,10,5q1,9.5,2,19v18h1q0.5,2,1,4h1v2l2,1q-0.5,5-1,10c3.371,0.989,1.91,1.209,4,3v1h4c1.237,0.776,2.1,5.684,3,7,1.153,1.687,5.624,4.382,8,5,1.18,6.278,2.853,14.2,3,22-4.05-1.263-1.179-.471-3-3l-2-1v-2l-2-1v-2l-5-4v-2h-1v-2l-3-2c-2.321-3.252-.634-4.291-6-5-0.854-.771-11.443-3.155-14-2l-2,3-7-2q-0.5-1-1-2s-5.239.956-7,1c-0.476,1.332-.507-0.325-1,1v5l-6,4-10,12h-2l-2,3h-7c-0.935-1.248-2.286-1.079-3-2-2.744-3.54-.882-6.258-7-7-2.019,2.988-3.791,1.353-8,1-1.082-1.707-2.129-2.124-4-3,1.356-2.912,3.137-3.8,4-7-2.527-1.587-2.284-3.59-4-6l-4-3v-1h-2q-0.5-1-1-2h-2v-1l-4-1v-1c-5.237-2.3-9.283.337-11-6,8.447-4.974,10.332-14.921,24-15v-1h4v1l5,1,5,6h2v4h3c0.607-2.393.318-1.858,2-3,0.844-1.135-.127-0.145,1-1v5h3v-3h1v2a7.742,7.742,0,0,1,2,3c1.6-.88,2.484-3.4,5-3,0.233,0.037.16,1.77,2,2q0.5-1,1-2h2v-1c3.983-.787,2.134,4.433,6,2h1c1.219-1.767-.456-2.851,2-5v1h5c0.092,0.029-.186.623,2,1v-4c-3.137-.56-4.19-0.974-5-4,1.135-.844.145,0.127,1-1,3.5,0.014,6.7.221,9-1q0.5-1,1-2h1v1h8v-2a34.218,34.218,0,0,1-8-1q-0.5-2-1-4l2-1v-3h-7c-0.945-1.8-1.385-1.574-2-4,3.075-.626,3.462-1.6,7-2,0.618-3.469,1.648-5.168,5-6,0.644-2.739,1.309-2.276,2-5-1.135-.844-0.145.127-1-1-4.209,1.871-2.883,1.443-8,1-0.624,2.613-1.06,2.846-3,4v1h-3c-1.294.685,0.211,2.044-3,2a1.617,1.617,0,0,0-2-1l-2,3-4,1q-0.5,1-1,2c-0.83.283-1.974-1.361-4-1v1l-3-1v1h-2v1l-10-1q-0.5-1-1-2h-5v1h-6v-1l-7,1v-1h-7l-2,3c-1.478.54-4.132-2.062-7-1v1h-2l-2,3h-2v1c-1.74.479-1.7-.923-2-1h-5l-2-3h-8c-3.368,1.106-4.457,3.493-9,4a10.6,10.6,0,0,1-1-4c2.394-1.582,2.124-3.953,2-8h-2q0.5-5,1-10c-2.325-1.349-3.06-3.4-5-5,2.395-4.291,4.929-4.9,5-12h-4q-0.5-5-1-10c0.512-2.943,4.578-8.387,3-13h-1q-0.5-2-1-4c2.375-1.134,4.489-3.031,6-2,4.431,1.168,3.55,3.76,8,5,2.04-2.371,6.329-3.34,10-4q0.5-1.5,1-3h1v-2h1v-6l4-2,6-7h2l1-2h2l1-2c2.976-1.546,8.17.326,9,0V87h1Q165.5,84.5,166,82Zm21,109h2q0.5,1,1,2l6,2v4l-8-4v-2C186.861,191.861,187.6,193,187,191Z"/>
        </a>
        <?php
        $kdwil = '92.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Teluk_Wondama_07" data-name="Kab Teluk Wondama 07" class="cls-4" d="M255,131q-0.5,2-1,4l-2,1v1h1c0.026,4.634-2.387,7.06-4,10-2.01-.574-0.865.12-2-1-2.01-.574-0.865.12-2-1h1v-7l3-2v-2l2-1v-3h1v1h3Zm-11,22v14l3,2c1.092,2.366-1.019,4.9-1,6h1v3h1q0.5,4.5,1,9l3,2v3h1a12.223,12.223,0,0,0,6,4c0.559,2.253,2.643,5.3,4,7l2,1-1,3,3,2q0.5,3.5,1,7l2,1q0.5,2.5,1,5h-1v1l2,1c1.695,2.069,1.854,3.073,2,7h4c0.844-1.135-.127-0.145,1-1q0.5-3,1-6h-1v-2h-1v-5h-1v-1h1v-1h-1v-1h1v-1h-2v-4h-1v-2h-1c-0.132-1.408.773,0.4,1-1v-5l8-7a34.651,34.651,0,0,0,7,1c0.634,7.081.989,16.465,1,25l-6,1q1.5,9,3,18l8,7q1,4.5,2,9l5,7,2,1v8h1l1,4h1q0.5,7,1,14c-5.477.308-3.751,1.13-7,3h-2l-1,2h-2l-1,2h-8v-1l-6-1-6-9v-3h-1v-2h-1v-2l-2-1-3-13h-1v-3h-1v-2h-1V241h-1V230h-1q-0.5-3-1-6c-3.16-.763-3.651-2.227-7-3-0.3-1.6-3.114-8.456-4-9h-4v-1c-2.064-1.779-.623-2.08-4-3q0.5-5,1-10l-3-2q-0.5-2.5-1-5h-1V172q-1-9-2-18Zm22,16h-2v-5h-1l-1-3h1l1-4h1v-2c0.989-1.185,2.814-.939,5-1a12.71,12.71,0,0,1,1,5C269.085,160.295,266.569,166.253,266,169Zm13,18c2.848-.089,4.289-0.2,6-1v1h1c1.021,2.332-2.044,1.181,0,5h-1c-1.139,1.139,0,.4-2,1-1.082-1.707-2.129-2.124-4-3v-3Z"/>
        </a>
        <?php
        $kdwil = '92.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kaimana_08" data-name="Kab Kaimana 08" class="cls-5" d="M230,224l15,1,4,6,2,1q0.5,2,1,4l4,3v2l3,2v2l3,2v2l2,1q0.5,3,1,6h-1v1h1c0.906,3.207.781,4.973,2,8h1v3h1v4h1v2h1v3h1l1,4h1v2h1v3h1l1,4,3,2,1,3h2l1,2h4v1h7v-1h2l2-3h2c3.055-1.739,3.022-2.574,8-3,0.354,4.424,2.133,6.218,3,10,1.274,0.637,1.415,1.627,2,2h2v1h2l1,2h2l1,2h4v1c3.928,1.573,4.676-.645,6,4,3.1,2.773.659,3.83,2,8h1q0.5,3,1,6a19.168,19.168,0,0,1-7,1c-1.139-1.139,0-.4-2-1-0.741,3.271-2.346,5.814-5,7h-4q-1,2.5-2,5l-4,1v1h-4l-4,8-6,1v-4c-1.135-.844-0.145.127-1-1l-7-1c0.88-3.4,1.861-3.065,6-3-1.183-4.439-2.892-3.222-3-10l5-1v-1h2v-1l9,1v2a39.688,39.688,0,0,0,8,1v-4h-1c-1.139,1.139,0,.4-2,1v-2l-6,1c-2.1-.352-4.548-2.674-8-2v1l-5-1v1l-6,1-1,4h-4v1c-1.96,1.351-2.289,2.231-5,3v-2h-2c-0.147-4.161-1.258-4.722-2-8-5.048-.067-5.72-1.484-10-2q0.5,2.5,1,5h-1v1h-3c-1.082-1.707-2.129-2.124-4-3v2c-1.135.844-.145-0.127-1,1,4.062,1.051,1.246.44,3,3h1l1,3h-1c-1.139,1.139,0,.4-2,1v-2c-1.107-.849-2.17-3.48-3-4h-3l-3-4h-1v-2l-3-1v-1h1c1.916-2.293,3-1.275,4-5h-1v-4c-1.8-.945-1.574-1.385-4-2v-1h-3l-1,3h1c0.816,2.977-1.8,2.754-4,3-1.256-1.909-1.014-1.659-4-2a9.11,9.11,0,0,1-6,5v-1c-4.782-4.164-.881-6.782-3-12h-1v-2l-5-4v-7h-2c-2.037,3.412-3.866,3.107-4,9h-2v-1l-5,1v-1c5.071-5.256-4.526-10.748-6-16l3-1c1.139-1.139,0-.4,2-1q0.5-2.5,1-5c-0.441-1.941-3.932-9.961-2-14h1c1.346-1.957,2.255-2.282,3-5h5q0.5-2.5,1-5h2c1.643-3.1,1.9-1.8,2-7h2v2c1.135-.844.145,0.127,1-1,1.135-.844.145,0.127,1-1h-1c-1.233-1.574-.057-5.427-1-7h-1c-1.552,2.464-1.075.613-3,2l-2,3-6,1a17.469,17.469,0,0,1-4,7l-2,1q0.5,4.5,1,9h-1q0.5,7,1,14l-3,2v1h-1v-1c-1.324.6-1.454,1.67-2,2h-2v1l-2-1v1h-1v3c2.521,2,3.833,4.527,4,9-2.531,1.025-4.3,2.316-7,3-1.621-7.184-4.1-3.1-6-6v-2h-2v3l6,2q-0.5,2.5-1,5h1v1h-1c-1,1.755-1.36,1.614-2,4-5.293.95-5.3,3.625-5,10a9.11,9.11,0,0,1,5,6l-5,1v3c-2.447,1.556-.612,1.137-2,3h-1l-5,6c-1.851-.337-6.147-2.342-9-1l-2,3h-2l-2,4h-9c-2.126-2.026-5.538-.524-8,0-0.88,3.4-1.861,3.065-6,3a18.547,18.547,0,0,0-2-2q0.5-2,1-4l-2-1v-6h-2l1-3h-1v-3h-1v-1h1c1.456-2.454,3.115-2.8,4-6h2c2.513-5.341,7.1-8.1,11-12l6-7,3-2v-2l2-1v-1h2l1-2h2l2-3h2l1-2,3-1v-1h2l1-2h2l1-2h2l1-2h2c2.571-1.816,1.668-3.822,6-5,0.955-5.539,1.538-18.177,4-22l3-1,3-4h2q0.5-1.5,1-3l3-2v-2l9-7v-5c8.281-1.584,8.412,1.159,16,2C228.944,226.2,229.385,226.426,230,224Zm11,108q-0.5-2.5-1-5l3-1v1c2.719,1.466,4.57,3.078,5,7h-1v-1Zm-66,10c2.918,1.751,4.263,4.922,7,7v1h3v1l3,1c-0.574,2.01.12,0.865-1,2v1h-5l-1-3-3-1v-1c-2.03-1.758-3.143-1.864-4-5h1v-3Z"/>
        </a>
        <?php
        $kdwil = '92.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Manokwari_Selatan_11" data-name="Kab Manokwari Selatan 11" class="cls-6" d="M227,83c7.632,0.141,14.619,1.346,22,0,0.947,5.332,3.872,8.229,5,13-1.689,1.009-6.491,7.438-6,10h1q0.5,2.5,1,5h-1v2l-2,1-7,8-3,1v3c2.864,2.434,2.8,4.639,3,10v4l2,1q1,5.5,2,11c-4.363.8-7.273,1.941-13,2-2.165-4.015-4.451-5.157-11-5q-1-4.5-2-9h3c1.212-2.128,2.252-2.177,3-5-3.655-3.457-.4-7.263-7-9,0.154-5.139,2.056-6.9,3-11,1.8-.945,1.574-1.385,4-2v-2c2.627-.63,3.233-1.6,5-3v-1c2.783-1.864,6.789-1.435,9-4-2.541-2.294-.831-2.53-2-6h-1V92c-0.264-.6-1.3-0.1-2-3h-2V87C228.073,86.316,227.726,85.887,227,83Z"/>
        </a>
        <?php
        $kdwil = '92.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Pegunungan_Arfak_12" data-name="Kab Pegunungan Arfak 12" class="cls-7" d="M183,69l13,3c1.785-2.178,7.916-6.224,11-7l2,3h2l1,2h5v1l6,2v1l3-1c0.584,3.144,1.621,4.461,2,8a9.746,9.746,0,0,0-4,1c3.055,5.126,9.519,6.386,10,14h1c0.65,1.059.335,4.747,1,6h-1c-2.677,2.908-3.337.571-6,2l-3,4h-1q-0.5,1-1,2h-2v1l-3,2-3,9-3-1v-1h-2v-1h-4v-1h-2v-1l-10,1a20.509,20.509,0,0,0-1-4h1q0.5-2,1-4l2-1q0.5-2,1-4l2-1v-2h1v-2h1c0.912-1.378.69-1.754,1-4-3.19-2.172-4.78-6.764-7-10l-2-1-1-3H179c-2.832,3.351-6.078.893-10,0q-0.5-6-1-12c3.687-2.09,6.975-6.245,9-10-1.975-1.129-2.338-1.417-3-4h1V55h1v1l6,4v1c0.788,1.175-.093.1,1,1v7Z"/>
        </a>
    </svg>
    <div class="container-fluid text-center">Sumber : <?= $sumber; ?>
    </div>
    <?php legend_kab($kd_indi); ?>
</div>
<input id="tahun" value="<?= $tahun; ?>" hidden>
<input id="tahun_besar" value="<?= $tahun_besar; ?>" hidden>
<input id="tahun_kecil" value="<?= $tahun_kecil; ?>" hidden>
<input id="provinsi" value="<?= $provinsi; ?>" hidden>
<input id="indikator" value="<?= $kd_indi; ?>" hidden>


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
                url: "ambil_papuabarat_kiri.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi,
                    tahun: tahun
                },
                success: function(msg) {
                    $("#isi").html(msg);
                    $(".loader").hide();
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
                url: "ambil_papuabarat_kanan.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi,
                    tahun: tahun
                },
                success: function(msg) {
                    $("#isi").html(msg);
                    $(".loader").hide();
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