<?php
$header = "Admin page";

require 'partials/general/head.php';
?>

<body class="text-gray-600 bg-gray-100 font-poppins" id="home">
    <div class="lg:container mx-auto py-3"><!--content wrapper-->
        <!-- include header -->
        <?php require 'partials/admin/header.php' ?>

        <div class="grid lg:grid-cols-6 mt-3 h-full gap-4"> <!--main-->
            <!--include sidebar -->
            <?php require 'partials/admin/sidebar.php' ?>
            
            <div class="lg:col-span-5"><!--population-->
                <div class="grid lg:grid-cols-4 gap-4">
                    <div class="bg-white p-4 text-center"> <!--patients-->
                        <i class="fa fa-users text-green-500" aria-hidden="true"></i>
                        <p>Total Patients: <span>34</span></p>
                    </div>
                    <div class="bg-white p-4 text-center"><!--doctors-->
                        <i class="fa fa-user-md text-red-500" aria-hidden="true"></i>
                        <p>Total Doctors: <span>34</span></p>
                    </div>
                    <div class="bg-white p-4 text-center"><!--staff-->
                        <i class="fa fa-users text-yellow-500" aria-hidden="true"></i>
                        <p>Total Staff: <span>34</span></p>
                    </div>
                    <div class="bg-white p-4 text-center"><!--appointments-->
                        <i class="fa fa-calendar text-sky-500" aria-hidden="true"></i>
                        <p>Total Appointments: <span>34</span></p>
                    </div>
                </div>

                <div class="grid lg:grid-cols-4 mt-4"><!--view appointments-->
                    <div class="lg:col-span-3 bg-white p-3 text-sm">
                        <h2 class="font-bold">Appointments</h2>
                        <?php
                        //sample data
                        $entries =  [
                            ["Kenza Team", "Regular visit to kana forest", "2018-02-01", "Barn-kenya"],
                            ["Tsaro team building", "Team building activities", "2018-02-01", "Black-wings"],
                            ["Masa team building", "Game reserve for team building", "2018-02-01", "Barn-kenya"]
                        ]
                        ?>
                        <table id="entriesTable" class="display text-sm">
                            <thead>
                                <tr>
                                    <th>Program name</th>
                                    <th>Description</th>
                                    <th>Start date</th>
                                    <th>Coordinator</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($entries as $entry) : ?>
                                    <tr>
                                        <td><?= $entry[0]; ?></td>
                                        <td><?= $entry[1]; ?></td>
                                        <td><?= $entry[2]; ?></td>
                                        <td><?= $entry[3]; ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="<?= BASE_URL ?>/js/appointments.js" defer></script>
</body>