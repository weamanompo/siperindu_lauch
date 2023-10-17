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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="70%" height="70%" viewBox="0 0 1043 469">
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

                .cls-2,
                .cls-3,
                .cls-4,
                .cls-5,
                .cls-6,
                .cls-7,
                .cls-8 {
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
            </style>
            <filter id="filter" x="257" y="22" width="126" height="213" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="641" y="264" width="169" height="182" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="300" y="252" width="298" height="162" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="274" y="174" width="264" height="148" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="116" y="29" width="172" height="157" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="739" y="254" width="247" height="209" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="337" y="153" width="46" height="36" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
        </defs>
        <rect id="Color_Fill_8" data-name="Color Fill 8" class="cls-1" y="-80" width="1043" height="657" />

        <?php
        $kdwil = '19.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-2" d="M313.589,29.658c-0.485,2.5-.762,3.271-2.3,4.594,0.659,2.308-.138.993,1.148,2.3,2.167,3.51,7.189,5.76,13.785,4.594a1.707,1.707,0,0,1,2.3-1.148l3.446,4.594h2.3l2.3,3.445h2.3l1.149,2.3,3.446,1.148-1.149,3.445h-2.3c-2.333,2.046-2.243,5.921-2.3,10.335h1.149v4.594h1.149v2.3h1.148v2.3L346.9,77.89l1.149,5.742,2.3,1.148v2.3l3.446,2.3-1.149,2.3h1.149c1.6,2.117,2.643,2.689,3.446,5.742l3.446,1.148V99.71h1.149a1.865,1.865,0,0,1-1.149,2.3l1.149,5.742,2.3,1.149v2.3l3.446,2.3v1.149h3.446v1.148c2.914,2.3,4.022,3.181,4.595,8.039l-3.446,1.148a29.633,29.633,0,0,1-2.3,11.484h-1.148c-2.451,7.689,2.124,19.438,2.3,26.413-1.3.969-.167-0.146-1.149,1.148h-3.446c-0.374-4.232-.939-4.834-4.594-5.742-2.044,3-3.365,2.126-6.892,3.446v1.148c-1.923.443-2.044-1.1-2.3-1.148-4.155-.851-7.478.667-10.338,1.148v9.187c3.316,1.769,5.785,3.682,10.338,4.594-0.73,5.936-2.6,3.21-3.446,9.187l-6.892,2.3-1.149,3.446c-4.3,1.344-1.957,1.2-4.594,3.445v1.148h-4.595v1.149h-2.3v1.148c-6.626,2.288-11.709-1.929-14.933-3.445v2.3a7.768,7.768,0,0,0-1.149,8.038H312.44c2.609,3.069,4.3,2.08,4.6,8.039l-3.446,1.148v3.446h-2.3c-0.579,3.107-1.228,4.318-3.446,5.741-1.864,1.29-5.29-1.391-9.19,0v1.149a20.648,20.648,0,0,1-9.189,2.3v-1.149c1.611-1.109,4.024-5.349,2.3-9.187l-2.3-1.148-1.149-5.742-3.446-2.3v-2.3h-1.148V195.026h-1.149v-1.149h1.149v-2.3h1.148q-0.575-2.871-1.148-5.742c-1.541-.816-3.069-3.247-3.447-3.445h-4.594v-1.149h-2.3l-2.3-3.445c2.965-1.72,3.873-4.1,4.595-8.039h-1.149v-1.148h-4.595q-0.573-1.722-1.148-3.445h-1.149c0.97-1.3-.146-0.167,1.149-1.149v-1.148h3.446c-0.8-3.255-2.048-3.316-3.446-5.742l10.338-3.445c-0.019-5.635,1.317-6.539,2.3-10.336-1.407-.726-1.664-1.9-2.3-2.3h-2.3V139.9h-2.3v-1.148h-2.3v-1.149h-2.3c-3.186-2.239-6.461-11.915-6.892-17.225h4.595c1.086-3.917,3.625-5.169,5.743-8.039h1.149V108.9h1.149l-1.149-5.742h2.3q-1.148-5.168-2.3-10.336a14.589,14.589,0,0,1,5.743-1.148,21.986,21.986,0,0,1,1.149,8.039l3.446,1.148V99.71c1.308-1.308.458,0,1.149-2.3h1.149c0.032-3.27-6.022-13.4-8.041-14.929l-3.446-1.148L273.385,71c2.932-1.566,5.079-5.906,3.446-8.039-1.082-3.921-1.444-2.174-3.446-4.594h-1.148V52.626l-2.3-1.148v-2.3h-1.148v-2.3h-1.149V37.7a12.239,12.239,0,0,1-2.3-2.3,12.167,12.167,0,0,1,4.594-1.148c1.252,1.111,18.615,2.275,21.825,1.148V34.252h2.3V33.1H304.4V31.955c1.133-.756,4.947-4.085,6.892-3.445v1.148h2.3Z" />
        </a>
        <?php
        $kdwil = '19.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-3" d="M781.1,281.155h2.3v-2.3l3.446-1.148v1.148c1.308,1.308.457,0,1.148,2.3h2.3l-1.149,2.3s2.473,0.208,1.149,1.148h-2.3v2.3c-1.6-.254.1-0.108-1.148-1.149-2.964.729-1.145,2.41-2.3,3.446-1.613-.149-1.928-1.111-4.594-1.149,0.109,2.1,1.2,4.076,1.148,4.594h-1.148l-1.149,9.187c-3.968,1.072-3.893,2.856-4.6,6.89,3.192,0.479,2.2,1.358,4.6,0v2.3h1.149v-1.148c1.852-1.237.993,1.747,1.148,2.3h5.744c1.012,3.946,3.668,5.149,5.743,8.039h1.149v1.148h-1.149l1.149,2.3,3.446-1.148v-1.149c1.38,0.062,1.812,1.048,4.594,1.149v2.3h1.149l-1.149,3.445h-2.3v2.3l-2.3-1.148v2.3l-3.446-1.149v1.149h-3.446v1.148H771.912l1.149,2.3h-2.3c-1.93,1.824-2.094,3.106-2.3,6.89h1.148v1.149h-2.3c-0.89,2.327,1.533.521,2.3,1.148q-0.573,1.149-1.148,2.3h1.148c0.427,2.283-.439,1.428-1.148,2.3v2.3h-1.149v-1.148c-3.23,1.242-9.635.173-10.338,1.148H755.83v-2.3l-2.3,1.148V348.91a8.874,8.874,0,0,0-2.3,3.445l-3.446-1.149v2.3c-3.2-.63-0.116-0.884-3.446,0v2.3c1.5,0.772,1.537,1.784,2.3,2.3h2.3l2.3,3.445h2.3l2.3,3.445c3.4,2.432,5.674,2.161,6.892,6.89,4.128,0.944,4.11,3.531,5.744,6.891l2.3,1.148v1.149h-2.3v2.3l2.3,1.149c1.363,3.716-2.41,7.926-3.446,10.335h1.149V393.7h3.446v3.445h-1.149v-1.148c-4.842.766-5.739,2.8-9.189,4.593v1.148h1.148l1.149,2.3c4.415-.691,3.158-0.4,8.041,0l-1.149,6.891-3.446-1.149v1.149h-1.149q-0.573,2.87-1.148,5.741a1.863,1.863,0,0,1,1.148,2.3H765.02l-1.149,2.3c-3.447-.253-2.337-1.375-5.743,0v1.148h-4.6l-1.149,2.3h-2.3v1.149L735.154,424.7V427l-2.3-1.148v2.3l-2.3-1.148v2.3l-3.446-1.149v2.3l-2.3-1.148v1.148h-1.149v1.149h1.149v1.148h-2.3c-1.17.819-.912,5.12-2.3,2.3-3.924,1.53-8.533-.227-9.189,1.148h-1.149v-1.148h-1.148V433.89h1.148q-0.575-1.722-1.148-3.445c-2.309-.659-0.994.138-2.3-1.148h1.149V427l2.3-1.148-1.148-2.3c1.341-1.439,1.92,1.392,2.3-1.149,0,0-2.384-.093-1.149-1.148h2.3l2.3-3.445h1.149l-1.149-2.3,2.3-1.148v-2.3h1.149l1.149-3.445h-1.149a6.256,6.256,0,0,1-2.3,2.3v-1.149c-2.27-1.3-2.686-1.627-3.446-4.593h-3.446c-0.647-2.735-1.093-2.657-2.3-4.594h-1.148v-1.148h1.148c0.512-2.038-1.034-1.884-1.148-2.3-0.78-2.815.795-4.225,1.148-5.742l-3.446-2.3v-3.445l-2.3-1.148v-1.149h1.148q-0.573-2.3-1.148-4.593c6.476-2.628,1.774-3.207,6.892-4.594v-2.3h1.149v-1.148h-1.149v-1.148h1.149v-3.446l3.446-2.3V362.69h-1.149l1.149-3.445c-1.988.314-2.3,1.149-2.3,1.149-2.02.639-4.108-1.489-4.594-1.149v2.3l-2.3-1.148-1.149,2.3h-4.594c-1.074.522,0.071,1.461-3.446,2.3v-3.445h1.148q-0.573-1.149-1.148-2.3h1.148V358.1l3.446-1.149v-2.3c1.229-1.063,1.066,1.013,1.149,1.148,3.429-.278,3.767-1.654,4.6-4.594h2.3v-2.3h2.3v-1.149h-1.149l1.149-3.445c0.313-6.812-.494-8.609-1.149-12.632h2.3q-0.575-1.722-1.148-3.445c5.912-.709,4.092-2.407,5.743-6.891l3.446,1.149v9.187h1.149a46.1,46.1,0,0,1,1.148-10.336c-3.81-1.667-6.453-3.11-3.446-8.038l-3.446-1.149,1.149-4.593h1.149v-1.149h-1.149v-1.148h1.149v-5.742h2.3v-3.445h2.3q-0.575-2.871-1.148-5.742h-1.149l1.149-2.3-2.3-1.148,1.149-3.445,3.446-1.149-1.149-2.3h2.3v-1.148c1.968-1.622,2.327-1.831,5.743-2.3v1.149l10.338-3.445,1.149,2.3c1.548,0.493-.458-0.906,1.149-1.148s-0.441.812,1.148,1.148a1.941,1.941,0,0,0,2.3-1.148h1.148v1.148h1.149v-1.148l3.446,1.148v-2.3c1.623,0.062-.452.87,1.149,1.148,0.987,2.169,1.148-2.3,1.148-2.3h2.3v1.149c0.469,0.094,5.018-2.993,8.04-3.446l1.149,3.446h1.149v2.3l3.446-1.148v1.148c2.75,1.02,4.34.7,5.743,0v2.3c1.39,0.84.4-1,1.149-1.148,3.353-.667,2.332,1.738,3.446,2.3h1.149v-1.148H781.1v2.3Zm-112.57,53.974h2.3q-0.574,1.149-1.148,2.3h1.148v1.148h-3.446c-1.309,1.308,0,.458-2.3,1.149v2.3c4.484-2.437,3.481-2.231,9.189-1.148v-2.3h1.149v1.149c0.877,0.132,8.581-2.123,11.487-2.3v3.445h-2.3v2.3h2.3l-1.149,2.3c1.6-.29.309,0.241,1.149-1.149h1.148v2.3l-2.3,1.148v3.445l-2.3-1.148c-0.787,1.421.818,0.51,1.148,1.148,1,1.928-1.548.971-2.3,1.149v-2.3h-1.149a17.021,17.021,0,0,1-1.148,6.89l-2.3-1.148v1.148h1.149v3.446h-2.3q0.573,1.722,1.148,3.445h1.149a2.758,2.758,0,0,1-1.149,3.445v1.148h1.149v1.149h-2.3l-2.3,6.89h-2.3l-3.446-4.594h2.3c-0.691-4.413-.4-3.157,0-8.038l4.6-1.149v-1.148l-4.6,1.148c-1.624.011,0.474-1.235-1.148-1.148-0.875.047,0.21,1.947-2.3,2.3-0.163-.082-1.114-1.744-2.3-2.3v2.3c1.011,0.68,3.146,1.046,2.3,3.445h-1.149v1.148h-2.3c-1.3-2.268-1.627-2.685-4.6-3.445-0.931-3.91-2.931-4.958-6.892-5.742-0.785-3.361-1.278-3.76-4.594-4.593v-3.446a20.956,20.956,0,0,1,8.04,1.149v-4.594h1.149l1.149-2.3h2.3l3.446-4.594h-1.149v1.148h-3.446q-0.573-2.3-1.148-4.593h4.594c-1.236-3.394-1.169-2.372,0-5.742,4.02,0.63,2.127,1.128,5.744,0v3.445Zm21.825,29.858h2.3l-1.149,2.3s2.473,0.208,1.149,1.148h-2.3v-3.445Zm-5.744,8.039,3.446,1.148,1.149,11.484h-3.446v-3.445h-1.149c-0.341-1.888,1.1-2.059,1.149-2.3Zm4.6,1.148h3.446l1.149,6.891-2.3-1.149v1.149h-1.148v-3.446h-1.149v-3.445Zm-6.892,12.632,3.446,1.149v-1.149h1.149v3.446l-3.446,1.148v1.148h-1.149v-5.742ZM690.356,427H693.8v1.148L696.1,427v1.148h1.149v3.446H696.1v1.148h1.149c1.124,1.9-1.654.972-2.3,1.148v2.3c-2.807.659-2.533,1.2-4.594,2.3v-2.3H691.5v-1.148h-1.148V427Z" />
        </a>
        <?php
        $kdwil = '19.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-4" d="M342.306,267.374l3.446-1.148v-3.445h4.595v-1.149H351.5a1.908,1.908,0,0,0,2.3,1.149v-1.149l4.595-1.148,2.3,3.445h5.743v1.148h1.149v3.446c3.6,0.872,3.784,2.292,5.743,4.593h1.149v2.3h1.149l1.149,2.3h2.3l1.149,2.3h3.446v1.149c1.8,0.916,3.651,1.034,4.594,0v2.3c4.174-.44,7.135-2.1,10.338-3.446h3.446l2.3-4.593h5.743v1.148c1.337,0.146,2.962-1.953,5.744-1.148v1.148h4.594l1.149,2.3h4.6v1.148c2.986,0.911,7.295-.528,9.189-1.148V277.71a23.422,23.422,0,0,0,4.6,1.148c-0.689,3.34-3.28,3.682-1.149,5.742h-2.3v5.742c2.66,1,5.062,1.168,9.189,1.148v-1.148h3.446v2.3h2.3c-1.125,2.538-1.91,3.237-2.3,6.89,1.3,0.969.167-.146,1.149,1.148l14.933,1.149,3.446,4.593h4.594l1.149,2.3h5.744c0.061,0.02-.087.677,2.3,1.149v3.445h1.149c1.338,1.563,2.1,1.755,4.594,2.3q-0.574,2.3-1.148,4.594l-2.3,1.148v4.594l-2.3,1.148v4.594l-2.3,1.148v3.445H479l1.149,2.3-2.3,1.149v3.445l-2.3,1.148-1.149,6.89h-1.149l1.149,2.3h-1.149v2.3h-1.148c-1.61,4.567.591,11.8,1.148,14.929l6.893,1.148q1.147,1.724,2.3,3.446h9.189v2.3c3.137,1.82,2.81,3.149,8.041,3.446v1.148h6.892v4.593h-2.3c0.491,4.922,2.089,5.7,2.3,11.484-1.992,1.029-5.668,4.42-8.041,4.594h-1.148v-1.149c-4.114-.422-6.5,1.2-9.19,2.3-2.665-10.081-6.8-.931-12.635-3.445v-1.148c-1.9-1.232-1.89-1.636-4.595-2.3v2.3c-8.14.7-10.245,5.887-18.379,6.89-1.392-2.444-2.587-2.5-3.446-5.742h1.149l-1.149-9.187h-2.3c-3.294-2.008.8-4.665-6.892-5.742v-2.3l-3.446-1.148c-0.611-11.672-8.4-9.652-22.974-9.187-1.309-1.308,0-.458-2.3-1.149-1.182-3.766.652-5.525-4.595-6.89v-2.3l-3.446-1.148-2.3-3.445h-4.6v-1.149h-8.041l-1.148-2.3-5.744-1.149q-0.574-1.147-1.148-2.3h-2.3v-1.148c-3.5-1.3-8.446.969-10.338,1.148v-1.148l-3.446-1.148c-1.072-3.967-2.857-3.892-6.892-4.594v-2.3l-17.23-1.148v-1.148l-2.3,1.148v-1.148h-2.3v-1.149h-6.892v-2.3l-6.892,1.149c0.06-2.116,1.174-7.952,1.149-8.039H321.63l-1.149-3.445h-2.3l-1.149-3.445-2.3-1.149v-2.3h-1.149V313.31H312.44v-3.445h-1.148v-2.3h-1.149v-4.594h-1.149v-1.148c0.44-1.564.907,0.457,1.149-1.149h-1.149q-0.573-2.3-1.148-4.593H306.7v-1.149h1.149v-4.593h1.148c0.852-2.825-.972-4.238-1.148-5.742h1.148v-2.3l3.446-2.3v-4.593l5.744-4.594V260.484h11.487v-1.149l6.892-1.148c0.331,0.759,3.185,7.737,3.446,8.039,1.063,1.228,1.148-1.149,1.148-1.149C343.055,263.954,342.132,266.731,342.306,267.374Zm232.033,87.278c0.106-4.2.754-4.518,2.3-6.891h1.148c0.989-2.041-1.148-3.445-1.148-3.445l3.446-4.593h2.3v1.148h1.149l-1.149,2.3,2.3-1.149v1.149c3.31,2.034,5.376,4.107,5.744,9.187h-1.149v4.593c-3.558,1.887-2.063,2.18-8.041,2.3C579.663,356.361,578.551,355.105,574.339,354.652Zm-57.434-13.781,5.744,1.148v1.149H521.5v1.148h-4.6v-3.445Zm17.23,2.3v4.593h-4.594v-1.148h-1.149l1.149-2.3h-1.149v-1.148h5.743Zm-29.865,9.187h4.594V353.5h-1.148v1.149h1.148c-1.2,1.494-2.347,1.71-3.446,3.445-1.3-.97-0.167.145-1.148-1.149-1.308-1.308-.458,0-1.149-2.3C504.429,353.343,503.579,354.648,504.27,352.355Zm10.338,5.742,5.743-1.149v-2.3c4.7,0.365,6.6,2.218,9.19,4.593q0.574,1.149,1.148,2.3c6.585,4.35,15.628-1.055,16.082,10.335q-2.871,4.02-5.744,8.039h-1.148v4.594h1.148q-0.573,1.722-1.148,3.445H528.392v-1.149h-2.3v-1.148h-1.149v1.148l-3.446-1.148V384.51h-2.3v-1.149a9.35,9.35,0,0,0-4.6-2.3v-2.3l-4.595-1.149v-1.148c-4.6-2.056-6.7-.424-8.041-5.742,2.922-2,2.189-3.593,3.446-6.89,3.851-1.315,5.636-.21,6.893-4.594h1.148c0.265-1.825-1.977-1.444-2.3-2.3V353.5a12.161,12.161,0,0,1,4.595-1.148V353.5h1.148C515.82,355.572,515.315,355.311,514.608,358.1Zm-24.122,11.484,3.446,1.148c-0.659,2.308.137,0.994-1.149,2.3v1.148c-2.309-.659-0.994.138-2.3-1.148h-1.149v-1.149Zm6.892,5.742h3.446v1.148h-1.149v3.445h-2.3v-4.593Z" />
        </a>
        <?php
        $kdwil = '19.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-5" d="M376.767,182.394q0.573,2.869,1.148,5.741l2.3,1.149q0.573,5.168,1.148,10.335l2.3,1.149q0.573,2.871,1.148,5.742h1.149v10.335h1.149v2.3h1.148v3.445l2.3,1.148v2.3l3.446,2.3v2.3l2.3,1.148q1.149,3.445,2.3,6.891l2.3,1.148v2.3h1.148q2.3,2.869,4.6,5.742h2.3V249c1.711,1.588,1.461.6,2.3,3.445,4.064,0.827,5.852,3.429,9.189,4.594l14.933,1.148a2.9,2.9,0,0,1,3.446-1.148v1.148h2.3l1.149,2.3h2.3l1.148,2.3h3.446v1.148h3.446v1.148l78.11,14.929q-0.573,1.724-1.148,3.446h-2.3q-0.573-1.149-1.148-2.3c-3.154-1.182-6.633,1.724-9.19,2.3q-0.574,1.722-1.148,3.445a27.044,27.044,0,0,1-4.595-1.149l-13.784,12.633-1.149,4.593h-2.3c-0.922,4.578-3.472,6.13-4.6,10.336l-4.595,1.148V313.31c-1.308-1.309-.457,0-1.148-2.3-2.3-.718-0.988.252-2.3-1.148h1.149v-1.149l-11.487-2.3v-1.148h-2.3l-3.446-4.594-14.933-1.148c0.254-4.718,1.661-6.369-1.149-9.187v-1.148h-3.446v1.148h-8.041v-6.89H438.8c1.866-2.852,1.924-2.162,2.3-6.891-3.394.632-13.039,3.844-17.23,2.3V277.71h-2.3l-1.149-2.3-16.081-1.148c-1.085,2.068-1.591,1.808-2.3,4.593L387.105,282.3c-1.877-2.726-.712-0.793-3.446-2.3v-1.148h-3.446V277.71h-2.3v-1.149l-2.3-1.148v-2.3l-3.446-2.3v-2.3h-2.3q-0.573-1.724-1.148-3.446l-2.3-1.148v-1.148h-5.743v-2.3h-8.041c-0.876.316-.456,2.489-2.3,2.3l-1.149-2.3h-2.3c-0.807,1.6-1.666,1.421-2.3,2.3-2.109,2.926,1.253,2.156-3.447,3.445v-1.149h-1.148v-4.593c-0.191-.355-2.626-1.988-3.446-3.445-4.8,1.857-10.052,2.323-17.23,2.3-2.366-4.341-4.276-7.3-8.041-10.335v-1.148h-2.3V246.7h-3.446v-1.148h-5.743v-1.149c-1.981-.923-4.541-0.726-5.743-2.3v-2.3h-1.149v-2.3h-1.149v-2.3h-1.148a9.337,9.337,0,0,1-2.3-4.593c1.238-.694,1.789-1.983,2.3-2.3h2.3v-1.148h3.446l1.149-2.3h3.446c4.367-1.531,4.111-.592,8.04,1.148l2.3-6.89,3.446-2.3V213.4h2.3c0.97-1.3-.145-0.167,1.149-1.148v-4.594l-4.6-1.148a39.274,39.274,0,0,1,1.149-9.187c4.291,0.516,8.1,4.284,13.784,2.3v-1.148h2.3v-1.148h4.595v-1.149h2.3v-1.148c2.332-2.145.811-2.283,4.595-3.445,1.792-6.53,3.3-2.161,6.892-4.594,3.466-2.349-1.635-5.872,6.892-6.89v1.148h2.3v1.149c1.948,0.531,4.46-2.074,8.04-1.149v1.149h10.339Zm-96.49,56.271h5.744a12.172,12.172,0,0,1,1.149,4.593,12.172,12.172,0,0,1-4.6,1.148Z" />
        </a>
        <?php
        $kdwil = '19.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-6" d="M242.371,48.032h2.3q-0.573,1.148-1.148,2.3h2.3l-1.149,2.3,2.3,1.148v3.445l2.3,1.148-1.149,2.3h1.149V59.516c2.435-.779,1.413,2.763,2.3,3.445,1.286,0.991.818-1.052,1.148-1.148l3.446,1.148v2.3a18.016,18.016,0,0,1,6.892-1.148c-0.388,8.407-3.176,5.115-6.892,9.187-0.123,2.293,1.809.881,0,2.3h-1.148v1.148h1.148l1.149,5.742a3.2,3.2,0,0,0-1.149,3.445H257.3v3.445h1.149l-1.149,2.3h3.446l-1.149,2.3h1.149V92.819l4.6,2.3V93.968h2.3V92.819c1.465-.7-0.008.906,1.149,1.148,1.545,1.731,1.112-2.183,1.148-2.3h2.3q1.722,5.167,3.446,10.335h-1.149c-1.309,1.308,0,.458-2.3,1.149,1.593,6.151,2.829,3.413,0,10.335l-3.446,1.149c-1.309,5.144-3.644,4.111-8.041,5.742l1.149,4.593h1.148v4.594l2.3,1.148q0.574,2.3,1.148,4.594c1.828,2.654,10.376,6.545,13.784,8.038q-0.573,1.724-1.148,3.446H277.98v5.741h-1.149c-2.335,2.6-2.555.851-5.743,2.3v1.149h-2.3v1.148l-3.446,1.148v1.149a11.2,11.2,0,0,1,4.594,1.148c-2.352,2.894-2.772.473-3.446,5.742,1.308,1.308.458,0,1.149,2.3,1.536,0.53-.373.581,1.149,1.148h5.743v1.149l-3.446,1.148v1.148c0.175,0.2,3.9-.654,2.3,1.149h-1.148c-1.343,1.237-7.287,2.015-10.338,1.148v-1.148l-2.3,1.148v-1.148l-3.446-1.149v1.149c-0.178.04-4.447-1.79-6.892-1.149v1.149h-8.041v-1.149h-2.3v-1.148h-2.3q0.575-1.147,1.148-2.3h-5.743l-1.149-3.445h-1.148c-1.374,1.193-7.771.6-4.595-2.3H219.4v1.149h-3.447q-0.573,1.147-1.148,2.3c-2.139.951-3.925-1.6-4.595-1.148v2.3l-2.3-1.149,1.148,2.3h-2.3l-2.3,3.445c-1.411,1.357-3.338,1.918-4.595,3.446h-1.149V175.5l-2.3,1.149V175.5h-2.3v-1.148c-2.484-.73-3.213.7-4.595,1.148v-1.148h-1.149v2.3c-2.665-.346-2.883-0.293-4.594-1.149v-1.148H182.64V175.5c-1.984.389-1.938-1.061-2.3-1.148-2.885-.7-4.164.832-5.743,1.148v-1.148H173.45V175.5l-6.892,1.149q-0.574,1.148-1.148,2.3h-1.149V177.8l-3.446,1.148-4.595-5.742-3.446-1.148,1.149-2.3h-2.3l-1.149-3.445h1.149v-1.148l-2.3,1.148v-1.148H148.18q0.573-1.149,1.148-2.3H148.18c-1.427.777,0.445,0.835-1.149,1.148v-1.148h-2.3v-1.148s-5.5,1.713-8.04,1.148c-0.3-.067-0.351-1.542-2.3-1.148v1.148c-3.677,1.232-2.234.339-4.594,0v1.148h-1.149c-1.62-.115.129-0.146-1.149-1.148h-1.148v-8.039h-1.149v-1.148h1.149v-1.149h-1.149c-1.252-1.873-1.628-1.91-2.3-4.593l2.3,1.148v-1.148h-1.149v-1.148h2.3c1.6-1.69.707-1.646,0-3.446h2.3c0.354-.547-1.775-2.527-1.149-4.593h1.149v-1.149H127.5c-0.387-1.452,2.591-2.917,3.446-3.445v-1.148l2.3,1.148v-1.148H132.1c-0.711-2.178,3.939-2.37,4.595-3.445v-2.3h3.446v-1.148c1.84-1.121,1.616-1.206,3.446,0v-2.3h1.148v-1.149h2.3v-1.148c2.648-1.05,6.06,1.211,6.892,1.148v-1.148l5.743-1.148,2.3-3.446,4.594-1.148,1.149-2.3H170v-1.148h2.3L176.9,106.6l3.446-1.148c3.291-4.386,3.856-11.39,8.041-14.929q-0.575-2.871-1.148-5.742a1.937,1.937,0,0,0,1.148-2.3h-1.148l-1.149-5.742-14.933-9.187v-2.3h6.892v1.148c0.294,0.037,2.674-1.038,4.595-1.148V64.11h-1.149c-0.356-1.584.692,0.41,1.149-1.148l-1.149-2.3h2.3c1.085-1.208-1.085-1.045-1.149-1.148-1.164-1.879,1.686-.985,2.3-1.148V57.219c1.625,0.01-.235.3,1.149,1.148h1.149V57.219l2.3,1.148V57.219h1.149l-1.149-2.3h1.149c1.308-1.308,0-.458,2.3-1.148v-2.3c3.929-.415,4.739-1.216,8.041-2.3V48.032l2.3,1.148V48.032c-1.809-1.444-.393-1.113,1.149-2.3V44.587l2.3,1.148,1.149-3.445h1.148v1.148c1.584,0.361-.381-0.6,1.149-1.148,3.095-1.1,6.45.9,8.041,1.148V42.29h8.041V41.142l4.594-1.148V37.7l2.3,1.148V37.7h-1.149V36.548h1.149V35.4h6.892c0.969,1.3-.146.167,1.148,1.148q-0.573,2.3-1.148,4.594l2.3,1.148a1.7,1.7,0,0,1-1.149,2.3Z" />
        </a>
        <?php
        $kdwil = '19.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-7" d="M930.43,260.484c3.44,0.892,3.021.707,3.446,4.593-2.069,1.085-1.809,1.591-4.6,2.3v-1.148h-1.149C926.828,263.463,929.748,261.767,930.43,260.484ZM804.075,291.49c3.173,0.831,2.57.321,3.446,3.445h1.149v4.594c-1.308,1.308-.458,0-1.149,2.3h2.3c0.623-2.725,1.079-2.686,2.3-4.594h1.148c0.83-1.823-1.128-2.19-1.148-2.3v-1.148h1.148v-4.593h1.149c1.83-1.706,6.768-1.254,10.338-1.149,1.294,1.974.727,1.556,3.446,2.3v2.3c4.067,0.436,3.488,1.424,6.892,2.3v2.3l4.595,2.3a12.159,12.159,0,0,0-1.149,4.594c2.447,0.41,2.244,1.131,2.3,1.148h6.892l2.3,3.445,3.446,1.149,6.892,8.038,5.744,3.445v6.891h1.148v2.3H868.4v3.446l2.3,1.148v3.445l2.3,1.149v11.483l-3.446,2.3v1.149H866.1l-1.149,3.445-3.446,2.3v11.483h-2.3l-3.446,4.594c-1.043,1.045-4.025,7.942-3.446,10.335h1.149l1.149,8.039-2.3,1.149q-0.573,2.3-1.148,4.593l-2.3,1.148v2.3l-3.446,2.3,1.149,4.594h3.446v1.148c1.308,1.308.458,0,1.149,2.3l-3.446-1.149-4.6,5.742h-3.446v1.149h-2.3v1.148c-5.183,1.81-11.116-3.1-13.785-1.148-2.883,1.626-3.292,2.354-3.446,6.89,4.513,2.56,2.773,4.586,2.3,10.335H806.372l-6.892,5.742v-1.148c-3.972-2.276-3.663-6.247-3.446-12.632h1.149l-1.149-8.039-2.3-1.148-1.149-3.446c-1.653-1.122-3.519.441-4.595-1.148-2.5-3.7,3-3.936-3.446-5.742-1.555-1.822-2.491-1.994-5.743-2.3v-6.89c-3.679-1.472-6.327-1.932-6.892-6.89h-3.446v-1.149c2.784-2.241,3.767-4.234,2.3-8.038h-1.149v-6.891c-1.433-.452-2.415,1.029-2.3-1.148,0,0,2.366-.073,1.149-1.148h-2.3c-0.2-1.612.036,0.034,1.149-1.149-0.883-1.565-1.013-1.236-2.3-2.3v-1.148h-3.446c-0.041-1.624.1,0.089,1.148-1.148l-3.446-4.594-2.3,1.148v-2.3l-3.446-2.3v-1.148h-2.3l-1.149-2.3-2.3,1.148v-2.3h-1.149l-1.149-3.445c3.137-1.819,2.809-3.149,8.041-3.445V348.91h3.446v2.3a50.942,50.942,0,0,0,12.635-1.148V348.91h-1.148v-1.149q0.575-1.148,1.148-2.3h-2.3l1.149-6.891,2.3-1.148c0.18-2.29-1.757-.817,0-2.3,3.464-3.189,12.416-1.31,18.379-1.148v-2.3c3.528,1.128,2.367.4,6.892,0,0.785-2.445.021-2.338,2.3-1.149v-2.3l2.3,1.148q0.574-2.3,1.148-4.593c1.3-.97.168,0.145,1.149-1.149h-2.3v-2.3c-1.243.659-2.408,3.1-4.6,2.3V322.5h-2.3l1.148-2.3h-2.3v-2.3c-2.508-1.378-3.784-2.531-4.595-5.742-1.18.47-9.835,2.643-5.743-1.148H781.1v1.148c-1.9,1.034-.99-1.579-1.148-2.3-3.547-.81-4.887-2.239-5.744-5.742l2.3,1.148v-3.445l2.3,1.148v-1.148h1.149c-1.147-3.971-.2-5.9,0-12.632h2.3v-2.3l3.446-1.149V286.9c1.778-1.523,3.481-4.82,4.6-6.891,4.74,0.737,7.66.275,12.635,1.149a15.277,15.277,0,0,0,3.446,4.593C805.427,287.9,804.671,288.752,804.075,291.49Zm174.6-4.593h-3.446c-1.085-2.069-1.591-1.808-2.3-4.594,1.3-.969.167,0.146,1.148-1.148h2.3C977.633,283.541,978.227,283.188,978.674,286.9ZM863.806,398.29h-4.6v-2.3h-1.148q0.575-1.724,1.148-3.446c3-1.587,1.945-2.031,6.893-2.3V391.4h1.148v1.148H866.1q0.573,1.149,1.148,2.3C865.208,396.977,865.073,393.586,863.806,398.29Zm3.446,36.749V429.3l4.6-1.149V429.3H873v4.593h1.148v1.149c-2.308.658-.994-0.138-2.3,1.148Zm29.866,1.148v4.594c-2.069,1.084-1.809,1.59-4.6,2.3v-1.148c-1.167-.885-1.131-1.411-2.3-2.3C891.853,436.75,892.58,436.341,897.118,436.187Zm1.149,10.336-1.149,5.741c-1.3.97-.167-0.145-1.149,1.149h-3.446v-4.594C894.91,447.563,894.557,446.97,898.267,446.523Zm1.148,4.593h2.3v3.445h-1.149c-1.309,1.308,0,.458-2.3,1.149Q898.84,453.414,899.415,451.116Z" />
        </a>
        <?php
        $kdwil = '19.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-8" d="M365.28,165.168h-2.3v2.3h3.446v-1.148c0.743-.33,3.923-1.192,5.744,0v1.148c3.157,2.635,3.544,6.62,3.446,12.633-2.58.448-5.444,2.123-9.19,1.148V180.1h-5.743v1.148h-3.446c-1.393-2.443-2.587-2.5-3.446-5.742-4.78-.169-5.424-1.445-9.189-2.3-1.006-2.659-1.169-5.06-1.149-9.187,2.66-1,5.062-1.168,9.189-1.148v1.148h5.744v-2.3h2.3c1.055-.455.661-3.275,3.446-2.3v1.148h1.149v4.594Z" />
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
                    url: "ambil_babel_kiri.php",
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