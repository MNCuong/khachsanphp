<title>Dịch vụ</title>

<?php include 'header.php'; ?>

<style>
    body {
        background-color: #f8f9fa;
    }

    .float-container {
        position: relative;
    }

    .float-img {
        position: absolute;
        bottom: 45%;
        left: 43%;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        color: #fff;
    }

    .jumbotron {
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
        /* background-color: #343a40; */
        color: #fff;
    }

    .card {
        transition: transform 0.3s;
        border: none;
        margin-bottom: 20px;
    }

    .card:hover {
        transform: scale(1.05);
    }

    .card-img-top {
        border-top-left-radius: 10px;
        border-top-right-radius: 10px;
        object-fit: cover;
        height: 200px;
    }

    .card-body {
        padding: 15px;
    }

    .btn-outline-dark {
        background-color: transparent;
        border-color: #343a40;
        color: #343a40;
    }

    .btn-outline-dark:hover {
        background-color: #343a40;
        color: #fff;
    }
</style>

<div class="container-fluid float-container" style="width: 100%; margin: 0px; padding: 0px;">

    <img src="../images/b3.jpg" class="img-header" style="height: 260px; width:100%; object-fit:cover;" alt="">
    <div class="col-md-8 pt-4 float-img">

        <div class="jumbotron">
            <span class="ms-5 fs-4">DỊCH VỤ</span>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.php" class="text-white fw-bold">TRANG CHỦ</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <a href="dichvu.php" class="text-white fw-bold">DỊCH VỤ</a>
                    </li>
                </ol>
            </nav>
        </div>
    </div>
</div>
<br>
<div class="container">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        include '../config.php';
        $sql = "SELECT * FROM tb_services";
        $result = mysqli_query($conn, $sql);

        // Phân tích và xử lí kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<div class="col">';
                echo '<div class="card h-100">';
                echo '<a href="datdichvu.php" class="card-img-top">';
                echo '<img src="../images/' . $row['ser_image'] . '" class="img-fluid card-img-top" alt="...">';
                echo '</a>';
                echo '<div class="card-body">';
                echo '<h5 class="card-title">' . $row['ser_name'] . '</h5>';
                echo '<p class="card-text">Số người: ' . $row['ser_room_size'] . '</p>';
                echo '<p class="card-text">Giá tiền: ' . number_format($row['ser_price']) . 'đ</p>';
                echo '<p class="card-text text-muted">' . $row['ser_description'] . '</p>';
                echo '<a href="datdichvu.php" class="btn btn-outline-dark">Đặt dịch vụ...</a>';
                echo '</div>';
                // echo '<div class="card-footer text-end">';
                // echo '</div>';
                echo '</div>';
                echo '</div>';
            }
        }
        ?>
    </div>
</div>
<br>
<?php
// include 'datdichvu.php';
include 'footer.php';
?>
