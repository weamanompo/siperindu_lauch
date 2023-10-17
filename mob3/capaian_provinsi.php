<?php


function capaian_prov($n, $kd_indi)

{

    //  1 ASFR

    if ($kd_indi == 10) {

        if ($n > 0 && $n < 18) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (18 <= $n && $n < 30) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (30 <= $n && $n < 40) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif (40 <= $n) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }



    // 2 Harapan Hidup

    if ($kd_indi == 17) {

        if ($n > 75) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (70 < $n && $n <= 75) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (65 < $n && $n <= 70) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n <=  65) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {
            echo '<span class="" style="color: #ffffff;">';
        }
    }


    // 3 tfr

    if ($kd_indi == 9) {

        if ($n >= 2 && $n <= 2.19) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (2.2 <= $n && $n <= 2.39) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (1.8 <= $n && $n <= 1.99) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (2.4 < $n && $n <= 2.69) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 && $n <= 1.8) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 2.7) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {
            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 4 unmet need

    if ($kd_indi == 14) {

        if ($n > 0 && $n < 7.5) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (7.5 <= $n && $n < 10) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (10 <= $n && $n < 15) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >=  15) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {
            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 5 cpr modern

    if ($kd_indi == 12) {

        if ($n > 60) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (50 < $n && $n <= 60) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (40 <= $n && $n <= 50) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 && $n < 40) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {
            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 6 rasio jenis kelamin

    if ($kd_indi == 6) {

        if ($n == 100) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (100 < $n && $n <= 105) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (95 < $n && $n <= 100) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (105 < $n && $n <= 110) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif (90 < $n && $n <= 95) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n <= 90 && $n != 0) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } elseif ($n > 110 && $n != 0) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        }
         else {
            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 7 Angka kematian bayi

    if ($kd_indi == 19) {

        if ($n > 0 && $n < 16) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (16 <= $n && $n < 30) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (30 <= $n && $n < 40) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif (40 <= $n) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {
            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 8 rasio ketergantungan

    if ($kd_indi == 7) {

        if ($n > 0 &&  $n < 50) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (50 <= $n && $n < 55) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (55 <= $n && $n < 60) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 60) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 9 Laju pertumbuhan Penduduk 

    if ($kd_indi == 5) {

        if ($n > 0 &&  $n < 1) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (1 <= $n && $n < 1.5) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (1.5 <= $n && $n < 2) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 2) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 10 mkjp

    if ($kd_indi == 13) {

        if ($n > 29) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (25 <= $n && $n < 29) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (20 <= $n && $n < 25) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 &&  $n < 20) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    //  11  Jumlah Penduduk

    // 12 indeks pembangunan gender

    if ($kd_indi == 30) {

        if ($n >= 91.39) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (90 <= $n && $n < 91.39) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (80 <= $n && $n < 90) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 &&  $n < 80) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 13  Indeks pemberdayaan gender
    if ($kd_indi == 31) {

        if ($n >= 74.18) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (70 <= $n && $n < 74.18) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (60 <= $n && $n < 70) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 &&  $n < 60) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 14 Persentase Penduduk Miskin Ekstrem (ME)

    if ($kd_indi == 36) {

        if ($n == 0) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (0 < $n && $n <= 2) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (2 < $n && $n < 5) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 5) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 15 Persentase Penduduk Miskin 

    if ($kd_indi == 35) {

        if ($n > 0 && $n < 7) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (7 < $n && $n <= 9.6) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (9.6 < $n && $n < 12) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 12) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 16 Perempuan dalam parlemen

    if ($kd_indi == 32) {

        if ($n > 30) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (20 < $n && $n <= 30) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (10 < $n && $n <= 20) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n <= 10) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 17 Capaian akta kelahiran

    if ($kd_indi == 42) {

        if ($n == 100) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (80 <= $n && $n < 100) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (60 <= $n && $n < 80) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 && $n < 60) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 18 rata rata lama sekolah

    if ($kd_indi == 26) {

        if ($n >= 9) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (7.5 <= $n && $n < 9) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (6 <= $n && $n < 7.5) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 && $n < 6) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 19 Tingkat Pengangguran terbuka

    if ($kd_indi == 28) {

        if ($n > 0 && $n <= 4.3) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (4.3 < $n && $n <= 6.5) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (6.5 < $n && $n < 8.5) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 8.5) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 20 Angka kematian Ibu

    if ($kd_indi == 18) {

        if ($n > 0 && $n < 183) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (183 <= $n && $n < 200) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (200 <= $n && $n < 300) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 300) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 21 Angka partisipasi sekolah 7 - 12

    if ($kd_indi == 23) {

        if ($n == 100) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (95 <= $n && $n < 100) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (90 <= $n && $n < 95) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 &&  $n < 90) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 22 Angka partisipasi sekolah 13 - 15

    if ($kd_indi == 24) {

        if ($n == 100) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (95 <= $n && $n < 100) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (90 <= $n && $n < 95) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 &&  $n < 90) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 23 Angka partisipasi sekolah 16 - 19

    if ($kd_indi == 25) {

        if ($n >= 80) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (70 <= $n && $n < 80) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (60 <= $n && $n < 70) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 &&  $n < 60) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 24 Penduduk perkotaan

    if ($kd_indi == 37) {

        if (60 < $n && $n <= 100) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (50 <= $n && $n < 60) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (40 <= $n && $n < 50) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 &&  $n < 40) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 25  Rumah Layak Huni

    if ($kd_indi == 33) {

        if (70 < $n) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (60 <= $n && $n < 70) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (50 <= $n && $n < 60) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 &&  $n < 50) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 26 Prevalensi stunting

    if ($kd_indi == 20) {

        if ($n > 0 && $n <= 14) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (14 < $n && $n <= 20) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (20 < $n && $n <= 30) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 30) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 27 Proporsi penduduk lansia

    if ($kd_indi == 8) {

        if ($n > 0 && $n < 10) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (10 <= $n && $n < 15) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (15 <= $n && $n < 20) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 20) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    //  28 DCR (Angka Putus Pakai KB)

    if ($kd_indi == 16) {

        if ($n > 0 && $n < 25) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (25 <= $n && $n < 30) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (30 <= $n && $n < 35) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 35) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 29  Prevalensi Kurang energi Kronis Pada Wanita Hamil (KEK)

    if ($kd_indi == 22) {

        if ($n > 0 && $n <= 5) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (5 < $n && $n <= 18) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (18 < $n && $n <= 25) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 25) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 30  Pendidikan Tertinggi yang Ditamatkan SMA 

    if ($kd_indi == 27) {

        if ($n >= 35) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (30 <= $n && $n < 35) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (25 <= $n && $n < 30) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 && $n < 25) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 31  Gini Ratio 

    if ($kd_indi == 29) {

        if ($n > 0 && $n <= 0.374) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (0.374 < $n && $n <= 0.385) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (0.385 < $n && $n <= 4) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 4) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 32 Kepadatan penduduk (population density/PD)
    if ($kd_indi == 38) {

        if ($n > 0 && $n < 200) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (200 <= $n && $n < 300) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (300 <= $n && $n < 1000) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 1000) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 33 Angka Migrasi Risen Neto (MR)

    if ($kd_indi == 39) {

        if ($n > -1 && $n < 1) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (-5 <= $n && $n <= -1) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (1 <= $n && $n <= 5) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (-10 <= $n && $n < -5) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif (5 <= $n && $n < 10) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n < -10) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } elseif ($n > 10) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 34 Migrasi seumur hidup

    if ($kd_indi == 40) {

        if ($n > -1 && $n < 1) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (-5 <= $n && $n <= -1) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (1 <= $n && $n <= 5) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (-10 <= $n && $n < -5) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif (5 <= $n && $n < 10) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n < -10) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } elseif ($n > 10) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 35  Indeks Pembangunan Berbasis Keluarga (IPK)

    if ($kd_indi == 45) {

        if ($n >= 61) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (59 <= $n && $n < 61) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (50 <= $n && $n < 59) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 && $n < 50) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 36 median kawin pertama

    if ($kd_indi == 15) {

        if (21 <= $n  && $n < 23) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (20 <= $n && $n < 21) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (23 <= $n && $n < 25) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (19 <= $n && $n < 20) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif (25 <= $n && $n < 27) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n < 19 && $n > 0) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } elseif ($n >= 27) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 37 Penggunaan Air Bersih. Persentase Rumah tangga menggunakan air bersih

    // 38  Angka Migrasi Seumur Hidup Neto (net migration rate/NMR)

    if ($kd_indi == 40) {

        if ($n > -1 && $n < 1) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (-5 <= $n && $n <= -1) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (1 <= $n && $n <= 5) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (-10 <= $n && $n < -5) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif (5 < $n && $n <= 10) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n < -10) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } elseif ($n > 10) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // Angka kematian balita

    if ($kd_indi == 44) {

        if ($n > 0 && $n < 25) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (25 <= $n && $n < 45) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (45 <= $n && $n < 55) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 55) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // Angka kelahiran kasar CBR

    if ($kd_indi == 46) {

        if ($n > 0 && $n < 20) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (20 <= $n && $n < 30) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (30 <= $n && $n < 40) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n >= 40) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // indeks pembangunan manusia

    if ($kd_indi == 43) {

        if ($n >= 80) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif (70 <= $n && $n < 80) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif (60 <= $n && $n < 70) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n > 0 && $n < 60) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

    // 44 tipologi bonus demografi

    if ($kd_indi == 11) {

        if ($n == 4) {

            echo '<span class="badge bg-primary" style="color: #ffffff;">';
        } elseif ($n == 3) {

            echo '<span class="badge bg-success" style="color: #ffffff;">';
        } elseif ($n == 2) {

            echo '<span class="badge bg-warning" style="color: #000000;">';
        } elseif ($n == 1) {

            echo '<span class="badge bg-danger" style="color: #ffffff;">';
        } else {

            echo '<span class="" style="color: #ffffff;">';
        }
    }

// akses sanitasi

if ($kd_indi == 47) {

    if ($n >= 90) {

        echo '<span class="badge bg-primary" style="color: #ffffff;">';
    } elseif (80 <= $n && $n < 90) {

        echo '<span class="badge bg-success" style="color: #ffffff;">';
    } elseif (70 <= $n && $n < 80) {

        echo '<span class="badge bg-warning" style="color: #000000;">';
    } elseif ($n < 70) {

        echo '<span class="badge bg-danger" style="color: #ffffff;">';
    } else {

        echo '<span class="" style="color: #ffffff;">';
    }
}

    // perkawinana anak

    if ($kd_indi == 48) {

        if ($n > 0 &&  $n <= 8.74) {

            echo '<path fill="#0099cb"';
        } elseif (8.74 < $n && $n < 11) {

            echo '<path fill="#21ae41"';
        } elseif (11 <= $n && $n < 13) {

            echo '<path fill="#ffc107"';
        } elseif (13 <= $n) {

            echo '<path fill="#ff4441"';
        } else {

            echo '<path fill="#6c757d"';
        }
    }

    // air bersih 

    if ($kd_indi == 34) {

        if ($n == 100) {

            echo '<path fill="#0099cb"';
        } elseif (90 <= $n && $n < 100) {

            echo '<path fill="#21ae41"';
        } elseif (80 <= $n && $n < 90) {

            echo '<path fill="#ffc107"';
        } elseif ($n > 0 && $n < 80) {

            echo '<path fill="#ff4441"';
        } else {

            echo '<path fill="#6c757d"';
        }
    }

    // cakuppan JKN

    if ($kd_indi == 50) {

        if ($n >= 98) {

            echo '<path fill="#0099cb"';
        } elseif (85 <= $n && $n < 98) {

            echo '<path fill="#21ae41"';
        } elseif (70 <= $n && $n < 85) {

            echo '<path fill="#ffc107"';
        } elseif (0 < $n && $n < 70) {

            echo '<path fill="#ff4441"';
        } else {

            echo '<path fill="#6c757d"';
        }
    }
}
