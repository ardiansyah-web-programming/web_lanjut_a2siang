<?php
date_default_timezone_set("Asia/Jakarta");

function koneksi()
{
    $ip = "localhost";
    $user = "root";
    $password = "";
    $database = "web_lanjut_a2";
    return mysqli_connect($ip, $user, $password, $database);
}

function q($data)
{
    $konek = koneksi();
    return mysqli_query($konek, $data);
}

function prodi()
{
    return q("SELECT * FROM prodi");
}

function prodi_satu($id_prodi, $isi_tabel)
{
    $x = mysqli_fetch_assoc(
        q("SELECT * FROM prodi WHERE id = '$id_prodi'")
    );
    return $x[$isi_tabel];
}
