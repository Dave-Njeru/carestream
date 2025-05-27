<?php
$header = "Patient page";

require 'partials/general/head.php';
?>

<body class="bg-gray-100">
    <div class="min-h-screen flex">
        <!--sidebar-->
        <aside class="w-64 bg-white shadow-md hidden md:block">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-blue-600">CareStream</h2>
            </div>
            <nav class="mt-8">
                <a href="#" class="block px-6 py-3 text-gray-700 font-bold hover:bg-blue-50">Dashboard</a>
                <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-blue-50">Appointments</a>
                <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-blue-50">Medical Records</a>
                <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-blue-50">Prescriptions</a>
                <a href="#" class="block px-6 py-3 text-gray-700 hover:bg-blue-50">Profile</a>
            </nav>
        </aside>
        <!--Main content-->
        <div class="flex-1 flex flex-col">
            <!--Header-->
            <header class="bg-wite shadow px-6 py-4 flex items-center justify-between">
                <div>
                    <h1 class="text-xl font-bold text-gray-800">Welcome, Jane Doe</h1>
                    <p class="text-gray-500 text-sm">Patient ID: 1234567</p>
                </div>
                <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Patient" class="w-12 h-12 rounded-full border-2 border-blue-500">
            </header>
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