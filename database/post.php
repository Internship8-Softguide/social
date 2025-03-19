<?php

function create_post($mysqli, $title, $user_id, $postImage)
{
    try {
        $sql = "INSERT INTO `posts`(`title`, `user_id`, `postImage`) VALUES ('$title', $user_id, '$postImage')";
        $mysqli->query($sql);
        return ['message' => "Success user Register", 'result' => true];
    } catch (Exception $th) {
        return ['message' => $th->getMessage(), 'result' => false, 'errCode' => $th->getCode()];
    }
}
function get_posts($mysqli)
{
    try {
        $sql = "SELECT * FROM posts";
        return $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Can not view posts";
    }
}
function get_posts_and_users($mysqli)
{
    try {
        $sql = "SELECT posts.*,users.name,users.photo,(SELECT COUNT(*) FROM `reaction` WHERE `postId`=posts.id) as reaction FROM posts INNER JOIN users ON posts.user_id = users.id  ORDER BY posts.`id` DESC";
        $result =  $mysqli->query($sql);
        if ($result === false) {
            throw new Exception("Query failed");
        }
        
        return $result;
    } catch (Exception $e) {
        echo "Can not view posts";
    }
}

function getLatestPost($mysqli)
{
    try {
        $sql = "SELECT posts.*,users.name,users.photo,(SELECT COUNT(*) FROM `reaction` WHERE `postId`=posts.id) as reaction FROM posts INNER JOIN users ON posts.user_id = users.id ORDER BY posts.`id` DESC LIMIT 1";
        $result =  $mysqli->query($sql);
        if ($result === false) {
            throw new Exception("Query failed");
        }
        return $result->fetch_assoc();
    } catch (Exception $e) {
        echo "Can not view posts";
    }
}
function get_post($mysqli, $id)
{
    try {
        $sql = "SELECT * FROM posts WHERE `id`=$id ORDER BY `id` DESC";
        $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Can not view post";
    }
}
function update_post($mysqli, $id, $title, $content, $postImage)
{
    try {
        $sql = "UPDATE posts SET `title`='$title', `content`='$content', `postImage`='$postImage' WHERE id=$id";
        $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Can not update post";
    }
}
function delete_post($mysqli, $id)
{
    try {
        $sql = "DELETE FROM posts WHERE `id` = $id";
        $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Can not delete post";
    }
}
