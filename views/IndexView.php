<?php

class IndexView {
    private $model;
    public $name = "Home";
    /**
     * IndexView constructor.
     * @param $model
     */
    public function __construct(ShopDAO $model)
    {
        $this->model = $model;
    }

    private function getTableData() {
        $shops = $this->model->getAllShops();

        $tableData = "";
        for ($i = 0; $i < sizeof($shops); $i++){
            $tableData .= '<tr>
              <td>'.$shops[$i]->shopid.'</td>
              <td>'.$shops[$i]->shopname.'</td>
              <td>'.$shops[$i]->addstreet.'</td>
              <td>'.$shops[$i]->addcity.'</td>
              <td>'.$shops[$i]->addpostcode.'</td>
              <td><a href="tel:'.$shops[$i]->shopphone.'">' .$shops[$i]->shopphone. '</a></td>
              </tr>';
        }

        return $tableData;
    }

    public function output() {
        return '<div id="store-list" class="store-list">
    <h4>Here is a list of our current stores. Drop by when you\'re nearby, we\'d love to see you! (<i>Don\'t forget members
            with an account get bonuses in-store!</i>)</h4>
    <table>
        <tr>
            <th>ID</th>
            <th>Store Name</th>
            <th>Street</th>
            <th>City</th>
            <th>Post Code</th>
            <th>Phone Number</th>
        </tr>'.$this->getTableData().'</table></div>';
    }
}
