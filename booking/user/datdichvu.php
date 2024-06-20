<?php 
    include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Dịch Vụ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style>
        .card-datdv {
            /* display:none; */
        }
    </style>
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Đặt Dịch Vụ</div>
                <div class="card-body">
                    <form action="datdichvu_controller.php" method="post" onsubmit="return validateDate()">
                        <div class="mb-3">
                            <label for="service-id" class="form-label">Chọn Dịch Vụ</label>
                            <select class="form-select" name="service-name" required>
                                <?php 
                                    $sql = "SELECT ser_name FROM tb_services";
                                    $result = mysqli_query($conn, $sql);

                                    if ($result) {
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            echo '<option value="' . $row['ser_name'] . '">' .$row['ser_name'] . '</option>';
                                        }
                                        mysqli_free_result($result);
                                    } else {
                                        echo '<option value="">Lỗi dữ liệu</option>';
                                    }
                                ?>
                            </select>

                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Số lượng</label>
                            <input type="number" class="form-control" name="total" required>
                        </div>
                        <div class="mb-3">
                            <label for="from-date" class="form-label">Ngày Bắt Đầu</label>
                            <input type="date" class="form-control" name="from-date" id="from-date" required>
                        </div>
                        <div class="mb-3">
                            <label for="to-date" class="form-label">Ngày Kết Thúc</label>
                            <input type="date" class="form-control" name="to-date" id="to-date" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnSubmit">Đặt dịch vụ</button>
                        <button class="btn btn-primary"><a href="index.php" style="color:#fff;text-decoration:none">Hủy</a></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link đến Bootstrap JS và Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rnGQNllzqYNLg4kafOtWqgD5EAgdaSz1Vvv6pauFMOcAowbrG/sQeV3SweE27zWQ" crossorigin="anonymous"></script>

<script>
    function validateDate() {
        var fromDate = document.getElementById('from-date').value;
        var toDate = document.getElementById('to-date').value;

        if (fromDate > toDate) {
            alert("Ngày bắt đầu không thể lớn hơn ngày kết thúc!");
            return false; // Ngăn không submit form
        }
        return true; // Cho phép submit form
    }
</script>

</body>
</html>
