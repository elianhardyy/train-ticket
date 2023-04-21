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

function pemesanan($data)
{
   global $conn;

   $nama_kereta = $data['nama_kereta'];
   $kelas = $data['kelas_kereta'];
   $username = $data['username'];
   $nik = $data['nik'];
   $berangkat = $data['berangkat'];
   $jam_berangkat = $data['jam_berangkat'];
   $tujuan = $data['tujuan'];
   $jam_tujuan = $data['jam_tujuan'];
   $harga = $data['harga'];
   $gerbong = $data['gerbong'];
   $tanggal = $data['tanggal'];
   $tanggal_berangkat = $data['tanggal_berangkat'];
   $nomor_kursi = $data['nomor_kursi'];
   foreach ($nama_kereta as $index => $kereta) {
      $nk = $kereta;
      $k_kelas = $kelas[$index];
      $k_user = ucfirst($username[$index]);
      $k_nik = $nik[$index];
      $k_berangkat = $berangkat[$index];
      $k_jam_berangkat = $jam_berangkat[$index];
      $k_tujuan = $tujuan[$index];
      $k_jam_tujuan = $jam_tujuan[$index];
      $k_harga = $harga[$index];
      $k_gerbong = $gerbong[$index];
      $k_tanggal = $tanggal[$index];
      $k_tgl_brngkt = $tanggal_berangkat[$index];
      $k_n_kursi = $nomor_kursi[$index];

      $queryku = "INSERT INTO pemesanan VALUES ('','$nk',$k_nik,'$k_kelas','$k_user','$k_berangkat','$k_jam_berangkat','$k_tujuan','$k_jam_tujuan',$k_harga,'$k_gerbong','$k_tanggal','$k_tgl_brngkt','$k_n_kursi')";
      mysqli_query($conn, $queryku);
   }

   return mysqli_affected_rows($conn);
}
function penumpang($data)
{
   global $conn;
   $penumpang = $data['penumpang'];
   $kategori = $data['kategori'];
   $tanggal_pesan = date('Y-m-d', strtotime($data["tanggal_pesan"]));
   mysqli_query($conn, "INSERT INTO penumpang VALUES ('',$penumpang,'$kategori','$tanggal_pesan')");
}
function kursi($data)
{
   global $conn;
   $kursi = $data['nomor_kursi'];
   mysqli_query($conn, "REPLACE INTO pemesanan('nomor_kursi') VALUES ('$kursi')");
}
function pembayaran($data)
{
   global $conn;
   $bayar = $data["bayar"];
   mysqli_query($conn, "INSERT INTO pembayaran VALUES ('',$bayar)");
   return mysqli_affected_rows($conn);
}
