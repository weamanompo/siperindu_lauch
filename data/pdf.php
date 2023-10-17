<?php

include '../koneksi.php';

$link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$akhir = basename($link);

session_start();


date_default_timezone_set('Asia/Jakarta');


$n = $_SESSION['jumlah'];

$baris = $n / 5;

$kdwil = $_SESSION['provinsi'];


$kdi = $_SESSION['indi'];

$indikator = mysqli_query($koneksi, "SELECT * FROM indikator_pilar WHERE kode_indi_pilar = '$kdi'");

$namaindi = mysqli_fetch_assoc($indikator)['nama_indi_pilar'];

$judul = '';
$tingkat = '';
$tkfile = '';

if ($kdwil == 99) {

    $judul = ' SETIAP PROVINSI ';
    $tingkat = 'PROVINSI';
    $tkfile = 'setiap_provinsi';
}

if ($kdwil != 99) {

    $prov = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE kode = '$kdwil'");
    $nm = mysqli_fetch_assoc($prov)['nama'];

    $judul = " SETIAP KABUPATEN/KOTA WILAYAH PROVINSI " . $nm;
    $tingkat = 'KABUPATEN/KOTA';
    $tkfile = 'setiap_kab/kota';
}

require_once 'dompdf/autoload.inc.php';

use Dompdf\Dompdf;

// instantiate and use the dompdf class
$pdf = new Dompdf();

ob_start();

// $indi = mysqli_query($koneksi, "SELECT * FROM indikator_fix");


if ($kdwil == 99) {
    $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022  WHERE CHAR_LENGTH(kode)=2 ");
}
if ($kdwil != 99) {
    $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE  CHAR_LENGTH(kode)=5 AND kode LIKE '$kdwil%' ");
}


?>

<!-- halaman 1 -->


<?php if ($baris <= 1) : ?>
    <div class="page_break">

        <?php

        $data = explode(',', $akhir);

        $end = '';

        for ($i = 0; $i < $n; $i++) {

            $title = $data[$i];

            $koma = ', ';

            $end .= $title . $koma;
        };

        $asli = substr($end, 0, -2);

        ?>
        <header>
            <img src="logobkkbn.jpg" width="20%">
        </header>
        <p class="p1" style="text-align: center ;">CAPAIAN</p>
        <p class="p1" style="text-align: center ;">INDIKATOR <B><?= strtoupper($namaindi); ?></B></p>
        <p class="p1" style="text-align: center ;"><?= $judul; ?></p>
        <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
        <div class="center" style="overflow-x:auto;">
            <table class="table1">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                        <th scope="col" rowspan="2" style="text-align: center ;"><?= $tingkat; ?></th>
                        <?php $data = explode(',', $akhir);

                        $th = '';
                        $td = '';

                        for ($i = 0; $i < $n; $i++) {

                            $tahun = $data[$i];

                            $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                            $td .= '<th scope="col" style="text-align: center ;">CAPAIAN</th>
                <th scope="col" style="text-align: center ;">SUMBER</th>';
                        }
                        ?>
                        <?= $th; ?>
                    </tr>
                    <tr>
                        <?= $td; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $tisi = '';
                    ?>
                    <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                        <tr>
                            <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                            <td scope="col"><?= $d['nama']; ?></td>

                            <?php $kode = $d['kode'];

                            for ($i = 0; $i < $n; $i++) {

                                $tahun = $data[$i];

                                $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kode' AND kd_indi_pilar = '$kdi' ");

                                $isi = mysqli_fetch_assoc($nilai);

                                if ($kdi == 4) {

                                    $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                } else {
                                    $capaian1 = $isi['nilai_indi_pilar'];
                                }

                                $sumber1 = $isi['sumber'];

                                $capaian = '';
                                $sumber = '';

                                if ($capaian1 == 0 && $kdi != 11) {

                                    $capaian = '*';
                                    $sumber = '*';
                                } elseif ($capaian1 != 0 && $kdi != 11) {

                                    $capaian = $capaian1;
                                    $sumber = $sumber1;
                                }

                                if ($kdi == 11) {
                                    if ($capaian1 == 1) {
                                        $capaian = "Belum Ada Tanda Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 2) {
                                        $capaian = "Tahap Pra-Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 3) {
                                        $capaian = "Bonus Demografi Sedang Berjalan";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 4) {
                                        $capaian = "Tahap Bonus Demografi Lanjut";
                                        $sumber = $sumber1;
                                    } else {
                                        $capaian = '*';
                                        $sumber = '*';
                                    }
                                }

                                $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                            }
                            ?>
                            <?= $tisi; ?>

                        </tr>
                        <?php $no++;
                        $tisi = '';

                        ?>

                    <?php endwhile; ?>

                    <tr>

                        <?php if ($kdwil == 99) : ?>
                            <th scope="col" style="text-align: center ;" colspan="2">NASIONAL</th>
                        <?php endif; ?>
                        <?php if ($kdwil != 99) : ?>
                            <th scope="col" style="text-align: center ;" colspan="2">PROVINSI <?= $nm; ?></th>
                        <?php endif; ?>

                        <?php $kode = $d['kode'];

                        for ($i = 0; $i < $n; $i++) {

                            $tahun = $data[$i];

                            if ($kdwil == 99) {

                                $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '1' AND kd_indi_pilar = '$kdi' ");
                            }
                            if ($kdwil != 99) {

                                $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdi' ");
                            }


                            $isi = mysqli_fetch_assoc($nilai);

                            if ($kdi == 4) {

                                $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                            } else {
                                $capaian1 = $isi['nilai_indi_pilar'];
                            }

                            $sumber1 = $isi['sumber'];

                            $capaian = '';
                            $sumber = '';

                            if ($capaian1 == 0 && $kdi != 11) {

                                $capaian = '*';
                                $sumber = '*';
                            } elseif ($capaian1 != 0 && $kdi != 11) {

                                $capaian = $capaian1;
                                $sumber = $sumber1;
                            }

                            if ($kdi == 11) {
                                if ($capaian1 == 1) {
                                    $capaian = "Belum Ada Tanda Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 2) {
                                    $capaian = "Tahap Pra-Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 3) {
                                    $capaian = "Bonus Demografi Sedang Berjalan";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 4) {
                                    $capaian = "Tahap Bonus Demografi Lanjut";
                                    $sumber = $sumber1;
                                } else {
                                    $capaian = '*';
                                    $sumber = '*';
                                }
                            }

                            $tisi .= '<th scope="col" style="text-align: center ;">' . $capaian . '</th>
                        <th scope="col" style="text-align: center ;">' . $sumber . '</th>';
                        }
                        ?>
                        <?= $tisi; ?>

                    </tr>
                </tbody>
            </table>
            <?php if ($baris <= 1) : ?>
                <p class="p4">Keterangan : * Tidak ada data</p>
<p class="p4">Diunduh pada tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> WIB</p>

            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<?php if ($baris > 1) : ?>
    <div class="page_break">

        <?php

        $data = explode(',', $akhir);

        $end = '';

        for ($i = 0; $i < 5; $i++) {

            $title = $data[$i];

            $koma = ', ';

            $end .= $title . $koma;
        };

        $asli = substr($end, 0, -2);

        ?>
        <header>
            <img src="logobkkbn.jpg" width="20%">
        </header>
        <p class="p1" style="text-align: center ;">CAPAIAN</p>
        <p class="p1" style="text-align: center ;">INDIKATOR <B><?= strtoupper($namaindi); ?></B></p>
        <p class="p1" style="text-align: center ;"><?= $judul; ?></p>
        <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
        <div class="center" style="overflow-x:auto;">
            <table class="table1">
                <thead>
                    <tr>
                        <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                        <th scope="col" rowspan="2" style="text-align: center ;"><?= $tingkat; ?></th>
                        <?php $data = explode(',', $akhir);

                        $th = '';
                        $td = '';

                        for ($i = 0; $i < 5; $i++) {

                            $tahun = $data[$i];

                            $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                            $td .= '<th scope="col" style="text-align: center ;">CAPAIAN</th>
                <th scope="col" style="text-align: center ;">SUMBER</th>';
                        }
                        ?>
                        <?= $th; ?>
                    </tr>
                    <tr>
                        <?= $td; ?>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    $tisi = '';
                    ?>
                    <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                        <tr>
                            <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                            <td scope="col"><?= $d['nama']; ?></td>

                            <?php $kode = $d['kode'];

                            for ($i = 0; $i < 5; $i++) {

                                $tahun = $data[$i];

                                $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kode' AND kd_indi_pilar = '$kdi' ");

                                $isi = mysqli_fetch_assoc($nilai);

                                if ($kdi == 4) {

                                    $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                } else {
                                    $capaian1 = $isi['nilai_indi_pilar'];
                                }

                                $sumber1 = $isi['sumber'];

                                $capaian = '';
                                $sumber = '';

                                if ($capaian1 == 0 && $kdi != 11) {

                                    $capaian = '*';
                                    $sumber = '*';
                                } elseif ($capaian1 != 0 && $kdi != 11) {

                                    $capaian = $capaian1;
                                    $sumber = $sumber1;
                                }

                                if ($kdi == 11) {
                                    if ($capaian1 == 1) {
                                        $capaian = "Belum Ada Tanda Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 2) {
                                        $capaian = "Tahap Pra-Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 3) {
                                        $capaian = "Bonus Demografi Sedang Berjalan";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 4) {
                                        $capaian = "Tahap Bonus Demografi Lanjut";
                                        $sumber = $sumber1;
                                    } else {
                                        $capaian = '*';
                                        $sumber = '*';
                                    }
                                }

                                $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                            }
                            ?>
                            <?= $tisi; ?>

                        </tr>
                        <?php $no++;
                        $tisi = '';

                        ?>

                    <?php endwhile; ?>

                    <tr>

                        <?php if ($kdwil == 99) : ?>
                            <th scope="col" style="text-align: center ;" colspan="2">NASIONAL</th>
                        <?php endif; ?>
                        <?php if ($kdwil != 99) : ?>
                            <th scope="col" style="text-align: center ;" colspan="2">PROVINSI <?= $nm; ?></th>
                        <?php endif; ?>

                        <?php $kode = $d['kode'];

                        for ($i = 0; $i < 5; $i++) {

                            $tahun = $data[$i];

                            if ($kdwil == 99) {

                                $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '1' AND kd_indi_pilar = '$kdi' ");
                            }
                            if ($kdwil != 99) {

                                $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdi' ");
                            }


                            $isi = mysqli_fetch_assoc($nilai);

                            if ($kdi == 4) {

                                $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                            } else {
                                $capaian1 = $isi['nilai_indi_pilar'];
                            }

                            $sumber1 = $isi['sumber'];

                            $capaian = '';
                            $sumber = '';

                            if ($capaian1 == 0 && $kdi != 11) {

                                $capaian = '*';
                                $sumber = '*';
                            } elseif ($capaian1 != 0 && $kdi != 11) {

                                $capaian = $capaian1;
                                $sumber = $sumber1;
                            }

                            if ($kdi == 11) {
                                if ($capaian1 == 1) {
                                    $capaian = "Belum Ada Tanda Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 2) {
                                    $capaian = "Tahap Pra-Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 3) {
                                    $capaian = "Bonus Demografi Sedang Berjalan";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 4) {
                                    $capaian = "Tahap Bonus Demografi Lanjut";
                                    $sumber = $sumber1;
                                } else {
                                    $capaian = '*';
                                    $sumber = '*';
                                }
                            }

                            $tisi .= '<th scope="col" style="text-align: center ;">' . $capaian . '</th>
                        <th scope="col" style="text-align: center ;">' . $sumber . '</th>';
                        }
                        ?>
                        <?= $tisi; ?>

                    </tr>
                </tbody>
            </table>
            <?php if ($baris <= 1) : ?>
                <p class="p4">Keterangan : * Tidak ada data</p>
<p class="p4">Diunduh pada tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> WIB</p>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>

<!-- halaman 2 -->

<?php if ($baris > 1) : ?>
    <div class="page_break">

        <!-- dua halaman -->

        <?php if ($baris > 1 && $baris <= 2) : ?>

            <?php

            $data = explode(',', $akhir);

            $end = '';

            for ($i = 5; $i < $n; $i++) {

                $title = $data[$i];

                $koma = ', ';

                $end .= $title . $koma;
            };

            $asli = substr($end, 0, -2);

            ?>
            <header>
                <img src="logobkkbn.jpg" width="20%">
            </header>
            <p class="p1" style="text-align: center ;">CAPAIAN</p>
            <p class="p1" style="text-align: center ;">INDIKATOR <B><?= strtoupper($namaindi); ?></B></p>
            <p class="p1" style="text-align: center ;"><?= $judul; ?></p>
            <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
            <div class="center" style="overflow-x:auto;">
                <table class="table1">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                            <th scope="col" rowspan="2" style="text-align: center ;"><?= $tingkat; ?></th>
                            <?php $data = explode(',', $akhir);

                            $th = '';
                            $td = '';

                            for ($i = 5; $i < $n; $i++) {

                                $tahun = $data[$i];

                                $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                                $td .= '<th scope="col" style="text-align: center ;">CAPAIAN</th>
                <th scope="col" style="text-align: center ;">SUMBER</th>';
                            }
                            ?>
                            <?= $th; ?>
                        </tr>
                        <tr>
                            <?= $td; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $tisi = '';

                        if ($kdwil == 99) {
                            $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022  WHERE CHAR_LENGTH(kode)=2 ");
                        }
                        if ($kdwil != 99) {
                            $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE  CHAR_LENGTH(kode)=5 AND kode LIKE '$kdwil%' ");
                        }
                        ?>
                        <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                            <tr>
                                <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                                <td scope="col"><?= $d['nama']; ?></td>

                                <?php $kode = $d['kode'];

                                for ($i = 5; $i < $n; $i++) {

                                    $tahun = $data[$i];

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kode' AND kd_indi_pilar = '$kdi' ");

                                    $isi = mysqli_fetch_assoc($nilai);

                                    if ($kdi == 4) {

                                        $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                    } else {
                                        $capaian1 = $isi['nilai_indi_pilar'];
                                    }

                                    $sumber1 = $isi['sumber'];

                                    $capaian = '';
                                    $sumber = '';

                                    if ($capaian1 == 0 && $kdi != 11) {

                                        $capaian = '*';
                                        $sumber = '*';
                                    } elseif ($capaian1 != 0 && $kdi != 11) {

                                        $capaian = $capaian1;
                                        $sumber = $sumber1;
                                    }

                                    if ($kdi == 11) {
                                        if ($capaian1 == 1) {
                                            $capaian = "Belum Ada Tanda Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 2) {
                                            $capaian = "Tahap Pra-Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 3) {
                                            $capaian = "Bonus Demografi Sedang Berjalan";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 4) {
                                            $capaian = "Tahap Bonus Demografi Lanjut";
                                            $sumber = $sumber1;
                                        } else {
                                            $capaian = '*';
                                            $sumber = '*';
                                        }
                                    }

                                    $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                                }
                                ?>
                                <?= $tisi; ?>

                            </tr>
                            <?php $no++;
                            $tisi = '';

                            ?>

                        <?php endwhile; ?>

                        <tr>

                            <?php if ($kdwil == 99) : ?>
                                <th scope="col" style="text-align: center ;" colspan="2">NASIONAL</th>
                            <?php endif; ?>
                            <?php if ($kdwil != 99) : ?>
                                <th scope="col" style="text-align: center ;" colspan="2">PROVINSI <?= $nm; ?></th>
                            <?php endif; ?>

                            <?php $kode = $d['kode'];

                            for ($i = 5; $i < $n; $i++) {

                                $tahun = $data[$i];

                                if ($kdwil == 99) {

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '1' AND kd_indi_pilar = '$kdi' ");
                                }
                                if ($kdwil != 99) {

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdi' ");
                                }


                                $isi = mysqli_fetch_assoc($nilai);

                                if ($kdi == 4) {

                                    $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                } else {
                                    $capaian1 = $isi['nilai_indi_pilar'];
                                }

                                $sumber1 = $isi['sumber'];

                                $capaian = '';
                                $sumber = '';

                                if ($capaian1 == 0 && $kdi != 11) {

                                    $capaian = '*';
                                    $sumber = '*';
                                } elseif ($capaian1 != 0 && $kdi != 11) {

                                    $capaian = $capaian1;
                                    $sumber = $sumber1;
                                }

                                if ($kdi == 11) {
                                    if ($capaian1 == 1) {
                                        $capaian = "Belum Ada Tanda Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 2) {
                                        $capaian = "Tahap Pra-Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 3) {
                                        $capaian = "Bonus Demografi Sedang Berjalan";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 4) {
                                        $capaian = "Tahap Bonus Demografi Lanjut";
                                        $sumber = $sumber1;
                                    } else {
                                        $capaian = '*';
                                        $sumber = '*';
                                    }
                                }

                                $tisi .= '<th scope="col" style="text-align: center ;">' . $capaian . '</th>
                        <th scope="col" style="text-align: center ;">' . $sumber . '</th>';
                            }
                            ?>
                            <?= $tisi; ?>

                        </tr>
                    </tbody>
                </table>
                <?php if ($baris <= 2) : ?>
                    <p class="p4">Keterangan : * Tidak ada data</<p class="p4">Diunduh pada tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> WIB</p>
                <?php endif; ?>
            </div>
    </div>
<?php endif; ?>

<?php if ($baris > 2) : ?>

    <?php

        $data = explode(',', $akhir);

        $end = '';

        for ($i = 5; $i < 10; $i++) {

            $title = $data[$i];

            $koma = ', ';

            $end .= $title . $koma;
        };

        $asli = substr($end, 0, -2);

    ?>
    <header>
        <img src="logobkkbn.jpg" width="20%">
    </header>
    <p class="p1" style="text-align: center ;">CAPAIAN</p>
    <p class="p1" style="text-align: center ;">INDIKATOR <B><?= strtoupper($namaindi); ?></B></p>
    <p class="p1" style="text-align: center ;"><?= $judul; ?></p>
    <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
    <div class="center" style="overflow-x:auto;">
        <table class="table1">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                    <th scope="col" rowspan="2" style="text-align: center ;"><?= $tingkat; ?></th>
                    <?php $data = explode(',', $akhir);

                    $th = '';
                    $td = '';

                    for ($i = 5; $i < 10; $i++) {

                        $tahun = $data[$i];

                        $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                        $td .= '<th scope="col" style="text-align: center ;">CAPAIAN</th>
                <th scope="col" style="text-align: center ;">SUMBER</th>';
                    }
                    ?>
                    <?= $th; ?>
                </tr>
                <tr>
                    <?= $td; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $tisi = '';
                if ($kdwil == 99) {
                    $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022  WHERE CHAR_LENGTH(kode)=2 ");
                }
                if ($kdwil != 99) {
                    $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE  CHAR_LENGTH(kode)=5 AND kode LIKE '$kdwil%' ");
                }
                ?>
                <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                    <tr>
                        <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                        <td scope="col"><?= $d['nama']; ?></td>

                        <?php $kode = $d['kode'];

                        for ($i = 5; $i < 10; $i++) {

                            $tahun = $data[$i];

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kode' AND kd_indi_pilar = '$kdi' ");

                            $isi = mysqli_fetch_assoc($nilai);

                            if ($kdi == 4) {

                                $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                            } else {
                                $capaian1 = $isi['nilai_indi_pilar'];
                            }

                            $sumber1 = $isi['sumber'];

                            $capaian = '';
                            $sumber = '';

                            if ($capaian1 == 0 && $kdi != 11) {

                                $capaian = '*';
                                $sumber = '*';
                            } elseif ($capaian1 != 0 && $kdi != 11) {

                                $capaian = $capaian1;
                                $sumber = $sumber1;
                            }

                            if ($kdi == 11) {
                                if ($capaian1 == 1) {
                                    $capaian = "Belum Ada Tanda Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 2) {
                                    $capaian = "Tahap Pra-Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 3) {
                                    $capaian = "Bonus Demografi Sedang Berjalan";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 4) {
                                    $capaian = "Tahap Bonus Demografi Lanjut";
                                    $sumber = $sumber1;
                                } else {
                                    $capaian = '*';
                                    $sumber = '*';
                                }
                            }

                            $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                        }
                        ?>
                        <?= $tisi; ?>

                    </tr>
                    <?php $no++;
                    $tisi = '';

                    ?>

                <?php endwhile; ?>

                <tr>

                    <?php if ($kdwil == 99) : ?>
                        <th scope="col" style="text-align: center ;" colspan="2">NASIONAL</th>
                    <?php endif; ?>
                    <?php if ($kdwil != 99) : ?>
                        <th scope="col" style="text-align: center ;" colspan="2">PROVINSI <?= $nm; ?></th>
                    <?php endif; ?>

                    <?php $kode = $d['kode'];

                    for ($i = 5; $i < 10; $i++) {

                        $tahun = $data[$i];

                        if ($kdwil == 99) {

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '1' AND kd_indi_pilar = '$kdi' ");
                        }
                        if ($kdwil != 99) {

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdi' ");
                        }


                        $isi = mysqli_fetch_assoc($nilai);

                        if ($kdi == 4) {

                            $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                        } else {
                            $capaian1 = $isi['nilai_indi_pilar'];
                        }

                        $sumber1 = $isi['sumber'];

                        $capaian = '';
                        $sumber = '';

                        if ($capaian1 == 0 && $kdi != 11) {

                            $capaian = '*';
                            $sumber = '*';
                        } elseif ($capaian1 != 0 && $kdi != 11) {

                            $capaian = $capaian1;
                            $sumber = $sumber1;
                        }

                        if ($kdi == 11) {
                            if ($capaian1 == 1) {
                                $capaian = "Belum Ada Tanda Bonus Demografi";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 2) {
                                $capaian = "Tahap Pra-Bonus Demografi";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 3) {
                                $capaian = "Bonus Demografi Sedang Berjalan";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 4) {
                                $capaian = "Tahap Bonus Demografi Lanjut";
                                $sumber = $sumber1;
                            } else {
                                $capaian = '*';
                                $sumber = '*';
                            }
                        }

                        $tisi .= '<th scope="col" style="text-align: center ;">' . $capaian . '</th>
                        <th scope="col" style="text-align: center ;">' . $sumber . '</th>';
                    }
                    ?>
                    <?= $tisi; ?>

                </tr>
            </tbody>
        </table>
        <?php if ($baris <= 2) : ?>
            <p class="p4">Keterangan : * Tidak ada data</p>
            <p class="p4">Diunduh pada tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> WIB</p>
        <?php endif; ?>
    </div>
    </div>
<?php endif; ?>
<?php endif; ?>

<!-- halaman 3 -->

<?php if ($baris > 2) : ?>
    <div class="page_break">

        <!-- dua halaman -->

        <?php if ($baris > 2 && $baris <= 3) : ?>

            <?php

            $data = explode(',', $akhir);

            $end = '';

            for ($i = 10; $i < $n; $i++) {

                $title = $data[$i];

                $koma = ', ';

                $end .= $title . $koma;
            };

            $asli = substr($end, 0, -2);

            ?>
            <header>
                <img src="logobkkbn.jpg" width="20%">
            </header>
            <p class="p1" style="text-align: center ;">CAPAIAN</p>
            <p class="p1" style="text-align: center ;">INDIKATOR <B><?= strtoupper($namaindi); ?></B></p>
            <p class="p1" style="text-align: center ;"><?= $judul; ?></p>
            <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
            <div class="center" style="overflow-x:auto;">
                <table class="table1">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                            <th scope="col" rowspan="2" style="text-align: center ;"><?= $tingkat; ?></th>
                            <?php $data = explode(',', $akhir);

                            $th = '';
                            $td = '';

                            for ($i = 10; $i < $n; $i++) {

                                $tahun = $data[$i];

                                $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                                $td .= '<th scope="col" style="text-align: center ;">CAPAIAN</th>
                <th scope="col" style="text-align: center ;">SUMBER</th>';
                            }
                            ?>
                            <?= $th; ?>
                        </tr>
                        <tr>
                            <?= $td; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $tisi = '';
                        if ($kdwil == 99) {
                            $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022  WHERE CHAR_LENGTH(kode)=2 ");
                        }
                        if ($kdwil != 99) {
                            $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE  CHAR_LENGTH(kode)=5 AND kode LIKE '$kdwil%' ");
                        }
                        ?>
                        <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                            <tr>
                                <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                                <td scope="col"><?= $d['nama']; ?></td>

                                <?php $kode = $d['kode'];

                                for ($i = 10; $i < $n; $i++) {

                                    $tahun = $data[$i];

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kode' AND kd_indi_pilar = '$kdi' ");

                                    $isi = mysqli_fetch_assoc($nilai);

                                    if ($kdi == 4) {

                                        $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                    } else {
                                        $capaian1 = $isi['nilai_indi_pilar'];
                                    }

                                    $sumber1 = $isi['sumber'];

                                    $capaian = '';
                                    $sumber = '';

                                    if ($capaian1 == 0 && $kdi != 11) {

                                        $capaian = '*';
                                        $sumber = '*';
                                    } elseif ($capaian1 != 0 && $kdi != 11) {

                                        $capaian = $capaian1;
                                        $sumber = $sumber1;
                                    }

                                    if ($kdi == 11) {
                                        if ($capaian1 == 1) {
                                            $capaian = "Belum Ada Tanda Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 2) {
                                            $capaian = "Tahap Pra-Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 3) {
                                            $capaian = "Bonus Demografi Sedang Berjalan";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 4) {
                                            $capaian = "Tahap Bonus Demografi Lanjut";
                                            $sumber = $sumber1;
                                        } else {
                                            $capaian = '*';
                                            $sumber = '*';
                                        }
                                    }

                                    $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                                }
                                ?>
                                <?= $tisi; ?>

                            </tr>
                            <?php $no++;
                            $tisi = '';

                            ?>

                        <?php endwhile; ?>

                        <tr>

                            <?php if ($kdwil == 99) : ?>
                                <th scope="col" style="text-align: center ;" colspan="2">NASIONAL</th>
                            <?php endif; ?>
                            <?php if ($kdwil != 99) : ?>
                                <th scope="col" style="text-align: center ;" colspan="2">PROVINSI <?= $nm; ?></th>
                            <?php endif; ?>

                            <?php $kode = $d['kode'];

                            for ($i = 10; $i < $n; $i++) {

                                $tahun = $data[$i];

                                if ($kdwil == 99) {

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '1' AND kd_indi_pilar = '$kdi' ");
                                }
                                if ($kdwil != 99) {

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdi' ");
                                }


                                $isi = mysqli_fetch_assoc($nilai);

                                if ($kdi == 4) {

                                    $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                } else {
                                    $capaian1 = $isi['nilai_indi_pilar'];
                                }

                                $sumber1 = $isi['sumber'];

                                $capaian = '';
                                $sumber = '';

                                if ($capaian1 == 0 && $kdi != 11) {

                                    $capaian = '*';
                                    $sumber = '*';
                                } elseif ($capaian1 != 0 && $kdi != 11) {

                                    $capaian = $capaian1;
                                    $sumber = $sumber1;
                                }

                                if ($kdi == 11) {
                                    if ($capaian1 == 1) {
                                        $capaian = "Belum Ada Tanda Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 2) {
                                        $capaian = "Tahap Pra-Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 3) {
                                        $capaian = "Bonus Demografi Sedang Berjalan";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 4) {
                                        $capaian = "Tahap Bonus Demografi Lanjut";
                                        $sumber = $sumber1;
                                    } else {
                                        $capaian = '*';
                                        $sumber = '*';
                                    }
                                }

                                $tisi .= '<th scope="col" style="text-align: center ;">' . $capaian . '</th>
                        <th scope="col" style="text-align: center ;">' . $sumber . '</th>';
                            }
                            ?>
                            <?= $tisi; ?>

                        </tr>
                    </tbody>
                </table>
                <?php if ($baris <= 3) : ?>
                    <p class="p4">Keterangan : * Tidak ada data</<p class="p4">Diunduh pada tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> WIB</p>
                <?php endif; ?>
            </div>
    </div>
<?php endif; ?>


<?php if ($baris > 3) : ?>

    <?php

        $data = explode(',', $akhir);

        $end = '';

        for ($i = 10; $i < 15; $i++) {

            $title = $data[$i];

            $koma = ', ';

            $end .= $title . $koma;
        };

        $asli = substr($end, 0, -2);

    ?>
    <header>
        <img src="logobkkbn.jpg" width="20%">
    </header>
    <p class="p1" style="text-align: center ;">CAPAIAN</p>
    <p class="p1" style="text-align: center ;">INDIKATOR <B><?= strtoupper($namaindi); ?></B></p>
    <p class="p1" style="text-align: center ;"><?= $judul; ?></p>
    <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
    <div class="center" style="overflow-x:auto;">
        <table class="table1">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                    <th scope="col" rowspan="2" style="text-align: center ;"><?= $tingkat; ?></th>
                    <?php $data = explode(',', $akhir);

                    $th = '';
                    $td = '';

                    for ($i = 10; $i < 15; $i++) {

                        $tahun = $data[$i];

                        $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                        $td .= '<th scope="col" style="text-align: center ;">CAPAIAN</th>
                <th scope="col" style="text-align: center ;">SUMBER</th>';
                    }
                    ?>
                    <?= $th; ?>
                </tr>
                <tr>
                    <?= $td; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $tisi = '';
                if ($kdwil == 99) {
                    $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022  WHERE CHAR_LENGTH(kode)=2 ");
                }
                if ($kdwil != 99) {
                    $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE  CHAR_LENGTH(kode)=5 AND kode LIKE '$kdwil%' ");
                }
                ?>
                <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                    <tr>
                        <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                        <td scope="col"><?= $d['nama']; ?></td>

                        <?php $kode = $d['kode'];

                        for ($i = 10; $i < 15; $i++) {

                            $tahun = $data[$i];

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kode' AND kd_indi_pilar = '$kdi' ");

                            $isi = mysqli_fetch_assoc($nilai);

                            if ($kdi == 4) {

                                $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                            } else {
                                $capaian1 = $isi['nilai_indi_pilar'];
                            }

                            $sumber1 = $isi['sumber'];

                            $capaian = '';
                            $sumber = '';

                            if ($capaian1 == 0 && $kdi != 11) {

                                $capaian = '*';
                                $sumber = '*';
                            } elseif ($capaian1 != 0 && $kdi != 11) {

                                $capaian = $capaian1;
                                $sumber = $sumber1;
                            }

                            if ($kdi == 11) {
                                if ($capaian1 == 1) {
                                    $capaian = "Belum Ada Tanda Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 2) {
                                    $capaian = "Tahap Pra-Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 3) {
                                    $capaian = "Bonus Demografi Sedang Berjalan";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 4) {
                                    $capaian = "Tahap Bonus Demografi Lanjut";
                                    $sumber = $sumber1;
                                } else {
                                    $capaian = '*';
                                    $sumber = '*';
                                }
                            }

                            $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                        }
                        ?>
                        <?= $tisi; ?>

                    </tr>
                    <?php $no++;
                    $tisi = '';

                    ?>

                <?php endwhile; ?>

                <tr>

                    <?php if ($kdwil == 99) : ?>
                        <th scope="col" style="text-align: center ;" colspan="2">NASIONAL</th>
                    <?php endif; ?>
                    <?php if ($kdwil != 99) : ?>
                        <th scope="col" style="text-align: center ;" colspan="2">PROVINSI <?= $nm; ?></th>
                    <?php endif; ?>

                    <?php $kode = $d['kode'];

                    for ($i = 10; $i < 15; $i++) {

                        $tahun = $data[$i];

                        if ($kdwil == 99) {

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '1' AND kd_indi_pilar = '$kdi' ");
                        }
                        if ($kdwil != 99) {

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdi' ");
                        }


                        $isi = mysqli_fetch_assoc($nilai);

                        if ($kdi == 4) {

                            $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                        } else {
                            $capaian1 = $isi['nilai_indi_pilar'];
                        }

                        $sumber1 = $isi['sumber'];

                        $capaian = '';
                        $sumber = '';

                        if ($capaian1 == 0 && $kdi != 11) {

                            $capaian = '*';
                            $sumber = '*';
                        } elseif ($capaian1 != 0 && $kdi != 11) {

                            $capaian = $capaian1;
                            $sumber = $sumber1;
                        }

                        if ($kdi == 11) {
                            if ($capaian1 == 1) {
                                $capaian = "Belum Ada Tanda Bonus Demografi";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 2) {
                                $capaian = "Tahap Pra-Bonus Demografi";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 3) {
                                $capaian = "Bonus Demografi Sedang Berjalan";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 4) {
                                $capaian = "Tahap Bonus Demografi Lanjut";
                                $sumber = $sumber1;
                            } else {
                                $capaian = '*';
                                $sumber = '*';
                            }
                        }

                        $tisi .= '<th scope="col" style="text-align: center ;">' . $capaian . '</th>
                        <th scope="col" style="text-align: center ;">' . $sumber . '</th>';
                    }
                    ?>
                    <?= $tisi; ?>

                </tr>
            </tbody>
        </table>
        <?php if ($baris <= 3) : ?>
            <p class="p4">Keterangan : * Tidak ada data</p>
            <p class="p4">Diunduh pada tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> WIB</p>
        <?php endif; ?>
    </div>
    </div>
<?php endif; ?>
<?php endif; ?>


<!-- halaman 4-->

<?php if ($baris > 3) : ?>
    <div class="page_break">

        <!-- dua halaman -->

        <?php if ($baris > 3 && $baris <= 4) : ?>

            <?php

            $data = explode(',', $akhir);

            $end = '';

            for ($i = 15; $i < $n; $i++) {

                $title = $data[$i];

                $koma = ', ';

                $end .= $title . $koma;
            };

            $asli = substr($end, 0, -2);

            ?>
            <header>
                <img src="logobkkbn.jpg" width="20%">
            </header>
            <p class="p1" style="text-align: center ;">CAPAIAN</p>
            <p class="p1" style="text-align: center ;">INDIKATOR <B><?= strtoupper($namaindi); ?></B></p>
            <p class="p1" style="text-align: center ;"><?= $judul; ?></p>
            <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
            <div class="center" style="overflow-x:auto;">
                <table class="table1">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                            <th scope="col" rowspan="2" style="text-align: center ;"><?= $tingkat; ?></th>
                            <?php $data = explode(',', $akhir);

                            $th = '';
                            $td = '';

                            for ($i = 15; $i < $n; $i++) {

                                $tahun = $data[$i];

                                $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                                $td .= '<th scope="col" style="text-align: center ;">CAPAIAN</th>
                <th scope="col" style="text-align: center ;">SUMBER</th>';
                            }
                            ?>
                            <?= $th; ?>
                        </tr>
                        <tr>
                            <?= $td; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $tisi = '';
                        if ($kdwil == 99) {
                            $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022  WHERE CHAR_LENGTH(kode)=2 ");
                        }
                        if ($kdwil != 99) {
                            $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE  CHAR_LENGTH(kode)=5 AND kode LIKE '$kdwil%' ");
                        }
                        ?>
                        <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                            <tr>
                                <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                                <td scope="col"><?= $d['nama']; ?></td>

                                <?php $kode = $d['kode'];

                                for ($i = 15; $i < $n; $i++) {

                                    $tahun = $data[$i];

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kode' AND kd_indi_pilar = '$kdi' ");

                                    $isi = mysqli_fetch_assoc($nilai);

                                    if ($kdi == 4) {

                                        $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                    } else {
                                        $capaian1 = $isi['nilai_indi_pilar'];
                                    }

                                    $sumber1 = $isi['sumber'];

                                    $capaian = '';
                                    $sumber = '';

                                    if ($capaian1 == 0 && $kdi != 11) {

                                        $capaian = '*';
                                        $sumber = '*';
                                    } elseif ($capaian1 != 0 && $kdi != 11) {

                                        $capaian = $capaian1;
                                        $sumber = $sumber1;
                                    }

                                    if ($kdi == 11) {
                                        if ($capaian1 == 1) {
                                            $capaian = "Belum Ada Tanda Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 2) {
                                            $capaian = "Tahap Pra-Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 3) {
                                            $capaian = "Bonus Demografi Sedang Berjalan";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 4) {
                                            $capaian = "Tahap Bonus Demografi Lanjut";
                                            $sumber = $sumber1;
                                        } else {
                                            $capaian = '*';
                                            $sumber = '*';
                                        }
                                    }

                                    $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                                }
                                ?>
                                <?= $tisi; ?>

                            </tr>
                            <?php $no++;
                            $tisi = '';

                            ?>

                        <?php endwhile; ?>

                        <tr>

                            <?php if ($kdwil == 99) : ?>
                                <th scope="col" style="text-align: center ;" colspan="2">NASIONAL</th>
                            <?php endif; ?>
                            <?php if ($kdwil != 99) : ?>
                                <th scope="col" style="text-align: center ;" colspan="2">PROVINSI <?= $nm; ?></th>
                            <?php endif; ?>

                            <?php $kode = $d['kode'];

                            for ($i = 15; $i < $n; $i++) {

                                $tahun = $data[$i];

                                if ($kdwil == 99) {

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '1' AND kd_indi_pilar = '$kdi' ");
                                }
                                if ($kdwil != 99) {

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdi' ");
                                }


                                $isi = mysqli_fetch_assoc($nilai);

                                if ($kdi == 4) {

                                    $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                } else {
                                    $capaian1 = $isi['nilai_indi_pilar'];
                                }

                                $sumber1 = $isi['sumber'];

                                $capaian = '';
                                $sumber = '';

                                if ($capaian1 == 0 && $kdi != 11) {

                                    $capaian = '*';
                                    $sumber = '*';
                                } elseif ($capaian1 != 0 && $kdi != 11) {

                                    $capaian = $capaian1;
                                    $sumber = $sumber1;
                                }

                                if ($kdi == 11) {
                                    if ($capaian1 == 1) {
                                        $capaian = "Belum Ada Tanda Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 2) {
                                        $capaian = "Tahap Pra-Bonus Demografi";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 3) {
                                        $capaian = "Bonus Demografi Sedang Berjalan";
                                        $sumber = $sumber1;
                                    } elseif ($capaian1 == 4) {
                                        $capaian = "Tahap Bonus Demografi Lanjut";
                                        $sumber = $sumber1;
                                    } else {
                                        $capaian = '*';
                                        $sumber = '*';
                                    }
                                }

                                $tisi .= '<th scope="col" style="text-align: center ;">' . $capaian . '</th>
                        <th scope="col" style="text-align: center ;">' . $sumber . '</th>';
                            }
                            ?>
                            <?= $tisi; ?>

                        </tr>
                    </tbody>
                </table>
                <?php if ($baris <= 4) : ?>
                    <p class="p4">Keterangan : * Tidak ada data</<p class="p4">Diunduh pada tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> WIB</p>
                <?php endif; ?>
            </div>
    </div>
<?php endif; ?>


<?php if ($baris > 4) : ?>

    <?php

        $data = explode(',', $akhir);

        $end = '';

        for ($i = 15; $i < 20; $i++) {

            $title = $data[$i];

            $koma = ', ';

            $end .= $title . $koma;
        };

        $asli = substr($end, 0, -2);

    ?>
    <header>
        <img src="logobkkbn.jpg" width="20%">
    </header>
    <p class="p1" style="text-align: center ;">CAPAIAN</p>
    <p class="p1" style="text-align: center ;">INDIKATOR <B><?= strtoupper($namaindi); ?></B></p>
    <p class="p1" style="text-align: center ;"><?= $judul; ?></p>
    <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
    <div class="center" style="overflow-x:auto;">
        <table class="table1">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                    <th scope="col" rowspan="2" style="text-align: center ;"><?= $tingkat; ?></th>
                    <?php $data = explode(',', $akhir);

                    $th = '';
                    $td = '';

                    for ($i = 15; $i < 20; $i++) {

                        $tahun = $data[$i];

                        $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                        $td .= '<th scope="col" style="text-align: center ;">CAPAIAN</th>
                <th scope="col" style="text-align: center ;">SUMBER</th>';
                    }
                    ?>
                    <?= $th; ?>
                </tr>
                <tr>
                    <?= $td; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $tisi = '';
                if ($kdwil == 99) {
                    $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022  WHERE CHAR_LENGTH(kode)=2 ");
                }
                if ($kdwil != 99) {
                    $indi = mysqli_query($koneksi, "SELECT * FROM wilayah_2022 WHERE  CHAR_LENGTH(kode)=5 AND kode LIKE '$kdwil%' ");
                }
                ?>
                <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                    <tr>
                        <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                        <td scope="col"><?= $d['nama']; ?></td>

                        <?php $kode = $d['kode'];

                        for ($i = 15; $i < 20; $i++) {

                            $tahun = $data[$i];

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kode' AND kd_indi_pilar = '$kdi' ");

                            $isi = mysqli_fetch_assoc($nilai);

                            if ($kdi == 4) {

                                $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                            } else {
                                $capaian1 = $isi['nilai_indi_pilar'];
                            }

                            $sumber1 = $isi['sumber'];

                            $capaian = '';
                            $sumber = '';

                            if ($capaian1 == 0 && $kdi != 11) {

                                $capaian = '*';
                                $sumber = '*';
                            } elseif ($capaian1 != 0 && $kdi != 11) {

                                $capaian = $capaian1;
                                $sumber = $sumber1;
                            }

                            if ($kdi == 11) {
                                if ($capaian1 == 1) {
                                    $capaian = "Belum Ada Tanda Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 2) {
                                    $capaian = "Tahap Pra-Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 3) {
                                    $capaian = "Bonus Demografi Sedang Berjalan";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 4) {
                                    $capaian = "Tahap Bonus Demografi Lanjut";
                                    $sumber = $sumber1;
                                } else {
                                    $capaian = '*';
                                    $sumber = '*';
                                }
                            }

                            $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                        }
                        ?>
                        <?= $tisi; ?>

                    </tr>
                    <?php $no++;
                    $tisi = '';

                    ?>

                <?php endwhile; ?>

                <tr>

                    <?php if ($kdwil == 99) : ?>
                        <th scope="col" style="text-align: center ;" colspan="2">NASIONAL</th>
                    <?php endif; ?>
                    <?php if ($kdwil != 99) : ?>
                        <th scope="col" style="text-align: center ;" colspan="2">PROVINSI <?= $nm; ?></th>
                    <?php endif; ?>

                    <?php $kode = $d['kode'];

                    for ($i = 15; $i < 20; $i++) {

                        $tahun = $data[$i];

                        if ($kdwil == 99) {

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '1' AND kd_indi_pilar = '$kdi' ");
                        }
                        if ($kdwil != 99) {

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kdi' ");
                        }


                        $isi = mysqli_fetch_assoc($nilai);

                        if ($kdi == 4) {

                            $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                        } else {
                            $capaian1 = $isi['nilai_indi_pilar'];
                        }

                        $sumber1 = $isi['sumber'];

                        $capaian = '';
                        $sumber = '';

                        if ($capaian1 == 0 && $kdi != 11) {

                            $capaian = '*';
                            $sumber = '*';
                        } elseif ($capaian1 != 0 && $kdi != 11) {

                            $capaian = $capaian1;
                            $sumber = $sumber1;
                        }

                        if ($kdi == 11) {
                            if ($capaian1 == 1) {
                                $capaian = "Belum Ada Tanda Bonus Demografi";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 2) {
                                $capaian = "Tahap Pra-Bonus Demografi";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 3) {
                                $capaian = "Bonus Demografi Sedang Berjalan";
                                $sumber = $sumber1;
                            } elseif ($capaian1 == 4) {
                                $capaian = "Tahap Bonus Demografi Lanjut";
                                $sumber = $sumber1;
                            } else {
                                $capaian = '*';
                                $sumber = '*';
                            }
                        }

                        $tisi .= '<th scope="col" style="text-align: center ;">' . $capaian . '</th>
                        <th scope="col" style="text-align: center ;">' . $sumber . '</th>';
                    }
                    ?>
                    <?= $tisi; ?>

                </tr>
            </tbody>
        </table>
        <?php if ($baris <= 4) : ?>
            <p class="p4">Keterangan : * Tidak ada data</p>
            <p class="p4">Diunduh pada tanggal : <?= date('d-m-Y'); ?>, Jam : <?= date('H:i:s'); ?> WIB</p>
        <?php endif; ?>
    </div>
    </div>
<?php endif; ?>
<?php endif; ?>

<!-- halaman 5 -->

<?php if ($baris > 4) : ?>
    <div class="page_break">

        <!-- dua halaman -->

        <?php if ($baris > 4 && $baris <= 5) : ?>

            <?php

            $data = explode(',', $akhir);

            $end = '';

            for ($i = 20; $i < $n; $i++) {

                $title = $data[$i];

                $koma = ', ';

                $end .= $title . $koma;
            };

            $asli = substr($end, 0, -2);

            ?>
            <header>
                <img src="logobkkbn.jpg" width="20%">
            </header>
            <p class="p3" style="text-align: center ;">CAPAIAN INDIKATOR <?= $judul; ?></p>
            <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
            <div class="center">
                <table class="table1">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                            <th scope="col" rowspan="2" style="text-align: center ;">INDIKATOR</th>
                            <?php $data = explode(',', $akhir);

                            $th = '';
                            $td = '';

                            for ($i = 20; $i < $n; $i++) {

                                $tahun = $data[$i];

                                $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                                $td .= '<td scope="col" style="text-align: center ;">CAPAIAN</td>
                <td scope="col" style="text-align: center ;">SUMBER</td>';
                            }
                            ?>
                            <?= $th; ?>
                        </tr>
                        <tr>
                            <?= $td; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $tisi = '';
                        $indi = mysqli_query($koneksi, "SELECT * FROM indikator_fix JOIN indikator_pilar ON indikator_pilar.kode_indi_pilar  = indikator_fix.indikator_kd");
                        ?>
                        <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                            <tr>
                                <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                                <td scope="col"><?= $d['nama_indi_pilar']; ?></td>

                                <?php $kode = $d['kode_indi_pilar'];

                                for ($i = 20; $i < $n; $i++) {

                                    $tahun = $data[$i];

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kode' ");

                                    $isi = mysqli_fetch_assoc($nilai);

                                    if ($kdi == 4) {

                                        $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                    } else {
                                        $capaian1 = $isi['nilai_indi_pilar'];
                                    }

                                    $sumber1 = $isi['sumber'];

                                    $capaian = '';
                                    $sumber = '';

                                    if ($capaian1 == 0 && $kdi != 11) {

                                        $capaian = '*';
                                        $sumber = '*';
                                    } elseif ($capaian1 != 0 && $kdi != 11) {

                                        $capaian = $capaian1;
                                        $sumber = $sumber1;
                                    }

                                    if ($kdi == 11) {
                                        if ($capaian1 == 1) {
                                            $capaian = "Belum Ada Tanda Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 2) {
                                            $capaian = "Tahap Pra-Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 3) {
                                            $capaian = "Bonus Demografi Sedang Berjalan";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 4) {
                                            $capaian = "Tahap Bonus Demografi Lanjut";
                                            $sumber = $sumber1;
                                        } else {
                                            $capaian = '*';
                                            $sumber = '*';
                                        }
                                    }

                                    $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                                }
                                ?>
                                <?= $tisi; ?>

                            </tr>
                            <?php $no++;
                            $tisi = '';

                            ?>

                        <?php endwhile; ?>
                    </tbody>
                </table>
                <?php if ($baris <= 5) : ?>
                    <p class="p4">Keterangan : * Tidak ada data</p>
                <?php endif; ?>
            </div>
    </div>
<?php endif; ?>


<?php if ($baris > 5) : ?>

    <?php

        $data = explode(',', $akhir);

        $end = '';

        for ($i = 20; $i < 25; $i++) {

            $title = $data[$i];

            $koma = ', ';

            $end .= $title . $koma;
        };

        $asli = substr($end, 0, -2);

    ?>
    <header>
        <img src="logobkkbn.jpg" width="20%">
    </header>
    <p class="p3" style="text-align: center ;">CAPAIAN INDIKATOR <?= $judul; ?></p>
    <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
    <div class="center">
        <table class="table1">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                    <th scope="col" rowspan="2" style="text-align: center ;">INDIKATOR</th>
                    <?php $data = explode(',', $akhir);

                    $th = '';
                    $td = '';

                    for ($i = 20; $i < 25; $i++) {

                        $tahun = $data[$i];

                        $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                        $td .= '<td scope="col" style="text-align: center ;">CAPAIAN</td>
            <td scope="col" style="text-align: center ;">SUMBER</td>';
                    }
                    ?>
                    <?= $th; ?>
                </tr>
                <tr>
                    <?= $td; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $tisi = '';
                $indi = mysqli_query($koneksi, "SELECT * FROM indikator_fix JOIN indikator_pilar ON indikator_pilar.kode_indi_pilar  = indikator_fix.indikator_kd");
                ?>
                <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                    <tr>
                        <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                        <td scope="col"><?= $d['nama_indi_pilar']; ?></td>

                        <?php $kode = $d['kode_indi_pilar'];

                        for ($i = 20; $i < 25; $i++) {

                            $tahun = $data[$i];

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kode' ");

                            $isi = mysqli_fetch_assoc($nilai);

                            if ($kdi == 4) {

                                $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                            } else {
                                $capaian1 = $isi['nilai_indi_pilar'];
                            }

                            $sumber1 = $isi['sumber'];

                            $capaian = '';
                            $sumber = '';

                            if ($capaian1 == 0 && $kdi != 11) {

                                $capaian = '*';
                                $sumber = '*';
                            } elseif ($capaian1 != 0 && $kdi != 11) {

                                $capaian = $capaian1;
                                $sumber = $sumber1;
                            }

                            if ($kdi == 11) {
                                if ($capaian1 == 1) {
                                    $capaian = "Belum Ada Tanda Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 2) {
                                    $capaian = "Tahap Pra-Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 3) {
                                    $capaian = "Bonus Demografi Sedang Berjalan";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 4) {
                                    $capaian = "Tahap Bonus Demografi Lanjut";
                                    $sumber = $sumber1;
                                } else {
                                    $capaian = '*';
                                    $sumber = '*';
                                }
                            }

                            $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                    <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                        }
                        ?>
                        <?= $tisi; ?>

                    </tr>
                    <?php $no++;
                    $tisi = '';
                    ?>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php if ($baris <= 5) : ?>
            <p class="p4">Keterangan : * Tidak ada data</p>
        <?php endif; ?>
    </div>
    </div>
<?php endif; ?>
<?php endif; ?>

<!-- halaman 6 -->

<?php if ($baris > 5) : ?>
    <div class="page_break">

        <!-- dua halaman -->

        <?php if ($baris > 5 && $baris <= 6) : ?>

            <?php

            $data = explode(',', $akhir);

            $end = '';

            for ($i = 25; $i < $n; $i++) {

                $title = $data[$i];

                $koma = ', ';

                $end .= $title . $koma;
            };

            $asli = substr($end, 0, -2);

            ?>
            <header>
                <img src="logobkkbn.jpg" width="20%">
            </header>
            <p class="p3" style="text-align: center ;">CAPAIAN INDIKATOR <?= $judul; ?></p>
            <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
            <div class="center">
                <table class="table1">
                    <thead>
                        <tr>
                            <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                            <th scope="col" rowspan="2" style="text-align: center ;">INDIKATOR</th>
                            <?php $data = explode(',', $akhir);

                            $th = '';
                            $td = '';

                            for ($i = 25; $i < $n; $i++) {

                                $tahun = $data[$i];

                                $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                                $td .= '<td scope="col" style="text-align: center ;">CAPAIAN</td>
                <td scope="col" style="text-align: center ;">SUMBER</td>';
                            }
                            ?>
                            <?= $th; ?>
                        </tr>
                        <tr>
                            <?= $td; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        $tisi = '';
                        $indi = mysqli_query($koneksi, "SELECT * FROM indikator_fix JOIN indikator_pilar ON indikator_pilar.kode_indi_pilar  = indikator_fix.indikator_kd");
                        ?>
                        <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                            <tr>
                                <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                                <td scope="col"><?= $d['nama_indi_pilar']; ?></td>

                                <?php $kode = $d['kode_indi_pilar'];

                                for ($i = 25; $i < $n; $i++) {

                                    $tahun = $data[$i];

                                    $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kode' ");

                                    $isi = mysqli_fetch_assoc($nilai);

                                    if ($kdi == 4) {

                                        $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                                    } else {
                                        $capaian1 = $isi['nilai_indi_pilar'];
                                    }

                                    $sumber1 = $isi['sumber'];

                                    $capaian = '';
                                    $sumber = '';

                                    if ($capaian1 == 0 && $kdi != 11) {

                                        $capaian = '*';
                                        $sumber = '*';
                                    } elseif ($capaian1 != 0 && $kdi != 11) {

                                        $capaian = $capaian1;
                                        $sumber = $sumber1;
                                    }

                                    if ($kdi == 11) {
                                        if ($capaian1 == 1) {
                                            $capaian = "Belum Ada Tanda Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 2) {
                                            $capaian = "Tahap Pra-Bonus Demografi";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 3) {
                                            $capaian = "Bonus Demografi Sedang Berjalan";
                                            $sumber = $sumber1;
                                        } elseif ($capaian1 == 4) {
                                            $capaian = "Tahap Bonus Demografi Lanjut";
                                            $sumber = $sumber1;
                                        } else {
                                            $capaian = '*';
                                            $sumber = '*';
                                        }
                                    }

                                    $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                        <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                                }
                                ?>
                                <?= $tisi; ?>

                            </tr>
                            <?php $no++;
                            $tisi = '';

                            ?>

                        <?php endwhile; ?>
                    </tbody>
                </table>
                <?php if ($baris <= 6) : ?>
                    <p class="p4">Keterangan : * Tidak ada data</p>
                <?php endif; ?>
            </div>
    </div>
<?php endif; ?>


<?php if ($baris > 6) : ?>

    <?php

        $data = explode(',', $akhir);

        $end = '';

        for ($i = 25; $i < 30; $i++) {

            $title = $data[$i];

            $koma = ', ';

            $end .= $title . $koma;
        };

        $asli = substr($end, 0, -2);

    ?>
    <header>
        <img src="logobkkbn.jpg" width="20%">
    </header>
    <p class="p3" style="text-align: center ;">CAPAIAN INDIKATOR <?= $judul; ?></p>
    <p class="p1" style="text-align: center ; ">TAHUN : <?= $asli; ?></p>
    <div class="center">
        <table class="table1">
            <thead>
                <tr>
                    <th scope="col" rowspan="2" style="text-align: center ;">#</th>
                    <th scope="col" rowspan="2" style="text-align: center ;">INDIKATOR</th>
                    <?php $data = explode(',', $akhir);

                    $th = '';
                    $td = '';

                    for ($i = 25; $i < 30; $i++) {

                        $tahun = $data[$i];

                        $th .= '<th scope="col" colspan="2" style="text-align: center ;">' . $tahun . '</th>';

                        $td .= '<td scope="col" style="text-align: center ;">CAPAIAN</td>
            <td scope="col" style="text-align: center ;">SUMBER</td>';
                    }
                    ?>
                    <?= $th; ?>
                </tr>
                <tr>
                    <?= $td; ?>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1;
                $tisi = '';
                $indi = mysqli_query($koneksi, "SELECT * FROM indikator_fix JOIN indikator_pilar ON indikator_pilar.kode_indi_pilar  = indikator_fix.indikator_kd");
                ?>
                <?php while ($d = mysqli_fetch_assoc($indi)) : ?>
                    <tr>
                        <td scope="col" style="text-align: center ;"><?= $no; ?>.</td>
                        <td scope="col"><?= $d['nama_indi_pilar']; ?></td>

                        <?php $kode = $d['kode_indi_pilar'];

                        for ($i = 25; $i < 30; $i++) {

                            $tahun = $data[$i];

                            $nilai = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE tahun_indi_pilar = '$tahun' AND kode_wilayah = '$kdwil' AND kd_indi_pilar = '$kode' ");

                            $isi = mysqli_fetch_assoc($nilai);

                            if ($kdi == 4) {

                                $capaian1 = number_format($isi['nilai_indi_pilar'], 0, ",", ".");
                            } else {
                                $capaian1 = $isi['nilai_indi_pilar'];
                            }

                            $sumber1 = $isi['sumber'];

                            $capaian = '';
                            $sumber = '';

                            if ($capaian1 == 0 && $kdi != 11) {

                                $capaian = '*';
                                $sumber = '*';
                            } elseif ($capaian1 != 0 && $kdi != 11) {

                                $capaian = $capaian1;
                                $sumber = $sumber1;
                            }

                            if ($kdi == 11) {
                                if ($capaian1 == 1) {
                                    $capaian = "Belum Ada Tanda Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 2) {
                                    $capaian = "Tahap Pra-Bonus Demografi";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 3) {
                                    $capaian = "Bonus Demografi Sedang Berjalan";
                                    $sumber = $sumber1;
                                } elseif ($capaian1 == 4) {
                                    $capaian = "Tahap Bonus Demografi Lanjut";
                                    $sumber = $sumber1;
                                } else {
                                    $capaian = '*';
                                    $sumber = '*';
                                }
                            }

                            $tisi .= '<td scope="col" style="text-align: center ;">' . $capaian . '</td>
                    <td scope="col" style="text-align: center ;">' . $sumber . '</td>';
                        }
                        ?>
                        <?= $tisi; ?>

                    </tr>
                    <?php $no++;
                    $tisi = '';
                    ?>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php if ($baris <= 6) : ?>
            <p class="p4">Keterangan : * Tidak ada data</p>
        <?php endif; ?>
    </div>
    </div>
<?php endif; ?>
<?php endif; ?>

<style>
    /** Define the margins of your page **/
    @page {
        margin: 100px 25px;
    }

    header {
        position: fixed;
        top: -80px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        /* background-color: #03a9f4; */
        color: white;
        text-align: center;
        line-height: 35px;
    }

    footer {
        position: fixed;
        bottom: 600px;
        left: 0px;
        right: 0px;
        height: 50px;

        /** Extra personal styles **/
        /* background-color: #03a9f4; */
        /* color: white; */
        text-align: left;
        /* line-height: 35px; */
    }
</style>
<style>
    .table1 {
        font-family: sans-serif;
        font-size: 10px;
        color: #232323;
        border-collapse: collapse;
        width: 100%;
    }

    .table1,
    th,
    td {
        border: 1px solid #999;
        padding: 5px 5px;
    }

    .center {
        margin-left: auto;
        margin-right: auto;
        width: 100%;
        border: 0px;
        padding: 1px;
        overflow-x: auto;
    }

    .p3 {
        font-family: Arial, Helvetica, sans-serif;
        margin-top: -10px;
    }

    .p1 {
        font-family: Arial, Helvetica, sans-serif;
        margin-top: -15px;
    }

    .p4 {
        font-family: Arial, Helvetica, sans-serif;
        font-size: 10px;
    }
</style>



<style>
    body {
        max-width: 1180px;
        width: 98%;
        margin: 0px auto;
        text-align: left;
        /* background-image: url("logobkkbn.jpg"); */
    }
</style>


<style>
    div.page_break+div.page_break {
        page-break-before: always;
    }
</style>

<?php

$html = ob_get_clean();

$pdf->loadHtml($html);

// (Optional) Setup the paper size and orientation
$pdf->setPaper('A4', 'potrait');

// Render the HTML as PDF
$pdf->render();

$sela = '_';

if ($kdwil == 99) {

    $file = $namaindi . $sela . $tkfile;
}

if ($kdwil != 99) {

    $prov = 'Provinsi';

    $file = $namaindi . $sela . $prov . $sela . $nm;
}

$pdf2 = '.pdf';

$nmdile = $file . $pdf2;
// Output the generated PDF to Browser
$pdf->stream($nmdile, array('Attachment =>0'));
