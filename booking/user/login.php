<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Đăng Nhập</title>
    <style>
        body {
            background-image: url(../images/login.jpg);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .my-form {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 30px;
            padding: 30px;
            width: 400px;
        }

        .my-btn {
            border: none;
            width: 100%;
        }

        .my-btn:hover {
        }
    </style>
</head>

<body>
    <main class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="login_controller.php" method="post" class="m-3 mx-auto my-form">
                    <h2 class="text-center mb-3 text-uppercase">Đăng Nhập</h2>
                    <p class="text-center mt-0">
                        <?php
                        if (isset($_SESSION['thongbao'])) {
                            echo $_SESSION['thongbao'];
                            unset($_SESSION['thongbao']);
                        }
                        ?>
                    </p>
                    <div class="mb-3">
                        <label for="txtName" class="form-label">Tên tài khoản:</label>
                        <input type="text" class="form-control " id="txtName" name="txtName">
                    </div>

                    <div class="mb-3">
                        <label for="txtPass" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control " id="txtPass" name="txtPass">
                    </div>

                    <div class="pt-2">
                        <div class="d-flex justify-content-center">
                            <button type="submit" class="btn btn-primary text-white my-btn px-3 fs-5" name="btnLoginuser">Đăng nhập</button>
                        </div>

                        <div class="text-center pt-3">
                            <label for="txtpass01" class="form-label">Bạn chưa có tài khoản?</label>
                            <a href="register.php" class="text-decoration-none text-black fw-bold">Đăng ký ngay</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </main>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>

</html>
