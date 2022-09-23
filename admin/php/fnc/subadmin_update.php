<?php
session_start();
include "../mysql.php";
include "../crypt.php";

$userid       = $_POST['userid'];
$pass         = $_POST['pass'];
$username     = $_POST['username'];
$id           = $_POST['Id'];
$phone    = $_POST['phone'];
$email    = $_POST['email'];
$description    = $_POST['description'];


$query = "SELECT useremail,userphone,pass FROM recruit_able_subadmin where id=$id";
echo $query;
$resultSet = mysqli_query($con, $query);
$sql = "UPDATE recruit_able_subadmin SET userid='$userid',username='$username',description='$description'";

if (mysqli_num_rows($resultSet) > 0) {
    while ($row = mysqli_fetch_assoc($resultSet)) {
        if ($phone !=$row['userphone']){
            $userphone = Encrypt($phone,$secret_key,$secret_iv);
            $sql = $sql .",userphone='$userphone'";
        }
        if ($pass !=$row['pass']){
            $pass = Encrypt($pass,$secret_key,$secret_iv);
            $sql = $sql .",pass='$pass'";
        }
        if ($email !=$row['useremail']){
            $useremail = Encrypt($email,$secret_key,$secret_iv);
            $sql = $sql .",useremail='$useremail'";
        }
    }
}
$sql = $sql ." where id=$id";
mysqli_query($con,$sql);
header("Location: /ktl_cy/admin/pages/forms/subadmin_list.php");

mysqli_close($con);
?>
