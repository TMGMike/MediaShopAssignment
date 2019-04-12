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
