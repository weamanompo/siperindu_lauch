<!-- selatan -->

<?php

include 'koneksi.php';

// kab merauke  1

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.01'");

?>


<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '93.01'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<?php

//  digoel  2 

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.17'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '93.02'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php

// //  mappi  3 

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.16'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '93.03'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php


//  ASMAT   4

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.18'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '93.04'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<!-- papua tengah -->

<?php


// kab nabire  1

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.04'");

?>


<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '94.01'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<?php

//  puncak jaya  2 

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.07'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '94.02'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php

// //  Paniai  3 

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.08'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '94.03'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php

//  Mimika   4

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.09'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '94.04'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<!-- 5 -->

<?php

//  Puncak 5

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.25'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '94.05'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<!--  Dogiyai 6 -->

<?php


$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.26'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '94.06'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<!-- Intan jaya 7 -->

<?php


$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.27'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '94.07'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<!-- deiyai  8 -->

<?php


$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.28'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '94.08'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<!-- papua pegunungan -->

<?php


// kab jayawijaya  1

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.02'");

?>


<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '95.01'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<?php

//  peg bintang  2 

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.12'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '95.02'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php

// //  Yahukimo  3 

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.13'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '95.03'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php

//  Tolikara   4

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.14'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '95.04'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<!-- 5 -->

<?php

//  Memberamo tengah 5

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.21'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '95.05'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<!--  Yalimo 6 -->

<?php


$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.22'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '95.06'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<!-- Lanny jaya 7 -->

<?php


$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.23'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '95.07'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<!-- Nduga  8 -->

<?php


$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '91.24'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '95.08'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<!-- papua barat daya -->


<?php

// kab sorong   1

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '92.01'");

?>


<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '96.01'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>


<?php

//  SORONG SELATAN  2  92.04

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '92.04'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '96.02'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php

// //  RAJA AMPAT   3 92.05

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '92.05'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '96.03'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php


//  AMBRAUW   4  92.09

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '92.09'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '96.04'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php

// MAYBRAT   5 92.10

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '92.10'");

?>


<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '96.05'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>

<?php


//  KOTA SORONG 6  92.71

$data = mysqli_query($koneksi, "SELECT * FROM transaksi_pilar WHERE kode_wilayah = '92.71'");

?>

<?php while ($d = mysqli_fetch_assoc($data)) : ?>

    <?php $id = $d['id'];

    $query1 = "UPDATE transaksi_pilar
            SET               
            kode_wilayah   = '96.71'                                            
            WHERE id = '$id'
    
            ";

    mysqli_query($koneksi, $query1); ?>

<?php endwhile ?>