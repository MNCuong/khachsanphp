<title>Phòng</title>

<?php include('header.php'); ?>
<?php include('../config.php'); ?>

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

    .btn-primary:hover {
        background-color: #835542;
        border-color: #835542;
    }

    .search-form {
        background-color: #fff;
        border-radius: 5px;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        padding: 15px;
        width: 300px;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
        border-radius: 3px;
        cursor: pointer;
        padding: 8px 12px;
    }

    .jumbotron {
        border-radius: 10px;
        padding: 20px;
        margin-bottom: 30px;
    }

    .card {
        transition: transform 0.3s;
        border-radius:12px;
    }

    .card:hover {
        transform: scale(1.03);
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
    .search-form {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 15px;
    width: 100%;
    transition: box-shadow 0.3s ease;
    }

    .search-form:hover {
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .form-control {
        border-radius: 3px;
        border: 1px solid #ccc;
    }

    .btn-primary {
        background-color: #007bff;
        color: #fff;
        border: 1px solid #007bff;
        border-radius: 3px;
        cursor: pointer;
        padding: 8px 12px;
        transition: background-color 0.3s ease, border-color 0.3s ease;
    }

    .btn-primary:hover {
        background-color: #0056b3;
        border-color: #0056b3;
    }

</style>

<div class="container-fluid float-container " style=" width:100%; margin:0px; padding:0px;">
    
    <img src="../images/b3.jpg" class="img-header " style="height: 260px; width:100% ;object-fit:cover;"alt="">
    <div class="col-md-8 pt-4 float-img ">
                
                <div class="jumbotron ">
                    <span class="text-white ms-5 fs-4">PHÒNG</span>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">
                                <a href="index.php">
                                    <span class="text-white fw-bold">TRANG CHỦ</span>
                                </a></li>
                            <li class="breadcrumb-item active ">
                                <a href="phong.php">
                                    <span class="text-white fw-bold">PHÒNG</span>
                                </a></li>
                        </ol>
                    </nav>
                    
                </div>
    </div>
</div>
<div class="container">
    <div class="row justify-content-end mb-4">
        <div class="col-md-4">
            <br>
            <form action="" method="post" class="input-group search-form">
                <input type="search" class="form-control" name="search" placeholder="Tìm kiếm phòng..." aria-label="Tìm kiếm phòng...">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="submit" name="btnsearch">Tìm kiếm</button>
                </div>
            </form>
        </div>
    </div>


    <div class="row">
        <?php
        if (isset($_POST['btnsearch'])) {
            $search = $_POST['search'];
            $sql = "SELECT * FROM tb_rooms WHERE room_type LIKE '%$search%' ";
        } else {
            $sql = "SELECT * FROM tb_rooms";
        }

        $result = mysqli_query($conn, $sql);

        // Phân tích và xử lí kết quả
        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                ?>
                <div class="col-md-3 mb-4">
                    <div class="card">
                        <a href="chitietphong.php?id=<?php echo $row['room_id']; ?>" class="card-img-top">
                            <img src="../images/<?php echo $row['room_image']; ?>" class="img-fluid card-img-top" alt="...">
                        </a>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $row['room_type']; ?></h5>
                            <p class="card-text px-2">Giá: <?php echo number_format($row['room_price']); ?>₫</p>
                            <a href="chitietphong.php?id=<?php echo $row['room_id']; ?>" class="btn btn-outline-dark">Chi tiết...</a>
                        </div>
                    </div>
                </div>
                <?php
            }
        }
        ?>
    </div>
</div>

<?php include('footer.php'); ?>
