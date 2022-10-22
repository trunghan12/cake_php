<!-- About Start -->
<div class="container-fluid pt-5">
    <?php
        if(isset($_GET["id"])){
            $id = $_GET["id"];
            $sqlDetailPro = "SELECT *FROM tbl_product WHERE pro_id= $id";
            $resultDetailPro = $conn->query("$sqlDetailPro");
            $rowDetail = $resultDetailPro->fetch();
            // echo "<pre>";
            // print_r($rowDetail);
            
    ?>
    <div class="container ">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">About Us</h2>
            <h1 class="display-4 text-uppercase">Welcome To CakeZone</h1>
        </div>
        <div class="row gx-5">
            <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 400px;">
                <div class="position-relative h-100">
                    <img class="position-absolute w-100 h-100" src="../uploads/<?php echo $rowDetail["image"]?>" alt="<?php echo $rowDetail["pro_name"]?> style="object-fit: cover;">
                </div>
            </div>
            <div class="col-lg-6 pb-5">
                <h4 class="text-uppercase text-dark"><?php echo $rowDetail[1]?></h4>
                <div class="single-item-body">
                    <p class="single-item-price  m-0">
                        <span class="flash-del text-dark"><del><?php echo $rowDetail[3]?> đ</del></span>
                        <span class="flash-sale text-primary"><?php echo $rowDetail[2]?> đ</span>
                    </p>
                </div>
                <hr>
                <p class="text-justify"><?php echo $rowDetail[4]?></p>
                <div>
                    <h4 class="text-uppercase text-dark">Size</h4>
                </div>
                <button type="button" class="btn btn-outline-warning">Nhỏ</button>
                <button type="button" class="btn btn-outline-warning">Trung Bình</button>
                <button type="button" class="btn btn-outline-warning">Lớn</button>
                <div class="woocommerce-variation-add-to-cart variations_button woocommerce-variation-add-to-cart-disabled row" style="margin-top: 55px;">
                        <div class="quantity buttons_added col-md-5">
                            <input type="button" value="-" class="minus button is-form btn btn-primary" onclick = "minus()">				
                            <input type="number" id="quantity" class="input-text qty text btn btn-dark" step="1" min="1" max="100" name="quantity" value="1" title="SL" size="4" placeholder="" inputmode="numeric">
                            <input type="button" value="+" class="plus button is-form btn btn-primary" onclick = "plus()">	
                        </div>
                        <div class="col-md-8" style="margin-top: 55px;">
                            <p class="addtocart">
                                <a href="javascript:void(0)" onclick="addCart(<?php echo $rowDetail[0]; ?>)" class="btn btn-primary btn-addtocart" >Thêm vào giỏ hàng</a>
                            </p>
                        </div>
                        
                    
                        
                        <input type="hidden" name="add-to-cart" value="345">
                        <input type="hidden" name="product_id" value="345">
                        <input type="hidden" name="variation_id" class="variation_id" value="0">
                </div>            
            </div>
        </div>
    </div>
    
</div>
<!-- About End -->
<!-- Đánh giá sản phẩm-->

<div class="container">
    <hr>
    <div class="product_detail_description">
        <nav class="d-flex justify-content-center">
            <div class="nav" id="nav-tab" role="tablist">
                <a class="nav-item nav-link" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="false">Mô tả</a>
                <a class="nav-item nav-link active show" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="true">Đánh giá</a>
            </div>
        </nav>
        <!-- <hr> -->
        
        <div class="tab-content border p-4 " id="nav-tabContent">
            <div class="tab-pane fade" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <p> <?php echo $rowDetail[4] ?></p>
            </div>
            <div class="tab-pane fade active show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                <div class="comment-item d-flex mb-3">
                    <div class="row">
                        <div class="col-sm-1 col-12">
                            <div class="comment-img pr-xl-0 pr-lg-2 pr-2">
                                <!-- <img src="./images/product/default-9.jpg" alt=""> -->
                            </div>
                        </div>
                        <div class="col-sm-11 col-12">
                            <div class="comment-content pl-4">
                                <p class="user_name">Keadyn Fraser</p>
                                <p class="user_comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, 
                                    voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque 
                                    nam quod sint provident modi alias culpa, inventore deserunt accusantium amet 
                                    earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo 
                                    comment-item                            enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe 
                                    repellat.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="comment-item d-flex mb-3">
                    <div class="row">
                        <div class="col-sm-1 col-12">
                            <div class="comment-img pr-xl-0 pr-lg-2 pr-2">
                                <!-- <img src="./images/product/default-9.jpg" alt=""> -->
                            </div>
                        </div>
                        <div class="col-sm-11 col-12">
                            <div class="comment-content pl-4">
                                <p class="user_name">Keadyn Fraser</p>
                                <p class="user_comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, 
                                    voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque 
                                    nam quod sint provident modi alias culpa, inventore deserunt accusantium amet 
                                    earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo 
                                    comment-item                            enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe 
                                    repellat.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="comment-item d-flex mb-3">
                    <div class="row">
                        <div class="col-sm-1 col-12">
                            <div class="comment-img pr-xl-0 pr-lg-2 pr-2">
                                <!-- <img src="./images/product/default-9.jpg" alt=""> -->
                            </div>
                        </div>
                        <div class="col-sm-11 col-12">
                            <div class="comment-content pl-4">
                                <p class="user_name">Keadyn Fraser</p>
                                <p class="user_comment">Lorem ipsum dolor sit amet, consectetur adipisicing elit. 
                                    Tempora inventore dolorem a unde modi iste odio amet, fugit fuga aliquam, 
                                    voluptatem maiores animi dolor nulla magnam ea! Dignissimos aspernatur cumque 
                                    nam quod sint provident modi alias culpa, inventore deserunt accusantium amet 
                                    earum soluta consequatur quasi eum eius laboriosam, maiores praesentium explicabo 
                                    comment-item                            enim dolores quaerat! Voluptas ad ullam quia odio sint sunt. Ipsam officia, saepe 
                                    repellat.</p>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div>
                    <h6 style="color: #000; font-size: 16px;">Thêm đánh giá</h6>
                    <form action="">
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Họ và tên*</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="HỌ VÀ TÊN ">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email*</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="ĐỊA CHỈ EMAIL">
                            </div>
                            <div class="form-group">
                            <label for="exampleFormControlTextarea1">Đánh giá</label>
                            <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                            </div>
                        <button type="submit" class="btn2 text-center btn_review btn-primary">thêm</button>
                            
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Team Start -->
<div class="container-fluid py-5">
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px;">
            <h2 class="text-primary font-secondary">Sản phẩm tương tự</h2>
            <h1 class="display-4 text-uppercase">Our Master Chefs</h1>
        </div>
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <div class="team-item">
                    <div class="position-relative overflow-hidden">
                        <!-- <div class="ribbon-wrapper">
                            <div class="ribbon sale">Sale</div>
                        </div> -->
                        <img class="img-fluid w-100" src="img/team-1.jpg" alt="">

                        <div class="team-overlay w-100 h-100 position-absolute top-50 start-50 translate-middle d-flex align-items-center justify-content-center">
                            <div class="btn-group-vertical">
                                <button type="button" class="btn btn-primary" ><i class="fa fa-shopping-cart"></i> Thêm vào giỏ hàng</button>
                                <button type="button" class="btn btn-primary mt-3"><i class="fa fa-credit-card"></i> Mua ngay</button>
                            </div>
                        </div>
                    </div>
                    <div class="bg-dark border-inner text-center p-4">
                        <h4 class="text-uppercase text-primary">Hot Boy</h4>
                        <div class="single-item-body">
                            <p class="single-item-price text-white m-0">
                                <span class="flash-del"><del>12.000 đ</del></span>
                                <span class="flash-sale">10.000 đ</span>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
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
<?php }?>

