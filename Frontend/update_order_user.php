<?php   
    ob_start();
    session_start();
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    include("../connection.php");
    
    if(isset($_GET['order_id'])){
        $order_id = $_GET['order_id'];
        $query_update_order_user = "UPDATE tbl_order set `status`= '3' where o_id='$order_id'";
        $conn->query($query_update_order_user);
        echo $order_id;
    }
?>