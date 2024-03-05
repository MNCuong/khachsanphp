<title>Danh sách quản trị viên</title>
<?php
    include('header.php');
    include('../config.php');
?>

<div class="content p-3">
    <div class="mb-3">
        <div class="d-flex justify-content-between align-items-center">
            <h1 class="text-center">Danh sách Admin</h1>
            <div class="d-flex">
                <form action="" method="post" class="d-flex me-2">
                    <input type="search" class="form-control me-2" name="admin-name" style="width: 300px;" placeholder="Tìm kiếm...">
                    <button type="submit" name="btn-search" class="btn btn-primary me-2">Tìm kiếm</button>
                </form>
                <a href="danhsachadmin.php" class="btn btn-primary me-2">Làm mới</a>
                <a href="themadmin.php" class="btn btn-primary" style="font-size:24px;"><i class="far fa-plus-square"></i></a>
            </div>
        </div>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr class="border-dark">
                <?php                             
                    if(isset($_SESSION['roleadmin']) && $_SESSION['roleadmin'] == '1'){
                ?>
                <th scope="col"></th>
                <?php }?>
                <th scope="col">Mã Quản trị viên</th>
                <th scope="col">Tên Quản trị viên</th>
                <th scope="col">Số điện thoại</th>
                <th scope="col">Email</th>
            </tr>
        </thead>
        <tbody>
            <?php
                // Kết nối CSDL

                // Thực hiện truy vấn
                if (isset($_POST['btn-search'])) {
                    $admin_name = $_POST['admin-name'];
                    $sql = "SELECT * FROM tb_admins WHERE admin_name = '$admin_name'";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            if(isset($_SESSION['roleadmin']) && $_SESSION['roleadmin'] == '1'){
                                echo '<td style="text-align:center;"><input type="checkbox" name="selectids[]" id="" style="transform:scale(1.5);"></td>';
                            }

                            echo '<td>' . $row['admin_id'] . $_SESSION['roleadmin'] .'</td>';
                            echo '<td>' . $row['admin_name'] . '</td>';
                            echo '<td>' . $row['admin_mobile'] . '</td>';
                            echo '<td>' . $row['admin_email'] . '</td>';
                            echo '</tr>';
                        }
                    }
                } else {
                    $sql = "SELECT * FROM tb_admins";
                    $result = mysqli_query($conn, $sql);

                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo '<tr>';
                            if(isset($_SESSION['roleadmin']) && $_SESSION['roleadmin'] == '1'){
                                echo '<td style="text-align:center;"><input type="checkbox" name="selectids" id="" style="transform:scale(1.5);"></td>';
                            }
                            echo '<td>' . $row['admin_id'] . '</td>';
                            echo '<td>' . $row['admin_name'] . '</td>';
                            echo '<td>' . $row['admin_mobile'] . '</td>';
                            echo '<td>' . $row['admin_email'] . '</td>';
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
