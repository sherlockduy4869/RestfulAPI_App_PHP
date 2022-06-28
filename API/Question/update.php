<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: PUT');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Config/db.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Model/question.php';

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);

    $data = json_decode(file_get_contents("php://input"));

    $question->ID_QUESTION = $data->id_question;
    $question->TITLE = $data->title;
    $question->OPTION_A = $data->option_a;
    $question->OPTION_B = $data->option_b;
    $question->OPTION_C = $data->option_c;
    $question->OPTION_D = $data->option_d;
    $question->RIGHT_ANSWER = $data->right_answer;

    if($question->update()){
        echo json_encode(array('message','Question was updated'));
    }
    else{
        echo json_encode(array('message','Question was not updated'));
    }


?>