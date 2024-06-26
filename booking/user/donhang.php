<title>Đơn của bạn</title>

<?php
    include ('header.php');
    include ('../config.php');
    if(!isset($_SESSION['client'])){
        header ("location:login.php");
    }
?>
    
    <style>
    td{
        height: 40px;
    }
    .float-container{
        position: relative;
        
    }
    .float-img{
        position: absolute;
        bottom: 45%;
        left:43%;
    }
    .breadcrumb-item + .breadcrumb-item::before         {
        color:white;
    }
</style>
    <div class="container-fluid float-container " style=" width:100%; margin:0px; padding:0px;">
    
    <img src="../images/b31.jpg" class="img-header " style="height: 260px; width:100% ;object-fit:cover;"alt="">
    <div class="col-md-8 pt-4 float-img ">
                
                <div class="jumbotron ">
                    <span class="text-white ms-5 fs-4">ĐƠN HÀNG</span>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item ">
                                <a href="index.php">
                                    <span class="text-white fw-bold">TRANG CHỦ</span>
                                </a></li>
                            <li class="breadcrumb-item active ">
                                <a href="#">
                                    <span class="text-white fw-bold">ĐƠN HÀNG</span>
                                </a></li>
                        </ol>
                    </nav>
                    
                </div>
    </div>

    </div >
        <!--<div class="container">
            
            <h4 class="fieldset pt-5 border-none align-middle" style="margin-left:100px; transform: translatey(28%);width: max-content;background: white;">ĐƠN PHÒNG</h4>
            <div class="legend pb-5 mx-4 rounded"style ="background-color: white;border: #D99559 solid 2px; " >-->
            <!-- start show order room -->
            <h4 class="container fs-4 pb-0 p-5 px-1"  style = " margin-left:150px; width: max-content; transform: translatey(28%); background: white;">Đơn hàng của bạn</h4>
            <div class="container  pb-3 rounded" style ="background-color: white;border-top: #D99559 solid 2px;  " ></div>
            <table class="container table table-striped table-warning my-3 py-5 border-light  text-aline  text-center" style="table-layout: auto;">
                <thead class="">
                    <tr class ="  ">
                        <th scope="col" class="top ">Loại đơn</th>
                        <th scope="col" class="top">Mã Đơn</th>
                        <th scope="col" class="top">Tên phòng</th>
                        <th scope="col" class="top">Ngày nhận </th>
                        <th scope="col" class="top">Ngày trả </th>
                        <th scope="col" class="top">Tổng tiền</th>
                        <th scope="col" class="top">Tình trạng đơn </th>
                        <th scope="col" class="top">Thanh toán(10%)</th>
                    </tr>
                </thead>
                <tbody>
            <?php
            if(isset($_SESSION['client'])){ 
            $id = $_SESSION['idCus'];}
            $sql = "SELECT o.ordroom_id,o.price,o.ordroom_total_day,o.ordroom_start,o.ordroom_end,o.ordroom_status,r.room_type,r.room_image
            FROM  tb_order_rooms o ,tb_rooms r 
            WHERE  o.room_id = r.room_id AND o.cus_id =$id";
            $result = mysqli_query($conn,$sql);
            
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<tr>';
                                     echo  '<td scope="row">Đơn phòng</th>';
                                     echo '<th scope="row">'.$row['ordroom_id'].'</th>';
                                     echo '<td>'.$row['room_type'].'</td>';
                                     echo '<td>'.$row['ordroom_start'].'</td>';
                                     echo '<td>'.$row['ordroom_end'].'</td>';
                                     echo '<td class="text-end">'.number_format($row['price']).' đ</td>';
                                     echo '<td>'.$row['ordroom_status'].'</td>';
                                     if($row['ordroom_status']!="Xác nhận"){
                                     echo '<td><button><a class="payUrl" href="../thanhtoanmomo.php?gia=' . $row['price'] . '">Momo ATM</a></button>
                                     </td>';
                                     }
                                     else{
                                        echo '<td>Chưa xác nhận</td>';

                                     }
                                    
                        echo '</tr>';
            
            //đơn dịch vụ
            
            ?>
         
            <?php }}else{
                echo'<h4 for="" class=" text-center p-5 mb-0" style=" color:#747d8c;">Bạn không có đơn Phòng nào !</h4>';
            } ?>
            <?php 
            if(isset($_SESSION['client'])){ 
                $id = $_SESSION['idCus'];}
            $sql = "SELECT o.ordser_id,o.ser_price,o.ordser_total,o.ordser_total_day,o.ordser_start,o.ordser_end,o.ordser_status,s.ser_name,s.ser_image
            FROM  tb_order_services o ,tb_services s 
            WHERE  o.ser_id = s.ser_id AND o.cus_id =$id";
            $result = mysqli_query($conn,$sql);
            //echo '<div class="ps-5 pb-5">';
                if(mysqli_num_rows($result)>0){
                    while($row=mysqli_fetch_assoc($result)){
                        echo '<tr>';
                                     echo '<td scope="row">Đơn dịch vụ</th>';
                                     echo '<th scope="row">'.$row['ordser_id'].'</th>';
                                     echo '<td>'.$row['ser_name'].'</td>';
                                     echo '<td>'.$row['ordser_start'].'</td>';
                                     echo '<td>'.$row['ordser_end'].'</td>';
                                     echo '<td class="text-end">'.number_format($row['ser_price']).' đ</td>';
                                     echo '<td>'.$row['ordser_status'].'</td>';
                                     if($row['ordser_status']!="Xác nhận"){
                                     echo '<td><button><a class="payUrl" href="../thanhtoanmomo.php?giaser=' . $row['ser_price'] . '">Momo ATM</a></button>
                                     </td>';}
                                     else{
                                        echo '<td>Chưa xác nhận</td>';

                                     }
                        echo '</tr>';
                    }}
                else{
                        echo'<h4 for="" class=" text-center p-5 mb-0" style=" color:#747d8c;">Bạn không có đơn Phòng nào !</h4>';
                    } ?>
              </tbody>
            </table>
            <!--
            </div>
            </div>-->
            <!-- end show order room -->
          <div style="height:200px;"></div>
            
<?php
    include('footer.php');
?>