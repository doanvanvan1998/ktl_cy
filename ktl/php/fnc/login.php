<?php
session_start();
require "../mysql.php";
require "../crypt.php";

$email = Encrypt($_POST['email'], $secret_key, $secret_iv);
$pass = Encrypt($_POST['pass'], $secret_key, $secret_iv);
$name = $_POST['name'];

$query = "SELECT * FROM recruit_able_user WHERE email='$email' AND pass='$pass' AND username='$name' AND active=1";
echo $query;
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if ($row == 0) {
    echo 'please check your email or password';

//    header("Location: ../index.php");
} else {
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $pass;
    echo "success";
}
?>