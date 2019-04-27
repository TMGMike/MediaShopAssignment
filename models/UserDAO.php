<?php

include_once 'DatabaseDAO.php';
class UserDAO extends DatabaseDAO
{
    protected $tableNames = "fss_Person pe, fss_Customer cu";

    public function getUser($id) {
        $result = $this->getData(["pe.personid" => $id]);
        return $result;
    }

    public function getAllUsers($limit = 1000) {
        $result = $this->getAllData($limit);
        return $result;
    }

    public function getUserFromEmail($email) {
        $result = $this->getData(["pe.personemail" => $email, "pe.custid" => "cu.personid"]);
        return $result;
    }

    public function createUser($name, $phone, $email, $pass) {
        $this->tableNames = "fss_Person";
        $id = $this->insertData(["personname" => $name, "personphone" => $phone, "personemail" => $email]);

        if ($id != null) {
            $this->tableNames = "fss_Customer";
            $this->insertData(["custid" => $id, "custregdate" => "curdate()", "custpassword" => $pass]);
        }
        $this->tableNames = "fss_Person pe, fss_Customer cu";
        return $id;
    }

    public function getAddresses ($user_id) {
        $this->tableNames = "fss_Address ad, fss_CustomerAddress ca";

        $addresses = $this->getData(["ca.custid" => $user_id, "ad.addid" => "ca.addid"]);
        $this->tableNames = "fss_Person pe, fss_Customer cu";

        return $addresses;
    }
}