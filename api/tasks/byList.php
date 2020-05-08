<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../rb-mysql.php';

R::setup('mysql:host=localhost;dbname=mytrello',
    'root');

$list_id = isset($_GET['list_id']) ? $_GET['list_id'] : die();

$data['data'] = R::find('tasks', 'LEFT JOIN lists2tasks on tasks.id = lists2tasks.task_id WHERE lists2tasks.list_id = ?', [$list_id]);
echo json_encode($data);