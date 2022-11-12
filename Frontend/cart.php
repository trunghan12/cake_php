<div class="container ">
    <div id="content">
        <div class="row mb" style="margin-top: 100px;">
            
            <div class="col-md-12">
                <div class="row mb" style="margin-top: 20px; text-align: center">
                    <h1>GIỎ HÀNG</h1>
                    <div id="alert_blur_shopping">

                    </div>
                    <table>
                        <tr style="border: 1px solid black; background: #ccc;" >
                            <th style="border: 1px solid black;">STT</th>
                            <th style="border: 1px solid black;">Hình</th>
                            <th style="border: 1px solid black;">Tên sản phẩm</th>
                            <th style="border: 1px solid black;">Kích cở</th>
                            <th style="border: 1px solid black;">Số lượng</th>
                            <th style="border: 1px solid black;">Đơn giá</th>
                            <th style="border: 1px solid black;">Thành tiền ($)</th>
                            <th style="border: 1px solid black;">Xóa</th>
                        </tr>
                    <?php 
                        $total = 0;
                        if(isset($_SESSION["cart"])){
                            $ii = 0;
                            foreach($_SESSION["cart"] as $key=>$value){
                                $ii++;
                    ?>
                        <tr style="border: 1px solid black;">
                            <td style="border: 1px solid black;"><?php echo $ii?></td>
                            <td style="border: 1px solid black;"><img height="100" class="custom_img" src="../uploads/<?php echo $value["image"] ?>" alt=""></td>
                            <td style="border: 1px solid black;"><?php echo $value["name"]?></td>
                            <td style="border: 1px solid black;"><?php echo $value['size']?></td>
                            <td class="product-quantity" style="border: 1px solid black;">
								<select name="quantity_<?php echo $key ?>" class="update_pro_shoppping" id="quantity_<?php echo $key ?>" onblur="updateCart(<?php echo $key ?>)" value="<?php echo $value["quantity"]?>">
									<?php
                                        for($i=0;$i<=30;$i++){ ?>
                                        <option  <?php if($value['quantity']==$i){ ?> selected <?php }?>  value="<?php echo $i; ?>"  ><?php echo $i; ?></option>
                                       <?php  } ?>
								</select>
							</td>
                            <td style="border: 1px solid black;">$<?php echo $value["price"]?></td>
                            <td style="border: 1px solid black;">
                                <div><?php echo $value["price"]*$value["quantity"]; $total += $value["price"]*$value["quantity"]; ?> </div>
                            </td>
                            <td class="product-remove" style="border: 1px solid black;">
                            <a href="javascript:void(0)" onclick="deleteCart(<?php echo $key ?>)" class="btn btn-sm btn-danger">delete</a>
							</td>
                            <?php } } ?>
                        </tr>
                        <tr style="border: 1px solid black; background: #ccc;" >
                            <th colspan="7" style="border: 1px solid black; text-align: center">Tổng đơn hàng</th>
                            <th>
                                <div>$ <?php echo $total;?></div>
                            </th>

                        </tr>
                        
                    </table>
                </div>
                <div class="row mb mt-3" >
                    <button type="submit" class="dongy col-md-3"><a href="index.php?page=checkOut" style="color: #000;">$Thanh toán --></a></button>
                </div>
            </div>
        </div>
    </div>
</div>