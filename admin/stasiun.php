<?php
session_start();
require "kereta.php";

$stasiun = query("SELECT * FROM stasiun");
$username = $_SESSION["username"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include("navbar.php") ?>
    <div class="container" id="container">
        <h1>Daftar Stasiun</h1>
    <a href="tambahstasiun.php" class="btn btn-primary">Tambah Stasiun</a>
        <table class="table table-hover table-striped table-bordered mt-3">
        <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Stasiun</th>               
               
                <th scope="col">Aksi</th>
            </tr>
            <?php
            $no=1;
             foreach ($stasiun as $st ) { ?>
        <tr>
            <td><?= $no++;?></td>
            <td><?= $st["nama_stasiun"]; ?></td>
        
            <td>
                <a href="detail-stasiun.php?id=<?=$st["id_stasiun"]?>" class="btn badge btn-secondary">Detail Stasiun</a>
            </td>
        </tr>
        <?php } ?>
        </table>
    </div>
</body>
</html>