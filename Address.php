<?php


class Address
{
    private $address_id;
    private $street;
    private $city;
    private $post_code;

    /**
     * Address constructor.
     * @param $id
     */
    public function __construct($id)
    {
        $this->address_id = $id;
    }

    /**
     * @return mixed
     */
    public function getAddressId()
    {
        return $this->address_id;
    }

    /**
     * @return mixed
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param mixed $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return mixed
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param mixed $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return mixed
     */
    public function getPostCode()
    {
        return $this->post_code;
    }

    /**
     * @param mixed $post_code
     */
    public function setPostCode($post_code)
    {
        $this->post_code = $post_code;
    }

}