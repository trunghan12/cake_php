<div class="container ">
    <div id="content">
        <div class="row mb" style="margin-top: 100px;">
            <div class="col-md-8 boxtrai mr">
                <div class="row ">
                    <h1 >Thông tin đặt hàng</h1>
                    <div class="space20">&nbsp;</div>
                    <div class="form-block">
                        <label for="your_last_name">Họ và tên*</label>
                        <input type="text" class="form-control" id="full_name" name="full_name" required="">
                    </div>
                    <div class="form-block">
                        <label for="adress">Địa chỉ*</label>
                        <input type="text" class="form-control" id="address" name="address" required="">
                    </div>
                    <div class="form-block">
                        <label for="phone">Số điện thoại*</label>
                        <input type="text" id="phone" class="form-control" name="phone" required="">
                    </div>
                    <div class="form-block">
                        <label for="email">Địa chỉ email*</label>
                        <input type="email" class="form-control" id="email" name="email" required="">
                    </div>
                </div>
                <div class="row mb" style="margin-top: 20px;">
                    <h1>GIỎ HÀNG</h1>
                    <table>
                        <tr style="border: 1px solid black;">
                            <th style="border: 1px solid black;">STT</th>
                            <th style="border: 1px solid black;">Hình</th>
                            <th style="border: 1px solid black;">Tên sản phẩm</th>
                            <th style="border: 1px solid black;">Đơn giá</th>
                            <th style="border: 1px solid black;">Số lượng</th>
                            <th style="border: 1px solid black;">Thành tiền ($)</th>
                            <th style="border: 1px solid black;">Xóa</th>
                        </tr>
                    <?php 
                        $total = 0;
                        if(isset($_SESSION["cart"])){
                            $i = 0;
                            foreach($_SESSION["cart"] as $key=>$value){
                                $i++;
                    ?>
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black;"><?php echo $i?></td>
                            <td style="border: 1px solid black;"><img class="img-fluid w-100" src="../uploads/<?php echo $value["image"] ?>" alt=""></td>
                            <td style="border: 1px solid black;"><?php echo $value["name"]?></td>
                            <td style="border: 1px solid black;">$<?php echo $value["price"]?></td>
                            <td style="border: 1px solid black;"><?php echo $value["quanlity"]?></td>
                            <td style="border: 1px solid black;">
                                <div><?php echo $value["price"]*$value["quanlity"]; $total += $value["price"]*$value["quanlity"]; ?> </div>
                            </td>
                            <?php } } ?>
                        </tr>
                        <tr style="border: 1px solid black;">
                            <th colspan="5" style="border: 1px solid black; text-align: center">Tổng đơn hàng</th>
                            <th>
                                <div>$ <?php echo $total;?></div>
                            </th>

                        </tr>
                        
                    </table>
                </div>
                <div class="row mb mt-3" >
                    <button class="dongy col-md-3">ĐỒNG Ý ĐẶT HÀNG</button>
                </div>
               
            </div>
            <div class="col-md-4 boxphai">
                <div class="row mb ">
                    <div class="col-md-12">
                        <h4">TÀI KHOẢN</h4>
                        <div class="space20">&nbsp;</div>
                        
                        <div class="form-block">
                            <label for="your_last_name">Tên đăng nhập*</label>
                            <input type="text" class="form-control" id="full_name" name="full_name" required="">
                        </div>
                        <div class="form-block">
                            <label for="phone">Mật khẩu*</label>
                            <input type="password" class="form-control" name="passward" value="" id="passward" required="">
                        </div>
                        <div class="form-block">
                                <input type="checkbox" name=""> Ghi nhớ tài khoản?
                        </div>
                        <div class="form-block mt-3" style="display: flex; justify-content: center;">
                            <a href="dangKy.html"><button type="button" class="btn btn-secondary">Đăng Ký</button></a>
                            <button type="submit" name="login" class="btn btn-primary" style="margin-left: 20px;">Đăng nhập</button>
                        </div>
                    </div>
                </div>
                <!-- <div class="row mb mt-3">
                    <div class="boxtitle" >DANH MỤC</div>
                    <div class="boxcontent2 menudoc">
                        <ul>
                            <li>
                                <a href="#">Đồng hồ</a>
                            </li>
                            <li>
                                <a href="#">Laptop</a>
                            </li>
                            <li>
                                <a href="#">Điện thoại</a>
                            </li>
                            <li>
                                <a href="#">Ba lô</a>
                            </li>
                            <li>
                                <a href="#">Đồng hồ</a>
                            </li>
                            <li>
                                <a href="#">Laptop</a>
                            </li>
                            <li>
                                <a href="#">Điện thoại</a>
                            </li>
                            <li>
                                <a href="#">Ba lô</a>
                            </li>
                        </ul>
                    </div>
                    <div class="boxfooter searbox">
                        <form action="#" method="post">
                            <input type="text" name="" id="">
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="boxtitle">TOP 10 YÊU THÍCH</div>
                    <div class="row boxcontent">
                        <div class="row mb10 top10">
                            <img src="images/1.jpg" alt="">
                            <a href="#">Sir Rodney's Marmalade</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/5.jpg" alt="">
                            <a href="#">Cate de Blaye</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/3.jpg" alt="">
                            <a href="#">Tharinger Rostbratwurst</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/4.jpg" alt="">
                            <a href="#">Mishi Kobe Niku</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/1.jpg" alt="">
                            <a href="#">Sir Rodney's Marmalade</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/5.jpg" alt="">
                            <a href="#">Cate de Blaye</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/3.jpg" alt="">
                            <a href="#">Tharinger Rostbratwurst</a>
                        </div>
                        <div class="row mb10 top10">
                            <img src="images/4.jpg" alt="">
                            <a href="#">Mishi Kobe Niku</a>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
</div>