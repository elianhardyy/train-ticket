<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location:../login.php");
   exit;
}
require "user.php";
$user = query("SELECT * FROM pemesanan");
?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Daftar User</title>
</head>

<body>
   <?php include('navbar.php') ?>

   <div class="container" id="container">
      <h1>Admin </h1>

      <table class="table table-hover table-striped table-bordered mt-3">

         <tr>
            <th scope="col">No</th>
            <th scope="col">Kereta</th>
            <th scope="col">Kelas</th>
            <th scope="col">Nama</th>
            <th scope="col">Berangkat</th>
            <th scope="col">Tujuan</th>
            <th scope="col">Harga</th>
            <th scope="col">Gerbong</th>
            <th scope="col">Aksi</th>
         </tr>
         <?php
         $i = 1;
         foreach ($user as $u) : ?>
            <tr>
               <td scope="row"><?= $i++; ?></td>
               <td><?= ucfirst($u['nama_kereta']); ?></td>
               <td><?= ucfirst($u['kelas_kereta']); ?></td>
               <td><?= $u['username']; ?></td>
               <td><?= $u['berangkat']; ?><br>
                  <?= $u['jam_berangkat']; ?></td>
               <td><?= $u['tujuan']; ?><br>
                  <?= $u['jam_tujuan']; ?></td>
               <td>Rp <?= $u['harga']; ?></td>
               <td><?= $u['gerbong']; ?></td>
               <td>

                  <a class="btn badge bg-danger" href="delete-history.php?id=<?= $u['id'] ?>" onclick="return confirm('Anda yakin ingin menghapus')">Delete</a>

               </td>
            </tr>
         <?php endforeach ?>
      </table>
      <a href="daftar-user.php">&laquo; Kembali</a>
   </div>
   <script src="daftar-user.js"></script>
</body>

</html>