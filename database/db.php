<?php

function getConnection()
{
    try {
        $connection = new mysqli("localhost", "root", "");
        return $connection;
    } catch (Exception $exception) {
        echo "Database Connection error";
        die();
    }
}

function createDatabase($mysqli)
{
    try {
        $sql = "CREATE DATABASE IF NOT EXISTS `social`";
        $mysqli->query($sql);
        $mysqli->select_db('social');
    } catch (Exception $exception) {
        echo "Can not create Database or can not found database";
        die();
    }
}

function createTables($mysqli)
{
    try {
        $sql = "CREATE TABLE IF NOT EXISTS `users` 
        (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(255) NOT NULL,
            email VARCHAR(191) UNIQUE NOT NULL,
            password VARCHAR(255) NOT NULL,
            phone VARCHAR(255) NOT NULL,
            bio VARCHAR(255) NOT NULL,
            address VARCHAR(255) NOT NULL,
            dateofbirth DATE NOT NULL,
            photo VARCHAR(255) NOT NULL,
            gender VARCHAR(255) NOT NULL
        )";
        $mysqli->query($sql);
        $sql = "CREATE TABLE IF NOT EXISTS `message` 
        (
            id INT AUTO_INCREMENT PRIMARY KEY,
            message TEXT NOT NULL,
            fromUserid INT NOT NULL,
            toUserid INT NOT NULL,
            createdAt TIMESTAMP DEFAULT NOW(),
            updatedAt TIMESTAMP DEFAULT NOW(),
            FOREIGN KEY (fromUserid) REFERENCES users(id),
            FOREIGN KEY (toUserid) REFERENCES users(id)

        )";
        $mysqli->query($sql);
        $sql = "CREATE TABLE IF NOT EXISTS `posts` 
        (
            id INT AUTO_INCREMENT PRIMARY KEY,
            title VARCHAR(255) NOT NULL,
            content TEXT NOT NULL,
            user_id INT NOT NULL,
            postImage VARCHAR(255) NOT NULL,
            created_at TIMESTAMP DEFAULT NOW(),
            FOREIGN KEY (user_id) REFERENCES users(id)

        )";
        $mysqli->query($sql);
        $sql = "CREATE TABLE IF NOT exists `comment`(
            id int PRIMARY KEY AUTO_INCREMENT,
            comment_message VARCHAR(225),
            post_id INT NOT NULL,
            user_id INT NOT NULL,
            createdAt TIMESTAMP DEFAULT NOW(),
            updatedAt TIMESTAMP DEFAULT NOW(),
            FOREIGN KEY (post_id) REFERENCES posts(id),
            FOREIGN KEY (user_id) REFERENCES users(id)
        )";
        $mysqli->query($sql);
        $sql = "CREATE TABLE IF NOT EXISTS `reactiontype`
        (
            id INT  PRIMARY KEY AUTO_INCREMENT,
            reactionName VARCHAR(255)

        )";
        $mysqli->query($sql);
        $sql = "CREATE TABLE IF NOT EXISTS `reaction`
        (
            postId INT NOT NULL,
            userId INT NOT NULL,
            typeId INT NOT NULL,
            PRIMARY KEY (postId, userId),
            FOREIGN KEY (postId) REFERENCES posts(id),
            FOREIGN KEY (userId) REFERENCES users(id),
            FOREIGN KEY (typeId) REFERENCES reactiontype(id)
        )";
        $mysqli->query($sql);
    } catch (Exception $exception) {
        echo $exception;
        echo "Can not create Tables";
        die();
    }
}


$mysqli = getConnection();
createDatabase($mysqli);
createTables($mysqli);
