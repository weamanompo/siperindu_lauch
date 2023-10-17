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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="75%" height="75%" viewBox="0 0 1043 567">
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

                a:hover .cls-13 {
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
            </style>
            <filter id="filter" x="620" y="328" width="166" height="225" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="500" y="178" width="283" height="181" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="487" y="190" width="148" height="131" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="343" y="261" width="174" height="122" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="631" y="100" width="174" height="134" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="457" y="314" width="188" height="190" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="656" y="210" width="146" height="224" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="444" y="118" width="178" height="172" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="580" y="317" width="93" height="165" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="545" y="327" width="78" height="97" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="608" y="16" width="163" height="117" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="582" y="105" width="82" height="137" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="290" y="242" width="244" height="263" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-14" x="635" y="362" width="50" height="52" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-15" x="655" y="304" width="28" height="38" filterUnits="userSpaceOnUse">
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
        <rect id="Color_Fill_17" data-name="Color Fill 17" class="cls-1" x="-22" y="-38" width="1043" height="657" />
        <?php
        $kdwil = '18.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_16" data-name="Color Fill 16" class="cls-2" d="M653,333v2c1.563-.067,7-1,7-1v1h1v5h1l4,5,5-4v1c1.559,1.606-1.051,3.588,4,5v1h1v-1c4.319-2.563,3.579-4.845,11-5v3h5v1h1v3h6a15.682,15.682,0,0,1,1,6l-3,1v1h-4c-1.139-1.139,0-.4-2-1v7c2.007-.327,2-1,2-1h9v-1a9.532,9.532,0,0,1,4-2q0.5,2,1,4l6,2c0.63,2.365.961,2.288,2,4h1c1.164,3.048-3.03,4.065-2,9h1a1.726,1.726,0,0,1-1,2q0.5,1,1,2s-1.266.93-1,2h1v2h1c1.177,4.264-3.062,6.586-4,9h1q0.5,2,1,4c1.135-.844.145,0.127,1-1,1.074-.92.232,0.188,1-1v-1c2.475-3.15,5.3-3.1,11-3a15.682,15.682,0,0,1,1,6c-1.139,1.139-.4,0-1,2,5.055-.029,6.393,1.184,10,2v11c2.019,0.984,4.239,1.751,5,4v3l4,3c1.924,3.126-1.777,2.524,3,4v-2l4-1q0.5,1.5,1,3c2.142,0.119,3.4,1.019,4,1v-1h2q0.5-1.5,1-3h3q0.5,2,1,4h6l2-3h1v-3l5-3v2h1q-0.5,3.5-1,7h-1v8h-1v4h-1v4l-2,1q-0.5,2-1,4h-1c-1.172,4.007,3.362,5.05,2,10h-1c-0.912,3.178.366,5.653-1,8l-2,1q-0.5,3.5-1,7a9.483,9.483,0,0,0-2,2c5.254-.231,5.318-2.141,6,2a7.742,7.742,0,0,0-2,3h-3a9.733,9.733,0,0,1,1-4h-3c-0.823,1.876-1.481,2.616-2,5l-4,1c-0.464,2.391-1.158,3.145-2,5h-3v-2h1c0.287-1.674-.944-1.747-1-2v-6a19.168,19.168,0,0,0-7-1v-2h-4v-1l-7,1v-2a12.71,12.71,0,0,1-5,1c-0.644-2.739-1.309-2.276-2-5l-3-1q-0.5-5-1-10h1q0.5-3,1-6h-1q-0.5-2-1-4l-4-1q0.5-1,1-2l-2,1v-5h1v-3a7.173,7.173,0,0,1-4-1v1h-1q-0.5,3-1,6h-1c-1.139-1.139,0-.4-2-1q-0.5-2-1-4l-3-1v-1l-5-1-2-3-3,1c-0.981-3.638-4.26-4.352-8-5-0.723-2.762-.279-2.237-3-3v-2l-3-1v-3h-2q0.5-1,1-2l-3-2v-5l-2-1v-2h-1a2.557,2.557,0,0,1,1-3q-0.5-2-1-4c-8.615-2.09-3.376-11.786-3-19l-3-1c-0.81-4.4-3.041-5.915-4-10l-3,1v-4h-3v1c-1.82.8-.779,1.257-2,0-2.52-2.048-.412-2.414-5-3l-5,6-14-10h-6v-1c-2.041-.674-3.431-0.387-5-1q0.5-1.5,1-3l4-2v-2h1c1.771-2.716-.993-1.8,3-3q0.5,1.5,1,3a7.173,7.173,0,0,1,4,1v-1h1v-4c-2.558-2.131-3.045-5.155-3-10,1.139-1.139.4,0,1-2,2.515-.119,3.557-0.031,5-1v-1h2q0.5-1,1-2Zm56,151h2q-0.5-1.5-1-3c4.841-.279,5.784-1.672,7,3h-1v3h-1v1l-4,2C710.23,486.785,709.492,487.845,709,484Zm2,10a39.688,39.688,0,0,1,1,8c-1.232.78-2.723,3.326-3,3v-1c-1.077.375-4.236,1.243-6,0v-1h-1v-5C705.412,495.963,705.107,494.134,711,494Zm-23,34v2l-7,4v-3h2c0.574-2.444,1.047-2.206,2-4Zm10,0h3v1h1v3h-1v3C697.414,534.064,697.844,532.39,698,528Zm-4,7h-3v-4C694.23,532.2,693.767,530.005,694,535Zm2,6h4a10.6,10.6,0,0,1,1,4c-2.612,1.382-1.693,1.769-6,2-0.954-1.518-1.954-1.694-3-3h1C693.954,542.482,694.954,542.306,696,541Z" />
        </a>
        <?php
        $kdwil = '18.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_14" data-name="Color Fill 14" class="cls-3" d="M740,190c3.543-.317,3.949-1.314,7-2v-3c3.1,0.407,4.981.686,5,4,0,0-1.538.677-1,2l4,3v1l6,1q0.5-1.5,1-3h2v2h4c-1.077,2.955-1.018,2.065,0,5,2.135-.115,3.418-1.021,4-1v1h1q0.5,1.5,1,3l-2,1,2,3h-2l-3,5c0.224,0.592,1.179.119,1,2h-1v1h1v2c2.927,0.684,3.274,1.113,4,4h3v11h-1v2h-1c-0.979,3.419,2.57,4.8,1,7q-0.5,1-1,2h-3q-0.5-1.5-1-3l-9-2-2,3a3.129,3.129,0,0,1-2-2c-3.532-1.116-6.943,1.163-9,2a57.634,57.634,0,0,0-2,8h-3c-1.354,2.429-2.7,1.614-3,2-0.371.469,1.816,2.223,1,4l-2,1v2h-1c-1.77,4.267,2.688,4.3-3,6v1h-1v-1h-4c-0.77,3.215-1.508,2.155-2,6l-9-2v1h-2q-0.5,1-1,2l-6-1-3,4-7-1v1c-1.463.8-1.693,0.71-4,1q-0.5-1.5-1-3c-2.01.574-.865-0.12-2,1l-5,6h-1v3c2.049,1.746,2.061,4.051,2,8l-6-1v1h-5v-1h-2v-1c-1.287-.585-0.538.483-1,1-2.813,1.522-3.844,2.621-4,7h-1v1h1c1.155,1.05,6.227,1.7,8,2v3a12.856,12.856,0,0,0-6,3v1l-7,2c-1.232,4.424-5.118,6.222-8,9v1h1v1c1.477,0.788,2-1,2-1l2,1q-0.5,1.5-1,3l-2,1q-0.5,2.5-1,5a10.392,10.392,0,0,0-2,2c1.535,0.385,3.934.49,3,3h-1v1h-6c-1.239-1.974-2.3-2.438-5-3v-2l-2,1v-1c-2.683-2.333.105-3.546-5-5v-2h-2q-0.5,2-1,4h-5v1h1q-0.5,1-1,2h-1v-1h-1v1l-11,1c0.463-2.391,1.158-3.145,2-5h-3v-2h-1v7l-5,4v2l-3,2v2l-2,1v2h-1l-2,3h-2v1l-7,1v1l-2-1v1h-2q-0.5,1-1,2l-9,2c-2.233-8.036-4.575-1.9-8-5-1.178-1.065-1.233-3.939-2-5h-1q-0.5-1-1-2l-5-1v-1h-2q-0.5-1.5-1-3l-8-7v-3h-1c-3.8,5.057-3.549-.969-6-2-1.68-.706-1.763.934-2,1a1.6,1.6,0,0,1-2-1l-3,1c-0.855,4.861-3.018,7.057-9,7v1l-5-1q-0.5-1.5-1-3c-2.272-.367-3.833-1.651-7-1-0.218.045-.32,1.435-2,1v-1c-2.621-1.055-2.017-.491-4,0v-1l-2-1v-2h-1c-1.732-2-1.854-3.227-5-4,0.99-3.362,1.2-1.919,3-4h1q0.5-3,1-6l3-1v2h1v1c1.291,1.129,2.04.254,4,1v1l11-1,4,1v-1c2.742-1.828,1.654-3.324,6-4v1h-1c-1.889.859,2,1,2,1q0.5-1.5,1-3l6-2v-1l2,1v-2c2.161-2.081,1.216.651,3,0,0.253-.092.013-0.667,2-1v1h-1c-1.889.86,2,1,2,1q-0.5-3.5-1-7c2.49-.443,6.532-1.392,8-3v-2l2,1q0.5-1,1-2h2c3.646-2.02,1.624-2.873,8-3v1h-1q0.5,1.5,1,3h4v-1l2,1v-6h1v-3l3-1v-1h-1q0.5-1.5,1-3l10-1v1h4v2l2-1v1c2.771,3.109-1.031,4.2,5,5,1.34-2.041,1.637-1.878,5-2q0.5-2.5,1-5h1v-5h1q-0.5-2.5-1-5h1v-2h1a8.656,8.656,0,0,0,2-4h2q-0.5-1-1-2h2q-0.5-1-1-2c1.245-2.607,3.055-2.413,4-6h2q-0.5-1-1-2h2q-0.5-1-1-2h1q0.5-2,1-4h1v-7l4-3c0.9-1.767.266-7.192,1-9h3c0.7-3.377,2.168-3.852,3-7h2c-0.644-2.739-1.309-2.276-2-5,1.135-.844.145,0.127,1-1a29.413,29.413,0,0,0,7-1v6l6,1v-1h4c3.593-5.732,10.868-3.677,12-13,3.428-.871,2.575-2.068,6-3,0.723-2.762.279-2.237,3-3,0.644-2.739,1.309-2.276,2-5l3-1v-1c3.18-1.55,5.111-.483,8,0v-2l6-1q0.5-1,1-2h4l6-1v1l6,1v2h3v3l7-1q1,2,2,4c1.135-.844.145,0.127,1-1h1v-4h2q0.5,1,1,2l5-1a25.606,25.606,0,0,1,2-8c2.01,0.574.865-.12,2,1h1Q740.5,187.5,740,190ZM571,293v1h1c-0.636,1.42-1.166.742-2,2,2.311-.545,2.014-0.26,3-2h1v-1h-1v1Z" />
        </a>
        <?php
        $kdwil = '18.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_13" data-name="Color Fill 13" class="cls-4" d="M596,200h3v9h2v1h-1v1h1v6h1v1h-1v1h1q-0.5,2-1,4a7.173,7.173,0,0,0,4-1v1l8,4q-0.5,1-1,2c1.064,0.994,1.975,1.141,3,0v2c1.139,1.139.4,0,1,2,4.2,0.686,8.395,2.194,12,3v2h1q-1,6-2,12h-2q0.5,1,1,2h-2v1h1c1.011,1.639-1.467.855-2,1-0.38,3.541-1.241,3.036-2,6h-2q0.5,1,1,2h-2v1h1c-0.6,1.395-1.292,1.053-2,2v2l-2-1q0.5,1,1,2h-3v1c1.789,2.1-.465,9.383-1,14h-3c-0.8,3.506-1.772,3.9-6,4q-0.5-1.5-1-3h-1q0.5-1,1-2h-2v-2c-3.165-.428-3-0.791-5-2v-1c-3.188-1.173-3.275,1.712-4,2h-6q-0.5,2-1,4h-1q0.5,1,1,2l-3,1q0.5,3,1,6c-2.7.605-2.872,1.952-3,2-1.324.5,0.363-.682-1-1l-5,1v-1h1v-1h-1c0.636-1.421,1.166-.742,2-2h-4v1c-2.456,1.565-2.776,1.794-5,1v2l-3-1v2l-2-1v1c-3.011,1.726-1.462,2.339-6,3a14.809,14.809,0,0,1-1,6l-3-1v2l-2-1v1c-1.139,1.139-.4,0-1,2l-5-1v1c-1.139,1.139-.4,0-1,2l-6,2q-0.5,1.5-1,3l-9-1q-0.5,1-1,2h-1v-1c-3.639.686-3.83,0.383-8,0v-2c-1.285-.7-1.069-1.2-2-2l-2,1v-3h-1v-2h-1c-2.008-4.655,1.781-5.691-6-6-1.138-.853-5.3-0.126-9,0a19.168,19.168,0,0,1-1-7h-1c-0.6-1.261,2.462-8.9,3-10,3.575-7.322,9.414-13.947,10-24h14l3-9,2-1q-0.5-2-1-4a2.72,2.72,0,0,0,1-3h-1c-1.436-3.129-3.078-3.644-4-7,1.909-1.256,1.659-1.014,2-4-1.876-.823-2.616-1.481-5-2a10.1,10.1,0,0,1,7-7q0.5-2.5,1-5l3-1v-1h2l2-3c3.653-2.6,4.56-.706,5-7h1q-0.5-2.5-1-5c3.483,0.043,8.8.617,11,2l2,3h3v1h2v1h8v-1h1v-3h1v-1h1v1l5-1,3-4c3.418-1.572,7.567,2.089,8,2l2-3c3.124-1.926,6.874-2.07,12-2v1h-1Q595.5,198,596,200Z" />
        </a>
        <?php
        $kdwil = '18.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_12" data-name="Color Fill 12" class="cls-5" d="M435,269c4.559,0.861,6.314.475,11,0v-2c4.289,1.16,3.421,3.608,9,4,1.438-2.343,3.51-3.63,7-4v2l12-2v1h3v6l2,1-1,2h1v-1h1v1h1c1.7,2.922-.949,4.366,2,7,1.279-2.062.931-1.938,3-1v-2l2,1v-1l3,1v-1h1v2h2v6h-1v5h1a1.811,1.811,0,0,1-1,2l1,4c5.024,0.914,7.064.122,13,0,1.659,3.055,3.512,4.5,4,9-1.727,1.538-2.116,4.682-3,7-1.159.605-1.531,1.715-2,2h-2v1l-6,1c-2.676,1.408-3.152,3.109-7,4-1.369,4.862-2.191,2.221-6,4v1h-2l-1,2c-2.23,1.946-4.546,2.057-9,2v4h2v1h-1l1,3h-1l-1,4h-1v6h-1v6h-1q-0.5,5-1,10h-1l-1,4-2,1v2h-1l-1,3h-3c-0.561-1.074-1.8-1.652-2-2v-3l-3-1v-1l-3-2v-2l-6-5v-2l-4-3v-3h-1v-2l-2-1v-2l-2-1v-2l-5-4v-1c-2.264-1.451-5.1-.1-8-1v-1l-7-1-1-2h-2l-4-5h-2l-3-4h-1c-1.093-2.261.794-4.929,1-6l-2-1c-1.384-1.47-.509-1.305-3-2-2.822-3.355-6.526-2.485-11-2,0.426-4.646,1.881-6.415,2-12l-7-5-2-3h-2l-1-2h-2v-1h-2v-1l-4,1-1-2h-4v-1h-2l-1-2-5,1v-1h-1v-3l-4-3v-2l-5-3v-6a10.6,10.6,0,0,1,4-1v1h4l-1,3h1v1h-1a9.091,9.091,0,0,0-2,4h5c1.543,2.459,1.142.615,3,2l1,2,5,4v1h2v-3h1l-1-2h1v-2h1c1.4-3.4.5-4.927,0-8,4.139,0.594,4.353,2.156,7,4v1l19-2,1-3,3,1v2l2,1v1h2v1l12,1a2.493,2.493,0,0,0,3,1v-1l3-1v-1h1v-2l3-2c0.977-1.737.357-6.034,2-7h5Z" />
        </a>
        <?php
        $kdwil = '18.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_11" data-name="Color Fill 11" class="cls-6" d="M785,168c3.476,0.845,6.439,4.241,8,7a12.71,12.71,0,0,1,5-1q-0.5,2.5-1,5h-1v5h-1q0.5,8,1,16l-3,2q-0.5,4.5-1,9h1v3h1c1.632,2.075,1.929,3.2,5,4-0.167,2.283-.161,2.623-1,4h-1c-2.069,3.957,1.145,5.33-5,6v-1l-5,1v-1h-2q0.5-5,1-10c-4.6-.539-2.489-0.99-5-3-0.439,5.086-1.771,4.272-4,7-2.01-.574-0.865.12-2-1-3.707-1.993-5.093-3.978-5-10,1.139-1.139.4,0,1-2h3v-1c1.139-1.139.4,0,1-2h-2q0.5-2.5,1-5c-1.449-.508-1.61-1.195-4-1v1h-1v-1h-2q0.5-2.5,1-5c-3.7-.129-4.677-1.407-7,0q-0.5,1-1,2c-1.617-.209-1.75-1.909-2-2h-4c-0.622-3.182-1.533-2.046-2-3-1.979-4.043,2.064-5.262-5-6-1.052,4.062-.441,1.246-3,3v1l-3,1v-1c-1.139-1.139-.4,0-1-2h1v-3h-4v1h-1v6h-1v1h-4v-1h-3v1h-1v3h-2v-3h-8c-0.723-2.762-.279-2.237-3-3v-2h-2v-1l-3,1q-0.5-1.5-1-3h-1c-2.333,3.128-1.126.842-5,2v1h-1c-0.409-.178-0.227-1.711-2-1q-0.5,1-1,2h-2v1h-2v1h-4v1h-1v-1h-1c-1.9.859-4.864,2.138-7,3-1.212,2.128-2.253,2.177-3,5-2.927.684-3.275,1.113-4,4h-2v2h-2l-6,9-5,1-2,3c-2.128,1.31-5.632,1.028-9,1q-0.5-1.5-1-3h1v-3h-3v-7c-1.876-.823-2.616-1.481-5-2q-0.5-3-1-6h1v-4h-1q-0.5-2.5-1-5l4-1q0.5-1.5,1-3h-1v-1h1c2.221-2.551,3.8-.918,5-5h3v2h2c0.918,0.4.575,2.851,3,2v-1c1.361-1.166,1.528-1.825,2-4h1v-1l-2-1v-4h-1c-1.139-1.139,0-.4-2-1v-6l-9-2v-4c1.135-.844.145,0.127,1-1,2.612,0.1,3.426.252,5,1v-1h1v-1q-0.5-1-1-2a12.71,12.71,0,0,1-5,1q-0.5-4.5-1-9c-1.135-.844-0.145.127-1-1l-8-1v-5c1.135-.844.145,0.127,1-1l5,1v-1h1v-7h1v-1h4l3-9h2v1l11-2,4-5h12v-6h5q0.5-1,1-2l6-1c0.842,2.232,1.029,5.438,1,9h9v-5c2.316-.875,4.407-1.017,8-1v6c9.189,0.051,13.169,5.306,21,7,1.3,3.892-.028,5.412,5,6v-1h6v-1h1v-3l13-2q0.5,1,1,2h6a3.982,3.982,0,0,1,2-2c-0.462-1.258-2.274-6.456-1-9l4-3q-0.5-1.5-1-3l3-1q0.5,1,1,2h5v1c3.292,3,.586,4.517,2,9h1v3h1c0.5,2.037-1.626,6.7-2,8v23h1q0.5,3,1,6h1l2,3h2v1c1.682,1.582,1.553.82,2,4C785.281,166.127,785.645,165.633,785,168Z" />
        </a>
        <?php
        $kdwil = '18.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_10" data-name="Color Fill 10" class="cls-7" d="M549,325c0.776,3,.616,2.63,4,3,1.139-1.139,0-.4,2-1a9.749,9.749,0,0,0,1,4c-3.555.8-5.594,2.95-6,7,2.934,1.661,3.1,3.241,3,8h-2c0.113,3.16,1.955,1.874-1,3v2l6,4v2l2,1v4h1l2,3h2v1c2.712,1.74,1.832-.969,3,3l5,1c0.6,3.843.353,2.749,0,7,2.716,1.164,4.18,1.78,5,5,2.762,0.723,2.237.279,3,3h1c1.843,0.95-2,1-2,1,0.532,3.792,4.7,5.826,3,10l-2,1v3l-3,2v7c1.709,1.5,2.1,3.785,3,6l3,1q0.5,1,1,2h5v1h2v1h3q0.5,1,1,2h3v1l5,1,3,4,3,1,2,3,7,6q0.5,1.5,1,3h3c1.274,0.614-.3.44,1,1-0.469,2.284-3.407,7.823-2,11l2,1v2l2,1c1.8,2,2.563,3.49,3,7h-3q0.5-1,1-2h-4q0.5-1.5,1-3h-3v-1c-0.881.167-3.069,2.128-5,1v-1h-1v-1h1c0.979-1.654-1.44-.846-2-1v2l-2-1v1h-1v-1h-3c0.339-3.955.964-2.907,0-6l-3,1v-2c-4.029,1.326-5.542.091-11-1v-2h-2c-0.057-2,1.666-.893,0-2-1.256,1.909-1.014,1.659-4,2-0.945-1.8-1.385-1.574-2-4h-2v-1h1v-1h-1v-1h4v-1l-9,1v-2a7.6,7.6,0,0,1-4-2v-1l-4-1-3-4-2,1v-1l-4-1v-1h-5c-2.941-1.233-8.623-13.645-11-11v-3l-3-1v-2l-3-2v-1c-4.068-2.691-8.81-.348-14-2v-1l-6-1v-2l-3,1v1h-2v1h-4v1h-1v-1h-1v1h1c1.889,0.86-2,1-2,1l-1,3-2-1v1h-1v1h1l-1,3h2l-1,2,2-1q0.5,3,1,6l2,1,1,4,6,5v1h-1q0.5,1,1,2l2-1v1c0.6,0.5,3.953,4.36,4,5h-1v1l3,1a43.747,43.747,0,0,1,4,6v5h-1c-0.7,2.5.912,3.675,1,5h-1v1h2q0.5,1.5,1,3l4,3q0.5,2,1,4l3,2q-0.5,1-1,2h2q-0.5,1-1,2h1c1.139,1.139,0,.4,2,1-0.218,3.271-3.237,9.339-3,10h1q0.5,1.5,1,3h2q0.5,1,1,2h1a7.14,7.14,0,0,1,0,6h1c-1.139,1.139,0,.4-2,1v1l-5-1c-2.087.033-2,1-2,1h-6v-1h-1v-4h1v-1h-1v-3h-1q-0.5-2-1-4h-1v-6l-2-1v-2c1.719-1.127,1.355-.633,2-3h2v-1l-3-2v-1l-5-1q-0.5-1.5-1-3l-2-1v-2l-2-1v-3h4v-1h1v-6h-1v-1h1v-2l3-1v-2l-6-7-3-1q-0.5-2-1-4h-1c-2.532-3-4.377-3.9-10-4,0.574-2.444,1.047-2.206,2-4-2.213-1.192-2.988-2.33-6-3v-2c-3.449-2.009-2.909-3.125-5-6l-3-2-1-2h-3l-1-2c-1.568-.886-3.094.4-4-1v-4l-4-3c-1.221-2.436.262-5-1-7l-3-2v-2l-2-1-2-3h-1v-2c-1.852-2.571-3.828-1.679-5-6,1.753-1.161,7.153-7.379,5-9h2c-0.22-7.576,2.1-23.063,5-24q0.5-3,1-6h-1v-5h7c0.723-2.762.279-2.237,3-3,1.139-1.139,0-.4,2-1v-2l3,1,3-4,4-1v-1c3.206-1.843,3.471-2.62,8-3v1c1.339,1,2.975-.223,4,1,0.672,0.8,3.416,6.66,4,7l9,1c0.186-.036.344-1.422,2-1v1h2l3,4,10-1c0.644-1.318,1.6-1.378,2-2v-2C542.07,324.6,543.546,324.846,549,325Zm10,135v2c1.8,0.944,1.574,1.385,4,2v1h3v2c3.928,1.944,5.006,2.1,5,8h-1v1h-3v-2c-1.4.223,0.093,0.1-1,1-1.7-.2-1.531-1.794-2-2h-2c-1.048-4.111-1.31-1.2-3-3q0.5-1,1-2h-1c-1.139-1.139,0-.4-2-1a9.749,9.749,0,0,0-1-4h-1v1c-1.581,1.142-.931-2.458-1-3A12.71,12.71,0,0,1,559,460Zm69,3a29.381,29.381,0,0,1,11,2q-0.5,2.5-1,5c-1.882-.275-1.964-0.988-2-1h-5v-1A8.278,8.278,0,0,1,628,463Z" />
        </a>
        <?php
        $kdwil = '18.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_9" data-name="Color Fill 9" class="cls-8" d="M780,215h4q-0.5,1-1,2h4c-0.159,4.278-.98,5.28-2,8h1c2.762,4.069,4.857,1.441,5,9-3.791,3.317-1.473,7.5-3,13h-1c-1.059,3.809.99,19.7,2,22h1q0.5,2,1,4l2,1a15.842,15.842,0,0,1,3,9h-2v2h-2c-0.945,1.8-1.385,1.574-2,4-2.909,3.041-.693,5.49-2,10-2.965,10.23-1.006,22.059-1,35q0.5,8.5,1,17h-1v2l-6,5v2h-1v2h-1v3h-1v17h1v24h-1v3h-1c-1.146,3.43,1.6,6.9,1,9h-1v2c-0.671,1.01-2.254.81-3,2h1v1l-3,1c-3.185,2.56.829,3.577-6,4q-0.5-2.5-1-5h-1c-1.139-1.139,0-.4-2-1v2c-2.762.723-2.237,0.279-3,3l-5,1v-3l-4-1v3h-3v-3c-2.762-.723-2.237-0.279-3-3h-2a12.71,12.71,0,0,0,1-5c-1.413.054,0.393,0.758-1,1-0.86,1.889-1-2-1-2-2.762-.723-2.237-0.279-3-3h-1v-4h1c-0.046-1.413-.917.412-1-1-0.141-2.387.452-2.548,1-4-2.4.01-10.419-1.96-11-3v-3h1c0.419-.661.62-3.237,1-4h-1v-1l-3,1v-1c-2.759-.917-7.011.989-8,2h-1v3c-2.762-.723-2.237-0.279-3-3,3.363-2.389.892-1.873,2-6h1q-0.5-3-1-6h-1q0.5-2,1-4a2.733,2.733,0,0,1-1-3h1v-3a9.319,9.319,0,0,0,2-2h-2q-0.5-2.5-1-5h-1v-1h-3v-1l-3-2v-2l-3-1c-1.212,2.128-2.253,2.177-3,5h-3v-1l-5,1v-1c-2.041-1.34-1.879-1.637-2-5l6,1v-2c2.784,0.549.1,0.77,3,0v-1h-1q1-3,2-6c-1.135-.844-0.145.127-1-1a15.682,15.682,0,0,1-6,1,9.733,9.733,0,0,1,1-4h-2v1h-3v-3h2v-2l-6,1s-0.131-1.2-2-1v1h-1c-0.4-.187-0.252-1.759-2-1v1c-2,1.319-2.255,2.256-5,3v2l-3-1v-1h-1v-5h-1v2h-3v1l-2,1v-1c-1.975-1.129-2.338-1.417-3-4h-2a9.749,9.749,0,0,1,1-4l4,1v-2l3,1v-2l3,1v-1c1.837-2.041,1.7-5.092,1-8-0.052-.218-1.636-0.32-1-2h1c0.668-2.826,1.849-3.77,4-5v-1c-1.041-1.027-3.138.326-3-2h1v-2h2l2-3c-1.135-.844-0.145.127-1-1-1.135.844-.145-0.127-1,1-1.139,1.139-.4,0-1,2l-6-1q-0.5-1-1-2c4.872-1.276,5.4-5.212,11-6v-5l-8-1q0.5-3,1-6l3-1v-1h1v1h8v-1l5,1q0.5-1.5,1-3h-1v-4h-1q-0.5-2-1-4c2.984-1.28,5.125-2.507,6-6,3.428,0.871,2.575,2.068,6,3l2-3,6,1v-1h2q0.5-1,1-2h3v1h1v-1h4v-2c5.048,0.066,5.72,1.484,10,2l3-7c3.533,0.687,3.628,1.222,7,0-0.111-4.195.254-5.892,2-8l2-1q-0.5-2-1-4h1c1.134-1.251-.013-0.387,2-1v-1l2,1v-1h1v-4h1c1.506-3.459-1.372-2.7,3-4v-1h3v-1c2.732-.533,2.817,1.972,4,3h1v-1c2.128-1.212,2.177-2.253,5-3,2.037,3.074,1.047.576,4,2v1h2q0.5,1,1,2h4a15.682,15.682,0,0,0,1-6h-1c-0.962-1.871.58-4.211,1-5h1c0.959-2.353-1-6.325-1-7h1v-5h1C779.884,218.44,779.778,217.576,780,215Z" />
        </a>
        <?php
        $kdwil = '18.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_8" data-name="Color Fill 8" class="cls-9" d="M587,123c0.757,8.889,5.874,8.108,10,13h3c1.284,6.733.13,8.133,0,15q0.5,5,1,10h-1q-0.5,3-1,6h2v-1l3,1v2l9-1c0.994,4.116,2.832,6.28,3,12l-3,1c-5.391,4.8-13.334-4.79-16-4v1c-2.1,1.882-1.974,5.227-3,8l-3,1v6c-1.174.636-1.463,1.657-2,2h-2v1h-2v1c-1.791,1.369-1.971,1.592-5,2-2.161-2.568-3.754-1.626-7-1q-0.5,1.5-1,3l-4,1v1c-1-.042-2.118-2.089-4-1v1h-1v3c-5.431.052-9.7,0.048-13-2q-0.5-1-1-2l-4-1v-1h-9c0.8,4.425.269,5.064,0,10-5.2,1.11-5.83,4.781-11,6-0.537,6.033-2,4.194-5,7-1.228,1.148-1.652,2.935-3,4,0.574,2.01-.12.865,1,2,1.165,1.361,1.824,1.528,4,2-0.77,3.215-1.508,2.155-2,6a10.82,10.82,0,0,1,5,7h-1v5h-1v2l-2,1v3h-1c-0.631,1.531-.485,2.74-1,4-5.145-.932-7.711-0.088-14,0l1,4h-1l-2,6h-1l-3,9h-1c-1.528,2.01-1.694,2.42-2,6h-4v-2a12.71,12.71,0,0,0-5-1v2c-1.413-.054.393-0.758-1-1-0.86-1.889-1,2-1,2h-2v-1l-2,1v-1h-1v-1h1v-1h-1v-2h1v-1h-2v-2h-2q-0.5-3.5-1-7h-1l1-2h-2c-2.472,2.827-7.374,1.183-13,1,0.315-2.247.089-2.618,1-4h1v-2h1v-2l2-1c1.074-2.567-3.412-13.993-4-17-2.762-.723-2.237-0.279-3-3h-1v-6c2.4-1.049,3.212-1.12,4-4-2.729-.6-5.849-3.3-7-2h-1c-2.055,2.821,1.8,2.591-3,4-1.139,1.139,0,.4-2,1q0.5-6,1-12a15.682,15.682,0,0,1,6-1c0.233-5.234,3.676-9.191,2-15h-1v-6l-2-1q-0.5-2.5-1-5c2.773-1.195,3.572-1.2,4-5-1.67-1.774-1.93-8.793-1-11h1v-2h1v-3l2-1v-3l7-6q0.5-2.5,1-5c0.535-.86,6.553-3.671,8-4,1.154-4.083.736-1.046,3-3l2-4c3.428,0.871,2.575,2.068,6,3,0.944-1.8,1.385-1.574,2-4,4.419-.207,4.47-1.262,7-3v-1h6v-1l3-1-1-3,9-2v-1c1.139-1.139.4,0,1-2l4-1v-2h3c-0.513,2.405-1.29,3.077-2,5h1v1h4q0.5,1,1,2l3,1v1h1v-1h10c0.291,0.068.28,1.378,2,1v-1h3v-1h2v-1c4.705-1.677,7.673,2.279,11,3,0.723-2.762.279-2.237,3-3,2.815-2.56,5.985-.67,10-2v-1c1.74-.639,2.623-0.446,4-1q0.5-1.5,1-3C581.65,126.407,581.1,123.461,587,123Z" />
        </a>
        <?php
        $kdwil = '18.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_7" data-name="Color Fill 7" class="cls-10" d="M652,333l-6,1-2,3h-2c-4.129,2.215-6.009,2.426-6,9,2.072,1.846-.115,1,1,3h1c0.412,0.621,2.393,3.98,2,5h-1v1h-3c-1.049-2.4-1.12-3.212-4-4v1c-2.757,2.485-1.448,4.777-6,6q-0.5,2.5-1,5c2.933,0.161,10.453,1.486,12,3l3,1v1c2.567,1.781,1.912-1.082,3,3,2.391,0.463,3.145,1.158,5,2q-0.5,2.5-1,5c-4.111,1.048-1.2,1.31-3,3l-2-1v1a8.445,8.445,0,0,0-2,3h1c3.845,5.552,4.89-1.433,5,8l4,1c0.09,1.411.2,0.3-1,1,1.125,1.031.007,0.445,2,1,0.679,3.807.662,3.2,0,7l4-1v1c2.041,1.34,1.878,1.637,2,5h-3q0.5,1.5,1,3-0.5,1.5-1,3l2,1v2l-3,1c0.573,1.082,2.7,2.1,2,4h-1c-0.771,1.016-1.229.984-2,2-1.417-.658-5.241-3.357-7-3v1l-5,1v2l-2,1q0.5,2,1,4h2q0.5,3,1,6h2v3l-4,1v1c1.278,1.248,2.562,4.867,3,7l5,1q0.5,1.5,1,3h-1v1l-3-1v-1h-1v1h-4c-1.266,2.822-2.213,3.7-5,5,0.736,3.128,2.27,4.519,3,8h-1v-1h-7v-1h-2v-1l-2-1v-2l-3-1q-0.5-2-1-4l-2-1c-0.419-1.156,1.891-7.733,2-11-1.135-.844-0.145.127-1-1h-3v-2c-2.927-.684-3.275-1.113-4-4-2.842-.749-2.437-1.233-4-3h-1q-0.5-1.5-1-3h-2l-3-4-5-1v-1h-3q-0.5-1-1-2l-4-1v-9l-2-1v-3l-2-1c-0.688-1.937,4.361-13.694,5-17l9-2q0.5-1.5,1-3c-1.139-1.139-.4,0-1-2,5.984-1.171,9.343-2.227,16-1,0.38-3.541,1.241-3.036,2-6-3.09-1.86-3.621-5.523-5-9h-3q-0.5-5-1-10h1v-2h1v-3l3-1v-1c2.667-2.584,1.762-.994,2-6-2.078-1.094-1.771-1.611-5-2v-4l3-1c0.3-3.009.135-2.723,2-4v-1l2,1v-1h1q-0.5-1.5-1-3h3q0.5,2,1,4c1.827-1.29-.138-1.1,1-2l2,1v-1c2-.972,4.04-0.992,7-1v2h1v-3h2q0.5-1,1-2h4v-2l3-1v2l2-1v1h1q1,3,2,6h1v-1C650.981,330.221,651.268,330.376,652,333Zm8,83,3,1q-0.5,1-1,2l-2,1v-1h-1v-1Q659.5,417,660,416Zm-8,17h-4q-0.5-1.5-1-3c1.135-.844.145,0.127,1-1h2C650.944,430.8,651.385,430.574,652,433Zm-1,6v4l-3,1c-0.543-2.172-.172-2.211-2-3C646.571,438.671,648.207,439.105,651,439Zm-3,23v3h-4q-0.5,1.5-1,3h-3v-1h-1v-4A46.006,46.006,0,0,1,648,462Zm19,7v3c-3.874,1.176-1.643,1.215-4,3v1l-10-1v-2l3-1v1h1q0.5-1,1-2h4v-1C663.5,469.092,664.445,469.123,667,469Z" />
        </a>
        <?php
        $kdwil = '18.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_6" data-name="Color Fill 6" class="cls-11" d="M615,348h-2c-0.9,1.776-2.482,4.721-4,6v11h4q0.5,2.5,1,5h1v3l2,1q-0.5,2.5-1,5H605v1l-3-1q-0.5,1-1,2l-5,1v1h4q-0.5,1.5-1,3c-9.889.727-8.283,3.406-11,11-0.345.963-2.574,6.421-2,8l2,1v4l2,1v6a19.168,19.168,0,0,1-7,1v-2c-1.413.054,0.393,0.758-1,1-0.86,1.889-1-2-1-2h-2v-4l-3-1v-7h1q-0.5-1-1-2h3c0.667-4.112,1.834-4.857,2-11h-2c0.233-3.389.966-2.815,0-5,1.675-1.482.75,0.854,2-1h-2v-2c-2.808-1.651-3.4-4.03-7-5-0.465-6.772-2.846-7.962-8-10v-3l-6-2c-0.061-2.543-.1-3.532-1-5h-1c-0.153-1.994,1.52-.7,0-2-1.172-1.664-1.094-2.424-3-1-1.609-2.381-1.908-4.063-2-8,3.109-2.049,1.485-4.219,1-8h-2v-3c3.515-.915,2.853-2.433,7-3l7,6q0.5,1,1,2l7,2c1.579,1.249-.083,3.1,1,5l2,1q0.5,1,1,2l5-1v1c3.424,2.679.214,2.779,7,3v-1l5-1q0.5-1,1-2h4v-1h5v-1h2q0.5-1,1-2l3-1q0.5-1.5,1-3h4a3.982,3.982,0,0,0,2,2A12.71,12.71,0,0,0,615,348Z" />
        </a>
        <?php
        $kdwil = '18.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_5" data-name="Color Fill 5" class="cls-12" d="M684,33c5.062-.282,6.348-0.843,11,0q0.5,2.5,1,5h-1q-0.5,2.5-1,5h1V42h1v1c4.944,0.957,7.232-2.065,11,0v1h-1v1h2v1c4.555,1.963,5.489-2.185,7,4-1.413-.054.393-0.758-1-1-0.86-1.889-1,2-1,2h-1v1h1l-1,3c2.036,0.563.891-.291,2,1h-1v1h4v1c-2.01.574-.865-0.12-2,1h2V58h1V57h-1V56h3V55h1v1c2.3,1.516,2.1,3.358,4,5-0.823,1.876-1.481,2.616-2,5l2-1v2c1.219,0.716.355-.829,1-1h1v1l6-1v1a7.744,7.744,0,0,0-2,3c-2.784-.549-0.1-0.77-3,0l1,2c1.876,0.823,2.616,1.481,5,2q0.5,2.5,1,5h2v1h-1c-0.59,1.686,1.268,3.671,1,4h-2c-1.157,1.18-1.521,7.584-4,7v1h2v2l3-1-1-3h2c1.515,1.335,3.05.4,7,0-0.317,2.106.058,2.82-1,4h-2v1h1c0.125,1.516-1.133,3.767-1,4h1c1.256,1.909,1.014,1.659,4,2,1.127-1.719.632-1.355,3-2v1h-1c-1.889.86,2,1,2,1v2h4c-0.934,3.681-2.813,3.851-1,6v1h1v1c0.649,0.292,2.952-1.914,5-1q0.5,1,1,2h1v-1c1.385-1.455.955,1.852,1,2,2.181,1.864,2.1,4.8,2,9l-6,1-2-3h-1v1l-12,1c-1.3,3.563-.382,4.469-5,5v-1l-5,1v-4a8.429,8.429,0,0,1-2-2h-4v-1h-2v-1h-2v-1a25.833,25.833,0,0,0-12-3v-6a10.6,10.6,0,0,0-4-1v1h-5v5c-2.316.875-4.407,1.017-8,1a10.6,10.6,0,0,1-1-4h1v-5h-8q-0.5,1-1,2h-5v6c-1.392.493-3.382,1.649-6,1v-1h-5v1h-2l-4,5c-2.418,1.541-7.189.994-11,1-1.606-2.63-3.8-3.839-8-4-2.325,3.869-7.618,5.232-12,7,0.113,3.16,1.955,1.874-1,3v-1l-5,1v-3l-6,1v2h-3v-1h-1v-3h1q0.5-3,1-6c-2.028-1.292-4.354-5.34-5-8,3.5-2.08,2.249-2.737,2-8h2c0.629-1.269,1.643-1.433,2-2,0.753-1.2-.862-0.432-1-1-1.565-1.293,1.954-.986,2-1q0.5-3,1-6c3.493-.643,2.756-1.116,6,0V87c-1.974-1.24-2.438-2.3-3-5l2,1V81l5-2V76h1c0.216-1.4-.2.168-1-1,0.2-1.4.693,0.38,1-1q-0.5-3.5-1-7a10.6,10.6,0,0,1,4-1v1h1V66l2,1V66h-1l1-3h1V60l2,1V60h1V58h1v1c1.664,0.878.861-1.357,1-2a40.14,40.14,0,0,1,9,1l-1,2h1c1.077-.923-0.076-0.663,2-1v1h1V59h1V56l2,1V56l3-2V53h-1V52h1V50h1V48l2,1-1-3h1V45l-2-1c-1.656-2.481-.294-3.718,0-7h3q0.5-2,1-4h1c1.15-2.978-.394-5.705,1-8l2-1-1-2h1V21h4l1,3h1v2h1l-1,3h1v5h-1v1h2l-1,2h1V36l2,1V35l2,1V35C684.139,33.861,683.4,35,684,33Z" />
        </a>
        <?php
        $kdwil = '18.12';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_4" data-name="Color Fill 4" class="cls-13" d="M609,110h3v2c4.864,1.159,1.114,1.244,3,4l2-1v8c-0.88.593-2.739,0.911-2,3h1v1h3v1h1v-1h-1c-1.843-.95,2-1,2-1v-2a12.71,12.71,0,0,0,5,1q-0.5,1.5-1,3h1c2.471-3.3,2.185-1.764,5,0v1h1v-1h1v-1h-1c-0.4-1.958.341-1.271,1-2,1.164-1.349,3.633-3.692,5-2v-2c5.882-.718,3.509-0.987,6-4,0.971-.339,3.671,2.672,6,1v1h1v1h-1v5l-2,1v3h-1v1h-4v1h-1q0.5,3,1,6h-1v1c-3.19,1.876-3.3-1.837-6,2h-1c-0.406,1.095,1.705,1.26,0,4h1v1l3-1v1c2.266,0.63,3.335.373,5,1,0.673,2.03,2.49,6.918,1,8h2v1h1v-1h5q-0.5,2.5-1,5l-6-1q-0.5,2-1,4h1c1.683,1.66,5.659,2.106,8,3q-0.5,2.5-1,5l3,1c1.633,1.567,1.687,6.03,1,7q-0.5,2-1,4h-2v-2c-3.428-.871-2.575-2.068-6-3-1.173,4.007-.315,1.233-3,3v1h-2c-1.533,1.264.144,3.2-1,5h-1v1l-5,1v1c6.65,4.006.342,7.6,3,13l2,1c3.4,3.229,3.977,2.073,4,9l-6,2q0.5,2.5,1,5l-2,1v2l-2,1v2l-5,2a34.651,34.651,0,0,1,1,7c-1.8.944-1.575,1.385-4,2-2.591-2.55-4.373-.662-8-2v-1l-4-1v-2c-5.932-1.582-6.049-7.074-14-8l-3-22h-2v-1c-3.32-3.342,1.493-4.449-6-5v-6l4-3v-3h1c1.766-3.841-1.54-3.2,4-4,2.471,3.927,7.383,4.151,14,4,1.412-2.663,2.03-4.22,2-9h-1v-4a6.719,6.719,0,0,1-3-3c-5.1.879-7.966,1.258-13-1,0.862-1.975,3.061-4.329,2-8h-1q-0.5-3-1-6h1v-3l2-1v-1h-1v-4h1v-1h-1v-4c-6.475-3.157-14.082-6.188-14-16h4q-0.5-1-1-2h1c1.129-1.234-.025-0.415,2-1v-1h6q0.5,1,1,2c1.87-.244,2.665-1.583,5-2q1-3,2-6c0.929-1.066,1,1,1,1C609.661,112.964,608.842,110.573,609,110Z" />
        </a>
        <?php
        $kdwil = '18.13';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_3" data-name="Color Fill 3" class="cls-14" d="M338,247a11.878,11.878,0,0,0,1,5c3.624-1.415,5.325-.724,9,0v5h4c2.737,4.552,5.947,4.123,6,12H347q0.5,4,1,8c4.08,1.02,3.957,3.016,6,6l2,1v2h1l1,2h6v1h2v1l5,1v1l3-1v1h2v1l4,1,1,2h2l2,3c2.586,2.31,3.838.611,5,5,1.934,2.438-.742,7.524-2,10h1l1,2c5.5-2.81,2.919-.52,10,0l3,4h1c0.94,2.016-.85,2.9-1,4h1c0.69,1.8.684,3.922,2,5l3,1,2,3h2l2,3h2v1h2v1h4v1h6v1h2l1,2h2l1,3,3,2v2l3,2v3c1.246,2.841,1.612,4.04,5,5,1.3,6.024,6.467,6.537,8,12h3v1h1v4h2v1l2,1v2l5,4v2l6,5v2l2,1v6l4,3v3h1c1.511,1.759.861,1.569,4,2v2c2.359,0.415,5.934,1.3,7,3v3h1c1.622,2.109,3.239,2.988,4,6l6,2q-0.5,3-1,6l4-1v1l5,1v2c2.273,1.419,1.453,2.35,3,4l2,1v1h2q0.5,1.5,1,3h1c1.384,1.728,1.637,2,2,5h-2q-1,5.5-2,11l-4-1v3h1q2.5,4.5,5,9h4c0.825,0.388-.053,1.312,3,2v2h-2c-0.244,2.829-1.409,8.282,0,12h1v2l2,1q0.5,4.5,1,9c-3.57,1.335-9.914,1.047-15,1v1h-1v-1l-6-3v-3l3,1v-1h1v-7c-2.063-1.719-2.367-3.756-4-6h-1l-2-3h-2l-2-3h-2l-4-5h-2v-2c-2.808-1.651-3.4-4.03-7-5v-2h-1v-2l-5-4v-3l-4-3v-1h-2l-2-3h-2l-1-2h-2v-1l-9-3-1-2-3-1v-2c2.762-.723,2.237-0.279,3-3h1l-2-6-2-1v-2c-3.284-.865-4.714-3.106-7-5v-1h-2l-1-2-9-3q-0.5-2.5-1-5a7.735,7.735,0,0,1-4-2v-1h-2l-1-2-12-4v-1a2.892,2.892,0,0,1-1-1h-1v-2h-1v-3h-1l-1-2h-2l-1-2h-2v-1l-3-2v-2h-1v-2h-1c-2.6-2.588-4.812-1.606-6-6h1v-3a7.734,7.734,0,0,1-2-2c-4.077-2.076-4.458,1.884-6-4,2.729-1.541,3.013-2.6,3-7l-5-4v-1l-6-1v-1h-2l-1-2h-8l-1-4c4.3-2.176,7.794-4.54,8-11h-1v-3l-3-2-1-3h-2l-1-2h-3v-1c-4.033-1.587-3.409,2.092-5-3h-2v-2c-2.673-1.69-2.085-4.464-4-6h-2l-1-2h-2v-1c-3.9-1.734-3.378,2.286-5-3l-4-1c-0.684,2.927-1.113,3.274-4,4v-1c-2.9-2.524-1.2-6.567-1-12-3.763-2.055-5.872-5.336-11-6-1.139,1.139,0,.4-2,1a7.537,7.537,0,0,1-6,6v-1h-1q0.5-3.5,1-7c-2.155-1.248-2.931-2.687-4-5l-10-1v-1l-4,1c0.613-2.9,1.615-4,3-6h1q0.5-3,1-6c4.395-.247,4.494-1.22,7-3v-1h4v-1h2l1-2h3l2-3,4-1c1.1-.847,1.337-4.146,2-5C326.235,250.409,334.877,247.354,338,247Z" />
        </a>
        <?php
        $kdwil = '18.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_2" data-name="Color Fill 2" class="cls-15" d="M659,372c3.237-.329,2.938-0.908,5-2v5l4-1c0.841,3.5,2.53,4.664,3,9,3.506,0.8,3.9,1.772,4,6a6.957,6.957,0,0,0-2,9h1v2h1q-0.5,1-1,2c0.936,1.061,6.727,2.576,4,4a8.445,8.445,0,0,1-3,2v-1c-2.043-1.754.108-1.379-1-3l-2,1v-5h-2q-0.5-2.5-1-5c-1.749-.737-3.837-1.622-5-3-2.785.569-6.869,2-8,4v3c-0.9,2.351-1.974,1.752-5,2q-1-4.5-2-9l-3-1q-0.5-2.5-1-5h-5v-4c4.111-1.048,1.2-1.31,3-3l2,1v-1h1v-3c4.468-.878,8.075-4.594,10-8,1.135,0.844.145-.127,1,1C658.719,370.127,658.355,369.633,659,372Z" />
        </a>
        <?php
        $kdwil = '18.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Color_Fill_1" data-name="Color Fill 1" class="cls-16" d="M669,309v3a39.688,39.688,0,0,1,8-1,9.749,9.749,0,0,1-1,4c-2.784-.549-0.1-0.77-3,0v1h3q-0.5,2-1,4l-3,1c-0.057,2.289-.89,2.626-1,4l2,1q-0.5,3.5-1,7h-2v2h-1v-1c-1.411-.1.4,0.815-1,1-3.268.431-4.636-.572-7-1-0.187-3.724-1.372-6.605,0-10h1v-2h1c0.9-1.392.688-1.745,1-4h-4v-1h1C662.5,313.547,665.038,310,669,309Z" />
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
                    url: "ambil_lampung_kiri.php",
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