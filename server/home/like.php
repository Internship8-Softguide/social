<?php

header('Content-Type: application/json');

require_once("../../database/server.php");

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $userId = trim($inputData['userId'] ?? '');
    $postId = trim($inputData['postId'] ?? '');
    $result = like($mysqli, $postId, $userId);
    if ($result['result']) {
        echo json_encode([
            'status' => 200,
            'message' => 'Success message',
        ]);
    } else {
        echo json_encode([
            'status' => 500,
            'message' => $result['message']
        ]);
    }
} else {
    echo json_encode([
        'status' => 405,
        'message' => 'Method Not Allowed'
    ]);
}
