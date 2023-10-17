<?php

include '../koneksi.php';

$kdi = $_POST['indikator'];

$provinsi = $_POST['provinsi'];


// Hapus



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

if ($provinsi == 99) {

    $atahun = mysqli_query($koneksi, "SELECT * FROM indikator_nav JOIN transaksi_pilar ON indikator_nav.kode_indikator_nav = transaksi_pilar.kd_indi_pilar  WHERE transaksi_pilar.kd_indi_pilar = '$kdi' AND CHAR_LENGTH(transaksi_pilar.kode_wilayah)=2 ORDER BY transaksi_pilar.tahun_indi_pilar ASC");

    // $atahun = mysqli_query($koneksi, "SELECT * FROM indikator_nav WHERE kode_indikator_nav = '$kdi' AND CHAR_LENGTH(kode_wilayah_nav)=2 ORDER BY tahun_nav ASC");

    $cek = mysqli_num_rows($atahun);
} else {

    $atahun = mysqli_query($koneksi, "SELECT * FROM indikator_nav JOIN transaksi_pilar ON indikator_nav.kode_indikator_nav = transaksi_pilar.kd_indi_pilar  WHERE transaksi_pilar.kd_indi_pilar = '$kdi' AND CHAR_LENGTH(transaksi_pilar.kode_wilayah)=5 AND transaksi_pilar.kode_wilayah LIKE '$provinsi%' AND transaksi_pilar.nilai_indi_pilar != '' ORDER BY transaksi_pilar.tahun_indi_pilar ASC");

    $cek = mysqli_num_rows($atahun);
}

?>

<?php if ($cek != 0) : ?>
    <form action="aksi.php" method="post">
        <input name="indi" value="<?= $kdi; ?>" hidden>
        <input name="provinsi" value="<?= $provinsi; ?>" hidden>
        <?php $tahuna = ''; ?>
        <p>Pilih Tahun :</p>
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1" onClick="setAllCheckboxes('actors', this);">
            <label class="form-check-label" for="inlineCheckbox1">Pilih Semua Tahun</label>
        </div>
        <div id="actors">
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
        </div>
        <button type="submit" class="btn btn-outline-info" name="submit" id="tbl1">Tampilkan Tabel</button>
        <button class="btn btn-info" type="button" id="tbl2" disabled>
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
            Loading...
        </button>
    </form>
<?php endif; ?>

<?php if ($cek == 0 && $provinsi != 1) : ?>
    <?php $prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$provinsi'");
    $nm = mysqli_fetch_assoc($prov)['nama'];
    $in = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kdi'");
    $nmindi = mysqli_fetch_assoc($in)['nama_indi_pilar'];
    ?>
    <div class="alert alert-danger" role="alert">
        Data Indikator <?= strtoupper($nmindi); ?> Untuk Wilayah Kabupaten/Kota Di Provinsi <?= strtoupper($nm); ?> Belum Tersedia
    </div>

<?php endif; ?>

<?php if ($cek == 0 && $provinsi == 1) : ?>
    <div class="alert alert-danger" role="alert">
        Pilih Indikator Dahulu
    </div>
<?php endif; ?>

<script type="text/javascript">
    function setAllCheckboxes(divId, sourceCheckbox) {
        divElement = document.getElementById(divId);
        inputElements = divElement.getElementsByTagName('input');
        for (i = 0; i < inputElements.length; i++) {
            if (inputElements[i].type != 'checkbox')
                continue;
            inputElements[i].checked = sourceCheckbox.checked;
        }
    }
</script>

<script>
    $(document).ready(function() {
        $("#tbl2").hide();
        $("#tbl1").on('click', function() {
            $("#tbl1").hide();
            $("#tbl2").show();
        });
    });
</script>