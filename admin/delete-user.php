<?php
require "user.php";

$id = $_GET['id'];
if (delete($id) > 0) {

   header("Location:daftar-user.php");
}
