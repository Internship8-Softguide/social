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
        $sql = "CREATE TABLE IF NOT EXISTS `user`(id int p)";
        $mysqli->query($sql);
    } catch (Exception $exception) {
        echo "Can not create Tables";
        die();
    }
}


$mysqli = getConnection();
createDatabase($mysqli);
