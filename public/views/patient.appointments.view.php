<?php
$header = "Patient Appointments";
$view = "appointments";

require_once 'partials/general/head.php';
require_once 'C:\xampp\htdocs\projects\carestream\public\connection.php';

try {
    // Query data
    $sql = "SELECT * FROM appointments";

    $stmt = $conn->query($sql); // To be used later in the code
} catch (Exception $e) {
    echo "Error: " . htmlspecialchars($e->getMessage());
} finally {
    // Close database connection
    $conn->close();
}
?>

<body class="bg-gray-100">

    <div class="min-h-screen flex">
        <!-- Import sidebar php page -->
        <?php require 'partials/patient/sidebar.php'; ?>

        <!-- Main content -->
        <div class="flex-1 flex flex-col">
            <!-- Import header php page -->
            <?php require 'partials/patient/header.php'; ?>

            <!-- Dashboard -->
            <main>
                <!-- Booking form -->
                <section class="bg-white rounded-xl shadow-lg p-8 max-w-2xl">
                    <h1 class="text-2xl font-bold text-blue-600 mb-4">Book an Appoinment</h1>
                    <form class="space-y-4" id="patientAppointmentForm" method="POST">
                        <!-- Doctor Selection -->
                        <div>
                            <label for="doctor" class="block text-sm font-medium text-gray-700 mb-1">Select Doctor</label>
                            <select id="doctor" name="doctor" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required>
                                <option value="">-- Select Doctor --</option>
                                <option value="Dr. Smith">Dr. Smith (Cardiologist)</option>
                                <option value="Dr. Lee">Dr. Lee (General Practitioner) </option>
                                <option value="Dr. Kimani">Dr. Kimani (Dermatologist)</option>
                            </select>
                        </div>
                        <!-- Date -->
                        <div>
                            <label for="date" class="block text-sm font-medium text-gray-700 mb-1">Date</label>
                            <input type="date" id="date" name="date" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" min="" required>
                        </div>
                        <!-- Time -->
                        <div>
                            <label for="time" class="block text-sm font-medium text-gray-700 mb-1">Time</label>
                            <input type="time" id="time" name="time" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" min="" required>
                        </div>
                        <!-- Reason -->
                        <div>
                            <label for="reason" class="block text-sm font-medium text-gray-700 mb-1">Reason</label>
                            <textarea id="reason" name="reason" rows="3" class="block w-full border-gray-300 rounded-md shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200" required></textarea>
                        </div>
                        <!-- Submit Button -->
                        <div>
                            <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-md shadow">Book Appointment</button>
                        </div>
                    </form>
                </section>
                <!-- Display all appointments -->
                <section class="bg-white rounded-xl shadow-lg p-8 mt-3">
                    <h2 class="text-xl font-bold text-blue-600 mb-2">Previous Appointments</h2>
                    <table id="appointments" class="display text-sm">
                        <thead>
                            <tr>
                                <th>Appointment Date</th>
                                <th>Time</th>
                                <th>Doctor</th>
                                <th>Reason</th>
                                <th>Status</th>
                                <th>Created at</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($stmt->num_rows > 0) {
                                // Output data of each row
                                while ($row = $stmt->fetch_assoc()) {
                                    echo "<tr>
                                            <td>{$row['appointment_date']}</td>
                                            <td>{$row['appointment_time']}</td>
                                            <td>{$row['doctor']}</td>
                                            <td>{$row['reason']}</td>
                                            <td>{$row['appointment_status']}</td>
                                            <td>{$row['created_at']}</td>
                                        </tr>";
                                }
                            } else {
                                // Datatable plugin handles this part
                            }
                            ?>
                        </tbody>
                    </table>
                </section>
            </main>
        </div>
    </div>

    <script defer>
        // Validate date and time
        const now = new Date()

        const dateToday = now.toISOString().split('T')[0] // get current date
        document.getElementById('date').setAttribute('min', dateToday)

        document.getElementById('patientAppointmentForm').addEventListener('submit', function(e) {
            e.preventDefault()

            const dateSelected = document.getElementById('date').value
            const timeSelected = document.getElementById('time').value

            const hours = String(now.getHours()).padStart(2, '0')
            const minutes = String(now.getMinutes()).padStart(2, '0')
            const currentTime = `${hours}:${minutes}`

            // if user bypasses minimum setAttribute, check date
            if (dateSelected < dateToday) {
                alert('Please select a date from today onwards')
                return
            }

            //If date is today, then check if time is valid
            if (dateSelected === dateToday) {
                if (timeSelected < currentTime) {
                    Swal.fire("Oops...", "Please select a time later than current time!", "error");
                    return
                }
            }

            // AJAX request to submit form
            const form_data = new FormData(this);

            fetch('<?= BASE_URL ?>/views/partials/patient/appointments.php', {
                    method: 'POST',
                    body: form_data
                })
                .then((response) => {
                    return response.json()
                })
                .then((result) => {
                    if (result.success) {
                        Swal.fire({
                            title: "Operation successful!",
                            text: "Your appointment has been successfully saved",
                            icon: "success",
                        }).then(() => {
                            location.reload(); // Reload the page to clear form
                        })
                    } else {
                        Swal.fire("Error!", result.error, "error"); // Error from server
                    }
                })
                .catch((err) => {
                    Swal.fire("Error!", "Could not fetch data: " + err, "error"); // Error from fetch request
                })
        })

        // Datatable plugin for appointments table
        $(document).ready(function() {
            //admin dashboard
            $('#appointments').DataTable({});
        });
    </script>
</body>