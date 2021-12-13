<?php

if (isset($_GET['id'])) {
    require "../database.php";
    try {
        $db = Database::getConnection();
        $prod_id = $_GET['id'];
        $deleted_count = $db->exec('DELETE FROM `products` WHERE id = ' . $prod_id);
        if ($deleted_count > 0) {
            http_response_code(202);   
            echo json_encode(['success' => $deleted_count, 'status' => 202]);
        } else {
            http_response_code(500);
            echo json_encode(['error' => 'Database or server inner error..', 'status' => 500]);
        }
    } catch (PDOException $ex) {
        http_response_code(500);
        echo json_encode(['error' => $ex->getMessage(), 'status' => 500]);
    }
} else {
    http_response_code(422);
    echo json_encode(['error' => 'Not enough data..', 'status' => 422]);
}