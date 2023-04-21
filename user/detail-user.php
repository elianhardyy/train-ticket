<?php
session_start();
if (!isset($_SESSION["login"])) {
   header("Location:../login.php");
   exit;
}
require "../function.php";

$username = $_SESSION['username'];
$address = $_SESSION['address'];
//$phone = $_SESSION['phone'];
$email = $_SESSION['email'];
$untukgambar = mysqli_query($conn, "SELECT * FROM users WHERE username = '$username'");
if (isset($_POST['save'])) {
   if ($untukgambar) {
      if (mysqli_num_rows($untukgambar) > 0) {

         if (ubahregister($_POST) > 0) {
            header("Location:index.php");
         } else {
            echo mysqli_error($conn);
         }
      }
   }
}
$result = mysqli_query($conn, "SELECT * FROM users  WHERE username = '$username'");

?>
<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
   <title>User | <?php echo ucfirst($username); ?></title>
   <style>
      <?php include("detail-user.css") ?>
   </style>
</head>

<body>
   <div class="container rounded bg-white mt-5 mb-5">
      <a href="index.php">Kembali</a>
      <div class="row">
         <div class="col-md-3 border-right">
            <div class="d-flex flex-column align-items-center text-center p-3 py-5">
               <?php
               if ($result) {
                  if (mysqli_num_rows($result) > 0) {
                     while ($row = mysqli_fetch_array($result)) { ?>
                        <img class="rounded-circle mt-5" width="150px" src="
                        <?php
                        if ($row["gambar"] == "") { ?>
                           user.png
                        <?php   } else {
                           echo "../uploads/" . $row["gambar"];
                        }
                        ?>">

                        <span class="font-weight-bold"><?php echo ucfirst($username) ?></span>
                        <span class="text-black-50"><?php echo $email; ?></span>
            </div>
         </div>
         <div class="col-md-5 border-right">
            <div class="p-3 py-5">
               <div class="d-flex justify-content-between align-items-center mb-3">
                  <h4 class="text-right">Profile Settings</h4>
               </div>
               <form action="" method="POST" enctype="multipart/form-data">

                  <div class="row mt-2">
                     <input type="hidden" name="id_users" value="<?= $row["id_users"] ?>">
                     <input type="hidden" name="password" value="<?= $row["password"] ?>">
                     <input type="hidden" name="role" value="<?= $row["role"] ?>">
                     <!-- <input type="hidden" name="gambar" value="</?= $row["gambar"] ?>"> -->
                     <div class="col-md-6"><label class="labels">Name</label><input type="text" name="username" class="form-control" placeholder="first name" value="<?= $row["username"] ?>" autocomplete="off"></div>

                  </div>
                  <div class="row mt-3">
                     <div class="col-md-12"><label class="labels">NIK</label><input type="text" name="nik" class="form-control" placeholder="enter phone number" value="<?= $row["nik"] ?>" autocomplete="off"></div>
                     <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" name="address" class="form-control" placeholder="enter address line 1" value="<?= $row["address"] ?>" autocomplete="off"></div>
                     <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" name="email" class="form-control" placeholder="enter address line 2" value="<?= $row["email"] ?>" autocomplete="off"></div>
                     <div class="col-md-12"><label class="labels">Gambar</label><br><input type="file" name="gambar"></div>
                  </div>

         <?php }
                  }
               }
         ?>
         <!-- <button class="btn btn-primary profile-button" type="button" name="save">Save Profile</button> -->
         <div class="mt-5 text-center">
            <input type="submit" name="save" value="Save" class="btn btn-primary profile-button">
         </div>
               </form>

            </div>
         </div>

      </div>
   </div>
   </div>
   </div>
</body>

</html>