<?php
include('../config.php');
session_start();

if (isset($_POST['btnRegister']) && !empty($_POST['txtUser']) && !empty($_POST['txtMobile']) 
    && !empty($_POST['txtEmail']) && !empty($_POST['txtPass01']) && !empty($_POST['txtPass02'])) {

    $user = $_POST['txtUser'];
    $mobile = $_POST['txtMobile'];
    $email = $_POST['txtEmail'];
    $pass01 = $_POST['txtPass01'];
    $pass02 = $_POST['txtPass02'];

    if ($pass01 != $pass02) {
        $_SESSION['thongbao'] = 'Mật khẩu không trùng nhau!';
    } else {
        $checkUserQuery = "SELECT * FROM tb_customers WHERE cus_name ='$user'";
        $resultUser = mysqli_query($conn, $checkUserQuery);

        if (mysqli_num_rows($resultUser) > 0) {
            $_SESSION['thongbao'] = 'Tên tài khoản đã tồn tại!';
        } else {
            $checkEmailQuery = "SELECT * FROM tb_customers WHERE cus_email ='$email'";
            $resultEmail = mysqli_query($conn, $checkEmailQuery);

            if (mysqli_num_rows($resultEmail) > 0) {
                $_SESSION['thongbao'] = 'Email đã tồn tại!';
            } else {
                // Băm mật khẩu
                $pass_hash = md5($pass01);

                $registerQuery = "INSERT INTO tb_customers(cus_name, cus_mobile, cus_email, cus_pass) 
                                  VALUES ('$user', '$mobile', '$email', '$pass_hash')";
                $resultRegister = mysqli_query($conn, $registerQuery);

                if ($resultRegister) {
                    $_SESSION['thongbao'] = 'Đăng ký thành công!';
                    header('location:login.php');
                    exit();
                } else {
                    $_SESSION['thongbao'] = 'Đăng ký thất bại!';
                }
            }
        }
    }
} else {
    $_SESSION['thongbao'] = 'Vui lòng nhập đủ thông tin!';
}

header('location:register.php');
?>
