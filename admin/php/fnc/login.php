<?php
require_once '../../../session/loggedUser.php';


include "../mysql.php";
include "../crypt.php";

$userid = $_POST["userid"];
$pass = $_POST["pass"];

$pass = Encrypt($pass, $secret_key, $secret_iv);

// sua lai get ra thang user chua toan toan bo thong tin cua no
$query = "select COUNT(*) from recruit_able_admin where userid='$userid' and pass='$pass'";

$result = mysqli_query($con, $query);
$row = mysqli_fetch_array($result);

if ($row[0] == 0) {
    echo "fail";
} else {
    $_SESSION["m_user_id"] = $userid;

    // sau khi co thong tin user thi goi den ham setLoggedUser va truyen user do vao de set len session
//    setLoggedUser($user);

    echo 'success';
}

// nếu muốn lấy thông tin user thì gọi đến hàm get getLoggedUser;
// $user = getLoggedUser();

mysqli_close($con);
?>
