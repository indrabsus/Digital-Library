<?php
    // require('config/koneksi.php');
    
    class Fungsi{
        public function viewkategori(){
            $set = new Koneksi;
            $sql = "select * from kategoribuku";
            $query = mysqli_query($set->kon(), $sql);
            $select = [];
            while($d = mysqli_fetch_assoc($query)){
                $select[] = $d;}
                return $select;
        }
        public function insertKategori($namaKategori){
            $set = new Koneksi;
            $sql = "insert into kategoribuku VALUES(NULL, '$namaKategori')";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
            echo "<script>";
            echo 'alert("Berhasil tambah data!");';
            echo 'window.location.href = "dashboard.php?page=kategoribuku";';
            echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal tambah data!");';
                echo 'window.location.href = "dashboard.php?page=kategoribuku";';
                echo '</script>';
            }
        }
        public function editkategori($id){
            $set = new Koneksi;
            $sql = "select * from kategoribuku WHERE KategoriID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            $data = mysqli_fetch_assoc($query);
            return $data;
        }
        public function updatekategori($id,$kategori){
            $set = new Koneksi;
            $sql = "update kategoribuku SET NamaKategori='$kategori' WHERE KategoriID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Edit Data!");';
                echo 'window.location.href = "dashboard.php?page=kategoribuku";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Edit Data!");';
                echo 'window.location.href = "dashboard.php?page=kategoribuku";';
                echo '</script>';
            }
        }
        public function hapuskategori($id){
            $set = new Koneksi;
            $sql = "delete from kategoribuku WHERE KategoriID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Hapus Data!");';
                echo 'window.location.href = "dashboard.php?page=kategoribuku";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Hapus Data!");';
                echo 'window.location.href = "dashboard.php?page=kategoribuku";';
                echo '</script>';
            }
        }


        public function viewbuku(){
            $set = new Koneksi;
            $sql = "select * from  buku";
            $query = mysqli_query($set->kon(), $sql);
            $select = [];
            while($d = mysqli_fetch_assoc($query)){
                $select[] = $d;}
                return $select;
        }
        public function katbuku($id){
            $set = new Koneksi;
            $sql = "select * from kategoribuku_relasi LEFT JOIN kategoribuku ON kategoribuku_relasi.KategoriID=kategoribuku.KategoriID WHERE kategoribuku_relasi.BukuID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            $select = [];
            while($d = mysqli_fetch_assoc($query)){
                $select[] = $d;}
                return $select;
        }
        public function insertbuku($judul, $penulis, $penerbit, $tahun, $kategori){
            $set = new Koneksi;
            $sql = "INSERT INTO buku VALUES (NULL,'$judul', '$penulis', '$penerbit', '$tahun')";
            if($kategori == NULL){
                echo "<script>";
                echo 'alert("Gagal Tambah Data!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
                exit();
            }
            $query = mysqli_query($set->kon(), $sql);
            $buk = "select * from buku order by BukuID desc limit 1";
            $qkat = mysqli_query($set->kon(), $buk);
            $data = mysqli_fetch_assoc($qkat);
            $id_buku = $data['BukuID'];

            foreach($kategori as $k){
                $sql2 = "INSERT INTO kategoribuku_relasi VALUES (NULL,'$id_buku', '$k')";
                $query2 = mysqli_query($set->kon(), $sql2);
            }
            if($query2){
                echo "<script>";
                echo 'alert("Berhasil Tambah Data!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Tambah Data!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            }
        }

        public function editbuku($id){
            $set = new Koneksi;
            $sql = "select * from buku WHERE BukuID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            $data = mysqli_fetch_assoc($query);
            return $data;
        }
        
        public function updatebuku($id,$data){
            $judul = $data['judul'];
            $penulis = $data['penulis'];
            $penerbit = $data['penerbit'];
            $tahun = $data['tahun'];
            $set = new Koneksi;
            $sql = "update buku SET Judul='$judul', Penulis='$penulis', Penerbit='$penerbit', TahunTerbit='$tahun' WHERE BukuID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Edit Data!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Edit Data!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            }
        }

        public function hapusbuku($id){
            $set = new Koneksi;
            $sql = "delete from buku WHERE BukuID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Hapus Data!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Hapus Data!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            }
        }

        public function ajukanpinjam($id_user, $id_buku, $tanggal_pinjam){
            $tanggal_kembali = date('Y-m', strtotime($tanggal_pinjam)).'-'.date('d', strtotime($tanggal_pinjam)) + 3;
            $set = new Koneksi;
            $sql = "insert into peminjaman VALUES (NULL, '$id_user', '$id_buku', '$tanggal_pinjam', '$tanggal_kembali', 'wait')";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Pinjam Buku menunggu persetujuan!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Pinjam Buku!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            }
        }
        public function postulasan($id_user, $id_buku, $ulasan, $rating){
            $set = new Koneksi;
            $sql = "insert into ulasanbuku VALUES (NULL, '$id_user', '$id_buku', '$ulasan', '$rating')";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil memberikan ulasan!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal memberikan ulasan!");';
                echo 'window.location.href = "dashboard.php?page=databuku";';
                echo '</script>';
            }
        }

        public function viewpeminjam(){
            $set = new Koneksi;
            $sql = "select * from peminjaman LEFT JOIN user ON peminjaman.UserID=user.UserID LEFT JOIN buku ON peminjaman.BukuID=buku.BukuID";
            $query = mysqli_query($set->kon(), $sql);
            $select = [];
            while($d = mysqli_fetch_assoc($query)){
                $select[] = $d;}
                return $select;
        }
        public function konfirmasipinjaman($id_peminjaman, $tanggal_pengembalian, $id_user, $id_buku){
            $set = new Koneksi;
            $sql = "update peminjaman SET TanggalPengembalian='$tanggal_pengembalian', StatusPeminjaman='pinjam' WHERE PeminjamanID='$id_peminjaman'";
            $query = mysqli_query($set->kon(), $sql);

            $sql2 = "insert into koleksipribadi VALUES (NULL, '$id_user', '$id_buku')";
            $query2 = mysqli_query($set->kon(), $sql2);
            if($query2){
                echo "<script>";
                echo 'alert("Berhasil konfirmasi dan masuk ke Koleksi Pribadi User!");';
                echo 'window.location.href = "dashboard.php?page=datapeminjam";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal konfirmasi!");';
                echo 'window.location.href = "dashboard.php?page=datapeminjam";';
                echo '</script>';
            }
        }
        public function konfirmasipengembalian($id_peminjaman){
            $set = new Koneksi;
            $sql = "update peminjaman SET StatusPeminjaman='selesai' WHERE PeminjamanID='$id_peminjaman'";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil konfirmasi!");';
                echo 'window.location.href = "dashboard.php?page=datapeminjam";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal konfirmasi!");';
                echo 'window.location.href = "dashboard.php?page=datapeminjam";';
                echo '</script>';
            }
        }
        public function hapuspeminjam($id){
            $set = new Koneksi;
            $sql = "delete from peminjaman WHERE PeminjamanID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Hapus Data!");';
                echo 'window.location.href = "dashboard.php?page=datapeminjam";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Hapus Data!");';
                echo 'window.location.href = "dashboard.php?page=datapeminjam";';
                echo '</script>';
            }
        }

        public function viewkoleksi(){
            $set = new Koneksi;
            $id_user = $_SESSION['data']['UserID'];
            $sql = "select * from koleksipribadi LEFT JOIN user ON koleksipribadi.UserID=user.UserID LEFT JOIN buku ON koleksipribadi.BukuID=buku.BukuID LEFT JOIN peminjaman ON koleksipribadi.UserID=peminjaman.UserID WHERE koleksipribadi.UserID='$id_user'";
            $query = mysqli_query($set->kon(), $sql);
            $select = [];
            while($d = mysqli_fetch_assoc($query)){
                $select[] = $d;}
                return $select;
        }

        public function viewulasan(){
            $set = new Koneksi;
            $sql = "select * from ulasanbuku LEFT JOIN user ON ulasanbuku.UserID=user.UserID LEFT JOIN buku ON ulasanbuku.BukuID=buku.BukuID";
            $query = mysqli_query($set->kon(), $sql);
            $select = [];
            while($d = mysqli_fetch_assoc($query)){
                $select[] = $d;}
                return $select;
        }
        public function hapusulasan($id){
            $set = new Koneksi;
            $sql = "delete from ulasanbuku WHERE UlasanID='$id'";
            $query = mysqli_query($set->kon(), $sql);
            if($query){
                echo "<script>";
                echo 'alert("Berhasil Hapus Data!");';
                echo 'window.location.href = "dashboard.php?page=ulasan";';
                echo '</script>';
            } else {
                echo "<script>";
                echo 'alert("Gagal Hapus Data!");';
                echo 'window.location.href = "dashboard.php?page=ulasan";';
                echo '</script>';
            }
        }
}