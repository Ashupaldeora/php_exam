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
include_once "../model/course_model.php";

$database = new Database();
$conn = $database->getConnection();
$course = new Course($conn);

// Read JSON input
$data = json_decode(file_get_contents("php://input"));

// Validate input
if (empty($data->course_name) || empty($data->description)) {
    http_response_code(400); // Bad Request
    echo json_encode([
        "success" => false,
        "error" => "Both course_name and description are required."
    ]);
    exit();
}

// Try to create the course
if ($course->create($data->course_name, $data->description)) {
    http_response_code(201); // Created
    echo json_encode(["success" => true, "message" => "Course created"]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "error" => "Failed to create course"]);
}
?>
