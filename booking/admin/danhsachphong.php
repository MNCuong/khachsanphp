<title>Phòng</title>
<?php
include('header.php');
include('../config.php');
?>


    <div class="content p-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center pt-3">Danh sách phòng</h1>
            </div>
            <div class="col-12 p-3">
                <form action="" method="post" class="d-flex">
                    <input type="search" class="form-control me-2" name="Search" style="width: 300px;" placeholder="Tìm kiếm phòng...">
                    <button type="submit" name="btn-search" class="btn btn-primary me-2">Tìm kiếm</button>
                    <a href="danhsachphong.php" class="btn btn-primary me-2">Làm mới</a>
                    <a href="themphong.php" style=" font-size: 24px; margin-left: auto;"><i class="far fa-plus-square"></i></a>
                </form>
            </div>
        </div>

        <table class="table my-3 py-5 table-light text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">Mã phòng</th>
                    <th scope="col">Tên phòng</th>
                    <th scope="col">Diện tích</th>
                    <th scope="col" style="width:30rem">Mô tả</th>
                    <th scope="col">Giá tiền</th>
                    <th scope="col">Số người</th>
                    <th scope="col">Ảnh 1</th>
                    <th scope="col">Ảnh 2</th>
                    <th scope="col">Ảnh 3</th>
                    <th scope="col">Ảnh 4</th>
                    <th scope="col">Sửa</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['btn-search'])) {
                    $room_type = $_POST['Search'];
                    $sql = "SELECT * FROM tb_rooms
                            WHERE room_type LIKE '%$room_type%'";
                    $result = mysqli_query($conn, $sql);
                    if ($result == true) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            if ($row == "" OR $room_type == "") {
                            } else {
                                echo '<tr>';
                                echo '<th scope="row">' . $row['room_id'] . '</th>';
                                echo '<td>' . $row['room_type'] . '</td>';
                                echo '<td>' . $row['room_size'] . '</td>';
                                echo '<td class="text-start">' . $row['room_description'] . '</td>';
                                echo '<td>' . number_format($row['room_price']) . 'đ</td>';
                                echo '<td>' . $row['room_amount_people'] . '</td>';
                                echo '<td><img src="../images/' . $row['room_image'] . '" class="img-fluid" style="width:10rem"></td>';
                                echo '<td><img src="../images/' . $row['room_image1'] . '" class="img-fluid" style="width:10rem"></td>';
                                echo '<td><img src="../images/' . $row['room_image2'] . '" class="img-fluid" style="width:10rem"></td>';
                                echo '<td><img src="../images/' . $row['room_image3'] . '" class="img-fluid" style="width:10rem"></td>';
                                echo '<td>'; ?>
                                <a href="suaphong.php?id=<?php echo $row['room_id']; ?>" id="update-room"><i class="fas fa-edit text-success" style="font-size: 1.5rem"></i></a>
                            <?php echo '</td>';
                                echo '</tr>';
                            }
                        }
                    }
                } else {
                    $sql = "SELECT * FROM tb_rooms";
                    $result = mysqli_query($conn, $sql);
                    if ($result == true) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['room_id'] . '</th>';
                            echo '<td>' . $row['room_type'] . '</td>';
                            echo '<td>' . $row['room_size'] . '</td>';
                            echo '<td class="text-start">' . $row['room_description'] . '</td>';
                            echo '<td>' . number_format($row['room_price']) . 'đ</td>';
                            echo '<td>' . $row['room_amount_people'] . '</td>';
                            echo '<td><img src="../images/' . $row['room_image'] . '" class="img-fluid " style="width:10rem"></td>';
                            echo '<td><img src="../images/' . $row['room_image1'] . '" class="img-fluid " style="width:10rem"></td>';
                            echo '<td><img src="../images/' . $row['room_image2'] . '" class="img-fluid " style="width:10rem"></td>';
                            echo '<td><img src="../images/' . $row['room_image3'] . '" class="img-fluid " style="width:10rem"></td>';
                            echo '<td>'; ?>
                                <a href="suaphong.php?id=<?php echo $row['room_id']; ?>" id="update-room"><i class="fas fa-edit text-success" style="font-size: 1.5rem"></i></a>
                            <?php echo '</td>';
                            echo '</tr>';
                        }
                    }
                }
                mysqli_close($conn);
                ?>

            </tbody>
        </table>
    </div>


<?php
include('footer.php');
?>
