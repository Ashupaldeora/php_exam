<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Check if the request method is PUT
if ($_SERVER['REQUEST_METHOD'] !== 'PUT') {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        "success" => false,
        "error" => "Invalid request method. Use PUT."
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
if (empty($data->id) || empty($data->description)) {
    http_response_code(400); // Bad Request
    echo json_encode([
        "success" => false,
        "error" => "Both course ID and description are required."
    ]);
    exit();
}

// Try to update the course
if ($course->update($data->id, $data->description)) {
    http_response_code(200); // OK
    echo json_encode(["success" => true, "message" => "Course updated"]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "error" => "Failed to update course"]);
}
?>
