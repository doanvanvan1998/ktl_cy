<?php
include '../mysql.php';
$news = $_POST ['news'];
$type = $_POST ['type'];
$name = $_POST ['name'];
$phone = $_POST ['phone'];
$email = $_POST ['email'];
$title = $_POST ['title'];
$content = $_POST ['content'];

$query = "INSERT INTO recruit_able_claim( `number_select_news`, `type_of_claim`, `name_creater`, `phone_number`, `email`, `title`, `content`, `date_create`, `status_reply`) VALUES ('$news','$type','$name','$phone','$email','$title','$content',now(),'1')";
$result = mysqli_query($con, $query);
if ($result) {
    header("Location: ../../list_feedback.php");
} else {
    echo "fails";
}
?>