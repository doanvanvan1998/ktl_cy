<?php
session_start();
include "../mysql.php";
include "../crypt.php";


$imp_uid = "1";
$username = $_POST['username'];
$userphone = $_POST['userphone'];
$userphone2 = $_POST['userphone2'];
$userphone3 = $_POST['userphone3'];
$phone = $userphone . "-" . $userphone2 . "-" . $userphone3;
$userpass = $_POST['userpass'];
$useremail = $_POST['useremail'];
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
$query = "INSERT INTO recruit_able_user( `imp_uid`, `username`, `phone`, `email`, `pass`, `acept_rule`, `status_pass`, `rand_code`)VALUES ('1','$username','$phone','$useremail','$userpass','','0','$rand_code')";

$result = mysqli_query($con, $query);
if ($result) {
    header("Location: ../../verify_email.php?email=$useremail&phone=$phone");
} else {
    //catch error
    echo "mysqli_error($con)";
}
mysqli_close($con);
?>
