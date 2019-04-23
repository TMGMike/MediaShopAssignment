<?php

require_once 'DatabaseDAO.php';
class ShopDAO extends DatabaseDAO
{
    protected $tableNames = "fss_Shop sh, fss_Address ad";

    /**
     * Get the a specific shop's data from the database.
     * @param $id The shop ID to find in the database.
     * @return array The row(s) from the specified shop.
     */
    public function getShop($id) {
        $result = $this->getData(["sh.shopid" => $id, "sh.addid" => "ad.addid"]);
        return $result;
    }

    /**
     * Get the rows from all of the shops from the database.
     * @return array The array of rows returned from the database.
     */
    public function getAllShops() {
        $result = $this->getAllData();
        return $result;
    }
}