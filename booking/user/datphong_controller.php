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
          $sql0 = "SELECT room_id, room_price FROM tb_rooms WHERE room_type = '$room_type'";
          $result0 = mysqli_query($conn,$sql0);
          if($result0 == true){
               while($row = mysqli_fetch_assoc($result0)){
                    $room_id = $row['room_id'];
                    $room_price = $row['room_price'];

               }
          }else{
               echo "Lỗii";
          }
          $sql_check_trung_phong = "SELECT * FROM tb_order_services 
          WHERE ser_ID = '$room_id'
          AND ordser_status='Xác nhận' 
          AND ((ordser_start <= '$order_start' AND ordser_end >= '$order_start')
               OR (ordser_start <= '$order_end' AND ordser_end >= '$order_end')
               OR ('$order_start' <= ordser_start AND '$order_end' >= ordser_start)
               OR ('$order_start' <= ordser_end AND '$order_end' >= ordser_end))";

               $result_check_trung_phong = mysqli_query($conn, $sql_check_trung_phong);
               if ($result_check_trung_phong && mysqli_num_rows($result_check_trung_phong) > 0) {
               echo '<script>';
               echo 'alert ("Thời gian đặt phòng trùng lặp với đơn đặt phòng khác. Vui lòng chọn thời gian khác!");';
               echo "location.href = 'dichvu.php';";
               echo '</script>';
               exit;
               }
          $start_date = new DateTime($order_start);
          $end_date = new DateTime($order_end);
          $interval = $start_date->diff($end_date);
          $days = $interval->days;
          if($days==0){
               $days=1;
          }
          $price = $days * $room_price;

          $room_total_day=date("Y-m-d");
          $sql1 = "INSERT INTO tb_order_rooms (ordroom_total, ordroom_total_day, ordroom_start, ordroom_end,  room_id, cus_id, price)
               VALUES ('$total', '$room_total_day', '$order_start', '$order_end','$room_id','$cus_id' ,'$price')";
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
