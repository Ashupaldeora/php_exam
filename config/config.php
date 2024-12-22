<?php
// config/Database.php
class Database {
    private $host = "localhost";
    private $database_name = "student_management";
    private $username = "root";
    private $password = "";
    public $conn;

    public function getConnection() {
        $this->conn = null;
        try {
            $this->conn = mysqli_connect(
                $this->host, 
                $this->username, 
                $this->password, 
                $this->database_name
            );
            
            if (!$this->conn) {
                throw new Exception("Connection failed: " . mysqli_connect_error());
            }
            
          
            
        } catch(Exception $e) {
            echo "Connection Error: " . $e->getMessage();
        }
        
        return $this->conn;
    }
}