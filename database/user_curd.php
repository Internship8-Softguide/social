<?php

function register($mysqli, $name, $email, $password)
{
    try {
        $sql = "INSERT INTO `users`(`name`,`email`,`password`) 
        VALUES ('$name','$email','$password')";
        $mysqli->query($sql);
        return ['message' => "Success user Register",'result' => true];
    } catch (Exception $th) {
        return ['message' => $th->getMessage(),'result' => false];
    }
}
function create_user($mysqli, $name, $email, $password, $phone, $bio, $photo, $address, $dob, $gender)
{
    try {
        $sql = "INSERT INTO `users`(`name`,`email`,`password`,`phone`,`bio`,`photo`,`address`,`dob`,`gender`) 
        VALUES ('$name','$email','$password','$phone','$bio','$photo','$address','$dob','$gender')";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can't Create User";
    }
}

function update_user($mysqli, $id, $name, $email, $password, $phone, $bio, $photo, $address, $date_of_birth, $gender)
{
    try {
        $sql = "UPDATE `users` SET `name`='$name',`email`='$email',`password`='$password',`phone`='$phone',`bio`='$bio',`photo`='$photo',`address`='$address',`date_of_birth`='$date_of_birth',`gender`='$gender' where `id`='$id'";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can't update User";
    }
}

function get_all_user($mysqli)
{
    try {
        $sql = "SELECT * FROM `users`";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can't Select User";
    }
}

function get_user_by_id($mysqli, $id)
{
    try {
        $sql = "SELECT * FROM `users` WHERE `id`=$id";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Error in Selecting User";
    }
}

function get_user_email_by_email($mysqli, $email): array
{
    try {
        $sql = "SELECT * FROM `users` WHERE `email`='$email'";
        $result = $mysqli->query($sql);
        return ['data' => $result->fetch_assoc(),'result' => true];
    } catch (Exception $th) {
        return ['message' => $th->getMessage(),'result' => false];
    }
}

function delete_user($mysqli, $id)
{
    try {
        $sql = "DELETE FROM `users` WHERE `id`=$id";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can't Delete User";
    }
}
