<?php
require_once('config/koneksi.php');

class User {

    public function login($username=null, $password=null) {
        $set = new Koneksi;
        $sql = "select * from user WHERE username='$username' OR email='$username'";
        $query = mysqli_query($set->kon(), $sql);
        $data = mysqli_fetch_assoc($query);
        $datapassword = isset($data['Password']) ? $data['Password'] : "";
        if(password_verify($password, $datapassword)){
            if($data['Role'] == 'admin'){
                header('location: dashboard.php?page=admin');
            } elseif($data['Role'] == 'petugas'){
                header('location: dashboard.php?page=petugas');
            } else {
                header('location: dashboard.php?page=user');
            }
        } else {
            echo "<script>";
            echo 'alert("Login Gagal.");';
            echo 'window.location.href = "index.php?page=login";';
            echo '</script>';
        }
    }

    public function register($data){
        $set = new Koneksi;
        $username = $data['username'];
        $password = password_hash($data['password'], PASSWORD_BCRYPT);
        $email = $data['email'];
        $nama_lengkap = $data['nama_lengkap'];
        $alamat = $data['alamat'];
        $sql = "insert into user VALUES (NULL, '$username','$password','$email','$nama_lengkap','$alamat','user')";
        $query = mysqli_query($set->kon(), $sql);
        if($query){
            echo "<script>";
            echo 'alert("Berhasil Daftar.");';
            echo 'window.location.href = "index.php?page=login";';
            echo '</script>';
        } else {
            echo "<script>";
            echo 'alert("Pendaftaran Gagal.");';
            echo 'window.location.href = "index.php?page=register";';
            echo '</script>';
        }
    }
}

?>
