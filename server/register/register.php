<?php

require_once("../../database/server.php");

header('Content-Type: application/json');
$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $name  = $mysqli->real_escape_string($inputData['name']);
    $email  = $mysqli->real_escape_string($inputData['email']);
    $password  = $mysqli->real_escape_string($inputData['password']);

    $nameErr = $emailErr = $passwordErr = '';

    if ($name == '') {
        $nameErr = "Name can not be blank";
    }

    if ($email == '') {
        $emailErr = "Email can not be blank";
    }

    if ($password == '') {
        $passwordErr = "Password can not be blank";
    }


    if ($nameErr == "" && $emailErr == "" && $passwordErr == "") {
        $result = register($mysqli, $name, $email, $password);

        if ($result['result']) {
            $user = get_user_email_by_email($mysqli, $email);
            echo json_encode([
                'status' => 200,
                'message' => 'Success message',
                'data' => $user
            ]);
        } else {
            if ($result['errCode'] == 1062) {
                $emailErr = "Email is alerady have been used try with another!";
            }
            echo json_encode([
                'status' => 500,
                'message' => $result['message'],
                "data" => ["name" => $nameErr,"email" => $emailErr,"password" => $passwordErr]

            ]);
        }
    } else {
        echo json_encode([
            'status' => 405,
            "data" => ["name" => $nameErr,"email" => $emailErr,"password" => $passwordErr]
        ]);
    }


} else {
    echo json_encode([
        'status' => 405,
        'message' => 'Method Not Allowed'
    ]);
}
