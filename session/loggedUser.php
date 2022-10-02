<!--
    config logged user by session;
    call function setLoggedUser and pass the user id;
    call function getLoggedUser to get the user id;
-->

<?php
session_start();

function setLoggedUser($user)
{
    $_SESSION["user"] = $user;
}

function getLoggedUser()
{
    return isset($_SESSION["user"]) ? $_SESSION["user"] : null;
}

?>