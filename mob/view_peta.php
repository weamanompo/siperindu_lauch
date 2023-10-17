<?php

include '../koneksi.php';

$id = $_GET['id'];

$data = explode('.', $id);

$nilai = $data[2];
$wil = $data[1];
$indika = $data[0];

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

<input type="text" id="indi" value="<?= $indika; ?>" hidden>
<input type="provinsi" id="prov" value="<?= $wil; ?>" hidden>

<?php if ($nilai == 1) : ?>
    <div class="modal-content bg-primary">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-primary">
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PERINGATAN DINI DAN REKOMENDASI</h5>
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $namawil; ?></h5>
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
                            <p class="card-text"><?= $normal_a; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $normal_r; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light">PETA PROVINSI <?= $namawil; ?></button>
            <button id="akses" class="btn btn-primary" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

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
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $namawil; ?></h5>
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
                            <p class="card-text"><?= $waspada_a; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $waspada_r; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light">PETA PROVINSI <?= $namawil; ?></button>
            <button id="akses" class="btn btn-success" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

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
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#000000">PROVINSI <?= $namawil; ?></h5>
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
                            <p class="card-text"><?= $siaga_a; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $siaga_r; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light">PETA PROVINSI <?= $namawil; ?></button>
            <button id="akses" class="btn btn-warning" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

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
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $namawil; ?></h5>
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
                            <p class="card-text"><?= $awas_a; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $awas_r; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light">PETA PROVINSI <?= $namawil; ?></button>
            <button id="akses" class="btn btn-danger" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

        </div>
        </form>
    </div>
<?php endif; ?>
<!-- <script>
    $(document).ready(function() {
        $("#peta").on('click', function() {
            $("#isi").load("ambil_sulteng.php");
            $('#user_edit').modal('hide');
        });
    });
</script> -->

<script>
    $(document).ready(function() {
        $("#akses").hide();
        var indikator = $("#indi").val();
        var provinsi = $("#prov").val();
        $("#peta").on('click', function() {
            $(".loader").show();
            $("#akses").show();
            $("#peta").hide();
            if (provinsi == 72) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_sulteng.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 11) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_aceh.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 12) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_sumut.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 13) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_sumbar.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 14) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_riau.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 15) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_jambi.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 16) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_sumsel.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 17) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_bengkulu.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 18) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_lampung.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 19) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_babel.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 21) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_kepri.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 32) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_jabar.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 34) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_diy.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else if (provinsi == 35) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_jatim.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            } else {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_kosong.php",
                    data: {
                        indikator: indikator,
                        provinsi: provinsi
                    },
                    success: function(msg) {
                        $("#isi").html(msg);
                        $(".loader").hide();
                        $("#akses").hide();
                        $('#user_edit').modal('hide');
                        $("#provinsi").val(provinsi);
                        $("#indikator").val(indikator);
                    }
                });
            }

        });
    });
</script>

<script>
    $(document).ready(function() {
        var indikator = $("#indi").val();
        var provinsi = $("#prov").val();
        $("#peta").on('click', function() {
            $(".loader").show();
            $("#peta").hide();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "table_kab.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi
                },
                success: function(msg) {
                    $("#isi2").html(msg);
                    $(".loader").hide();
                    $('#user_edit').modal('hide');
                }
            });
        });
    });
</script>