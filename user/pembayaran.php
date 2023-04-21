<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location:../login.php");
   exit;
}
require "tiket.php";
$username = $_SESSION['username'];
$address = $_SESSION['address'];
$harga = query("SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1")[0];
$pp = query("SELECT * FROM penumpang ORDER BY id DESC LIMIT 1")[0];
if (isset($_POST["submit"])) {
   if (pembayaran($_POST) > 0) {
      header("Location:nota.php");
   } else {
      echo mysqli_error($conn);
   }
}
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
   <form action="" method="POST">
      <div class="card">
         <div class="card-body">
            <p>Total Bayar : <?= $harga["harga"] * $pp["penumpang"] ?> </p>
            <label for="bayar">Masukkan Nominal</label><br>
            <input type="text" name="bayar" id="" placeholder=" Contoh: jika 1.000 menjadi 1000" size="40" autocomplete="off">
            <input type="submit" name="submit" value="Bayar" class="btn btn-primary">
         </div>
      </div>
   </form>
</body>

</html>