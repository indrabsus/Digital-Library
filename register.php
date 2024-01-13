
    <div class="container">
  <div class="row mt-5 mb-5 justify-content-center">
  <div class="col-md-6">
      <div class="card">
          <div class="card-header">
            <p class="text-center"><strong>Register Digital Library</strong></p>
          </div>
          <form action="index.php?page=postregister" method="POST" id="logForm">
          <div class="card-body">
            <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username">
          </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group">
              <label>Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
              <label>Nama Lengkap</label>
              <input type="text" class="form-control" name="nama_lengkap">
            </div>
            <div class="form-group">
              <label>Alamat</label>
              <textarea name="alamat" class="form-control" cols="30" rows="5"></textarea>
            </div>
            <button type="submit" class="btn btn-primary btn-sm">Daftar</button>
            <hr>
            <a href="index.php?page=login">Kembali ke Login</a>
          </div>
          </form>
        </div>
  </div>
  
  </div>
</div>