<?php 

// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "datakelas");

// ambil data atau query dari tabel siswa
function query($query) {
    global $conn;

    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    };
    return $rows;
}

// function untuk tambah data
function tambah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $alamat = htmlspecialchars($data["alamat"]);
    
    // upload foto
    $foto = upload(); 
    if( !$foto ) {
        return false;
    }
    
    //query insert data
    $query = "INSERT INTO siswa VALUES(NULL, '$nama', '$kelas', '$telepon', '$alamat', '$foto')";
    mysqli_query($conn, $query);
    
    return mysqli_affected_rows($conn);
}

function upload() {
    $namaFile = $_FILES['foto']['name'];
    $ukuranFile = $_FILES['foto']['size'];
    $tmpName = $_FILES['foto']['tmp_name'];

    // cek apakah yang diupload adalah foto
    $ekstensiFotoValid = ['jpg', 'jpeg', 'png'];
    $ekstensiFoto = explode('.', $namaFile);
    $ekstensiFoto = strtolower(end($ekstensiFoto));
    if( !in_array($ekstensiFoto, $ekstensiFotoValid) ) {
        echo "<script>
                alert('yang anda upload bukan foto');
            </script>";
        return false;
    }

    // cek jika ukuran foto terlalu besar
    if ($ukuranFile > 1000000) {
        echo "<script>
                alert('ukuran gambar terlalu besar');
            </script>";
        return false;
    }

    // generate nama foto baru
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiFoto;
    move_uploaded_file($tmpName, 'img/' . $namaFileBaru);

    // lolos pengecekan, foto diupload
    return $namaFileBaru;
}


// function untuk registrasi
function registrasi($data) {
    global $conn;

    $username = strtolower(stripslashes($data['username']));
    $password = mysqli_real_escape_string($conn, $data['password']);
    $password2 = mysqli_real_escape_string($conn, $data['password2']);

    // cek username sudah ada atau belum
    $result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
    if(mysqli_fetch_assoc($result)) {
        echo "<script>
            alert('Username sudah terdaftar');
            </script>";
        return false;
    }

    // cek konfirmasi password
    if($password !== $password2) {
        echo "<script>
            alert('Konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    // enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // tambahkan user baru ke database
    mysqli_query($conn, "INSERT INTO user VALUES (NULL, '$username', '$password')");

    return mysqli_affected_rows($conn);
}


// funtion untuk hapus data
function hapus($id) {
    global $conn;
    mysqli_query($conn, "DELETE FROM siswa WHERE id = $id");

    return mysqli_affected_rows($conn);
}


// funtion untuk ubah data
function ubah($data) {
    global $conn;

    // ambil data dari tiap elemen dalam form
    $id = $data["id"];
    $nama = htmlspecialchars($data["nama"]);
    $kelas = htmlspecialchars($data["kelas"]);
    $telepon = htmlspecialchars($data["telepon"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $fotoLama = htmlspecialchars($data["fotoLama"]);

    //cek apakah user memilih foto baru atau tidak
    if( $_FILES['foto']['error'] === 4) {
        $foto = $fotoLama;
    } else {
        $foto = upload();
    }

    //query insert data
    $query = "UPDATE siswa 
            SET nama = '$nama', 
                kelas = '$kelas', 
                telepon = '$telepon', 
                alamat = '$alamat',
                foto = '$foto'
            WHERE id = $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);

}


?>