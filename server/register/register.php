<?php

require_once("../../database/server.php");

header('Content-Type: application/json');
$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $name  = $mysqli->real_escape_string($inputData['name']);
    $email  = $mysqli->real_escape_string($inputData['email']);
    $password  = $mysqli->real_escape_string($inputData['password']);
    $result = register($mysqli, $name, $email, $password);
    if ($result['result']) {
        $user = get_user_email_by_email($mysqli, $email);
        echo json_encode([
            'status' => 200,
            'message' => 'Success message',
            'data' => $user
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
