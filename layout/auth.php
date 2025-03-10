<?php

if (isset($_COOKIE["user"])) {
    $user = json_decode($_COOKIE["user"], true);
} else {
    header("location:index.php");
}
