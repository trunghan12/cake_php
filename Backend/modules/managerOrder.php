<?php
    
    ob_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include("../connection.php");
    $user_id = $_SESSION['user_login']['user_id'];
    // echo $user_id;
    // die();
?>
<div class="container ">
    <div id="content">
        <div class="row mb" >
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Danh sách sản phẩm</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                            </li>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#">Settings 1</a>
                                    <a class="dropdown-item" href="#">Settings 2</a>
                                </div>
                            </li>
                            <li><a class="close-link"><i class="fa fa-close"></i></a>
                            </li>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>               
            <div class="col-md-12">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th class="text-center">Người nhận hàng</th>
                            <th class="text-center">Thông tin sản phẩm</th>
                            <th class="text-center">Địa chỉ giao hàng</th>
                            <th class="text-center">Ngày đặt hàng</th>
                            <th class="text-center">Tình trạng đơn hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sqlSelect = "SELECT *From tbl_order Where user_id='$user_id' ";
                            $resultOrder = $conn->query($sqlSelect);
                            $i=0;
                            while($rowOrder=$resultOrder->fetch()){
                                $i++;
                                //echo json_encode($rowOrder);
                                ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            
                            <td><?php echo $rowOrder["full_name"]; ?><br><a href="index.php?page=checkOut"></a></td>

                            <td>
                                        <?php
                                        $total=0;
                                        $order_id= $rowOrder['o_id'];
                                        $sqlSelectOrderDetail = "SELECT *From tbl_order_detail Where  o_id='$order_id'";
                                        $resultOrderDetail = $conn->query($sqlSelectOrderDetail);
                                        while($rowOrderDetail=$resultOrderDetail->fetch()){
                                            //echo json_encode($row);
                                        ?>
                                        <span>
                                        <span> <?php echo $rowOrderDetail["pro_name"]?></span>
                                        </span><br>
                                        <span>
                                        <img height="50" width="50" src="../uploads/<?php echo $rowOrderDetail["pro_image"]; ?>" alt="">
                                        <span class="text-primary" style="float: right"><?php echo $rowOrderDetail["pro_price"] ."x". $rowOrderDetail["pro_quantity"]; $total += $rowOrderDetail["pro_price"]*$rowOrderDetail["pro_quantity"]; ?></span>
                                        </span><br>
                                        
                                        <?php } ?>
                                        <p class="font-weight-bold mt-3">Thanh toán: <span class="float-right "><?php echo $total ?></span></p>
                                    </td>
                                
                            <td>
                                <div class="row">
                                    <div class="col-md-6">Quốc gia</div>
                                    <div class="col-md-6"><?php echo $rowOrder["country"]?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Tỉnh/Thành phố</div>
                                    <div class="col-md-6"><?php echo $rowOrder["conscious"]?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Quận/Huyện</div>
                                    <div class="col-md-6"><?php echo $rowOrder["district"]?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Xã/Thị xã</div>
                                    <div class="col-md-6"><?php echo $rowOrder["commune"]?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6"> Địa chỉ chi tiết</div>
                                    <div class="col-md-6"><?php echo $rowOrder["address"]?></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">Số điện thoại: <?php echo $rowOrder["phone"]?></div>
                                    <div class="col-md-6">Email: <?php echo $rowOrder["email"]?></div>
                                </div>
                            </td>
                            <td><?php echo $rowOrder["date_create"]?></td>
                            <?php
                                $class_span = "";
                                if($rowOrder['status']==1){
                                    $string_order = "Xác nhận";
                                    $class_span = "btn btn-sm btn-primary btn_order_confirm";
                                }elseif($rowOrder['status']==2){
                                    $string_order = "Đang giao hàng";
                                }elseif($rowOrder['status']==3){
                                    $string_order = "Đã giao hàng";
                                }
                            ?>
                            <td class="text-center">
                                <span id="<?php echo $rowOrder['o_id'] ?>" style="cursor:pointer" class="btn_order_confirm<?php echo $rowOrder['o_id']?> <?php echo $class_span; ?>"><?php echo $string_order; ?></span>
                            </td>
                        </tr>
                        <?php }
                            
                            ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>