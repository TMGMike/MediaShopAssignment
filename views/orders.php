<?php
require './layout.php';
?>

<html lang="en">
<head>
    <title><?php echo "Orders - ".getAppName()?></title>
</head>
<body>
<?php renderMenuLinks();?>
<h3>View your previous order history here.</h3>
<!-- Populate this table with the customer's orders. If the order only contained 1 product, show the product here.
     If the order consisted of multiple products, show a hyperlink to view all of the products. -->
<table>
    <tr>
        <th>Order ID</th>
        <th>Product(s)</th>
        <th>Total Amount</th>
        <th>Order Date</th>
        <th>Store</th>

    </tr>
</table>
</body>
</html>
