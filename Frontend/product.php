

<!-- Page Header Start -->
<div class="container-fluid bg-dark bg-img p-5 mb-5">
    <div class="row">
        <div class="col-12 text-center">
            <h1 class="display-4 text-uppercase text-white">Thực đơn & Giá</h1>
            <a href="">Trang chủ</a>
            <i class="far fa-square text-primary px-2"></i>
            <a href="">Thực đơn & Giá</a>
        </div>
    </div>
</div>
<!-- Page Header End -->


<!-- Products Start -->
<div class="container-fluid about ">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">Thực đơn & Giá</h2>
            <span class="font-secondary" style="font-size: 22px;">Khám phá các loại bánh của chúng tôi</span>
        </div>
        <div class="container">
            <div id="content" class="space-top-none">
                <div class="main-content">
                    <div class="space60">&nbsp;</div>
                    <div class="row">
                        <div class="col-sm-3">
                            <ul class="nav nav-pills d-inline-flex justify-content-center bg-dark text-uppercase border-inner p-4 mb-5">
                                <li class="nav-item">
                                <?php
                                // Câu lệnh select lấy dữ liệu
                                    $sqlSelect = "SELECT * FROM tbl_category WHERE `status`=1";
                                    $resultCat = $conn->query($sqlSelect) or die("Lỗi truy vấn lấy dữ liệu");
                                    if ($resultCat->rowCount() > 0) {
                                        while($rowCat = $resultCat->fetch()) {

                                ?>             
                                    <a class="nav-link text-white" href="index.php?page=product&id=<?php echo $rowCat["cat_id"]?>"><?php echo $rowCat["cat_name"]?></a>
                                <?php }} ?>
                                </li>
                                        
                               
                                <!-- <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-2">Bánh sự kiện</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-3">Bánh độc lạ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-4">Người thân yêu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-5">Nhân vật hoạt hình</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-6">Bánh đẹp</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-7">Bánh in hình ảnh</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-8">Gato nhiều tầng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-9">Trái tim</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-10">Bánh 12 con giáp</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-11">Dịp tặng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-12">Bánh sinh nhật</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-13">Tặng khách hàng</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-white" data-bs-toggle="pill" href="#tab-14">Combo Hoa tươi-Bánh</a>
                                </li> -->
                            </ul>

                        </div>
                        <div class="col-sm-9">
                            <div class="beta-products-list">
                                <h4>Sản phẩm mới</h4>
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row g-3">
                                        <?php
                                            if(isset($_GET['id'])){
                                                $cat_id = $_GET['id'];
                                                $sqlSelectPro = "SELECT * FROM tbl_product WHERE `status`=1 AND cat_id = $cat_id";
                                                $resultPro = $conn->query($sqlSelectPro) or die("Lỗi truy vấn lấy dữ liệu");
                                                if ($resultPro->rowCount() > 0) {
                                                    while($rowPro = $resultPro->fetch()) {

                                        ?>
                                            <div class="col-lg-4 col-md-6">                
                                                <div class="team-item">
                                                    <div class="position-relative overflow-hidden">
                                                        <!-- <div class="ribbon-wrapper">
                                                            <div class="ribbon sale">Sale</div>
                                                        </div> -->
                                                        <a href="index.php?page=detail&id=<?php echo $rowPro["pro_id"] ?>" >
                                                            <img class="img-fluid w-100" src="../uploads/<?php echo $rowPro["image"] ?>" alt="<?php echo $rowPro["pro_name"]?>">
                                                        </a>

                                                        <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                                            <div class="btn-group-vertical">
                                                                <button type="button" class="btn btn-primary" ><a class=" btn btn-primary" href="index.php?page=detail&id=<?php echo $rowPro["pro_id"] ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng </a></button>
                                                                <form action="muangay_home.php" method="post" class=" btn btn-primary mt-3 ">
                                                                    <input type="hidden" name="id_product" value="<?php echo $rowPro["pro_id"] ?>">

                                                                    <button type="submit" class="btn btn-primary " name="buy_cart" ><i class="fa fa-credit-card "></i> Mua ngay </button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="bg-dark border-inner text-center p-4">
                                                        <h4 class="text-uppercase text-primary"><a href="index.php?page=detail&id=<?php echo $rowPro["pro_id"] ?>"><?php echo $rowPro["pro_name"]?></a></h4>
                                                        <div class="single-item-body">
                                                            <p class="single-item-price text-white m-0">
                                                                <span class="flash-del"><del><?php echo  number_format($rowPro["price_unit"],0,",",".")?></del></span>
                                                                <span class="flash-sale"><?php echo number_format($rowPro["price_promotion"],0,",",".")?></span>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php }}} ?>
                                    </div>
                                </div>
                            </div>
                            <div class="beta-products-list" style="margin-top: 100px;">
                                <h4>Sản phẩm bán chạy</h4>
                                <div id="tab-1" class="tab-pane fade show p-0 active">
                                    <div class="row g-3">
                                        <?php
                                            if(isset($_GET['id'])){
                                                $cat_id = $_GET['id'];
                                                $sqlSelectPro = "SELECT * FROM tbl_product WHERE `status`=1 AND cat_id = $cat_id AND top_rate='Hot' ";
                                                $resultPro = $conn->query($sqlSelectPro) or die("Lỗi truy vấn lấy dữ liệu");
                                                if ($resultPro->rowCount() > 0) {
                                                    while($rowPro = $resultPro->fetch()) {

                                            ?>
                                                <div class="col-lg-4 col-md-6">                
                                                    <div class="team-item">
                                                        <div class="position-relative overflow-hidden">
                                                            <!-- <div class="ribbon-wrapper">
                                                                <div class="ribbon sale">Sale</div>
                                                            </div> -->
                                                            <a href="index.php?page=detail&id=<?php echo $rowPro["pro_id"] ?>" >
                                                                <img class="img-fluid w-100" src="../uploads/<?php echo $rowPro["image"] ?>" alt="<?php echo $rowPro["pro_name"]?>">
                                                            </a>

                                                            <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                                                <div class="btn-group-vertical">
                                                                    <button type="button" class="btn btn-primary" id="addPro" ><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                                                    <button type="button" class="btn btn-primary mt-3"><i class="fa fa-credit-card"></i> Mua ngay</button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="bg-dark border-inner text-center p-4">
                                                            <h4 class="text-uppercase text-primary"><a href="index.php?page=detail&id=<?php echo $rowPro["pro_id"] ?>"><?php echo $rowPro["pro_name"]?></a></h4>
                                                            <div class="single-item-body">
                                                                <p class="single-item-price text-white m-0">
                                                                    <span class="flash-del"><del><?php echo  number_format($rowPro["price_unit"],0,",",".")?></del></span>
                                                                    <span class="flash-sale"><?php echo number_format($rowPro["price_promotion"],0,",",".")?></span>
                                                                </p>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        <?php }}} ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <!-- end section with sidebar and main content -->
                </div>
                <!-- .main-content -->
            </div>
            <!-- #content -->
        </div>
    </div>
</div>
<!-- Products End -->


<!-- Offer Start -->
<div class="container-fluid bg-offer my-5 py-5">
    <div class="container py-5">
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-7 text-center">
                <div class="section-title position-relative text-center mx-auto mb-4 pb-3" style="max-width: 600px;">
                    <h2 class="text-primary font-secondary">Special Kombo Pack</h2>
                    <h1 class="display-4 text-uppercase text-white">Super Crispy Cakes</h1>
                </div>
                <p class="text-white mb-4">Eirmod sed tempor lorem ut dolores sit kasd ipsum. Dolor ea et dolore et at sea ea at dolor justo ipsum duo rebum sea. Eos vero eos vero ea et dolore eirmod et. Dolores diam duo lorem. Elitr ut dolores magna sit. Sea dolore sed et.</p>
                <a href="" class="btn btn-primary border-inner py-3 px-5 me-3">Shop Now</a>
                <a href="" class="btn btn-dark border-inner py-3 px-5">Read More</a>
            </div>
        </div>
    </div>
</div>
<!-- Offer End -->


<!-- Testimonial Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">Testimonial</h2>
            <h1 class="display-4 text-uppercase">Our Clients Say!!!</h1>
        </div>
        <div class="owl-carousel testimonial-carousel">
            <div class="testimonial-item bg-dark text-white border-inner p-4">
                <div class="d-flex align-items-center mb-3">
                    <img class="img-fluid flex-shrink-0" src="img/testimonial-1.jpg" style="width: 60px; height: 60px;">
                    <div class="ps-3">
                        <h4 class="text-primary text-uppercase mb-1">Client Name</h4>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                </p>
            </div>
            <div class="testimonial-item bg-dark text-white border-inner p-4">
                <div class="d-flex align-items-center mb-3">
                    <img class="img-fluid flex-shrink-0" src="img/testimonial-2.jpg" style="width: 60px; height: 60px;">
                    <div class="ps-3">
                        <h4 class="text-primary text-uppercase mb-1">Client Name</h4>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                </p>
            </div>
            <div class="testimonial-item bg-dark text-white border-inner p-4">
                <div class="d-flex align-items-center mb-3">
                    <img class="img-fluid flex-shrink-0" src="img/testimonial-3.jpg" style="width: 60px; height: 60px;">
                    <div class="ps-3">
                        <h4 class="text-primary text-uppercase mb-1">Client Name</h4>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                </p>
            </div>
            <div class="testimonial-item bg-dark text-white border-inner p-4">
                <div class="d-flex align-items-center mb-3">
                    <img class="img-fluid flex-shrink-0" src="img/testimonial-4.jpg" style="width: 60px; height: 60px;">
                    <div class="ps-3">
                        <h4 class="text-primary text-uppercase mb-1">Client Name</h4>
                        <span>Profession</span>
                    </div>
                </div>
                <p class="mb-0">Dolor et eos labore, stet justo sed est sed. Diam sed sed dolor stet amet eirmod eos labore diam
                </p>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial End -->


