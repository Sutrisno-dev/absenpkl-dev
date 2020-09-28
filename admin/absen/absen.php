<?php
 
session_start();
 
include("../../koneksi.php");
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
                     <li><a href="absen.php">Absen</a></li>
                     <li><a href="lihat_absen.php">Lihat Absen</a></li>
                     <li><a href="../catatan/lihat_catatan.php">Lihat Catatan</a></li>
                     <li><a href="../password/ubah_pwd.php">Ubah Password</a></li>
                     <li><a href="../../logout.php">Keluar</a></li>
               </ul>
            </div>
         </div>
      </div>
      <div class="daftar">
             
      <table border="1">
       <thead>
         <tr >
            <th>No</th>
            <th>NIM</th>
            <th>Nama Mahasiswa</th>
            <th>Tanggal</th>
            <th>Pukul</th>
            <th>keterangan</th>
            <th>Absen Masuk</th>
            <th>Pukul</th>
            <th>keterangan</th>
            <th>Absen Keluar</th>
         </tr>
       </thead>
       <tbody>
       <?php

$sql = "SELECT * FROM biodata_users INNER JOIN absen ON biodata_users.user_id = absen.user_id";
$query = mysqli_query($conn, $sql);
$i=1;
while($mhs = mysqli_fetch_array($query)){ ?>
            <tr>
                <td><?= $i; ?></td>
                <td><?= $mhs['nim']; ?></td>
                <td><?= $mhs['name']; ?></td>
                <td><?= $mhs['tanggal']; ?></td>
                <td><?= $mhs['jam_masuk']; ?></td>
                <td><?= $mhs['konfirmasi_jam_masuk']; ?></td>
                <td>
                    <form action="proses_konfirmasi_absen_masuk.php" method="post">
                        <input type="hidden" name="id_absen" value="<?= $mhs['id_absen']; ?>"> 
                        <input type="hidden" name="konfirmasi_jam_masuk" value="dikonfirmasi"> 
                        <button type="submit" name="simpan">Konfirmasi</button>
                     </form>
                    <form action="proses_konfirmasi_absen_masuk.php" method="post">
                        <input type="hidden" name="id_absen" value="<?= $mhs['id_absen']; ?>"> 
                        <input type="hidden" name="konfirmasi_jam_masuk" value="ditolak"> 
                        <button type="submit" name="simpan">Tolak</button>
                    </form>
                </td>
                <td><?= $mhs['jam_keluar']; ?></td>
                <td><?= $mhs['konfirmasi_jam_keluar']; ?></td>
                <td>
                    <form action="proses_konfirmasi_absen_keluar.php" method="post">
                        <input type="hidden" name="id_absen" value="<?= $mhs['id_absen']; ?>"> 
                         <input type="hidden" name="konfirmasi_jam_keluar" value="dikonfirmasi"> 
                        <button type="submit" name="simpan">Konfirmasi</button>
                     </form>
                        <form action="proses_konfirmasi_absen_keluar.php" method="post">
                        <input type="hidden" name="id_absen" value="<?= $mhs['id_absen']; ?>"> 
                        <input type="hidden" name="konfirmasi_jam_keluar" value="ditolak"> 
                        <button type="submit" name="simpan">Tolak</button>
                        </form>
                </td>
            </tr>
           
<?php 
$i++; 
}?>
       </tbody>
     </table>
            
          
 </body>
 </html>