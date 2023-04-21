<?php
require "function.php";


if (isset($_POST['register'])) {

    if (register($_POST) > 0) {
        header("Location:login.php");
    } else {
        echo mysqli_error($conn);
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="register.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.0/font/bootstrap-icons.css">
    <style>
        <?php include "register.css"; ?>
    </style>
</head>

<body>
    <div class="container mt-1">
        <h1 class="title text-center">Registration</h1>
        <form class="mt-3" method="POST" action="">
            <div class="details">

                <div class="input-box">
                    <label for=" username">Username</label>
                    <input type="text" class="form-control" name="username" placeholder="Enter your username" autocomplete="off" required>

                </div>
                <div class="input-box">
                    <label for=" username">NIK</label>
                    <input type="text" class="form-control" name="nik" placeholder="Enter your NIK" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <label for=" username">Address</label>
                    <input type="text" class="form-control" name="address" placeholder="Enter your address" autocomplete="off" required>
                </div>
                <div class="input-box">
                    <label>Email address</label>
                    <input type="text" class="form-control" name="email" placeholder="Enter your email" autocomplete="off" required>

                </div>
                <div class="input-box">
                    <label for=" password">Password</label>
                    <input type="password" class="form-control" placeholder="Enter your password" name="password" required>

                </div>
                <div class="input-box">
                    <label for=" password2">Confirm Password</label>
                    <input type="password" class="form-control" placeholder="Confirm your password" name="password2" required>

                </div>
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" name="admin">
                <label class="form-check-label">admin</label>
            </div>

            <input type="submit" name="register" class="btn btn-primary mt-2" value="Register">
        </form>

        <div class="login-link">
            <p>if you have account </p><a href="login.php">Login</a>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>