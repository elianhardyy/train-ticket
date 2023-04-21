<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location:../login.php");
   exit;
}
$username = $_SESSION['username'];
require "tiket.php";
$pp = query("SELECT * FROM penumpang ORDER BY id DESC LIMIT 1")[0];
$getp = $pp["penumpang"];
$nota = query("SELECT * FROM pemesanan ORDER BY id DESC LIMIT $getp ");
$harga = query("SELECT * FROM pemesanan ORDER BY id DESC LIMIT 1")[0];
$pembayaran = query("SELECT * FROM pembayaran ORDER BY id DESC LIMIT 1")[0];
$total = $harga["harga"] * $getp;
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
   <style>
      <?php include('nota.css') ?>
   </style>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>

   <?php include("navbar.php"); ?>
   <div class="receipt-content">
      <div class="container bootstrap snippets bootdey">
         <br>
         <h2>Thank You For Purchase</h2>

         <?php
         foreach ($nota as $nt) { ?> <div class="row">


               <div class="col-md-12">
                  <div class="invoice-wrapper">
                     <h3><?= $nt["nama_kereta"] ?></h3>
                     <span>Waktu Pesan Tiket</span>
                     <p><?= $nt["tanggal"]; ?></p>
                     <span>Waktu Keberangkatan</span>
                     <p><?= $nt["tanggal_berangkat"]; ?></p>
                     <div class="intro">
                        <strong><?= $nt["username"] ?></strong>,
                        <p><?= $nt["nik"] ?></p>

                        <?= $nt["gerbong"] ?>/<?= $nt["nomor_kursi"] ?>
                     </div>

                     <div class="payment-info">
                        <div class="row">
                           <div class="col-sm-6">
                              <span>Berangkat</span>
                              <strong><?= $nt["berangkat"] ?></strong>
                              <p><?= $nt["jam_berangkat"] ?></p>
                           </div>
                           <div class="col-sm-6 text-right">
                              <span>Tujuan</span>
                              <strong><?= $nt["tujuan"] ?></strong>
                              <p><?= $nt["jam_tujuan"] ?></p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         <?php }
         ?>
         <div class="row">
            <div class="col-md-12">
               <div class="invoice-wrapper">
                  <h6> Harga Per Tiket : Rp <?= $harga["harga"] ?></h6>
                  <p>Jumlah penumpang : <?php echo $getp ?> </p>
                  <p> Bayar : Rp <?php if ($pembayaran["bayar"] == 0) { ?>
                        <a class="btn badge bg-success" href="pembayaran.php">Bayar</a>
                     <?php } else {
                                    echo $pembayaran["bayar"];
                                 } ?>

                  </p>
                  <div class="border"></div>
                  <p> Total : Rp <?php echo $total ?></p>
                  <p> Kembalian : <?php if ($pembayaran["bayar"] == 0) { ?>
                        <a class="btn badge bg-success" href="pembayaran.php">Bayar</a>
                     <?php } else {
                                       echo $pembayaran["bayar"] - $total;
                                    } ?>
               </div>
            </div>
         </div><br>
         <a href="index.php" class="btn btn-primary">Selesai</a>
      </div>
      <div class="footer">
         Copyright &copy; 2022. Keretaku
      </div>
      <br>
   </div>
   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>