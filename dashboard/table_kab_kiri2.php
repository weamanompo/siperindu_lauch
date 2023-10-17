<?php

include "../koneksi.php";

if (!isset($_POST['indikator'])) {

    die;
}

$kd_indi = $_POST['indikator'];

$tahun_mak = $_POST['tahun'];

$provinsi = $_POST['provinsi'];


// ambil tahun current


$cekthn_a = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE CHAR_LENGTH(kode_wilayah_nav) =5  AND kode_wilayah_nav LIKE '$provinsi%' AND  kode_indikator_nav = '$kd_indi' AND tahun_nav < $tahun_mak ORDER BY tahun_nav DESC LIMIT 1 ");

$acekthn_a = mysqli_fetch_assoc($cekthn_a);

$tahun = $acekthn_a['tahun_nav'];

// cek navigasi 

$cekthn_t = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE CHAR_LENGTH(kode_wilayah_nav) =5  AND kode_wilayah_nav LIKE '$provinsi%' AND  kode_indikator_nav = '$kd_indi' AND tahun_nav < $tahun ORDER BY tahun_nav DESC  ");

$acekthn_t = mysqli_fetch_assoc($cekthn_t);

$cekthn_t = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE CHAR_LENGTH(kode_wilayah_nav) =5  AND kode_wilayah_nav LIKE '$provinsi%' AND  kode_indikator_nav = '$kd_indi' AND tahun_nav < $tahun_mak ORDER BY tahun_nav  ");

$jum = mysqli_num_rows($cekthn_t);


// ambil satu tahun sebelumnya

// $cekthn = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE CHAR_LENGTH(kode_wilayah_nav) =5  AND kode_wilayah_nav LIKE '$provinsi%' AND  kode_indikator_nav = '$kd_indi' AND tahun_nav < $tahun_mak ORDER BY tahun_nav DESC LIMIT 1");

// $acekthn = mysqli_fetch_assoc($cekthn);

// $tahun = $acekthn['tahun_nav'];

// ambil tahun terbesar

$query = mysqli_query($koneksi, "SELECT max(tahun_nav) as kodeTerbesar FROM indikator_nav WHERE  kode_indikator_nav = '$kd_indi'  AND CHAR_LENGTH(kode_wilayah_nav) =5  AND kode_wilayah_nav LIKE '$provinsi%'");
$data = mysqli_fetch_array($query);
$tahun_besar = $data['kodeTerbesar'];



// tahun kecil

$cekthnmin = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE CHAR_LENGTH(kode_wilayah_nav) = 5 AND kode_wilayah_nav LIKE '$provinsi%' AND  kode_indikator_nav = '$kd_indi'  ORDER BY tahun_nav ASC LIMIT 1");

$acekthnmin = mysqli_fetch_assoc($cekthnmin);

$tahun_kecil = $acekthnmin['tahun_nav'];

// nama indikator

$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

// ambil nama provinsi

$prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");

$aprov = mysqli_fetch_assoc($prov);

include 'fungsi_table.php';
include 'fungsi_indi_sebelum.php';



?>

<div class="row mt-2">
    <div class="col-1">
    </div>
    <div class="col-1">
    </div>
    <div class="col-8">
        <blockquote>

            <!-- ambil tombol -->

            <?php if ($acekthn_t) : ?>

                <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;"><a href="#indikator"><img src="../assets/img/kiri.png" width="3.5%" id="kiri_kab_2"></a> &nbsp;&nbsp;TABEL INDIKATOR&nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>&nbsp;&nbsp;<a href="#indikator"><img src="../assets/img/kanan.png" width="4%" id="kanan_kab_2"></a></h5>
                <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">SETIAP KABUPATEN/KOTA </h5>
                <h5 id="judul_wpi_d" class="card-title text-center mb-4" style="color
    :#13005A;">WILAYAH PROVINSI <?= $aprov['nama']; ?></h5>
            <?php endif; ?>

            <?php if ($tahun == $tahun_kecil) : ?>

                <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">TABEL INDIKATOR&nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>&nbsp;&nbsp;<a href="#indikator"><img src="../assets/img/kanan.png" width="4%" id="kanan_kab_2"></a></h5>
                <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">SETIAP KABUPATEN/KOTA </h5>
                <h5 id="judul_wpi_d" class="card-title text-center mb-4" style="color
    :#13005A;">WILAYAH PROVINSI <?= $aprov['nama']; ?></h5>
            <?php endif; ?>

            <?php if (!$acekthn_t && $tahun != $tahun_kecil) : ?>

                <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;"><a href="#indikator">TABEL INDIKATOR&nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>&nbsp;&nbsp;</h5>
                <h5 id="judul_wpi_d" class="card-title text-center" style="color
    :#13005A;">SETIAP KABUPATEN/KOTA </h5>
                <h5 id="judul_wpi_d" class="card-title text-center mb-4" style="color
    :#13005A;">WILAYAH PROVINSI <?= $aprov['nama']; ?></h5>
            <?php endif; ?>
            <table class="table table-bordered table-striped" width="60%">
                <thead style="background-color: #0081B4 ; color : #fff ;">
                    <?php $tableindi_b =  mysqli_query($koneksi, "SELECT * FROM wilayah_2022 JOIN transaksi_pilar ON wilayah_2022.kode = transaksi_pilar.kode_wilayah  WHERE CHAR_LENGTH(wilayah_2022.kode)=2 AND transaksi_pilar.tahun_indi_pilar = '$tahun_besar' AND transaksi_pilar.kd_indi_pilar = '$kd_indi' ");

                    $sumber_b = mysqli_fetch_assoc($tableindi_b);

                    $tableindi_k =  mysqli_query($koneksi, "SELECT * FROM wilayah_2022 JOIN transaksi_pilar ON wilayah_2022.kode = transaksi_pilar.kode_wilayah  WHERE CHAR_LENGTH(wilayah_2022.kode)=2 AND transaksi_pilar.tahun_indi_pilar = '$tahun' AND transaksi_pilar.kd_indi_pilar = '$kd_indi' ");

                    $sumber_k = mysqli_fetch_assoc($tableindi_k);

                    ?>

                    <tr>
                        <th class="text-center align-middle" scope="col" rowspan="2">#</th>
                        <th class="text-center align-middle" scope="col" rowspan="2">KABUPATEN / KOTA</th>


                        <th style="text-align: center;" scope="col" width="160px"><?= $tahun; ?></th>

                        <th style="text-align: center;" scope="col" width="160px"><?= $tahun_besar; ?></th>
                    </tr>
                    <tr>
                        <th scope="col" style="text-align: center;"><?= $sumber_k['sumber']; ?></th>
                        <th scope="col" style="text-align: center;"><?= $sumber_b['sumber']; ?></th>

                    </tr>
                </thead>
                <tbody>
                    <?php $wilayah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=5 AND kode LIKE '$provinsi%'"); ?>
                    <?php $no = 1; ?>
                    <?php while ($d = mysqli_fetch_assoc($wilayah)) : ?>
                        <?php $kdwil = $d['kode']; ?>
                        <?php $nilai_b =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun_besar'");

                        $amnilai_b = mysqli_fetch_assoc($nilai_b);

                        $n = $amnilai_b['nilai_indi_pilar'];

                        $nilai_k =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun'");

                        $amnilai_k = mysqli_fetch_assoc($nilai_k);

                        $n2 = $amnilai_k['nilai_indi_pilar'];

                        $namawil = $d['nama'];

                        $data = explode(".", $namawil);

                        $kab = $data[0];

                        if ($kab == "KAB") {

                            $nm = "KABUPATEN ";

                            $title = $data[1];

                            $ase = "{$nm}{$title}";
                        }
                        if ($kab != "KAB") {

                            $ase = $data[0];
                        }


                        ?>

                        <tr>
                            <td style="text-align: center;" scope="row"><?= $no; ?>.</td>
                            <td style="text-align: left ;">&nbsp;&nbsp;<?= $ase; ?></td>


                            <?php indi_sebelum($n2, $kd_indi); ?>
                            <?php warnatable($n, $kd_indi, $kdwil); ?>

                        </tr>
                        <?php $no++; ?>
                    <?php endwhile; ?>
                    <?php $nprov = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$provinsi' AND tahun_indi_pilar = '$tahun' AND kd_indi_pilar = '$kd_indi'");
                    $n = mysqli_fetch_assoc($nprov)['nilai_indi_pilar'];
                    $kdwil = $provinsi;
                    ?>
                    <tr>
                        <th style="text-align: center ;" colspan="2">PROVINSI <?= $aprov['nama']; ?></th>
                        <?php if ($n) : ?>
                            <?php indi_sebelum($n2, $kd_indi); ?>
                            <?php warnatable($n, $kd_indi, $kdwil); ?>
                        <?php endif; ?>
                        <?php if (!$n) : ?>
                            <td style="text-align: center;" scope="row">Data tidak tersedia</td>
                        <?php endif; ?>
                    </tr>
                </tbody>
            </table>
        </blockquote>
    </div>
    <div class="col-1">
    </div>
    <div class="col-1">
    </div>
</div>

<input id="tahun" value="<?= $tahun; ?>">

<input id="tahun_kecil" value="<?= $tahun_kecil; ?>">
<input id="provinsi" value="<?= $provinsi; ?>">
<input id="tahunmak" value="<?= $tahun_mak; ?>">

<script>
    $(document).ready(function() {
        $("#kiri_kab_2").on('click', function() {
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
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#kanan_kab_2").on('click', function() {
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
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#kiri_kab").on('click', function() {
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
                }
            });
        });
    });
</script>
<script>
    $(document).ready(function() {
        $("#kanan_kab").on('click', function() {
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
                }
            });
        });
    });
</script>

<script>
    $(document).ready(function() {


        const tes = document.querySelectorAll('#ambil');

        const indi = document.querySelectorAll('#bench');

        const provinsi = document.querySelectorAll('#wilayah');
        const indikator = document.querySelectorAll('#indikator');



        for (let i = 0; i < tes.length; i++) {

            tes[i].addEventListener('click', function() {

                var nilai = indi[i].value;
                var wil = provinsi[i].value;
                var indika = indikator[i].value;

                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "view.php",
                    data: {
                        nilai: nilai,
                        wil: wil,
                        indika: indika

                    },
                    success: function(msg) {
                        $("#isi3").html(msg);

                    }
                });

            });

        }


    });
</script>