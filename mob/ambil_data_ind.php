<?php

include '../koneksi.php';

if (isset($_POST["id"])) {

    $kalimat = $_POST['id'];

    $data = explode("_", $kalimat);

    // wil

    $wil =  $data[0];
    $kdi =  $data[1];

    // $titik = '.';

    // $wil = $wil1 . $titik . $wil2;

    // kode indikator
    $kon =  $data[2];

    // kon

    $n =  $data[3];

    // nilai

    $indi = mysqli_query($koneksi, "SELECT * FROM indikator_pilar JOIN benchmark ON indikator_pilar.kode_indi_pilar =  benchmark.kd_indikator  WHERE indikator_pilar.kode_indi_pilar = '$kdi'");

    $nm = mysqli_fetch_assoc($indi);

    $kwil = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$wil'");
    $nw = mysqli_fetch_assoc($kwil);
    $nama = $nw['nama'];
}

// echo $output;

?>

<?php if ($kon == 5) : ?>
    <div class="card">
        <h6 class="card-header text-center bg-secondary text-white"><small><?= $nama; ?></small></h6>
        <div class="card-body">
            <h5 class="card-title text-center"><span class="badge bg-secondary">Belum ada data</span></h5>
            <small class="text-muted fw-lighter">klik peta -> Kab/Kota</small>
        </div>
    </div>
<?php endif; ?>

<?php if ($kon == 4) : ?>
    <div class="card">
        <h6 class="card-header text-center bg-danger text-white"><small><?= $nama; ?></small></h6>
        <div class="card-body">
            <h5 class="card-title text-center"><span class="badge bg-danger"><?= $n; ?></span></h5>
            <small class="text-muted fw-lighter">klik peta -> Rekomendasi</small>
        </div>
    </div>
<?php endif; ?>

<?php if ($kon == 3) : ?>
    <div class="card">
        <h6 class="card-header text-center bg-warning text-dark"><small><?= $nama; ?></small></h6>
        <div class="card-body">
            <h5 class="card-title text-center"><span class="badge bg-warning text-dark"><?= $n; ?></span></h5>
            <small class="text-muted fw-lighter">klik peta -> Rekomendasi</small>
        </div>
    </div>
<?php endif; ?>

<?php if ($kon  == 2) : ?>
    <div class="card">
        <h6 class="card-header text-center bg-success text-white"><small><?= $nama; ?></small></h6>
        <div class="card-body">
            <h5 class="card-title text-center"><span class="badge bg-success"><?= $n; ?></span></h5>
            <small class="text-muted fw-lighter">klik peta -> Rekomendasi</small>
        </div>
    </div>
<?php endif; ?>

<?php if ($kon  == 1) : ?>
    <div class="card">
        <h6 class="card-header text-center bg-primary text-white"><small><?= $nama; ?></small></h6>
        <div class="card-body">
            <h5 class="card-title text-center"><span class="badge bg-primary"><?= $n; ?></span></h5>
            <small class="text-muted fw-lighter">klik peta -> Rekomendasi</small>
        </div>
    </div>
<?php endif; ?>