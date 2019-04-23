<?php


class Shop
{
    private $id;
    private $name;
    private $phone_number;
    private $street;
    private $city;
    private $post_code;

    public function __construct()
    {
        $this->id = 1;
        $this->name = "";
        $this->phone_number = "";
        $this->street = "";
        $this->city = "";
        $this->post_code = "";
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }



    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getPhoneNumber()
    {
        return $this->phone_number;
    }

    /**
     * @param string $phone_number
     */
    public function setPhoneNumber($phone_number)
    {
        $this->phone_number = $phone_number;
    }

    /**
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet($street)
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity($city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function getPostCode()
    {
        return $this->post_code;
    }

    /**
     * @param string $post_code
     */
    public function setPostCode($post_code)
    {
        $this->post_code = $post_code;
    }

    /**
     * Override the toString method for the shop object.
     * @return string The formatted string to return with the object's data.
     */
    public function __toString()
    {
        return "[#$this->id] $this->name - $this->street, $this->city, $this->post_code, $this->phone_number";
    }
}