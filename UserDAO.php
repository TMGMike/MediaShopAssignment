<?php

include_once 'DatabaseDAO.php';
class UserDAO extends DatabaseDAO
{
    protected $tableNames = "fss_Person pe, fss_Customer cu";

    public function getUser($id) {
        $result = $this->getData(["pe.personid" => $id]);
    }

    public function getAllUsers($limit = 1000) {
        $result = $this->getAllData($limit);
        return $result;
    }

    public function createUser($name, $phone, $email) {

    }
}