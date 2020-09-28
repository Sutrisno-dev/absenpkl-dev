<?php

include("../../koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['Simpan'])){

    // ambil data dari formulir
    $id_user = $_POST['id_user'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    // buat query update
    $sql = "UPDATE users SET username='$username', password='$password' WHERE id_user=$id_user";
    $query = mysqli_query($conn, $sql);
     mysqli_query($conn, $sql);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: ../user.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?> 