<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../rb-mysql.php';
R::setup( 'mysql:host=localhost;dbname=mytrello',
    'root');
$id = isset($_GET['id']) ? $_GET['id'] : die();
$desk = R::load('desks', $id);
echo json_encode($desk);

//include_once '../../config/Database.php';
//include_once '../../models/Desks.php';
//
//$db = new Database();
//$conn = $db->connect();
//$model = new Desks($conn);
//
//$model->id = isset($_GET['id']) ? $_GET['id'] : die();
//
//$model->getOne();
//$desks = $model->get();
//$num = $desks->rowCount();
