<?php
$header = "Admin page";
$view = 'doctors';

require 'partials/general/head.php';
require 'connection.php';

//get values from form and register doctor
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $first_name = $last_name = $email = $contact = $hashed_password = $password = "";
    $first_name = test_input($_POST['first_name']);
    $last_name = test_input($_POST['last_name']);
    $email = test_input($_POST['email']);
    $contact = test_input($_POST['contact']);
    $password = test_input($_POST['password']);
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);
    $verification_token = bin2hex(random_bytes(16));

    try {
        $sql = "insert into doctors (first_name, last_name, email, contact, password, verification_token) values (?, ?, ?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssss", $first_name, $last_name, $email, $contact, $hashed_password, $verification_token);
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            alert("Doctor successfully registered");
        }

        $stmt->close();
        $conn->close();
    } catch (Exception $e) {
        alert("An error occurred: " . $e->getMessage());
    }
}
?>

<body class="text-gray-600 bg-gray-100 font-poppins" id="home">
    <!--content wrapper-->
    <div class="lg:container mx-auto py-3">
        <?php require 'partials/admin/header.php' ?><!-- include header -->

        <!--main-->
        <div class="grid lg:grid-cols-6 mt-3 h-full gap-4">
            <?php require 'partials/admin/sidebar.php' ?><!--include sidebar -->

            <div class="lg:col-span-5">
                <div class="grid grid-cols-4 gap-4"><!--mini navbar-->
                    <button class="p-4 text-center bg-white admin_mini_navbar" id="register_doctor">
                        <i class="fa fa-user-plus" aria-hidden="true"></i> <span class="pl-2">Register</span>
                    </button>
                    <button class="p-4 text-center bg-white admin_mini_navbar" id="view_all_doctors">
                        <i class="fa fa-list" aria-hidden="true"></i> <span class="pl-2">View all</span>
                    </button>
                </div>

                <!--content updates-->
                <div class="pt-3" id="update_content">
                    Choose activity...
                </div>
            </div>
        </div>
    </div>
    <script src="<?= BASE_URL ?>/js/doctors_fetch_api.js" defer></script>
</body>