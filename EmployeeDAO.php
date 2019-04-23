<?php

include_once "DatabaseDAO.php";
class EmployeeDAO extends DatabaseDAO
{
    protected $tableNames = "fss_Employee em, fss_EmployeeRole er";

    public function getEmployee($id) {
        $result = $this->getData(["em.empid" => $id, "em.roleid" => "er.roleid"]);
        return $result;
    }

    public function getEmployees() {
        $result = $this->getData(["em.roleid" => "er.roleid"]);
        return $result;
    }
}