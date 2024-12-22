
<?php
class Course {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function create($course_name, $description) {
        $query = "INSERT INTO courses (course_name, description) VALUES ('$course_name', '$description')";
        return mysqli_query($this->conn, $query);
    }
    
    public function update($id, $description) {
        $query = "UPDATE courses SET description = '$description' WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }
}