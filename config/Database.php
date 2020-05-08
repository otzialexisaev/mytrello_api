<?php


class Database
{
    private $host = '127.0.0.1';
    private $db_name = 'mytrello';
    private $username = 'root';
//    private $pass = '';
    private $conn;

    public function connect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->db_name}", $this->username);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo '--------------------------------------------------------------------';
            echo $e->getMessage();
            echo '--------------------------------------------------------------------';
        }
        return $this->conn;
    }
}