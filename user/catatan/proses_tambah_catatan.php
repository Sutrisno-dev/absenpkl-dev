<?php

    include("../../koneksi.php");

    //cek apakah tobol daftar sudah diklik atau belum?
    if(isset($_POST['simpan'])){

        //ambil data dari formulir
       
        $user_id = $_POST['user_id'];
        $tanggal = $_POST['tanggal'];
        $catatan = $_POST['catatan'];
    
        //buat query
        $sql = "INSERT INTO catatan (user_id, tanggal, catatan) VALUE ('$user_id', '$tanggal', '$catatan')"; 
        $query = mysqli_query($conn, $sql);
       
     

        //apakah query simpan berhasil
        if( $query ) {
            // Kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: ../user.php?status=sukses');

        } else {
            //Kalau gagal alihkan ke halaman index.php dengan status=gagal
            header('Location: ../user.php?status=gagal'); 
        }

    } else {
        die("Akses dilarang...");
    }
?>