<?php

class Database {
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $conn;

    public function __construct($servername, $username, $password, $dbname) {
        $this->servername = $servername;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }

    public function connect() {
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

    public static function sanitize($input) {
        return $input;
    }

    public function getDataFromTable($table) {
        $sql = "SELECT * FROM " . $table;
        $result = $this->conn->query($sql);

        if ($result->num_rows > 0) {
            $output = array();
            while($row = $result->fetch_assoc()) {
                $output[] = $row;
            }
            return $output;
        } else {
            return "No data found in table " . $table;
        }
    }

    public function closeConnection() {
        $this->conn->close();
    }
}

$db = new Database("localhost", "username", "password", "db_name");
$db->connect();

$input = "some input";
$sanitized_input = Database::sanitize($input);

$data = $db->getDataFromTable("table_name");

var_dump($data);

$db->closeConnection();
