<?php
$conn = include("../connection.php");
?>

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
            //them moi
            if(isset($_POST['addNew'])){
                $cat_name = $_POST['cat_name'];
                $status = isset($_POST['status'])?1:0;
                $date_create = Date("Y-m-d H:i:s");
                $date_update = Date("Y-m-d H:i:s");
                $image = "";
                //xu li anh
                //xu li image
                $path="uploads";
                $fileName="";
                $image = "";
                if(isset($_FILES["image"])){

                     $path = 'uploads';
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

                }
                $query_insert_cat = "INSERT INTO tbl_category values('','$cat_name','$image','$status','$date_create','$date_update')";
                mysqli_query($conn,$query_insert_cat);
                header('location: index.php?page=category');
            }
            ?>
            <form class="form-label-left input_mask" method="post" enctype='multipart/form-data'>
                <div class="form-group row">
                    <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Tên danh mục</label>
                    <div class="col-md-9 col-sm-9 ">
                        <input type="text" class="form-control" value="" name="cat_name" id="cat_name" placeholder="Tên danh mục">
                    </div>
                </div>
                <div class="form-group row">
                    <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Ảnh danh mục</label>
                    <div class="col-md-6 col-sm-6  form-group has-feedback">
                        <input type="file" id="image" name="image">
                    </div>
                </div>
                <div class="form-group row">
                    <label style="font-size: 16px;" class="col-form-label col-md-3 col-sm-3 ">Trạng thái</label>
                    <div class="col-md-9 col-sm-9 ">
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" value="1"  name="status" id="status"> Ẩn/Hiển thị
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
        <a href="index.php?page=addcategogy" class="btn btn-primary text-white mt-3 mb-3">Thêm mới <i class="fa fa-plus"></i></a>
        <div class="x_content">
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Tên danh mục</th>
                    <th>Hình ảnh</th>
                    <th>Trạng thái</th>
                    <th>Ngày tạo</th>
                    <th>Ngày cập nhật</th>
                    <th>Chỉnh sửa</th>
                </tr>
                </thead>
                <tbody>
                <?php
                // Câu lệnh select lấy dữ liệu
                $sqlSelect = "SELECT * FROM tbl_category";
                // thực thi truy vấn
                $result = mysqli_query($conn, $sqlSelect) or die("Lỗi truy vấn lấy dữ liệu");
                if (mysqli_num_rows($result) > 0) {
                    $i = 0;
                    while($row = mysqli_fetch_assoc($result)) {
                        $i++;
                        ?>
                        <tr>
                            <th scope="row"><?php echo $i; ?></th>
                            <td><?php echo $row["cat_name"]; ?></td>
                            <td>
                                <img height="100" class="custom_img" src="../uploads/<?php echo $row['image'] ?>" alt="">
                            </td>
                            <td><?php echo ($row["status"]) ? "Hiển thị":"Ẩn"; ?></td>
                            <td><?php echo date("d-m-Y H:i:s",strtotime($row["date_create"])); ?></td>
                            <td><?php echo date("d-m-Y H:i:s",strtotime($row["date_update"])); ?></td>
                            <td>
                                <a href="index.php?page=category&id=<?php echo $row["cat_id"]; ?>&edit=1">
                                    <i class="fa fa-pencil-square-o"> Sửa</i>
                                </a>
                                <a href="index.php?page=category&id=<?php echo $row["cat_id"]; ?>&del=1" onclick="return confirm('Bạn có chắc chắn bạn muốn xóa bản ghi này không?');">
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