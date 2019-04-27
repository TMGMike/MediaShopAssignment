<?php


class CartView
{
    private $model;
    public $name = "Cart";
    public $cart;
    /**
     * CartView constructor.
     * @param $model
     */
    public function __construct(ProductDAO $model)
    {
        $this->model = $model;
    }

    public function output() {
        // If the cart is a valid array, use the data. Otherwise, output/return nothing.

        if (is_array($this->cart)) {
            $cartItems = $this->model->getMultipleById($this->cart);
        } else return null;


        if(sizeof($this->cart) > 0) {
            $filmString = "<h3>Your Cart: </h3> <br>
                <form method='post'><input type='hidden' name='clear' value='1'><input type='submit' value='Clear Cart'></form>";

            for($i = 0; $i < sizeof($cartItems); $i++) {
                $filmString .= "<div id='film-{$cartItems[$i]->filmid}' style='padding-bottom: 13px'> <h4>{$cartItems[$i]->filmtitle} [£6.99]</h4> 
                    <p>{$cartItems[$i]->filmdescription}</p><br> </div>";
            }
            $total = number_format((float) (sizeof($this->cart) * 6.99), 2, '.', '');
            $filmString .= "<strong>Grand Total:</strong> £$total<br>
                        <form method='post'><input type='hidden' name='clear' value='1'><input type='submit' value='Proceed To Checkout'></form>";
        }
        else {
            $filmString = "<h3>Your cart is currently empty. </h3> <br>";
        }

        return $filmString;
    }
}