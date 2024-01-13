
<?php 
    require_once('layouts/header.php');

    require_once('config/auth.php');
    $cek = new User;
    if(!isset($_GET['page'])){
        header('location: index.php?page=login');
    }

    if($_GET['page'] == 'login'){
        require('login.php');
    } elseif($_GET['page'] == 'register'){
        require('register.php');
    } elseif($_GET['page'] == 'postlogin'){
        $username = $_POST['username'];
        $password = $_POST['password'];
        $cek->login($username,$password);
    } elseif($_GET['page'] == 'postregister'){
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $data['email'] = $_POST['email'];
        $data['nama_lengkap'] = $_POST['nama_lengkap'];
        $data['alamat'] = $_POST['alamat'];
        $cek->register($data);
    }
    require_once('layouts/footer.php');
?>