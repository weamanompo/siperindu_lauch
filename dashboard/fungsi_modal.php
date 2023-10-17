<?php


function modal($n, $kd_indi, $kdwil)

{

    // ASFR

    if ($kd_indi == 10) {

        if ($n > 0 && $n < 18) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (18 <= $n && $n < 30) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (30 <= $n && $n < 40) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (40 <= $n) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // harapan hidup

    if ($kd_indi == 17) {

        if ($n > 75) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (70 < $n && $n <= 75) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (65 < $n && $n <= 70) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n <=  65) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Unmet need

    if ($kd_indi == 14) {

        if ($n > 0 && $n < 7.5) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (7.5 <= $n && $n < 8) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (8 <= $n && $n < 9.9) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >=  9.9) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // tfr

    if ($kd_indi == 9) {

        if ($n > 0 && $n <= 2.1) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (2.1 < $n && $n <= 2.5) {
            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (2.5 < $n && $n <= 3) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 3) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // CPR Modern

    if ($kd_indi == 12) {

        if ($n > 60) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (50 < $n && $n <= 60) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (40 <= $n && $n <= 50) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 && $n < 40) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Rasio Jenis Kelamin

    if ($kd_indi == 6) {

        if ($n == 100) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (100 < $n && $n <= 105) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (95 < $n && $n <= 100) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (105 < $n && $n <= 110) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (90 < $n && $n <= 95) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 110 ||  $n <= 90) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Angka KEmatian Bayi

    if ($kd_indi == 19) {

        if ($n > 0 && $n < 16) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (16 <= $n && $n < 30) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (30 <= $n && $n < 40) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (40 <= $n) {


            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Ketergantungan

    if ($kd_indi == 7) {

        if ($n > 0 &&  $n < 50) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (50 <= $n && $n < 55) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (55 <= $n && $n < 60) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 60) {


            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Laju Pertumbuhan Penduduk

    if ($kd_indi == 5) {

        if ($n > 0 &&  $n < 1) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (1 <= $n && $n < 1.5) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (1.5 <= $n && $n < 2) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 2) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // mkjp

    if ($kd_indi == 13) {

        if ($n > 29) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (25 <= $n && $n < 29) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (20 <= $n && $n < 25) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 &&  $n < 20) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Indeks pembangunan gender



    if ($kd_indi == 30) {

        if ($n >= 91.39) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (90 <= $n && $n < 91.39) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (80 <= $n && $n < 90) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 &&  $n < 80) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }


    // pemberdayaan gender

    if ($kd_indi == 31) {

        if ($n >= 74.18) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (70 <= $n && $n < 74.18) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (60 <= $n && $n < 70) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 &&  $n < 60) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }


    // Persentase Penduduk Miskin 

    if ($kd_indi == 35) {

        if ($n > 0 && $n < 7) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (7 < $n && $n <= 9.6) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (9.6 < $n && $n < 12) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 12) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Persentase Penduduk Miskin  Ekstrem

    if ($kd_indi == 36) {

        if ($n == 0) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (0 < $n && $n <= 2) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (2 < $n && $n < 5) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 5) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Perempuan dalam parlemen

    if ($kd_indi == 32) {

        if ($n > 30) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (20 < $n && $n <= 30) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (10 < $n && $n <= 20) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n <= 10) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Capaian akte kelahiran

    if ($kd_indi == 42) {

        if ($n == 100) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (80 <= $n && $n < 100) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (60 <= $n && $n < 80) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 && $n < 60) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // rata rata usia sekolah

    if ($kd_indi == 26) {

        if ($n >= 9) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (7.5 <= $n && $n < 9) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (6 <= $n && $n < 7.5) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 && $n < 6) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Pengangguran terbuka

    if ($kd_indi == 28) {

        if ($n > 0 && $n <= 4.3) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (4.3 < $n && $n <= 6.5) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (6.5 < $n && $n < 8.5) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 8.5) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Angka kematian Ibu

    if ($kd_indi == 18) {

        if ($n > 0 && $n < 183) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (183 <= $n && $n < 200) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (200 <= $n && $n < 300) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 300) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Capaian sekolah 7 - 12

    if ($kd_indi == 23) {

        if ($n == 100) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (95 <= $n && $n < 100) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (90 <= $n && $n < 95) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 &&  $n < 90) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Capaian sekolah 13 - 15

    if ($kd_indi == 24) {

        if ($n == 100) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (95 <= $n && $n < 100) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (90 <= $n && $n < 95) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 &&  $n < 90) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Capaian sekolah 16 - 19

    if ($kd_indi == 25) {

        if ($n >= 80) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (70 <= $n && $n < 80) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (60 <= $n && $n < 70) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 &&  $n < 60) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Penduduk Perkotaan

    if ($kd_indi == 37) {

        // if (60 < $n && $n <= 70) {

        if (60 < $n && $n <= 100) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (50 <= $n && $n < 60) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (40 <= $n && $n < 50) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 &&  $n < 40) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Layak Huni

    if ($kd_indi == 33) {

        if (70 < $n) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (60 <= $n && $n < 70) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (50 <= $n && $n < 60) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 &&  $n < 50) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // prevalensi stunting

    if ($kd_indi == 20) {

        if ($n > 0 && $n <= 14) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (14 < $n && $n <= 20) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (20 < $n && $n <= 30) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 30) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // 27 Proporsi penduduk lansia

    if ($kd_indi == 8) {

        if ($n > 0 && $n <= 5) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (5 < $n && $n <= 7) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (7 < $n && $n <= 10) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 10) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Gini Ratio

    if ($kd_indi == 29) {

        if ($n > 0 && $n <= 0.374) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (0.374 < $n && $n <= 0.385) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (0.385 < $n && $n <= 4) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 4) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // kepadatan penduduk

    if ($kd_indi == 38) {

        if ($n > 0 && $n < 200) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (200 <= $n && $n < 300) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (300 <= $n && $n < 1000) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 1000) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // migrasi risen

    if ($kd_indi == 39) {

        if ($n > -1 && $n < 1) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (-5 <= $n && $n <= -1) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (1 <= $n && $n <= 5) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (-10 <= $n && $n < -5) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (5 <= $n && $n < 10) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n < -10) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 10) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    //  migrasi seumur hidup

    if ($kd_indi == 40) {

        if ($n > -1 && $n < 1) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (-5 <= $n && $n <= -1) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (1 <= $n && $n <= 5) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (-10 <= $n && $n < -5) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (5 <= $n && $n < 10) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n < -10) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 10) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // indeks pembangunan keluarga ibangga

    if ($kd_indi == 45) {

        if ($n >= 61) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (59 <= $n && $n < 61) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (50 <= $n && $n < 59) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 && $n < 50) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // median kawin pertama

    if ($kd_indi == 15) {

        if (21 <= $n  && $n < 23) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (20 <= $n && $n < 21) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (23 <= $n && $n < 25) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (19 <= $n && $n < 20) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (25 <= $n && $n < 27) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n < 19 && $n > 0) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 27) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // indeks pembangunan manusia

    if ($kd_indi == 43) {

        if ($n >= 80) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (70 <= $n && $n < 80) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (60 <= $n && $n < 70) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n > 0 && $n < 60) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    //  Angka kematian balita

    if ($kd_indi == 44) {

        if ($n > 0 && $n < 25) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (25 <= $n && $n < 45) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (45 <= $n && $n < 55) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 55) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }

    // Angka kelahiran kasar

    if ($kd_indi == 46) {

        if ($n > 0 && $n < 20) {

            $kon = '1';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (20 <= $n && $n < 30) {

            $kon = '2';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif (30 <= $n && $n < 40) {

            $kon = '3';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } elseif ($n >= 40) {

            $kon = '4';
            $titik = ".";

            $gab = "{$kd_indi}{$titik}{$kdwil}{$titik}{$kon}";

            $linka = '<a xlink:href="#1" onclick="edit_user(';
            $linkb = "'";
            $linkc = $gab;
            $linkd = "')";
            $linke = '"class="btn btn-xs btn-warning" data-bs-toggle="modal" data-bs-target="#user_edit">';

            $fix = "{$linka}{$linkb}{$linkc}{$linkd}{$linke}";

            echo $fix;
        } else {

            $awal = '<a xlink:href="#1" data-bs-toggle="modal" data-bs-target="#modal-';
            $bg = "danger";
            $akhir = '">';
            $fix = "-";

            echo $fix;
        }
    }
}
