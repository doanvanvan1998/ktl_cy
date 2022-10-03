<?php
require "../mysql.php";
require "../crypt.php";
session_start();
$email = Encrypt($_POST['email'], $secret_key, $secret_iv);
$pass = Encrypt($_POST['pass'], $secret_key, $secret_iv);
$name = $_POST['name'];

$query = "SELECT id,username,phone,email,pass FROM recruit_able_user WHERE email='$email' AND pass='$pass' AND username='$name' AND active=1";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if ($row[0] == 0) {
    echo "error";
//    header("Location: ../index.php");
} else {
    $id = $row['id'];
    $name = $row['username'];
    $emailDe = Decrypt($row['email'], $secret_key, $secret_iv);
    $phone = Decrypt($row['phone'], $secret_key, $secret_iv);
    $_SESSION['Id'] = $id;
    $_SESSION['username'] = $name;
    $_SESSION['email'] = $emailDe;
    $_SESSION['phone'] = $phone;
    echo "success";
//    header("Location: ../../../ktl/signup.php");
}
?>