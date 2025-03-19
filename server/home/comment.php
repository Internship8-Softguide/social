<?php
header('Content-Type: application/json');

require_once("../../database/server.php");

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $user_id = trim($inputData['user_id'] ?? '');
    $post_id = trim($inputData['post_id'] ?? '');
    $comment_message = trim($inputData['commentText'] ?? '');
    $result = create_comment($mysqli, $post_id, $user_id, $comment_message);
    if ($result['result']) {
        echo json_encode([
            'status' => 200,
            'message' => 'Success message'
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
