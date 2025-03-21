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
    // $textField = isset($_POST['textField']) ? $mysqli->real_escape_string($_POST['textField']) : "";
    // $textField = !empty($_POST['textField']) ? $mysqli->real_escape_string($_POST['textField']) : "";
    // $textField = (isset($_POST['textField']) && $_POST['textField'] !== '') ? $mysqli->real_escape_string($_POST['textField']) : "";

    if (isset($_POST['textField']) && trim($_POST['textField']) !== '') {
        $textField = $mysqli->real_escape_string($_POST['textField']);
    } else {
        $textField = "";
    }

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
                    "status"     => 200,
                    "message"    => "File uploaded successfully.",
                    "file_name"  => $fileName,
                    "file_path"  => $targetFilePath,
                    "user_id"    => $user_id,
                    "text_field" => $textField,
                    "data" => getLatestPost($mysqli)
                ]);
            } else {
                echo json_encode(["error" => "Error moving the uploaded file."]);
                exit;
            }
        } else {
            echo json_encode(["error" => $photoErr]);
            exit;
        }
    } elseif ($textField != '') {
        // echo $textField;
        // die();
        create_post($mysqli, $textField, $user_id, '');
        echo json_encode([
            "status"     => 200,
            "message"    => "File uploaded successfully.",
            "file_name"  => '',
            "file_path"  => '',
            "user_id"    => $user_id,
            "text_field" => $textField,
            "data" => getLatestPost($mysqli)
        ]);
    } else {
        echo json_encode(["error" => "Either a file or text field is required"]);

    }
} else {
    echo json_encode(["error" => "Invalid request method."]);
}
