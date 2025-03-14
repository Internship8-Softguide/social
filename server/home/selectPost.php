<?php
header('Content-Type: application/json');

require_once("../../database/server.php");

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'GET') {
    $user = get_posts_and_users($mysqli);
    if ($user !== null) {
        echo json_encode([
            'status' => "success",
            'message' => 'Success message',
            'data' => $user
        ]);
    } else {
        echo json_encode([
            'status' => "error",
            'message' => 'No posts found'
        ]);
    }
} else {
    echo json_encode([
        'status' => 405,
        'message' => 'Method Not Allowed'
    ]);
}
