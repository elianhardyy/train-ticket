<?php
require "kereta.php";

$id = $_GET['id'];
if (delete($id) > 0) {

   header("Location:admin.php");
}
