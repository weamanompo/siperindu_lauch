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
<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="40%" height="40%" viewBox="0 0 700 256">
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
                .cls-5,
                .cls-6 {
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
            </style>
            <filter id="filter" x="318" y="64" width="215" height="122" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.667" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="276" y="64" width="152" height="124" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.667" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="513" y="95" width="136" height="134" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.667" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="50" y="49" width="250" height="154" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.667" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="253" y="38" width="328" height="97" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.667" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-6" x="502" y="149" width="35" height="36" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.667" in="SourceAlpha" />
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
        $kdwil = '75.01';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Gorontalo_01" data-name="Kab Gorontalo 01" class="cls-1" d="M336.875,68.384H339.5q0.438,1.315.875,2.63h0.875V70.137h0.875v0.877h5.25a7.313,7.313,0,0,0,1.75,1.753v0.877H348.25v0.877h0.875V73.644l5.25,1.753v0.877H360.5v0.877h-0.875l1.75,2.63,1.75-.877v0.877h3.5V78.9H367.5v0.877h0.875V78.9h5.25v1.753H374.5V79.781l4.375,2.63V80.658h0.875v0.877c1.213,0.245-.309-0.516.875-0.877l7.875-.877v1.753c3.3-.755,13.164-0.024,19.25,0v0.877h-0.875q0.438,1.315.875,2.63h1.75v0.877h-0.875v0.877H409.5v2.63h0.875V87.671l10.5,0.877c0.454,0.3,1.913,2.555,0,2.63v0.877h1.75v0.877H423.5V92.055c1.447-.858.74,1.262,0.875,1.753l5.25,0.877c0.531,2.1.278,1.629,1.75,2.63v0.877l1.75-.877v0.877c2.682,2.417.477,2.372,0.875,3.507,0.411,1.169.465-.294,0.875,0.876l1.75,0.877c0.537-1.117.5-.3,0.875,0.877h1.75v1.753c2.687-.861,1.8-0.308,5.25,0v1.754a9.247,9.247,0,0,1,3.5-.877c-0.48,2.44-.674.088,0,2.63,0.753-.243,2.7-1.8,4.375-0.877l-0.875,1.754c1.493,0.928,2.732.105,3.5,1.753h0.875v-1.753l2.625,0.876s0.144-1.876.875-.876v1.753h5.25v-0.877h1.75v-0.876l1.75,0.876v-1.753h14c0.633,2.422.244,1.961,2.625,2.63v7.014h-0.875q0.438,0.876.875,1.753l-1.75.877v0.877h0.875c0.251,2.064-.436,2.279-0.875,3.507l1.75-.877v1.753h0.875v-0.876l2.625,0.876-0.875,1.754h0.875V128h0.875q0.438-.876.875-1.753h-0.875V125.37H490v-1.754a10.068,10.068,0,0,0,1.75-1.753l3.5,0.877v-0.877c2.561-.726,4.066-0.6,5.25,0V120.11l1.75,0.876,1.75-2.63c-1.237.048,0.344,0.665-.875,0.877-0.752,1.656-.875-1.754-0.875-1.754h0.875q-0.438-.876-0.875-1.753h0.875v-0.877c-0.6-.811-1.215.316-0.875-0.876h0.875c0.55-1.634.383-2.25,0.875-3.507h0.875v0.876c1.88,0.545,1.047-2.057,1.75-2.63l1.75,0.877v-0.877h0.875v-0.876h-0.875c-0.121-1.234.679,0.347,0.875-.877v-3.507c1.74,0.646,6.078,2.429,8.75.877l0.875-1.754c1.039-.673.549,0.674,0.875,0.877,1.436,0.895.743-1.293,0.875-1.753l4.375-.877-1.75,5.26h0.875a6.769,6.769,0,0,0,2.625,1.754c-1.328,4.028.548,3.681,0,7.013,0,0-1.128.207-.875,1.754h0.875c0.919,4.079-.158,13.2-1.75,14.9-1,1,0,.349-1.75.877-1.06,5.27-4.926,7.189-6.125,12.274,2.331,0.53,3.969,1.708,6.125,2.63-0.986,1.507-.553,1.188-2.625,1.753v0.877l2.625,0.877q-0.438,1.314-.875,2.63h0.875c-1,1,0,.349-1.75.876v-0.876h-0.875V154.3H519.75l0.875,1.754H519.75v0.876l-1.75-.876v1.753l-1.75-.877v0.877h0.875v0.877H516.25v0.877l-1.75-.877v0.877h0.875v0.876h-1.75q0.438,1.316.875,2.63H511v-0.876h-0.875l2.625-4.384-1.75-.877c-0.823,1.779-.712-0.515-0.875-1.753,1-1,.349,0,0.875-1.753l-2.625-.877v-2.63c2.294,0.745,1.259.04,3.5,0.877-0.52-.926-1.573-3.288-3.5-2.631l-1.75,2.631h-1.75q-0.438.876-.875,1.753l-1.75-.877v0.877c-1,1-.349,0-0.875,1.753l-2.625-.876c-0.531,2.1-.278,1.629-1.75,2.63v0.876h0.875q-0.438.877-.875,1.754h0.875c1-1,0-.349,1.75-0.877v1.754c2.751,0.512,3.9,1.421,7,1.753v2.63h1.75V165.7l1.75-.877V165.7c2.571,1.695.643,1.332,1.75,2.63h0.875v-0.877c1.24,0.634,1.044,1.223,1.75,1.753h1.75v0.877h-0.875c1.035,1.75,1.226,1.991,3.5,2.63v2.63H518v0.877h-4.375V177.1H512.75v-0.877h-0.875V177.1h-1.75v0.877l-3.5-.877v1.753h-5.25v-0.876h-1.75V177.1l-11.375,1.753v-0.876h-3.5V177.1h-0.875v0.877l-6.125.876v-0.876h-3.5V177.1l-14,.877,0.875-1.754H460.25V177.1h-6.125v0.877h-1.75q-0.438.876-.875,1.753l-20.125.877-2.625-7.891-7.875-.876,0.875-1.754h-0.875c-1.211-1.819-1.8-2.956-4.375-3.507q0.438-2.191.875-4.383H416.5v-0.877l1.75-.877q-0.875-3.945-1.75-7.89h-1.75v-1.753H413c-0.545-2.771-1.369-1.838-1.75-2.631v-3.506h-0.875v-3.507l-1.75-.877V139.4H409.5c-0.8-1.771-1.367-2.082-3.5-2.63v-1.753a10.381,10.381,0,0,0-4.375.876c-0.38-4.141-2.325-5.506-4.375-7.89h-0.875q-0.438-1.315-.875-2.63h-4.375l-0.875-1.754-4.375-.876v-1.754h-1.75A10.429,10.429,0,0,1,385,116.6l-2.625-.877c-0.624.5,0.285,1.309-.875,0.877v-0.877h-1.75v-0.877l-2.625-.876v-2.631l-5.25.877q-0.438-1.314-.875-2.63h-1.75q-0.438.876-.875,1.753l-2.625-.876a1.336,1.336,0,0,1-1.75.876q-0.438-.876-0.875-1.753H362.25v0.877l-3.5-.877q-0.438-.876-0.875-1.753h-1.75l-0.875-1.754H353.5v-0.877H350v-0.876h-1.75l-0.875-1.754H344.75V101.7h-0.875v0.876l-5.25-.876v0.876H336l-0.875,1.754h-5.25v0.876H329l-6.125-3.506q-0.438-2.63-.875-5.261l1.75-.877q-0.438-1.315-.875-2.63h0.875a8.436,8.436,0,0,0,1.75-3.507l-2.625-.877c0.436-2.4,1.025-7.649,0-11.4H322q0.438-1.315.875-2.63H322q0.438-1.315.875-2.63H322V71.014h1.75V70.137c1.152-.817,1.554-0.665,3.5-0.877v0.877l6.125,0.877v1.753h1.75l-0.875-1.753C335.387,69.6,335.9,71.972,336.875,68.384Z"/>
        </a>
        <?php
        $kdwil = '75.02';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Boalemo_02" data-name="Kab Boalemo 02" class="cls-2" d="M287.875,68.384v2.63h1.75v3.507c3.251,0.521,2,.509,5.25,0V72.767h1.75v1.753H301c0.838-.343.474-2.6,3.5-1.753v0.877l8.75,3.507,0.875-1.754L322,72.767V75.4h0.875v9.644h0.875q-0.438,2.191-.875,4.383H325.5v1.754h-1.75c-0.369,2.344-1.132,4.862-2.625,6.137a6.719,6.719,0,0,0,1.75,1.753v4.383h0.875v-0.877c1.073-.384,4.581,2.476,6.125,2.63v-0.876H336l0.875-1.754h1.75V101.7l8.75,0.876,1.75,2.63,6.125,0.877,3.5,4.384h2.625v0.876h0.875c1.157-.617-1.077-1.621.875-1.753v0.877c1.307,0.611,1.55.461,3.5,0.876v0.877H367.5v-0.877h1.75v-0.876c1.525-.756.734-1.066,1.75,0,1,1,.349,0,0.875,1.753,2.02-.341,3.641-1.67,5.25,0q0.438,1.316.875,2.63h1.75V116.6h4.375v1.753H383.25q0.438,1.316.875,2.63h1.75v2.63h0.875V122.74l2.625,0.876v0.877h1.75v0.877H395.5V128c4.559,1.138,5.248,5.4,6.125,7.89H402.5v-0.876a25.871,25.871,0,0,0,3.5.876v1.754h0.875v-0.877c0.752-1.656.875,1.754,0.875,1.754,0.808,0.944.58-.067,0.875,1.753H407.75v0.877h0.875v-0.877c1.221-.2-0.235.328,0.875,0.877,3.366,3.869.032,9.586,7,11.4q0.438,2.629.875,5.26h0.875q-0.438,1.754-.875,3.507H416.5v0.877h0.875q-0.438,2.191-.875,4.383c2.419,0.6,2.272,1.009,3.5,2.63h0.875v3.507h0.875q0.438,3.069.875,6.137c-1.576.828-1.378,1.214-3.5,1.754-2.01-3.162-1.539-.361-4.375-1.754q-0.438-1.314-.875-2.63H413v1.754l-5.25-.877c0.5-2.143.916-1.934,1.75-3.507h-1.75c-1.3,2.315-2.73,3.208-6.125,3.507-0.917-1.141-1.788-1.306-2.625-2.63,1.5-.988,1.186-0.555,1.75-2.63l-2.625.876s-0.144-1.876-.875-0.876v1.753h0.875c0.907,1.666-.6,3.648-0.875,4.384-1.759-.5-0.757.1-1.75-0.877h-0.875c-0.8-1.46.578-2.853,0.875-3.507h-0.875c-1,1,0,.349-1.75.877v3.507c-2.417-.635-1.958-0.245-2.625-2.631a3.489,3.489,0,0,0,1.75-1.753h-1.75v0.877h-2.625v-0.877H388.5q-0.438-.876-0.875-1.753c-2.694.7-3.323,1.774-6.125,2.63v0.876l-2.625-.876v-0.877H378v0.877c-1.543.346-1.442-.8-1.75-0.877h-4.375v-2.63H371v0.877h-0.875v0.876H371c0.856,1.45-1.26.742-1.75,0.877v1.753H367.5q-0.438-.876-0.875-1.753l-3.5.877q0.438-1.316.875-2.63h-0.875c-1,1,0,.349-1.75.876q-0.438-1.314-.875-2.63c-1.949.684-1.539,0.877-3.5,0v1.754l-2.625-.877s-0.122.6-1.75,0.877q-0.438,1.314-.875,2.63c-2.142-.49-1.934-0.915-3.5-1.754v0.877h-0.875v2.63h-3.5q0.438-1.314.875-2.63H343v0.877c-1,1-.349,0-0.875,1.753h-1.75v-0.877c-1.4-.187-1.079,1.449-1.75,1.754H336q-0.438.876-.875,1.753H332.5V180.6l-5.25.876V180.6l-2.625-.877v-0.877a1.312,1.312,0,0,0-1.75.877h-3.5v-0.877l-3.5.877v-0.877H315v0.877l-3.5.877v0.876l-6.125-.876v0.876h-1.75v0.877H297.5v-2.63h-0.875c-1.018-1.107-5.856-3.015-6.125-3.507V165.7h-0.875c0.11-1.534,2.2-1.872,2.625-2.631v-1.753h0.875c0.086-.716-1.451-2.247-0.875-4.384,0.185-.685,1.893-6.1,1.75-7.013h-0.875V135.89H292.25v-4.383h-0.875V122.74c-2.027-7.172-2.592-17.469-2.625-26.3a30.243,30.243,0,0,0-6.125-.877c-0.431-3.377-3.142-6.05-1.75-10.52h0.875v-2.63h0.875q-0.438-1.753-.875-3.507h0.875c-0.2-1.383-1.686-1.576-1.75-1.753-0.852-2.367.915-6.175,1.75-7.014v0.877c2.246,0.757,2.671-2.183,3.5-2.63h1.75ZM372.75,177.1h-3.5v-1.754l2.625,0.877v-0.877h0.875V177.1Z"/>
        </a>
        <?php
        $kdwil = '75.03';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Bone_Bolango_03" data-name="Kab Bone Bolango 03" class="cls-3" d="M525,99.945c4.234,0.031,5.143.369,7.875,1.754v0.876l5.25,0.877,1.75,5.26h3.5v-0.876l1.75,0.876v-0.876h2.625v3.506c2.32,0.875,6.076.913,9.625,0.877,0.816-.849,5.4-2.787,7.875-1.753q0.438,0.876.875,1.753h3.5v2.63H568.75v0.877h0.875V116.6H568.75c-0.042,1.239.7-.35,0.875,0.876,0.3,2.043-.446,2.305-0.875,3.507,4.761,1.309,2.859,4.145,9.625,4.384,1.681,1.53,6.169.16,9.625,0q0.438,1.754.875,3.507H591.5v0.876a7.267,7.267,0,0,1,2.625,4.384h1.75v2.63h0.875v0.877h2.625v0.877h1.75q0.438,0.876.875,1.753h16.625v0.877h2.625v0.876h2.625c1.765,0.669,4.425,1.873,6.125,2.631l-1.75,5.26h0.875v0.877l2.625,0.876,0.875,1.754h3.5V154.3l3.5,0.877q-0.438,5.7-.875,11.4c3.745,0.842,5.285,3.1,5.25,7.891-1,1-.349,0-0.875,1.753L637,177.973q0.438,4.383.875,8.767L644,189.37V192h-1.75l-4.375,7.014h-1.75q-0.438.876-.875,1.753H633.5c-0.875.638-1.573,2.663-2.625,3.507q-0.438,3.507-.875,7.014h-3.5a40.462,40.462,0,0,1,.875,7.89,9.265,9.265,0,0,1-3.5.877c-0.957-1.822-1.409-1.553-1.75-4.384h-1.75c-1.739,2.066-3.53,2.059-4.375,5.261l-7.875.876v-0.876h-3.5v0.876h-8.75v0.877H593.25v0.877h-0.875v-0.877h-1.75v-0.877H584.5v-0.876h-2.625v-0.877l-4.375.877v-0.877c-1.371-.725-2.106-0.731-4.375-0.877v-1.753c-3.412-1.58-5.044-3.864-9.625-4.384q-0.438-2.191-.875-4.383h-1.75v-2.631c-2.7-.618-3.722-1.708-4.375-4.383a34,34,0,0,1-10.5-2.63q-0.438-1.316-.875-2.63h-1.75V194.63h-1.75c-0.674-2.819-1.32-1.889-1.75-5.26h-1.75c-0.54-3.042-1.442-4.531-4.375-5.26q-0.438-1.316-.875-2.631H530.25q0.874-3.944,1.75-7.89c-3.282-1.386-4.4-2.13-4.375-7.014,1.815-1.8,2.588-7.731,2.625-11.4l-7-1.753q0.438-1.316.875-2.63c-2.094-.533-1.626-0.279-2.625-1.754l2.625-.877v-0.876c-3.126-.561-5.626-2.024-7-4.384,2.173-1.412,2.075-3.061,3.5-5.26l1.75-.877v-2.63l3.5-2.63V128l1.75-.877v-0.876c0.081-1.238-.607.333-0.875-0.877v-9.644h-0.875v-0.877h0.875v-3.507h-0.875q0.438-2.192.875-4.383h-2.625Q524.563,103.452,525,99.945Z"/>
        </a>
        <?php
        $kdwil = '75.04';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Pohuwato_04" data-name="Kab Pohuwato 04" class="cls-4" d="M223.125,53.479c5.566,0.1,3.823.86,7,2.63h1.75v0.877h1.75c2.225,1.664-.119,3.062,4.375,4.384,0.625,3.136,2.292,5.071,3.5,7.89h4.375q0.438,1.315.875,2.63h0.875c3.064,3.407,1.277,1.177,6.125,2.63,0,0-.108.748,1.75,0.877V74.521h0.875l3.5,4.384,10.5,0.877,1.75-2.63h1.75V76.274c2.906-1.1,5.591,1.017,7,0,1,1,.349,0,0.875,1.753h0.875c1.272,2.172-.934,4.576-0.875,6.137h0.875v0.877l-1.75.877c-0.246.8,1.215,1.678,0.875,3.507a1.366,1.366,0,0,0-.875,1.754h0.875v1.753l1.75,0.877c0.647,1.057-.752.34-0.875,0.877-1.271,1.217,1.619.836,1.75,0.877V94.685H287l0.875,1.753c2.82,2.91.62,6.031,1.75,10.521a2.368,2.368,0,0,1,.875,2.63h-0.875V113.1H290.5V116.6h0.875q-0.438,2.192-.875,4.383h0.875v4.384h0.875q-0.438,2.63-.875,5.26h0.875v1.754h0.875q-0.438,1.314-.875,2.63h0.875v2.63H294q-0.438,1.314-.875,2.63,0.438,0.876.875,1.753c0.358,2.409-.919,7.56-0.875,7.891H294v2.63h-0.875c-0.076,1.181,1.406,1.426.875,3.507h-0.875q-0.438,3.505-.875,7.013l-1.75.877a2.288,2.288,0,0,0,.875,2.63c0.4,2.217-.875,2.63-0.875,2.63-0.64,2.7.54,4.213,0.875,6.137H288.75v0.877h0.875V177.1q-0.438.876-.875,1.753c-2.248-.223-2.6-1.06-5.25,0v0.877h-1.75V180.6H273v0.876h-2.625v0.877h-1.75v0.877H264.25v0.877l-7,.876v1.754l-3.5-1.754-0.875,1.754h-1.75v0.876l-10.5.877v0.877H234.5v0.877h-2.625v0.876c-1.127.211-2.595-2.267-4.375-1.753q-0.438.876-.875,1.753a1.292,1.292,0,0,1-1.75-.876l-2.625.876c-0.633,2.422-.244,1.962-2.625,2.63v0.877h-5.25a15.391,15.391,0,0,1-2.625,2.63c-1.5-6.745-7.208-5.122-8.75-10.52h-1.75c-1.059-.662-1.049-3.34-1.75-4.384l-2.625-1.753q-0.438-1.316-.875-2.63h-0.875v-1.754c-1.894-2.6-4.046-.811-5.25-5.26a8.5,8.5,0,0,1,3.5.877c-1.05-2.832.87-2.426-3.5-2.631-1.841,2.462-6.407,1.125-11.375.877q-0.438-2.191-.875-4.383c-2.765-.1-1.64-1.714-2.625.876h-2.625q-0.438-1.314-.875-2.63c-2.157,1.262-2.439,2.751-5.25,3.507q0.438-2.191.875-4.384c-3.062.481-1.62,0.862-4.375,0-0.136,1.226.7,2.661-.875,2.631,0,0-.316-1.983-0.875-0.877v1.753h-5.25v0.877h-0.875v-0.877H152.25l-1.75-2.63c-1.237-.046.155,0.189-0.875,0.877a14.823,14.823,0,0,0-3.5-.877v-2.63H145.25a1.533,1.533,0,0,1-.875.877,9.455,9.455,0,0,1-1.75,1.753v2.63l-1.75.877q0.875,4.383,1.75,8.767c-2.813.675-1.885,1.322-5.25,1.754v1.753l-6.125-.877-0.875,1.754h-1.75v0.876h-1.75v0.877c-1.207.8-1.534,0.6-3.5,0.877-0.813-3.025-1.137-1.637-2.625-3.507,1.022-.724,1.249-0.453,1.75-1.753-0.479-.64-1.315.282-0.875-0.877,0.05-.133,1.212-0.255,1.75-2.63H122.5c-1,1,0,.349-1.75.876-0.564,2.4-1.145,2-1.75,4.384h-1.75q-0.438-.876-0.875-1.753l-1.75.876c-0.64-.546.3-1.279-0.875-0.876q-0.438.876-.875,1.753h-1.75q0.438-.876.875-1.753h-0.875c-2.062,3.529-1.588,1.228-5.25,2.63v0.876h-1.75v0.877l-5.25-.877L98,179.726a5.885,5.885,0,0,0,2.625-2.63c-1.67-1.1-1.451-.889-1.75-3.507h-1.75l-0.875-5.26h2.625a55.132,55.132,0,0,0,.875-9.644H98v-1.754l-6.125-.876v0.876c-1.484.924-1.443,1.194-3.5,1.754-1.576-5.6-2.036-1.627-6.125-3.507l-0.875-1.753H78.75L77,150.795l-5.25-1.754-0.875-4.383H70l0.875-5.261H70c-1.889,2.779-3.553,1.15-7.875.877-1.661-2.7-4.288-2.634-5.25-6.137-2.621-.681-2.3-0.54-2.625-3.507l2.625-.877,0.875-7.013,1.75-.877V120.11h0.875v-0.877H59.5V116.6H58.625c-0.476-1.888,1.241-4.887,1.75-6.137l6.125-2.63v-1.754h0.875c1.539-2.941-1.444-2.215,2.625-3.507V101.7h2.625v-0.877l15.75,0.877v0.876h1.75L91,104.329c1.705,0.627,4.319-1.24,5.25-1.754V101.7l3.5,0.876V101.7l4.375-.877a10.3,10.3,0,0,0-1.75-4.384l-1.75-.877V90.3H99.75V89.425h0.875c3.011-3.418,2.455-.433,5.25-0.877V87.671l7,0.877V90.3c4.082-1.488,4.836.651,7.875,0V89.425h9.625v1.754c7.794,0.115,8.682-2.243,14.875-3.507q0.875-3.068,1.75-6.137h5.25c1.765,0.559,3.648,2.554,7,1.754V82.411l3.5,0.877,1.75-2.63h4.375l1.75-2.63h1.75V77.151l4.375,0.877V77.151h1.75l0.875-1.754c1.942-.815,2.452,1.071,3.5.877V75.4l4.375-.877q0.438-1.315.875-2.63L196,69.26V68.384h6.125V67.507h2.625V66.63h3.5L210,64h4.375l0.875-1.753H217V61.37l2.625-.877V58.74h1.75V56.986h1.75V53.479Zm-52.5,113.973a8.512,8.512,0,0,1,3.5.877v0.876h-3.5v-1.753Zm13.125,4.384c3.111,0.7,4.9,2.586,5.25,6.137a9.249,9.249,0,0,1-3.5.876C182.261,175.2,180.985,177.139,183.75,171.836Zm-11.375,5.26a8.564,8.564,0,0,1-.875,3.507,34.636,34.636,0,0,0-7-.877V177.1h0.875C166.869,178.218,169.4,177.356,172.375,177.1Zm-21.875.877a8.514,8.514,0,0,1,3.5.876c-0.5,1.762.1,0.759-.875,1.754v0.876c-1.759-.5-0.757.106-1.75-0.876H150.5v-2.63Z"/>
        </a>
        <?php
        $kdwil = '75.05';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kab_Gorontalo_Utara_05" data-name="Kab Gorontalo Utara 05" class="cls-5" d="M308.875,42.082v1.753c2.389,1.389,2.14,2.4,6.125,2.63V45.589c1.221-.2-0.235.328,0.875,0.877h0.875V49.1a7.4,7.4,0,0,0-1.75,2.63h0.875c1.1,1.674.887,1.454,3.5,1.753V52.6h0.875V51.726h-0.875q0.438-1.315.875-2.63c1.087,0.549,1.682,2.266,3.5,1.753,0.465-.131,1.158-3.17,3.5-2.63l0.875,1.753c2.022,0.894,8.087.495,8.75,0L339.5,49.1v-2.63h2.625V42.082h1.75v2.63c1.576,0.828,1.378,1.214,3.5,1.753,0.633,2.422.244,1.961,2.625,2.63V52.6l2.625,0.877,0.875-1.753,3.5-.877q0.438-1.315.875-2.63c0.993,0.74.127-.111,0.875,0.877,1,1,.349,0,0.875,1.753,2.417,0.634,1.957.245,2.625,2.63A16.9,16.9,0,0,0,371,51.726a8.081,8.081,0,0,1,0-7.014c2.713-.762,1.576-1.758,3.5.877h0.875L374.5,47.342h0.875c1,1,0,.349,1.75.877q0.438,1.753.875,3.507h2.625V52.6c1,1,.349,0,0.875,1.754l8.75,2.63v0.877H392V58.74h4.375l1.75,2.63H402.5v0.877h1.75v0.877h5.25c0.214,0.1,1.651,3.109,2.625,2.63V64.877H413V61.37h1.75v1.753c2.078,0.532,2.006.842,3.5,1.753v0.877a1.288,1.288,0,0,0,1.75-.877l3.5,0.877v2.63h1.75a60.784,60.784,0,0,1,4.375,8.767c2.024,0.232,2.224.183,3.5,0.877V78.9c1.9,0.752,2.28-.678,2.625-0.877l2.625,0.877-1.75,5.26h2.625c1.633-1.857.667,0.075,2.625-.877V82.411l2.625-.877v0.877h1.75c0.693,2.7,1.648,2.96,4.375,3.507a10.435,10.435,0,0,1,.875-4.384c0.993,0.74.127-.111,0.875,0.877,2.438,1.341,5.354,3.987,6.125,7.014l-2.625-.877v0.877c1,1,.349,0,0.875,1.754a13.7,13.7,0,0,0,5.25.877v0.877h2.625a8.56,8.56,0,0,0,.875,3.507l2.625-.877v0.877H469v3.507h0.875v0.877c1-1,.349,0,0.875-1.754l2.625-.877c-0.48-3.068-.86-1.623,0-4.384L476,94.685V93.808c3.13-1.225,2.952-2.619,6.125-3.507,0.805-2.683,1.076-2.572,3.5-3.507h1.75V85.918c3.32-2.8.26-1.7,1.75-4.384H490c2.237-2.955,4.1-2.12,6.125-4.383H495.25q-0.438-2.192-.875-4.384c2.677-1.545,3.992-3.829,7-5.26V66.63H498.75v0.877l-4.375-.877V65.753H493.5q-0.438-2.191-.875-4.383c2.026-.767,3.856-0.892,7-0.877V59.616h5.25a14.7,14.7,0,0,0,2.625,2.63q-0.438,1.315-.875,2.63H507.5v0.877H511l0.875,1.753c1.41,1.035,3.589.874,6.125,0.877V66.63h1.75c0.56,2.405,1.664,3.235,2.625,5.26h0.875V71.014h0.875V71.89h3.5l1.75,2.63h0.875V73.644c1.5-.988,1.186-0.555,1.75-2.63-1-1-.349,0-0.875-1.753l4.375,0.877c0.382,4.852,1.43,3.447,1.75,8.767h2.625v1.753l2.625,0.877v0.877l8.75,1.753v1.753l7.875,0.877v1.753c3.036,0.541,4.522,1.445,5.25,4.384H567c1.061,1.865,1.971,1.909,2.625,4.384,4.583,1.214,3.111,4.027,6.125,6.137-0.643,1.748-1.348,4.895-2.625,6.137-1.477,1.867-2.769,2.5-6.125,2.63a6.984,6.984,0,0,0-2.625-1.753v-0.877l-7.875,2.63h-5.25v-0.877l-2.625.877q-0.438-2.63-.875-5.26l-7,1.753v-0.876H539a8.555,8.555,0,0,1,.875-3.507c-5.769-1.044-8.632-4.579-14-5.26q-0.438,1.315-.875,2.63l-1.75-.877q-0.438.876-.875,1.753H519.75v0.877c-1,1-.349,0-0.875,1.753-2.964.121-3.756,1.035-5.25,0q-0.438-.876-0.875-1.753l-1.75.877v-0.877h-0.875v3.507H509.25v2.63h-2.625v1.753H505.75v-0.876l-2.625,1.753q0.438,1.316.875,2.63h-1.75c1.621,4.259-.139,4.559-1.75,7.891l-1.75-.877v0.877H497v0.876h-3.5V122.74l-2.625.876q0.438-.876.875-1.753h-0.875q-0.438,1.315-.875,2.63a1.5,1.5,0,0,1,.875,1.754H490q-0.438,1.314-.875,2.63l-1.75-.877s-0.158,1.888-.875.877v-1.754l-2.625-.876q-0.438-2.631-.875-5.261c0.164-.579,2.1-0.03,1.75-2.63h-0.875c-0.391-1.79.915-4.225,0.875-4.383H483q0.438-1.315.875-2.631c-1.688-.338-1.75-0.876-1.75-0.876H477.75v-0.877l-5.25.877v0.876l-2.625-.876v0.876h-1.75v0.877l-1.75-.877L465.5,113.1c-1.235.073,0.165-.2-0.875-0.877H463.75V113.1H458.5v-2.63h-1.75v1.753h-0.875v-0.877H455v0.877h-0.875v-0.877H451.5q0.438-.876.875-1.753h-3.5c-0.258-.127-0.6-1.346-1.75-1.753v0.876H446.25v-0.876l-3.5-.877v-0.877c-0.607-.251-1.64,1.286-3.5,0q-0.438-1.314-.875-2.63c-0.91-.841-0.812.845-0.875,0.877-1.106.555-.563-0.45-0.875-0.877H435.75v-2.63h-2.625V99.945H434l-2.625-3.507-1.75.877V95.562l-1.75.877q-0.438-1.315-.875-2.63l-1.75.877-1.75-2.63-1.75.877V91.178c-1-1-.349,0-0.875-1.754L409.5,88.548c-0.812-3.616-1.141-2.513-1.75-6.137h-17.5l-0.875-1.754-1.75.877-0.875-1.753h-0.875v0.877H381.5c-1.19.341,0.362,0.858-.875,0.877V80.658H379.75v0.877l-4.375.877V80.658H374.5v0.877c-0.752,1.656-.875-1.753-0.875-1.753l-5.25-.877v1.753c-1.194-.4-1.466-1.221-3.5-0.877v0.877l-1.75-.877v0.877H362.25V78.9c-1.232-.112.132,0.156-0.875,0.877l-1.75-.877q-0.438-1.315-.875-2.63c-1.768.3-1.75,0.877-1.75,0.877-2.371.724-1.738-2.358-4.375,0V75.4H350V74.521l-1.75.877V71.014l-6.125.877V71.014H341.25c-0.413.358,0.226,1.442-.875,0.877l-1.75-2.63-1.75.877V69.26H336l0.875,1.753h-1.75V71.89c-1.107.835-1.581,0.691-3.5,0.877l-0.875-1.753L329,71.89V71.014c-2.015-.737-4.6-0.92-6.125,0l-1.75,2.63h-3.5L316.75,75.4h-2.625v0.877h-1.75v0.877L304.5,72.767c-3.078-.807-2.6,1.375-3.5,1.753h-4.375V72.767c-3,.764-2.253,1.813-5.25,2.63-0.957-1.822-1.409-1.552-1.75-4.383h-1.75v-2.63h-1.75c-0.929.475-.933,3.05-3.5,2.63V70.137H281.75q-0.438,3.068-.875,6.137H273l-0.875,1.753c-1.8,1.51-2.7,1.6-6.125,1.753V78.9h-5.25c-3.941-1.632-3.639-4.931-3.5-10.521,1-1,.349,0,0.875-1.753,1.149-.459-0.25-0.361.875-0.877h2.625l1.75-2.63c1.165-.781,3.514-0.623,4.375-1.753V59.616h0.875V57.863l1.75-.877q0.438-1.315.875-2.63H273l0.875-1.754H276.5c0.215-.115,2.266-2.879,3.5-2.63,0.373,0.075,1.274,2.807,4.375,1.753V50.849h1.75L287,49.1h1.75V48.219h2.625V47.342H294c1.18-.374-0.35-1.054.875-0.877a1.324,1.324,0,0,0,1.75.877V46.466h1.75l0.875-1.753h4.375l0.875-1.753Zm113.75,8.767h3.5V52.6l-2.625-.877s-0.144,1.877-.875.877V50.849ZM448,73.644h4.375v2.63l3.5-.877v1.754l2.625,0.877V78.9l2.625-.877q-0.438,2.191-.875,4.384H455C453.023,79.046,449.123,77.8,448,73.644Zm24.5,5.26V77.151c3.473,1.013,1.473.6,4.375-.877v1.753c0.993,0.74.127-.111,0.875,0.877H472.5Zm8.75,0q-0.438,2.191-.875,4.384l1.75,0.877v3.507c-3.078-.536-4.015-0.943-4.375-4.383h0.875V79.781H477.75l0.875-1.753Z"/>
        </a>
        <?php
        $kdwil = '75.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="Kota_Gorontalo_71" data-name="Kota Gorontalo 71" class="cls-6" d="M519.75,153.425c4.9-.01,6.436,1.293,10.5,1.753-0.083,6.562-2.447,9.055-2.625,15.781,1.862,1.063,1.9,1.975,4.375,2.63a16.79,16.79,0,0,1-1.75,6.137c-0.993-.74-0.127.111-0.875-0.877l-6.125-4.383v-2.63h-0.875v1.753h-1.75c-0.8.347-.5,2.5-2.625,1.753v-0.876h-0.875v-3.507H516.25v0.877l-2.625-1.754v-0.877h-1.75q0.438-.876.875-1.753c-1.237-.038.061,0.066-0.875,0.877-1.284-.581-0.911-0.865-1.75-1.754H509.25v-1.753h-0.875V165.7c-1.523-.95-1.2-0.575-1.75-2.631a16.74,16.74,0,0,1,6.125-.876c0.431,0.374,1.1,1.625,2.625.876v-0.876h-1.75c0.285-3.232.715-3.691,3.5-4.384v-1.753l1.75,0.876v-0.876h0.875v-2.63Z"/>
        </a>
    </svg>
    <div class="container-fluid text-center">Sumber : <?= $sumber; ?>
    </div>
    <?php legend_kab($kd_indi); ?>
</div>
<input id="tahun" value="<?= $tahun; ?>" hidden>
<input id="tahun_besar" value="<?= $tahun_besar; ?>" hidden>
<input id="tahun_kecil" value="<?= $tahun_kecil; ?>" hidden>
<input id="provinsi" value="<?= $provinsi; ?>" hidden>
<input id="indikator" value="<?= $kd_indi; ?>" hidden>


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
                url: "ambil_gorontalo_kiri.php",
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
                url: "ambil_gorontalo_kanan.php",
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