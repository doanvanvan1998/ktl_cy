<?php
require '../mysql.php';

session_start();
$data = json_decode($_POST['data']);
$id = $_SESSION["Id"];

foreach ($data as $record) {
    $selfIntroductionTypeName = $record->{'selfIntroductionTypeName'};
    $selfIntroductionType = $record->{'selfIntroductionType'};
    $selfIntroductionContent = $record->{'selfIntroductionContent'};

    $insertQuery = "INSERT INTO `main_resume` (`id`, `content`, `able_id`, `id_type`, `name_type`) VALUES (NULL, '$selfIntroductionContent', $id, '$selfIntroductionType', '$selfIntroductionTypeName');";
    $result = mysqli_query($con, $insertQuery);

    if (!$result) {
        echo false;
    }
}

echo true;

?>