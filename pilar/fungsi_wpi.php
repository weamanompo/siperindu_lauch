<?php


function wpi($n, $kd_indi, $kdwil )

{

    // ASFR


    if ($kd_indi == 10) {

        if ($n < 18) {

              $bg1 = "background-color: #6096B4 ; ";
                      $color = "white";
                      $bg = "primary";
            
        } elseif (18 <= $n && $n < 30) {

           $bg1 = "background-color: #1F8A70 ; ";
                      $color = "white";
                      $bg = "success";
        } elseif (30 <= $n && $n < 40) {

                $bg1 = "background-color: #ffc107 ; ";
                      $color = "black";
                      $bg = "warning";

        } elseif (40 <= $n) {
   $bg = "danger";
                      $bg1 = "background-color: #dc3545 ; ";
                      $color = "white";
           
        }

        if (!$n) {

           
        }
    }

}