<?php
   include('../config.php')
?>
<?php
        session_start();
        if(isset($_POST['btnadd']) && $_POST['txtAdmin'] !='' && $_POST['txtMobile'] != '' 
        && $_POST['txtEmail'] != '' && $_POST['txtPass01'] != ''  && $_POST['txtPass02'] != ''){
            $admin = $_POST['txtAdmin'];
            $adminname = $_POST['txtAdminname'];
            $mobile =$_POST['txtMobile'];
            $email = $_POST['txtEmail'];
            $pass01= $_POST['txtPass01'];
            $pass02 = $_POST['txtPass02'];
            if($pass01 != $pass02){
                $_SESSION['thongbao'] = 'Mật khẩu không trùng nhau!';
                header('location:themadmin.php'); 
            }else{
                $sql = "SELECT * FROM tb_admins WHERE admin_name ='$admin'";
                $result = mysqli_query($conn,$sql);
                if(mysqli_num_rows($result) > 0){
                    $_SESSION['thongbao'] = 'Tên tài khoản đã tồn tại!';
                    header('location:themadmin.php');  
                }else{
                    $sql2 = "SELECT * FROM tb_admins WHERE admin_email ='$email'";
                    $result2 = mysqli_query($conn,$sql2);
                    if(mysqli_num_rows($result2) > 0){
                        $_SESSION['thongbao'] = 'Email đã tồn tại!';
                        header('location:themadmin.php'); 
                    }else{
                        $pass_hash = md5($pass01);
                        $sql3 = "INSERT INTO tb_admins(`admin_name`, `admin_fullname`, `admin_mobile`, `admin_email`, `admin_pass`, `role`) 
                        VALUES('$admin', '$adminname', '$mobile', '$email', '$pass_hash', '2')";
                        
                        $result3 = mysqli_query($conn,$sql3);
                        if($result3 >= 1){
                            header ('location:danhsachadmin.php');
                        }
                    }
                }
            }
        }else{
            $_SESSION['thongbao'] = 'Vui lòng nhập đủ thông tin!';
            header('location:themadmin.php');
        }
            
    ?>   