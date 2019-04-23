<?php
require './layout.php';
require __DIR__.'/../models/ShopModel.php';
$shopModel = new ShopModel();

?>
<html lang="en">
<head>
    <title>Home - <?php echo getAppName()?></title>
    <link rel="icon" href="<?php echo getIconPath() ?>" type="image/x-icon">
    <style>
        th {
            padding-right: 17px;
        }

        td {
            padding-right: 12px;
        }
    </style>
</head>
<body>
<?php renderMenuLinks();?>
<h1><?php echo $shopModel->getOnlineStore()->getName(); ?></h1>
<div id="store-list" class="store-list">
    <h4>Here is a list of our current stores. Drop by when you're nearby, we'd love to see you! (<i>Don't forget members
            with an account get bonuses in-store!</i>)</h4>
    <!-- TODO: Populate the table with details of the stores from the Database.
    I.e.

        SELECT shopname,shopphone, ad.addstreet, ad.addcity
         FROM fss_Shop sh, fss_Address ad
         WHERE ad.addid = sh.addid
    -->

    <table>
        <tr>
            <th>ID</th>
            <th>Store Name</th>
            <th>Street</th>
            <th>City</th>
            <th>Post Code</th>
            <th>Phone Number</th>
        </tr>
        <?php
        foreach ($shopModel->getShops() as $shop) {
            echo "<tr>";
            echo "<td>".$shop->getId()."</td>";
            echo "<td>".$shop->getName()."</td>";
            echo "<td>".$shop->getStreet()."</td>";
            echo "<td>".$shop->getCity()."</td>";
            echo "<td>".$shop->getPostCode()."</td>";
            echo "<td><a href='tel:".$shop->getPhoneNumber(). "'>". $shop->getPhoneNumber() ."</a></td>";
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
