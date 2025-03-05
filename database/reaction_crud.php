<?php

function create_reaction($mysqli, $postId, $userId, $typeId)
{
    try {
        $sql = "INSERT INTO `reaction`(`postId`, `userId`, `typeId`) VALUES ('$postId', '$userId', '$typeId')";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Cannot create reaction";
    }
}



function get_reactions($mysqli)
{
    try {
        $sql    = "SELECT * FROM `reaction`";
        $result = $mysqli->query($sql);
        return $result->fetch_all();
    } catch (Exception $th) {
        echo "Something Wrong! Can not get reactions";
    }
}

function update_reaction ($mysqli,$postId,$userId,$newTypeId){
    try{
        $sql  = "UPDATE `reaction` SET `typeId` = $newTypeId WHERE `postId` = $postId AND `userId` = $userId";
        $mysqli->query($sql);
    } catch (Exception $th){
        echo "Cannot update reaction";
    }
}

function delete_reaction($mysqli, $postId, $userId, $typeId)
{
    try {
        $sql = "DELETE FROM `reaction` WHERE `postId` = '$postId' AND `userId` = '$userId' AND `typeId` = '$typeId'";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Cannot delete reaction";
    }
}
