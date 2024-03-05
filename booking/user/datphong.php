<?php 
    include('../config.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt Phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Đặt Phòng</div>
                <div class="card-body">
                    <form action="datphong_controller.php" method="post">
                        <div class="mb-3">
                            <?php 
                                $loaiphong=$_GET['loaiphong'];
                            ?>
                            <label for="room-type" class="form-label">Loại Phòng</label>
                            <input type="text" class="form-control" name="room-type"value="<?php echo $loaiphong?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="total" class="form-label">Số người</label>
                            <input type="text" class="form-control" name="total" required>
                        </div>
                        <div class="mb-3">
                            <label for="from-date" class="form-label">Ngày Bắt Đầu</label>
                            <input type="date" class="form-control" name="from-date" required>
                        </div>
                        <div class="mb-3">
                            <label for="to-date" class="form-label">Ngày Kết Thúc</label>
                            <input type="date" class="form-control" name="to-date" required>
                        </div>
                        <button type="submit" class="btn btn-primary" name="btnSubmit">Đặt phòng</button>
                        <button class="btn btn-primary" name="btnSubmit"><a href="phong.php" style="color:#fff;text-decoration:none">Hủy</a></button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Link đến Bootstrap JS và Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-rnGQNllzqYNLg4kafOtWqgD5EAgdaSz1Vvv6pauFMOcAowbrG/sQeV3SweE27zWQ" crossorigin="anonymous"></script>

</body>
</html>
