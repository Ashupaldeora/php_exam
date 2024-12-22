<?php


class Student {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    // Simple create without escaping (Note: not recommended for real applications)
    public function create($name, $email, $phone) {
        $query = "INSERT INTO students (name, email, phone) VALUES ('$name', '$email', '$phone')";
        return mysqli_query($this->conn, $query);
    }
    
    
    public function getAll() {
        return mysqli_query($this->conn, "SELECT * FROM students");
    }
}