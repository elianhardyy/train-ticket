<?php
$connect = mysqli_connect('localhost', 'root', '', 'pwd_uas');

function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function delete($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM users WHERE id = '$id'");
    return mysqli_affected_rows($connect);
}
function ubahuser($data)
{
    global $conn;
    $id = $data['id'];
    $username = htmlspecialchars(strtolower(stripslashes($data['username'])));
    $email = htmlspecialchars($data['email']);
    $nik = htmlspecialchars($data['nik']);
    $address = htmlspecialchars($data['address']);
    $password = $data['password'];
    $usertype = $data['usertype'];

    mysqli_query($conn, "UPDATE users SET username='$username',nik='$nik',email='$email',address='$address',
          password='$password',gambar='',usertype='$usertype' WHERE id=$id ");
    //mysqli_query($conn, "REPLACE INTO users('id','username','phone','address','email','password','gambar','usertype') VALUES ($id,'$username','$phone','$address','$email','$password','$gambar','$usertype')");
    return mysqli_affected_rows($conn);
}
