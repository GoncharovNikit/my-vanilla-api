<?php

$data = json_decode(file_get_contents('php://input'), true);

if (
    isset($data['title']) &&
    isset($data['price']) &&
    isset($data['description'])
) {
    try {
        require "../database.php";

        $db = Database::getConnection();
        $ins_query = $db->prepare("INSERT INTO products(title, price, `description`) VALUES(?, ?, ?)");
        $ins_query->execute(array($data['title'], $data['price'], $data['description']));

        if ($ins_query->rowCount()) {
            http_response_code(201);
            echo json_encode(['success' => $ins_query->rowCount(), 'status' => 201]);
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
