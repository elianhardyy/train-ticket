<?php
require "../kereta.php";
$keyword = $_GET["keyword"];
$query = "SELECT * FROM kereta WHERE 
                        nama_kereta LIKE '%$keyword%' OR 
                        kelas LIKE '%$keyword%' OR 
                        berangkat LIKE '%$keyword%' OR
                        tujuan LIKE '%$keyword%' OR
                        harga LIKE '%$keyword%'";
$kereta = query($query);
?>
<table class="table table-hover table-striped table-bordered mt-3">

   <tr>
      <th scope="col">No</th>
      <th scope="col">Nama Kereta</th>
      <th scope="col">Kelas</th>
      <th scope="col">Berangkat</th>
      <th scope="col">Tujuan</th>
      <th scope="col">Harga</th>
      <th scope="col">Aksi</th>
   </tr>
   <?php $i = 1;
   foreach ($kereta as $kt) : ?>
      <tr>
         <td scope="row"><?= $i++; ?></td>
         <td><?= ucfirst($kt['nama_kereta']); ?></td>
         <td><?= ucfirst($kt['kelas']); ?></td>
         <td><?= $kt['berangkat']; ?><br>
            <?= $kt['jam_berangkat']; ?></td>
         <td><?= $kt['tujuan']; ?><br>
            <?= $kt['jam_tujuan']; ?></td>
         <td>Rp <?= $kt['harga']; ?></td>
         <td>

            <a class="btn badge bg-danger" href="delete-kereta.php?id=<?= $kt['id_kereta'] ?>" onclick="return confirm('Anda yakin mau menghapus')">Delete</a>
            <a class="btn badge bg-success" href="edit-kereta.php?id=<?= $kt['id_kereta'] ?>">Edit</a>

         </td>
      </tr>

   <?php endforeach; ?>
</table>