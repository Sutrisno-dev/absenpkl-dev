 <?php
    
    require 'koneksi.php';
    require 'ceklogin.php';

    if(isset($_POST['Login'])){
        $user=$_POST['user'];
        $pass=$_POST['pass'];
        $usertype=$_POST['usertype'];
        $query = "SELECT * FROM users WHERE username = '$user' and password ='$pass' and usertype = '$usertype'";
        $result = mysqli_query($conn, $query); 
        if($result->num_rows > 0){
            while($row=mysqli_fetch_array($result)){            
                $_SESSION['id_user'] = $row['id_user'];
                $_SESSION['level'] = $usertype;
            }
            if($usertype=="admin"){
                ?>
                <script type="text/javascript">
                window.location.href="admin/admin.php"</script>
                <?php

            }else{
                
                ?>
                <script type="text/javascript">
                window.location.href="user/user.php"</script>
                <?php

            } 
        }else{
            echo 'username atau password salah!';    
        }
    }
 ?>
 <!Doctype html>
 <html>
 <head>
    <title>Absensi Online</title>
 </head>
 <body>
    <form method="post" action="">
        <table border="0">
            <tr>
                <td><label for="user">Username</label></td>
                <td><input type="text" required name="user" placeholder="Masukkan Username"></td>
            </tr>
            <tr>
                <td><label for="pass">Password</label></td>
                <td><input type="password" required name="pass" placeholder="Masukkan Password"></td>
            </tr>
            <tr>
                <td> 
                    Tipe User
                </td>
                <td>
                    <select name="usertype">
                        <option value="admin">admin</option>
                        <option value="user">user</option>   
                    </select>
                </td>
                <tr>
                    <td><button type="submit" name="Login" value="Login">Login</button></td>
                </tr>
            </tr>
        </table>
    </form> 
 </body>
 </html>