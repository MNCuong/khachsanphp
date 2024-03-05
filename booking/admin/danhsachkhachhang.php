<title>Khách hàng</title>
<?php
    include ('header.php');
    include ('../config.php');
?>
<div class="content p-3">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center pt-3">Danh sách Khách hàng</h1>
            </div>
        </div>
        <div class="row p-3">
            <form action="" method="post" class="d-flex">
                <input type="search" class="form-control me-2" name="search" style="width: 300px;" placeholder="Tìm kiếm khách...">
                <button type="submit" name="btn-search" class="btn btn-primary me-2">Tìm kiếm</button>

                <a href="danhsachkhachhang.php" class="btn btn-primary">Làm mới</a>
            </form>
        </div>
    </div> 

    <div class="container">
        <table class="table my-3 py-5 text-center">
            <thead class="table-light">
                <tr class="border-dark">
                    <th scope="col" class="top">Mã Khách</th>
                    <th scope="col" class="top">Tên khách hàng</th>
                    <th scope="col" class="top">Số điện thoại</th>
                    <th scope="col" class="top">Email</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    if (isset($_POST['search'])) {
                        $search = $_POST['search'];
                        $sql = "SELECT * FROM tb_customers WHERE cus_name ='$search' OR cus_id ='$search'";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<th>'.$row['cus_id'].'</th>';
                                echo '<td>'.$row['cus_name'].'</td>';
                                echo '<td>'.$row['cus_mobile'].'</td>';
                                echo '<td>'.$row['cus_email'].'</td>';  
                            }
                        }
                    } else {
                        $sql = "SELECT * FROM tb_customers ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<th>'.$row['cus_id'].'</th>';
                                echo '<td>'.$row['cus_name'].'</td>';
                                echo '<td>'.$row['cus_mobile'].'</td>';
                                echo '<td>'.$row['cus_email'].'</td>';  
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
