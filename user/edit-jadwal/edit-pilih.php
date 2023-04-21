<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location:../login.php");
   exit;
}
require "tiket.php";
$username = $_SESSION['username'];
// $kereta = query("SELECT * FROM kereta WHERE berangkat='Surabaya Gubeng' AND tujuan='Bandung'");
#SELECT * FROM `kereta` WHERE berangkat = 'Surabaya Gubeng' AND tujuan = 'Bandung';
$kereta = query("SELECT * FROM kereta");
$berangkat = $_POST['berangkat'];
$tujuan = $_POST['tujuan'];
$kereta = query("SELECT * FROM kereta WHERE berangkat = '$berangkat' AND tujuan = '$tujuan'");

penumpangEdit($_POST);
$penumpang = query("SELECT * FROM penumpang");
$id = $_GET["id"];
$pemesanan = query("SELECT * FROM pemesanan WHERE id = $id");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <style>
      .namapesan {
         outline: 0;
         border-width: 0 0 2px;
         border-color: blue;
      }
   </style>
   <title>User | <?php echo ucfirst($username) ?></title>
</head>

<body>
   <?php include('navbar.php') ?>
   <div class="container">


      <div class="row">
         <?php $i = 1;
         foreach ($kereta as $kt) : ?>
            <div class="col-md-4">
               <form action="edit-pembelian.php" method="post">
                  <div class="card">
                     <img src="download.png" alt="KAI" width="70">
                     <div class="card-body">
                        <div class="row">
                           <div class="col">
                              <h5 class="card-title"><?= $kt['nama_kereta'] ?></h5>


                           </div>
                           <div class="col">
                              <p>Rp<?= $kt['harga'] ?></p>

                           </div>
                        </div>
                        <div class="row">
                           <div class="col">
                              <p>Berangkat</p>
                              <p><?= $kt['berangkat'] ?></p>

                              <p><?= $kt['jam_berangkat'] ?></p>
                              <!-- <input type="hidden" name="jam_berangkat" value="</?= $kt['jam_berangkat'] ?>"> -->
                           </div>
                           <div class="col">
                              <p>Tujuan</p>
                              <p><?= $kt['tujuan'] ?></p>
                              <!-- <input type="hidden" name="tujuan" value="</?= $kt['tujuan'] ?>"> -->
                              <p><?= $kt['jam_tujuan'] ?></p>
                              <!-- <input type="hidden" name="jam_tujuan" value="</?= $kt['jam_tujuan'] ?>"> -->
                           </div>
                        </div>
                        <input type="hidden" name=penumpang value="<?php echo $_POST['penumpang'] ?>">
                        <!--<input type="hidden" name=tanggal value="</?php echo $_POST['tanggal'] ?>"> -->
                        <a href="pembelian.php?id=<?= $kt["id"] ?>" class="btn btn-primary"><input type="hidden" name="pesan">Pesan</a>
                     </div>
                  </div>
               </form>
            </div>
         <?php endforeach; ?>
      </div>

   </div>
   <ul>

   </ul>
</body>

</html>