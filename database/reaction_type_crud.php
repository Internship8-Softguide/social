<?php


function create_reaction_type($mysqli, $reactionName)
{
    try {
        $sql = "INSERT INTO `reactiontype`(`reactionName`) VALUES ('$reactionName')";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can not create reaction Type";
    }
}

function insertReactionTypes($mysqli)
{
    $sql = "SELECT * FROM `reaction_types`";
    $result = $mysqli->query($sql);
    if (count($result->fetch_all()) === 0) {
        $sql = "INSERT INTO `reaction_types` (`id`,`reactionName`) VALUES
            (1,'Like'),
            (2,'Love'),
            (3,'Haha'),
            (4,'Wow') ";

        if ($mysqli->query($sql)) {
            return true;
        }
        return false;
    }
    return true;
}

function update_reaction_type($mysqli, $reactionName, $id)
{
    try {
        $sql = "UPDATE `reactiontype` SET `reactionName` = '$reactionName' WHERE `id` = $id";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can not update reaction Type";
    }
}
function delete_reaction_type($mysqli, $id)
{
    try {
        $sql = "DELETE FROM `reactiontype`  WHERE `id` = $id";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can not update reaction Type";
    }
}
function get_all_reaction_type($mysqli)
{
    try {
        $sql = "SELECT * FROM `reactiontype`";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can not update reaction Type";
    }
}
function get_reationtype_by_id($mysqli, $id)
{
    try {
        $sql = "SELECT * FROM `reactiontype` WHERE `id`=$id ";
        $mysqli->query($sql);
    } catch (Exception $th) {
        echo "Can not update reaction Type";
    }
}
