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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30%" height="30%" viewBox="0 0 326 397">
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
            </style>
            <filter id="filter" x="56" y="276" width="111" height="90" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="171" y="135" width="135" height="298" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="54" y="196" width="141" height="118" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="35" y="165" width="70" height="124" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="89" y="161" width="94" height="91" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="97" y="157" width="97" height="63" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-7" x="131" y="150" width="97" height="51" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-8" x="98" y="133" width="74" height="43" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-9" x="129" y="19" width="82" height="133" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-10" x="141" y="220" width="110" height="109" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-11" x="150" y="101" width="73" height="74" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-12" x="59" y="248" width="23" height="22" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="2" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-13" x="77" y="260" width="40" height="34" filterUnits="userSpaceOnUse">
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
        $kdwil = '63.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Tanah_Laut_01" data-name="Kab Tanah Laut 01" class="cls-1" d="M106,285c0.53,4.669,2.117,4.187,1,8l6,1v3s-1.814,1.721-2,2h-1v2h1v1h-2v4a3.982,3.982,0,0,1,2,2l3-1,1-3c3.87-.367,4.143-1.544,8-2v-2c3.034,0.858,4.489.153,7-2l1-2h5l1-2,9-2v1c2.923,2.642,1.343,4.895,3,8l2,1c2.5,3.845,6.4,9.692,7,15h2a56.294,56.294,0,0,1,1,7c-3.493.556-13.815,6.016-15,4v2c-5.125.461-7.472,3.189-11,5h-2v1l-9,2v1l-6,2v1l-4,1-1,2h-2v1h-2v1h-2v1h-2v1h-2v1h-2v1H99v1H97v1H95v1l-4,1-1,2H88v1l-4,1v1H73l1-21c-2.981-10.358-5.105-20.85-2-32l-1-11H70v-2H69l1-2-2,1v-2l-2-1v-1h1l-1-2H65v1l-3-1c0.844-1.135-.127-0.145,1-1,3.262-3.6,5.979-.555,11-2v-1l14-2,1,2h5l2,3h3l1,2c2.715,0.673,3.1-2.547,4-3h2Z"/>
        </a>
        <?php
        $kdwil = '63.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Kotabaru_02" data-name="Kab Kotabaru 02" class="cls-2" d="M283,165l-12,1v-2h-2v2h-1v-1l-2,1c-0.933-.035-3.88-2.241-6-1v1l5,1v1c2.8,0.811,3.537-1.248,5-2v1h1l-1,3h-1v3h-2v2h-2v1h1c1.142,1.581-2.458.931-3,1-1.139-1.139,0-.4-2-1v1h2l-1,2c1.261,0.892,4.271.315,2,2v1h-4v1h1c-0.636,1.421-1.166.742-2,2h3v-2c3.144-.865,3.225-1.977,5-4h1l1-3h3c0.575-2.987,1.879-4.587,3-7,2.01,0.574.865-.12,2,1l3,1v1h3v1c-3.732,3.034-8.38,15.3-6,24h1q-0.5,5.5-1,11h-2l-1,3h-1v2h-1v2l-4,3v2h-1l-1,2h-6c-0.131-2.229-2.134-15.062-3-16v3h-1l1,3h-1c-0.958-1.425-1.4-2.739-3-1v-7h-1q0.5-1.5,1-3h-2c0.115-2.135,1.021-3.418,1-4h-1v-1h-1v3h-3v2l3,1v3a19.149,19.149,0,0,1-7-2v1h1c1.5,1.709,3.785,2.1,6,3q-1,2-2,4h-2q0.5-1.5,1-3h-1v2h-3v2l3-1v1h1v4l-3-1v2c1.016,0.771.984,1.229,2,2a3.982,3.982,0,0,1,2-2c-0.113,3.16-1.955,1.874,1,3v-2l3,1q-0.5,1-1,2h1c1.139,1.139,0,.4,2,1q-0.5,1.5-1,3h-1v1h2q0.5,2,1,4h4l1,2s-2.153.181-1,1h2v-1c0.863-.05,3.268,1.618,5,2v2h-7l-3,4c-1.078.351-5.1-1.847-8-2v-3h-1v3c-2.448-.558-2.211-1.043-4-2v1h-1q0.5,1,1,2h-2c-1.967.611,2,1,2,1v2a28.845,28.845,0,0,0,3-3l8,1c0.427,4.286,1.819,4.966,2,10l-3,1v1c-2.258,1.323-5.06,1.679-8,2v-2h-6q-0.5-1-1-2h-2v-1a8.351,8.351,0,0,0-4-2v1c-1.139,1.139-.4,0-1,2l-3,1v-1c-1.719-1.127-1.355-.633-2-3,2.269-1.286,2.637-1.628,3-5a7.742,7.742,0,0,1-2-3c-7.259,1.2-12.776,3.595-20,5-0.884-3.672-3.1-5.052-4-9h-2v-3l-2-1c-3.793-3.86-10.717-2.256-16-2v-2l-6-2a7.173,7.173,0,0,0-1-4h1c1.139-1.139,0-.4,2-1,0.452-2.313,1.275-6,3-7h4a58.657,58.657,0,0,0,3-7c-1.8-.945-1.574-1.385-4-2q-0.5-2-1-4h-1q2.5-6,5-12h3v-1a1.768,1.768,0,0,1,2,1l9-1q0.5-1.5,1-3h1q0.5-1,1-2h2v-1a12.889,12.889,0,0,1,6-3q0.5-1.5,1-3c1.1,0.233,5.357,1.959,7,1v-1h1v-6h-1v-3h-1c-1.779-2.136-4.125-2.867-8-3q0.5-2,1-4h-1v-6h1l2-3h2l2-3,3-1v-3l13-2v-1h1v1h30v1h3v1h2v1l8,1v1h5c4.989,1.561,10.453,3.113,15,5l1,3h-1q-1,4.5-2,9h-1c-0.856,3.2,3.566,5.069-3,7v1h-1v-1h-1v-6h-1v-1a25.606,25.606,0,0,1-8-2v1h1v3Zm-20-12c1.691,2.151,2,2,2,2C265.736,154.028,263.266,153.242,263,153Zm6,2c1.691,2.151,2,2,2,2C271.736,156.028,269.266,155.242,269,155Zm5,9h2v-1c-1.135-.844-0.145.127-1-1h-1v2Zm-18,0c1.127,1.719.633,1.355,3,2A7.742,7.742,0,0,0,256,164Zm4,12h-3v1c-1.135.844-.145-0.127-1,1h1v-1c1.128-.642,2-0.055,2,1h1v-2Zm-19,41c1.139,1.139,0,.4,2,1C241.861,216.861,243,217.6,241,217Zm26,30c-0.086,1.788-1.044,3.61-1,4h1v4c-1.063,3.854-2.691,7.147-3,12,5.621,3.106,7.508,7.4,7,14-3.1.259-6.691,2.01-8,4h1v-1h3c0.343,3.191.828,3,2,5h1c0.616,1.651-.965,1.832-1,2v4h1v4h-1c-0.292,1.751.9,1.638,1,2v5h1v1h3v1c-1.823,1.5-2.18,4.534-4,6l-3,1v4c3.149,2.1,3.752,6.269,4,10l-5-1v1c-1.116.8-1.3,2.568-2,3h-3c-2.289.879-1.843,1.981-2,5-4.761.985-3.952,2.849-7,5v1l-4-1v1c-1.139,1.139-.4,0-1,2-2.282-.195-2.616-0.152-4-1v-1l-2,1v-1c-1.139-1.139-.4,0-1-2h1v-5h1v-3l2-1c1.092-3.3-1.67-3.178-2-4v-7h2a20.57,20.57,0,0,0-4-12l-2-1v-2h-1v-2h-1v-8h-1l3-5h1q0.5-6,1-12h-1v-1h1c1.116-2.948,2.282-3.734,3-7h2a29.413,29.413,0,0,1,1-7l3,1c-0.4-.868-2.462-3.805-2-5h1a9.733,9.733,0,0,1,1-4h1v1c1.619-.2,1.784-1.926,2-2l2,1v-1c1.139-1.139.4,0,1-2h2c1.838-3.038,5.164-3.888,7-7Zm5,40,3-13h1l2-3,3-1,2-6c2.01,0.574.865-.12,2,1h1v3h-1l1,3h-1v3h-1v7h-1v3h-1a1.632,1.632,0,0,0,1,2q-0.5,4-1,8l-2,1-1,3c-1.135-.844-0.145.127-1-1-1.988-1.839-3.086-7.121-2-9h-1v-1h-3Zm-27,44c1.139,1.139,0,.4,2,1C245.861,330.861,247,331.6,245,331Zm-36,49,1-3s-2.141-.164-1-1h2c0.844,1.135-.127.145,1,1l-1,2h1v1h-3Zm-8,31c-0.684,2.927-1.113,3.274-4,4C197.684,412.073,198.113,411.726,201,411Zm7,5v3h-1a8.278,8.278,0,0,1-5,3A7.537,7.537,0,0,1,208,416Zm-13,8h3v1c-1.139,1.139-.4,0-1,2h-2v-3Z"/>
        </a>
        <?php
        $kdwil = '63.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Banjar_03" data-name="Kab Banjar 03" class="cls-3" d="M184,201v2l5,3a8.3,8.3,0,0,1-2,2v4h-1v1h-5v1h-1q-0.5,2.5-1,5l-3,2a1.464,1.464,0,0,0,1,2c0.27,2.22-1,2-1,2v5h-1l-6,7-3,1v7h-1v4l-4,1v2c3.018,0.6,3.816,1.795,6,3q-0.5,3-1,6h-2q-0.5,6-1,12a2.671,2.671,0,0,1,2,2l-3,2,1,3h-1v1h-6c-1.173.681-1.221,4-2,5l-3,1c-2.307,1.445-4.182,2.922-5,6h-6v1l-2-1-1,3h-5v1h-1v-1h-1v1h-1c-0.945,1.8-1.385,1.574-2,4-3.754.324-5.363,1.895-8,3h-3v1l-3,1v2a9.749,9.749,0,0,1-4-1v-1h1v-1h-1v-5c1.442-.593,3.671-1.248,4-3h-1l1-2h-1c-2.81-2.748-4.316-.315-5-6,2.2-1.859,3.646-5.325,4-9-1.556-1.565-3.047-6.656-4-9l-3-1-1,2c-1.71.442-1.736-.94-2-1H96v-1H94l-1-2H91v-1H89v-1l-3-1-3,9H82v2H81c-0.073.918,2.245,3.845,1,6H81c-2.039,1.86-15.446,3.017-20,3l-1-3h1v-7H60v-1h1c0.333-3.628-.986-4.8-2-7,3.04-2.047,2.127-4.377,7-5,1.892,1.957,5.046,2.047,9,2,0.945-1.8,1.385-1.574,2-4-3.4-.88-3.065-1.861-3-6,1.135-.844.145,0.127,1-1l5-1v-1h2v-1l2,1v-1h2l1-2h1v1c1.474-.325,1.692-0.785,4-1v-4l3-1v2h1l1-18c-0.183-1.4-.832.4-1-1h1l1-3c2.739,0.644,2.276,1.309,5,2v2h1v-1c2.591,0.669.893,1.789,2,3,1.414,0-.017-0.018,1-1,2.516,1.4.678,1.438,2,3h1v-1c2.492,1.445.658,1.373,2,3l2-1v2l2-1q0.5,1.5,1,3c1.667,1.878,2.434-.446,3,0q0.5,1.5,1,3s4.737,1.724,6,2v2h1v-1l3,1v1h2v1a2.57,2.57,0,0,0,2-2c2.293-.484,3.588,1.638,6,3a9.749,9.749,0,0,1,1-4l2,1v-1h-1l3-5-9-1c0.844-1.135-.127-0.145,1-1q-0.5-1-1-2h1q0.5-1,1-2h2c0.909-1.083-.946-0.809-1-1q0.5-1.5,1-3c1.774-.27,2-1,2-1l3,1v-1h1a10.6,10.6,0,0,0,1-4c2.762-.723,2.237-0.279,3-3h2q0.5-1,1-2l11,2q-0.5,1-1,2h1q0.5-1.5,1-3c1.411-.088-0.069.075,1,1l4-3v-2c1.734-.186,1.226,1.815,3,0q-0.5-1-1-2h2q-0.5-1-1-2l4-2C180.494,204.8,179.079,202.307,184,201Z"/>
        </a>
        <?php
        $kdwil = '63.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Barito_Kuala_04" data-name="Kab Barito Kuala 04" class="cls-4" d="M99,170c-0.614,6.632-3.334,13.356-5,19-2.313,7.837,5.326,14.425,4,19H97v2H96v2l-2,1,1,9,2,1-1,21H94v-2H92v5c-1.135.844-.145-0.127-1,1-4.435.445-7.581,2.653-11,4l-6,1v1l-8-1c0.347,1.093,1.76,1.961,1,4H66c-0.877,1.543-1.167,1.5,0,3l-4,1c-1.4,1.1-2.178,5.057-3,7H58l1,6h1v9c-2.762-.723-2.237-0.279-3-3-6.83.089-8.892-1.909-14-3a13.307,13.307,0,0,0-3-4c0.5-2.519,2.641-4.258,2-7H41l-1-3h1v-2l2-1,2-8h3l5-7a6.718,6.718,0,0,1-3-3c3.068-1.8,2.844-4.386,5-6h2l4-5c1.861-1.39,1.434.436,3-2-2.485-1.524-.621-1.082-2-3H61c-1.377-1.718-1.661-2.006-2-5,2.2-1.438,1.549-2.113,3-4l2-1c0.019-1.35-1.709-1.656-1-4h1v-3h1l1-3,6,2c-0.362-3.27-1.983-6.658-1-8,1.882-2.1,5.227-1.974,8-3a18.233,18.233,0,0,1,1-7l4,1v-1l5-1c0.794-3.2,3.04-4.124,4-7,1.079-3.233.123-7.665,1-10C95.876,171.177,96.616,170.519,99,170Z"/>
        </a>
        <?php
        $kdwil = '63.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Tapin_05" data-name="Kab Tapin 05" class="cls-5" d="M100,166h2q1,3,2,6l2,1q0.5,2,1,4l2,1q1,3,2,6l2,1v2h1v2h1c1.81,3.1,2.067,5.008,6,6v1h5q-0.5,3.5-1,7c4.533-.879,9.01-1.324,13,1q0.5,1,1,2h5v1c1.927,1.294,1.894,1.537,5,2q0.5,2,1,4c2.359-.053,2.539-0.788,4-1,0.746,0.418,1.392,3.428,5,2q0.5-1,1-2h2v-4c2.424,0.333,4.884,1.3,8,0q0.5-1,1-2l6,2-2,3h-1c-1.881,3.061,1.8,2.615-3,4-1.139,1.139,0,.4-2,1q-0.5,1.5-1,3l-5,1v-1h-5q-0.5-1-1-2c-1.41-.109.283,0.406-1,1-4.545,1.065-6.142,4.316-9,7q-0.5,1-1,2l-3-1c-1.306,1.129-1.064,3.59-2,5h-1l-3,4c3.962,0.286,6.167,1.693,9,3-0.823,1.876-1.481,2.616-2,5-2.762.723-2.237,0.279-3,3h-2q-0.5-1-1-2c-1.264-.544-3.175,1.106-3-1h-1v2c-3.695-.34-9.446-3.226-12-5l-2-3h-2l-2-3-4-1q-0.5-1-1-2h-2q-0.5-1-1-2h-2q-0.5-1-1-2h-2c-2.5-1.448-3.483-3.164-7-4l-2-9,2-1,1-5h1c1.114-3.953-2.212-6.642-3-9v-5H94v-4C95.937,182.713,99.51,174.6,100,166Z"/>
        </a>
        <?php
        $kdwil = '63.06';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Hulu_Sungai_Selatan_06" data-name="Hulu Sungai Selatan 06" class="cls-6" d="M137,178h3a9.375,9.375,0,0,0,2,2c0.274,0.509.7,3.279,1,4l4-1v1h3v1h2v1h4v1l4,1q0.5,1.5,1,3h3v1c1.139,1.139.4,0,1,2l5,1c1.507-3.532,3.335-6.5,8-7v1c1.916,1.077,5.236-.55,6-1v-1h2c0.944,1.8,1.385,1.574,2,4l-3,9-4,1c-0.744,3.175-2.613,4.513-4,7-1.468-.646-3.473-2.866-6-2q-0.5,1-1,2h-4v1l-5-1v1h1v3h-2q-0.5,1-1,2l-5-1v-1c-0.639-.049-2.011.919-4,1q-0.5-2-1-4h-3v-1c-1.139-1.139-.4,0-1-2-7.513-.185-10.58-4.486-17-5-1.055.532,0.157,1.306-3,2q0.5-3.5,1-7a29.413,29.413,0,0,1-7-1l-3-4h-1v-2h-1v-2h-1v-2l-2-1q-1-3-2-6l-2-1q-0.5-2-1-4c-1.738-3.142-3.394-3.052-4-8l4-1a1.8,1.8,0,0,0,2,1v-1l10-2v1h2v1l17,5A17.889,17.889,0,0,0,137,178Z"/>
        </a>
        <?php
        $kdwil = '63.07';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Hulu_Sungai_Tengah_07" data-name="Kab Hulu Sungai Tengah 07" class="cls-7" d="M182,159v2a12.71,12.71,0,0,1,5-1q0.5,1.5,1,3h7v1h2v1h7v1h1v5h1c0.019-4.3.51-6.074,4-7v-1h5c4.364,4.768,6.165.391,6,11h1v1h-1v1l-7-1-2,3h-2l-2,3h-2l-6,7c-1.387-.471-1.656-1.343-4-1a1.617,1.617,0,0,1-2,1v-1h-4v1l-6-1q-0.5,1-1,2l-8-1c-1.651,2.808-4.03,3.4-5,7-3.966-.5-3.5-1.262-6-3v-1h-3v-2l-3-1q-0.5-1-1-2h-5v-1h-2v-1c-3.418-1.434-5.129.451-7-1-2.748-2.81-.315-4.316-6-5-1.244-6.435-.331-4.817,1-10l6-1v-1h5q0.5-1,1-2l5-1v-1c2.654-1.2,4.5-.758,7,0v-1h-1c-0.231-1.589,1.721-1.258,2-2v-3l4-1v1h3v1h6v1Zm22,15v-2c-1.135.844-.145-0.127-1,1h-1C203.139,174.139,202,173.4,204,174Z"/>
        </a>
        <?php
        $kdwil = '63.08';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Hulu_Sungai_Utara_08" data-name="Kab Hulu Sungai Utara 08" class="cls-8" d="M157,144v2h-3v2h1q-0.5,1.5-1,3c4.418,0.837,7.444,3.3,11,5-0.574,2.01.12,0.865-1,2-0.129.686-1.28,4.79-2,4v-1l-3,1v-2h-1v3l-6,1q-0.5,1-1,2h-3c-2.512,1.036-7.4,4.333-12,3v-1h-4v-1h-2v-1l-9-2v-1h-3v-1l-11,2v1h-1v-1l-3,1v-3l5-6h2l7-5v-1l2-1v-2h1l2-3h2q0.5-1,1-2h2q0.5-1,1-2h2q0.5-1,1-2h3c2.063,3.218,7.026,4.5,11,6v1h5v1h1v-1Z"/>
        </a>
        <?php
        $kdwil = '63.09';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Tabalong_09" data-name="Kab Tabalong 09" class="cls-9" d="M205,24c-0.471,4.978-2.961,5.627-4,10h-2q-1,3-2,6l-3,2v4l-3,2,1,3h1c-0.189,1.8-1.96,1.791-2,2v1h1v4c1.8,0.944,1.574,1.385,4,2-0.109,3.729-.86,7.825,0,9,1.165,1.361,1.824,1.528,4,2l-3,9,4-1v1h1v1h1c0.331,0.695-1.516,2.046-1,4h1q-0.5,5-1,10h-1v2h-1c-0.695,1.908.049,3.752-1,4h2q0.5,3,1,6c-1.4-.222-0.117.105-1-1-1.529.376-1.218,0.936-2,2-0.734.679-.766,0.358,0,1v1h-2q0.5,1,1,2l-2,1q0.5,1,1,2l-3,1c-1.444,1.158-2.254,4.138-3,6h-5v1c1.139,1.139.4,0,1,2l-2-1v2l-2-1v2l-2-1v2l-2-1v2l-2-1v1h1c-1.265,1.844-.314-0.468-2,1q0.5,1,1,2h-2l-2,3-2-1q-0.5,1.5-1,3l-2-1q0.5,1,1,2l-3,1v-1h-1v2l-2-1-4,5h-6v1l-5,1v-1l-6-1q-0.5-1-1-2h-2v-1h-2v-1l-3-1v-2l11-7v-1h3v1h3c0.631-7.851,2.845-8.346,3-17,4.889-.191,6.12-1.694,11-2-1.146-4.293-3.293-2.924-4-8,1.719-1.127,1.355-.633,2-3,2.01,0.574.865-.12,2,1,2.01-.574.865,0.12,2-1,1.909-1.256,1.659-1.014,2-4-1.349-1.164-3.692-3.633-2-5h-2V90h-1c-2,1.132-5.591.921-9,1V87h-1l-1-3h1V78h1q0.5-4,1-8h1V67h1V63h1V62c-0.047-.221-1.474-0.315-1-2h1q0.5-3.5,1-7h1V50h1V47h1V43h1q0.5-3,1-6h1c2.038-1.788,5.48-.756,8-2l1-2h7V32h2V31h2V30h2V29h2l1-2,4-1V25l6,1,1-2h3Z"/>
        </a>
        <?php
        $kdwil = '63.10';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Tanah_Bumbu_10" data-name="Kab Tanah Bumbu 10" class="cls-10" d="M183,227v2l10-1v1h2q0.5,1,1,2l3-1v1h1a10.6,10.6,0,0,1,1,4h2c0.391,4.5,2.431,5.746,4,9,1.987-.368,2-1,2-1h6q0.5-1,1-2h5v-1l6-1v1c1.587,1.354,1.737,2.169,2,5-1.975,1.129-2.338,1.417-3,4a3.982,3.982,0,0,1,2,2l3-1q0.5-1.5,1-3h2l2,3h2q0.5,1,1,2c4.405,2.156,4.955-3.107,6,4-2.26,1.43-3.383,3.956-4,7h-2v3l-3,1c1.3,3.786-.6,4.831,0,10h1v1h-1v2l-2,1c-1.885,4.137,1.691,5.848-2,10l-1,2-11,1v1h-4v1h-2v1l-3,1c-1.519,5.479-3.384,3.56-7,6l-3,4-8,1v1h-2v1c-2.51,1.275-5.312.822-8,2v1l-4,1v1l-6,1v1h-3v1h-2l-1,2h-2v1l-3,1v-1h-1v-4l-3-2v-3l-2-1-2-6-2-1-1-3h-1l-4-11c4.026-.93,8.135-4.723,9-9a39.688,39.688,0,0,1,8-1c-0.388-2.783-1.408-2.715,0-5l2-1a3.488,3.488,0,0,0-2-2,2.445,2.445,0,0,1,1-3v-8l2-1q0.5-3.5,1-7l-6-2v-2h3c1.847-3.494,2.071-5.13,2-11,2.479-1.4,3.23-3.7,5-5h2q0.5-1,1-2h1q1-3.5,2-7Z"/>
        </a>
        <?php
        $kdwil = '63.11';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Balangan_11" data-name="Kab Balangan 11" class="cls-11" d="M215,110c-0.442,3.121-.725,3.061-2,5h-1q-0.5,6.5-1,13h1v2l2,1v5c0.018,0.056.6-.095,1,2h2v1l-2,1q1,4.5,2,9c-2.128,1.212-2.177,2.252-5,3v2h-1c-0.214,1.4.6-.356,1,1,0.992,3.365-.58,6.733-1,9-3.217.738-3.641,1.357-4,5h-2v-3l-17-3q-0.5-1.5-1-3h-1v1h-1v-1h-4v-1h-3v-1h-7v-1h-3v-1h-3v-1h-3q-0.5-1-1-2c-2.547-1.361-2.955.289-5-2h-1v-5c4.109-1.055,1.055-.788,3-3l2,1,2-3,2-1q0.5-1.5,1-3l3-1v1h1v-2l2,1v-1c1.139-1.139.4,0,1-2l3-1v1h1v-1h-1q0.5-1.5,1-3h2q0.5-1.5,1-3h3v-1l3-1v1h1v-1h-1q0.5-1.5,1-3a10.6,10.6,0,0,1,4-1,3.982,3.982,0,0,0,2,2c0.343-3.072.687-3.171,2-5h1q-0.5-1-1-2h2v-1l2-1v-1h-1c0.391-1.549,1.83-1.193,0-2,1.068-1.666,2.668-1.735,4-4,1.194,0.645,1.44,1.638,2,2h2q0.5,1,1,2c1.652,0.551,1.834-.968,2-1C211.174,108.387,212.724,109.6,215,110Z"/>
        </a>
        <?php
        $kdwil = '63.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Banjarmasin_71" data-name="Kota Banjarmasin 71" class="cls-12" d="M74,255v2H73c-0.377,1.312,2.755,2.532,3,3v2c-2.612,1.382-1.693,1.769-6,2v-1l-5-1-1-3c1.587-1.354,1.737-2.169,2-5l4-1-1,2h5Z"/>
        </a>
        <?php
        $kdwil = '63.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Banjarbaru_72" data-name="Kota Banjarbaru 72" class="cls-13" d="M86,265l3,1v1h2l1,2h2l1,2h6c0.284,0.066.289,1.354,2,1,0.289-.06.214-2.09,2-2v1l3,1v4l2,1q0.5,3,1,6c-3.5,2.478-.244,3.565-5,5l1-3h-3c-1.766,2.129-5.753,2.27-8,0-1.139-1.139-.4,0-1-2H90l-1-2H83v-1H82v-6C84.177,272.135,85.369,268.335,86,265Z"/>
        </a>
    </svg>
    <div class="container-fluid mt-3 text-center">Sumber : <?= $sumber; ?>
    </div>
    <?php legend_kab($kd_indi); ?>
</div>
<input id="tahun" value="<?= $tahun; ?>" hidden>
<input id="tahun_besar" value="<?= $tahun_besar; ?>" hidden>
<input id="tahun_kecil" value="<?= $tahun_kecil; ?>" hidden>
<input id="provinsi" value="<?= $provinsi; ?>" hidden>
<input id="indikator" value="<?= $kd_indi; ?>" hidden>

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
                url: "ambil_kalsel_kiri.php",
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
                url: "ambil_kalsel_kanan.php",
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