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
