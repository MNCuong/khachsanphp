<?php
include('../config.php');
$id = $_GET['id'];
$hoatdong=$_GET['action'];
if($hoatdong=="hoatdong1"){
    $sql_update = "UPDATE `tb_order_services` SET `ordser_status`='Xác nhận' WHERE `ordser_id`='$id'";
    $result = mysqli_query($conn, $sql_update);

    if ($result == true) {
        header('Location: danhsachdatdichvu.php');
        exit(); 
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
else if($hoatdong=="hoatdong2"){
    $sql_update = "UPDATE `tb_order_services` SET `ordser_status`='Đã hủy' WHERE `ordser_id`='$id'";
    $result = mysqli_query($conn, $sql_update);

    if ($result == true) {
        header('Location: danhsachdatdichvu.php');
        exit(); 
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }}

mysqli_close($conn);
?>
