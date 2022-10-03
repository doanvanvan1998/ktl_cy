<?php
require "../mysql.php";
require "../crypt.php";
session_start();
$email = Encrypt($_POST['email'], $secret_key, $secret_iv);
$pass = Encrypt($_POST['pass'], $secret_key, $secret_iv);
$name = $_POST['name'];

$query = "SELECT id, email,pass FROM recruit_able_user WHERE email='$email' AND pass='$pass' AND username='$name' AND active=1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if ($row[0] == 0) {
    echo "error";
//    header("Location: ../index.php");
} else {
    $id= $row['id'];
    $_SESSION['Id'] =  $id;
    $_SESSION['email'] = $email;
    $_SESSION['pass'] = $pass;
    echo "success";
}
?>