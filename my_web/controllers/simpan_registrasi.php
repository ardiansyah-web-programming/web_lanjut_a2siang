<?php
require "../functions.php";

$tmp = "../img/";

$fileupload = $_FILES["gambar"]["tmp_name"];
$ImageName = $_FILES["gambar"]["name"];
$ImageType = $_FILES["gambar"]["type"];
$ukuran_file = $_FILES["gambar"]["size"];

$daftar_gambar = ["jpg", "jpeg", "png"];
$ekstensi_gambar = explode(".", $ImageName);
$ekstensi_gambar = strtolower(end($ekstensi_gambar));

if (!in_array($ekstensi_gambar, $daftar_gambar)) {
  echo "format tidak sesuai";
} elseif ($ImageType != "image/jpeg" and $ImageType != "image/png") {
  echo "format tidak sesuai";
} elseif ($ukuran_file > 1000000) {
  echo "gambar terlalu besar";
} else {
  $username = $_POST["username"];
  $nama_lengkap = $_POST["nama_lengkap"];
  $pw1 = $_POST["pw1"];
  $pw2 = $_POST["pw2"];
  $pw_encrypt = password_hash($pw1, PASSWORD_DEFAULT);
  $tanggal_hari_ini = date("Y-m-d H:i:s");

  // $ImageExt       = substr($ImageName, strrpos($ImageName, '.'));
  // $ImageExt       = str_replace('.', '', $ImageExt); // Extension
  // $ImageName      = preg_replace("/\.[^.\s]{3,4}$/", "", $ImageName);
  $g = uniqid();
  // $NewImageName   = str_replace(' ', '', $g . '.' . $ImageExt);
  $NewImageName = $g . '.' . $ekstensi_gambar;

  $simpan_user = mysqli_query(
    $koneksi,
    "INSERT INTO user VALUES(null,
    '$username',
    '$nama_lengkap',
    '$pw_encrypt',
    '$tanggal_hari_ini',
    '$tanggal_hari_ini','')"
  );
  if ($simpan_user) {
    $id_user = mysqli_insert_id($koneksi);
    $simpan_gambar = q("INSERT INTO user_img VALUES('$id_user',
    '$NewImageName',
    '$tanggal_hari_ini','$tanggal_hari_ini')");
    if ($simpan_gambar) {
      move_uploaded_file($fileupload, $tmp . $NewImageName);
      echo "berhasil";
    }
  }
}
