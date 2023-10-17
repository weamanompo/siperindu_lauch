<?php

function indi_sebelum_nasional($n2, $kd_indi)

{


    // ASFR


    if ($kd_indi == 10) {

        if ($n2 > 0 && $n2 < 18) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (18 <= $n2 && $n2 < 30) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (30 <= $n2 && $n2 < 40) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (40 <= $n2) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }


    // angka harapan hidup

    if ($kd_indi == 17) {

        if ($n2 > 75) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (70 < $n2 && $n2 <= 75) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (65 < $n2 && $n2 <= 70) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 <=  65 &&  0 < $n2) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }

    // unmet need

    if ($kd_indi == 14) {

        if ($n2 > 0 && $n2 < 7.5) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (7.5 <= $n2 && $n2 < 8) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (8 <= $n2 && $n2 < 9.9) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >=  9.9) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }

    // tfr

    if ($kd_indi == 9) {

        if ($n2 > 0 && $n2 <= 2.1) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (2.1 < $n2 && $n2 <= 2.5) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (2.5 < $n2 && $n2 <= 3) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 3) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }

    // CPR Modern

    if ($kd_indi == 12) {

        if ($n2 > 60) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (50 < $n2 && $n2 <= 60) {
            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (40 <= $n2 && $n2 <= 50) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 && $n2 < 40) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }


    // Rasio Jenis Kelamin

    if ($kd_indi == 6) {

        if ($n2 == 100) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (100 < $n2 && $n2 <= 105) {
            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (95 < $n2 && $n2 <= 100) {
            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (105 < $n2 && $n2 <= 110) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (90 < $n2 && $n2 <= 95) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 110 ||  $n2 <= 90) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }

    // Angka Kematian Bayi

    if ($kd_indi == 19) {

        if ($n2 > 0 && $n2 < 16) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (16 <= $n2 && $n2 < 30) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (30 <= $n2 && $n2 < 40) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (40 <= $n2) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }

    // Ketergantungan

    if ($kd_indi == 7) {

        if ($n2 > 0 &&  $n2 < 50) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (50 <= $n2 && $n2 < 55) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (55 <= $n2 && $n2 < 60) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 60) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }

    // Laju Pertumbuhan Penduduk

    if ($kd_indi == 5) {

        if ($n2 > 0 &&  $n2 < 1) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (1 <= $n2 && $n2 < 1.5) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (1.5 <= $n2 && $n2 < 2) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 2) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        } else {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }

    // MKJP

    if ($kd_indi == 13) {

        if ($n2 > 29) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (25 <= $n2 && $n2 < 29) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (20 <= $n2 && $n2 < 25) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 &&  $n2 < 20) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }


    //    Penduduk

    if ($kd_indi == 4) {

        if ($n2 == 0) {

            echo '<td style="text-align: center; "></td>';
        } else {

            echo '<td style="text-align: center; ">' . number_format($n2, 0, ",", ".") . '</td>';
        }
    }

    // Indeks pembangunan gender

    if ($kd_indi == 30) {

        if ($n2 >= 91.39) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (90 <= $n2 && $n2 < 91.39) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (80 <= $n2 && $n2 < 90) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 &&  $n2 < 80) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }


    // Indeks pemberdayaan gender

    if ($kd_indi == 31) {

        if ($n2 >= 74.18) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (70 <= $n2 && $n2 < 74.18) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (60 <= $n2 && $n2 < 70) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 &&  $n2 < 60) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // Persentase Penduduk Miskin Ekstrem (ME)

    if ($kd_indi == 36) {

        if ($n2 == 0) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (0 < $n2 && $n2 <= 2) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (2 < $n2 && $n2 < 5) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 5) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    //  miskin

    if ($kd_indi == 35) {

        if ($n2 > 0 && $n2 < 7) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (7 < $n2 && $n2 <= 9.6) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (9.6 < $n2 && $n2 < 12) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 12) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // perempuan dalam parlemen

    if ($kd_indi == 32) {

        if ($n2 > 30) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (20 < $n2 && $n2 <= 30) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (10 < $n2 && $n2 <= 20) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 <= 10) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // capaian akta kelahiran

    if ($kd_indi == 42) {

        if ($n2 == 100) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (80 <= $n2 && $n2 < 100) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (60 <= $n2 && $n2 < 80) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 && $n2 < 60) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // rata rata usia sekolah

    if ($kd_indi == 26) {

        if ($n2 >= 9) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (7.5 <= $n2 && $n2 < 9) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (6 <= $n2 && $n2 < 7.5) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 && $n2 < 6) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // pengangguran terbuka

    if ($kd_indi == 28) {

        if ($n2 > 0 && $n2 <= 4.3) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (4.3 < $n2 && $n2 <= 6.5) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (6.5 < $n2 && $n2 < 8.5) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 8.5) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // Angka kematian IBu

    if ($kd_indi == 18) {

        if ($n2 > 0 && $n2 < 183) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (183 <= $n2 && $n2 < 200) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (200 <= $n2 && $n2 < 300) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 300) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // Angka partisipasi sekolah 7 -12

    if ($kd_indi == 23) {

        if ($n2 == 100) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (95 <= $n2 && $n2 < 100) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (90 <= $n2 && $n2 < 95) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 &&  $n2 < 90) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // Angka partisipasi sekolah 13 -15

    if ($kd_indi == 24) {

        if ($n2 == 100) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (95 <= $n2 && $n2 < 100) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (90 <= $n2 && $n2 < 95) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 &&  $n2 < 90) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // Angka partisipasi sekolah 16 -18

    if ($kd_indi == 25) {

        if ($n2 >= 80) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (70 <= $n2 && $n2 < 80) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (60 <= $n2 && $n2 < 70) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 &&  $n2 < 60) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // Penduduk perkotaan

    if ($kd_indi == 37) {

        // if (60 < $n2 && $n2 <= 70) {

        if (60 < $n2 && $n2 <= 100) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (50 <= $n2 && $n2 < 60) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (40 <= $n2 && $n2 < 50) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 &&  $n2 < 40) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // Rumah layak huni

    if ($kd_indi == 33) {

        if (70 < $n2) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (60 <= $n2 && $n2 < 70) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (50 <= $n2 && $n2 < 60) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 &&  $n2 < 50) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // prevalensi stunting

    if ($kd_indi == 20) {

        if ($n2 > 0 && $n2 <= 14) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (14 < $n2 && $n2 <= 20) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (20 < $n2 && $n2 <= 30) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 30) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // gini ratio

    if ($kd_indi == 29) {

        if ($n2 > 0 && $n2 <= 0.374) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (0.374 < $n2 && $n2 <= 0.385) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (0.385 < $n2 && $n2 <= 4) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 4) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // kepdatan penduduk

    if ($kd_indi == 38) {

        if ($n2 > 0 && $n2 < 200) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (200 <= $n2 && $n2 < 300) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (300 <= $n2 && $n2 < 1000) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 1000) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // risen rasio

    if ($kd_indi == 39) {

        if ($n2 > -1 && $n2 < 1) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (-5 <= $n2 && $n2 <= -1) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (1 <= $n2 && $n2 <= 5) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (-10 <= $n2 && $n2 < -5) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (5 <= $n2 && $n2 < 10) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 < -10) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 10) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // migrasi seumur hidup

    if ($kd_indi == 40) {

        if ($n2 > -1 && $n2 < 1 && $n2 != 0) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (-5 <= $n2 && $n2 <= -1 && $n2 != 0) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (1 <= $n2 && $n2 <= 5 && $n2 != 0) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (-10 <= $n2 && $n2 < -5 && $n2 != 0) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (5 <= $n2 && $n2 < 10 && $n2 != 0) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 < -10 && $n2 != 0) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 10 && $n2 != 0) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if ($n2 == 0) {

            $n2 = "*";
            $bg2 = "light  ; ";
            $color2 = "#000";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . ' ">' . $n2 . '</span></td>';
        }
    }

    // pembangunan keluarga

    if ($kd_indi == 45) {

        if ($n2 >= 61) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (59 <= $n2 && $n2 < 61) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (50 <= $n2 && $n2 < 59) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 && $n2 < 50) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<td style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></td>';
        }
    }

    // mdian kawain pertama

    if ($kd_indi == 15) {

        if (21 <= $n2  && $n2 < 23) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (20 <= $n2 && $n2 < 21) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (23 <= $n2 && $n2 < 25) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (19 <= $n2 && $n2 < 20) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (25 <= $n2 && $n2 < 27) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 < 19 && $n2 > 0) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 27) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // indeks pembangunan manusia

    if ($kd_indi == 43) {

        if ($n2 >= 80) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (70 <= $n2 && $n2 < 80) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (60 <= $n2 && $n2 < 70) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 && $n2 < 60) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // angka kematian balita

    if ($kd_indi == 44) {

        if ($n2 > 0 && $n2 < 25) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (25 <= $n2 && $n2 < 45) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (45 <= $n2 && $n2 < 55) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 55) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // Angka kelahiran kasar

    if ($kd_indi == 46) {

        if ($n2 > 30) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (25 <= $n2 && $n2 < 30) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (20 <= $n2 && $n2 < 25) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 && $n2 < 20) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // tipologi bonus demografi

    if ($kd_indi == 11) {

        if ($n2 == 4) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 == 3) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 == 2) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 == 1) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // sanitasi

    if ($kd_indi == 47) {

        if ($n2 >= 90) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (80 <= $n2 && $n2 < 90) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (70 <= $n2 && $n2 < 80) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 < 70) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // perkawinan anak

    if ($kd_indi == 48) {

        if ($n2 > 0 &&  $n2 <= 8.74) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (8.74 < $n2 && $n2 < 11) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (11 <= $n2 && $n2 < 13) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (13 <= $n2) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // proporsi lansia

    if ($kd_indi == 8) {

        if ($n2 > 0 && $n2 < 10) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (10 <= $n2 && $n2 < 15) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (15 <= $n2 && $n2 < 20) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 20) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    //  air bersih

    if ($kd_indi == 34) {

        if ($n2 == 100) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (90 <= $n2 && $n2 < 100) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (80 <= $n2 && $n2 < 90) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 > 0 && $n2 < 80) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // angka putus kb

    if ($kd_indi == 16) {

        if ($n2 > 0 && $n2 < 25) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (25 <= $n2 && $n2 < 30) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (30 <= $n2 && $n2 < 35) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif ($n2 >= 35) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }

    // cakupan JKN

    if ($kd_indi == 50) {

        if ($n2 >= 98) {

            $color2 = "white";
            $bg2 = "primary";

            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (85 <= $n2 && $n2 < 98) {

            $color2 = "white";
            $bg2 = "success";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (70 <= $n2 && $n2 < 85) {

            $color2 = "black";
            $bg2 = "warning";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        } elseif (0 < $n2 && $n2 < 70) {

            $bg2 = "danger";

            $color2 = "white";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; color : ' . $color2 . '">' . $n2 . '</span></th>';
        }
        if (!$n2) {

            $n2 = "-";
            $bg2 = "background-color:  ; ";
            echo '<th style="text-align: center;"><span class="badge bg-' . $bg2 . '" style="font-size: 0.8rem; ">' . $n2 . '</span></th>';
        }
    }
}
