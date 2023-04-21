<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location:../login.php");
   exit;
}
require "tiket.php";
$username = $_SESSION['username'];
$address = $_SESSION['address'];
//$nik = $_SESSION['nik'];
$id = $_GET['id'];
$kereta = query("SELECT * FROM kereta WHERE id = $id")[0];
//$total = query("SELECT MAX (harga * penumpang) as total FROM pemesanan ");
//pemesanan($_POST);
//$pemesanan = query("SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1")[0];
$p = query("SELECT * FROM penumpang ORDER BY id DESC LIMIT 1")[0];

//$gerbong = query("SELECT * FROM gerbong ORDER BY id DESC LIMIT $penumpang")[0];
//$penumpang = $_POST["penumpang"];
function randomKursi()
{
   $characters = 'ABCDE';
   echo substr(str_shuffle($characters), 0, 1);
}

function randomNum()
{
   echo rand(1, 24);
}
function randomGerbong()
{
   echo rand(1, 9);
}
if (isset($_POST["bayar"])) {


   if (pemesanan($_POST) > 0) {
      header("Location:pembayaran.php");
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
   <style>
      input {
         outline: 0;
         border-width: 0 0 2px;
         border-color: grey;
      }
   </style>
   <title>User | <?php echo ucfirst($username) ?></title>
</head>

<body>
   <?php include('navbar.php') ?>
   <div class="container">
      <h1>Pemesanan Tiket</h1>

      <form action="" method="POST">

         <?php for ($i = 1; $i <= $p["penumpang"]; $i++) { ?>
            <?php if ($i == 1) { ?>
               <div class="row">
                  <div class="card">
                     <div class="card-header">
                        <label for="">Nama</label><br>
                        <input name="username[]" value="<?php echo $username ?>"><br>

                        <input type="hidden" name="gerbong[]" value="<?= substr($kereta["kelas"], 0, 3) ?>-<?php echo randomGerbong(); ?>">
                        <input type="hidden" name="nomor_kursi[]" value="<?php echo randomNum() . randomKursi() ?>">
                     </div>
                     <div class="card-body">
                        <label>Alamat</label><br>
                        <input class="card-title" value="<?php echo $address; ?>"><br>
                        <label>NIK</label><br>
                        <input class="card-text" name="nik[]" placeholder="Masukkan NIK">
                        <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
                     </div>
                     <input type="hidden" name="nama_kereta[]" value="<?= $kereta["nama_kereta"] ?>">
                     <input type="hidden" name="kelas_kereta[]" value="<?= $kereta["kelas"] ?>">
                     <input type="hidden" name="berangkat[]" value="<?= $kereta["berangkat"] ?>">
                     <input type="hidden" name="jam_berangkat[]" value="<?= $kereta["jam_berangkat"] ?>">
                     <input type="hidden" name="tujuan[]" value="<?= $kereta["tujuan"] ?>">
                     <input type="hidden" name="jam_tujuan[]" value="<?= $kereta["jam_tujuan"] ?>">
                     <input type="hidden" name="tanggal[]" value="<?php echo date('l d M Y'); ?>">
                     <input type="hidden" name="tanggal_berangkat[]" value="<?= $p["tanggal_pesan"]; ?>">
                     <input type="hidden" name="harga[]" value="<?= $kereta["harga"] ?>">

                  </div>
               </div><br>
               <?php continue; ?>
            <?php } ?>

            <div class="row">
               <div class="card">
                  <div class="card-header">
                     <label for="">Nama</label><br>
                     <input name="username[]" placeholder="Masukkan Nama" autocomplete="off"><br>

                     <input type="hidden" name="gerbong[]" value="<?= substr($kereta["kelas"], 0, 3) ?>-<?php echo randomGerbong(); ?>">
                     <input type="hidden" name="nomor_kursi[]" value="<?php echo randomNum() . randomKursi() ?>">
                  </div>
                  <div class="card-body">
                     <label>Alamat</label><br>
                     <input class="card-title" placeholder="Masukkan Alamat" autocomplete="off"><br>
                     <label>NIK</label><br>
                     <input class="card-text" name="nik[]" placeholder="Masukkan NIK" autocomplete="off">
                  </div>
               </div>
               <input type="hidden" name="nama_kereta[]" value="<?= $kereta["nama_kereta"] ?>">
               <input type="hidden" name="kelas_kereta[]" value="<?= $kereta["kelas"] ?>">
               <input type="hidden" name="berangkat[]" value="<?= $kereta["berangkat"] ?>">
               <input type="hidden" name="jam_berangkat[]" value="<?= $kereta["jam_berangkat"] ?>">
               <input type="hidden" name="tujuan[]" value="<?= $kereta["tujuan"] ?>">
               <input type="hidden" name="jam_tujuan[]" value="<?= $kereta["jam_tujuan"] ?>">
               <input type="hidden" name="tanggal[]" value="<?php echo date('l d M Y'); ?>">
               <input type="hidden" name="tanggal_berangkat[]" value="<?= $p["tanggal_pesan"]; ?>">
               <input type="hidden" name="harga[]" value="<?= $kereta["harga"] ?>">

            </div><br>
         <?php } ?>
         <button type="submit" name="bayar" class="btn btn-primary">Bayar</button>
      </form>

   </div>
</body>

</html>