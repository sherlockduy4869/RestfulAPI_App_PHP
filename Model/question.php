<?php

class Question{
    private $conn;

    //question property
    public $ID_QUESTION;
    public $TITLE;
    public $OPTION_A;
    public $OPTION_B;
    public $OPTION_C;
    public $OPTION_D;
    public $RIGHT_ANSWER;

    //connect db
    public function __construct($db)
    {
        $this->conn = $db;
    }

    //read data
    public function read(){
        $query = "SELECT * FROM tbl_question ORDER BY ID_QUESTION DESC";

        $stmt = $this->conn->prepare($query);

        $stmt->execute();

        return $stmt;
    }

}

?>