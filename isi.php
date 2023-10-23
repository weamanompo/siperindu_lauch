<?php

include 'koneksi.php';

if (isset($_POST["login"])) {

    $ag = $_POST['aga'];

    $query2 = "INSERT INTO api

VALUES 

('',  '$ag')";

    mysqli_query($koneksi, $query2);
}

if (mysqli_affected_rows($koneksi) > 0) {


    echo "<script>alert('Proses Penambahan Data Berhasil');
document.location.href = 'aga.php';
</script>";
}else {

    echo "<script>alert('Proses Penambahan data Gagal !');
document.location.href = 'aga.php';
</script>";
}

?>