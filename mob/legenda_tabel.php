<?php

function legend_tabel($kd_indi)

{

  // Fertilitas

  if ($kd_indi == 9) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">< &nbsp;  2,1</div>
      <div class=" col"></div>
      <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">2,1 s/d 2,5</div>
      <div class="col"></div>
      <div class="col bg-warning tengah" style="font-weight: bold;">2,5 s/d 3,0</div>
      <div class="col"></div>
      <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">>&nbsp;  3,0</div>';
  }

  // LAju Pertumbuhan penduduk

  if ($kd_indi == 5) {

    echo '<div class="col tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;"> &nbsp;  0 s/d 1</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">1 s/d 1,5</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">1,5 s/d 2</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">>&nbsp;  2</div>';
  }

  // Ketergantungan

  if ($kd_indi == 7) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   <&nbsp; 50 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">50 s/d 55</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">55 s/d 60</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">  ≥&nbsp; 60</div>';
  }



  // ASFR 15-19

  if ($kd_indi == 10) {

    echo '<div class="col tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;<  &nbsp;18 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">18 s/d 30</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">30 s/d 40</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">  &nbsp; >&nbsp; 40</div>';
  }

  // Harapan Hidup

  if ($kd_indi == 17) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;>&nbsp; 75 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">70 s/d 75</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">65 s/d 70</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">  &nbsp; < &nbsp;65</div>';
  }

  // Kematian Bayi

  if ($kd_indi == 19) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;< &nbsp;18 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">18 s/d 30</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">30 s/d 40</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">  &nbsp; > &nbsp;40</div>';
  }

  // Cakupan Akta Kelahiran (Usia 0-17 Tahun)

  if ($kd_indi == 42) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;=&nbsp 100 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">80 s/d 100</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">60 s/d 80</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">  &nbsp; < &nbsp; 60 </div>';
  }

  //  Cakupan KTP Elektronik

  if ($kd_indi == 41) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;=&nbsp 100 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">80 s/d 100</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">60 s/d 80</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">  &nbsp; < &nbsp; 60 </div>';
  }


  //  Penggunaan Air Bersih

  if ($kd_indi == 34) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;=&nbsp 100 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">90 s/d 100</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">80 s/d 90</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">  &nbsp; < &nbsp; 80 </div>';
  }

  //   Cakupan CPR kontrasepsi modern

  if ($kd_indi == 12) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;>&nbsp; 60 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">50 s/d 60 </div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">40 s/d 50</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">  &nbsp; < &nbsp; 40 </div>';
  }

  //   Rasio Jenis Kelamin

  if ($kd_indi == 6) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;= &nbsp; 100 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">> 95 atau < 100 </div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">> 90 atau < 95</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> > 110 atau ≤ 90  </div>';
  }

  // pembangunan gender

  if ($kd_indi == 30) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;≥ &nbsp;91,39 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;"> 90 s/d 91,39 </div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">80 s/d 90</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;<&nbsp; 80 </div>';
  }

  // pemberdayaan gender

  if ($kd_indi == 31) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;≥ &nbsp; 74,18 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;"> 70 s/d 74,18</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">60 s/d 70</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;<&nbsp; 60 </div>';
  }

  //  miskin ekstrem

  if ($kd_indi == 36) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;=&nbsp; 0 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;"> 0 s/d 2</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">2 s/d 5</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;≥&nbsp; 5 </div>';
  }

  // miskin

  if ($kd_indi == 35) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">   &nbsp;≤ &nbsp;7 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">7 s/d 9,6</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">9,6 s/d 12</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;> &nbsp;12 </div>';
  }

  //  perempuan dalamm parlemen

  if ($kd_indi == 32) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;> &nbsp;30 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">20 s/d 30</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">10 s/d 20</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;≤&nbsp; 10 </div>';
  }

  //  rata rata usia sekolah

  if ($kd_indi == 26) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;≥ &nbsp;9 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">7,5 s/d 9</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">6 s/d 7,5</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;<&nbsp; 6 </div>';
  }

  //  Pengangguran terbuka

  if ($kd_indi == 28) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;≤ &nbsp;4,3 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">4,3 s/d 6,5</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">6,5 s/d 8,5</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;>&nbsp; 8,5 </div>';
  }

  // Angka Kematian IBu

  if ($kd_indi == 18) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;< &nbsp;183 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">183 s/d 200</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">200 s/d 300</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;≥&nbsp; 300 </div>';
  }


  // Partisipasi sekolah 7 - 12

  if ($kd_indi == 23) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;= &nbsp;100 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">95 s/d 100</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">90 s/d 95</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;<&nbsp; 90 </div>';
  }


  // Partisipasi sekolah 13 - 15

  if ($kd_indi == 24) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;= &nbsp;100 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">95 s/d 100</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">90 s/d 95</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;<&nbsp; 90 </div>';
  }

  // Partisipasi sekolah 16 - 19

  if ($kd_indi == 25) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;≥ &nbsp;80 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">70 s/d 80</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">60 s/d 70</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;<&nbsp; 60 </div>';
  }

  //  Perkotaan 

  if ($kd_indi == 37) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;60 s/d 70 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">50 s/d 60</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">40 s/d 50</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;< &nbsp;40 </div>';
  }

  // Layak Huni

  if ($kd_indi == 33) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;<&nbsp; 70 </div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">60 s/d 70</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">50 s/d 60</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;<&nbsp; 50 </div>';
  }

  // Prevalensi stunting

  if ($kd_indi == 20) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;≤&nbsp;14</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">14 s/d 25</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">25 s/d 35</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;>&nbsp; 35  </div>';
  }


  // 27 Proporsi penduduk lansia


  // Gini Ratio

  if ($kd_indi == 29) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;<&nbsp 0.374</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">0.374 s/d 0.385</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">0.385 s/d 4</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;>&nbsp; 4  </div>';
  }

  // Kepadatan Penduduk

  if ($kd_indi == 38) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;<&nbsp; 200</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">200 s/d 300</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">300 s/d 1000</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> &nbsp;>&nbsp; 1000  </div>';
  }

  // risen rasio

  if ($kd_indi == 39) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;
    -1 s/d 1</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">-5 s/d -1 atau  1,0 s/d 5,0 </div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">-10 s/d -5 atau 5,0 s/d 10,0 </div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> > 10 atau < -10  </div>';
  }

  // migrasi seumur hidup

  if ($kd_indi == 40) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;
    -1 s/d 1</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">-5 s/d -1 atau  1,0 s/d 5,0 </div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">-10 s/d -5 atau 5,0 s/d 10,0 </div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;"> > 10 atau < -10  </div>';
  }

  // pembangunan keluarga

  if ($kd_indi == 45) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;
    ≥&nbsp; 61</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">59 s/d 61 </div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">50 s/d 59</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">&nbsp; <&nbsp; 50  </div>';
  }

  // pembangunan manusia

  if ($kd_indi == 43) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;
    ≥ &nbsp; 80</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">70 s/d 79</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">60 s/d 69</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">&nbsp; <&nbsp; 59  </div>';
  }

  // Angka kematian balita

  if ($kd_indi == 44) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;
    > &nbsp; 25</div>
    <div class=" col"></div>
    <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">25 s/d 44</div>
    <div class="col"></div>
    <div class="col bg-warning tengah" style="font-weight: bold;">45 s/d 54</div>
    <div class="col"></div>
    <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">&nbsp; >&nbsp; 54   </div>';
  }

  // angka kelahiran kasar

  if ($kd_indi == 46) {

    echo '<div class="col  tengah" style="color: #ffffff ; font-weight: bold; background-color: #0081b4;">&nbsp;
  < &nbsp; 20</div>
  <div class=" col"></div>
  <div class="col bg-success tengah" style="color: #ffffff ; font-weight: bold;">20 s/d 29</div>
  <div class="col"></div>
  <div class="col bg-warning tengah" style="font-weight: bold;">30 s/d 39</div>
  <div class="col"></div>
  <div class="col bg-danger tengah" style="color: #ffffff ; font-weight: bold;">&nbsp; >&nbsp; 40   </div>';
  }
}
