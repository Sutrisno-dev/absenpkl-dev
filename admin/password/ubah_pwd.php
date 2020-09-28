<?php

session_start();

include("../../koneksi.php");

//ambil id dari query string
$id_user = $_SESSION['id_user'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM users WHERE id_user=$id_user";
$query = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($query);
?>

<!Doctype html>

 <html>
 <head>
     <meta charset="utf-8">
    <title>admin</title>
    <link rel="stylesheet" href="">
 </head>
 <body>
      <div class="container">
         <div class="kotak">
            <h3>ABSENSI MAHASISWA PKL KOMINFO</h3> 
         </div>
         <div class="main">
            <div class="menu">
               <ul>
                  <li>
                     <?php
                        date_default_timezone_set('Asia/Jakarta');
                        echo date('d-m-Y H:i:s');
                     ?>   
                  </li>
                     <li><a href="../mahasiswa/tambah_mhs.php">Tambah Mahasiswa</a></li>
                     <li><a href="../mahasiswa/daftar_mhs.php">Daftar Mahasiswa</a></li>
                    <li><a href="../absen/absen.php">Absen</a></li>
                    <li><a href="../absen/lihat_absen.php">Lihat Absen</a></li>
                    <li><a href="../catatan/lihat_catatan.php">Lihat Catatan</a></li>
                    <li><a href="ubah_pwd.php">Ubah Password</a></li>
                    <li><a href="../../logout.php">Keluar</a></li>
               </ul>
            </div>
         </div>
      </div>

      <form action="proses_ubah.php" method="post">
      <input type="hidden" name="id_user" value="<?= $id_user; ?>" >
           <table border="0" cellspacing="0" cellpadding="5">
                <tr>
                    <td><label for="username">Username</label>  </td>
                    <td><input type="text" name="username" value="<?= $user['username']; ?>" readonly></td>
                </tr>
                <tr>
                    <td> 
                        <label for="password">New Password</label>
                    </td>
                    <td> <input type="password" name="password" placeholder="************************" value="<?= $user['password']; ?>" required></td>
                </tr>
                <tr>
                    <td> <button type="submit" name="Simpan" value="Simpan">Simpan</button> </td>
                </tr>
            </table>


      </form>
 </body>
 </html> 