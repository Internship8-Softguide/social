<?php
header('Content-Type: application/json');

require_once("../../database/server.php");

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'GET') {
    $result = get_posts_and_users($mysqli);
    $data = [];
    while ($row = $result->fetch_assoc()) {
        $comment = read_comments($mysqli,post_id: $row['id']);
        $row['comment'] = $comment;
        $data[] = $row;
    }
    if ($data !== null) {
        echo json_encode([
            'status' => "success",
            'message' => 'Success message',
            'data' => $data
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
