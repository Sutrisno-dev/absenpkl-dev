<?php

include("../../koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id_biodata_user']) ){
    header('Location: admin.php');
}

//ambil id dari query string
$id_biodata_user = $_GET['id_biodata_user'];

// buat query untuk ambil data dari database
$sql = "SELECT biodata_users.*, users.*, u.* FROM biodata_users JOIN users ON biodata_users.user_id = users.id_user 
        JOIN universitas u ON biodata_users.university = u.id WHERE id_biodata_user = $id_biodata_user";
$query = mysqli_query($conn, $sql);
$mhs = mysqli_fetch_assoc($query);


// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>



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
                    <li><a href="../mahasiswa/tambah_mhs.php">Tambah Mahasiswa</a></li>
                     <li><a href="../mahasiswa/daftar_mhs.php">Daftar Mahasiswa</a></li>
                     <li><a href="../absen/absen.php">Absen</a></li>
                     <li><a href="../absen/lihat_absen.php">Lihat Absen</a></li>
                     <li><a href="../catatan/lihat_catatan.php">Lihat Catatan</a></li>
                    <li><a href="../password/ubah_pwd.php">Ubah Password</a></li>
                    <li><a href="../../logout.php">Keluar</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header>
        <h3>Formulir Pendaftaran Siswa Baru</h3>
    </header>
    <a href="daftar_mhs.php">Kembali</a>
    <form action="prosesUbah_mhs.php" method="POST">
        <input type="hidden" name="id_biodata_user" value="<?php echo $mhs['id_biodata_user'] ?>" />
        <fieldset>
            <p>
                <label for="nim">NIM:</label>
                <input type="text" name="nim" value="<?php echo $mhs['nim'] ?>" placeholder="nomor induk mahasiswa">
            </p>
            <p>
                <label for="name">Nama: </label>
                <input type="text" name="name" placeholder="masukan nama lengkap" value="<?php echo $mhs['name'] ?>" />
            </p>
            <p>
                <label for="gender">Jenis Kelamin:</label>
                <?php $gender = $mhs['gender']; ?>
                <label for=""> <input type="radio" name="gender" value="L"
                        <?php echo ($gender == 'L') ? "checked": "" ?>>Laki-Laki</label>
                <label for=""><input type="radio" name="gender" value="P"
                        <?php echo ($gender == 'P') ? "checked": "" ?>>perempuan</label>
            </p>
            <p>
                <label for="university">Universitas:</label>
                <?php 
                    $sql = "SELECT id, universitas FROM universitas";
                    $query = mysqli_query($conn, $sql);                                        
                ?>
                <select name="university" id="universitas" required>
                    <option value="">Pilih Universitas</option>
                    <?php
                        while($univ = mysqli_fetch_assoc($query)): ?>
                        <option value="<?= $univ['id'] ?>" 
                        <?php if($mhs['id'] == $univ['id']) echo "selected"; ?>
                        ><?= $univ['universitas'] ?></option>                    
                    <?php endwhile; ?>  
                </select>                
            </p>
            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="username" value="<?php echo $mhs['username'] ?>">
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="kata sandi" value="<?php echo $mhs['password'] ?>">
            </p>
            <p>
                <button type="submit" name="simpan" value="simpan" />Simpan </button>
                <button type="reset" name="reset" value="reset" />Reset </button>
            </p>
        </fieldset>
    </form>
</body>

</html>