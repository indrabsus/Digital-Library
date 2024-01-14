
<h1>Kategori Buku</h1>
<hr>
<div class="mb-3">
<button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#tambahkategori">Tambah</button>
</div>
<div class="table-responsive">
    <table class="display" id="myTable">
        <thead>
            <tr>
                <th>No</th>
                <th>Kategori</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                $no=1;
                foreach($fungsi->viewkategori() as $d){ ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><?= $d['NamaKategori']; ?></td>
                <td>
                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#edit<?= $d['KategoriID'] ?>">Edit</button>
                  <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapuskategori&id_kategori=<?= $d['KategoriID']; ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
              </td>
            </tr>
                <?php }
            ?>
        </tbody>
    </table>
</div>

<div class="modal fade" id="tambahkategori">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Tambah Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=postkategori" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Kategori</label>
                <input type="text" class="form-control" name="kategori">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->

      <?php 
        foreach($fungsi->viewkategori() as $c) { ?>
            <div class="modal fade" id="edit<?= $c['KategoriID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=updatekategori" method="post">
            <div class="modal-body">
            <input type="text" name="id_kategori" value="<?= $c['KategoriID'];?>" hidden>
              <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" class="form-control" name="kategori" value="<?= $c['NamaKategori'] ?>">
              </div>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /.modal -->
      <?php  }
    ?>