<?php

require_once "./database.php";

$db = Database::getConnection();
$data = $db->query('SELECT * FROM products')->fetchAll(PDO::FETCH_ASSOC);

if ($data) {
    http_response_code(200);
    echo json_encode(['data' => $data, 'code' => 200]);
} else {
    http_response_code(500);
    echo "Error occured!";
}
