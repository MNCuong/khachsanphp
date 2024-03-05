<?php
    session_start();//bảo vệ tk admin
    if(isset($_SESSION['admin'])){
        unset($_SESSION['admin']);
        header ("location:login.php");
    }
?>