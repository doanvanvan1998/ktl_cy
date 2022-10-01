<?php
include "../mysql.php";
$file1 = $_FILES['file1'];
$file2 = $_FILES['file2'];
$file3 = $_FILES['file3'];
$file4 = $_FILES['file4'];
$file5 = $_FILES['file5'];


// upload multiple files
$files = array($file1, $file2, $file3, $file4, $file5);
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
echo $file;

//$query = "INSERT INTO `file_user`(`id`, `file1`, `file2`, `file3`, `file4`, `file5`) VALUES ('[value-1]','[value-2]','[value-3]','[value-4]','[value-5]','[value-6]')";


?>