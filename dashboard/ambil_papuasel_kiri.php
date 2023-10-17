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

<div class="container-fluid mt-4 text-center">
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="20%" height="20%" viewBox="0 0 864 1080">
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
                .cls-4 {
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
            </style>
            <filter id="filter" x="45" y="482" width="794" height="592" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="258" y="180" width="364" height="489" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="522" y="119" width="310" height="502" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="27" y="6" width="585" height="468" filterUnits="userSpaceOnUse">
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
        $kdwil = '93.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Merauke_01" data-name="Kab Merauke 01" class="cls-1" d="M795,487q-0.5,9.5-1,19h-1v2h-1c-0.3,2.024.472,1.213,1,2,4.132,4.469,8.876,1.657,9,11h-1q-0.5,3-1,6c4.978,1.916,4.154.865,6,6h1v4s-3.22,2.638-3,4h1v1h3c1.34-2.041,1.637-1.878,5-2q0.5,3,1,6c2.73,1.27,3.292,2.532,7,3,1.419-2.162,2.366-2.01,6-2q0.5,1,1,2c3.506,3.606,2,15.194,2,22v61h1v2h1V909l-2,1v1h1v3h1v36h-1v4h-1v1l2,1v88c-0.07.2-1.764,0.43-2,2,0.667,0.33,1.333.67,2,1,1.6,4.39-.381,18.35-2,20v1h-7c-2.028-2.3-4.977-2.6-8-4v-1h-4v-1h-4q-8-4.005-16-8c-1.333-1.67-2.667-3.33-4-5h-2c-0.333-.67-0.667-1.33-1-2l-4-3v-2c-2-1.67-4-3.33-6-5v-2l-4-3v-2c-1.667-1.33-3.334-2.67-5-4v-2c-1-.67-2-1.33-3-2-0.333-.67-0.667-1.33-1-2h-2l-5-6h-2l-2-3h-2c-1.333-1.67-2.667-3.33-4-5h-2l-5-6-2-1v-2l-5-4v-2l-3-2v-2l-2-1q-0.5-2-1-4l-2-1v-2l-3-2v-2l-2-1q-0.5-1.5-1-3h-1v-2l-2-1q-0.5-2-1-4l-2-1q-2-6-4-12l-16-13-21-22h-2q-0.5-1-1-2l-3-1v-1h-2l-2-3h-2l-10-12h-2l-4-5h-2l-2-3h-2q-0.5-1-1-2l-3-1v-1h-2q-0.5-1-1-2h-2q-0.5-1-1-2h-2q-0.5-1-1-2h-2v-1l-3-1q-0.5-1-1-2h-2q-0.5-1-1-2h-2q-0.5-1-1-2l-3-1-2-3h-2l-2-3h-2l-4-5c-6.593-6.581-14.415-13.518-17-24l-4-1v-1H562v-1l-13-1v1h-3v1c-5.309,5.16,2.07,12.841-10,13q-0.5-1.5-1-3h-1c-2.534-4.7,3.773-7.906-3-10v-1h-6l-17,5v1h-2v1h-2v1l-6,2v1h-3v1l-4,1v1h-3v1h-2v1l-6,1v1h-3v1h-3v1h-3v1h-4c-4.372,1.448-14.581,4.077-21,3-5.151-.865-12.954-2.771-17-5v-1h-2l-15-17h-5v1l-10,2v1h-3v1l-6,2v1h-2v1l-4,1-1,2h-2l-1,2h-2l-1,2c-3.074,2.069-4.753.6-6,5-2.672,3.167.4,10.354-1,15-2.431,8.04-7.27,14.564-9,23-9.641,1.009-16.776,4.649-25,7-4.516,1.291-14.089-1.17-17-2H307v-1H295v-1h-9v-1h-7c-5.887-1.8-16.1-3.186-19-8h-1q-0.5-3-1-6h-2l-3,5-2,1v2l-4,3v1h-2l-2,3h-2q-0.5,1-1,2h-2v1h-2v1h-2v1h-2v1h-2v1h-4v1h-4v1h-6c-2.484.719-16.27,2.451-20,1v-1h-2l-3-5-4-1v-1c-3.815-1.386-10.6.6-13,1l-22-1v1h-7v1l-4,1v1c-3.9,1.352-9.645-2.252-12-3l-23-1-32,6c-4.209,1.918-8.735,12.368-16,10v-1l-4-1a60.089,60.089,0,0,1-4-10l2-19h1l1-11c3.292-10.142,6.337-21.289,11-30v-2h1v-2h1v-2h1v-2h1v-2h1v-2l2-1v-2l2-1v-2l3-2v-2l4-3v-2l3-2v-2h1v-4h1v-4h1v-4h1v-3h1v-2h1v-3h1l2-6h1v-2h1v-2h1v-2h1v-2h1v-2h1v-2l2-1v-2h1v-2h1v-2h1v-2l2-1v-2h1v-2h1v-2h1v-2l2-1v-2l12-11v-2l2-1,1-3h1v-2h1v-2h1v-2h1v-2h1v-2l2-1,1-4,3-2v-2l2-1,6-7h2l7-8h2v-1l3-2,2-3h2l2-3,3-1q0.5-1,1-2l4-1q0.5-1,1-2l3-1v-1h2v-1h2v-1h2v-1h2v-1h2v-1h2v-1l6-2v-1h3v-1h2v-1l6-1v-1h3v-1l7-1v-1h4v-1h4v-1l11-1v-1l16-1v-1h7v-1h6v-1h6c10.837-3.237,28.2-5.789,40-2h4l14,7,1,2h2l6,7,3,2c3.686,5.477,3.337,13.552,9,17,0.844,1.135-.127.145,1,1v-2c-2.766-2.52-1.6-4.459-3-8h-1v-3h-1v-3h-1v-3h-1v-3h-1v-2h-1q-0.5-2.5-1-5l-2-1-1-4-3-2-1-4h-1c-0.974-3.438,1.451-2.939,2-4-0.058-1.413-.806.4-1-1v-7c-8.992.3-13-.951-19-3h-5v-1h-3v-1h-3v-1l-6-2v-1c-3.64-1.907-5.459-.683-8-4h-1v-8h1v-3a89.417,89.417,0,0,1,16,3h29v1h8v1h5v1h5v1h4v1h3v1h3v1h3v1l20,1,11,4v1h2v1h5v1l11,1v1l28,1v1h6v1h5v1h4v1h4v1h7v1h5v1h4v1l6,1v1l4,1v1l5,1,1,2,6,2,1,2h2l1,2h3v1c4.105,1.348,11.456-1.266,14-2h20v-1h2q0.5-1,1-2h2q0.5-1,1-2h2q0.5-1,1-2h2v-1h2v-1h2v-1h2v-1h2v-1h2c8.155-4.351,11.034-7.9,24-8v-3l3-2v-1h2q0.5-1,1-2l4-1v-1h3v-1l4-1v-1h3q0.5-1,1-2h2v-1l3-1q0.5-1.5,1-3h1v-2h1q0.5-2.5,1-5l8-7,2-3h2q0.5-1,1-2h1v-2l3-2v-2l2-1v-2l2-1q0.5-2,1-4l2-1,6-7h2l5-6h2l2-3h2l2-3h2l2-3h2q0.5-1,1-2h2q0.5-1,1-2h2q0.5-1,1-2h2v-1l3-1q0.5-1,1-2h2l2-3h2l4-5h2l9-10,3-2v-2h1v-3h1c1.767-3.506-.509-3.633,4-5,2.126-2.026,5.538-.524,8,0q1,3,2,6l2,1q0.5,2.5,1,5h1v3h1v4h1v12h1q0.5,4.5,1,9c-3.1,1.677-4,3.032-4,8,1.326,1.048.984,1.9,2,3h1c3.294,3.454,5.01,5.988,5,13l4,1v-1h2q0.5-1,1-2l4-1v-1l11-1c1.139,1.139,0,.4,2,1q0.5,2,1,4h1v-2l2-1v-1c5.553-3.157,14.128,1.572,20,2a10.6,10.6,0,0,0,1-4c-4.2-3.764-4.521-11.373-7-17h-1v-2h-1v-3h-1v-2l-2-1q-1-3-2-6h-1v-3h-1q-0.5-6.5-1-13h-1v-3h-1q-0.5-2-1-4h-1c-2.378-5.966-2.091-14.57-1-21l3-1v-1h9l13-12h5C788.869,487.205,790.31,486.932,795,487ZM376,699c1.139,1.139,0,.4,2,1C376.861,698.861,378,699.6,376,699Z" />
        </a>
        <?php
        $kdwil = '93.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Mappi_02" data-name="Kab Mappi 02" class="cls-2" d="M616,613c-0.037,4.652-1.217,5.545-2,9-2.761,1.251-4.217,2.535-7,4v1l-12,4q-0.5,1-1,2c-6.789,4.482-13.078,8.71-24,9v2c-0.826,1.319-9,3.934-11,5v1h-2v1h-2v1h-2v1h-2q-0.5,1-1,2h-2q-0.5,1-1,2h-2q-0.5,1-1,2h-2v1H522c-3.042.846-13.987,3.9-19,2v-1h-2l-1-2-4-1-1-2-4-1v-1h-2v-1h-2v-1l-6-2v-1l-10-2v-1l-12-1v-1h-4v-1h-4v-1h-5v-1h-7v-1H425v-1H412v-1h-4v-1h-8v-1h-4v-1l-6-2v-1h-3v-1l-16-2h-8v-1h-3v-1h-3v-1h-3v-1h-4v-1h-5v-1h-6v-1h-7v-1H303a50.6,50.6,0,0,0-13-2,26.183,26.183,0,0,1,2-10h1c1.587-5.032-2.364-15.569-4-18l-11-10h-2l-1-2h-2v-1l-2-1v-2l-3-2v-2l-2-1v-2h-1c-1.931-3.546-1.968-7.386-2-13h1l1-3,4-3v-1h2v-1h2v-1h3v-1h7c2.494,0.75,5.171,2.365,8,3v-1c-2.651-1.494-4.533-4.411-6-7v-2l-2-1v-2l-4-3v-2l-3-2c-3.211-4.7-4.057-11.7,1-15,4.311-4.525,10.322.851,15,2v-1c-4.208-1.9-3.1-1.968-5-6h-1c-1.287-3.276-.328-10.884,1-14h1v-2h1v-6l-5-6c-4.577-3.329-10.256-5.889-11-13h2q0.5-2.5,1-5h4v-1c4.335-1.187,3.427-3.187,6-5h2l1-2h2v-1h2v-1h2v-1h2v-1h2l1-2,4-1,1-2h2l3-4,3-1v-2l3-2v-2h1v-2h1v-4h1v-4h1l1-4,2-1v-2h1l2-6h1q0.5-5,1-10h1v-2l2-1v-2l3-2v-5l2-1,2-3h2l6-5v-3h1V297c0-5.434-1.28-24.366,1-27,1.057-3.9,6.462-8.553,10-10l6-1,2-3h2l1-2h3v-1h2v-1h3v-1c3.437-1.769,4.793-2.853,10-3l2,3h1v2c1.59,2.774,4.1,5.538,5,9,7.211,1.367,15.121.5,22-1a2.64,2.64,0,0,1,3,1l17-1c12.831-3.825,22.9-5.8,40-6a13.3,13.3,0,0,1,3-4c-3.614-19.639,3.454-30.231,15-38l1-2,4-1v-1h3v-1h3v-1h3v-1h3v-1h3v-1h2v-1h2q0.5-1,1-2h2q0.5-1,1-2h2v-1l4-3v-2h1c1.877-4.369-1.418-5.354,4-7,1.99-1.749,4.758.023,7,1,3.093,7.083,4.664,15.945,7,24q1,10,2,20c1.46,4.951,3.544,15.089,1,21h-1q-1,3-2,6l-3,2-8,9-4,3q-0.5,2.5-1,5h-1c-1.046,3.314.6,6.774,1,9,9.829,4.317,25.1,13.171,29,23q0.5,7,1,14c2.835,10.262,1,28.7,1,41v20h-1c-0.8,1.762-.639,3.906-2,5h-2q-0.5,1-1,2h-2v1h-1v2h-1c-1.652,4.209.786,11.023-1,15l-6,8h-2v1l-3,2v2l-4,3v2l-3,2q-0.5,1.5-1,3l-2,1c-1.731,2.094-1.85,4.172-2,8,1.986,1.729.845,2.326,2,4l2,1,5,6h2q0.5,1,1,2h2v1h2v1h3v1h4v1h7v1h1v-1h7v-1h3v-1l6-2v-1c5.508-2.2,14.021-.694,21-1,4.6-.2,8.516-2.384,12,1h1c1.938,22.055,1,48.293,1,72v21q0.5,3.5,1,7h-1v2h-1v3h-1v1h1v1h-1q-0.5,2-1,4h-1c-2.224,6.025,2.913,10.786,4,14v11h1v4h1c1.354,4.347-1.239,8.588-2,11v8a3.982,3.982,0,0,1,2,2Z" />
        </a>
        <?php
        $kdwil = '93.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Boven_Digoel_03" data-name="Kab Boven Digoel 03" class="cls-3" d="M621,124a9.749,9.749,0,0,0,1,4c3.856-.724,12.338-4.416,17-3v1h3v1h8l3,4h1q0.5,2,1,4l2,1v2h1v2h1v3h1q1,3,2,6l4,3,2,3h5v1h2q0.5,1,1,2l6,2q0.5,1,1,2h2v1l4,1v1l12,2h7v1h2q0.5,1,1,2h2v1h2v1h3v1l17,1c1.715,0.512,5.8,3.078,9,2v-1h2v-1l5-1,2-3h2v-1l10,1v-1h2v-1l21-1v-1h3v-1l4-1v-1h2l2-3h5v-1l10-1q0.5,1,1,2s-2.153.181-1,1h2c2.39-2.065,5.626.849,8,2q0.5,15.5,1,31v13h-1v3c0,6.229,2.937,20.675,1,28h-1v4h1v17h-1q0.5,22,1,44h-1q0.5,17,1,34c-2.6,9.232,0,20.787,0,31q-0.5,12-1,24c0.971,3.475,2.379,17.1,1,22h-1v6l-6,3q0.5,2.5,1,5h1c0.317,1.745-.911,1.654-1,2v4h-1q-1,3-2,6h-1q-0.5,2.5-1,5l-3,2v5c2.63,1.606,3.839,3.8,4,8l-8,1c0.3,6.511,3.54,6.5,4,13-1.134.569-1.613,1.778-2,2-1.615.927-2.948-.329-4,1v2h-1v2l-3,2v1c-3.45,2.062-4.383-1.554-6,4h-5q-1,2-2,4h-5v1c-3.412,1.716-5.92,2.992-7,7a8.5,8.5,0,0,0-4,2v1l-13,2a34.3,34.3,0,0,0,2,21v3l2,1v3h1v7h1v7h1v3l2,1q1,3,2,6h1q1,3,2,6h1q0.5,3,1,6h1v2h1v3h1l3,9c-2.612,1.382-1.693,1.769-6,2-2.629-2.834-12.93-4.182-16-1h-1v4h-2v-3c-4.073-2.366-3.755-3.073-11-3v1l-5,1v1h-2q-0.5,1-1,2h-6q-1-5-2-10l-2-1c-2.7-2.981-4.621-4.482-5-10,1.919-1.485,5.363-5.374,4-10h-1v-4h-1V541q-2-6-4-12l-2-1v-3h-1c-1.371-1.768-2.683-2.447-4-4l-6,2q-0.5,1.5-1,3h-1q-0.5,2.5-1,5h-1v2l-6,5-6,7h-2l-3,4h-2l-2,3h-2l-2,3h-2q-0.5,1-1,2h-2q-0.5,1-1,2h-2q-0.5,1-1,2h-2v1l-3,1q-0.5,1-1,2h-2q-0.5,1-1,2l-3,1-3,4h-2l-4,5h-2l-6,7-2,1v2l-2,1q-0.5,2-1,4l-2,1v2l-4,3v2h-1q-0.5,1-1,2h-2l-4,5h-2q-0.5,1.5-1,3l-2,1v2c-0.979,1.124-2.035.706-4,1q-0.5-1.5-1-3h-1q1-7,2-14h1q-0.5-2.5-1-5h-1q-0.5-7.5-1-15h-1v-3l-2-1v-2h-1c-0.89-2.549,1.274-8.342,2-10h1q0.5-4,1-8l2-1v-1h-1v-4h-1V480c0-8.978.32-19.575-1-27-6.851-1.166-24.2-2.22-31,0v1h-3v1h-2v1l-4,1v1h-3v1c-8.987,2.861-25.024-4.186-29-7l-4-5-2-1c-0.777-1.112-3.569-7.051-3-9h1q0.5-2,1-4l4-3v-2l3-2v-2l13-12v-2h1v-2h1V395h1v-2l8-6v-2h1V318h-1v-7h-1v-3h-1q-0.5-2-1-4l-5-4q-0.5-1-1-2h-2l-2-3h-2v-1h-2q-0.5-1-1-2l-4-1q-0.5-1-1-2c-1.274-.8-6.392-1.908-7-3V275l5-7,3-2v-1h2v-1l3-2v-2l4-3v-2h1v-2h1v-3h1c0.98-2.931.963-11.779,0-15h-1v-6h-1q-1-10-2-20c-2.315-7.727-3.937-16.237-7-23,4.26-2.245,6.268-2.086,13-2,2.414,2.277,6.985.38,10,0l3-4h1q0.5-3.5,1-7l4-2q1-3,2-6,7.5-9,15-18-0.5-4.5-1-9l4-1a34.651,34.651,0,0,1-1-7c2.663-1.412,4.22-2.03,9-2v1h4v-2C611.766,126.987,613.365,124.208,621,124Z" />
        </a>
        <?php
        $kdwil = '93.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>
        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Asmat_04" data-name="Kab Asmat 04" class="cls-4" d="M220,47c9.382-1.442,22.54,1.5,31,4,8.2,2.424,13.665-4.786,22-2v1h2v1l4-1V49h6V48l11,1V48h15v1h3v1c2.969,1.533,3.236,2.472,7,3,2.33-3.262.914-1.667,4-1l1-2a14.787,14.787,0,0,1,8-3c2.3,2.554,6.128,2.96,9,5l7,9h4c5.875,0.254,8.685.218,10,5h-1c-3.756,4.245-8.881,2.655-9,11a12.7,12.7,0,0,0,5,1V77l6,1v1h8c1.679,2.84,3.451,2.719,4,7-4.9,2.126-7.861,3-11,7h-1v3l-3,1-1,2c-3.92,2.438-13.782,2.042-19,3v4l12,2v1h3v1h3v1h10v1h9v1h12v1h18v1h32v1h17l6,1c2.458-.544,7.876-3.311,12-2v1l9,3,3,4,4,1v1h2v1l6,2v1h10v1h57v-1h2v-1h3v-1h4v-1l24-1v1l6,1v4a12.71,12.71,0,0,1-5,1v-1l-6-1v1h-1v8h-1c-1.139,1.139,0,.4-2,1,0.7,3.68,1.185,7.65-1,11l-4,3v2l-2,1v1l-3,2v2l-3,2v2l-2,1v2h-1v2h-1v2l-4,2v4a11.926,11.926,0,0,1-5,6c-1.649,1.655-9.8,3.183-14,2v-1h-7q-0.5,1-1,2c-1.966.508-5.661-2.923-7-3-0.752-.043-1.92.921-4,1q-0.5,2-1,4h-1v4l-3,2-2,3h-2q-0.5,1-1,2h-2q-0.5,1-1,2l-4,1v1l-6,1v1l-6,1v1h-2v1h-3v1h-2l-1,2h-2l-2,3c-3.417,3.359-7.981,7.381-10,12q-0.5,3.5-1,7h-1v12h1c0.793,3.034-.631,4.848-1,7l-24,2v1h-4v1h-4v1h-5v1h-4v1h-6v1H408v1h-7v1h-1v-1l-5-1c-1.05-2.5-3.106-4.106-4-6v-3h-1c-2.061-3.81-2.019-4.981-8-5-4.008,4.665-10.865,4.623-16,8l-2,3h-2v1h-4v1l-4,1-7,8V378h-1l-1,4-3,1-1,2h-3v1l-3,2q-0.5,3-1,6l-3,2v2l-2,1v3h-1q-0.5,4.5-1,9h-1l-1,4h-1l-1,4-2,1v2h-1q-0.5,3.5-1,7h-1v3h-1v2h-1v2l-2,1v2l-3,2v1h-2l-2,3h-2l-1,2h-2l-1,2-4,1v1h-2v1l-6,2-1,2h-2l-1,2c-1.549,1.449-3.652,2.359-5,4h-4c-0.262,3.176-1.01,3.822-2,6h-2c-1.605-2.512-5.01-3.817-7-6l-1-3-2-1v-1h-2l-3-4h-2l-4-5-3-1-9-10-3-1-2-3h-1v-2l-2-1q-0.5-2.5-1-5h-1v-8h-1q-0.5-3-1-6h-1v-2h-1l-3-13h-1q-0.5-7.5-1-15h-1q-0.5-3-1-6l-2-1q-0.5-2-1-4h-1l-2-6h-1v-3h-1v-2h-1v-3h-1l-2-6h-1v-2h-1q-0.5-2-1-4l-2-1v-2l-2-1v-2l-4-3c-2.339-3.258-7.1-9.8-5-17h1q0.5-3,1-6c-1.128-.593-1.565-1.74-2-2h-2v-1h-9v-1l-6-1a21.928,21.928,0,0,0-4-5V287l-8,1v1h-9l-2-3h-1q-0.5-2.5-1-5h-1v-2h-1q-0.5-3-1-6h-1q-0.5-5-1-10c-0.426-1.477-1.882-6.011-1-9h1q0.5-3.5,1-7l5-4v-1c0.224-.129,3.509-0.793,4-1v-1c-5.113-.586-5.065-3.527-8-6-1.5,1.759-2.7,1.9-6,2a62.513,62.513,0,0,0-4-6h-2v-1l-5-4v-2l-2-1-4-5-5-4v-2l-4-3c-2.575-3.523-.855-4.354-7-5v-1h-1v1h-4v1H99v1H91c-2.909-.31-4.057-1.741-6-3v-1l-12,2-1-4-2-1c-1.846-4.272,2.645-8.715,1-11-0.727-2.582-1.557-3.253-3-5H67v-2l-2-1v-1l-2-1v-2H62l-2-3H58l-1-2-6-1v-1H48v-1H45v-1H43v-1H40l-1-2H37l-3-4-2-1v-9c1.1-.6,1.566-1.738,2-2h2v-1l16-1c1.094-2.078,1.611-1.771,2-5h1l-3-9h1c1.062-4.095,3.012-3.918,6-6l2-3h7v-1h3v-1h3v-1h2l1-2c1.805-.75,5.965.56,7,1v1h4v1l3-1c0.842-1.952,2.224-4.985,3-7v-3h1l1-4h1v-3h1c1.353-4.5-2.762-5.9-2-9h1V91l5-3,3-10h1V76h1c2.857-5.443,3.19-9.091,2-16l-5-1V58h-3l-1-2-4-1-2-3H92l-4-5-3-2V43l-4-3V37l-2-1V34l-2-1V31H76V22a9.376,9.376,0,0,0,2-2h3V19c3.944-1.334,8.027.193,11-2V16c3.467-3.379.057-4.444,7-5,1.857,2.129,4.6,2.335,7,4l2,3h2l1,2c2.255,1.389,5.254,1.022,8,2v1l16-1v1a18.933,18.933,0,0,0,8,2c1.723-2.034,2.187-.828,4-2l1-2a15.275,15.275,0,0,1,9-3c2.078,2.063,6.987,2.839,10,4,0.705,2.163.114,6.364,1,9,0.819,2.437,7.376,15.222,9,16h7c1.279-1.569,8.7-6.779,12-6v1l5,1,1-2c2.295-1.227,5.506-1.009,9-1,1.033,2.027,2.91,4.081,4,6v2l2,1v2h1c0.817,1.551.208,5.719,1,7h1V47Z" />
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
    $(document).ready(function() {
        $("#kiri_peta").on('click', function() {
            var provinsi = $("#provinsi").val();
            var tahun = $("#tahun").val();
            var indikator = $("#indikator").val();
            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_papuasel_kiri.php",
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
                url: "ambil_papuasel_kanan.php",
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