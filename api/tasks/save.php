<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET');
include_once '../../rb-mysql.php';

R::setup('mysql:host=localhost;dbname=mytrello',
    'root');

$post =  json_decode(file_get_contents('php://input'), true);

$title = isset($post['title']) ? $post['title'] : die();
$listId = isset($post['list_id']) ? $post['list_id'] : die();

// todo проверять повторы

//var_dump($title);
//
$task = R::dispense('tasks');
$task->title = $title;
$task_id = R::store($task);

$link = R::dispense('lists2tasks');
$link->task_id = $task_id;
$link->list_id = $listId;
R::store($link);

//echo json_encode($data);