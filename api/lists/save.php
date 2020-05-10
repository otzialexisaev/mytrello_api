<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET');
include_once '../../rb-mysql.php';

R::setup('mysql:host=localhost;dbname=mytrello',
    'root');

$post =  json_decode(file_get_contents('php://input'), true);

$title = isset($post['title']) ? $post['title'] : die();
$desk_id = isset($post['desk_id']) ? $post['desk_id'] : die();

// todo проверять повторы

//var_dump($title);
//
$list = R::dispense('lists');
$list->title = $title;
$listId = R::store($list);

$link = R::dispense('desks2lists');
$link->desk_id = $desk_id;
$link->list_id = $listId;
R::store($link);

//echo json_encode($data);