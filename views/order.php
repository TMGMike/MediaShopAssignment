<?php
$orderid = $_POST['order_id'];
if(!isset($orderid)) {
    header('location: orders.php');
    exit();
}
else {
    echo "Order ID: ".$orderid;
}