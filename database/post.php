<?php

function create_post($mysqli, $title, $content, $user_id, $postImage)
{
    try {
        $sql = "INSERT INTO `posts`(`title`,`content`, `user_id`, `postImage`) VALUES ('$title', '$content', $user_id, '$postImage')";
        $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Can not create post";
    }
}
function get_posts($mysqli)
{
    try {
        $sql = "SELECT * FROM posts";
        return   $mysqli->query($sql);
    } catch (Exception $e) {
        echo "Can not view posts";
    }
}
function get_posts_and_users($mysqli)
{
    try {
        $sql = "SELECT * FROM posts INNER JOIN users ON posts.user_id = users.id";
        $result =  $mysqli->query($sql);
        if ($result === false) {
            throw new Exception("Query failed");
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    } catch (Exception $e) {
        echo "Can not view posts";
    }
}
function get_post($mysqli, $id)
{
    try {
        $sql = "SELECT * FROM posts WHERE `id`=$id";
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
