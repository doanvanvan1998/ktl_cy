<?php
$code = $_POST['code'];
$email = $_POST['email'];
include "../mysql.php";
$query = "select COUNT(*) from recruit_able_user where email='$email' and rand_code='$code'";
$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);
if ($row[0] != 0) {
    $query = "UPDATE recruit_able_user SET active=1 WHERE email='$email'";
    $result = mysqli_query($con, $query);
    header("Location: ../../index.php");

} else {
//    header("Location: ../../verify_email.php?email=$email");
    echo 'fail';
}
?>