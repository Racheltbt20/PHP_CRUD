<?php

session_start();

// menghubungkan ke file functions.php
require 'functions.php';

// cek apakah user sudah login
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
}

// cek apakah tombol submit sudah diklik atau belum
if(isset($_POST['submit'])) {

    // validasi no telp
    // if(!preg_match("[0-9]", $_POST['telepon'])) {
    //     echo "<script>
    //             alert('No. Telepon harus angka'); 
    //             document.location.href = 'tambahdata.php';
    //           </script>";
    //     return false;
    // }

    // cek apakah data berhasil ditambahkan atau tidak
    if( tambah($_POST) > 0 ) {
        echo "<script>
                alert('Data Berhasil Ditambahkan!'); 
                document.location.href = 'tabeldata.php';
              </script>";
    } else {
        echo "<script>
                alert('Data Gagal Ditambahkan!'); 
                document.location.href = 'tambahdata.php';
              </script>";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
         @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

        body {
            margin: 0px;
            background-color: #526D82;
        }

        h1 {
            text-align: center;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }

        .tambah {
            float: right;
            background-color: #5C8984;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            cursor: pointer;
        }

        .tambah:hover {
            background-color: #025464;
        }

        .batal {
            background-color: #5C8984;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            cursor: pointer;
        }

        .batal:hover {
            background-color: #025464;
        }

        .content {
            width: 60%;
            border-radius: 7px;
            background-color: #e0e0e0;
            padding: 20px;
            margin: 0 auto;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            font-family: 'Poppins', sans-serif;
        }

        input[type=text], input[type=file] {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }
    </style>
    <title>Tambah Data Siswa</title>
</head>
<body>
    
<h1>Tambah Data Siswa</h1>

<div class="content">
    <form action="" method="post" enctype="multipart/form-data">
        <label for="nama">Nama </label>
        <input required type="text" name="nama" id="nama" placeholder="Masukkan nama">
        <br>
        <label for="kelas">Kelas </label>
        <input required type="text" name="kelas" id="kelas" placeholder="Masukkan kelas">
        <br>
        <label for="telepon">No. Telepon </label>
        <input required type="text" name="telepon" id="telepon" placeholder="Masukkan no. telp" pattern="^[0-9]{3,14}$">
        <br>
        <label for="alamat">Alamat </label>
        <input required type="text" name="alamat" id="alamat" placeholder="Masukkan alamat">
        <br>
        <label for="foto">Foto </label>
        <input required type="file" name="foto" id="foto">
        <br><br>
        <button class="tambah" type="submit" name="submit">Simpan</button>
    </form>
    <a href="tabeldata.php">
        <button class="batal">Batal</button>
    </a> 
</div>

</body>
</html>