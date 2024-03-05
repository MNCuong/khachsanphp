<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        header ("location:login.php");
    }
    include '../config.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Trang quản lý</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
      

        header{
            position: fixed;
            background-color: #343a40;
            padding: 20px;
            width: 100%;
            height: 70px;
          
        }
        .left-area a{
            color: #fff;
            margin: 0;
            text-transform: uppercase;
            position: fixed;
            font-size: 22px;
            font-weight: 700;
            text-decoration: none;
            margin-top: -25px;
        }
        .logout-btn{
            padding: 5px;
            background:#fff;
            text-decoration: none;
            float: right;
            margin-top: -30px;
            margin-right: 40px;
            border-radius: 20px;
            font-size: 15px;
            font-weight: 600;
            color: #343a40;
            padding: 10px;
            transition: 0.5s;
            transition-property: color;
        }
        .logout-btn:hover{
            color: #fff;
        }

        .sidebar{
            background: #343a40;
            margin-top: 70px;
            position: fixed;
            left: 0;
            width: 250px;
            height: 100%;
            transition: 0.5s;
            transition-property: left;
        }
        .sidebar ul{
            padding: 0;
        }
        .sidebar i{
            padding-right: 10px;
        }
        .sidebar ul a{
            color: #fff;
            display: block;
            width: 100%;
            line-height: 60px;
            text-decoration: none;
            padding-left: 40px;
            box-sizing: border-box;
            font-size: 20px;
            transition: 0.4s;
            border-top: 1px solid rgba(255,255,255,.1);
        }
       
       

        .sidebar a:hover{
            background: #343a40;
        }
        label #sidebar-btn{
            z-index: 1;
            color: #fff;
            position: fixed;
            cursor: pointer;
            left :300px;
            font-size: 20px;
            transition: 0.5s;
            transition-property: color;
            margin-top: -10px;
        }
        label #sidebar-btn :hover{
            color:#343a40;
        }
        #check{
            display: none;
        }
        #check:checked ~ .sidebar{
            left: -200px;
        }
        #check:checked ~ .sidebar a span{
            display: none;
        }
        #check:checked ~ .sidebar a{
            margin-left: 170px;
            width: 80px;
            
           
            
        }
        #check:checked ~ .sidebar i{
            
            line-height: 60px;
           
        }

        
        #check:checked ~ .content{
            margin-left: 60px;
            width: 100%;
        }.content{
            position: fixed;
            width: 82%;
            margin-top: 70px;
            margin-left: 250px ;
            background-color: white;
            background-size: cover;
            height: 100vh;
            transition: 0.5s;
            overflow: auto;
            padding-bottom: 70px;
            
        }
        .title-admin a:hover{
            color:#fff;
            text-decoration:none;
        }
    </style>
  </head>
  <body>
    <input type="checkbox" id ="check">
    <!-- header start  -->
    <header>
      <label for="check" style="justify-content:center;">
        <i class="fas fa-bars" id="sidebar-btn"></i>
      </label>
      <label for="check">
        <h3></h3>
      </label>
          <div class="left-area title-admin">
          <a href="index.php">Trang Quản Lý</a>
          </div>
          <?php 
          $sql = "SELECT `admin_fullname` FROM `tb_admins` WHERE `admin_name`='{$_SESSION['admin']}'";
          $result = mysqli_query($conn, $sql);
          
                        if ($result == true) {
                            $row = mysqli_fetch_assoc($result);
                            $fullname=$row['admin_fullname'];
                        }?>
          <div class="right-area">
          <h5 style="color:#fff;float: inline-end;margin-top: -20px;"><?php echo $fullname;?></h5>    

            <a href="logout.php" class="logout-btn">Đăng xuất</a>
          </div>
    </header>
    <!-- header end -->
    <!-- sidebar start -->
    <div class="sidebar">
      <ul>
        <li><a href="danhsachphong.php"><i class='fas fa-bed'></i><span>Phòng</span></a></li> 
        <li><a href="danhsachdichvu.php"><i class="fas fa-concierge-bell"></i><span>Dịch vụ</span></a></li>
        <li><a href="danhsachdatphong.php"><i class="fas fa-clipboard"></i><span>Đơn phòng</span></a></li>
        <li><a href="danhsachdatdichvu.php"><i class="fas fa-clipboard"></i><span>Đơn dịch vụ</span></a></li>
        <li><a href="danhsachkhachhang.php"><i class="fas fa-user"></i><span>Khách hàng</span></a></li>
        <li><a href="danhsachadmin.php"><i class="fas fa-users-cog"></i><span>Người quản lý</span></a></li>
        <li><a href="../user/index.php"><i class="fas fa-home"></i><span>Trang chủ</span></a></li>
        <div class="text-center p-3">
        <!-- <label for="" class ="fs-6 fw-bold text-decoration-none mx-2 text-uppercase  p-2  py-auto rounded-pill " style ="color: #A65746; background:#fff;"><?php  echo $_SESSION['loginAdminOK'] ?></label> -->
        </div>
      </ul>
    </div>
    <!-- sidebar end -->
    