<title>Chi tiết phòng</title>
<?php include('../config.php'); ?>
<?php include('header.php'); ?>

<style>
    .float-container {
        position: relative;
    }

    .img-header {
        height: 260px;
        width: 100%;
        object-fit: cover;
    }

    .breadcrumb-item+.breadcrumb-item::before {
        color: white;
    }

    .room-details {
        margin-top: 30px;
    }

    .carousel {
        margin-bottom: 20px;
    }

    .room-info {
        padding-left: 24px;
        padding-right: 0px;
    }

    .room-title {
        font-size: 2rem;
    }

    .room-price {
        font-size: 1.5rem;
    }

    .book-btn {
        width: 8rem;
        height: 3rem;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 19px;
        margin-left: 1rem;
        margin-top: 10px;
    }

    .dotted {
        border: 1px dotted #ff0000;
        border-style: none none dotted;
        color: #fff;
        background-color: #fff;
    }

    .accordion-item {
        margin-bottom: 20px;
    }

    .accordion-button {
        background-color: #007bff;
        color: #fff;
    }

    .accordion-button:hover {
        background-color: #0056b3;
    }

    .accordion-body {
        background-color: #f8f9fa;
    }

    .form-control {
        margin-bottom: 10px;
    }

    .danhgia-btn {
        background-color: #28a745;
        color: #fff;
    }

    .danhgia-btn:hover {
        background-color: #218838;
    }
</style>

<div class="container-fluid float-container">
    <img src="../images/b31.jpg" class="img-header" alt="">
</div>

<div class="container room-details">
    <?php
    if (isset($_GET['id'])) {
        $room_id = $_GET['id'];
        $sql = "SELECT * FROM tb_rooms WHERE room_id ='$room_id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
    ?>
                <div class="row m-3">
                    <div class="col-md-7">
                        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-inner">
                                <div class="carousel-item active" data-bs-interval="10000">
                                    <img src="../images/<?php echo $row['room_image'] ?>" class="d-block w-100 card-img-top" style="height: 400px; object-fit: cover;" alt="...">
                                </div>
                                <div class="carousel-item" data-bs-interval="2000">
                                    <img src="../images/<?php echo $row['room_image1'] ?>" class="d-block w-100 card-img-top" style="height: 400px; object-fit: cover;" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../images/<?php echo $row['room_image2'] ?>" class="d-block w-100 card-img-top" style="height: 400px; object-fit: cover;" alt="...">
                                </div>
                                <div class="carousel-item">
                                    <img src="../images/<?php echo $row['room_image3'] ?>" class="d-block w-100 card-img-top" style="height: 400px; object-fit: cover;" alt="...">
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-5 room-info">
                        <h1 class="card-title room-title pt-2 pb-1"><?php echo $row['room_type'] ?></h1>
                        <?php $loaiphong=$row['room_type']; ?>
                        <hr width="10%" size="2px" align="center" />
                        <h5>Diện tích: <?php echo $row['room_size'] ?></h5>
                        <h5>Số người: <?php echo $row['room_amount_people'] ?> </h5>
                        <hr class='dotted' />
                        <h5>Mô tả:</h5>
                        <p> <?php echo $row['room_description'] ?> </p>
                        <hr class='dotted' />
                        <h5 class="card-text room-price">Giá: <?php echo number_format($row['room_price']) ?>₫</h5>
                        <a href="datphong.php?loaiphong=<?php echo $loaiphong ?>" class="btn btn-danger mt-0 p-2  book-btn">Đặt phòng</a>
                    </div>
                </div>

                <div class="row m-3">
                    <div class="accordion accordion-flush" id="accordionExample">
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Thông tin bổ sung
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    Chưa có
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Đánh giá
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-md-8">
                                            <textarea class="form-control" name="danhgia" id="danhgia" placeholder="Đánh giá" rows="5" required></textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <button type="submit" class="btn btn-primary danhgia-btn">Gửi</button>
                                        </div>
                                    </div>
                                    <div class="row mt-3">
                                        <!-- Hiển thị đánh giá -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
            }
        }
    }
    ?>
</div>

<?php include('footer.php'); ?>
