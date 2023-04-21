<?php
require "history.php";

$id = $_GET['id'];
if (delete($id) > 0) {

   header("Location:history-pemesanan.php");
}
