<?php
    ob_start();
    session_start();
    include("../connection.php");
    
    if(isset($_POST["buy_cart"])){
        $id = $_POST["id_product"];
        $num = 1;
        $size = "nhỏ";
        $sqlDetailPro = "SELECT * FROM tbl_product WHERE pro_id= $id";
        $resultDetailPro = $conn->query($sqlDetailPro);
        $rowDetail = $resultDetailPro->fetch();
        if(!isset($_SESSION["cart"])){
            $cart = array(
                $id => array(
                    "name" => $rowDetail[1],
                    "price" => $rowDetail[2],
                    "image" => $rowDetail[6],
                    "size" => $size,
                    "quantity" => $num
                )
            );            
        }else{
            $cart = $_SESSION["cart"];
            if(array_key_exists($id,$cart)){
                $cart[$id] = array(
                        "name" => $rowDetail[1],
                        "price" => $rowDetail[2],
                        "image" => $rowDetail[6],
                        "size" => $size,
                        "quantity" =>$cart[$id]["quantity"] + $num
                );
            }else{
                $cart[$id] = array(
                    "name" => $rowDetail[1],
                    "price" => $rowDetail[2],
                    "image" => $rowDetail[6],
                    "size" => $size,
                    "quantity" =>$num
                );    
            }
        }

        $_SESSION["cart"] = $cart;
        header("location: index.php?page=cart");
    }

?>