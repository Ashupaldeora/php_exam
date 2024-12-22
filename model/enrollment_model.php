
<?php
class Enrollment {
    private $conn;
    
    public function __construct($db) {
        $this->conn = $db;
    }
    
    public function create($student_id, $course_id) {
        $query = "INSERT INTO enrollments (student_id, course_id) VALUES ($student_id, $course_id)";
        return mysqli_query($this->conn, $query);
    }
    
    public function delete($id) {
        $query = "DELETE FROM enrollments WHERE id = $id";
        return mysqli_query($this->conn, $query);
    }
}