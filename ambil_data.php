<?php

include 'koneksi.php';

if (isset($_POST["id"])) {

  $kalimat = $_POST['id'];

  $data = explode(".", $kalimat);

  // wil

  $wil1 =  $data[0];
  $wil2 =  $data[1];

  $titik = '.';

  $wil = $wil1 . $titik . $wil2;

  // kode indikator
  $kdi =  $data[2];

  // kon

  $kon =  $data[3];

  // nilai

  $n =  $data[4];

  $indi = mysqli_query($koneksi, "SELECT * FROM indikator_pilar JOIN benchmark ON indikator_pilar.kode_indi_pilar =  benchmark.kd_indikator  WHERE indikator_pilar.kode_indi_pilar = '$kdi'");

  $nm = mysqli_fetch_assoc($indi);

  $wil = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$wil'");
  $nw = mysqli_fetch_assoc($wil);
}
// echo $output;

?>


<?php if ($kon == 4) : ?>
  <div class="card">
    <div class="card-header bg-danger">
      <h5 class="text-white text-center">PERINGATAN DAN REKOMENDASI</h5>
      <h5 class="text-white text-center"><?= $nw['nama']; ?></h5>
    </div>
    <div class="card-body">
      <h5 class="card-title text-center">Indikator&nbsp;<span style="color: #862B0D ;"><?= $nm['nama_indi_pilar']; ?></span> : <span class="badge bg-danger"><?= $n; ?></span></h5>
      <h5 class="card-title">Peringatan :</h5>
      <p class="card-text text-justify"><?= $nm['awas_alert']; ?></p>
      <h5 class="card-title">Rekomendasi :</h5>
      <p class="card-text">
      <p class="card-text"><?= $nm['awas_saran']; ?></p>
      </p>
    </div>
  </div>
<?php endif; ?>

<?php if ($kon == 3) : ?>
  <div class="card">
    <div class="card-header bg-warning">
      <h5 class="text-black text-center">PERINGATAN DAN REKOMENDASI</h5>
      <h5 class="text-black text-center"><?= $nw['nama']; ?></h5>
    </div>
    <div class="card-body">
      <h5 class="card-title text-center">Indikator&nbsp;<span style="color: #862B0D ;"><?= $nm['nama_indi_pilar']; ?></span> : <span class="badge bg-warning"><?= $n; ?></span></h5>
      <h5 class="card-title">Peringatan :</h5>
      <p class="card-text">
      <p class="card-text"><?= $nm['siaga_alert']; ?></p>
      </p>
      <h5 class="card-title">Rekomendasi :</h5>
      <p class="card-text">
      <p class="card-text"><?= $nm['siaga_saran']; ?></p>
      </p>
    </div>
  </div>
<?php endif; ?>

<?php if ($kon  == 2) : ?>
  <div class="card">
    <div class="card-header bg-success">
      <h5 class="text-white text-center">PERINGATAN DAN REKOMENDASI</h5>
      <h5 class="text-white text-center"><?= $nw['nama']; ?></h5>
    </div>
    <div class="card-body">
      <h5 class="card-title text-center">Indikator&nbsp;<span style="color: #862B0D ;"><?= $nm['nama_indi_pilar']; ?></span> : <span class="badge bg-success"><?= $n; ?></span></h5>
      <h5 class="card-title">Peringatan :</h5>
      <p class="card-text">
      <p class="card-text"><?= $nm['waspada_alert']; ?></p>
      </p>
      <h5 class="card-title">Rekomendasi :</h5>
      <p class="card-text">
      <p class="card-text"><?= $nm['waspada_saran']; ?></p>
      </p>
    </div>
  </div>
<?php endif; ?>

<?php if ($kon  == 1) : ?>
  <div class="card">
    <div class="card-header bg-primary">
      <h5 class="text-white text-center">PERINGATAN DAN REKOMENDASI</h5>
      <h5 class="text-white text-center"><?= $nw['nama']; ?></h5>
    </div>
    <div class="card-body">
      <h5 class="card-title text-center">Indikator&nbsp;<span style="color: #862B0D ;"><?= $nm['nama_indi_pilar']; ?></span> : <span class="badge bg-primary"><?= $n; ?></span></h5>
      <h5 class="card-title">Peringatan :</h5>
      <p class="card-text">
      <p class="card-text"><?= $nm['normal_alert']; ?></p>
      </p>
      <h5 class="card-title">Rekomendasi :</h5>
      <p class="card-text">
      <p class="card-text"><?= $nm['normal_saran']; ?></p>
      </p>
    </div>
  </div>
<?php endif; ?>