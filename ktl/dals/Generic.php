<?php
require_once 'DB.php';

class Generic extends DB
{
    public function __construct()
    {
        parent::__construct();
    }

    public function addStep2(
        $mainPayload,
        $academies,
        $postgraduates,
        $activities,
        $trainings
    )
    {
        try {
            $this->pdo->beginTransaction();
            $this->pdo->prepare("INSERT INTO apply_step_2(able_id,
                         name_high_school,
                         graduation_high_school_year,
                         status_graduation_high_school,
                         participate_exam_college,
                         not_graduated,
                         major_main_id,
                         major_sub
                         ) VALUES (:able_id,
                                   :name_high_school,
                                   :graduation_high_school_year,
                                   :status_graduation_high_school,
                                   :participate_exam_college,
                                   :not_graduated,
                                   :major_main_id,
                                   :major_sub)")->execute($mainPayload);

            foreach ($academies as $academy) {
                $this->pdo->prepare("INSERT INTO university(name,
                       date_start,
                       date_end,
                       status_graduate,
                       poit_average,
                       total_point,
                       type_school,
                       main_major,
                       able_id,
                       degree 
                         ) VALUES (
                       :name,
                       :date_start,
                       :date_end,
                       :status_graduate,
                       :poit_average,
                       :total_point,
                       :type_school,
                       :main_major,
                       :able_id,
                       :degree )")->execute($academy);
            }


            foreach ($postgraduates as $postgraduate) {
                $this->pdo->prepare("INSERT INTO university(name,
                       date_start,
                       date_end,
                       status_graduate,
                       poit_average,
                       total_point,
                       type_school,
                       main_major,
                       able_id,
                       degree 
                         ) VALUES (
                       :name,
                       :date_start,
                       :date_end,
                       :status_graduate,
                       :poit_average,
                       :total_point,
                       :type_school,
                       :main_major,
                       :able_id,
                       :degree )")->execute($postgraduate);
            }


            foreach ($activities as $activity) {
                $this->pdo->prepare("INSERT INTO recruit_able_activity(able_id,
                         date_start_ativity,
                         date_end_activity,
                         organizational_name,
                         contents
                         ) VALUES (
                                   :able_id,
                         :date_start_activity,
                         :date_end_activity,
                         :organizational_name,
                         :contents)")->execute($activity);
            }

            foreach ($trainings as $training) {
                $this->pdo->prepare("INSERT INTO trainning(
                         name,
                         able_id,
                         date_start,
                         date_end,
                         organizational_name,
                         contents
                         ) VALUES (
                         :name,
                         :able_id,
                         :date_start,
                         :date_end,
                         :organizational_name,
                         :contents
                         )")->execute($training);
            }


            $this->pdo->commit();
        } catch (Exception $exception) {
            $this->pdo->rollBack();
            return false;
        }
        return true;
    }
}

?>