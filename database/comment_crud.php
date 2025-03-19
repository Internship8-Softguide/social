<?php

//create a comment
function create_comment($mysqli, $post_id, $user_id, $comment_message)
{
    try {
        $sql = "INSERT INTO `comment`(`comment_message`, `post_id`, `user_id`) VALUE ('$comment_message', $post_id, $user_id)";
        $mysqli->query($sql);
        return ['message' => "gived comment", 'result' => true];
    } catch (Exception $e) {
        return ['message' => $e->getMessage(), 'result' => false, 'errCode' => $e->getCode()];
    }
}

//  read a comments 
function read_comments($mysqli, $post_id)
{
    try {
        $sql = "SELECT * FROM `comment` WHERE `post_id` = $post_id";
        $resilt =  $mysqli->query($sql); 
        $commentText = [];
        while ($row = $resilt->fetch_assoc()) {
            $commentText[] = $row['comment_message'];
        }
        return $commentText;
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
