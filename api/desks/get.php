<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

include_once '../../rb-mysql.php';
R::setup( 'mysql:host=localhost;dbname=mytrello',
    'root');

$desk = R::findAll('desks');
echo json_encode($desk);

//include_once '../../config/Database.php';
//include_once '../../models/Desks.php';
//
//$db = new Database();
//$conn = $db->connect();
//$model = new Desks($conn);
//$desks = $model->get();
//$num = $desks->rowCount();
//
//if ($num > 0) {
//    $data = [];
//    $data['data'] = [];
//    while ($row = $desks->fetch(PDO::FETCH_ASSOC)) {
//        $data['data'][] = [
//            'id' => $row['id'],
//            'title' => $row['title'],
//            'is_favourite' => $row['is_favourite'],
//        ];
//    }
//
//    $data = json_encode($data);
//    echo $data;
//} else {
//    echo json_encode(['data' => [], 'msg' => 'no desks']);
//}