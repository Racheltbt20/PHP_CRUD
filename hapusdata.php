<?php

session_start();

// menghubungkan ke file functions.php
require 'functions.php';

// cek apakah user sudah login
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

// ambil data dari URL
$id = $_GET['id'];


if(hapus($id) > 0) {
    echo "<script>
                alert('Data Berhasil Dihapus!'); 
                document.location.href = 'tabeldata.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Dihapus!'); 
                document.location.href = 'tambahdata.php';
              </script>";
    }

?>