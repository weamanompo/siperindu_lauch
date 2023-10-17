<?php

function warnatable($n, $kd_indi, $kdwil)

{

    // Harapan Hidup

    if ($kd_indi == 17) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "light";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 75) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (70 < $n && $n <= 75) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (65 < $n && $n <= 70) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n <=  65 && $n != 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // ASFR

    if ($kd_indi == 10) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 18) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (18 <= $n && $n < 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (30 <= $n && $n < 40) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >=  40) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //  unmet need

    if ($kd_indi == 14) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 7.5) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (7.5 <= $n && $n < 10) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (10 <= $n && $n < 15) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >=  15) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //  tfr

    if ($kd_indi == 9) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 2 && $n <= 2.19) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (2.2 <= $n && $n <= 2.39) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (1.8 <= $n && $n <= 1.99) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (2.4 < $n && $n <= 2.69) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 && $n <= 1.8) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >= 2.7) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //  CPR Modern

    if ($kd_indi == 12) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 60) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (50 < $n && $n <= 60) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (40 <= $n && $n <= 50) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 && $n < 40) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //  Rasio Jenis Kelamin

    if ($kd_indi == 6) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (100 < $n && $n <= 105) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (95 < $n && $n <= 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (105 < $n && $n <= 110) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (90 < $n && $n <= 95) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 &&  $n <= 90) {
            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }elseif ($n > 110 ) {
            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //  Angka Kematian Bayi

    if ($kd_indi == 19) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 16) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (16 <= $n && $n < 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (30 <= $n && $n < 40) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (40 <= $n) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //    ketergantungan

    if ($kd_indi == 7) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 &&  $n < 50) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (50 <= $n && $n < 55) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (55 <= $n && $n < 60) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >= 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //    Laju Pertumbuhan Penduduk

    if ($kd_indi == 5) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 &&  $n < 1) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (1 <= $n && $n < 1.5) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (1.5 <= $n && $n < 2) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >= 2) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }


    //    MKJP

    if ($kd_indi == 13) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 29) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (25 <= $n && $n < 29) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (20 <= $n && $n < 25) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 &&  $n < 20) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //    Penduduk

    if ($kd_indi == 4) {


        echo '<td style="text-align: center; ">' . number_format($n, 0, ",", ".") . '</td>';
    }


    // Indeks pembangunan gender

    if ($kd_indi == 30) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 91.39) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (90 <= $n && $n < 91.39) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (80 <= $n && $n < 90) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 &&  $n < 80) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // Indeks pemberdayaan gender

    if ($kd_indi == 31) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 74.18) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (70 <= $n && $n < 74.18) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (60 <= $n && $n < 70) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 &&  $n < 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // Persentase Penduduk Miskin Ekstrem (ME)

    if ($kd_indi == 36) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#0007d";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 0.00001) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (0 < $n && $n <= 2) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (2 < $n && $n < 5) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >= 5) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // Persentase Penduduk Miskin 

    if ($kd_indi == 35) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 7) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (7 < $n && $n <= 9.6) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (9.6 < $n && $n < 12) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >= 12) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // Perempuan dalam parlemen

    if ($kd_indi == 32) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 30) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (20 < $n && $n <= 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (10 < $n && $n <= 20) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n <= 10) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // capaian akta kelahiran

    if ($kd_indi == 42) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (80 <= $n && $n < 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (60 <= $n && $n < 80) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n > 0 && $n < 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // rata rata usia sekolah

    if ($kd_indi == 26) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 9) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (7.5 <= $n && $n < 9) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (6 <= $n && $n < 7.5) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n > 0 && $n < 6) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // pengangguran terbuka

    if ($kd_indi == 28) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n <= 4.3) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (4.3 < $n && $n <= 6.5) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (6.5 < $n && $n < 8.5) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 8.5) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // Angka kematian Ibu

    if ($kd_indi == 18) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 183) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (183 <= $n && $n < 200) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (200 <= $n && $n < 300) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >= 300) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //  Angka Partisipasi Sekolah 7-12 tahun (APS)

    if ($kd_indi == 23) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
                <input id="bench" type="text" value="1" hidden>
                <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
                </td>';
        } elseif (95 <= $n && $n < 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
                <input id="bench" type="text" value="2" hidden>
                <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
                </td>';
        } elseif (90 <= $n && $n < 95) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
                <input id="bench" type="text" value="3" hidden>
                <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
                </td>';
        } elseif ($n > 0 &&  $n < 90) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
                <input id="bench" type="text" value="4" hidden>
                <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
                </td>';
        }
    }

    //  Angka Partisipasi Sekolah 13-15 tahun (APS)

    if ($kd_indi == 24) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (95 <= $n && $n < 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (90 <= $n && $n < 95) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 &&  $n < 90) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    //  Angka Partisipasi Sekolah 16-18 tahun (APS)

    if ($kd_indi == 25) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 80) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (70 <= $n && $n < 80) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (60 <= $n && $n < 70) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 &&  $n < 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // Penduduk Perkotaan

    if ($kd_indi == 37) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        // if (60 < $n && $n <= 70) {

        if (60 < $n && $n <= 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (50 <= $n && $n < 60) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (40 <= $n && $n < 50) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 &&  $n < 40) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // rumah layak huni

    if ($kd_indi == 33) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if (70 < $n) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (60 <= $n && $n < 70) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (50 <= $n && $n < 60) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 0 &&  $n < 50) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // prevalensi stunting

    if ($kd_indi == 20) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n <= 14) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (14 < $n && $n <= 20) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (20 < $n && $n <= 30) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n > 30) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // 27 Proporsi penduduk lansia

    if ($kd_indi == 8) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 10) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="1" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (10 <= $n && $n < 15) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (15 <= $n && $n < 20) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n >= 20) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        }
    }

    // Gini Ratio

    if ($kd_indi == 29) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n <= 0.374) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (0.374 < $n && $n <= 0.385) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (0.385 < $n && $n <= 4) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n >= 4) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // kepadatan penduduk

    if ($kd_indi == 38) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 200) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (200 <= $n && $n < 300) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (300 <= $n && $n < 1000) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n >= 1000) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // risen rasio

    if ($kd_indi == 39) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > -1 && $n < 1 && $n != 0) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
    } elseif (-5 <= $n && $n <= -1 && $n != 0) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (1 <= $n && $n <= 5 && $n != 0) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (-10 <= $n && $n < -5 && $n != 0) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (5 <= $n && $n < 10 && $n != 0) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n < -10 && $n != 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 10 && $n != 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // migrasi seumur hidup

    if ($kd_indi == 40) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > -1 && $n < 1 && $n != 0) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
    } elseif (-5 <= $n && $n <= -1 && $n != 0) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (1 <= $n && $n <= 5 && $n != 0) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="2" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (-10 <= $n && $n < -5 && $n != 0) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif (5 <= $n && $n < 10 && $n != 0) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="3" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n < -10 && $n != 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
            <input id="bench" type="text" value="4" hidden>
            <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
            </td>';
        } elseif ($n > 10 && $n != 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // pembangunan keluarga

    if ($kd_indi == 45) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 61) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (59 <= $n && $n < 61) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (50 <= $n && $n < 59) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n > 0 && $n < 50) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // median kawin pertama

    if ($kd_indi == 15) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if (21 <= $n  && $n < 23) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
    <input id="bench" type="text" value="1" hidden>
    <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
    </td>';
        } elseif (20 <= $n && $n < 21) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (23 <= $n && $n < 25) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (19 <= $n && $n < 20) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (25 <= $n && $n < 27) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n < 19 && $n > 0) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n >= 27) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
    <input id="bench" type="text" value="4" hidden>
    <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
    </td>';
        }
    }

    //    IPM indeks pembangunan manusia

    if ($kd_indi == 43) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 80) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (70 <= $n && $n < 80) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (60 <= $n && $n < 70) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n > 0 && $n < 60) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    //    angka kematian balita

    if ($kd_indi == 44) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 25) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (25 <= $n && $n < 45) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (45 <= $n && $n < 55) {


            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n >= 55) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // angka kelahiran kasar

    if ($kd_indi == 46) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 20) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (20 <= $n && $n < 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (30 <= $n && $n < 40) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n >= 40) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // tipologi bonus demografi

    if ($kd_indi == 11) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 4) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n == 3) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n == 2) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n == 1) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // air bersih

    if ($kd_indi == 34) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n == 100) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (90 <= $n && $n < 100) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (80 <= $n && $n < 90) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n > 0 && $n < 80) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    //  sanitasi

    if ($kd_indi == 47) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 90) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
    <input id="bench" type="text" value="1" hidden>
    <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
    </td>';
        } elseif (80 <= $n && $n < 90) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
    <input id="bench" type="text" value="2" hidden>
    <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
    </td>';
        } elseif (70 <= $n && $n < 80) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
    <input id="bench" type="text" value="3" hidden>
    <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
    </td>';
        } elseif ($n > 0 && $n < 70) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
    <input id="bench" type="text" value="4" hidden>
    <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
    </td>';
        }
    }

    // perkawinana anak

    if ($kd_indi == 48) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 &&  $n <= 8.74) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (8.74 < $n && $n < 11) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (11 <= $n && $n < 13) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (13 <= $n && $n < 17) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // JKN

    if ($kd_indi == 50) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n >= 98) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (85 <= $n && $n < 98) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (70 <= $n && $n < 85) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (0 < $n && $n < 70) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }

    // Angka putus kb

    if ($kd_indi == 16) {

        if ($n == 0) {

            $n = "*";
            $bg1 = "background-color:  ; ";
            $color = "#000";
            $bg = "secondary";

            echo '<td style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#modal-' . $bg . '' . $kd_indi . '"><b>' . $n . '</b></a></td>';
        }

        if ($n > 0 && $n < 25) {

            $bg1 = "background-color: #1C82AD ; ";
            $color = "white";
            $bg = "primary";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="1" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (25 <= $n && $n < 30) {

            $bg1 = "background-color: #198754 ; ";
            $color = "white";
            $bg = "success";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="2" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif (30 <= $n && $n < 35) {

            $bg1 = "background-color: #ffc107 ; ";
            $color = "black";
            $bg = "warning";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="3" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        } elseif ($n >= 35) {

            $bg = "danger";
            $bg1 = "background-color: #dc3545 ; ";
            $color = "white";
            echo '<td id="ambil" style="text-align: center; ' . $bg1 . ' color : ' . $color . ' "><a href="" style="color : ' . $color . '" data-bs-toggle="modal" data-bs-target="#exampleModal"><b>' . $n . '</b></a>
        <input id="bench" type="text" value="4" hidden>
        <input id="wilayah" type="text" value="';
            echo $kdwil;
            echo '" hidden>';
            echo '<input id="indikator" type="text" value="';
            echo $kd_indi;
            echo '" hidden>
        </td>';
        }
    }
}
