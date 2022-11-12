
    <!-- Contact Start -->
    <div class="container-fluid contact position-relative px-5" style="margin-top: 90px;">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary border-inner text-center text-white p-5">
                        <i class="bi bi-geo-alt fs-1 text-white"></i>
                        <h6 class="text-uppercase my-2">Đại chỉ</h6>
                        <span>123 Street, New York, USA</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary border-inner text-center text-white p-5">
                        <i class="bi bi-envelope-open fs-1 text-white"></i>
                        <h6 class="text-uppercase my-2">Email của chúng tôi</h6>
                        <span>info@example.com</span>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="bg-primary border-inner text-center text-white p-5">
                        <i class="bi bi-phone-vibrate fs-1 text-white"></i>
                        <h6 class="text-uppercase my-2">Gọi cho chúng tôi</h6>
                        <span>+012 345 6789</span>
                    </div>
                </div>
            </div>
            <!-- from đăng ký -->

            <div id="content" style="margin-top: 100px;">
                <form method="post" action="registerSubmit.php" class="beta-form-checkout" >
                    <div class="row">
                        <div class="row">
                            <div class="col-sm-1"></div>
                            <div class="row col-sm-10 text-white">
                                <h4 class="text-white text-center">Đăng kí</h4>
                                <div class="space20">&nbsp;</div>
                            </div>
                            <div class="col-sm-1"></div>
                        </div>
                        <div class="col-sm-1"></div>
                        <div class="row col-sm-10 text-white">
                            <div class="col-sm-6">
                                <div class="form-block">
                                    <label for="your_last_name">User name*</label>
                                    <input type="text" class="form-control" id="user_name" name="user_name" required="">
                                </div>
                                <div class="form-block">
                                    <label for="email">Địa chỉ email*</label>
                                    <input type="email" class="form-control" id="email" name="email" required="">
                                </div>
                                <div class="form-block mt-2">
                                    <label for="gender">Giới tính* </label>
                                    <br>
                                    <input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
                                    <input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
                                </div>
                                <div class="form-block mt-2">
                                    <label for="conscious">Tỉnh/Thành phố*</label>
                                    <input type="text" class="form-control" id="conscious" name="conscious" required="">
                                </div>
                                <div class="form-block">
                                    <label for="commune">Xã/Thị xã*</label>
                                    <input type="text" id="commune" class="form-control" name="commune" required="">
                                </div>
                                <div class="form-block">
                                    <label for="phone">Mật khẩu*</label>
                                    <input type="password" class="form-control" id="password" name="password" required="">
                                </div>
                            </div>
                            
                            <div class="col-sm-6">
                                <div class="form-block">
                                    <label for="your_last_name">Họ và tên*</label>
                                    <input type="text" class="form-control" id="full_name" name="full_name" required="">
                                </div>
                                <div class="form-block">
                                    <label for="phone">Số điện thoại*</label>
                                    <input type="text" class="form-control" id="phone" name="phone" required="">
                                </div>
                                <div class="form-block ">
                                    <label for="country">Quốc gia* </label>
                                    <input type="text" class="form-control" id="country" name="country" required="">
                                </div>
                                <div class="form-block">
                                    <label for="district">Huyện/Quận*</label>
                                    <input type="text" class="form-control" id="district" name="district" required="">
                                </div>
                                <div class="form-block">
                                    <label for="address">Địa chỉ thường trú*</label>
                                    <input type="text" id="address" class="form-control" name="address" required="">
                                </div>
                                <div class="form-block">
                                    <label for="re_password">Nhập lại mật khẩu*</label>
                                    <input type="password" class="form-control" id="re_password" name="re_password" required="">
                                </div>
                            </div>
                    </div>
                        <div class="col-sm-1"></div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-sm-1"></div>
                        <div class="row col-sm-10 text-white">
                            <div class="text-center form-block ">
                                <button type="submit" name="addNew" class="btn btn-primary">ĐĂNG KÝ</button>
                                <a href="index.php?page=login" class="btn ml-2 btn-secondary">ĐĂNG NHẬP</a>
                            </div>
                        </div>
                        <div class="col-sm-1"></div>
                    </div>
                </form>
            </div>

            <!-- End from -->
        </div>
    </div>
    <!-- Contact End -->
    <div class="container">
        <div class="section-title position-relative text-center mx-auto mb-5 pb-3" style="max-width: 600px; margin-top:100px">
            <h2 class="text-primary font-secondary"></h2>
            <h1 class="display-4 text-uppercase"></h1>
        </div>
        
    </div>