<?php
date_default_timezone_set("Asia/Jakarta");

$koneksi = mysqli_connect("localhost", "root", "", "web_lanjut_a2");

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

function user()
{
    return q("SELECT * FROM user ORDER BY updated DESC");
}

function user_img($id_user)
{
    $a = mysqli_fetch_assoc(
        q("SELECT * FROM user_img WHERE id_user = '$id_user'")
    );
    return $a["gambar"];
}
