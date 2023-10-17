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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="75%" height="75%" viewBox="0 0 1043 609">
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
                .cls-23,
                .cls-24,
                .cls-25,
                .cls-26,
                .cls-27,
                .cls-28,
                .cls-29,
                .cls-3,
                .cls-30,
                .cls-31,
                .cls-32,
                .cls-33,
                .cls-34,
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

                .cls-12 {

                    filter: url(#filter-11);
                }

                a:hover .cls-12 {
                    fill: #d5d5d5f3;
                }

                .cls-13 {

                    filter: url(#filter-12);
                }

                a:hover .cls-14 {
                    fill: #d5d5d5f3;
                }

                .cls-14 {

                    filter: url(#filter-13);
                }

                a:hover .cls-14 {
                    fill: #d5d5d5f3;
                }

                .cls-15 {

                    filter: url(#filter-14);
                }

                a:hover .cls-15 {
                    fill: #d5d5d5f3;
                }

                .cls-16 {

                    filter: url(#filter-15);
                }

                a:hover .cls-16 {
                    fill: #d5d5d5f3;
                }

                .cls-17 {

                    filter: url(#filter-16);
                }

                a:hover .cls-17 {
                    fill: #d5d5d5f3;
                }

                .cls-18 {

                    filter: url(#filter-17);
                }

                a:hover .cls-18 {
                    fill: #d5d5d5f3;
                }

                .cls-19 {

                    filter: url(#filter-18);
                }

                a:hover .cls-19 {
                    fill: #d5d5d5f3;
                }

                .cls-20 {

                    filter: url(#filter-19);
                }

                a:hover .cls-20 {
                    fill: #d5d5d5f3;
                }

                .cls-21 {

                    filter: url(#filter-20);
                }

                a:hover .cls-21 {
                    fill: #d5d5d5f3;
                }

                .cls-22 {

                    filter: url(#filter-21);
                }

                a:hover .cls-22 {
                    fill: #d5d5d5f3;
                }

                .cls-23 {

                    filter: url(#filter-22);
                }

                a:hover .cls-23 {
                    fill: #d5d5d5f3;
                }

                .cls-24 {

                    filter: url(#filter-23);
                }

                a:hover .cls-24 {
                    fill: #d5d5d5f3;
                }

                .cls-25 {

                    filter: url(#filter-24);
                }

                a:hover .cls-25 {
                    fill: #d5d5d5f3;
                }

                .cls-26 {

                    filter: url(#filter-25);
                }

                a:hover .cls-26 {
                    fill: #d5d5d5f3;
                }

                .cls-27 {

                    filter: url(#filter-26);
                }

                a:hover .cls-27 {
                    fill: #d5d5d5f3;
                }

                .cls-28 {

                    filter: url(#filter-27);
                }

                a:hover .cls-28 {
                    fill: #d5d5d5f3;
                }

                .cls-29 {

                    filter: url(#filter-28);
                }

                a:hover .cls-29 {
                    fill: #d5d5d5f3;
                }

                .cls-30 {

                    filter: url(#filter-29);
                }

                a:hover .cls-30 {
                    fill: #d5d5d5f3;
                }

                .cls-31 {

                    filter: url(#filter-30);
                }

                a:hover .cls-31 {
                    fill: #d5d5d5f3;
                }

                .cls-32 {

                    filter: url(#filter-31);
                }

                a:hover .cls-32 {
                    fill: #d5d5d5f3;
                }

                .cls-33 {

                    filter: url(#filter-32);
                }

                a:hover .cls-33 {
                    fill: #d5d5d5f3;
                }

                .cls-34 {

                    filter: url(#filter-33);
                }

                a:hover .cls-34 {
                    fill: #d5d5d5f3;
                }
            </style>
            <filter id="filter" x="488" y="268" width="128" height="122" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="558" y="261" width="110" height="102" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="572" y="291" width="111" height="156" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="404" y="398" width="72" height="61" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="446" y="14" width="118" height="148" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="460" y="137" width="101" height="69" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="531" y="63" width="71" height="120" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="538" y="141" width="143" height="100" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="607" y="158" width="129" height="92" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="683" y="214" width="99" height="128" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="462" y="164" width="93" height="83" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="587" y="223" width="96" height="80" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="578" y="392" width="154" height="150" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="412" y="430" width="59" height="72" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="480" y="206" width="60" height="75" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-16" x="502" y="244" width="103" height="72" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-17" x="522" y="210" width="86" height="57" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-18" x="566" y="94" width="83" height="94" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-19" x="629" y="124" width="75" height="60" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-20" x="642" y="301" width="136" height="114" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-21" x="652" y="365" width="106" height="109" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-22" x="686" y="280" width="105" height="107" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-23" x="649" y="199" width="97" height="118" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-24" x="356" y="365" width="64" height="69" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-25" x="391" y="414" width="44" height="45" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-26" x="547" y="79" width="28" height="48" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-27" x="600" y="177" width="21" height="24" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-28" x="569" y="336" width="15" height="16" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-29" x="695" y="177" width="21" height="22" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-30" x="528" y="94" width="22" height="28" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-31" x="614" y="134" width="19" height="16" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-32" x="627" y="374" width="26" height="31" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-33" x="404" y="380" width="38" height="51" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_34" data-name="Color Fill 34" class="cls-1" width="1043" height="609" />
        <?php
        $kdwil = '12.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_33" data-name="Color Fill 33" class="cls-2" d="M509,285h2v1h-1l1,2,3,2v1h2v1h2v1h3q0.5,1,1,2h2v1h2v1h3v1l4,1v1h3v1c5.035,1.639,12.832-.577,15,1h1q0.5,3.5,1,7h1v1l6-1v1h2v3h1v1h2l2,3,10-1v1h2a39.688,39.688,0,0,1,1,8h-4v4l3-1q0.5,1.5,1,3h1c1.8,2.023,1.852,3.1,5,4q1,3.5,2,7a15.682,15.682,0,0,0,6,1v-1h5c0.092-.029-0.186-0.623,2-1v7h-1v2h-1q0.5,2.5,1,5c1.135,0.844.145-.127,1,1h3c0.38-3.541,1.241-3.036,2-6l4-1v8l-2,1v2h-1v2h-1v3l-2,1v3l-2,1v2h-1q0.5,1.5,1,3h2v3l-5,1q-0.5,1.5-1,3l-10-1v-1h-2v-1l-4,1v3h-5c-1.4.208,0.414,1.015-1,1v-1h-2c0.02-8.844-4.445-8.524-6-15,2.762,0.723,2.237.279,3,3h3v-4c1.135-.844.145,0.127,1-1l3,1v-1c1.135-.844.145,0.127,1-1a3.982,3.982,0,0,1-2-2h2c1.139-1.139,0-.4,2-1,0.644-2.739,1.309-2.276,2-5h-1q-0.5-2.5-1-5a12.71,12.71,0,0,0-5-1q-0.5-1.5-1-3h1c1.048-1.3,2.043-1.489,3-3h-1c-1.139-1.139,0-.4-2-1v-2l-5-1v-2h-3v1h-1v-1c-2.18-.023-6.167,1.294-8,2v-3l-4-3v-2l-3-2q-0.5-1-1-2h-2v-1l-2-1c-2.663-3.56-2.868-7.669-8-9v-2l-3-2v-1h-2q-0.5-1-1-2h-8l-4-5h-4v-1l-3,1v1c-0.574.045-2.082-.9-4-1l-1-4c-2.621-.62-3.246-1.6-5-3v-1l-4-1-4-5-3-1v-3c3.289-2.031,4.615-6.176,6-10v-4h1v-1h3l6,5v7Zm52,56c2.53,0.059,3.549.084,5,1v1c1.971,1.1,1.148-.993,3,1h-1v3h-1C564.515,344.243,562.223,345.552,561,341Zm-26,8h2c1.211,0.754,1.2,3.826,2,5h1l4,5h-5c-3-3.216-5.521-.536-7-6h1C533.574,350.556,534.047,350.794,535,349Zm13,7,4,1v2l-5,1v-1c-3.492-2.045-2.387-1.4-2-5,1.135-.844.145,0.127,1-1,1.135,0.844.145-.127,1,1C548.139,355.139,547.4,354,548,356Z" />
        </a>

        <?php
        $kdwil = '12.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_32" data-name="Color Fill 32" class="cls-3" d="M602,268q0.5,5.5,1,11h5v-1h2v-1l6,1v1h5q0.5,1,1,2h2v1h4v1h1c1.856,5.605,2.037,11.467,8,13v1c1.368,0.787,10.258-1.592,11-2v-1h2q1-2,2-4c1.135,0.844.145-.127,1,1l4,3v1c1.451,0.911,3.194-.443,4,1v4h-1c-0.331.719,1.511,2.029,1,4h-1q0.5,6.5,1,13c-1.135.844-.145-0.127-1,1h-5v1c-1.712.527-3.637-1.268-4-1v2l-2-1v2l-3,2q1,3,2,6l-2,1q-0.5,1-1,2l-3,1v3h-1v2h-1q0.5,1.5,1,3h-1v1h-1v1h-1v-1l-3,2q0.5,1,1,2l-3,1v2l-2-1v1h-1v1h-1v2l-2-1v1h-1v1h-1v2l-2-1v1a11.567,11.567,0,0,1-5,2v-2c-3.858-2.568-3.652-6.224-10-7-1.679,2.84-3.451,2.719-4,7h-3v-1h-1v-5c1.328-1.417,1.921-6.228,2-9l-4,1v1h-9q-0.5-1.5-1-3h-1v-3l-5-3v-2h-1c-0.972-1.228-.7-1.942-2-3,1.088-4.883,1.978-4.51,1-10-4.26-2.245-6.268-2.086-13-2-2.321-3.462-3.649-.942-4-7,2.209-2.05.8-2.115,2-5h1v-3h1v-2h1v-3h1v-1h3q0.5-1,1-2h3v-1l4-1q-0.5-1.5-1-3h1v-1l6-1v-1h2q0.5-1,1-2h3v-1h2q1-2,2-4l3-1v-5a7.487,7.487,0,0,1-2-2c-3.589-1.722-3.355,1.807-6-2,2.612-1.382,1.693-1.769,6-2C598.354,267.587,599.169,267.737,602,268Z" />
        </a>

        <?php
        $kdwil = '12.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_31" data-name="Color Fill 31" class="cls-4" d="M673,347l-6-1c-1.129,1.975-1.417,2.338-4,3v3h-1c-2.3,2.739-3.61,1.79-4,7,1.975,1.129,2.338,1.417,3,4-2.523,1.339-3.5,1.99-8,2a13.813,13.813,0,0,0,5,7c-2.686,4.828-4.04,4.709-4,13-3.075-.626-3.462-1.6-7-2,0.058,5.6,1.171,5.743,3,9v2l2,1v2h1v3l2,1v2h1v8h1q0.5,2.5,1,5c4.431,1.168,3.55,3.76,8,5v2l-6,1a13.3,13.3,0,0,1-3,4q0.5,1.5,1,3h1v2h1v1h-1v7a7.886,7.886,0,0,1-4-2v-1h-2q-0.5-1-1-2h-5q-0.5-1-1-2h-2q-0.5-1.5-1-3h-1c-1.765-2.04-1.868-3.118-5-4q-0.5,2.5-1,5a10.6,10.6,0,0,1-4,1c-0.524-1.314-.409.285-1-1v-3h-1q-0.5-1-1-2h-2v-1l-8-1c0.376-3.423,1.484-3.67,2-6-0.2-.322-5.415-3.666-6-4h-2q-0.5-1-1-2h-2c-2.633-2.132-.481-5.387-2-8l-3-1v-1a12.314,12.314,0,0,0-6-3v-2a12.71,12.71,0,0,0-5-1c-0.74,1.317-2.313,3.77-4,4v-1h-1v1l-5,1c0.574-2.01-.12-0.865,1-2q-0.5-2-1-4h-1v-3l-2-1v-2h-1c-1.438-1.768-2.265-2.406-3-5a15.682,15.682,0,0,1,6-1,9.749,9.749,0,0,1,1-4c3.346,0.715,9.084,3.884,13,3v-1l4,1v-1h1q-0.5-1.5-1-3h3q0.5-2,1-4l-3-1c0.283-2.25.1-2.628,1-4h1v-2h1v-2l2-1q0.5-3,1-6l3-2c1.15-2.558-.7-5.237-1-7h3c2.294,4.622,2.9,6.128,10,6,1.784-2.709,4.361-3.1,7-5l8-9,3-2v-3h1q0.5-2,1-4h2c0.629-1.269,1.643-1.433,2-2,0.753-1.2-.862-0.432-1-1-1.565-1.293,1.954-.986,2-1q-0.5-1.5-1-3h-1q0.5-1.5,1-3h2v-3h1v-1h6v-1h3v-1l2,1v-1c1.139-1.139.4,0,1-2-2.928-2.712-2.744-15.226,0-18v-1h6c1.266,2.822,2.213,3.7,5,5v4h1q0.5,1.5,1,3h-1v6h-1q-0.5,2-1,4h1v3l3,2c0.421,1.485-1.743,1.371-2,2v3h-1q0.5,2.5,1,5h1C676.793,338.77,673.453,342.865,673,347Zm-41,32c-0.084,3.315-.062,5.954-1,8h1v2l2,1q0.5,1.5,1,3h3q0.5,1,1,2h1c2.4,3.274-.886,4.26,5,5v-1h3c-1.157-4.656-4.335-5.5-5-11l2-1c0.521-1.151-2.826-2.675-3-3q-0.5-2.5-1-5h-9Zm25,1h2q0.5,1.5,1,3h-3v-3Z" />
        </a>

        <?php
        $kdwil = '12.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_30" data-name="Color Fill 30" class="cls-5" d="M421,404a34.651,34.651,0,0,0-1,7c1.139,1.139.4,0,1,2a15.682,15.682,0,0,0,6,1,29.413,29.413,0,0,1-1,7c-1.8.945-1.574,1.385-4,2v-1h-2v-1c-1.636-.807-8.4-2.548-9-1v-7c-0.526-.7-1.462-0.047-1-2l2-1v-5h1c1.5-1.759,2.7-1.9,6-2C420.139,404.139,419,403.4,421,404Zm35,43-6,1v-1h-4l-1-2c-3.98-1.547-4.7,2.568-7,1-1.576-1.8-1.687-5.717-1-7h-1v-1h-6l-3-4c1.8-.945,1.574-1.385,4-2l-1-3,2-1v-1h-1c-1.589-1.271,1.976-.993,2-1,1.139-1.139,0-.4,2-1v-2h-3v-1a8.278,8.278,0,0,0,3-5c2.726-.294,2.757-1.141,6,0v1h4l1,2h1v-1l4,1q2.5,5,5,10h1l1,2h4l3,4h1v4l3,2c0.507,1.933-.591,1.348-1,2q-2.5,4.5-5,9h-2v-1l-3,1v-1C456.413,450.646,456.263,449.831,456,447Z" />
        </a>

        <?php
        $kdwil = '12.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_29" data-name="Color Fill 29" class="cls-6" d="M507,20V32c-4.065.689-7.71,2.488-11,4,3.368,6.26.868,4.3,0,11h1V45l3-1,3-4h2V37l3-2V34c1.4-.226-0.268.374,1,1h1c0.783,1.471-1,2-1,2l1,2h-1v1l5,3q0.5,2.5,1,5h1c1-.93,8.564-2.2,11-1l3,4h5c0.068,0.023-.076.565,2,1l1,3c0.8-.319,3.14-2.048,5-1v1h1v3l2,1c1.979,4.174-2.962,4.178,3,6,2.612,3.052,5.1,2.317,9,2-1.03,3.6-3.118,3.472-5,6h-1v4h-2l-2,4h-2v1l-3,1v2h-1q-0.5,2-1,4h-1c-0.957,2.618-.166,6.745-1,9a8.3,8.3,0,0,0-2,2h-4v1a6.148,6.148,0,0,1,3,3h-1v1h-3q0.5,3,1,6h-1v5l5,1v-4h3v1h1v4h1v1h-1v3h-1v8h-1q0.5,7.5,1,15c-1.8.945-1.574,1.385-4,2q-0.5,3.5-1,7h-1c-3.129-4.026-.237.821-5-1v-1c-3.225-1.593-5.039-3.4-8-5,0.067,1.563,1,7,1,7h-1c-2.209,2.4-2.771,1.238-7,1v-2l-2-1v-1l-4,1v-1h-2l-2-3h-8v1l-5,1-2-6h-1v-1h-7v-1l-3-2v-2c-1.441-1.864-5.288-2.47-8-3q-1-4.5-2-9h1l1-4c-3.028-1.48-3.621-1.922-5-5v-3h-1l-1-2c-1.484-.971-3.022.362-4-1-2.011-2.8,1.06-2.869,0-6h-1l-2-6-2-1a12.215,12.215,0,0,1-3-7c2.455-1.53.622-1.213,2-3l2-1V86h2l2-3c2.97-2.123,4.924-1.883,6-6h1V76h-1V70h-1l1-2c2.078,1.094,1.771,1.611,5,2V66c1.147-.559,1.63-1.791,2-2h3V63c1.481-1.074,1.69-1.669,4-2v1h1V56h-1c-0.354-1.369.343,0.252,1-1l1-2h1s-1.4-4.593-1-6h1V41l3-2q-0.5-3.5-1-7h3V31c1.139-1.139.4,0,1-2a8.278,8.278,0,0,1-3-5h2V23h1v1h6c0.945-1.8,1.385-1.575,2-4l7-1v1h4Z" />
        </a>

        <?php
        $kdwil = '12.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_28" data-name="Color Fill 28" class="cls-7" d="M490,150c4.747-.215,9.117-1.4,13-2l2,3h2v1h5v1c1.139,1.139.4,0,1,2l7,1c1.382-2.612,1.769-1.693,2-6-1.139-1.139-.4,0-1-2h1c1.166,1.361,1.825,1.528,4,2v2l4,1v1l3-1q0.5,1,1,2l7,2v-1c1.139-1.139.4,0,1-2h3v1h1v3l9-3-3,9h1v2h1c0.885,1.4.694,1.737,1,4h-2c-0.708,1.284-2.84,2.7-3,3v4l-4,3v9c-1.2,3.7-3.456,5.947-4,11-4.415-.03-9.072-0.762-11-3q-0.5-1.5-1-3l-7-1-3-5h-8a12.223,12.223,0,0,1-6,4l-5-6c-1.768-4,1.34-5.618,0-9l-2-1v-2c-3.127.4-3.073,0.735-5,2v1h-4c-2.017-3.111-1.79-.425-4-2-1.369-.976-0.041-2.493-1-4h-1c-1.707-2.115-1.341-2.557-5-3q0.5,2.5,1,5l-7-1c-0.091-4.76-.876-5.577-3-8l-2-1v-6l-2-1-1-4,5-1v-2h5c1.319-2.371,2.791-4.128,4-7,2.881,1.214,6.871,1.819,10,3Q489.5,147.5,490,150Z" />
        </a>

        <?php
        $kdwil = '12.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_27" data-name="Color Fill 27" class="cls-8" d="M562,68l1,3h1v2h1l-1,3h1v5h1v1h-1c-0.9,1.053-3.068,3.064-5,3-0.621-.385-0.091-1.55-2-1v1l-3,1,3,5c-0.044.165-3.226,1.7-3,3h1a10.907,10.907,0,0,0,2,4h1q0.5,3.5,1,7h-4v1c-0.4.041-2.228-.9-4-1v1c2.371,2.481.047,12.392-1,15h3v-1c2.683-.979,2.067,2.3,4,2v-1c1.719-1.127,1.355-.633,2-3,2.58-.093,3.473-0.157,5-1v-1c2.037-.851,4.071.524,5,1v-1h1v-1h-3c0.463-3.986,1.689-3.555,2-8h-4v-3l-2-1v-1h1V98h1V92h2c-0.7-2.835-1.783-2.888-3-5a15.68,15.68,0,0,1,6-1l5,7h4v1h2v1h3v1h2v1h8v1h1v4h-1v3l-2,1q0.5,5.5,1,11c0.065,0.282,1.29.306,1,2h-1v4h-1v3h-1v6h1q-0.5,3-1,6c-4.921.221-5.655,2.063-10,3-0.723,2.762-.279,2.237-3,3-1.139,1.139,0,.4-2,1v3h-1c-1.139,1.139,0,.4-2,1v2h-1a21.266,21.266,0,0,1-3,4v1h-2c0.135,8.479-1.627,13.892-3,21h-1c-1.663-2.5-4.778-2.144-9-2,0.034-2.062,1.082-6.682,1-7-0.5-1.959-3.616-3.506-4-6l2-1q0.5-3,1-6l-9,2v-2c-2.523-1.339-3.5-1.99-8-2a3.982,3.982,0,0,1-2,2v-7l5-3c-1.287-3.57-2.383-15.19-1-20,0.464-1.612,2.749-6.378,2-9h-1c-0.635-1.843-.428-2.568-1-4h4v-7l-2-1V99l-2-1q0.5-5,1-10h1c0.81-1.762.637-3.9,2-5h2l1-2c2.421-1.76,1.764,1.059,3-3,5.557-1.765.813-1.465,3-5l3-1V71A12.582,12.582,0,0,1,562,68Z" />
        </a>

        <?php
        $kdwil = '12.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_26" data-name="Color Fill 26" class="cls-9" d="M643,146l3,1c0.532,1.478,1.52,3.3,1,6h-1v1h1v1l2,1v-1h1q-0.5-1-1-2h2v-1c2.01,0.574.865-.12,2,1h1v3c-1.194,1.1-2.7,2.691-1,4h-2q-0.5,2.5-1,5h8v1l6,2v-1h1v3l4,1v-1h1v1h2v1l3,2c-1.6,3.668-4.821,7.942-9,9v3c-2.128,1.212-2.177,2.252-5,3-1.556,5.525-3.284,2.535-7,5l-4,5-2-1v-1c-2.464-.878-8.321,3.355-11,4-0.655,4.192-2.018,7.028-6,8q-0.5,2-1,4h-2c-1.982,2.974-4.9,2.886-6,7-4.786,1.446-.933,1.142-3,4l-5,2v2l-2,1v4h-1c-3.145-5.1-2.586-.889-8,0v2c-3.074-.993-0.955-0.934-4,0q-0.5-3.5-1-7h-2c-0.871-3.428-2.068-2.575-3-6h-3l-3-4c-3.322-2.3-4.623-.007-6-5-2.1-.491-5.48-2.712-7-4q-0.5-1-1-2h-2v-1h-2q-0.5-1-1-2c-3.338-1.9-3.553,1.51-5-4h-2q-0.5,1-1,2c-2.2.745-5.153-1.662-8-2v-2c-2.123.609-1.849,1.251-4,0v-1h-3c-1.2-.9-0.952-2.882-1-5,3.579-3.275.277-5.463,2-10h1v-2l3-2q0.5-3,1-6l3-1v2h1v3l7-1q0.5,1,1,2c1.985,0.4,1.274-.521,2-1h1v-6h1q0.5-3.5,1-7h1a1.614,1.614,0,0,0-1-2c-0.279-1.684.938-1.728,1-2v-1h-1q0.5-1,1-2c4.619,1.79,11.066-.019,16-1q0.5-2,1-4c5.848,0.044,7.449-1.452,12-2q-1,4.5-2,9h1v-1h6a9.777,9.777,0,0,1-5,8c1.756,3.316,2.058,4.368,2,10a13.869,13.869,0,0,0-5,7l8-1q1-4,2-8h2c1.568-5.985,4.149-3.792,9-6v-1h2l2-3h3l3-4h2q0.5-1,1-2l4,1q0.5-3,1-6c2.762-.723,2.237-0.279,3-3h4v-2c1.413,0.054-.393.758,1,1C642.86,149.889,643,146,643,146Zm-36,37c-0.414,2.437-1.816,5.442-1,9a2.489,2.489,0,0,1,1,3l-2,1v2c4.312-1.006,7.232-4.195,11-6-0.637-5.687-1.341-5.52,1-10h-6v1h-4Z" />
        </a>

        <?php
        $kdwil = '12.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_25" data-name="Color Fill 25" class="cls-10" d="M700,163c0.5,3.966,1.262,3.5,3,6h1v3c2.927,0.684,3.274,1.113,4,4,5.15,1.336,2.645,4.574,8,3,1.208,1.048,1.209,3.825,2,5l6,5h2q0.5,1,1,2h3q-1,7-2,14h-2l-5,7h-2c-2.534,1.83-1.933,3.944-6,5q-0.5,1.5-1,3h-1v2h-1c-1.35,1.481-.49,1.373-3,2q-0.5,1.5-1,3l-2-1v1l-4,3v2h-1v-1c-1.337.754-1.053,1-2,2h-1v2l-2-1v1h-1q-0.5,1-1,2h-7v1h-5q-0.5-1-1-2l-3,1v-1c-1.681-1.064-1.652-1.375-4-2-2.447,3.557-1.874.313-5,2v1c-2.187,1.6-2.946,3.2-6,4v-1h-1c0.823-1.876,1.481-2.616,2-5-3.374.979-1.913,1.212-4,3v1h-2q0.5-2,1-4h-1c-1.139,1.139,0,.4-2,1q-0.5,1.5-1,3h-5v1h-1v-1l-6-1-2,3c-2.287,1.4-5.044-.169-8,1q-0.5,1-1,2l-3-1v-2c-1.216-.6-1.521-1.714-2-2h-2v-1c-2.274-.841-2.714,1.078-4,1v-1h-4c-2.46-1.393-2.1-6.031-2-10a61.347,61.347,0,0,0,6-4v-2l6-5q0.5-1,1-2h2v-1l2-1v-2l2-1v-1l3-1q0.5-2.5,1-5l10-6c2.078,1.094,1.771,1.611,5,2a16.98,16.98,0,0,1,6-6h3q0.5-1.5,1-3l3-1c1.584-1.194,3.511-6.687,4-7h2v-2l3-1v3h1c0.826-3.2,1.179-2.9,5-3,0.147-4.161,1.258-4.722,2-8h-2c0.826-3.2,1.179-2.9,5-3,1.582,2.394,3.953,2.124,8,2C693.53,167.213,696.548,163.881,700,163Zm1,20q0.5,2.5,1,5h-2a10.6,10.6,0,0,0-1,4c2.078,1.094,1.771,1.611,5,2v-1h5v-1c1.139-1.139.4,0,1-2-1.8-.945-1.574-1.385-4-2,0.488-4.336,1.423-2.641,2-7C703.664,181.488,705.359,182.423,701,183Z" />
        </a>

        <?php
        $kdwil = '12.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_24" data-name="Color Fill 24" class="cls-11" d="M737,219c4.95,1.186,6.188,5.552,6,12-1.652,1.949.56,7.556,1,11h4c-0.682-6.963-2.333-9.615-1-17,4.5-2.626,3.159-3.961,11-4v1h1v4h1v4l2,1c1.88,2.111,3.225,3.7,4,7,3.218,0.808,3.556,2.559,6,4-1.592,3.826-5.748,15.946-4,22h1v6h1v2h1l3,10h2v1h-1c-3.467,3.059-12.612-1-17,1l-2,3h-9c-0.381,1.88-3.925,10.289-5,11-1.895,1.254-2.828-.49-5,2h-1v8h-1l-3,4h2v1h3q-0.5,2.5-1,5a12.71,12.71,0,0,1-5,1v-5c-2.583.544-3,2-3,2-1.525.516-4.03-1.937-7-1v1c-1.789.645-2.585,0.418-4,1-0.669,1.2-1.591,1.392-2,2v2l-3,2v13h-2c-0.545-2.748-2.467-4.829-3-7a1.626,1.626,0,0,1,1-2q-0.5-2-1-4l3-1v-6h1a1.725,1.725,0,0,0-1-2q0.5-2.5,1-5c-6.039-1.332-12.468-1.117-14,5-3.079.792-3.376,1.883-4,5h-3a68.253,68.253,0,0,0,1-12l-3-1c1-4.384,2.959-3.617,7-5,0.814-1.156-.827-0.685-1-1-0.9-1.643,1.377-.881,2-1,1.152-4.669,2.881-2.67,5-5q-0.5-1-1-2h1v-2c0.268-.437,1.4-0.921,2-2,8.548,1.632,14.4-.395,21-1v-2c1.413,0.054-.393.758,1,1,0.86,1.889,1-2,1-2h-2c1.152-3.686-.352-4.5-2-8h2q-0.5-1.5-1-3l2-1v-2h1q-0.5-1-1-2l3-1q0.5-1.5,1-3c-0.038-.025-1.976.023-1-1h2c0.788-.784,1.878-2.459,0-3v-1h2q0.5-2,1-4h-1v-1h2q-0.5-1.5-1-3h2c1.424-1.306,1.148-2.26,2-4h1q-0.5-1.5-1-3l3-1q-0.5-1-1-2h1a2.731,2.731,0,0,0-1-3q0.5-3.5,1-7h-1v-2h-1v-1h1Q738,223.5,737,219Z" />
        </a>

        <?php
        $kdwil = '12.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>

            id="Color_Fill_23" data-name="Color Fill 23" class="cls-12" d="M480,169h3v1c1.139,1.139.4,0,1,2h1v3c2.29,0.272,2.574.16,4,1v1h3v1c2.96,0.5,4.728-4.608,6-4v1c1.146,1.027,1.214,1.64,2,3h1c0.536,1.511-2.066,4.116-1,7h1c1.65,3.506,1.856,5.883,6,7v1c1.4,0.226-.268-0.374,1-1,3.616-2.084,4.82-3.883,11-4,2.285,4.5,4.145,6.024,11,6v3h1c2.271,2.706,6.029,3.945,11,4q0.5,5,1,10c2.613,0.624,2.846,1.06,4,3,1.8,1.776.288,0.29,1,3h1v1h-1c-0.937,5.4-.133,16-3,19v1h-3q-0.5,1-1,2l-5,1c-2.461-4.261-4.724-4.6-6-11-3.263-.559-7.941-2.008-10-4q-1-2-2-4h-4v-1h-2l-1-2-6,1v-1l-4-1-4-5h-4c-3.009-1.347-3.743-3.906-5-7-2.9,1.042-4.924,1.6-7-1l-1-3h-2l-2-3h-2v-1c-1.2-.616-3.333.183-4-1q0.5-5.5,1-11l-2-1q-0.5-3-1-6h1v-1h-1l-1-3c2.142,0.119,3.4,1.019,4,1v-1h2v-2l8,1Q480.5,171.5,480,169Z" />
        </a>

        <?php
        $kdwil = '12.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_22" data-name="Color Fill 22" class="cls-13" d="M598,234c2.01,0.574.865-.12,2,1,1.859-.4,8.741-4.031,9-4v1l4,3q0.5,1.5,1,3h2v1h8v1c2.892,2.133,1.842,3.622,7,4,3.157-4.057,2.712.427,7-2q0.5-1,1-2h2v-1c2.263-.435-0.272,1.892,2,2v-1h2v-1h1v1l7-1c0.715-.326.035-1.291,3-2v1c-1.139,1.139-.4,0-1,2,2.391-.463,3.145-1.158,5-2v2c0.54,0.642,1.006,5.861,0,8l-2,1v2h-1v3l4,2q0.5,1,1,2h2l2,3h3v6l8,3v2h-4c-0.614,3.951-1.058,3.6-2,8-7.684-.086-9.063,2.729-15,4q-0.5,2.5-1,5l-4,1c-0.574,2.01.12,0.865-1,2-1.69,2.195-8.808,5.612-11,4-4.954-1.129-3.656-1.683-6-5l-3-2c-2.179-4.447,3.309-4.934-3-7v-1h-4q-0.5-1-1-2c-3.037-2.2-2.818-.212-5,0q-0.5-1-1-2h-3v-1h-1v1c-3.581.895-4.312,1.553-8,2-0.362-3.27-1.983-6.658-1-8,1.365-2.512,2.333-3.605,6-4a5.442,5.442,0,0,0,2,2v-1c4-1.555,7.128-3.351,11-5q0.5-3,1-6a12.71,12.71,0,0,0-5-1c-1.716,2.991-4.385,3.886-9,4q0.5-2.5,1-5h1l-3-10-4-2q-0.5-1-1-2h-2v-1l-5-1c-1.788-1.092-3.738-6.051-4-9,1.8-.945,1.574-1.385,4-2C597.382,230.612,597.769,229.693,598,234Z" />
        </a>

        <?php
        $kdwil = '12.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_21" data-name="Color Fill 21" class="cls-14" d="M598,398v2h1v1h3v1l6,5q0.5,3,1,6l11,6c-0.626,3.075-1.6,3.462-2,7,2.154-.7,2.367-1.094,5,0v1h4v1h2c1.331,1.015.023,2.509,1,4,0.485,0.74,2.169.894,3,2,2.01-.574.865,0.12,2-1,2.126-1.419,2.023-2.617,3-5l3,2v2l4,3v1l4,1v-1h1v1l3,1v1c2.6,1.836,1.828-1.078,3,3h4V431h-1c-0.816-1.454-.693-1.7-1-4,2.937-1.708,2.863-2.891,8-3v-1h3c0.915,3.515,2.433,2.853,3,7,2.01,0.574.865-.12,2,1h1q0.5,2.5,1,5l3,2q-0.5,3-1,6h1q0.5,1,1,2h2l3,4c2.449-1.091,3.225-1.813,7-2,1.577,2.892,4.079,4.574,5,8,7.373,1.072,14.019,3.3,14,12-2.458,1.872-3.263,3.75-2,7h1q-0.5,1.5-1,3h1v1l2-1v1h1a1.5,1.5,0,0,1,2-1v1c1.482,0.764,1.685.7,4,1v3h2q-1,2-2,4h1c0.765,2.6,1.562,3.206,3,5h1v2l2,1v1c-0.045.142-.96-0.236-1,2h1v1h-2q-0.5,2-1,4l-2-1v1h1v1h-1c-1.139,1.139,0,.4-2,1v2h-2v-1c-1.72-.381-1.71.932-2,1-2.279.536-2.682-.626-4-1-1.352.972,1.2,1.59-1,2v-1h-3v-1h-2v-1h-1v1h-1v-1a1.715,1.715,0,0,0-2,1l-4-1v1h1c-0.636,1.421-1.166.742-2,2l-3-1s-0.164,2.141-1,1v-2l-4-1v-1h1v-1h-1v-4a20.2,20.2,0,0,1-3-3h-1q-0.5,1.5-1,3l-2-1v2h-1c-0.1-.177.1-1.889-1-1v2h-1v-1c-1.335.321-1.706,1.567-4,1-1.373-.339.394-0.761-1-1v1h-1v-1c-1.707-1.082-2.124-2.129-3-4-2.906,1.727-.885,3.431-4,2v2l-3-1-2,3h-1v2c-0.406.3-2.254-1.6-4-1v1h-1v1h1c1.889,0.86-2,1-2,1-0.755,2.8-1.754,2.906-3,5h-1q0.5,1.5,1,3h-2v1h1q-0.5,1.5-1,3h-2q0.5,1,1,2h-2q0.5,1,1,2h-2v1c-1.357,1-2.538.95-5,1-1.312-.944-3.226-0.426-6,0,0.153,1.406.748-.392,1,1,0.242,1.338-2.178,2.5-3,3v1l-2-1v1h-1q0.5,1,1,2h-2q0.5,1,1,2c-0.757.932-2.046,0.765-3,2-2.01-.574-0.865.12-2-1h-1v-1c2.847-2.026.7-.67,1-4,0.608-.655,1.484.329,1-1l-2-1c-0.052-2,1.529-.711,0-2-3.158-3.427-3.248,1.134-4-4,1.224-1.03.928-.425,0-2l3-1c0.98-1.941-.848-2.96-1-4h1a2.516,2.516,0,0,0-1-3q0.5-1.5,1-3l-2-1q0.5-1.5,1-3l-2-1v-2h-3v-1c1.012-.632,1.814-0.539,2-2h-1v-1c0.107-.283,1.657-0.709,1-3h-1q0.5-1.5,1-3h-2q0.5-1,1-2h-2q0.5-1,1-2h-2v-1h-3q0.5-1.5,1-3h-1v-1h1q-0.5-3-1-6l3-1v-1c-2.581-1.5-3.372-3.571-4-7h-2v-1h1c-0.989-1.408-2.01-1.713-3-3,1.139-1.139.4,0,1-2h-4q-0.5-1.5-1-3h-1q0.5-1.5,1-3h-1v-5h-1a1.863,1.863,0,0,1,1-2v-1h-2v-2h1v-1h-2v-1h1c0.63-2.165-3.953-1.123-1-4h-2a12.646,12.646,0,0,0-1-4h1v-1l-2-1c-1.289-2.841-.275-7.033,0-9-1.2-.417-2.167.921-2-1,0,0,2.043-.044,1-1-1.317-1.207-1.54,1.188-2-1,0.017-.012,1.989.011,1-1h-2q0.5-1,1-2h-2q0.5-1,1-2h-2q0.5-1,1-2h-2q0.5-1,1-2h-1v-3h-1q0.5-1,1-2h-2c-0.265-1.389.234,0.189,1-1q-0.5-1.5-1-3c4.091-.483,4.069-1.814,9-2,0.574-2.444,1.047-2.206,2-4Z" />
        </a>

        <?php
        $kdwil = '12.14';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_20" data-name="Color Fill 20" class="cls-15" d="M424,435c3.992,0.531,3.464,1.261,6,3v1h6v8l9-1v1h2v1h3v1l5-1v1h1c0.989,1.329-.42,3.156,1,4h5v1h1l-1,4a2,2,0,0,1,1,2,1.6,1.6,0,0,0-1,2l2,1c0.981,3.557-4.5,5.859-3,10l2,1-1,2h1l-1,2,1,3a1.853,1.853,0,0,0-1,2,1.665,1.665,0,0,1,1,2h-1l-1,5h-1v-1c-1.351-.417.114,0.422-1,1-2.064,1.07-4.231.167-2,3h-2c-1.139,1.139,0,.4-2,1v2l-4-1-1-3c-1.135.844-.145-0.127-1,1h-1v3h-1c-0.844-1.135.127-.145-1-1l-1-3h-2l1,2h-4c-0.945-1.8-1.385-1.574-2-4h1l-1-2a1.752,1.752,0,0,0,1-2l-2-1v-2h-2v-1h1v-1h-1v-4h-1c-0.372-1.364.805,0.4,1-1q-1-3.5-2-7l-2-1v-3c-1.185-2.511-3.15-2.6-4-6h-2v-2c-3.506-.8-3.9-1.772-4-6a8.445,8.445,0,0,0,2-3h-1c-1.139-1.139,0-.4-2-1q-0.5-4-1-8l6-1Z" />
        </a>

        <?php
        $kdwil = '12.15';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_19" data-name="Color Fill 19" class="cls-16" d="M486,212l3,1a2.358,2.358,0,0,1,3-1v1h2v1h3l3,4c1.19,0.764.54-.817,1-1,1.314-.522.517,0.388,1,1v1c1.02,0.98.966-.98,1-1,1.648-.992.85,1.451,1,2,2.547,0.329,8.176,1.205,9,0v2l5,1v2c2.128,1.212,2.177,2.252,5,3v1l6,1q0.5,2,1,4h2c-1.009,3.532-.932,1.968,1,5h1v4c-1.135.844-.145-0.127-1,1a18.223,18.223,0,0,0-7,1q1,3,2,6h-1v1h-7c-0.811,4.634-2.34,5.195-8,5q0.5,3.5,1,7h-1v1h1v3l-5-1v-2c-1.135.844-.145-0.127-1,1h-1c0.877,2.1,1.9,6.969,0,9a11.9,11.9,0,0,0-7-4v-1h1l-1-3h-2v-1h1c-0.262-1.611-1.489-1.069-2-2v-2h-1v-3h-1v-1h1v-1l-3-1,1-2-4-3v-1h-2l1-2h-2l1-2h-1v-6h-1v-1a1.576,1.576,0,0,0,1-2h-1v-1c3.137-.56,4.19-0.974,5-4h-1v-7h-1c-0.391-1.69,1.862-1.151,0-3h-2l1-2-2-1v-5C486.139,212.861,485.4,214,486,212Z" />
        </a>

        <?php
        $kdwil = '12.16';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_18" data-name="Color Fill 18" class="cls-17" d="M554,260l6-2v-2h2v1c1.68,0.3,1.741-.943,2-1l10,1c1.376,2.531,3.18,3.817,4,7l3,1c-0.308.871-1.912,2.214-1,4h1v1h3c1.786-1.616,7.924-.158,12,0,1.584,2.749,2.47,1.8,3,6l-4,2v2l-2,1v1l-5,1q-0.5,1-1,2l-8,2v4l-11,4c-0.2,2.862-3.553,11.625-5,13-1.593,1.485-5.892,1.092-9,1a15.682,15.682,0,0,1-1-6c-2.017-.583-0.865.175-2-1h1v-1H538v-1c-2.3-.789-5.3-0.474-6,0v-2c-1.5-1.547-1.394-.4-3,0q-0.5-1-1-2h-3v-1c-1.653-1.078-1.331-.922-3,0v-2c-1.059-.938-0.867.966-1,1-1.344,1.506-.969-1.9-1-2-4.447-.741-7.143-2.709-9-6-3.724-4.015.628-3.947-1-8l-2-1c-0.932-2.236-.263-6.983-1-9h4c0.579,0.416.147,1.633,2,1v-1h1q-0.5-2.5-1-5h1a2.853,2.853,0,0,0-1-3q0.5-1.5,1-3c3.4,1.064,2.733.458,6-1v-3c2.209-.349,1.9-0.969,2-1h6q0.5-1,1-2h4v-1h1q0.5,1.5,1,3h1v-1l2,1v-2l2,1v-1c3.207-.923,6.75-0.059,9-1v1l3,1v1h2q-0.5,1-1,2h1v6Z" />
        </a>

        <?php
        $kdwil = '12.17';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_17" data-name="Color Fill 17" class="cls-18" d="M584,225q0.5,1.5,1,3h1q0.5,1.5,1,3l2,1v3h1v2h1v3l2,1c3.27,3.517,7.566,5.624,9,11-1.8.945-1.574,1.385-4,2-2.151,2.076-7.575,2.082-12,2a10.06,10.06,0,0,0-8-5v-3h-1c-2.34-2.446-1.659-1.4-4-1v-1h-2l-2-3c-2-1.865.1-.959-1-3l-2-1q0.5-1,1-2h-1v-2l-2-1q-0.5-3-1-6h1c0.278-2.189-1-2-1-2v-4h1c1.515-4.038,1.688-5.9,6-7,2.372,2.673,3.146.467,6,2v1l3,2C581.023,222.723,580.119,223.952,584,225Zm-35-7c4.11,1.051,1.176.523,3,3h1c1.627,2.009,2.009,3.1,2,7h-1v1h1c1.674,1.951,4.666,2.722,8,3v5h-2c-0.574,2.01.12,0.865-1,2,0.574,2.01-.12.865,1,2,1.256,1.909,1.014,1.659,4,2,1.139-1.139,0-.4,2-1,1.543,5.828,7.127,6.753,8,14,3.217,0.738,3.641,1.357,4,5h-2v-2c-2.128-1.212-2.177-2.252-5-3-3.152-2.738-14.316,1.62-17,3v-1h-1v-3h-1v-1h1v-1c-3.052-5.127-6.175-4.171-14-4-0.77.918-2.742,2.749-4,3l-2-3h-6q-0.5-2-1-4c1.135-.844.145,0.127,1-1,4.1,0.734,3.841,1.544,7-1q0.5-1,1-2l3,1q0.5-1,1-2h2v-1h2v-1l3-1C546.925,229.283,548.61,224.691,549,218Z" />
        </a>

        <?php
        $kdwil = '12.18';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_16" data-name="Color Fill 16" class="cls-19" d="M612,105q0.5,1.5,1,3h1v-1c2.733,0.587,2.316,3.48,4,5h1v-1l3,1v1l2-1v2l2-1v1h2v1l3,1c1.173,4.674,2.9,2.663,5,5q-0.5,1-1,2h1v1h1v-1l3,1v2l2,1c1.209,3.208-2.226,7.543-3,9q-0.5,2-1,4l-2,1v4l-2,1q-0.5,3-1,6l-2,1-3,5h-3c-1.506,5.6-1.715,2.041-5,4l-3,4h-3v1h-2v1h-3v1l-3,2v2l-2,1q-0.5,3-1,6c-1.079,1.333-3.614.937-6,1v1h-1v-2c2.488-1.519.623-1.083,2-3h1c1.516-1.894,1.846-2.475,2-6h-1c0.118-1.173,1.908-1.9,1-4a11.178,11.178,0,0,1-2-2c2.485-1.524.621-1.082,2-3h1c1.377-1.718,1.661-2.006,2-5h-7q1-4,2-8c-1.135-.844-0.145.127-1-1l-6,2v1a1.617,1.617,0,0,1-2-1c-2.532-.425-3.589.491-5,1v3c-4.4.764-8.917,1.851-14,2v-2h1a21.266,21.266,0,0,1,3-4v-1h2v-3h1c1.166-1.361,1.825-1.528,4-2q0.5-1.5,1-3c4.649-.443,5.369-2.432,10-3V124h1v-2h1c1.2-3.5-1.192-6.644-1-9h1c0.18-3.09-3.039-2.366-2-6h1v-2h1c0.944-1.5.817-2.453,1-5,3.086-.182,5.783-1.442,8,1q0.5,1.5,1,3l2-1v1Zm11,31q0.5,1.5,1,3a14.809,14.809,0,0,0-6,1q0.5,2.5,1,5h-1v1h1q0.5,1.5,1,3h1a11.878,11.878,0,0,1,1-5c2.976,1.147,3.04,1.09,6,0q-1-2-2-4c0.381-.581.878,0.7,2-1l-3-1v-2h-2Z" />
        </a>

        <?php
        $kdwil = '12.19';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_15" data-name="Color Fill 15" class="cls-20" d="M668,145v3h1c1.139,1.139,0,.4,2,1v3h1c1.139,1.139,0,.4,2,1v1l5,1v-1h1v1l8,1v2l2-1c2.093,0.967,6.011,6.151,8,4v3c-1.356.683-1.291,1.51-2,2h-2v1c-1.481,1.358-1.355.5-2,3h-7v-1c-1.944-1.275-1.879-1.546-5-2-0.945,1.8-1.385,1.574-2,4h2q-0.5,3.5-1,7h-3v-4c-1.77-.943-3.206-4.133-5-2v-2h-5v-2c-2.822-.542-4.774-2.273-7-3-3.006-.982-6.882-0.2-9-1,1.792-4.04,4.4-6.822,5-12-1.135-.844-0.145.127-1-1l-4,1q-0.5,1.5-1,3c-1.135-.844-0.145.127-1-1h-1c-1.137-2.07.708-5.082,1-6l-2-1v-1h-1v1l-3-1v2c-2.7.392-2.812,1.482-5,0v1c-1.139,1.139-.4,0-1,2h-2c0.288-3.831,1.865-4.595,3-7v-3l2-1v-2h1c0.91-1.934,2.174-7.312,1-8h2v-1c2.9,0.616,4,1.613,6,3v1h4v1h3q0.5,1,1,2h2l2,3h2c1.561,1.176,1.848,5.233,3,6h2Z" />
        </a>

        <?php
        $kdwil = '12.20';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_14" data-name="Color Fill 14" class="cls-21" d="M682,306l4,1v1c0.474,0.048,2.146-.914,4-1q0.5,4.5,1,9h-1v2h-1c-0.583,1.288.479,0.539,1,1v1h3q1-2.5,2-5l3-1v-2l3-1q0.5-1,1-2h8v2h-1c-0.337,1.68.948,1.756,1,2,0.451,2.105-1.149,8.09-2,9-1.139,1.139,0,.4-2,1l3,13-8-1q-0.5-1-1-2c-2.668-1.081-5.152.681-7,1-0.875,2.316-1.017,4.407-1,8l6,5v1l3,1,2,3,4,1v1h1v2c1.022,1.113,2,.7,4,1l6-9c1.135,0.844.145-.127,1,1h1l4,10h4v-1h3v-1c4.3-3.818,2.537-9.592,10-10,2.294,4.046,6.688,7.151,8,12h2v3c1.132,0.556,1.642,1.8,2,2h3l4,5h2q0.5,1,1,2c4.1,2.627,7.223.5,8,7h-2v1l-3-1v2l6,2q-0.5,1.5-1,3h-8v1h-2v1h-5v1l-8-1h-1v1H736c-0.945,1.8-1.385,1.574-2,4-2.952-.661-2.422-1.748-3-2h-6v-1h-1c0.041-3.435.255-6.783-1-9l-2-1v-7l-2-1v-2c-4.161.147-4.722,1.258-8,2-1.279,5.617-2.336,4.355-6,7l-3,4h-2l-2,3h-3c-0.894.617-1.662,3.55-2,5-4.183.81-6.371,3.6-9,6q-0.5,1-1,2l-6,1-3,4c-1.234.737-.906-2.148-3,0v2h-1v-1h-1v1h-6v1c-1.139,1.139-.4,0-1,2a7.173,7.173,0,0,0-4,1v-1l-2-1v-1h1q-0.5-2.5-1-5l-3-2v-3h-1v-2l-2-1v-3l-2-1q-0.5-2-1-4a10.6,10.6,0,0,1,4-1c1.127,1.719.633,1.355,3,2q0.5-5,1-10h1l3-4c-1.947-1.231-3.873-4-5-6,1.135-.844.145,0.127,1-1,3.129,1.01,1.518.557,5,0a12.71,12.71,0,0,0,1-5h-2v-6h3v-1c1.361-1.166,1.528-1.825,2-4l3-1v-1h2v-1l4,2v-1c0.935-1,4.125-11.191,3-14-0.115-.287-1.734-0.418-2-2q1-4.5,2-9l-2-1c-1.763-3.752-.017-7.021,0-12,1.135-.844.145,0.127,1-1,4.293,1.146,2.924,3.293,8,4Q682.5,309,682,306Zm-25,72c-0.594,3.715-.58,2.289,0,6h2q0.5-1.5,1-3h-1v-3h-2Z" />
        </a>

        <?php
        $kdwil = '12.21';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_13" data-name="Color Fill 13" class="cls-22" d="M723,388h2q-0.5,1.5-1,3l6-1v1c1.707,1,4.29,3.171,5,5q-0.5,1-1,2h1c1.139,1.139,0,.4,2,1,0.723,2.762.279,2.237,3,3v2c3.818,0.663,5.583,1.759,6,6h-1c-0.967,1.824.57,4.257,1,5h1v2h2q-0.5,1-1,2h2v1c1.6,1.524,1.734.81,2,4h-2v-1h-1v2l-2-1q0.5,1,1,2h-2v1h1q-0.5,1.5-1,3h1v2h1q0.5,1.5,1,3h-2v2h1v-1c1.421,0.636.742,1.166,2,2-0.57,2.992-1.809,2.541-2,3q0.5,1.5,1,3h-1l-3,4h1v1h-2q0.5,1.5,1,3l2-1v1h1v6c-1.157.769-2.345,0.725-2,3h1q-0.5,1-1,2h1l2,3,2-1v3c-1.681-.248-2-1-2-1l-2,1v-2l-2,1v-2h-1v1a9.027,9.027,0,0,1-2-2l-2,1v-2l-2,1q-0.5-1.5-1-3l-2,1c-1.3-1.192,1.188-1.537-1-2v1h-1v-2h-1v1l-3-1v-1l-2,1v-2h-1q-0.5-1.5-1-3l-2,1v-2a27.724,27.724,0,0,1-4,1v-2l-3-1v1h-1c0-.247.376-3.359-1-2v2l-2-1v2l-2-1v1h-1a21.507,21.507,0,0,1,2,7c-3.113-.34-3.114-0.728-5-2v-1h-4v-1c-1.642-.647-2.661-0.44-4-1q-0.5-1.5-1-3h-2v-2c-2.731-1.584-2.446-2.742-7-3a8.445,8.445,0,0,1-3,2v-1l-6-4q0.5-3,1-6h-1c-1.782-2.847-2.938-2.922-3-8h-2q-0.5-1.5-1-3l-3-2v-2h-1q-0.5-1-1-2h-3q-0.5-1-1-2a23.768,23.768,0,0,0-6-4q-0.5-2.5-1-5c3.352-1.145,4.906-.183,6-4h5v-2l2,1v-2h1v1h1v-1l3,1q1-2,2-4l6-1,6-7,4-1q1-2.5,2-5l6-2,4-5h2c4.541-3.3,3.246-8.105,11-9a9.983,9.983,0,0,0,2,2v6h1C722.45,381.249,722.925,383.222,723,388Z" />
        </a>

        <?php
        $kdwil = '12.22';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_12" data-name="Color Fill 12" class="cls-23" d="M758,285h19v5h-1q0.5,1,1,2h-2q-0.5,3-1,6l-2,1q0.5,1,1,2l-2,1q0.5,1,1,2h-1v20l-5,4v1h1c-0.307,1.362-1.778,3.4-1,6h1q-0.5,1-1,2h1v1l2-1c1.232,0.683-.48,1.771,3,2,0.7-.557-0.321-1.5,1-1,0.174,0.067.255,1.4,3,2v5h-1q-0.5,1.5-1,3h1v1l2-1v2h1v-1h1v1c0.354,0.037,2.27-.89,4-1v4c-2.784-.549-0.1-0.77-3,0v1h3q-0.5,3-1,6s1.434,0.611,1,3a1.739,1.739,0,0,0-1,2h1v6h1c0.577,2.394-.971,2.6-1,4h1v1h-1q-0.5,2-1,4l-2-1v2h-1v-1c-3.492,1.35-4.417.7-8,0,3.077-8.645-5.067-7.7-10-11l-4-5-4-1v-1h-1c-2.045-2.877,1.791-2.568-3-4v-2c-4.833-3.294-3.975-9.547-12-10l-6,11h-2v1h-5l-4-11h-3c-1.021,4.292-4.206,6.282-6,10l-2-1q-0.5-1.5-1-3h-2q-0.5-1-1-2c-4.312-2.807-8.06-4.866-11-9h-1v-4c-1.139-1.139-.4,0-1-2,2.523-1.339,3.5-1.99,8-2,1.994,2.283,7.713,2.974,12,3a10.6,10.6,0,0,0,1-4h-1v-1h1q-0.5-4-1-8l4-3v-2c0.812-1.064,6.3-3.577,8-4v1c1.878,1.206,4.271.255,6,0v3h1v1h4c1.093-2.465,2.339-4,3-7l-4-1q0.5-1.5,1-3h1v-3h1q-0.5-2.5-1-5h1c1.643-2.38.649-.671,3-2v-1h3c0.713-.473,4.641-9.387,5-11h10v-2Z" />
        </a>

        <?php
        $kdwil = '12.23';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_11" data-name="Color Fill 11" class="cls-24" d="M729,226q0.5-2.5,1-5c2.465-1.439,2.788-3.138,6-4q1,5.5,2,11h1v11q0.5,1,1,2h-1q-1,3-2,6l-2,1q-2,6-4,12h-1v2l-2,1v2h-1v2l-2,1v2h-1q-1,4.5-2,9h1q1,3,2,6h-1c-3.74,4.3-15.027,3.12-23,3v5h-2l-3,4h-1v2c-1.307,1.712-4.468,2.528-7,3q-0.5,2.5-1,5l-6-1q0.5,2.5,1,5h-2l-3-4-3-1v-2h-1v-4l-3-1q-1-2-2-4c-3.4,1.244-5.4.186-10,0a9.877,9.877,0,0,0-4-4q0.5-1.5,1-3c1.361-1.166,1.528-1.825,2-4,4.194-.366,4.408-1.9,7-3l8-1a34.651,34.651,0,0,0,1-7h4q0.5-1.5,1-3l-8-3c0.19-5.645,2.079-10.948-1-14v1h-1v6c-4.386-1.126-5.609-4.786-10-6q0.5-2.5,1-5l2-1v-6h1v-1h2q1-2,2-4l6-1v-1c3.026-.442,2.024,1.584,3,2h4v1l14-1c1.892-3.174,3.088-3.011,6-5q0.5-1,1-2h2l8-9h2v-1c1.482-1.375,1.311-.509,2-3h2c2.011-3.871,8.566-11.853,13-13v1h1v6h-1v4l-2,1v2h-1c-0.416.593-2.378,3.986-2,5h1q0.5,1.5,1,3h3Z" />
        </a>

        <?php
        $kdwil = '12.24';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_10" data-name="Color Fill 10" class="cls-25" d="M401,375v-2c1.135,0.844.145-.127,1,1h1l1,5,6-1v1h1v3h2l1,3h-1c-1.358,2.537-2.849,6.208-5,8,0.654,3.029,1.778,5.135,3,8h1v4h-1c-0.581,2.371.846,2.6,1,4l-2,1v10l-2,1,2,6c-2.613-.624-2.846-1.06-4-3h-1l-1,3-9,1c-0.637-1.2-1.651-1.453-2-2v-2h-1v-2l-2-1v-2l-4-3v-2l-4-3v-3l-9-7-1-4-3-2v-2h-1l-2-3c-2.753-2.02-3.916-1.133-5-5h4c1.379-.312-0.378-1.316,1-1v1h2v1a8.666,8.666,0,0,0,4,2v-2h1l1,2,11-3v-3h1c3-3.293,6.26-1.862,7-8-1.719-1.127-1.355-.633-2-3,1.135-.844.145,0.127,1-1h2C395.709,373.453,395.949,374.807,401,375Z" />
        </a>

        <?php
        $kdwil = '12.25';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_9" data-name="Color Fill 9" class="cls-26" d="M429,425v3c-2.393.607-1.858,0.318-3,2h-1c-0.226,1.4.374-.268,1,1v1h1v-1c1.654-.979.846,1.44,1,2h-1v1h-3c-0.94,4.074-2.933,4.166-8,4,0.02,2.7.72,7.662,2,9,1.139,1.139,0,.4,2,1-0.335,1.67-1.469,4.983-4,4v-1h-2v-2c-1.116-.593-1.571-1.743-2-2h-2v-1h-7s-0.12-.659-2-1q-2.5-8.5-5-17l9-1,1-2c1.41-.111-0.284.407,1,1,1.139,1.139.4,0,1,2l3-1c-0.979-2.211-1.663-2.819-2-6,1.135-.844.145,0.127,1-1,2.3-.1,2.594-0.833,4-1v1h2l1,2h4l1,2C423.63,425.2,426.09,424.952,429,425Z" />
        </a>

        <?php
        $kdwil = '12.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_8" data-name="Color Fill 8" class="cls-27" d="M563,86V84h3q-0.5,2.5-1,5c0.215,0.675,2.616.149,2,3l-2,1v1h1v4h-1V97h-3c0.716,3.033,1.6,2.148,2,3v4h1c0.844,1.434.7,1.715,1,4h3q-0.5,3-1,6h-1q0.5,1,1,2h-3c-2.074,2.507-3.215,1.991-6,1a9.749,9.749,0,0,1-1,4c-1.337-.79-1.086-0.86-2-2-1.245-1.552-.848.33-4,1v-6l2-1q-0.5-3.5-1-7h6l2-3h-1q-0.5-3-1-6h-1a8.589,8.589,0,0,1-2-4,6.719,6.719,0,0,0,3-3c-1.975-1.129-2.338-1.417-3-4l3-1V84h1v1Z" />
        </a>

        <?php
        $kdwil = '12.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-28" d="M615,182q-0.5,2.5-1,5,0.5,2.5,1,5h-1c-1.4,1.654-3.457,2.476-6,3v-3c-0.358-.873-2.8-0.128-2-4h1q-0.5-1-1-2h1a3.982,3.982,0,0,1,2-2v-1Z" />
        </a>

        <?php
        $kdwil = '12.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-29" d="M578,346c-2.209-.345-1.076-0.561-2-1l-2,1v-3c1.135-.844.145,0.127,1-1,2.01,0.574.865-.12,2,1h1v3Z" />
        </a>

        <?php
        $kdwil = '12.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-30" d="M707,182q-0.5,3-1,6c1.031,0.557,3.786,1.838,3,4h-1v1h-7a10.6,10.6,0,0,1-1-4l3-1q-0.5-2.5-1-5Z" />
        </a>

        <?php
        $kdwil = '12.75';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-31" d="M541,99c0.122,4.558.281,4.365,2,7h1v5c-4.557.057-4.788,1.171-8,2v3h-3c0.152-5.195.71-5.761,0-10h2C536.428,101.772,535.538,99.578,541,99Z" />
        </a>

        <?php
        $kdwil = '12.76';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-32" d="M626,144h-5c-0.945-1.8-1.385-1.574-2-4,2.285,0.118,2.6.833,4,1v-1l4-1v1h-1v4Z" />
        </a>

        <?php
        $kdwil = '12.77';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-33" d="M642,390h2q-0.5,1-1,2c0.078,0.74,4.079,5.261,4,6h-1v1h-4v-2c-3.353-2.2-1.691-3.811-7-5-0.621-2.328-.912-2.352-2-4h-1v-7c2.523-1.339,3.5-1.99,8-2v1h1q0.5,2.5,1,5h1Q642.5,387.5,642,390Z" />
        </a>

        <?php
        $kdwil = '12.78';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-34" d="M420,391c1.385,5.168,5.215,4.4,6,11,5.1,1.393,2.668,3.812,5,7l4,2v4h1c0.17,0.861-4.481,6.586-5,10-3.843-.6-2.749-0.353-7,0,1-4.072,3.419-5.089,4-10-1.139-1.139-.4,0-1-2-3.3,1.175-3.821,2.184-5-2h-1v-3h-1v-1c1.719-1.127,1.355-.633,2-3l-4-1v-1c-0.927.111-3.01,2.135-5,1v-1c-2.454-2.062-3.827-5.647-4-10,2.977-2.68,2.087-5.706,7-7v1h1v4h1C419.139,391.139,418,390.4,420,391Z" />
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
                    url: "ambil_sumut_kiri.php",
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