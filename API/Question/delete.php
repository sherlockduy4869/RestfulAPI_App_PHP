<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: DELETE');
    header('Access-Control-Allow-Headers:Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization,X-Requested-With');

    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Config/db.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Model/question.php';

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);

    $data = json_decode(file_get_contents("php://input"));

    $question->ID_QUESTION = $data->id_question;


    if($question->delete()){
        echo json_encode(array('message','Question was deleted'));
    }
    else{
        echo json_encode(array('message','Question was not deleted'));
    }


?>