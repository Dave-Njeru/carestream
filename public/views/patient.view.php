<?php
$header = "Patient Dashboard";

require 'partials/general/head.php';
?>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!-- Import sidebar php page -->
        <?php require 'partials/patient/sidebar.php'; ?>
        
        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Import header php page -->
             <?php require 'partials/patient/header.php'; ?>

            <!-- Dashboard Grid -->
            <main class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Upcoming Appointment -->
                <section class="bg-white rounded-xl shadow p-6 flex flex-col">
                    <h2 class="text-lg font-semibold text-blue-600 mb-2">Upcoming Appointments</h2>
                    <ul class="text-gray-700 text-sm">
                        <li class="mb-2">
                            <span class="font-bold">Dr. Smith</span> - 2025-05-30 09:00 AM
                        </li>
                        <li>
                            <span class="font-bold">Dr. Lee</span> - 2025-06-10 02:00 PM
                        </li>
                    </ul>
                </section>
                <!-- Recent Activity -->
                <section class="bg-white rounded-xl shadow p-6 flex flex-col">
                    <h2 class="text-lg font-semibold text-blue-600 mb-2">Recent Activity</h2>
                    <ul class="text-gray-700 text-sm">
                        <li class="mb-2">Blood Test Results updated - <span class="text-gray-400">2 days ago</span></li>
                        <li>Prescription renewed <span class="text-gray-400">5 days ago</span></li>
                    </ul>
                </section>
                <!-- Health Stats -->
                <section class="bg-white rounded-xl shadow p-6 flex flex-col">
                    <h2 class="text-lg font-semibold text-blue-600 mb-2">Health Stats</h2>
                    <div class="flex flex-col gap-2">
                        <div class="flex justify-between"><span>Blood Pressure</span><span>120/80 mmHg</span></div>
                        <div class="flex justify-between"><span>Heart Rate</span><span>72 bpm</span></div>
                        <div class="flex justify-between"><span>Weight</span><span>68 kg</span></div>
                    </div>
                </section>
                <!-- Messages -->
                <section class="bg-white rounded-xl shadow p-6 flex flex-col">
                    <h2 class="text-lg font-semibold text-blue-600 mb-2">Messages</h2>
                    <ul class="text-gray-700 text-sm">
                        <li class="mb-2">
                            <span class="font-bold">Dr Smith:</span> Please book a follow-up appointment.
                        </li>
                        <li>
                            <span class="font-bold">Nurse Lee:</span> Don't forget to take your medication.
                        </li>
                    </ul>
                </section>
            </main>
        </div>
    </div>
</body>