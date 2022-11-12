<?php
    
    ob_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    session_start();
    include("../connection.php");
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require('../vendor/autoload.php');
    require '../vendor/phpmailer/phpmailer/src/Exception.php';
    require '../vendor/phpmailer/phpmailer/src/PHPMailer.php';
    require '../vendor/phpmailer/phpmailer/src/SMTP.php';
    require '../vendor/phpmailer/phpmailer/src/OAuth.php';
    require '../vendor/phpmailer/phpmailer/src/POP3.php';
    
   
      

        $user_id = $_SESSION['user_login']['user_id'];
        $full_name = $_POST["full_name"];
        $country = $_POST["country"];
        $conscious = $_POST["conscious"];
        $district = $_POST["district"];
        $commune = $_POST["commune"];
        $gender = $_POST["gender"];
        $email = $_POST["email"];
        $address = $_POST["address"];
        $phone = $_POST["phone"];
        $o_note = $_POST["o_note"];
        $status = 1;
        $date_create = date("Y-m-d H:i:s");

        $sqlInsertOrder = "INSERT into tbl_order (user_id,full_name,country,conscious,district,commune,gender,email,address,phone,o_note,`status`,date_create)";
        $sqlInsertOrder .= " VALUES('$user_id','$full_name','$country','$conscious','$district','$commune','$gender','$email','$address','$phone','$o_note','$status','$date_create')";
       
       
        $conn->query($sqlInsertOrder);
        $last_id = $conn->lastInsertId();
        $total = 0;
        if(isset($_SESSION["cart"])){
            foreach($_SESSION["cart"] as $key=>$value){
                $total += (int)$value['price']*(int)$value['quantity'];
                $pro_name = $value['name'];
                $pro_image = $value['image'];
                $pro_price = $value['price'];
                $pro_quantity = $value['quantity'];
                $sqlInsertOrderDetail = "INSERT into tbl_order_detail (o_id,pro_id,pro_name,pro_image,pro_price,pro_quantity,`status`,date_create)";
                $sqlInsertOrderDetail .= "VALUES('$last_id','$key','$pro_name','$pro_image','$pro_price','$pro_quantity','1','$date_create')";
                $conn->query($sqlInsertOrderDetail);
            }
        }

        
        if($_POST['payment_method']=="ATM_vnpay"){
           
            $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
            $vnp_Returnurl = "http://localhost/php_cake_demo/Frontend/index.php?page=addcheckOut";
            $vnp_TmnCode = "URHY337Q";//Mã website tại VNPAY 
            $vnp_HashSecret = "ZWJHOFQYTBYRPFLFZXIPCGSYPKINECAE"; //Chuỗi bí mật
    
            $vnp_TxnRef = rand(00,9999); //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này sang VNPAY
            $vnp_OrderInfo = 'Thanh toan demo';
            $vnp_OrderType = 'billpayment';
            $vnp_Amount = 20000 * 100;
            $vnp_Locale = 'vn';
            $vnp_BankCode = 'NCB';
            $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
            
            $inputData = array(
                "vnp_Version" => "2.1.0",
                "vnp_TmnCode" => $vnp_TmnCode,
                "vnp_Amount" => $vnp_Amount,
                "vnp_Command" => "pay",
                "vnp_CreateDate" => date('YmdHis'),
                "vnp_CurrCode" => "VND",
                "vnp_IpAddr" => $vnp_IpAddr,
                "vnp_Locale" => $vnp_Locale,
                "vnp_OrderInfo" => $vnp_OrderInfo,
                "vnp_OrderType" => $vnp_OrderType,
                "vnp_ReturnUrl" => $vnp_Returnurl,
                "vnp_TxnRef" => $vnp_TxnRef,
                
            );
    
            if (isset($vnp_BankCode) && $vnp_BankCode != "") {
                $inputData['vnp_BankCode'] = $vnp_BankCode;
            }
            if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
                $inputData['vnp_Bill_State'] = $vnp_Bill_State;
            }
    
            //var_dump($inputData);
            ksort($inputData);
            $query = "";
            $i = 0;
            $hashdata = "";
            foreach ($inputData as $key => $value) {
                if ($i == 1) {
                    $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
                } else {
                    $hashdata .= urlencode($key) . "=" . urlencode($value);
                    $i = 1;
                }
                $query .= urlencode($key) . "=" . urlencode($value) . '&';
            }
    
            $vnp_Url = $vnp_Url . "?" . $query;
            if (isset($vnp_HashSecret)) {
                $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
                $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
            }
            $returnData = array('code' => '00'
                , 'message' => 'success'
                , 'data' => $vnp_Url);
                if (isset($_POST['redirect'])) {
                    header('Location: ' . $vnp_Url);
                    die();
                } else {
                    echo json_encode($returnData);
                }
                // vui lòng tham khảo thêm tại code demo
        }
        


        $mail = new PHPMailer(true);
        $mail->CharSet = 'UTF-8'; 
        try {
            //Server settings
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = $email;                     //SMTP username
            $mail->Password   = 'jqbwnmwkhfndmoxt';                               //SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
            $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
        
            //Recipients
            $mail->setFrom('phammy773734@gmail.com', 'Mailer');
            $mail->addAddress('myb1910105@student.ctu.edu.vn', 'Joe User');     //Add a recipient
            
            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Thông báo đặt hàng thành công';
            $mail->Body    = '<h1>Chúc mừng bạn đặt hàng thành công<h1>';
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
        
            $mail->send();
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }

        unset($_SESSION['cart']);
        header('location: index.php');

?>