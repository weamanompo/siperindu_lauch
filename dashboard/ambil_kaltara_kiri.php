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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40%" height="40%" viewBox="0 0 781 600">
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
            <filter id="filter" x="334" y="175" width="345" height="231" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="95" y="56" width="387" height="527" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="262" y="11" width="407" height="175" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="452" y="110" width="209" height="92" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="590" y="172" width="40" height="45" filterUnits="userSpaceOnUse">
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
        $kdwil = '65.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Bulungan_01" data-name="Kab Bulungan 01" class="cls-1" d="M596,197v2l2,1v4a10.6,10.6,0,0,1-4,1c-3.271-3.849-8.565-.016-13,1v2c-3.87-.367-4.143-1.544-8-2v4c-3.1,1.643-1.8,1.9-7,2v2c-3.686-.326-4.21-0.818-5-4-2.135-.385-1.932-0.978-2-1h-5q-0.5-1-1-2H543v1l-7-1v-2l-12,1v2l13,1v1l4,1v1h5v1c1.586,1.251,2.8,3.353,4,5h1v2c5.242-.27,5.1-2.386,10-3v4h4c0.841-.33.085-2.583,3-2,1,0.2,5.193,3.791,7,4q0.5-1,1-2h6a13.326,13.326,0,0,0,5,5c-0.574,2.01.12,0.865-1,2q-0.5,1.5-1,3l-11,2c0.56,2.969,1.726,6.06,0,9l-2,1v2h-1v7h-1v2l-2,1v2l-2,1v2h-1c-1.758,3.219-1.881,6.012-2,11l7,12h3v-1h5v-1l4-1v-1c3.482-1.206,6.306,1.312,8,2h3v1l4,1v1l2-1v1l6,1v2l9,1c2.36-.647,7.992-3.268,12-2,4.738,1.5,8.937,4.856,14,6l3,9q-0.5,5.5-1,11h1a9.532,9.532,0,0,1,2,4c2.762,0.723,2.237.279,3,3,5.711,1.477,11.706,11.422,15,16,1.839,2.556,3.866,1.69,5,6h2v2c0.4,0.918,2.851.575,2,3h-1v1c-2.821,2.055-2.591-1.8-4,3h-1v4c-3.626-.759-4.948-1.918-10-2v1l-5,1c-1.609,3-4.056,5.345-5,9l-16-1v-1h-1v-4l-2-1q-0.5-1.5-1-3h-1l-3-9-2-1v-1l-2-1v-2l-3-2c-2.637-2.763-1.874-5.386-7-6-2.064,1.781-5.649.975-8,0v-1l-10-1-3-4h-2l-2-3h-2l-2-3h-2v-1h-9v-1l-12,2v1l-4,1v1l-13-1q-0.5-1-1-2l-13-1v1l-4,1v2l-2,1v2l-2,1v2l-3,2v1h-2c-2.689,2.321-8.122-.464-12,1v1h-2l-2,3h-3v1l-4,1v1h-3l-1,2c-4.86,4.751-3.975,12.167-12,14-0.375-7.449-3.588-13.689-6-19-1.26-2.776.262-2.962-2-5v-1h-3c-2.491,4.391-5.1,4.385-9,7l-1,2h-2l-6,9h-3c-1.129-1.975-1.417-2.338-4-3-0.826-3.2-1.179-2.9-5-3v1h-6c-1.079,2.874-1.044,7.691-1,12h1c0.943,1.61-.362,5.625-1,6h-2c-0.814,3.319-1.928,4.1-2,9-3.171-.157-4.735-0.066-7-1v-1c-4.478-1.525-16.424,1.413-18,3-3.109,2.42-4.046,4.352-4,10h1v3c3.906,0.874,5.862,3.2,6,8-1.139,1.139-.4,0-1,2-4.055,2.153-8.488,5.371-14,6-1.862-2.906-4.633-3.5-8-5v-1l-10,1-3-5h-6v1c-4.1,1.192-6.879.479-10,0-2.425-4.419-8.186-10.285-8-17h1v-2c3.758,1.472,6.217.747,10,0,0.027-5.617,1.366-8.154,4-11l2-1,4-9,10-2,1-2,3-1v-3h1v-2l2-1,1-3c3.465-3.34,4.17.539,7-1,1.117-.608,1.281-3.852,2-5l2-1q0.5-2.5,1-5l2-1v-2l2-1v-3h1c1.93-5.871-3.168-11.038,0-16l4-3,5-6,2-1v-2l2-1v-1h2c1.952-1.486,3.393-5.2,4-8,2.887-.671,2.5-1.786,3-2h8l2-3h1l1-2h2v-1a11.23,11.23,0,0,1,7-3v-4l5-3v-5c0.752-1.429,4.836-3.515,7-4l2-6,12-3c0.918-2.437,1.037-6.193,1-10-1.236-.786-3.114-2.137-2-5l2-1c1.645-3.637-1.821-3.474,2-6v-1l7-1,1-4h1c0.991-2.88-.6-7.62-1-9v-7h-1l-1-4-2-1q-0.5-2.5-1-5h-1v-2c-0.3-.474-1.385-0.886-2-2h3c4.583,4.988,6.545-.689,10-2h12v-1h3c1.374-.336-0.4-1.218,1-1v1h2v1h14v-1a8.181,8.181,0,0,1,6-1v1l5,1q0.5,1.5,1,3h1l4,5h4c1.256-1.909,1.014-1.659,4-2a18.122,18.122,0,0,0,6,4h3v1a8.628,8.628,0,0,0,4,2c0.206-5.039,1.31-4.065,3-7v-2l2-1q1-3,2-6c2.01,0.574.865-.12,2,1,4.788,1.442,1.043.965,3,4l2,1v1l5,1v1l5,4v4h1c1.533-1.85,1.993-.862,4-2v-1h2l3-4h2q0.5,1,1,2h2C591.405,194.309,592.873,196.146,596,197Zm-4-5c-3.075-.626-3.462-1.6-7-2a34.651,34.651,0,0,1-1-7,19.168,19.168,0,0,1,7-1C591.918,184.437,592.037,188.193,592,192Zm-20,7q-0.5,1.5-1,3h1q0.5-1.5,1-3h-1Zm-22,14c3.577-.063,5.714.128,8,1-0.574,2.01.12,0.865-1,2v1c-0.661.419-3.237,0.62-4,1v-1C551.025,215.871,550.662,215.583,550,213Zm63,17c-0.738,3.217-1.357,3.641-5,4-1.166-1.361-1.825-1.528-4-2,0.936-3.586,2.61-3.156,7-3C612.139,230.139,611,229.4,613,230Zm-8,6-6,1v1h-8q-0.5,1-1,2l-8,1v-1h-1v1c-1.768.983-1.611,1.354-4,2a46.016,46.016,0,0,0,1-9l12-1v1h4v-1c4.965-1.268,6.141,1.878,10,0v1C605.139,235.139,604.4,234,605,236Zm10,1q-0.5,2-1,4h-1c-0.048.474,0.914,2.146,1,4h-2v3h-4v3h-1q0.5,1,1,2h-1v1l-3-1v-2c-2.749-1.584-1.8-2.47-6-3v-4c6.122,0.094,7.835-1.062,12-2v-4Zm-10,2h3v2l-3,1v-3Zm-5,1v2c-4.734.924-4.44,2.1-6,6h-3q-0.5,2.5-1,5l-4,1q0.5-1,1-2h-1c-1.317-2.3-2.14-1.951-3-5h3C586.676,240.482,592.615,239.751,600,240Zm-15,2c-1.009,4.117-3.9,5.04-5,9,1.8,0.944,1.574,1.385,4,2v2h-4v-1h-1q-0.5,1-1,2c-1.664.639-3.4,0.346-5,1v-1h-1v-3c2.041-1.34,1.878-1.637,2-5h2v2c1.139-1.139.4,0,1-2C579.932,245.5,579.9,242.626,585,242Zm17,9c0.014,6.5,2.331,6.7,3,12h-2q-0.5,1.5-1,3c-2.057-.342-15.416-4.923-16-6v-3l3-2v-1l4-1,2-3h5C601.139,251.139,600,250.4,602,251Zm21,8-7,1v1h-6q-0.5,1-1,2h-2c-0.262-3.176-1.01-3.822-2-6,5.378-1.153,5.282-4.673,10-6q0.5,1.5,1,3l3-1v1l4,3v2Zm-44-1v2h-2v2h2v2h-2q-0.5,2.5-1,5l-6,1c-0.684,2.927-1.113,3.274-4,4v-9h1c0.817-1.454.691-1.7,1-4C573.409,260.782,574.066,258.613,579,258Zm49,8-10-1v1h-1l-2-1v1h-7v-2l17-4C626.584,262.749,627.47,261.8,628,266Zm-44-3h5q0.5,1,1,2l9,2v1c1.812,1.425,2.381,2.249,5,3v2c-1.105-.385-2.786-1.831-5-1q-0.5,1-1,2h-9q-0.5-1-1-2h-4c-3.487-1.114-4.332-.668-8,0,0.7-2.484.509-1.627,2-3v-1h2q0.5-1,1-2l3-1v-2Zm44,6c-0.94,4.074-2.933,4.166-8,4v1h-3q-0.5-1.5-1-3h-2v3h-4v-1h-2l-3-4h-2q-0.5-1-1-2h2v-2l3,1q0.5,1,1,2l10-1Zm-39,6v2c-8.072-.179-12.068,1.642-17,4v-2c-1.587-1.354-1.737-2.169-2-5,3.705,0.306,5.632,1.644,9,0q0.5-1,1-2c1.693,0.138,1.64,1.865,2,2h5C587.047,274.015,586.908,274.612,589,275Zm9,3v3c-3.507-.529-5.068-0.624-6-4l3-1v-1h5v-1h1v3h-1C598.861,278.139,600,277.4,598,278Zm13-1v2c-2.826-.668-3.77-1.849-5-4h2C609.127,276.719,608.632,276.355,611,277Zm15-2v2l3,1v1c3.307,1.621,2.716-1.52,4,3a75.335,75.335,0,0,0-21,4v-1c-1.139-1.139-.4,0-1-2,1.139-1.139.4,0,1-2l4-1v-1h3q0.5-1.5,1-3C621.229,274.69,623.505,275.109,626,275Zm-16,10-6-2v-2h2v-2C608.512,280.365,609.605,281.333,610,285Z"/>
        </a>
        <?php
        $kdwil = '65.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Malinau_02" data-name="Kab Malinau 02" class="cls-2" d="M374,70c2.612-.1,3.426-0.252,5-1v1c1.3,1.047.99,1.934,2,3,1.157,1.221,2.921,1.668,4,3,1.269-.629,1.433-1.644,2-2,1.2-.753.432,0.862,1,1,1.293,1.565.986-1.954,1-2a40.14,40.14,0,0,1,9,1l-1,2,3,1v1h-1l2,4h1V81l2,1v1h1l-1,2c0.055,2.118,1,2,1,2v6h2l-1,3h1V95l2,1-1,3h2c0.392,2.7,1.482,2.812,0,5h1c1.139,1.139,0,.4,2,1v2c0.126,0.259,3.145,2.438,3,4h-1v1l2-1,2,6h2l-1,2,2-1v6c1.087,0.905.19-.159,1,1h-1v1h5c0.992-2.649,1.1,1.521,2,2l3-1v2l2-1v2a7.173,7.173,0,0,0,4-1v1c1.814,2.17-1.8,4.612,6,5v-2l3,1v-2l2,1h12v-1h1v1l3,1q-0.5,2.5-1,5h1c1.226,1.994,1.544,1.847,2,5h2v1h-1c-1.889.859,2,1,2,1-0.287,4.716-1.757,5.47-4,8l-2,1c-1.565,3.2.646,8.591-2,12h-1v1h-2c-2.122,1.037-1.536,1.2-2,4,2.54,2.651.4,4.961,2,8h1l1,2h2l1,3,3,2v2l2,1v2h1v3l2,1v2h1v2h1v7c0.527,1.8,1.592,5.813,2,8-2.45,1.529-.624,1.231-2,3l-2,1v1c-2.879,1.946-4.562-.5-7,3h-1v5l-2,1q0.5,3,1,6h1v8c-3.009.629-2.4,1.735-3,2-3.68,1.615-6.175-.89-9,2h-1q-0.5,2.5-1,5h-2l-6,5v5l-5,3c-0.958,1.5.375,3.034-1,4h-3l-2,3h-2l-5,6-10,1c-1.117,2.565-2.353,4.794-3,8h-2c-1.437,2.451-3.688,3.23-5,5v2h-1v1c-2.289,1.942-1.8-1.069-3,3-2.739.644-2.276,1.309-5,2-0.644,2.8-3.232,4.538-2,9h1q0.5,3,1,6h-1v3h-1v3l-2,1-1,4-2,1v2h-1l-2,6h-5l-5,6h-1q-0.5,2.5-1,5c-1.544,2.053-10.45,4.383-14,5l-1,4h-1v3l-5,4v2l-2,1c-2.077,4.37,3.2,5.137-3,7-1.759,1.484-4.416.2-8,0-0.081,6.754,1.263,11.089,4,15h1c1.441,1.766,2.259,2.409,3,5l5,1v-1h2v-1h10l3,5c6.992-2.007,14.3-.4,16,6l-4,1c0.15,2.582.142,3.456,1,5h1v8l-7,5v4h1q-0.5,2.5-1,5h-1v2h-1v1h1v9c0.065,0.282,1.35.291,1,2l-10,30-12,2c-0.9,3.212-2.574,3.511-4,6h-1v1h1q0.5,4,1,8l-4,1v2l-9,2v2l-5,4v1l-5,1-2,3-9,5c0.683,3.3,1.753,3.839,2,8-1.093.59-1.583,1.75-2,2h-2v1h-7v1l-2,1v2l-11,10c-0.917,1.468.434,3.165-1,4h-4c-2.654-2.59-10.616-2.04-16-2-7.642.057-10.223,2.512-15,5h-2v1h-3v1h-2v1h-3v1l-5,4q0.5,2.5,1,5h1q-0.5,5-1,10h-2q-0.5,1-1,2h-4v3c-2.612,1.382-1.693,1.769-6,2v1l-6-2c-0.8,3.506-1.772,3.9-6,4l-13-4q-0.5-3.5-1-7l-10-2v-1c-1.679-.327-1.753.947-2,1H176a10.274,10.274,0,0,0-2-2v-3h-1c-0.922-1.506-.846-2.446-1-5h-9v-1h-2q-0.5-1-1-2h-2v-1l-4-1v1c-3.394.76-4.622,2.141-5,6h-4c-1.083-1.967-7.829-9.386-10-10l-1-4-7-2c0.21-9.18-1.32-9.288-4-15l-12-1-4-5h-3v-1c-2.07-1.607-3.228-1.937-4-5,2.128-1.212,2.177-2.253,5-3,0.527-5.358,3.358-7.137,4-13l-3-1q0.5-4,1-8c3.974-1.741,7.155-4,12-5,0.7-3.088,1.949-4.254,5-5,0.013-5.819.9-19.357,3-23l-1-3-2-1,1-3h2v-8a12.71,12.71,0,0,1,5-1c2.57,3.316,3.89,2.771,8,2,0.723-2.762.279-2.237,3-3v-2c6.026,0.147,9.783-1.463,12-5-2.719-1.466-4.57-3.078-5-7,2.174-2.388.7-5.473,2-8,0.086-.166,2.34-1.832,3-3a12.13,12.13,0,0,1-2-2h-2v-1c-3.121-.9-5.441,2.479-9,3v-2h-2c0.229-2.333.251-2.527,1-4h1q-0.5-2.5-1-5h1l2-6-9-3v1l-6,1c-0.549-5.235-.871-5.462,1-10,1.332-.476-0.324-0.5,1-1h5l4-9c5.739,0.024,7.955-.976,13-2v-1c1.1-.139,4.955,2.79,7,2l1-2a21.316,21.316,0,0,1,7-3l-1-3h-1v-2h-1v-6a6.719,6.719,0,0,0,3-3c4.291,2.343,5.6,2.071,11,1,1.212-2.128,2.252-2.177,3-5,3.144-.584,4.461-1.621,8-2v-4c2.318-1.44,2.887-4.507,5-6h2l1-2h10v-1c4.3-1.671,6.356-1.728,7-7-8.647-1.95-6.82-10.779-16-12l-1,3-6-1c-0.684-2.927-1.113-3.274-4-4,0.705-3.087,1.949-4.254,5-5v-2h1l-2-6h-1v-5l7-5v-4h1l1-3h-1c-1.678-5.777-1.821-1.166-6-3-0.6-.262-0.034-1.341-3-2,0.844-1.135-.127-0.145,1-1,4.559-7.393,9.145-1,9-15h1v-1h3l1-2c2.759-2.278,4.866-2.981,10-3q0.5-4.5,1-9c2.84-1.679,2.719-3.451,7-4,3.575,4.209,4.123,1.371,4,10,3.193,0.017,13.295-.871,15-2l3-5,12-2,1-3h1v-2l2-1q-0.5-2.5-1-5h1c2.267-7,1.463-7.1,8-10a10.6,10.6,0,0,1-1-4l-6-2q-0.5-2.5-1-5c0.054-.17,1.814-0.382,2-2h-1v-2h-1q0.5-7,1-14h1v-2h1q0.5-4,1-8h1v-2c1.61-3.153,3.428-4.288,4-9a7.173,7.173,0,0,0,4-1v1c3.217,0.738,3.641,1.357,4,5h2c0.76-3.394,2.141-4.622,6-5l-1,2h1v-1l2,1,1,3,3-1c-0.979-3.129-2.069-2.815,2-4v-1l2,1,1-2c1.985-.879,2.937.752,4,1l1-2v-1h1v1h4c0.254-2.035.96-1.879,1-2l-1-3c1.052-1.508,5.427-1.091,8-1v2l2-1,1,2h7v1c-2.01.574-.865-0.12-2,1h2l2-4,2,1,1-2,2,1v-2c2.146-2.1,1.317.689,3,0v-1h1l-1-2h1q0.5-3,1-6l-3-1c0.06-2.236-.8-6.358,1-7v-1h-2v-1l-2-1q-0.5-2.5-1-5h-1l1-2h-2a67.754,67.754,0,0,1,1-13l2,1v-1c-0.577-.633-1.508.32-1-1h2c-0.094-1.312-.926-1.485-1-4-1.461-.41-1.82.858-2-1,0,0,2.077-.084,1-1l-2,1c-1.06-1.117.749-1.227-2-3l1-3h-2c0.506-4.925,2.606-4.761,3-10h-2l3-11c1.723-.228,1.22,1.832,3,0V91h-1c1.044-1.761.679-1.375,3-2-0.267-3.09-1.454-5.784,0-9h1c0.834-1.442.692-1.711,1-4h-2V74h-1l1-3h-2V70h1a10.6,10.6,0,0,1-1-4h2l-1-2h4c1.343,1.388,5.306,2.746,8,3v1h-1l1,2h3V68l3,1V68c1.3-1.047.99-1.934,2-3,1.157-1.221,2.921-1.668,4-3l3,1V62a12.037,12.037,0,0,1,7,1V62h1c1.007,1.33-.249,2.994,1,4h2v1C373.682,68.762,372.835,66,374,70Z"/>
        </a>
        <?php
        $kdwil = '65.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Nunukan_03" data-name="Kab Nunukan 03" class="cls-3" d="M395,18l10,1v2c3.991,1.454,4.819.511,5,6l4,1c0.64,2.743,1.9,3.69,3,6,2.01-.574.865,0.12,2-1,3.725-1.062,2.685-2.064,5-4V28h4v1h4c-0.6-3.018-1.8-3.816-3-6,3.5-2.058,4.64-5.821,9-7,1.956,3.4,5,2.451,6,4v3c0.987,3.218,1.766,3.768,6,4l1-3c5.339,0.3,7.921.936,13,0a34.216,34.216,0,0,1,1-8h1c1.139,1.139,0,.4,2,1,0.944,1.8,1.385,1.574,2,4h2c0.607,2.393.317,1.858,2,3v1h5v1h2v1l7-1c1.212-2.128,2.252-2.177,3-5a18.5,18.5,0,0,1,9,2v1h4v1h2v1h2l1,2a2.511,2.511,0,0,0,3-1l2,1,2-3c3.519-1.516,6.858,1.636,9,2a15.716,15.716,0,0,0,8-1V25c3.617-1.236,8.578.552,11,1,0.8-3.506,1.772-3.9,6-4,1,1.268,2.369,1.2,3,2v2l2,1,2,3h2l2,3,8,2,1,2c2.363,2.189,4.248,4.151,8,5v2h2q1,2.5,2,5l3,2v1h2v1h2l1,2h8V54h3l1-2h5l1,3h-1c-2.855,4.791-2.475,1.086-6,3l-1,2-2,1c-2.24,3.007-1.1,4.389-6,5V65l-14-3v4l9,5c-2.11,3.522-4.662,3.33-5,9h-1l3,8h1l-1,2h1q0.5,3,1,6l10,1c0.219-.045.324-1.406,2-1v1l4,1,4,5c4.1,2.291,13.229.983,19,1,1.067,3.816,3.572,4.674,6,7v1h-1v1h-5v1l-2,1v2l-9,3v-1h-4c-0.806-.336-0.175-2.685-3-2q-0.5,1-1,2h-6l-2,3c-2.714.78-2.315-1.737-3-2h-5a10.535,10.535,0,0,1-2,2v7l-3,1q-0.5,1-1,2h-2v1c-1.69,1.574-1.557.824-2,4,4.8,0.21,5.208,1.683,10,2,1.04,3.915,2.812,3.472,3,9-2.316.875-4.407,1.017-8,1-2.258-2.737-4.208-2.522-8-4v-1h-3v-1h-1v1c-2.024.278-1.219-.524-2-1h-1v1h-4c-3.257,1.136-6.6,3.661-11,4-5.237.4-8.392-1.85-12-3h-5v-1h-2v-1h-9v1h-2v1l-6,1q-0.5,1-1,2l-4,1v1h-1v-1H503q0.5-6,1-12a6.719,6.719,0,0,1-3-3c-2.01.574-.865-0.12-2,1-5.322,1.55-4.06,3.325-6,8h-1c-1.187,2.851.248,3.008-2,5v1h-7c-1.34-2.041-1.637-1.878-5-2-0.506,1.092-1.882,1.773-2,2-2.046,3.955,2.355,4.215-4,5-0.656-1.156-2.919-2.843-3-3v-4h-1v-1h1v-1h-2l1-3-3-1v-1h-1v-1h1v-1h-1v-1h1c0.369-1.266-1.387-1.574-2-2-1.139-1.139,0-.4-2-1v-2h-2v1c-1.673.287-1.747-.945-2-1h-9v2c-4.434.307-6.668,1.511-10-1l-2-4-3,1v-2l-2,1-1-2c-1.2-.623-6.6-1.735-8-2q-0.5-3-1-6l-2-1,1-2h-2l-5-6v-2h-1v-2l-2-1v-2h-1v-3h-1l1-3h-2l-1-3h-1l1-2h-1V84c-2.743-.64-3.69-1.9-6-3-0.38-3.541-1.241-3.036-2-6-1.987-.365-4.157-1.943-7-1v1h-2v1h-6c-1.679-2.84-3.451-2.719-4-7l-5,1-1-2-4-1V64h-1V63c-3.651-.259-4.447-1.509-8,0v1l-4,1-3,4-2-1c-0.885.556-.634,2.823-3,2V69l-13-4c-0.641,3.872-.583,4.634-1,8h2c0.681,3.637,1.2,4.532,0,8v4h-1v2h-1l1,3-4,2,1,2h-1v1l-3,1c-0.127,2.326-.76,2.546-1,4h1v2h1a2.511,2.511,0,0,1-1,3,1.642,1.642,0,0,0,1,2c0.466,2.487-1.97,3.093-2,5h1l-1,2h1c2.279,3.9,4.832,4.524,5,11h-2c-0.467,2.518-2.352,8.262-1,12h1v2h1q0.5,2.5,1,5l3,2v1h-1v1h1v6l3,2c1.577,3.5-1.5,6.606-2,9l-2-1-1,3-5,1-1,2H317c-1.643-2.647-3.619-3.014-8-3-0.887,1.749-2.808,2.226-1,4h-4l-2,3h-4v1h-3v1h-2v1l-5,3v-1l-7-5-1-4-4-3q-1-6-2-12l-3-1c-0.587-3.091-2-8.581-1-13,0,0,1.3.046,1-2h-1c-0.965-4.276-.184-16.065,1-19h1l1-4,2-1v-2l2-1q0.5-4,1-8a34.218,34.218,0,0,1-8-1c-0.945-1.8-1.385-1.574-2-4h-1V95c3.831-.919,5.886-2.721,11-3,0.833-3.522,3.9-6.631,5-10V73l2-1V70h1V61l3-10h1V50h5l1-2c3.473-3.108,5.493-5.759,12-6v2c2.762-.723,2.237-0.279,3-3h1V38h3c2.762-4.069,4.858-1.441,5-9-2.117-2.215-.534-6.491,0-9,2.078-1.094,1.771-1.611,5-2,1.079,2.352,2.293,3.249,3,6l4-1V22c3.846-1.247,8.756,2.315,12,3,1.776,3.125,4.065,4.734,5,9h4c1.478-2.31,4.393-2.929,6-5l1-3h4V25l3-1V16h1c0.759,1.166,6.626,5.1,8,5V20l7-1,1,2h2v1c1.7,0.43,1.75-.945,2-1h6ZM624,55l16,1V55h15v1h2v1l3,1q0.5,2,1,4h1q0.5,6.5,1,13c-4.591.167-4.853,0.6-8,2v1l-6-1V75l-6-4-1-2-4-1-2-3h-2l-3-4C627.7,58.654,625.274,59.779,624,55Zm-16,4q-0.5,2.5-1,5c-1.8.945-1.575,1.385-4,2v2l-6-1C598.1,62.409,602.753,59.443,608,59Zm13,0v2l5,4v1l6,1c1.257,0.9.746,2.535,3,4v2c-3.6,2.382-5.162,8.808-7,13l-10,2c-1.709-2.134-5.949-5.241-9-6V72c-0.194-.423-2.657-1.328-3-3,0.549-1.03.864,0.232,1-2,4.2-2.515,4.476-6.6,11-7V59h3ZM590,74c4.511,1.185,2.536,2.557,5,5,1.381-1.759.443-2.6,2-1,5.584,3.08,1.991,2.969,4,8,0.3,0.741,2.738.234,2,3l-2,1v2h1c0.556-1.031,1.838-3.786,4-3v1c2.6,0.661,3.263,1.579,5,3v1l3,1,1,2c2.612,1.22,5.687-1.564,7-1v1h1v4h-1v1c-5.376-1-8.162-.192-14,0-4.576-10.223-9.782-6.327-20-8q-0.5-4-1-8l-2-1V80l3-1C588.644,76.261,589.309,76.724,590,74Zm24,15,6,1v1c-1.139,1.139-.4,0-1,2C615.314,92.674,614.79,92.182,614,89Zm26,19v2l8,5v1h-1v1l-5-1v2h-3v-1c-1.139-1.139-.4,0-1-2l-5-1q-0.5-1.5-1-3l-2-1v-2l-2-1v-3a12.71,12.71,0,0,1,5-1c1.251,1.586,3.353,2.8,5,4v1h2Zm6,16h-3c-0.945-1.8-1.385-1.575-2-4h1v-1l2,1C644.944,121.8,645.385,121.574,646,124Z"/>
        </a>
        <?php
        $kdwil = '65.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Tana_Tidung_04" data-name="Kab Tana Tidung 04" class="cls-4" d="M622,121v-3h2v-2c4.658-.842,7.945.015,13,1a13.3,13.3,0,0,0,3,4c-0.574,2.01.12,0.865-1,2v1h-8v-1Zm12,12v2l3,1c-0.574,2.01.12,0.865-1,2-0.7,2.812-1.2,2.516-3,4-4.508,3.713-6.4.057-11,2q-0.5,1-1,2h-2v1c-2.354.681-7.588-2.442-9-3l-7-1q-0.5-1-1-2h-2q-0.5-1.5-1-3l-4-3v-2l-2-1v-2h-1v-2h-1c-0.894-1.362-.758-1.745-1-4a10.6,10.6,0,0,1,4-1c1.165,1.361,1.824,1.528,4,2,1.522-2.813,2.621-3.844,7-4,4.376,5.464,1.578-1.713,7,0,0.746,0.236.624,3,4,2,0.565-.167.252-2.7,3-2q0.5,1,1,2h4v1h3v1h3v1h9q0.5,1,1,2l7,2v1h-1v1h-3v1a8.229,8.229,0,0,1-4,2c-1.779-2.805-4.11-2.263-7-4q-0.5-1-1-2l-7-1q-0.5-1-1-2c-1.973-.429-1.291.533-2,1h-3v1h2c2.274,2.027,5.938.75,9,2v1h2v1Zm-43-2c0.644,2.739,1.309,2.276,2,5l-6,1v-1c-2.178-.422-2.848-0.664-4-2h1C585.511,131.565,587.071,131.107,591,131Zm-32,49h-3v1c0.635,0.757,1.368.014,1,2h-1v3l-4,3v4l-2-1v1h1c-0.687,1.43-.787,1.151-2,2v1l-4-1v-1h-3v-2h-3v-2l-5-1q-0.5,1.5-1,3h-2v-1l-2,1v-1c-1.139-1.139-.4,0-1-2-6.878-1.64-.361-1.616-5-5v-1h-1v1c-1.654.979-.846-1.44-1-2l-3,1v-1l-5-1v2l-3,1v-1H499v1h-1l-1-2a1.5,1.5,0,0,0-2,1l-3-1v2c-1.711-.628-8.95-2.423-12-1l-2,3h-3v1l-9-1v-2h-2v-2l-4-1c-0.075-6.067-2.353-6.816-3-12l5-1c0.245-2.309.195-2.558,1-4h1v-9l2-1v-2c2.969,0.286,3.332.626,5,2v1h2v1c2.01-.574.865,0.12,2-1,1.719-1.127,1.355-.633,2-3h1v-3l5,1v1c3.867,1.286,7.821-1.1,10-2,1.572-4.315,2.212-9.766,6-12v-1c1.4-.226-0.268.374,1,1h1v3h1c1.14,4.136-3.9,6.455,1,10,1.32,1.337,7.431,3.155,11,2v-1h3v-1h2v-1h5c4.956-1.523,13.45-.88,20-1a10.6,10.6,0,0,1,1,4c-2.193,1.876-2.245,4.575-3,8h-1a24.345,24.345,0,0,1,1,4c1.8,1.479,2.146,4.641,4,6h2q0.5,1,1,2h3C557.9,174.3,559,171.229,559,180Zm32-42c4.947,0.153,4.725,3.818,6,4C594.865,143.82,592.142,140.122,591,138Zm3,10,4-1v1c2.041,1.34,1.878,1.637,2,5-1.135.844-.145-0.127-1,1-2.01-.574-0.865.12-2-1C593.8,152.174,594.1,151.821,594,148Zm-3,5v2c-1.21,1.773-8.047,1.141-11,1v-1h-7q-0.5-1-1-2H557q0.5-1.5,1-3l20-2q0.5,1,1,2h2C585.03,152.216,584.243,152.871,591,153Zm64-2v7h-3q0.5-3,1-6h-1v-1h3Zm-36,6v2l-7,2q-0.5-1-1-2h-5v-1l-5-1q-0.5-1.5-1-3l3-1v-1c2.123-1.232,7.938.366,9,1q0.5,1,1,2Zm-23,14-5,1v6c-2.312-.242-2.554-0.2-4-1v-1c-2.086-.859-2.844.8-4,1l-3-4h-3q-0.5-1-1-2h-3v-1l-25-3c-1.382-2.612-1.769-1.693-2-6l-3-1a12.71,12.71,0,0,0,1-5c3.316-1.756,4.368-2.058,10-2,2.059,2.36,4.791,3,8,4h10l4,5,5,1,2,3,2-1v1h2q0.5,1,1,2h7v1C596.139,170.139,595.4,169,596,171Zm38-14c4.349-1.1,4.5-3.612,10-4l3,4h1v2l2,1q0.5,2.5,1,5h1v2c1.78,3.365,2.6,1.368,3,7a10.6,10.6,0,0,1-4,1C644.466,167.457,633.837,171.605,634,157Zm-22,9v3c-4.575,1.037-5.355,2.714-12,3v-4c-1.135-.844-0.145.127-1-1l-11-1q-0.5-1-1-2l-3-1v-1c-3.412-2.147-4.535,1.138-6-4l11-1v1h2v1h3v1h1v-1l5,1v1h2v1h2C606.593,163.376,608.494,165.2,612,166Zm8-5q0.5,1.5,1,3h-1v1h-1v-1h-3v-1c-1.135-.844-0.145.127-1-1h2v-1h3Zm-43,31c-7.2-.442-2.808-1.657-6-4l-6-2c-1.326-5.942-3.83-3.736-4-12h1v1h7l5,7,3,1v9Z"/>
        </a>
        <?php
        $kdwil = '65.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Tarakan_71" data-name="Kota Tarakan 71" class="cls-5" d="M619,208v2l-6,1v-1h-1v-3h-2v-2c-1.8-.375-4.013-0.833-5-2q-0.5-1.5-1-3h-2l-5-7v-2l-2-1v-6h1v-3h1c2.963-3.674,4.461-3.146,11-3,2.155-1.5,7.967,1.276,11,2q0.5,1.5,1,3l3,2v10c1.212,1.654.249,6.348,0,11C621.2,206.944,621.426,207.385,619,208Z"/>
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
                url: "ambil_kaltara_kiri.php",
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
                url: "ambil_kaltara_kanan.php",
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