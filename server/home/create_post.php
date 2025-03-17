<?php

require_once("../../database/server.php");

if (isset($_COOKIE['user'])) {
    $userData = json_decode($_COOKIE['user'], true);    
    if ($userData !== null) {
        $user_id = $userData['data']['id'];
    }
}

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod == 'POST') {
    $uploadDir = "../../static/image/uploads/"; 
    $textField = isset($_POST['textField']) ? $mysqli->real_escape_string($_POST['textField']) : "";

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $targetFilePath = '';

    if (!empty($_FILES['file']['name'])) {
        $fileTmpPath     = $_FILES['file']['tmp_name'];
        $fileName        = time() . basename($_FILES['file']['name']);
        $targetFilePath  = $uploadDir . $fileName;
        $allow_extension = ['jpg', 'jpeg', 'png'];
        $explode         = explode('.', $fileName);
        $extension       =  (end($explode));
        $photoErr        = '';

        if (!in_array($extension, $allow_extension)) {
            $photoErr = "Your file is not allowed. Only JPG, JPEG, and PNG are allowed.";
        }

        if ($photoErr === '') {
            if (move_uploaded_file($fileTmpPath, $targetFilePath)) {
                create_post($mysqli, $textField, $user_id, $targetFilePath);
                echo json_encode([
                    "success"    => true,
                    "message"    => "File uploaded successfully.",
                    "file_name"  => $fileName,
                    "file_path"  => $targetFilePath,
                    "user_id"    => $user_id,
                    "text_field" => $textField
                ]);
            } else {
                echo json_encode(["error" => "Error moving the uploaded file."]);
                exit;
            }
        } else {
            echo json_encode(["error" => $photoErr]);
            exit;
        }
    } else if($textField != '') {
        create_post($mysqli, $textField, $user_id, '');
        echo json_encode([
            "success"    => true,
            "message"    => "Post created successfully.",
            "file_name"  => '',
            "file_path"  => '',
            "user_id"    => $user_id,
            "text_field" => $textField
        ]);
    }
} else {
    echo json_encode(["error" => "Invalid request method."]);
}
