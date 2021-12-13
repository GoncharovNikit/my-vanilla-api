<?php


$data = json_decode(file_get_contents('php://input'), true);

if (
    isset($data['id']) &&
    isset($data['title']) &&
    isset($data['price']) &&
    isset($data['description'])
) {
    try {
        require "../database.php";
        
        $db = Database::getConnection();
        $edit_query = $db->prepare('UPDATE `products` SET `title` = ?, `price` = ?, `description` = ? WHERE id = ?');
        $edit_query->execute([
            $data['title'],
            $data['price'],
            $data['description'],
            $data['id'],
        ]);

        if ($edit_query->rowCount() > 0) {
            http_response_code(204);
            echo json_encode(['success' => $edit_query->rowCount(), 'status' => 204]);
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
