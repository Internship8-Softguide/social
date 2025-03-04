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
