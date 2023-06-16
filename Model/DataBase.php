<?php

namespace App\Model;

use mysqli;

class DataBase
{
    private string $hostname;
    private string $username;
    private string $password;
    private string $database;
    private mysqli $conn;

    function __construct()
    {
        $this->hostname = 'localhost';
        $this->username = 'bruno';
        $this->password = 'bpds';
        $this->database = 'myapp';
        $this->conn = $this->connect();
    }

    private function connect(): \mysqli
    {
        $conn = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return $conn;
    }
    public function query($sql): array
    {
        $result = mysqli_query($this->conn, $sql);
        $rows = [];
        if ($result) {
            while ($row = mysqli_fetch_assoc($result)) {
                $rows[] = $row;
            }
        }
        return $rows;
    }
}