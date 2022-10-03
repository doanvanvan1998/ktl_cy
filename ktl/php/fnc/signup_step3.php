<?php
require '../mysql.php';
session_start();
$id = $_SESSION["Id"];
$data = json_decode($_POST['data']);
$file = isset($_FILES['portfolio']) ? $_FILES['portfolio'] : null;
$filenamenew = '';


if ($file != null) {
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
                $GLOBALS['filenamenew'] = $filename . time() . "." . $fileactualext;
                $filedestination = '../../uploads/' . $filenamenew;
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

// handle insert db apply_step_3
$link = $data->{'link'};
$insertStep3Query = "INSERT INTO apply_step_3 (`id`, `userlink`, `file_portlio`, `able_id`) VALUES (NULL, '$link', '$filenamenew', $id)";
$result = mysqli_query($con, $insertStep3Query);

if (!$result) {
    echo false;
    die();
}

// handle insert db certificate
$certs = $data->{'certs'};
foreach ($certs as $cert) {
    $certName = $cert->{'certName'};
    $certIssuedBy = $cert->{'certIssuedBy'};
    $certIssuedDate = $cert->{'certIssuedDate'};
    $insertCertQuery = "INSERT INTO `recruit_able_certification` (`id`, `name`, `place_of_issue`, `date_of_issue`, `able_id`) VALUES (NULL,  '$certName', '$certIssuedBy', '$certIssuedDate', '1')";

    $rs = mysqli_query($con, $insertCertQuery);
    if (!$rs) {
        echo false;
        die();
    }
}

// handle insert db award
$awards = $data->{'awards'};
foreach ($awards as $award) {
    $awardName = $award->{'awardName'};
    $awardIssuedBy = $award->{'awardIssuedBy'};
    $awardIssuedDate = $award->{'awardIssuedDate'};
    $awardType = $award->{'awardType'};
    $awardContent = $award->{'awardContent'};

    $insertAwardQuery = "INSERT INTO `recruit_able_award` (`id`, `title`, `place_of_issue`, `contents`, `date`, `able_id`, `award_type`) VALUES (NULL, '$awardName', '$awardIssuedBy', '$awardContent', '$awardIssuedDate', '1', '$awardType');";

    $rs = mysqli_query($con, $insertAwardQuery);
    if (!$rs) {
        echo false;
        die();
    }
}


echo true;
?>