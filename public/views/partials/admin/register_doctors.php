<div class="bg-white p-4">
    <h2 class="text-center text-3xl fav-color font-bold">Register Doctor</h2>
    <form action="" method="POST">
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
                <span class="uppercase text-white">SAVE</span>
            </button>
        </div>
    </form>
</div>
<script src="/projects/carestream/public/js/validate_reg_form.js" defer></script>