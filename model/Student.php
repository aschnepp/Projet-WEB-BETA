<?php
require_once("{$_SERVER["DOCUMENT_ROOT"]}/model/Model.php");

class Student
{
    private int $id;

    private int $campusId;

    private int $promotionId;

    public function __construct(int $id, int $campusId, int $promotionId)
    {
        $this->id = $id;
        $this->campusId = $campusId;
        $this->promotionId = $promotionId;
    }

    public function get($name)
    {
        return $this->$name;
    }

    public function insertForStudent(Student $data)
    {

        try {
            $Model = new Model;

            $sqlString = "INSERT INTO students (user_id, campus_id, promotion_id)
            VALUES (:user_id, :campus_id, :promotion_id)";
            $query = $Model->pdo->prepare($sqlString);
            $query->bindParam(":user_id", $data->get('id'));
            $query->bindParam(":campus_id", $data->get('campusId'));
            $query->bindParam(":promotion_id", $data->get('promotionId'));
            $query->execute();
        } catch (Exception $e) {
            error_log($e->getMessage());
            exit('Something bad happened');
        }
    }
}
