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

                        include("../../koneksi.php");
                     ?>
                    </li>
                    <li><a href="tambah_mhs.php">Tambah Mahasiswa</a></li>
                     <li><a href="daftar_mhs.php">Daftar Mahasiswa</a></li>
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

    <form action="prosesTambah_mhs.php" method="POST">

        <fieldset>
            <p>
                <label for="nim">NIM:</label>
                <input type="text" required name="nim" placeholder="nomor induk mahasiswa">
            </p>
            <p>
                <label for="name">Nama:</label>
                <input type="text" required name="name" placeholder="masukan nama lengkap">
            </p>
            <p>
                <label for="gender">Jenis Kelamin:</label>
                <label for=""> <input type="radio"  name="gender" value="laki-laki">Laki-laki</label>
                <label for=""><input type="radio" name="gender" value="perempuan">Perempuan</label>
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
                        <option value="<?= $univ['id'] ?>"><?= $univ['universitas'] ?></option>                    
                    <?php endwhile; ?>  
                </select>                
            </p>
            <p>
                <label for="username">Username:</label>
                <input type="text" name="username" placeholder="username" required>
            </p>
            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" placeholder="kata sandi" required>
            </p>
            <p>
                <button type="submit" name="simpan" value="simpan" />Simpan </button>
                <button type="reset" name="reset" value="reset" />Reset </button>
            </p>
        </fieldset>
    </form>
</body>

</html>