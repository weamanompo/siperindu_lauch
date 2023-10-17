<?php

function legend($kd_indi)

{

    // Unmet Need  1

    if ($kd_indi == 14) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> < 7,5</text>

        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 7,5 s/d 8,0  </text>

        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 8,0 s/d 9,9</text>

        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
           ≥ 9,9 </text>';
    }



    // Harapan Hidup  2

    if ($kd_indi == 17) {

        echo '<rect x="108" y="465" width="100" height="25" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="122" y="484">NORMAL</text>
                        <text fill="#000000" font-size="15" font-family="Raleway" x="215" y="484">CAPAIAN > 75 </text>
                
                        <rect x="108" y="495" width="100" height="25" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="121" y="513">WASPADA</text>
                        <text fill="#000000" font-size="15" font-family="Raleway" x="215" y="513">70 ≤ CAPAIAN ≤ 75</text>
                
                        <rect x="108" y="525" width="100" height="25" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="16" font-family="Raleway" x="134" y="545">SIAGA</text>
                        <text fill="#000000" font-size="15" font-family="Raleway" x="215" y="545">65 ≤ CAPAIAN < 70</text>
                
                        <rect x="107" y="555" width="100" height="25" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="124" y="575">AWAS</text>
                        <text fill="#000000" font-size="15" font-family="Raleway" x="215" y="575">CAPAIAN < 65</text>';
    }

    // Fertilitas Total/TFR

    if ($kd_indi == 9) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> < 2,1</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 2,1 s/d 2,5 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 2,5 s/d 3,0</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                        > 3,0 </text>';
    }

    // Laju Pertumbuhan Penduduk

    if ($kd_indi == 5) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> 0,0 s/d 1,0</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 1,0 s/d 1,5 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 1,5 s/d 2,0</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         ≥ 2,0 </text>';
    }

    // Ketergantungan

    if ($kd_indi == 7) {

        echo '<rect x="48" y="465" width="100" height="25" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="62" y="484">NORMAL</text>
                        <text fill="#000000" font-size="17" font-family="Raleway" x="155" y="484"> < 18</text>
                
                        <rect x="48" y="495" width="100" height="25" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="61" y="513">WASPADA</text>
                        <text fill="#000000" font-size="17" font-family="Raleway" x="155" y="513"> 18 s/d 30 </text>
                
                        <rect x="48" y="525" width="100" height="25" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="16" font-family="Raleway" x="74" y="545">SIAGA</text>
                        <text fill="#000000" font-size="17" font-family="Raleway" x="155" y="545"> 30 s/d 40</text>
                
                        <rect x="47" y="555" width="100" height="25" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="74" y="575">AWAS</text>
                        <text fill="#000000" font-size="17" font-family="Raleway" x="155" y="575">
                         > 40 </text>';
    }

    // Kepadatan Penduduk

    if ($kd_indi == 38) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> < 200</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 200 s/d 300 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 300 s/d 1000</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         > 1000 </text>';
    }

    // ASFR 15-19

    if ($kd_indi == 10) {

        echo '<rect x="148" y="465" width="100" height="25" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="162" y="484">NORMAL</text>
                        <text fill="#000000" font-size="17" font-family="Raleway" x="255" y="484"> < 18</text>
                
                        <rect x="148" y="495" width="100" height="25" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="161" y="513">WASPADA</text>
                        <text fill="#000000" font-size="17" font-family="Raleway" x="255" y="513"> 18 s/d 30 </text>
                
                        <rect x="148" y="525" width="100" height="25" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="16" font-family="Raleway" x="174" y="545">SIAGA</text>
                        <text fill="#000000" font-size="17" font-family="Raleway" x="255" y="545"> 30 s/d 40</text>
                
                        <rect x="147" y="555" width="100" height="25" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="16" font-family="Raleway" x="174" y="575">AWAS</text>
                        <text fill="#000000" font-size="17" font-family="Raleway" x="255" y="575">
                         > 40 </text>';
    }

    // Kematian Bayi

    if ($kd_indi == 19) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> < 16</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 18 s/d 30 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 30 s/d 40</text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         > 40 </text>';
    }

    // Cakupan Akta Kelahiran (Usia 0-17 Tahun)

    if ($kd_indi == 42) {

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

    //   	Penggunaan Air Bersih

    if ($kd_indi == 34) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> = 100</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 90 s/d 100  </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 80 s/d 90 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         < 80 </text>';
    }

    //   	Cakupan CPR kontrasepsi modern

    if ($kd_indi == 12) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> > 60</text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 50 s/d 60  </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 40 s/d 50 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         < 40 </text>';
    }

    //   	Rasio Jenis Kelamin

    if ($kd_indi == 6) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> = 100 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> > 95 atau < 100 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> > 90 atau < 95 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         > 110 atau <= 90 </text>';
    }

    // pembangunan gender

    if ($kd_indi == 30) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> ≥ 91,39 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 90 s/d 91,39</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 80 s/d 90 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         < 80 </text>';
    }

    // pemberdayaan gender

    if ($kd_indi == 31) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> ≥ 74,18 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 70 s/d 74,18</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 60 s/d 70 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         < 60 </text>';
    }

    //  miskin ekstrem

    if ($kd_indi == 36) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> = 0 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 0 s/d 2</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 2 s/d 5 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         ≥ 5 </text>';
    }

    //  miskin 

    if ($kd_indi == 35) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> ≤ 7 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 7 s/d 9,6</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 9,6 s/d 12 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         > 12</text>';
    }

    //  perempuan dalamm parlemen

    if ($kd_indi == 32) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> > 30 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 20 s/d 30</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 10 s/d 20 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                         ≤ 10 </text>';
    }

    //  rata rata usia sekolah

    if ($kd_indi == 26) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> ≥ 9 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 7,5 s/d 9 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 6 s/d 7,5 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                        < 6 </text>';
    }

    //  Pengangguran terbuka

    if ($kd_indi == 28) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> ≤ 4,3 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 4,3 s/d 6,5 </text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 6,5 s/d 8,5 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                        > 8,5 </text>';
    }

    // Angka Kematian IBu

    if ($kd_indi == 18) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> < 183 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 183 s/d 200</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 200 s/d 300 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                        ≥ 300  </text>';
    }

    // Partisipasi sekolah 7 - 12


    if ($kd_indi == 23) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> = 100 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 95 s/d 100</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 90 s/d 95 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                        < 90  </text>';
    }

    // Partisipasi sekolah 13 - 15


    if ($kd_indi == 24) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> = 100 </text>
                
                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 95 s/d 100</text>
                
                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 90 s/d 95 </text>
                
                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                        < 90  </text>';
    }

    // Partisipasi sekolah 16 - 19


    if ($kd_indi == 25) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> ≥ 80 </text>
            
                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 70 s/d 80</text>
            
                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 60 s/d 70 </text>
            
                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                    < 60  </text>';
    }

    //  Perkotaan 

    if ($kd_indi == 37) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> 60 s/d 70  </text>
            
                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 50 s/d 60</text>
            
                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 40 s/d 50 </text>
            
                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                    < 40  </text>';
    }

    // Layak Huni

    if ($kd_indi == 33) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> < 70 </text>
            
                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 60 s/d 70</text>
            
                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 50 s/d 60 </text>
            
                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                    < 50  </text>';
    }

    // Prevalensi stunting

    if ($kd_indi == 20) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> ≤ 14 </text>
                            
                                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 14 s/d 25</text>
                            
                                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 25 s/d 35 </text>
                            
                                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                                    > 35  </text>';
    }

    // 27 Proporsi penduduk lansia



    // Gini Ratio

    if ($kd_indi == 29) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> < 0.374 </text>
                                
                                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 0.374 s/d 0.385</text>
                                
                                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 0.385 s/d 4 </text>
                                
                                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                                        > 4  </text>';
    }

    // kepadatan penduduk

    if ($kd_indi == 38) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> < 200 </text>
                                
                                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 200 s/d 300</text>
                                
                                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 300 s/d 1000 </text>
                                
                                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                                        > 1000  </text>';
    }

    // risen rasio

    if ($kd_indi == 39) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254">  -1 s/d 1  </text>
                                
                                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> -5 s/d -1 atau 1 s/d 5,0  </text>
                                
                                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> -10 s/d -5 atau 5,0 s/d 10,0  </text>
                                
                                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                                        > 10 atau < -10  </text>';
    }

    // migrasi seumur hidup

    if ($kd_indi == 40) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254">  -1 s/d 1  </text>
                                
                                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> -5 s/d -1 atau 1 s/d 5,0  </text>
                                
                                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> -10 s/d -5 atau 5,0 s/d 10,0  </text>
                                
                                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                                        > 10 atau < -10  </text>';
    }


    // pembangunan keluarga

    if ($kd_indi == 45) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254"> ≥ 61 </text>
                            
                                    <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 59 s/d 61</text>
                            
                                    <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 50 s/d 59 </text>
                            
                                    <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                    <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                    <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                                    < 50  </text>';
    }

    // median kawin pertama 

    if ($kd_indi == 15) {

        echo '<rect x="48" y="240" width="55" height="20" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="56" y="254">NORMAL</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="254">  21 s/d 23  </text>
                                
                                        <rect x="48" y="265" width="55" height="20" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="54" y="279">WASPADA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="279"> 20 s/d 21 atau 23 s/d 25  </text>
                                
                                        <rect x="48" y="290" width="55" height="20" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#000000" font-size="9" font-family="Raleway" x="63" y="304">SIAGA</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="304"> 19 s/d 20 atau 25 s/d 27  </text>
                                
                                        <rect x="47" y="315" width="55" height="20" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                        <text fill="#ffffff" font-size="9" font-family="Raleway" x="63" y="329">AWAS</text>
                                        <text fill="#000000" font-size="10" font-family="Raleway" x="107" y="329">
                                        < 19 atau ≥ 27  </text>';
    }
}
