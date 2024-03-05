<?php
include('../config.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $room_id = $_POST['room-id'];
    $room_type = $_POST['room-type'];
    $room_size = $_POST['room-size'];
    $room_price = $_POST['room-price'];
    $room_description = $_POST['room-des'];

    $sql = "SELECT room_image, room_image1, room_image2, room_image3 FROM tb_rooms WHERE room_id = '$room_id'";
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
        while ($row = mysqli_fetch_assoc($result)) {
            $current_image1 = $row['room_image'];
            $current_image2 = $row['room_image1'];
            $current_image3 = $row['room_image2'];
            $current_image4 = $row['room_image3'];
        }
    }

    $new_image1 = uploadImage('uploadfile', '../images/', $current_image1);
    $new_image2 = uploadImage('uploadfile1', '../images/', $current_image2);
    $new_image3 = uploadImage('uploadfile2', '../images/', $current_image3);
    $new_image4 = uploadImage('uploadfile3', '../images/', $current_image4);

    $sql_update = "UPDATE tb_rooms SET
            room_type = '$room_type',
            room_size = '$room_size',
            room_description = '$room_description',
            room_price = '$room_price',
            room_image = '$new_image1',
            room_image1 = '$new_image2',
            room_image2 = '$new_image3',
            room_image3 = '$new_image4'
            WHERE room_id = '$room_id'";

    if (mysqli_query($conn, $sql_update)) {
        header("Location: danhsachphong.php");
        exit();
    } else {
        header("Location: suaphong.php?id=$room_id&error=true");
        exit();
    }
}

function uploadImage($fileInputName, $targetDirectory, $currentImageName)
{
    $filename = $_FILES[$fileInputName]['name'];
    $tempname = $_FILES[$fileInputName]['tmp_name'];
    $targetFile = $targetDirectory . basename($filename);

    if (empty($filename) || $filename == $currentImageName) {
        return $currentImageName;
    }

    if (move_uploaded_file($tempname, $targetFile)) {
        return basename($filename);
    } else {
        return '';
    }
}
?>
