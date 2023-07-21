<?php require "../functions.php"; ?>
<h1>Halaman Registrasi</h1>

<div class="form-group">
  <div class="row">
    <div class="col-sm-5">
      <label for="">Username</label>
      <input type="text" class="form-control" id="username">
    </div>
    <div class="col-sm-7">
      <label for="">Nama Lengkap</label>
      <input type="text" class="form-control" id="nama_lengkap">
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <label for="">Password</label>
      <input type="password" name="" id="pw1" class="form-control">
    </div>
    <div class="col-sm-6">
      <label for="">Confirm Password</label>
      <input type="password" name="" id="pw2" class="form-control">
    </div>
    <div class="col-sm-10">
      <label for="">Image</label>
      <input type="file" id="gambar" class="form-control">
    </div>
    <div class="col-sm-2">
      <button class="btn btn-info mt-4" id="simpan_registrasi">Simpan</button>
    </div>
  </div>
  <div class="row mt-2">
    <div class="table table-responsive">
      <table class="table table-sm table-dark table-striped">
        <thead>
          <tr>
            <th>No</th>
            <th>Username</th>
            <th>Nama Lengkap</th>
            <th>Gambar</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 1;
          foreach (user() as $u) : ?>
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $u["username"]; ?></td>
              <td><?= $u["nama_lengkap"]; ?></td>
              <td><img src="img/<?= user_img($u["id"]); ?>" class="rounded mx-auto d-block" alt="" style="width: 100px;"></td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
</div>

<script>
  $("#simpan_registrasi").click(function() {
    var username = $("#username").val()
    var nama_lengkap = $("#nama_lengkap").val()
    var password1 = $("#pw1").val()
    var password2 = $("#pw2").val()

    if (username == "" || nama_lengkap == "" || password1 == "") {
      alert("Data masih ada yang kosong!")
    } else if (password1 != password2) {
      alert("Confirm Password tidak sesuai!")
    } else {
      const gambar = $("#gambar").prop('files')[0];
      let formData = new FormData();

      formData.append('gambar', gambar)
      formData.append('username', username)
      formData.append('nama_lengkap', nama_lengkap)
      formData.append('pw1', password1)
      formData.append('pw2', password2)

      $.ajax({
        type: "POST",
        url: "controllers/simpan_registrasi.php",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: function(data) {
          if (data == "format tidak sesuai") {
            alert("format tidak sesuai")
          } else if (data == "gambar terlalu besar") {
            alert("gambar terlalu besar")
          } else if (data == "berhasil") {
            $("#halaman_body").load("view/halaman_registrasi.php")
            alert("Simpan berhasil")
          } else {
            alert("Simpan gagal")
          }
        }
      })

    }

  })
</script>