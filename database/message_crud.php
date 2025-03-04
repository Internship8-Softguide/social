<?php

function create_message($mysqli, $message, $fromUserid, $toUserId)
{
    try {
        $sql = "INSERT INTO `message`(`message`, `fromUserId`, `toUserId`) VALUES ('$message', $fromUserid, $toUserId)";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can not create message";
    }
}

function update_message($mysqli, $id, $message, $fromUserid, $toUserid)
{
    try {
        $sql = "UPDATE `message` 
                SET `message` = '$message', `fromUserid` = $fromUserid, `toUserid` = $toUserid
                WHERE `id` = $id";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo $th;
        echo "Can not update message";
    }
}

function delete_message($mysql, $id)
{
    try {
        $sql = "DELETE FROM `message` WHERE `id` = $id";
        $mysql->query($sql);
    } catch (Exception $th) {
        echo $th;
        echo "Can not update message";
    }
}
