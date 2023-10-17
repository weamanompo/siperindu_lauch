  <?php

        function warna_capaian($n, $kd_indi)

        {

                //  Harapan Hidup

                if ($kd_indi == 17) {

                        if ($n > 75) {


                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (70 < $n && $n <= 75) {



                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (65 < $n && $n <= 70) {



                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n <=  65) {



                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {

                                echo '';
                        }
                }

                //  ASFR

                if ($kd_indi == 10) {

                        if ($n > 0 && $n < 18) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (18 <= $n && $n < 30) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (30 <= $n && $n < 40) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >=  40) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {

                                echo '';
                        }
                }

                // unmet need

                if ($kd_indi == 14) {

                        if ($n > 0 && $n < 7.5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (7.5 <= $n && $n < 8) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';

                                $bg = "#21ae41";
                        } elseif (8 <= $n && $n < 9.9) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >=  9.9) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }


                // tfr

                if ($kd_indi == 9) {

                        if ($n > 0 && $n <= 2.1) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (2.1 < $n && $n <= 2.5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (2.5 < $n && $n <= 3) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 3) {


                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {

                                echo '';
                        }
                }

                // CPR MOdern

                if ($kd_indi == 12) {

                        if ($n > 60) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (50 < $n && $n <= 60) {


                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (40 <= $n && $n <= 50) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 && $n < 40) {


                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {

                                echo '';
                        }
                }


                // Rasio Jenis Kelamin

                if ($kd_indi == 6) {

                        if ($n == 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (100 < $n && $n <= 105) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (95 < $n && $n <= 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (105 < $n && $n <= 110) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (90 < $n && $n <= 95) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 110 ||  $n <= 90) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {

                                echo '<path style="fill: #ffffff"';
                        }
                }

                // Angka Kematian BAyi

                if ($kd_indi == 19) {

                        if ($n > 0 && $n < 16) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (16 <= $n && $n < 30) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (30 <= $n && $n < 40) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (40 <= $n) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {

                                echo '';
                        }
                }

                // Ketergantungan

                if ($kd_indi == 7) {

                        if ($n > 0 &&  $n < 50) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (50 <= $n && $n < 55) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (55 <= $n && $n < 60) {


                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 60) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {

                                echo '';
                        }
                }

                // laju pertumbuhan penduduk

                if ($kd_indi == 5) {

                        if ($n > 0 &&  $n < 1) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (1 <= $n && $n < 1.5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (1.5 <= $n && $n < 2) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 2) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // mkjp

                if ($kd_indi == 13) {

                        if ($n > 29) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (25 <= $n && $n < 29) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (20 <= $n && $n < 25) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 &&  $n < 20) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                //    Jumlah Penduduk


                if ($kd_indi == 4) {

                        if ($n != 0) {

                                echo '<path style="fill: #F0EDD4"';
                        } else {

                                echo '<path style="fill: #FFFFFF"';
                        }
                }

                // pembangunan gender

                if ($kd_indi == 30) {

                        if ($n >= 91.39) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (90 <= $n && $n < 91.39) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (80 <= $n && $n < 90) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 &&  $n < 80) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // pemberdayaan gender

                if ($kd_indi == 31) {

                        if ($n >= 74.18) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (70 <= $n && $n < 74.18) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (60 <= $n && $n < 70) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 &&  $n < 60) {

                                $isi = "#ff4441";
                                echo '<text fill="' . $isi . '" font-size="15" font-family="Arial" font-weight= "bold" x="449" y="41">' . $n . '</text>';
                        } else {

                                echo '';
                        }
                }

                // Persentase Penduduk Miskin Ekstrem (ME)

                if ($kd_indi == 36) {

                        if ($n == 0) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (0 < $n && $n <= 2) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (2 < $n && $n < 5) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                //     miskin

                if ($kd_indi == 35) {


                        if ($n > 0 && $n < 7) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (7 < $n && $n <= 9.6) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (9.6 < $n && $n < 12) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 12) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }


                //     partisipasi perempuan dalam parlemen

                if ($kd_indi == 32) {


                        if ($n > 30) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (20 < $n && $n <= 30) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (10 < $n && $n <= 20) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n <= 10) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                //     capaian akte kelahiran

                if ($kd_indi == 42) {

                        if ($n == 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (80 <= $n && $n < 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (60 <= $n && $n < 80) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 && $n < 60) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // rata rata usia sekolah

                if ($kd_indi == 26) {


                        if ($n >= 9) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (7.5 <= $n && $n < 9) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (6 <= $n && $n < 7.5) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 && $n < 6) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // Pengangguran terbuka

                if ($kd_indi == 28) {


                        if ($n > 0 && $n <= 4.3) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (4.3 < $n && $n <= 6.5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (6.5 < $n && $n < 8.5) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 8.5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // Angka kematian Ibu


                if ($kd_indi == 18) {


                        if ($n > 0 && $n < 183) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (183 <= $n && $n < 200) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (200 <= $n && $n < 300) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 300) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // Partisipasi sekolah 7 - 12

                if ($kd_indi == 23) {


                        if ($n == 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (95 <= $n && $n < 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (90 <= $n && $n < 95) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 &&  $n < 90) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }


                // Partisipasi sekolah 13 - 15

                if ($kd_indi == 24) {


                        if ($n == 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (95 <= $n && $n < 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (90 <= $n && $n < 95) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 &&  $n < 90) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // Partisipasi sekolah 16 - 19

                if ($kd_indi == 25) {


                        if ($n >= 80) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (70 <= $n && $n < 80) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (60 <= $n && $n < 70) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 &&  $n < 60) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // Perkotaan

                if ($kd_indi == 37) {


                        // if (60 < $n && $n <= 70) {

                        if (60 < $n && $n <= 100) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (50 <= $n && $n < 60) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (40 <= $n && $n < 50) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 &&  $n < 40) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                //  Layak huni

                if ($kd_indi == 33) {


                        if (70 < $n) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (60 <= $n && $n < 70) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (50 <= $n && $n < 60) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 &&  $n < 50) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // Prevalensi stunting

                if ($kd_indi == 20) {


                        if ($n > 0 && $n <= 14) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (14 < $n && $n <= 20) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (20 < $n && $n <= 30) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 30) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // 27 Proporsi penduduk lansia

                if ($kd_indi == 8) {


                        if ($n > 0 && $n <= 5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (5 < $n && $n <= 7) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (7 < $n && $n <= 10) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 10) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                //  Gini Ratio

                if ($kd_indi == 29) {

                        if ($n > 0 && $n <= 0.374) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (0.374 < $n && $n <= 0.385) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (0.385 < $n && $n <= 4) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 4) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // kepadatan penduduk

                if ($kd_indi == 38) {

                        if ($n > 0 && $n < 200) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (200 <= $n && $n < 300) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (300 <= $n && $n < 1000) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 1000) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // risen ratio

                if ($kd_indi == 39) {

                        if ($n > -1 && $n < 1) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (-5 <= $n && $n <= -1) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (1 <= $n && $n <= 5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (-10 <= $n && $n < -5) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (5 <= $n && $n < 10) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n < -10) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 10) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // seumur hidup

                if ($kd_indi == 40) {

                        if ($n > -1 && $n < 1) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (-5 <= $n && $n <= -1) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (1 <= $n && $n <= 5) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (-10 <= $n && $n < -5) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (5 <= $n && $n < 10) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n < -10 && $n > 0) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 10) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '<rect x="449" y="27" width="100" height="17" style="fill:#ffffff;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="455" y="39"> data belum tersedia </text>';
                        }
                }


                //  Indeks Pembangunan manusia

                if ($kd_indi == 43) {

                        if ($n >= 80) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (70 <= $n && $n < 80) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (60 <= $n && $n < 70) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 && $n < 60) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // PEmbangunan Keluarga 


                if ($kd_indi == 45) {

                        if ($n >= 61) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (59 <= $n && $n < 61) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (50 <= $n && $n < 59) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n > 0 && $n < 50) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // median kawin pertama

                if ($kd_indi == 15) {

                        if (21 <= $n  && $n < 23) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (20 <= $n && $n < 21) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (23 <= $n && $n < 25) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (19 <= $n && $n < 20) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (25 <= $n && $n < 27) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n < 19 && $n > 0) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 27) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
        <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                //  Angka kematian balita

                if ($kd_indi == 44) {

                        if ($n > 0 && $n < 25) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (25 <= $n && $n < 45) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (45 <= $n && $n < 55) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 55) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }

                // angka kelahiran kasar

                if ($kd_indi == 46) {

                        if ($n > 0 && $n < 20) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#0099cb;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif (20 <= $n && $n < 30) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#21ae41;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                                $bg = "#21ae41";
                        } elseif (30 <= $n && $n < 40) {
                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#eef200;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#000000" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } elseif ($n >= 40) {

                                echo '<rect x="449" y="27" width="45" height="17" style="fill:#ff4441;stroke:black;stroke-width:0;opacity:1" />
                <text fill="#ffffff" font-size="10" font-family="Arial" x="460" y="39"> ' . $n . '</text>';
                        } else {
                                echo '';
                        }
                }
        }
