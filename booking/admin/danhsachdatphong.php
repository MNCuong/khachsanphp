
<title>Đơn phòng</title>
<?php
include('header.php');
include('../config.php');
?>
    <div class="content p-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center pt-3">Danh sách đơn phòng</h1>
            </div>
            <div class="col-12 p-3">
                <form action="" method="post" class="d-flex">
                    <input type="search" class="form-control me-2" name="cus-name" style="width: 300px;" placeholder="Tìm kiếm khách...">
                    <button type="submit" name="btn-search" class="btn btn-primary me-2">Tìm kiếm</button>
                    <a href="danhsachdatphong.php" class="btn btn-primary">Làm mới</a>
                </form>
            </div>
        </div>

        <table class="table my-3 py-5 table-light text-center">
            <thead class="table-light">
                <tr>
                    <th scope="col">Mã Đơn</th>
                    <th scope="col">Tên Khách</th>
                    <th scope="col">Mã phòng</th>
                    <th scope="col">Tên phòng</th>
                    <th scope="col">Ngày nhận</th>
                    <th scope="col">Ngày trả</th>
                    <th scope="col">Tổng tiền</th>
                    <th scope="col">Tình trạng đơn</th>
                    <th scope="col">Xác nhận</th>
                    <th scope="col">Hủy</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (isset($_POST['btn-search'])) {
                    $cus_name = $_POST['cus-name'];
                    $sql = "SELECT o.ordroom_id,o.price,o.ordroom_start,o.ordroom_end,o.ordroom_status,r.room_type,r.room_id,c.cus_name
                            FROM  tb_order_rooms o ,tb_rooms r ,tb_customers c
                            WHERE  o.room_id = r.room_id AND o.cus_id =c.cus_id AND c.cus_name ='$cus_name'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['ordroom_id'] . '</th>';
                            echo '<td>' . $row['cus_name'] . '</td>';
                            echo '<td>' . $row['room_id'] . '</td>';
                            echo '<td>' . $row['room_type'] . '</td>';
                            echo '<td>' . $row['ordroom_start'] . '</td>';
                            echo '<td>' . $row['ordroom_end'] . '</td>';
                            echo '<td class="text-end">' . number_format($row['price']) . ' đ</td>';
                            echo '<td>' . $row['ordroom_status'] . '</td>';
                            if ($row['ordroom_status'] == 'Đã hủy') {
                                echo '<td><a href="#"><i class="fas fa-times-circle" style="color:#eb2f06;"></i></a></td>';
                            } else {
                                echo '<td><a href="confirm-order-room.php?id=' . $row['ordroom_id'] . '"><i class="fas fa-check-circle" style="color:#6ab04c;"></i></a></td>';
                            }
                            echo '<td><a href="cancel-order-room.php?id=' . $row['ordroom_id'] . '"><i class="fas fas fa-times-circle" style="color:#eb2f06;"></i></a></td>';
                            echo '</tr>';
                        }
                    }
                } else {
                    $sql = "SELECT o.ordroom_id,o.price,o.ordroom_start,o.ordroom_end,o.ordroom_status,r.room_type,r.room_id,c.cus_name
                            FROM  tb_order_rooms o ,tb_rooms r ,tb_customers c
                            WHERE  o.room_id = r.room_id AND o.cus_id = c.cus_id";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            echo '<th scope="row">' . $row['ordroom_id'] . '</th>';
                            echo '<td>' . $row['cus_name'] . '</td>';
                            echo '<td>' . $row['room_id'] . '</td>';
                            echo '<td>' . $row['room_type'] . '</td>';
                            echo '<td>' . $row['ordroom_start'] . '</td>';
                            echo '<td>' . $row['ordroom_end'] . '</td>';
                            echo '<td class="text-end">' . number_format($row['price']) . ' đ</td>';
                            echo '<td>' . $row['ordroom_status'] . '</td>';
                            if ($row['ordroom_status'] == 'Đã hủy') {
                                echo '<td><a href="#"><i class="fas fa-times-circle" style="color:#eb2f06;"></i></a></td>';
                                echo '<td><a href="#"><i class="fas fa-times-circle" style="color:#eb2f06;"></i></a></td>';

                            } else if ($row['ordroom_status'] == 'Chờ xác nhận') {
                                echo '<td><a href="xulyxacnhandatphong.php?id='.$row['ordroom_id'].'&action=hoatdong1"><i class="fas fa-check-circle" style="color:#535c68;"></i></a></td>';
                                echo '<td><a href="xulyxacnhandatphong.php?id='.$row['ordroom_id'].'&action=hoatdong2"><i class="fas fa-times-circle" style="color:#535c68;"></i></a></td>';
                            } else {
                                echo '<td><a href="#"><i class="fas fa-check-circle" style="color:#6ab04c;"></i></a></td>';
                                echo '<td><a href="#"><i class="fas fa-times-circle" style="color:#535c68;"></i></a></td>';
                            }
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
