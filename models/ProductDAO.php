<?php

include_once 'DatabaseDAO.php';
class ProductDAO extends DatabaseDAO
{
    protected $tableNames = "fss_Film fi";

    public function getFilm($id) {
        $result = $this->getData(["fi.filmid" => $id]);
        return $result;
    }

    /**
     * Gets multiple films at once, by their IDs. This is useful for retrieving the contents of the cart.
     * Instead of querying each film individually, or unnecessarily querying _all_ films for a small cart.
     * @param array $ids The array of IDs to query.
     * @return array Array of results from the database.
     */
    public function getMultipleById(array $ids) {
        $stringList = "(".implode(', ', $ids).")";

        $results = $this->getMultiple("fi.filmid", $stringList);
        return $results;
    }

    public function getAllFilms() {
        $results = $this->getAllData();
        return $results;
    }

    public function getFilmByTitle($title) {
        $results = $this->getData(["fi.filmtitle" => $title]);
    }

    public function getFilmByRatingId($ratingId) {
        $results = $this->getData(["fi.ratid" => $ratingId]);
        return $results;
    }

    public function getFilmByRating($rating = "PG") {
        $this->tableNames .= ", fss_Rating ra";
        $results = $this->getData(["fi.ratid" => "ra.ratid", "ra.filmrating" => "'$rating'"]);
        $this->tableNames = "fss_Film fi";
        return $results;
    }

    public function getRatings() {
        $this->tableNames = "fss_Rating ra";
        $results = $this->getAllData();

        $this->tableNames = "fss_Film fi";
        return $results;
    }
}