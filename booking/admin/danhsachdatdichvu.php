<title>Đơn dịch vụ</title>
<?php
    include ('header.php');
    include ('../config.php');
?>

<div class="content p-3">
    <div class="">
        <div class="">
            <h1 class="text-center pt-3">Danh sách đơn dịch vụ</h1>
        </div>
        <div class="p-3">
            <form action="" method="post">
                <div class="input-group my-2">
                    <input type="search" class="form-control" name="cus-name" style="width: 300px;" placeholder="Tìm kiếm khách...">
                    <button type="submit" name="btn-search" class="btn btn-primary">Tìm kiếm</button>
                    <a href="danhsachdatdichvu.php" class="btn btn-primary">Làm mới</a>
                </div>
            </form>
        </div>
    </div> 

    <div class="table-responsive">
        <table class="table table-bordered table-hover">
            <thead class="thead-light">
                <tr>
                    <th scope="col">Mã Đơn</th>
                    <th scope="col">Tên Khách</th>
                    <th scope="col">Mã dịch vụ</th>
                    <th scope="col">Tên dịch vụ</th>
                    <th scope="col">Từ ngày</th>
                    <th scope="col">Đến ngày</th>
                    <th scope="col">Số người</th>

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
                        $sql = "SELECT o.ordser_id, o.ser_price,o.ordser_total, o.ordser_end, o.ordser_start, o.ordser_status, s.ser_name, s.ser_id, c.cus_name
                                FROM tb_order_services o, tb_services s, tb_customers c
                                WHERE o.ser_id = s.ser_id AND o.cus_id = c.cus_id AND c.cus_name = '$cus_name'";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['ordser_id'] . '</td>';
                                echo '<td>' . $row['cus_name'] . '</td>';
                                echo '<td>' . $row['ser_id'] . '</td>';
                                echo '<td>' . $row['ser_name'] . '</td>';
                                echo '<td>' . $row['ordser_start'] . '</td>';
                                echo '<td>' . $row['ordser_end'] . '</td>';
                                echo '<td>' . $row['ordser_total'] . '</td>';
                                echo '<td class="text-end">' . number_format($row['ser_price']) . ' đ</td>';

                                echo '<td>' . $row['ordser_status'] . '</td>';

                                if ($row['ordser_status'] == 'Đã hủy') {
                                    echo '<td><i class="fas fa-window-close" style="color:#eb2f06;"></i></td>';
                                } else {
                                    echo '<td><a href="confirm-order-ser.php?id=' . $row['ordser_id'] . '"><i class="fas fa-check-circle" style="color:#6ab04c;"></i></a></td>';
                                }
                                echo '<td><a href="cancel-order-ser.php?id=' . $row['ordser_id'] . '"><i class="fas fa-window-close" style="color:#eb2f06;"></i></a></td>';
                                echo '</tr>';
                            }
                        }
                    } else {
                        $sql = "SELECT o.ordser_id, o.ser_price,o.ordser_total, o.ordser_end, o.ordser_start, o.ordser_status, s.ser_name, s.ser_id, c.cus_name
                                FROM tb_order_services o, tb_services s, tb_customers c
                                WHERE o.ser_id = s.ser_id AND o.cus_id = c.cus_id";
                        $result = mysqli_query($conn, $sql);

                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['ordser_id'] . '</td>';
                                echo '<td>' . $row['cus_name'] . '</td>';
                                echo '<td>' . $row['ser_id'] . '</td>';
                                echo '<td>' . $row['ser_name'] . '</td>';
                                echo '<td>' . $row['ordser_start'] . '</td>';
                                echo '<td>' . $row['ordser_end'] . '</td>';
                                echo '<td>' . $row['ordser_total'] . '</td>';
                                echo '<td class="text-end">' . number_format($row['ser_price']) . ' đ</td>';
                               echo '<td>' . $row['ordser_status'] . '</td>';
                                if ($row['ordser_status'] == 'Đã hủy') {
                                    echo '<td><i class="fas fa-times-circle" style="color:#eb2f06;"></i></td>';
                                    echo '<td><i class="fas fa-times-circle" style="color:#eb2f06;"></i></td>';
    
                                } else if ($row['ordser_status'] == 'Chờ xác nhận') {
                                    echo '<td><a href="xulyxacnhandatdichvu.php?id='.$row['ordser_id'].'&action=hoatdong1"><i class="fas fa-check-circle" style="color:#535c68;"></i></a></td>';
                                    echo '<td><a href="xulyxacnhandatdichvu.php?id='.$row['ordser_id'].'&action=hoatdong2"><i class="fas fa-times-circle" style="color:#535c68;"></i></a></td>';
                                } else {
                                    echo '<td><i class="fas fa-check-circle" style="color:#6ab04c;"></i></td>';
                                    echo '<td><i class="fas fa-times-circle" style="color:#535c68;"></i></td>';
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
</div>

<?php
    include ('footer.php');
?>
