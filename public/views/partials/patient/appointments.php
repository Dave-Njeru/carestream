<?php

require 'C:\xampp\htdocs\projects\carestream\public\connection.php'; 
require 'C:\xampp\htdocs\projects\carestream\public\functions.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $doctor = test_input($_POST['doctor']);
    $date = test_input($_POST['date']);
    $time = test_input($_POST['time']);
    $reason = test_input($_POST['reason']);

    $sql = "INSERT INTO appointments (
    appointment_date,
    appointment_time,
    doctor,
    reason) VALUES (?, ?, ?, ?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssss', $date, $time, $doctor, $reason);
    $stmt->execute();

    if ($stmt->affected_rows > 0) {
        echo json_encode(["success" => true]);
    } else {
        echo json_encode(["success" => false, "error" => "An error occurred"]);
    }

    $stmt->close();
    $conn->close();
}
