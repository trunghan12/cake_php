<!-- Topbar Start -->
<div class="container-fluid px-0 d-none d-lg-block ">
        <div class="row gx-0 beta-relative">
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-envelope fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Email Us</h6>
                        <span>info@example.com</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-primary border-inner py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <a href="index.php" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>CakeZone</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-secondary py-3 ">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>+012 345 6789</span>
                    </div>
                    <?php
                         $numberProduct = 0;
                         if(isset($_SESSION["cart"])){
                            foreach($_SESSION["cart"] as $key=>$value){
                             
                                $numberProduct += (int)$value["quantity"];
                            }
                         }
                         
                  
                    ?>
                    <div class="cart">
                        <div class="beta-select ml-1"  id="btn-show"><a href="index.php?page=cart" class="fas fa-shopping-cart fs-1 text-primary me-3"></a> Giỏ hàng (<span id="numCart"><?php echo $numberProduct ?></span>) <i id="btn-hide" class="fa fa-chevron-down" ></i></div>
                        <div class="beta-dropdown cart-body cart-show cart-hide mt-2" style="background: white; width: 360px; display: none;">
                        <?php
                        if(isset($_SESSION['cart'])){
                            $cart = $_SESSION['cart'];
                            $total = 0;
                            foreach($cart as $key => $value){ 
                                $total = $total + $value['price']*$value['quantity']; ?>
                                <div class="cart-item " >
                                    <div class="media ">
                                        <a class="pull-left" href="#"><img style="height: 62px; float: left; "  src="../uploads/<?php echo $value["image"]?>" alt=""></a>
                                        <a href="javascript:void(0)" style="float: right; margin-top: 17px; margin-right: 22px;" onclick="deleteCart(<?php echo $key ?>)" class="btn btn-sm btn-danger pull-right">delete</a>
                                        <div class="media-body" style="text-align: center ">
                                            <span style="font-weight: 500; " class="cart-item-title"><?php echo $value['name'] ?></span>
                                            <br>
                                            <span style="margin-right: 18px;"class="cart-item-options">Size: <?php echo $value['size'] ?></span>
                                            <br>
                                            <span style="margin-right: 77px;"class="cart-item-amount"><?php echo $value['quantity'] ?>*<span><?php echo number_format($value['price'],0,'.','.') ?>đ</span></span>
                                        </div>
                                        
                                    </div>
                                </div>
                                <hr>
                            <?php  } }  ?>
                            <?php if(isset($_SESSION['cart'])){ ?>
                                <div class="cart-caption">
                                    <div class="cart-total text-right">Tổng tiền: <span class="cart-total-value"><?php echo number_format($total,0,'.','.'); ?> đ</span></div>
                                    <div class="clearfix"></div>
                                    <hr>
                                    <div class="center">
                                        <!-- <div class="">&nbsp;</div> -->
                                        <button type="button" class="btn btn-lg" >
                                            <a href="index.php?page=cart" class="btn beta-btn btn-primary text-center" >Đặt hàng <i class="fa fa-chevron-right"></i></a>
                                        </button>
                                    </div>
                                </div>
                        <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Topbar End -->
    

    <!-- Navbar Start -->
    <nav class="navbar navbar-expand-lg bg-dark navbar-dark shadow-sm py-3 py-lg-0 px-3 px-lg-0">
        <a href="index.html" class="navbar-brand d-block d-lg-none">
            <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-primary me-3"></i>CakeZone</h1>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav mr-5 py-0" style="margin-left: 100px;">
                <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                <div class="nav-item  dropdown">
                    <a href="index.php?page=product" class="nav-link dropdown-toggle text-primary" data-bs-toggle="dropdown">Sản phẩm của chúng tôi</a>
                    <div class="dropdown-menu m-0">
                        <?php
                        // Câu lệnh select lấy dữ liệu
                            $sqlSelect = "SELECT * FROM tbl_category WHERE `status`=1";
                            $resultCat = $conn->query($sqlSelect) or die("Lỗi truy vấn lấy dữ liệu");
                            if ($resultCat->rowCount() > 0) {
                                while($rowCat = $resultCat->fetch()) {

                        ?>
                                    <a href="index.php?page=product&id=<?php echo $rowCat["cat_id"]?>" class="dropdown-item"><?php echo $rowCat["cat_name"]?></a>
                        <?php }} ?>
                        <!-- <a href="index.php?page=product" class="dropdown-item">Bánh kem ngon</a>
                        <a href="index.php?page=product" class="dropdown-item">Bánh sự kiện</a>
                        <a href="index.php?page=product" class="dropdown-item">Bánh độc lạ</a>
                        <a href="index.php?page=product" class="dropdown-item">Người thân yêu</a>
                        <a href="index.php?page=product" class="dropdown-item">Nhân vật hoạt hình</a>
                        <a href="index.php?page=product" class="dropdown-item">Bánh đẹp</a>
                        <a href="index.php?page=product" class="dropdown-item">Bánh in hình ảnh</a>
                        <a href="index.php?page=product" class="dropdown-item">Gato nhiều tầng</a>
                        <a href="index.php?page=product" class="dropdown-item">Trái tim</a>
                        <a href="index.php?page=product" class="dropdown-item">Bánh 12 con giáp</a>
                        <a href="index.php?page=product" class="dropdown-item">Dịp tặng</a>
                        <a href="index.php?page=product" class="dropdown-item">Bánh sinh nhật</a>
                        <a href="index.php?page=product" class="dropdown-item">Tặng khách hàng</a>
                        <a href="index.php?page=product" class="dropdown-item">Combo Hoa tươi-Bánh</a> -->
                    </div>
                </div>
                <a href="index.php?page=introduce" class="nav-item nav-link active">Giới thiệu</a>
                <a href="index.php?page=contact" class="nav-item nav-link active">Liên hệ</a>

            </div>
            
            <div class="navbar-nav mr-5 py-0 " style="margin-left: 200px;">
                <div class="top_nav">
                    <?php
                        if(isset($_SESSION['user_login'])){ ?>

                        <div class="nav_menu">
                            <div class="nav toggle">
                            <nav class="nav navbar-nav">
                                    <nav class="nav-item nav-link active ">
                                        <ul class="navbar-right">
                                            <li class="nav-item dropdown open" style="padding-left: 15px; list-style: none;"> 
                                                <a href="javascript:;" class="user-profile dropdown-toggle " aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                                <img src="images/img.jpg" alt=""> <?php 
                                                    if(isset($_SESSION["user_login"])){
                                                        echo $_SESSION["user_login"]['user_name'];
                                                    }else{
                                                        echo "Tài Khoản";
                                                    }
                                                ?>
                                                </a>
                                                <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item"  href="javascript:;"> Profile</a>
                                                    <a class="dropdown-item"  href="index.php?page=lichsumuahang">
                                                    <span>Lịch sử mua hàng</span>
                                                    </a>
                                                <a class="dropdown-item"  href="javascript:;">Help</a>
                                                <a class="dropdown-item"  href="index.php?page=logout"><i class="fa fa-sign-out "></i> Log Out</a>
                                                </div>
                                            </li>
                                        </ul>
                                    </nav>
                                </nav>
                            </div>
                        </div>
                    <?php }  ?>
                    </div>
                    <?php 
                        if(!isset($_SESSION['user_login'])){ ?>
                        <a href="index.php?page=register" class="nav-item nav-link active">Đăng kí</a>
                        <a href="index.php?page=login" class="nav-item nav-link active">Đăng nhập</a>
                    <?php  }   ?>
                
            </div>
        </div>
    </nav>
    <!-- Navbar End -->   