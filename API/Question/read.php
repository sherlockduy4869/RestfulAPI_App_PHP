<?php

    header('Access-Control-Allow-Origin:*');
    header('Content-Type; application/json');

    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Config/db.php';
    include_once $_SERVER['DOCUMENT_ROOT'].'/RestFullAPI_App/Model/question.php';

?>