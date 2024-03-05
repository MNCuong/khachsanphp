<?php
include('header.php');
include('../config.php');

function getCount($conn, $tableName)
{
    $sql = "SELECT COUNT(*) AS count FROM $tableName";
    $res = mysqli_query($conn, $sql);
    $count = mysqli_fetch_assoc($res)['count'];
    return $count;
}

function getTotalRevenue($conn)
{
    $sql1 = "SELECT SUM(ordroom_total) AS Total1 FROM tb_order_rooms WHERE ordroom_status= 'Đã xác nhận'";
    $res1 = mysqli_query($conn, $sql1);
    $row1 = mysqli_fetch_assoc($res1);

    $sql2 = "SELECT SUM(ordser_total) AS Total2 FROM tb_order_services WHERE ordser_status= 'Đã xác nhận'";
    $res2 = mysqli_query($conn, $sql2);
    $row2 = mysqli_fetch_assoc($res2);

    $total = $row1['Total1'] + $row2['Total2'];
    return $total;
}

$roomCount = getCount($conn, 'tb_rooms');
$serviceCount = getCount($conn, 'tb_services');
$customerCount = getCount($conn, 'tb_customers');
$orderRoomCount = getCount($conn, 'tb_order_rooms');
$orderServiceCount = getCount($conn, 'tb_order_services');
$totalRevenue = getTotalRevenue($conn);
?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<div class="content p-3">
    <div class="container-fluid">
        <div class="row">
            <?php
            $sections = [
                ['count' => $roomCount, 'label' => 'PHÒNG'],
                ['count' => $serviceCount, 'label' => 'DỊCH VỤ'],
                ['count' => $customerCount, 'label' => 'KHÁCH'],
                ['count' => $orderRoomCount, 'label' => 'ĐƠN PHÒNG'],
                ['count' => $orderServiceCount, 'label' => 'ĐƠN DỊCH VỤ'],
            ];

            foreach ($sections as $section) {
                echo '
                <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                    <div class="card mb-3">
                        <div class="card-body text-center">
                            <h1 class="card-title">' . $section['count'] . '</h1>
                            <p class="card-text fs-4">' . $section['label'] . '</p>
                        </div>
                    </div>
                </div>';
            }
            ?>

            <div class="col-12 col-sm-6 col-md-4 col-lg-4">
                <div class="card mb-3">
                    <div class="card-body text-center">
                        <p class="card-text fs-4 mb-1">TỔNG</p>
                        <h1 class="card-title"><?php echo number_format($totalRevenue) . ' đ'; ?></h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
include('footer.php');
?>
