<?php

function warna($n, $kd_indi)

{

    //  1 Harapan Hidup

    if ($kd_indi == 17) {

        if ($n > 75) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (70 < $n && $n <= 75) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (65 < $n && $n <= 70) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n <=  65) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #e0e3e7"';
        }
    }

    // 2 ASFR

    if ($kd_indi == 10) {

        if ($n > 0 && $n < 18) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (18 <= $n && $n < 30) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (30 <= $n && $n < 40) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >=  40) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 3 unmet need

    if ($kd_indi == 14) {

        if ($n > 0 && $n < 7.5) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (7.5 <= $n && $n < 10) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (10 <= $n && $n < 15) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >=  15) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }


    // 4 tfr

    // if ($kd_indi == 9) {

    //     if ($n > 2 && $n < 2.1) {

    //         $isi = "#ffffff";

    //         echo '<path style="fill: #0099cb"';
    //     } elseif ($n > 2.11 && $n < 2.4) {

    //         $isi = "#ffffff";

    //         echo '<path style="fill: #21ae41"';

    //         $bg = "#21ae41";
    //     } elseif ($n > 1.8 && $n < 1.99) {

    //         $isi = "#ffffff";

    //         echo '<path style="fill: #21ae41"';

    //         $bg = "#21ae41";
    //     }elseif ($n > 2.41 && $n < 2.7) {

    //         $isi = "#000000";

    //         echo '<path style="fill: #eef200"';
    //     }elseif ($n > 0 && $n < 1.8) {

    //         $isi = "#000000";

    //         echo '<path style="fill: #eef200"';
    //     } elseif ($n > 2.7) {

    //         $isi = "#ffffff";

    //         echo '<path style="fill: #ff4441"';
    //     } else {

    //         echo '<path style="fill: #ffffff"';
    //     }
    // }

    // ?tfr backup

    if ($kd_indi == 9) {

        if ($n >= 2 && $n <= 2.19) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (2.2 <= $n && $n <= 2.39) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (1.8 <= $n && $n <= 1.99) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (2.4 < $n && $n <= 2.69) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n <= 1.8) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 2.7) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 5 CPR MOdern

    if ($kd_indi == 12) {

        if ($n > 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (50 < $n && $n <= 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (40 <= $n && $n <= 50) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n < 40) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 6 Rasio Jenis Kelamin

    if ($kd_indi == 6) {

        if ($n == 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (100 < $n && $n <= 105) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (95 < $n && $n <= 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (105 < $n && $n <= 110) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif (90 < $n && $n <= 95) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 110 ||  $n <= 90) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 7 Angka Kematian BAyi

    if ($kd_indi == 19) {

        if ($n > 0 && $n < 16) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (16 <= $n && $n < 30) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (30 <= $n && $n < 40) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif (40 <= $n) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 8 Ketergantungan

    if ($kd_indi == 7) {

        if ($n > 0 &&  $n < 50) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (50 <= $n && $n < 55) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (55 <= $n && $n < 60) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 9 laju pertumbuhan penduduk

    if ($kd_indi == 5) {

        if ($n > 0 &&  $n < 1) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (1 <= $n && $n < 1.5) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (1.5 <= $n && $n < 2) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 2) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 10 mkjp

    if ($kd_indi == 13) {

        if ($n > 29) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (25 <= $n && $n < 29) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (20 <= $n && $n < 25) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 &&  $n < 20) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    //  11  Jumlah Penduduk


    if ($kd_indi == 4) {

        if ($n != 0) {

            echo '<path style="fill: #F0EDD4"';
        } else {

            echo '<path style="fill: #FFFFFF"';
        }
    }

    //  12 Indeks pembangunan gender

    if ($kd_indi == 30) {

        if ($n >= 91.39) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (90 <= $n && $n < 91.39) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (80 <= $n && $n < 90) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 &&  $n < 80) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }


    // 13  Indeks pemberdayaan gender

    if ($kd_indi == 31) {

        if ($n >= 74.18) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (70 <= $n && $n < 74.18) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (60 <= $n && $n < 70) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 &&  $n < 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 14 Persentase Penduduk Miskin Ekstrem (ME)

    if ($kd_indi == 36) {

        if ($n == 0) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (0 < $n && $n <= 2) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (2 < $n && $n < 5) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 5) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 15 Persentase Penduduk Miskin 

    if ($kd_indi == 35) {

        if ($n > 0 && $n < 7) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (7 < $n && $n <= 9.6) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (9.6 < $n && $n < 12) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 12) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 16 Perempuan dalam parlemen

    if ($kd_indi == 32) {

        if ($n > 30) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (20 < $n && $n <= 30) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (10 < $n && $n <= 20) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n <= 10) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 17 Capaian akta kelahiran

    if ($kd_indi == 42) {

        if ($n == 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (80 <= $n && $n < 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (60 <= $n && $n < 80) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n < 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 18 rata rata lama sekolah

    if ($kd_indi == 26) {

        if ($n >= 9) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (7.5 <= $n && $n < 9) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (6 <= $n && $n < 7.5) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n < 6) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 19 Tingkat Pengangguran terbuka

    if ($kd_indi == 28) {

        if ($n > 0 && $n <= 4.3) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (4.3 < $n && $n <= 6.5) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (6.5 < $n && $n < 8.5) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 8.5) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 20 Angka kematian Ibu

    if ($kd_indi == 18) {

        if ($n > 0 && $n < 183) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (183 <= $n && $n < 200) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (200 <= $n && $n < 300) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 300) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 21 Angka partisipasi sekolah 7 - 12

    if ($kd_indi == 23) {

        if ($n == 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (95 <= $n && $n < 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (90 <= $n && $n < 95) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 &&  $n < 90) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 22 Angka partisipasi sekolah 13 - 15

    if ($kd_indi == 24) {

        if ($n == 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (95 <= $n && $n < 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (90 <= $n && $n < 95) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 &&  $n < 90) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 23 Angka partisipasi sekolah 16 - 19

    if ($kd_indi == 25) {

        if ($n >= 80) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (70 <= $n && $n < 80) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (60 <= $n && $n < 70) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 &&  $n < 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 24 Penduduk perkotaan

    if ($kd_indi == 37) {

        // if (60 < $n && $n <= 70) {

        if (60 < $n && $n <= 100) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (50 <= $n && $n < 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (40 <= $n && $n < 50) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 &&  $n < 40) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 25  Rumah Layak Huni

    if ($kd_indi == 33) {

        if (70 < $n) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (60 <= $n && $n < 70) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (50 <= $n && $n < 60) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 &&  $n < 50) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 26 Prevalensi stunting

    if ($kd_indi == 20) {

        if ($n > 0 && $n <= 14) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (14 < $n && $n <= 20) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (20 < $n && $n <= 30) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 30) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 27 Proporsi penduduk lansia

    if ($kd_indi == 8) {

        if ($n > 0 && $n < 10) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (10 <= $n && $n < 15) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (15 <= $n && $n < 20) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 20) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    //  28 DCR (Angka Putus Pakai KB)

    if ($kd_indi == 16) {

        if ($n > 0 && $n < 25) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (25 <= $n && $n < 30) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (30 <= $n && $n < 35) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 35) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 29  Prevalensi Kurang energi Kronis Pada Wanita Hamil (KEK)

    if ($kd_indi == 22) {

        if ($n > 0 && $n <= 5) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (5 < $n && $n <= 18) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (18 < $n && $n <= 25) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 25) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 30  Pendidikan Tertinggi yang Ditamatkan SMA 

    if ($kd_indi == 27) {

        if ($n >= 35) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (30 <= $n && $n < 35) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (25 <= $n && $n < 30) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n < 25) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 31  Gini Ratio 

    if ($kd_indi == 29) {

        if ($n > 0 && $n <= 0.374) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (0.374 < $n && $n <= 0.385) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (0.385 < $n && $n <= 4) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 4) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 32 Kepadatan penduduk (population density/PD)

    if ($kd_indi == 38) {

        if ($n > 0 && $n < 200) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (200 <= $n && $n < 300) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (300 <= $n && $n < 1000) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 1000) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 33 Angka Migrasi Risen Neto (MR)

    if ($kd_indi == 39) {

        if ($n > -1 && $n < 1) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (-5 <= $n && $n <= -1) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (1 <= $n && $n <= 5) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (-10 <= $n && $n < -5) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif (5 <= $n && $n < 10) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n < -10) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } elseif ($n > 10) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 34 Migrasi seumur hidup

    if ($kd_indi == 40) {

        if ($n > -1 && $n < 1) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (-5 <= $n && $n <= -1) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (1 <= $n && $n <= 5) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (-10 <= $n && $n < -5) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif (5 <= $n && $n < 10) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n < -10) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } elseif ($n > 10) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 35  Indeks Pembangunan Berbasis Keluarga (IPK)

    if ($kd_indi == 45) {

        if ($n >= 61) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (59 <= $n && $n < 61) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (50 <= $n && $n < 59) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n < 50) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 36 median kawin pertama

    if ($kd_indi == 15) {

        if (21 <= $n  && $n < 23) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (20 <= $n && $n < 21) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (23 <= $n && $n < 25) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (19 <= $n && $n < 20) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif (25 <= $n && $n < 27) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n < 19 && $n > 0) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } elseif ($n >= 27) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 37 Penggunaan Air Bersih. Persentase Rumah tangga menggunakan air bersih air minum

    if ($kd_indi == 34) {

        if ($n == 100) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (90 <= $n && $n < 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (80 <= $n && $n < 90) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n < 80) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 38  Angka Migrasi Seumur Hidup Neto (net migration rate/NMR)

    if ($kd_indi == 40) {

        if ($n > -1 && $n < 1) {
            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (-5 <= $n && $n <= -1) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (1 <= $n && $n <= 5) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (-10 <= $n && $n < -5) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif (5 < $n && $n <= 10) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n < -10) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } elseif ($n > 10) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 39 Cakupan ktp elektronil

    if ($kd_indi == 41) {

        if ($n == 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (80 <= $n && $n < 100) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (60 <= $n && $n < 80) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n < 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 40 Angka Prevalensi Wasting 

    if ($kd_indi == 21) {

        if (0 < $n && $n <= 7) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (7 < $n && $n <= 12) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (12 < $n && $n <= 25) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 25) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 41 Angka kelahiran kasar cbr

    if ($kd_indi == 46) {

        if ($n > 0 && $n < 20) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (20 <= $n && $n < 30) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (30 <= $n && $n < 40) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 40) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 42 Indeks pembangunan manusia

    if ($kd_indi == 43) {

        if ($n >= 80) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (70 <= $n && $n < 80) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (60 <= $n && $n < 70) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n > 0 && $n < 60) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 43 Angka kematian balita 

    if ($kd_indi == 44) {

        if ($n > 0 && $n < 25) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (25 <= $n && $n < 45) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (45 <= $n && $n < 55) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n >= 55) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // 44 tipologi bonus demografi

    if ($kd_indi == 11) {

        if ($n == 4) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif ($n == 3) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif ($n == 2) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n == 1) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // Akses terhadap sanitasi

    if ($kd_indi == 47) {

        if ($n >= 90) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (80 <= $n && $n < 90) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (70 <= $n && $n < 80) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif ($n < 70) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // perkawinana anak

    if ($kd_indi == 48) {

        if ($n > 0 &&  $n <= 8.74) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (8.74 < $n && $n < 11) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (11 <= $n && $n < 13) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif (13 <= $n) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }

    // cakupan akta nikah

    //  cakupan JKN

    if ($kd_indi == 50) {

        if ($n >= 98) {

            $isi = "#ffffff";

            echo '<path style="fill: #0099cb"';
        } elseif (85 <= $n && $n < 98) {

            $isi = "#ffffff";

            echo '<path style="fill: #21ae41"';

            $bg = "#21ae41";
        } elseif (70 <= $n && $n < 85) {

            $isi = "#000000";

            echo '<path style="fill: #eef200"';
        } elseif (0 < $n && $n < 70) {

            $isi = "#ffffff";

            echo '<path style="fill: #ff4441"';
        } else {

            echo '<path style="fill: #ffffff"';
        }
    }
}
