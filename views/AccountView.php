<?php


class AccountView
{
    private $model;
    public $name = "My Account";

    /**
     * AccountView constructor.
     * @param $model
     */
    public function __construct(UserDAO $model)
    {
        $this->model = $model;
    }

    public function output() {
        if(isset($_GET["uid"])) {
            $addressesData = $this->model->getAddresses($_GET["uid"]);

            $addresses = "";
            for($i = 0; $i < sizeof($addressesData); $i++) {
                $addresses .= "<p style='padding-bottom: 12px'> <h4>Address #". ($i + 1) ."</h4>
                                {$addressesData[$i]->addstreet},<br>
                                {$addressesData[$i]->addcity},<br>
                                {$addressesData[$i]->addpostcode} </p>";
            }
        }

        return "<h3>Your Addresses</h3><div>{$addresses}</div><br><br> <h3>Payment Methods</h3>";
    }
}