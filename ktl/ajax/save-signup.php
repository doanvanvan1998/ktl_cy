<?php
header('application/json');
require_once './../dals/Generic.php';
if (isset($_POST['step'])) {
    $step = $_POST['step'];
    switch ($step) {
        case 2:
            $generic = new Generic();
            $mainPayload = array(
                ':name_high_school' => $_POST['high_school'],
                ':graduation_high_school_year' => $_POST['graduation_high_school_year'],
                ':status_graduation_high_school' => $_POST['status_graduate'],
                ':participate_exam_college' => $_POST['participate_exam_college'],
                ':not_graduated' => $_POST['status_graduate'] == 1 ? 0 : 1,
                ':major_sub' => $_POST['main_experience'],
                ':major_main_id' => $_POST['extra_experience'],
                ':able_id' => $_POST['able_id'] ?? 1,
                ':main_profile' => json_encode($_POST['main_profile']),
            );


            $academies = [];
            foreach ($_POST['academy'] as $academy) {
                $academies[] = array(
                    ':name' => $academy['name'],
                    ':date_start' => $academy['start_date'],
                    ':date_end' => $academy['end_date'],
                    ':status_graduate' => $academy['status'],
                    ':poit_average' => $academy['gpa'],
                    ':total_point' => $academy['total_score'],
                    ':type_school' => "university",
                    ':main_major' => $academy['major'],
                    ':able_id' => $_POST['able_id'] ?? 1,
                    ':degree' => $academy['degree']
                );
            }

            $postgraduates = [];
            foreach ($_POST['postgraduate'] as $postgraduate) {
                $postgraduates[] = array(
                    ':name' => $postgraduate['name'],
                    ':date_start' => $postgraduate['start_date'],
                    ':date_end' => $postgraduate['end_date'],
                    ':status_graduate' => $postgraduate['status'],
                    ':poit_average' => $postgraduate['gpa'],
                    ':total_point' => $postgraduate['total_score'],
                    ':type_school' => "postgraduate",
                    ':main_major' => $postgraduate['major'],
                    ':able_id' => $_POST['able_id'] ?? 1,
                    ':degree' => $postgraduate['degree']
                );
            }

            $activities = [];
            foreach ($_POST['activity'] as $activity) {
                $activities[] = array(
                    ':date_start_activity' => $activity['start_date'],
                    ':date_end_activity' => $activity['end_date'],
                    ':organizational_name' => $activity['organization'],
                    ':able_id' => $_POST['able_id'] ?? 1,
                    ':contents' => $activity['content']
                );
            }

            $trainings = [];
            foreach ($_POST['training'] as $training) {
                $trainings[] = array(
                    ':date_start' => $training['start_date'],
                    ':date_end' => $training['end_date'],
                    ':name' => $training['name'],
                    ':organizational_name' => $training['organization'],
                    ':able_id' => $_POST['able_id'] ?? 1,
                    ':contents' => $training['content']
                );
            }
            $addSuccess = $generic->addStep2($mainPayload, $academies, $postgraduates, $activities, $trainings);
            if ($addSuccess) {
                http_response_code(201);
                echo json_encode(array('status' => 'success'));
            } else {
                http_response_code(500);
                echo json_encode(array('status' => 'fail'));
            }
            break;
    }
}
?>