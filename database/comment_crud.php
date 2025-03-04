<?php

//create a comment
function create_comment($mysqli, $post_id, $user_id, $comment_message, $createdAt, $updatedAt)
{
    try {
    $sql = "INSERT INTO `comment`(`comment_message`, `post_id`, `user_id`, `createdAt`, `updatedAt`) VALUE ('$comment_message', $post_id, $user_id, '$createdAt', '$updatedAt')";
    $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Error: ". $e->getMessage();
    }
}

//  read a comments 
function read_comments($mysqli, $post_id)
{
    try {
        $sql = "SELECT * FROM `comment` WHERE `post_id` = $post_id";
        $status =  $mysqli->query($sql); 
        return $status->fetch_assco();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

//  update a comment
function update_comment($mysqli, $comment_id, $comment_message, $updatedAt, $user_id)
{
    try {
        $sql = "UPDATE `comment` SET `comment_message` = $comment_message, `updatedAt` = '$updatedAt', `user_id` = $user_id WHERE `id` = $comment_id";
        return $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

//  delete a comment
function delete_comment($mysqli, $comment_id)
{
    try {
        $sql = "DELETE FROM `comment` WHERE `id` = $comment_id";
        return $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
    }
}

?>
