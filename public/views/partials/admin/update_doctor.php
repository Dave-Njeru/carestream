<?php

require_once 'C:/xampp/htdocs/projects/carestream/public/connection.php';
require_once 'C:/xampp/htdocs/projects/carestream/public/functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = test_input($_POST['id']);
    $first_name = test_input($_POST['first_name']);
    $last_name = test_input($_POST['last_name']);
    $email = test_input($_POST['email']);
    $contact = test_input($_POST['contact']);

    $sql = "UPDATE doctors SET first_name = ?, last_name = ?, email = ?, contact = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $first_name, $last_name, $email, $contact, $id);
    $stmt->execute();

    if($stmt->affected_rows > 0) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "No changes made or an error occurred"]);
    }

    $stmt->close();
    $conn->close();
}
