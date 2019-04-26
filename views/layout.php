<?php

/**
 * Get the name of the application.
 * @return string The name of the app.
 */
function getAppName() {
    //TODO: Get this value from the database instead of hardcoded - fss_Shop.shopname (id 1 for online store).
    return "Media Store";
}

/**
 * Returns the icon to display in the tab itself.
 * @return string The URL or file path for the icon to display.
 */
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
 * @param array $cart
 */
function renderMenuLinks(array $cart) {
    $links = [
        "Home"     =>  "?p=index",
        "Login"    =>  "?p=login",
        "Orders"   =>  "?p=orders",
        "Account"  =>  "?p=account",
        "Products" =>  "?p=products",
        "About"    =>  "?p=about",
        "Cart: ".sizeof($cart)   =>  "?p=cart"
    ];
    $linkString = "";

    // Loop through the menu links and create the <a> tags for each.
    while ($link = current($links)) {
        $key = key($links);
        $linkString .= "<a style='padding-right: 13px;' href='$link'>$key</a>";
        next($links);

    }
    // Display the div tag after the links have been added.

    echo "<div style='width: 100%; left: 50%;'>$linkString</div>";
}