<?php

// menghubungkan ke file functions.php
require 'functions.php';


// ambil data dari URL
$id = $_GET['id'];

//query data siswa berdasarkan id
$siswa = query("SELECT * FROM siswa WHERE id = $id")[0];

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

        .judul {
            margin-top: 30px;
            margin-bottom: 15px;
        }

        .formulir {
            width: 50%;
            border-radius: 7px;
            background-color: #DDE6ED;
            padding: 20px;
            margin: 0 auto;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            font-family: 'Poppins', sans-serif;
        }

        input[type=text] {
            width: 70%;
            padding: 12px 20px;
            margin: 0px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 10px;
            box-sizing: border-box;
        }

        form {
            display: grid;
            grid-template-columns: 200px 1fr;
        }

        label {
            margin: 12px 0 12px 85px;
            grid-column: 1 / 2;
        }

        input, img {
            grid-column: 2 / 3;
        }

        .foto {
            width: 150px;
        }

        .kembali {
            background-color: #5C8984;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            cursor: pointer;
        }

        .kembali:hover {
            background-color: #025464;
        }
    </style>
    <title>Detail Data Siswa</title>
</head>
<body>
    
<h1 class="judul">Detail Data Siswa</h1>

<div class="formulir">
    <form action="" method="">
        <input type="hidden" name="id" value="<?= $siswa['id']; ?>">
        <label for="nama">Nama </label>
        <input readonly type="text" name="nama" id="nama" value="<?= $siswa['nama']; ?>">
        <br>
        <label for="kelas">Kelas </label>
        <input readonly type="text" name="kelas" id="kelas" value="<?= $siswa['kelas']; ?>">
        <br>
        <label for="telepon">No. Telepon </label>
        <input readonly type="text" name="telepon" id="telepon" value="<?= $siswa['telepon']; ?>">
        <br>
        <label for="alamat">Alamat </label>
        <input readonly type="text" name="alamat" id="alamat" value="<?= $siswa['alamat']; ?>">
        <br>
        <label for="foto">Foto </label>
        <img src="img/<?= $siswa['foto']; ?>" alt="" class="foto"> 
    </form>
    <a href="tabeldata.php">
        <button class="kembali">Kembali</button>
    </a> 
    
</div>

</body>
</html>