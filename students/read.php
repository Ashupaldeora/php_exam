<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Check if the request method is GET
if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        "success" => false,
        "error" => "Invalid request method. Use GET."
    ]);
    exit();
}

include_once "../config/config.php";
include_once "../model/student_model.php";

$database = new Database();
$conn = $database->getConnection();
$student = new Student($conn);

// Try to retrieve students
$result = $student->getAll();
$students = [];

while ($row = mysqli_fetch_assoc($result)) {
    $students[] = $row;
}

if (!empty($students)) {
    http_response_code(200); // OK
    echo json_encode(["success" => true, "data" => $students]);
} else {
    http_response_code(404); // Not Found
    echo json_encode(["success" => false, "error" => "No students found"]);
}
?>
