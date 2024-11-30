<?php
$header = 'Login';

require 'partials/head.php';

?>

<div class="md:container mx-auto px-4 flex items-center justify-center h-full"> <!--content wrapper-->
    <div class="bg-white w-1/2 p-16">
        <h2 class="text-center text-3xl fav-color font-bold">Welcome Back!</h2>
        <form action="#">
            <div>
                <!--Email-->
                <input type="text" name="" id="" class="form-input" placeholder="Email">
            </div>
            <div>
                <!--Password-->
                <input type="password" name="" id="" class="form-input" placeholder="Password">
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