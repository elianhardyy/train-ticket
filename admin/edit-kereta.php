<?php
session_start();
require 'kereta.php';
$id = $_GET["id"];
$kereta = query("SELECT * FROM kereta WHERE id_kereta = $id")[0];

if (isset($_POST["submit"])) {
   if (ubahkereta($_POST) > 0) {
      header("Location:admin.php");
   } else {
      echo mysqli_error($connect);
   }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tambah</title>
</head>

<body>
   <?php include('navbar.php') ?>
   <div class="container mt-1">
      <h1>Edit Kereta</h1>
      <form class="mt-3" method="POST" action="">
         <input type="hidden" name="id" value="<?= $kereta["id_kereta"]; ?>">
         <div class="mb-3 col-md-5">
            <label for="exampleInputEmail1" class="form-label">Kereta</label>
            <input type="text" class="form-control" name="nama_kereta" value="<?= $kereta["nama_kereta"] ?>">
         </div>
         <div class="mb-3 col-md-5">
            <label for="exampleInputEmail1" class="form-label">Kelas</label>
            <input type="text" class="form-control" name="kelas" value="<?= $kereta["kelas"] ?>">
         </div>
         <div class="mb-3 col-md-5">
            <label for="exampleInputEmail1" class="form-label">Berangkat</label>
            <input type="text" class="form-control" name="berangkat" value="<?= $kereta["berangkat"]?>">

         </div>
         <div class="mb-3 col-md-5">
            <label for="exampleInputEmail1" class="form-label">Jam Berangkat</label>
            <input type="time" class="form-control" name="jam_berangkat" >

         </div>
         <div class="mb-3 col-md-5">
            <label for="exampleInputPassword1" class="form-label">Tujuan</label>
            <input type="text" class="form-control" name="tujuan" value="<?= $kereta["tujuan"]?>">

         </div>
         <div class="mb-3 col-md-5">
            <label for="exampleInputPassword1" class="form-label">Jam Tujuan</label>
            <input type="time" class="form-control" name="jam_tujuan">

         </div>
         <div class="mb-3 col-md-5">
            <label for="exampleInputPassword1" class="form-label">Harga</label>
            <input type="text" class="form-control" name="harga">

         </div>

         <button type="submit" name="submit" class="btn btn-primary mt-2">Submit</button>
      </form>
      <a href="admin.php"> &laquo; Back</a>
   </div>
</body>

</html>