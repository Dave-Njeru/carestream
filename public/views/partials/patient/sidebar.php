        <!--sidebar-->
        <aside class="w-64 bg-white shadow-md hidden md:block">
            <div class="p-6">
                <h2 class="text-2xl font-semibold text-blue-600">CareStream</h2>
            </div>
            <nav class="mt-8">
                <a href="<?= BASE_URL ?>/patient" class="block px-6 py-3 text-gray-700 <?= $view == 'dashboard' ? 'bg-green-200 font-bold' : 'hover:bg-blue-50' ?>" >Dashboard</a>
                <a href="<?= BASE_URL ?>/patient/appointments" class="block px-6 py-3 text-gray-700 <?= $view == 'appointments' ? 'bg-green-200 font-bold' : 'hover:bg-blue-50' ?>">Appointments</a>
                <a href="#" class="block px-6 py-3 text-gray-700 <?= $view == 'medicalRecords' ? 'bg-green-200 font-bold' : 'hover:bg-blue-50' ?>">Medical Records</a>
                <a href="#" class="block px-6 py-3 text-gray-700 <?= $view == 'prescriptions' ? 'bg-green-200 font-bold' : 'hover:bg-blue-50' ?>">Prescriptions</a>
                <a href="#" class="block px-6 py-3 text-gray-700<?= $view == 'profile' ? 'bg-green-200 font-bold' : 'hover:bg-blue-50' ?>">Profile</a>
            </nav>
        </aside>