<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

$header = 'Registration';

require 'partials/general/head.php';
require 'connection.php';
require '../vendor/autoload.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $first_name = $last_name = $email = $contact = $hashed_password = $password = "";
    $first_name = test_input($_POST['first_name']);
    $last_name = test_input($_POST['last_name']);
    $email = test_input($_POST['email']);
    $contact = test_input($_POST['contact']);
    $password = test_input($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $verification_token = bin2hex(random_bytes(16));
    // Prepare and execute the SQL statement
    try {
        $sql = "INSERT INTO patients (first_name, last_name, email, contact, password, verification_token, is_verified) VALUES (?, ?, ?, ?, ?, ?, 0)";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("ssssss", $first_name, $last_name, $email, $contact, $hashed_password, $verification_token);
            $stmt->execute();
            if ($stmt->affected_rows > 0) {
                //install PHPMailer via Composer using: composer require phpmailer/phpmailer
                //install phpdotenv vai Composer using: composer require vlucas/phpdotenv
                $mail = new PHPMailer(true);
                $dotenv = Dotenv\Dotenv::createImmutable('C:\xampp\htdocs\projects\carestream');
                $dotenv->load();

                // Server settings
                $mail->isSMTP();
                $mail->Host = 'smtp.gmail.com';
                $mail->SMTPAuth = true;
                $mail->Username = $_ENV['USERNAME'];
                $mail->Password = $_ENV['PASSWORD'];
                $mail->SMTPSecure = 'tls';
                $mail->Port = 587;
                // Recipients 
                $mail->setFrom($_ENV['USERNAME'], 'Carestream');
                $mail->addAddress($email);
                // Content
                $verification_link = "https://127.0.0.1/projects/carestream/public/verify?token=" . $verification_token;
                $mail->isHTML(true);
                $mail->Subject = 'Email verification';
                $mail->Body = 'Click the link to verify your email: ' . $verification_link;
                if ($mail->send()) {
                    alert("A verification email has been sent to your email address.");
                }
            }
            $stmt->close();
        }
        $conn->close();
    } catch (Exception $e) {
        alert("Error: " . $e->getMessage());
    }
}
?>

<body class="text-gray-600 bg-gray-100 font-poppins">
    <div class="md:container mx-auto flex items-center justify-center h-full"> <!--content wrapper-->
        <div class="bg-white w-1/2 p-4">
            <h2 class="text-center text-3xl fav-color font-bold">Registration Form</h2>
            <form action="/projects/carestream/public/register" method="POST">
                <div>
                    <!--First Name-->
                    <input type="text" name="first_name" class="form-input" placeholder="First Name" pattern="[A-Za-z]{1,32}" title="Only alphabet letters are allowed" required>
                </div>
                <div>
                    <!--Last Name-->
                    <input type="text" name="last_name" class="form-input" placeholder="Last Name" pattern="[A-Za-z]{1,32}" title="Only alphabet letters are allowed" required>
                </div>
                <div>
                    <!--Email-->
                    <input type="text" name="email" id="email" class="form-input" placeholder="Email" required>
                </div>
                <div>
                    <!--Contact-->
                    <input type="tel" name="contact" class="form-input" placeholder="Contact eg. 254111222333" id="contact" required>
                </div>
                <div>
                    <!--Password-->
                    <input type="password" name="password" class="form-input" id="password" placeholder="Password" required>
                </div>
                <div class="text-center">
                    <button type="submit" class="border-solid border-2 my-3 p-3 rounded-lg fav-bg">
                        <span class="uppercase text-white">create account</span>
                    </button>
                </div>
            </form>

            <div class="text-center text-sm">
                Already have an account? <a href="#" class="fav-color">Sign in</a>
            </div>
        </div>
    </div>
    <script src="<?= BASE_URL ?>/js/validate_reg_form.js" defer></script>
</body>