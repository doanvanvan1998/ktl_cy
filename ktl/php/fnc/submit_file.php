<?php
include "../mysql.php";
$file1 = $_FILES['file1'];
$file2 = $_FILES['file2'];
$file3 = $_FILES['file3'];
$file4 = $_FILES['file4'];
$file5 = $_FILES['file5'];


// upload file1
$filename1 = $_FILES['file1']['name'];
$filetmpname1 = $_FILES['file1']['tmp_name'];
$filesize1 = $_FILES['file1']['size'];
$fileerror1 = $_FILES['file1']['error'];
$filetype1 = $_FILES['file1']['type'];
$fileext1 = explode('.', $filename1);
$fileactualext1 = strtolower(end($fileext1));
$allowed1 = array('jpg', 'jpeg', 'png', 'pdf');
if (in_array($fileactualext1, $allowed1)) {
    if ($fileerror1 === 0) {
        if ($filesize1 < 10000000) {
            $filenamenew1 = $filename1 . time() . "." . $fileactualext1;
            $filedestination1 = '../../uploads/' . $filenamenew1;
            move_uploaded_file($filetmpname1, $filedestination1);
        } else {
            echo "Your file is too big!";
        }
    } else {
        echo "There was an error uploading your file!";
    }
} else {
    echo "You cannot upload files of this type!";
}

// upload file2
$filename2 = $_FILES['file2']['name'];
$filetmpname2 = $_FILES['file2']['tmp_name'];
$filesize2 = $_FILES['file2']['size'];
$fileerror2 = $_FILES['file2']['error'];
$filetype2 = $_FILES['file2']['type'];
$fileext2 = explode('.', $filename2);
$fileactualext2 = strtolower(end($fileext2));
$allowed2 = array('jpg', 'jpeg', 'png', 'pdf');
if (in_array($fileactualext2, $allowed2)) {
    if ($fileerror2 === 0) {
        if ($filesize2 < 10000000) {
            $filenamenew2 = $filename2 . time() . "." . $fileactualext2;
            $filedestination2 = '../../uploads/' . $filenamenew2;
            move_uploaded_file($filetmpname2, $filedestination2);
        } else {
            echo "Your file is too big!";
        }
    } else {
        echo "There was an error uploading your file!";
    }
} else {
    echo "You cannot upload files of this type!";
}

// upload file3
$filename3 = $_FILES['file3']['name'];
$filetmpname3 = $_FILES['file3']['tmp_name'];
$filesize3 = $_FILES['file3']['size'];
$fileerror3 = $_FILES['file3']['error'];
$filetype3 = $_FILES['file3']['type'];
$fileext3 = explode('.', $filename3);
$fileactualext3 = strtolower(end($fileext3));
$allowed3 = array('jpg', 'jpeg', 'png', 'pdf');
if (in_array($fileactualext3, $allowed3)) {
    if ($fileerror3 === 0) {
        if ($filesize3 < 10000000) {
            $filenamenew3 = $filename3 . time() . "." . $fileactualext3;
            $filedestination3 = '../../uploads/' . $filenamenew3;
            move_uploaded_file($filetmpname3, $filedestination3);
        } else {
            echo "Your file is too big!";
        }
    } else {
        echo "There was an error uploading your file!";
    }
} else {
    echo "You cannot upload files of this type!";
}

// upload file4
$filename4 = $_FILES['file4']['name'];
$filetmpname4 = $_FILES['file4']['tmp_name'];
$filesize4 = $_FILES['file4']['size'];
$fileerror4 = $_FILES['file4']['error'];
$filetype4 = $_FILES['file4']['type'];
$fileext4 = explode('.', $filename4);
$fileactualext4 = strtolower(end($fileext4));
$allowed4 = array('jpg', 'jpeg', 'png', 'pdf');
if (in_array($fileactualext4, $allowed4)) {
    if ($fileerror4 === 0) {
        if ($filesize4 < 10000000) {
            $filenamenew4 = $filename4 . time() . "." . $fileactualext4;
            $filedestination4 = '../../uploads/' . $filenamenew4;
            move_uploaded_file($filetmpname4, $filedestination4);
        } else {
            echo "Your file is too big!";
        }
    } else {
        echo "There was an error uploading your file!";
    }
} else {
    echo "You cannot upload files of this type!";
}

// upload file5
$filename5 = $_FILES['file5']['name'];
$filetmpname5 = $_FILES['file5']['tmp_name'];
$filesize5 = $_FILES['file5']['size'];
$fileerror5 = $_FILES['file5']['error'];
$filetype5 = $_FILES['file5']['type'];
$fileext5 = explode('.', $filename5);
$fileactualext5 = strtolower(end($fileext5));
$allowed5 = array('jpg', 'jpeg', 'png', 'pdf');
if (in_array($fileactualext5, $allowed5)) {
    if ($fileerror5 === 0) {
        if ($filesize5 < 10000000) {
            $filenamenew5 = $filename5 . time() . "." . $fileactualext5;
            $filedestination5 = '../../uploads/' . $filenamenew5;
            move_uploaded_file($filetmpname5, $filedestination5);
        } else {
            echo "Your file is too big!";
        }
    } else {
        echo "There was an error uploading your file!";
    }
} else {
    echo "You cannot upload files of this type!";
}
$query = "INSERT INTO `file_user`( `file1`, `file2`, `file3`, `file4`, `file5`) VALUES ('$filenamenew1','$filenamenew2','$filenamenew3','$filenamenew4','$filenamenew5')";
$result = mysqli_query($con, $query);
if (!$result) {
    echo "Error: " . $query . "<br>" . mysqli_error($con);
} else {
    echo "Success";
}

?>