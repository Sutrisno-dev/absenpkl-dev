<!Doctype html>

 <html>
 <head>
     <meta charset="utf-8">
    <title>Admin</title>
    <link rel="stylesheet" href="css/admin.css">
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
                     <li><a href="mahasiswa/tambah_mhs.php">Tambah Mahasiswa</a></li>
                     <li><a href="mahasiswa/daftar_mhs.php">Daftar Mahasiswa</a></li>
                     <li><a href="absen/absen.php">Absen</a></li>
                     <li><a href="absen/lihat_absen.php">Lihat Absen</a></li>
                     <li><a href="catatan/lihat_catatan.php">Lihat Catatan</a></li>
                     <li><a href="password/ubah_pwd.php">Ubah Password</a></li>
                     <li><a href="../logout.php">Keluar</a></li>
               </ul>
            </div>
         </div>
         
      </div>
 </body>
 </html>