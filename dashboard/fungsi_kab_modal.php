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
}
