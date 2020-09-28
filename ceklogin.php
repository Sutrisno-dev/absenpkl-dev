<?php 

    /*
        kode ini untuk mengecek apakah user sdh login atau blm, jika sudah maka langsung 
        arahkan ke dashboard
    */

    session_start();

    if(isset($_SESSION['id_user']) AND isset($_SESSION['level'])){

        if($_SESSION['level'] == 'admin'){
            header("location: admin/admin.php");    
        } else if($_SESSION['level'] == 'user'){
            header("location: user/user.php");    
        }

    } 



    