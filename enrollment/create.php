<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        "success" => false,
        "error" => "Invalid request method. Use POST."
    ]);
    exit();
}

include_once "../config/config.php";
include_once "../model/enrollment_model.php";

$database = new Database();
$conn = $database->getConnection();
$enrollment = new Enrollment($conn);

// Read JSON input
$data = json_decode(file_get_contents("php://input"));

// Validate input
if (empty($data->student_id) || empty($data->course_id)) {
    http_response_code(400); // Bad Request
    echo json_encode([
        "success" => false,
        "error" => "Both student_id and course_id are required."
    ]);
    exit();
}

// Try to create the enrollment
if ($enrollment->create($data->student_id, $data->course_id)) {
    http_response_code(201); // Created
    echo json_encode(["success" => true, "message" => "Enrollment created"]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "error" => "Failed to create enrollment"]);
}
?>
