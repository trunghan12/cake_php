<?php   
    ob_start();
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include("../connection.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>CakeZone - Cake Shop Website Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Oswald:wght@500;600;700&family=Pacifico&display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
    

</head>

<body>
    <?php
        include("header.php");
    ?>

    <?php
        if(isset($_GET["page"])){
            $page = $_GET["page"];
            $file = $page. ".php";
            include($file);
        }else{
            include("home.php");
        }
    ?>

    <?php
         include("footer.php");
    ?>

    <!-- Back to Top -->
    <!-- <a href="#" class="btn btn-primary border-inner py-3 fs-4 back-to-top"><i class="bi bi-arrow-up"></i></a>
    
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-lablledby="myModalLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title" id=myModalLabel>Mua hàng</h4>
                </div>
                <div class="modal-body">
                    <h3>Sản phẩm đã được thêm vào giỏ hàng</h3>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>
    </div> -->
    

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <script>


        function plus(){
            num = parseInt($("#quantity").val());// lấy giá trị của ô input
            tem = num+1;// cộng thêm 1 đơn vị
            $("#quantity").val(tem);//gán lại giá trị
        }

        function minus(){
            num = parseInt($("#quantity").val());// lấy giá trị của ô input
            if(num >1){
                tem = num-1;// cộng giảm 1 đơn vị
            }
            $("#quantity").val(tem);//gán lại giá trị
        }


        $(document).ready(function(){
            
            $('.btn_add_cart').click(function(){
                const num = parseInt($("#quantity").val());
                const id_product = $(this).attr('id');
                const size = $('#size').select().val();
                // alert(size);
                $('#size').change(function(){
                    size =  $(this).find(':selected').val();
                });
                $.post({
                    url:"addcart.php",
                    data:{num:num,id_product:id_product,size:size},
                    success:function(data){
                        $("#numCart").text(data);
                        $('#alert_success').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                        <strong>Thêm sản phẩm thành công</strong>
                        <button type="button" class="close float-right" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>`);
                    }

                });
            });

            $('#btn-show').click(function(){
                $(".cart-show").toggle(500);
            });
            
            
        });
        
        function updateCart(id){
            //alert(id);
            //alert($("#quantity_"+id ).val());
            var num = parseInt($("#quantity_"+id).val());
            $('#alert_blur_shopping').html(`<div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Cập nhật giỏ hàng thành công</strong>
                <button type="button" class="close float-right" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>`);
            updateDelete(id,num);
        
           
        }

        function deleteCart(id){
            alert('xóa thành công');
            updateDelete(id,0);
        }

        function updateDelete(id,num){
            var id_product = id;
            $.post({
                url: 'updateCart.php',
                data: {num:num,id_product:id_product},
                success: function(data){               
                    $("#numCart").text(data);
                    
                    //location.reload();

                }
            });
        }
        $(document).ready(function(){
            $(".btn_confirm_order_user").click(function(){
                
                const order_id = $(this).attr('id');
                $.get({
                url:"update_order_user.php",
                data:{order_id:order_id},
                success: function(data){
                    $('.btn_confirm_order_user'+ data).removeClass('btn btn-sm btn-primary btn_confirm_order_user');
                    $('.btn_confirm_order_user'+ data).html('Đã nhận hàng');
                }
            });
            });
        });

       
    </script>

</body>

</html>