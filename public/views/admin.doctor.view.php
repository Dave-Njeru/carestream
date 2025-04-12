<?php
$header = "Admin page";
$view = 'doctors';

require 'partials/general/head.php';
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
                    <button class="p-4 text-center bg-white admin_mini_navbar">
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
    <script src="<?= BASE_URL ?>/js/fetch_all_doctors.js" defer></script>
</body>