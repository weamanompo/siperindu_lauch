<?php

function legend_kab($kd_indi)

{



    // Harapan Hidup  2

    if ($kd_indi == 17) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN > 75</span>&nbsp;&nbsp;<span class="badge bg-success" style="color: #ffffff;">WASPADA : 70 ≤ CAPAIAN ≤ 75</span>&nbsp;&nbsp;<span class="badge bg-warning" style="color: #000000;">SIAGA : 65 ≤ CAPAIAN < 70 </span>&nbsp;&nbsp;<span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 65</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Fertilitas Total/TFR 3

    if ($kd_indi == 9) {

        echo '<p>Legenda</p><p class="container-fluid mt-3 text-center"><span class="badge bg-primary" style="color: #ffffff;">NORMAL : 2,0 ≤ CAPAIAN ≤ 2,19</span></p>
        <p class="container-fluid mt-3 text-center"><span class="badge bg-success" style="color: #ffffff;">NORMAL : 2,0 ≤ CAPAIAN ≤ 2,19</span></p>
        <p class="container-fluid mt-3 text-center"><span class="badge bg-warning" style="color: #ffffff;">NORMAL : 2,0 ≤ CAPAIAN ≤ 2,19</span></p>
        <p class="container-fluid mt-3 text-center"><span class="badge bg-danger" style="color: #ffffff;">NORMAL : 2,0 ≤ CAPAIAN ≤ 2,19</span></p>
       
        ';
    }

    // Laju Pertumbuhan Penduduk 4

    if ($kd_indi == 5) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 1,0</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 1,0 ≤ CAPAIAN < 1,5</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 1,5 ≤ CAPAIAN < 2,0</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 2,0</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Ketergantungan 5

    if ($kd_indi == 7) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 50</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 50 ≤ CAPAIAN < 55</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 55 ≤ CAPAIAN < 60</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 60</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Kepadatan Penduduk 6

    if ($kd_indi == 38) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 200</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 200 ≤ CAPAIAN < 300</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 300 ≤ CAPAIAN < 1000</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN > 1000</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // ASFR 15-19    7

    if ($kd_indi == 10) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 18</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 18 ≤ CAPAIAN < 30</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 30 ≤ CAPAIAN < 40</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 40</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Kematian Bayi

    if ($kd_indi == 19) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 16</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">WASPADA : 16 ≤ CAPAIAN < 30</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">SIAGA : 30 ≤ CAPAIAN < 40</span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 40</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
            </div>
            ';
    }

    // Cakupan Akta Kelahiran (Usia 0-17 Tahun)

    if ($kd_indi == 42) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN=100</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 80 ≤ CAPAIAN < 100</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 60 ≤ CAPAIAN < 80</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 60</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    //  Cakupan KTP Elektronik

    if ($kd_indi == 41) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> = 100</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 80 s/d 100  </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 60 s/d 80 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         < 60 </text>';
    }



    //   	Cakupan CPR kontrasepsi modern

    if ($kd_indi == 12) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN > 60</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 50 < CAPAIAN ≤ 60</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 40 ≤ CAPAIAN ≤ 50</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 40</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    //   	Rasio Jenis Kelamin

    if ($kd_indi == 6) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN = 100</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 100 < CAPAIAN ≤ 105</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 105 < CAPAIAN ≤ 110</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN > 110</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // kematian balita

    if ($kd_indi == 44) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 25</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 25 ≤ CAPAIAN < 45</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 45 ≤ CAPAIAN < 55</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 55</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }


    // Angka kelahiran kasar 

    if ($kd_indi == 46) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 20</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 20 ≤ CAPAIAN < 30</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 30 ≤ CAPAIAN < 40</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 40</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Indeks pembangunan manusia

    if ($kd_indi == 43) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≥ 80</span>&nbsp;&nbsp;
    <span class="badge bg-success" style="color: #ffffff;">WASPADA : 70 ≤ CAPAIAN < 80</span>&nbsp;&nbsp;
    <span class="badge bg-warning" style="color: #000000;">SIAGA : 60 ≤ CAPAIAN < 70</span>&nbsp;&nbsp;
    <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 60</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
    </div>
    ';
    }

    // pembangunan gender

    if ($kd_indi == 30) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≥ 91,39</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 90,00 ≤ CAPAIAN < 91,39</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 80,00 ≤ CAPAIAN < 90,00</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 80,00</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // pemberdayaan gender

    if ($kd_indi == 31) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN≥ 74,18</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 70,00 ≤ CAPAIAN < 74,18</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 60,00 ≤ CAPAIAN < 70,00</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 60,00</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    //  miskin ekstrem

    if ($kd_indi == 36) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN = 0%</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 0 < CAPAIAN ≤ 2,0%</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 2,0% ≤  CAPAIAN < 5,0%<</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 5,0%</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    //  miskin 

    if ($kd_indi == 35) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≤ 7,0%</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 7,0% < CAPAIAN ≤ 9,6%</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 9,6% < CAPAIAN ≤ 12,0%</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN > 12,0%</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    //  perempuan dalamm parlemen

    if ($kd_indi == 32) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN > 30%</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 20% < CAPAIAN ≤ 30%</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 10% < CAPAIAN ≤ 20%</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≤ 10%</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    //  rata rata usia sekolah

    if ($kd_indi == 26) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≥ 9,0</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 7,5 ≤ CAPAIAN < 9,0</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 6,0 ≤ CAPAIAN < 7,5</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN <  6,0</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    //  Pengangguran terbuka

    if ($kd_indi == 28) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≤ 4,3%</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 4,3% < CAPAIAN ≤ 6,5%</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 6,5% < CAPAIAN ≤ 8,5%</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN > 8,5</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Angka Kematian IBu

    if ($kd_indi == 18) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 183</span>&nbsp;&nbsp;
    <span class="badge bg-success" style="color: #ffffff;">WASPADA : 183 ≤ CAPAIAN < 200</span>&nbsp;&nbsp;
    <span class="badge bg-warning" style="color: #000000;">SIAGA : 200 ≤ CAPAIAN < 300</span>&nbsp;&nbsp;
    <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 300</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
    </div>
    ';
    }

    // Partisipasi sekolah 7 - 12


    if ($kd_indi == 23) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN = 100</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 95 ≤ CAPAIAN < 100</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 90 ≤ CAPAIAN < 95</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 90</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Partisipasi sekolah 13 - 15


    if ($kd_indi == 24) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN = 100</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 95 ≤ CAPAIAN < 100</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 90 ≤ CAPAIAN < 95</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 90</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Partisipasi sekolah 16 - 19


    if ($kd_indi == 25) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≥ 80</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 70 ≤ CAPAIAN < 80</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 60 ≤ CAPAIAN < 70</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 60</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    //  Perkotaan 

    if ($kd_indi == 37) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : 60 < CAPAIAN ≤ 70</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 50 ≤ CAPAIAN < 60</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 40 ≤ CAPAIAN < 50</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 40</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Layak Huni

    if ($kd_indi == 33) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≥ 70%</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 60 ≤ CAPAIAN < 70</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 50 ≤ CAPAIAN < 60</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 50</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // Prevalensi stunting

    if ($kd_indi == 20) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≤ 14</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 14 < CAPAIAN ≤ 20</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 20 < CAPAIAN ≤ 30</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN > 30</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }



    // Gini Ratio

    if ($kd_indi == 29) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≤ 0,374</span>&nbsp;&nbsp;
    <span class="badge bg-success" style="color: #ffffff;">WASPADA : 0,374 < CAPAIAN ≤ 0,385</span>&nbsp;&nbsp;
    <span class="badge bg-warning" style="color: #000000;">SIAGA : 0,385 ≤  CAPAIAN < 0,400</span>&nbsp;&nbsp;
    <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN > 0,400</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
    </div>
    ';
    }

    // risen rasio

    if ($kd_indi == 39) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : -1,0 < CAPAIAN < 1,0 </span>&nbsp;&nbsp;
    <span class="badge bg-success" style="color: #ffffff;">WASPADA : -5,0 ≤ CAPAIAN ≤ -1,0 atau  1,0 ≤ CAPAIAN ≤ 5,0</span>&nbsp;&nbsp;
    <span class="badge bg-warning" style="color: #000000;">SIAGA : -10,0 ≤ CAPAIAN < -5,0 atau 5,0 < CAPAIAN ≤ 10,0</span>&nbsp;&nbsp;
    <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < -10.0 atau CAPAIAN > 10.0</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
    </div>
    ';
    }

    // migrasi seumur hidup

    if ($kd_indi == 40) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : -1 < CAPAIAN < 1 </span>&nbsp;&nbsp;
    <span class="badge bg-success" style="color: #ffffff;">WASPADA : -5 ≤ CAPAIAN ≤ -1  atau 1 ≤ CAPAIAN ≤ 5</span>&nbsp;&nbsp;
    <span class="badge bg-warning" style="color: #000000;">SIAGA : -10,0 ≤ CAPAIAN < -5 atau  5 < CAPAIAN ≤ 10</span>&nbsp;&nbsp;
    <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < -10  atau CAPAIAN > 10</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
    </div>
    ';
    }


    // pembangunan keluarga

    if ($kd_indi == 45) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≥ 61,0</span>&nbsp;&nbsp;
    <span class="badge bg-success" style="color: #ffffff;">WASPADA : 59,0 < CAPAIAN ≤ 61,0</span>&nbsp;&nbsp;
    <span class="badge bg-warning" style="color: #000000;">SIAGA : 50,0 ≤ CAPAIAN < 59,0</span>&nbsp;&nbsp;
    <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 50,0</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
    </div>
    ';
    }

    // median kawin pertama 

    if ($kd_indi == 15) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : 21 ≤ CAPAIAN < 23</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 20 ≤ CAPAIAN < 21 atau 23 ≤ CAPAIAN < 25</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 19 ≤ CAPAIAN < 20 atau 25 ≤ CAPAIAN < 27</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 19 atau 27 ≤ CAPAIAN</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // mkjp

    if ($kd_indi == 13) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN > 29</span>&nbsp;&nbsp;
        <span class="badge bg-success" style="color: #ffffff;">WASPADA : 25 ≤ CAPAIAN < 29</span>&nbsp;&nbsp;
        <span class="badge bg-warning" style="color: #000000;">SIAGA : 20 ≤ CAPAIAN < 25</span>&nbsp;&nbsp;
        <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 20</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
        </div>
        ';
    }

    // 44 tipologi bonus demografi

    if ($kd_indi == 11) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">4 : Tahap Bonus Demografi Lanjut</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">3 : Bonus Demografi Sedang Berjalan</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">2 : Tahap Pra-Bonus Demografi</span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">1 : Belum Ada Tanda Bonus Demografi</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">Belum Ada Data</span></div>
            </div>
            ';
    }

    // akses sanitasi

    if ($kd_indi == 47) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≥ 90</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">WASPADA : 80 ≤ CAPAIAN < 90</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">SIAGA : 70 ≤ CAPAIAN < 80</span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 70</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
            </div>
            ';
    }


    // unmet need

    if ($kd_indi == 14) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 7,5</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">WASPADA : 7,5 ≤ CAPAIAN < 10</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">SIAGA : 10 ≤ CAPAIAN < 15</span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 15</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
            </div>
            ';
    }

    // perkawinan anak

    if ($kd_indi == 48) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≤ 8,74</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">WASPADA : 8,74 < CAPAIAN < 11</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">SIAGA : 11 ≤ CAPAIAN < 13 </span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≤ 13</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
            </div>
            ';
    }

    // air bersih

    if ($kd_indi == 34) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN = 100</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">WASPADA : 90 ≤ CAPAIAN < 100</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">SIAGA : 80 ≤ CAPAIAN < 90</span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 80</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
            </div>
            ';
    }

    // DCR pustus KB

    if ($kd_indi == 16) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 25</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">WASPADA : 25 ≤ CAPAIAN < 30</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">SIAGA : 30 ≤ CAPAIAN < 35</span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 35</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
            </div>
            ';
    }

    // JKN

    if ($kd_indi == 50) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN ≥ 98</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">WASPADA : 85 ≤ CAPAIAN < 98</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">SIAGA : 70 ≤ CAPAIAN < 85</span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN < 70</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
            </div>
            ';
    }

    // proporsi lansia

    if ($kd_indi == 8) {

        echo '<div class="container-fluid mt-3 text-center">&nbsp;&nbsp;<span class="badge bg-primary" style="color: #ffffff;">NORMAL : CAPAIAN < 10</span>&nbsp;&nbsp;
            <span class="badge bg-success" style="color: #ffffff;">WASPADA : 10 ≤ CAPAIAN < 15</span>&nbsp;&nbsp;
            <span class="badge bg-warning" style="color: #000000;">SIAGA : 15 ≤ CAPAIAN < 20</span>&nbsp;&nbsp;
            <span class="badge bg-danger" style="color: #ffffff;">AWAS : CAPAIAN ≥ 20</span>&nbsp;&nbsp;<span class="badge bg-secondary style="color: #ffffff;">BELUM ADA DATA</span></div>
            </div>
            ';
    }
}
