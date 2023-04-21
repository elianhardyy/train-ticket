<?php
require "../user.php";
$keywords = $_GET["keyword"];
$query = "SELECT * FROM users WHERE 
                        username LIKE '%$keywords%' OR 
                        email LIKE '%$keywords%' OR 
                        usertype LIKE '%$keywords%'";
$user = query($query);
?>
<table class="table table-hover table-striped table-bordered mt-3">

   <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Email</th>
      <th scope="col">Type</th>
      <th scope="col">Status</th>
   </tr>
   <?php
   $i = 1;
   foreach ($user as $u) : ?>
      <tr>
         <td scope="row"><?= $i++; ?></td>
         <td><?= $u['username']; ?></td>
         <td><?= $u['email']; ?></td>
         <td><?= $u['usertype']; ?></td>
         <td>

            <a class="btn badge bg-danger" href="delete-user.php?id=<?= $u['id'] ?>">Delete</a>

         </td>
      </tr>
   <?php endforeach; ?>
</table>