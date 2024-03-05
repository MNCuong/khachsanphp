<title>Dịch vụ</title>

<?php
include('header.php');
include('../config.php');
?>

    <div class="content p-3">
        <style type="text/css" scoped>
            .add-popup {
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                display: none;
                justify-content: center;
                align-items: center;
            }

            .add-content {
                background: white;
                width: 100%;
                height: 70rem;
                position: absolute;
                top: 0;
            }

            .detail-popup {
                background: rgba(0, 0, 0, 0.6);
                width: 100%;
                height: 100%;
                position: absolute;
                top: 0;
                display: none;
                justify-content: center;
                align-items: center;
            }

            .show-detail {
                background: white;
            }
        </style>

        <div class="service-form">
            <div class="">
                <div class="">
                    <h1 class="text-center pt-3">Danh sách dịch vụ</h1>
                </div>
                <div class="p-3">
                    <form action="" method="post" class="d-flex">
                        <input type="search" class="form-control me-2" name="Search" style="width: 300px;" placeholder="Tìm kiếm dịch vụ...">
                        <button type="submit" name="btn-search" class="btn btn-primary me-2">Tìm kiếm</button>
                        <a href="danhsachdichvu.php" class="btn btn-primary">Làm mới</a>
                        <a href="themdichvu.php" style="font-size: 24px; margin-left: auto;"><i class="far fa-plus-square"></i></a>
                    </form>
                </div>
            </div>

            <table class="table my-3 py-5 border-light text-center text-aline table-light " style="table-layout: auto;">
                <thead class="table-light ">
                    <tr class="border-dark">
                        <th scope="col" class="top">Mã dịch vụ</th>
                        <th scope="col" class="top">Tên dịch vụ</th>
                        <th scope="col" class="top">Sức chứa</th>
                        <th scope="col" class="top" style="width:38%">Mô tả</th>
                        <th scope="col" class="top">Giá dịch vụ</th>
                        <th scope="col" class="top">Ảnh</th>
                        <th scope="col" class="top">Sửa</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_POST['btn-search'])) {
                        $ser_name = $_POST['Search'];
                        $sql = "SELECT * FROM  tb_services
                            WHERE  ser_name LIKE '%$ser_name%'";
                        $result = mysqli_query($conn, $sql);
                        if ($result == true) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                if ($row == "" OR $ser_name == "") {
                                } else {
                                    echo '<tr>';
                                    echo '<th scope="row">' . $row['ser_ID'] . '</th>';
                                    echo '<td>' . $row['ser_name'] . '</td>';
                                    echo '<td>' . $row['ser_room_size'] . '</td>';
                                    echo '<td class="text-start">' . $row['ser_description'] . '</td>';
                                    echo '<td style="width:15%" class="text-center">' . number_format($row['ser_price']) . ' đ</td>';
                                    echo '<td><img src="../images/' . $row['ser_image'] . '" class="img-fluid" style="width:10rem"></td>';
                                    echo '<td>'; ?>
                                    <a href="chitietdichvu.php?id=<?php echo $row['ser_ID']; ?>" id="ser-detail"><i class="fas fa-edit text-success" style="font-size: 1.5rem"></i></a>
                            <?php echo '</td>';
                                    echo '</tr>';
                                }
                            }
                        }
                    } else {
                        $sql = "SELECT ser_ID, ser_name, ser_room_size, ser_description, ser_price, ser_image
                            FROM  tb_services";
                        $result = mysqli_query($conn, $sql);
                        if ($result == true) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<th scope="row">' . $row['ser_ID'] . '</th>';
                                echo '<td>' . $row['ser_name'] . '</td>';
                                echo '<td>' . $row['ser_room_size'] . '</td>';
                                echo '<td class="text-start">' . $row['ser_description'] . '</td>';
                                echo '<td style="width:15%" class="text-center">' . number_format($row['ser_price']) . ' đ</td>';
                                echo '<td><img src="../images/' . $row['ser_image'] . '" class="img-fluid" style="width:10rem"></td>';
                                echo '<td>'; ?>
                                <a href="chitietdichvu.php?id=<?php echo $row['ser_ID']; ?>" id="ser-detail"><i class="fas fa-edit text-success" style="font-size: 1.5rem"></i></a>
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
    </div>

<?php
include('footer.php');
?>
