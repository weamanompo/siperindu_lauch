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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="50%" height="50%" viewBox="0 0 1043 657">
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
            <filter id="filter" x="362" y="400" width="390" height="91" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="258" y="407" width="89" height="88" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="759" y="3" width="163" height="269" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="353" y="493" width="108" height="135" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="522" y="154" width="108" height="89" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="297" y="403" width="84" height="86" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="384" y="426" width="26" height="27" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_8" data-name="Color Fill 8" class="cls-1" x="-100" width="1043" height="657" />

        <?php
        $kdwil = '21.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-2" d="M408,405a39.688,39.688,0,0,0-1,8c1.237,0.986,1.956,3.21,3,4h2l1,2h1q0.5,3,1,6c0.121,0.415,1.323.206,1,2-0.331,1.839-3.54,5.156-2,9h1c0.8,1.452.733,1.692,1,4h-4a19.168,19.168,0,0,0-1,7h-1v3l-4,1v-1l-5-1c0.982-4.125,3.425-6.116,4-11-2.39-1.361-3.35-2.852-4-6l-3-1v-1h-1v1h-4l1-3,3,1v-1c1.135-.844.145,0.127,1-1a21.9,21.9,0,0,1-5-4l-6,1c-0.607,2.393-.318,1.858-2,3v1c-0.851.435-2.04-2.114-4-1v1c-1.139,1.139-.4,0-1,2l-10-1c-0.844-1.135.127-.145-1-1-0.255-5.1-1.393-3.494-2-8a21.9,21.9,0,0,0,5-4l8-1v-5h6v-2c4.909,0.222,5.726,1.947,9,3h7a9.375,9.375,0,0,1,2-2c0.274-.509.7-3.279,1-4h3Zm319,15h-4q0.5-1.5,1-3c2.01,0.574.865-.12,2,1C727.139,419.139,726.4,418,727,420Zm7,3,4,1v3C735.073,426.316,734.726,425.887,734,423Zm-302,4,3,1v-1h1v2h1v5h-1v-2l-5-3Zm308,1h3c-0.723,2.762-.279,2.237-3,3v-3Zm4,1h2c-0.463,2.391-1.158,3.145-2,5h-2v-1C743.909,431.744,743.659,431.986,744,429Zm-12,8c-2.739-.644-2.276-1.309-5-2q0.5-1.5,1-3h2v1l2-1v1c0.416,0.579,1.633.146,1,2h-1v2Zm-319,5h2l-1,3h-1v-3Zm6,0h1c1.037,1.9-.684,4.161-1,5-1.135-.844-0.145.127-1-1h-1Zm-4,4h1c1.037,1.9-.684,4.161-1,5h-1A11.878,11.878,0,0,1,415,446Zm-12,9v2l-2-1s-0.181,2.153-1,1v-2h2v-2h1v1c0.4,0.038,2.244-.884,4-1,0.844,1.135-.127.145,1,1-1.139,1.139,0,.4-2,1v1Zm8-1v2h-3v-1h1C410.139,453.861,409,454.6,411,454Zm15,0v3c-2.767-.442-4.7-1.04-6-3h6Zm-14,4,3,1-1,3C410.335,460.712,410.587,462.243,412,458Zm15,3h-2v-1h1v-1C427.139,460.139,426.4,459,427,461Zm256,12-3-1q0.5-1.5,1-3c1.139,1.139.4,0,1,2C683.139,472.139,682.4,471,683,473Zm40,10h3v2h-3v-2Z" />
        </a>
        <?php
        $kdwil = '21.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-3" d="M273,412h3v1c-1.139,1.139-.4,0-1,2-1.135-.844-0.145.127-1-1C272.861,412.861,273.6,414,273,412Zm-10,3,3,1c-0.844,1.135.127,0.145-1,1-1.139,1.139,0,.4-2,1v-3Zm14,10c0.463,2.391,1.158,3.145,2,5h-5c-2.559-3.437-1.954-.272-5-2v-1c-2.58-1.974-2.92-2.288-3-7,2.672-2.271,1.811-3.741,7-4-0.867,2.588-.2,5.021,1,8Zm2,10a9.733,9.733,0,0,1,4,1v1h-2C280.229,435.984,279.771,436.016,279,435Zm1,2v2c3.506,0.8,3.9,1.772,4,6h-4c-1.584-2.731-2.742-2.446-3-7Zm9,4,1,3h-2v1c-1.4.226,0.268-.374-1-1-1.139-1.139-.4,0-1-2Zm-17,2h3v4c3.125,1.776,4.734,4.065,9,5,0.989,3.748,2.661,3.079,3,8h-1q-0.5,2.5-1,5l-2,1-1,4-6-1c-0.768-5.578-2.089-3.106-4-6l-1-4h-1C267.74,452.936,271.43,448.28,272,443Zm47,2v2h3v1h-1c-0.227,1.588,1.735,1.262,2,2v5c-4.553-.81-8.931-3.645-10-8h-1v-3c1.135-.844.145,0.127,1-1Zm12,1a14.809,14.809,0,0,1-1,6c-1.135-.844-0.145.127-1-1-3.63-1.909-5.288-4.146-7-8h3v1h3v1Zm-28-2h3v3h-1c-1.139-1.139,0-.4-2-1v-2Zm8,0v2h-4v-1h1v-1h3Zm-34,1c6.238,0.937,10.793,2.944,12,9-3.038-.771-3.849-2.392-6-4v-1h-3v-1l-3-1v-2Zm32,6-1,3-2-1-2-4h4v1h-1C305.111,450.859,309,451,309,451Zm23,1h3v4h-1c-0.844-1.135.127-.145-1-1Zm-21,5h-2l-1-3h1v-1c1.139,1.139.4,0,1,2C311.139,456.139,310.4,455,311,457Zm28-2h2v3h-5c0.644-2.739,1.309-2.276,2-5C339.139,454.139,338.4,453,339,455Zm-35,4h3v2h-3v-2Zm5,2h2v3h-1v-1C308.861,461.861,309.6,463,309,461Zm3,0h2c-0.993,3.074-.934.955,0,4h-3v-1h1v-3Zm-18,3h3q-0.5,3-1,6h-1v-1a6.749,6.749,0,0,1-4-5l3-2v2Zm-7,3c-0.624,2.613-1.06,2.846-3,4-0.844,1.135.127,0.145-1,1v-2c1.139-1.139.4,0,1-2Zm16,6v-3c1.135,0.844.145-.127,1,1l2-1v2l3-1v1c-1.139,1.139-.4,0-1,2A12.71,12.71,0,0,0,303,473Zm-7,6q0.5,2.5,1,5h-1c-1.72-2.135-2.033-.566-3-4Zm3,2h3c0.225,5.8.931,3.514-1,8l-2-1c-0.844-1.135.127-.145-1-1A15.682,15.682,0,0,0,299,481Z" />
        </a>
        <?php
        $kdwil = '21.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-4" d="M790,8h2a15.684,15.684,0,0,0-1,6h-2v2h-4V15C789.027,12.829,789.331,11.908,790,8Zm25,60h3c-0.633,3.073-1.947,7.982,0,11l3,2,1,2,3,1v3h1c1.464,1.827,1.206,2.286,4,3v2c1.37,0.682,1.284,1.5,2,2h2v1c1.661,1.536,1.65.822,2,4h-1c-0.895,1.824.688,3.1,1,4-3.554.246-3.494,0.91-5,3h1v1l2-1v3l3-1v1h-1q-0.5,3.5-1,7h-2c-1.567,2.457-4.255,3.536-6,6h-1v7h-1v1H815v1l-6,2v-2c-1.894-.934-4.811-2.222-6-4,2.212-1.377,2.7-2.622,3-6h2v1h1c2.489-2.834.045-3.343,6-4,1.62,2.834,5.188,5.415,8,7v-2c-2.02-1.735-.829-2.2-2-4l-3-2v-1h1c0-2.415-.474-2.487-1-4h-1v3l-17-4-3-4-2-1q0.5-1.5,1-3l-5-4q0.5-2.5,1-5l-2-1V91l4-1,1-3h4l5-7h2l2-3h2l1-2h1V73l2-1Q814.5,70,815,68Zm-37,7q-0.5,2.5-1,5h-3V76h1V75h3Zm2,27,3,1v3l-3-1v-3Zm12,11h3v1h1v4h-3Q792.5,115.5,792,113Zm6,17,3,1v3l-3-1v-3Zm7,4c-0.684,2.927-1.113,3.274-4,4C801.684,135.073,802.113,134.726,805,134Zm-35,73h-5q-0.5-1-1-2c2.078-1.094,1.771-1.611,5-2v1h1v3Zm121-3c0.839,4.743.082,6.956,0,13-3.873,2.429-1.71,4.616-8,5-1.212-2.128-2.253-2.177-3-5l6-5C888.564,206.907,882.643,205.129,891,204Zm6,26c-0.38,3.541-1.241,3.036-2,6h-4v-2c3.374-.979,1.913-1.213,4-3v-1h2Zm-42,14v-5l2-1v-1h1v1h1v3c-1.139,1.139-.4,0-1,2Zm47,14c0.776-3,.616-2.63,4-3v1h1v2h-1v-1Zm8,3v2l-4,1v-1h-1v-3c1.135-.844.145,0.127,1-1,1.373,0.34-.293.426,1,1,3.715-.363,4.652-1.612,9,0-1.139,1.139,0,.4-2,1v1C913.4,262.021,912.15,261.112,910,261Zm-9-1c-0.463,2.391-1.158,3.145-2,5-1.135-.844-0.145.127-1-1h-1v-3c1.135-.844.145,0.127,1-1h3Z" />
        </a>
        <?php
        $kdwil = '21.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-5" d="M376,498c2.008,0.336,7.953,2.81,9,4v2h1v-1c2.033-.931.41,1.516,1,2h1v-1l6,3v2h-2v4c-2.344.046-2.56,0.821-4,1v-1l-2-1v2h-7c0.1-2.612.252-3.426,1-5h-1c-1.078-.922.075-0.66-2-1v1h-1v-7h1a6.719,6.719,0,0,0,3,3v-3c-1.8-.945-1.574-1.385-4-2v-2Zm-6,2c0.778,0.1,3.845-.708,3,1C370.589,501.942,371.675,501.868,370,500Zm27,13,3,1c0.59-1.285.569-.341,1,1h1l-1,2,2-1,6,7h-1l2,3h2l-1,2c1.217,1.409,4.614,2.352,6,4l-1,2c0.955,1.437,4.279,3.161,6,4v1h-1c-1.139,1.139,0,.4-2,1-1.856-3.151-4.925-4.02-6-8h-2v-1h-1v1l-2-1a20.109,20.109,0,0,0-3-3v-1h1v-1h-1v-3h-1v1l-4-1,1-3-2,1v-1c-1.139-1.139-.4,0-1-2h-2Q396.5,515.5,397,513Zm-20,4c3.127,0.4,3.073.735,5,2v1h4v2l3-1v1c0.923,1.077.663-.076,1,2h-1v1h1a8.445,8.445,0,0,1,3-2v1h1v2h1c1.534,1.869,1.842,2.494,2,6h2v2c4.756,1.259,4.223,4.669,9,6v3c4.352,1.12,5.536,4.945,9,7v1h-1v1l-3-1v3l5,1v-2h2l1,3,4,3v3c0.942,2.715,2.416,2.76,6,3v1h4v-1h1a15.682,15.682,0,0,1-1-6c3.945,1.178,1.271.262,3,3h1v2l2,1v2h1l3,4h3l1,2h4v1h1c-0.574,2.01.12,0.865-1,2v1c-3.671-.868-4.866-2.857-8-4v1c-1.719,1.127-1.355.633-2,3h1c1.139,1.139,0,.4,2,1v3h-1c-1.139-1.139,0-.4-2-1v-2c-3.32-.494-2.857-1.5-6,0v-1c-1.139-1.139-.4,0-1-2-4.293-1.146-2.924-3.293-8-4v-2c-3.8-2.117-4.559-3.946-11-4-1.562,1.8-1.92.892-4,2v1h-2v1h-6v1c-1.923,1.272-1.879,1.6-5,2l-1-3h-7v-1h-1v-5h3v-2h2c1.149-3.791,1.108-1.688,3-4h1V547h-2q-0.5-2.5-1-5l3-1v-1c-3.715.594-2.289,0.58-6,0v-2h-2v-2c-0.631-.349-5.716-3.619-6-4l-1-4h-1v-2h-1l-1-3h-2l-1-4h-2v-2Zm-11,4a9.749,9.749,0,0,0,4-1v2h-1l1,2-4,1v-1h1Zm-1,4-3-1v-1h1v-1h1v1C365.139,524.139,364.4,523,365,525Zm7-3h4c2.11,3.522,4.662,3.33,5,9C376.962,530.094,372.961,525.925,372,522Zm54,15h5v2h-5v-2Zm-10,7c2.393,0.607,1.858.318,3,2h1v1h-2c-1.139-1.139,0-.4-2-1v-2Zm19,2c3.686,0.326,4.21.818,5,4h-1v1c-2.01-.574-0.865.12-2-1C435.639,548.834,435.472,548.175,435,546Zm-15,4v-3h1v1h1l1,2h-3Zm5,7v-3h1v1h1l1,2h-3Zm-9,15v3l-3-1v-1h1C415.139,571.861,414,572.6,416,572Zm-20,2,1,3h-1v1h-7l-1-3h-1v1c-1.055-1.128-.45.006-1-2h1v-1l6,1v1Zm-34,9h3v-2c1.8,0.944,1.574,1.385,4,2-0.115,2.135-1.021,3.418-1,4h1v1h-2v2h-1v-1c-3.453-1.5-7-4.038-8-8l3-1v1C362.139,582.139,361.4,581,362,583Zm11,2h-2v-1h1c-0.993-3.075-.934-0.955,0-4h1v5Zm19-4c5.605,0.211,3.727,1.369,7,3h3c1.384,0.959.072,2.449,1,4l2,1,1,3h1c1.364,1.738,1.665,1.99,2,5h-2c-3.625,6.174-7.872,6.3-8,17-2.739-.644-2.276-1.309-5-2l-1-4-6,1a15.682,15.682,0,0,0-1,6h-1v3l-3-1c-0.325-5.249-1.778-7.887-3-14l-3-1v-1c-1.785-1.424-2.387-2.285-5-3l3-10h1c1.869-2.031,1.984-.706,3-4h3l1,3a11.878,11.878,0,0,0-5,1v2l3,2v1h1v-1h1c0.788-1.478-1-2-1-2l1-2c3.492,1.35,4.417.7,8,0Q391,584.5,392,581Zm-22,29h2v2h-2v-2Zm-1,5a4.1,4.1,0,0,1,2,2h-3Zm28,4v3h-2l-1-3h3Z" />
        </a>
        <?php
        $kdwil = '21.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-6" d="M583,159h2v2h-2v-2Zm37,4h-4q0.5-1.5,1-3c2.01,0.574.865-.12,2,1C620.139,162.139,619.4,161,620,163Zm-28,1h-2v-3h1v1C592.139,163.139,591.4,162,592,164Zm6-2h3q-1,4.5-2,9h1c1.728,3.125,1.823,1.82,2,7a12.3,12.3,0,0,0-5,1q-0.5-1-1-2h-2v-3h1a2.622,2.622,0,0,0-1-3q0.5-2.5,1-5h1c1.139,1.139,0,.4,2,1v-5Zm-10,7v-2c2.448-.558,2.21-1.043,4-2v1c0.416,0.579,1.633.146,1,2h-1v2c-1.884-1.205.722-.573-1-2Zm-14,0h-2v-3h1v1C574.139,168.139,573.4,167,574,169Zm36,0c2.391,0.463,3.145,1.158,5,2v3h-3v-2h-2v-3Zm-13,2q-0.5,1-1,2h1v1h1C599.151,172.35,597.106,171.14,597,171Zm22,8h-3a9.733,9.733,0,0,1,1-4c1.135,0.844.145-.127,1,1h1v3Zm1,0h2v2h2v4l-3-1Q620.5,181.5,620,179Zm-23,15q-0.5-1.5-1-3l-3,1v-1c-2.5-1.663-2.144-4.778-2-9-1.135-.844-0.145.127-1-1h2v-1h3c1.067,1.929,3.37,3.736,4,6q-0.5,3-1,6a15.659,15.659,0,0,1,2,2h-3Zm20-8v5l-7-1q-0.5-1.5-1-3c2.01-.574.865,0.12,2-1C614.715,186.594,613.289,186.58,617,186Zm-38,7v-3l-3,1v-2c1.016-.771.984-1.229,2-2,1.139,1.139,0,.4,2,1,0.944,1.8,1.385,1.574,2,4h-1C579.861,193.139,581,192.4,579,193Zm26-4v2h-2v1l-3-1v-1h1v-1h1v1Zm-71,7v-2l-6,1q-0.5-1.5-1-3h1c1.127-1.719.633-1.355,3-2,1.361,2.39,2.852,3.35,6,4v1h-1C534.861,196.139,536,195.4,534,196Zm32,6h-4q0.5-2,1-4h1v-1c-2.057-1.931-1.849,1.083-3-3,1.135-.844.145,0.127,1-1h2C565.412,195.663,566.03,197.22,566,202Zm42-5q-0.5,1.5-1,3h-3q0.5-1.5,1-3h3Zm-69,3q-0.5,1.5-1,3l-2-1v5c1.8,0.944,1.574,1.385,4,2v-1h4c0.881-.37.611-2.9,3-2v1h2c-1.139,1.139,0,.4-2,1-0.679,3.807-.662,3.2,0,7l-6,1q-0.5,1.5-1,3l-3-1v1h-1q0.5,1.5,1,3h3v2l-3,1q-0.5-1-1-2h-2c-0.276-2.453-1.153-5,0-9h1v-4c0.225-1.4,1.03.414,1-1h-1v-3l-3-2a1.448,1.448,0,0,1,1-2q-0.5-1.5-1-3h3v1h4Zm52-1h2v2h-2v-2Zm20,1h3v3h-1c-1.139,1.139,0,.4-2,1v-4Zm-18,4h3v2h-3v-2Zm-12,1h3v2h-3v-2Zm4,3,3,1v3h-1c-1.139-1.139,0-.4-2-1v-3Zm-1,4v3h-1c-1.139-1.139,0-.4-2-1v-3h1C583.139,212.139,582,211.4,584,212Zm5,15h2v2h-2v-2Zm2,2h2v1C590.99,229.426,592.135,230.12,591,229Zm5,7-4-1a11.878,11.878,0,0,1,1-5c1.139,1.139.4,0,1,2h1c1.479,1.465-1.919.9-2,1v1l3-1v3Zm2-2h2v3h-2v-3Z" />
        </a>
        <?php
        $kdwil = '21.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-7" d="M358,425h-5a9.375,9.375,0,0,1-2,2c-0.274.509-.7,3.279-1,4l-3-1v1c-1.879.686-.707,1.328-2,0-1.719-1.127-1.355-.633-2-3l-6,1v-1c-5.311-1.309-2.219-1.589-4-5h-1c-0.856-1.389-.781-1.721-1-4h1v1c1.139,1.139.4,0,1,2l3-1c-0.687-3.533-1.222-3.629,0-7,2.211,0.979,2.819,1.663,6,2q0.5-3.5,1-7c2.739,0.644,2.276,1.309,5,2v4c1.135,0.844.145-.127,1,1h3l1-4h-2v-3l4-1v1l3,1q0.5,3.5,1,7h-1C356.861,420.678,357.457,421.7,358,425Zm-27-8-4,1c0.6-3.843.353-2.749,0-7h2v-2l4,3v1c-1.041,1.027-3.138-.326-3,2h1v2Zm-28-5h2v3h-1v-1C302.861,412.861,303.6,414,303,412Zm20,1,4,2c-0.844,1.135.127,0.145-1,1v1h-3c-0.844-1.135.127-.145-1-1Zm-14,2c2.762,0.723,2.237.279,3,3C309.238,417.277,309.763,417.721,309,415Zm9,5v-2l2,1v-1h1v3h-1C318.861,419.861,320,420.6,318,420Zm7,3h3v2h-3v-2Zm35,0c2.762,0.723,2.237.279,3,3C360.238,425.277,360.763,425.721,360,423Zm-44,3h3q0.5,3,1,6h-2C317.23,428.785,316.492,429.845,316,426Zm15,0h2c-0.28.552-1,3.3-2,3C329.563,426.916,330.819,428.06,331,426Zm-7,3,5-1v1h2v1h1v-1l3,1c1.584,2.731,2.742,2.446,3,7a12.71,12.71,0,0,1-5,1c-1.985-2.933-6.048-3.044-8-6h-1v-3Zm36-1h3v2h-3v-2Zm-2,4-5,1v-3c1.135,0.844.145-.127,1,1l2-1v1h1v-1C358.446,431.1,357.322,430.012,358,432Zm-7,3v3l-3-1v-3h1C350.139,435.139,349,434.4,351,435Zm11-1v2h-3v-1h1C361.139,433.861,360,434.6,362,434Zm-9,1a9.151,9.151,0,0,1,6,4h1l-1,2h1c0.766,1.472.739,1.677,1,4,5.174-1.045,5.725-.937,10,1v2c-3.443,1.978-4.805,4.438-10,5q-0.5-3.5-1-7c-1.3-.644-1.385-1.6-2-2h-2v-1c-2.68-1.7-1.9.953-3-3h1Q353.5,437.5,353,435Zm8,2h2v3h-2v-3Zm-15,3h2v3h-2v-3Zm-8,2h3v1c-1.139,1.139-.4,0-1,2h-2v-3Zm34,11q-0.5,2.5-1,5a11.762,11.762,0,0,1,3,4h-1c-1.139,1.139,0,.4-2,1v3c2.209,0.345,1.076.561,2,1l2-1v3c-1.139,1.139-.4,0-1,2h-2v-1h-1v-2l-3-2,1-2-2,1v-2c1.139-1.139.4,0,1-2-3.506-.8-3.9-1.772-4-6C367.537,454.714,368.884,453.652,372,453Zm-2,30c-4.061-1.054-1.245-.438-3-3-0.665-.97-1.64-0.387-2-2,0.114-.042,1.938.058,1-1-1.4.221-.159-0.137-1,1a7.493,7.493,0,0,1-2-3h2c0.992,1.088.5,1.041,2,0v2h1C369.543,478.881,369.817,479.49,370,483Z" />
        </a>
        <?php
        $kdwil = '21.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-8" d="M397,447v-2h2c-1.181-1.382-1.829-.967-3-2l-1-2-3-1v-2h4v-1c-4.424-.124-5.423-1.225-7-4,3.222-.354,7.668-1.989,9-1a15.718,15.718,0,0,1,6,8C400.864,443.329,403.693,446.2,397,447Z" />
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
                url: "ambil_kepri_kiri.php",
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
                url: "ambil_kepri_kanan.php",
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