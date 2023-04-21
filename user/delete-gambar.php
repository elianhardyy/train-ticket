<!-- </?php
session_start();
require "../function.php";
$username = $_SESSION['username'];
$gambar = $_GET["keyword"];
$untukgambar = mysqli_query($conn, "SELECT * FROM users WHERE gambar = '$gambar'");

$hapusGambar = $untukgambar[0]["gambar"];
if (mysqli_num_rows($hapusGambar) > 0) {

   if (deleteGambar($hapusgambar) > 0) {
      header("Location:index.php");
   } else {
      echo mysqli_error($conn);
   }
} -->