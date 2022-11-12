<?php
    ob_start();
    session_start();
    include("../connection.php");
    if(isset($_POST["id_product"]) && isset($_POST["num"])){
        $id = $_POST["id_product"];
        $num = $_POST["num"];
        $sqlDetailPro = "SELECT * FROM tbl_product WHERE pro_id= $id";
        $resultDetailPro = $conn->query($sqlDetailPro);
        $rowDetail = $resultDetailPro->fetch();


        if(!isset($_SESSION["cart"])){
            $cart = array(
                $id => array(
                    "name" => $rowDetail[1],
                    "price" => $rowDetail[2],
                    "image" => $rowDetail[6],
                    "quanlity" => $num
                )
            );            
        }else{
            $cart = $_SESSION["cart"];
            if(array_key_exists($id,$cart)){
                $cart[$id] = array(
                        "name" => $rowDetail[1],
                        "price" => $rowDetail[2],
                        "image" => $rowDetail[6],
                        "quanlity" =>$cart[$id]["quanlity"] + $num
                );
            }else{
                $cart[$id] = array(
                    "name" => $rowDetail[1],
                    "price" => $rowDetail[2],
                    "image" => $rowDetail[6],
                    "quanlity" =>$num
                );    
            }
        }

        $_SESSION["cart"] = $cart;
        
        

        $numberProduct = 0;
        foreach($_SESSION["cart"] as $key=>$value){
            $numberProduct +=$value[$key]["quanlity"];
        }

        echo $numberProduct;
    }
?>