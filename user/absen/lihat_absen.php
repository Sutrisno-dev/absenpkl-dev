<?php
session_start();
include("../../koneksi.php");
?>
<!Doctype html>

<html>
<head>
    <meta charset="utf-8">
   <title>user</title>
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
                 
                    <li><a href="absen.php">Absen</a></li>
                    <li><a href="lihat_absen.php"> Lihat Absen</a></li>
                    <li><a href="../catatan/tambah_catatan.php">Tambah Catatan</a></li>
                    <li><a href="../catatan/lihat_catatan.php">Lihat Catatan</a></li>
                    <li><a href="../password/ubah_pwd.php">Ubah Katasandi</a></li>
                    <li><a href="../../logout.php">Keluar</a></li>
              </ul>
           </div>
        </div>
        
     </div>
     <hr>
     <h3>Absensiku</h3>
     <hr>
     <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Status</th>
                <th>Jam Keluar</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
      
        <?php

                $sql = "SELECT * FROM absen";
                $query = mysqli_query($conn, $sql); 
                $nomor = 1;
                while($absen = mysqli_fetch_array($query)){
                echo "<tr>";

                echo "<td>".$nomor."</td>";
                echo "<td>".$absen['tanggal']."</td>";
                echo "<td>".$absen['jam_masuk']."</td>";
                echo "<td>".$absen['konfirmasi_jam_masuk']."</td>";
                echo "<td>".$absen['jam_keluar']."</td>";
                echo "<td>".$absen['konfirmasi_jam_keluar']."</td>";         
                
               $nomor++;
            }

                ?>
                
        </tbody>
     </table>

</body>
</html>