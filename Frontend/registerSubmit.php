<?php
    include("../connection.php");
    if(isset($_POST["addNew"])){
        $userName = $_POST['user_name'];
        $email = $_POST["email"];
        $gender = $_POST["gender"];
        $conscious = $_POST['conscious'];
        $commune = $_POST['commune'];
        $passWord = $_POST["password"];
        $fullName = $_POST['full_name'];
        $phone = $_POST["phone"];
        $country = $_POST['country'];
        $district = $_POST['district'];
        $address = $_POST["address"];
        $rePassWord = $_POST["re_password"];
        $date_create = date('Y-m-d H:i:s');
        if( $passWord != $rePassWord){
            header("location: index.php?page=register.php");
        }
        
        $sqlSelect = "SELECT * FROM tbl_user WHERE user_name='$userName' ";
        $resultUser = $conn->query($sqlSelect);
        $passWord = md5($passWord);

        if($resultUser->rowCount() > 0){
            header("location: register.php");
        }

        $sqlSelect_User = "INSERT INTO tbl_user (user_name,full_name,email,country,conscious,district,commune,address,phone,password,date_create) value ('$userName','$fullName','$email','$country','$conscious','$district','$commune',' $address','$phone','$passWord','$date_create')";
        $resultUser_User = $conn->query($sqlSelect_User);
       
        header("location: index.php?page=login");

    }else{
        header("location: index.php?page=register.php");
    }
?>
