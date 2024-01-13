<?php

    if($_GET['page'] == 'admin'){
        require('auth/admin.php');
    } elseif($_GET['page'] == 'petugas'){
        require('auth/petugas.php');
    } else {
        require('auth/user.php');
    }