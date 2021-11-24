<?php

require_once "./database.php";

$db = Database::getConnection();
$arr_resp = [];
$data = $db->query('SELECT * FROM products', PDO::FETCH_ASSOC);
foreach ($data as $key => $value) {
    array_push($arr_resp, $value);
}

http_response_code(200);
echo json_encode(['data' => $arr_resp, 'code' => 200]);