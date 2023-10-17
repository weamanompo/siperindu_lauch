<?php

include '../koneksi.php';

$nilai = $_POST['nilai'];
$wil = $_POST['wil'];
$indika = $_POST['indika'];

$tebbe = strlen($wil);

// wilayah

$anamwil = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$wil'");

$namawil = mysqli_fetch_assoc($anamwil)['nama'];


// benchmark

$aksi = mysqli_query($koneksi, "SELECT * FROM benchmark JOIN indikator_pilar ON benchmark.kd_indikator = indikator_pilar.kode_indi_pilar WHERE indikator_pilar.kode_indi_pilar = '$indika' ");

$ambaksi = mysqli_fetch_assoc($aksi);

$namaindi = $ambaksi['nama_indi_pilar'];
$normal_a = $ambaksi['normal_alert']; 
$normal_r = $ambaksi['normal_saran']; 

$waspada_a = $ambaksi['waspada_alert']; 
$waspada_r = $ambaksi['waspada_saran']; 

$siaga_a = $ambaksi['siaga_alert']; 
$siaga_r = $ambaksi['siaga_saran']; 

$awas_a = $ambaksi['awas_alert']; 
$awas_r = $ambaksi['awas_saran']; 



?>

<?php if ($nilai == 1) : ?>

    <div class="modal-content bg-primary">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-primary">
       <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PERINGATAN DINI DAN REKOMENDASI</h5>
                            <?php if($tebbe == 2): ?>
                            <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $namawil; ?></h5>
                            <?php endif ; ?> 
                             <?php if($tebbe == 5): ?>
                            <?php

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
                            <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;"><?= $ase; ?></h5>
                            <?php endif ; ?> 
                            
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI</h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="card-body">
                    <div class="card">
                        <img src="" class="card-img-top">
                        <div class="card-body text-center" style="background-color:#81C6E8 ;">
                            <h6 class="card-title" style="font-size: 2rem;">Indikator <?= $namaindi; ?></h6>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peringatan Dini </h5>
                            <p class="card-text"><?= $normal_a  ; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $normal_r  ; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
<?php endif; ?>
<?php if ($nilai == 2) : ?>

    <div class="modal-content bg-success">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-success">
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PERINGATAN DINI DAN REKOMENDASI</h5>
                            <?php if($tebbe == 2): ?>
                            <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $namawil; ?></h5>
                            <?php endif ; ?> 
                            <?php if($tebbe == 5): ?>
                            <?php

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
                            <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;"><?= $ase; ?></h5>
                            <?php endif ; ?> 
                
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI</h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="card-body">
                    <div class="card">
                        <img src="" class="card-img-top">
                        <div class="card-body text-center" style="background-color:#97DECE ;">
                            <h6 class="card-title" style="font-size: 2rem;">Indikator <?= $namaindi; ?></h6>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peringatan Dini </h5>
                            <p class="card-text"><?= $waspada_a ; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $waspada_r ; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
<?php endif; ?>
<?php if ($nilai == 3) : ?>

    <div class="modal-content bg-warning">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-warning">
                        <h5 class="card-title" style="font-size: 1.5rem; color
                            :#000000">PERINGATAN DINI DAN REKOMENDASI</h5>
                            <?php if($tebbe == 2): ?>
                            <h5 class="card-title" style="font-size: 1.5rem; color
                            :#000000">PROVINSI <?= $namawil; ?></h5>
                            <?php endif ; ?> 
                             <?php if($tebbe == 5): ?>
                            <?php

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
                            <h5 class="card-title" style="font-size: 1.5rem; color
                            :#000000;"><?= $ase; ?></h5>
                            <?php endif ; ?> 
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI</h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="card-body">
                    <div class="card">
                        <img src="" class="card-img-top">
                        <div class="card-body text-center" style="background-color:#F8F988 ;">
                            <h6 class="card-title" style="font-size: 2rem;">Indikator <?= $namaindi; ?></h6>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peringatan Dini </h5>
                            <p class="card-text"><?= $siaga_a ; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $siaga_r ; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
<?php endif; ?>
<?php if ($nilai == 4) : ?>

    <div class="modal-content bg-danger">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-danger">
                           <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PERINGATAN DINI DAN REKOMENDASI</h5>
                            <?php if($tebbe == 2): ?>
                            <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $namawil; ?></h5>
                            <?php endif ; ?> 
                            <?php if($tebbe == 5): ?>
                            <?php

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
                            <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;"><?= $ase; ?></h5>
                            <?php endif ; ?> 
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI</h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="card-body">
                    <div class="card">
                        <img src="" class="card-img-top">
                        <div class="card-body text-center" style="background-color:#FF97C1 ;">
                            <h6 class="card-title" style="font-size: 2rem;">Indikator <?= $namaindi; ?></h6>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peringatan Dini </h5>
                            <p class="card-text"><?= $awas_a ; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $awas_r ; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
        </div>
        </form>
    </div>
<?php endif; ?>
