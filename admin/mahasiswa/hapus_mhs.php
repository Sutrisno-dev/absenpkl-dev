<?php

include("../../koneksi.php");

if( isset($_GET['id_biodata_user']) ){

    // ambil id_biodata_user dari query string
    $id_biodata_user = $_GET['id_biodata_user'];

    
    $sql1 = "SELECT * FROM biodata_users WHERE id_biodata_user=$id_biodata_user";
    $query1 = mysqli_query($conn, $sql1);
    $mhs = mysqli_fetch_assoc($query1);
    $id_user = $mhs['user_id'];
    $sql2 = "DELETE FROM users WHERE id_user=$id_user";
    mysqli_query($conn, $sql2);

    // buat query hapus
    $sql = "DELETE FROM biodata_users WHERE id_biodata_user=$id_biodata_user";
    $query = mysqli_query($conn, $sql);
    

    // apakah query hapus berhasil?
    if( $query ){
        header('Location: daftar_mhs.php');
    } else {
        die("gagal menghapus...");
    }

} else {
    die("akses dilarang...");
}

?>