<?php 
    class Koneksi{
        public function kon(){
            $kon = mysqli_connect('localhost', 'root', '', 'perpustakaan');
            return $kon;
        }
    }

?>