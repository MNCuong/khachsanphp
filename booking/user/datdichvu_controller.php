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

        if ($result == true) {
            while ($row = mysqli_fetch_assoc($result)) {
                $cus_id = $row['cus_id'];
            }
        } else {
            echo "Lỗi";
        }
        $sql0 = "SELECT ser_ID FROM tb_services WHERE ser_name = '$ser_name'";
        $result0 = mysqli_query($conn, $sql0);

        if ($result0 == true) {
            while ($row = mysqli_fetch_assoc($result0)) {
                $ser_id = $row['ser_ID'];
            }
        } else {
            echo "Lỗi";
        }
        if ($cus_id != "") {
            $sql1 = "INSERT INTO tb_order_services (ordser_total, ordser_start, ordser_end, ordser_status, ser_id, cus_id)
                     VALUES ('$total', '$order_start', '$order_end', 'Chờ xác nhận', '$ser_id', '$cus_id')";
            
            $result = mysqli_query($conn, $sql1);

            if ($result == true) {
                echo '<script>';
                echo 'alert("Đặt dịch vụ thành công!!!");';
                echo "location.href = 'index.php';";
                echo '</script>';
            } else {
                echo '<script>';
                echo 'alert("Có lỗi gì đó xảy ra. Vui lòng thử lại!!!");';
                echo "location.href = 'index.php';";
                echo '</script>';
            }
        } else {
            echo '<script>';
            echo 'alert("Có lỗi gì đó xảy ra. Vui lòng đăng nhập lại!!!");';
            echo "location.href = 'index.php';";
            echo '</script>';
        }
    } else {
        header("location:login.php");
    }
?>
