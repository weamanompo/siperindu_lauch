<?php


function warnakab($n, $kd_indi, $kdwil)

{

    // ASFR

    if ($kd_indi == 10) {

        if ($n > 0 && $n < 18) {

            echo '<path fill="#0099cb"';
        } elseif (18 <= $n && $n < 30) {

            echo '<path fill="#21ae41"';
        } elseif (30 <= $n && $n < 40) {

            echo '<path fill="#eef200"';
        } elseif (40 <= $n) {

            echo '<path fill="#ff4441"';
        } else {

            echo '<path fill="#ffffff"';
        }
    }

    // rasio ketergantungan

    if ($kd_indi == 7) {

        if ($n > 0 &&  $n < 50) {

            echo '<path fill="#0099cb"';
        } elseif (50 <= $n && $n < 55) {

            echo '<path fill="#21ae41"';
        } elseif (55 <= $n && $n < 60) {

            echo '<path fill="#eef200"';
        } elseif ($n >= 60) {

            echo '<path fill="#ff4441"';
        } else {

            echo '<path fill="#ffffff"';
        }
    }

    // Harapan Hidup

    if ($kd_indi == 17) {

        if ($n > 75) {

            echo '<path fill="#0099cb"';
        } elseif (70 < $n && $n <= 75) {

            echo '<path fill="#21ae41"';
        } elseif (65 < $n && $n <= 70) {

            echo '<path fill="#eef200"';
        } elseif ($n <=  65) {

            echo '<path fill="#ff4441"';
        } else {

            echo '<path fill="#ffffff"';
        }
    }
}
