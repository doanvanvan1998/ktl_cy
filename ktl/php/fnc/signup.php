<?php
require '../mysql.php';
$address = $_POST['address'];
$disabilities = $_POST['disabilities'];  // có khuyết tật hay không\
$duty = $_POST['duty'];    // đtuwiouwoopngj ngĩa vụ    quân sự
$level_disabilities = $_POST['level_disabilities'];   // mức độ khuyết tật
$content_disabilities = $_POST['content_disabilities'];  // nooijd dung khuyê tật
$single_user = $_POST['single_user'];  // ngời điền đơn
$meritorious_person = $_POST['meritorious_person'];   // người có công
$low_benefit = $_POST['low_benefit'];  // thu nhập thấp
$korea_migrate = $_POST['korea_migrate'];  // người di cư
$son_of_korea_migrate = $_POST['son_of_korea_migrate'];  // con gia đình di cư

$query = "INSERT INTO `apply_step_1`( `able_id`, `able_address`, `able_detailAddress`, `is_disabilities`, `is_military_service`, `applicator`, `veterans`, `low_income`, `immigrant`, `children_of_migrant_families`, `content_disabilities`,`level_disabilities`)VALUES ('1','$address','address','$disabilities','$duty','$single_user', '$meritorious_person' ,'$low_benefit','$korea_migrate','$son_of_korea_migrate', '$content_disabilities','$level_disabilities')";

$result = mysqli_query($con, $query);
if (!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
} else {
    echo "Success";
}

?>