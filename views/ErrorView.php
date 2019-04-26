<?php

class ErrorView
{
    private $errorCode;
    public $name = "Oh Snap!";
    /**
     * ErrorView constructor.
     * @param $errorCode
     */
    public function __construct($errorCode = 404)
    {
        $this->errorCode = $errorCode;
    }

    public function output() {
        if ($this->errorCode == 404) {
            return '<h3>Oops! This page doesn\'t exist!</h3><br><p>You can go home <a href="index.php">here</a></p>';
        }
        return '<h3>Oops! An error occurred ['. $this->errorCode . ']</h3><br><p>Please try again later.</p>';
    }
}