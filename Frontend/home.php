 <!-- Hero Start -->
 <div class="container-fluid bg-primary py-5 mb-5 hero-header">
        <div class="container py-5">
            <div class="row justify-content-start">
                <div class="col-lg-8 text-center text-lg-start">
                    <h1 class="font-secondary text-primary mb-4">Super Crispy</h1>
                    <h1 class="display-1 text-uppercase text-white mb-4">CakeZone</h1>
                    <h1 class="text-uppercase text-white">Bánh ngon nhất ở Việt Nam</h1>
                    <div class="d-flex align-items-center justify-content-center justify-content-lg-start pt-5">
                        <a href="" class="btn btn-primary border-inner py-3 px-5 me-5">Xem thêm</a>
                        <button type="button" class="btn-play" data-bs-toggle="modal"
                            data-src="https://www.youtube.com/embed/4owtaN40jqc" data-bs-target="#videoModal">
                            <span></span>
                        </button>
                        <h5 class="font-weight-normal text-white m-0 ms-4 d-none d-sm-block">Xem video</h5>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- Video Modal Start -->
    <div class="modal fade" id="videoModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content rounded-0">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Youtube Video</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- 16:9 aspect ratio -->
                    <div class="ratio ratio-16x9">
                        <iframe class="embed-responsive-item" src="" id="video" allowfullscreen allowscriptaccess="always"
                            allow="autoplay"></iframe>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Video Modal End -->

    <!-- Team Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
                <h2 class="text-primary font-secondary">Sản phẩm mới nhất</h2>
                <span class="font-secondary" style="font-size: 22px;">Sản phẩm đảm bảo chất lượng và uy tín hàng đầu hiện nay</span>
            </div>
            <div class="row g-5">
                <?php
                    $sqlSelectPro = "SELECT * FROM tbl_product WHERE `status`=1 ";
                    $resultProHome = $conn->query($sqlSelectPro) or die("Lỗi truy vấn lấy dữ liệu");
                    if ($resultProHome->rowCount() > 0) {
                        while($rowProHome = $resultProHome->fetch()) {

                ?>
                    <div class="col-lg-4 col-md-6">                
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <!-- <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div> -->
                                <a href="index.php?page=detail&id=<?php echo $rowProHome["pro_id"] ?>" >
                                    <img class="img-fluid w-100" src="../uploads/<?php echo $rowProHome["image"] ?>" alt="<?php echo $rowProHome["pro_name"]?>">
                                </a>

                                <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                    <div class="btn-group-vertical">
                                        <button type="button" class="btn btn-primary" ><a class=" btn btn-primary" href="index.php?page=detail&id=<?php echo $rowProHome["pro_id"] ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng </a></button>
                                        <form action="muangay_home.php" method="post" class=" btn btn-primary mt-3 ">
                                            <input type="hidden" name="id_product" value="<?php echo $rowProHome["pro_id"] ?>">

                                            <button type="submit" class="btn btn-primary " name="buy_cart" ><i class="fa fa-credit-card "></i> Mua ngay </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-dark border-inner text-center p-4">
                                <h4 class="text-uppercase text-primary"><a href="index.php?page=detail&id=<?php echo $rowProHome["pro_id"] ?>"><?php echo $rowProHome["pro_name"]?></a></h4>
                                <div class="single-item-body">
                                    <p class="single-item-price text-white m-0">
                                        <span class="flash-del"><del><?php echo  number_format($rowProHome["price_unit"],0,",",".")?></del></span>
                                        <span class="flash-sale"><?php echo number_format($rowProHome["price_promotion"],0,",",".")?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>
            <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px; margin-top:100px">
                <h2 class="text-primary font-secondary">Sản phẩm bán chạy nhất</h2>
                <span class="font-secondary" style="font-size: 22px;">Sản phẩm đảm bảo chất lượng và uy tín hàng đầu hiện nay</span>
            </div>
            <div class="row g-5">
                <?php
                    $sqlSelectPro = "SELECT * FROM tbl_product WHERE `status`=1 AND top_rate='Hot' ";
                    $resultProHome = $conn->query($sqlSelectPro) or die("Lỗi truy vấn lấy dữ liệu");
                    if ($resultProHome->rowCount() > 0) {
                        while($rowProHome = $resultProHome->fetch()) {

                ?>
                    <div class="col-lg-4 col-md-6">                
                        <div class="team-item">
                            <div class="position-relative overflow-hidden">
                                <!-- <div class="ribbon-wrapper">
                                    <div class="ribbon sale">Sale</div>
                                </div> -->
                                <a href="index.php?page=detail&id=<?php echo $rowProHome["pro_id"] ?>" >
                                    <img class="img-fluid w-100" src="../uploads/<?php echo $rowProHome["image"] ?>" alt="<?php echo $rowProHome["pro_name"]?>">
                                </a>

                                <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                                    <div class="btn-group-vertical">
                                        <button type="button" class="btn btn-primary" ><a class=" btn btn-primary" href="index.php?page=detail&id=<?php echo $rowProHome["pro_id"] ?>"><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng </a></button>
                                        <form action="muangay_home.php" method="post" class=" btn btn-primary mt-3 ">
                                            <input type="hidden" name="id_product" value="<?php echo $rowProHome["pro_id"] ?>">

                                            <button type="submit" class="btn btn-primary " name="buy_cart" ><i class="fa fa-credit-card "></i> Mua ngay </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-dark border-inner text-center p-4">
                                <h4 class="text-uppercase text-primary"><a href="index.php?page=detail&id=<?php echo $rowProHome["pro_id"] ?>"><?php echo $rowProHome["pro_name"]?></a></h4>
                                <div class="single-item-body">
                                    <p class="single-item-price text-white m-0">
                                        <span class="flash-del"><del><?php echo  number_format($rowProHome["price_unit"],0,",",".")?></del></span>
                                        <span class="flash-sale"><?php echo number_format($rowProHome["price_promotion"],0,",",".")?></span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }} ?>
            </div>
        </div>
    </div>
    <!-- Team End -->


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