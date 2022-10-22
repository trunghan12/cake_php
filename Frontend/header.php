<!-- Topbar Start -->
<div class="container-fluid px-0 d-none d-lg-block">
        <div class="row gx-0">
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
                    <a href="index.html" class="navbar-brand">
                        <h1 class="m-0 text-uppercase text-white"><i class="fa fa-birthday-cake fs-1 text-dark me-3"></i>CakeZone</h1>
                    </a>
                </div>
            </div>
            <div class="col-lg-4 text-center bg-secondary py-3">
                <div class="d-inline-flex align-items-center justify-content-center">
                    <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                    <div class="text-start">
                        <h6 class="text-uppercase mb-1">Call Us</h6>
                        <span>+012 345 6789</span>
                    </div>
                    <div class="beta-select ml-1"><i class="fas fa-shopping-cart fs-1 text-primary me-3"></i> Giỏ hàng (trống) <i class="fa fa-chevron-down"></i></div>
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
                    <a href="index.php?page=product" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sản phẩm của chúng tôi</a>
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
            <div class="navbar-nav mr-5 py-0 " style="margin-left: 500px;">
                <a href="team.html" class="nav-item nav-link active">Tài khoản</a>
                <a href="index.php?page=dangKy" class="nav-item nav-link active">Đăng kí</a>
                <a href="index.php?page=dangNhap" class="nav-item nav-link active">Đăng nhập</a>
            </div>
        </div>
    </nav>
    <!-- Navbar End -->   