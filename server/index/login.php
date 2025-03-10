<?php




$response = ['id' => '1','name' => 'username','email' => 'admin@gmail.com','status' => "success"];
// $response = ['id' => '1','email' => 'email does not found','passowrd' => "possword does not match",'status' => "error"];

echo json_encode($response);
