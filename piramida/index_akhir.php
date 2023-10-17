<?php

include '../koneksi.php';

$tglref = date('Y-m-d');

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>GALERI- SIPERINDU</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link href="../assets/img/favicon.png" rel="icon">
    <link href="../assets/img/apple-touch-icon.png" rel="apple-touch-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="../assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="../assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
    <link href="../assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="../assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <!-- Template Main CSS File -->
    <link href="../assets/css/style.css" rel="stylesheet">

</head>
<style>
    #chart {
        max-width: 650px;
        margin: 35px auto;
    }
</style>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top header-inner-pages">
        <div class="container d-flex align-items-center justify-content-lg-between">

            <!-- <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1> -->
            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="../index.php" class="logo me-auto me-lg-0"><img src="../assets/img/logo_ban.png" alt="" class="img-fluid"></a>

            <?php $jml = mysqli_query($koneksi, "SELECT * FROM agenda WHERE tanggal >= '$tglref' ");

            $jmlh = mysqli_num_rows($jml);

            ?>
            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="nav-link scrollto " href="../index.php">Home</a></li>
                    <li><a class="nav-link scrollto" href="../profil">Profil</a></li>
                    <li><a class="nav-link scrollto" href="../dashboard">Dashboard</a></li>
                    <?php if ($jmlh != 0) : ?>
                        <li><a class="nav-link scrollto " href="../orientasi">Fasilitasi&nbsp;<span class="badge bg-danger"><?= $jmlh; ?> New</span></a></li>
                    <?php endif; ?>
                    <?php if ($jmlh == 0) : ?>
                        <li><a class="nav-link scrollto " href="../orientasi">Fasilitasi&nbsp;</a></li>
                    <?php endif; ?>
                    <li><a class="nav-link scrollto" href="../data">Tabel Dinamis</a></li>
                    <li><a class="nav-link scrollto" href="#piramida">Piramida Penduduk</a></li>
                    <li><a class="nav-link scrollto" href="../testimoni">Testimoni</a></li>
                    <li class="dropdown"><a href="#portfolio"><span>Galeri</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="../galeri">Aktivitas</a></li>
                            <li class="dropdown"><a href="#portfolio"><span>K I E</span> <i class="bi bi-chevron-down"></i></a>
                                <ul>
                                    <li><a href="../kie">Foto</a></li>
                                    <li><a href="../video">Video</a></li>
                                </ul>
                            </li>
                            <li><a href="../download">Artikel</a></li>
                        </ul>
                    </li>
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>

            </nav><!-- .navbar -->

            <a href="http://siperindu.online/2023/pb/login" target="_blank" class="get-started-btn scrollto">LOGIN</a>
        </div>
    </header><!-- End Header -->
    <main id="main">
        <!-- ======= Portfolio Section ======= -->

        <section id="piramida" class="portfolio mt-4">
            <div class="container mt-4" data-aos="fade-up">
                <div class="section-title mt-4">
                    <h2 class="mt-4 mb-3">Piramida Penduduk</h2>
                    <div id="chart">
                    </div>
                </div>
                <div class="row" data-aos="fade-up" data-aos-delay="100">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <ul id="portfolio-flters">

                        </ul>
                    </div>
                </div>
                <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">

                </div>
            </div>
        </section><!-- End Portfolio Section -->
    </main><!-- End #main -->
    <script>
        var options = {
            series: [{
                    name: 'Laki-laki',
                    data: [
                        <?php

                        $pddk21 = mysqli_query($koneksi, "SELECT l1, l2, l3, l4, l5, l6, l7, l8,l9, l10, l11, l12, l13, l14, l15, l16, l17  FROM piramida WHERE kd_wilayah = '31' AND tahun = '2020'");

                        $pddk2 = mysqli_fetch_assoc($pddk21);

                        $besar = max($pddk2);


                        $totalharga = ceil($besar);
                        if (substr($totalharga, -3) > 499) {
                            $total_harga = round($totalharga, -3);
                        } else {
                            $total_harga = round($totalharga, -3) + 1000;
                        }

                        $besarl =  $total_harga;

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

                        $pddk1 = mysqli_query($koneksi, "SELECT * FROM piramida WHERE kd_wilayah = '31' AND tahun = '2020'");

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

                        ?>
                    ]
                }

            ],

            chart: {
                type: 'bar',
                height: 440,
                stacked: true
            },

            fill: {
                colors: [function({
                    value,
                    seriesIndex,
                    w
                }) {
                    if (value == <?= $p1; ?>) {
                        return '#7E36AF'
                    } else if (value == <?= $la1; ?>) {
                        return '#f25c12'
                    } else {
                        return '#D9534F'
                    }
                }]
            },

            plotOptions: {
                bar: {
                    horizontal: true,
                    barHeight: '95%',
                },
            },


            legend: {
                show: false
            },

            dataLabels: {
                enabled: false
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
                text: 'Piramida Penduduk Jawa Barat Tahun 2011',
                align: 'center'
            },
            xaxis: {
                categories: ['80+', '75-79', '70-74', '65-69', '60-64', '55-59', '50-54',
                    '45-49', '40-44', '35-39', '30-34', '25-29', '20-24', '15-19', '10-14', '5-9',
                    '0-4'
                ],


                title: {
                    text: 'Jumlah Jiwa'
                },
                labels: {
                    formatter: function(val) {
                        return (Math.abs(val).toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1.'))
                    }
                }
            },
        };

        var chart = new ApexCharts(document.querySelector("#chart"), options);
        chart.render();
    </script>
    <!-- ======= Footer ======= -->
    <!-- <footer id="footer">
    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span></span></strong> BKKBN
      </div>
      <div class="credits">
        
        Designed by <a href="">WAM</a>
      </div>
    </div>
  </footer> -->
    <!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="../assets/vendor/purecounter/purecounter_vanilla.js"></script>
    <script src="../assets/vendor/aos/aos.js"></script>
    <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
    <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="../assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
    <script src="../assets/js/script.js"></script>

    <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>



</body>

</html>