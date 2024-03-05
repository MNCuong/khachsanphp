<?php
     session_start();
     if(isset($_SESSION['client'])){
          $cus_name = $_SESSION['client'];
          $room_type = $_POST['room-type'];
          $total = $_POST['total'];
          $order_start = $_POST['from-date'];
          $order_end = $_POST['to-date'];
          $cus_id = "";
          include '../config.php';
     
          $sql = "SELECT cus_id FROM tb_customers WHERE cus_name = '$cus_name'";
          $result = mysqli_query($conn,$sql);
          if($result == true){
               while($row = mysqli_fetch_assoc($result)){
                    $cus_id = $row['cus_id'];
               }
          }else{
               echo "Lỗii";
          }
          $sql0 = "SELECT room_id FROM tb_rooms WHERE room_type = '$room_type'";
          $result0 = mysqli_query($conn,$sql0);
          if($result0 == true){
               while($row = mysqli_fetch_assoc($result0)){
                    $room_id = $row['room_id'];
               }
          }else{
               echo "Lỗii";
          }
          $room_total_day=date("Y-m-d");
          $sql1 = "INSERT INTO tb_order_rooms (ordroom_total, ordroom_total_day, ordroom_start, ordroom_end,  room_id, cus_id)
               VALUES ('$total', '$room_total_day', '$order_start', '$order_end','$room_id','$cus_id' )";
         $result = mysqli_query($conn,$sql1);

          if($result == true){
               echo '<script>';
               echo 'alert ("Đặt phòng thành công!!!");';
               echo "location.href = 'index.php';";     
               echo '</script>';
          }else{
               echo '<script>';
               echo 'alert ("Có lỗi gì đó cả ra. Vui lòng thử lại!!!");';
               echo "location.href = 'index.php';";     
               echo '</script>';
          }

      }else{
          header ("location:login.php");
      }
?>
