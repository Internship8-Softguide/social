<?php

require_once("../../database/server.php");

header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod === 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $email = trim($inputData['email'] ?? '');
    $password = trim($inputData['password'] ?? '');

    $emailErr = $passwordErr = '';

    if ($email == '') {
        $emailErr = "Email can not be blank";
    }

    if ($password == '') {
        $passwordErr = "Password can not be blank";
    }

    if ($emailErr == "" && $passwordErr == "") {
        $result = login($mysqli, $email, $password);

        if ($result['result']) {
            $user = get_user_email_by_email($mysqli, $email);
            echo json_encode([
                'status' => 200,
                'message' => 'Success message',
                'data' => $user
            ]);
        } else {
            if ($result['message'] == "invalidEmail") {
                $emailErr = "Email is not registered!";
            } else if ($result['message'] == "invalidPassword") {
                $passwordErr = "Password is incorrect!";
            }
            echo json_encode([
                'status' => 500,
                'message' => $result['message'],
                "data" => ["email" => $emailErr, "password" => $passwordErr]

            ]);
        }
    } else {
        echo json_encode([
            'status' => 405,
            "data" => ["email" => $emailErr, "password" => $passwordErr]
        ]);
    }
} else {
    echo json_encode(['status' => 405, 'message' => 'Method Not Allowed']);
}
