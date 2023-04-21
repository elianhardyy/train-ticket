<?php
$connect = mysqli_connect('localhost', 'root', '', 'train');

function query($query)
{
    global $connect;
    $result = mysqli_query($connect, $query);
    $rows = [];
    while ($row = mysqli_fetch_array($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambahkereta($data)
{
    global $connect;
    $nama_kereta = $data['nama_kereta'];
    $kelas = $data['kelas'];
    $berangkat = $data['berangkat'];
    $jam_berangkat = $data['jam_berangkat'];
    $tujuan = $data['tujuan'];
    $jam_tujuan = $data['jam_tujuan'];
    $harga = $data['harga'];

    //$idclass = "";
   

    mysqli_query($connect, "INSERT INTO kereta(`nama_kereta`, `kelas`, `berangkat`, `jam_berangkat`, `tujuan`, `jam_tujuan`, `harga`) VALUES('$nama_kereta','$kelas','$berangkat','$jam_berangkat','$tujuan','$jam_tujuan',$harga)");
  
    return mysqli_affected_rows($connect);
}
function tambahpemberhentian($data)
{
    global $connect;
    $idkereta = $data["id_kereta"];
    $idstasiun = $data["id_stasiun"];
    $jamdatang = $data["jam_datang"];
    mysqli_query($connect,"INSERT INTO stasiun_kereta(`id_stasiun`,`id_kereta`,`jam_datang`) VALUES('$idstasiun','$idkereta','$jamdatang')");
}
function search($keyword)
{
    $query = "SELECT * FROM kereta WHERE nama_kereta = '$keyword'";
    return query($query);
}
function delete($id)
{
    global $connect;
    mysqli_query($connect, "DELETE FROM kereta WHERE id_kereta = '$id'");
    return mysqli_affected_rows($connect);
}

function ubahkereta($data)
{
    global $connect;
    $id = $data["id"];
    $nama_kereta = $data['nama_kereta'];
    $kelas = $data['kelas'];
    $berangkat = $data['berangkat'];
    $jam_berangkat = $data['jam_berangkat'];
    $tujuan = $data['tujuan'];
    $jam_tujuan = $data['jam_tujuan'];
    $harga = $data['harga'];

    mysqli_query($connect, "UPDATE kereta SET nama_kereta='$nama_kereta',kelas='$kelas',berangkat='$berangkat',jam_berangkat='$jam_berangkat',
    tujuan='$tujuan',jam_tujuan='$jam_tujuan',harga=$harga WHERE id_kereta=$id");
    return mysqli_affected_rows($connect);
}
