<?php
require "functions.php";
?>

<h2>Ini adalah halaman Program Studi</h2>

<p id="berhasil"></p>

<div class="row" id="tampil_edit_prodi">
    <div class="col-sm-6">
        <label for="">Nama Program Studi</label>
        <input type="text" class="form-control" id="nama_prodi">
        <p class="peringatan" id="lihat_nama_prodi"></p>
    </div>
    <div class="col-sm-6">
        <button class="btn btn-info mt-4" id="simpan_prodi">Simpan</button>
    </div>
</div>

<div class="table-responsive">
    <table class="table table-sm table-dark">
        <thead>
            <tr>
                <th>No</th>
                <th>ID</th>
                <td>Nama Prodi</td>
                <th>Created</th>
                <th>Updated</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php $nomor = 1;
            foreach (prodi() as $p) : ?>
                <tr>
                    <td><?= $nomor++; ?></td>
                    <td><?= $p["id"]; ?></td>
                    <td><?= $p["nama_prodi"]; ?></td>
                    <td><?= $p["simpan"]; ?></td>
                    <td><?= $p["edit"]; ?></td>
                    <td>
                        <button class="btn btn-success btn-sm edit-prodi" id_prodi="<?= $p["id"]; ?>">Edit</button>
                        <button class="btn btn-danger btn-sm hapus-prodi" id_prodi="<?= $p["id"]; ?>">Hapus</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    $(".edit-prodi").click(function() {
        var id_prodi = $(this).attr("id_prodi")
        $.ajax({
            type: "POST",
            url: "view/tampil_edit_prodi.php",
            //Ini diambil dari variabel id_prodi
            data: "id_prodi=" + id_prodi,
            success: function(data) {
                $("#tampil_edit_prodi").html(data)
            }
        })
    })

    $(".hapus-prodi").click(function() {
        var id_prodi = $(this).attr("id_prodi")
        var jawab = confirm("Yakin anda ingin menghapus data tersebut?");
        if (jawab === true) {
            $.ajax({
                type: "POST",
                url: "controllers/hapus_prodi.php",
                data: "id_prodi=" + id_prodi,
                success: function(data) {
                    if (data == "gagal") {
                        $("#berhasil").html(`
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> Data gagal dihapus!
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `)
                    } else if (data == "berhasil") {
                        alert("Data berhasil dihapus!")
                        $("#halaman_body").load("prodi.php")
                    }
                }
            })
        } else {
            return false;
        }
    })

    $("#simpan_prodi").click(function() {
        var nama_prodi = $("#nama_prodi").val()
        if (nama_prodi == "") {
            $("#lihat_nama_prodi").text("Nama Prodi masih kosong!")
        } else {
            $.ajax({
                type: "POST",
                url: "controllers/simpan_prodi.php",
                data: "nama_prodi=" + nama_prodi,
                success: function(data) {
                    if (data == "berhasil") {
                        alert("Data berhasil ditambahkan!")
                        $("#halaman_body").load("prodi.php")
                    } else {
                        $("#berhasil").html(`
                        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                            <strong>Warning!</strong> Data pernah ditambahkan sebelumnya.
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        `)
                    }
                }
            })
            $("#lihat_nama_prodi").text("")
        }
    })
</script>