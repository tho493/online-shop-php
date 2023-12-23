<?php
class Database
{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "online-shop";
    private $conn = "";
    private $result;
    private $error;

    function __construct()
    {
        $this->connect();
    }

    public function connect()
    {
        $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->dbname);
        if (!$this->conn)
            echo 'Error: ' . mysqli_connect_error();
    }

    public function resultSet()
    {
        $rows = array();
        while ($row = mysqli_fetch_assoc($this->result)) {
            $rows[] = $row;
        }
        return $rows;
    }

    public function getResult()
    {
        return $this->result;
    }

    public function query($sql)
    {
        try {
            $result = mysqli_query($this->conn, $sql);
            $this->result = $result;
        } catch (mysqli_sql_exception $e) {
            // $this->error = $e->getMessage();
            die('Error: ' . $e->getMessage());
        }
    }

    public function error()
    {
        return $this->error;
    }

    public function mysqli_num_rows()
    {
        return mysqli_num_rows($this->result);
    }

    public function mysqli_fetch_array()
    {
        return mysqli_fetch_array($this->result);
    }
}