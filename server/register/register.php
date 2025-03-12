<?php

require_once("../../database/server.php");

header('Content-Type: application/json');
$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $name  = $mysqli->real_escape_string($inputData['name']);
    $email  = $mysqli->real_escape_string($inputData['email']);
    $password  = $mysqli->real_escape_string($inputData['password']);
    $confirm  = $mysqli->real_escape_string($inputData['confirm']);

    $nameErr = $emailErr = $passwordErr =  $confirmErr = '';

    if ($name == '') {
        $nameErr = "Name can not be blank";
    } elseif (is_numeric($name)) {
        $nameErr = "Name can't be number";
    } elseif (strlen($name) > 10 && strlen($name) < 3) {
        $nameErr = "Name must be between 3 characters and 10 characters.";
    }

    if ($email == '') {
        $emailErr = "Email can not be blank";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Email is invalid";
    }

    if ($password == '') {
        $passwordErr = "Password can not be blank";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $password)) {
        $passwordErr = " must contain at least 8 characters, one uppercase, one lowercase, one number, and one special character";
    }

    if ($confirm == '') {
        $confirmErr = "Password can not be blank";
    } elseif (!preg_match('/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/', $confirm)) {
        $confirmErr = " must contain at least 8 characters, one uppercase, one lowercase, one number, and one special character";
    }

    $hashPassword = password_hash($password, PASSWORD_ARGON2ID);

    if ($nameErr == "" && $emailErr == "" && $passwordErr == "") {
        $result = register($mysqli, $name, $email, $hashPassword);

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
                "data" => ["name" => $nameErr, "email" => $emailErr, "password" => $passwordErr]

            ]);
        }
    } else {
        echo json_encode([
            'status' => 405,
            "data" => ["name" => $nameErr, "email" => $emailErr, "password" => $passwordErr, "confirm" => $confirmErr]
        ]);
    }
} else {
    echo json_encode([
        'status' => 405,
        'message' => 'Method Not Allowed'
    ]);
}
