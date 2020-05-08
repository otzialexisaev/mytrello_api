<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
include_once '../../rb-mysql.php';

R::setup('mysql:host=localhost;dbname=mytrello',
    'root');

$deskId = isset($_GET['desk_id']) ? $_GET['desk_id'] : die();

$data['data'] = R::find('lists', 'LEFT JOIN desks2lists on lists.id = desks2lists.list_id WHERE desks2lists.desk_id = ?', [$deskId]);
echo json_encode($data);