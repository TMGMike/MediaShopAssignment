<?php


class ProductsController
{
    private $model;

    /**
     * ProductsController constructor.
     * @param $model
     */
    public function __construct(ProductDAO $model)
    {
        $this->model = $model;
    }


}