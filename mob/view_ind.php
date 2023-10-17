<?php

include '../koneksi.php';

$kalimat = $_GET['id'];

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

$wil2 = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$wil'");
$nw = mysqli_fetch_assoc($wil2);

// echo $output;

?>

<input type="text" id="indi" value="<?= $kdi; ?>" hidden>
<input type="text" id="prov" value="<?= $wil; ?>" hidden>

<?php if ($kon == 5) : ?>
    <div class="modal-content bg-secondary">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-secondary">
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PERINGATAN DINI DAN REKOMENDASI</h5>
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $nw['nama']; ?></h5>
            </div>
            <!-- <h4 class="modal-title" style="color : white ;">PROVINSI</h4> -->
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form action="" method="post">
                <div class="card-body">
                    <div class="card">
                        <img src="" class="card-img-top">
                        <div class="card-body text-center" style="background-color:#6c757d ;">
                            <h6 class="card-title text-white" style="font-size: 2rem;"><span>Belum ada data</h6>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light">PETA PROVINSI <?= $nw['nama']; ?></button>
            <button id="akses" class="btn btn-danger" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

        </div>
        </form>
    </div>
<?php endif; ?>

<?php if ($kon == 4) : ?>
    <div class="modal-content bg-danger">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-danger">
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PERINGATAN DINI DAN REKOMENDASI</h5>
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $nw['nama']; ?></h5>
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
                            <h5 class="card-title"><span style="color:#862B0D ;"><?= strtoupper($nm['nama_indi_pilar']); ?></span> : <span class="badge bg-danger"><?= $n; ?></span></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peringatan Dini </h5>
                            <p class="card-text"><?= $nm['awas_alert']; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $nm['awas_saran']; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light">PETA PROVINSI <?= $nw['nama']; ?></button>
            <button id="akses" class="btn btn-danger" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

        </div>
        </form>
    </div>
<?php endif; ?>

<?php if ($kon == 3) : ?>
    <div class="modal-content bg-warning">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-warning">
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#000000;">PERINGATAN DINI DAN REKOMENDASI</h5>
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#000000;">PROVINSI <?= $nw['nama']; ?></h5>
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
                            <h5 class="card-title"><span style="color: #862B0D ;"><?= strtoupper($nm['nama_indi_pilar']); ?></span> : <span class="badge bg-warning text-dark"><?= $n; ?></span></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peringatan Dini </h5>
                            <p class="card-text"><?= $nm['siaga_alert']; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $nm['siaga_saran']; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light text-dark" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light text-dark">PETA PROVINSI <?= $nw['nama']; ?></button>
            <button id="akses" class="btn btn-warning" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

        </div>
        </form>
    </div>
<?php endif; ?>

<?php if ($kon  == 2) : ?>
    <div class="modal-content bg-success">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-success">
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PERINGATAN DINI DAN REKOMENDASI</h5>
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $nw['nama']; ?></h5>
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
                            <h5 class="card-title"><span style="color: #862B0D ;"><?= strtoupper($nm['nama_indi_pilar']); ?></span> : <span class="badge bg-success"><?= $n; ?></span></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peringatan Dini </h5>
                            <p class="card-text"><?= $nm['waspada_alert']; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $nm['waspada_saran']; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light">PETA PROVINSI <?= $nw['nama']; ?></button>
            <button id="akses" class="btn btn-success" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

        </div>
        </form>
    </div>
<?php endif; ?>

<?php if ($kon  == 1) : ?>
    <div class="modal-content bg-primary">
        <div class="modal-header justify-content-center">
            <div class="card-body text-center bg-primary">
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PERINGATAN DINI DAN REKOMENDASI</h5>
                <h5 class="card-title" style="font-size: 1.5rem; color
                            :#FFFFFF;">PROVINSI <?= $nw['nama']; ?></h5>
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
                            <h5 class="card-title"><span style="color: #862B0D ;"><?= strtoupper($nm['nama_indi_pilar']); ?></span> : <span class="badge bg-primary"><?= $n; ?></span></h5>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Peringatan Dini </h5>
                            <p class="card-text"><?= $nm['normal_alert']; ?></p>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Rekomendasi :</h5>
                            <p class="card-text"><?= $nm['normal_saran']; ?></p>
                        </div>
                    </div>
                </div>
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-outline-light" data-bs-dismiss="modal">Close</button>
            <button type="button" id="peta" class="btn btn-outline-light">PETA PROVINSI <?= $nw['nama']; ?></button>
            <button id="akses" class="btn btn-primary" type="button" disabled>
                <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                <span class="visually-hidden">Loading...</span>
            </button>

        </div>
        </form>
    </div>
<?php endif; ?>

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
            } else if (provinsi == 31) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_dki.php",
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
            } else if (provinsi == 33) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_jateng.php",
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
            } else if (provinsi == 36) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_banten.php",
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
            } else if (provinsi == 51) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_bali.php",
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
            } else if (provinsi == 52) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_ntb.php",
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
            } else if (provinsi == 53) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_ntt.php",
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
            } else if (provinsi == 61) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_kalbar.php",
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
            } else if (provinsi == 62) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_kalteng.php",
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
            } else if (provinsi == 63) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_kalsel.php",
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
            } else if (provinsi == 64) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_kaltim.php",
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
            } else if (provinsi == 65) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_kaltara.php",
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
            } else if (provinsi == 71) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_sulut.php",
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
            } else if (provinsi == 73) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_sulsel.php",
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
            } else if (provinsi == 74) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_sultra.php",
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
            } else if (provinsi == 75) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_gorontalo.php",
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
            } else if (provinsi == 76) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_sulbar.php",
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
            } else if (provinsi == 81) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_maluku.php",
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
            } else if (provinsi == 82) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_malut.php",
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
            } else if (provinsi == 96) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_papuabd.php",
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
            } else if (provinsi == 95) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_papuagun.php",
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
            } else if (provinsi == 94) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_papuateng.php",
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
            } else if (provinsi == 93) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_papuasel.php",
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
            } else if (provinsi == 92) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_papuabarat.php",
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
            } else if (provinsi == 91) {
                $.ajax({
                    type: "POST",
                    dataType: "html",
                    url: "ambil_papua.php",
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
                    $('#peta_modal').modal('hide');
                }
            });
        });
    });
</script>