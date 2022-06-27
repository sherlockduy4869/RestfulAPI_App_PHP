<?php

class Question{
    private $conn;

    //question property
    public $id_question;
    public $title;
    public $option_a;
    public $option_b;
    public $option_c;
    public $option_d;
    public $right_answer;

    //connect db
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //read data
    public function read(){
        $query = "SELECT * FROM tbl_question ORDER BY tbl_question.ID_QUESTION DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}

?>