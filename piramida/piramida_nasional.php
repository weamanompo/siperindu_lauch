<?php
include '../koneksi.php';

$tglref = date('Y-m-d');

$kdwil = '1';

$tgl = date('Y');

$cek = mysqli_query($koneksi, "SELECT * FROM piramida WHERE kd_wilayah = '$kdwil'");

$acek = mysqli_num_rows($cek);

?>
<?php if ($acek == 0) : ?>
    <div class="alert alert-danger text-center" role="alert">
        MAAF DATA BELUM TERSEDIA
    </div>
<?php endif; ?>
<input type="text" id="tahun" value="<?= $tgl; ?>" hidden ?>
<h5 class="card-title text-center mt-1">
    <img style="cursor:pointer" src="../assets/img/kiri.png" width="2%" id="kiri_peta">&nbsp;&nbsp;
    PIRAMIDA PENDUDUK NASIONAL&nbsp;&nbsp;<img style="cursor:pointer" src="../assets/img/kanan.png" width="2.5%" id="kanan_peta">
</h5>
<div id="chart">
</div>
<script>
    var options = {
        series: [{
                name: 'Laki-laki',
                data: [
                    <?php

                    $pddk21 = mysqli_query($koneksi, "SELECT *  FROM piramida WHERE kd_wilayah = '$kdwil' AND tahun = '$tgl'");

                    $pddk2 = mysqli_fetch_assoc($pddk21);


                    $la17 = -$pddk2['l17'];
                    $la16 = -$pddk2['l16'];
                    $la15 = -$pddk2['l15'];
                    $la14 = -$pddk2['l14'];
                    $la13 = -$pddk2['l13'];
                    $la12 = -$pddk2['l12'];
                    $la11 = -$pddk2['l11'];
                    $la10 = -$pddk2['l10'];
                    $la9 = -$pddk2['l9'];
                    $la8 = -$pddk2['l8'];
                    $la7 = -$pddk2['l7'];
                    $la6 = -$pddk2['l6'];
                    $la5 = -$pddk2['l5'];
                    $la4 = -$pddk2['l4'];
                    $la3 = -$pddk2['l3'];
                    $la2 = -$pddk2['l2'];
                    $la1 = -$pddk2['l1'];

                    $l1 = $pddk2['l1'];
                    $l2 = $pddk2['l2'];
                    $l3 = $pddk2['l3'];
                    $l4 = $pddk2['l4'];
                    $l5 = $pddk2['l5'];
                    $l6 = $pddk2['l6'];
                    $l7 = $pddk2['l7'];
                    $l8 = $pddk2['l8'];
                    $l9 = $pddk2['l9'];
                    $l10 = $pddk2['l10'];
                    $l11 = $pddk2['l11'];
                    $l12 = $pddk2['l12'];
                    $l13 = $pddk2['l13'];
                    $l14 = $pddk2['l14'];
                    $l15 = $pddk2['l15'];
                    $l16 = $pddk2['l16'];
                    $l17 = $pddk2['l17'];

                    echo "$la17, ";
                    echo "$la16, ";
                    echo "$la15, ";
                    echo "$la14, ";
                    echo "$la13, ";
                    echo "$la12, ";
                    echo "$la11, ";
                    echo "$la10, ";
                    echo "$la9, ";
                    echo "$la8, ";
                    echo "$la7, ";
                    echo "$la6, ";
                    echo "$la5, ";
                    echo "$la4, ";
                    echo "$la3, ";
                    echo "$la2, ";
                    echo "$la1
                         ";


                    ?>
                ]
            },
            {
                name: 'Perempuan',
                data: [

                    <?php

                    $pddk1 = mysqli_query($koneksi, "SELECT * FROM piramida WHERE kd_wilayah = '$kdwil' AND tahun = '$tgl'");

                    $pddk2 = mysqli_fetch_assoc($pddk1);

                    $p17 = $pddk2['p17'];
                    $p16 = $pddk2['p16'];
                    $p15 = $pddk2['p15'];
                    $p14 = $pddk2['p14'];
                    $p13 = $pddk2['p13'];
                    $p12 = $pddk2['p12'];
                    $p11 = $pddk2['p11'];
                    $p10 = $pddk2['p10'];
                    $p9 = $pddk2['p9'];
                    $p8 = $pddk2['p8'];
                    $p7 = $pddk2['p7'];
                    $p6 = $pddk2['p6'];
                    $p5 = $pddk2['p5'];
                    $p4 = $pddk2['p4'];
                    $p3 = $pddk2['p3'];
                    $p2 = $pddk2['p2'];
                    $p1 = $pddk2['p1'];

                    echo "$p17, ";
                    echo "$p16, ";
                    echo "$p15, ";
                    echo "$p14, ";
                    echo "$p13, ";
                    echo "$p12, ";
                    echo "$p11, ";
                    echo "$p10, ";
                    echo "$p9, ";
                    echo "$p8, ";
                    echo "$p7, ";
                    echo "$p6, ";
                    echo "$p5, ";
                    echo "$p4, ";
                    echo "$p3, ";
                    echo "$p2, ";
                    echo "$p1, ";

                    // 0 - 14

                    $bgl1 = '';
                    $bgp1 = '';

                    if ($l1 > $p1) {
                        $bgl1 = '#61677A';
                        $bgp1 = '#9E9FA5';
                    } else {
                        $bgp1 = '#61677A';
                        $bgl1 = '#9E9FA5';
                    }

                    $bgl2 = '';
                    $bgp2 = '';

                    if ($l2 > $p2) {
                        $bgl2 = '#61677A';
                        $bgp2 = '#9E9FA5';
                    } else {
                        $bgp2 = '#61677A';
                        $bgl2 = '#9E9FA5';
                    }

                    $bgl3 = '';
                    $bgp3 = '';

                    if ($l3 > $p3) {
                        $bgl3 = '#61677A';
                        $bgp3 = '#9E9FA5';
                    } else {
                        $bgp3 = '#61677A';
                        $bgl3 = '#9E9FA5';
                    }

                    $bgl13 = '';
                    $bgp13 = '';

                    if ($l13 > $p13) {
                        $bgl13 = '#61677A';
                        $bgp13 = '#9E9FA5';
                    } else {
                        $bgp13 = '#61677A';
                        $bgl13 = '#9E9FA5';
                    }

                    $bgl14 = '';
                    $bgp14 = '';

                    if ($l14 > $p14) {
                        $bgl14 = '#61677A';
                        $bgp14 = '#9E9FA5';
                    } else {
                        $bgp14 = '#61677A';
                        $bgl14 = '#9E9FA5';
                    }

                    $bgl15 = '';
                    $bgp15 = '';

                    if ($l15 > $p15) {
                        $bgl15 = '#61677A';
                        $bgp15 = '#9E9FA5';
                    } else {
                        $bgp15 = '#61677A';
                        $bgl15 = '#9E9FA5';
                    }

                    $bgl16 = '';
                    $bgp16 = '';

                    if ($l16 > $p16) {
                        $bgl16 = '#61677A';
                        $bgp16 = '#9E9FA5';
                    } else {
                        $bgp16 = '#61677A';
                        $bgl16 = '#9E9FA5';
                    }

                    $bgl17 = '';
                    $bgp17 = '';

                    if ($l17 > $p17) {
                        $bgl17 = '#61677A';
                        $bgp17 = '#9E9FA5';
                    } else {
                        $bgp17 = '#61677A';
                        $bgl17 = '#9E9FA5';
                    }

                    $totalp = $p1 + $p2 + $p3 + $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10 + $p11 + $p12 + $p13 + $p14 + $p15 + $p16 + $p17;

                    $totall = $l1 + $l2 + $l3 + $l4 + $l5 + $l6 + $l7 + $l8 + $l9 + $l10 + $l11 + $l12 + $l13 + $l14 + $l15 + $l16 + $l17;

                    $prodp = $p4 + $p5 + $p6 + $p7 + $p8 + $p9 + $p10 + $p11 + $p12;
                    $prodl = $l4 + $l5 + $l6 + $l7 + $l8 + $l9 + $l10 + $l11 + $l12;

                    $ref = ($prodp + $prodl)  / ($totalp + $totall);
                    // $ref = 0.4;

                    // BEnchmark Produktif 

                    // normal

                    //  usia kel 4 15 -19

                    $bgl4 = '';
                    $bgp4 = '';

                    if ($ref >= 0.6 && $l4 > $p4) {
                        $bgl4 = '#0d6efd';
                        $bgp4 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l4 < $p4) {
                        $bgl4 = '#5091f0';
                        $bgp4 = '#0d6efd';
                    }

                    // 20-24

                    $bgl5 = '';
                    $bgp5 = '';

                    if ($ref >= 0.6 && $l5 > $p5) {
                        $bgl5 = '#0d6efd';
                        $bgp5 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l5 < $p5) {
                        $bgl5 = '#5091f0';
                        $bgp5 = '#0d6efd';
                    }

                    // 25 - 29

                    $bgl6 = '';
                    $bgp6 = '';

                    if ($ref >= 0.6 && $l6 > $p6) {
                        $bgl6 = '#0d6efd';
                        $bgp6 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l6 < $p6) {
                        $bgl6 = '#5091f0';
                        $bgp6 = '#0d6efd';
                    }

                    // 30 -34

                    $bgl7 = '';
                    $bgp7 = '';

                    if ($ref >= 0.6 && $l7 > $p7) {
                        $bgl7 = '#0d6efd';
                        $bgp7 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l7 < $p7) {
                        $bgl7 = '#5091f0';
                        $bgp7 = '#0d6efd';
                    }

                    //  35 - 40

                    $bgl8 = '';
                    $bgp8 = '';

                    if ($ref >= 0.6 && $l8 > $p8) {
                        $bgl8 = '#0d6efd';
                        $bgp8 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l8 < $p8) {
                        $bgl8 = '#5091f0';
                        $bgp8 = '#0d6efd';
                    }

                    // 44 - 45

                    $bgl9 = '';
                    $bgp9 = '';

                    if ($ref >= 0.6 && $l9 > $p9) {
                        $bgl9 = '#0d6efd';
                        $bgp9 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l9 < $p9) {
                        $bgl9 = '#5091f0';
                        $bgp9 = '#0d6efd';
                    }


                    //  45 - 50

                    $bgl10 = '';
                    $bgp10 = '';

                    if ($ref >= 0.6 && $l10 > $p10) {
                        $bgl10 = '#0d6efd';
                        $bgp10 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l10 < $p10) {
                        $bgl10 = '#5091f0';
                        $bgp10 = '#0d6efd';
                    }

                    //  50 -54

                    $bgl11 = '';
                    $bgp11 = '';

                    if ($ref >= 0.6 && $l11 > $p11) {
                        $bgl11 = '#0d6efd';
                        $bgp11 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l11 < $p11) {
                        $bgl11 = '#5091f0';
                        $bgp11 = '#0d6efd';
                    }

                    //  54 -59

                    $bgl12 = '';
                    $bgp12 = '';

                    if ($ref >= 0.6 && $l12 > $p12) {
                        $bgl12 = '#0d6efd';
                        $bgp12 = '#5091f0';
                    }
                    if ($ref >= 0.6 && $l12 < $p12) {
                        $bgl12 = '#5091f0';
                        $bgp12 = '#0d6efd';
                    }


                    //  Waspada

                    //  usia kel 4 15 -19

                    if ($ref >= 0.55 && $ref < 0.6 && $l4 > $p4) {
                        $bgl4 = '#198754';
                        $bgp4 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l4 < $p4) {
                        $bgl4 = '#669981';
                        $bgp4 = '#198754';
                    }

                    // 20-24

                    if ($ref >= 0.55 && $ref < 0.6 && $l5 > $p5) {
                        $bgl5 = '#198754';
                        $bgp5 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l5 < $p5) {
                        $bgl5 = '#669981';
                        $bgp5 = '#198754';
                    }

                    // 25 - 29

                    if ($ref >= 0.55 && $ref < 0.6 && $l6 > $p6) {
                        $bgl6 = '#198754';
                        $bgp6 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l6 < $p6) {
                        $bgl6 = '#669981';
                        $bgp6 = '#198754';
                    }

                    // 30 -34

                    if ($ref >= 0.55 && $ref < 0.6 && $l7 > $p7) {
                        $bgl7 = '#198754';
                        $bgp7 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l7 < $p7) {
                        $bgl7 = '#669981';
                        $bgp7 = '#198754';
                    }

                    //  35 - 40

                    if ($ref >= 0.55 && $ref < 0.6 && $l8 > $p8) {
                        $bgl8 = '#198754';
                        $bgp8 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l8 < $p8) {
                        $bgl8 = '#669981';
                        $bgp8 = '#198754';
                    }

                    // 44 - 45

                    if ($ref >= 0.55 && $ref < 0.6 && $l9 > $p9) {
                        $bgl9 = '#198754';
                        $bgp9 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l9 < $p9) {
                        $bgl9 = '#669981';
                        $bgp9 = '#198754';
                    }


                    //  45 - 50


                    if ($ref >= 0.55 && $ref < 0.6 && $l10 > $p10) {
                        $bgl10 = '#198754';
                        $bgp10 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l10 < $p10) {
                        $bgl10 = '#669981';
                        $bgp10 = '#198754';
                    }

                    //  50 -54

                    if ($ref >= 0.55 && $ref < 0.6 && $l11 > $p11) {
                        $bgl11 = '#198754';
                        $bgp11 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l11 < $p11) {
                        $bgl11 = '#669981';
                        $bgp11 = '#198754';
                    }

                    //  54 -59

                    if ($ref >= 0.55 && $ref < 0.6 && $l12 > $p12) {
                        $bgl12 = '#198754';
                        $bgp12 = '#669981';
                    }
                    if ($ref >= 0.55 && $ref < 0.6 && $l12 < $p12) {
                        $bgl12 = '#669981';
                        $bgp12 = '#198754';
                    }

                    // siaga

                    //  usia kel 4 15 -19

                    if ($ref >= 0.5 && $ref < 0.55 && $l4 > $p4) {
                        $bgl4 = '#f7b900';
                        $bgp4 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l4 < $p4) {
                        $bgl4 = '#ebc861';
                        $bgp4 = '#f7b900';
                    }

                    // 20-24

                    if ($ref >= 0.5 && $ref < 0.55 && $l5 > $p5) {
                        $bgl5 = '#f7b900';
                        $bgp5 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l5 < $p5) {
                        $bgl5 = '#ebc861';
                        $bgp5 = '#f7b900';
                    }

                    // 25 - 29

                    if ($ref >= 0.5 && $ref < 0.55 && $l6 > $p6) {
                        $bgl6 = '#f7b900';
                        $bgp6 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l6 < $p6) {
                        $bgl6 = '#ebc861';
                        $bgp6 = '#f7b900';
                    }

                    // 30 -34

                    if ($ref >= 0.5 && $ref < 0.55 && $l7 > $p7) {
                        $bgl7 = '#f7b900';
                        $bgp7 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l7 < $p7) {
                        $bgl7 = '#ebc861';
                        $bgp7 = '#f7b900';
                    }

                    //  35 - 40

                    if ($ref >= 0.5 && $ref < 0.55 && $l8 > $p8) {
                        $bgl8 = '#f7b900';
                        $bgp8 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l8 < $p8) {
                        $bgl8 = '#ebc861';
                        $bgp8 = '#f7b900';
                    }

                    // 44 - 45

                    if ($ref >= 0.5 && $ref < 0.55 && $l9 > $p9) {
                        $bgl9 = '#f7b900';
                        $bgp9 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l9 < $p9) {
                        $bgl9 = '#ebc861';
                        $bgp9 = '#f7b900';
                    }


                    //  45 - 50


                    if ($ref >= 0.5 && $ref < 0.55 && $l10 > $p10) {
                        $bgl10 = '#f7b900';
                        $bgp10 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l10 < $p10) {
                        $bgl10 = '#ebc861';
                        $bgp10 = '#f7b900';
                    }

                    //  50 -54

                    if ($ref >= 0.5 && $ref < 0.55 && $l11 > $p11) {
                        $bgl11 = '#f7b900';
                        $bgp11 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l11 < $p11) {
                        $bgl11 = '#ebc861';
                        $bgp11 = '#f7b900';
                    }

                    //  54 -59

                    if ($ref >= 0.5 && $ref < 0.55 && $l12 > $p12) {
                        $bgl12 = '#f7b900';
                        $bgp12 = '#ebc861';
                    }
                    if ($ref >= 0.5 && $ref < 0.55 && $l12 < $p12) {
                        $bgl12 = '#ebc861';
                        $bgp12 = '#f7b900';
                    }


                    // awas

                    //  usia kel 4 15 -19


                    if ($ref < 0.5 && $l4 > $p4) {
                        $bgl4 = '#ff0018';
                        $bgp4 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l4 < $p4) {
                        $bgl4 = '#f1808a';
                        $bgp4 = '#ff0018';
                    }

                    // 20-24

                    if ($ref < 0.5 && $l5 > $p5) {
                        $bgl5 = '#ff0018';
                        $bgp5 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l5 < $p5) {
                        $bgl5 = '#f1808a';
                        $bgp5 = '#ff0018';
                    }

                    // 25 - 29

                    if ($ref < 0.5 && $l6 > $p6) {
                        $bgl6 = '#ff0018';
                        $bgp6 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l6 < $p6) {
                        $bgl6 = '#f1808a';
                        $bgp6 = '#ff0018';
                    }

                    // 30 -34

                    if ($ref < 0.5 && $l7 > $p7) {
                        $bgl7 = '#ff0018';
                        $bgp7 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l7 < $p7) {
                        $bgl7 = '#f1808a';
                        $bgp7 = '#ff0018';
                    }

                    //  35 - 40

                    if ($ref < 0.5 && $l8 > $p8) {
                        $bgl8 = '#ff0018';
                        $bgp8 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l8 < $p8) {
                        $bgl8 = '#f1808a';
                        $bgp8 = '#ff0018';
                    }

                    // 44 - 45

                    if ($ref < 0.5 && $l9 > $p9) {
                        $bgl9 = '#ff0018';
                        $bgp9 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l9 < $p9) {
                        $bgl9 = '#f1808a';
                        $bgp9 = '#ff0018';
                    }


                    //  45 - 50

                    if ($ref < 0.5 && $l10 > $p10) {
                        $bgl10 = '#ff0018';
                        $bgp10 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l10 < $p10) {
                        $bgl10 = '#f1808a';
                        $bgp10 = '#ff0018';
                    }

                    //  50 -54

                    if ($ref < 0.5 && $l11 > $p11) {
                        $bgl11 = '#ff0018';
                        $bgp11 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l11 < $p11) {
                        $bgl11 = '#f1808a';
                        $bgp11 = '#ff0018';
                    }

                    //  54 -59

                    if ($ref < 0.5 && $l12 > $p12) {
                        $bgl12 = '#ff0018';
                        $bgp12 = '#f1808a';
                    }
                    if ($ref < 0.5 && $l12 < $p12) {
                        $bgl12 = '#f1808a';
                        $bgp12 = '#ff0018';
                    }

                    ?>
                ]
            }

        ],

        chart: {
            type: 'bar',
            height: 440,
            stacked: true,
            animations: {
                enabled: true,
                easing: 'linear',
                speed: 800,
                animateGradually: {
                    enabled: false,
                    delay: 10
                },
                dynamicAnimation: {
                    enabled: false,
                    speed: 350
                }
            },
            toolbar: {
                show: true,
                offsetX: 0,
                offsetY: 0,
                tools: {
                    download: false,
                    selection: true,
                    zoom: true,
                    zoomin: true,
                    zoomout: true,
                    pan: true,
                    reset: true | '<img src="/static/icons/reset.png" width="20">',
                    customIcons: []
                },
                export: {
                    csv: {
                        filename: undefined,
                        columnDelimiter: ',',
                        headerCategory: 'category',
                        headerValue: 'value',
                        dateFormatter(timestamp) {
                            return new Date(timestamp).toDateString()
                        }
                    },
                    svg: {
                        filename: undefined,
                    },
                    png: {
                        filename: undefined,
                    }
                },
                autoSelected: 'zoom'
            },

        },


        plotOptions: {
            bar: {
                horizontal: true,
                barHeight: '120%',
            },
        },


        legend: {
            show: false,
            showForSingleSeries: false,
            showForNullSeries: true,
            showForZeroSeries: true,
            position: 'bottom',
            horizontalAlign: 'center',
            floating: false,
            fontSize: '14px',
            fontFamily: 'Helvetica, Arial',
            fontWeight: 400,
            formatter: undefined,
            inverseOrder: false,
            width: undefined,
            height: undefined,
            tooltipHoverFormatter: undefined,
            customLegendItems: [],
            offsetX: 0,
            offsetY: 0,
            labels: {
                colors: undefined,
                useSeriesColors: true
            },
            markers: {
                width: 12,
                height: 12,
                strokeWidth: 0,
                strokeColor: '#fff',
                fillColors: undefined,
                radius: 12,
                customHTML: undefined,
                onClick: undefined,
                offsetX: 0,
                offsetY: 0
            },
            itemMargin: {
                horizontal: 5,
                vertical: 0
            },
            onItemClick: {
                toggleDataSeries: false
            },
            onItemHover: {
                highlightDataSeries: false
            },
        },

        dataLabels: {
            formatter: function(val) {
                return (Math.abs(val).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'))
            },
            // enabled: false

            style: {
                fontSize: '9px',
                fontFamily: 'Helvetica, Arial, sans-serif',
                //   fontWeight: 'bold',

            },
        },
        stroke: {
            width: 1,
            colors: ["#fff"]
        },

        grid: {
            xaxis: {
                lines: {
                    show: false
                }
            }
        },
        yaxis: {
            // min: ,
            // max: ,
            title: {
                text: 'Kelompk Umur',
            },
        },
        tooltip: {
            shared: false,
            x: {
                formatter: function(val) {
                    return ' Kelompok Umur : ' + val + ' tahun '
                }
            },
            y: {
                formatter: function(val) {
                    return (Math.abs(val).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.')) + ' jiwa'
                }
            }
        },
        title: {
            text: 'TAHUN : <?= $tgl; ?>',
            align: 'center'
        },
        xaxis: {
            categories: ['80+', '75-79', '70-74', '65-69', '60-64', '55-59', '50-54',
                '45-49', '40-44', '35-39', '30-34', '25-29', '20-24', '15-19', '10-14', '5-9',
                '0-4'
            ],


            title: {
                margin: 20,
                text: ['LAKI-LAKI - PEREMPUAN', ' ', 'Sumber :  Proyeksi SP2020 - BPS'],
                align: 'center'
            },

            labels: {
                formatter: function(val) {
                    return (Math.abs(val).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'))
                }
            }
        },

        fill: {
            colors: [function({
                value,
                xaxis,
                w
            }) {
                if (value == <?= $la1; ?>) {
                    return '<?= $bgl1; ?>'
                } else if (value == <?= $p1; ?>) {
                    return '<?= $bgp1; ?>'
                } else if (value == <?= $la2; ?>) {
                    return '<?= $bgl2; ?>'
                } else if (value == <?= $p2; ?>) {
                    return '<?= $bgp2; ?>'
                } else if (value == <?= $p3; ?>) {
                    return '<?= $bgp3; ?>'
                } else if (value == <?= $la3; ?>) {
                    return '<?= $bgl3; ?>'
                } else if (value == <?= $p4; ?>) {
                    return '<?= $bgp4; ?>'
                } else if (value == <?= $la4; ?>) {
                    return '<?= $bgl4; ?>'
                } else if (value == <?= $p5; ?>) {
                    return '<?= $bgp5; ?>'
                } else if (value == <?= $la5; ?>) {
                    return '<?= $bgl5; ?>'
                } else if (value == <?= $p6; ?>) {
                    return '<?= $bgp6; ?>'
                } else if (value == <?= $la6; ?>) {
                    return '<?= $bgl6; ?>'
                } else if (value == <?= $p7; ?>) {
                    return '<?= $bgp7; ?>'
                } else if (value == <?= $la7; ?>) {
                    return '<?= $bgl7; ?>'
                } else if (value == <?= $p8; ?>) {
                    return '<?= $bgp8; ?>'
                } else if (value == <?= $la8; ?>) {
                    return '<?= $bgl8; ?>'
                } else if (value == <?= $p9; ?>) {
                    return '<?= $bgp9; ?>'
                } else if (value == <?= $la9; ?>) {
                    return '<?= $bgl9; ?>'
                } else if (value == <?= $p10; ?>) {
                    return '<?= $bgp10; ?>'
                } else if (value == <?= $la10; ?>) {
                    return '<?= $bgl10; ?>'
                } else if (value == <?= $p11; ?>) {
                    return '<?= $bgp11; ?>'
                } else if (value == <?= $la11; ?>) {
                    return '<?= $bgl11; ?>'
                } else if (value == <?= $p12; ?>) {
                    return '<?= $bgp12; ?>'
                } else if (value == <?= $la12; ?>) {
                    return '<?= $bgl12; ?>'
                } else if (value == <?= $la13; ?>) {
                    return '<?= $bgl13; ?>'
                } else if (value == <?= $p13; ?>) {
                    return '<?= $bgp13; ?>'
                } else if (value == <?= $la14; ?>) {
                    return '<?= $bgl14; ?>'
                } else if (value == <?= $p14; ?>) {
                    return '<?= $bgp14; ?>'
                } else if (value == <?= $la15; ?>) {
                    return '<?= $bgl15; ?>'
                } else if (value == <?= $p15; ?>) {
                    return '<?= $bgp15; ?>'
                } else if (value == <?= $la16; ?>) {
                    return '<?= $bgl16; ?>'
                } else if (value == <?= $p16; ?>) {
                    return '<?= $bgp16; ?>'
                } else if (value == <?= $la17; ?>) {
                    return '<?= $bgl17; ?>'
                } else if (value == <?= $p17; ?>) {
                    return '<?= $bgp17; ?>'
                } else {
                    return '#1f5325'
                }
            }]
        },
    };

    var chart = new ApexCharts(document.querySelector("#chart"), options);
    chart.render();
</script>
<script>
    $(document).ready(function() {
        $("#kiri_peta").on('click', function() {
            var tahun = $("#tahun").val();

            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "piramida_nasional_kiri.php",
                data: {
                    tahun: tahun,
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
<script>
    $(document).ready(function() {
        $("#kanan_peta").on('click', function() {
            var tahun = $("#tahun").val();
            $(".loader").show();
            $.ajax({
                type: "POST",
                dataType: "html",
                url: "piramida_nasional_kanan.php",
                data: {
                    tahun: tahun,
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