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
    <div class="col-sm-5">
      <label for="">Password</label>
      <input type="password" name="" id="pw1" class="form-control">
    </div>
    <div class="col-sm-5">
      <label for="">Confirm Password</label>
      <input type="password" name="" id="pw2" class="form-control">
    </div>
    <div class="col-sm-2">
      <button class="btn btn-info mt-4" id="simpan_registrasi">Simpan</button>
    </div>
  </div>
</div>

<script>
  $("#simpan_registrasi").click(function() {
    var username = $("#username").val()

    if (username == "") {
      alert("Username masih kosong!")
    }
  })
</script>