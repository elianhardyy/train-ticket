<?php
$conn = mysqli_connect('localhost', 'root', '', 'pwd_uas');
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
function penumpangEdit($data)
{
   global $conn;
   $penumpang = $data['penumpang'];
   $tanggal_pesan = date('Y-m-d', strtotime($data["tanggal_pesan"]));
   mysqli_query($conn, "INSERT INTO penumpang VALUES ('',$penumpang,'$tanggal_pesan')");
}
function pemesananEdit($data)
{
   
}