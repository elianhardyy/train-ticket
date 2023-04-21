<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../login.php");
    exit;
}
$idkereta = $_GET["id"];
require "kereta.php";
$username = $_SESSION['username'];
$namakereta = query("SELECT * FROM kereta WHERE kereta.id_kereta=$idkereta")[0];
$detailkereta = query("SELECT * FROM stasiun_kereta JOIN kereta ON stasiun_kereta.id_kereta=kereta.id_kereta JOIN stasiun ON stasiun_kereta.id_stasiun=stasiun.id_stasiun WHERE stasiun_kereta.id_kereta=$idkereta ORDER BY stasiun_kereta.jam_datang ASC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | <?php echo ucfirst($username) ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>
<body>
<?php include('navbar.php') ?>
    
    <h1><?php echo $namakereta["nama_kereta"]?></h1>
   <h2>Rp <?php echo number_format($namakereta["harga"])?></h2>
    <br>
    
    <div class="container" id="container">
        <table class="table table-hover table-striped table-bordered mt-3">
        <tr>
                <th scope="col">No</th>
                <th scope="col">Nama Kereta</th>
                <th scope="col">Kelas</th>
                
                <th scope="col">Waktu</th>
                <th scope="col">Aksi</th>
            </tr>
            <?php
            $no=1;
             foreach ($detailkereta as $dk ) { ?>
        <tr>
            <td><?= $no++;?></td>
            <td><?= $dk["nama_stasiun"]; ?></td>
            <td><?= $dk["kelas"]; ?></td>
            <td><?= $dk["jam_datang"]; ?></td>
            <td>
                <a href="detail-stasiun.php?id=<?=$dk["id_stasiun"]?>" class="btn badge btn-secondary">Detail Stasiun</a>
            </td>
        </tr>
        <?php } ?>
        </table>
    </div>
</body>
</html>