<!--
    config logged user by session;
    call function setLoggedUser and pass the user id;
    call function getLoggedUser to get the user id;
-->

<?php
session_start();

$loggedUser = NULL;
function setLoggedUser($user)
{
    $_SESSION["loggedUser"] = $user;
}

function getLoggedUser()
{
    return isset($_SESSION["loggedUser"]) ? $_SESSION["loggedUser"] : NULL;
}

function logoutLoggedUser()
{
    $_SESSION["loggedUser"] = NULL;
}

function forceLogin()
{
    $GLOBALS['loggedUser'] = getLoggedUser();

    if (!isset($GLOBALS['loggedUser'])) {
        echo "<script>alert('로그인 후 이용이 가능합니다.');location.href='/ktl_cy/admin/pages/forms/login.php';</script>";
    }
}

?>