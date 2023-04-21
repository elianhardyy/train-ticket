<?php
session_start();
$idstasiun = $_GET["id"];
require "kereta.php";
$username = $_SESSION['username'];

$detailstasiun = query("SELECT * FROM stasiun_kereta JOIN stasiun ON stasiun_kereta.id_stasiun=stasiun.id_stasiun JOIN kereta ON stasiun_kereta.id_kereta=kereta.id_kereta WHERE stasiun_kereta.id_stasiun=$idstasiun ORDER BY stasiun_kereta.jam_datang ASC ")

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | <?php echo ucfirst($username) ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
    <?php include("navbar.php")?>
    <?php foreach($detailstasiun as $ds) { ?>
        <h1><?= $ds["nama_kereta"];?></h1>
    <?php } ?>
</body>
</html>