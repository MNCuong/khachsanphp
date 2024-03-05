<?php
    session_start();
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    
    <title>Hotel booking</title>
  </head>
  <style>
    .bg-re{
        background-image: url(https://th.bing.com/th/id/OIP.xBcROx0JLGMYxOqRGenE4gHaEK?rs=1&pid=ImgDetMain);
    }
    .my-btn{
        border: none;
        background-color: #e17055;
    }
    .my-form{
        background-color: #333;
        color:#fff;
        
    }
    .form-center{
        margin-top:15vh;
    }
  </style>
  <body class=" bg-re">
  <main >
        <div class="container-fluid form-center">
            <div class="row">
                
                <div class="col-12">
                <form action ="login_controller.php" method ="post" class=" m-3 p-5 mx-auto my-form " style ="width:30%;height:90%; border-radius: 30px">
                <h2 class ="text-center  mb-3 text-uppercase">ĐĂNG NHẬP</h2>
                    <div class="mb-2">
                        <label for="txtUser" class="form-label">Tên tài khoản:</label>
                        <input type="text" class="form-control " id="txtName" name ="txtName">  
                    </div>
                    
                    <div class="mb-2">
                        <label for="txtpass01" class="form-label">Mật khẩu:</label>
                        <input type="password" class="form-control " id="txtPass" name ="txtPass">
                    </div>
                    
                    <p class ="text-center mt-0" >
                    <?php
                        if(isset($_SESSION['thongbaoadmin'])){
                            echo $_SESSION['thongbaoadmin'];
                            unset($_SESSION['thongbaoadmin']);
                        }
                    ?>
                    </p>
                    
                    <div  class=" d-flex justify-content-center">
                    <button type="submit" class="btn text-white my-btn" name ="btnLoginAdmin">Đăng nhập</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

   
  </body>
</html>
  
