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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="414" height="383" viewBox="0 0 414 383">
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
                .cls-15,
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

                .cls-15 {

                    filter: url(#filter-15);
                }

                a:hover .cls-15 {
                    fill: #d5d5d5f3;
                }
            </style>
            <filter id="filter" x="86" y="307" width="76" height="59" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="163" y="271" width="51" height="46" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="229" y="81" width="35" height="72" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="328" y="1" width="56" height="96" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="140" y="278" width="50" height="60" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="172" y="238" width="51" height="58" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="161" y="299" width="40" height="32" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="44" y="313" width="62" height="43" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="224" y="161" width="25" height="71" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="143" y="312" width="41" height="50" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="74" y="340" width="91" height="38" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="181" y="261" width="22" height="23" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="200" y="262" width="31" height="26" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="175" y="276" width="24" height="22" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="138" y="327" width="18" height="17" filterUnits="userSpaceOnUse">
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
        $kdwil = '71.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Bolaang_Mongondow_01" data-name="Kab Bolaang Mongondow 01" class="cls-1" d="M152,325c2.444,0.574,2.206,1.047,4,2v2h-1l1,2h-1v1l-6,1a1.648,1.648,0,0,0-2-1v1l-4,1v3a3.982,3.982,0,0,1,2,2l4-2v1c1.139,1.139.4,0,1,2h-1q-0.5,3-1,6l-2,1c-2.745,2.972-2.854,4.031-9,4v1c-1.312.377-2.532-2.755-3-3h-2l-3,4h-4l-3,4h-5l-2,3c-1.712-.069-1.658-1.882-2-2l-10,1v-1c-2.27-.912-3.822-0.877-7-1,0.789-3.229,1.856-3.449,2-8H93l-2-3c4.592-1.492,7.365-.062,8-6h1l-1-3H98v-2H97l-1-5H95v-3a7.74,7.74,0,0,0,2-3c2.01,0.574.865-.12,2,1,1.139,1.139.4,0,1,2h5v-1l13,1v-1c-1.139-1.139-.4,0-1-2l9-3v-1h6l1-2,3-1,1-3h4v-1c3.56-1.04,9.225,1.46,10,3v5h1v4Z"/>
        </a>
        <?php
        $kdwil = '71.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Minahasa_02" data-name="Kab Minahasa 02" class="cls-2" d="M204,291l3-1v1h1c-0.771,2.1-2.3,5.138-3,7v4l-2,1v2h-1l-5,6h-3c-1.78-4.853-2.14-7.027-9-7v1h-3c-0.844-1.135.127-.145-1-1-0.19-2.084-1-7-1-7l2-1-1-2h2v-1c-2.762-.723-2.237-0.279-3-3l3,1a1.464,1.464,0,0,1,2-1l1,2c2.64,1.364,2.314.208,5,0,0.329-3.885,1.61-4.492,3-7-2.739-.644-2.276-1.309-5-2v-2h-2v3h-1v1h-4v1c-1.139,1.139-.4,0-1,2l-10-1v-2h-1v1c-1.421-.636-0.742-1.166-2-2v-2a6.719,6.719,0,0,0,3-3c2.612,1.382,1.693,1.769,6,2,1.1-1.408,3.487-2.931,5-4v-1h3c4.251,6.265,5.456-1.189,9,1h1q0.5,2.5,1,5h1l-1,3,4,3v1h1v-1c1.958-.4,1.271.341,2,1C204.139,290.139,203.4,289,204,291Zm-10,3-3,1v2l2,1c0.844,1.135-.127.145,1,1,0.367-3.87,1.544-4.143,2-8h-1v1C193.861,293.139,194.6,292,194,294Z"/>
        </a>
        <?php
        $kdwil = '71.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kepulauan_Sangihe_03" data-name="Kab Kepulauan Sangihe 03" class="cls-3" d="M250,86h5v1h-1v1h-4V86Zm0,18v2h1v-1l2,1v1h-1c0.2,1.7,1.794,1.531,2,2v2c2.762,0.723,2.237.279,3,3h1v1h-1c-0.612,2.519-.534,1.647-2,3v1h-2v1l-3,1v-1h1c0.063-.353-1.7-3.609-2-5h-2v2h-2q-0.5-1.5-1-3h-1v-2h-1v-4h1q-0.5-1-1-2l2-1c-0.094-1.307-.92-1.493-1-4h-2v1l-3-1c-1.146-4.293-3.293-2.924-4-8,3.973-.976,3.851-1.963,10-2l2,3c1.4,1.368.57,0.083,0,2l3,1-1,3h1v2h1c0.437,1.551-1.03,1.074-2,1v1h2Zm-11,25,3,1q-0.5,1-1,2l-2,1v-1c-0.86-1.123-.846.406-1-1Q238.5,130,239,129Zm4,6h4v3l-3,1v-1h-1v-3Zm-2,12q0.5-1.5,1-3h3v1c-1.135.844-.145-0.127-1,1Z"/>
        </a>
        <?php
        $kdwil = '71.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kepulauan_Talaud_04" data-name="Kab Kepulauan Talaud 04" class="cls-4" d="M375,6l3,1V9l-2,1v1l-2-1v1c-1.472.766-1.677,0.739-4,1l-1-3h1V8C373.7,8.231,372.773,9.668,375,6ZM351,30h2c0.584,2.729,1.617,2.12,2,4-0.439.849-2.053,0.353-2,2h1c0.748,2.883.806,4.724,0,6,1.239,1.1,2.363-.583,3,2h-1v1h1V44c1.581-1.142.931,2.458,1,3h-1v1h1c0.979,1.654-1.44.846-2,1V48h-1v1h-1c-0.916,1.666.66,3.254,1,4h-1v1l-2-1v1l-3,2q0.5,5,1,10c-2.84,1.68-2.719,3.451-7,4V69h-1v1c-1.958.4-1.271-.341-2-1-1.719-1.127-1.355-.633-2-3l6-5-1-2h2l-1-3h2V55h-1c-0.333-1.794,2.479-2.615,4-3V50h-4l1-2c-1.392.252-.269-0.211-1,1h-1V47l-3,1c0.062-2.859.634-3.334,1-5h-1c-1.071-1.653-1.441-1.64-2-4h2c-0.287-.888-1.929-2.2-1-4l2,1q1-3,2-6h-2a11.875,11.875,0,0,1,1-5h1v1l2-1,1,2,2-1v1h1ZM333,66h3v1h1v4a9.1,9.1,0,0,1,2,2l3-1v1h1v6c-3.258,2.151-1.689,2.481-1,6h-3c-0.566-3.1-1.96-4.457-2-8h1V76l-3-2V71h-1C333.068,69.484,333.187,68.554,333,66Zm11,20V83c1.8-.945,1.574-1.385,4-2l-1,2h1c1.139-1.139,0-.4,2-1l-1,2h1c1.943,2.677,2.281.265,3,5h-1v1h1v1h-3c-0.883-1.158-1.883-1.11-3-2V88h-2l1-2h-2Z"/>
        </a>
        <?php
        $kdwil = '71.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Minahasa_Selatan_05" data-name="Kab Minahasa Selatan 05" class="cls-5" d="M179,286c-0.38,4.208-2.1,3.726,1,6v1l3-1c-0.844,1.135.127,0.145-1,1l1,2h-2l1,3h-2c1.561,3.136,1.392,2.2,2,6-5.177.105-11.207,2.816-15,1v1c-2.408,2.609.672,10.948,1,15-3.432,2.436-1.778,5.6-7,7v4h-3l-3-4c2.01-.574.865,0.12,2-1l-6-4c-0.78-1.748.708-1.548,1-2v-1h-1c-0.493-2.516,1.8-2.364,0-5h-1v-1h-2v-1c-2.679-1.765-1.834,1.009-3-3h1v-3l2,1v-1c-1.137-1.83,1.243-4.857,2-8,1.675-.25,2-1,2-1h10v-1h2v-1l4,1v-1c1.719-1.127,1.355-.633,2-3l-7-2v-6c1.8-.945,1.574-1.385,4-2,0.736,1.1.5,1.626,2,2v-1h1v2l2-1v2h1v-1h6Zm0,3c1.139,1.139.4,0,1,2h-1v-2Z"/>
        </a>
        <?php
        $kdwil = '71.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Minahasa_Utara_06" data-name="Kab Minahasa Utara 06" class="cls-6" d="M208,243h2q-1,3-2,6h-2C206.38,245.459,207.241,245.964,208,243Zm9,5v3l-4,1c-0.339-3.955-.964-2.907,0-6C214.8,246.944,214.574,247.385,217,248Zm-36,4c3.2,0.826,2.9,1.179,3,5h-2Q181.5,254.5,181,252Zm20,1,3,1q-0.5,1.5-1,3h1v1l7,1v1c0.977,0.072,2.9-2.147,5-1v1c-1.91,1.624-2,3.345-2,7-3.5.549-1.852,0.983-5,0v2h-1v4h-2q-0.5,2-1,4a9.749,9.749,0,0,1,4,1c-0.473,1.406-1.311,1.64-1,4a1.711,1.711,0,0,1,1,2h-1q-0.5,3-1,6h-3v-2h-4c-1.082-1.707-2.129-2.124-4-3,1.563-4.706-.775-6.848-2-11h1c1.139-1.139,0-.4,2-1v-5a19.168,19.168,0,0,0-7-1v-2h2c1.376-5,3.589-2.339,5-7h3Q200.5,255.5,201,253Zm-24,8h2v2h-2v-2Zm5,1h3v2h-3v-2Z"/>
        </a>
        <?php
        $kdwil = '71.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Minahasa_Tenggara_07" data-name="Kab Minahasa Tenggara 07" class="cls-7" d="M190,304c1.031,4.051,3.92,5.258,5,10h-2l1,2-8,2-1,3h-1c-1.016,1.054-1.5,3.309-3,1h-1c-1.763,1.585,1.107,1.938-3,3-0.611-1.208-1.692-1.5-2-2v-2h-1v-4h-1v1h-5c0.011-5.6-1.476-7.356-2-12,2.008,0.1,3.309,1.04,4,1v-1l7-1h6c1.4,0.187-.409,1.119,1,1v-1Z"/>
        </a>
        <?php
        $kdwil = '71.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab._Bolaang_Mongondow_Utara08" data-name="Kab. Bolaang Mongondow Utara08" class="cls-8" d="M55,318h5v2c2.074,0.332,2,1,2,1h9v1l2-1v1h2v-1h1c2.018,0.811,4.991,3.142,9,2v-1h3c1.389-.264-0.412-1.08,1-1v1l7,2-1,6c2.683,2.357.538,2.924,2,6l2,1v2h1a20.9,20.9,0,0,0-1,4c-2.48,1.247-5.116,1.9-8,3l1,2H91v1c-2.687,1-2.1-2.439-4-2v1c-2.324.178-5.77-.137-7-1l-2-4H70l-4-5c-4.654-2.454-5.617,2.8-6-5,1.719-1.127,1.355-.633,2-3l-5-4v-1H54c-2.8-1.242-4.093-1.607-5-5h3v1c1.82,0.8.779,1.257,2,0h1v-3Z"/>
        </a>
        <?php
        $kdwil = '71.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kepulauan_Siau_Tagulandang_Biaro_09" data-name="Kab Kepulauan Siau Tagulandang Biaro 09" class="cls-9" d="M235,173v5h2q-0.5,1.5-1,3l-2-1a7.49,7.49,0,0,0-2-3q0.5-5,1-10a10.6,10.6,0,0,1,4-1,6.719,6.719,0,0,0,3,3c-0.844,1.135.127,0.145-1,1C237.871,171.975,237.583,172.338,235,173Zm3,3h3v2h2v2l-5,1v-2h1Q238.5,177.5,238,176Zm-5,25c3.8,0.6,3.5.481,7,1v3h-1v1c-1.9,1.037-4.161-.684-5-1a9.749,9.749,0,0,1-1,4c-1.135-.844-0.145.127-1-1-1.139-1.139-.4,0-1-2h2v-5Zm-4,25c0.463-2.391,1.158-3.145,2-5,2.01,0.574.865-.12,2,1h1v2C231.922,225.094,232.229,225.611,229,226Z"/>
        </a>
        <?php
        $kdwil = '71.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Bolaang_Mongondow_Timur_10" data-name="Kab Bolaang Mongondow Timur 10" class="cls-10" d="M168,339c-1.161,4.559-1.893,2.7-1,8h-3c-0.723,2.762-.279,2.237-3,3q0.5,3,1,6h-3c-0.488-4.336-1.423-2.641-2-7l-5-1v-2c-2.613-.624-2.846-1.06-4-3,3.347-3.041.491-5.542,2-10h3v-1l4-1v1l4,1v-4a17.655,17.655,0,0,0,8-11,7.173,7.173,0,0,0,4-1v1h1q0.5,2.5,1,5h1v2c0.325,0.516,1.372.839,2,2-8.148,2.281-3.933,9.63-8,12h-2Z"/>
        </a>
        <?php
        $kdwil = '71.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Bolaang_Mongondow_Selatan_11" data-name="Kab Bolaang Mongondow Selatan 11" class="cls-11" d="M157,349l-1,3h1c1.139,1.139,0,.4,2,1v4l-6,1v1l-4-1v1l-6,1v3H130v1l-3-1-1,2-3-1v1h-5v1l-2-1v1h-2v1l-10,1v2c-2.221-.377-4.769-1.887-8-1v1H91c-0.272.062-.293,1.378-2,1v-1H87v-1c-2.854-.921-5.674,1.525-7,1v-1H79v-3c1.034-.788,4.975-5.546,5-7H83l-1-3,2-1c0.76-2.843-1.225-3.5-2-5,1.517-.954,1.694-1.954,3-3v1h3c0.359,0.207.927,1.434,2,2v-1H89c-1.843-.95,2-1,2-1v1l7-1c-0.844,1.135.127,0.145-1,1,0.908,2.6,1.414,2.275,0,5H96l1,3H96v1h1v-1c2.506-1.167,2.042,3.271,5,0h1v2c1.412-.078-0.24-0.32,1-1l4,1-1-2h4c1.286,2.269,1.628,2.637,5,3,1.6-2.44.862-.623,3-2l1-2,3,1,4-5,2,1v-2l2,1v-1c1.38-.869,1.729-0.774,4-1v2h3l1-2c0.859-.265,2.844,2.014,5,1l4-5c3.072-1.23,3.208,1.564,4,2h2v1h3Z"/>
        </a>
        <?php
        $kdwil = '71.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Manado_71" data-name="Kota Manado 71" class="cls-12" d="M194,276h-2l-1,2h-4l-1-2c3.45-.929,1.867-1.3,4-3-0.871-3.428-2.068-2.575-3-6l3-1c1.849,0.671,5.756,2.527,7,1v4c-2.037,1.754.106,1.383-1,3-1.412-.082-0.29.223-1-1h-1v3Z"/>
        </a>
        <?php
        $kdwil = '71.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Bitung_72" data-name="Kota Bitung 72" class="cls-13" d="M213,278c-0.684,2.927-1.113,3.274-4,4v-2h1c0.795-1.964-1.332-.522-2-1l1-2c-1.409-1.565-2.36-.543-4-3a9.749,9.749,0,0,0,4-1v-1h-1c-0.4-1.315,2.328-1.434,0-4h2c2.424-2.207,6.095.328,9,1,0.727,1.191,3.713,2.927,3,5h-1c-0.723,2.762-.279,2.237-3,3v1h-5Zm10-6h2c-0.226,4.9-2.054,5-3,9l-3,1v-1h-1v-3h3v-1h1Q222.5,274.5,223,272Z"/>
        </a>
        <?php
        $kdwil = '71.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Tomohon_73" data-name="Kota Tomohon 73" class="cls-14" d="M187,281h2c0.684,2.927,1.113,3.274,4,4-0.218,1.331-2.31,6.631-3,7h-3c-2.461-3.512-2.26-.243-5-2v-1c-1.139-1.139-.4,0-1-2a9.375,9.375,0,0,0,2-2c0.509-.274,3.279-0.7,4-1v-3Z"/>
        </a>
        <?php
        $kdwil = '71.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Kotamobagu_74" data-name="Kota Kotamobagu 74" class="cls-15" d="M150,337l-6,1-1-3c2.352-1.079,3.249-2.293,6-3v1h1v4Z"/>
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
                url: "ambil_sulut_kiri.php",
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
                url: "ambil_sulut_kanan.php",
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