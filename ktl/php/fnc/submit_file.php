<?php
include "../mysql.php";
for($i=1; $i==9;$i++){
    $file = $_FILES['file'.$i];
}
//foreach ($files as $file) {
//    $filename = $_FILES[$file]['name'];
//    $filetmpname = $_FILES[$file]['tmp_name'];
//    $filesize = $_FILES[$file]['size'];
//    $fileerror = $_FILES[$file]['error'];
//    $filetype = $_FILES[$file]['type'];
//    $fileext = explode('.', $filename);
//    $fileactualext = strtolower(end($fileext));
//    $allowed = array('jpg', 'jpeg', 'png', 'pdf');
//    if (in_array($fileactualext, $allowed)) {
//        if ($fileerror === 0) {
//            if ($filesize < 10000000) {
//                $filenamenew = $filename . time() . "." . $fileactualext;
//                $filedestination = '../../uploads/' . $filenamenew;
//                move_uploaded_file($filetmpname, $filedestination);
//            } else {
//                echo "Your file is too big!";
//            }
//        } else {
//            echo "There was an error uploading your file!";
//        }
//    } else {
//        echo "You cannot upload files of this type!";
//    }
//}

foreach ($files as $file) {
    $filename = $file['name'];
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
                $filenamenew = $filename . time() . "." . $fileactualext;
                $filedestination = '../../uploads/' . $filenamenew;
                move_uploaded_file($filetmpname, $filedestination);
            } else {
                echo "Your file is too big!";
            }
        } else {
            echo "There was an error uploading your file!";
        }
    } else {
        echo "You cannot upload files of this type!";
    }
}
//$query = "INSERT INTO `file_user`( `file1`, `file2`, `file3`, `file4`, `file5`) VALUES ('$filenamenew1','$filenamenew2','$filenamenew3','$filenamenew4','$filenamenew5')";
//$result = mysqli_query($con, $query);
//if (!$result) {
//    echo "Error: " . $query . "<br>" . mysqli_error($con);
//} else {
//    echo "Success";
//}

?>