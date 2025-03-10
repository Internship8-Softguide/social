<?php

header('Content-Type: application/json');
$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);

    echo json_encode([
        'status' => 200,
        'message' => 'Success message',
        'data' => $inputData
    ]);
} else {
    echo json_encode([
        'status' => 405,
        'message' => 'Method Not Allowed'
    ]);
}
