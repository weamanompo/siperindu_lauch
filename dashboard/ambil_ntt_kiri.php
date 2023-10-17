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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="800" height="450" viewBox="0 0 800 450">
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
                .cls-16,
                .cls-17,
                .cls-18,
                .cls-19,
                .cls-2,
                .cls-20,
                .cls-21,
                .cls-22,
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

                .cls-16 {

                    filter: url(#filter-16);
                }

                a:hover .cls-16 {
                    fill: #d5d5d5f3;
                }

                .cls-17 {

                    filter: url(#filter-17);
                }

                a:hover .cls-17 {
                    fill: #d5d5d5f3;
                }

                .cls-18 {

                    filter: url(#filter-18);
                }

                a:hover .cls-18 {
                    fill: #d5d5d5f3;
                }

                .cls-19 {

                    filter: url(#filter-19);
                }

                a:hover .cls-19 {
                    fill: #d5d5d5f3;
                }

                .cls-20 {

                    filter: url(#filter-20);
                }

                a:hover .cls-20 {
                    fill: #d5d5d5f3;
                }

                .cls-21 {

                    filter: url(#filter-21);
                }

                a:hover .cls-21 {
                    fill: #d5d5d5f3;
                }

                .cls-22 {

                    filter: url(#filter-22);
                }

                a:hover .cls-22 {
                    fill: #d5d5d5f3;
                }
            </style>
            <filter id="filter" x="617" y="64" width="176" height="65" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="740" y="167" width="60" height="65" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="318" y="85" width="88" height="87" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="473" y="57" width="95" height="81" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="553" y="214" width="126" height="140" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="542" y="69" width="100" height="63" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="720" y="210" width="66" height="71" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="173" y="79" width="51" height="94" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="67" y="83" width="137" height="84" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="203" y="81" width="74" height="89" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="278" y="103" width="66" height="70" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="246" y="94" width="56" height="84" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="472" y="350" width="110" height="83" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="334" y="348" width="70" height="39" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="384" y="91" width="105" height="68" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="38" y="219" width="60" height="63" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="10" y="216" width="72" height="58" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-18" x="71" y="215" width="74" height="73" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-19" x="106" y="207" width="154" height="140" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-20" x="647" y="231" width="106" height="98" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-21" x="656" y="174" width="102" height="92" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-22" x="581" y="314" width="30" height="30" filterUnits="userSpaceOnUse">
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
        $kdwil = '53.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Alor" data-name="Kab Alor" class="cls-1" d="M720,69a46.012,46.012,0,0,0-1,9c2.258-.272,2.621-0.107,4-1V76h2V75l6-1V73l12-1v1h2v1h15l1-2h3V71l3,1v1l15-1q0.5,3,1,6l3,2v2h1v5h-1c-0.757,2.793.548,5.5,1,7h-1c-2.582,3.628-2.086.524-6,2v1h-2v1H758v1h-4v1h-3v1h-3v1h-2v1h-4v1l-12-1v-1h-4q-0.5,1-1,2h-2q-0.5,1-1,2l-5,1v1c-5.644,1.693-6.633-4.226-10-2-3.672.884-5.052,3.1-9,4v-2h-9q-0.5-3-1-6l3-2V98l2-1c1.811-2,2.554-3.493,3-7,5.141-.546,3.239-2.231,6-4h2V85h5c2.645-.6,4.784-2.875,6-5h-1v1h-6v1h-2v1h-2v1a25.834,25.834,0,0,1-8,3q-0.5-3.5-1-7c4.188-2.595,4.761-8.561,10-10C706.041,69.18,714.893,68.928,720,69ZM683,95h-2c-1.708,1.975-2.416.864-4,2l-1,2h-1q-0.5,2-1,4l-3,2q0.5,3,1,6h-1c-1.129,1.975-1.417,2.338-4,3v2l-5,4v1h-7c-0.579.416-.147,1.633-2,1v-1h-1v-3c0.664-.565,2.693-2.341,2-4h-1a11.233,11.233,0,0,0-2-5h-1v-3c-0.982-1.3-3.685-1.017-6-1-0.589,1.122-5.231,5.658-7,5v-1h-2v-2c5.386-1.575,2.16-2.663,4-7h1V98h1l2-3h3a26.074,26.074,0,0,0,6-5l3,1c1.33,4.009.564,7.765,4,10v1h1q-0.5-2-1-4h1c1.139-1.139,0-.4,2-1,0.684-2.927,1.113-3.275,4-4V90c2.078-1.094,1.771-1.611,5-2,0.68-3.434,3.676-9.261,6-11l3-1V75h1v1l3-1v1c2.162,1.419,2.01,2.366,2,6a8.638,8.638,0,0,0-3,9h1Q683.5,93,683,95Zm7-18V75l3,1v1h-3Zm-41,3h3v1h-1v1l-2,1V80Zm43,0h2v3h-3V82C692.139,80.861,691.4,82,692,80Zm-35,1v2h-3V82h1C656.139,80.861,655,81.6,657,81Zm30,7h3a3.982,3.982,0,0,0,2,2l-1,3a10.6,10.6,0,0,1-4,1C684.5,89.272,684.667,92.649,687,88Zm-48,9c-0.574,2.444-1.047,2.206-2,4-2.01-.574-0.865.12-2-1h-2V99h1V98Zm-14,7h-3a11.878,11.878,0,0,1,1-5h1v1h1v4Zm4,2h4v2l-4,1v-3Zm51,5,3,1a3.982,3.982,0,0,1-2,2v1h-1v-4Z" />
        </a>
        <?php
        $kdwil = '53.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Belu" data-name="Kab Belu" class="cls-2" d="M764,172c-0.727,2.921-1.689,2.313-2,3-1.467,3.244-.242,5.886,0,9,4.367,0.718,5.151.561,11,0q0.5-1.5,1-3c4.3-.019,6.074-0.51,7-4h1v-3c2.308,0.519,2.447.884,4,2v1h3q0.5,1,1,2c3.111,2.96,3.175,2.648,3,9h-1q-0.5,3.5-1,7a2.649,2.649,0,0,1,1,3h-1v1a16.322,16.322,0,0,0-8,2q-0.5,1-1,2h-1v-1h-1q-0.5-1.5-1-3h-8v1l-3-1v7h-1v1h1v4l2,1v1h-1c-0.217,1.229,1.819,1.724,1,4l-2,1q0.5,2,1,4h-1a6.749,6.749,0,0,1-5,4c-1.5-2.22-4-2.484-7-3v2h-5v-3c-0.314-.785-2.683-0.176-2-3l2-1v-1q-0.5-1-1-2h1v-7h-1v-2h-1v-3l-2-1c-0.707-1.8.616-1.475,1-2q-0.5-1.5-1-3a1.726,1.726,0,0,0,1-2h-1v-4h-1q0.5-3,1-6l-2-1q0.5-3,1-6h4c1.4,0.217-.413,1.046,1,1v-1h2c0.607-2.393.317-1.858,2-3v-1Z" />
        </a>
        <?php
        $kdwil = '53.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Ende" data-name="Kab Ende" class="cls-3" d="M365,97h-2v1h-1V97h-4a10.6,10.6,0,0,1-1-4c1.139-1.139.4,0,1-2a12.7,12.7,0,0,1,5-1l3,5h-1v2Zm29,26h2c-0.79,2.336-.849,2.691-1,7h-1v-1c-1.581-1.142-.931,2.458-1,3h-1c-0.021.6,0.887,1.85,1,4h-2l1,2h-2l1,2c-1.984,1.917-1.866-1.088-3,3h1c1.139,1.139,0,.4,2,1l1,4,3-1v1l2,1q-0.5,2.5-1,5c-3.765.389-5.3,2.193-8,3l-6-1v1h-2l-1,2h-2v1h-2l-1,2h-4v1c-2.221.594-6.683-1.227-8-2l-1-2h-6a29.413,29.413,0,0,1-1,7c-3.2-.826-2.9-1.179-3-5a8.445,8.445,0,0,0,2-3h-1c-1.7-2.052-2.234-.831-4-2v-1c-2.391-1.839-2.671-1.929-7-2-2.266,2.054-11.986-.684-16-1,0.034-6.065-1.4-6.555-2-11l4-3v-1h4l3-4h3c1.375-.971.051-2.476,1-4l4-3v-1h3l-1-4c2.739,0.644,2.276,1.309,5,2v-1h-1v-8c1.8-.945,1.574-1.385,4-2a9.749,9.749,0,0,0,1,4l2-1a4.321,4.321,0,0,0,5,2v-1l7-1v1l7,1v-1l3-1v-1l10,1,3-4,3,1,1-2,6-1v1h-1q-0.5,3.5-1,7h-1l1,2h-2v1C394.6,121.4,394.641,120.473,394,123Zm-55,40v2h-3v-1h1C338.139,162.861,337,163.6,339,163Z" />
        </a>
        <?php
        $kdwil = '53.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Flores_Timur" data-name="Kab Flores Timur" class="cls-4" d="M520,87c3.506,0.8,3.9,1.772,4,6-3.237,1.794-3.951,3.7-9,4-1.129-1.975-1.417-2.338-4-3-1.185,2.3-2.76,4.68-5,6,1.088,4.882,1.978,4.51,1,10-5.889-.3-6.371-3.3-12-4-0.17,3.067-1.568,5.2,0,8h1l1,2h2c3.55,2.768,3.711,8.524,0,11-3.241,2.881-7.858.389-11,2l-1,3h-1v-1h-7v1h-1v-8h1q0.5-3.5,1-7l2-1v-4h-1c-0.272-1.7.931-1.708,1-2,1.273-5.4-2.652-8.232,3-10,3.219-3.469,6.672-.817,7-1,1.153-.644,1.242-3.921,2-5h1l2-3h2V90h8V89h1V85l2-1q0.5-2.5,1-5h3V78c-2.272-.313-2.581-0.132-4-1V76h-2V75h-1v1h-3v1l-2-1v1l-5,1-2,5a19.166,19.166,0,0,0-7-1c0.694-2.6,1.572-3.245,3-5h1V75h1l1-3h1V71h-1V67l6-1V65c2.467-1.8,2.085-2.42,6-3,2.3,3.847,7.787,6.115,12,8q-0.5,4.5-1,9h1v2h1Q519.5,84,520,87Zm28-5v2h1l1-2,6,2v1l3-1v1l3,1q-0.5,2-1,4h-2a60.689,60.689,0,0,1-1,12l-8,1v-1h-5c-0.3-.07-0.3-1.269-2-1v1h-7v1h-2v1h-5v-1l-8,1V99h1c0.35-1.722,3.09-7.279,4-8h2l2-3,5-1c2.839-1.843.454-3.334,6-4C542.339,83.967,544.667,82.391,548,82Zm-6,25c-0.607,2.393-.318,1.858-2,3v1h-4v1l-8,3v-1l-5-1c-1.507,2.467-1.254.631-3,2q-0.5,1-1,2h-1v3l-3,2v4h-1c-1.962,2.575-2.3,2.936-7,3v-2l-2-1q1-4,2-8c3.508-.866,3.744-2.5,8-3v-4c2.731-1.584,2.446-2.742,7-3,2.709,2.2,6.05-1.328,10-1v1h1v-1l3,1v-1C539.51,105.89,538.609,106.547,542,107Z" />
        </a>
        <?php
        $kdwil = '53.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kupang" data-name="Kab Kupang" class="cls-5" d="M670,238q-0.5,1.5-1,3l-4-3v-1h-1v1l-4-2v3c1.8,0.944,1.574,1.385,4,2q-0.5,1.5-1,3c0.2,0.386,1.5.669,2,2h-1q-0.5,1-1,2h-1v-2h-2c-1.349,2.325-3.4,3.06-5,5,3.264,2.292.058,1.5,2,5h-1v1l-2-1v2l-2-1v1h1q-0.5,1-1,2h2q-0.5,1-1,2h1v1h1v-1h1v5h1v3c-2.784-.549-0.1-0.77-3,0q0.5,1,1,2s-2.153.181-1,1h2q-0.5,1.5-1,3l2,1a1.587,1.587,0,0,1-1,2v1h1q-0.5,1-1,2a1.748,1.748,0,0,1,1,2h-1v3h1q-0.5,1-1,2h1v1l-2,1v2h2c-0.1,2.612-.252,3.426-1,5h1v1l3-1q0.5,1,1,2h1v-1l2,1q-0.5,1-1,2c1.413-.054-0.393-0.758,1-1,0.859-1.889,1,2,1,2-0.88.593-2.739,0.911-2,3h1v1l2-1v2h1c1.382,1.43.474,1.373,3,2q0.5,1.5,1,3a1.469,1.469,0,0,0-1,2l2,1q-0.5,1-1,2h1q0.5,2,1,4c-8.271-1.052-17.042-.959-18,8l-6,2q-0.5,2-1,4h-8v1h-2v1l-5,1v1h-2q-0.5,1-1,2h-2v1h-2v1h-3v1h-2v1l-6-1v1l-7,1v-1h-2v-1c-3.965-1.282-6.735,2.536-9,2q-0.5-1-1-2h-2v-1l-5-1v-1c-2.011-.307-5.52,3.455-7,4h-4q0.5-2,1-4l2-1q0.5-2,1-4h1c0.852-2.775-1.5-3.813,0-8l6-1c2.055,3.037,1.85.427,4,2v1h-1c-0.708,1.686.93,1.753,1,2,1.09,3.824.478,4.652,5,5,1.139-1.139,0-.4,2-1v-4h1v-1l-2-1v-1h1v-1c1.164-.647,3-0.175,3,1h1v-2c-0.427-.493-1.853-1.251-1-3h1c1.139-1.139,0-.4,2-1q-0.5-1.5-1-3h1v-3c-0.428-.286-1.69.234-1-1h1c2.062-2.262,2.291-.7,5-2v-1h2c0.761-.529,3.411-5.874,4-7-3.1-1.643-1.8-1.9-7-2-1.487-1.67.041-.087-2-1v-1c-1.381-.3.4,0.82-1,1-4.548.584-5.788-2.3-9,1-1.139,1.139-.4,0-1,2-2.927-.684-3.275-1.113-4-4h1v-7h-1v-1h1q-0.5-1.5-1-3l2-1v-2h6c2.388-5.073,3.047-4.8,3-13-1.719-1.127-1.355-.633-2-3,4.92-2.154,4.274-4.094,4-11h-1c-0.535-.862-0.475-3.992-1-5h1l6-7h1q0.5-1.5,1-3h2v-1c3.349-1.738,2.554,1.631,4-3h1v-4h5q0.5-1,1-2l5-1v-1h1c1-1.429-.283-2.97,1-4l4-1v-1h1v-2l3-1c0.949-5.383,3.347-6.262,10-6l3,4h1v2l2,1c0.931,1.608-.329,2.949,1,4l4,1q0.5,1,1,2h3v1C668.047,236.819,666.659,237.043,670,238Zm-86,83v3c-6.085.7-6.1,4.61-11,6-0.723-2.762-.279-2.237-3-3,0.23,4.145.45,3.527,2,6h1c0.763,1.762-.691,1.531-1,2q0.5,1.5,1,3h-3v1a6.148,6.148,0,0,1,3,3h-1q-0.5,1-1,2c-1.135-.844-0.145.127-1-1-1.719-1.127-1.355-.633-2-3h-5v3h-3c-0.55-2.548-2.076-6.738,0-9,1.387-5.454,3.65-2.193,6-5v-2l2-1v-2h1v-2h1c1.649-3.338-1.542-2.661,3-4v-1l5-1v1h1v4h1v1A10.6,10.6,0,0,1,584,321Z" />
        </a>
        <?php
        $kdwil = '53.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Lembata" data-name="Kab Lembata" class="cls-6" d="M626,78l1,3h1l1-2,5,1v1c1.361,1.165,1.528,1.825,2,4a53.318,53.318,0,0,0-8,2v1l-9-1c-1.51,2.469-1.234.628-3,2l-1,2h-1q-0.5,2.5-1,5l-4,3c-2.893,4.375.841,6.594-7,7,0.16-1.405-.251-0.341,1-1-0.64-2.128-1.453-1.711-4-2-1.908,3.371-5.576,6.156-9,8,1.83,3.831,3.829,4.129,4,10-3.748.989-3.079,2.661-8,3q-0.5-1.5-1-3h-1v-4c-3.075.626-3.462,1.6-7,2-0.618,3.469-1.648,5.168-5,6v1h-3c-1.03-1.331-1.986-.979-3-2-2.922-2.944-.839-4.39-7-5-2.1,3.156-3.965,2.151-7,1l-3,1c-0.574-2.444-1.047-2.206-2-4l2-1v1h1l2-3h2l2-3,3-1v-2l5-6h3v-1h2q0.5-1,1-2h5V98c3.348-1.609,3.811.132,5-4-4.51-2.51-4.323-4-12-4-1.139,1.139,0,.4-2,1,0.463-2.391,1.158-3.145,2-5l6-1v2l3-1a1.429,1.429,0,0,0,2,1l3-4h8v1h1v1h-2v1h1l-1,3-2,1a14.041,14.041,0,0,0-4,8h1V97c1.336-.254,4.693,1.767,8,2l4-5c-2.773-1.2-3.572-1.2-4-5l5-1v3h1c1.139-1.139,0-.4,2-1-0.355-4.348-2.086-5.528-3-9l5-1v1h1q-0.5,2-1,4h6l1-3c-1.139-1.139-.4,0-1-2h4c1.561-2.7,4.129-3.731,6-6C620.991,75.374,622.383,77.179,626,78Z" />
        </a>
        <?php
        $kdwil = '53.21';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Malaka" data-name="Kab Malaka" class="cls-7" d="M776,218c0.108,4.551.285,4.377,2,7h1q0.5,5.5,1,11c-9.278,4.1-12.261,9.026-12,21l-5,4v1h-3v1h-3l-2,3h-2v1l-3,2c-1.631,2.247-1.936,4.282-4,6v-1l-2-1c0.627-1.6,3.915-11.887,3-14l-3-2c-0.772-1.74.615-1.521,1-2q-0.5-1.5-1-3h-5q-0.5,1.5-1,3h-2q-0.5,1-1,2l-8-2a7.49,7.49,0,0,0-2-3q0.5-1.5,1-3l6,1v-3h1v-1h3v1h3v-1h-1v-1h1l-3-5c0.167-.088,6-4,6-4v-2h1q-0.5-1-1-2h1v-3h-2v-3h1v-1h3v-1h1a10.6,10.6,0,0,1-1-4c3.176,0.262,3.822,1.01,6,2q-0.5,2-1,4c3.715-.594,2.289-0.58,6,0v-2l10,2v-2h2q0.5-2,1-4h-1v-1l2-1q0.5-1.5,1-3C773.128,216.212,773.177,217.252,776,218Z" />
        </a>
        <?php
        $kdwil = '53.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Manggarai" data-name="Kab Manggarai" class="cls-8" d="M204,84q0.5,2.5,1,5h1v1h5v3c-2.784-.549-0.1-0.77-3,0,0.842,2.232,1.029,5.438,1,9l3,2v1h2c1.039,0.959-1,1-1,1-0.977,1.654,1.438.847,2,1q0.5,3,1,6h1q-0.5,1.5-1,3s1.451,0.725,1,2l-2,1v2h-2c0.192,1.4.661-.373,1,1,0.483,1.956-1.731.054-2,2h1v2h1c0.987,3.093-.612,5.9-1,8-3.541.38-3.036,1.241-6,2v2h2q-0.5,1-1,2h1c1.139,1.139,0,.4,2,1q0.5,4.5,1,9c-0.159,1.405-.889-0.41-1,1h1q0.5,1.5,1,3h-1c-2.549,2.219-8.027,0-12,1,0,0-.427,1.454-3,1a2.618,2.618,0,0,0-3-1q-0.5,1-1,2h-3q-0.5,1-1,2c-2.228.889-2.74-1.046-4-1v1h-7v-5c2.612-1.382,1.693-1.769,6-2q-0.5-2-1-4h2c2.084-3.58,4.662-4.346,5-10-3.018-.6-3.816-1.795-6-3,0.934-2.945.223-2.76,0-7,1.236-.653,1.407-1.613,2-2h2q0.5-1,1-2c1.795-.8,3.161.578,4,1v-1h1q-0.5-3-1-6h2c0.851-4.15,2.694-5.847,3-11h-5v-1h-1v1h-2v1c-1.4.873-1.729,0.724-4,1q-0.5-1.5-1-3c-1.634-1.791-.128-12.435,0-17,5.645,0.19,10.948,2.079,14-1h1V85h1V84h3Zm-21,78a9.749,9.749,0,0,1,4,1v2c-2.078,1.094-1.771,1.611-5,2C180.845,163.031,181.317,165.317,183,162Z" />
        </a>
        <?php
        $kdwil = '53.15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Manggarai_Barat" data-name="Kab Manggarai Barat" class="cls-9" d="M185,88q-0.5,9.5-1,19a6.719,6.719,0,0,1,3,3c4.313-2.371,3.743-3.022,11-3-0.723,8.371-4.746,8.07-5,17l-4-1v1c-1.139,1.139-.4,0-1,2h-3v1h-1v8c1.139,1.139.4,0,1,2h3a3.982,3.982,0,0,0,2,2c-0.574,2.01.12,0.865-1,2-0.871,3.428-2.068,2.575-3,6l-4,1v1a3.982,3.982,0,0,1,2,2c-6.137,1.035-5.136,1.957-7,7h-2q-0.5-1.5-1-3l-2,1v-2c-1.844-2.276-5.69-2.171-10-2-3.508,3.805-7.418,1.383-13,3v1h-7v1c-1.752.64-2.614,0.44-4,1q0.5,1,1,2h-1v1h-3c0.934-2.945.223-2.76,0-7-1.4.229,0.376,0.674-1,1-2.541.6-7.1-4.388-8-6h-1v-3h-1v-1h1v-1h-1v-2h-1q1-4.5,2-9h-1v3l-2-1v1h-3v1c-1.447,1.237-1.607.469-2,3h1v1h-4c0.549-2.784.77-.1,0-3h-1v4h-1c-1.14,3.4,2.514,2.277,3,3v1c-1.6,1-1.043,4.5-1,7l-2-1v1h1v1h-2v1h-3v-3a3.978,3.978,0,0,1-2-2c-2.078,1.094-1.771,1.611-5,2-0.4-4.019-1.156-3.614,0-7l2,1q-0.5-1-1-2s2.153-.181,1-1h-2v-2l2-1q-0.5-1-1-2l2-1-3-9,6,1v1h1v7h1v1c2.01-.574.865,0.12,2-1,1.806-1.562,2.982-4.729,4-7h2v1h1v-1h6v2h1v-3c-0.667-.869-1.172.065-1-2h1q-0.5-1.5-1-3h1c0.814-1.118,2.547-1.279,3-2v-2h2c1.212-2.128,2.252-2.177,3-5h1q-0.5-1.5-1-3h-1v-2h-1q0.5-2.5,1-5h1v1c1.462,1.037,1.8.562,2,3-0.25.24-1.8-.165-1,1,0.949,1.378,2.545.026,4,1q-0.5,1-1,2h1v-1c1.139-1.139.4,0,1-2,2.135-.115,3.418-1.021,4-1v1h1v-1h-1v-1h4q-0.5,1-1,2h1v-1c1.465-1.479.9,1.919,1,2h1v-7l2,1q-0.5-1.5-1-3l3-1q0.5,1,1,2c2.695,1.638,2.7.123,5-1q0.5,3,1,6h3V98h1v1c0.859,1.889,1-2,1-2a3.983,3.983,0,0,1-2-2h3v1h1c-0.549,3.5-.983,1.852,0,5h1v-1h1V97h2q0.5-2.5,1-5h1V91h5l1-2Zm-56,12c2.393,0.607,1.858.318,3,2h1v1h-1v1l-3-1v-3Zm-48,8h2v5h1v1c1.774,0.092,10.081,2.407,11,0v3c-2.519,1.8-1.2,5.806-1,11H93v-1l-3,1a9.747,9.747,0,0,0-1-4H87c-2.868,1.749.7,4.062-6,5,0.929,3.45,1.3,1.867,3,4-1.139,1.139-.4,0-1,2H82v-1l-4,3,1,3,2,1v1H80v4H78c-0.185-.095-4.082-6.25-6-2v-3c4.195-2.4,3.4-5.513,3-10l-3-1c1.01-3.129.557-1.518,0-5,2.078-1.094,1.771-1.611,5-2v-3l2-1-1-4h3v-1a9.879,9.879,0,0,1-4-4h1v-1l3,1v-2Zm13,3v-2l3-1v1h1c-1.139,1.139,0,.4-2,1C94.861,111.139,96,110.4,94,111Zm22,3q0.5,2.5,1,5l-6-1v-2C113.739,115.356,113.276,114.691,116,114Zm-11,6c2.041,1.34,1.878,1.637,2,5h-1v-1h-1v-4Zm-5,12v3H96v-1h1C98.127,132.281,97.633,132.645,100,132Zm5,1v3h1v-3h-1Zm-9,5v2c-3.715-.594-2.289-0.58-6,0v-1h1l-1-3h1v-1c2.01,0.574.865-.12,2,1h2l-1,2h2Zm28,17h-3v-1h-1v-1h2v-1h1v1C124.139,154.139,123.4,153,124,155Z" />
        </a>
        <?php
        $kdwil = '53.19';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Manggarai_Timur" data-name="Kab Manggarai Timur" class="cls-10" d="M258,99c2.779-.571,5.681-1.976,7-1h1c0.419,0.661.62,3.237,1,4h-1c-0.615,1.173-1.694,1.5-2,2v2h-1l1,2h-2v1h1v1h-1v1h1l-1,3a12.71,12.71,0,0,0-5-1c0.054,1.413.758-.393,1,1,1.889,0.86-2,1-2,1v2l-2-1v1h1c0.422,0.834-1.928,1.981-1,4l3,2v1h-1c-0.262,1.39.581-.351,1,1l-1,2,2,1h1v1h-1v4h2v3h-2c0.113,3.16,1.955,1.874-1,3v2l-2-1v3h-1q0.5,1.5,1,3h-1v2h-1v3h-1v2h-1q0.5,1.5,1,3h-3v2h-2c-1.7,4.663-1.408,6.044-8,6-2.923-2.8-5.094-.473-9-2v-1h-2l-2-3h-1q-0.5-1.5-1-3c-2.657-1.508-9.768.341-11-1-3.628-3.537.633-2.813-1-8h-1v-3h-1q0.5-1,1-2h-1c-1.276-1.9-1.631-1.886-2-5h1v-3h1c1.139,1.139,0,.4,2,1v-2l2,1c-1.35-3.66-.843-2.594,0-6-0.878-1.234-2,1.236-2-1h1v-4l2-1q-0.5-1.5-1-3l2,1v-1h-1l2-3-2-1v-1h1q-0.5-1.5-1-3h-1q0.5-1,1-2h-1q-0.5-2-1-4h-1c-1.659-2.061-3.2-3.031-4-6h1l-1-3h1q1-3,2-6l5-1v2c2.01,0.574.865-.12,2,1l5-1V89c0.934-1.078.661,0.078,1-2h-1c-1.753-.919,3-1,3-1v1l3,1,1,2h1v2l2,1v1h4l2,3c2.122,0.854,2.812-.831,4-1,4.865-.693,8.088,1.128,11,2,1.312,0.393,3,.369,3-1h1v2Zm13,1h-2V96h1v1h1v3Z" />
        </a>
        <?php
        $kdwil = '53.16';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Nagekeo" data-name="Kab Nagekeo" class="cls-11" d="M295,108l3,1v1h2v1h3v1h1v-1l5,1v1h2q2.5,4.5,5,9c3.524,2.479,6.522.895,9,5a21.9,21.9,0,0,0,5-4c2.739,0.644,2.276,1.309,5,2q0.5,2.5,1,5h2v2c-5.276,1.142-5.8,4.543-12,5-1.006,3.858-2.93,3.142-4,7,2.729,1.541,3.013,2.6,3,7a12.71,12.71,0,0,1-5,1c-0.242,1.689-1,2-1,2v9l-3,2v1l-5,1v-1h-2l-1-2c-3.28-1.428-15.288.787-18,1-1.094-2.078-1.611-1.771-2-5l2-1c1.425-3.006-3.837-10.1-5-11l3-7h3v-2h-3c-2.429-3.873-4.616-1.71-5-8,2.465-1.093,4-2.339,7-3q0.5-3,1-6h1c1.9-2.562,3.4-2.923,4-7C293.267,113.09,294.679,112.213,295,108Z" />
        </a>
        <?php
        $kdwil = '53.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Ngada" data-name="Kab Ngada" class="cls-12" d="M267,99h2v2l3,1v1h3l1,2h8v1l8,1v1l3,1v2l-2,1c-0.767,3.147,3.229,2.667,3,5h-1c-1.049,2.4-1.12,3.212-4,4v4c-2.354,1.4-1.736,3.138-3,4h-3v1c-2.266,1.963-1.807.837-2,5,2.84,1.679,2.719,3.451,7,4v2h-2a6.719,6.719,0,0,1-3,3l1,2a2.276,2.276,0,0,0-1,3l3,2v3h1q0.5,2.5,1,5c-5.079,3.086-1.289,2.562,0,7-7.019,1.636-10.377,7.937-19,5h-4v-1a16.23,16.23,0,0,1-7-4l-1-2-3-1v-3h-1q-0.5-1.5-1-3h-3v-5l3-1q-0.5-2-1-4c0.155-.669,2.175-0.457,2-2l-2-1v-3l3-1v-1l2,1v-1c-0.587-1.287-.652.371-1-1l2-1v-1h-1v-7h-1l1-2-2-1v-4c-0.317-.7-3.349-1.2-2-5h1c1.273-2.608-.218-1.239,2-3v-1c2.99-1.727,2.533,1.544,5-2h1c0.365-.773-1.643-1.986-1-4h1v-3h1l1-3h2V99Z" />
        </a>
        <?php
        $kdwil = '53.14';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Rote_Ndao" data-name="Kab Rote Ndao" class="cls-13" d="M569,361c-0.113,3.16-1.955,1.874,1,3-0.979,3.374-1.213,1.913-3,4h-1v2c0.223,0.105,3.626,1.439,3,2h-1c-2.055,3.037-1.85.427-4,2v1h1c4.68,3.813,8.9-2.606,9,8h-2v3l-5,1a1.819,1.819,0,0,0-2-1v1l-3-1v1l-5,4v1h-3v1l-3,1c0.229,3.491,1.282,3.154,0,6h-1v3h-1v1h-4v1l-3-1v-1h-2v-1c-0.718-.054-1.921.948-4,1-1.054,1.3-2.259,1.121-3,2q-0.5,1.5-1,3l-3-1v1H519v1l-3,1v3l3,1c-0.574,2.01.12,0.865-1,2v1c-2.833-.393-3.52-1.5-6,0v-2h-1v1c-1.333,1.518-.973-1.908-1-2l-6,1v3h-3v-2l-2-1q0.5-5,1-10h-1v-2h-1c-0.892-1.394-.7-1.741-1-4h4v-2c3-.631,2.4-1.737,3-2h6v-1h3v-1l3,1,5-1v-1a1.518,1.518,0,0,1,2,1h1v-1h3l6-7h2l2-3,3,1v-1c4.4-1.9,4.222-2.65,6-7h2q0.5,1,1,2c4.3,1.77,8.314-1.4,11-2v-2c-5.694.244-5.113,2.309-10,3l-2-3,4-3v-2l2-1v-1h3v-1h2v-1c1.565-.718,7.389-2.03,8-3v-2h1c0.788-1.478-1-2-1-2q0.5-1,1-2l2,1c0.944,1.8,1.385,1.574,2,4h-1C569.861,361.139,571,360.4,569,361Zm3,2h4v1c-1.135.844-.145-0.127-1,1-0.895.463-2.343,2.865-4,2q0.5-1,1-2h-1v-1h1v-1Zm-78,34v2h-4v-1h1v-1h3Zm-17,4h3c0.944,1.8,1.385,1.574,2,4h-1c-1.166-1.361-1.825-1.528-4-2v-2Zm43,12h5q0.5,1.5,1,3a9.749,9.749,0,0,1-4-1v1h1c1.142,1.581-2.458.931-3,1v-1h1Q520.5,414.5,520,413Zm-17,8c3.087,0.7,4.254,1.949,5,5h-1v1h-2C502.975,423.606,501.792,425.217,503,421Z" />
        </a>
        <?php
        $kdwil = '53.20';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sabu_Raijua" data-name="Kab Sabu Raijua" class="cls-14" d="M359,372l3-1v-1h2v-1h3l1-2h2l1-2,5-1c1.755-1.373.863-5.115,2-7,0.922-1.528,8.068-4.641,12-3l1,2h6v1h1v3a5.517,5.517,0,0,0-2,3h1v1s-1.26-.1-1,2h1v1h-1v2l-7,2-2,3-3,1-1,2c-2.087,1.724-4.176,1.865-8,2-3.951-4.406-6.085-.125-9-1l-1-2-5-1Zm-8,4c-0.723,2.762-.279,2.237-3,3-1.892,1.957-5.046,2.047-9,2v-3h2l1-2h9Z" />
        </a>
        <?php
        $kdwil = '53.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sikka" data-name="Kab Sikka" class="cls-15" d="M437,96c-0.607,2.393-.318,1.858-2,3v1c-1.2.754-.406-0.88-1-1l-3,1,1-3Zm37,5,8,1-1,4s1.488,0.71,1,3h-1q0.5,3,1,6l-2,1v5h-1v2h-1c-1.543,4.293.661,7.241-1,9-2.339,2.683-2.867.571-6,2v1c-1.519.881-2.431,0.874-5,1-0.644,2.739-1.309,2.276-2,5l-4,1v1h-4v1h-2v1l-3-1v1h-2v1h-5c-0.309.075-.266,1.39-2,1v-1l-4-1v1h-1a1.582,1.582,0,0,0-2-1v1h-2v1l-9-1-2,1-2-3H410v1h-2l-2,3h-2l-1,2c-1.986,1.8-3.5,2.582-7,3v-6c-2.612.1-3.426,0.252-5,1v-1c-1.016-.771-0.984-1.229-2-2v-1h1l-1-3h1v-1h-1v-1h1v-2h2a34.218,34.218,0,0,1,1-8h2a11.878,11.878,0,0,1,1-5h-2c0.6-2.768,4.06-4.083,2-6h3v1h8v2c5.227-1.969,6.233.861,11,2v2l4,3v1h2l2,3h4v1h6l2-3,19-1c1.1-4.969,3.754-4.648,4-11-3.217-.738-3.641-1.357-4-5,1.882-.275,1.963-0.988,2-1h5v-1c4.083-1.154,1.046-.736,3-3l4-2v-3h3v-2Zm-12,7c-1.407-.419-1.891.881-2-1h1l-1-3h1v1h1v3Zm-23-1c4.725-.147,5.477.14,8,2l2-1v4c-2.749,1.584-1.8,2.47-6,3v-1h-3A34.651,34.651,0,0,1,439,107Z" />
        </a>
        <?php
        $kdwil = '53.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sumba_Barat" data-name="Kab Sumba Barat" class="cls-16" d="M89,249H87v2H85v8l-2,1v2h8v4l-2-1v1h1l-1,3h3v3l-7-1v-1l-3-1v1l-6,2v3H75v1H72l-1-3c-3.361-.513-3.725-1.587-7,0v-1c-1.139-1.139-.4,0-1-2l-13-1-1,2H47c-2.522-3.753-3.867-1.05-4-8,1.139-1.139.4,0,1-2,2.128-1.212,2.177-2.252,5-3,0.944,1.8,1.385,1.574,2,4a30.139,30.139,0,0,0,11,0c1.093-2.465,2.339-4,3-7l6-1c1.168-4.431,3.76-3.55,5-8l-2-1v-3H73l-1-4H71v-1h1v-9c1.707-1.082,2.124-2.129,3-4h1v1h1v3h1l1,4h1l-1,2h2l-1,2h2l-1,2h1v2l2,1-1,2h1v-1h1v1h4v1H88v1h1v4Z" />
        </a>
        <?php
        $kdwil = '53.18';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sumba_Barat_Daya" data-name="Kab Sumba Barat Daya" class="cls-17" d="M71,251v2l-5,1v1c-4.554,4.164-1.066,7.047-11,7-0.579.416-.147,1.633-2,1v-1c-1.975-1.129-2.338-1.417-3-4l-5,1c-1.153,2.814-3.294,5.5-2,8H42v1H40v-1l-2,1v-1l-4-1v-1H31l-1-2H28l1-2H28v-1l-3-1-1-3h1v-1l-2,1-1-3h1v-1l-2,1-3-4-3-1v-4a16.664,16.664,0,0,0,4-7l2,1v-1H20v-1h1c2-3.393,2.884-2.114,6-4l1-2h5v-1h5l2-3,4-1v-1c3.46-1.231,6.79,1.5,9,1v-1l5-1v-1c2.955-.914,7.193.22,9,1v1h5v1h1v3c-1.88,1.311-3.443,8.008-2,12h1v2h1v3l2,1c0.479,1.946-.6,1.336-1,2C73.277,250.762,73.721,250.237,71,251Z" />
        </a>
        <?php
        $kdwil = '53.17';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sumba_Tengah" data-name="Kab Sumba Tengah" class="cls-18" d="M133,224c3.686,0.326,4.21.818,5,4-4.432,2.923.011,7.119,1,11-1.37.682-1.284,1.5-2,2h-2v1c-1.661,1.536-1.65.822-2,4h-2c-0.6,2.728-1.943,2.85-2,3q0.5,2.5,1,5h-1v1h1c0.429,2.951-1.186,4.144-2,6-2.687-.956-2.907-1.108-6,0v1h-1v-1c-2.553-.388-3,1-3,1l-2-1v1h-1l1,2a2.594,2.594,0,0,0-1,3l2,1c0.157,0.541-1.77,12.769-2,14l-5-1q-0.5-3-1-6a10.6,10.6,0,0,0-4-1,6.719,6.719,0,0,1-3,3c0.549-3.5.983-1.852,0-5l-2,1v1c-1.455.463-1.419-1.817-2-2l-4,1-1-3-2,1v-1H88v-4h2l-1-2h1c-0.771-1.016-1.229-.984-2-2l-5,1v-1c3.068-2.755.48-3.03,1-4a9.067,9.067,0,0,0,2-2l-2,1v-6l2,1v-1H85l1-2,2,1v-1H87l2-5c-3.543-.317-3.949-1.314-7-2-0.3-4.382-.371-3.306-1-7H79l1-2H78c-0.683-3.305-1.753-3.839-2-8,1.793-.824,5.327-3.649,8-3,1.861,0.452,4.447,3.449,7,3,3.21-.565,6.927-6.7,13-4q0.5,1,1,2h2q0.5,1,1,2l17,2c1.414-2.586,3.768-5.179,7-6v1C133.139,223.139,132.4,222,133,224Z" />
        </a>
        <?php
        $kdwil = '53.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Sumba_Timur" data-name="Kab Sumba Timur" class="cls-19" d="M158,233c0.723,2.762.279,2.237,3,3,3.392,3.393,6.719.035,11-1,0.666,2.642,1.6,3.2,3,5h1v2h1v9c0.483,1.483,2.265,5.228,3,7,5.416-1.874,4.269-.111,8,2v1c0.1,0.034,6.147-2.835,9-3v-2l7-1v-1l5,1c0.367,3.87,1.544,4.143,2,8h7v2c2.465,1.439,2.788,3.138,6,4v5l3,1c0.053,6.278.965,4.441,3,8v2l2,1c0.291,0.538.666,3.228,1,4,8.844,0.773,21.149,8.275,21,21h-1q-0.5,2.5-1,5h-2v2c-3,.292-6.737,1.023-8,3v3h-1l-1,2h-2l-1,2c-2.786,1.76-5.567,1.9-10,2-0.88,3.4-1.861,3.065-6,3-3.042-4.557-7.691.29-12,1-0.6,3.018-1.795,3.816-3,6-2.01-.574-0.865.12-2-1a7.986,7.986,0,0,1-4-2v-1l-6-2v-1l-16-1a2.509,2.509,0,0,1-3,1l-1-2c-2.383-1.309-2.222-.264-4,0v-1h-3c-0.618-3.469-1.648-5.168-5-6v-1h-3v-2a13.326,13.326,0,0,1-5-5l-3,1v-1c-1.135-.844-0.145.127-1-1,2.462-1.858,1.268-1.157,1-5-2.444-1.587-.635-0.835-2-3h-1v-2l-3-1c-1.413-1.118-2.246-4.176-3-6a12.71,12.71,0,0,1-5,1v-4c-5.266,1.371-2.232-.665-6-3v-1l-3,2v-1h-3v-1h-1v1l-3-1v-2l-4-2-1-2c-3.073-1.831-2.514,1.16-5-3h5V272h1q0.5-2,1-4h-1c-1.166-2.033-1.581-1.809-2-5l4-3v2l10-1c0.844-1.135-.127-0.145,1-1a68.148,68.148,0,0,0-1-10l4-3v-3h1c2.293-2.828,3.817-1.882,5-6h1c-0.054-1.693-2.917-3.8-3-4q0.5-4.5,1-9c-3.563-1.305-4.469-.381-5-5,1.975-1.129,2.338-1.417,3-4,2.762-.723,2.237-0.279,3-3l3-1c0.375,5,2.43,7.28,5,10l2,1q0.5,1.5,1,3h2q0.5,1,1,2h1v2h1C156.728,232.678,154.023,231.875,158,233Zm-42,35c1.139,1.139.4,0,1,2h-1v-2Z" />
        </a>
        <?php
        $kdwil = '53.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Timor_Tengah_Selatan" data-name="Kab Timor Tengah Selatan" class="cls-20" d="M660,236h4c0.624,2.613,1.06,2.846,3,4v1h1v-1l2,1q-0.5-1.5-1-3h2c0.593,2.442,1.065,2.19,2,4h1v1h-1c-0.918,3.142-.926.854,0,4,1.35-.66,1.053-1.224,2-2l4,2v1h4v1c1.139,1.139.4,0,1,2l15,1c1.212,2.128,2.252,2.177,3,5,4.649,0.443,5.368,2.432,10,3,1.773-2.666,3.99-2.3,5-6h2v1l3-1q0.5-1.5,1-3h2q0.5,1.5,1,3c1.61,1.975,7.387,3.153,9,2,4.293-1.146,2.924-3.293,8-4v1h1v5h1c1.139,1.139,0,.4,2,1l-3,15h1q0.5,1.5,1,3l-2,1q-0.5,2-1,4h-1a12.936,12.936,0,0,0-3,6c-2.891.613-4.015,1.6-6,3v1h-4q-0.5,1.5-1,3h-1q-0.5,1-1,2h-2q-0.5,1-1,2h-2l-2,3h-2v1c-3.293,1.631-1.152-1.448-4,2h-1c-0.955,1.6-.876,6.282-2,8l-2,1-3,4c-2.794,1.991-5.878,2.418-8,5H675q-0.5-1.5-1-3h-1v-2l-2-1q0.5-1,1-2h-1v-2l-3-2v-1h1c-0.719-1.4-.756-1.165-2-2v-1l-2,1v-2h-1v1c-1.13-1.136-.421.009-1-2a7.5,7.5,0,0,0,3-2h-3c-0.463-2.391-1.158-3.145-2-5-3.1.869-1.8,2-4-1-1.8-1.741-2-4.394-2-8h2a20.623,20.623,0,0,1,0-13h-1v1c-1.581,1.142-.931-2.458-1-3h-1c-1.323-2.632,1.449-3.2,2-4q-0.5-1-1-2h1c0.91-1.538.8-2.434,1-5l-2,1v-1c-2.128-1.454-2.737-1.487-3-5,1.548-1.147.964-2.7,3-1,1.242-2.293.14-7.906,0-8h2v-1h1v1h1v-1a7.69,7.69,0,0,1,4-2v2c1.135-.844.145,0.127,1-1h1v-1h-1q0.5-1,1-2c-1.354-.821-2.452-1.381-3-3h1v-1h-1C660.932,238.331,660.594,238.356,660,236Z" />
        </a>
        <?php
        $kdwil = '53.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Timor_Tengah_Utara" data-name="Kab Timor Tengah Utara" class="cls-21" d="M745,225c-2.927.684-3.275,1.113-4,4h2v5l-8,6c1.679,2.84,3.451,2.719,4,7l-4-1v1c-2.762.723-2.237,0.279-3,3h-5v1l-3-1-3,4h-4v1c-1.139,1.139-.4,0-1,2a23.67,23.67,0,0,0-5,2v1l-8-4c-1.139-1.139-.4,0-1-2-3-.7-2.234-1.646-3-2h-4v-1h-6v-1c-1.219-.083-1.819,1.954-4,1l-2-3h-3q-0.5-1-1-2c-2.813-1.39-4.523-.35-7,0,0.929-3.45,1.3-1.867,3-4-4.965-2.886-7.613-8.549-14-10v-2h4c0.748-1.574,5.456-7.932,8-7v1c5.544,1.337,8.014,7.047,8,14-1.139,1.139-.4,0-1,2l9-3h1v-5c-1.139-1.139-.4,0-1-2,2.762-.723,2.237-0.279,3-3h1q-0.5-2-1-4h1c1.139-1.139,0-.4,2-1,0.825-3.2,1.179-2.9,5-3v-3l3-1c-2.337-6.174,1.49-9.9,2-16a34.651,34.651,0,0,0,7,1v-1l3,1q0.5-1,1-2h3v-1h3l3-4h3q0.5-1,1-2h1q1-3.5,2-7l5,1q0.5-1,1-2h2c0.983-.638,1.439-3.806,4-3v1h1v3h1v2h1v9c0.04,0.2,1.437.332,1,2-0.016.061-1.809,0.38-2,2h1v3l2,1v3h1q1,3.5,2,7h-1c-0.521,2.6-1.275,5.595-3,7l-3,1v4Z" />
        </a>
        <?php
        $kdwil = '53.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Kupang" data-name="Kota Kupang" class="cls-22" d="M604,319c-0.113,3.16-1.955,1.874,1,3v2l-3,1q0.5,2,1,4a11.878,11.878,0,0,0-5,1c1.094,2.078,1.611,1.771,2,5-1.139,1.139-.4,0-1,2h-2v1l-3-1q-0.5-2.5-1-5h-1q0.5-1.5,1-3c-3.543-.317-3.949-1.314-7-2v-3l2-1v-1h4q0.5-1,1-2Z" />
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
                url: "ambil_ntt_kiri.php",
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
                url: "ambil_ntt_kanan.php",
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