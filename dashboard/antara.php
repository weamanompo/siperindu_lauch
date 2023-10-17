<?php

$id = $_GET['id'];

$kdwil = substr($id, 0, 2);

$kd_indi = substr($id, 2, 2);


?>

<input type="text" id="pr" value="<?= $kdwil; ?>">
<input type="text" id="in" value="<?= $kd_indi; ?>">

<script>
    $(document).ready(function() {
        $('.hover').hide();
        var provinsi = $("#pr").val();
        var indikator = $("#in").val();
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
                $("#isi").show();
                $("#provinsi").val(provinsi);
                $("#indikator").val(indikator);


            }
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