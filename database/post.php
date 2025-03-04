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
        $mysqli->query($sql);
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
