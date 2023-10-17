<?php

function hitung($kdwil, $kd_indi, $n)

{

    // 1 ASFR

    if ($kd_indi == 10) {

        if ($n > 0 && $n < 18) {

            $kon = '1';
        } elseif (18 <= $n && $n < 30) {

            $kon = '2';
        } elseif (30 <= $n && $n < 40) {

            $kon = '3';
        } elseif (40 <= $n) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }



    // 2 harapan hidup

    if ($kd_indi == 17) {

        if ($n > 75) {

            $kon = '1';
        } elseif (70 < $n && $n <= 75) {

            $kon = '2';
        } elseif (65 < $n && $n <= 70) {

            $kon = '3';
        } elseif ($n <=  65) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }


    // 3 tfr

    if ($kd_indi == 9) {

        if ($n > 0 && $n <= 2.1) {

            $kon = '1';
        } elseif (2.1 < $n && $n <= 2.5) {

            $kon = '2';
        } elseif (2.5 < $n && $n <= 3) {

            $kon = '3';
        } elseif ($n > 3) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 4 unmeet need

    if ($kd_indi == 14) {

        if ($n > 0 && $n < 7.5) {

            $kon = '1';
        } elseif (7.5 <= $n && $n < 8) {

            $kon = '2';
        } elseif (8 <= $n && $n < 9.9) {

            $kon = '3';
        } elseif ($n >=  9.9) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }



    // 5 cpr modern

    if ($kd_indi == 12) {

        if ($n > 60) {

            $kon = '1';
        } elseif (50 < $n && $n <= 60) {

            $kon = '2';
        } elseif (40 <= $n && $n <= 50) {

            $kon = '3';
        } elseif ($n > 0 && $n < 40) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 6 rasio jenis kelamin

    if ($kd_indi == 6) {

        if ($n == 100) {

            $kon = '1';
        } elseif (100 < $n && $n <= 105) {

            $kon = '2';
        } elseif (95 < $n && $n <= 100) {

            $kon = '2';
        } elseif (105 < $n && $n <= 110) {

            $kon = '3';
        } elseif (90 < $n && $n <= 95) {

            $kon = '3';
        } elseif ($n > 110 ||  $n <= 90) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 7 Angka kematian bayi

    if ($kd_indi == 19) {

        if ($n > 0 && $n < 16) {

            $kon = '1';
        } elseif (16 <= $n && $n < 30) {

            $kon = '2';
        } elseif (30 <= $n && $n < 40) {

            $kon = '3';
        } elseif (40 <= $n) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 8 ketergantungan

    if ($kd_indi == 7) {

        if ($n > 0 &&  $n < 50) {

            $kon = '1';
        } elseif (50 <= $n && $n < 55) {

            $kon = '2';
        } elseif (55 <= $n && $n < 60) {

            $kon = '3';
        } elseif ($n >= 60) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 9 Laju Pertumbuhan Penduduk

    if ($kd_indi == 5) {

        if ($n > 0 &&  $n < 1) {

            $kon = '1';
        } elseif (1 <= $n && $n < 1.5) {

            $kon = '2';
        } elseif (1.5 <= $n && $n < 2) {

            $kon = '3';
        } elseif ($n >= 2) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 10 mkjp

    if ($kd_indi == 13) {

        if ($n > 29) {

            $kon = '1';
        } elseif (25 <= $n && $n < 29) {

            $kon = '2';
        } elseif (20 <= $n && $n < 25) {

            $kon = '3';
        } elseif ($n > 0 &&  $n < 20) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    //  11  Jumlah Penduduk

    // 12 indeks pembangunan gender

    if ($kd_indi == 30) {

        if ($n >= 91.39) {

            $kon = '1';
        } elseif (90 <= $n && $n < 91.39) {

            $kon = '2';
        } elseif (80 <= $n && $n < 90) {

            $kon = '3';
        } elseif ($n > 0 &&  $n < 80) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 13  Indeks pemberdayaan gender

    if ($kd_indi == 31) {

        if ($n >= 74.18) {

            $kon = '1';
        } elseif (70 <= $n && $n < 74.18) {

            $kon = '2';
        } elseif (60 <= $n && $n < 70) {

            $kon = '3';
        } elseif ($n > 0 &&  $n < 60) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 14 Persentase Penduduk Miskin Ekstrem (ME)

    if ($kd_indi == 36) {

        if ($n == 0) {

            $kon = '1';
        } elseif (0 < $n && $n <= 2) {

            $kon = '2';
        } elseif (2 < $n && $n < 5) {

            $kon = '3';
        } elseif ($n >= 5) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 15 Persentase Penduduk Miskin 
    if ($kd_indi == 35) {

        if ($n > 0 && $n < 7) {

            $kon = '1';
        } elseif (7 < $n && $n <= 9.6) {

            $kon = '2';
        } elseif (9.6 < $n && $n < 12) {

            $kon = '3';
        } elseif ($n >= 12) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 16 Perempuan dalam parlemen
    if ($kd_indi == 32) {

        if ($n > 30) {

            $kon = '1';
        } elseif (20 < $n && $n <= 30) {

            $kon = '2';
        } elseif (10 < $n && $n <= 20) {

            $kon = '3';
        } elseif ($n <= 10) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }
    // 17 Capaian akta kelahiran

    if ($kd_indi == 42) {

        if ($n == 100) {

            $kon = '1';
        } elseif (80 <= $n && $n < 100) {

            $kon = '2';
        } elseif (60 <= $n && $n < 80) {

            $kon = '3';
        } elseif ($n > 0 && $n < 60) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 18 rata rata lama sekolah
    if ($kd_indi == 26) {

        if ($n >= 9) {

            $kon = '1';
        } elseif (7.5 <= $n && $n < 9) {

            $kon = '2';
        } elseif (6 <= $n && $n < 7.5) {

            $kon = '3';
        } elseif ($n > 0 && $n < 6) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 19 Tingkat Pengangguran terbuka

    if ($kd_indi == 28) {

        if ($n > 0 && $n <= 4.3) {

            $kon = '1';
        } elseif (4.3 < $n && $n <= 6.5) {

            $kon = '2';
        } elseif (6.5 < $n && $n < 8.5) {

            $kon = '3';
        } elseif ($n > 8.5) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 20 Angka kematian Ibu

    if ($kd_indi == 18) {

        if ($n > 0 && $n < 183) {

            $kon = '1';
        } elseif (183 <= $n && $n < 200) {

            $kon = '2';
        } elseif (200 <= $n && $n < 300) {

            $kon = '3';
        } elseif ($n >= 300) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 21 Angka partisipasi sekolah 7 - 12

    if ($kd_indi == 23) {

        if ($n == 100) {

            $kon = '1';
        } elseif (95 <= $n && $n < 100) {

            $kon = '2';
        } elseif (90 <= $n && $n < 95) {

            $kon = '3';
        } elseif ($n > 0 &&  $n < 90) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 22 Angka partisipasi sekolah 13 - 15

    if ($kd_indi == 24) {

        if ($n == 100) {

            $kon = '1';
        } elseif (95 <= $n && $n < 100) {

            $kon = '2';
        } elseif (90 <= $n && $n < 95) {

            $kon = '3';
        } elseif ($n > 0 &&  $n < 90) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 23 Angka partisipasi sekolah 16 - 19

    if ($kd_indi == 25) {

        if ($n >= 80) {

            $kon = '1';
        } elseif (70 <= $n && $n < 80) {

            $kon = '2';
        } elseif (60 <= $n && $n < 70) {

            $kon = '3';
        } elseif ($n > 0 &&  $n < 60) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 24 Penduduk perkotaan

    if ($kd_indi == 37) {

        if (60 < $n && $n <= 100) {

            $kon = '1';
        } elseif (50 <= $n && $n < 60) {

            $kon = '2';
        } elseif (40 <= $n && $n < 50) {

            $kon = '3';
        } elseif ($n > 0 &&  $n < 40) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 25  Rumah Layak Huni

    if ($kd_indi == 33) {

        if (70 < $n) {

            $kon = '1';
        } elseif (60 <= $n && $n < 70) {

            $kon = '2';
        } elseif (50 <= $n && $n < 60) {

            $kon = '3';
        } elseif ($n > 0 &&  $n < 50) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 26 Prevalensi stunting

    if ($kd_indi == 20) {

        if ($n > 0 && $n <= 14) {

            $kon = '1';
        } elseif (14 < $n && $n <= 20) {

            $kon = '2';
        } elseif (20 < $n && $n <= 30) {

            $kon = '3';
        } elseif ($n > 30) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 27 Proporsi penduduk lansia

    if ($kd_indi == 8) {

        if ($n > 0 && $n <= 5) {

            $kon = '1';
        } elseif (5 < $n && $n <= 7) {

            $kon = '2';
        } elseif (7 < $n && $n <= 10) {

            $kon = '3';
        } elseif ($n > 10) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    //  28 DCR (Angka Putus Pakai KB)

    if ($kd_indi == 16) {

        if ($n > 0 && $n < 25) {

            $kon = '1';
        } elseif (25 <= $n && $n < 30) {

            $kon = '2';
        } elseif (30 <= $n && $n < 35) {

            $kon = '3';
        } elseif ($n >= 35) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 29  Prevalensi Kurang energi Kronis Pada Wanita Hamil (KEK)

    if ($kd_indi == 22) {

        if ($n > 0 && $n <= 5) {

            $kon = '1';
        } elseif (5 < $n && $n <= 18) {

            $kon = '2';
        } elseif (18 < $n && $n <= 25) {

            $kon = '3';
        } elseif ($n > 25) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 30  Pendidikan Tertinggi yang Ditamatkan SMA 

    if ($kd_indi == 27) {

        if ($n >= 35) {

            $kon = '1';
        } elseif (30 <= $n && $n < 35) {

            $kon = '2';
        } elseif (25 <= $n && $n < 30) {

            $kon = '3';
        } elseif ($n > 0 && $n < 25) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 31  Gini Ratio 

    if ($kd_indi == 29) {

        if ($n > 0 && $n <= 0.374) {

            $kon = '1';
        } elseif (0.374 < $n && $n <= 0.385) {

            $kon = '2';
        } elseif (0.385 < $n && $n <= 4) {

            $kon = '3';
        } elseif ($n >= 4) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 32 Kepadatan penduduk (population density/PD)
    if ($kd_indi == 38) {

        if ($n > 0 && $n < 200) {

            $kon = '1';
        } elseif (200 <= $n && $n < 300) {

            $kon = '2';
        } elseif (300 <= $n && $n < 1000) {

            $kon = '3';
        } elseif ($n >= 1000) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 33 Angka Migrasi Risen Neto (MR)

    if ($kd_indi == 39) {

        if ($n > -1 && $n < 1) {

            $kon = '1';
        } elseif (-5 <= $n && $n <= -1) {

            $kon = '2';
        } elseif (1 <= $n && $n <= 5) {

            $kon = '2';
        } elseif (-10 <= $n && $n < -5) {

            $kon = '3';
        } elseif (5 <= $n && $n < 10) {

            $kon = '3';
        } elseif ($n < -10) {

            $kon = '4';
        } elseif ($n > 10) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 34 Migrasi seumur hidup

    if ($kd_indi == 40) {

        if ($n > -1 && $n < 1) {

            $kon = '1';
        } elseif (-5 <= $n && $n <= -1) {

            $kon = '2';
        } elseif (1 <= $n && $n <= 5) {

            $kon = '2';
        } elseif (-10 <= $n && $n < -5) {

            $kon = '3';
        } elseif (5 <= $n && $n < 10) {

            $kon = '3';
        } elseif ($n < -10) {

            $kon = '4';
        } elseif ($n > 10) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 35  Indeks Pembangunan Berbasis Keluarga (IPK)

    if ($kd_indi == 45) {

        if ($n >= 61) {

            $kon = '1';
        } elseif (59 <= $n && $n < 61) {

            $kon = '2';
        } elseif (50 <= $n && $n < 59) {

            $kon = '3';
        } elseif ($n > 0 && $n < 50) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 36 median kawin pertama

    if ($kd_indi == 15) {

        if (21 <= $n  && $n < 23) {

            $kon = '1';
        } elseif (20 <= $n && $n < 21) {

            $kon = '2';
        } elseif (23 <= $n && $n < 25) {

            $kon = '2';
        } elseif (19 <= $n && $n < 20) {

            $kon = '3';
        } elseif (25 <= $n && $n < 27) {

            $kon = '3';
        } elseif ($n < 19 && $n > 0) {

            $kon = '4';
        } elseif ($n >= 27) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // 37 Penggunaan Air Bersih. Persentase Rumah tangga menggunakan air bersih

    // 38  Angka Migrasi Seumur Hidup Neto (net migration rate/NMR)

    if ($kd_indi == 40) {

        if ($n > -1 && $n < 1) {

            $kon = '1';
        } elseif (-5 <= $n && $n <= -1) {

            $kon = '2';
        } elseif (1 <= $n && $n <= 5) {

            $kon = '2';
        } elseif (-10 <= $n && $n < -5) {

            $kon = '3';
        } elseif (5 < $n && $n <= 10) {

            $kon = '3';
        } elseif ($n < -10) {

            $kon = '4';
        } elseif ($n > 10) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // kematian balita

    if ($kd_indi == 44) {

        if ($n > 0 && $n < 25) {

            $kon = '1';
        } elseif (25 <= $n && $n < 45) {

            $kon = '2';
        } elseif (45 <= $n && $n < 55) {

            $kon = '3';
        } elseif ($n >= 55) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }

    // angka kelahiran kasar

    if ($kd_indi == 46) {

        if ($n > 30) {

            $kon = '1';
        } elseif (25 <= $n && $n < 30) {

            $kon = '2';
        } elseif (20 <= $n && $n < 25) {

            $kon = '3';
        } elseif ($n > 0 && $n < 20) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }


    // Indeks pembangunan manusia

    if ($kd_indi == 43) {

        if ($n >= 80) {

            $kon = '1';
        } elseif (70 <= $n && $n < 80) {

            $kon = '2';
        } elseif (60 <= $n && $n < 70) {

            $kon = '3';
        } elseif ($n > 0 && $n < 60) {

            $kon = '4';
        } else {

            $kon = '5';
        }

        $titik = '.';
        $id = "{$kdwil}{$titik}{$kd_indi}{$titik}{$kon}{$titik}{$n}";
        echo $id;
    }
}
