<?php

include 'koneksi.php';

$aga = mysqli_query($koneksi, "SELECT * FROM api ORDER BY id desc");

?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Aga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<style>
#content {
  max-width: 500px;
  margin: auto;
}
</style>
<body>
    <h4></h4>
    <form method="post" action="isi.php">
        <div class="card" style="width: 18rem;" id="content">
            <div class="card-body">
                <h5 class="card-title">Form</h5>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"></label>
                    <input type="text" class="form-control" name="aga">
                </div>
                <button type="submit" name="login" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
    <hr>
    <div class="card" style="width: 18rem;" id="content">
            <div class="card-body">
            <h5 class="card-title">Data Hasil Input</h5>
                <div class="mb-3">
                <table class="table">
        <thead>
            <tr>
                <th scope="col"></th>
            </tr>
        </thead>
        <tbody>
            <?php while ($a = mysqli_fetch_assoc($aga)) : ?>
                <?php $r = $a['api_wa']; ?>
                <tr>
                    <td><?= $r; ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>

</html>