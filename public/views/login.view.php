<?php
$header = 'Login';

require 'partials/general/head.php';
require 'connection.php';

if (isset($_GET['redirect'])) {
    alert("Email verification successful. You can proceed to login.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    try {
        $username = test_input($_POST['username']);
        $password = test_input($_POST['password']);

        $sql = "select * from patients where email = ?";

        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            $stmt->execute();

            $result  = $stmt->get_result();

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                //check password against stored hash
                if (password_verify($password, $row['password']) && $username === $row['email']) {
                    $url = "/projects/carestream/public/2FA";
                    header('Location: ' . $url);
                } else {
                    alert("Invalid credentials");
                }
            }
        }
    } catch (Exception $e) {
        alert("Error: " . $e->getMessage());
    }
}
?>

<body class="text-gray-600 bg-gray-100 font-poppins">
    <div class="md:container mx-auto flex items-center justify-center min-h-screen"> <!--content wrapper-->
        <div class="bg-white w-1/2 p-16">
            <h2 class="text-center text-3xl fav-color font-bold">Welcome Back!</h2>
            <form action="/projects/carestream/public/login" method="POST">
                <div>
                    <!--Email-->
                    <input type="email" name="username" class="form-input" placeholder="Email">
                </div>
                <div>
                    <!--Password-->
                    <input type="password" name="password" class="form-input" placeholder="Password">
                </div>
                <div class="text-center">
                    <button type="submit" class="border-solid border-2 my-3 p-3 rounded-lg fav-bg">
                        <span class="uppercase text-white">login</span>
                    </button>
                </div>
            </form>

            <div class="text-center text-sm">
                <a href="#" class="fav-color">Forgot password?
            </div>
        </div>
    </div>
</body>