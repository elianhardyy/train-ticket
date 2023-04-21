<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location:../login.php");
   exit;
}
require "edit-function.php";
$username = $_SESSION['username'];
$address = $_SESSION['address'];
$id = $_GET["id"];
// $penumpang = query("SELECT * FROM penumpang ORDER BY id DESC LIMIT 1")[0];
// $pp = query("SELECT * FROM penumpang ORDER BY id DESC LIMIT 1")[0];
// $getp = $pp["penumpang"];
//$pemesanan = query("SELECT * FROM pemesanan ORDER BY id=$id LIMIT $getp");
// foreach ($pemesanan as $pem) {
//    $t = $pem["id"];
// }

// query("SELECT * FROM pemesanan WHERE id = $id")
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
      input {
         outline: 0;
         border-width: 0 0 2px;
         border-color: blue;
         transition: all 12s ease-in;
      }

      input:focus {
         border-color: green;
         border-width: 0 0 0.2px;
      }
   </style>
   <title>User | <?php echo $username ?></title>
</head>

<body>
   <?php include('navbar-edit.php') ?>
   <div class="container">
      <h1>Edit Jadwal <?php echo $username ?></h1>
      <form action="edit-pilih.php" method="post">
         <div class="row mt-4">
            <input type="hidden" name="id" value="<?= $pemesanan["id"]; ?>">
            <div class="col">
               <label>Berangkat</label><br>
               <input type="hidden">
               <input type="text" name="berangkat" id="berangkat" placeholder="Berangkat" autocomplete="off">
            </div>
            <div class="col">
               <label>Tujuan</label><br>

               <input type="text" name="tujuan" id="tujuan" placeholder="Tujuan" autocomplete="off">
            </div>
         </div>
         <br>
         <div class="row">


            <div class="col-md-6">
               <label for="penumpang">Jumlah Penumpang</label><br>
               <input type="number" name="penumpang">
            </div>
            <div class="col-md-6">
               <label for="tanggal">Tanggal</label><br>
               <input type="date" name="tanggal_pesan">
            </div>

         </div>
         <br>
         <button name="pesan" class="btn btn-primary">Pesan</button>
      </form>

   </div>
</body>

</html>