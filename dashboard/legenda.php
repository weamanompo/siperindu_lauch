<?php

function legend($kd_indi)

{

    // Unmet Need  1

    if ($kd_indi == 14) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254"> CAPAIAN < 7,5</text>

        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">7,5 ≤ CAPAIAN < 8,0 </text>

        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">8,0 ≤ CAPAIAN < 9,9</text>

        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 9,9</text>';
    }



    // Harapan Hidup 2

    if ($kd_indi == 17) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN > 75 </text>

        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">70 ≤ CAPAIAN ≤ 75 </text>

        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">65 ≤ CAPAIAN < 70 </text>

        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 65 </text>';
    }

    // Fertilitas Total/TFR 3

    if ($kd_indi == 9) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≤ 2,1 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">2,1 < CAPAIAN ≤ 2,5 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">2,5 < CAPAIAN ≤ 3,0 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN > 3,0 </text>';
    }

    // Laju Pertumbuhan Penduduk  4

    if ($kd_indi == 5) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN < 1,0</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">1,0 ≤ CAPAIAN < 1,5</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">1,5 ≤ CAPAIAN < 2,0</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 2,0</text>';
    }

    // Ketergantungan 5

    if ($kd_indi == 7) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN < 50</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">50 ≤ CAPAIAN < 55</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">55 ≤ CAPAIAN < 60</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 60</text>';
    }

    // Kepadatan Penduduk 6

    if ($kd_indi == 38) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN < 200</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">200 ≤ CAPAIAN < 300</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">300 ≤ CAPAIAN < 1000</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN > 1000</text>';
    }

    // ASFR 15-19  7

    if ($kd_indi == 10) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254"> CAPAIAN < 18</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">18 ≤ CAPAIAN < 30</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">30 ≤ CAPAIAN < 40</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 40</text>';
    }

    // Kematian Bayi  8

    if ($kd_indi == 19) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254">CAPAIAN < 16 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279">16 ≤ CAPAIAN < 30 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304">30 ≤ CAPAIAN < 40 /text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 40 </text>';
    }

    // Cakupan Akta akte Kelahiran (Usia 0-17 Tahun) 9

    if ($kd_indi == 42) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN=100</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279"> 80 ≤ CAPAIAN < 100 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">60 ≤ CAPAIAN < 80 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 60 </text>';
    }

    //  Cakupan KTP Elektronik 11

    if ($kd_indi == 41) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN=100</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">80 ≤ CAPAIAN < 100 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">60 ≤ CAPAIAN < 80 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 60 </text>';
    }

    //   	Penggunaan Air Bersih  12

    if ($kd_indi == 34) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254">CAPAIAN = 100</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279">90 ≤ CAPAIAN < 100</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304">80 ≤ CAPAIAN < 90</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">CAPAIAN< 80</text>';
    }

    //   	Cakupan CPR kontrasepsi modern 13

    if ($kd_indi == 12) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN > 60</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">50 < CAPAIAN ≤ 60</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">40 ≤ CAPAIAN ≤ 50</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 40</text>';
    }

    //   	Rasio Jenis Kelamin 14

    if ($kd_indi == 6) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN = 100</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">100 < CAPAIAN ≤ 105 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">105 < CAPAIAN ≤ 110 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN > 110 </text>';
    }

    // pembangunan gender 15

    if ($kd_indi == 30) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≥ 91,39</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">90,00 ≤ CAPAIAN < 91,39</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">80,00 ≤ CAPAIAN < 90,00</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 80,00</text>';
    }

    // pemberdayaan gender 16

    if ($kd_indi == 31) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN≥ 74,18</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">70,00 ≤ CAPAIAN < 74,18</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">60,00 ≤ CAPAIAN < 70,00</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 60,00</text>';
    }

    //  miskin ekstrem 17

    if ($kd_indi == 36) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN = 0%</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">0 < CAPAIAN ≤ 2,0%</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">2,0% ≤  CAPAIAN < 5,0%</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 5,0%</text>';
    }

    //  miskin 18

    if ($kd_indi == 35) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≤ 7,0%</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">7,0% < CAPAIAN ≤ 9,6% </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">9,6% < CAPAIAN ≤ 12,0% </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN > 12,0%</text>';
    }

    //  perempuan dalamm parlemen 19

    if ($kd_indi == 32) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN > 30%</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">20% < CAPAIAN ≤ 30%</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">10% < CAPAIAN ≤ 20%</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≤ 10% </text>';
    }

    //  rata rata usia lama sekolah 20

    if ($kd_indi == 26) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≥ 9,0</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">7,5 ≤ CAPAIAN < 9,0 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">6,0 ≤ CAPAIAN < 7,5</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN <  6,0</text>';
    }

    //  Pengangguran terbuka 21

    if ($kd_indi == 28) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≤ 4,3%</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">4,3% < CAPAIAN ≤ 6,5% </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">6,5% < CAPAIAN ≤ 8,5% </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN > 8,5</text>';
    }

    // Angka Kematian IBu 22

    if ($kd_indi == 18) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN < 183</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">183 ≤ CAPAIAN < 200 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304"> 200 ≤ CAPAIAN < 300 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 300 </text>';
    }

    // Partisipasi sekolah 7 - 12   23


    if ($kd_indi == 23) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN = 100</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">95 ≤ CAPAIAN < 100</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">90 ≤ CAPAIAN < 95</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 90</text>';
    }

    // Partisipasi sekolah 13 - 15  / 24


    if ($kd_indi == 24) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN = 100</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">95 ≤ CAPAIAN < 100</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">90 ≤ CAPAIAN < 95</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 90</text>';
    }

    // Partisipasi sekolah 16 - 19   / 25


    if ($kd_indi == 25) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≥ 80</text>
            
                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">70 ≤ CAPAIAN < 80</text>
            
                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">60 ≤ CAPAIAN < 70</text>
            
                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 60</text>';
    }

    //  Perkotaan  26

    if ($kd_indi == 37) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                    <text fill="#000000" font-size="7.5" font-family="Raleway" x="107" y="254"> 60 < CAPAIAN ≤ 70  </text>
            
                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                    <text fill="#000000" font-size="7.5" font-family="Raleway" x="107" y="279">50 ≤ CAPAIAN < 60</text>
            
                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                    <text fill="#000000" font-size="7.5" font-family="Raleway" x="107" y="304">40 ≤ CAPAIAN < 50</text>
            
                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                    <text fill="#000000" font-size="7.5" font-family="Raleway" x="107" y="329">CAPAIAN < 40 </text>';
    }

    // Layak Huni  27

    if ($kd_indi == 33) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≥ 70%</text>
            
                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">60 ≤ CAPAIAN < 70</text>
            
                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">50 ≤ CAPAIAN < 60</text>
            
                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 50</text>';
    }

    // Prevalensi stunting 28

    if ($kd_indi == 20) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≤ 14</text>
                            
                                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">14 < CAPAIAN ≤ 20</text>
                            
                                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">20 < CAPAIAN ≤ 30</text>
                            
                                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN > 30</text>';
    }

    // 27 Proporsi penduduk lansia



    // Gini Ratio 29

    if ($kd_indi == 29) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≤ 0,374</text>
                                
                                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">0,374 < CAPAIAN ≤ 0,385</text>
                                
                                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">0,385 ≤  CAPAIAN < 0,400 </text>
                                
                                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN > 0,400</text>';
    }


    // risen rasio  30

    if ($kd_indi == 39) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254"> -1,0 < CAPAIAN < 1,0 </text>
                                
                                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279"> -5,0 ≤ CAPAIAN ≤ -1,0 atau  1,0 ≤ CAPAIAN ≤ 5,0  </text>
                                
                                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304"> -10,0 ≤ CAPAIAN < -5,0 atau 5,0 < CAPAIAN ≤ 10,0 </text>
                                
                                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < -10.0 atau CAPAIAN > 10.0 </text>';
    }

    // migrasi seumur hidup  31

    if ($kd_indi == 40) {

        echo '<rect x="28" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="36" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="87" y="254">-1 < CAPAIAN < 1</text>
                                
                                        <rect x="28" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="34" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="87" y="279"> -5 ≤ CAPAIAN ≤ -1  atau 1 ≤ CAPAIAN ≤ 5 </text>
                                
                                        <rect x="28" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="43" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="87" y="304">-10,0 ≤ CAPAIAN < -5 atau  5 < CAPAIAN ≤ 10 </text>
                                
                                        <rect x="27" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="43" y="329">AWAS</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="87" y="329">CAPAIAN < -10  atau CAPAIAN > 10 </text>';
    }


    // pembangunan keluarga  32

    if ($kd_indi == 45) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≥ 61,0</text>
                            
                                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">59,0 < CAPAIAN ≤ 61,0</text>
                            
                                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">50,0 ≤ CAPAIAN < 59,0</text>
                            
                                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 50,0</text>';
    }

    // median kawin pertama  33

    if ($kd_indi == 15) {

        echo '<rect x="13" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="21" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="72" y="254">21 ≤ CAPAIAN < 23</text>
                                
                                        <rect x="13" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="19" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="72" y="279">20 ≤ CAPAIAN < 21 atau 23 ≤ CAPAIAN < 25</text>
                                
                                        <rect x="13" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="28" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="72" y="304">19 ≤ CAPAIAN < 20 atau 25 ≤ CAPAIAN < 27</text>
                                
                                        <rect x="12" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="28" y="329">AWAS</text>
                                        <text fill="#000000" font-size="8" font-family="Raleway" x="72" y="329">CAPAIAN < 19 atau 27 ≤ CAPAIAN</text>';
    }

    // indeks pembangunan manusia

    if ($kd_indi == 43) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN ≥ 80</text>
                            
                                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">70 ≤ CAPAIAN < 80</text>
                            
                                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">60 ≤ CAPAIAN < 70</text>
                            
                                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN < 60</text>';
    }

    // angka kematian balita

    if ($kd_indi == 44) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN < 25</text>
                            
                                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">25 ≤ CAPAIAN < 45</text>
                            
                                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">45 ≤ CAPAIAN < 55</text>
                            
                                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 55</text>';
    }

    // angka kelahiran kasar

    if ($kd_indi == 46) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="254">CAPAIAN < 20</text>
                            
                                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="279">20 ≤ CAPAIAN < 30</text>
                            
                                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="304">30 ≤ CAPAIAN < 40</text>
                            
                                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                    <text fill="#000000" font-size="8" font-family="Raleway" x="107" y="329">CAPAIAN ≥ 40</text>';
    }
}
