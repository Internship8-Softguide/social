<?php

require_once("../../database/db.php");
require_once("../../database/server.php");

header('Content-Type: application/json');

$requestMethod = $_SERVER['REQUEST_METHOD'];
if ($requestMethod === 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $id = $inputData['id'];
    $data = $inputData['data'];
    $type = $inputData['type'];
    $result = null;
    switch ($type) {
        case 'name':
            $result = changeName($mysqli, $id, $data);
            break;
        case 'email':
            $result = changeName($mysqli, $id, $data);
            break;
        case 'password':
            $result = changeName($mysqli, $id, $data);
            break;
        case 'edu':
            $result = changeName($mysqli, $id, $data);
            break;
        case 'phone':
            $result = changePhone($mysqli, $id, $data);
            break;
        case 'relationship':
            $result = changeName($mysqli, $id, $data);
            break;
        case 'location':
            $result = changeName($mysqli, $id, $data);
            break;
        default:
            # code...
            break;
    }
    $data =  get_user_by_id($mysqli, $id);
    if ($result['result']) {
        echo json_encode([
            'status' => 200,
            'message' => 'Success message',
            'data' => $data
        ]);
    } else {
    }
}
