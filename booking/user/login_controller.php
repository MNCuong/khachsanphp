<?php
    include('../config.php');
?>
<?php
        session_start();
        if(isset($_POST['btnLoginuser']) && $_POST['txtName'] !='' && $_POST['txtPass'] != ''){
            $cus_name =$_POST['txtName'];
            $password = $_POST['txtPass'];
            $pass_hash = md5($password);
            $sql = "SELECT *FROM tb_customers WHERE cus_name ='$cus_name' AND cus_pass ='$pass_hash'";
            $result = mysqli_query($conn,$sql);
            if(mysqli_num_rows($result)>0){
                $_SESSION['client']= $cus_name;
                $row = mysqli_fetch_assoc($result);
                $_SESSION['idCus'] = $row['cus_id'];
                header("location:index.php");

            }else{
                $_SESSION['thongbao']= 'Nhập sai tên tài khoản hoặc mật khẩu!';
                header("location:login.php");
            }
        }else{
            $_SESSION['thongbao']= 'Vui lòng nhập đủ thông tin!';
            header("location:login.php");
        }
 ?>