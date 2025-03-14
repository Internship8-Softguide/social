<?php
header('Content-Type: application/json');

require_once("../../database/server.php");

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'GET') {
    echo json_encode([
        'status' => "success",
        'message' => 'Success message',
    ]);
} else {
    echo json_encode([
        'status' => 405,
        'message' => 'Method Not Allowed'
    ]);
}
