
$(document).ready(function() {
    $("#indikator").on('change', function() {
        $("#isi").hide();
        $("#isi2").hide();
    });
});

// perubahan provinsi / wilayah ke map indonesia

$(document).ready(function() {
    $("#isi").load("ambil_nasional_depan.php");
    $("#isi2").load("table_map_depan.php");
    $("#provinsi").on('change', function() {
        var indikator = $("#indikator").val();
        var provinsi = $("#provinsi").val();
        $(".loader2").show();
        $(".loader").hide();
        $("#isi").hide();
        $("#isi2").hide();
        if (indikator == 1) {
            alert('Pilih Indikator Dahulu');
            return false;
        }
        if (provinsi == 99) {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_nasional.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi
                },
                success: function(msg) {
                    $("#isi").html(msg);
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 72) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 11) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 12) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 13) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 14) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 15 ){
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            }); 
        }
        else if (provinsi == 16 ){
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            }); 
        }else if (provinsi == 17 ){
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            }); 
        }
        else if (provinsi == 18){
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            }); 
        }else if (provinsi == 19 ){
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            }); 
        }else if (provinsi == 21 ){
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            }); 
        }else if (provinsi == 31) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 32) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 34) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 33) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 35) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 36) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 51) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 52) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 53) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 61) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 62) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 63) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 64) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 65) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 71) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 73) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }

        else if (provinsi == 74) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 75) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 76) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 81) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 82) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 96) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 94) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 93) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 92) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 91) {
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            });
        }
    });
});

// perubahan wilayah ke tabel wilayah

$(document).ready(function() {
    $("#provinsi").on('change', function() {
        var indikator = $("#indikator").val();
        var provinsi = $("#provinsi").val();
        $(".loader2").show();
        $("#isi2").hide();
        $("#isi").hide();
        if (indikator == 1) {
            alert('Pilih Indikator Dahulu');
            return false;
        }
        if (provinsi == 99) {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "table_map.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi
                },
                success: function(msg) {
                    $("#isi2").show();
                    $("#isi2").html(msg);
                    $(".loader2").hide();
                    $(".loader").hide();
                }
            });
        }
        if (provinsi != 99) {
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
                    $("#isi2").show();
                    $(".loader2").hide();
                    $(".loader").hide();
                }
            });
        }
    });
});


// perubahan indikator ke map 


$(document).ready(function() {
    $("#indikator").on('change', function() {
        $("#isi").hide();
        $("#isi2").hide();
        $(".loader").show();
        $(".loader2").show();
        var indikator = $("#indikator").val();
        var provinsi = $("#provinsi").val();

        if (indikator == 1) {
            alert('Pilih Indikator Dahulu');
        }
        if (provinsi == 99) {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_nasional.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi
                },
                success: function(msg) {
                    $("#isi").html(msg);
                    $(".loader").hide();
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 72) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 11) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 12) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 13) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 14) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 15) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 16) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 17 ){
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
                    $(".loader2").hide();
                    $(".loader").hide();
                    $("#isi").show();
                }
            }); 
        }
        else if (provinsi == 18) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 19) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 21) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 31) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 32) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 34) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 33) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 35) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 36) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 51) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 52) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 53) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 61) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 62) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 63) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 64) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }

        else if (provinsi == 65) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }

        else if (provinsi == 71) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }

        else if (provinsi == 73) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }

        else if (provinsi == 74) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 75) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }

        else if (provinsi == 76) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 81) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 96) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 95) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 82) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 94) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
        else if (provinsi == 93) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 92) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }else if (provinsi == 91) {
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
                    $(".loader2").hide();
                    $("#isi").show();
                }
            });
        }
    });
});

// perubahan indikator ke table semua provinsi

$(document).ready(function() {
    $("#indikator").on('change', function() {
        var indikator = $("#indikator").val();
        var provinsi = $("#provinsi").val();
        $("#isi2").hide();
        $(".loader").show();
        if (indikator == 1) {
            alert('Pilih Indikator Dahulu');
        }
        if (provinsi == 99) {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "table_map.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi
                },
                success: function(msg) {
                    $("#isi2").html(msg);
                    $(".loader").hide();
                    $(".loader2").hide();
                    $("#isi2").show();
                }
            });
        }
        if (provinsi == 1) {
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "ambil_kosong.php",
                data: {
                    indikator: indikator,
                    provinsi: provinsi
                },
                success: function(msg) {
                    $("#isi2").html(msg);
                    $(".loader").hide();
                    $(".loader2").hide();
                    $("#isi2").show();
                }
            });
        }
        if (provinsi != 99 && provinsi != 1 ) {
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
                $(".loader2").hide();
                $("#isi2").show();
              }
            });
          }

    });
});


// kiri map indonesia


$(document).ready(function() {
    $("#kiri").on('click', function() {
        var provinsi = $("#provinsi").val();
        var tahun = $("#tahun").val();
        var indikator = $("#indikator").val();
        $(".loader").show();
        $.ajax({
            type: "POST",
            dataType: "html",
            url: "ambil_map_kiri.php",
            data: {
                indikator: indikator,
                provinsi: provinsi,
                tahun: tahun
            },
            success: function(msg) {
                $("#isi").html(msg);
                $(".loader").hide();
            }
        });
    });
});


$(document).ready(function() {
    $("#kiri").on('click', function() {
        var provinsi = $("#provinsi").val();
        var tahun = $("#tahun").val();
        var indikator = $("#indikator").val();

        $.ajax({
            type: "POST",
            dataType: "html",
            url: "table_map_kiri.php",
            data: {
                indikator: indikator,
                provinsi: provinsi,
                tahun: tahun
            },
            success: function(msg) {
                $("#isi2").html(msg);

            }
        });
    });
});

// ambil map kanan

  $(document).ready(function() {
    $("#kanan").on('click', function() {
      var provinsi = $("#provinsi").val();
      var tahun = $("#tahun").val();
      var indikator = $("#indikator").val();
      $(".loader").show();
      $.ajax({
        type: "POST",
        dataType: "html",
        url: "ambil_map_kanan.php",
        data: {
          indikator: indikator,
          provinsi: provinsi,
          tahun: tahun
        },
        success: function(msg) {
          $("#isi").html(msg);
          $(".loader").hide();
        }
      });
    });
  });


  $(document).ready(function() {
    $("#kanan").on('click', function() {
      var provinsi = $("#provinsi").val();
      var tahun = $("#tahun").val();
      var indikator = $("#indikator").val();

      $.ajax({
        type: "POST",
        dataType: "html",
        url: "table_map_kanan.php",
        data: {
          indikator: indikator,
          provinsi: provinsi,
          tahun: tahun
        },
        success: function(msg) {
          $("#isi2").html(msg);

        }
      });
    });
  });

// ambil tabel kab kota ke kiri

// ambil peta




