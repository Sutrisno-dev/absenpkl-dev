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
                     <li><a href="../absen/absen.php">Absen</a></li>
                    <li><a href="../absen/lihat_absen.php"> Lihat Absen</a></li>
                  
                    <li><a href="tambah_catatan.php">Tambah Catatan</a></li>
                    <li><a href="lihat_catatan.php">Lihat Catatan</a></li>
                    <li><a href="../password/ubah_pwd.php">Ubah Kata Sandi</a></li>
                    <li><a href="../../logout.php">Keluar</a></li>
              </ul>
           </div>
        </div>        
     </div>
     <hr>
     <h3>Catatan Kegiatan Mahasiswa PKL</h3>
     <hr>
     <table border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Mahasiswa</th>
                <th>Universitas</th>
                <th>Catatan</th>
            </tr>
        </thead>
        <tbody>
      
        <?php

                $sql = "SELECT * FROM biodata_users INNER JOIN catatan ON biodata_users.user_id = catatan.user_id";
                $query = mysqli_query($conn, $sql);
                $nomor=1;
                while($catatan = mysqli_fetch_array($query)){
                echo "<tr>";

                echo "<td>".$nomor."</td>";
                echo "<td>".$catatan['name']."</td>";
                echo "<td>".$catatan['university']."</td>";
                echo "<td>".$catatan['catatan']."</td>";
                
               $nomor++;
            }

                ?>
                
        </tbody>
     </table>

</body>
</html>