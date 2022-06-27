<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type; application/json');

    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Config/db.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Model/question.php';

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);
    $read = $question->read();

    $num = $read->rowCount();
    if($num>0){
        $question_array = [];
        $question_array['data'] = [];

        while($row = $read->fetch(PDO::FETCH_ASSOC)){
            
            extract($row);

            $question_item = array(
                'id_question' => $ID_QUESTION,
                'title' => $TITLE,
                'option_a' => $OPTION_A,
                'option_b' => $OPTION_B,
                'option_c' => $OPTION_C,
                'option_d' => $OPTION_D,
                'right_answer' => $RIGHT_ANSWER
            );

            array_push($question_array['data'],$question_item);
        }
        echo json_encode($question_array);
    }

?>