<?php

require_once 'C:/xampp/htdocs/projects/carestream/public/connection.php';
require_once 'C:/xampp/htdocs/projects/carestream/public/functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['id'])) {
        $id = test_input($_POST['id']);

        $sql = "select id, first_name, last_name, email, contact from doctors where id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = $result->fetch_assoc();

        echo json_encode($data);

        $stmt->close();
        $conn->close();
    } else {
        echo json_encode(["error" => "ID not provided"]);
    }
}
