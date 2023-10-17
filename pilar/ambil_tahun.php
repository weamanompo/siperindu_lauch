<?php

include '../koneksi.php';


$provinsi = $_POST['provinsi'];


// Hapus



$coret = "DELETE FROM wil_nav WHERE  kd_wil_nav = '$provinsi'  ";

mysqli_query($koneksi, $coret);


$indi_nav = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah  = '$provinsi' ");


while ($aa = mysqli_fetch_assoc($indi_nav)) {

    $kode_wilayah = $aa['kode_wilayah'];

    $kode_indikator_nav = $aa['kd_indi_pilar'];

    $tahun_nav = $aa['tahun_indi_pilar'];



    $query3 = "INSERT INTO wil_nav 

VALUES

('', '$kode_wilayah','$kode_indikator_nav','$tahun_nav');

";

    mysqli_query($koneksi, $query3);
}


// $kdi = '6';

$awal = '1980';

$akhir = '2020';

$kurung1 = "(";

$kurung2 = ")";

$koma = ",";

$gabung = $kurung1 . $awal . $koma . $akhir . $kurung2;


$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar IN $gabung ORDER BY tahun_indi_pilar ASC ");

$tebbe = mysqli_num_rows($data);

?>


<?php

// $atahun = mysqli_query($koneksi, "SELECT * FROM wil_nav WHERE kd_wil_nav = '$provinsi' ORDER BY tahun_wil_nav ASC ");

$atahun = mysqli_query($koneksi, "SELECT * FROM indikator_nav JOIN transaksi_pilar ON indikator_nav.kode_indikator_nav = transaksi_pilar.kd_indi_pilar  WHERE transaksi_pilar.kode_wilayah = '$provinsi' AND transaksi_pilar.nilai_indi_pilar != '' ORDER BY transaksi_pilar.tahun_indi_pilar ASC");

$cek = mysqli_num_rows($atahun);

?>

<?php if ($cek != 0) : ?>
    <form action="aksi.php" method="post">

        <input name="provinsi" value="<?= $provinsi; ?>" hidden>
        <?php $tahuna = ''; ?>
        <p>Pilih Tahun :</p>
        <?php while ($d = mysqli_fetch_assoc($atahun)) : ?>
            <?php $tahun = $d['tahun_indi_pilar']; ?>
            <?php if ($tahun != $tahuna) : ?>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="<?= $tahun; ?>" name="ins[]">
                    <label class="form-check-label" for="inlineCheckbox1"><?= $tahun; ?></label>
                </div>
                <?php $tahuna = $tahun; ?>
            <?php endif; ?>
        <?php endwhile; ?>
        <button type="submit" class="btn btn-outline-info" name="submit">Tampilkan Tabel</button>
    </form>
<?php endif; ?>