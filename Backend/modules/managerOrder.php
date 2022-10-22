<?php
    $conn = include("../connection.php");
?>
<div class="row">
    <div class="col-md-12">
        <div class="x_panel">
            <div class="x_title">
                <h2>Thêm mới sản phẩm</h2>
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
            <div class="x_content">
                <br>
                <?php
                    if(isset($_POST["addNew"])){

                        $pro_name = $_POST['pro_name'];
                        $price_unit = $_POST['price_unit'];
                        $price_promotion = $_POST['price_promotion'];
                        $description = $_POST['description'];
                        $quantity = $_POST['quantity'];
                        $cat_id = $_POST['cat_id'];
                        $top_rate = $_POST['top_rate'];
                        $status = 1;
                        $date_create = Date("Y-m-d H:i:s");
                        $date_update = Date("Y-m-d H:i:s");


                        $pro_edit['pro_name']='';
                        $pro_edit['quantity']='';
                        $pro_edit['price_unit']='';
                        $pro_edit['price_promotion']='';
                        $pro_edit['top_rate']='';
                        $pro_edit['description']='';


                        //xử lý uploads file
                        $path="uploads";
                        $fileName="";
                        $image = "";

                        if(isset($_FILES["image"])){
                            // $path = '../uploads'
                            if(isset($_FILES["image"]["name"])){
                                if($_FILES["image"]["type"]){
                                    if($_FILES["image"]["type"] == "image/jpeg" || $_FILES["image"]["type"] == "image/png" || $_FILES["image"]["type"] == "image/gif" || $_FILES["image"]["type"] == "image/jpg"){ 
                                        if($_FILES["image"]["size"]<=2400000){
                                            if($_FILES["image"]["error"]==0){
                                                // di chuyển file vào thư mục uploads
                                                $fileName =$_FILES["image"]["name"];
                                                $array = explode('.',$fileName);
                                                $new_image_name = $array[0].rand(0,9999).'.'.$array[1];
                                                $image = $new_image_name;
                                                move_uploaded_file($_FILES["image"]["tmp_name"],"../".$path."/".$new_image_name);
                                            }else{
                                                echo "Lỗi file";
                                            }
                                        }else{
                                            echo "File quá lơn";
                                        }
                                    }else{
                                        echo "File không phải là ảnh";
                                    }
                                }else{
                                    echo "Bạn chưa chọn file";
                                }
                            }
                            // echo "<pre>";
                            // print_r($_FILES['image']);
                        }

                        if(isset($_GET['id'])){
                            $query_select_pro = "select * from tbl_product where pro_id =".$_GET['id'];
                            $result_select_pro = $conn->query($query_select_pro);
                            $row_select_pro = $result_select_pro->fetch();
                            if($image == ""){
                                $image = $row_select_pro['image'];
                            }
                            if($status == ""){
                                $status = $row_select_pro['status'];
                            }
                            if($cat_id == ""){
                                $cat_id = $row_select_pro['cat_id'];
                            }
                            if($top_rate == ""){
                                $top_rate = $row_select_pro['top_rate'];
                            }
                            $sqlUpdatePro = "UPDATE tbl_product SET pro_name='$pro_name', price_unit='$price_unit',price_promotion='$price_promotion', description='$description', quantity='$quantity', image='$image',cat_id ='$cat_id',top_rate='$top_rate', `status`='$status',  date_update='$date_update' WHERE pro_id=".$_GET['id'];
                            $conn->query($sqlUpdatePro);
                            header('location: index.php?page=addproduct');
                        }else{
                            $query_insert_pro = "INSERT INTO tbl_product values('','$pro_name','$price_unit','$price_promotion','$description','$quantity','$image','$cat_id','$top_rate','$status','$date_create','$date_update')";
                            $conn->query($query_insert_pro);
                            header('location: index.php?page=addproduct');
                        } 
                        
                        
                    }elseif(isset($_GET['del']) && $_GET['del']==1){
                        $pro_id = $_GET['id'];
                        $query_delete_product = "delete from tbl_product where pro_id ='$pro_id'";
                        $conn->query($query_delete_product);
                        header('location: index.php?page=addproduct');
                    }elseif(isset($_GET['id'])){
                        $query_edit_pro = "select *from tbl_product where pro_id=".$_GET['id'];
                        $result_edit_pro = $conn->query($query_edit_pro);
                        $row_edit_pro = $result_edit_pro->fetch();

                        $pro_edit['pro_name']= $row_edit_pro['pro_name'];
                        $pro_edit['quantity']= $row_edit_pro['quantity'];
                        $pro_edit['price_unit']= $row_edit_pro['price_unit'];
                        $pro_edit['price_promotion']= $row_edit_pro['price_promotion'];
                        $pro_edit['top_rate']= $row_edit_pro['top_rate'];
                        $pro_edit['description']= $row_edit_pro['description'];
                    }
                
                ?>
                <form class="form-label-left input_mask" method="post" enctype='multipart/form-data'>
                    <div class="form-group col-md-12 row has-feedback">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 " >Tên sản phẩm</label>
                        <div class="col-md-9 col-sm-9 ">
                            <input type="text" class="form-control" value="<?php echo isset($pro_edit['pro_name'])?$pro_edit['pro_name']:""; ?>" id="pro_name" name="pro_name" placeholder="Tên danh mục">
                        </div>
                    </div>
                    <div class="form-group col-md-12 row has-feedback">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Danh mục</label>
                        <div class="col-md-9 col-sm-9 ">
                            <?php 
                                $sqlSelectCat = "SELECT * FROM tbl_category WHERE status = 1";
                                $resultCat = $conn->query($sqlSelectCat) or die("Lỗi truy vấn lấy dữ liệu");
                            ?>
                            <select class="form-control" id="cat_id" name="cat_id">
                                <option value="" >-- Chọn Danh Mục --</option>
                                <?php 
                                if ($resultCat->rowCount() > 0) {
                                    while($rowCat = $resultCat->fetch()) {
                                ?>
                                    <option value="<?php echo $rowCat["cat_id"] ?>"><?php echo $rowCat["cat_name"] ?></option>
                                <?php }} ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 row has-feedback">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Ảnh sản phẩm</label>
                        <div class="col-md-6 col-sm-6  form-group has-feedback">
                            <input type="file" id="image" name="image">
                        </div>
                    </div>
                    <div class="form-group col-md-12 row has-feedback">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Số lượng</label>
                        <div class="col-md-1 col-sm-1">
                            <input type="text" name="quantity" id="quantity" value="<?php echo isset($pro_edit['quantity'])?$pro_edit['quantity']:"";?>" class="form-control">
                        </div>
                    </div>
                    <div class="form-group col-md-12 row has-feedback">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Giá tiền</label>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" name="price_unit" id="price_unit" value="<?php echo isset($pro_edit['price_unit'])?$pro_edit['price_unit']:""; ?>" class="form-control">
                        </div>
                        <span style="font-size: 16px;">vnđ</span>
                    </div>
                    <div class="form-group col-md-12 row has-feedback">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Giá khuyến mãi</label>
                        <div class="col-md-3 col-sm-3">
                            <input type="text" name="price_promotion" id="price_promotion" value="<?php echo isset($pro_edit['price_promotion'])?$pro_edit['price_promotion']:""; ?>" class="form-control">
                        </div>
                        <span style="font-size: 16px;">vnđ</span>
                    </div>
                    <div class="form-group col-md-12 row has-feedback">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Xếp hạng cao</label>
                        <div class="col-md-9 col-sm-9 ">
                            <select class="form-control" value="<?php echo isset($pro_edit['top_rate'])?$pro_edit['top_rate']:""; ?>" name= "top_rate" id="top_rate">
                                <option value="" >-- Chọn xếp hạng --</option>
                                <option <?php echo isset($pro_edit['top_rate'])?"selected":""; ?>>Hot</option>
                                <option <?php echo isset($pro_edit['top_rate'])?"selected":""; ?>>Bình thường</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-md-12 row has-feedback">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Mô tả</label>
                        <div class="col-md-9 col-sm-9 ">
                            <textarea 
                                id="description" class="form-control" name="description" value="<?php echo isset($pro_edit['description'])?$pro_edit['description']:"";?>"
                                data-parsley-trigger="keyup" data-parsley-minlength="20" data-parsley-maxlength="100" 
                                data-parsley-minlength-message="Come on! You need to enter at least a 20 caracters long comment.." data-parsley-validation-threshold="10" 
                                style="height: 122px;">                            
                            </textarea>
                        </div>
                    </div>
                    <!-- <div class="form-group row">
                        <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Trạng thái</label>
                        <div class="col-md-9 col-sm-9 ">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="1" > Ẩn/Hiển thị
                                </label>
                            </div>
                        </div>
                    </div> -->
                    <div class="ln_solid"></div>
                    <div class="form-group col-md-12 row has-feedback">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="button" class="btn btn-danger">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <?php
                                if(isset($pro_edit)){ ?>
                                    <button type="submit" class="btn btn-success" name="addNew">Update</button>
                            <?php }else{ ?>
                                    <button type="submit" class="btn btn-success" name="addNew">Submit</button>
                            <?php }  ?>
                        </div>
                    </div>
                </form>
            </div>
        </div>
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
            <!-- <a href="index.php?page=addcategogy" class="btn btn-primary text-white mt-3 mb-3">Thêm mới <i class="fa fa-plus"></i></a> -->
            <div class="x_content">
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên sản phảm</th>
                        <th>Tên danh mục</th>
                        <th>Hình ảnh</th>
                        <th>số lượng</th>
                        <th>Giá tiền</th>
                        <th>Giá tiền khuyến mãi</th>
                        <th>xếp hạng cao</th>
                        <th>mô tả</th>
                        <th>Trạng thái</th>
                        <th>Ngày tạo</th>
                        <th>Ngày cập nhật</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    // Câu lệnh select lấy dữ liệu
                    $sqlSelectPro = "SELECT * FROM tbl_product";
                    // thực thi truy vấn
                    $resultPro = $conn->query($sqlSelectPro) or die("Lỗi truy vấn lấy dữ liệu");
                    if ($resultPro->rowCount() > 0) {
                        $i = 0;
                        while($rowPro = $resultPro->fetch()) {
                            $i++;
                            ?>
                            <tr>
                                <th scope="row"><?php echo $i; ?></th>
                                <td><?php echo $rowPro["pro_name"]; ?></td>
                                <td>
                                    <?php
                                        $id = $rowPro['cat_id'];
                                        $sqlCat = "select * from tbl_category where cat_id = '$id'";
                                        $resultCat = $conn->query($sqlCat);
                                        $rowCat = $resultCat->fetch();
                                        echo $rowCat["cat_name"];
                                    ?>    
                                </td>
                                <td>
                                    <img height="100" class="custom_img" src="../uploads/<?php echo $rowPro['image'] ?>" alt="">
                                </td>
                                <td><?php echo $rowPro["quantity"]; ?></td>
                                <td><?php echo $rowPro["price_unit"]; ?></td>
                                <td><?php echo $rowPro["price_promotion"]; ?></td>
                                <td><?php echo $rowPro["top_rate"]; ?></td>
                                <td style="width: 200px;"><?php echo $rowPro['description'] ?></td>
                                <td><?php echo ($rowPro["status"]) ? "Hiển thị":"Ẩn"; ?></td>
                                <td><?php echo date("d-m-Y H:i:s",strtotime($rowPro["date_create"])); ?></td>
                                <td><?php echo date("d-m-Y H:i:s",strtotime($rowPro["date_update"])); ?></td>
                                <td>
                                    <a href="index.php?page=addproduct&id=<?php echo $rowPro["pro_id"]; ?>&edit=1">
                                        <i class="fa fa-pencil-square-o"> Sửa</i>
                                    </a>
                                    <a href="index.php?page=addproduct&id=<?php echo $rowPro["pro_id"]; ?>&del=1" onclick="return confirm('Bạn có chắc chắn bạn muốn xóa bản ghi này không?');">
                                        <i class="fa fa-trash-o"> Xóa</i>
                                    </a>
                                </td>
                            </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>