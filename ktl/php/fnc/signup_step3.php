<?php
require '../mysql.php';
$name_equals = $_POST['name_equals'];
$issued_by = $_POST['issued_by'];
$time_equals = $_POST['time_equals'];
$contest_name = $_POST['contest_name'];
$granting_agencies = $_POST['granting_agencies'];
$time_start = $_POST['time_start'];
$time_end = $_POST['time_end'];
$content_prize = $_POST['content_prize'];
$link = $_POST['link'];

//$file = $_FILES['file'];
//$filename = $_FILES['file']['name'];
//$filetmpname = $_FILES['file']['tmp_name'];
//$filesize = $_FILES['file']['size'];
//$fileerror = $_FILES['file']['error'];
//$filetype = $_FILES['file']['type'];
//$fileext = explode('.', $filename);
//$fileactualext = strtolower(end($fileext));
//$allowed = array('jpg', 'jpeg', 'png', 'pdf');
//if (in_array($fileactualext, $allowed)) {
//    if ($fileerror === 0) {
//        if ($filesize < 10000000) {
//            $filenamenew = uniqid('', true) . "." . $fileactualext;
//            $filedestination = '../../uploads/' . $filenamenew;
//            move_uploaded_file($filetmpname, $filedestination);
//        } else {
//            echo "Your file is too big!";
//        }
//    } else {
//        echo "There was an error uploading your file!";
//    }
//} else {
//    echo "You cannot upload files of this type!";
//}

$query = "INSERT INTO `apply_step_3`( `userlink`, `name_equals`, `issued_by`, `time_equals`, `contest_name`, `granting_agencies`, `time_start`, `time_end`, `content_prize`, `able_id`)VALUES ('$link','$name_equals','$issued_by','$time_equals','$contest_name','$granting_agencies','$time_start','$time_end','$content_prize','1')";
$result = mysqli_query($con, $query);
if (!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
} else {
    echo "Success";
}


?>