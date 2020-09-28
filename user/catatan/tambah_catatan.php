<?php
session_start();
?>
<!Doctype html>

<html>

<head>
    <meta charset="utf-8">
    <title>user</title>
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
    <header>
        <h3> Tambah Catatan </h3>
    </header>

         
                <form action="proses_tambah_catatan.php" method="POST"> 
                <textarea name="catatan" id="" cols="30" rows="10"></textarea> 
                    <input type="hidden" name="user_id" value="<?= $_SESSION['id_user'] ?>"> 
                    <input type="hidden" name="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta');
                        echo date('d-m-Y');
                     ?>"> 
                        <button type="submit" name="simpan">Tambah Catatan</button>
                </form>
</body>

</html>