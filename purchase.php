<?php
require('config/config.php');
session_start();

if($_SERVER['REQUEST_METHOD']=="POST"){
    if(isset($_POST['purchase'])){
        $fullname = $_SESSION['login']['user'];
        $tel = $_POST['tel'];
        $address = $_POST['address'];
        $paymode = $_POST['paymode'];
        if($query = mysqli_query($conn,"INSERT INTO order_manage VALUES ('','$fullname','$tel','$address','$paymode')")){
            $query2 = mysqli_query($conn,"SELECT * FROM order_manage ORDER BY order_id DESC");
            $row = mysqli_fetch_assoc($query2);
            foreach($_SESSION['cart'] as $key => $value){
                $query3 = mysqli_query($conn,"INSERT INTO user_order VALUES('$row[order_id]','$value[name]','$value[price]','$value[quantity]')");
            }
            unset($_SESSION['cart']);
            echo "<script>alert('Order Placed');
            window.location.href = 'index.php';</script>";
        }
        else{
            die("QUERY FAILED");
        }
    }
}
?>