<title>Chi tiết dịch vụ</title>
<?php
include('header.php');
include('../config.php');
?>

<div class="container">
    <div class="content p-3">
        <style type="text/css" scoped>
            .popup-form {
                background: white;
                padding: 20px;
                border-radius: 10px;
                max-width: 600px;
                margin: 0 auto;
                margin-top: 50px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            }

            .popup-form h1 {
                text-align: center;
                margin-bottom: 20px;
            }

            .popup-form label {
                font-weight: bold;
            }

            .popup-form textarea {
                resize: none;
            }

            .popup-form img {
                max-width: 100%;
                height: auto;
            }

            .popup-form input[type="file"] {
                margin-top: 10px;
            }

            .popup-form button {
                background-color: #D98E73;
                color: white;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                float: right;
                margin-top: 20px;
            }
        </style>

        <div class="popup-form">
        <div clas = "m-3 row">
            <a href="#" onclick="openForm3()" id = "close" class = "close" style = "color: #D98E73; text-decoration: none;float: right;font-size:1.5rem;"><i class="far fa-times-circle"></i></a>
            <?php
            include 'thoatsuaphong.php';
            ?>
        </div>            
            <?php

            $ser_id = $_GET['id'];
            $sql1 = "SELECT * FROM tb_services WHERE ser_id = '$ser_id';";
            $result1 = mysqli_query($conn, $sql1);

            if ($result1 == true) {
                while ($row = mysqli_fetch_assoc($result1)) {
            ?>

                    <div class="mt-3">
                        <h1 class="text-center">Chi tiết dịch vụ</h1>
                    </div>
                    <form action="suadichvu_controller.php" method="post" class="pb-4 pt-3 mx-auto" style="max-width: 500px;" enctype="multipart/form-data">
                        <input type="text" name="ser-id" value="<?php echo $row['ser_ID'] ?>" hidden>
                        <div class="mb-3">
                        <button type="submit" name="upload" class="btn">Lưu dịch vụ</button>
                        <button><a href="danhsachdichvu.php">Hủy</a></button>

                            <label for="ser-name" class="form-label">Tên dịch vụ:</label>
                            <input type="text" name="ser-name" class="form-control" value="<?php echo $row['ser_name']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ser-room-size" class="form-label">Số người:</label>
                            <input type="number" name="ser-room-size" min="1" class="form-control" value="<?php echo $row['ser_room_size']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ser-price" class="form-label">Giá tiền:</label>
                            <input type="number" name="ser-price" min="1" class="form-control" value="<?php echo $row['ser_price']; ?>">
                        </div>
                        <div class="mb-3">
                            <label for="ser-des" class="form-label">Mô tả:</label>
                            <textarea name="ser-des" cols="30" rows="3" class="form-control" maxlength="250"><?php echo $row['ser_description']; ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="ser-image" class="form-label" >Ảnh hiện tại:</label>
                            <br>
                            <img src="../images/<?php echo $row['ser_image']; ?>"style="width:250px; height:250px;" alt="">
                        </div>
                        <div class="mb-3">
                            <label for="uploadfile" class="form-label">Ảnh thay thế:</label>
                            <input type="file" name="uploadfile" class="form-control" />
                        </div>
                       
                    </form>
            <?php
                }
            } else {
                echo '<script>';
                echo 'alert ("Có lỗi gì đó xảy ra. Vui lòng thử lại!!!");';
                echo "location.href = 'index.php';";
                echo '</script>';
            }
            ?>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
