<?php

include "../koneksi.php";

if (!isset($_POST['indikator'])) {

    die;
}

$kd_indi = $_POST['indikator'];

$tahun_mak = $_POST['tahun'];


$cekthn = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE CHAR_LENGTH(kode_wilayah_nav) = 2 AND  kode_indikator_nav = '$kd_indi' AND tahun_nav > $tahun_mak ORDER BY tahun_nav ASC LIMIT 2");

$acekthn = mysqli_fetch_assoc($cekthn);

$tahun = $acekthn['tahun_nav'];

$query = mysqli_query($koneksi, "SELECT max(tahun_nav) as kodeTerbesar FROM indikator_nav WHERE kode_indikator_nav = '$kd_indi' AND CHAR_LENGTH(kode_wilayah_nav) = 2");
$data = mysqli_fetch_array($query);
$tahun_besar = $data['kodeTerbesar'];

$cekthnmin = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE CHAR_LENGTH(kode_wilayah_nav) = 2 AND  kode_indikator_nav = '$kd_indi'  ORDER BY tahun_nav ASC LIMIT 1");

$acekthnmin = mysqli_fetch_assoc($cekthnmin);

$tahun_kecil = $acekthnmin['tahun_nav'];


$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kd_indi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

include 'fungsi_table.php';
include 'fungsi_indi_sebelum.php';
include 'fungsi_indi_sebelum_nasional.php';
include 'fungsi_table_nasional.php';

?>

<div class="row mt-4">
    <div class="col-1">
    </div>
    <div class="col-1">
    </div>
    <div class="col-8 mt-4">
        <blockquote>
            <?php if ($kd_indi != 4) : ?>
                <h5 id="judul_wpi_d" class="card-title text-center mb-4" style="color
    :#13005A;">TABEL INDIKATOR&nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>&nbsp;&nbsp;SETIAP PROVINSI</h5>
            <?php endif; ?>
            <?php if ($kd_indi == 4) : ?>
                <h5 id="judul_wpi_d" class="card-title text-center mb-4" style="color
    :#13005A;">TABEL&nbsp;&nbsp;<span id="subjudul_indi" style="color :chocolate;"><?= strtoupper($namaindi); ?></span>&nbsp;&nbsp;SETIAP PROVINSI</h5>
            <?php endif; ?>
            <table class="table table-bordered table-striped" width="60%">
                <thead style="background-color: #0081B4 ; color : #fff ;">


                    <?php $tableindi_b =  mysqli_query($koneksi, "SELECT * FROM wilayah_2022 JOIN transaksi_pilar ON wilayah_2022.kode = transaksi_pilar.kode_wilayah  WHERE CHAR_LENGTH(wilayah_2022.kode)=2 AND transaksi_pilar.tahun_indi_pilar = '$tahun_besar' AND transaksi_pilar.kd_indi_pilar = '$kd_indi' ");

                    $sumber_b = mysqli_fetch_assoc($tableindi_b);

                    $tableindi_k =  mysqli_query($koneksi, "SELECT * FROM wilayah_2022 JOIN transaksi_pilar ON wilayah_2022.kode = transaksi_pilar.kode_wilayah  WHERE CHAR_LENGTH(wilayah_2022.kode)=2 AND transaksi_pilar.tahun_indi_pilar = '$tahun' AND transaksi_pilar.kd_indi_pilar = '$kd_indi' ");

                    $sumber_k = mysqli_fetch_assoc($tableindi_k);

                    ?>

                    <?php if ($tahun != $tahun_besar) : ?>
                        <tr>
                            <th class="text-center align-middle" scope="col" rowspan="2">#</th>
                            <th class="text-center align-middle" scope="col" rowspan="2">PROVINSI</th>
                            <th style="text-align: center;" scope="col" width="160px"><?= $tahun; ?></th>
                            <th style="text-align: center;" scope="col" width="160px"><?= $tahun_besar; ?></th>
                        </tr>
                        <tr>
                            <th scope="col" style="text-align: center;"><?= $sumber_k['sumber']; ?></th>
                            <th scope="col" style="text-align: center;"><?= $sumber_b['sumber']; ?></th>

                        </tr>
                </thead>
                <tbody>
                    <?php $wilayah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2"); ?>
                    <?php $no = 1; ?>
                    <?php while ($d = mysqli_fetch_assoc($wilayah)) : ?>
                        <?php $kdwil = $d['kode']; ?>
                        <?php $nilai_b =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun_besar'");

                            $amnilai_b = mysqli_fetch_assoc($nilai_b);

                            $n = $amnilai_b['nilai_indi_pilar'];

                            $nilai_k =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun'");

                            $amnilai_k = mysqli_fetch_assoc($nilai_k);

                            $n2 = $amnilai_k['nilai_indi_pilar'];

                        ?>

                        <tr>
                            <td style="text-align: center;" scope="row"><?= $no; ?>.</td>
                            <td style="text-align: left ;">&nbsp;&nbsp;<?= $d['nama']; ?></td>


                            <?php indi_sebelum($n2, $kd_indi); ?>
                            <?php warnatable($n, $kd_indi, $kdwil); ?>

                        </tr>
                        <?php $no++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php if ($tahun == $tahun_besar) : ?>
                    <tr>
                        <th class="text-center align-middle" scope="col" rowspan="2">#</th>
                        <th class="text-center align-middle" scope="col" rowspan="2">PROVINSI</th>

                        <th style="text-align: center;" scope="col" width="160px"><?= $tahun_besar; ?></th>
                    </tr>
                    <tr>

                        <th scope="col" style="text-align: center;"><?= $sumber_b['sumber']; ?></th>

                    </tr>
                    </thead>
                <tbody>
                    <?php $wilayah = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE CHAR_LENGTH(kode)=2"); ?>
                    <?php $no = 1; ?>
                    <?php while ($d = mysqli_fetch_assoc($wilayah)) : ?>
                        <?php $kdwil = $d['kode']; ?>
                        <?php $nilai_b =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun_besar'");

                        $amnilai_b = mysqli_fetch_assoc($nilai_b);

                        $n = $amnilai_b['nilai_indi_pilar'];

                        $nilai_k =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun'");

                        $amnilai_k = mysqli_fetch_assoc($nilai_k);

                        $n2 = $amnilai_k['nilai_indi_pilar'];

                        ?>

                        <tr>
                            <td style="text-align: center;" scope="row"><?= $no; ?>.</td>
                            <td style="text-align: left ;">&nbsp;&nbsp;<?= $d['nama']; ?></td>
                            <!-- <td style="text-align: center;" ><?= $amnilai['nilai_indi_pilar']; ?></td> -->


                            <?php warnatable($n, $kd_indi, $kdwil); ?>

                        </tr>
                        <?php $no++; ?>
                    <?php endwhile; ?>
                <?php endif; ?>
                <?php $nilai_k =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '1' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun'");

                $amnilai_k = mysqli_fetch_assoc($nilai_k);

                $n2 = $amnilai_k['nilai_indi_pilar'];

                $nilai_b =  mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '1' AND kd_indi_pilar = '$kd_indi' AND tahun_indi_pilar = '$tahun_besar'");

                $amnilai_b = mysqli_fetch_assoc($nilai_b);

                $n = $amnilai_b['nilai_indi_pilar'];
                ?>
                <?php if ($tahun != $tahun_besar) : ?>
                    <tr>

                        <th class="text-center align-middle" scope="col" colspan="2">NASIONAL</th>
                        <?php indi_sebelum_nasional($n2, $kd_indi); ?>
                        <?php warnatable_nasioanl($n, $kd_indi); ?>
                    </tr>
                <?php endif; ?>
                <?php if ($tahun == $tahun_besar) : ?>
                    <tr>

                        <th class="text-center align-middle" scope="col" colspan="2">NASIONAL</th>

                        <?php warnatable_nasioanl($n, $kd_indi); ?>
                    </tr>
                <?php endif; ?>

                </tbody>
            </table>
        </blockquote>
    </div>
    <div class="col-1">
    </div>
    <div class="col-1">
    </div>
</div>
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