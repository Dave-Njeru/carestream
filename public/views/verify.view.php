<?php
$header = "Verify email";

require 'partials/general/head.php';
require 'connection.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token exists in the database
    $sql = "SELECT * FROM patients WHERE verification_token = ? AND is_verified = 0";
    if ($stmt = $conn->prepare($sql)) {
        $stmt->bind_param("s", $token);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Token is valid, update user's status
            $sql_update = "UPDATE patients SET is_verified = 1 WHERE verification_token = ?";
            if ($stmt_update = $conn->prepare($sql_update)) {
                $stmt_update->bind_param("s", $token);
                $stmt_update->execute();

                if ($stmt_update->affected_rows > 0) {
                    $url = "/projects/carestream/public/login?redirect";
                    header('Location: ' . $url);
                } else {
                    alert("Verification failed. Please try again.");
                }
                $stmt_update->close();
            }
        } else {
            alert("Invalid or expired verification token.");
        }
        $stmt->close();
    }
    $conn->close();
}
?>

<body class="text-gray-600 bg-gray-100 font-poppins">
    <div class="md:container mx-auto px-4 flex items-center justify-center h-full">
        <p>Verifying email. Please wait...</p>
    </div>
</body>