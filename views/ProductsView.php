<?php
class ProductsView {
    private $model;
    public $name = "Products";
    /**
     * ProductsView constructor.
     * @param $model
     */
    public function __construct(ProductDAO $model)
    {
        $this->model = $model;
    }

    public function outputFilterForm () {
        $ratings = $this->model->getRatings();
        $options = "";
        for($i = 0; $i < sizeof($ratings); $i++) {
            $options .= "<option id=\'{$ratings[$i]->ratid}\'>{$ratings[$i]->filmrating}</option>";
        }
        return '<form method="get" action="?p=products">
                <input type="hidden" name="p" value="products">
                <select name="rating">
                    <option>all</option>
                    '. $options . ' 
                </select>
                <button type="submit">Filter</button>
                </form>';
    }

    public function output() {
        $filmString = '<h3>Our Collection</h3><br>'.$this->outputFilterForm();
        if(isset($_GET["added"]) && $_GET["added"] == "true") {
            $filmString .= "<p style='color: forestgreen'>&checkmark; Updated Cart</p>";
        }
        if(isset($_GET['rating']) && $_GET['rating'] != "" && $_GET['rating'] != "all") {
            $films = $this->model->getFilmByRating($_GET['rating']);
        }
        else {
            $films = $this->model->getAllFilms();
        }

        $filmString .= '<p>Total: '. sizeof($films)."</p> <br>";

        for($i = 0; $i < sizeof($films); $i++) {
            $filmString .= "<div id='film-{$films[$i]->filmid}' style='padding-bottom: 13px'> <h4>{$films[$i]->filmtitle} [£6.99]</h4> 
                    <p>{$films[$i]->filmdescription}</p><br> 
                    <form method='post'> 
                    <input type='hidden' name='cart_fid' value='".$films[$i]->filmid."'>
                    <input type='submit' value='Add To Cart'></form> </div>";
        }
        return $filmString;
    }
}