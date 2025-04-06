<?php
$header = "Admin page";
$view = 'doctors';

require 'partials/general/head.php';
?>

<body class="text-gray-600 bg-gray-100 font-poppins" id="home">
    <div class="lg:container mx-auto py-3"><!--content wrapper-->
        <!-- include header -->
        <?php require 'partials/admin/header.php' ?>

        <div class="grid lg:grid-cols-6 mt-3 h-full gap-4"> <!--main-->
            <!--include sidebar -->
            <?php require 'partials/admin/sidebar.php' ?>
            
            <div class="lg:col-span-5">

            </div>
        </div>
    </div>
</body>