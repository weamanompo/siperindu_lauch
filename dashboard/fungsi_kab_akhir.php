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
}
