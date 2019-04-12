<?php

// TODO: Function to return a menu bar, with links to each view. Dynamically update with new files.

function getAppName() {
    // Change the app's name dynamically for all pages.
    //TODO: Get this value from the database instead of hardcoded - fss_Shop.shopname (id 1 for online store).
    return "Media Store";
}

function getIconPath() {
    // Return the icon from my Content-Delivery Network (CDN)
    return 'https://cdn.themadgamers.co.uk/subathon.ico';
}

/**
 * Set the hyperlinks for the menu to navigate across pages.
 * Each page should call this method in the body to render these page links.
 * Add a new link by setting the key as the text to display, and the value as the page to navigate to.
 *
 * This saves copy/pasting many <a> tags in every new document.
 */
function renderMenuLinks() {
    $links = [
        "Home" => "index.php",
        "Login" => "login.php",
        "Orders" => "orders.php",
        "Account" => "account.php"
    ];
    $hyperlinks = "";

    while ($link = current($links)) {
        $key = key($links);
        $hyperlinks .= "<a style='padding-right: 13px;' href='$link'>$key</a>";
        next($links);
    }
    echo "<div style='width: 100%; left: 50%;'>$hyperlinks</div>";
}