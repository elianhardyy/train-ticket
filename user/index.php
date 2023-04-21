<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../login.php");
    exit;
}
require "tiket.php";
$username = $_SESSION['username'];
$address = $_SESSION['address'];

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
        .category{
            width:80px;
        }
    </style>
    <title>User | <?php echo $username ?></title>
</head>

<body>
    <?php include('navbar.php') ?>
    <div class="container">
        <h1>Welcome <?php echo $username ?></h1>
        <form action="pilih.php" method="post">
            <div class="row mt-4">
                <div class="col">
                    <label>Berangkat</label><br>

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
            <div class="row">
                <div class="col-md-6">
                    <label for="kategori">Kategori</label><br>
                    <select class="form-select category" aria-label="Default select example">
                    <option selected>----- Pilih Jenis Penumpang -----</option>
                    <option value="A">Anak</option>
                    <option value="D">Dewasa</option>
                </select>
                </div>
               
            </div>
            <br>
            <button name="pesan" class="btn btn-primary">Pesan</button>
        </form>

    </div>
</body>

</html>