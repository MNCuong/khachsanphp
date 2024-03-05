<?php
include('header.php');
include('../config.php');
?>

<div class="content px-3">
  

    <div class="container">
        <h1 class="text-center my-4" style="color: #3498db;">Thêm dịch vụ</h1>
        <form action="themdichvu_controller.php" method="POST" class="my-3 mx-auto" style="width:70%" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="ser-name" class="form-label" style="color: #3498db;">Tên dịch vụ:</label>
                <input type="text" name="ser-name" class="form-control" id="ser-name" required>
            </div>

            <div class="mb-3">
                <label for="ser-des" class="form-label" style="color: #3498db;">Mô tả:</label>
                <textarea name="ser-des" class="form-control" id="ser-des" rows="3" maxlength="250"></textarea>
            </div>

            <div class="mb-3">
                <label for="ser-room-size" class="form-label" style="color: #3498db;">Số người:</label>
                <input type="number" name="ser-room-size" min="1" class="form-control" id="ser-room-size" required>
            </div>

            <div class="mb-3">
                <label for="ser-price" class="form-label" style="color: #3498db;">Giá tiền:</label>
                <input type="number" name="ser-price" min="1" class="form-control" id="ser-price" required>
            </div>

            <div class="mb-3">
                <label for="uploadfile" class="form-label" style="color: #3498db;">Ảnh:</label>
                <input type="file" name="uploadfile" class="form-control" id="uploadfile" required>
            </div>

            <div class="text-center">
                <button type="submit" name="upload" class="btn btn-primary" style="background: #3498db; color: white;">Thêm dịch vụ</button>
                <button><a href="danhsachdichvu.php">Hủy</a></button>

            </div>
        </form>
    </div>
</div>
<!-- Add service end -->

<?php
include('footer.php');
?>
