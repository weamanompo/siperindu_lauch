<?php

function pilar($n, $kdindina, $koneksi, $kdwil, $kdplr)
{

  // Laju Pertumbuhan penduduk

  if ($kdindina == 5) {

    if ($n > 0 &&  $n < 1) {

      $skor = 1;
    } elseif (1 <= $n && $n < 1.5) {

      $skor = 2;
    } elseif (1.5 <= $n && $n < 2) {

      $skor = 3;
    } elseif ($n >= 2) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

    VALUES 

    ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // ketergantungan

  if ($kdindina == 7) {

    if ($n > 0 &&  $n < 50) {

      $skor = 1;
    } elseif (50 <= $n && $n < 55) {

      $skor = 2;
    } elseif (55 <= $n && $n < 60) {

      $skor = 3;
    } elseif ($n >= 60) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

    VALUES 

    ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // Rasio Jenis Kelamin

  if ($kdindina == 6) {

    if ($n == 100) {

      $skor = 1;
    } elseif (100 < $n && $n <= 105) {

      $skor = 2;
    } elseif (95 < $n && $n <= 100) {
      $skor = 2;
    } elseif (105 < $n && $n <= 110) {

      $skor = 3;
    } elseif (90 < $n && $n <= 95) {

      $skor = 3;
    } elseif ($n > 110 ||  $n <= 90) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

    VALUES 

    ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // CPR MODERN

  if ($kdindina == 12) {

    if ($n > 60) {

      $skor = 1;
    } elseif (50 < $n && $n <= 60) {

      $skor = 2;
    } elseif (40 <= $n && $n <= 50) {

      $skor = 3;
    } elseif ($n < 40) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

    VALUES 

    ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }


  // TFR

  if ($kdindina == 9) {

    if ($n >= 2 && $n <= 2.19) {

      $skor = 1;
    } elseif (2.2 <= $n && $n <= 2.39) {

      $skor = 2;
    } elseif (1.8 <= $n && $n <= 1.99) {

      $skor = 2;
    } elseif (2.4 < $n && $n <= 2.69) {

      $skor = 3;
    } elseif ($n > 0 && $n <= 1.8) {

      $skor = 3;
    } elseif ($n >= 2.7) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

    VALUES 

    ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // ASFR

  if ($kdindina == 10) {

    if ($n < 18) {

      $skor = 1;
    } elseif (18 <= $n && $n < 30) {

      $skor = 2;
    } elseif (30 <= $n && $n < 40) {

      $skor = 3;
    } elseif (40 <= $n) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

    VALUES 

    ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // AKB KEmatian Bayi

  if ($kdindina == 19) {

    if ($n < 16) {

      $skor = 1;
    } elseif (16 <= $n && $n < 30) {

      $skor = 2;
    } elseif (30 <= $n && $n < 40) {

      $skor = 3;
    } elseif (40 <= $n) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Harapan Hidup

  if ($kdindina == 17) {

    if ($n > 75) {

      $skor = 1;
    } elseif (70 < $n && $n <= 75) {

      $skor = 2;
    } elseif (65 < $n && $n <= 70) {

      $skor = 3;
    } elseif ($n <=  65 &&  0 < $n) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // MKJP

  if ($kdindina == 13) {

    if ($n > 29) {

      $skor = 1;
    } elseif (25 <= $n && $n < 29) {

      $skor = 2;
    } elseif (20 <= $n && $n < 25) {

      $skor = 3;
    } elseif ($n > 0 &&  $n < 20) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // UNMET NEED

  if ($kdindina == 14) {

    if ($n > 0 && $n < 7.5) {

      $skor = 1;
    } elseif (7.5 <= $n && $n < 8) {

      $skor = 2;
    } elseif (8 <= $n && $n < 9.9) {

      $skor = 3;
    } elseif ($n >=  9.9) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Indeks pembangunan gender

  if ($kdindina == 30) {

    if ($n >= 91.39) {

      $skor = 1;
    } elseif (90 <= $n && $n < 91.39) {

      $skor = 2;
    } elseif (80 <= $n && $n < 90) {

      $skor = 3;
    } elseif ($n > 0 &&  $n < 80) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }


  // Indeks pemberdayaan gender

  if ($kdindina == 31) {

    if ($n >= 74.18) {

      $skor = 1;
    } elseif (70 <= $n && $n < 74.18) {

      $skor = 2;
    } elseif (60 <= $n && $n < 70) {

      $skor = 3;
    } elseif ($n > 0 &&  $n < 60) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Persentase Penduduk Miskin Ekstrem (ME)

  if ($kdindina == 36) {

    if ($n == 0.001) {

      $skor = 1;
    } elseif (0 < $n && $n <= 2) {

      $skor = 2;
    } elseif (2 < $n && $n < 5) {

      $skor = 3;
    } elseif ($n >= 5) {
      $skor = 4;
    }
    if ($n == 0) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Persentase Penduduk Miskin 

  if ($kdindina == 35) {

    if ($n > 0 && $n < 7) {

      $skor = 1;
    } elseif (7 < $n && $n <= 9.6) {

      $skor = 2;
    } elseif (9.6 < $n && $n < 12) {

      $skor = 3;
    } elseif ($n >= 12) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Perempuan dalam parlemen

  if ($kdindina == 32) {

    if ($n > 30) {

      $skor = 1;
    } elseif (20 < $n && $n <= 30) {

      $skor = 2;
    } elseif (10 < $n && $n <= 20) {

      $skor = 3;
    } elseif ($n <= 10) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Capaian akta kelahiran

  if ($kdindina == 42) {

    if ($n == 100) {

      $skor = 1;
    } elseif (80 <= $n && $n < 100) {

      $skor = 2;
    } elseif (60 <= $n && $n < 80) {

      $skor = 3;
    } elseif ($n > 0 && $n < 60) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // rata rata usia sekolah

  if ($kdindina == 26) {

    if ($n >= 9) {

      $skor = 1;
    } elseif (7.5 <= $n && $n < 9) {

      $skor = 2;
    } elseif (6 <= $n && $n < 7.5) {

      $skor = 3;
    } elseif ($n > 0 && $n < 6) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // pengangguran terbuka


  if ($kdindina == 28) {

    if ($n > 0 && $n <= 4.3) {

      $skor = 1;
    } elseif (4.3 < $n && $n <= 6.5) {

      $skor = 2;
    } elseif (6.5 < $n && $n < 8.5) {

      $skor = 3;
    } elseif ($n > 8.5) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Angka kematian Ibu

  if ($kdindina == 18) {

    if ($n > 0 && $n < 183) {

      $skor = 1;
    } elseif (183 <= $n && $n < 200) {

      $skor = 2;
    } elseif (200 <= $n && $n < 300) {

      $skor = 3;
    } elseif ($n >= 300) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Angka partisipasi sekolah 7 - 12

  if ($kdindina == 23) {

    if ($n == 100) {

      $skor = 1;
    } elseif (95 <= $n && $n < 100) {

      $skor = 2;
    } elseif (90 <= $n && $n < 95) {

      $skor = 3;
    } elseif ($n > 0 &&  $n < 90) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }


  // Angka partisipasi sekolah 13 - 15

  if ($kdindina == 24) {

    if ($n == 100) {

      $skor = 1;
    } elseif (95 <= $n && $n < 100) {

      $skor = 2;
    } elseif (90 <= $n && $n < 95) {

      $skor = 3;
    } elseif ($n > 0 &&  $n < 90) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Angka partisipasi sekolah 16 - 18

  if ($kdindina == 25) {

    if ($n >= 80) {

      $skor = 1;
    } elseif (70 <= $n && $n < 80) {

      $skor = 2;
    } elseif (60 <= $n && $n < 70) {

      $skor = 3;
    } elseif ($n > 0 &&  $n < 60) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Penduduk perkotaan

  if ($kdindina == 37) {

    // if (60 < $n && $n <= 70) {

    if (60 < $n && $n <= 100) {

      $skor = 1;
    } elseif (50 <= $n && $n < 60) {

      $skor = 2;
    } elseif (40 <= $n && $n < 50) {

      $skor = 3;
    } elseif ($n > 0 &&  $n < 40) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Layak Huni

  if ($kdindina == 33) {

    if (70 < $n) {

      $skor = 1;
    } elseif (60 <= $n && $n < 70) {

      $skor = 2;
    } elseif (50 <= $n && $n < 60) {

      $skor = 3;
    } elseif ($n > 0 &&  $n < 50) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // prevalensi stunting

  if ($kdindina == 20) {

    if ($n > 0 && $n <= 14) {

      $skor = 1;
    } elseif (14 < $n && $n <= 20) {

      $skor = 2;
    } elseif (20 < $n && $n <= 30) {

      $skor = 3;
    } elseif ($n > 30) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip
  
    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // Gini Ratio

  if ($kdindina == 29) {

    if ($n > 0 && $n <= 0.374) {

      $skor = 1;
    } elseif (0.374 < $n && $n <= 0.385) {

      $skor = 2;
    } elseif (0.385 < $n && $n <= 4) {

      $skor = 3;
    } elseif ($n >= 4) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip
  
    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // kepadatan penduduk

  if ($kdindina == 38) {

    if ($n > 0 && $n < 200) {

      $skor = 1;
    } elseif (200 <= $n && $n < 300) {

      $skor = 2;
    } elseif (300 <= $n && $n < 1000) {

      $skor = 3;
    } elseif ($n >= 1000) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip
  
    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // risen netto

  if ($kdindina == 39) {

    if ($n > -1 && $n < 1) {

      $skor = 1;
    } elseif (-5 <= $n && $n <= -1) {

      $skor = 2;
    } elseif (1 <= $n && $n <= 5) {

      $skor = 2;
    } elseif (-10 <= $n && $n < -5) {

      $skor = 3;
    } elseif (5 <= $n && $n < 10) {

      $skor = 3;
    } elseif ($n < -10) {
      $skor = 4;
    } elseif ($n > 10) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip
  
    VALUES 
    ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // migrasi seumur hidup

  if ($kdindina == 40) {

    if ($n > -1 && $n < 1) {

      $skor = 1;
    } elseif (-5 <= $n && $n <= -1) {

      $skor = 2;
    } elseif (1 <= $n && $n <= 5) {

      $skor = 2;
    } elseif (-10 <= $n && $n < -5) {

      $skor = 3;
    } elseif (5 <= $n && $n < 10) {

      $skor = 3;
    } elseif ($n < -10) {
      $skor = 4;
    } elseif ($n > 10) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

  VALUES 
  ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // pembangunan keluarga

  if ($kdindina == 45) {

    if ($n >= 61) {

      $skor = 1;
    } elseif (59 <= $n && $n < 61) {

      $skor = 2;
    } elseif (50 <= $n && $n < 59) {

      $skor = 3;
    } elseif ($n > 0 && $n < 50) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

  VALUES 

  ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // median kawin pertama

  if ($kdindina == 15) {

    if (21 <= $n  && $n < 23) {

      $skor = 1;
    } elseif (20 <= $n && $n < 21) {

      $skor = 2;
    } elseif (23 <= $n && $n < 25) {

      $skor = 2;
    } elseif (19 <= $n && $n < 20) {

      $skor = 3;
    } elseif (25 <= $n && $n < 27) {

      $skor = 3;
    } elseif ($n < 19 && $n > 0) {
      $skor = 4;
    } elseif ($n >= 27) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }

    $query11 = "INSERT INTO wip

  VALUES 
  ('',  '$kdwil','$kdplr','$kdindina', '$skor' )";

    mysqli_query($koneksi, $query11);
  }

  // indeks pembangunan manusia

  if ($kdindina == 43) {

    if ($n >= 80) {

      $skor = 1;
    } elseif (70 <= $n && $n < 80) {

      $skor = 2;
    } elseif (60 <= $n && $n < 70) {

      $skor = 3;
    } elseif ($n > 0 && $n < 60) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

VALUES 

('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // angka kematian balita

  if ($kdindina == 44) {

    if ($n > 0 && $n < 25) {

      $skor = 1;
    } elseif (25 <= $n && $n < 45) {

      $skor = 2;
    } elseif (45 <= $n && $n < 55) {

      $skor = 3;
    } elseif ($n >= 55) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

VALUES 

('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }


  // angka kelahiran kasar

  if ($kdindina == 46) {

    if ($n > 0 && $n < 20) {

      $skor = 1;
    } elseif (20 <= $n && $n < 30) {

      $skor = 2;
    } elseif (30 <= $n && $n < 40) {

      $skor = 3;
    } elseif ($n >= 40) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

VALUES 

('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // bonus demografi


  if ($kdindina == 11) {

    if ($n == 4) {

      $skor = 1;
    } elseif ($n == 3) {

      $skor = 2;
    } elseif ($n == 2) {

      $skor = 3;
    } elseif ($n == 1) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

VALUES 

('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // proposi lansia


  if ($kdindina == 8) {

    if ($n > 0 && $n < 10) {

      $skor = 1;
    } elseif (10 <= $n && $n < 15) {

      $skor = 2;
    } elseif (15 <= $n && $n < 20) {

      $skor = 3;
    } elseif ($n >= 20) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

VALUES 

('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // air bersih 

  if ($kdindina == 34) {

    if ($n == 100) {

      $skor = 1;
    } elseif (90 <= $n && $n < 100) {

      $skor = 2;
    } elseif (80 <= $n && $n < 90) {

      $skor = 3;
    } elseif ($n > 0 && $n < 80) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

VALUES 

('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  //  sanitasi

  if ($kdindina == 47) {

    if ($n >= 90) {

      $skor = 1;
    } elseif (80 <= $n && $n < 90) {

      $skor = 2;
    } elseif (70 <= $n && $n < 80) {

      $skor = 3;
    } elseif ($n < 70) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

VALUES 

('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  //  perkawinan anak

  if ($kdindina == 48) {

    if ($n > 0 &&  $n <= 8.74) {

      $skor = 1;
    } elseif (8.74 < $n && $n < 11) {

      $skor = 2;
    } elseif (11 <= $n && $n < 13) {

      $skor = 3;
    } elseif (13 <= $n && $n < 17) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

VALUES 

('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }


  // cakupan jkn

  if ($kdindina == 50) {

    if ($n >= 98) {

      $skor = 1;
    } elseif (85 <= $n && $n < 98) {

      $skor = 2;
    } elseif (70 <= $n && $n < 85) {

      $skor = 3;
    } elseif (0 < $n && $n < 70) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

      VALUES 

    ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }

  // angka putus kb

  if ($kdindina == 16) {

    if ($n > 0 && $n < 25) {

      $skor = 1;
    } elseif (25 <= $n && $n < 30) {

      $skor = 2;
    } elseif (30 <= $n && $n < 35) {

      $skor = 3;
    } elseif ($n >= 35) {
      $skor = 4;
    }
    if (!$n) {
      $skor = 5;
    }


    $query11 = "INSERT INTO wip

      VALUES 

    ('', '$kdwil','$kdplr','$kdindina', '$skor')";

    mysqli_query($koneksi, $query11);
  }
}
