<?php


class Desks
{
    private $conn;
    private $table = 'desks';

    public $id;
    public $title;
    public $is_favourite;

    public function __construct(PDO $db)
    {
        $this->conn = $db;
    }

    public function get()
    {
        $q = "SELECT id, title, is_favourite from {$this->table}";

        $stmt = $this->conn->prepare($q);
        try {
            $stmt->execute();
        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $stmt;
    }

    public function getOne()
    {
        $q = "SELECT id, title, is_favourite from {$this->table} WHERE id=? LIMIT 1";
        $stmt = $this->conn->prepare($q);
        $stmt->bindParam(1, $this->id);
        try {
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

        } catch (Exception $e) {
            echo $e->getMessage();
        }

        return $stmt;
    }
}