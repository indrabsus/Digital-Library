<h1>Data Peminjaman</h1>
<hr>
    
<div class="table-responsive">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Judul</th>
                <th>Nama Peminjam</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no=1;
                foreach($fungsi->viewpeminjam() as $d){ ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $d['Judul']; ?></td>
                    <td><?= $d['NamaLengkap']; ?></td>
                    <td><?= $d['TanggalPeminjaman']; ?></td>
                    <td>
                        <?php 
                            $sekarang = strtotime(date('Y-m-d'));
                            $kembali = strtotime($d['TanggalPengembalian']);
                            if($sekarang > $kembali) {
                                echo "<span class='badge badge-primary'>Terlambat</span>";
                            } else {
                                echo $d['TanggalPengembalian'];
                            }
                        ?>
                    </td>
                   <td>
                   <?php 
                            if($d['StatusPeminjaman'] == 'wait') { 
                                echo "<span class='badge badge-warning'>Menunggu Persetujuan</span>";
                            } elseif($d['StatusPeminjaman'] == 'pinjam') {
                                echo "<span class='badge badge-success'>Sedang dipinjam</span>";
                            } else {
                                echo "<span class='badge badge-primary'>Selesai</span>";
                            }
                        ?>
                   </td>
                </tr>
             <?php   }
            ?>
        </tbody>
    </table>
</div>



    <?php 
        foreach($fungsi->viewpeminjam() as $c) { ?>
            <div class="modal fade" id="konfirmasi<?= $c['PeminjamanID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Konfirmasi Pinjaman</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=konfirmasipinjaman" method="post">
            <div class="modal-body">
            <input type="text" name="id_peminjaman" value="<?= $c['PeminjamanID'];?>" hidden>
            <input type="text" name="id_buku" value="<?= $c['BukuID'];?>" hidden>
            <input type="text" name="id_user" value="<?= $c['UserID'];?>" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $c['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_lengkap" value="<?= $c['NamaLengkap'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="tanggal_peminjaman" value="<?= $c['TanggalPeminjaman'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="tanggal_pengembalian" value="<?= $c['TanggalPengembalian'] ?>">
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
        foreach($fungsi->viewpeminjam() as $c) { ?>
            <div class="modal fade" id="pengembalian<?= $c['PeminjamanID'] ?>">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Pengembalian Buku</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <form action="dashboard.php?page=konfirmasipengembalian" method="post">
            <div class="modal-body">
            <input type="text" name="id_peminjaman" value="<?= $c['PeminjamanID'];?>" hidden>
              <div class="form-group">
                <label for="">Judul Buku</label>
                <input type="text" class="form-control" name="judul" value="<?= $c['Judul'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Nama Peminjam</label>
                <input type="text" class="form-control" name="nama_lengkap" value="<?= $c['NamaLengkap'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Peminjaman</label>
                <input type="date" class="form-control" name="tanggal_peminjaman" value="<?= $c['TanggalPeminjaman'] ?>" disabled>
              </div>
              <div class="form-group">
                <label for="">Tanggal Pengembalian</label>
                <input type="date" class="form-control" name="tanggal_pengembalian" value="<?= $c['TanggalPengembalian'] ?>" disabled>
              </div>
             <p>Klik Konfirmasi Buku jika sudah dikembalikan</p>
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Konfirmasi Pengembalian</button>
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

<script>
    window.print();
</script>