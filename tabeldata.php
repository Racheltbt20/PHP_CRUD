<?php

session_start();

// menghubungkan ke file functions.php
require 'functions.php';

// menghubungkan ke table siswa
$siswa = query("SELECT id, nama, kelas, telepon, foto FROM siswa");

// cek apakah user sudah login
if( !isset($_SESSION["login"]) ) {
    header("Location: login.php");
    exit;
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

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            width: 100%;
            margin: 0px;
            background-color: #526D82;
        }

        a {
            text-decoration: none;
        }

        .header {
            width: 100%;
            display: block;
            background-color: #3F497F;
            margin-bottom: 40px;
        }

        .header h1 {
            text-align: left;
            margin-left: 15px;
            font-family: 'Poppins', sans-serif;
            color: #fff;
            font-size: 33px;
            padding: 10px 0;
        }

        .header a button {
            display: block;
            text-align: center;
            float: right;
            margin-top: -48px;
            margin-right: 15px;
            background-color: #5C8984;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 20px;
            cursor: pointer;
            font-size: 14px;
        }

        .header a button:hover {
            background-color: #0E8388;
        }

        .container{
            background-color: #9DB2BF;
            width: 730px;
            margin: auto;
            padding: 10px 15px;
            border-radius: 10px;
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
        }

        .container h2{
            text-align: center;
            font-family: 'Poppins', sans-serif;
        }

        .container a button {
            background-color: #5C8984;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 20px;
            cursor: pointer;
        }

        .container a button:hover {
            background-color: #025464;
        }

        .content-table {
            border-collapse: collapse;
            font-size: 0.9em;
            min-width: 600px;
            border-radius: 5px 5px 0 0 ;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            margin: 0 auto;
            text-align: center;
        }

        .content-table thead tr {
            background-color: #3F497F;
            color: #fff;
            font-weight: bold;
        }

        .content-table th, .content-table td {
            padding: 12px 15px;
        }

        .content-table tbody tr {
            border-bottom: 1px solid #ddd;
        }

        .content-table tbody tr:nth-of-type(odd) {
            background-color: #fff;
        }

        .content-table tbody tr:nth-of-type(even) {
            background-color: #f3f3f3;
        }

        .content-table tbody tr:last-of-type {
            border-bottom: 2px solid #3F497F;
        }

        .detail {
            width: 32px;
        }
    </style>
    <title>Data Siswa Siswi</title>
</head>
<body>
    
    <div class="header">
        <h1>Selamat Datang, <?= $_SESSION["username"]; ?>!</h1>

        <a href="logout.php">
            <button type="submit" name="submit">Keluar</button>
        </a>
    </div>
    
    <br>

    <div class="container">
        <h2>Data Siswa Siswi</h2>

        <a href="tambahdata.php">
            <button>Tambah Data</button>
        </a>

        <br><br>

        <table class="content-table">
            <thead>
                <tr>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                <?php foreach($siswa as $row) : ?>
                    <tr>
                        <td><?= $no; ?></td>
                        <td><?= $row["nama"]; ?></td>
                        <td><?= $row["kelas"]; ?></td>
                        <td>
                            <a href="detaildata.php?id=<?= $row["id"]; ?>">
                                <img src="icon/plus-circle-outline.png" alt="detail data" class="detail">
                            </a>
                            <a href="ubahdata.php?id=<?= $row['id']; ?>">
                                <img src="icon/pencil-circle-outline.png" alt="detail data" class="detail">
                            </a>
                            <a href="hapusdata.php?id=<?= $row["id"]; ?>" onclick="return confirm('apakah anda ingin menghapus data <?= $row["nama"]; ?>?');">
                            <img src="icon/delete-circle-outline.png" alt="detail data" class="detail">
                            </a>
                        </td>
                    </tr>
                <?php $no++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>