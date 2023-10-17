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
    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="30%" height="30%" viewBox="0 0 450 447">
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
            <filter id="filter" x="238" y="110" width="200" height="317" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-2" x="93" y="178" width="193" height="242" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-3" x="20" y="25" width="210" height="198" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-4" x="57" y="21" width="381" height="141" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
                <feComposite result="composite" />
                <feComposite result="composite-2" />
                <feComposite result="composite-3" />
                <feFlood result="flood" flood-color="#fff" />
                <feComposite result="composite-4" operator="in" in2="composite-3" />
                <feBlend result="blend" in2="SourceGraphic" />
                <feBlend result="blend-2" in="SourceGraphic" />
            </filter>
            <filter id="filter-5" x="173" y="85" width="131" height="139" filterUnits="userSpaceOnUse">
                <feGaussianBlur result="blur" stdDeviation="1.333" in="SourceAlpha" />
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
        $kdwil = '31.75';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakrata_timur_31_75" data-name="jakrata timur 31 75" class="cls-1" d="M408.462,204.442H405v0.693c-2.328,1.593-1.668,2.4-4.846,1.386-0.44,3.582-1.565,1.937-2.077,5.544h-1.385a26.579,26.579,0,0,1-2.077,5.544h-0.692v3.465h-0.692v4.159h-0.693v7.623h-0.692v6.93h-0.692v3.465h-0.692v2.079h-0.693V248.1c-0.662,1.621-2.252,3.009-3.461,4.158l-0.693,1.387c-2.554,1.63-6.986-.347-10.384.693v0.693h-2.077v0.693l-10.385.693c-1.049-1.969-3.233-3.428-4.154-5.545-0.5-1.158.41-2.823-.692-3.465h-6.231c0.026,2.3-.047,3.987.693,5.544h0.692v1.387h0.692q-0.346,1.385-.692,2.772c-5.047.807-10.41,1.7-13.846,4.158l-4.154,5.544q-0.346,3.811-.692,7.623h0.692V277.9h0.692v1.386h0.693l1.384,4.159q0.693,0.345,1.385.693v1.386h0.692q0.346,1.386.692,2.772h0.693v3.465H342v9.009c0,7.47.762,12.79,3.462,17.326v1.386c0.891,1.161,2.665.825,4.153,1.386v0.693h3.462c2.12,0.838,3.179,3.509,4.846,4.851q0.346,3.465.692,6.93h-0.692v6.93h-0.692v4.852h-0.693v5.544h-0.692v6.237h-0.692v4.851h0.692q-0.692,7.97-1.384,15.94h-0.693q-0.346,3.465-.692,6.93h-0.692V387.4h-0.693v2.772H351v2.772h-0.692V397.1a48.566,48.566,0,0,0-2.77,13.861c-6.356,0-6.1-3.061-11.769-3.465q-0.692,2.425-1.384,4.851l-4.847,3.465V417.2h-0.692l-0.692,1.386H312.231c-0.472.95-1.042,0.89-1.385,1.386v1.386h-0.692c-1.064,1.151-.569,1.143-2.769,1.386-0.373-4.057-2.578-4.484-3.462-7.623-2.386-.644-3.945-2.65-5.538-4.158l-0.693-1.386h-1.384l-2.077-2.772-2.077-.693-5.539-8.317c-1.034-2.862,1.006-7.026-.692-9.009a1.211,1.211,0,0,1-.692.693,5.762,5.762,0,0,1-1.385,1.386v5.544l-1.384.693c-1.851,2.029-3.074,3.327-6.924,3.465l-1.384-2.079h-0.692v-2.079h-0.693v-2.772h-0.692v-2.772l-1.385-.693v-1.386l-1.384-.693-4.154-4.851h-1.385l-2.077-2.772c-2.545-1.838-3.258-.955-4.154-4.851l-13.846-2.079c-0.055-7.042,1.31-10.769,1.385-17.326-2.815-.629-3.5-2-3.462-5.544l7.616-4.851,8.307-1.386q0.346-.693.693-1.386l2.077-1.387v-0.693h1.384v-0.693a7.636,7.636,0,0,1,3.462-2.079c0.719-2.783,2.382-3.355,2.769-6.93h-0.692v-2.079l-2.769-2.079v-0.693h-1.385q-0.346-.693-0.692-1.386H261v-0.693l-2.077-1.386v-0.693c-0.541-.817.066-0.074-0.692-0.693v-6.237h0.692q0.346-2.079.692-4.159h-0.692v-1.386l-2.077-1.386q-0.346-1.386-.692-2.772l-1.385-.693c-1.6-3.093-.673-9.607-0.692-13.86l5.538-4.158v-1.386h0.693v-2.079H261V282.06h0.692v-2.079h0.693V278.6h0.692v-2.079h0.692V275.13h0.693q0.345-2.079.692-4.158h0.692q0.346-1.386.692-2.772h0.693v-2.079h0.692v-1.386h0.692v-2.079h0.693q0.345-1.386.692-2.772h0.692l0.693-3.465h0.692v-2.772h0.692q0.693-8.316,1.385-16.633h0.692v-1.386h0.692v-2.079l1.385-.693V231.47L279,230.084c1.57-2.868.386-12.759-.692-15.247h-0.693q-0.692-2.079-1.384-4.158h-0.693v-1.386l-2.769-2.079v-1.386L270,203.749v-1.386l-2.769-2.079V198.9l-1.385-.693q-1.385-1.732-2.769-3.465c-2.077-2.059-5.368-2.97-6.923-5.545l1.384-.693v-0.693h2.77v-0.693l2.769-.693c-0.4-4.144-2.542-3.686-3.462-6.93l12.462-6.237,0.692-1.386h1.385v-0.693l4.154-1.386V169.1h2.077v-0.693c3.605-1.243,9.807.9,11.077,0l1.384-.693c-0.274-.774-1.256-1.923-0.692-3.465l1.384-.694q-0.345-1.731-.692-3.465h0.692V149.693H297v-9.7h-1.385c0.31-3.451,2.056-4.555,2.77-7.624,5.92,0.225,7.106,3.276,13.153,3.466v4.158L315,140.684v0.693h3.462l4.153,5.544c2.211,1.469,4.741.487,7.616,1.386V149H333v0.693h4.154v0.693c1.714,1.133,1.31,1.157,4.154,1.386q0.345,2.079.692,4.158a85.873,85.873,0,0,0,17.308-1.386c0.654-1.248.958-1.091,1.384-2.772h0.693q-1.039-3.465-2.077-6.93h-0.693q-0.345-4.158-.692-8.316h0.692v-5.545h0.693q0.345-3.117.692-6.237l1.385-.693q0.345-.693.692-1.386h4.846v0.693c0.96,0.514,4.418-.47,4.846-0.693v-0.693h1.385l2.077-2.772,1.384-.693v-1.386l1.385-.693v-0.693h1.385v-0.693h1.384v-0.693h2.077v-0.693h5.539v0.693h1.384l1.385,2.079h0.692v2.079h0.692c1.261,3.648-.944,3.928,2.077,6.237v0.693h2.77c0.73-.883,1.326-0.695,2.077-1.386l2.076-2.772c7.062-5,17.365-5.2,28.385-6.237,0.924,2.474.725,6.87,0.692,10.395,1.093,1.218.589,4,.693,6.237v2.079H432v9.7c4.089,15.039-3.615,27.958-8.308,36.73v1.386H423v1.386h-0.692v1.386h-0.693v1.386h-0.692v1.386l-1.385.693V189.2h-0.692q-0.346,1.386-.692,2.772l-1.385.693q-0.346,1.386-.692,2.773l-1.385.693C412.55,198.416,409.4,201.114,408.462,204.442Z" />
        </a>
        <?php
        $kdwil = '31.74';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakarta_selatan_74" data-name="jakarta selatan 74" class="cls-2" d="M256.154,291.07c-0.422,2.207-1.827,7.988-.692,11.088h0.692v1.386h0.692q0.346,1.386.692,2.772l2.077,1.386a10.722,10.722,0,0,1,2.077,6.238c-2.1,1.313-2.165,3.4-2.077,6.93,1.69,0.963,2.269,2.616,3.462,3.465h1.385q0.345,0.693.692,1.386h1.384l0.693,1.386h0.692v1.386h0.692v7.623c-0.744,1.9-6.746,7.06-9,7.624q-0.345,1.038-.692,2.079L248.538,347.9l-1.384,2.079h-2.077v0.693L243,352.056a1.211,1.211,0,0,0,.692.693c0.782,1.369.981,1.62,2.77,2.079q-0.346,5.544-.693,11.088h-0.692v7.624h-0.692v1.386h-0.693q-0.345,2.424-.692,4.851h-0.692l-0.693,12.474c-0.686,2.09-2.2,3.781-2.769,6.237-2.285,1.178-4.325,3.3-6.923,4.159L216,403.34l-10.385,3.465-1.384,2.079c-1.9,1.36-2.767.791-3.462,3.465l-2.077.693v0.693h-2.077v0.693L180,415.814v-0.693c-1.322-.438-1.753-0.286-2.769-0.693l-0.693-2.079h-0.692v-1.386h-0.692V394.33h0.692v-2.079h0.692v-1.386h0.693v-1.386l2.077-1.386V387.4h1.384l0.693-1.386,2.077-.693v-1.386h0.692c0.751-1.924-.449-5.346-0.692-6.237-0.977-3.573.891-6.039,1.384-8.317h2.077v-0.693c1.906-1.682,2.268-4.485,3.462-6.93h0.692v-2.079h0.692q0.693-2.079,1.385-4.158h0.692v-1.386l1.385-.693v-2.079h0.692q0.346-1.386.692-2.772h-0.692L198,345.126h-0.692v-0.693h-4.154V343.74h-0.692v0.693H189c-6.584-1.734-14.59.054-20.769,0.693q-0.693-1.039-1.385-2.079h-0.692v-2.08h-0.692c-1.34-1.563-.595-1.269-3.462-1.386-0.827,1.665-3.806,5.718-5.538,6.238L153,345.126q-0.346-1.039-.692-2.079l-1.385-.694q-0.692-4.156-1.385-8.316h-0.692v-2.079h-0.692v-2.079h-0.692V327.8h-0.693q-0.346-1.386-.692-2.772h-0.692v-2.079h-0.693v-1.386l-1.384-.693v-1.386h-0.693V318.1h-0.692v-1.386h-0.692v-1.386l-1.385-.693v-1.386h-0.692V311.86l-3.462-2.772q-0.345-1.04-.692-2.079l-1.385-.693q-0.345-1.732-.692-3.465h-0.692v-2.079h-0.693q-0.692-2.079-1.384-4.158h-0.692l-0.693-2.772-8.307-9.7h-1.385q-0.346-.693-0.692-1.387-1.04-.345-2.077-0.693v-8.316H117q0.346-2.772.692-5.544a30.516,30.516,0,0,0,2.077-10.395h-2.077v-4.158c-2.483-1.721-1.58-4.347-5.538-4.852v0.693h-2.077q-0.346-1.04-.692-2.079h-0.693c-0.643-1.3.379-2.919,0.693-3.465h0.692q0.347-3.465.692-6.93h-0.692v-2.772h-0.692l-0.693-2.772H108q-0.346-2.079-.692-4.158h-0.693q-0.345-3.465-.692-6.931A6.158,6.158,0,0,1,104.538,219c-3.788-2.4-7.189-1.537-8.307-6.93L108,210.679l9.692,0.693v-0.693l12.462-.693v0.693h2.769c2.08,0.743,3.766,2.229,6.231,2.772v1.386c3.405,1.87,3.337,2.767,9,2.772v-0.693h2.077v-0.693c1.436-1.131,2.214-1.336,2.769-3.465,2.691-2.821.169-6.938,1.385-11.088h0.692v-3.465l4.154-6.238h1.384v-0.693c0.852-.664,1.339-0.507,2.077-1.386L171,189.2l6.923,2.079q2.077,5.2,4.154,10.4-0.346,7.622-.692,15.246c2.144,1.139,1.243,1.316,4.846,1.386,1.192-1.43,2.586-1.648,4.154-2.772l2.077-2.772h1.384l2.769-3.465H198q0.346-.693.692-1.386h0.693q0.345-.693.692-1.386h1.385l1.384-2.079h1.385l1.384-2.079H207q0.692-1.04,1.385-2.079h1.384v-0.693l2.077-1.386v-1.386l1.385-.693q0.346-1.04.692-2.079h0.692v-2.08h0.693q0.692-4.85,1.384-9.7l6.923-.693q0.693,1.039,1.385,2.079h6.923v0.693h4.846v0.693h2.769v0.693h2.77v0.693h1.384v0.693h2.077v0.693l3.462,0.693,0.692,1.386h1.385v0.693c2.7,0.815,3.425-2.669,7.615-.693h1.385q0.345,0.693.692,1.386h1.385q0.345,0.693.692,1.386l4.154,3.466v1.386l3.461,2.772v1.386l2.077,1.386v1.386l3.462,2.772c1.929,2.751,6.907,15.218,4.846,21.484h-0.692l-0.693,3.465-2.077,1.386v1.386h-0.692q-0.346,1.386-.692,2.772h-0.693v2.772h-0.692q-0.346,6.93-.692,13.861h-0.692q-0.346,2.424-.693,4.851h-0.692q-0.346,1.386-.692,2.772h-0.693v2.079H270q-0.346,1.386-.692,2.772h-0.693v2.079h-0.692v1.386h-0.692l-0.693,3.465h-0.692v2.079h-0.692v1.386h-0.692v2.079h-0.693v2.079h-0.692v1.386h-0.692c-0.871,2-.545,5-2.077,6.238h-1.385v0.693A5.292,5.292,0,0,1,256.154,291.07Z" />
        </a>
        <?php
        $kdwil = '31.73';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakarta_barat_73" data-name="jakarta barat 73" class="cls-3" d="M60.231,30.493a5.678,5.678,0,0,0,1.385,2.772h0.692L63,36.037l1.385,0.693L65.077,39.5h0.692l0.692,2.079,1.385,0.693v1.386l4.846,4.158V49.2l2.077,1.386v1.386l1.385,0.693v1.386l1.385,0.693v1.386L81,58.907v1.386l2.077,1.386,4.846,5.544h1.385l2.769,3.465h1.385l1.385,2.079h1.385l0.692,1.386L99,74.847V75.54h1.385q0.345,0.693.692,1.386l2.077,0.693v0.693L105.923,79q0.346,0.693.692,1.386H108v0.693h1.385v0.693h1.384V82.47h1.385v0.693h1.384v0.693h1.385v0.693l4.154,1.386v0.693l3.461,0.693v0.693h1.385v0.693H126V89.4h1.385v0.693h2.077v0.693h1.384v0.693L135,92.172v0.693h1.385v0.693h2.077v0.693h2.076v0.693h2.077v0.693h2.77V96.33h2.769v0.693h3.461v0.693h4.154v0.693h16.616a42.793,42.793,0,0,1,11.769-2.079,10.888,10.888,0,0,1,2.077-2.079v-6.93a8,8,0,0,1,3.461-4.158c1.527-1.5,13.027-3.453,16.616-3.465,1.648,3.125,3.306,5.514,4.154,9.7l2.769,0.693V89.4c2.882-.724,3.842-0.389,6.231,0q0.345,3.811.692,7.623l1.384,0.693V99.1l2.077,1.386q0.346,1.386.693,2.772H225q0.346,4.5.692,9.01c0,2.823.7,8.093-.692,9.7-0.554,2.43-1.227,2.705-4.154,2.772-3.607-3.38-17.557-.424-21.461.693-4.772,1.366-9.176-1.059-12.462-1.386a5.173,5.173,0,0,1-1.385,2.079c0.4,1.393-.083.6,0.693,1.386V128.9h0.692q1.385,1.733,2.769,3.465l2.077,0.693v4.159h0.693V138.6l1.384,0.693v1.386c1.163,1.539,3.435,1.434,6.231,1.386q0.346,5.544.692,11.088h-0.692v11.089c-0.26.112-2.734,0.671-2.769,0.693-1.55.943-2.922,7.757-4.154,9.7l-1.385.693v1.386l-2.077,1.386v1.386l-6.923,6.237v1.386l-3.461,2.772-0.693,2.079h-4.153v-0.693H171c-5.033-1.5-6.922.409-11.077,1.386-0.582,2.407-2.645,3.526-3.461,5.545q-0.346,3.463-.693,6.93h-0.692c-0.749,2.58.8,5.962-.692,7.623a7.931,7.931,0,0,1-3.462,4.851h-1.385q-0.345.693-.692,1.386h-6.231c-1-1.551-1.6-1.016-2.769-2.079l-2.077-2.772-4.154-1.386v-0.693h-2.769v-0.693l-18.692.693c-8.806-.113-18.539,2.06-29.769,2.079l-9.692.693v-0.693l-2.769-.693a17.3,17.3,0,0,1-2.077-9.009h0.692v-2.079l1.385-.693v-1.386L72,198.9c3.276-4.937,4.845-11.906,4.846-20.1v-7.623H76.154l-0.692-2.772c-3.657-1.446-4.793-.929-9-0.693l0.692-4.159,2.077-1.386v-0.693h1.385v-0.693H72v-0.693c1.874-1.166,1.312.639,2.077-2.079l-7.615-2.772v-0.693H64.385v-0.693H63v-0.693l-4.154-.693v-0.693H57.462v-0.693l-9-2.079v-0.693H47.077v-0.693H45v-0.693H42.231v-0.693H40.846v-0.693C35.121,143.25,29.923,143.766,27,138.6c-1.1-1.118-2.164-4.88-1.385-7.624h0.692v-4.158H27v-4.851H26.308l-0.692-9.009c-2.651-9.138-3.679-30.242-.692-40.2V68.609h0.692l0.692-4.158H27l0.692-2.772h0.692V60.293l1.385-.693V58.214l1.385-.693V56.135l1.385-.693c1.827-1.966,2.621-3.1,2.769-6.93H34.615V47.819a18.476,18.476,0,0,1-8.308-1.386,5.187,5.187,0,0,0-1.385-2.079l0.692-6.93h0.692l-0.692-4.158h0.692c0.574-2.581,1.7-3.385,4.846-3.465,0.935-.839,5.6-1.268,7.615-0.693V29.8Z" />
        </a>
        <?php
        $kdwil = '31.72';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakarta_utara_72" data-name="jakarta utara 72" class="cls-4" d="M185.538,47.126q0.693-4.5,1.385-9.009l3.462,0.693q1.038,1.386,2.077,2.772h0.692v1.386h0.692v1.386h0.692v2.079h0.693v4.158c2.045,6.777.3,13.322,9.692,13.167V63.065H207V62.372h1.385c2.059-1.08,3.151-2.442,6.23-2.772v1.386c2.59,2.241,2.262,5,6.923,5.544,1.14,0.991,7.4,1.336,9.693.693V66.53h9v0.693h2.077v0.693h6.23s0.12,0.47,1.385.693c0.488-2.14,1.349-2.948,3.462-3.465,1.756-1.464,5.074.247,7.615-.693V63.758l2.769-.693,0.693-1.386,4.153-1.386,0.693-1.386h1.384V58.214h4.846l2.077-2.772h0.693V54.056l2.769-2.079V51.284h1.385q0.345-.693.692-1.386h2.077C290.182,48,294.4,48.826,297,44.354c1.613-1.762.52-3.733,1.385-6.237h0.692V36.037h0.692l0.693-2.079h1.384q0.346-.693.692-1.386c4.662-1.945,10.96,3.015,14.539,3.465,1.908-3.472,7-4.991,11.769-3.465h3.462v0.693c2.536,0.645,2.522,2.1,4.154,3.465v8.316l2.769-.693c1.838-4.905,3.8-8.83,10.384-9.009v0.693h2.77V36.73h1.384v0.693h2.077q0.346,0.693.692,1.386c2.3,0.926,4.466-.936,5.539-1.386h2.077l2.077-2.772h1.384V33.958l2.77-.693V32.572h2.077V31.879h3.461V31.186l22.154-.693h9.692V29.8h3.462V29.107h2.077V28.414h2.077V27.721h2.077V27.028h1.384q0.346-.693.692-1.386h1.385q0.346-.693.692-1.386h6.923a9.234,9.234,0,0,0,2.077,2.772l0.693,24.949H432v4.851c0.653,2.3,1.633,16.23.692,19.4H432V79h-0.692v4.158h-0.693v0.693c-1,5.905.97,10.823,2.077,14.554v11.782H432q-0.692,3.465-1.385,6.93c-6.448-.087-13.269.457-18,2.079h-2.769v0.693l-4.154,1.386v0.693h-1.384l-2.77,3.465h-1.384q-0.346.693-.692,1.386h-1.385v0.693h-4.154c-0.641-.818-1.751-0.927-2.077-1.386v-1.386h-0.692v-2.079h-0.692v-4.158c-0.163-.375-0.9-0.092-1.385-2.079-3.228-.589-6.31-1.108-9,0.693l-1.385,2.079-2.077,1.386v1.386l-1.384.693v0.693h-1.385l-0.692,1.386h-2.769c-2.836.917-3.82,0.025-7.616,0q-0.346,1.04-.692,2.079c-1.925,2.06-.458,4.984-1.385,8.317H360c-1.535,5.527,1.777,9.37,2.769,12.474,0.822,2.573-.4,5.887-0.692,7.623L360,155.93c-2.388,2.4-15.024,1.455-20.077,1.386v-3.465c-3.562-.379-2.6-1.9-4.846-2.772h-4.846v-0.693h-3.462v-0.693H324V149h-2.077l-5.538-6.237h-2.77c-2.97-.437-3.989-1.444-4.153-4.851-3.943-.151-2.564-1.041-4.847-2.079h-2.077V135.14h-2.076v-0.693l-2.077-.694,1.384-2.772h-0.692V129.6c-3.531.177-2.419,0.966-5.539,1.386q-0.345-1.733-.692-3.465l-2.077-1.386-5.538-6.237-6.923-2.079v-0.693l-2.77-.693v-0.693l-4.153-.693v-0.693H270v-0.693l-4.154-.693V112.27h-2.077v-0.693l-6.923-1.386V109.5c-0.788-.79-0.276,0-0.692-1.386-2.6-.434-7.1-0.9-9.692-1.386l-0.693-4.159a1.882,1.882,0,0,0,.693-2.079h-0.693V99.1l-4.154-.693V99.1h-4.153c-0.959-.3-5.755-2.783-6.231-3.465q-0.693-2.079-1.385-4.158l-4.154-3.465c-2.474.112-3.926,1-5.538,1.386L216,88.707V89.4c-2.724.766-3.378,0.31-5.538,0-0.33-2.189-2.71-8.994-4.154-9.7h-4.846v0.693h-2.077c-4.522,1.826-9.332.664-11.77,4.851-4.2,4.572,2.782,11.134-7.615,11.088-1.646,1.531-4.356.637-6.923,1.386-11.149,3.255-26.992-1.129-34.615-4.158l-4.154-.693V92.172h-1.385V91.479h-2.077V90.786l-3.461-.693V89.4H126V88.707h-2.077V88.014h-1.385V87.321l-3.461-.693V85.935l-4.154-1.386V83.856h-1.385V83.163h-1.384V82.47h-1.385V81.777h-1.384V81.084H108V80.391h-1.385Q106.27,79.7,105.923,79l-2.769-.693V77.619l-2.077-.693q-0.346-.693-0.692-1.386H99V74.847l-2.077-.693-0.692-1.386H94.846l-1.385-2.079H92.077l-2.769-3.465H87.923l-4.846-5.544L81,60.293V58.907l-3.462-2.772V54.749l-1.385-.693V52.67l-2.077-1.386V49.9L72.692,49.2V47.819l-4.846-4.158V42.274l-1.385-.693L65.769,39.5H65.077L64.385,36.73,63,36.037l-0.692-2.772H61.615a5.57,5.57,0,0,1-1.385-2.772l5.538-2.772,1.385-2.079L72,24.949V24.256h4.846v0.693h2.769v0.693H81v0.693h1.385l1.385,2.079h1.385L90,33.958l2.769,0.693v0.693h2.077v0.693h2.077V36.73H99v0.693h4.154v0.693h3.461v0.693h3.462V39.5h2.769V40.2h2.077v0.693h11.769l19.385,2.079v0.693h3.461v0.693h2.077v0.693h2.77V45.74l4.153,0.693v0.693h2.077c4.389,1.731,5.617,2.3,11.077,1.386a8.158,8.158,0,0,1,1.385-1.386V45.74h0.692c0.925-2.382.309-5.137,0-6.93,1.9-1.1,1.244-1.712,4.154-2.079,0.637,0.827,1.761.932,2.077,1.386V39.5h0.692c0.921,2.358-.723,5.317.693,6.93v0.693h4.153Z" />
        </a>
        <?php
        $kdwil = '31.71';
        $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE  kode_wilayah = '$kdwil' AND kd_indi_pilar ='$kd_indi' AND tahun_indi_pilar = '$tahun' ");
        $n = mysqli_fetch_assoc($nilai)['nilai_indi_pilar'];
        ?>

        <a xlink:href="#1" class="hover" id="<?php hitung($kdwil, $kd_indi, $n); ?>" data-bs-toggle="modal" data-bs-target="#peta_modal" onclick="edit_user_p('<?php hitung($kdwil, $kd_indi, $n); ?>')">
            <?php warnakab($n, $kd_indi, $kdwil); ?>
            id="jakarta_pusat_71" data-name="jakarta pusat 71" class="cls-5" d="M256.154,108.112q0.346,1.04.692,2.079c5.745,0.412,12.2,3.59,16.616,5.544h2.076v0.693h1.385v0.693H279v0.693l2.769,0.693V119.2l3.462,0.693,1.384,2.079c2.973,2.909,5.791,4.847,7.616,9.009h1.384l0.693-1.386h2.769c0.365,3.955-2.519,6.1-3.462,10.4h2.077v9.7h-2.769q-0.346,1.039-.692,2.079c-1.409,1.649-.912,8.159-0.693,11.088h0.693c-0.185,1.135-1.932,1.684-2.077,2.08q0.346,1.731.692,3.465h-0.692c-2.267,1.841-6.583-1.223-10.385,0V169.1l-4.154.693v0.693l-4.153,1.386v0.693h-1.385v0.693l-2.077.693q-0.346.693-.692,1.386l-2.77.693v0.693h-1.384v0.693h-1.385v0.693h-1.384V178.8l-2.077.693v2.079h1.384l0.693,2.079h0.692q0.346,1.039.692,2.079h-0.692c-0.78,1.191-.438.939-2.077,1.386v0.693l-4.154.693c-0.5,1.915-.193,1.551-2.077,2.079v0.693h-4.846l-0.692-1.386h-1.385V189.2h-1.384a82.027,82.027,0,0,0-11.077-4.158H225v-0.693h-1.385q-0.345-.693-0.692-1.386h-1.385v-0.693l-3.461.693q-0.693,4.5-1.385,9.009H216v1.386h-0.692q-0.693,2.079-1.385,4.159l-1.385.693-3.461,4.158h-1.385l-1.384,2.079h-1.385q-0.692,1.039-1.385,2.079h-1.384l-1.385,2.079h-1.384l-2.077,2.772h-1.385q-0.692,1.039-1.385,2.079c-2.5,2.437-6.7,5.82-11.076,6.237V219h-2.077V218.3c-0.789-.789-0.276,0-0.693-1.386-1.8-2.233,2.094-8.478.693-13.167q-2.424-6.583-4.847-13.168h0.693q0.346-1.039.692-2.079l3.462-2.772v-1.386l6.923-6.237v-1.386l2.077-1.386v-1.386l1.384-.693V171.87h0.693q0.345-1.386.692-2.772h0.692v-2.079h0.692V164.94h0.693q0.346-.693.692-1.387c0.986-.652,2.195.3,2.769-0.693V151.772c0.947-1.08.1-5.489,0-8.316l-4.154.693-4.153-5.544v-4.158l-2.077-.694q-2.077-2.424-4.154-4.851a23.724,23.724,0,0,1,.692-5.544,14.337,14.337,0,0,1,5.539-.693c1.071,1.206,4.784,2.2,7.615,1.386v-0.693h4.154v-0.693H207v-0.693l15.923,0.693q0.346-1.04.692-2.079c0.732-.809,1.326-11.111.693-13.167h-0.693v-2.772h-0.692V103.26h-0.692v-1.386l-2.077-1.386V99.1l-1.385-.693q-0.346-4.5-.692-9.009l7.615-1.386v0.693l2.77,0.693c1.566,3.649,3.269,7.436,6.923,9.009h2.077V99.1h3.461V98.409c2.121-.542,3.336.451,4.846,0.693a8.821,8.821,0,0,1,.693,3.465h-0.693v2.773a12.954,12.954,0,0,1,2.077,2.079h6.923S254.892,107.888,256.154,108.112Z" />
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
                    url: "ambil_dki_kiri.php",
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