<?php
session_start();
include "../mysql.php";
include "../crypt.php";

$id = $_SESSION["Id"];

$address=$_POST["address"];
$disabilities=$_POST["disabilities"];
$level_disabilities=$_POST["level_disabilities"];
$content_disabilities=$_POST["content_disabilities"];
$duty=$_POST["duty"];
$single_user=$_POST["single_user"];
$meritorious_person=$_POST["meritorious_person"];
$low_benefit=$_POST["low_benefit"];
$korea_migrate=$_POST["korea_migrate"];
$son_of_korea_migrate= isset($_POST["son_of_korea_migrate"]) ? $_POST["son_of_korea_migrate"] : 0;

$file = isset($_FILES['file']) ? $_FILES['file'] : null;
$writerFileName = '';

if ($file != null) {
    $filename = $file['name'];
    $writerFileName = $filename;
    $filetmpname = $file['tmp_name'];
    $filesize = $file['size'];
    $fileerror = $file['error'];
    $filetype = $file['type'];
    $fileext = explode('.', $filename);
    $fileactualext = strtolower(end($fileext));
    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
    if (in_array($fileactualext, $allowed)) {
        if ($fileerror === 0) {
            if ($filesize < 10000000) {
                $GLOBALS['filenamenew'] = $filename . time() . "." . $fileactualext;
                $filedestination = '../../uploads/' . $writerFileName;
                move_uploaded_file($filetmpname, $filedestination);
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this typfile e!";
    }
}

mysqli_query($con,"set names utf8");
mysqli_query($con,"insert into apply_step_1(able_id,able_address,is_disabilities,level_disabilities,content_disabilities,is_military_service,applicator,veterans,low_income,immigrant,children_of_migrant_families)
  VALUES($id,'$address',$disabilities,$level_disabilities,$content_disabilities,$duty,$single_user,$meritorious_person,$low_benefit,$korea_migrate,$son_of_korea_migrate)");

mysqli_close($con);
?>