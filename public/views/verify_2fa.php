<?php
session_start();

require 'C:\xampp\htdocs\projects\carestream\vendor\autoload.php';

use OTPHP\TOTP;

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['code']) && isset($_SESSION['totp_secret'])) {
        $code = $_POST['code'];
        // Recreate TOTP secret with saved secret
        $totp = TOTP::create($_SESSION['totp_secret']);

        // Verify the code
        if ($totp->verify($code)) {
            echo json_encode(['success' => true]);
        } else {
            echo json_encode(['success' => false, 'message' => 'Invalid code. Please try again']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Missing code or secret']);
    }
}
