<?php

session_start();

// menghubungkan ke file functions.php
require 'functions.php';

// cek apakah user sudah login
if( isset($_SESSION["login"]) ) {
    header("Location: tabeldata.php");
    exit;
}

// cek button register sudah diklik / belum
if(isset($_POST['register'])){
    // cek function registrasi berhasil atau tidak
    if ( registrasi($_POST) > 0 ) {
        echo "<script>
                alert('Registrasi Berhasil!');
                document.location.href='login.php';
            </script>";
    } else {
        echo mysqli_error($conn);
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
            background-color: #526D82;
        }

        .judul {
            font-size: 20px;
            text-align: center;
            margin-top: 50px;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }

        .peringatan {
            font-size: 20px;
            text-align: center;
            margin-bottom: 30px;
            font-family: 'Poppins', sans-serif;
            color: #fff;
        }

        form {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5);
            width: 40%;
            border-radius: 10px;
            background-color: #DDE6ED;
            padding: 20px;
            margin: 0 auto;
        }

        .formulir {
            margin: 10px 0px 10px 0px;
        }

        .formulir label {
            display: block;
            margin: 5px;
            text-align: left;
            font-family: 'Poppins', sans-serif;
        }

        .formulir input {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            height: 35px;

        }

        .register {
            background-color: #5C8984;
            color: white;
            border: none;
            padding: 6px 15px;
            border-radius: 20px;
            cursor: pointer;
            float: right;
            margin-bottom: 10px;
        }

        .register:hover {
            background-color: #025464;
        }

        .link {
            text-decoration: none;
        }

        .link:hover {
            text-decoration: underline;
        }
    </style>
    <title>Halaman Registrasi</title>
</head>
<body>
    
    <div class="judul">
	    <h1>Halaman Registrasi</h1>
	</div>

    <div class="peringatan">
        <p>Mohon isi data berikut dengan benar</p>
    </div>

	<form action="" method="post">
        <div class="formulir">
            <label for="username">Username</label>
            <input required type="text" name="username" id="username" placeholder="Masukkan Username" autocomplete="off">
        </div>

        <div class="formulir">
            <label for="password">Password</label>
            <input required class="password" type="password" name="password" id="password" placeholder="Masukkan Password" autocomplete="off">
		</div>

        <div class="formulir">
            <label for="password2">Konfirmasi Password</label>
            <input required class="password" type="password" name="password2" id="password2" placeholder="Konfirmasi Password" autocomplete="off">
		</div>

		<button class="register" type="submit" name="register">Daftar</button>

		<p>
	    	Sudah punya akun? <a class="link" href="login.php">Masuk di sini</a>
		</p>
	</form>

</body>
</html>