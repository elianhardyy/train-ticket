<?php
$gambarla = query("SELECT * FROM users WHERE username = '$username'")[0];
?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.3/font/bootstrap-icons.css">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
   <div class="container-fluid">
      <a class="navbar-brand" href="index.php"><img src="../download.png" alt="kereta api" width="70px"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
         <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
         <ul class="navbar-nav me-auto mb-2 mb-lg-0">

            <li class="nav-item">
               <a class="nav-link" href="detail-user.php"><img class="rounded-circle" width="30px" src="
                        <?php
                        if ($gambarla["gambar"] == "") { ?>
                           https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg
                        <?php   } else {
                           echo "../uploads/" . $gambarla["gambar"];
                        }
                        ?>"></a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" aria-current="page" href="index.php">Home</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="nota.php">Tiket</a>
            </li>
         </ul>
         <ul class="navbar-nav">

            <a class="nav-link justify-content" href="../index.php"><i class="bi bi-box-arrow-left"></i>Kembali</a>

         </ul>

      </div>
   </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>