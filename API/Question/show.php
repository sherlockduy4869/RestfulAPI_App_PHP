<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type: application/json');

    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Config/db.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Model/question.php';

    $db = new db();
    $connect = $db->connect();

    $question = new Question($connect);
    $question->ID_QUESTION = isset($_GET['id']) ? $_GET['id'] : die();

    $question->show();

    $question_item = array(
        'id_question' => $question->ID_QUESTION,
        'title' => $question->TITLE,
        'option_a' => $question->OPTION_A,
        'option_b' => $question->OPTION_B,
        'option_c' => $question->OPTION_C,
        'option_d' => $question->OPTION_D,
        'right_answer' => $question->RIGHT_ANSWER
    );

    print_r(json_encode($question_item));


?>