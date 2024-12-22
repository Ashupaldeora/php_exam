<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Check if the request method is DELETE
if ($_SERVER['REQUEST_METHOD'] !== 'DELETE') {
    http_response_code(405); // Method Not Allowed
    echo json_encode([
        "success" => false,
        "error" => "Invalid request method. Use DELETE."
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
if (empty($data->id)) {
    http_response_code(400); // Bad Request
    echo json_encode([
        "success" => false,
        "error" => "Enrollment ID is required."
    ]);
    exit();
}

// Try to delete the enrollment
if ($enrollment->delete($data->id)) {
    http_response_code(200); // OK
    echo json_encode(["success" => true, "message" => "Enrollment deleted"]);
} else {
    http_response_code(500); // Internal Server Error
    echo json_encode(["success" => false, "error" => "Failed to delete enrollment"]);
}
?>
