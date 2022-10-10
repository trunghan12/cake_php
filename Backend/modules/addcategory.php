<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Thêm mới danh mục </h2>
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
            //Thêm mới
                if(isset($_POST["addNew"])){
                    $catName = $_POST["cat_name"];
                    $status = isset($_POST["status"])?1:0;
                    $date_create = date("Y-m-d H:i:s");
                    if(isset($_GET["id"]) && isset($_GET["edit"])){
                        $sqlUpdate = "UPDATE tbl_category SET cat_name='$catName', `status`='$status', date_create='$date_create', WHERE cat_id=".$_GET["id"];
                        mysqli_query($conn, $sqlUpdate) or die("Lỗi câu lệnh cập nhật");
                        header("location:index.php?page=category");    
                    }else{     
                        // viết câu lệnh insert
                        // $sqlInsert = "INSERT INTO tbl_category(cat_name,`status`,date_create)";
                        // $sqlInsert .= "values('$catName','$status','$date_create')";
                        // thực thi câu lệnh truy vấn
                        // mysqli_query($conn, $sqlInsert) or die("Lỗi câu lệnh thêm mới");
                        $table = "tbl_category";
                        $_POST["status"]=$status;
                        $_POST["date_create"]=$date_create;
                        $data = $_POST;
                        addNew($table, $data);
                    }
                }
                //kiểm tra tham số id trên url trường hợp edit
                $cat_name = "";
                $status = false;
                // lấy thông tin ra sửa
                if(isset($_GET["id"]) && isset($_GET["edit"])){
                    $sqlEdit = "SELECT * FROM tbl_category WHERE cat_id=".$_GET["id"];
                    $resultEdit = mysqli_query($conn, $sqlEdit);
                    $rowEdit = mysqli_fetch_row($resultEdit);
                    // echo "<pre>";
                    // print_r($rowEdit);
                    $cat_name = $rowEdit[1];
                    $status = ($rowEdit[2]?true:false);
                }

                // kiểm tra trường hợp delete
                if(isset($_GET["id"]) && isset($_GET["del"])){
                    $sqlDelete = "DELETE FROM tbl_category WHERE cat_id=".$_GET["id"];
                    mysqli_query($conn, $sqlDelete) or die("Lỗi xóa bản ghi");
                    header("location:index.php?page=category");
                }
                
                // update hình ảnh
                if(isset($_POST["addNew"])){
                        
                    $table="tbl_category";

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
            <form class="form-label-left input_mask" method="post">
                <div class="form-group row">
                    <label class="col-form-label col-md-3 col-sm-3 ">Tên danh mục</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control" value="<?php echo $cat_name; ?>" name="cat_name" id="cat_name" placeholder="Tên danh mục">
                    </div>
                </div>
                <div class="form-group row">
                    <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Ảnh danh mục</label>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="file" id="image" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-md-3 col-sm-3  control-label">Trạng thái</label>

                    <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1" <?php echo($status)?"checked":"" ?> name="status" id="status"> Ẩn/Hiển thị
                            </label>
                        </div>
                    </div>
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