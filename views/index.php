<?php
require './layout.php';
?>
<html lang="en">
<head>
    <title>Home - <?php echo getAppName()?></title>
    <link rel="icon" href="<?php echo getIconPath() ?>" type="image/x-icon">
</head>
<body>
<?php renderMenuLinks();?>
<h1>Hello, World!</h1>
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

    </table>
</div>
</body>
</html>
