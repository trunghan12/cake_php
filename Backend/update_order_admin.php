<?php
  ob_start();
  session_start();
  if(!$_SESSION["login"]){
    header("location: login.php");
  }
  date_default_timezone_set('Asia/Ho_Chi_Minh');
  $conn = include("../connection.php");
  include("../common.php");

  if(isset($_GET['order_id'])){
    $order_id = $_GET['order_id'];
    $query_update_order = "UPDATE tbl_order set `status`='2' where o_id='$order_id'";
    $conn->query($query_update_order);
    echo $order_id;
  }
?>