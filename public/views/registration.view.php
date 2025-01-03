<?php
$header = 'Registration';

require 'partials/head.php';
?>

<div class="md:container mx-auto px-4 flex items-center justify-center h-full"> <!--content wrapper-->
    <div class="bg-white w-1/2 p-4">
        <h2 class="text-center text-3xl fav-color font-bold">Registration Form</h2>
        <form action="" method="post">
            <div>
                <!--First Name-->
                <input type="text" name="" class="form-input" placeholder="First Name" pattern="[A-Za-z]{1,32}" title="Only alphabet letters are allowed" required>
            </div>
            <div>
                <!--Last Name-->
                <input type="text" name="" class="form-input" placeholder="Last Name" pattern="[A-Za-z]{1,32}" title="Only alphabet letters are allowed" required>
            </div>
            <div>
                <!--Email-->
                <input type="text" name="" id="email" class="form-input" placeholder="Email" required>
            </div>
            <div>
                <!--Contact-->
                <input type="tel" name="" class="form-input" placeholder="Contact" id="contact" required>
            </div>
            <div>
                <!--Password-->
                <input type="password" name="" class="form-input" id="password" placeholder="Password" required>
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
