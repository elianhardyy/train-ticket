<?php
$conn = mysqli_connect('localhost', 'root', '', 'train');

function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function register($data)
{

    global $conn;
    $username = htmlspecialchars(ucfirst(stripslashes($data['username'])));
    $email = htmlspecialchars($data['email']);
    $nik = htmlspecialchars($data['nik']);
    $address = htmlspecialchars($data['address']);
    $password = htmlspecialchars(mysqli_real_escape_string($conn, $data['password']));
    $password2 = htmlspecialchars(mysqli_real_escape_string($conn, $data['password2']));
    //$gambar = htmlspecialchars($data["gambar"]);

    //confirmed checking

    $check_username = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
    if (mysqli_fetch_assoc($check_username)) {
        echo "<script>alert('username ada')</script>";
        return false;
    }
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            alert('email tidak sesuai!');
            </script>";
        return false;
    }
    if ($password !== $password2) {
        echo "<script>
            alert('konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }
    $password = password_hash($password, PASSWORD_DEFAULT);


    //insert new user to database

    if (isset($_POST["admin"])) {
        mysqli_query($conn, "INSERT INTO users(`username`, `nik`, `address`, `email`, `password`, `role`) VALUES('$username','$nik','$address','$email','$password','admin')");
        return false;
    } else {
        mysqli_query($conn, "INSERT INTO users(`username`, `nik`, `address`, `email`, `password`, `role`) VALUES('$username','$nik','$address','$email','$password','user')");
        return false;
    }


    return mysqli_affected_rows($conn);
}
function ubahregister($data)
{
    global $conn;
    $id = $data['id'];
    $username = htmlspecialchars(strtolower(stripslashes($data['username'])));
    $email = htmlspecialchars($data['email']);
    $nik = htmlspecialchars($data['nik']);
    $address = htmlspecialchars($data['address']);
    $password = $data['password'];
    $gambar = upload();
    if (!$gambar) {
        return false;
    }
    $usertype = $data['usertype'];
    mysqli_query($conn, "UPDATE users SET username='$username',nik='$nik',email='$email',address='$address',
          password='$password',gambar='$gambar',usertype='$usertype' WHERE id=$id ");
    //mysqli_query($conn, "REPLACE INTO users('id','username','phone','address','email','password','gambar','usertype') VALUES ($id,'$username','$phone','$address','$email','$password','$gambar','$usertype')");
    return mysqli_affected_rows($conn);
}
function profile($data)
{   
    global $conn;
    $photo = upload();
    $idusers = $data['id_users'];
    mysqli_query($conn,"INSERT INTO profiles(`photo`,`id_users`) VALUES('$photo','$idusers')");
}
function upload()
{
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranFile = $_FILES["gambar"]["size"];
    $error = $_FILES["gambar"]["error"];
    $tmpName = $_FILES["gambar"]["tmp_name"];

    if ($error === 4) { //tidak ada yang di upload
        echo "<script> alert('pilih gambar ')</script>";
        return false;
    }
    $GambarValidationExt = ['jpg', 'jpeg', 'png'];
    $GambarExt = explode('.', $namaFile);
    $GambarExt = strtolower(end($GambarExt));
    if (!in_array($GambarExt, $GambarValidationExt)) { //jika bukan gambar
        echo "<script> alert('bukan gambar')</script>";
        return false;
    }

    if ($ukuranFile > 1000000000) { // jika terlalu besar
        echo "<script> alert('gambar terlalu besar')</script>";
        return false;
    }
    //siap upload
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $GambarExt;
    move_uploaded_file($tmpName, '../uploads/' . $namaFileBaru);

    return $namaFileBaru;
}
