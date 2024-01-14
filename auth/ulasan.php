<h1>Ulasan Buku</h1>
<hr>

<div class="table-responsive">
    <table id="myTable" class="display">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Judul</th>
                <th>Rating</th>
                <th>Ulasan</th>
                <?php
                if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
                <th>Aksi</th>
                <?php } ?>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
                foreach($fungsi->viewulasan() as $d){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['NamaLengkap']; ?></td>
                    <td><?= $d['Judul']; ?></td>
                    <td><?= $d['Rating']; ?></td>
                    <td><?= $d['Ulasan']; ?></td>
                    <?php
                if($_SESSION['data']['Role'] == 'admin' || $_SESSION['data']['Role'] == 'petugas'){ ?>
                    <td>
                        <a class="btn btn-danger btn-sm" href="dashboard.php?page=hapusulasan&id_ulasan=<?= $d['UlasanID'] ?>" onclick="return confirm('Apakah anda yakin menghapus data ini?')">Hapus</a>
                </td>
                <?php } ?>
                </tr>
             <?php   }
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
            <form action="dashboard.php?page=postbuku" method="post">
            <div class="modal-body">
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul">
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis">
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit">
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="text" class="form-control" name="tahun">
              </div>
              <div class="form-group">
              <?php 
                        foreach($fungsi->viewkategori() as $d){ ?>
                            <div><input type="checkbox" name="kategori[<?= $d['KategoriID'] ?>]" value="<?= $d['KategoriID'] ?>"> <?= $d['NamaKategori'] ?></div>
                      <?php  }
                    ?>
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
        foreach($fungsi->viewbuku() as $c) { ?>
            <div class="modal fade" id="edit<?= $c['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Data</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=updatebuku" method="post">
            <div class="modal-body">
            <input type="text" name="id_buku" value="<?= $c['BukuID'];?>" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $c['Judul'] ?>">
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?= $c['Penulis'] ?>">
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $c['Penerbit'] ?>">
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="text" class="form-control" name="tahun" value="<?= $c['TahunTerbit'] ?>">
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
      

      <?php 
        foreach($fungsi->viewbuku() as $c) { ?>
            <div class="modal fade" id="pinjam<?= $c['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=ajukanpinjam" method="post">
            <div class="modal-body">
            <input type="text" name="id_buku" value="<?= $c['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="id_user" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="tanggal_pinjam" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $c['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penulis</label>
                <input type="text" class="form-control" name="penulis" value="<?= $c['Penulis'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" value="<?= $c['Penerbit'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tahun</label>
                <input type="text" class="form-control" name="tahun" value="<?= $c['TahunTerbit'] ?>" disabled>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Ajukan Pinjam Buku</button>
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


<?php 
        foreach($fungsi->viewbuku() as $c) { ?>
            <div class="modal fade" id="ulas<?= $c['BukuID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pinjam Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=postulasan" method="post">
            <div class="modal-body">
            <input type="text" name="id_buku" value="<?= $c['BukuID'];?>" hidden>
            <input type="text" value="<?= $_SESSION['data']['UserID'];?>" name="id_user" hidden>
            <input type="text" value="<?= date('Y-m-d h:i:s')?>" name="tanggal_pinjam" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $c['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Ulasan</label>
                <textarea name="ulasan" class="form-control" cols="30" rows="10"></textarea>
              </div>
              <div class="form-group">
                <label for="">Rating</label>
                <select name="rating" class="form-control">
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                </select>
              </div>
             
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Kirim Ulasan</button>
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

