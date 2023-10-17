<?php

function warnatable_nasioanl($n, $kd_indi)

{

    // Harapan Hidup

    if ($kd_indi == 17) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n > 75) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (70 < $n && $n <= 75) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (65 < $n && $n <= 70) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n <=  65) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    // ASFR

    if ($kd_indi == 10) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n > 0 && $n < 18) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (18 <= $n && $n < 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (30 <= $n && $n < 40) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n >=  40) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    //  unmet need

    if ($kd_indi == 14) {

        if ($n == 0) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n > 0 && $n < 7.5) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (7.5 <= $n && $n < 10) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (10 <= $n && $n < 15) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n >=  15) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    //  tfr

    if ($kd_indi == 9) {

        if ($n == 0) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n >= 2 && $n <= 2.19) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (2.2 <= $n && $n <= 2.39) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (1.8 <= $n && $n <= 1.99) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (2.4 < $n && $n <= 2.69) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n > 0 && $n <= 1.8) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n >= 2.7) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    //  CPR Modern

    if ($kd_indi == 12) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n > 60) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (50 < $n && $n <= 60) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (40 <= $n && $n <= 50) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n > 0 && $n < 40) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    //  Rasio Jenis Kelamin

    if ($kd_indi == 6) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (100 < $n && $n <= 105) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (95 < $n && $n <= 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (105 < $n && $n <= 110) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (90 < $n && $n <= 95) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n > 110 ||  $n <= 90) {
            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    //  Angka Kematian Bayi

    if ($kd_indi == 19) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n > 0 && $n < 16) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (16 <= $n && $n < 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (30 <= $n && $n < 40) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (40 <= $n) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    //    ketergantungan

    if ($kd_indi == 7) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n > 0 &&  $n < 50) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (50 <= $n && $n < 55) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (55 <= $n && $n < 60) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n >= 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    //    Laju Pertumbuhan Penduduk

    if ($kd_indi == 5) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n > 0 &&  $n < 1) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (1 <= $n && $n < 1.5) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (1.5 <= $n && $n < 2) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n >= 2) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }


    //    MKJP

    if ($kd_indi == 13) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }

        if ($n > 29) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (25 <= $n && $n < 29) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif (20 <= $n && $n < 25) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        } elseif ($n > 0 &&  $n < 20) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<th style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></th>';
        }
    }

    //    Penduduk

    if ($kd_indi == 4) {


        echo '<td style="text-align: center; ">' . number_format($n, 0, ",", ".") . '</td>';
    }

    // Indeks pembangunan gender

    if ($kd_indi == 30) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 91.39) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (90 <= $n && $n < 91.39) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (80 <= $n && $n < 90) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 &&  $n < 80) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // Indeks pemberdayaan gender

    if ($kd_indi == 31) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 74.18) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (70 <= $n && $n < 74.18) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (60 <= $n && $n < 70) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 &&  $n < 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // Persentase Penduduk Miskin Ekstrem (ME)

    if ($kd_indi == 36) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 0) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (0 < $n && $n <= 2) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (2 < $n && $n < 5) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 5) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // miskin

    if ($kd_indi == 35) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 7) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (7 < $n && $n <= 9.6) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (9.6 < $n && $n < 12) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 12) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // perempuan dalam parlemen

    if ($kd_indi == 32) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 30) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (20 < $n && $n <= 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (10 < $n && $n <= 20) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n <= 10) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // capaian akte kelahiran

    if ($kd_indi == 42) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (80 <= $n && $n < 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (60 <= $n && $n < 80) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 && $n < 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    //  Rata rata usia sekolah

    if ($kd_indi == 26) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 9) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (7.5 <= $n && $n < 9) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (6 <= $n && $n < 7.5) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 && $n < 6) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // pengangguran terbuka

    if ($kd_indi == 28) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n <= 4.3) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (4.3 < $n && $n <= 6.5) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (6.5 < $n && $n < 8.5) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 8.5) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }


    // Angka kenatian Ibu

    if ($kd_indi == 18) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 183) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (183 <= $n && $n < 200) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (200 <= $n && $n < 300) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 300) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // partisipasi sekolah 7 - 12

    if ($kd_indi == 23) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (95 <= $n && $n < 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (90 <= $n && $n < 95) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 &&  $n < 90) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }


    // partisipasi sekolah 13 - 15

    if ($kd_indi == 24) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (95 <= $n && $n < 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (90 <= $n && $n < 95) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 &&  $n < 90) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // partisipasi sekolah 16 - 18

    if ($kd_indi == 25) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 80) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (70 <= $n && $n < 80) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (60 <= $n && $n < 70) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 &&  $n < 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // Penduduk perkotaan

    if ($kd_indi == 37) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        // if (60 < $n && $n <= 70) {

        if (60 < $n && $n <= 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (50 <= $n && $n < 60) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (40 <= $n && $n < 50) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 &&  $n < 40) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // rumah layak huni

    if ($kd_indi == 33) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if (70 < $n) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (60 <= $n && $n < 70) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (50 <= $n && $n < 60) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 &&  $n < 50) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // prevalensi stunting

    if ($kd_indi == 20) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n <= 14) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (14 < $n && $n <= 20) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (20 < $n && $n <= 30) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 30) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // 27 Proporsi penduduk lansia

    if ($kd_indi == 8) {

        if ($n == 0) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 10) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (10 <= $n && $n < 15) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (15 <= $n && $n < 20) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 20) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // Gini ratio

    if ($kd_indi == 29) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n <= 0.374) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (0.374 < $n && $n <= 0.385) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (0.385 < $n && $n <= 4) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 4) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // kepadatan penduduk

    if ($kd_indi == 38) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 200) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (200 <= $n && $n < 300) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (300 <= $n && $n < 1000) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 1000) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // risen rasio
    if ($kd_indi == 39) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > -1 && $n < 1) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (-5 <= $n && $n <= -1) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (1 <= $n && $n <= 5) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (-10 <= $n && $n < -5) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (5 <= $n && $n < 10) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n < -10) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 10) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // migeasi seumur hidup

    if ($kd_indi == 40) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > -1 && $n < 1 && $n != 0) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (-5 <= $n && $n <= -1 && $n != 0) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (1 <= $n && $n <= 5 && $n != 0) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (-10 <= $n && $n < -5 && $n != 0) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (5 <= $n && $n < 10 && $n != 0) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n < -10 && $n != 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n < -10 && $n != 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // pembangunan keluarga

    if ($kd_indi == 45) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 61) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (59 <= $n && $n < 61) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (50 <= $n && $n < 59) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 && $n < 50) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // median kawin pertama

    if ($kd_indi == 15) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if (21 <= $n  && $n < 23) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (20 <= $n && $n < 21) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (23 <= $n && $n < 25) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (19 <= $n && $n < 20) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (25 <= $n && $n < 27) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n < 19 && $n > 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 27) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // indeks pembangunan manusia

    if ($kd_indi == 43) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 80) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (70 <= $n && $n < 80) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (60 <= $n && $n < 70) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 && $n < 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // Angka kematian balita

    if ($kd_indi == 44) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 25) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (25 <= $n && $n < 45) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (45 <= $n && $n < 55) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 55) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // angka kelahiran kasar

    if ($kd_indi == 46) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 20) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (20 <= $n && $n < 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (30 <= $n && $n < 40) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 40) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // tipologi binus geografi

    if ($kd_indi == 11) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 4) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n == 3) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n == 2) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n == 1) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // air bersih

    if ($kd_indi == 34) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (90 <= $n && $n < 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (80 <= $n && $n < 90) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n > 0 && $n < 80) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    //     // Akses terhadap sanitasi

    if ($kd_indi == 47) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 90) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (80 <= $n && $n < 90) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (70 <= $n && $n < 80) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n < 70) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // perkawinana anak

    if ($kd_indi == 48) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 &&  $n <= 8.74) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (8.74 < $n && $n < 11) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (11 <= $n && $n < 13) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (13 <= $n && $n < 17) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // jkn

    if ($kd_indi == 50) {

        if (!$n) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 98) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (85 <= $n && $n < 98) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (70 <= $n && $n < 85) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (0 < $n && $n < 70) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }

    // angka putus kb

    if ($kd_indi == 16) {

        if ($n == 0) {

            $n = "-";
            $bg1 = "background-color:  ; ";
            $color = "white";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 25) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (25 <= $n && $n < 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif (30 <= $n && $n < 35) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        } elseif ($n >= 35) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }
    }
}
