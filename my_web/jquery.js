$("#halaman_body").load("beranda.php")

$(".halaman").click(function () {
    var halaman = $(this).attr("halaman")
    if (halaman == "mahasiswa") {
        $("#halaman_body").load("mahasiswa.php")
    } else if (halaman == "beranda") {
        $("#halaman_body").load("beranda.php")
    } else if (halaman == "prodi") {
        $("#halaman_body").load("prodi.php")
    } else if (halaman == "halaman_login") {
        $("#halaman_body").load("view/halaman_login.php")
    } else if (halaman == "halaman_registrasi") {
        $("#halaman_body").load("view/halaman_registrasi.php")
    } else if (halaman == "halaman_profile") {
        $("#halaman_body").load("view/halaman_profile.php")
    }
})