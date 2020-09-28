
<?php

include("../../koneksi.php");

// cek apakah tombol simpan sudah diklik atau blum?
if(isset($_POST['simpan'])){

   //ambil data dari formulir
   $user_id = $_POST['user_id'];  
   date_default_timezone_set('Asia/Jakarta');
   $jam_keluar = date('H:i:s'); 
   $konfirmasi_jam_keluar = 'belum dikonfirmasi';  

    // buat query update
    $sql = "UPDATE absen SET jam_keluar='$jam_keluar', konfirmasi_jam_keluar='$konfirmasi_jam_keluar' WHERE user_id=$user_id";
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