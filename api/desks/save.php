<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST, GET');
include_once '../../rb-mysql.php';

R::setup('mysql:host=localhost;dbname=mytrello',
    'root');

$post =  json_decode(file_get_contents('php://input'), true);

$title = isset($post['title']) ? $post['title'] : die();

//var_dump($title);
//
$desk = R::dispense('desks');
$desk->title = $title;
R::store($desk);


//echo json_encode($data);