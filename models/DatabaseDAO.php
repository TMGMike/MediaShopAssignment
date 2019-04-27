<?php

include __DIR__.'/../config/conf.php';

abstract class DatabaseDAO
{
    private $database;

    /**
     * DatabaseDAO constructor.
     * @param $database
     */
    public function __construct()
    {
        $this->connect();
    }

    /**
     * Initialise the database object and connect with mysqli.
     */
    function connect()
    {
        $this->database = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
    }

    //TODO: Use JSON objects for fields, e.g. each key is the field, and the corresponding value is the value in the query.
    // E.g. SELECT * FROM test WHERE name = 'test' AND id = 1
    // Would be:
    // $fields = [
    //      "name" => "test",
    //      "id"   => 1
    //   ]
    function getData($fields) {
        $query = "SELECT * FROM {$this->tableNames}";

        // Loop through each condition for the SQL statement.
        while ($field = current($fields)) {
            $key = key($fields);

            // Use WHERE instead of AND for the first element.
            if(array_search($field, array_values($fields)) == 0) {
                $query .= " WHERE {$key} = {$field}";
            }
            else {
                $query .= " AND {$key} = {$field}";
            }
            next($fields); // Move onto the next condition.
        }
        $result = $this->database->query($query);

        if ($result) {
            while($row = $result->fetch_object()) {
                $rows[] = $row;
            }
        }
        // echo $query;
        return $rows;
    }

    /**
     * Gets multiple rows from the database, using an array of values.
     * Example: **WHERE id IN [1, 4, 32, 125];** returns items matching any of those IDs.
     * @param string $column The column to check the attributes from, e.g. by ID.
     * @param string $data A string of data, in parentheses and separated by commas (1, 4, 32, 125)
     * @return array The data of selected rows from the database.
     */
    function getMultiple($column, $data) {
        $query = "SELECT * FROM {$this->tableNames} WHERE {$column} IN {$data} ";
        $result = $this->database->query($query);

        if($result) {
            while ($row = $result->fetch_object()) {
                $rows[] = $row;
            }
        }
        // echo $query;
        return $rows;
    }

    /**
     * Get all of the data from the database. Takes a parameter for the limit, but this is defaulted to a large value if
     * not provided.
     * @param int $limit The limit of rows to be returned. Defaults to a high value if not provided, so that most or all
     * data is returned.
     * @return array Returns an array of all rows retrieved from the database.
     */
    function getAllData($limit = 10000) {
        $query = "SELECT * FROM {$this->tableNames} LIMIT $limit";

        $result = $this->database->query($query);

        if ($result) {
            while($row = $result->fetch_object()) {
                $rows[] = $row;
            }
        }
        else {echo "no results - {$this->database->error} - {$this->database->connect_error}";}
       // echo $query;
        return $rows;
    }

    /**
     * Insert data into the specified table. The array should be in key-value pair format.
     * The Key should be the column name to insert into, and the value is the value to insert into the column.
     * E.g:
     * [ "amount" => "12.27", "paydate" => "2017-05-24" ]
     * @param array $data The data to insert into the database.
     * @return int Returns the id of the data which was just inserted into the database.
     */
    function insertData(array $data) {
        $query = "INSERT INTO {$this->tableNames}";
        $columns = "";
        $values = "";

        // Loop through each key-value pair for the SQL statement.
        while ($value = current($data)) {
            $key = key($data);

            // Use WHERE instead of AND for the first element.
            if(array_search($value, array_values($data)) == 0) {
                $columns .= "(".$key;
                $values  .= "('".$value."'";
            }
            else {
                $columns .= ", ".$key;
                $values  .= ", '".$value."'";
            }
            next($data); // Move onto the next condition.
        }
        $columns .= ")";
        $values  .= ")";
        $query .= " {$columns} VALUES {$values}";

        if ($this->database->query($query) === TRUE) {
            $lastId = $this->database->insert_id;
        }
        else {$lastId = null; }

        return $lastId;
    }
}