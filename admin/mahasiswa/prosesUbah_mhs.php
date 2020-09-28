<?php

include("../../koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

    
    // ambil data dari formulir
    $id_biodata_user = $_POST['id_biodata_user'];
    $nim = $_POST['nim'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $university = $_POST['university'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    // buat query update
    $sql = "UPDATE biodata_users SET nim='$nim', name='$name', gender='$gender', university='$university' WHERE id_biodata_user=$id_biodata_user";
    $query = mysqli_query($conn, $sql);
    $sql2 = "UPDATE users SET username='$username', password='$password' WHERE id_user=$id_user";
     mysqli_query($conn, $sql2);

    // apakah query update berhasil?
    if( $query ) {
        // kalau berhasil alihkan ke halaman list-siswa.php
        header('Location: daftar_mhs.php');
    } else {
        // kalau gagal tampilkan pesan
        die("Gagal menyimpan perubahan...");
    }


} else {
    die("Akses dilarang...");
}

?>