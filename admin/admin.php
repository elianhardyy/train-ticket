<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../login.php");
    exit;
}

require "kereta.php";
$username = $_SESSION['username'];
$kereta = query("SELECT * FROM kereta");
$stasiun = query("SELECT * FROM stasiun");
if(isset($_POST["pemberhentian"]))
{
    if(tambahpemberhentian($_POST) > 0)
    {
        header("Location:admin.php");
    }else{
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
    <title>Admin | <?php echo ucfirst($username) ?></title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php include('navbar.php') ?>
    <h1>Admin <?php echo ucfirst($username) ?></h1>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <?php foreach($kereta as $kt){?>
    <div class="modal fade" id="exampleModal<?= $kt["id_kereta"]?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="" method="POST">
        <div class="modal-body">
            <input type="hidden" name="id_kereta" value="<?= $kt["id_kereta"]?>" class="form-control">
            <label for="">Stasiun</label>
            <select name="id_stasiun" id="" class="form-select">
                <?php foreach($stasiun as $st) {?>
                    <option value="<?= $st["id_stasiun"]?>"><?php echo $st["nama_stasiun"]?></option>
                    <?php } ?>
                </select>
            <label for="">Waktu Stasiun</label>
            <input type="time" name="jam_datang" class="form-control">
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name="pemberhentian">Save changes</button>
        </div>
        </form>
        
        </div>
    </div>
    </div>
    <?php } ?>

    <a href="tambahkereta.php" class="btn btn-primary">Tambah Kereta</a>

    <form action="" method="POST">
        <input type="text" name="keyword" placeholder="Search...." id="keyword" autocomplete="off">

    </form>

    <div id="container" class="container">
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
            <?php
            $i = 1;
            foreach ($kereta as $kt) : ?>
                <tr>
                    <td scope="row"><?= $i++; ?></td>
                    <td><?= ucfirst($kt['nama_kereta']); ?></td>
                    <td><?= ucfirst($kt['kelas']); ?></td>
                    <td><?= $kt["berangkat"]; ?>
                        <?= $kt['jam_berangkat']; ?></td> 
                    <td><?= $kt["tujuan"]; ?>
                        <?= $kt['jam_tujuan']; ?></td></td> 
                        
                    <td>Rp <?= number_format($kt['harga']); ?></td>
                    <td>

                        <a class="btn badge bg-danger" href="delete-kereta.php?id=<?= $kt['id_kereta'] ?>" onclick="return confirm('Anda yakin mau menghapus')">Delete</a>
                        <a class="btn badge bg-success" href="edit-kereta.php?id=<?= $kt['id_kereta'] ?>">Edit</a>
                        <a class="btn badge bg-primary" href="detail-kereta.php?id=<?= $kt['id_kereta'] ?>">Daftar Pemberhentian</a>
                        <button type="button" class="btn badge bg-warning" data-bs-toggle="modal" data-bs-target="#exampleModal<?= $kt["id_kereta"]?>">
                        Tambah Pemberhentian
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    </div>


    <script src="script.js"></script>
</body>

</html>