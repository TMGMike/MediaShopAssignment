<?php
$request = $_SERVER['REDIRECT_URL'];

switch($request) {
    case '/' || '':
        require __DIR__ . '/views/index.php';
        echo ob_get_clean();
        break;
    case '/about':
        require __DIR__ . '/views/about.php';
        echo ob_get_clean();
        break;
}