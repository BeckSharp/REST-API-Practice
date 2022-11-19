<?php
class Database {
    protected $connection = null;

    public function __construct() {
        try {
            $this->connection = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DATABASE_NAME);

            if (mysqli_connect_errno()) {
                throw new Exception("Could not connect to database.");
            }
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function select($query = "", $parameters = []) {
        try {
            $statement = $this->connection->prepare($query);

            if($statement === false) {
                throw new Exception("Unable to do prepared statement: " . $query);
            }

            if ($parameters) {
                $statement->bind_param($parameters[0], $parameters[1]);
            }

            $statement->execute();
            $results = $statement->get_result();
            $resultsArray = [];

            while($result = $results->fetch_assoc()) {
                array_push($resultsArray, $result);
            }

            $statement->close();

            return $resultsArray;
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }
}
?>