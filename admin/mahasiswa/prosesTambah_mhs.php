<?php

    include("../../koneksi.php");

    //cek apakah tobol daftar sudah diklik atau belum?
    if(isset($_POST['simpan'])){

        //ambil data dari formulir
        $nim = $_POST['nim'];
        $name = $_POST['name'];
        $gender = $_POST['gender'];
        $university = $_POST['university'];
        $username = $_POST['username'];
        $password = $_POST['password'];            
        //buat query       
        $usertype = "user";
        $sql2 = "INSERT INTO users (username, password, usertype) VALUE ('$username', '$password', '$usertype')"; 
            mysqli_query($conn, $sql2);
            $user_id = $conn->insert_id;
        $sql = "INSERT INTO biodata_users (user_id, nim, name, gender, university) VALUE ('$user_id', '$nim', '$name', '$gender', '$university')"; 
        $query = mysqli_query($conn, $sql);            
        //apakah query simpan berhasil
        if( $query ) {
            // Kalau berhasil alihkan ke halaman index.php dengan status=sukses
            header('Location: ../admin.php?status=sukses');

        } else {
            //Kalau gagal alihkan ke halaman index.php dengan status=gagal
            header('Location: ../admin.php?status=gagal'); 
        }

    } else {
        die("Akses dilarang...");
    }
?>