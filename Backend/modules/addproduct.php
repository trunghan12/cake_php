<div class="row">
    <div class="col-md-8 md-offset-2">
        <div class="x_panel">
            <div class="x_title">
                <h2>Form Design <small>different form elements</small></h2>
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
                       
                        $table="tbl_product";

                        $_POST["status"]=1;
                        $_POST["date_create"]=date("Y-m-d H:i:s");

                        //xử lý uploads file
                        $path="uploads";
                        $fileName="";
                        if(isset($_FILES["image"])){
                            // $path = '../uploads'
                            if(isset($_FILES["image"]["name"])){
                                if($_FILES["image"]["type"]){
                                    if($_FILES["image"]["type"] == "image/jpep" || $_FILES["image"]["type"] == "image/png" || $_FILES["image"]["type"] == "image/gif"){
                                        if($_FILES["image"]["size"]<=2400000){
                                            if($_FILES["image"]["error"]==0){
                                                // di chuyển file vào thư mục uploads
                                                move_uploaded_file($_FILES["image"]["tmp_name"],"../".$path."/".$_FILES["image"]["name"]);
                                                $fileName =$_FILES["image"]["name"];
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

                        $_POST["image"]=$fileName;
                        $data = $_POST;
                        

                        addNew($table,$data);
                        
                    }
                ?>
                <form class="form-label-left input_mask" method="post" enctype="multipart/form-data">
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="pro_name" name="pro_name" placeholder="Tên Sản Phẩm">
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?php 
                        $sqlSelectCat = "SELECT * FROM tbl_category WHERE status = 1";
                        $resultCat = mysqli_query($conn, $sqlSelectCat) or die("Lỗi truy vấn lấy dữ liệu");
                    ?>
                        <select class="form-control" id="cat_id" name="cat_id">
                            <option value="">-- Chọn Danh Mục --</option>
                            <?php 
                                if (mysqli_num_rows($resultCat) > 0) {
                                    while($rowCat = mysqli_fetch_assoc($resultCat)) {
                            ?>
                                <option value="<?php echo $rowCat["cat_id"] ?>"><?php echo $rowCat["cat_name"] ?></option>
                            <?php }} ?>
                        </select>
                    </div>
    
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?php 
                        $sqlSelectSize = "SELECT * FROM tbl_size WHERE status = 1";
                        $resultSize = mysqli_query($conn, $sqlSelectSize) or die("Lỗi truy vấn lấy dữ liệu");
                    ?>
                        <select class="form-control" id="size_id" name="size_id">
                            <option value="">-- Chọn Cỡ --</option>
                            <?php 
                                if (mysqli_num_rows($resultSize) > 0) {
                                    while($rowSize = mysqli_fetch_assoc($resultSize)) {
                            ?>
                                <option value="<?php echo $rowSize["size_id"] ?>"> <?php echo $rowSize["size_name"]."-".$rowSize["size_number"]?></option>
                            <?php } } ?>
                        </select>
                    </div>
    
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                    <?php 
                        $sqlSelectFac = "SELECT * FROM tbl_factory WHERE status = 1";
                        $resultFac = mysqli_query($conn, $sqlSelectFac) or die("Lỗi truy vấn lấy dữ liệu");
                    ?>
                    <select class="form-control" id="facroty_id" name="facroty_id">
                            <option value="">-- Chọn Thương Hiệu --</option>
                            <?php 
                                if (mysqli_num_rows($resultFac) > 0) {
                                    while($rowFac = mysqli_fetch_assoc($resultFac)) {
                            ?>
                                <option value="<?php echo $rowFac["fac_id"] ?>"> <?php echo $rowFac["fac_name"]?></option>
                            <?php }} ?>
                        </select>
                    </div>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="file" id="image" name="image">
                    </div>
    
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="text" class="form-control" id="price" name="price"placeholder="Nhập giá">
                    </div>  
                    <div class="col-md-12 col-sm-12  x_content">
                        <textarea class="resizable_textarea form-control" name="description" id="description"></textarea>
                    </div>             
                    <div class="ln_solid"></div>
                    <div class="form-group row">
                        <div class="col-md-9 col-sm-9  offset-md-3">
                            <button type="button" class="btn btn-primary">Cancel</button>
                            <button class="btn btn-primary" type="reset">Reset</button>
                            <button type="submit" class="btn btn-success" name="addNew">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>