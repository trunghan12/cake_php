<?php
	ob_start();
	// if(!isset($_SESSION['tbl_user'])){
	// 	echo "tài khoản không tồn tại";
	// 	//header('Location: index.php?page=login');
	// }else{
	// 	echo "tồn tại";
	// }
	if(!isset($_SESSION['user_login'])){
		header('location: index.php?page=login');
	}else{
		$user_id = $_SESSION['user_login']['user_id'];
		$query_user_edit = "select * from tbl_user where user_id = '$user_id'";
		$result_user_edit = $conn->query($query_user_edit);
		$row_user_edit = $result_user_edit->fetch();
		// echo json_encode($row_user_edit);
		// die();
	}
	
?>
<div class="container">
	
		<div id="content">
			<div id="content" style="margin-top: 100px;">
                <form method="post" action="addCheckout.php" class="beta-form-checkout" >
                    <div class="row">
						<div class="col-sm-6 text-black">
							<h4>Đặt hàng</h4>
							<div class="row">
								<div class="col-sm-6">
									<div class="form-block">
										<label for="your_last_name">User name*</label>
										<input type="text" class="form-control" id="user_name" name="user_name" value="<?php echo isset($row_user_edit['user_name'])?$row_user_edit['user_name']:"" ?>" required="">
									</div>
									<div class="form-block">
										<label for="email">Địa chỉ email*</label>
										<input type="email" class="form-control" id="email" value="<?php echo isset($row_user_edit['email'])?$row_user_edit['email']:"" ?>" name="email" required="">
									</div>
									<div class="form-block mt-2">
										<label for="gender">Giới tính* </label>
										<br>
										<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
										<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
									</div>
									<div class="form-block mt-2">
										<label for="conscious">Tỉnh/Thành phố*</label>
										<input type="text" class="form-control" id="conscious" name="conscious" value="<?php echo isset($row_user_edit['conscious'])?$row_user_edit['conscious']:"" ?>" required="">
									</div>
									<div class="form-block">
										<label for="commune">Xã/Thị xã*</label>
										<input type="text" id="commune" class="form-control" name="commune" value="<?php echo isset($row_user_edit['commune'])?$row_user_edit['commune']:"" ?>" required="">
									</div>
								</div>
								
								<div class="col-sm-6">
									<div class="form-block">
										<label for="your_last_name">Họ và tên*</label>
										<input type="text" class="form-control" value="<?php echo isset($row_user_edit['full_name'])?$row_user_edit['full_name']:"" ?>" id="full_name" name="full_name" required="">
									</div>
									<div class="form-block">
										<label for="phone">Số điện thoại*</label>
										<input type="text" id="phone" class="form-control" value="<?php echo isset($row_user_edit['phone'])?$row_user_edit['phone']:"" ?>" name="phone" required="">
									</div>
									<div class="form-block ">
										<label for="country">Quốc gia* </label>
										<input type="text" class="form-control" id="country" name="country" value="<?php echo isset($row_user_edit['country'])?$row_user_edit['country']:"" ?>" required="">
									</div>
									<div class="form-block">
										<label for="district">Huyện/Quận*</label>
										<input type="text" class="form-control" id="district" name="district" value="<?php echo isset($row_user_edit['district'])?$row_user_edit['district']:"" ?>" required="">
									</div>
									<div class="form-block">
										<label for="address">Địa chỉ thường trú*</label>
										<input type="text" class="form-control" id="address" name="address" value="<?php echo isset($row_user_edit['address'])?$row_user_edit['address']:"" ?>" required="">
									</div>
								</div>
								<div class="form-block">
									<label for="notes">Ghi chú</label>
									<textarea name="o_note" id="o_note" class="form-control"></textarea>
								</div>
						</div>
                        </div>
						<div class="col-md-1"></div>
						<div class="col-sm-5">
							<div class="your-order">
								<div class="your-order-head"><h3>Đơn hàng của bạn</h3></div>
								<div class="your-order-body" style="padding: 0px 10px">
									<div class="your-order-item">
										<!--  one item	 -->
										<div >
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
														
														<!-- <div class="center">
															<div class="">&nbsp;</div>
															<button type="button" class="btn btn-lg" >
																<a href="index.php?page=cart" class="btn beta-btn btn-primary text-center" >Đặt hàng <i class="fa fa-chevron-right"></i></a>
															</button>
														</div> -->
													</div>
											<?php } ?>
										</div>
								</div>
								<div class="your-order-head"><h5>Hình thức thanh toán</h5></div>
								
								<div class="your-order-body">
									<ul class="payment_methods methods">
										<li class="payment_method_bacs">
											<input id="payment_method_bacs" type="radio" class="input-radio" name="payment_method" value="COD" checked="checked" data-order_button_text="">
											<label for="payment_method_bacs">Thanh toán khi nhận hàng </label>
										</li>

										<li class="payment_method_cheque">
											<input id="payment_method_cheque" type="radio" class="input-radio" name="payment_method" value="ATM_vnpay" data-order_button_text="">
											<label for="payment_method_cheque">Thanh toán online bằng VNPay </label>
										</li>
										
									</ul>
								</div>
								<div class="text-center">
									<button type="submit"  class="bg-primary" style="padding: 8px 10px;" name="redirect" >Đặt hàng</button>
								</div>
								<!-- <div class="text-center"><a name="newOrder" type="submit" class="beta-btn primary" href="">Đặt hàng <i class="fa fa-chevron-right"></i></a></div> -->
							</div> <!-- .your-order -->
						</div>

					</div>
                </form>
            </div>
		</div> <!-- #content -->
	</div> <!-- .container -->