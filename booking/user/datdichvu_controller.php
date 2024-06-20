<?php
session_start();
if (isset($_SESSION['client'])) {
    $cus_name = $_SESSION['client'];
    $ser_name = $_POST['service-name'];
    $total = $_POST['total'];
    $order_start = $_POST['from-date'];
    $order_end = $_POST['to-date'];
    $cus_id = "";
    include '../config.php';

    $sql = "SELECT cus_id FROM tb_customers WHERE cus_name = '$cus_name'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $cus_id = $row['cus_id'];
    } else {
        echo "Lỗi khi lấy thông tin khách hàng từ cơ sở dữ liệu: " . mysqli_error($conn);
        exit;
    }

    $sql0 = "SELECT ser_ID, ser_price FROM tb_services WHERE ser_name = '$ser_name'";
    $result0 = mysqli_query($conn, $sql0);
    if ($result0 && mysqli_num_rows($result0) > 0) {
        $row = mysqli_fetch_assoc($result0);
        $ser_id = $row['ser_ID'];
        $ser_price = $row['ser_price'];
    } else {
        echo "Lỗi khi lấy thông tin dịch vụ từ cơ sở dữ liệu: " . mysqli_error($conn);
        exit;
    }

    $sql_check_overlap = "SELECT * FROM tb_order_services 
                          WHERE ser_id = '$ser_id'
                          AND ordser_status='Xác nhận' 
                          AND ((ordser_start <= '$order_start' AND ordser_end >= '$order_start')
                               OR (ordser_start <= '$order_end' AND ordser_end >= '$order_end')
                               OR ('$order_start' <= ordser_start AND '$order_end' >= ordser_start)
                               OR ('$order_start' <= ordser_end AND '$order_end' >= ordser_end))";
    
    $result_check_overlap = mysqli_query($conn, $sql_check_overlap);
    if ($result_check_overlap && mysqli_num_rows($result_check_overlap) > 0) {
        echo '<script>';
        echo 'alert ("Thời gian đặt dịch vụ trùng lặp với đơn đặt dịch vụ khác. Vui lòng chọn thời gian khác!");';
        echo "location.href = 'dichvu.php';";
        echo '</script>';
        exit;
    }

    $start_date = new DateTime($order_start);
    $end_date = new DateTime($order_end);
    $interval = $start_date->diff($end_date);
    $days = $interval->days;
    if ($days == 0) {
        $days = 1;
    }
    $price = $days * $ser_price;

    if ($cus_id != "") {
        $sql1 = "INSERT INTO tb_order_services (ordser_total, ordser_start, ordser_end, ordser_status, ser_id, cus_id, ser_price)
                 VALUES ('$total', '$order_start', '$order_end', 'Chờ xác nhận', '$ser_id', '$cus_id', '$price')";
        
        $result = mysqli_query($conn, $sql1);

        if ($result) {
            echo '<script>';
            echo 'alert("Đặt dịch vụ thành công!!!");';
            echo "location.href = 'index.php';";
            echo '</script>';
        } else {
            echo '<script>';
            echo 'alert("Có lỗi xảy ra khi đặt dịch vụ. Vui lòng thử lại!!!");';
            echo "location.href = 'index.php';";
            echo '</script>';
        }
    }
} else {
    header("location:login.php");
}
?>
