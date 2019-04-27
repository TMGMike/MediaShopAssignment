<?php
require __DIR__.'/views/layout.php';
session_start();
// If the ?p querystring is not present, the page should be the index. Otherwise, set $page to the value of ?p

$page = (isset($_GET["p"])) ? $_GET["p"] : "index";

$cart = (isset($_SESSION['cart'])) ? $_SESSION['cart'] : array();

echo "[".implode(', ', $cart)."]";


if(isset($_POST["cart_fid"])) {
    if(in_array($_POST["cart_fid"], $cart)) {
        header("Location:?p=products&added=false");
        exit();
    }
    else {
        $cart[] = $_POST["cart_fid"];
        $_SESSION['cart'] = $cart;
        header("Location:?p=products&added=true");
        exit();
    }
}

// Has the user clicked the Clear Cart button? If so clear the array and session variable, and reload.
if(isset($_POST["clear"]) && $_POST["clear"] == 1) {
    $cart = array();
    $_SESSION['cart'] = $cart;
    header("Location:?p=cart");
    exit();
}

switch ($page) {
    case 'index':
        require_once __DIR__.'/models/ShopDAO.php';
        include_once __DIR__.'/views/IndexView.php';
        $model = new ShopDAO();
        $view = new IndexView($model);
        break;
    case 'products':
        require_once __DIR__.'/models/ProductDAO.php';
        include_once __DIR__.'/views/ProductsView.php';
        require_once __DIR__.'/controllers/ProductsController.php';

        $model = new ProductDAO();
        $view = new ProductsView($model);
        $controller = new ProductsController($model);
        break;
    case 'login':
        require_once __DIR__.'/models/UserDAO.php';
        //include_once __DIR__.'/views/LoginView.php';
        $model = new UserDAO();
        // $view = new LoginView($model);
        break;
    case 'cart':
        require_once __DIR__.'/models/ProductDAO.php';
        include_once __DIR__.'/views/CartView.php';
        $model = new ProductDAO();
        $view = new CartView($model);
        $view->cart = $cart;
        break;
    case 'account':
        require_once __DIR__.'/models/UserDAO.php';
        include_once __DIR__.'/views/AccountView.php';
        $model = new UserDAO();
        $view = new AccountView($model);
        break;
    default:
        include_once __DIR__.'/views/ErrorView.php';
        $view = new ErrorView(404);
        break;
}

?>
<html lang="en">
<head>
    <title><?php echo $view->name.' - '.getAppName()?></title>
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
<?php renderMenuLinks($cart);?>
<div style="width: 60%; align-content: center; left: 25%; position: relative;">
    <?php echo $cartError; echo $view->output()?>
</div>
</body>
</html>
