<?php

function hitung($kdwil, $kd_indi, $n)

{

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
}
