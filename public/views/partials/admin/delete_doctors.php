<?php
require 'C:/xampp/htdocs/projects/carestream/public/connection.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = intval($_POST['id']);

        // if($conn->connect_error) {
        //     echo json_encode(["success" => false, "error" => "DB connection failed"]);
        //     exit;
        // }

        $stmt = $conn->prepare("DELETE FROM doctors WHERE id = ?");
        $stmt->bind_param('i', $id);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["success" => false, "error" => "Deletion failed"]);
        }
    } else {
        echo json_encode(["success" => false, "error" => "ID not provided"]);
    }
}
