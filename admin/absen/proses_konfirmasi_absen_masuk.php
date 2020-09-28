<?php

include("../../koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

   //ambil data dari formulir
   $id_absen = $_POST['id_absen'];     
   $konfirmasi_jam_masuk = $_POST['konfirmasi_jam_masuk'];     

    // buat query update
    $sql = "UPDATE absen SET  konfirmasi_jam_masuk='$konfirmasi_jam_masuk' WHERE id_absen=$id_absen";
    $query = mysqli_query($conn, $sql); 

    // apakah query update berhasil?
    if( $query ) {
        // Kalau berhasil alihkan ke halaman index.php dengan status=sukses
        header('Location: absen.php?status=sukses');

    } else {
        //Kalau gagal alihkan ke halaman index.php dengan status=gagal
        header('Location: absen.php?status=gagal'); 
    }


} else {
    die("Akses dilarang...");
}

?>