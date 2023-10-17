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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40%" height="40%" viewBox="0 0 589 427">
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
                .cls-5 {
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
            </style>
            <filter id="filter" x="248" y="147" width="45" height="51" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="175" y="18" width="199" height="179" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="70" y="76" width="150" height="204" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="169" y="150" width="190" height="155" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="240" y="155" width="297" height="250" filterUnits="userSpaceOnUse">
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
        $kdwil = '34.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakarta_pusat" data-name="jakarta pusat" class="cls-1" d="M287,188l-4,1,1-3h-2c-0.844-1.135.127-.145-1-1v3h1v3l-5,1v-4l-3-1v-1h-1v2l-3-1c0.549-2.784.77-.1,0-3a15.407,15.407,0,0,1-8,1c-1.4-.225.413-1.067-1-1v1h-4v-3h-1c-0.04-.375.895-2.247,1-4h-3c-0.746-4.4-.565-5.414,1-10h1a1.573,1.573,0,0,0-1-2v-1h1V155c1.518-.954,1.694-1.954,3-3,3.113,3.913,1.785.518,5,0l3,4h3v1h2l1,2h6v1h1v2l3,2c0.254,1.194-1.807,1.737-1,4h1v2l3,2c1.318,2.846-1.121,7.61-1,9h1Q286.5,184.5,287,188Z" />
        </a>
        <?php
        $kdwil = '34.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakarta_utara" data-name="jakarta utara" class="cls-2" d="M355,160v3h1c1.139,1.139,0,.4,2,1q0.5,2.5,1,5h1v-1h1l2,1v-2h3v1h1v5h-1c0.02,0.726,1.965,4.638,1,7h-1c-0.806,1.449-.734,1.693-1,4l-5-1v1h-2l-1,2h-3c-0.952.457-.55,2.8-3,2v-1l-4-1v-3H335v-1h-2v-1l-3-1v4l-5-1-1,2h-2c-1.077-4.084-3.138-3.216-8-3v2h-5v2h-4c-0.463,2.391-1.158,3.145-2,5h-2v-1h1v-3h-2l1-3h-1v-1h-3q-0.5-10.5-1-21h-1v1c-0.86,1.889-1-2-1-2h-2v2h-4v-1h-1v1l-3,1v-2l-3,1-2-4h-6v-1c-2.11-1.4-2.337-1.753-6-2-0.723-2.762-.279-2.237-3-3v-1l-3,2v-1l-5-1c-0.844,1.135.127,0.145-1,1,0.112,3.522.132,6.668-1,9h-1v3h-1c-1.139,1.139,0,.4-2,1-1.154,4.083-.736,1.046-3,3q-1,2-2,4a34.218,34.218,0,0,0-8,1c-0.844,1.135.127,0.145-1,1v6c-4.552.592-2.507,0.915-5,3v1h-4v1h-1c-0.06,1.413.172-.146,1,1,1.142,1.581-2.458.931-3,1v1h-3v-7l-3-2v-7h2c0.513-3.309,3.355-4.876,2-9h-1v-3h-1v1h-5q-0.5,1.5-1,3l-3,1q-0.5,1-1,2l-3-1q-0.5,1-1,2h-2v1c-1.914.511-.6-1.074-1-2h-1v1h-1v2l-2,1v1h-4v1h-2v1c-1.52,1.34-1.333.514-2,3h-2c-0.329-3.237-.908-2.938-2-5,1.8-.945,1.574-1.385,4-2q-0.5-3-1-6h-1c-1.139-1.139,0-.4-2-1v-3h-2v-2l-2-1q0.5-3.5,1-7l-2-1q0.5-1.5,1-3h-1v-3h-1q0.5-2.5,1-5h-1c-0.779-1.471-.712-1.687-1-4l3-1q0.5-3,1-6h1v-1h4v-6h5q0.5-1,1-2l7-1v-1h3v-1l4,1v1l3-1c0.39-3.01.619-3.242,2-5h1q0.5-1.5,1-3l2-1v-2h1v-2h1v-2h1v-2h1V98l6-5q0.5-2.5,1-5l6-2,1-2h2V83h2l2-3,3-1,6-7,7-2c4.449-2.393,7.446-7.59,13-9,1.432-5.065,2.72-2.621,6-5l1-2h1V52h2l2-3h1q0.5-2,1-4l3-2V41l3-2V37l5-4V32h3l1-2h1l1-2h3V27h2V26h2l1-2c1.271-.621.557,0.535,1,1,1.4,1.2,5.337,6.306,6,8v5l2,1V52h1v6h1v4h1q0.5,2,1,4h1V82c4.525,15.35,7.159,33.821,12,49,1.9,5.951-.108,15.365,2,21,3.553-.072,6.785.157,9,1,1.145,3.352.183,4.906,4,6v1h4Z" />
        </a>
        <?php
        $kdwil = '34.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakarta_barat" data-name="jakarta barat" class="cls-3" d="M207,92h2q-1,6-2,12a3.575,3.575,0,0,0-2,2l3,2a18.778,18.778,0,0,1,3,9l-7-1v1h-2v1l-13,3v5c-3.084,1.148-4,.47-5,4h-1v4c-3.2.826-2.9,1.179-3,5l2,1q-0.5,2-1,4h1v3h1v1q-0.5,1-1,2l2,1q-1,3-2,6h1q2.5,4,5,8h2q0.5,2.5,1,5h-1c-1.127,1.719-.633,1.355-3,2,0.77,3.215,1.508,2.155,2,6h2q-0.5,4.5-1,9c-2.749,1.584-1.8,2.47-6,3v2c1.426,0.718,6.133,2.857,7,4q0.5,1.5,1,3l3,2v2l2-1v1h1v1h1v2h1v-1l5,3v3l3,2c1.963,2.825,2.428,5.868,5,8q0.5,4,1,8h-1q-0.5,6.5-1,13c-2.078,1.094-1.771,1.611-5,2v-1h-2v-1c-1.317-.931-1.777-0.759-4-1a6.072,6.072,0,0,1-3,3v-1h-1q0.5,1,1,2h-1q-0.5,2.5-1,5h-1v2h-1v2h-1c-1.839,3.321-1.732,5.9-5,8v1l-2-1v1h1l-1,3c-2.784-.549-0.1-0.77-3,0l1,2-2,1c-3.068,3.582-3.761,5.246-11,5-2.755-3.964-7.914-5.3-12-8l-1-2-6-2-1-2h-2v-1h-3l-1-2-6-1v-1l-6-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1h-2v-1l-6-2v-1h-3v-1l-4-1v-1h-3v-1h-2v-1l-6-1v-1l-5-1v-1H88v-1H85v-1H83v-1c-4.865-1.947-7.086,1.606-8-5h1v-6h1v-1h5c-0.432-1.807-.953-2.032,0-5h1l-1-8h1v-2h1v-2l2-1c2.053-4.008-2.191-5.189,5-6V184h1l1-6c3.537-.286,4.884-1.348,8-2a45.922,45.922,0,0,1,4-6l3-2v-3c2.105-4.255,6.307-7.028,13-7q0.5-4,1-8l4-3v-2l2-1q0.5-1.5,1-3h2q0.5-6.5,1-13h1q0.5-2,1-4h-1q0.5-4,1-8l-2-1v-2a10.477,10.477,0,0,0,4-4h-1c-0.786-2.839-1.232-2.415-3-4v-1l-3-1v-3c-3.45-.93-1.867-1.3-4-3,0.7-1.395,1.451-1.237,2-2,1.836-2.548-1.091-1.877,3-3,0.738-3.217,1.357-3.641,5-4,0.644-2.739,1.309-2.276,2-5h2v2h2l1-2,18,1c2-.169,5.074-2.258,8-1l1,2h2v1c5.12,1.772,5.215-3.145,10-2v1h7v1l8,1c1.547-3.668,2.745-5.821,8-6a13.76,13.76,0,0,0,4,3A39.691,39.691,0,0,0,207,92Z" />
        </a>
        <?php
        $kdwil = '34.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Jakarta_selatan" data-name="Jakarta selatan" class="cls-4" d="M255,155h2c0.009,8.657-3.42,16.252-3,22,4.084,1.077,3.216,3.138,3,8l13-1v1h1v3h1c1.127-1.719.633-1.355,3-2l1,2h1v1h-1c-0.979,1.654,1.44.846,2,1v3h1v-2h2v-3l5,1a15.682,15.682,0,0,0,1-6c-2.261-1.985-2.162-5.564-2-10h1v-1h-2c-1.6-1.606-1.9-3.832-2-7,1.139-1.139.4,0,1-2a2.155,2.155,0,0,1,1,2c1.312,0.608,1.548-1.852,2-2a5.947,5.947,0,0,1,5,1v-1c1.139-1.139.4,0,1-2h2v2h2q0.5,10,1,20h3v4l2,1-1,3h3c0.463-2.391,1.158-3.145,2-5h3v-2h5v-2h5v1l2-1v1h1v3h1c2.008-3.527,2.689-2.465,7-2a9.749,9.749,0,0,1,1-4c1.068,0.585,1.6,1.762,2,2h2v1h12v3l6,2c-0.723,2.762-.279,2.237-3,3v1H334s-0.191.692-2,1c-1.118,2.158-4.208,6.56-6,8v4h-2q-0.5,2.5-1,5c5.351,3.371.29,1.1,2,6h1v2h1l1,3c1.74-.1,3.652-1.039,4-1v1l7,1c0.251,4.677,1.275,5.994,0,10v4h-1v2h-1v3h-1c-0.336,1.68.948,1.755,1,2v6h-2v3a34.651,34.651,0,0,0-7-1,7.173,7.173,0,0,0,1,4h-1c-1.139,1.139,0,.4-2,1,0.367,4.666,1.353,6,0,10h1v1h-2v-1h-1v1c-1.958.4-1.271-.341-2-1-1.139-1.139-.4,0-1-2l3-1v-1h-1c-1.139-1.139,0-.4-2-1l1-3h-3a7.742,7.742,0,0,1-3,2,12.71,12.71,0,0,1,1,5h-2v-2l-2-1v-4h2v-3h-1v-1h-3c-1.139,1.139,0,.4-2,1a46.016,46.016,0,0,1,1,9,15.682,15.682,0,0,1-6,1c-1.139-1.139,0-.4-2-1-0.723,2.762-.279,2.237-3,3-2.873,2.639-5.239-.194-8,0a1.579,1.579,0,0,1-2,1l-1-2h-5c0.1,2.612.252,3.426,1,5h-1c-1.722,2.616-2.823,2.091-7,2v1c-0.9.335-6.4-2.525-7-3l-1-2h-3v5c-5.149-.461-5.677-3.02-9-5v1c1.587,1.354,1.737,2.169,2,5-1.719,1.127-1.355.633-2,3l3-1v2a10.655,10.655,0,0,0-2,2c-2.218.936-2.788-1.187-4-1v1h-5v1l-3,1q-0.5,2.5-1,5h1v2h1v2h1c1.247,2.342,1.957,4.766,3,7h-2v-1l-7-1v-1h-4v-1h-3v-1h-3v-1h-4v-1h-4v-1h-4v-1h-4v-1h-3v-1h-3v-1h-2v-1l-6-1v-1h-2v-1l-6-1v-1h-2v-1h-3v-1h-3v-1h-3v-1l-6-1v-1c-1.139-1.139-.4,0-1-2,5.754-2.8,6.362-6.383,10-11l3-1c1.275-1.114.067-2.36,1-4l2-1v-2h1v-2h1v-2h1v-2h1c2.073-3.954-.144-5.564,5-7v-1c1.949-1.078,5.2.563,6,1v1h4c0.844-1.135-.127-0.145,1-1q0.5-6.5,1-13h1v-1h-1v-5c-2.479-1.65-2.295-3.549-4-6l-3-2v-2h-1q-0.5-2-1-4c-0.986-1.29-3.631-1.117-5-2v-1l-3-1-2-3h-2c-0.644-2.739-1.309-2.276-2-5-4.2-.724-5.879-2-6-7,5.431-.7,4.147-2.012,6-6h1v-5h1v-2h1a3.122,3.122,0,0,1,1-1v-1h2v-1h4l3-5c1.139,1.139.4,0,1,2,2.343-.6,2.345-0.921,4-2v-1l3,1v-1c1.473-.77,1.681-0.727,4-1,1.14-4.48,3.172-3.58,7-5q0.5,4,1,8c-3.532,2.164-4.123,5.12-4,11a4.5,4.5,0,0,1,2,2h1q-0.5,2-1,4h1c0.622,1.905.44,2.549,1,4,2.078-1.094,1.771-1.611,5-2v-3h1v1l2-1c1.276,2.45,1.763-3.226,3-4h2v2h2a17.889,17.889,0,0,1,0-9c3.6-.718,4.5-1.3,8,0,0.4-1.83.819-3.973,2-5l3-1v-2l3-1C253.427,160.714,254.819,160.034,255,155Z" />
        </a>
        <?php
        $kdwil = '34.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakarta_timur" data-name="jakarta timur" class="cls-5" d="M385,171l-1,3h2c1.354-1.587,2.169-1.737,5-2l-1,3h1v-1h7l-1-3h1c1.722-2.616,2.823-2.091,7-2,2.993,4.128,1.289.459,5,1a2.645,2.645,0,0,1,2,2l14-4v2h2c0.648,0.323,1.456,3.138,3,3v-1h1q0.5-2.5,1-5l4-2v-3c2.927,0.684,3.274,1.113,4,4-2.543,1.742-1.906,3.128-3,6,2.3,0.287,2.55.186,4,1v1h7v1l11-2a12.058,12.058,0,0,1,2-2v-4h-1l1-2,7,2,3,4c2.043,1.429,4.707,2.024,7,3a29.413,29.413,0,0,0,1,7h4v3a3.982,3.982,0,0,1,2,2c1.8-.945,1.574-1.385,4-2a34.218,34.218,0,0,1,1-8l5-1,1,3,6,1q-0.5,10-1,20h3l-1,4h-2v10h-2c-1.339,2.523-1.99,3.5-2,8,0.406,0.619,1.565.1,1,2l-3,2c-0.974,1.585-2.888,9.932-2,13h1v4h1v1h-1v12h-1v3h-1c-0.019.151,1.154,2.849,1,5-0.148,2.064-1,2-1,2v12c-1.8.945-1.574,1.385-4,2v8h-1v2h-1q-0.5,4-1,8h-1c-0.044.382,0.912,2.22,1,4,4.437,2.713,6.536,8.387,9,13v2h1v2l2,1,1,4h1v10l2,1v3h1v3h1v4h1v9h1v1h-1v2h-1v5c-2.208,7.538-.568,13.62,8,14,1.334-2.072,2.423-2.017,4-4h1v-3h1q0.5-1.5,1-3h3a39.688,39.688,0,0,0-1,8c3.685,1.644,4.2,2.533,5,7,2.391,0.463,3.145,1.158,5,2-0.82,4.382-.457,5.445,0,10-3.586.936-3.156,2.61-3,7l-4-1v1h-1q-0.5-1-1-2h-5l-7-2v-4h-1l-1,2h-5v1a13.023,13.023,0,0,1-7,1v-1c-1.414-.027.4,0.8-1,1l-6-1s-0.744,1.483-3,1c0,0-.053-1.089-2-1l-3,1v-1h-2v-1h-8l-1,3h-2v-1h-1v1l-6-1v2h-3c0.281-5.257,1.616-3.71,2-9-1.135-.844-0.145.127-1-1l-6,2v1c-2.2.466-5.955-2.6-7-3h-5l-1-2-6-1-1-2h-5v-2l-6-1v-2l-6-2v-1h-4l-2-3-5-1-2-3h-2v-1l-10,1-4-5h-8v-1h-4v-1h-2v-1l-3,1v-1h-1v-3h-1c-0.574,2.444-1.047,2.206-2,4l-3-1v-1h-6a7.052,7.052,0,0,0-2-2v1h-1v-2h-3v-2c-4.655-.116-7.628-1.764-11-3h-4l-1-2-10-2v-1l-3,1v-1h-2v-1h-2l-2-3c-2.772-1.392-6.479.4-8,0v-1c-1.853-.645-2.548-0.4-4-1v-3h-2v-2c-3.537-.286-4.884-1.348-8-2v-2l-14-3-1-2h-3v-1h-1v1c-1.387-.276.343-0.557-1-1h-4c-0.354-.211-2.964-5.254-4-6h-2l-1-2h-2l-1-2h-1l-1-4-2-1v-2h-1v-2h-1v-3l-5-4v-3l-2-1c-1.818-2.984-2.019-6.181-2-11l3-1v-1c0.867-.487,9.343-0.4,11-1v-3h-2a8.114,8.114,0,0,1,3-5c1.34,2.041,1.637,1.878,5,2l1-5c2.684,0.731,3.1,1.624,5,3v1c2.848,1.539,7.379.03,12,0,0.844-1.135-.127-0.145,1-1l-1-5h1v-1h3c2.662,3.2,4.5.91,9,2v1h1v-1h2v-1h2l2-3c0.88,0.108,3.97,2.253,6,1v-1c2.107-2.389.727-5.669,0-8h1c1.256-1.909,1.014-1.659,4-2,0.844,1.135-.127.145,1,1-0.789,3.229-1.856,3.449-2,8h2v2h2v-6a9.749,9.749,0,0,0,4-1v3l3,1c-0.844,1.135.127,0.145-1,1a7.742,7.742,0,0,1-3,2c1.139,1.139,0,.4,2,1v1h5v1h1v-2h-1l1-3h-1q-0.5-3-1-6l3-1q-0.5-2.5-1-5a29.413,29.413,0,0,1,7,1c0.733-3,1.605-2.163,2-3v-3h1l-2-5h1v-3l2-1v-5c1.385-4.586.429-5.295,0-10l-7-1v-1l-4,1c-0.667-3.266-2.945-4.661-3-8h1v-1h-1c-1.263-1.9-1.652-1.878-2-5,1.139-1.139.4,0,1-2h2v-4h1a7.275,7.275,0,0,1,2-4h1v-2h1c1.358-1.473.489-1.366,3-2v-1c2.028-1.042,2.885,1.012,4,1v-1h12v-1h2c1.316-.98,0-2.628,1-4l6-2,1-2h2v1h3c0.277-2.305.194-2.548,1-4h1v-6h-1v-1h1c0.514-3.2-1.324-5.51-1-7h1v-1c2.739,0.644,2.276,1.309,5,2-0.783-3.359-1.253-6.85,6-7,1.8,1.938,1.885.853,4,2v1h2v1h3l1,2h1v3C387.2,169.945,387.426,170.385,385,171Z" />
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
                url: "ambil_diy_kiri.php",
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
                url: "ambil_diy_kanan.php",
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