<?php
require '../mysql.php';


$data = json_decode($_POST['data']);

foreach ($data as $record) {
    $selfIntroductionTypeName = $record->{'selfIntroductionTypeName'};
    $selfIntroductionType = $record->{'selfIntroductionType'};
    $selfIntroductionContent = $record->{'selfIntroductionContent'};

    $insertQuery = "INSERT INTO `main_resume` (`id`, `content`, `able_id`, `id_type`, `name_type`) VALUES (NULL, '$selfIntroductionContent', '1', '$selfIntroductionType', '$selfIntroductionTypeName');";
    $result = mysqli_query($con, $insertQuery);

    if (!$result) {
        echo false;
    }
}

echo true;

?>