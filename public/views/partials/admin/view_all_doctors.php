<?php
require_once 'C:/xampp/htdocs/projects/carestream/public/connection.php';

// Fetch data
try {
    $entries = [];
    $sql = "select id, first_name, last_name, email, contact
        from doctors";

    $stmt = $conn->prepare($sql);
    $stmt->execute();

    $results = $stmt->get_result();

    while ($row = $results->fetch_assoc()) {
        $entries[] = $row;
    }

    $stmt->close();
    $conn->close();
} catch (Exception $e) {
    echo ('Error: ' . $e->getMessage());
    $entries = [];
}
?>

<!-- Display data in a table -->
<div>
    <table id="view_doctors_table" class="display text-sm">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Contact</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($entries as $entry) : ?>
                <tr data-id="<?= htmlspecialchars($entry['id']) ?>"> <!-- Used to update row data upon form submission-->
                    <td><?= htmlspecialchars($entry['id']); ?></td>
                    <td class="first-name"><?= htmlspecialchars($entry['first_name']); ?></td>
                    <td class="last-name"><?= htmlspecialchars($entry['last_name']); ?></td>
                    <td class="email"><?= htmlspecialchars($entry['email']); ?></td>
                    <td class="contact"><?= htmlspecialchars($entry['contact']); ?></td>
                    <td>
                        <button class="btn btn-primary btn-sm font-normal normal-case edit_btn" data-id="<?= htmlspecialchars($entry['id']) ?>">Edit</button>
                        <button class="btn btn-error btn-sm font-normal normal-case delete_btn" data-id="<?= htmlspecialchars($entry['id']) ?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div>
    <!-- Modal for data update -->
    <dialog id="update_modal" class="modal">
        <div class="modal-box">
            <form method="dialog">
                <button class="btn btn-sm btn-circle btn-ghost absolute right-2 top-2">✕</button>
            </form>
            <h3 class="text-lg font-bold pb-2">Edit Doctor</h3>
            <form id="update_doctor_form" class="flex flex-col gap-4 max-w-md">
                <input type="hidden" name="id" id="id">
                <div class="flex gap-4">
                    <label for="first_name" class="w-32 text-right">First Name:</label>
                    <input type="text" name="first_name" id="first_name" class="input flex-1" />
                </div>
                <div class="flex gap-4">
                    <label for="last_name" class="w-32 text-right">Last Name:</label>
                    <input type="text" name="last_name" id="last_name" class="input flex-1" />
                </div>
                <div class="flex gap-4">
                    <label for="email" class="w-32 text-right">Email:</label>
                    <input type="email" name="email" id="email" class="input flex-1" />
                </div>
                <div class="flex gap-4">
                    <label for="contact" class="w-32 text-right">Contact:</label>
                    <input type="tel" name="contact" id="contact" class="input flex-1" />
                </div>
                <div class="flex justify-center">
                    <button type="submit" class="btn btn-soft btn-secondary">Update</button>
                </div>
            </form>
        </div>
    </dialog>
</div>

<script src="/projects/carestream/public/js/app.js" defer></script>