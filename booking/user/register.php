<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        body {
            background: linear-gradient(to right, #3498db, #2c3e50);
            color: #fff;
            font-family: 'Arial', sans-serif;
        }

        .my-form {
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.2);
            border-radius: 15px;
            padding: 30px;
            margin-top: 50px;
            width: 40%;
            color: #333;
        }

        .my-btn {
            background-color: #2980b9;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 18px;
            font-weight: bold;
        }

        .my-btn:hover {
            background-color: #2c3e50;
        }
        a, a:hover{
            color:#fff;
            text-decoration:none;
        }
        
    </style>
</head>
<body>

    <div class="container">
        <div class="row justify-content-center">
            <form action="register_controller.php" method="post" class="my-form">
                <h2 class="text-center mb-4 text-uppercase">ĐĂNG KÝ</h2>
                <div class="form-group">
                    <label for="txtUser">Tên tài khoản:</label>
                    <input type="text" class="form-control " id="txtUser" name="txtUser">
                </div>
                <div class="form-group">
                    <label for="txtMobile">Số điện thoại:</label>
                    <input type="text" class="form-control " id="txtMobile" name="txtMobile">
                </div>
                <div class="form-group">
                    <label for="txtEmail">Địa chỉ Email:</label>
                    <input type="email" class="form-control " id="txtEmail" name="txtEmail" aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="txtPass01">Mật khẩu:</label>
                    <input type="password" class="form-control " id="txtPass01" name="txtPass01">
                </div>
                <div class="form-group">
                    <label for="txtPass02">Nhập lại mật khẩu:</label>
                    <input type="password" class="form-control " id="txtPass02" name="txtPass02">
                </div>
                <p class="text-center text-danger">
                    <?php
                    if (isset($_SESSION['thongbao'])) {
                        echo $_SESSION['thongbao'];
                        unset($_SESSION['thongbao']);
                    }
                    ?>
                </p>
                <div class="text-center">
                    <button type="submit" class="btn text-white my-btn" name="btnRegister">Đăng ký</button>
                    <button class="btn text-white my-btn" ><a href="login.php">Hủy</a></button>

                </div>
            </form>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
