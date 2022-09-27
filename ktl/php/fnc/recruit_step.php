<?php
session_start();
include "../mysql.php";
include "../crypt.php";






$imp_uid = "1";
$username = $_POST['username'];
$userphone = $_POST['userphone'];
$userpass = $_POST['userpass'];
$useremail = $_POST['useremail'];
$userphone = Encrypt($userphone, $secret_key, $secret_iv);
//$useremail = Encrypt($useremail, $secret_key, $secret_iv);
$userpass = Encrypt($userpass, $secret_key, $secret_iv);


// mien comment
//while (1) {
//    //랜덤코드 중복없는걸로 출력
//    $rand_code = mt_rand(100, 10000);
//    $query = "select COUNT(*) from recruit_able_user where apply_num='$rand_code'";
//    $result = mysqli_query($con, $query);
//    $row = mysqli_fetch_array($result);
//
//    if ($row[0] == 0) {
//        break;
//    }
//}

//$query = "select COUNT(*) from recruit_able_user where email='$useremail'";
//$result = mysqli_query($con, $query);
//$row = mysqli_fetch_array($result);
//
//if ($row[0] != 0) {
//    echo "fail_email";
//    return;
//}
//
//$query = "select COUNT(*) from recruit_able_user where phone='$userphone'";
//$result = mysqli_query($con, $query);
//$row = mysqli_fetch_array($result);
//
//if ($row[0] != 0) {
//    echo "fail_phone";
//    return;
//}
// create random code

$rand_code = mt_rand(100, 10000);

$query = "INSERT INTO `recruit_able_user`( `imp_uid`, `username`, `phone`, `email`, `pass`, `rand_code`, `acept_rule`) VALUES ('$imp_uid','$username','$userphone','$useremail','$userpass','$rand_code','')";
$result = mysqli_query($con, $query);
if ($result) {
    header("Location: ../../verify_email.php?email=$useremail");
} else {
    echo "fail";
}
mysqli_close($con);
?>
