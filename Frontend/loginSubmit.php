<?php
    ob_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
    include("../connection.php");

    // if(isset($_SESSION["user_login"])){
    //     header("location: index.php");
    // }
 
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password = md5($password);
        $sqlSelect = "SELECT * FROM tbl_user WHERE email='$email' AND password = '$password'";
       
        $resultUser = $conn->query($sqlSelect);
        if($resultUser->rowCount() > 0){
            $rowUser = $resultUser->fetch();
            $_SESSION['user_login']['user_id'] = $rowUser['user_id'];
            $_SESSION['user_login']['user_name'] = $rowUser['user_name'];
           
            header("location: index.php");
        }else{
            header("location: index.php?page=login");
        }

    

?>