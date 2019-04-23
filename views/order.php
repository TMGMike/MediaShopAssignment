<?php
require './layout.php';

$orderid = $_POST['order_id'];
if(!isset($orderid)) {
    header('location: orders.php');
    exit();
}
else {
    echo "Order ID: ".$orderid;
}

?>
<html lang="en">
<head>
    <title>Order - <?php echo getAppName()?></title>
    <link rel="icon" href="<?php echo getIconPath() ?>" type="image/x-icon">
</head>
<body>

</body>
</html>
