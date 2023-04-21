<?php
session_start();
require 'function.php';

if (isset($_SESSION["login"])) {
    if ($_SESSION["role"] == "admin") {
        header("Location:./admin/admin.php");
        exit;
    } else {
        header("Location:./user/index.php");
        exit;
    }
}

$err = "";
if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");
    if (mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);

        if (password_verify($password, $row['password'])) {

            if ($row['role'] == "admin") {
                $_SESSION["login"] = true;

                $username = $row['username'];
                $address = $row['address'];
                $nik = $row['nik'];
                $email = $row['email'];
                $_SESSION['username'] = $username;
                $_SESSION['address'] = $address;
                $_SESSION['nik'] = $nik;
                $_SESSION['email'] = $email;
                header("Location:./admin/admin.php");
                exit;
            } else {
                $_SESSION["login"] = true;

                $username = $row['username'];
                $address = $row['address'];
                $nik = $row['nik'];
                $email = $row['email'];
                $_SESSION['username'] = $username;
                $_SESSION['address'] = $address;
                $_SESSION['nik'] = $nik;
                $_SESSION['email'] = $email;
                header("Location:./user/index.php");
                exit;
            }
        } else {
            $err = "email dan password salah";
        }
    } else {
        $err = "email dan password salah";
    }
}
?>

<!DOCTYPE html>
<!-- Created By CodingLab - www.codinglabweb.com -->
<html lang="en">

<head>
    <meta charset="utf-8">
    <!----<title>Login Form Design | CodeLab</title>---->
    <style>
        <?php include("login.css") ?>
    </style>
</head>

<body>
    <div class="wrapper">
        <div class="title">Login Form</div>
        <form action="" method="POST">
            <p><?php echo $err; ?></p>
            <div class="field">
                <input type="text" name="email" required autocomplete="off">
                <label>Email Address</label>
            </div>
            <div class="field">
                <input type="password" name="password" required>
                <label>Password</label>
            </div><br>
            <div class="field">
                <input type="submit" name="login" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="register.php">Signup now</a></div>
            <div class="back">
                <a href="index.php"> &laquo;Back</a>
            </div>
        </form>
    </div>
</body>

</html>