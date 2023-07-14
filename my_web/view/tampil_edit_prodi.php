<?php
require "../functions.php";

$id_prodi = $_POST["id_prodi"];
?>

<div class="col-sm-6">
  <label for="">Nama Program Studi</label>
  <input type="text" class="form-control" id="nama_prodi" value="<?= prodi_satu($id_prodi, "nama_prodi"); ?>">
  <p class="peringatan" id="lihat_nama_prodi"></p>
</div>
<div class="col-sm-6">
  <button class="btn btn-success mt-4" id="simpan_edit_prodi" id_prodi="<?= $id_prodi; ?>">Edit Prodi</button>
</div>

<script>
  $("#simpan_edit_prodi").click(function() {
    var nama_prodi = $("#nama_prodi").val()
    var id_prodi = $(this).attr("id_prodi")
    $.ajax({
      type: "POST",
      url: "controllers/simpan_edit_prodi.php",
      data: "nama_prodi=" + nama_prodi + "&id_prodi=" + id_prodi,
      success: function(data) {
        // console.log(data)
        if (data == "gagal") {
          alert("Nama prodi sudah ada sebelumnya!")
        } else if (data == "berhasil") {
          alert("Prodi berhasil diedit!")
          $("#halaman_body").load("prodi.php")
        }
      }
    })
  })
</script>