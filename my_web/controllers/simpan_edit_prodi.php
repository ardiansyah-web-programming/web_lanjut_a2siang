<?php
require "../functions.php";

//Isi $_POST itu didapat dari data yang dikirim melalui ajax
$nama_prodi = $_POST["nama_prodi"];
$id_prodi = $_POST["id_prodi"];

$tgl = date("Y-m-d H:i:s");

$simpan_edit = q("UPDATE prodi SET
nama_prodi = '$nama_prodi',
edit = '$tgl'
WHERE
id = '$id_prodi'");
if ($simpan_edit) {
  echo "berhasil";
} else {
  echo "gagal";
}
