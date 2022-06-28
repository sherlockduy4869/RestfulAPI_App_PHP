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

    public function show(){
        $query = "SELECT * FROM tbl_question WHERE ID_QUESTION =? LIMIT 1";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(1, $this->ID_QUESTION);
        $stmt->execute();
        
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $this->TITLE = $row['TITLE'];
        $this->OPTION_A = $row['OPTION_A'];
        $this->OPTION_B = $row['OPTION_B'];
        $this->OPTION_C = $row['OPTION_C'];
        $this->OPTION_D = $row['OPTION_D'];
        $this->RIGHT_ANSWER = $row['RIGHT_ANSWER'];
        
    }

}

?>