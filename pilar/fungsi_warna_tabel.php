<?php

function warnapilar($n,$kd_indi){

// laju pertmuhan pemduduk

                    if ($kd_indi == 5) {

                        if ($n > 0 &&  $n < 1 ) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";

                     } elseif (1 <= $n && $n < 1.5) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";

              } elseif (1.5 <= $n && $n < 2) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";

                        } elseif ($n >= 2) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";

                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }
                    // Ketergantungan

                    if ($kd_indi == 7) {

                          if ($n > 0 &&  $n < 50 ) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";

                    } elseif (50 <= $n && $n < 55) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";

                        } elseif (55 <= $n && $n < 60) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";

                        } elseif ($n >= 60) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";

                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Rasio Jenis Kelamin

                    if ($kd_indi == 6) {

                           if ($n == 100 ) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";

                    } elseif (100 < $n && $n <= 105) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";

                    }elseif (95 < $n && $n <= 100) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";

                     } 
 
 elseif (105 < $n && $n <= 110) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";

        }  elseif (90 < $n && $n <= 95) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";

        }
        
        elseif ($n > 110 ||  $n <= 90) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";

                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                     // CPR Modern

                    if ($kd_indi == 12) {

                          if ($n > 60 ) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";

                    } elseif (50 < $n && $n <= 60) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";

                        } elseif (40 <= $n && $n <= 50) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";

                        } elseif ($n < 40) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";

                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // TFR

                    if ($kd_indi == 9) {

                          if ($n > 0 && $n <= 2.1 ) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";

                    } elseif (2.1 < $n && $n <= 2.5) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";

                        } elseif (2.5 < $n && $n <= 3) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";

                        } elseif ($n > 3) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";

                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

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
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }



                    // AKB KEmatian Bayi

                    if ($kd_indi == 19) {

                      if ($n < 16) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";

                      } elseif (16 <= $n && $n < 30) {

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
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    // Harapan Hidup

                    if ($kd_indi == 17) {

                      if ($n > 75) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";

                      } elseif (70 < $n && $n <= 75) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";

                      } elseif (65 < $n && $n <= 70) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";

                      } elseif ($n <=  65 &&  0 < $n) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";

                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

                    

                     // MKJP

                    if ($kd_indi == 13) {

                        if ($n > 29 ) {

                        $bg1 = "background-color: #6096B4 ; ";
                        $color = "white";
                        $bg = "primary";

                      } elseif (25 <= $n && $n < 29) {

                        $bg1 = "background-color: #1F8A70 ; ";
                        $color = "white";
                        $bg = "success";

              } elseif (20 <= $n && $n < 25) {

                        $bg1 = "background-color: #ffc107 ; ";
                        $color = "black";
                        $bg = "warning";

                        } elseif ($n > 0 &&  $n < 20) {
                        $bg = "danger";
                        $bg1 = "background-color: #dc3545 ; ";
                        $color = "white";

                      }
                      if (!$n) {
                        $n = "-";
                        $bg1 = "background-color:  ; ";
                      }
                    }

}