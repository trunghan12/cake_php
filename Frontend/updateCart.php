<?php
    ob_start();
    session_start();
    include("../connection.php");
    if(isset($_POST["id_product"]) && isset($_POST["num"])){
        //echo $_POST["num"];
        $id = $_POST["id_product"];
        $num = $_POST["num"];
        if(isset($_SESSION["cart"])){
            $cart = $_SESSION["cart"];
            if(array_key_exists($id,$cart)){
                if($num > 0){
                    $cart[$id] = array(
                        "name" => $cart[$id]["name"],
                        "price" => $cart[$id]["price"],
                        "image" => $cart[$id]["image"],
                        "size" => $cart[$id]["size"],
                        "quantity" => $num
                    );
                }else{
                    unset($cart[$id]);
                }
            }
        }
        
        $_SESSION["cart"] = $cart;
        $numberProduct = 0;
        foreach($_SESSION["cart"] as $key=>$value){
           $numberProduct +=(int)$value["quantity"];
        }
        // unset($_SESSION["cart"]);
        echo $numberProduct;
        
    } 
    
    
?>