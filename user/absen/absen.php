<?php
session_start();
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
     <table border="1">
       <thead>
         <tr >
            <th>Status</th>
            <th>Keterangan</th>
            <th>Absen Masuk</th>
            <th>Absen Keluar</th>
         </tr>
       </thead>
       <tbody>
            <tr>
                <td>!</td>
                <td>Anda belum mengisi absen hari ini</td>
                <td>
                <form action="proses_absen_masuk.php" method="post">
                <input type="hidden" name="user_id" value="<?= $_SESSION['id_user'] ?>"> 
                    <button type="submit" name="simpan">Absen masuk</button>
                </form>
                </td>
                <td>
                <form action="proses_absen_keluar.php" method="post">
                <input type="hidden" name="user_id" value="<?= $_SESSION['id_user'] ?>"> 
                    <button type="submit" name="simpan">Absen keluar</button>
                </td>
            </tr>
       </tbody>
     </table>

</body>
</html>