<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("Location:../login.php");
    exit;
}
require "user.php";
$username = $_SESSION['username'];
$user = query("SELECT * FROM users");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        a .history {
            text-decoration: none;
        }
    </style>
    <title>Daftar User</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
</head>

<body>
    <?php include('navbar.php') ?>

    <h1>Admin <?php echo ucfirst($username) ?> </h1>
    <form action="" method="POST">
        <input type="text" name="keyword" placeholder="Search...." id="keyword">

    </form>
    <div class="container" id="container">
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

                        <a class="btn badge bg-danger" href="delete-user.php?id=<?= $u['id'] ?> " onclick="return confirm('Anda yakin mau menghapus')">Delete</a>


                    </td>
                </tr>
            <?php endforeach ?>
        </table>
        <a class="history" href="history-pemesanan.php">history pemesanan tiket</a>
    </div>
    <script src="daftar-user.js"></script>
</body>

</html>