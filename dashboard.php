<?php
session_start();
    if(!isset($_SESSION['data'])){
        header('location: index.php?page=login');
    }
require_once('config/auth.php');
require_once('config/fungsi.php');
require_once('layouts/dashboard/header.php');

$cek = new User;
$fungsi = new Fungsi;
    if($_GET['page'] == 'admin'){
        require('auth/index.php');
    } elseif($_GET['page'] == 'petugas'){
        require('auth/index.php');
    } elseif($_GET['page'] == 'user'){
        require('auth/index.php');
    } elseif($_GET['page'] == 'databuku') {
        require('auth/databuku.php');
    } elseif($_GET['page'] == 'kategoribuku') {
        require('auth/kategoribuku.php');
    } elseif($_GET['page'] == 'peminjaman') {
        require('auth/peminjaman.php');
    } elseif($_GET['page'] == 'laporan') {
        require('auth/laporan.php');
    } elseif($_GET['page'] == 'logout') {
        $cek->logout();
    } elseif($_GET['page'] == 'postkategori') {
        $fungsi->insertKategori($_POST['kategori']);
    } elseif($_GET['page'] == 'editkategori') {
        require('auth/editkategori.php');
    } elseif($_GET['page'] == 'updatekategori') {
        $fungsi->updatekategori($_POST['id_kategori'], $_POST['kategori']);
    } elseif($_GET['page'] == 'hapuskategori') {
        $fungsi->hapuskategori($_GET['id_kategori']);
    } elseif($_GET['page'] == 'postbuku') {
        $fungsi->insertbuku($_POST['judul'],$_POST['penulis'],$_POST['penerbit'],$_POST['tahun'],$_POST['kategori']);
    } elseif($_GET['page'] == 'editbuku') {
        require('auth/editbuku.php');
    } elseif($_GET['page'] == 'updatebuku') {
        $data['judul'] = $_POST['judul'];
        $data['penulis'] = $_POST['penulis'];
        $data['penerbit'] = $_POST['penerbit'];
        $data['tahun'] = $_POST['tahun'];
        $fungsi->updatebuku($_POST['id_buku'], $data);
    } elseif($_GET['page'] == 'hapusbuku') {
        $fungsi->hapusbuku($_GET['id_buku']);
    } elseif($_GET['page'] == 'ajukanpinjam') {
        $fungsi->ajukanpinjam($_POST['id_user'],$_POST['id_buku'], $_POST['tanggal_pinjam']);
    } elseif($_GET['page'] == 'postulasan') {
        $fungsi->postulasan($_POST['id_user'],$_POST['id_buku'], $_POST['ulasan'], $_POST['rating']);
    } elseif($_GET['page'] == 'datapeminjam') {
        require('auth/datapeminjam.php');
    } elseif($_GET['page'] == 'konfirmasipinjaman') {
        $fungsi->konfirmasipinjaman($_POST['id_peminjaman'], $_POST['tanggal_pengembalian'], $_POST['id_user'], $_POST['id_buku']);
    } elseif($_GET['page'] == 'konfirmasipengembalian') {
        $fungsi->konfirmasipengembalian($_POST['id_peminjaman']);
    } elseif($_GET['page'] == 'hapuspeminjam') {
        $fungsi->hapuspeminjam($_GET['id_peminjaman']);
    } elseif($_GET['page'] == 'koleksi') {
        require('auth/koleksi.php');
    } elseif($_GET['page'] == 'printlaporan') {
        require('auth/printpdf.php');
    }
    require_once('layouts/dashboard/footer.php');