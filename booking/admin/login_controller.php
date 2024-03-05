<?php
    include('../config.php');
?>
<?php
        session_start();
        if(isset($_POST['btnLoginAdmin']) && $_POST['txtName'] !='' && $_POST['txtPass'] != ''){
            $admin_name =$_POST['txtName'];
            $password = md5($_POST['txtPass']);
            $sql = "SELECT *FROM tb_admins WHERE admin_name ='$admin_name' AND admin_pass ='$password'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $row = mysqli_fetch_assoc($result);

                $_SESSION['admin'] = $admin_name;
                $_SESSION['roleadmin'] = $row['role'];

                header("location:index.php");
            }else{
                $_SESSION['thongbaoadmin']= 'Nhập sai tên tài khoản hoặc mật khẩu!';
                header("location:login.php");
            }
        }else{
            $_SESSION['thongbaoadmin']= 'Vui lòng nhập đủ thông tin!';
            header("location:login.php");
        }
 ?>